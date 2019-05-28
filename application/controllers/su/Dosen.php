<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends MY_Controller {



  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->database();
    $this->load->model('Dosen_model');

    $this->check_login();
    if ($this->session->userdata('role_id') != '1' ) {
        redirect('', 'refresh');
    }

    $this->ip_address = $_SERVER['REMOTE_ADDR'];
    $this->time = date('Y-m-d H:i:s');
  }

  public function index()
  {
      $this->template->load('layouts/template', 'content/manajemen_dosen');
  }

  public function dosen_remun()
  {
    $dosen = $this->Dosen_model->get_dosen();
    
    foreach ($dosen as $key => $value) {
        $tbody = array();
        $tbody[] = $value['nama'];
        $tbody[] = $value['fakultas'];
        $tbody[] = $value['prodi'];

        $data[] = $tbody;
    }
      
    
    if ($dosen){
      echo json_encode(array('data'=> $data));
    } else {
      echo json_encode(array('data'=>0));
    }
      # code...
  }
}
