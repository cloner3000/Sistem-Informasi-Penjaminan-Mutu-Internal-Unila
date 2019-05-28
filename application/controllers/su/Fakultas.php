<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas extends MY_Controller {



  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->database();
    $this->load->model('Core_model');
    $this->load->model('Fakultas_model');

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
    
    $this->template->load('layouts/template', 'content/manajemen_fakultas', $x);
  }

  public function data_fakultas()
  {
    $fakultas = $this->Fakultas_model->get_fakultas();
    
    foreach ($fakultas as $key => $value) {
        $tbody = array();
        $tbody[] = $value['nama_fakultas'];
        $tbody[] = $value['singkatan_fakultas'];

        
        $aksi = "<button class='btn btn-primary ubah-fakultas' id='id_fakultas' data-toggle='modal' data-id_fakultas=".$value['id_fakultas']."><i class='fa fa-pencil'></i></button>".' '.
        "<button class='btn btn-danger hapus-fakultas' id='id_fakultas' data-toggle='modal' data-id_fakultas=".$value['id_fakultas']."><i class='fa fa-trash'></i></button>".' '.
        "<button class='btn btn-warning detail-fakultas' id='id_fakultas' data-toggle='modal' data-id_fakultas=".$value['id_fakultas'].">Detail</button>".' '.
        "<button class='btn btn-success ganti-wadek' id='id_fakultas' data-toggle='modal' data-id_fakultas=".$value['id_fakultas'].">Ganti Wadek 1</button>";
            
        $tbody[] = $aksi;
        $data[] = $tbody;
    }
      
    
    if ($fakultas){
      echo json_encode(array('data'=> $data));
    } else {
      echo json_encode(array('data'=>0));
    }
      # code...
  }

    public function tambah_fakultas()
    {
      $nama_fakultas = $this->input->post('nama_fakultas');
      $singkatan_fakultas = $this->input->post('singkatan_fakultas');


      $tambah_fakultas = array(
        'nama_fakultas' => $nama_fakultas,
        'singkatan_fakultas' => $singkatan_fakultas,
        
      );

      $data = $this->Fakultas_model->tambah_fakultas('fakultas', $tambah_fakultas);

      if($data == true){
        $nama_wadek_satu = $this->input->post('nama_wadek_satu');
        $nip_wadek_satu = $this->input->post('nip_wadek_satu');
        $mulai_jabatan = $this->input->post('mulai_jabatan');
        $selesai_jabatan= $this->input->post('selesai_jabatan');
        $wadek = array(
            'fakultas_id' => $data,
            'nama_wadek_satu' => $nama_wadek_satu,
            'nip_wadek_satu' => $nip_wadek_satu,
            'mulai_jabatan ' => $mulai_jabatan,
            'selesai_jabatan ' => $selesai_jabatan,
        );

        $this->db->insert('wakil_dekan_satu', $wadek);
      }
     
      echo json_encode($data); 
    }
      
    public function edit_fakultas()
    {
      // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
      $id = $this->input->post('id_fakultas');
      
      $data['data_fakultas'] = $this->Fakultas_model->update($id);
      $this->load->view('modals/edit_fakultas', $data);
    }

    public function update_fakultas()
    {
        $edit_fakultas = array(
            'nama_fakultas' => $this->input->post('edit_nama_fakultas'),
            'singkatan_fakultas' => $this->input->post('edit_singkatan_fakultas'),
          );
          
        $id = $this->input->post('id_fakultas');
        $data = $this->Fakultas_model->update_fakultas($edit_fakultas,$id);
        
        echo json_encode($data);
    }
  
    public function detail_fakultas()
    {
      $id = $this->input->post('id_fakultas');    
      $data['wadek']=$this->Fakultas_model->get_wadek($id);
      $data['fakultas'] = $this->Fakultas_model->detail_fakultas($id);
      $this->load->view('modals/detail_fakultas', $data);
    }

    public function ganti_wadek()
    {
      $id = $this->input->post('id_fakultas');    
      $data['data_fakultas'] = $this->Fakultas_model->detail_fakultas($id);
      $this->load->view('modals/new_wadek', $data);
    }

  public function new_wadek()
  {
    $id = $this->input->post('fakultas_id');
    $nama_wadek_satu = $this->input->post('new_nama_wadek_satu');
    $nip_wadek_satu = $this->input->post('new_nip_wadek_satu');
    $mulai_jabatan = $this->input->post('new_mulai_jabatan');
    $selesai_jabatan= $this->input->post('new_selesai_jabatan');
    $wadek = array(
      'fakultas_id' => $id,
      'nama_wadek_satu' => $nama_wadek_satu,
      'nip_wadek_satu' => $nip_wadek_satu,
      'mulai_jabatan ' => $mulai_jabatan,
      'selesai_jabatan ' => $selesai_jabatan,
      );
          

    $data = $this->Fakultas_model->update_wadek('wakil_dekan_satu', $wadek);
      
    echo json_encode($data);
  }

  public function delete_fakultas()
    {
      $id = $this->input->post('id_fakultas');
      $data = $this->Fakultas_model->hapus_fakultas($id);
      echo json_encode($data);
      # code...
    }
  
  

  function get_jurusan_id(){
		$id=$this->input->post('id');
		$data=$this->Core_model->get_jurusan_id($id);
		echo json_encode($data);
	}


}
