<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_pengguna extends CI_Model {

    public function cek_user($username,$password) {
        $this->db->select('*');
        $this->db->from("tbl_login");
        $this->db->where("password", $password);
        $this->db->where("username" , $username);
        $query = $this->db->get();
        return $query;
    }
}
