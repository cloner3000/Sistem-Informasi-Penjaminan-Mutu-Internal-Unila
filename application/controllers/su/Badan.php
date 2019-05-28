<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Badan extends MY_Controller {



  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->database();
    $this->load->model('Core_model');
    $this->load->model('Badan_model');

    $this->check_login();
    if ($this->session->userdata('role_id') != '1' ) {
        redirect('', 'refresh');
    }

    $this->ip_address = $_SERVER['REMOTE_ADDR'];
    $this->time = date('Y-m-d H:i:s');
  }

  public function index()
  {
    $x['badan']=$this->Badan_model->get_badan();
    
    $this->template->load('layouts/template', 'content/manajemen_badan', $x);
  }

  public function data_badan()
  {
    $badan = $this->Badan_model->get_badan();
    
    foreach ($badan as $key => $value) {
        $tbody = array();
        $tbody[] = $value['nama_badan'];
        
        $aksi = "<button class='btn btn-primary ubah-badan' id='id_badan' data-toggle='modal' data-id_badan=".$value['id_badan']."><i class='fa fa-pencil'></i></button>".' '.
        "<button class='btn btn-danger hapus-badan' id='id_badan' data-toggle='modal' data-id_badan=".$value['id_badan']."><i class='fa fa-trash'></i></button>".' '.
        "<button class='btn btn-warning detail-badan' id='id_badan' data-toggle='modal' data-id_badan=".$value['id_badan'].">Detail</button>".' '.
        "<button class='btn btn-success ganti-kabadan' id='id_badan' data-toggle='modal' data-id_badan=".$value['id_badan'].">Ganti Kepala Badan</button>";
            
        $tbody[] = $aksi;
        $data[] = $tbody;
    }
      
    
    if ($badan){
      echo json_encode(array('data'=> $data));
    } else {
      echo json_encode(array('data'=>0));
    }
      # code...
  }

    public function tambah_badan()
    {
      $nama_badan = $this->input->post('nama_badan');

      $tambah_badan = array(
        'nama_badan' => $nama_badan,
      );

      $data = $this->Badan_model->tambah_badan('badan_pengelola', $tambah_badan);

      if($data == true){
        $nama_kabadan = $this->input->post('nama_kabadan');
        $nip_kabadan = $this->input->post('nip_kabadan');
        $mulai_jabatan = $this->input->post('mulai_jabatan');
        $selesai_jabatan= $this->input->post('selesai_jabatan');
        $kabadan = array(
            'badan_id' => $data,
            'nama_kabadan' => $nama_kabadan,
            'nip_kabadan' => $nip_kabadan,
            'mulai_jabatan ' => $mulai_jabatan,
            'selesai_jabatan ' => $selesai_jabatan,
        );

        $this->db->insert('kepala_badan_pengelola', $kabadan);
      }
     
      echo json_encode($data); 
    }
      
    public function edit_badan()
    {
      $id = $this->input->post('id_badan');
      
      $data['data_badan'] = $this->Badan_model->update($id);
      $this->load->view('modals/edit_badan', $data);
    }

    public function update_badan()
    {
        $edit_badan = array(
            'nama_badan' => $this->input->post('edit_nama_badan'),
          );
          
        $id = $this->input->post('id_badan');
        $data = $this->Badan_model->update_badan($edit_badan,$id);
        
        echo json_encode($data);
    }
  
    public function detail_badan()
    {
      $id = $this->input->post('id_badan');    
      $data['kabadan']=$this->Badan_model->get_kabadan($id);
      $data['badan'] = $this->Badan_model->detail_badan($id);
      $this->load->view('modals/detail_badan', $data);
    }

    public function ganti_kabadan()
    {
      $id = $this->input->post('id_badan');    
      $data['data_badan'] = $this->Badan_model->detail_badan($id);
      $this->load->view('modals/new_kabadan', $data);
    }

  public function new_kabadan()
  {
    $id = $this->input->post('badan_id');
    $nama_kabadan = $this->input->post('new_nama_kabadan');
    $nip_kabadan  = $this->input->post('new_nip_kabadan');
    $mulai_jabatan = $this->input->post('new_mulai_jabatan');
    $selesai_jabatan= $this->input->post('new_selesai_jabatan');
    $kabadan  = array(
      'badan_id' => $id,
      'nama_kabadan ' => $nama_kabadan,
      'nip_kabadan ' => $nip_kabadan,
      'mulai_jabatan ' => $mulai_jabatan,
      'selesai_jabatan ' => $selesai_jabatan,
      );
          

    $data = $this->Badan_model->update_kabadan ('kepala_badan_pengelola', $kabadan);
      
    echo json_encode($data);
  }

  public function delete_badan()
    {
      $id = $this->input->post('id_badan');
      $data = $this->Badan_model->hapus_badan($id);
      echo json_encode($data);
      # code...
    }

}
