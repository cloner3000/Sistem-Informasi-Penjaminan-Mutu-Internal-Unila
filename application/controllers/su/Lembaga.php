<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembaga extends MY_Controller {



  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->database();
    $this->load->model('Lembaga_model');

    $this->check_login();
    if ($this->session->userdata('role_id') != '1' ) {
        redirect('', 'refresh');
    }

    $this->ip_address = $_SERVER['REMOTE_ADDR'];
    $this->time = date('Y-m-d H:i:s');
  }

  public function index()
  {
    $x['lembaga']=$this->Lembaga_model->lembaga();
    $this->template->load('layouts/template', 'content/manajemen_lembaga', $x);
  }

  public function data_lembaga()
  {
    $lembaga = $this->Lembaga_model->get_lembaga();
    
    foreach ($lembaga as $key => $value) {
        $tbody = array();
        $tbody[] = $value['pusat_lembaga'];
        $tbody[] = $value['lembaga'];

        
        $aksi = "<button class='btn btn-primary ubah-lembaga' id='id_pusat_lembaga' data-toggle='modal' data-id_pusat_lembaga=".$value['id_pusat_lembaga']."><i class='fa fa-pencil'></i></button>".' '.
        "<button class='btn btn-danger hapus-lembaga' id='id_pusat_lembaga' data-toggle='modal' data-id_pusat_lembaga=".$value['id_pusat_lembaga']."><i class='fa fa-trash'></i></button>".' '.
        "<button class='btn btn-warning detail-lembaga' id='id_pusat_lembaga' data-toggle='modal' data-id_pusat_lembaga=".$value['id_pusat_lembaga'].">Detail</button>".' '.
        "<button class='btn btn-success ganti-kalembaga' id='id_pusat_lembaga' data-toggle='modal' data-id_pusat_lembaga=".$value['id_pusat_lembaga'].">Ganti Ka Lembaga</button>";
            
        $tbody[] = $aksi;
        $data[] = $tbody;
    }
      
    
    if ($lembaga){
      echo json_encode(array('data'=> $data));
    } else {
      echo json_encode(array('data'=>0));
    }
      # code...
  }

    public function tambah_lembaga()
    {
      $pusat_lembaga = $this->input->post('pusat_lembaga'); 
      $lembaga_id = $this->input->post('lembaga_id'); 

      $tambah_lembaga = array(
        'lembaga_id' => $lembaga_id,
        'pusat_lembaga' => $pusat_lembaga
        
      );

      $data = $this->Lembaga_model->tambah_lembaga('pusat_lembaga', $tambah_lembaga);

      if($data == true){
        $nama_kalembaga = $this->input->post('nama_kalembaga');
        $nip_kalembaga = $this->input->post('nip_kalembaga');
        $mulai_jabatan = $this->input->post('mulai_jabatan');
        $selesai_jabatan= $this->input->post('selesai_jabatan');
        $kalembaga = array(
            'pusat_lembaga_id' => $data,
            'nama_kalembaga' => $nama_kalembaga,
            'nip_kalembaga' => $nip_kalembaga,
            'mulai_jabatan ' => $mulai_jabatan,
            'selesai_jabatan ' => $selesai_jabatan,
        );

        $this->db->insert('kepala_lembaga', $kalembaga);
      }
     
      echo json_encode($data); 
    }
      
    public function edit_lembaga()
    {
      // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
      $id = $this->input->post('id_pusat_lembaga');
      
      $data['data_lembaga'] = $this->Lembaga_model->update($id);
      $this->load->view('modals/edit_lembaga', $data);
    }

    public function update_lembaga()
    {
        $edit_lembaga = array(
            'pusat_lembaga' => $this->input->post('edit_pusat_lembaga'),
          );
          
        $id = $this->input->post('id_pusat_lembaga');
        $data = $this->Lembaga_model->update_lembaga($edit_lembaga,$id);
        
        echo json_encode($data);
    }
  
    public function detail_lembaga()
    {
      $id = $this->input->post('id_pusat_lembaga');    
      $data['kalembaga']=$this->Lembaga_model->get_kalembaga($id);
      $data['lembaga'] = $this->Lembaga_model->detail_lembaga($id);
      $this->load->view('modals/detail_lembaga', $data);
    }

    public function ganti_kalembaga()
    {
      $id = $this->input->post('id_pusat_lembaga');    
      $data['data_lembaga'] = $this->Lembaga_model->detail_lembaga($id);
      $this->load->view('modals/new_kalembaga', $data);
    }

  public function new_kalembaga()
  {
    $id = $this->input->post('pusat_lembaga_id');
    $nama_kalembaga = $this->input->post('new_nama_kalembaga');
    $nip_kalembaga = $this->input->post('new_nip_kalembaga');
    $mulai_jabatan = $this->input->post('new_mulai_jabatan');
    $selesai_jabatan= $this->input->post('new_selesai_jabatan');
    $kalembaga = array(
      'pusat_lembaga_id' => $id,
      'nama_kalembaga' => $nama_kalembaga,
      'nip_kalembaga' => $nip_kalembaga,
      'mulai_jabatan ' => $mulai_jabatan,
      'selesai_jabatan ' => $selesai_jabatan,
      );
          

    $data = $this->Lembaga_model->update_kalembaga('kepala_lembaga', $kalembaga);
      
    echo json_encode($data);
  }

  public function delete_lembaga()
    {
      $id = $this->input->post('id_pusat_lembaga');
      $data = $this->Lembaga_model->hapus_lembaga($id);
      echo json_encode($data);
      # code...
    }

}
