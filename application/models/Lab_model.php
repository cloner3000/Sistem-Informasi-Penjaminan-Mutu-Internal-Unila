<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lab_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function get_lab()
  {
      $this->db->select('*');
      $this->db->from('laboratorium');   
      $this->db->join('fakultas', 'fakultas.id_fakultas = laboratorium.fakultas_id');
      $query = $this->db->get();
      return $query->result_array();
  }

  public function get_kalab($id)
  {
      $query = $this->db->order_by('id_kalab', 'desc')
                        ->where('lab_id', $id)
                        ->limit(1)
                        ->get('kepala_lab')
                        ->row();
      return $query;
  }

  public function tambah_lab($table, $data)
  {
      $this->db->insert($table,$data);
      return $this->db->insert_id();
  }

  public function detail_lab($id)
  {
    $this->db->select('*');
    $this->db->from('laboratorium');
    $this->db->where('id_lab', $id);
    $query = $this->db->get();
    return $query->row_array();
      # code...
  }

  public function update($id)
  {
    $this->db->select('*');
    $this->db->from('laboratorium');
    $this->db->where('id_lab',$id);
    $query = $this->db->get();
    return $query->row_array();
  }

    public function update_lab($data,$id)
    {
        $this->db->where('id_lab',$id);
        return $this->db->update('laboratorium',$data);

    }

    public function update_kalab($table, $data)
    {
        $this->db->insert($table,$data);
        return $this->db->insert_id();

    }

    public function hapus_lab($id)
    {
        $this->db->where('id_lab',$id);
        return $this->db->delete('laboratorium');
        
    }

  
}
