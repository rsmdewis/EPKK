<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            TAMBAH KELUARGA
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Admin</a></li>
            <li class="active">Tambah Data KB</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php
        $ID = $this->session->userdata('ID');
        $LEVEL = $this->session->userdata('LEVEL');
        $KODE_KEC = $this->session->userdata('KODE_KEC');
        $KODE_DESA = $this->session->userdata('KODE_DESA');
        $NAMA_SKPD = $this->session->userdata('NAMA_SKPD');
        $NAMA_KEC = $this->session->userdata('NAMA_KEC');
        $NAMA_DESA = $this->session->userdata('NAMA_DESA');
        $data = $this->session->flashdata('sukses');
        if ($data != "") {
        ?>
            <div id="notifikasi" class="alert alert-success"><strong>Sukses! </strong> <?= $data; ?></div>
        <?php } ?>
        <?php
        $data2 = $this->session->flashdata('error');
        if ($data2 != "") {
        ?>
            <div id="notifikasi" class="alert alert-danger"><strong> Error! </strong> <?= $data2; ?></div>
        <?php } ?>
        <div class="box">
            <div class="box-body">

                <form action="<?php echo base_url('Home/simpan_keluarga'); ?>" method="post">
                    <div class="panel panel-primary">
                        <?php //print_r($this->session->userdata())
                        ?>
                        <div class="panel-heading">
                            I.I. DATA WILAYAH
                        </div>
                        <div class="panel-body">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Nama Dasawisma</label>
                                    <input type="text" required="" class="form-control" name="dasawisma" value="<?php echo $this->session->userdata('nama_dasawisma'); ?>" readonly>
                                    <input type="hidden" required="" class="form-control" name="iddasawisma" value="<?php echo $this->session->userdata('iddasawisma'); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Desa/Kelurahan</label>
                                    <select name="desa" class="form-control" <?php if ($this->session->userdata('id_role') != 2 && $this->session->userdata('id_role') != 1) { ?>readonly<?php } ?>>
                                        <?php if ($this->session->userdata('id_role') != 1 && $this->session->userdata('id_role') != 2) { ?>
                                            <option value="<?php echo $this->session->userdata('kd_desa') ?>"><?php echo $this->session->userdata('nm_desa') ?></option>
                                            <?php
                                        } else {
                                            foreach ($desabyid as $row) {
                                            ?>
                                                <option value="<?php echo $row->id_desa ?>"><?php echo $row->nm_desa ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                    <input type="hidden" name="kd_desa" value="<?php echo $this->session->userdata('kd_desa'); ?>">
                                    <!-- <input type="text" required="" class="form-control" name="desa" value="<?php //echo $this->session->userdata('nm_desa');
                                                                                                                ?>" <?php //if ($this->session->userdata('id_role') != 2 && $this->session->userdata('id_role') != 1) { 
                                                                                                                                                                        ?>readonly<?php //} 
                                                                                                                                                                                                                                                                                    ?>> -->
                                </div>
                                <div class="form-group">
                                    <label>RT</label>
                                    <input type="text" class="form-control" name="rt" value="<?php echo $this->session->userdata('rt'); ?>">
                                </div>
                                <div class="form-group">
                                    <label>RW</label>
                                    <input type="text" class="form-control" name="rw" value="<?php echo $this->session->userdata('rw'); ?>" <?php if ($this->session->userdata('id_role') == 5) { ?>readonly <?php } ?>>
                                </div>

                            </div>

                            <div class="col-md-6 col-sm-6">

                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <input type="hidden" name="kd_kec" value="<?php echo $this->session->userdata('kd_kec'); ?>">
                                    <input type="text" required="" class="form-control" name="kecamatan" value="<?php echo $this->session->userdata('nm_kec'); ?>" <?php if ($this->session->userdata('id_role') != 1) { ?>readonly <?php } ?>>
                                </div>
                                <div class="form-group">
                                    <label>Kab/Kota</label>
                                    <input type="text" required="" class="form-control" name="kab" value="Kabupaten Malang" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Propinsi</label>
                                    <input type="text" required="" class="form-control" name="prop" value="Jawatimur" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Dusun Lingkungan</label>
                                    <input type="text" class="form-control" name="dusun">
                                </div>
                            </div>

                        </div>

                        <div class="panel-heading">
                            I.II. DATA KELUARGA
                        </div>
                        <div class="panel-body">
                            <div class="col-md-6 col-sm-8">
                                <div class="col-md-6 col-sm-12">

                                </div>
                                <div class="col-md-6 col-sm-12">

                                </div>
                                <div class="col-md-12 col-sm-8">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input type="text" required="" class="form-control" placeholder="Nomor Induk Keluarga" name="nik" onkeyup="getNik()" maxlength="16">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-8">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>NAMA LENGKAP</label>
                                            <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" name="nama">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-8">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>TANGGAL LAHIR</label>
                                            <input type="date" required="" class="form-control" id="tahun_lahir" placeholder="Tanggal Lahir" name="tanggal_lahir">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-8">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>HUBUNGAN DENGAN KK</label>
                                            <select class="form-control" name="hub_dgn_kk" id="hub_dgn_kk">
                                                <option value="1">KEPALA KELUARGA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-8">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>JENIS KELAMIN</label>
                                            <select class="form-control" name="jen_kel" id="jen_kel">

                                                <option value="1">LAKI-LAKI</option>
                                                <option value="2">PEREMPUAN</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>STATUS KAWIN</label>
                                            <select class="form-control" name="sts_kawin" id="sts_kawin">
                                                <?php foreach ($kawin as $kwn) {  ?>
                                                    <option value="<?php echo $kwn->idstskawin; ?>"><?php echo $kwn->nama_stskawin; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Mengikuti Program Bina Keluarga Balita</label>
                                        <select class="form-control" name="bina">

                                            <option value="1">YA</option>
                                            <option value="2">TIDAK</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Memiliki Tabungan</label>
                                        <select class="form-control" name="tabungan">

                                            <option value="1">YA</option>
                                            <option value="2">TIDAK</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Mengikuti Kelompok Belajar</label>
                                        <select class="form-control" name="belajar">

                                            <option value="1">YA</option>
                                            <option value="2">TIDAK</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="col-md-12 col-sm-8">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>AGAMA</label>
                                            <select class="form-control" name="agama" id="agama">
                                                <?php foreach ($agama as $agm) {  ?>
                                                    <option value="<?php echo $agm->idagama; ?>"><?php echo $agm->nama_agama; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-8">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>PENDIDIKAN TERAKHIR</label>
                                            <select class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir">
                                                <?php foreach ($pendidikan as $pdk) {  ?>
                                                    <option value="<?php echo $pdk->idpendidikan; ?>"><?php echo $pdk->nama_pendidikan; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-8">

                                    <div class="form-group">
                                        <label>PEKERJAAN</label>
                                        <select class="form-control" name="pekerjaan" id="pekerjaan">
                                            <?php foreach ($pekerjaan as $pkj) {  ?>
                                                <option value="<?php echo $pkj->idpekerjaan; ?>"><?php echo $pkj->nama_pekerjaan; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Akseptor KB</label>
                                        <select class="form-control" name="kb">

                                            <option value="1">YA</option>
                                            <option value="2">TIDAK</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Aktif dalam kegiatan posyandu</label>
                                        <select class="form-control" name="posyandu">

                                            <option value="1">YA</option>
                                            <option value="2">TIDAK</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Mengikuti PAUD/Sejenis</label>
                                        <select class="form-control" name="paud">

                                            <option value="1">YA</option>
                                            <option value="2">TIDAK</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Ikut Dalam Kegiatan Koperasi</label>
                                        <select class="form-control" name="koperasi">

                                            <option value="1">YA</option>
                                            <option value="2">TIDAK</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Koperasi</label>
                                        <input type="text" class="form-control" name="jeniskoperasi">
                                    </div>
                                </div>

                            </div>



                        </div>

                        <div class="panel-heading">
                            I.I. DATA PRIMER
                        </div>
                        <div class="panel-body">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Makanan Pokok Sehari-Hari</label>
                                    <select class="form-control" name="makan_pokok">

                                        <option value="1">Beras</option>
                                        <option value="2">Non Beras</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jenis (selain Beras)</label>
                                    <input type="text" class="form-control" name="jenis_beras">
                                </div>
                                <div class="form-group">
                                    <label>Mempunyai Jamban Keluarga</label>
                                    <select class="form-control" name="jamban">

                                        <option value="1">Ya</option>
                                        <option value="2">Tidak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Jamban</label>
                                    <input type="text" class="form-control" name="jml_jamban2" required>
                                </div>
                                <div class="form-group">
                                    <label>Sumber Air Keluarga</label>
                                    <select class="form-control" name="sumber_air1">

                                        <option value="1">Pdam</option>
                                        <option value="2">Sumur</option>
                                        <option value="2">Sungai</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Lainnya (Sumber Air Lainnya)</label>
                                    <input type="text" class="form-control" name="sumber_air2">
                                </div>

                                <div class="form-group">
                                    <label>Memiliki Tempat Pembuangan Sampah</label>
                                    <select class="form-control" name="tps">

                                        <option value="1">Ya</option>
                                        <option value="2">Tidak</option>
                                    </select>
                                </div>

                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Mempunyai Saluran Pembuangan Limbah</label>
                                    <select class="form-control" name="limbah">

                                        <option value="1">Ya</option>
                                        <option value="2">Tidak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Menempel Stiker P4K</label>
                                    <select class="form-control" name="stiker">

                                        <option value="1">Ya</option>
                                        <option value="2">Tidak</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Kriteria Rumah</label>
                                    <select class="form-control" name="kriteria">

                                        <option value="1">Sehat</option>
                                        <option value="2">Tidak Sehat</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Aktifitas UP2K</label>
                                    <select class="form-control" name="up2k">

                                        <option value="1">Ya</option>
                                        <option value="2">Tidak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Lainnya</label>
                                    <input type="text" class="form-control" name="up2k2">
                                </div>
                                <div class="form-group">
                                    <label>Aktifitas Kegiatan Usaha Kesehatan Lingkungan</label>
                                    <select class="form-control" name="aktifitas">

                                        <option value="1">Pemanfaatan Tanah Pekarangan</option>
                                        <option value="2">Industri Rumah Tangga</option>
                                        <option value="3">Kerja Bakti</option>
                                    </select>
                                </div>
                            </div>

                        </div>



                    </div>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> Simpan</button>
                    <button type="button" class="btn btn-default">Close</button>

            </div>
            </form>
            <br><br>
            <!-- /.panel -->


        </div>
        <!-- /.box-body -->
</div>
</section>
<!-- /.content -->