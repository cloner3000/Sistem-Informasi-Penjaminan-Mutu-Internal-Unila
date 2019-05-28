<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba extends MY_Controller {

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
 
      $this->ip_address = $_SERVER['REMOTE_ADDR'];
      $this->time       = date('Y-m-d H:i:s');
      // code...
    }


    public function index()
    {
        $a = 40.00;
        $b = 37.50;

        $hasil = $a + $b;
        echo $hasil;
        # code...
    }

    public function form()
    {
        $id                = $this->uri->segment(4);
      $x['borang']       = $this->Borang_model->lihat_borang($id);
      $x['aspek']        = $this->Borang_model->get_aspek();
      $x['jenis_borang'] = $this->uri->segment(4);
      $x['borang']       = $this->Borang_model->get_borang();
      $x['jawaban']      = $this->Borang_model->get_jawaban();
        $this->load->view('content/borang/coba', $x);
        # code...
    }

    public function result()
    {
            $opsi_opsi = $this->input->post('skor');
            $jenis_borang = $this->input->post('jenis_borang');
            $id_borang = $this->input->post('borang_id');

            $jawaban = $this->input->post('jawaban');
            $borang       = $this->Borang_model->get_borang();
            $aspek      = $this->Borang_model->get_aspek();

            foreach ($aspek as $as) {
                if($jenis_borang == $as['jenis_borang_id']){
                    echo $as['aspek_penilaian'].'</br>';
                    foreach ($borang as $bo) {
                        if ( $id_borang == $bo['id_borang']) {
                            echo $id_borang;    
                        }
                    }
                }
            }

            // foreach ($jawaban as $key ) {
            //         echo $key;         
            // }

            echo $jenis_borang;

            echo 'Total Keseluruhan :' .array_sum($opsi_opsi);
    }
}


