<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pimpinan extends MY_Controller {



    public function __construct()
    {
        parent::__construct();
        $this->check_login();

        $this->load->model('Jadwal_model');
        $this->load->model('Core_model');
        $this->load->model('Audit_ps_model');

        $this->check_login();
        if ($this->session->userdata('role_id') != "9") {
            redirect('', 'refresh');
        }

        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->time = date('Y-m-d H:i:s');
    }
  

    public function index()
    { 
        $x['jadwal'] = $this->Jadwal_model->get_jadwal_matkul_tpm_set();
        $x['prodi']=$this->Core_model->get_prodi();
        $this->template->load('layouts/template', 'content/pimpinan/laporan', $x);
    }

    public function print_laporan()
    {
        // $this->load->library('pdfgenerator');
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

}
