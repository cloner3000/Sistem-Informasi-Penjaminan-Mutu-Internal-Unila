<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends MY_Controller {



  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->database();
    $this->load->model('Core_model');
    $this->load->model('Prodi_model');

    $this->check_login();
    if ($this->session->userdata('role_id') != '1' ) {
        redirect('', 'refresh');
    }

    $this->ip_address = $_SERVER['REMOTE_ADDR'];
    $this->time = date('Y-m-d H:i:s');
  }

  public function index()
  {
    $x['fakultas']=$this->Core_model->get_fakultases();
    //$x['jurusan']=$this->Core_model->get_jurusans();
    $x['strata']=$this->Core_model->get_strata();
    // $x['dosen']=$this->Core_model->get_dosen();
    $this->template->load('layouts/template', 'content/manajemen_prodi', $x);
  }

  public function data_Prodi()
  {
    $prodi = $this->Prodi_model->get_prodi();
    
    foreach ($prodi as $key => $value) {
        $tbody = array();

        $prod = $value['program_studi'];
        $tbody[] = $prod;
        $tbody[] = $value['nama_fakultas'];

        
        $aksi = "<button class='btn btn-primary ubah-prodi' id='id_prodi' data-toggle='modal' data-id_prodi=".$value['id_prodi']."><i class='fa fa-pencil'></i></button>".' '.
        "<button class='btn btn-danger hapus-prodi' id='id_prodi' data-toggle='modal' data-id_prodi=".$value['id_prodi']."><i class='fa fa-trash'></i></button>".' '.
        "<button class='btn btn-warning detail-prodi' id='id_prodi' data-toggle='modal' data-id_prodi=".$value['id_prodi'].">Detail</button>".' '.
        "<button class='btn btn-success ganti-kaprodi' id='id_prodi' data-toggle='modal' data-id_prodi=".$value['id_prodi'].">Ganti Kaprodi</button>";
            
        $tbody[] = $aksi;
        $data[] = $tbody;
    }
      
    
    if ($prodi){
      echo json_encode(array('data'=> $data));
    } else {
      echo json_encode(array('data'=>0));
    }
      # code...
  }

    public function tambah_prodi()
    {
      $fakultas_id = $this->input->post('fakultas_id');
      $strata_id = $this->input->post('strata_id');
      $program_studi = $this->input->post('program_studi');
     

      $tambah_prodi = array(
        'fakultas_id' => $fakultas_id,
        'strata_id' => $strata_id,
        'program_studi' => $program_studi,
        
      );

      $data = $this->Prodi_model->tambah_prodi('program_studi', $tambah_prodi);

      if($data == true){
        $nama_kaprodi = $this->input->post('nama_kaprodi');
        $nip_kaprodi= $this->input->post('nip_kaprodi');
        $mulai_jabatan = $this->input->post('mulai_jabatan');
        $selesai_jabatan= $this->input->post('selesai_jabatan');
        $kaprodi = array(
            'prodi_id' => $data,
            'nama_kaprodi' => $nama_kaprodi,
            'nip_kaprodi' => $nip_kaprodi,
            'mulai_jabatan ' => $mulai_jabatan,
            'selesai_jabatan ' => $selesai_jabatan,
        );

        $this->db->insert('kepala_prodi', $kaprodi);
      }
     
      echo json_encode($data); 
    }
      
    public function edit_prodi()
    {
      
      $id = $this->input->post('id_prodi');
      
      $data['data_prodi'] = $this->Prodi_model->update($id);
      $this->load->view('modals/edit_prodi', $data);
    }

    public function update_prodi()
    {
        $edit_prodi = array(
            'program_studi' => $this->input->post('edit_program_studi'),
        );
          
        $id = $this->input->post('id_prodi');
        $data = $this->Prodi_model->update_prodi($edit_prodi,$id);
        
        echo json_encode($data);
    }
  
    public function detail_prodi()
    {
      $id = $this->input->post('id_prodi');    
      $data['kaprodi']=$this->Prodi_model->get_kaprodi($id);
      $data['prodi'] = $this->Prodi_model->detail_prodi($id);
      $this->load->view('modals/detail_prodi', $data);
    }

    public function ganti_kaprodi()
    {
      $id = $this->input->post('id_prodi');    
      $data['data_prodi'] = $this->Prodi_model->detail_prodi($id);
      $this->load->view('modals/new_kaprodi', $data);
    }

  public function new_kaprodi()
  {
    $id = $this->input->post('prodi_id');
    $new_nama_kaprodi = $this->input->post('new_nama_kaprodi');
    $new_nip_kaprodi = $this->input->post('new_nip_kaprodi');
    $mulai_jabatan = $this->input->post('new_mulai_jabatan');
    $selesai_jabatan= $this->input->post('new_selesai_jabatan');
    $kaprodi = array(
      'prodi_id' => $id,
      'nama_kaprodi' => $new_nama_kaprodi,
      'nip_kaprodi' => $new_nip_kaprodi,
      'mulai_jabatan ' => $mulai_jabatan,
      'selesai_jabatan ' => $selesai_jabatan,
      );
          

    $data = $this->Prodi_model->update_kaprodi('kepala_prodi', $kaprodi);
      
    echo json_encode($data);
  }

  public function delete_prodi()
    {
      $id = $this->input->post('id_prodi');
      $data = $this->Prodi_model->hapus_prodi($id);
      echo json_encode($data);
      # code...
    }
  
  

  function get_jurusan_id(){
		$id=$this->input->post('id');
		$data=$this->Core_model->get_jurusan_id($id);
		echo json_encode($data);
	}


}
