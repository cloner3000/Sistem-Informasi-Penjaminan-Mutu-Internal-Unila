<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upt_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function get_upt()
  {
      $this->db->select('*');
      $this->db->from('upt');    
      $query = $this->db->get();
      return $query->result_array();
  }

  public function get_kaupt($id)
  {
      $query = $this->db->order_by('id_kepala_upt', 'desc')
                        ->where('upt_id', $id)
                        ->limit(1)
                        ->get('kepala_upt')
                        ->row();
      return $query;
  }

  public function tambah_upt($table, $data)
  {
      $this->db->insert($table,$data);
      return $this->db->insert_id();
  }

  public function detail_upt($id)
  {
    $this->db->select('*');
    $this->db->from('upt');
    $this->db->where('id_upt', $id);
    $query = $this->db->get();
    return $query->row_array();
      # code...
  }

  public function update($id)
  {
    $this->db->select('*');
    $this->db->from('upt');
    $this->db->where('id_upt',$id);
    $query = $this->db->get();
    return $query->row_array();
  }

    public function update_upt($data,$id)
    {
        $this->db->where('id_upt',$id);
        return $this->db->update('upt',$data);

    }

    public function update_kaupt($table, $data)
    {
        $this->db->insert($table,$data);
        return $this->db->insert_id();

    }

    public function hapus_upt($id)
    {
        $this->db->where('id_upt',$id);
        return $this->db->delete('upt');
        
    }

  
}
