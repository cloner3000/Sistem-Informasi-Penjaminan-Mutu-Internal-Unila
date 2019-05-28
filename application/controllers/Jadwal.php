<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends MY_Controller {



  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->database();
    $this->load->model('Core_model');
    $this->load->model('Jadwal_model');

    $this->check_login();
    if ($this->session->userdata('role_id') != '4' ) {
        redirect('', 'refresh');
    }

    $this->ip_address = $_SERVER['REMOTE_ADDR'];
    $this->time = date('Y-m-d H:i:s');
  }

  public function jadwal_audit()
  {
    $x['semester']=$this->Core_model->get_semester();
    $x['tahun_akademik']=$this->Core_model->get_tahun_akademik();
    $x['jenis_audit']=$this->Core_model->get_jenis_audit();

    $x['role'] = $this->Core_model->audit_role();
    $x['jadwal']=$this->Jadwal_model->get_jadwal();
    $this->template->load('layouts/template', 'content/jadwal', $x);
  }


  public function cek_status($todays_date,$start_date,$end_date)
  {
    $start_date = strtotime($start_date); 
    $end_date = strtotime($end_date);
    $todays_date = strtotime($todays_date); 
    if ($todays_date >= $start_date && $todays_date <= $end_date) 
    { 
      return 0;//BUKA
    } 
    else 
    { 
      if($todays_date < $start_date)
      {
        return 1; //BELUM
      }
      else
      {
        return 2; //LEWAT
      }
    }
      # code...
  }

  public function data_jadwal()
    {
      $jadwal = $this->Jadwal_model->get_jadwal_audit();
      foreach ($jadwal as $key => $value) {
        $tbody = array();

        $mulai_audit = $value['mulai_audit'];
        $selesai_audit = $value['selesai_audit'];

        $start_date = date("d F Y", strtotime($mulai_audit)); 
        $end_date = date("d F Y", strtotime($selesai_audit));

        $tbody[] = $start_date;
        $tbody[] = $end_date;
        $tbody[] = $value['role'];
        $tbody[] = $value['jenis_audit'];

        $DATE_NOW = date("Y-m-d");
        $START_DATE = $mulai_audit;
        $END_DATE = $selesai_audit;

        $CekStatus = $this->cek_status($DATE_NOW,$START_DATE,$END_DATE);
        if($CekStatus == 1) //1 BELUM BUKA
        {
            $CekStatus = "<span class='label label-danger'>Belum Mulai</span>";
            //Tuliskan pesan jika belum dibuka
        } 
        elseif($CekStatus == 2) //2 SUDAH TUTUP
        {
            $CekStatus = "<span class='label label-primary'>Sudah Selesai</span>";
            //Tuliskan pesan jika sudah ditutup
        } 
        elseif($CekStatus==0) //0 SEDANG BUKA
        {
            $CekStatus = "<span class='label label-warning'>Sedang Berlangsung</span>";
            //Munculkan form jika sedang dibuka
        }

        $tbody[] = $CekStatus;
        $tbody[] = $value['semester'];
    
        $aksi = "<button class='btn btn-primary ubah-jadwal' id='id_jadwal' data-toggle='modal' data-id_jadwal=".$value['id_jadwal']."><i class='fa fa-pencil'></i></button>".' '.
        "<button class='btn btn-danger hapus-jadwal' id='id_jadwal' data-toggle='modal' data-id_jadwal=".$value['id_jadwal']."><i class='fa fa-trash'></i></button>";
        
        $tbody[] = $aksi;
        $data[] = $tbody;
      }
      if ($jadwal){
        echo json_encode(array('data'=> $data));
      } else {
        echo json_encode(array('data'=>0));
      }
    }

  public function tambah_jadwal()
    {
      $mulai_audit = $this->input->post('mulai_audit');
      $selesai_audit = $this->input->post('selesai_audit');
      $role_id = $this->input->post('role_id');
      $semester_id = $this->input->post('semester_id');
      $tahun_akademik_id = $this->input->post('tahun_akademik_id');
      $jenis_audit_id = $this->input->post('jenis_audit_id');

      $tambah_jadwal = array(
        'mulai_audit' => $mulai_audit,
        'selesai_audit' => $selesai_audit,
        'role_id' => $role_id,
        'semester_id' => $semester_id,
        'tahun_akademik_id' => $tahun_akademik_id,
        'jenis_audit_id ' => $jenis_audit_id ,
      );

      $data = $this->Jadwal_model->tambah_jadwal('jadwal_audit', $tambah_jadwal);

      echo json_encode($data); 
    }

    public function edit_jadwal()
    {
      // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
      $id = $this->input->post('id_jadwal');

      $data['semester']=$this->Core_model->get_semester();
      $data['tahun_akademik']=$this->Core_model->get_tahun_akademik();
      $data['jenis_audit']=$this->Core_model->get_jenis_audit();

      $data['data_jadwal'] = $this->Jadwal_model->update($id);
      $this->load->view('modals/edit_jadwal', $data);
    }

    public function update_jadwal()
    {

      $edit_jadwal = array(
        'mulai_audit' => $this->input->post('edit_mulai_audit'),
        'selesai_audit' => $this->input->post('edit_selesai_audit'),
        'semester_id' => $this->input->post('edit_semester_id'),
        'tahun_akademik_id' => $this->input->post('edit_tahun_akademik_id'),
        'jenis_audit_id ' => $this->input->post('edit_jenis_audit_id'),
      );
      
      $id = $this->input->post('id_jadwal');
      $data = $this->Jadwal_model->update_jadwal($edit_jadwal,$id);

      echo json_encode($data);
    }

    public function delete_jadwal()
    {
      $id = $this->input->post('id_jadwal');
      $data = $this->Jadwal_model->hapus_jadwal($id);
      echo json_encode($data);
      # code...
    }

    public function auditor_ps()
    {
      $this->template->load('layouts/template', 'content/operator/auditor_ps');
      # code...
    }

}
