<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_pengguna extends CI_Model
{

    public function cek_user($username, $password)
    {
        $this->db->select('*');
        $this->db->from("tbl_login");
        $this->db->join('tbl_dasawisma', 'tbl_login.iddasawisma = tbl_dasawisma.iddasawisma');
        $this->db->join('mst_desa', 'mst_desa.id_desa = tbl_dasawisma.kd_desa');
        $this->db->join('mst_kec', 'mst_desa.id_kec = mst_kec.id_kec');
        $this->db->where("password", $password);
        $this->db->where("username", $username);
        $query = $this->db->get();
        return $query;
    }
}
