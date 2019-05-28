<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chatt extends MY_Controller {



  public function __construct()
  {
    parent::__construct();
    $this->check_login();

    $this->load->model('Auth_model');
    $this->load->model('User_model');
    $this->load->model('Tpm_model');

    $this->ip_address = $_SERVER['REMOTE_ADDR'];
    $this->time = date('Y-m-d H:i:s');
  }
  

  public function index()
  {
    $x['tpm_prodi'] = $this->Tpm_model->get_tpm_prodi();
    $x['tpm_lab'] = $this->Tpm_model->get_tpm_lab();
    $this->template->load('layouts/template', 'content/home', $x);
  }

}
