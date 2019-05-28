<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Borang_model extends CI_Model {

    public function __construct()
    {
        parent:: __construct();
        $this->load->database();
    }

    public function get_borang()
    {
        $this->db->select('*');
        $this->db->from('borang');
        $this->db->join('aspek_penilaian','aspek_penilaian.id_aspek_penilaian = borang.aspek_penilaian_id', 'left');
        $this->db->order_by('aspek_penilaian_id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
        # code...
    }
    

    public function get_borang_aktif()
    {
        $this->db->select('*');
        $this->db->from('jenis_borang');
        //$this->db->where('status', 1);
        $this->db->order_by('status', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
        # code...
    }

    public function get_instrumen()
    {
        $this->db->select('*');
        $this->db->from('jenis_borang');
        $this->db->where('status', 1);
        $this->db->order_by('status', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
        # code...
    }

    public function get_borang_praktikum()
    {
            $this->db->select('*');
            $this->db->from('borang_praktikum');
            $this->db->join('jenis_borang', 'jenis_borang.id_jenis_borang = borang_praktikum.jenis_borang_praktikum_id');
            $query = $this->db->get();
            return $query->result_array();
    }

    public function get_jenis_borang_praktikum()
    {
            $this->db->select('*');
            $this->db->from('jenis_borang_praktikum');
            $this->db->join('jenis_borang', 'jenis_borang.id_jenis_borang = jenis_borang_praktikum.jenis_borang_id');
            $query = $this->db->get();
            return $query->result_array();
    }

    public function act_edit_pertanyaan($data, $id)
    {
        $this->db->where('id_borang', $id);
        return $this->db->update('borang', $data);
        # code...
    }

    public function act_edit_pertanyaan_praktikum($data, $id)
    {
        $this->db->where('id_borang_praktikum', $id);
        return $this->db->update('borang_praktikum', $data);
        # code...
    }

    public function act_edit_opsi($data, $id)
    {
        $this->db->where('id_opsi', $id);
        return $this->db->update('multiple_choice', $data);
        # code...
    }

    public function act_edit_opsi_praktikum($data, $id)
    {
        $this->db->where('id_opsi_praktikum', $id);
        return $this->db->update('multiple_choice_praktikum', $data);
        # code...
    }

    public function get_aspek()
    {
        $this->db->select('*');
        $this->db->from('aspek_penilaian');
        $this->db->join('jenis_borang', 'jenis_borang.id_jenis_borang = aspek_penilaian.jenis_borang_id');
        $query = $this->db->get();
        return $query->result_array();
        # code...
    }
    public function get_aspek_praktikum()
    {
        $this->db->select('*');
        $this->db->from('aspek_penilaian_praktikum');
        $this->db->join('jenis_borang', 'jenis_borang.id_jenis_borang = aspek_penilaian_praktikum.jenis_borang_praktikum_id', 'left');
        $query = $this->db->get();
        return $query->result_array();
        # code...
    }

    public function insert_data($table,$data)
    {
            return $this->db->insert($table,$data);
    }

    public function insert($data)
    {
        $this->db->insert('jenis_borang', $data);
        return $this->db->insert_id();

    }

    public function act_edit_praktikum($data, $id){
        $this->db->where('id_borang_praktikum', $id);
        return $this->db->update('borang_praktikum', $data);
    }

    public function act_edit_aspek($data, $id){
        $this->db->where('id_aspek_penilaian', $id);
        return $this->db->update('aspek_penilaian', $data);
    }

    public function act_edit_aspek_praktikum($data, $id){
        $this->db->where('id_aspek_penilaian_p', $id);
        return $this->db->update('aspek_penilaian_praktikum', $data);
    }

    public function update_jenis_borang($id)
    {
        $this->db->select('*');
        $this->db->from('jenis_borang');
        $this->db->where('id_jenis_borang', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function act_edit_jenis_borang($data, $id)
    {
        $this->db->where('id_jenis_borang', $id);
        return $this->db->update('jenis_borang', $data);
    }

    public function act_hapus_aspek($id)
    {
        $this->db->where('id_aspek_penilaian', $id);
        return $this->db->delete('aspek_penilaian');
        # code...
    }

    public function act_hapus_aspek_praktikum($id)
    {
        $this->db->where('id_aspek_penilaian_p', $id);
        return $this->db->delete('aspek_penilaian_praktikum');
        # code...
    }

    public function act_hapus_pertanyaan($id)
    {
        $this->db->where('id_borang', $id);
        return $this->db->delete('borang');
        # code...
    }

    public function act_hapus_pertanyaan_praktikum($id)
    {
        $this->db->where('id_borang_praktikum', $id);
        return $this->db->delete('borang_praktikum');
        # code...
    }

    public function get_aspek_id($id)
    {
        $this->db->select('*');
        $this->db->from('aspek_penilaian');
        $this->db->where('jenis_borang_id', $id);
        $query = $this->db->get();
        return $query->result();
        # code...
    }

    public function get_aspek_praktikum_id($id)
    {
        $this->db->select('*');
        $this->db->from('aspek_penilaian_praktikum');
        $this->db->where('jenis_borang_praktikum_id', $id);
        $query = $this->db->get();
        return $query->result();
        # code...
    }
    
    public function tambah_borang($table, $data)
    {
        $query = $this->db->insert($table,$data);
        return $this->db->insert_id();
    }

    public function tambah_opsi($table, $data)
    {
        return $this->db->insert($table,$data);
    }

    public function act_jenis_borang($table, $data)
    {
        return $this->db->insert($table,$data);
    }

    public function get_jenis_borang()
    {
        $this->db->select('*');
        $this->db->from('jenis_borang');
        $this->db->order_by('id_jenis_borang', 'DESC');

        $query = $this->db->get();
        return $query->result_array();
        # code...
    }

    public function lihat_borang($id)
    {
        $this->db->select('*');
        $this->db->from('jenis_borang');
        $this->db->where('id_jenis_borang', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function atur_borang($id)
    {
        $this->db->select('*');
        $this->db->from('jenis_borang');
        $this->db->where('id_jenis_borang', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function detail_borang($id)
    {
        $this->db->select('*');
        $this->db->from('borang');
        $this->db->where('id_borang', $id);
        $query = $this->db->get();
        return $query->row_array();  
    }

    public function detail_borang_praktikum($id)
    {
        $this->db->select('*');
        $this->db->from('borang_praktikum');
        $this->db->where('id_borang_praktikum', $id);
        $query = $this->db->get();
        return $query->row_array();  
    }

    public function edit_aspek($id)
    {
        $this->db->select('*');
        $this->db->from('aspek_penilaian');
        $this->db->where('id_aspek_penilaian', $id);
        $query = $this->db->get();
        return $query->row_array();
        # code...
    }

    public function edit_aspek_praktikum($id)
    {
        $this->db->select('*');
        $this->db->from('aspek_penilaian_praktikum');
        $this->db->where('id_aspek_penilaian_p', $id);
        $query = $this->db->get();
        return $query->row_array();
        # code...
    }

    public function get_jawaban()
    {
        
        $this->db->select('*');
        $this->db->from('multiple_choice');
        $this->db->join('borang','borang.id_borang = multiple_choice.borang_id');
        $this->db->order_by('id_opsi', 'ASC');
        
        $query = $this->db->get();
        return $query->result_array();
        # code...
    }

    public function get_jawaban_praktikum()
    {
        
        $this->db->select('*');
        $this->db->from('multiple_choice_praktikum');
        $this->db->join('borang_praktikum','borang_praktikum.id_borang_praktikum = multiple_choice_praktikum.borang_praktikum_id');
        $this->db->order_by('id_opsi_praktikum', 'ASC');
        
        $query = $this->db->get();
        return $query->result_array();
        # code...
    }
}
