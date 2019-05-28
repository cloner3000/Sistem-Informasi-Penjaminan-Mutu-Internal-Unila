<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Audit_ps extends MY_Controller {

    var $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Tpm_model');
        $this->load->model('Dosen_model');
        $this->load->model('Jadwal_model');
        $this->load->model('Fakultas_model');
        $this->load->model('Prodi_model');
        $this->load->model('Borang_model');
        $this->load->model('Core_model');
        $this->load->model('Audit_ps_model');
        $this->load->helper('url');
        $this->load->library('session'); 
        $this->load->helper('tgl_indo');
        

        $this->check_login();
        if ($this->session->userdata('role_id') != "2") {
            redirect('', 'refresh');
        }
    
        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->time = date('Y-m-d H:i:s');
    }

    public function audit()
    {
        $id = $this->input->post('id_audit_mata_kuliah'); 
        $x['audit_matkul'] = $this->Audit_ps_model->get_audit($id);
        $x['aspek']        = $this->Borang_model->get_aspek();
        $x['borang']       = $this->Borang_model->get_borang();
        $x['jawaban']      = $this->Borang_model->get_jawaban();

        $x['praktikum']        = $this->Borang_model->get_aspek_praktikum();
        $x['borang_praktikum']       = $this->Borang_model->get_borang_praktikum();
        $x['jawaban_praktikum']      = $this->Borang_model->get_jawaban_praktikum();
        $this->load->view('content/audit/ps/instrument_matakuliah', $x);
        # code...
    }

    public function edit_audit()
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
        $this->load->view('content/audit/ps/edit_instrument_matakuliah', $x);
    }

    public function audit_matkul()
    {
        $x['semester']=$this->Core_model->get_semester();
        $x['tahun_akademik']=$this->Core_model->get_tahun_akademik();

        $id = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('id_user');
        $x['tpm_prodi'] = $this->Tpm_model->get_tpm_prodi_id($user_id);
        $x['jadwal'] = $this->Jadwal_model->get_jadwal_matkul($id);
        $x['jenis_audit']=$this->Core_model->get_jenis_audit();
        $x['matakuliah'] = $this->Core_model->get_detail_matakuliah();
        $x['dosen'] = $this->Dosen_model->get_dosen();
        $x['borang'] = $this->Borang_model->get_instrumen();
        $this->template->load('layouts/template', 'content/audit/ps/audit_matakuliah', $x);
    }

    public function act_audit_matkul()
    {
        $id = $this->session->userdata('role_id');   
        $jadwal = $this->Jadwal_model->get_jadwal_matkul($id);

        //post data in view
        $jadwal_id = $this->input->post('jadwal_id');
        $prodi_id = $this->input->post('prodi_id');
        $borang_id = $this->input->post('borang_id');
        $matkul_id = $this->input->post('matkul_id');

        $cek = $this->Audit_ps_model->cek_audit($jadwal_id, $matkul_id);

        //validasi jadwal
        $start_date = strtotime($jadwal->mulai_audit);
        $end_date = strtotime($jadwal->selesai_audit);
        $todays_date = strtotime(date("Y-m-d"));

        if ($todays_date >= $start_date && $todays_date  <= $end_date ) {
            if($cek > 0 ){
                $this->session->set_flashdata('tidak', ' ');
                redirect('audit_ps/audit_matkul');
            } else {
                $audit_matkul = array (
                'jadwal_id' => $jadwal_id,
                'prodi_id' => $prodi_id,
                'borang_id' => $borang_id,
                'matkul_id' => $matkul_id
                );

                $data = $this->Core_model->insert_multiple('audit_matakuliah', $audit_matkul);

                $validation = array(
                    array('field' => 'dosen_id[]', 'rules' => 'required'),
                    array($data)
                );
            
                $this->form_validation->set_rules($validation);
                if ($this->form_validation->run() == true) {
                    $dosen_id = $this->input->post('dosen_id[]');
            
                    $result = array();
                    foreach ($dosen_id as $key ) {
                        array_push($result, array(
                            'audit_matkul_id' => $data,
                            'dosen_id'      => $key
                        ));           
                    }
                    $this->db->insert_batch('dosen_pengampu', $result);
                }
                $this->session->set_flashdata('success', ' ');
                redirect('audit_ps/audit_matkul');
            }
            
        } else {
            if($todays_date < $start_date ) {
                $this->session->set_flashdata('belum', ' ');
                redirect('audit_ps/audit_matkul');
            } else{
                $this->session->set_flashdata('tutup', ' ');
                redirect('audit_ps/audit_matkul');
            }
        }
    }

    public function daftar_audit()
    {
        $id = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('id_user');
        $jadwal = $this->Jadwal_model->get_jadwal_matkul($id);

         //validasi jadwal
        $start_date = strtotime($jadwal->mulai_audit);
        $end_date = strtotime($jadwal->selesai_audit);
        $todays_date = strtotime(date("Y-m-d"));

        if ($todays_date >= $start_date && $todays_date  <= $end_date ) {
        $x['tpm_prodi'] = $this->Tpm_model->get_tpm_prodi_id($user_id);
        $x['jadwal'] = $this->Jadwal_model->get_jadwal_matkul($id);
        $this->template->load('layouts/template', 'content/audit/ps/daftar_audit_matkul.php', $x);
        } else {
            if($todays_date < $start_date ){
                $this->session->set_flashdata('belum', ' ');
                redirect('audit_ps/audit_matkul');
            } else {
                $this->session->set_flashdata('tutup', ' ');
                redirect('audit_ps/audit_matkul');
            }
        }
    }

    public function get_audit_matkul()
    {
        $id = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('id_user');
        $tpm = $this->Tpm_model->get_tpm_prodi();
        $jadwal = $this->Jadwal_model->get_jadwal_matkul($id);
        $daftar = $this->Audit_ps_model->get_audit_matkul();
        if ($this->session->userdata('role_id') == '2') {
            foreach ($tpm as $tpmp){
                if ($this->session->userdata('id_user') == $tpmp['user_id'] ) {
                    foreach ($daftar as $key => $value) {
                        if ($value['prodi_id'] == $tpmp['prodi_id'] ) {
                            if($value['jadwal_id'] == $jadwal->id_jadwal){
                                $tbody = array();
                                $tbody[] = $value['kode_mk'];
                                $matkul =  $value['nama_mk']." "."(".$value['sks_teori']."-".$value['sks_prak'].")"." Kurikulum ".$value['kurikulum'];
                                $tbody[] =$matkul;

                                $status = $value['status_tpm'];
                                if ($value['status_tpm'] == true){
                                    $status = "<span class='label label-primary'>Sudah Mengisi</span>";
                                }else{
                                    $status = "<span class='label label-danger'>Belum Mengisi</span>";
                                }
                                $tbody[] = $status;
                                //$aksi = $value['status_tpm'];

                                if ($value['status_tpm'] == false) {
                                    $aksi = "<button class='btn btn-success isi-borang' id='id_audit_mata_kuliah' data-toggle='modal' data-id_audit_mata_kuliah=".$value['id_audit_mata_kuliah'].">Isi Borang</button>".' '.
                                    "<button class='btn btn-warning detail-audit' id='id_audit_mata_kuliah' data-toggle='modal' data-id_audit_mata_kuliah=".$value['id_audit_mata_kuliah'].">Detail</button>";
                                } else{
                                    $aksi =  "<button class='btn btn-primary edit-audit' id='id_audit_mata_kuliah' data-toggle='modal' data-id_audit_mata_kuliah=".$value['id_audit_mata_kuliah'].">Edit</button>".' '.
                                    "<button class='btn btn-warning detail-audit' id='id_audit_mata_kuliah' data-toggle='modal' data-id_audit_mata_kuliah=".$value['id_audit_mata_kuliah'].">Detail</button>".' '.
                                    "<button class='btn btn-info lihat-skor' id='id_audit_mata_kuliah' data-toggle='modal' data-id_audit_mata_kuliah=".$value['id_audit_mata_kuliah'].">Lihat Skor</button>";
                                
                                    
                                }
                            
                                $tbody[] = $aksi;
                                $data[] = $tbody;
                                # code...
                            }
                        }   
                    }
                    if ($daftar){
                        echo json_encode(array('data'=> $data));
                    } else {
                        echo json_encode(array('data'=>0));
                    }
                }
            }
        }  
    }

    public function detail_audit()
    {
        $id = $this->input->post('id_audit_mata_kuliah'); 
        $x['dosen_pengampu'] = $this->Audit_ps_model->get_dosen_pengampu($id);
        $x['audit_matkul'] = $this->Audit_ps_model->get_audit($id);
        $this->load->view('content/audit/ps/detail_audit', $x);
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

        //post matakuliah praktikum
        $aspek_penilaian_p_id = $this->input->post('aspek_penilaian_p_id[]');
        $borang_praktikum_id = $this->input->post('borang_praktikum_id[]');
        $jawaban_praktikum = $this->input->post('jawaban_praktikum[]');
        $skor_praktikum = $this->input->post('skor_praktikum[]');

        //mulai rumus
        if ($sks_prak == 0){
            $total_teori = array_sum($skor_teori);

            $data_teori = array();
            $teori = 0;
            foreach ($borang_id as $borang) {
                array_push($data_teori, array(
                    'audit_mata_kuliah_id' => $audit[$teori],
                    'jenis_borang_id' => $jenis_borang_id[$teori],
                    'aspek_penilaian_id' => $aspek_penilaian_id[$teori],
                    'borang_id' => $borang,
                    'jawaban' => $jawaban_teori[$teori],
                    'sekor' => $skor_teori[$teori]
                ));
                $teori++;
            }
            $this->db->insert_batch('jawaban_audit_matkul_teori', $data_teori);

            $hasil_audit = array(
                'audit_mata_kuliah_id' => $id,
                'hasil_audit_matkul_tpm' => $total_teori
            );

            $this->db->insert('hasil_audit_matkul', $hasil_audit);
        } else {
            if($sks_prak > 0){
                $total_teori = array_sum($skor_teori);
                $total_praktikum = array_sum($skor_praktikum);

                $total_audit_matkul = ($total_teori * ($sks_teori / $total_sks)) + ($total_praktikum * ($sks_prak / $total_sks));

                $data_teori = array();
                $teori = 0;
                foreach ($borang_id as $borang) {
                    array_push($data_teori, array(
                        'audit_mata_kuliah_id' => $audit[$teori],
                        'jenis_borang_id' => $jenis_borang_id[$teori],
                        'aspek_penilaian_id' => $aspek_penilaian_id[$teori],
                        'borang_id' => $borang,
                        'jawaban' => $jawaban_teori[$teori],
                        'sekor' => $skor_teori[$teori]
                    ));
                    $teori++;
                }
                $this->db->insert_batch('jawaban_audit_matkul_teori', $data_teori);

                $data_prak = array();
                $prak = 0;
                foreach ($borang_praktikum_id as $borang) {
                    array_push($data_prak, array(
                        'audit_mata_kuliah_id' => $audit[$prak],
                        'jenis_borang_id' => $jenis_borang_id[$prak],
                        'aspek_penilaian_p_id' => $aspek_penilaian_p_id[$prak],
                        'borang_praktikum_id' => $borang,
                        'jawaban' => $jawaban_praktikum[$prak],
                        'sekor' => $skor_praktikum[$prak]
                    ));
                    $prak++;
                }
                $this->db->insert_batch('jawaban_audit_matkul_prak', $data_prak);

                $hasil_audit = array(
                    'audit_mata_kuliah_id' => $id,
                    'hasil_audit_matkul_tpm' => $total_audit_matkul
                );
    
                $this->db->insert('hasil_audit_matkul', $hasil_audit);
            }
        }

        $id = $this->input->post('id_audit_mata_kuliah');
        $audit_update = array(
            'status_tpm' => "1"
        );
        $this->Audit_ps_model->update_audit($audit_update, $id);
        $this->session->set_flashdata('success', ' ');
        redirect('audit_ps/daftar_audit');
    }

    public function save_edit_jawaban()
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

        //post matakuliah praktikum
        $aspek_penilaian_p_id = $this->input->post('aspek_penilaian_p_id[]');
        $borang_praktikum_id = $this->input->post('borang_praktikum_id[]');
        $jawaban_praktikum = $this->input->post('jawaban_praktikum[]');
        $skor_praktikum = $this->input->post('skor_praktikum[]');

        //mulai rumus
        if ($sks_prak == 0){

            #total skor teori
            $total_teori = array_sum($skor_teori);

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
                    'sekor' => $skor_teori[$teori]
                ));
                $teori++;
            }

            $this->db->insert_batch('jawaban_audit_matkul_teori', $data_teori);

            //untuk mengupdate data hasil
            $hasil_audit = array(
                'audit_mata_kuliah_id' => $id,
                'hasil_audit_matkul_tpm' => $total_teori
            );

            $this->db->update('hasil_audit_matkul', $hasil_audit, array('audit_mata_kuliah_id' => $id));
        } else {
            if($sks_prak > 0){
                //rumus jumlah seluruh skor masih masih aspek penilaian
                $total_teori = array_sum($skor_teori);
                $total_praktikum = array_sum($skor_praktikum);

                // menghapus jawaban lama
                $this->db->delete('jawaban_audit_matkul_teori', array('audit_mata_kuliah_id' => $id));
                $this->db->delete('jawaban_audit_matkul_prak', array('audit_mata_kuliah_id' => $id));

                //rumus untuk kalkulasi skoe matakuilah teori dan praktikum
                $total_audit_matkul = ($total_teori * ($sks_teori / $total_sks)) + ($total_praktikum * ($sks_prak / $total_sks));

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
                        'sekor' => $skor_teori[$teori]
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
                        'sekor' => $skor_praktikum[$prak]
                    ));
                    $prak++;
                }
                
                $this->db->insert_batch('jawaban_audit_matkul_prak', $data_prak);

                $hasil_audit = array(
                    'audit_mata_kuliah_id' => $id,
                    'hasil_audit_matkul_tpm' => $total_audit_matkul
                );

                $this->db->update('hasil_audit_matkul', $hasil_audit, array('audit_mata_kuliah_id' => $id));
            }
        }

        $this->session->set_flashdata('success', ' ');
        redirect('audit_ps/daftar_audit');
        # code...
    }

    public function lihat_skor()
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

    public function hasil_audit()
    {
        $id = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('id_user');
        $x['tpm_prodi'] = $this->Tpm_model->get_tpm_prodi_id($user_id);
        $x['jadwal'] = $this->Jadwal_model->get_jadwal_audit_matkul($id);
        $this->template->load('layouts/template', 'content/audit/ps/filter_hasil_audit', $x);
    }

    public function filter_hasil_audit()
    {
        $jadwal = $this->input->post('jadwal_id');
        $prodi = $this->input->post('prodi_id');

        $x['hasil'] = $this->Audit_ps_model->filter_audit_matkul($jadwal, $prodi);
        $this->load->view('content/audit/ps/hasil_audit', $x, false);
    }

    public function data_hasil_audit_matkul()
    {
        $jadwal = $this->input->post('jadwal_id');
        $prodi = $this->input->post('prodi_id');

        $hasil = $this->Audit_ps_model->filter_audit_matkul($jadwal, $prodi);
        foreach ($hasil as $key => $value) {
            $tbody = array();
            $tbody[] = $value['kode_mk'];
            $matkul =  $value['nama_mk']." "."(".$value['sks_teori']."-".$value['sks_prak'].")"." Kurikulum ".$value['kurikulum'];
            $tbody[] =$matkul;

            $tbody[] = $value['mulai_audit'];
            $tbody[] = $value['selesai_audit'];
            $tbody[] = $value['semester'];
            $tbody[] = $value['tahun_akademik'];
            //$aksi = $value['status_tpm'];

            $aksi = "<button class='btn btn-warning detail-audit' id='id_audit_mata_kuliah' data-toggle='modal' data-id_audit_mata_kuliah=".$value['id_audit_mata_kuliah'].">Detail</button>".'<p> </p>'.
            "<button class='btn btn-info lihat-skor' id='id_audit_mata_kuliah' data-toggle='modal' data-id_audit_mata_kuliah=".$value['id_audit_mata_kuliah'].">Lihat Skor</button>";
                            
            $tbody[] = $aksi;
            $data[] = $tbody;
        }
        if ($hasil){
            echo json_encode(array('data'=> $data));
        } else {
            echo json_encode(array('data'=>0));
        }
    }

    public function rekapitulasi()
    {
        $id = $this->session->userdata('role_id');

        $x['jadwal'] = $this->Jadwal_model->get_jadwal_audit_matkul($id);
        $x['dosen'] = $this->Dosen_model->get_dosen();
        $this->template->load('layouts/template', 'content/audit/ps/rekapitulasi_audit_matkul', $x);
        # code...
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

        $rata_rata = $nilai_sum / $total;

        // echo $total;

        $user_id = $this->session->userdata('id_user');
        $x['tpm_prodi'] = $this->Tpm_model->get_tpm_prodi_id($user_id);

        $x['total'] = $total;
        $x['nilai_max'] =$nilai_max;
        $x['nilai_min'] =$nilai_min;
        $x['nilai_sum'] =$nilai_sum;
        $x['rekap_matkul'] = $this->Audit_ps_model->rekap_search($jadwal, $dosen);
        $x['dosen_pengampu'] = $this->Audit_ps_model->get_dosen_pengampu_rekap($dosen, $jadwal);
        $x['audit_matkul'] = $this->Audit_ps_model->get_dosen_pengampu_rekap($dosen, $jadwal);
        $this->load->view('content/audit/ps/rekap_hasil_audit_matkul', $x);

    }

    public function result_rekap_print()
    {
        $jadwal = $this->input->post('jadwal_id');
        $dosen = $this->input->post('dosen_id');

        $dosen_pengampu = $this->Audit_ps_model->get_dosen_pengampu_rekap($dosen);
        $total = count($dosen_pengampu);

        $x['total'] = $total;
        $x['rekap_matkul'] = $this->Audit_ps_model->rekap_search($jadwal, $dosen);
        $x['dosen_pengampu'] = $this->Audit_ps_model->get_dosen_pengampu_rekap($dosen);
        $x['audit_matkul'] = $this->Audit_ps_model->get_dosen_pengampu_rekap($jadwal);
        $this->load->view('content/audit/ps/print_hasil_audit', $x);
        # code...
    }

    public function berita_acara()
    {
        $id = $this->session->userdata('role_id');
        $x['jadwal'] = $this->Jadwal_model->get_jadwal_audit_matkul($id);
        $this->template->load('layouts/template','content/audit/ps/berita_acara', $x);
    }

    public function cetak_berita_acara()
    {
        
        $jadwal = $this->input->post('jadwal_id');
            
        $user_id = $this->session->userdata('id_user');
        $tpm = $this->Tpm_model->get_tpm_prodi_id($user_id);
        $prodi = $tpm['prodi_id'];
        $fakultas = $tpm['fakultas_id'];

        $user_id = $this->session->userdata('id_user');
        $tpm = $this->Tpm_model->get_tpm_prodi_id($user_id);
        $prodi = $tpm['prodi_id'];
        $prodi2 = $tpm['program_studi'];
        
        $max = $this->Audit_ps_model->nilai_matkul_max($jadwal, $prodi);
        

        $nilai_max = $max->hasil_audit_matkul_auditor;
        $id_hasil  = $this->Audit_ps_model->id_hasil($jadwal, $prodi,$nilai_max);
        $audit = $id_hasil->audit_mata_kuliah_id;
        

        $x['tpm_prodi'] = $this->Tpm_model->get_tpm_prodi_id($user_id);
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

    }

    public function laporan()
    {
        $id = $this->session->userdata('role_id');
        $x['jadwal'] = $this->Jadwal_model->get_jadwal_audit_matkul($id);
        $this->template->load('layouts/template','content/audit/ps/laporan', $x);
    }

    public function print_laporan()
    {
        $jadwal = $this->input->post('jadwal_id');
        
        
        $user_id = $this->session->userdata('id_user');
        $tpm = $this->Tpm_model->get_tpm_prodi_id($user_id);
        $prodi = $tpm['prodi_id'];

        $user_id = $this->session->userdata('id_user');
        $tpm = $this->Tpm_model->get_tpm_prodi_id($user_id);
        $prodi2 = $tpm['program_studi'];

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
        $x['tpm_prodi'] = $this->Tpm_model->get_tpm_prodi_id($user_id);
        $x['laporan'] = $this->Audit_ps_model->get_progres($jadwal, $prodi);
        $x['dosen_pengampu'] = $this->Audit_ps_model->get_dosen_pengampu_laporan();
        $x['nilai'] = $this->Audit_ps_model->laporan_hasil_audit_matkul();
        $x['laporan'] = $this->Audit_ps_model->get_progres($jadwal, $prodi);
        $x['dosen_pengampu'] = $this->Audit_ps_model->get_dosen_pengampu_laporan();
        $html = $this->load->view('content/audit/ps/cetak_laporan', $x, true);

        
        $this->load->library('pdf');
        $filename = 'Laporan-'.$prodi2.'-'.date("d-m-Y");
        $this->pdf->generate($html, $filename, true, 'A4', 'portrait');
        # code...
    }

    
}