<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgotpassword extends MY_Controller {

    public function index()
    {
        $this->load->view('lupa_password');
    }

}
