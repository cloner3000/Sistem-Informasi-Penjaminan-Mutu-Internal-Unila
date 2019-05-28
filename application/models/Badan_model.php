<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Badan_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function get_badan()
  {
      $this->db->select('*');
      $this->db->from('badan_pengelola');    
      $query = $this->db->get();
      return $query->result_array();
  }

  public function get_kabadan($id)
  {
      $query = $this->db->order_by('id_kabadan', 'desc')
                        ->where('badan_id', $id)
                        ->limit(1)
                        ->get('kepala_badan_pengelola')
                        ->row();
      return $query;
  }

  public function tambah_badan($table, $data)
  {
      $this->db->insert($table,$data);
      return $this->db->insert_id();
  }

  public function detail_badan($id)
  {
    $this->db->select('*');
    $this->db->from('badan_pengelola');
    $this->db->where('id_badan', $id);
    $query = $this->db->get();
    return $query->row_array();
      # code...
  }

  public function update($id)
  {
    $this->db->select('*');
    $this->db->from('badan_pengelola');
    $this->db->where('id_badan',$id);
    $query = $this->db->get();
    return $query->row_array();
  }

    public function update_badan($data,$id)
    {
        $this->db->where('id_badan',$id);
        return $this->db->update('badan_pengelola',$data);

    }

    public function update_kabadan($table, $data)
    {
        $this->db->insert($table,$data);
        return $this->db->insert_id();

    }

    public function hapus_badan($id)
    {
        $this->db->where('id_badan',$id);
        return $this->db->delete('badan_pengelola');
        
    }

  
}
