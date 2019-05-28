<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function get_prodi()
  {
      $this->db->select('*');
      $this->db->from('program_studi');
      $this->db->join('fakultas','fakultas.id_fakultas = program_studi.fakultas_id');
      $this->db->join('strata','strata.id_strata = program_studi.strata_id');        
      $query = $this->db->get();
      return $query->result_array();
  }

  public function get_kaprodi($id)
  {
      $query = $this->db->order_by('id_kaprodi', 'desc')
                        ->where('prodi_id', $id)
                        ->limit(1)
                        ->get('kepala_prodi')
                        ->row();
      return $query;
  }

  public function tambah_prodi($table, $data)
  {
      $this->db->insert($table,$data);
      return $this->db->insert_id();
  }

  public function detail_prodi($id)
  {
    $this->db->select('*');
    $this->db->from('program_studi');
    $this->db->where('id_prodi', $id);
    $query = $this->db->get();
    return $query->row_array();
      # code...
  }

  public function update($id)
  {
    $this->db->select('*');
    $this->db->from('program_studi');
    $this->db->where('id_prodi',$id);
    $query = $this->db->get();
    return $query->row_array();
  }

    public function update_prodi($data,$id)
    {
        $this->db->where('id_prodi',$id);
        return $this->db->update('program_studi',$data);

    }

    public function update_kaprodi($table, $data)
    {
        $this->db->insert($table,$data);
        return $this->db->insert_id();

    }

    public function hapus_prodi($id)
    {
        $this->db->where('id_prodi',$id);
        return $this->db->delete('program_studi');
        
    }

  
}
