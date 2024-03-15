<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            TAMBAH BIODATA
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

                <?php
                echo form_open_multipart("Data/simpan");
                ?>
                <div class="panel panel-primary">

                    <div class="panel-heading">
                        I.I. BIODATA
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
                                        <input type="text" required="" class="form-control" placeholder="Nomor Induk Keluarga" name="nik" onkeyup="getNik()">
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
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-8">
                            <div class="col-md-12 col-sm-8">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>AGAMA</label>
                                        <select class="form-control" name="agama" id="agama">

                                            <option value="1">ISLAM</option>
                                            <option value="2">KRISTEN</option>
                                            <option value="3">KATOLIK</option>
                                            <option value="4">BUDHA</option>
                                            <option value="5">KONGHUCU</option>
                                            <option value="6">LAINNYA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-8">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>PENDIDIKAN TERAKHIR</label>
                                        <select class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir">

                                            <option value="1">TDK TAMAT SD/MI</option>
                                            <option value="2">MASIH SD/SMI</option>
                                            <option value="3">TAMAT SD/MI</option>
                                            <option value="4">MASIH SLTP/MTSN</option>
                                            <option value="5">TAMAT SLTP/MTSN</option>
                                            <option value="6">MASIH SLTA/MA</option>
                                            <option value="7">TAMAT SLTA/MA</option>
                                            <option value="8">MASIH PT/AKADEMI</option>
                                            <option value="9">TAMAT PT/AKADEMI</option>
                                            <option value="10">TIDAK/BELUM SEKOLAH</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-8">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>PEKERJAAN</label>
                                        <select class="form-control" name="pekerjaan" id="pekerjaan">

                                            <option value="1">PETANI</option>
                                            <option value="2">NELAYAN</option>
                                            <option value="3">PEDAGANG</option>
                                            <option value="4">PNS/TNI/POLRI</option>
                                            <option value="5">PEGAWAI SWASTA</option>
                                            <option value="6">WIRASWASTA</option>
                                            <option value="7">PENSIUNAN</option>
                                            <option value="8">PEKERJA LEPAS</option>
                                            <option value="9">LAINNYA</option>
                                            <option value="10">TIDAK/BELUM BEKERJA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-8">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>STATUS KAWIN</label>
                                        <select class="form-control" name="sts_kawin" id="sts_kawin">

                                            <option value="1">BELUM KAWIN</option>
                                            <option value="2">KAWIN</option>
                                            <option value="3">JANDA/DUDA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-8">

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