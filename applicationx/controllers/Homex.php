<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

 function __construct() {
        parent::__construct();
        $this->load->model('M_kinerja');
        
    }
	
	public function index()
	{
			$data['program'] = $this->M_kinerja->getAllprogram();
			$data['kegiatan'] = $this->M_kinerja->getAllkegiatan();
			$data['subkegiatan'] = $this->M_kinerja->getAllsubkegiatan();
            $this->load->view('config/head_config');
            $this->load->view('config/header');
            $this->load->view('config/menu');
            $this->load->view('dashboard/dashboard', $data);
            $this->load->view('config/footer_config');
	}
	public function program()
	{
			$data['program'] = $this->M_kinerja->getAllprogram();
            $this->load->view('config/head_config');
            $this->load->view('config/header');
            $this->load->view('config/menu');
            $this->load->view('master/program', $data);
            $this->load->view('config/footer_config');
	}
	
	public function kegiatan()
	{
			$data['program'] = $this->M_kinerja->getAllprogram();
			$data['kegiatan'] = $this->M_kinerja->getAllkegiatan();
            $this->load->view('config/head_config');
            $this->load->view('config/header');
            $this->load->view('config/menu');
            $this->load->view('master/kegiatan', $data);
            $this->load->view('config/footer_config');
	}
	
	function get_kegiatan(){
		$id=$this->input->post('id');
		$data=$this->M_kinerja->get_kegiatan($id);
		echo json_encode($data);
	}
	
	public function subkegiatan()
	{
			$data['program'] = $this->M_kinerja->getAllprogram();
			$data['subkegiatan'] = $this->M_kinerja->getAllsubkegiatan();
            $this->load->view('config/head_config');
            $this->load->view('config/header');
            $this->load->view('config/menu');
            $this->load->view('master/subkegiatan', $data);
            $this->load->view('config/footer_config');
	}
	
	public function indikator()
	{
			$data['subkegiatan'] = $this->M_kinerja->getAllsubkegiatan();
			$data['indikator'] = $this->M_kinerja->getAllindikator();
            $this->load->view('config/head_config');
            $this->load->view('config/header');
            $this->load->view('config/menu');
            $this->load->view('indikator/indikator', $data);
            $this->load->view('config/footer_config');
	}
	
	function UpdateKinerja(){
		$AutoId = $this->input->post('AutoId');
		$outcome = $this->input->post('outcome');
        $indikator = $this->input->post('indikator');
        $satuan = $this->input->post('satuan');
		$pagu =  $this->input->post('pagu');
		$this->M_kinerja->UpdateKinerja($AutoId,$outcome,$indikator,$satuan,$pagu);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Data Indikator Kinerja Berhasil diubah
			</div>');
        $this->indikator();
	}
	
	function TambahProgram(){
	
		$data=array(
			'rek_program' => $this->input->post('norek'),
			'nama_program' => $this->input->post('program'));
			
		$this->M_kinerja->TambahData('tbl_program',$data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Data Program berhasil ditambahkan
			</div>');
        $this->program();
	}
	
	function TambahKegiatan(){
	
		$data=array(
			'rek_program' => $this->input->post('rek_program'),
			'rek_kegiatan' => $this->input->post('rek_kegiatan'),
			'nama_kegiatan' => $this->input->post('nama_kegiatan'));
			
		$this->M_kinerja->TambahData('tbl_kegiatan',$data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Data Program berhasil ditambahkan
			</div>');
        $this->Kegiatan();
	}
	
	function TambahsubKegiatan(){
	
		$data=array(
			'rek_program' => $this->input->post('kategori'),
			'rek_kegiatan' => $this->input->post('subkategori'),
			'rek_subkegiatan' => $this->input->post('rek_subkegiatan'),
			'nama_subkegiatan' => $this->input->post('nama_subkegiatan'));
			
		$this->M_kinerja->TambahData('tbl_subkegiatan',$data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Data Sub Kegiatan berhasil ditambahkan
			</div>');
        $this->subkegiatan();
	}
	
	function TambahIndikator(){
	    $tanggal = date('Y-m-d');
		$Id_indikator = date('YmdHis');;
		$data=array(
			'rek_subkegiatan' => $this->input->post('kategori'),
			'outcome' => $this->input->post('indikator'),
			'indikator' => $this->input->post('target'),
			'satuan' => $this->input->post('satuan'),
			'tanggal' => $tanggal,
			'Id_indikator' => $Id_indikator,
			'pagu' => $this->input->post('anggaran'));
		
		$realisasi=array(
		    'rek_subkegiatan' => $this->input->post('kategori'),
			'tanggal' => $tanggal,
			'Id_indikator' => $Id_indikator
		);
		
		
		$this->M_kinerja->TambahData('tbl_indikator',$data);
		$this->M_kinerja->TambahData('tbl_realisasi',$realisasi);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Data Indikator berhasil ditambahkan
			</div>');
        $this->indikator();
	}
	
	function UpdateProgram(){
	
		$AutoId = $this->input->post('AutoId');
		$data=array(
			'rek_program' => $this->input->post('rek_program'),
			'nama_program' => $this->input->post('nama_program')
			);	
		$this->M_kinerja->UpdateMaster('tbl_program', $data, $AutoId);	
	
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Data Program  Berhasil diubah
			</div>');
        $this->program();
	}
	
	function UpdateKegiatan(){
	
		$AutoId = $this->input->post('AutoId');
		$data=array(
			'rek_kegiatan' => $this->input->post('rek_kegiatan'),
			'nama_kegiatan' => $this->input->post('nama_kegiatan')
			);	
		$this->M_kinerja->UpdateMaster('tbl_kegiatan', $data, $AutoId);	
	
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Data Program  Berhasil diubah
			</div>');
        $this->kegiatan();
	}
	
	function UpdateSubKegiatan(){
	
		$AutoId = $this->input->post('AutoId');
		$data=array(
			'rek_subkegiatan' => $this->input->post('rek_subkegiatan'),
			'nama_subkegiatan' => $this->input->post('nama_subkegiatan')
			);	
		$this->M_kinerja->UpdateMaster('tbl_subkegiatan', $data, $AutoId);	
	
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Data sub kegiatan  Berhasil diubah
			</div>');
        $this->subkegiatan();
	}
	
	function UpdateRealisasi(){
		$AutoID = $this->input->post('AutoID');
		
		$kinerja1 = $this->input->post('kinerja1');
		$anggaran1 = $this->input->post('anggaran1');
		$kinerja2 = $this->input->post('kinerja2');
		$anggaran2 = $this->input->post('anggaran2');
		$kinerja3 = $this->input->post('kinerja3');
		$anggaran3 = $this->input->post('anggaran3');
		$kinerja4 = $this->input->post('kinerja4');
		$anggaran4 = $this->input->post('anggaran4');

		$this->M_kinerja->UpdateRealisasi($AutoID,$kinerja1,$anggaran1,$kinerja2,$anggaran2,$kinerja3,$anggaran3,$kinerja4,$anggaran4);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Data Indikator Kinerja Berhasil diubah
			</div>');
        $this->realisasi();
	}
	
	public function realisasi()
	{
			$data['realisasi'] = $this->M_kinerja->getAllrealisasi();
            $this->load->view('config/head_config');
            $this->load->view('config/header');
            $this->load->view('config/menu');
            $this->load->view('realisasi/realisasi', $data);
            $this->load->view('config/footer_config');
	}

}
