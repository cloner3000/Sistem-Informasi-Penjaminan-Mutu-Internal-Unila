<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_jadwal_audit()
    {
        $this->db->select('*');
        $this->db->from('jadwal_audit');
        $this->db->join('jenis_audit','jenis_audit.id_jenis_audit = jadwal_audit.jenis_audit_id');
        $this->db->join('semester','semester.id_semester = jadwal_audit.semester_id');
        $this->db->join('tahun_akademik','tahun_akademik.id_tahun_akademik = jadwal_audit.tahun_akademik_id');
        $this->db->join('role', 'role.id_role = jadwal_audit.role_id');
        $this->db->order_by('id_jadwal', 'desc');
        $query = $this->db->get();
        return $query->result_array();
        # code...
    }

    public function get_jadwal_matkul($id)
    {
        $query = $this->db->order_by('id_jadwal', 'desc')
                            ->where('role_id', $id)
                            ->join('jenis_audit','jenis_audit.id_jenis_audit = jadwal_audit.jenis_audit_id')
                            ->join('semester','semester.id_semester = jadwal_audit.semester_id')
                            ->join('tahun_akademik','tahun_akademik.id_tahun_akademik = jadwal_audit.tahun_akademik_id')
                            ->join('role', 'role.id_role = jadwal_audit.role_id')
                            ->limit(1)
                            ->get('jadwal_audit')
                            ->row();
        return $query;
    }

    public function get_jadwal_matkul_auditor()
    {
        $query = $this->db->order_by('id_jadwal', 'desc')
                            ->where('role_id', 2)
                            ->join('jenis_audit','jenis_audit.id_jenis_audit = jadwal_audit.jenis_audit_id')
                            ->join('semester','semester.id_semester = jadwal_audit.semester_id')
                            ->join('tahun_akademik','tahun_akademik.id_tahun_akademik = jadwal_audit.tahun_akademik_id')
                            ->join('role', 'role.id_role = jadwal_audit.role_id')
                            ->limit(1)
                            ->get('jadwal_audit')
                            ->row();
        return $query;
    }

    public function get_jadwal_matkul_auditor_set()
    {
        $this->db->select('*');
        $this->db->from('jadwal_audit');
        $this->db->join('semester', 'semester.id_semester = jadwal_audit.semester_id');
        $this->db->join('tahun_akademik', 'tahun_akademik.id_tahun_akademik = jadwal_audit.tahun_akademik_id');
        $this->db->where('role_id', 3);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_jadwal_matkul_tpm_set()
    {
        $this->db->select('*');
        $this->db->from('jadwal_audit');
        $this->db->join('semester', 'semester.id_semester = jadwal_audit.semester_id');
        $this->db->join('tahun_akademik', 'tahun_akademik.id_tahun_akademik = jadwal_audit.tahun_akademik_id');
        $this->db->where('role_id', 2);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_auditor_ps($id)
    {
        $query = $this->db->order_by('id_auditor_ps', 'desc')
                            ->join('auditor', 'auditor.id_auditor = auditor_ps.auditor_id')
                            ->where('user_id', $id)
                            ->limit(1)
                            ->get('auditor_ps')
                            ->row();
        return $query;
    }

    public function get_jadwal_audit_matkul($id)
    {
        $this->db->select('*');
        $this->db->from('jadwal_audit');
        $this->db->join('jenis_audit','jenis_audit.id_jenis_audit = jadwal_audit.jenis_audit_id');
        $this->db->join('semester','semester.id_semester = jadwal_audit.semester_id');
        $this->db->join('tahun_akademik','tahun_akademik.id_tahun_akademik = jadwal_audit.tahun_akademik_id');
        $this->db->where('role_id', $id);
        $this->db->order_by('id_jadwal', 'desc');
        $query = $this->db->get();
        return $query->result_array();
        # code...
    }

    public function get_jadwal_audit_matkul_id($id)
    {
        $this->db->select('*');
        $this->db->from('jadwal_audit');
        $this->db->join('semester','semester.id_semester = jadwal_audit.semester_id');
        $this->db->join('tahun_akademik','tahun_akademik.id_tahun_akademik = jadwal_audit.tahun_akademik_id');
        $this->db->where('id_jadwal', $id);
        $query = $this->db->get();
        return $query->row_array();
        # code...
    }

    public function get_jadwal()
    {
        $this->db->select('*');
        $this->db->from('jadwal_audit');
        $this->db->join('jenis_audit','jenis_audit.id_jenis_audit = jadwal_audit.jenis_audit_id');
        $this->db->join('semester','semester.id_semester = jadwal_audit.semester_id');
        $this->db->join('tahun_akademik','tahun_akademik.id_tahun_akademik = jadwal_audit.tahun_akademik_id');
        $this->db->order_by('id_jadwal', 'desc');
        $query = $this->db->get();
        return $query;
        # code...
    }

    public function get_jadwal2()
    {
        $this->db->select('*');
        $this->db->from('jadwal_audit');
        $this->db->join('jenis_audit','jenis_audit.id_jenis_audit = jadwal_audit.jenis_audit_id');
        $this->db->join('semester','semester.id_semester = jadwal_audit.semester_id');
        $this->db->join('tahun_akademik','tahun_akademik.id_tahun_akademik = jadwal_audit.tahun_akademik_id');
        $this->db->order_by('id_jadwal', 'desc');
        $query = $this->db->get();
        return $query->result_array();
        # code...
    }
    
    public function tambah_jadwal($table, $data)
    {
        $query = $this->db->insert($table,$data);
        return ($query);
    }

    public function cek_jadwal($mulai_audit, $selesai_audit)
    {
        $query = $this->db->get_where('jadwal_audit', array('mulai_audit'=>$mulai_audit, 'selesai_audit'=>$selesai_audit));
        return $query->row_array();
    }


    public function update($id)
    {
        $this->db->select('*');
        $this->db->from('jadwal_audit');
        $this->db->where('id_jadwal',$id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_jadwal($data,$id)
    {
        $this->db->where('id_jadwal',$id);
        return $this->db->update('jadwal_audit',$data);

    }

    public function hapus_jadwal($id)
    {
        $this->db->where('id_jadwal',$id);
        return $this->db->delete('jadwal_audit');      
    }

    public function hapus_auditor($id)
    {
        $this->db->where('id_auditor_ps',$id);
        return $this->db->delete('auditor_ps');      
    }

}
