<?php

class M_kinerja extends CI_Model {

    function getAlldasawisma() {
        $query = $this->db->get('view_dasawisma');
        return $query->result();
    }

    function getAllkegiatan($rek_program = null) {

        if ($rek_program) {
            $query = $this->db->where('rek_program', $rek_program);
        }
        $query = $this->db->get('tbl_kegiatan');
        return $query->result();
    }

 function getAllkecamatan() {

        $query = $this->db->get('mst_kec');
        return $query->result();
    }
    
     function getAlldesa() {
        $query = $this->db->get('mst_desa');
        return $query->result();
    }


    function get_kegiatan($id) {
        $hasil = $this->db->where('rek_program', $id);
        $hasil = $this->db->get('tbl_kegiatan');
        return $hasil->result();
    }


  function get_desa($id) {
        $hasil = $this->db->where('id_kec', $id);
        $hasil = $this->db->get('mst_desa');
        return $hasil->result();
    }
    
    
    function get_subkegiatan($id) {
        $hasil = $this->db->where('rek_kegiatan', $id);
        $hasil = $this->db->where('year(tanggal)', '2022');
        $hasil = $this->db->get('realisasi');
        return $hasil->result();
    }

    function summary() {
        $hasil = $this->db->select('sum(anggaran1) as t1,sum(anggaran2)as t2,sum(anggaran3)as t3,sum(anggaran4)as t4');
        $hasil = $this->db->where('year(tanggal)', '2022');
        $hasil = $this->db->get('realisasi');
        return $hasil->result();
    }

    function getAllsubkegiatan() {
        $query = $this->db->get('tbl_subkegiatan');
        return $query->result();
    }

  function pagu() {
        $hasil = $this->db->where('year(tanggal)', '2022');
        $hasil = $this->db->get('tbl_indikator');
        return $hasil->result();
    }

    function getAllindikator() {
        $hasil = $this->db->where('year(tanggal)', '2022');
        $query = $this->db->get('view_indikator');
        return $query->result();
    }

    function getAllrealisasi() {
        $query = $this->db->where('year(tanggal)', '2022');
        $query = $this->db->get('realisasi');
        return $query->result();
    }

    function TambahData($table, $data) {
        $this->db->insert($table, $data);
    }

