<?php

class M_kinerja extends CI_Model {


    function getAllprogram() {
        $query = $this->db->get('tbl_program');
        return $query->result();
    }
	
	function getAllkegiatan($rek_program = null) {
       
	   if ($rek_program) {
			$query = $this->db->where('rek_program', $rek_program);
		}
		$query = $this->db->get('tbl_kegiatan');
        return $query->result();
    }
	
	function get_kegiatan($id){
		$hasil=$this->db->where('rek_program',$id);
		$hasil=$this->db->get('tbl_kegiatan');
		return $hasil->result();
	}
	
	function getAllsubkegiatan() {
        $query = $this->db->get('tbl_subkegiatan');
        return $query->result();
    }
	
	function getAllindikator() {
		$hasil=$this->db->where('year(tanggal)','2022');
        $query = $this->db->get('view_indikator');
        return $query->result();
    }
	
	function getAllrealisasi() {
		$query = $this->db->where('year(tanggal)','2022');
        $query = $this->db->get('realisasi');
        return $query->result();
    }
	
	
	function TambahData($table, $data){
		$this->db->insert($table,$data);
	}
	
	function UpdateMaster($table, $data, $id){
	
		$this->db->where("AutoId",$id);
		$this->db->update($table,$data);	
		
	}
	
	function UpdateKinerja($AutoId,$outcome,$indikator,$satuan,$pagu){
		$this->db->where("AutoId",$AutoId);
		$data=array(
		'outcome' =>$outcome,
		'indikator' =>$indikator,
		'satuan' =>$satuan,
		'pagu' =>$pagu);
		$this->db->update('tbl_indikator',$data);
	}
	
	
	function UpdateRealisasi($AutoID,$kinerja1,$anggaran1,$kinerja2,$anggaran2,$kinerja3,$anggaran3,$kinerja4,$anggaran4){
		$this->db->where("AutoID",$AutoID);
		$data=array(
		'kinerja1' =>$kinerja1,
		'anggaran1' =>$anggaran1,
		'kinerja2' =>$kinerja2,
		'anggaran2' =>$anggaran2,
		'kinerja3' =>$kinerja3,
		'anggaran3' =>$anggaran3,
		'kinerja4' =>$kinerja4,
		'anggaran4' =>$anggaran4);
		$this->db->update('tbl_realisasi',$data);
	}
	
}