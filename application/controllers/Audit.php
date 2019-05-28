<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Audit extends MY_Controller {

    var $data = array();

    public function __construct()
    {
      parent::__construct();
      $this->load->database();
      $this->load->model('Borang_model');
      $this->load->model('Core_model');
      $this->load->helper('url');

      $this->check_login();
 
      $this->ip_address = $_SERVER['REMOTE_ADDR'];
      $this->time = date('Y-m-d H:i:s');
      // code...
    }

    public function index()
    {
      $x['borang'] = $this->Borang_model->get_borang();
      $x['jawaban'] = $this->Borang_model->get_jawaban();
      $x['aspek'] = $this->Instrumen_model->get_aspek();

      $this->template->load('layouts/template', 'content/audit', $x);

    }

}