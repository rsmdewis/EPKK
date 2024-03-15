<?php

class M_kinerja extends CI_Model {

    function getAlldasawisma() {
        $query = $this->db->get('view_dasawisma');
        return $query->result();
    }

    public function HitungRecord($tbl) {


        $kd_desa = $this->session->userdata('kd_desa');
        $kd_kecamatan = $this->session->userdata('kd_kec');
        $sts = $this->session->userdata('sts');

        if ($sts == "0") {
            $this->db->where('tbl_keluarga.kd_desa', $kd_desa);
        }
        if ($sts == "1") {
            $this->db->where('tbl_keluarga.kd_kec', $kd_kecamatan);
        }

        $query = $this->db->get($tbl);
        echo $query->num_rows();
    }

    public function HitungRecordBiodata() {


        $kd_desa = $this->session->userdata('kd_desa');
        $kd_kecamatan = $this->session->userdata('kd_kec');
        $sts = $this->session->userdata('sts');

        $this->db->select('*');
        $this->db->from("tbl_keluarga");

        $this->db->join('tbl_biodata', 'tbl_keluarga.nort = tbl_biodata.nort');

        if ($sts == "0") {
            $this->db->where('tbl_keluarga.kd_desa', $kd_desa);
        }
        if ($sts == "1") {
            $this->db->where('tbl_keluarga.kd_kec', $kd_kecamatan);
        }

        $query = $this->db->get();
        echo $query->num_rows();
    }

    public function getKeluarga($sts) {
        $kd_desa = $this->session->userdata('kd_desa');
        $kd_kecamatan = $this->session->userdata('kd_kec');

        $this->db->select('*');
        $this->db->from("tbl_dasawisma");
        $this->db->join('tbl_keluarga', 'tbl_keluarga.iddasawisma = tbl_dasawisma.iddasawisma');
        $this->db->join('tbl_biodata', 'tbl_keluarga.nik = tbl_biodata.nik');

        if ($sts == "0") {
            $this->db->where('tbl_keluarga.kd_desa', $kd_desa);
        }
        if ($sts == "1") {
            $this->db->where('tbl_keluarga.kd_kec', $kd_kecamatan);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function detail_Keluarga2($nort) {
        $this->db->select('*');
        $this->db->from("tbl_keluarga");
        $this->db->where('nort', $nort);
        $query = $this->db->get();
        return $query->result();
    }

    public function detail_biodata($nort) {
        $this->db->select('*');
        $this->db->from("view_biodata");
        $this->db->where('nort', $nort);
        $query = $this->db->get();
        return $query->result();
    }

    public function detailKeluarga($nort) {
        $this->db->select('*');
        $this->db->from("tbl_dasawisma");
        $this->db->join('tbl_keluarga', 'tbl_keluarga.iddasawisma = tbl_dasawisma.iddasawisma');
        $this->db->join('tbl_biodata', 'tbl_keluarga.nort = tbl_biodata.nort');
        $this->db->join('tbl_hub', 'tbl_hub.idHub = tbl_biodata.idstatuskeluarga');
        $this->db->join('tbl_stskawin', 'tbl_stskawin.idstskawin = tbl_biodata.idstatusperkawinan');
        $this->db->join('tbl_pendidikan', 'tbl_pendidikan.idpendidikan = tbl_biodata.idpendidikan');
        $this->db->join('tbl_pekerjaan', 'tbl_pekerjaan.idpekerjaan = tbl_biodata.idpekerjaan');
        $this->db->join('tbl_jk', 'tbl_jk.idjk = tbl_biodata.jk');

        $this->db->join('akseptor_kb', 'akseptor_kb.idakseptorkb = tbl_biodata.akseptorkb');
        $this->db->join('aktif_posyandu', 'aktif_posyandu.idaktifposyandu = tbl_biodata.k_posyandu');
        $this->db->join('kelompok_belajar', 'kelompok_belajar.idkelompokbelajar = tbl_biodata.idkelompokbelajar');
        $this->db->join('mengikuti_paud', 'mengikuti_paud.idmengikutipaud = tbl_biodata.paud');
        $this->db->join('tbl_tabungan', 'tbl_tabungan.idtabungan = tbl_biodata.tabungan');
        $this->db->join('mengikuti_bpkb', 'mengikuti_bpkb.idbpkb = tbl_biodata.b_balita');
        $this->db->join('sts_koperasi', 'sts_koperasi.idkoperasi = tbl_biodata.koperasi');

        $this->db->join('tbl_pus', 'tbl_pus.idpus = tbl_biodata.idpus');
        $this->db->join('tbl_wus', 'tbl_wus.idwus = tbl_biodata.idwus');
        $this->db->join('tbl_hamil', 'tbl_hamil.idhamil = tbl_biodata.idhamil');


        $this->db->join('tbl_susu', 'tbl_susu.idsusu = tbl_biodata.idsusu');
        $this->db->join('tbl_buta', 'tbl_buta.idbuta = tbl_biodata.idbuta');
        $this->db->join('tbl_lansia', 'tbl_lansia.idlansia = tbl_biodata.idlansia');


        $this->db->join('tbl_agama', 'tbl_agama.idagama = tbl_biodata.idagama');
        $this->db->join('tbl_aktifitas', 'tbl_aktifitas.idaktifitas = tbl_keluarga.aktifitas');
        $this->db->join('tbl_beras', 'tbl_beras.idberas = tbl_keluarga.beras');
        $this->db->join('jamban_keluarga', 'jamban_keluarga.idjambankeluarga = tbl_keluarga.jamban');
        $this->db->join('sumber_air', 'sumber_air.idsumberair = tbl_keluarga.sumber_air');
        $this->db->join('tbl_stiker', 'tbl_stiker.idstiker = tbl_keluarga.stiker');
        $this->db->join('tbl_tps', 'tbl_tps.idtps = tbl_keluarga.tps');
        $this->db->join('tbl_spl', 'tbl_spl.idspl = tbl_keluarga.saluran_limbah');
        $this->db->join('kriteria_rumah', 'kriteria_rumah.idkriteriarumah = tbl_keluarga.kriteria_rumah');
        $this->db->where('tbl_biodata.nort', $nort);
        $query = $this->db->get();
        return $query->result();
    }

    function getAllkegiatan($rek_program = null) {

        if ($rek_program) {
            $query = $this->db->where('rek_program', $rek_program);
        }
        $query = $this->db->get('tbl_kegiatan');
        return $query->result();
    }

    function getMaster($tbl) {
        $query = $this->db->get($tbl);
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

    function UpdateData($table, $data, $id, $kunci) {

        $this->db->where($kunci, $id);
        $this->db->update($table, $data);
    }

    function UpdateMaster($table, $data, $id) {

        $this->db->where("AutoId", $id);
        $this->db->update($table, $data);
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