    function hapus($table, $where) {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function UpdateMaster($table, $data, $id) {

        $this->db->where("AutoId", $id);
        $this->db->update($table, $data);
    }

    function UpdateKinerja($AutoId, $outcome, $indikator, $satuan, $pagu) {
        $this->db->where("AutoId", $AutoId);
        $data = array(
            'outcome' => $outcome,
            'indikator' => $indikator,
            'satuan' => $satuan,
            'pagu' => $pagu);
        $this->db->update('tbl_indikator', $data);
    }

    function UpdateRealisasi($AutoID, $kinerja1, $anggaran1, $kinerja2, $anggaran2, $kinerja3, $anggaran3, $kinerja4, $anggaran4, $pendorong, $penghambat, $masalah, $solusi) {
        $this->db->where("AutoID", $AutoID);
        $data = array(
            'kinerja1' => $kinerja1,
            'anggaran1' => $anggaran1,
            'kinerja2' => $kinerja2,
            'anggaran2' => $anggaran2,
            'kinerja3' => $kinerja3,
            'anggaran3' => $anggaran3,
            'kinerja4' => $kinerja4,
            'anggaran4' => $anggaran4,
            'pendorong' => $pendorong,
			'masalah' => $masalah,
			'solusi' => $solusi,
            'penghambat' => $penghambat);
        $this->db->update('tbl_realisasi', $data);
    }

    public function subkegiatanJoin() {
        $this->db->select('tbl_subkegiatan.AutoId as AutoId, tbl_subkegiatan.rek_program as rek_program, tbl_subkegiatan.rek_kegiatan as rek_kegiatan, tbl_subkegiatan.rek_subkegiatan as rek_subkegiatan'
                . ', tbl_subkegiatan.nama_subkegiatan as nama_subkegiatan, tbl_program.nama_program as nama_program, tbl_kegiatan.nama_kegiatan as nama_kegiatan');
        $this->db->from('tbl_subkegiatan');
        $this->db->join('tbl_program', 'tbl_subkegiatan.rek_program = tbl_program.rek_program', 'INNER');
        $this->db->join('tbl_kegiatan', 'tbl_subkegiatan.rek_kegiatan = tbl_kegiatan.rek_kegiatan', 'INNER');
        $query = $this->db->get();
        return $query->result();
    }

    public function kegiatanJoin() {
        $query = $this->db->get('kegiatan');
        return $query->result();
    }
    
    //Indikator program
    function getAllIndikatorProgram() {
        $this->db->select('tbl_indikator_program.AutoId as AutoId, tbl_indikator_program.Rek_program as Rek_program, tbl_indikator_program.Indikator as Indikator, tbl_indikator_program.Target as Target'
                . ', tbl_indikator_program.Satuan as Satuan, tbl_indikator_program.Anggaran as Anggaran, tbl_program.nama_program as nama_program');
        $this->db->from('tbl_indikator_program');
        $this->db->join('tbl_program', 'tbl_indikator_program.Rek_program = tbl_program.rek_program', 'INNER');
        $query = $this->db->get();
        return $query->result();
    }
    
    function UpdateIndikatorProgram($AutoId, $target, $indikator, $satuan, $anggaran, $rek_program) {
        $this->db->where("AutoId", $AutoId);
        $data = array(
            'Rek_program' => $rek_program,
            'Target' => $target,
            'Indikator' => $indikator,
            'Satuan' => $satuan,
            'Anggaran' => $anggaran);
        $this->db->update('tbl_indikator_program', $data);
    }
    
    //Indikator kegiatan
    function getAllIndikatorKegiatan() {
        $this->db->select('tbl_indikator_kegiatan.AutoId as AutoId, tbl_indikator_kegiatan.Rek_kegiatan as Rek_kegiatan, tbl_indikator_kegiatan.Indikator as Indikator, tbl_indikator_kegiatan.Target as Target'
                . ', tbl_indikator_kegiatan.Satuan as Satuan, tbl_indikator_kegiatan.Anggaran as Anggaran, tbl_kegiatan.nama_kegiatan as nama_kegiatan');
        $this->db->from('tbl_indikator_kegiatan');
        $this->db->join('tbl_kegiatan', 'tbl_indikator_kegiatan.Rek_kegiatan = tbl_kegiatan.rek_kegiatan', 'INNER');
        $query = $this->db->get();
        return $query->result();
    }
    
    function UpdateIndikatorkegiatan($AutoId, $target, $indikator, $satuan, $anggaran, $rek_kegiatan) {
        $this->db->where("AutoId", $AutoId);
        $data = array(
            'Rek_kegiatan' => $rek_kegiatan,
            'Target' => $target,
            'Indikator' => $indikator,
            'Satuan' => $satuan,
            'Anggaran' => $anggaran);
        $this->db->update('tbl_indikator_kegiatan', $data);
    }
    
    //Cetak Join
    function cetak_program() {
        $this->db->select('tbl_indikator_program.AutoId as AutoId, tbl_indikator_program.Indikator as Indikator, tbl_indikator_program.Target as Target'
                . ', tbl_indikator_program.Satuan as Satuan, tbl_indikator_program.Anggaran as Anggaran, tbl_program.nama_program as nama_program, tbl_program.rek_program as rek_program');
        $this->db->from('tbl_program');
        $this->db->join('tbl_indikator_program', 'tbl_program.rek_program = tbl_indikator_program.Rek_program', 'left');
        $query = $this->db->get();
        return $query->result();
    }
    
    function cetak_kegiatan($id) {
        $this->db->select('tbl_indikator_kegiatan.AutoId as AutoId, tbl_indikator_kegiatan.Indikator as Indikator, tbl_indikator_kegiatan.Target as Target'
                . ', tbl_indikator_kegiatan.Satuan as Satuan, tbl_indikator_kegiatan.Anggaran as Anggaran, tbl_kegiatan.nama_kegiatan as nama_kegiatan, tbl_kegiatan.rek_kegiatan as rek_kegiatan,');
        $this->db->from('tbl_kegiatan');
        $this->db->join('tbl_indikator_kegiatan', 'tbl_kegiatan.rek_kegiatan = tbl_indikator_kegiatan.Rek_kegiatan', 'left');
        $this->db->where('tbl_kegiatan.rek_program', $id);
        $query = $this->db->get();
        return $query->result();
    }

}
