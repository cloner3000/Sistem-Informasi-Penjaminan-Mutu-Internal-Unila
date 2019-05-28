<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tpm_fakultas extends MY_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Tpm_model');
        $this->load->model('User_model');
        $this->load->model('Auth_model');
        $this->load->model('Jadwal_model');
        $this->load->model('Core_model');
        $this->load->model('Dosen_model');
        $this->load->model('Fakultas_model');
        $this->load->model('Prodi_model');
        $this->load->model('Borang_model');
        $this->load->model('Audit_ps_model');
        $this->load->helper('url');
        $this->load->library('session'); 
        $this->load->helper('tgl_indo');

        $this->check_login();
            if ($this->session->userdata('role_id') != "10") {
            redirect('', 'refresh');
        }

        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->time = date('Y-m-d H:i:s');
    }
    
    public function home() 
    {
        $role_id = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('id_user');
        // $tpmf = $this->Tpm_model->get_tpmf_id($user_id);
        
        $x['jadwal'] = $this->Jadwal_model->get_jadwal_matkul_tpm_set();
        $x['prodi']=$this->Core_model->get_prodi();
        $x['dosen'] = $this->Dosen_model->get_dosen();
        
        $x['tpmf'] = $this->Tpm_model->get_tpmf_id($user_id);
        
        $this->template->load('layouts/template', 'content/tpm/fakultas/home', $x);
    }
    
    public function detail_user()
    {
        // $id = $this->input->post('id_tpm_prodi');
        

        $id = $this->uri->segment(4);
        $data= $this->Tpm_model->update_tpmf($id);
        if($this->session->userdata('id_user') != $data['user_id']){
            redirect('404');
        }
        $data['detail_user'] = $this->Tpm_model->update_tpmf($id);
        $this->template->load('layouts/template', 'content/tpm/fakultas/detail_tpmf', $data);
    }
    
    public function update_tpmf()
    {
        $edit_data = array(
            'id_tpmf' =>  $this->input->post('id_tpmf'),
            'nama_tpmf' => $this->input->post('nama_tpmf'),
            'nip_tpmf' => $this->input->post('nip_tpmf'),

        );
        
        $user_id = $this->session->userdata('id_user');
        $tpmf = $this->Tpm_model->get_tpmf_id($user_id);
        $id = $this->input->post('id_tpmf');
        
        if ($tpmf['id_tpmf']== $id){
            $data = $this->Tpm_model->act_update_tpmf($edit_data, $id);
            $this->session->set_flashdata('success', ' ');
            redirect('tpm/tpm_fakultas/home');
        }else {
            $this->session->set_flashdata('error', ' ');
            redirect('tpm/tpm_fakultas/home');
        }
    }
    
    public function update_user()
    {
        $username = $this->session->userdata('username');
        $password = $this->input->post('password');
        
        $cek = $this->Auth_model->check_account($username, $password);
        
        if($cek === 3 ){
            $this->session->set_flashdata('tidak', ' ');
            redirect('tpm/tpm_fakultas/home');
        }else{
            $edit_user = array(
                'password' => get_hash($this->input->post('new_password')),
                'session' => base64_encode($this->input->post('new_password')),
            );
            
            $user_id = $this->session->userdata('id_user');
            $tpmf = $this->Tpm_model->get_tpmf_id($user_id);
            
            if ($user_id){
            $data = $this->Tpm_model->update_user($edit_user, $user_id);
            $this->session->set_flashdata('success', ' ');
            redirect('tpm/tpm_fakultas/home');
            } else {
                $this->session->set_flashdata('error', ' ');
                redirect('tpm/tpm_fakultas/home');
            }
        }
    }
    
    public function print_laporan()
    {
        $jadwal = $this->input->post('jadwal_id');
        $prodi = $this->input->post('prodi_id');;

        $prodi_id = $this->Core_model->get_prodi_id($prodi);

        $prodi2 = $prodi_id['program_studi'];

        $max = $this->Audit_ps_model->nilai_matkul_max($jadwal, $prodi);
        $min = $this->Audit_ps_model->nilai_matkul_min($jadwal, $prodi);
        $sum = $this->Audit_ps_model->nilai_matkul_sum($jadwal, $prodi);

        $nilai_max = $max->hasil_audit_matkul_auditor;
        $nilai_min = $min->hasil_audit_matkul_auditor;

        $nilai = $this->Audit_ps_model->get_progres($jadwal, $prodi);

        $total_skor = $sum->hasil_audit_matkul_auditor;

        $total = count($nilai);
        
        $rata_rata = 0;
        if($total_skor && $total != 0 ){
            $rata_rata = $total_skor / $total;
        }

        $x['nilai_max'] = $nilai_max;
        $x['nilai_min'] = $nilai_min;
        $x['rata_rata'] = $rata_rata;
        $x['total'] = $total;
        $x['jadwal'] = $this->Jadwal_model->get_jadwal_audit_matkul_id($jadwal);
        $x['tpm_prodi'] = $this->Core_model->get_prodi_id($prodi);
        $x['laporan'] = $this->Audit_ps_model->get_progres($jadwal, $prodi);
        $x['dosen_pengampu'] = $this->Audit_ps_model->get_dosen_pengampu_laporan();
        $x['nilai'] = $this->Audit_ps_model->laporan_hasil_audit_matkul();
        $x['laporan'] = $this->Audit_ps_model->get_progres($jadwal, $prodi);
        $x['dosen_pengampu'] = $this->Audit_ps_model->get_dosen_pengampu_laporan();
        $html = $this->load->view('content/audit/ps/cetak_laporan', $x, true);

        $this->load->library('pdf');
        $filename = 'Laporan-'.$prodi2.'-'.date("d-m-Y");
        $this->pdf->generate($html, $filename, true, 'A4', 'portrait');
    }
    
    public function result_rekap()
    {
        $jadwal = $this->input->post('jadwal_id');
        $dosen = $this->input->post('dosen_id');

        $dosen_pengampu = $this->Audit_ps_model->get_dosen_pengampu_rekap($dosen, $jadwal);
        
        $max = $this->Audit_ps_model->nilai_dosen_max($jadwal, $dosen);
        $min = $this->Audit_ps_model->nilai_dosen_min($jadwal, $dosen);
        $sum = $this->Audit_ps_model->nilai_dosen_min($jadwal, $dosen);

        $nilai_max = $max->hasil_audit_matkul_auditor;
        $nilai_min = $min->hasil_audit_matkul_auditor;
        $nilai_sum = $sum->hasil_audit_matkul_auditor;

        $total = count($dosen_pengampu);

        $x['total'] = $total;
        $x['nilai_max'] =$nilai_max;
        $x['nilai_min'] =$nilai_min;
        $x['nilai_sum'] =$nilai_sum;
        $x['rekap_matkul'] = $this->Audit_ps_model->rekap_search($jadwal, $dosen);
        $x['dosen_pengampu'] = $this->Audit_ps_model->get_dosen_pengampu_rekap($dosen, $jadwal);
        $x['audit_matkul'] = $this->Audit_ps_model->get_dosen_pengampu_rekap($dosen, $jadwal);
        $this->template->load('layouts/template', 'content/tpm/fakultas/cetak_rekapitulasi', $x);
    }
}