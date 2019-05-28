<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  // untuk menampilkan
  public function get_user($kode_fakultas = null, $id_jurusan = null)
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->join('role','role.id_role = user.role_id');
    // $this->db->join('fakultas','fakultas.KODE_FAK= user.fakultas', 'left');
    // $this->db->join('jurusan','jurusan.id= user.id_jurusan', 'left');

    // if($kode_fakultas != null){
    //   $this->db->where('fakultas', $kode_fakultas);
    //   $this->db->or_where('jurusan.fakultas_panggil_dos', $kode_fakultas);
    // }
    // if($id_jurusan != null){
    //   $this->db->where('id_jurusan', $id_jurusan);
    // }
    $query = $this->db->get();
    return $query->result_array();
  }
  // untuk insert
  public function insert($data)
  {
      $this->db->insert('user', $data);
      return $this->db->insert_id();

  }
  public function update($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('role','role.id_role = user.role_id');
        // $this->db->join('fakultas','fakultas.KODE_FAK= user.fakultas', 'left');
        // $this->db->join('jurusan','jurusan.id= user.id_jurusan', 'left');
        $this->db->where('id_user',$id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_user($data,$id)
    {
        $this->db->where('id_user',$id);
        return $this->db->update('user',$data);

    }

    public function reset_password($data,$id)
    {
        $this->db->where('id_user',$id);
        return $this->db->update('user', $data);
        
    }

    public function non_aktif_user($data,$id)
    {
        $this->db->where('id_user',$id);
        return $this->db->update('user', $data);
        
    }

    public function aktif_user($data,$id)
    {
        $this->db->where('id_user',$id);
        return $this->db->update('user', $data);
        
    }

    public function get_tpm_prodi()
    {
        $this->db->select('*');
        $this->db->from('tpm_prodi');
        $this->db->join('user', 'user.id_user = tpm_prodi.user_id');
        $this->db->join('program_studi', 'program_studi.id_prodi = tpm_prodi.prodi_id');
        $this->db->order_by('id_tpm_prodi', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
        # code...
    }

    public function get_tpm_lab()
    {
        $this->db->select('*');
        $this->db->from('tpm_lab');
        $this->db->join('user', 'user.id_user = tpm_lab.user_id');
        $this->db->join('laboratorium', 'laboratorium.id_lab = tpm_lab.lab_id');
        $this->db->join('fakultas', 'fakultas.id_fakultas = laboratorium.fakultas_id');
        $this->db->order_by('id_tpm_lab', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
        # code...
    }

    public function get_tpm_upt()
    {
        $this->db->select('*');
        $this->db->from('tpm_unit');
        $this->db->join('user', 'user.id_user = tpm_unit.user_id');
        $this->db->join('upt', 'upt.id_upt = tpm_unit.unit_id');
        $this->db->order_by('id_tpm_unit', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
        # code...
    }

    public function get_tpm_lembaga()
    {
        $this->db->select('*');
        $this->db->from('tpm_pusat_lembaga');
        $this->db->join('user', 'user.id_user = tpm_pusat_lembaga.user_id');
        $this->db->join('pusat_lembaga', 'pusat_lembaga.id_pusat_lembaga = tpm_pusat_lembaga.pusat_lembaga_id');
        $this->db->order_by('id_tpm_pusat_lembaga', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
        # code...
    }

    public function get_tpm_badan()
    {
        $this->db->select('*');
        $this->db->from('tpm_badan');
        $this->db->join('user', 'user.id_user = tpm_badan.user_id');
        $this->db->join('badan_pengelola', 'badan_pengelola.id_badan = tpm_badan.badan_id');
        $this->db->order_by('id_tpm_badan', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
        # code...
    }

    public function get_auditor()
    {
        $this->db->select('*');
        $this->db->from('auditor');
        $this->db->join('user', 'user.id_user = auditor.user_id');
        $this->db->order_by('id_auditor', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
        # code...
    }
    
    public function cek_user($username)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $query = $this->db->get();

        return $query->num_rows();
        # code...
    }

}
