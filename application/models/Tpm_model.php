<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tpm_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_tpm_prodi()
    {
        $this->db->select('*');
        $this->db->from('tpm_prodi');
        $this->db->join('user', 'user.id_user = tpm_prodi.user_id');
        $this->db->join('program_studi', 'program_studi.id_prodi = tpm_prodi.prodi_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_tpm_prodi_id($id)
    {
        $this->db->select('*');
        $this->db->from('tpm_prodi');
        $this->db->where('user_id', $id);
        $this->db->join('user', 'user.id_user = tpm_prodi.user_id');
        $this->db->join('program_studi', 'program_studi.id_prodi = tpm_prodi.prodi_id');
        $this->db->join('fakultas', 'fakultas.id_fakultas = program_studi.fakultas_id');
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function get_tpmf_id($id)
    {
        $this->db->select('*');
        $this->db->from('tpm_fakultas');
        $this->db->where('user_id', $id);
        $this->db->join('user', 'user.id_user = tpm_fakultas.user_id');
        $this->db->join('fakultas', 'fakultas.id_fakultas = tpm_fakultas.fakultas_id');
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function get_tpm_lab()
    {
        $this->db->select('*');
        $this->db->from('tpm_lab');
        $this->db->join('user', 'user.id_user = tpm_lab.user_id');
        $this->db->join('laboratorium', 'laboratorium.id_lab = tpm_lab.lab_id');
        $query = $this->db->get();
        return $query->result_array();
    } 

    public function get_tpm_upt()
    {
        $this->db->select('*');
        $this->db->from('tpm_unit');
        $this->db->join('user', 'user.id_user = tpm_unit.user_id');
        $this->db->join('upt', 'upt.id_upt = tpm_unit.unit_id');
        $query = $this->db->get();
        return $query->result_array();
    } 

    public function get_tpm_lembaga()
    {
        $this->db->select('*');
        $this->db->from('tpm_pusat_lembaga');
        $this->db->join('user', 'user.id_user = tpm_pusat_lembaga.user_id');
        $this->db->join('pusat_lembaga', 'pusat_lembaga.id_pusat_lembaga = tpm_pusat_lembaga.pusat_lembaga_id');
        $query = $this->db->get();
        return $query->result_array();
    } 

    public function get_tpm_badan()
    {
        $this->db->select('*');
        $this->db->from('tpm_badan');
        $this->db->join('user', 'user.id_user = tpm_badan.user_id');
        $this->db->join('badan_pengelola', 'badan_pengelola.id_badan= tpm_badan.badan_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_auditor()
    {
        $this->db->select('*');
        $this->db->from('auditor');
        $this->db->join('user', 'user.id_user = auditor.user_id');
        $query = $this->db->get();
        return $query->result_array();
        # code...
    }
    
    public function update_tpm_prodi($id)
    {
        $this->db->select('*');
        $this->db->from('tpm_prodi');
        $this->db->join('user', 'user.id_user = tpm_prodi.user_id');
        $this->db->join('program_studi','program_studi.id_prodi = tpm_prodi.prodi_id');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->row_array();
        # code...
    }
    
    public function update_tpmf($id)
    {
        $this->db->select('*');
        $this->db->from('tpm_fakultas');
        $this->db->join('user', 'user.id_user = tpm_fakultas.user_id');
        $this->db->join('fakultas', 'fakultas.id_fakultas = tpm_fakultas.fakultas_id');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->row_array();
        # code...
    }

    public function update_tpm_lab($id)
    {
        $this->db->select('*');
        $this->db->from('tpm_lab');
        $this->db->join('user', 'user.id_user = tpm_lab.user_id');
        $this->db->join('laboratorium','laboratorium.id_lab = tpm_lab.lab_id');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_tpm_upt($id)
    {
        $this->db->select('*');
        $this->db->from('tpm_unit');
        $this->db->join('user', 'user.id_user = tpm_unit.user_id');
        $this->db->join('upt','upt.id_upt = tpm_unit.unit_id');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_tpm_lembaga($id)
    {
        $this->db->select('*');
        $this->db->from('tpm_pusat_lembaga');
        $this->db->join('user', 'user.id_user = tpm_pusat_lembaga.user_id');
        $this->db->join('pusat_lembaga','pusat_lembaga.id_pusat_lembaga = tpm_pusat_lembaga.pusat_lembaga_id');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_tpm_badan($id)
    {
        $this->db->select('*');
        $this->db->from('tpm_badan');
        $this->db->join('user', 'user.id_user = tpm_badan.user_id');
        $this->db->join('badan_pengelola','badan_pengelola.id_badan = tpm_badan.badan_id');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function act_update_tpm_prodi($data, $id)
    {
        $this->db->where('id_tpm_prodi',$id);
        return $this->db->update('tpm_prodi',$data);
        
    }
    
    public function act_update_tpmf($data, $id)
    {
        $this->db->where('id_tpmf',$id);
        return $this->db->update('tpm_fakultas',$data);
        
    }

    public function act_update_tpm_lab($data, $id)
    {
        $this->db->where('id_tpm_lab', $id);
        return $this->db->update('tpm_lab', $data);
    }

    public function act_update_tpm_upt($data, $id)
    {
        $this->db->where('id_tpm_unit', $id);
        return $this->db->update('tpm_unit', $data);
    }

    public function act_update_tpm_lembaga($data, $id)
    {
        $this->db->where('id_tpm_pusat_lembaga', $id);
        return $this->db->update('tpm_pusat_lembaga', $data);
    }

    public function act_update_tpm_badan($data, $id)
    {
        $this->db->where('id_tpm_badan', $id);
        return $this->db->update('tpm_badan', $data);
    }

    public function update_user($data,$id)
    {
        $this->db->where('id_user',$id);
        return $this->db->update('user',$data);

    }

    
}
