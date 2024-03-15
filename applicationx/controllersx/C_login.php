<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_login extends CI_Controller {

    public function index() {
//        $this->load->view('maintenance');
        $this->load->view('v_login');
    }

    public function cek_login() {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        $this->load->model('m_pengguna');
        $hasil = $this->m_pengguna->cek_user($username,$password);
        if ($hasil->num_rows() == 1) {
            foreach ($hasil->result() as $sess) {
                $sess_data['namalengkap'] = $sess->namalengkap;
                $sess_data['ontelp'] = $sess->ontelp;
                $sess_data['email'] = $sess->email;
                $sess_data['iddasawisma'] = $sess->iddasawisma;
                $this->session->set_userdata($sess_data);
            }
            redirect('Home');
        } else {
            redirect('C_login/index?err=0');
        }
    }

    public function logout() {
        $this->session->unset_userdata('ID');
        $this->session->unset_userdata('LEVEL');
        $this->session->unset_userdata('NAMA');
        $this->session->unset_userdata('login');
        session_destroy();
        redirect('C_login');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */