<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instrumen_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function get_borang()
  {
      $this->db->select('*');
      $this->db->from('borang');
      $query = $this->db->get();
      return $query->result_array();
      # code...
  }

  public function get_aspek()
  {
      $this->db->select('*');
      $this->db->from('aspek_penilaian');
      $this->db->order_by('id_aspek_penilaian', 'ASC');
      $query = $this->db->get();
      return $query->result_array();
      # code...
  }

  public function get_standar()
  {
      $this->db->select('*');
      $this->db->from('standar');
      $this->db->order_by('id_standar', 'ASC');
      $query = $this->db->get();
      return $query->result_array();
  }

  public function get_jawaban()
  {
    
      $this->db->select('*');
      $this->db->from('multiple_choice');
      $this->db->join('borang','borang.id_borang = multiple_choice.borang_id', 'left');
      $this->db->order_by('borang_id', 'ASC');
      
      $query = $this->db->get();
      return $query->result_array();
      # code...
  }
  
}
