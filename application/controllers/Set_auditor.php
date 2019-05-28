<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Set_auditor extends MY_Controller {



    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Core_model');
        $this->load->model('Jadwal_model');
        $this->load->model('Tpm_model');
        $this->load->model('Auditor_model');

        $this->check_login();
        if ($this->session->userdata('role_id') != '4' ) {
            redirect('', 'refresh');
        }

        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->time = date('Y-m-d H:i:s');
    }


    public function auditor_ps()
    {
        $x['auditor'] = $this->Tpm_model->get_auditor();
        $x['jadwal']=$this->Jadwal_model->get_jadwal_matkul_tpm_set();
        $x['jadwal_auditor']=$this->Jadwal_model->get_jadwal_matkul_auditor_set();
        $x['prodi']=$this->Core_model->get_prodi();
        $this->template->load('layouts/template', 'content/operator/auditor_ps', $x);
    }

    public function data_auditor_ps()
    {
        $auditor = $this->Auditor_model->get_auditor_ps();

        foreach ($auditor as $key => $value) {
            $tbody = array();

            $tbody[] = $value['nama_auditor'];
            $jadwal = $value['jenis_audit'].' '.$value['semester'].' '.$value['tahun_akademik'];
            $tbody[] = $jadwal;
            $tbody[] = $value['program_studi'];

            $aksi = "<button class='btn btn-danger hapus-auditor' id='id_id_auditor_ps' data-toggle='modal' data-id_auditor_ps=".$value['id_auditor_ps']."><i class='fa fa-trash'></i> Hapus</button>";
            
            $tbody[] = $aksi;
            $data[] = $tbody;
            # code...
        }
        if ($auditor){
            echo json_encode(array('data'=> $data));
        } else {
            echo json_encode(array('data'=>0));
        }
    }

    public function tambah_auditor_ps()
    {
        $jadwal_id = $this->input->post('jadwal_id');
        $prodi_id = $this->input->post('prodi_id');
        $auditor_id = $this->input->post('auditor_id');
        $jadwal_auditor_id = $this->input->post('jadwal_auditor_id');


        $auditor_ps = array();
        foreach ($auditor_id as $key) {
            array_push($auditor_ps, array(
                'auditor_id' => $key,
                'jadwal_id' => $jadwal_id,
                'prodi_id' => $prodi_id,
                'jadwal_auditor_id' => $jadwal_auditor_id
            ));
        }
        $data = $this->db->insert_batch('auditor_ps', $auditor_ps);
        $this->session->set_flashdata('success', ' ');
        redirect('set_auditor/auditor_ps');
    }

    public function delete_auditor_ps()
    {
        $id = $this->input->post('id_auditor');
        $data = $this->Jadwal_model->hapus_auditor($id);
        echo json_encode($data);
        
        # code...
    }

}
