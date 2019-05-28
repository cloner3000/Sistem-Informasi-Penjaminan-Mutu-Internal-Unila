<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lab extends MY_Controller {



  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->database();
    $this->load->model('Core_model');
    $this->load->model('Lab_model');

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
        $this->template->load('layouts/template', 'content/manajemen_lab', $x);
  }

  public function data_lab()
  {
        $lab = $this->Lab_model->get_lab();
    
    foreach ($lab as $key => $value) {
        $tbody = array();
        $tbody[] = $value['nama_lab'];
        $tbody[] = $value['nama_fakultas'];

        
        $aksi = "<button class='btn btn-primary ubah-lab' id='id_lab' data-toggle='modal' data-id_lab=".$value['id_lab']."><i class='fa fa-pencil'></i></button>".' '.
        "<button class='btn btn-danger hapus-lab' id='id_lab' data-toggle='modal' data-id_lab=".$value['id_lab']."><i class='fa fa-trash'></i></button>".' '.
        "<button class='btn btn-warning detail-lab' id='id_lab' data-toggle='modal' data-id_lab=".$value['id_lab'].">Detail</button>".' '.
        "<button class='btn btn-success ganti-kalab' id='id_lab' data-toggle='modal' data-id_lab=".$value['id_lab'].">Ganti Ka Lab</button>";
            
        $tbody[] = $aksi;
        $data[] = $tbody;
    }
      
    
    if ($lab){
      echo json_encode(array('data'=> $data));
    } else {
      echo json_encode(array('data'=>0));
    }
      # code...
  }

    public function tambah_lab()
    {
      $nama_lab = $this->input->post('nama_lab');
      $fakultas_id = $this->input->post('fakultas_id');

      $tambah_lab = array(
        'nama_lab' => $nama_lab,
        'fakultas_id' => $fakultas_id,  
      );

      $data = $this->Lab_model->tambah_lab('laboratorium', $tambah_lab);

      if($data == true){
        $nama_kalab = $this->input->post('nama_kalab');
        $nip_kalab= $this->input->post('nip_kalab');
        $mulai_jabatan = $this->input->post('mulai_jabatan');
        $selesai_jabatan= $this->input->post('selesai_jabatan');
        $kalab = array(
            'lab_id' => $data,
            'nama_kalab' => $nama_kalab,
            'nip_kalab' => $nip_kalab,
            'mulai_jabatan ' => $mulai_jabatan,
            'selesai_jabatan ' => $selesai_jabatan,
        );

        $this->db->insert('kepala_lab', $kalab);
      }
     
      echo json_encode($data); 
    }
      
    public function edit_lab()
    {
      // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
      $id = $this->input->post('id_lab');
      
      $data['data_lab'] = $this->Lab_model->update($id);
      $this->load->view('modals/edit_lab', $data);
    }

    public function update_lab()
    {
        $edit_lab = array(
            'nama_lab' => $this->input->post('edit_nama_lab')            
          );
          
        $id = $this->input->post('id_lab');
        $data = $this->Lab_model->update_lab($edit_lab,$id);
        
        echo json_encode($data);
    }
  
    public function detail_lab()
    {
      $id = $this->input->post('id_lab');    
      $data['kalab']=$this->Lab_model->get_kalab($id);
      $data['lab'] = $this->Lab_model->detail_lab($id);
      $this->load->view('modals/detail_lab', $data);
    }

    public function ganti_kalab()
    {
      $id = $this->input->post('id_lab');    
      $data['data_lab'] = $this->Lab_model->detail_lab($id);
      $this->load->view('modals/new_kalab', $data);
    }

  public function new_kalab()
  {
    $id = $this->input->post('lab_id');
    $nama_kalab = $this->input->post('new_nama_kalab');
    $nip_kalab = $this->input->post('new_nip_kalab');
    $mulai_jabatan = $this->input->post('new_mulai_jabatan');
    $selesai_jabatan= $this->input->post('new_selesai_jabatan');
    $kalab = array(
      'lab_id' => $id,
      'nama_kalab' => $nama_kalab,
      'nip_kalab' => $nip_kalab,
      'mulai_jabatan ' => $mulai_jabatan,
      'selesai_jabatan ' => $selesai_jabatan,
      );
          

    $data = $this->Lab_model->update_kalab('kepala_lab', $kalab);
      
    echo json_encode($data);
  }

  public function delete_lab()
    {
      $id = $this->input->post('id_lab');
      $data = $this->Lab_model->hapus_lab($id);
      echo json_encode($data);
      # code...
    } 

  function get_jurusan_id(){
		$id=$this->input->post('id');
		$data=$this->Core_model->get_jurusan_id($id);
		echo json_encode($data);
	}


}
