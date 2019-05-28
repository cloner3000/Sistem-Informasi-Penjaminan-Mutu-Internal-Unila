<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function get_dosen()
  {
    $this->db->select('*');
    $this->db->from('dosen');
    $query = $this->db->get();
    return $query->result_array();
  }
}
