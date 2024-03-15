<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('M_kinerja');
        //if ($this->session->userdata['login'] != 'login') {
        //redirect('C_login');
        //$tes = $this->session->userdata['login'];
        //echo $tes;
        //}
    }

    public function index() {


        $nama_dasawisma = $this->session->userdata('nama_dasawisma');

        if ($nama_dasawisma == "") {

            redirect('C_login');
        } else {

            $data['t_dasawisma'] = $this->db->count_all_results('tbl_dasawisma');
            $data['t_kk'] = $this->db->count_all_results('tbl_keluarga');
            $data['t_biodata'] = $this->db->count_all_results('tbl_biodata');
            $this->load->view('config/head_config');
            $this->load->view('config/header');
            $this->load->view('config/menu');
            $this->load->view('dashboard/dashboard', $data);
            $this->load->view('config/footer_config');
        }
    }

    public function dasawisma() {
        $data['dasawisma'] = $this->M_kinerja->getAlldasawisma();
        $data['kecamatan'] = $this->M_kinerja->getAllkecamatan();
        $data['desa'] = $this->M_kinerja->getAlldesa();
        $this->load->view('config/head_config');
        $this->load->view('config/header');
        $this->load->view('config/menu');
        $this->load->view('master/dasa', $data);
        $this->load->view('config/footer_config');
    }

    public function biodata() {
        $data['agama'] = $this->M_kinerja->getMaster('tbl_agama');
        $data['hub'] = $this->M_kinerja->getMaster('tbl_hub');
        $data['pekerjaan'] = $this->M_kinerja->getMaster('tbl_pekerjaan');
        $data['kawin'] = $this->M_kinerja->getMaster('tbl_stskawin');
        $data['pendidikan'] = $this->M_kinerja->getMaster('tbl_pendidikan');
        $data['kecamatan'] = $this->M_kinerja->getAllkecamatan();
        $data['desa'] = $this->M_kinerja->getAlldesa();
        $this->load->view('config/head_config');
        $this->load->view('config/header');
        $this->load->view('config/menu');
        $this->load->view('master/kk', $data);
        $this->load->view('config/footer_config');
    }

    public function rekap() {
        $data['agama'] = $this->M_kinerja->getMaster('tbl_agama');
        $data['hub'] = $this->M_kinerja->getMaster('tbl_hub');
        $data['pekerjaan'] = $this->M_kinerja->getMaster('tbl_pekerjaan');
        $data['kawin'] = $this->M_kinerja->getMaster('tbl_stskawin');
        $data['pendidikan'] = $this->M_kinerja->getMaster('tbl_pendidikan');
        $data['kecamatan'] = $this->M_kinerja->getAllkecamatan();
        $data['desa'] = $this->M_kinerja->getAlldesa();
        $this->load->view('rekap/rekap', $data);
    }

    public function simpan_biodata() {
        $tanggal = date('Y-m-d ');
        $nort = $this->input->post('nort');
        $iddasawisma = $this->input->post('iddasawisma');
        $biodata = array(
            'nort' => $this->input->post('nort'),
            'nik' => $this->input->post('nik'),
            'iddasawisma' => $this->input->post('iddasawisma'),
            'namalengkap' => $this->input->post('nama'),
            'idstatuskeluarga' => $this->input->post('hub_dgn_kk'),
            'idstatusperkawinan' => $this->input->post('sts_kawin'),
            'jk' => $this->input->post('jen_kel'),
            'idagama' => $this->input->post('agama'),
            'tgllahir' => $this->input->post('tanggal_lahir'),
            'idpendidikan' => $this->input->post('pendidikan_terakhir'),
            'idpekerjaan' => $this->input->post('pekerjaan'),
            'tabungan' => $this->input->post('tabungan'),
            'b_balita' => $this->input->post('bina'),
            'idkelompokbelajar' => $this->input->post('belajar'),
            'akseptorkb' => $this->input->post('kb'),
            'k_posyandu' => $this->input->post('posyandu'),
            'paud' => $this->input->post('paud'),
            'koperasi' => $this->input->post('koperasi'),
            'jeniskoperasi' => $this->input->post('jeniskoperasi'),
            'idpus' => $this->input->post('pus'),
            'idwus' => $this->input->post('wus'),
            'idhamil' => $this->input->post('hamil'),
            'idsusu' => $this->input->post('susu'),
            'idbuta' => $this->input->post('buta'),
            'idlansia' => $this->input->post('lansia'),
            'create_date' => $tanggal
        );


        $this->M_kinerja->TambahData('tbl_biodata', $biodata);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
		    	Data Indikator Program berhasil ditambahkan
		    	</div>');

        redirect('Home/detail_keluarga/' . $nort . '/' . $iddasawisma);
    }

    public function UpdateDasa() {

        $iddasawisma = $this->input->post('iddasawisma');

        $dasawisma = array(
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            'nama_dasawisma' => $this->input->post('nama_dasawisma')
        );


        $this->M_kinerja->UpdateData('tbl_dasawisma', $dasawisma, $iddasawisma, 'iddasawisma');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
		    	Data berhasil disimpan
		    	</div>');


        $this->dasawisma();
    }

    public function edit_biodata() {
        $tanggal = date('Y-m-d ');
        $nik = $this->input->post('nik');
        $nort = $this->input->post('nort');
        $iddasawisma = $this->input->post('iddasawisma');

        $biodata = array(
            'nik' => $this->input->post('nik'),
            'namalengkap' => $this->input->post('nama'),
            'idstatuskeluarga' => $this->input->post('hub_dgn_kk'),
            'idstatusperkawinan' => $this->input->post('sts_kawin'),
            'jk' => $this->input->post('jen_kel'),
            'idagama' => $this->input->post('agama'),
            'tgllahir' => $this->input->post('tanggal_lahir'),
            'idpendidikan' => $this->input->post('pendidikan_terakhir'),
            'idpekerjaan' => $this->input->post('pekerjaan'),
            'tabungan' => $this->input->post('tabungan'),
            'b_balita' => $this->input->post('bina'),
            'idkelompokbelajar' => $this->input->post('belajar'),
            'akseptorkb' => $this->input->post('kb'),
            'k_posyandu' => $this->input->post('posyandu'),
            'paud' => $this->input->post('paud'),
            'koperasi' => $this->input->post('koperasi'),
            'jeniskoperasi' => $this->input->post('jeniskoperasi'),
            'idpus' => $this->input->post('pus'),
            'idwus' => $this->input->post('wus'),
            'idhamil' => $this->input->post('hamil'),
            'idsusu' => $this->input->post('susu'),
            'idbuta' => $this->input->post('buta'),
            'idlansia' => $this->input->post('lansia'),
            'update_date' => $tanggal
        );


        $this->M_kinerja->UpdateData('tbl_biodata', $biodata, $nik, 'nik');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
		    	Data berhasil disimpan
		    	</div>');


        redirect('home/detail_keluarga/' . $nort . '/' . $iddawisma);
    }

    public function list_keluarga() {
        $sts = $this->session->userdata('sts');


        $data['keluarga'] = $this->M_kinerja->getKeluarga($sts);

        $this->load->view('config/head_config');
        $this->load->view('config/header');
        $this->load->view('config/menu');
        $this->load->view('master/list_keluarga', $data);
        $this->load->view('config/footer_config');
    }

    public function detail_keluarga() {
        $nort = $this->uri->segment(3);
        //$data['keluarga'] = $this->M_kinerja->detailKeluarga($nort);
        $data['detail_keluarga'] = $this->M_kinerja->detail_Keluarga2($nort);
        $data['detail_biodata'] = $this->M_kinerja->detail_biodata($nort);
        $data['hub_keluarga'] = $this->M_kinerja->getMaster('tbl_hub');
        $data['agama'] = $this->M_kinerja->getMaster('tbl_agama');
        $data['kawin'] = $this->M_kinerja->getMaster('tbl_stskawin');
        $data['pendidikan'] = $this->M_kinerja->getMaster('tbl_pendidikan');
        $data['pekerjaan'] = $this->M_kinerja->getMaster('tbl_pekerjaan');
        $data['aktifitass'] = $this->M_kinerja->getMaster('tbl_aktifitas');
        $data['beras'] = $this->M_kinerja->getMaster('tbl_beras');

        $data['jamban_keluarga'] = $this->M_kinerja->getMaster('jamban_keluarga');
        $data['sumber_air'] = $this->M_kinerja->getMaster('sumber_air');
        $data['tbl_stiker'] = $this->M_kinerja->getMaster('tbl_stiker');
        $data['tbl_tps'] = $this->M_kinerja->getMaster('tbl_tps');
        $data['tbl_spl'] = $this->M_kinerja->getMaster('tbl_spl');
        $data['kriteria_rumah'] = $this->M_kinerja->getMaster('kriteria_rumah');

        $this->load->view('config/head_config');
        $this->load->view('config/header');
        $this->load->view('config/menu');
        $this->load->view('master/detail_keluarga', $data);
        $this->load->view('config/footer_config');
    }

    public function kegiatan() {
        $data['program'] = $this->M_kinerja->getAllprogram();
        $data['kegiatan'] = $this->M_kinerja->kegiatanJoin();
        $this->load->view('config/head_config');
        $this->load->view('config/header');
        $this->load->view('config/menu');
        $this->load->view('master/kegiatan', $data);
        $this->load->view('config/footer_config');
    }

    function get_kegiatan() {
        $id = $this->input->post('id');
        $data = $this->M_kinerja->get_kegiatan($id);
        echo json_encode($data);
    }

    function get_desa() {
        $id = $this->input->post('id');
        $data = $this->M_kinerja->get_desa($id);
        echo json_encode($data);
    }

    function hapusindikator() {
        $AutoId = $this->uri->segment(3);
        $where = array('AutoId' => $AutoId);
        $this->M_kinerja->hapus('tbl_indikator', $where);
        $this->indikator();
    }

    function simpan_keluarga() {
        $tanggal = date('Y-m-d ');
        $nort = date('dmYHis');
        $data = array(
            'nort' => $nort,
            'iddasawisma' => $this->input->post('iddasawisma'),
            'kd_kec' => $this->input->post('kd_kec'),
            'kd_desa' => $this->input->post('kd_desa'),
            'rw' => $this->input->post('rw'),
            'rt' => $this->input->post('rt'),
            'dusun' => $this->input->post('dusun'),
            'nik' => $this->input->post('nik'),
            'beras' => $this->input->post('makan_pokok'),
            'jenis_beras' => $this->input->post('jenis_beras'),
            'jamban' => $this->input->post('jamban'),
            'jml' => $this->input->post('jml_jamban2'),
            'sumber_air' => $this->input->post('sumber_air1'),
            'sumber_air_lain' => $this->input->post('sumber_air2'),
            'tps' => $this->input->post('tps'),
            'saluran_limbah' => $this->input->post('limbah'),
            'stiker' => $this->input->post('stiker'),
            'kriteria_rumah' => $this->input->post('kriteria'),
            'aktifitas' => $this->input->post('up2k'),
            'aktifitas_lain' => $this->input->post('up2k2'),
            'aktifitas_usaha_lingkungan' => $this->input->post('aktifitas'),
            'create_date' => $tanggal,
            'create_by' => $this->input->post('anggaran')
        );

        $biodata = array(
            'nort' => $nort,
            'nik' => $this->input->post('nik'),
            'iddasawisma' => $this->input->post('iddasawisma'),
            'namalengkap' => $this->input->post('nama'),
            'idstatuskeluarga' => $this->input->post('hub_dgn_kk'),
            'idstatusperkawinan' => $this->input->post('sts_kawin'),
            'jk' => $this->input->post('jen_kel'),
            'idagama' => $this->input->post('agama'),
            'tgllahir' => $this->input->post('tanggal_lahir'),
            'idpendidikan' => $this->input->post('pendidikan_terakhir'),
            'idpekerjaan' => $this->input->post('pekerjaan'),
            'tabungan' => $this->input->post('tabungan'),
            'b_balita' => $this->input->post('bina'),
            'idkelompokbelajar' => $this->input->post('belajar'),
            'akseptorkb' => $this->input->post('kb'),
            'k_posyandu' => $this->input->post('posyandu'),
            'paud' => $this->input->post('paud'),
            'koperasi' => $this->input->post('koperasi'),
            'jeniskoperasi' => $this->input->post('jeniskoperasi')
        );

        $this->M_kinerja->TambahData('tbl_keluarga', $data);
        $this->M_kinerja->TambahData('tbl_biodata', $biodata);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Data Indikator Program berhasil ditambahkan
			</div>');
        $this->list_keluarga();
    }

    function update_keluarga() {
        $tanggal = date('Y-m-d ');
        $nort = $this->input->post('nort');
        $data = array(
            'beras' => $this->input->post('makan_pokok'),
            'jenis_beras' => $this->input->post('jenis_beras'),
            'jamban' => $this->input->post('jamban'),
            'jml' => $this->input->post('jml_jamban2'),
            'sumber_air' => $this->input->post('sumber_air1'),
            'sumber_air_lain' => $this->input->post('sumber_air2'),
            'tps' => $this->input->post('tps'),
            'saluran_limbah' => $this->input->post('limbah'),
            'stiker' => $this->input->post('stiker'),
            'kriteria_rumah' => $this->input->post('kriteria'),
            'aktifitas' => $this->input->post('up2k'),
            'aktifitas_lain' => $this->input->post('up2k2'),
            'aktifitas_usaha_lingkungan' => $this->input->post('aktifitas'),
            'update_date' => $tanggal
        );


        $this->M_kinerja->UpdateData('tbl_keluarga', $data, $nort, 'nort');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
		  	Data Indikator Program berhasil ditambahkan
		  	</div>');
        $this->list_keluarga();
    }

    function Tambahdasa() {

        $data = array(
            'kd_kec' => $this->input->post('kecamatan'),
            'kd_desa' => $this->input->post('desa'),
            'rw' => $this->input->post('rw'),
            'rt' => $this->input->post('rt'),
            'nama_dasawisma' => $this->input->post('nama_dasawisma')
        );

        $this->M_kinerja->TambahData('tbl_dasawisma', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Data Dasawisma berhasil ditambahkan
			</div>');
        $this->dasawisma();
    }

    function Cetak() {
        $data['program'] = $this->M_kinerja->cetak_program();
        $this->load->view('cetak/cetak', $data);
    }

}
