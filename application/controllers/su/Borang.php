<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Borang extends MY_Controller {
  
    public function __construct()
    {
      parent:: __construct();
      $this->load->database();
      $this->load->model('User_model');
      $this->load->model('Auth_model');
      $this->load->model('Borang_model');
      $this->load->model('Core_model');
      $this->load->helper('form');
      $this->load->helper('url');

      $this->check_login();
      if ($this->session->userdata('role_id') != "1") {
        redirect('', 'refresh');
      }

      $this->ip_address = $_SERVER['REMOTE_ADDR'];
      $this->time       = date('Y-m-d H:i:s');
      // code...
    }

    public function instrumen()
    {
        $x['jenis_borang'] = $this->Borang_model->get_borang_aktif();

        $this->template->load('layouts/template', 'content/borang/manajemen_borang', $x);
    }

    public function instrumen_praktikum()
    {
      $x['jenis_borang'] = $this->Borang_model->get_jenis_borang_praktikum();
      $this->template->load('layouts/template', 'content/borang/borang_praktikum', $x);
    }

    public function set_borang()
    {
      $x['jenis_audit'] = $this->Core_model->get_jenis_audit();
      $this->template->load('layouts/template', 'content/borang/tambah_borang', $x);
      # code...
    }

    public function set_borang_praktikum()
    {
      $x['jenis_borang'] = $this->Borang_model->get_borang_aktif();
      $this->template->load('layouts/template', 'content/borang/tambah_borang_praktikum', $x);
      # code...
    }

    public function set_pertanyaan()
    {
      
      $x['aspek']        = $this->Core_model->get_aspek();
      $x['jenis_borang'] = $this->Borang_model->get_jenis_borang();
      $this->template->load('layouts/template', 'content/borang/set_pertanyaan', $x);
      # code...
    }

    public function set_pertanyaan_praktikum()
    {
      $x['jenis_borang'] = $this->Borang_model->get_jenis_borang();
      $x['aspek']        = $this->Core_model->get_aspek();
      $x['jenis_borang'] = $this->Core_model->get_jenis_borang();
      $this->template->load('layouts/template', 'content/borang/set_pertanyaan_praktikum', $x);
      # code...
    }

    public function set_jenis_borang()
    {
      $jenis_borang   = $this->input->post('jenis_borang');
      $jenis_audit_id = $this->input->post('jenis_audit_id');
      $tahun          = $this->input->post('tahun');
      $judul_borang   = $this->input->post('judul_borang');
      $area_borang    = $this->input->post('area_borang');
      $kode           = $this->input->post('kode');
      $tanggal        = $this->input->post('tanggal');
      $no_revisi      = $this->input->post('no_revisi');
      $status         = $this->input->post('status');

      $jenis_borang = array(
          'jenis_borang'   => $jenis_borang,
          'jenis_audit_id' => $jenis_audit_id,
          'tahun'          => $tahun,
          'judul_borang' => $judul_borang,
          'area_borang' => $area_borang,
          'kode' => $kode,
          'tanggal' => $tanggal,
          'no_revisi' => $no_revisi,
          'status' => $status

      );
      $data = $this->Borang_model->insert($jenis_borang);

        if ($jenis_audit_id == "1"){
          $borang_praktikum = array(
            'jenis_borang_id' => $data,
          );
        $this->db->insert('jenis_borang_praktikum', $borang_praktikum);
        }
  
      redirect('su/borang/instrumen');
    }

    public function set_aspek()
    {
      $x['jenis_borang'] = $this->Borang_model->get_jenis_borang();
      $this->template->load('layouts/template', 'content/borang/set_aspek_penilaian', $x);
    }

    public function aspek_praktikum()
    {
      $x['jenis_borang'] = $this->Borang_model->get_jenis_borang_praktikum();
      $this->template->load('layouts/template', 'content/borang/aspek_penilaian_praktikum', $x);
    }

    public function act_set_aspek()
    {
        $jenis_borang_id = $this->input->post('jenis_borang_id');
        $aspek           = $this->input->post('aspek_penilaian');
        $max_bobot       = $this->input->post('max_bobot');

        $set_aspek = array(
            'jenis_borang_id' => $jenis_borang_id,
            'aspek_penilaian' => $aspek,
            'max_bobot'       => $max_bobot
        );

        $data = $this->Borang_model->insert_data('aspek_penilaian',$set_aspek);

        echo json_encode($data);
      # code...
    }

    public function act_set_aspek_praktikum()
    {
        $jenis_borang_praktikum_id = $this->input->post('jenis_borang_praktikum_id');
        $aspek           = $this->input->post('aspek_penilaian');
        $max_bobot       = $this->input->post('max_bobot');

        $id = $this->input->post('id_jenis_borang_praktikum');

        $set_aspek = array(
            'jenis_borang_praktikum_id' => $jenis_borang_praktikum_id,
            'aspek_penilaian' => $aspek,
            'max_bobot'       => $max_bobot
        );

        $data = $this->Borang_model->insert_data('aspek_penilaian_praktikum', $set_aspek);

        echo json_encode($data);
      # code...
    }

    public function get_aspek()
    {
      $aspek = $this->Borang_model->get_aspek();
      $no    = 1;

      foreach ($aspek as $key => $value) {
        $tbody               = array();
        $tbody[]             = $no++;
        $tbody[]             = $value['aspek_penilaian'];
        $jenis_borang        = "<p>".$value['jenis_borang']." ".$value['tahun']."</p>";
        $tbody[]             = $jenis_borang;
        $tbody[]             = $value['max_bobot'];

        $aksi = "<button class='btn btn-primary ubah-aspek' id='id_aspek_penilaian' data-toggle='modal' data-id_aspek_penilaian=".$value['id_aspek_penilaian']."><i class='fa fa-pencil'></i></button>".' '.
        "<button class='btn btn-danger hapus-aspek' id='id_aspek_penilaian' data-toggle='modal' data-id_aspek_penilaian=".$value['id_aspek_penilaian']."><i class='fa fa-trash'></i></button>";
        
        $tbody[] = $aksi;
        $data [] = $tbody;
      }

      if ($aspek){
        echo json_encode(array('data'=> $data));
      } else {
        echo json_encode(array('data'=>0));
      }
    }

    public function get_aspek_praktikum()
    {
      $aspek = $this->Borang_model->get_aspek_praktikum();
      $no    = 1;

      foreach ($aspek as $key => $value) {
        $tbody               = array();
        $tbody[]             = $no++;
        $tbody[]             = $value['aspek_penilaian'];
        $jenis_borang        = "<p>".$value['jenis_borang']." ".$value['tahun']."</p>";
        $tbody[]             = $jenis_borang;
        $tbody[]             = $value['max_bobot'];

        $aksi = "<button class='btn btn-primary ubah-aspek' id='id_aspek_penilaian_p' data-toggle='modal' data-id_aspek_penilaian_p=".$value['id_aspek_penilaian_p']."><i class='fa fa-pencil'></i></button>".' '.
        "<button class='btn btn-danger hapus-aspek' id='id_aspek_penilaian_p' data-toggle='modal' data-id_aspek_penilaian_p=".$value['id_aspek_penilaian_p']."><i class='fa fa-trash'></i></button>";
        
        $tbody[] = $aksi;
        $data [] = $tbody;
      }

      if ($aspek){
        echo json_encode(array('data'=> $data));
      } else {
        echo json_encode(array('data'=>0));
      }
      # code...
    }

    public function get_aspek_id()
    {
        $id   = $this->input->post('id');
        $data = $this->Borang_model->get_aspek_id($id);
        echo json_encode($data);
      # code...
    }

    public function get_aspek_praktikum_id()
    {
        $id   = $this->input->post('id');
        $data = $this->Borang_model->get_aspek_praktikum_id($id);
        echo json_encode($data);
      # code...
    }

    public function edit_aspek()
    {
      $x['jenis_borang'] = $this->Borang_model->get_jenis_borang();
      $id                = $this->input->post('id_aspek_penilaian');
      $x['edit_aspek']   = $this->Borang_model->edit_aspek($id);

      $this->load->view('modals/edit_aspek', $x);
      # code...
    } 

    public function edit_aspek_praktikum()
    {
      $id                = $this->input->post('id_aspek_penilaian_p');
      $x['edit_aspek']   = $this->Borang_model->edit_aspek_praktikum($id);

      $this->load->view('modals/edit_aspek_praktikum', $x);
      # code...
    }
    
    public function act_edit_aspek()
    {
      $edit_jenis_borang_id = $this->input->post('edit_jenis_borang_id');
      $edit_aspek_penilaian = $this->input->post('edit_aspek_penilaian');
      $edit_max_bobot       = $this->input->post('edit_max_bobot');


      $edit_aspek = array(
        'jenis_borang_id' => $edit_jenis_borang_id,
        'aspek_penilaian' => $edit_aspek_penilaian,
        'max_bobot'       => $edit_max_bobot
      );

      $id = $this->input->post('idaspek');
      $data = $this->Borang_model->act_edit_aspek($edit_aspek, $id);

      echo json_encode($data);
    }

    public function act_edit_aspek_praktikum()
    {
      $edit_aspek_penilaian = $this->input->post('edit_aspek_penilaian_praktikum');
      $edit_max_bobot       = $this->input->post('edit_max_bobot_praktikum');


      $edit_aspek = array(
        'aspek_penilaian' => $edit_aspek_penilaian,
        'max_bobot'       => $edit_max_bobot
      );

      $id = $this->input->post('id_aspek_praktikum');
      $data = $this->Borang_model->act_edit_aspek_praktikum($edit_aspek, $id);

      echo json_encode($data);
    }

    public function act_hapus_aspek()
    {
      $id   = $this->input->post('id_aspek_penilaian');
      $data = $this->Borang_model->act_hapus_aspek($id);
      echo json_encode($data);
    }

    public function act_hapus_aspek_praktikum()
    {
      $id   = $this->input->post('id_aspek_penilaian_p');
      $data = $this->Borang_model->act_hapus_aspek_praktikum($id);
      echo json_encode($data);
    }


    public function data_borang()
    {
      $borang  = $this->Borang_model->get_borang();
      $jawaban = $this->Borang_model->get_jawaban();
      $no      = 1;
      

      foreach ($borang as $key => $value) {
        $tbody = array();
        $tbody[]      = $no++;

        $tbody[] = $value['pertanyaan'];
        
        $tbody[] = $value['bobot'];
        
        $aksi = "<button class='btn btn-primary ubah-borang' id='id_borang' data-toggle='modal' data-id_borang=".$value['id_borang']."><i class='fa fa-pencil'></i></button>".' '.
        "<button class='btn btn-warning detail-borang' id='id_borang' data-toggle='modal' data-id_borang=".$value['id_borang']."><i class='fa fa-eye'></i></button>".' '.
        "<button class='btn btn-danger hapus-borang' id='id_borang' data-toggle='modal' data-id_borang=".$value['id_borang']."><i class='fa fa-trash'></i></button>";
        
        $tbody[] = $aksi;
        $data [] = $tbody;
      }
      if ($borang){
        echo json_encode(array('data'=> $data));
      } else {
        echo json_encode(array('data'=>0));
      }
    }

    public function data_borang_praktikum()
    {
      $borang  = $this->Borang_model->get_borang_praktikum();
      $no      = 1;
      
      foreach ($borang as $key => $value) {
        $tbody = array();
        $tbody[]      = $no++;

        $tbody[] = $value['pertanyaan'];
        
        $tbody[] = $value['bobot'];
        
        $aksi = "<button class='btn btn-primary ubah-borang' id='id_borang_praktikum' data-toggle='modal' data-id_borang_praktikum=".$value['id_borang_praktikum']."><i class='fa fa-pencil'></i></button>".' '.
        "<button class='btn btn-warning detail-borang' id='id_borang_praktikum' data-toggle='modal' data-id_borang_praktikum=".$value['id_borang_praktikum']."><i class='fa fa-eye'></i></button>".' '.
        "<button class='btn btn-danger hapus-borang' id='id_borang_praktikum' data-toggle='modal' data-id_borang_praktikum=".$value['id_borang_praktikum']."><i class='fa fa-trash'></i></button>";
        
        $tbody[] = $aksi;
        $data [] = $tbody;
      }
      if ($borang){
        echo json_encode(array('data'=> $data));
      } else {
        echo json_encode(array('data'=>0));
      }
    }

    public function tambah_borang()
    {
      $jenis_borang_id    = $this->input->post('jenis_borang_id');
      $aspek_penilaian_id = $this->input->post('aspek_penilaian_id');
      $bobot              = $this->input->post('bobot');
      $pertanyaan         = $this->input->post('pertanyaan');

      $tambah_borang = array(
        'jenis_borang_id'    => $jenis_borang_id,
        'aspek_penilaian_id' => $aspek_penilaian_id,
        'bobot'              => $bobot,
        'pertanyaan'         => $pertanyaan,
      );

      $data = $this->Borang_model->tambah_borang('borang', $tambah_borang);

      $validation = array(
        array('field' => 'opsi[]', 'rules' => 'required'),
        array($data)
      );

      $this->form_validation->set_rules($validation);
      if ($this->form_validation->run() == true) {
        $opsi_opsi = $this->input->post('opsi[]');

        $result = array();
        foreach ($opsi_opsi as $key ) {
            array_push($result, array(
                'borang_id' => $data,
                'opsi'      => $key
            ));           
        }
        $this->db->insert_batch('multiple_choice', $result);
      }
      echo json_encode($data); 
    }

    public function tambah_borang_praktikum()
    {
      $jenis_borang_praktikum_id    = $this->input->post('jenis_borang_praktikum_id');
      $aspek_penilaian_praktikum_id = $this->input->post('aspek_penilaian_praktikum_id');
      $bobot              = $this->input->post('bobot');
      $pertanyaan         = $this->input->post('pertanyaan');

      $tambah_borang = array(
        'jenis_borang_praktikum_id'    => $jenis_borang_praktikum_id,
        'aspek_penilaian_praktikum_id' => $aspek_penilaian_praktikum_id,
        'bobot'              => $bobot,
        'pertanyaan'         => $pertanyaan,
      );

      $data = $this->Borang_model->tambah_borang('borang_praktikum', $tambah_borang);

      $validation = array(
        array('field' => 'opsi[]', 'rules' => 'required'),
        array($data)
      );

      $this->form_validation->set_rules($validation);
      if ($this->form_validation->run() == true) {
        $opsi_opsi = $this->input->post('opsi[]');

        $result = array();
        foreach ($opsi_opsi as $key ) {
            array_push($result, array(
                'borang_praktikum_id' => $data,
                'opsi'      => $key
            ));           
        }
        $this->db->insert_batch('multiple_choice_praktikum', $result);
      }
      echo json_encode($data); 
    }

    public function act_hapus_pertanyaan()
    {
      $id   = $this->input->post('id_borang');
      $data = $this->Borang_model->act_hapus_pertanyaan($id);

      if($data == true){
        $this->db->delete('multiple_choice', array('borang_id' => $id));
      }
      echo json_encode($data);
      # code...
    }

    public function act_hapus_pertanyaan_praktikum()
    {
      $id   = $this->input->post('id_borang_praktikum');
      $data = $this->Borang_model->act_hapus_pertanyaan_praktikum($id);

      if($data == true){
        $this->db->delete('multiple_choice_praktikum', array('borang_praktikum_id' => $id));
      }
      echo json_encode($data);
      # code...
    }

    public function act_edit_pertanyaan()
    {
      $id = $this->input->post('id_borang');

      $bobot = $this->input->post('edit_bobot');
      $pertanyaan = $this->input->post('edit_pertanyaan');
      
      $edit_borang = array(
        'bobot' => $bobot,
        'pertanyaan' => $pertanyaan
      );

      $data = $this->Borang_model->act_edit_pertanyaan($edit_borang, $id);

      echo json_encode($data);
      # code...
    }

    public function act_edit_pertanyaan_praktikum()
    {
      $id = $this->input->post('idborangpraktikum');

      $bobot = $this->input->post('edit_bobot_praktikum');
      $pertanyaan = $this->input->post('edit_pertanyaan_praktikum');
      
      $edit_borang_praktikum = array(
        'bobot' => $bobot,
        'pertanyaan' => $pertanyaan
      );

      $data = $this->Borang_model->act_edit_pertanyaan_praktikum($edit_borang_praktikum , $id);

      echo json_encode($data);
      # code...
    }

    public function act_edit_opsi()
    {
      $id = $this->input->post('id_opsi');
      $opsi = $this->input->post('opsi');
      
      $edit_opsi = array(
        'opsi' => $opsi
      );
      $data = $this->Borang_model->act_edit_opsi($edit_opsi, $id);
      redirect('su/borang/set_pertanyaan');
    }

    public function act_edit_opsi_praktikum()
    {
      $id = $this->input->post('id_opsi_praktikum');
      $opsi = $this->input->post('opsi');
      
      $edit_opsi = array(
        'opsi' => $opsi
      );
      $data = $this->Borang_model->act_edit_opsi_praktikum($edit_opsi, $id);
      redirect('su/borang/set_pertanyaan_praktikum');
    }



    public function detail_borang()
    {
      $id = $this->input->post('id_borang');
      
      $data['jawaban'] = $this->Borang_model->get_jawaban();
      $data['borang']  = $this->Borang_model->detail_borang($id);

      $this->load->view('modals/detail_borang_matkul', $data);
    }

    public function detail_borang_praktikum()
    {
      $id = $this->input->post('id_borang_praktikum');
      
      $data['jawaban_praktikum'] = $this->Borang_model->get_jawaban_praktikum();
      $data['borang_praktikum']  = $this->Borang_model->detail_borang_praktikum($id);

      $this->load->view('modals/detail_borang_praktikum', $data);
    }

    public function update_borang()
    {
      $id = $this->input->post('id_borang');
      $data['borang']  = $this->Borang_model->detail_borang($id);

      $this->load->view('modals/edit_borang', $data);
      # code...
    }

    public function update_borang_praktikum()
    {
      $id = $this->input->post('id_borang_praktikum');
      $data['borang']  = $this->Borang_model->detail_borang_praktikum($id);

      $this->load->view('modals/edit_borang_praktikum', $data);
      # code...
    }

    public function lihat_borang()
    {
      $id                = $this->uri->segment(4);
      // $x['borang']       = $this->Borang_model->lihat_borang($id);
      $x['aspek']        = $this->Borang_model->get_aspek();
      $x['jenis_borang'] = $this->Borang_model->update_jenis_borang($id);
      $x['borang']       = $this->Borang_model->get_borang();
      $x['jawaban']      = $this->Borang_model->get_jawaban();

      $x['praktikum']        = $this->Borang_model->get_aspek_praktikum();
      $x['borang_praktikum']       = $this->Borang_model->get_borang_praktikum();
      $x['jawaban_praktikum']      = $this->Borang_model->get_jawaban_praktikum();

      //$x['borang_praktikum']       = $this->Borang_model->borang_praktikum($id);

      $this->template->load('layouts/template', 'content/borang/lihat_borang', $x);

      # code...
    }

    public function borang_lab()
    {
      $id                = $this->uri->segment(4);
      $x['borang']       = $this->Borang_model->lihat_borang($id);
      $x['aspek']        = $this->Borang_model->get_aspek();
      $x['jenis_borang'] = $this->uri->segment(4);
      $x['borang']       = $this->Borang_model->get_borang();
      $x['jawaban']      = $this->Borang_model->get_jawaban();

      $this->template->load('layouts/template', 'content/borang/borang_lab', $x);
    }

    public function edit_jenis_borang()
    {
      $id = $this->uri->segment(4);
      $x['jenis_borang'] = $this->Borang_model->update_jenis_borang($id);
      $x['jenis_audit']  = $this->Core_model->get_jenis_audit();
      $this->template->load('layouts/template', 'content/borang/edit_jenis_borang', $x);
    }

    public function act_edit_jenis_borang()
    { 
      $jenis_borang   = $this->input->post('jenis_borang');
      $jenis_audit_id = $this->input->post('jenis_audit_id');
      $tahun          = $this->input->post('tahun');
      $judul_borang   = $this->input->post('judul_borang');
      $area_borang    = $this->input->post('area_borang');
      $kode           = $this->input->post('kode');
      $tanggal        = $this->input->post('tanggal');
      $no_revisi      = $this->input->post('no_revisi');
      $status         = $this->input->post('status');

      $edit_borang = array(
          'jenis_borang'   => $jenis_borang,
          'jenis_audit_id' => $jenis_audit_id,
          'tahun'          => $tahun,
          'judul_borang'   => $judul_borang,
          'area_borang'   => $area_borang,
          'kode' => $kode,
          'tanggal' => $tanggal,
          'no_revisi' => $no_revisi,
          'status' => $status
      );

      $id             = $this->input->post('id_jenis_borang');
      $data = $this->Borang_model->act_edit_jenis_borang($edit_borang, $id);
      redirect('su/borang/instrumen');
    }
}