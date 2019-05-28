<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tpm_prodi extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Tpm_model');
        $this->load->model('Core_model');
        $this->load->model('User_model');
        $this->load->model('Jadwal_model');
        $this->load->model('Audit_ps_model');
        $this->load->model('Auth_model');
        $this->load->helper('url');
        $this->load->helper('form');

        $this->check_login();
            if ($this->session->userdata('role_id') != "2") {
            redirect('', 'refresh');
        }

        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->time = date('Y-m-d H:i:s');
    }

    public function home()
    {
        $id = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('id_user');
        $tpm_prodi = $this->Tpm_model->get_tpm_prodi_id($user_id);
        $jadwal = $this->Jadwal_model->get_jadwal_matkul($id);

        $jadwal_id = $jadwal->id_jadwal;
        $prodi_id = $tpm_prodi['prodi_id'];

        $x['jadwal'] = $this->Jadwal_model->get_jadwal_matkul($id);
        $x['tpm_prodi'] = $this->Tpm_model->get_tpm_prodi();
        $x['progres_status'] = $this->Audit_ps_model->get_progres_status($jadwal_id, $prodi_id);
        $x['progres'] = $progres = $this->Audit_ps_model->get_progres($jadwal_id, $prodi_id);
        $x['auditor'] = $progres = $this->Audit_ps_model->get_auditor($jadwal_id, $prodi_id);
        $this->template->load('layouts/template', 'content/tpm/prodi/home', $x);
    }

    public function detail_user()
    {
        // $id = $this->input->post('id_tpm_prodi');
        

        $id = $this->uri->segment(4);
        $data= $this->Tpm_model->update_tpm_prodi($id);
        if($this->session->userdata('id_user') != $data['user_id']){
            redirect('404');
        }
        $data['detail_user'] = $this->Tpm_model->update_tpm_prodi($id);
        $this->session->set_flashdata('success', ' ');
        $this->template->load('layouts/template', 'content/tpm/detail_tpm_prodi', $data);
    }

    public function update_tpm_prodi()
    {
        $edit_data = array(
            'id_tpm_prodi' =>  $this->input->post('id_tpm_prodi'),
            'nama_tpm_prodi' => $this->input->post('nama_tpm_prodi'),
            'nip_tpm_prodi' => $this->input->post('nip_tpm_prodi'),

        );
        
        $user_id = $this->session->userdata('id_user');
        $tpmp = $this->Tpm_model->get_tpm_prodi_id($user_id);
        $id = $this->input->post('id_tpm_prodi');
        
        if ($tpmp['id_tpm_prodi']== $id){
            $data = $this->Tpm_model->act_update_tpm_prodi($edit_data, $id);
            $this->session->set_flashdata('success', ' ');
            redirect('tpm/tpm_prodi/home');
        }else{
            $this->session->set_flashdata('error', ' ');
            redirect('tpm/tpm_prodi/home');
        }
            
    }

    public function update_user()
    {
        $username = $this->session->userdata('username');
        $password = $this->input->post('password');
        
        $cek = $this->Auth_model->check_account($username, $password);
        
        if($cek === 3 ){
            $this->session->set_flashdata('tidak', ' ');
            redirect('tpm/tpm_prodi/home');
        }else{
            $edit_user = array(
                'password' => get_hash($this->input->post('new_password')),
                'session' => base64_encode($this->input->post('new_password')),
            );
            
            $user_id = $this->session->userdata('id_user');
            $tpmf = $this->Tpm_model->get_tpm_prodi_id($user_id);
            
            if ($user_id){
            $data = $this->Tpm_model->update_user($edit_user, $user_id);
            $this->session->set_flashdata('success', ' ');
            redirect('tpm/tpm_prodi/home');
            } else {
                $this->session->set_flashdata('error', ' ');
                redirect('tpm/tpm_prodi/home');
            }
        }

    }

    public function set_kurikulum()
    {
        $x['tpm_prodi'] = $this->Tpm_model->get_tpm_prodi();
        $this->template->load('layouts/template', 'content/tpm/prodi/set_kurikulum', $x);
        # code...
    }

    public function data_kurikulum()
    {
        $kurikulum = $this->Core_model->get_kurikulum();
        $tpm = $this->Tpm_model->get_tpm_prodi();
        if ($this->session->userdata('role_id') == '2') {
            foreach ($tpm as $tpmp){
                if ($this->session->userdata('id_user') == $tpmp['user_id'] ) {
                    foreach ($kurikulum as $key => $value) {
                        if ($value['prodi_id'] == $tpmp['prodi_id'] ) {
                            $tbody = array();
                            $tbody[] = $value['kurikulum'];
                            $aksi = "<button class='btn btn-primary ubah-kurikulum' id='id_kurikulum' data-toggle='modal' data-id_kurikulum=".$value['id_kurikulum'].">Tambah Mata Kuliah</button>".' '.
                            "<button class='btn btn-success lihat-matakulaih' id='id_kurikulum' data-toggle='modal' data-id_kurikulum=".$value['id_kurikulum'].">Lihat</button>".' '.
                            "<button class='btn btn-danger hapus-kurikulum' id='id_kurikulum' data-toggle='modal' data-id_kurikulum=".$value['id_kurikulum'].">Hapus</button>";
                            $tbody[] = $aksi;
                            $data[] = $tbody;
                        }
                    }  
                    if ($kurikulum){
                        echo json_encode(array('data'=> $data));
                    } else {
                        echo json_encode(array('data'=>0));
                    }
                }
            }
        }           
    }

    public function act_kurikulum()
    {
        $prodi_id = $this->input->post('prodi_id');
        $kurikulum = $this->input->post('kurikulum_tahun');

        $tambah_kurikulum = array(
            'prodi_id' => $prodi_id,
            'kurikulum' => $kurikulum,
        );

        $data = $this->Core_model->insert('kurikulum', $tambah_kurikulum);

        echo json_encode($data); 
    }

    public function act_mata_kuliah()
    {
        $prodi_id = $this->input->post('prodi_id');
        $kurikulum = $this->input->post('kurikulum_tahun');

        $tambah_kurikulum = array(
            'prodi_id' => $prodi_id,
            'kurikulum' => $kurikulum,
        );

        $data = $this->Core_model->insert('kurikulum', $tambah_kurikulum);

        echo json_encode($data); 
    }

    public function detail_kurikulum()
    {
        $id = $this->input->post('id_kurikulum');
        $data['tpm_prodi'] = $this->Tpm_model->get_tpm_prodi();
        $data['data_kurikulum'] = $this->Core_model->tambah_matakuliah($id);
        $this->load->view('content/tpm/prodi/tambah_matakuliah', $data, false);
        # code...
    }

    public function daftar_mk()
    {
        $id = $this->input->post('id_kurikulum');
        $data['tpm_prodi'] = $this->Tpm_model->get_tpm_prodi();
        $data['data_kurikulum'] = $this->Core_model->tambah_matakuliah($id);
        $data['matakuliah'] = $this->Core_model->get_detail_matakuliah();
        $this->load->view('content/tpm/prodi/daftar_mk', $data, false);
        # code...
    }

    public function edit_matkul()
    {
        $id = $this->input->post('id_mata_kuliah');
        $data['matkul'] = $this->Core_model->get_edit_matakuliah($id);
        $this->load->view('content/tpm/prodi/edit_mk', $data);
    }

    public function act_edit_matkul()
    {
        $id = $this->input->post('id_matkul');
        $kode_mk = $this->input->post('kode_mk');
        $nama_mk = $this->input->post('nama_mk');
        $sks_teori = $this->input->post('sks_teori');
        $sks_prak = $this->input->post('sks_prak');
        $bobot_teori = $this->input->post('bobot_teori');
        $bobot_prak = $this->input->post('bobot_prak');
        $total = $this->input->post('total');

        
        $edit_mk = array(
            'kode_mk' => $kode_mk,
            'nama_mk' => $nama_mk,
            'sks_teori' => $sks_teori,
            'sks_prak' => $sks_prak,
            'total_sks' => $total,
            'teori_bobot' => $bobot_teori,
            'prak_bobot' => $bobot_prak,
        );

        $data = $this->Core_model->act_edit_matkul($edit_mk, $id);
        echo json_encode($data); 
    }

    public function act_tambah_mk()
    {
        
        $prodi_id = $this->input->post('prodi_id');
        $kurikulum_id = $this->input->post('kurikulum_id');
        $kode_mk = $this->input->post('kode_mk');
        $nama_mk = $this->input->post('nama_mk');
        $sks_teori = $this->input->post('sks_teori');
        $sks_prak = $this->input->post('sks_prak');
        $bobot_teori = $this->input->post('bobot_teori');
        $bobot_prak = $this->input->post('bobot_prak');
        $total = $this->input->post('total');

        $tambah_mk = array(
            'program_studi_id' => $prodi_id,
            'kurikulum_id' => $kurikulum_id,
            'kode_mk' => $kode_mk,
            'nama_mk' => $nama_mk,
            'sks_teori' => $sks_teori,
            'sks_prak' => $sks_prak,
            'total_sks' => $total,
            'teori_bobot' => $bobot_teori,
            'prak_bobot' => $bobot_prak,

        );

        $data = $this->Core_model->insert('mata_kuliah', $tambah_mk);
        echo json_encode($data); 
    }
    
    public function act_hapus_matkul()
    {
        $id = $this->input->post('id_mata_kuliah');
        $data = $this->Core_model->hapus_matkul($id);
        echo json_encode($data);
        # code...
    }
    
    public function act_hapus_kurikulum()
    {
        $id = $this->input->post('id_kurikulum');
        $data = $this->Core_model->hapus_kurikulum($id);
        echo json_encode($data);
        # code...
    }

}