<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upt extends MY_Controller {



  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->database();
    $this->load->model('Upt_model');

    $this->check_login();
    if ($this->session->userdata('role_id') != '1' ) {
        redirect('', 'refresh');
    }

    $this->ip_address = $_SERVER['REMOTE_ADDR'];
    $this->time = date('Y-m-d H:i:s');
  }

  public function index()
  {
    $x['upt']=$this->Upt_model->get_upt();
    
    $this->template->load('layouts/template', 'content/manajemen_upt', $x);
  }

  public function data_upt()
  {
    $upt = $this->Upt_model->get_upt();
    
    foreach ($upt as $key => $value) {
        $tbody = array();
        $tbody[] = $value['unit_pelaksana'];

        
        $aksi = "<button class='btn btn-primary ubah-upt' id='id_upt' data-toggle='modal' data-id_upt=".$value['id_upt']."><i class='fa fa-pencil'></i></button>".' '.
        "<button class='btn btn-danger hapus-upt' id='id_upt' data-toggle='modal' data-id_upt=".$value['id_upt']."><i class='fa fa-trash'></i></button>".' '.
        "<button class='btn btn-warning detail-upt' id='id_upt' data-toggle='modal' data-id_upt=".$value['id_upt'].">Detail</button>".' '.
        "<button class='btn btn-success ganti-kaupt' id='id_upt' data-toggle='modal' data-id_upt=".$value['id_upt'].">Ganti Ka UPT</button>";
            
        $tbody[] = $aksi;
        $data[] = $tbody;
    }
      
    
    if ($upt){
      echo json_encode(array('data'=> $data));
    } else {
      echo json_encode(array('data'=>0));
    }
      # code...
  }

    public function tambah_upt()
    {
      $unit_pelaksana = $this->input->post('unit_pelaksana'); 

      $tambah_upt = array(
        'unit_pelaksana' => $unit_pelaksana      
      );

      $data = $this->Upt_model->tambah_upt('upt', $tambah_upt);

      if($data == true){
        $nama_kaupt = $this->input->post('nama_kaupt');
        $nip_kaupt = $this->input->post('nip_kaupt');
        $mulai_jabatan = $this->input->post('mulai_jabatan');
        $selesai_jabatan= $this->input->post('selesai_jabatan');
        $kaupt = array(
            'upt_id' => $data,
            'nama_kaupt' => $nama_kaupt,
            'nip_kaupt' => $nip_kaupt,
            'mulai_jabatan ' => $mulai_jabatan,
            'selesai_jabatan ' => $selesai_jabatan,
        );

        $this->db->insert('kepala_upt', $kaupt);
      }
     
      echo json_encode($data); 
    }
      
    public function edit_upt()
    {
      $id = $this->input->post('id_upt');
      
      $data['data_upt'] = $this->Upt_model->update($id);
      $this->load->view('modals/edit_upt', $data);
    }

    public function update_upt()
    {
        $edit_upt = array(
            'unit_pelaksana' => $this->input->post('edit_unit_pelaksana'),
          );
          
        $id = $this->input->post('id_upt');
        $data = $this->Upt_model->update_upt($edit_upt,$id);
        
        echo json_encode($data);
    }
  
    public function detail_upt()
    {
      $id = $this->input->post('id_upt');    
      $data['kaupt']=$this->Upt_model->get_kaupt($id);
      $data['upt'] = $this->Upt_model->detail_upt($id);
      $this->load->view('modals/detail_upt', $data);
    }

    public function ganti_kaupt()
    {
      $id = $this->input->post('id_upt');    
      $data['data_upt'] = $this->Upt_model->detail_upt($id);
      $this->load->view('modals/new_kaupt', $data);
    }

  public function new_kaupt()
  {
    $id = $this->input->post('upt_id');
    $nama_kaupt = $this->input->post('new_nama_kaupt');
    $nip_kaupt = $this->input->post('new_nip_kaupt');
    $mulai_jabatan = $this->input->post('new_mulai_jabatan');
    $selesai_jabatan= $this->input->post('new_selesai_jabatan');
    $kaupt = array(
      'upt_id' => $id,
      'nama_kaupt' => $nama_kaupt,
      'nip_kaupt' => $nip_kaupt,
      'mulai_jabatan ' => $mulai_jabatan,
      'selesai_jabatan ' => $selesai_jabatan,
      );
          

    $data = $this->Upt_model->update_kaupt('kepala_upt', $kaupt);
      
    echo json_encode($data);
  }

  public function delete_upt()
    {
      $id = $this->input->post('id_upt');
      $data = $this->Upt_model->hapus_upt($id);
      echo json_encode($data);
      # code...
    }

}
