<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auditor_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_auditor()
    {
        $this->db->select('*');
        $this->db->from('auditor');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_auditor_ps()
    {
        $this->db->select('*');
        $this->db->from('auditor_ps');
        $this->db->join('auditor', 'auditor.id_auditor = auditor_ps.auditor_id');
        $this->db->join('jadwal_audit', 'jadwal_audit.id_jadwal = auditor_ps.jadwal_id');
        $this->db->join('jenis_audit', 'jenis_audit.id_jenis_audit = jadwal_audit.jenis_audit_id');
        $this->db->join('semester', 'semester.id_semester = jadwal_audit.semester_id');
        $this->db->join('tahun_akademik', 'tahun_akademik.id_tahun_akademik = jadwal_audit.tahun_akademik_id');
        $this->db->join('program_studi', 'program_studi.id_prodi = auditor_ps.prodi_id');
        $this->db->order_by('id_auditor_ps', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_audit_matkul($jadwal, $prodi)
    {
        $this->db->select('*');
        $this->db->from('audit_matakuliah');
        $this->db->join('jadwal_audit', 'jadwal_audit.id_jadwal = audit_matakuliah.jadwal_id');
        $this->db->join('mata_kuliah', 'mata_kuliah.id_mata_kuliah = audit_matakuliah.matkul_id');
        $this->db->join('kurikulum', 'kurikulum.id_kurikulum = mata_kuliah.kurikulum_id');
        $this->db->where('jadwal_id', $jadwal);
        $this->db->where('program_studi_id', $prodi);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    
    public function update_auditor($id)
    {
        $this->db->select('*');
        $this->db->from('auditor');
        $this->db->join('user', 'user.id_user = auditor.user_id');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function act_update_auditor($data, $id)
    {
        $this->db->where('id_auditor',$id);
        return $this->db->update('auditor',$data);
        
    }

    public function update_user($data,$id)
    {
        $this->db->where('id_user',$id);
        return $this->db->update('user',$data);

    }
    public function get_audit_matkul_id($user_id)
    {
        $this->db->select('*');
        $this->db->from('auditor_ps');
        $this->db->join('auditor', 'auditor.id_auditor = auditor_ps.auditor_id');
        $this->db->join('jadwal_audit', 'jadwal_audit.id_jadwal = auditor_ps.jadwal_id');
        $this->db->join('jenis_audit', 'jenis_audit.id_jenis_audit = jadwal_audit.jenis_audit_id');
        $this->db->join('semester', 'semester.id_semester = jadwal_audit.semester_id');
        $this->db->join('tahun_akademik', 'tahun_akademik.id_tahun_akademik = jadwal_audit.tahun_akademik_id');
        $this->db->join('program_studi', 'program_studi.id_prodi = auditor_ps.prodi_id');
        $this->db->where('user_id', $user_id);
        $this->db->order_by('id_auditor_ps', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_jadwal_matkul($jadwal, $prodi)
    {
        $this->db->select('*');
        $this->db->from('audit_matakuliah');
        $this->db->join('jadwal_audit', 'jadwal_audit.id_jadwal = audit_matakuliah.jadwal_id');
        $this->db->join('mata_kuliah', 'mata_kuliah.id_mata_kuliah = audit_matakuliah.matkul_id');
        $this->db->where('jadwal_id', $jadwal);
        $this->db->where('prodi_id', $prodi);
        $query = $this->db->get();
        return $query->result_array();
        # code...
    }

    public function get_jadwal($jadwal)
    {
        $this->db->select('*');
        $this->db->from('jadwal_audit');
        $this->db->where('id_jadwal', $jadwal);
        $this->db->where('role_id', 3);
        $query = $this->db->get();
        return $query->row_array();
        # code...
    }

    public function get_jadwal_auditor()
    {
        $this->db->select('*');
        $this->db->from('jadwal_audit');
        $this->db->where('role_id', 3);
        $query = $this->db->get();
        return $query->result_array();
        # code...
    }
}
