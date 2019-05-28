<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {



  public function __construct()
  {
    parent::__construct();
    $this->check_login();

    $this->load->model('Auth_model');
    $this->load->model('User_model');
    $this->load->model('Tpm_model');
    $this->load->model('Fakultas_model');
    $this->load->model('Prodi_model');
    $this->load->model('Lab_model');
    $this->load->model('Upt_model');
    $this->load->model('Lembaga_model');
    $this->load->model('Badan_model');
    $this->load->model('Auditor_model');
    $this->load->model('Dosen_model');

    $this->ip_address = $_SERVER['REMOTE_ADDR'];
    $this->time = date('Y-m-d H:i:s');
  }
  

  public function index()
  { 
    
    $id = $this->session->userdata('role_id');
    $user_id = $this->session->userdata('id_user');
    $tpm_prodi = $this->Tpm_model->get_tpm_prodi_id($user_id);

    $fakultas = $this->Fakultas_model->get_fakultas();
    $lab = $this->Lab_model->get_lab();
    $upt = $this->Upt_model->get_upt();
    $lembaga = $this->Lembaga_model->get_lembaga();
    $badan = $this->Badan_model->get_badan();
    $user = $this->User_model->get_user();
    $dosen = $this->Dosen_model->get_dosen();
    $prodi = $this->Prodi_model->get_prodi();

    $x['tpm_prodi'] = $this->Tpm_model->get_tpm_prodi();
    $x['tpm_lab'] = $this->Tpm_model->get_tpm_lab();
    $x['tpm_unit'] = $this->Tpm_model->get_tpm_upt();
    $x['tpm_lembaga'] = $this->Tpm_model->get_tpm_lembaga();
    $x['tpm_badan'] = $this->Tpm_model->get_tpm_badan();
    $x['auditor'] = $this->Auditor_model->get_auditor();
    $x['prodi'] = count($prodi);
    $x['fakultas'] = count($fakultas);
    $x['lab'] = count($lab);
    $x['upt'] = count($upt);
    $x['lembaga'] = count($lembaga);
    $x['badan'] = count($badan);
    $x['user'] = count($user);
    $x['dosen'] = count($dosen);
    $this->template->load('layouts/template', 'content/home', $x);
  }

}
