<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends MY_Controller {
 

  function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model('User_model');
    $this->load->model('Auth_model');
    $this->load->model('Core_model');
    $this->load->model('Upt_model');
    $this->load->model('Lembaga_model');
    $this->load->model('Badan_model');
    $this->load->helper('form');
    $this->load->helper('url');

    $this->check_login();
    if ($this->session->userdata('role_id') != "1") {
      redirect('', 'refresh');
    }

    $this->ip_address = $_SERVER['REMOTE_ADDR'];
    $this->time = date('Y-m-d H:i:s');
  }

  public function semua_user()
  {
    $id = $this->input->post('id_user');
    $x['data_user'] = $this->User_model->update($id);

    $x['role']=$this->Core_model->get_role();
    $x['fakultas']=$this->Core_model->get_fakultases();
    $x['prodi']=$this->Core_model->get_prodi();
    $x['lab']=$this->Core_model->get_lab();
    $x['upt'] = $this->Upt_model->get_upt();
    $x['lembaga'] = $this->Lembaga_model->get_lembaga();
    $x['badan'] = $this->Badan_model->get_badan();
    $x['data_user'] = $this->User_model->update($id);
    $this->template->load('layouts/template', 'content/manajemen_user', $x);
  }

  public function data_user()
  {

    $user = $this->User_model->get_user();
    //$data = array();
    //$no =1;
    foreach ($user as  $value) {
      if ($value['role_id'] != '1'){
        $tbody = array();
        //$tbody[] = $no++;
        $tbody[] = $value['username'];
        $tbody[] = $value['role'];
        $tbody[] = base64_decode($value['session']);
        $status = $value['status'];
        if ($value['status'] == true){
          $status = "<span class='label label-success'>Aktif</span>";
        }else{
          $status = "<span class='label label-danger'>Non Aktif</span>";
        }
        $tbody[] = $value['masuk'];
        $tbody[] = $status;
        $button = $value['status'];
        if ($value['status'] == true){
          $button = "<button class='btn btn-danger non-aktif-user' id='id_user' data-toggle='modal' data-id_user=".$value['id_user'].">Non Aktif</button>";
        }else{
          $button = "<button class='btn btn-success aktif-user' id='id_user' data-toggle='modal' data-id_user=".$value['id_user'].">Aktifkan</button>";
          // $button = "<button class='btn btn-danger hapus-user' id='id_user' data-toggle='modal' data-id_user=".$value['id_user'].">Hapus</button>";
        }
        $aksi= "<button class='btn btn-primary ubah-user' data-toggle='modal' data-id_user=".$value['id_user']."><i class='fa fa-pencil'></i></button>".' '.
        "<button class='btn btn-warning reset-pw-user' id='id_user' data-toggle='modal' data-id_user=".$value['id_user']."><i class='fa fa-refresh'></i> Reset PW</button>".' '.
        $button;
        $tbody[] = $aksi;
        $data[] = $tbody;
      }
    }
    if ($user) {
      echo json_encode(array('data'=> $data));
    }else{
      echo json_encode(array('data'=>0));
    }
  }

  public function tambah_user()
  {
    $role_id = $this->input->post('role_id');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $session = $this->input->post('password');

    $this->form_validation->set_rules('role_id', 'required');
    $this->form_validation->set_rules('username', 'required');
    $this->form_validation->set_rules('password', 'required');

    $cek = $this->User_model->cek_user($username);
    if($cek > 0 ){
      $response_array['status'] = 'error';
      $this->output->set_status_header(500);
      echo json_encode($response_array);
    }else{
      $tambah_user = array(
        'role_id' => $role_id,
        'username' => $username,
        'password' => get_hash($password),
        'session' => base64_encode($session),
        'status' => "1"
      );

      $data = $this->User_model->insert($tambah_user);

      if($role_id == "2"){
        $detail_prodi = array(
            'user_id' => $data,
            'prodi_id' => $this->input->post('prodi_id')
        );
        $this->db->insert('tpm_prodi', $detail_prodi);
      }

      if($role_id == "3"){
        $detail_auditor = array(
            'user_id' => $data,
        );
        $this->db->insert('auditor', $detail_auditor);
      }

      if($role_id == "5"){
        $detail_lab = array(
          'user_id' => $data,
          'lab_id' => $this->input->post('lab_id')
        );
        $this->db->insert('tpm_lab', $detail_lab);
      }

      if($role_id == "6"){
        $detail_unit = array(
          'user_id' => $data,
          'unit_id' => $this->input->post('unit_id')
        );
        $this->db->insert('tpm_unit', $detail_unit);
      }

      if($role_id == "7"){
        $detail_pusat = array(
          'user_id' => $data,
          'pusat_lembaga_id' => $this->input->post('pusat_lembaga_id')
        );
        $this->db->insert('tpm_pusat_lembaga', $detail_pusat);
      }

      if($role_id == "8"){
        $detail_badan = array(
          'user_id' => $data,
          'badan_id' => $this->input->post('badan_id')
        );
        $this->db->insert('tpm_badan', $detail_badan);
      }
      
      if($role_id == "10"){
        $detail_badan = array(
          'user_id' => $data,
          'fakultas_id' => $this->input->post('fakultas_id')
        );
        $this->db->insert('tpm_fakultas', $detail_badan);
      }

      echo json_encode($data);
    }  
  }

  public function edit_user()
  {
    $id = $this->input->post('id_user');

    $data['role']=$this->Core_model->get_role();

    $data['data_user'] = $this->User_model->update($id);
    $this->load->view('modals/edit_user', $data);
  }

  public function update_user()
  {
    $username = $this->input->post('editusername');
    $cek = $this->User_model->cek_user($username);
    if($cek > 0 ){
      $response_array['status'] = 'error';
      $this->output->set_status_header(500); // or any other code
      echo json_encode($response_array);
    }else{
      $edit_data = array(
        'username' => $username,
        'password' => get_hash($this->input->post('editpassword')),
        'session' => base64_encode($this->input->post('editpassword')),
      );

      $id = $this->input->post('id_user');
      $data = $this->User_model->update_user($edit_data,$id);

      echo json_encode($data);
    }
  }

  public function reset_password()
  {
    $id = $this->input->post('id_user');
    $edit_data = array(
      'password' => get_hash('unilajaya'),
      'session' => base64_encode('unilajaya'),

    );
    $data = $this->User_model->reset_password($edit_data,$id);
    echo json_encode($data);
  }

  public function non_aktif_user()
  {
    $id = $this->input->post('id_user');
    $edit_data = array(
      'status' => "0",
    );
    $data = $this->User_model->non_aktif_user($edit_data,$id);
    echo json_encode($data);
  }

  public function aktif_user()
  {
    $id = $this->input->post('id_user');
    $edit_data = array(
      'status' => "1",
    );
    $data = $this->User_model->aktif_user($edit_data,$id);
    echo json_encode($data);
  }

  public function user_prodi()
  {
    $this->template->load('layouts/template', 'content/user_prodi');
    # code...
  }

  public function user_tpm_prodi()
  {
    $tpm_prodi = $this->User_model->get_tpm_prodi();
    $no = 1;

    foreach ($tpm_prodi as $prodi) {
      $tbody = array();
      $tbody[] = $no++;
      $tbody[] = $prodi['username'];
      $tbody[] = base64_decode($prodi['session']);
      $tbody[] = $prodi['program_studi'];

      $data[] = $tbody;
    }

    if ($tpm_prodi) {
      echo json_encode(array('data'=> $data));
    }else{
      echo json_encode(array('data'=>0));
    }
    # code...
  }

  public function user_lab()
  {
    $this->template->load('layouts/template', 'content/user_lab');
    # code...
  }

  public function user_tpm_lab()
  {
    $tpm_lab = $this->User_model->get_tpm_lab();
    $no = 1;

    foreach ($tpm_lab as $value) {
      $tbody = array();
      $tbody[] = $no++;
      $tbody[] = $value['username'];
      $tbody[] = base64_decode($value['session']);
      $tbody[] = $value['nama_tpm_lab'];
      $tbody[] = $value['nama_lab'];
      $tbody[] = $value['nama_fakultas'];

      $data[] = $tbody;
    }

    if ($tpm_lab) {
      echo json_encode(array('data'=> $data));
    }else{
      echo json_encode(array('data'=>0));
    }
    # code...
  }

  public function user_unit()
  {
    $this->template->load('layouts/template', 'content/user_unit');
    # code...
  }

  public function user_tpm_upt()
  {
    $tpm_upt = $this->User_model->get_tpm_upt();
    $no = 1;

    foreach ($tpm_upt as $value) {
      $tbody = array();
      $tbody[] = $no++;
      $tbody[] = $value['username'];
      $tbody[] = base64_decode($value['session']);
      $tbody[] = $value['nama_tpm_unit'];
      $tbody[] = $value['unit_pelaksana'];

      $data[] = $tbody;
    }

    if ($tpm_upt) {
      echo json_encode(array('data'=> $data));
    }else{
      echo json_encode(array('data'=>0));
    }
    # code...
  }

  public function user_lembaga()
  {
    $this->template->load('layouts/template', 'content/user_lembaga');
    # code...
  }

  public function user_tpm_lembaga()
  {
    $tpm_lembaga = $this->User_model->get_tpm_lembaga();
    $no = 1;

    foreach ($tpm_lembaga as $value) {
      $tbody = array();
      $tbody[] = $no++;
      $tbody[] = $value['username'];
      $tbody[] = base64_decode($value['session']);
      $tbody[] = $value['nama_tpm_pusat'];
      $tbody[] = $value['pusat_lembaga'];

      $data[] = $tbody;
    }

    if ($tpm_lembaga) {
      echo json_encode(array('data'=> $data));
    }else{
      echo json_encode(array('data'=>0));
    }
    # code...
  }

  public function user_badan()
  {
    $this->template->load('layouts/template', 'content/user_badan');
    # code...
  }

  public function user_tpm_badan()
  {

    $tpm_badan= $this->User_model->get_tpm_badan();
    $no = 1;

    foreach ($tpm_badan as $value) {
      $tbody = array();
      $tbody[] = $no++;
      $tbody[] = $value['username'];
      $tbody[] = base64_decode($value['session']);
      $tbody[] = $value['nama_tpm_badan'];
      $tbody[] = $value['nama_badan'];

      $data[] = $tbody;
    }

    if ($tpm_badan) {
      echo json_encode(array('data'=> $data));
    }else{
      echo json_encode(array('data'=>0));
    }
    # code...
  }

  public function user_auditor()
  {
    $this->template->load('layouts/template', 'content/user_auditor');
    # code...
  }

  public function get_auditor()
  {
    $auditor= $this->User_model->get_auditor();
    $no = 1;

    foreach ($auditor as $value) {
      $tbody = array();
      $tbody[] = $no++;
      $tbody[] = $value['username'];
      $tbody[] = base64_decode($value['session']);
      $tbody[] = $value['nama_auditor'];
      $tbody[] = $value['nip_auditor'];

      $data[] = $tbody;
    }

    if ($auditor) {
      echo json_encode(array('data'=> $data));
    }else{
      echo json_encode(array('data'=>0));
    }
    # code...
  }
  
}
