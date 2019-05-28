<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Audit_ps_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_audit_matkul()
    {
        $this->db->select('*');
        $this->db->from('audit_matakuliah');
        $this->db->join('mata_kuliah', 'mata_kuliah.id_mata_kuliah = audit_matakuliah.matkul_id');
        $this->db->join('kurikulum', 'kurikulum.id_kurikulum = mata_kuliah.kurikulum_id');
        $this->db->join('jadwal_audit', 'jadwal_audit.id_jadwal = audit_matakuliah.jadwal_id');
        $this->db->join('semester', 'semester.id_semester = jadwal_audit.semester_id');
        $this->db->join('tahun_akademik', 'tahun_akademik.id_tahun_akademik = jadwal_audit.tahun_akademik_id');
        //$this->db->where('prodi_id', $id);
        $this->db->order_by('id_audit_mata_kuliah', 'DESC');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_progres_status($jadwal, $prodi)
    {
      $this->db->select('*');
      $this->db->from('audit_matakuliah');
      $this->db->where('jadwal_id', $jadwal);
      $this->db->where('prodi_id', $prodi);
      // $this->db->where('status_auditor', 0);
      $query = $this->db->get();
      return $query->result_array();
    }

    public function get_progres($jadwal, $prodi)
    {
      $this->db->select('*');
      $this->db->from('audit_matakuliah');
      $this->db->join('mata_kuliah', 'mata_kuliah.id_mata_kuliah = audit_matakuliah.matkul_id');
      $this->db->where('jadwal_id', $jadwal);
      $this->db->where('prodi_id', $prodi);
      $this->db->where('status_auditor', 1);
      $query = $this->db->get();
      return $query->result_array();
    }

    public function get_auditor($jadwal, $prodi)
    {
      $this->db->select('*');
      $this->db->from('auditor_ps');
      $this->db->join('auditor', 'auditor.id_auditor = auditor_ps.auditor_id');
      $this->db->where('jadwal_id', $jadwal);
      $this->db->where('prodi_id', $prodi);
      $query = $this->db->get();
      return $query->result_array();
    }

    public function get_dosen_pengampu($id)
    {
        $this->db->select('*');
        $this->db->from('dosen_pengampu');
        $this->db->where('audit_matkul_id', $id);
        $this->db->join('dosen', 'dosen.id = dosen_pengampu.dosen_id');
        $query = $this->db->get();
        return $query->result_array();
      # code...
    }

    public function get_dosen_pengampu_laporan()
    {
        $this->db->select('*');
        $this->db->from('dosen_pengampu');
        $this->db->join('audit_matakuliah', 'audit_matakuliah.id_audit_mata_kuliah = dosen_pengampu.audit_matkul_id');
        $this->db->join('dosen', 'dosen.id = dosen_pengampu.dosen_id');
        $query = $this->db->get();
        return $query->result_array();
      # code...
    }

    public function get_audit($id)
    {
        $this->db->select('*');
        $this->db->from('audit_matakuliah');
        $this->db->join('mata_kuliah', 'mata_kuliah.id_mata_kuliah = audit_matakuliah.matkul_id');
        $this->db->join('program_studi', 'program_studi.id_prodi = audit_matakuliah.prodi_id');
        $this->db->join('fakultas', 'fakultas.id_fakultas = program_studi.fakultas_id');
        $this->db->join('kurikulum', 'kurikulum.id_kurikulum = mata_kuliah.kurikulum_id');
        $this->db->join('jadwal_audit', 'jadwal_audit.id_jadwal = audit_matakuliah.jadwal_id');
        $this->db->join('semester', 'semester.id_semester = jadwal_audit.semester_id');
        $this->db->join('tahun_akademik', 'tahun_akademik.id_tahun_akademik = jadwal_audit.tahun_akademik_id');
        $this->db->join('jenis_borang', 'jenis_borang.id_jenis_borang = audit_matakuliah.borang_id');
        $this->db->where('id_audit_mata_kuliah', $id);
        $query = $this->db->get();
        return $query->row_array();
      # code...
    }

    public function update_audit($data, $id)
    {
        $this->db->where('id_audit_mata_kuliah', $id);
        return $this->db->update('audit_matakuliah', $data);
      # code...
    }

    public function get_skor($id)
    {
        $this->db->select("*");
        $this->db->from('hasil_audit_matkul');
        $this->db->where('audit_mata_kuliah_id', $id);
        $query = $this->db->get();
        return $query->result_array();
      # code...
    }

    public function jawaban_tpm_teori($id)
    {
        $this->db->select('*');
        $this->db->from('jawaban_audit_matkul_teori');
        $this->db->where('audit_mata_kuliah_id', $id);
        $query = $this->db->get();
        return $query->result_array();
      # code...
    }

    public function jawaban_tpm_praktikum($id)
    {
        $this->db->select('*');
        $this->db->from('jawaban_audit_matkul_prak');
        $this->db->where('audit_mata_kuliah_id', $id);
        $query = $this->db->get();
        return $query->result_array();
      # code...
    }

    public function update_skor($data, $id)
    {
        $this->db->where('audit_mata_kuliah_id'. $id);
        return $this->db->update('hasil_audit_matkul', $data);
      # code...
    }


    public function get_dosen_pengampu_rekap($id, $jadwal)
    {
      $this->db->select('*');
      $this->db->from('dosen_pengampu');
      $this->db->join('dosen', 'dosen.id = dosen_pengampu.dosen_id');
      $this->db->join('audit_matakuliah', 'audit_matakuliah.id_audit_mata_kuliah = dosen_pengampu.audit_matkul_id');
      $this->db->join('mata_kuliah', 'mata_kuliah.id_mata_kuliah = audit_matakuliah.matkul_id');
      $this->db->join('program_studi', 'program_studi.id_prodi = audit_matakuliah.prodi_id');
      $this->db->join('hasil_audit_matkul', 'hasil_audit_matkul.audit_mata_kuliah_id = audit_matakuliah.id_audit_mata_kuliah');
      $this->db->join('kurikulum', 'kurikulum.id_kurikulum = mata_kuliah.kurikulum_id');
      $this->db->join('jadwal_audit', 'jadwal_audit.id_jadwal = audit_matakuliah.jadwal_id');
      $this->db->join('semester', 'semester.id_semester = jadwal_audit.semester_id');
      $this->db->join('tahun_akademik', 'tahun_akademik.id_tahun_akademik = jadwal_audit.tahun_akademik_id');
      $this->db->where('dosen_id', $id);
      $this->db->where('jadwal_id', $jadwal);
      $query = $this->db->get();
      return $query->result_array();
      # code...
    }

    public function get_matkul_yang_diampu($id)
    {
        $this->db->select('*');
        $this->db->from('audit_matakuliah');
        $this->db->join('mata_kuliah', 'mata_kuliah.id_mata_kuliah = audit_matakuliah.matkul_id');
        $this->db->join('program_studi', 'program_studi.id_prodi = audit_matakuliah.prodi_id');
        $this->db->join('fakultas', 'fakultas.id_fakultas = program_studi.fakultas_id');
        $this->db->join('kurikulum', 'kurikulum.id_kurikulum = mata_kuliah.kurikulum_id');
        $this->db->join('jadwal_audit', 'jadwal_audit.id_jadwal = audit_matakuliah.jadwal_id');
        $this->db->join('semester', 'semester.id_semester = jadwal_audit.semester_id');
        $this->db->join('tahun_akademik', 'tahun_akademik.id_tahun_akademik = jadwal_audit.tahun_akademik_id');
        $this->db->join('jenis_borang', 'jenis_borang.id_jenis_borang = audit_matakuliah.borang_id');
        $this->db->where('jadwal_id', $id);
        $query = $this->db->get();
        return $query->result_array();
      # code...
    }

    public function rekap_search($id_jadwal, $id_dosen)
    {
        $this->db->select('*');
        $this->db->from('dosen_pengampu');
        $this->db->join('dosen', 'dosen.id = dosen_pengampu.dosen_id', 'left');
        $this->db->join('audit_matakuliah', 'audit_matakuliah.id_audit_mata_kuliah = dosen_pengampu.audit_matkul_id');
        $this->db->join('jadwal_audit', 'jadwal_audit.id_jadwal = audit_matakuliah.jadwal_id');
        $this->db->join('semester', 'semester.id_semester = jadwal_audit.semester_id');
        $this->db->join('tahun_akademik', 'tahun_akademik.id_tahun_akademik = jadwal_audit.tahun_akademik_id');
        $this->db->where('jadwal_id', $id_jadwal);
        $this->db->where('dosen_id', $id_dosen);
        $query = $this->db->get();
        return $query->row_array();
      # code...
    }

    public function berita_acara($id_jadwal)
    {
      $this->db->select('*');
      $this->db->from('audit_matakuliah');
      $this->db->join('jadwal_audit', 'jadwal_audit.id_jadwal = audit_matakuliah.jadwal_id');
      $this->db->join('semester', 'semester.id_semester = jadwal_audit.semester_id');
      $this->db->join('tahun_akademik', 'tahun_akademik.id_tahun_akademik = jadwal_audit.tahun_akademik_id');
      $this->db->where('jadwal_id', $id_jadwal);
      $query = $this->db->get();
      return $query->row_array();
      # code...
    }

    public function nilai_matkul_max($jadwal, $prodi)
    {
      $this->db->select('*');
    //   $this->db->select_max('id_hasil_audit_matkul');
      $this->db->select_max('hasil_audit_matkul_auditor');
      $this->db->join('audit_matakuliah', 'audit_matakuliah.id_audit_mata_kuliah = hasil_audit_matkul.audit_mata_kuliah_id');
      $this->db->where('jadwal_id', $jadwal);
      $this->db->where('prodi_id', $prodi);
      $query = $this->db->get('hasil_audit_matkul')->row();

      return $query;
    }
    
    public function id_hasil($jadwal, $prodi, $skor)
    {
      $this->db->join('audit_matakuliah', 'audit_matakuliah.id_audit_mata_kuliah = hasil_audit_matkul.audit_mata_kuliah_id');
      $this->db->where('jadwal_id', $jadwal);
      $this->db->where('prodi_id', $prodi);
      $this->db->where('hasil_audit_matkul_auditor', $skor);
      $query = $this->db->get('hasil_audit_matkul')->row();

      return $query;
    }
    
    

    public function nilai_dosen_max($jadwal, $dosen)
    {
      $this->db->select('*');
      $this->db->select_max('hasil_audit_matkul_auditor');
      $this->db->join('audit_matakuliah', 'audit_matakuliah.id_audit_mata_kuliah = hasil_audit_matkul.audit_mata_kuliah_id');
      $this->db->join('dosen_pengampu', 'dosen_pengampu.audit_matkul_id = audit_mata_kuliah_id');
      $this->db->where('jadwal_id', $jadwal);
      $this->db->where('dosen_id', $dosen);
      $query = $this->db->get('hasil_audit_matkul')->row();

      return $query;
      # code...
    }

    public function nilai_dosen_min($jadwal, $dosen)
    {
      $this->db->select('*');
      $this->db->select_min('hasil_audit_matkul_auditor');
      $this->db->join('audit_matakuliah', 'audit_matakuliah.id_audit_mata_kuliah = hasil_audit_matkul.audit_mata_kuliah_id');
      $this->db->join('dosen_pengampu', 'dosen_pengampu.audit_matkul_id = audit_mata_kuliah_id');
      $this->db->where('jadwal_id', $jadwal);
      $this->db->where('dosen_id', $dosen);
      $query = $this->db->get('hasil_audit_matkul')->row();

      return $query;
      # code...
    }

    public function nilai_dosen_sum($jadwal, $dosen)
    {
      $this->db->select('*');
      $this->db->select_sum('hasil_audit_matkul_auditor');
      $this->db->join('audit_matakuliah', 'audit_matakuliah.id_audit_mata_kuliah = hasil_audit_matkul.audit_mata_kuliah_id');
      $this->db->join('dosen_pengampu', 'dosen_pengampu.audit_matkul_id = audit_mata_kuliah_id');
      $this->db->where('jadwal_id', $jadwal);
      $this->db->where('dosen_id', $dosen);
      $query = $this->db->get('hasil_audit_matkul')->row();

      return $query;
      # code...
    }

    public function nilai_matkul_min($jadwal, $prodi)
    {
      $this->db->select('*');
      $this->db->select_min('hasil_audit_matkul_auditor');
      $this->db->join('audit_matakuliah', 'audit_matakuliah.id_audit_mata_kuliah = hasil_audit_matkul.audit_mata_kuliah_id');
      $this->db->where('jadwal_id', $jadwal);
      $this->db->where('prodi_id', $prodi);
      $query = $this->db->get('hasil_audit_matkul')->row();

      return $query;
      # code...
    }

    
    public function nilai_matkul_sum($jadwal, $prodi)
    {
      $this->db->select('*');
      $this->db->select_sum('hasil_audit_matkul_auditor');
      $this->db->join('audit_matakuliah', 'audit_matakuliah.id_audit_mata_kuliah = hasil_audit_matkul.audit_mata_kuliah_id');
      $this->db->where('jadwal_id', $jadwal);
      $this->db->where('prodi_id', $prodi);
      $query = $this->db->get('hasil_audit_matkul')->row();

      return $query;
      # code...
    }

    public function matkul_max($audit)
    {
      $query = $this->db->order_by('id_dosen_pengampu', 'desc')
                            ->join('audit_matakuliah', 'audit_matakuliah.id_audit_mata_kuliah = dosen_pengampu.audit_matkul_id')
                            ->join('mata_kuliah', 'mata_kuliah.id_mata_kuliah = audit_matakuliah.matkul_id')
                            ->where('audit_matkul_id', $audit)
                            ->limit(1)
                            ->get('dosen_pengampu')
                            ->row();
        return $query;
      # code...
    }

    public function dosen_matkul_max($audit)
    {
      $this->db->select('*');
      $this->db->from('dosen_pengampu');
      $this->db->join('audit_matakuliah', 'audit_matakuliah.id_audit_mata_kuliah = dosen_pengampu.audit_matkul_id');
      $this->db->join('mata_kuliah', 'mata_kuliah.id_mata_kuliah = audit_matakuliah.matkul_id');
      $this->db->join('dosen', 'dosen.id = dosen_pengampu.dosen_id', 'left');
      $this->db->limit(1);
      $this->db->where('audit_matkul_id', $audit);
      $query = $this->db->get();

      return $query->result_array();
      # code...
    }

    public function laporan_hasil_audit_matkul()
    {
      $this->db->select('*');
      $this->db->from('hasil_audit_matkul');
      $this->db->join('audit_matakuliah', 'audit_matakuliah.id_audit_mata_kuliah = hasil_audit_matkul.audit_mata_kuliah_id');
      $query = $this->db->get();

      return $query->result_array();
    }

    public function dosen_sum($jadwal, $dosen)
    {
      $this->db->select('*');
      $this->db->select_sum('hasil_audit_matkul_auditor');
      $this->db->join('audit_matakuliah', 'audit_matakuliah.id_audit_mata_kuliah = hasil_audit_matkul.audit_mata_kuliah_id');
      $this->db->join('dosen_pengampu', 'dosen_pengampu.audit_matkul_id = audit_mata_kuliah_id');
      $this->db->where('jadwal_id', $jadwal);
      $this->db->where('dosen_id', $dosen);
      $query = $this->db->get('hasil_audit_matkul')->row();

      return $query;
      # code...
    }

    public function cek_audit($jadwal, $matkul)
    {
      $this->db->select('*');
      $this->db->from('audit_matakuliah');
      $this->db->where('jadwal_id', $jadwal);
      $this->db->where('matkul_id', $matkul);
      $query = $this->db->get();

      return $query->num_rows();
      # code...
    }

    public function filter_audit_matkul($jadwal, $id)
    {
      $this->db->select('*');
      $this->db->from('audit_matakuliah');
      $this->db->where('jadwal_id', $jadwal);
      $this->db->where('program_studi_id', $id);
      $this->db->join('mata_kuliah', 'mata_kuliah.id_mata_kuliah = audit_matakuliah.matkul_id');
      $this->db->join('kurikulum', 'kurikulum.id_kurikulum = mata_kuliah.kurikulum_id');
      $this->db->join('jadwal_audit', 'jadwal_audit.id_jadwal = audit_matakuliah.jadwal_id');
      $this->db->join('semester', 'semester.id_semester = jadwal_audit.semester_id');
      $this->db->join('tahun_akademik', 'tahun_akademik.id_tahun_akademik = jadwal_audit.tahun_akademik_id');
      
      $query = $this->db->get();

      return $query->result_array();
    }
      
}
