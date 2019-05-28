<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tpm_upt extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Tpm_model');
        $this->load->model('User_model');
        $this->load->helper('url');
        $this->load->helper('form');

        $this->check_login();
            if ($this->session->userdata('role_id') != "6") {
            redirect('', 'refresh');
        }

        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->time = date('Y-m-d H:i:s');
    }

    public function detail_user()
    {     
        $id = $this->uri->segment(4);
        $data= $this->Tpm_model->update_tpm_upt($id);
        if($this->session->userdata('id_user') != $data['user_id']){
            redirect('404');
        }
        $data['detail_user'] = $this->Tpm_model->update_tpm_upt($id);
        $this->template->load('layouts/template', 'content/tpm/detail_tpm_unit', $data);
    }

    public function update_tpm_upt()
    {
        $edit_data = array(
            'nama_tpm_unit' => $this->input->post('nama_tpm_unit'),
            'nip_tpm_unit' => $this->input->post('nip_tpm_unit'),

          );
        
        //print_r($edit_data);
        $id = $this->input->post('id_tpm_unit');
        $data = $this->Tpm_model->act_update_tpm_upt($edit_data, $id);
        redirect('home');
            
    }

    public function update_user()
    {
      $edit_user = array(
        'username' => $this->input->post('username'),
        'password' => get_hash($this->input->post('password')),
        'session' => base64_encode($this->input->post('password')),
      );
  
      $id = $this->input->post('id_user');
      //print_r($edit_data);
      $data = $this->Tpm_model->update_user($edit_user, $id);
      redirect('home');

      //echo json_encode($data);

    }
    

}