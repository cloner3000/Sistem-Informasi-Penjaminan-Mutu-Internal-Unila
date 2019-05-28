<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekapitulasi extends MY_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->database();
      $this->load->helper('url');

      $this->check_login();
 
      $this->ip_address = $_SERVER['REMOTE_ADDR'];
      $this->time = date('Y-m-d H:i:s');
      // code...
    }

	public function index()
	{
        $this->template->load('layouts/template', 'content/rekapitulasi');
	}

	
}
