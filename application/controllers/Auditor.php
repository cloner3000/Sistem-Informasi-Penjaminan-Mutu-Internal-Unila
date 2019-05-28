<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auditor extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Auditor_model');
        $this->load->model('Borang_model');
        $this->load->model('Audit_ps_model');
        $this->load->model('Tpm_model');
        $this->load->model('Jadwal_model');
        $this->load->model('Auth_model');
        $this->load->model('Core_model');
        $this->load->model('Fakultas_model');
        $this->load->model('Prodi_model');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('tgl_indo');

        $this->check_login();
        if ($this->session->userdata('role_id') != "3") {
            redirect('', 'refresh');
        }

        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->time = date('Y-m-d H:i:s');
    }


    public function home()
    {
        $x['auditor'] = $this->Auditor_model->get_auditor();
        $this->template->load('layouts/template', 'content/auditor/home', $x);
        # code...
    }
    public function detail_user()
    {
        $id = $this->uri->segment(3);
        $data= $this->Auditor_model->update_auditor($id);
        if($this->session->userdata('id_user') != $data['user_id']){
            redirect('404');
        }
        $data['detail_user'] = $this->Auditor_model->update_auditor($id);
        $this->template->load('layouts/template', 'content/auditor/detail_auditor', $data);
    }

    public function update_auditor()
    {
        $edit_data = array(
            'id_auditor' =>  $this->input->post('id_auditor'),
            'nama_auditor' => $this->input->post('nama_auditor'),
            'nip_auditor ' => $this->input->post('nip_auditor'),

        );
        
        //print_r($edit_data);
        $id = $this->input->post('id_auditor');
        $data = $this->Auditor_model->act_update_auditor($edit_data, $id);
        $this->session->set_flashdata('berhasil', ' ');
        redirect('auditor/home');
        # code...
    }

    public function update_user()
    {
        $username = $this->input->post('username');
        $cek = $this->User_model->cek_user($username);
        if($cek > 0 ){
            $this->session->set_flashdata('tidak', ' ');
            redirect('auditor/home');
        }else{
            $edit_user = array(
                'username' => $username,
                'password' => get_hash($this->input->post('password')),
                'session' => base64_encode($this->input->post('password')),
            );
    
            $id = $this->input->post('id_user');
    
            $data = $this->Auditor_model->update_user($edit_user, $id);
            $this->session->set_flashdata('berhasil', ' ');
            redirect('auditor/home');
        }

    }

    // audit mata kuliah
    public function daftar_audit_matkul()
    {
        $jadwal = $this->input->post('jadwal');
        $prodi = $this->input->post('prodi');
        $jadwal_auditor = $this->input->post('jadwal_auditor');

        // $role = $this->session->userdata('role_id');

        $x['daftar_audit'] =  $this->Auditor_model->get_audit_matkul($jadwal, $prodi);
        $x['jadwal'] =  $this->Auditor_model->get_jadwal($jadwal_auditor);
        $x['jadwal_auditor'] = $jadwal_auditor;
        $x['jadwal_audit'] = $jadwal;
        $x['prodi'] = $prodi;
        $this->template->load('layouts/template', 'content/auditor/audit_matkul/daftar_audit_matkul', $x);
    }

    public function coba_input()
    {
        $this->load->view('coba');
    }

    public function coba()
    {
        $jadwal = $this->input->post('jadwal');;
        $prodi = $this->input->post('prodi');

        $data =  $this->Auditor_model-> get_audit_matkul($jadwal, $prodi);

        foreach ($data as $key => $value) {
            echo $value['nama_mk'].'<br>';
        }

        echo $jadwal;
        echo $prodi;
        // echo json_encode($data);
        # code...
    }

    public function data_audit_matkul()
    { 
        $jadwal = $this->input->post('jadwal');
        $jadwal_auditor = $this->input->post('jadwal_auditor');
        $prodi = $this->input->post('prodi');

        $daftar = $this->Auditor_model-> get_audit_matkul($jadwal, $prodi);
        
        foreach ($daftar as $key => $value) {
            $tbody = array();
            $tbody[] = $value['kode_mk'];
            $matkul =  $value['nama_mk']." "."(".$value['sks_teori']."-".$value['sks_prak'].")"." Kurikulum ".$value['kurikulum'];
            $tbody[] =$matkul;

            $status = $value['status_auditor'];
            if ($value['status_auditor'] == true){
                $status = "<span class='label label-primary'>Sudah Mengisi</span>";
            }else{
                $status = "<span class='label label-danger'>Belum Mengisi</span>";
            }

            $tbody[] = $status;

            if ($value['status_auditor'] == false) {
                $aksi = "<button class='btn btn-success isi-borang' id='id_audit_mata_kuliah' data-toggle='modal' data-id_audit_mata_kuliah=".$value['id_audit_mata_kuliah'].">Isi Borang</button>".' '.
                        "<button class='btn btn-warning detail-audit' id='id_audit_mata_kuliah' data-toggle='modal' data-id_audit_mata_kuliah=".$value['id_audit_mata_kuliah'].">Detail</button>";
            } else{
                $aksi = "<button class='btn btn-primary edit-audit' id='id_audit_mata_kuliah' data-toggle='modal' data-id_audit_mata_kuliah=".$value['id_audit_mata_kuliah'].">Edit</button>".' '.
                        "<button class='btn btn-warning detail-audit' id='id_audit_mata_kuliah' data-toggle='modal' data-id_audit_mata_kuliah=".$value['id_audit_mata_kuliah'].">Detail</button>".' '.
                        "<button class='btn btn-info lihat-skor' id='id_audit_mata_kuliah' data-toggle='modal' data-id_audit_mata_kuliah=".$value['id_audit_mata_kuliah'].">Lihat Skor</button>";                 
            }
                                    
            $tbody[] = $aksi;
            $data[] = $tbody;
        }
        if ($daftar){
            echo json_encode(array('data'=> $data));
        } else {
            echo json_encode(array('data'=>0));
        }
    }

    public function rekapitulasi_matkul()
    {
        $this->template->load('layouts/template', 'content/auditor/audit_matkul/rekapitulasi_matkul');
        # code...
    }

    public function laporan_matkul()
    {
        $this->template->load('layouts/template', 'content/auditor/audit_matkul/laporan_matkul');
        # code...
    }

    public function berita_acara_matkul()
    {
        $this->template->load('layouts/template', 'content/auditor/audit_matkul/berita_acara_matkul');
        # code...
    }
    
    public function audit_matkul()
    {
        $id = $this->input->post('id_audit_mata_kuliah');

        //borang matakuliah teori
        $x['audit_matkul'] = $this->Audit_ps_model->get_audit($id);
        $x['aspek']        = $this->Borang_model->get_aspek();
        $x['borang']       = $this->Borang_model->get_borang();
        $x['jawaban']      = $this->Borang_model->get_jawaban();

        //borang mata kuliah praktikum
        $x['praktikum']        = $this->Borang_model->get_aspek_praktikum();
        $x['borang_praktikum']       = $this->Borang_model->get_borang_praktikum();
        $x['jawaban_praktikum']      = $this->Borang_model->get_jawaban_praktikum();

        $x['hasil_jawaban'] = $this->Audit_ps_model->jawaban_tpm_teori($id);
        $x['hasil_jawaban_p'] = $this->Audit_ps_model->jawaban_tpm_praktikum($id);
        $this->load->view('content/auditor/audit_matkul/instrumen_audit_matkul', $x);
        # code...
    }

    public function save_jawaban()
    {
        //core of the core
        $id = $this->input->post('id_audit_mata_kuliah');
        $audit = $this->input->post('audit_mata_kuliah_id[]');
        $jenis_borang_id = $this->input->post('jenis_borang_id[]');
        $sks_teori = $this->input->post('sks_teori');
        $sks_prak = $this->input->post('sks_prak');
        $total_sks = $this->input->post('total_sks');

        //post matakuliah teori
        $aspek_penilaian_id = $this->input->post('aspek_penilaian_id[]');
        $borang_id = $this->input->post('borang_id[]');
        $jawaban_teori = $this->input->post('jawaban_teori[]');
        $skor_teori = $this->input->post('skor_teori[]');

        $jawaban_teori_auditor = $this->input->post('jawaban_teori_auditor[]');
        $skor_teori_auditor = $this->input->post('skor_teori_auditor[]');

        //post matakuliah praktikum
        $aspek_penilaian_p_id = $this->input->post('aspek_penilaian_p_id[]');
        $borang_praktikum_id = $this->input->post('borang_praktikum_id[]');
        $jawaban_praktikum = $this->input->post('jawaban_praktikum[]');
        $skor_praktikum = $this->input->post('skor_praktikum[]');

        $jawaban_praktikum_auditor = $this->input->post('jawaban_praktikum_auditor[]');
        $skor_praktikum_auditor = $this->input->post('skor_praktikum_auditor[]');

        //mulai rumus
        if ($sks_prak == 0){

            #total skor teori
            $total_teori = array_sum($skor_teori);
            $total_teori_auditor = array_sum($skor_teori_auditor);

            //menghapus jawaban lama
            $this->db->delete('jawaban_audit_matkul_teori', array('audit_mata_kuliah_id' => $id));

            //untuk menyimpan jawaban baru
            $data_teori = array();
            $teori = 0;
            foreach ($borang_id as $borang) {
                array_push($data_teori, array(
                    'audit_mata_kuliah_id' => $audit[$teori],
                    'jenis_borang_id' => $jenis_borang_id[$teori],
                    'aspek_penilaian_id' => $aspek_penilaian_id[$teori],
                    'borang_id' => $borang,
                    'jawaban' => $jawaban_teori[$teori],
                    'sekor' => $skor_teori[$teori],
                    'jawaban_auditor' => $jawaban_teori_auditor[$teori],
                    'sekor_auditor' => $skor_teori_auditor[$teori],
                ));
                $teori++;
            }

            $this->db->insert_batch('jawaban_audit_matkul_teori', $data_teori);

            //untuk mengupdate data hasil
            $hasil_audit = array(
                'audit_mata_kuliah_id' => $id,
                'hasil_audit_matkul_auditor' => $total_teori_auditor
            );

            $this->db->update('hasil_audit_matkul', $hasil_audit, array('audit_mata_kuliah_id' => $id));
        } else {
            if($sks_prak > 0){
                //rumus jumlah seluruh skor masih masih aspek penilaian
                $total_teori = array_sum($skor_teori);
                $total_praktikum = array_sum($skor_praktikum);

                $total_teori_auditor = array_sum($skor_teori_auditor);
                $total_praktikum_auditor= array_sum($skor_praktikum_auditor);

                // menghapus jawaban lama
                $this->db->delete('jawaban_audit_matkul_teori', array('audit_mata_kuliah_id' => $id));
                $this->db->delete('jawaban_audit_matkul_prak', array('audit_mata_kuliah_id' => $id));

                //rumus untuk kalkulasi skoe matakuilah teori dan praktikum
                $total_audit_matkul = ($total_teori_auditor * ($sks_teori / $total_sks)) + ($total_praktikum_auditor * ($sks_prak / $total_sks));

                //proses update jawaban mata kuliah teori
                $data_teori = array();
                $teori = 0;
                foreach ($borang_id as $borang) {
                    array_push($data_teori, array(
                        'audit_mata_kuliah_id' => $audit[$teori],
                        'jenis_borang_id' => $jenis_borang_id[$teori],
                        'aspek_penilaian_id' => $aspek_penilaian_id[$teori],
                        'borang_id' => $borang,
                        'jawaban' => $jawaban_teori[$teori],
                        'sekor' => $skor_teori[$teori],
                        'jawaban_auditor' => $jawaban_teori_auditor[$teori],
                        'sekor_auditor' => $skor_teori_auditor[$teori]
                    ));
                    $teori++;
                }
                $this->db->insert_batch('jawaban_audit_matkul_teori', $data_teori);

                // porses update jawaban mata kuliah praktikum
                $data_prak = array();
                $prak = 0;
                foreach ($borang_praktikum_id as $borang_p) {
                    array_push($data_prak, array(
                        'audit_mata_kuliah_id' => $audit[$prak],
                        'jenis_borang_id' => $jenis_borang_id[$prak],
                        'aspek_penilaian_p_id' => $aspek_penilaian_p_id[$prak],
                        'borang_praktikum_id' => $borang_p,
                        'jawaban' => $jawaban_praktikum[$prak],
                        'sekor' => $skor_praktikum[$prak],
                        'jawaban_auditor' => $jawaban_praktikum_auditor[$prak],
                        'sekor_auditor' => $skor_praktikum_auditor[$prak]
                    ));
                    $prak++;
                }
                
                $this->db->insert_batch('jawaban_audit_matkul_prak', $data_prak);

                $hasil_audit = array(
                    'audit_mata_kuliah_id' => $id,
                    'hasil_audit_matkul_auditor' => $total_audit_matkul
                );

                $this->db->update('hasil_audit_matkul', $hasil_audit, array('audit_mata_kuliah_id' => $id));
            }
        }
        $id = $this->input->post('id_audit_mata_kuliah');
        $audit_update = array(
            'status_auditor' => "1"
        );
        $this->Audit_ps_model->update_audit($audit_update, $id);
        $this->session->set_flashdata('success', ' ');
        redirect('auditor/daftar_jadwal_auditor');
        # code...
    }

    public function edit_audit_matkul()
    {
        $id = $this->input->post('id_audit_mata_kuliah');

        //borang matakuliah teori
        $x['audit_matkul'] = $this->Audit_ps_model->get_audit($id);
        $x['aspek']        = $this->Borang_model->get_aspek();
        $x['borang']       = $this->Borang_model->get_borang();
        $x['jawaban']      = $this->Borang_model->get_jawaban();

        //borang mata kuliah praktikum
        $x['praktikum']        = $this->Borang_model->get_aspek_praktikum();
        $x['borang_praktikum']       = $this->Borang_model->get_borang_praktikum();
        $x['jawaban_praktikum']      = $this->Borang_model->get_jawaban_praktikum();

        $x['hasil_jawaban'] = $this->Audit_ps_model->jawaban_tpm_teori($id);
        $x['hasil_jawaban_p'] = $this->Audit_ps_model->jawaban_tpm_praktikum($id);
        $this->load->view('content/auditor/audit_matkul/edit_instrumen_audit_matkul', $x);
        # code...
    }

    public function lihat_skor_matkul()
    {
        $id = $this->input->post('id_audit_mata_kuliah'); 

        //$x['hasil'] = $total;
        $x['audit_matkul'] = $this->Audit_ps_model->get_audit($id);
        $x['hasil'] = $this->Audit_ps_model->get_skor($id);
        
        //borang teori
        $x['aspek']        = $this->Borang_model->get_aspek();
        $x['borang']       = $this->Borang_model->get_borang();
        $x['jawaban']      = $this->Borang_model->get_jawaban();
        
        //borang praktikum
        $x['praktikum']        = $this->Borang_model->get_aspek_praktikum();
        $x['borang_praktikum']       = $this->Borang_model->get_borang_praktikum();
        $x['jawaban_praktikum']      = $this->Borang_model->get_jawaban_praktikum();

        $x['hasil_jawaban'] = $this->Audit_ps_model->jawaban_tpm_teori($id);
        $x['hasil_jawaban_p'] = $this->Audit_ps_model->jawaban_tpm_praktikum($id);
        $this->load->view('content/audit/ps/lihat_skor', $x);
    }

    public function detail_audit_matkul()
    {
        $id = $this->input->post('id_audit_mata_kuliah'); 
        $x['dosen_pengampu'] = $this->Audit_ps_model->get_dosen_pengampu($id);
        $x['audit_matkul'] = $this->Audit_ps_model->get_audit($id);
        $this->load->view('content/audit/ps/detail_audit', $x);
        # code...
    }
    
    public function daftar_jadwal_auditor()
    {
        $this->template->load('layouts/template', 'content/auditor/audit_matkul/daftar_jadwal_auditor');
    }
    
    public function data_daftar_jadwal_auditor()
    {
        $user =  $this->session->userdata('id_user');

        $daftar = $this->Auditor_model->get_audit_matkul_id($user);
        foreach ($daftar as $key => $value) {
            $tbody = array();
            
            $tbody[] = $value['program_studi'];
            $tbody[] =  $value['semester']." ".$value['tahun_akademik'];

            $aksi = "<form action='https://e-lp3m.unila.ac.id/auditor/daftar_audit_matkul' method='post'>
            <input class='form-control'  name='jadwal_auditor' value='".$value['jadwal_auditor_id']."' type='hidden'>
            <input class='form-control'  name='jadwal' value='".$value['jadwal_id']."' type='hidden'>
            <input class='form-control'  name='prodi' value='".$value['prodi_id']."' type='hidden'>
            <button class='btn btn-primary' type='submit'>Audit</button></form>";
                    
            $tbody[] = $aksi;
            $data[] = $tbody;
        }
        if ($daftar){
            echo json_encode(array('data'=> $data));
        } else {
            echo json_encode(array('data'=>0));
        }
    }
    
    public function cetak_laporan()
    {
        $jadwal = $this->input->post('jadwal');
        $prodi = $this->input->post('prodi');

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
    
    public function cetak_berita_acara()
    {
        $jadwal = $this->input->post('jadwal');
        $prodi = $this->input->post('prodi');

        $prodi_id = $this->Core_model->get_prodi_id($prodi);

        $prodi2 = $prodi_id['program_studi'];
        $fakultas = $prodi_id['fakultas_id'];
        
        $max = $this->Audit_ps_model->nilai_matkul_max($jadwal, $prodi);
        

        $nilai_max = $max->hasil_audit_matkul_auditor;
        $id_hasil  = $this->Audit_ps_model->id_hasil($jadwal, $prodi,$nilai_max);
        $audit = $id_hasil->audit_mata_kuliah_id;
        

        $x['tpm_prodi'] = $this->Core_model->get_tpm_prodi_prodi($prodi);
        $x['audit'] = $this->Audit_ps_model->berita_acara($jadwal);
        $x['nilai_max'] = $nilai_max;
        $x['id'] = $audit;
        $x['dosen'] = $this->Audit_ps_model->dosen_matkul_max($audit);
        $x['matkul'] = $this->Audit_ps_model->matkul_max($audit);
        $x['dekan']=$this->Fakultas_model->get_wadek($fakultas);
        $x['kaprodi']=$this->Prodi_model->get_kaprodi($prodi);
        $x['auditor'] = $this->Audit_ps_model->get_auditor($jadwal, $prodi);
        $html = $this->load->view('content/audit/ps/cetak_berita_acara', $x, true);

        
        $this->load->library('pdf');
        $filename = 'BA-'.$prodi2.'-'.date("d-m-Y");
        $this->pdf->generate($html, $filename, true, 'A4', 'portrait');
        # code...
    }


}