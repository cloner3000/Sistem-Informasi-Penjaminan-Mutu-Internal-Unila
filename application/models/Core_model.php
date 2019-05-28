<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Core_model extends CI_Model {

    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

    public function get_kurikulum()
    {
        $this->db->select('*');
        $this->db->from('kurikulum');
        $this->db->join('program_studi','program_studi.id_prodi = kurikulum.prodi_id');
        $this->db->order_by('id_kurikulum', 'desc');
        $query = $this->db->get();
        return $query->result_array();
        # code...
    }

    public function get_detail_matakuliah()
    {
        $this->db->select('*');
        $this->db->from('mata_kuliah');
        $this->db->join('program_studi','program_studi.id_prodi = mata_kuliah.program_studi_id');
        $this->db->join('kurikulum','kurikulum.id_kurikulum = mata_kuliah.kurikulum_id');
        $this->db->order_by('id_mata_kuliah', 'desc');
        $query = $this->db->get();
        return $query->result_array();
        # code...
    }

    public function get_edit_matakuliah($id)
    {
        $this->db->select('*');
        $this->db->from('mata_kuliah');
        $this->db->where('id_mata_kuliah',$id);
        $this->db->order_by('id_mata_kuliah', 'desc');
        $query = $this->db->get();
        return $query->row_array();
        # code...
    }

    public function act_edit_matkul($data,$id)
      {
          $this->db->where('id_mata_kuliah',$id);
          return $this->db->update('mata_kuliah',$data);

      }

    public function tambah_matakuliah($id)
    {
      $this->db->select('*');
      $this->db->from('kurikulum');
      $this->db->join('program_studi', 'program_studi.id_prodi = kurikulum.prodi_id');
      $this->db->where('id_kurikulum',$id);
      $query = $this->db->get();
      return $query->row_array();
    }

    public function get_semester()
    {
      $this->db->select('*');
      $this->db->from('semester');
      $this->db->order_by('id_semester', 'ASC');
      return $this->db->get();
    }

    public function get_tahun_akademik()
    {
        $this->db->select('*');
        $this->db->from('tahun_akademik');
        $this->db->order_by('id_tahun_akademik', 'ASC');
        return $this->db->get();
    }

    public function get_jenis_audit()
    {
        $this->db->select('*');
        $this->db->from('jenis_audit');
        $this->db->order_by('id_jenis_audit', 'ASC');
          return $this->db->get();
        # code...
    }

    public function get_aspek()
    {
        $this->db->select('*');
        $this->db->from('aspek_penilaian');
        $this->db->order_by('id_aspek_penilaian', 'ASC');
        return $this->db->get();
        # code...
    }
    public function get_jenis_borang()
    {
        $this->db->select('*');
        $this->db->from('jenis_borang');
        $this->db->where('jenis_audit_id', 1);
        $this->db->order_by('id_jenis_borang', 'ASC');
        return $this->db->get();
        # code...
    }

    public function get_strata()
    {
        $this->db->select('*');
        $this->db->from('strata');
        $this->db->order_by('id_strata', 'ASC');
        return $this->db->get();
        # code...
    }

    function get_fakultases(){
      $this->db->select('*');
      $this->db->from('fakultas');
      return $this->db->get();
  }

  function get_lab(){
      $this->db->select('*');
      $this->db->from('laboratorium');
      return $this->db->get();
  }

  function get_prodi(){
      $this->db->select('*');
      $this->db->from('program_studi');
      return $this->db->get();
  } 

  function get_prodi_id($id){
      $this->db->select('*');
      $this->db->from('program_studi');
      $this->db->where('id_prodi', $id);
      $query = $this->db->get();
      return $query->row_array();
  } 
  public function get_role()
  {
      $this->db->select('*');
      $this->db->from('role');
      $this->db->order_by('id_role', 'ASC');
      return $this->db->get();
  }

  public function audit_role()
  {
    $this->db->select('*');
    $this->db->from('role');
    $this->db->order_by('id_role', 'ASC');
    $query = $this->db->get();

    return $query->result_array();

    //return $query->result_array();
    # code...
  }
  public function insert($table, $data)
  {
    $query = $this->db->insert($table,$data);
    return ($query);
      # code...
  }

  public function insert_multiple($table, $data)
  {
      $query = $this->db->insert($table,$data);
      return $this->db->insert_id();
  }
  
    public function hapus_matkul($id)
    {
        $this->db->where('id_mata_kuliah', $id);
        return $this->db->delete('mata_kuliah');
        # code...
    }

    public function get_tpm_prodi_prodi($prodi)
    {
        $this->db->select('*');
        $this->db->from('tpm_prodi');
        $this->db->where('prodi_id', $prodi);
        $this->db->join('user', 'user.id_user = tpm_prodi.user_id');
        $this->db->join('program_studi', 'program_studi.id_prodi = tpm_prodi.prodi_id');
        $this->db->join('fakultas', 'fakultas.id_fakultas = program_studi.fakultas_id');
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function hapus_kurikulum($id)
    {
        $this->db->where('id_kurikulum', $id);
        return $this->db->delete('kurikulum');
    }
}
