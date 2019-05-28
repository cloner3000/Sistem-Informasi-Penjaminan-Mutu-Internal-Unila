<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function get_fakultas()
  {
      $this->db->select('*');
      $this->db->from('fakultas');    
      $query = $this->db->get();
      return $query->result_array();
  }

  public function get_wadek($id)
  {
      $query = $this->db->order_by('id_wadek_satu', 'desc')
                        ->where('fakultas_id', $id)
                        ->limit(1)
                        ->get('wakil_dekan_satu')
                        ->row();
      return $query;
  }

  public function tambah_fakultas($table, $data)
  {
      $this->db->insert($table,$data);
      return $this->db->insert_id();
  }

  public function detail_fakultas($id)
  {
    $this->db->select('*');
    $this->db->from('fakultas');
    $this->db->where('id_fakultas', $id);
    $query = $this->db->get();
    return $query->row_array();
      # code...
  }

  public function update($id)
  {
    $this->db->select('*');
    $this->db->from('fakultas');
    $this->db->where('id_fakultas',$id);
    $query = $this->db->get();
    return $query->row_array();
  }

    public function update_fakultas($data,$id)
    {
        $this->db->where('id_fakultas',$id);
        return $this->db->update('fakultas',$data);

    }

    public function update_wadek($table, $data)
    {
        $this->db->insert($table,$data);
        return $this->db->insert_id();

    }

    public function hapus_fakultas($id)
    {
        $this->db->where('id_fakultas',$id);
        return $this->db->delete('fakultas');
        
    }

  
}
