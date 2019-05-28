<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public $table       = 'user';
    public $id          = 'user.id_user';

    public function __construct()
    {
        parent::__construct();
    }


    public function login($username, $password)
    {
        $query = $this->db->get_where('user', array('username'=>$username, 'password'=>$password));
        return $query->row_array();
    }

    public function check_account($username)
    {
        //cari username lalu lakukan validasi
        $this->db->where('username', $username);
        $query = $this->db->get($this->table)->row();

        //jika bernilai 1 maka user tidak ditemukan
        if (!$query) {
            return 1;
        }
        //jika bernilai 2 maka user tidak aktif
        if ($query->status == 0) {
            return 2;
        }
        //jika bernilai 3 maka password salah
        if (!hash_verified($this->input->post('password'), $query->password)) {
            return 3;
        }

        return $query;
    }

    function account(){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('role','role.id_role = user.role_id');
        //$this->db->where('tbl_role.id');
		    return $this->db->get();
    }

    public function insert_data($table_name, $new_data){
		    $query = $this->db->insert($table_name, $new_data);
	  }

    public function update_data($table_name, $colomn_name, $parameter, $new_data){
		    $this->db->where($colomn_name, $parameter);
		      $query = $this->db->update($table_name, $new_data);
		        return $query;
	  }

    public function logout($date, $id)
    {
        $this->db->where('user.id_user', $id);
        $this->db->update('user', $date);
    }

}
