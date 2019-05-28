<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instrumen extends MY_Controller {

    var $data = array();

    public function __construct()
    {
      parent::__construct();
      $this->load->database();
      $this->load->model('Borang_model');
      $this->load->model('Core_model');
      $this->load->model('Instrumen_model');
      $this->load->helper('url');

      $this->check_login();
      if ($this->session->userdata('role_id') != "1") {
        redirect('', 'refresh');
      }
 
      $this->ip_address = $_SERVER['REMOTE_ADDR'];
      $this->time = date('Y-m-d H:i:s');
      // code...
    }

    public function matkul()
    {
        $x['jenis_audit']=$this->Core_model->get_jenis_audit();
        $x['aspek'] = $this->Instrumen_model->get_aspek();
        $x['borang'] = $this->Instrumen_model->get_borang();
        $x['jawaban'] = $this->Instrumen_model->get_jawaban();
  
        $this->template->load('layouts/template', 'content/instrumen_matkul', $x);
    }


    public function detail_borang()
    {
      $id = $this->input->post('id_borang');
      
      $data['jawaban'] = $this->Borang_model->get_jawaban();
      $data['borang'] = $this->Borang_model->detail_borang($id);

      $this->load->view('modals/detail_borang_matkul', $data);
      # code...
    }
}