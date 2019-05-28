<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembaga_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function get_lembaga()
  {
      $this->db->select('*');
      $this->db->from('pusat_lembaga');
      $this->db->join('lembaga', 'lembaga.id_lembaga = pusat_lembaga.lembaga_id');    
      $query = $this->db->get();
      return $query->result_array();
  }

  public function lembaga()
  {
      $this->db->select('*');
      $this->db->from('lembaga');
      $query = $this->db->get();
      return $query->result_array();
      # code...
  }

  public function get_kalembaga($id)
  {
      $query = $this->db->order_by('id_kepala_lembaga', 'desc')
                        ->where('pusat_lembaga_id', $id)
                        ->limit(1)
                        ->get('kepala_lembaga')
                        ->row();
      return $query;
  }

  public function tambah_lembaga($table, $data)
  {
      $this->db->insert($table,$data);
      return $this->db->insert_id();
  }

  public function detail_lembaga($id)
  {
    $this->db->select('*');
    $this->db->from('pusat_lembaga');
    $this->db->where('id_pusat_lembaga', $id);
    $query = $this->db->get();
    return $query->row_array();
      # code...
  }

  public function update($id)
  {
    $this->db->select('*');
    $this->db->from('pusat_lembaga');
    $this->db->where('id_pusat_lembaga',$id);
    $query = $this->db->get();
    return $query->row_array();
  }

    public function update_lembaga($data,$id)
    {
        $this->db->where('id_pusat_lembaga',$id);
        return $this->db->update('pusat_lembaga',$data);

    }

    public function update_kalembaga($table, $data)
    {
        $this->db->insert($table,$data);
        return $this->db->insert_id();

    }

    public function hapus_lembaga($id)
    {
        $this->db->where('id_pusat_lembaga',$id);
        return $this->db->delete('pusat_lembaga');
        
    }

  
}
