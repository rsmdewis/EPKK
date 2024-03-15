<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_login extends CI_Controller
{

    public function index()
    {
        //        $this->load->view('maintenance');
        $this->load->view('v_login');
    }

    public function cek_login()
    {
        $username = $this->input->post('username', TRUE);
        $password = md5($this->input->post('password', TRUE));
        $this->load->model('m_pengguna');
        $hasil = $this->m_pengguna->cek_user($username, $password);
        if ($hasil->num_rows() == 1) {
            foreach ($hasil->result() as $sess) {
                $sess_data['idlogin'] = $sess->idlogin;
                $sess_data['id_role'] = $sess->id_role;
                $sess_data['namalengkap'] = $sess->namalengkap;
                $sess_data['alamat'] = $sess->alamat;
                $sess_data['notelp'] = $sess->notelp;
                $sess_data['email'] = $sess->email;
                $sess_data['nama_dasawisma'] = $sess->nama_dasawisma;
                $sess_data['kd_kec'] = $sess->kd_kec;
                $sess_data['sts'] = $sess->sts;
                $sess_data['nm_kec'] = $sess->nm_kec;
                $sess_data['kd_desa'] = $sess->kd_desa;
                $sess_data['nm_desa'] = $sess->nm_desa;
                $sess_data['iddasawisma'] = $sess->iddasawisma;
                $sess_data['rt'] = $sess->rt;
                $sess_data['rw'] = $sess->rw;
                $this->session->set_userdata($sess_data);
            }
            redirect('Home');
        } else {
            redirect('C_login/index?err=0');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nama_dasawisma');
        $this->session->unset_userdata('kd_kec');
        $this->session->unset_userdata('kd_desa');
        $this->session->unset_userdata('iddasawisma');
        session_destroy();
        redirect('C_login');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */