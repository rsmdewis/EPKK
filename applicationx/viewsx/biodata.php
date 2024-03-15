<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            TAMBAH DATA KELUARGA BERENCANA
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

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">TAMBAH PENDUDUK</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <?php
                echo form_open_multipart("Data/simpan");
                ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        I. KEPENDUDUKAN
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12 col-sm-2">
                            <div class="form-group">
                                <label>Nomor Kendali / Nomor KK</label>
                                <input type="text" required="" class="form-control" id="alamat" placeholder="Nomer Kendali Referensi" name="nomor_kendali_ref">
                            </div>
                            <div class="form-group">
                                <label>Nomor Urut Keluarga  </label>
                                <input type="number" class="form-control" id="no_urt" placeholder="Nomor Urut Rumah Tangga" name="no_urt">
                            </div>
                        </div>
                    </div>

                    <div class="panel-heading">
                        I.I. DATA KELUARGA
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6 col-sm-8">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <select class="form-control" id="kecamatan" name="kecamatan">
                                        <?php
                                        if ($LEVEL == 1 || $LEVEL == 2) {
                                            foreach ($kecamatan as $value) {
                                                echo "<option value=\"$value->kode_kec\">" . strtoupper($value->nama_kec) . "</option>";
                                            }
                                        } elseif ($LEVEL == 3) {
                                            echo "<option value=\"$KODE_KEC\">" . strtoupper($NAMA_KEC) . "</option>";
                                        } else {
                                            echo "<option value=\"$KODE_KEC\">" . strtoupper($NAMA_KEC) . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Desa</label>
                                    <?php
                                    if ($LEVEL == 1 || $LEVEL == 2) {
                                        echo "<select class=\"form-control\" id=\"desa\" name=\"desa\">";
                                    } elseif ($LEVEL == 3) {
                                        echo "<select class=\"form-control\" id=\"desa\" name=\"desa\">";
                                    } else {
                                        echo "<select class=\"form-control\" id=\"desa2\" name=\"desa\">";
                                        echo "<option value=\"$KODE_DESA\" selected>" . strtoupper($NAMA_DESA) . "</option>";
                                    }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-8">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>ALAMAT</label>
                                        <input type="text" required="" class="form-control" placeholder="Alamat" name="alamat">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-8">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>NO RT</label>
                                        <input type="text" required="" class="form-control" placeholder="No RT" name="no_rt">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-8">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>NO RW</label>
                                        <input type="text" required="" class="form-control" placeholder="No RW" name="no_rw">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-8">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="text" required="" class="form-control" id="nik" placeholder="Nomor Induk Keluarga" name="nik" onkeyup="getNik()">
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
                                            <option value="99">PILIH</option>
                                            <option value="1">KEPALA KELUARGA</option>
                                            <option value="2">ISTRI</option>
                                            <option value="3">ANAK</option>
                                            <option value="4">LAIN-LAIN</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-8">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>JENIS KELAMIN</label>
                                        <select class="form-control" name="jen_kel" id="jen_kel">
                                            <option value="99">PILIH</option>
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
                                            <option value="99" selected="">PILIH</option>
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
                                            <option value="99" selected="">PILIH</option>
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
                                            <option value="99" selected="">PILIH</option>
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
                                            <option value="99" selected="">PILIH</option>
                                            <option value="1">BELUM KAWIN</option>
                                            <option value="2">KAWIN</option>
                                            <option value="3">JANDA/DUDA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-8">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>JKN</label>
                                        <select class="form-control" name="jkn">
                                            <option value="99" selected="">PILIH</option>
                                            <option value="1">BPJS - PBI</option>
                                            <option value="2">BPJS - NON PBI</option>
                                            <option value="3">NON BPJS</option>
                                            <option value="4">TIDAK PUNYA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br>
                    </div>

                    <div class="panel-heading">
                        II. KELUARGA BERENCANA
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6 col-sm-8">
                            <div class="form-group">
                                <label>USIA KAWIN PERTAMA</label>	<br>
                                a. Suami				
                                <input type="text" class="form-control" id="usia_kawin_pertama" placeholder="Usia Kawin Pertama Suami" name="usia_kawin_suami">
                                b. Istri
                                <input type="text" class="form-control" id="usia_kawin_pertama" placeholder="Usia Kawin Pertama Istri" name="usia_kawin_istri">
                            </div>
                            <br>
                            <div class="form-group">
                                <label>JUMLAH ANAK </label>	<br>
                                a. Yang pernah dilahirkan hidup	<br>
                                <div class="col-md-12 col-sm-1">
                                    <div class="col-md-8 col-sm-1">
                                        Laki-laki
                                        <input type="text" class="form-control" id="jml_laki1" placeholder="Jumlah Anak laki laki" name="jml_laki1">
                                    </div>
                                    <div class="col-md-4 col-sm-1">
                                        <br>Orang  
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-1">
                                    <div class="col-md-8 col-sm-1">
                                        Perempuan
                                        <input type="text" class="form-control" id="jml_laki1" placeholder="Jumlah Anak perempuan" name="jml_perempuan1">
                                    </div>
                                    <div class="col-md-4 col-sm-1">
                                        <br>Orang  <br><br><br>
                                    </div>
                                </div>

                                b. Yang masih hidup<br>
                                <div class="col-md-12 col-sm-1">
                                    <div class="col-md-8 col-sm-1">
                                        Laki-laki
                                        <input type="text" class="form-control" id="jml_laki1" placeholder="Jumlah Anak laki laki" name="jml_laki2">
                                    </div>
                                    <div class="col-md-4 col-sm-1">
                                        <br>Orang  
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-1">
                                    <div class="col-md-8 col-sm-1">
                                        Perempuan
                                        <input type="text" class="form-control" id="jml_laki1" placeholder="Jumlah Anak perempuan" name="jml_perempuan2">
                                    </div>
                                    <div class="col-md-4 col-sm-1">
                                        <br>Orang  <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-8">
                            <div class="form-group">
                                <label>KEIKUTSERTAAN KB  </label>
                                <select class="form-control" name="keikutsertaankb">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">SEDANG</option>
                                    <option value="2">PERNAH</option>
                                    <option value="3">TIDAK PERNAH</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>METODE KONTRASEPSI YANG SEDANG / PERNAH DIGUNAKAN  </label>
                                <select class="form-control" name="metode_kontrasepsi">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">IUD</option>
                                    <option value="2">MOW</option>
                                    <option value="3">MOP</option>
                                    <option value="4">IMPLANT</option>
                                    <option value="5">SUNTIK</option>
                                    <option value="6">PIL</option>
                                    <option value="7">KONDOM</option>
                                    <option value="8">TRADISIONAL</option>
                                </select> 
                            </div>
                            <div class="form-group">
                                <label>BILA SEDANG BER-KB SUDAH BERAPA LAMA MENGGUNAKAN METODE KONTRASEPSI TERSEBUT  </label>
                                <div class="col-md-6 col-sm-8">
                                    <input type="text" class="form-control" id="tahun_penggunaan_kontasepsi" placeholder="Tahun" name="tahun_penggunaan_kontrasepsi">
                                    <input type="text" class="form-control" id="bulan_penggunaan_kontasepsi" placeholder="Bulan" name="bulan_penggunaan_kontrasepsi">
                                </div>
                                <div class="col-md-6 col-sm-8">
                                    Tahun<br><br>Bulan<br><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>SEGERA INGIN PUNYA ANAK LAGI  </label>
                                <select class="form-control" name="ingin_punya_anak">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">YA, SEGERA (KURANG DARI 2 TAHUN)</option>
                                    <option value="2">YA, KEMUDIAN (LEBIH DARI 2 TAHUN)</option>
                                    <option value="3">TIDAK INGIN PUNYA ANAK LAGI</option>
                                </select> 
                            </div>
                            <div class="form-group">
                                <label>ALASAN TIDAK BER-KB  </label>
                                <select class="form-control" name="alasan_tdk_kb">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">SEDANG HAMIL</option>
                                    <option value="2">ALASAN FERTILITAS</option>
                                    <option value="3">TIDAK MENYETUJUI KB</option>
                                    <option value="4">TIDAK TAHU TENTANG KB</option>
                                    <option value="5">TAKUT EFEK SAMPING</option>
                                    <option value="6">PELAYANAN KB JAUH</option>
                                    <option value="7">TIDAK MAMPU / MAHAL</option>
                                    <option value="8">LAINNYA</option>
                                </select> 
                            </div>
                            <div class="form-group">
                                <label>TEMPAT PELAYANAN KB  </label>
                                <select class="form-control" name="tempat_kb">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">RSUP/RSUD</option>
                                    <option value="2">RS TNI</option>
                                    <option value="3">RS POLRI</option>
                                    <option value="4">RS SWASTA</option>
                                    <option value="5">KLINIK UTAMA</option>
                                    <option value="6">PUSKESMAS</option>
                                    <option value="7">KLINIK PRATAMA</option>
                                    <option value="8">PRAKTEK DOKTER</option>
                                    <option value="9">RS PRATAMA</option>
                                    <option value="10">PUSTU/PUSLING/BIDAN DESA</option>
                                    <option value="11">POSKESDES/POLINDES</option>
                                    <option value="12">PRAKTER BIDAN</option>
                                    <option value="13">PELAYANAN BERGERAK</option>
                                    <option value="14">LAINNYA</option>
                                </select> 
                            </div>
                        </div>
                    </div>

                    <div class="panel-heading">
                        III. PEMBANGUNAN KELUARGA
                    </div>
                    <div class="panel-body">
                        <div class="col-md-3 col-sm-8">
                            <div class="form-group">
                                <label>KELUARGA MEMBELI SATU STEL PAKAIAN BARU UNTUK SELURUH ANGGOTA KELUARGA MINIMAL SETAHUN SEKALI  </label>
                                <select class="form-control" name="pembangunan_keluarga_1">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="2">PERNAH</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>SELURUH ANGGOTA KELUARGA MAKAN DAGING/IKAN/TELUR MINIMAL SEMINGGU SEKALI  </label>
                                <select class="form-control" name="pembangunan_keluarga_5">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="2">PERNAH</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>KELUARGA MEMILIKI KEBIASAAN BERKOMUNIKASI DENGAN SELURUH ANGGOTA KELUARGA  </label>
                                <select class="form-control" name="pembangunan_keluarga_9">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="2">PERNAH</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>KELUARGA MEMPUNYAI BALITA IKUT KEGIATAN POSYANDU  </label>
                                <select class="form-control" name="pembangunan_keluarga_13">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="2">PERNAH</option>
                                    <option value="3">TIDAK BERLAKU</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>KELUARGA LANSIA ATAU MEMPUNYAI LANSIA IKUT KEGIATAN BKL  </label>
                                <select class="form-control" name="pembangunan_keluarga_17">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="2">PERNAH</option>
                                    <option value="3">TIDAK BERLAKU</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>APAKAH JENIS LANTAI RUMAH TERLUAS  <br><br></label>
                                <select class="form-control" name="pembangunan_keluarga_21">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">UBIN/KERAMIK/MARMER</option>
                                    <option value="2">SEMEN/PAPAN</option>
                                    <option value="3">TANAH</option>
                                    <option value="4">LAINNYA</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>APAKAH FASILITAS TEMPAT BUANG AIR BESAR  </label>
                                <select class="form-control" name="pembangunan_keluarga_25">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">JAMBAN SENDIRI</option>
                                    <option value="2">JAMBAN BERSAMA</option>
                                    <option value="3">JAMBAN UMUM</option>
                                    <option value="4">LAINNYA</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-8">
                            <div class="form-group">
                                <label>SELURUH ANGGOTA KELUARGA MAKAN MINIMAL 2 KALI SEHARI  <br><br></label>
                                <select class="form-control" name="pembangunan_keluarga_2">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="2">PERNAH</option>
                                    <option value="3">TIDAK BERLAKU</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>SELURUH ANGGOTA KELUARGA MENJALANKAN IBADAH AGAMA SESUAI KETENTUAN AGAMA YANG DIANUT  </label>
                                <select class="form-control" name="pembangunan_keluarga_6">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="2">PERNAH</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>KELUARGA IKUT DALAM KEGIATAN SOSIAL DI LINGKUNGAN RT  <br><br></label>
                                <select class="form-control" name="pembangunan_keluarga_10">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="2">PERNAH</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>KELUARGA MEMPUNYAI BALITA IKUT KEGIATAN BKB  </label>
                                <select class="form-control" name="pembangunan_keluarga_14">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="2">PERNAH</option>
                                    <option value="3">TIDAK BERLAKU</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>KELUARGA MENGIKUTI KEGIATAN UPPKS  <br><br></label>
                                <select class="form-control" name="pembangunan_keluarga_18">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="2">PERNAH</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>APAKAH SUMBER PENERANGAN UTAMA  <br><br></label>
                                <select class="form-control" name="pembangunan_keluarga_22">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">LISTRIK</option>
                                    <option value="2">GENSET/DIESEL</option>
                                    <option value="3">LAMPU MINYAK</option>
                                    <option value="4">LAINNYA</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>STATUS KEPEMILIKAN RUMAH/BANGUNAN TEMPAT TINGGAL  </label>
                                <select class="form-control" name="pembangunan_keluarga_26">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">MILIK SENDIRI</option>
                                    <option value="2">SEWA/KONTRAK</option>
                                    <option value="3">MENUMPANG</option>
                                    <option value="4">LAINNYA</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-8">
                            <div class="form-group">
                                <label>SELURUH ANGGOTA KELUARGA BILA SAKIT BEROBAT KE FASILITAS KESEHATAN  <br><br></label>
                                <select class="form-control" name="pembangunan_keluarga_3">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="2">PERNAH</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>PASANGAN USIA SUBUR DENGAN DUA ANAK ATAU LEBIH MENJADI PESERTA KB  <br><br></label>
                                <select class="form-control" name="pembangunan_keluarga_7">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="2">PERNAH</option>
                                    <option value="3">TIDAK BERLAKU</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>KELUARGA MEMILIKI AKSES INFORMASI DARI SURAT KABAR/MAJALAH/ RADIO/TV/LAINNYA  <br><br></label>
                                <select class="form-control" name="pembangunan_keluarga_11">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="2">PERNAH</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>KELUARGA MEMPUNYAI REMAJA IKUT KEGIATAN BKR  </label>
                                <select class="form-control" name="pembangunan_keluarga_15">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="2">PERNAH</option>
                                    <option value="3">TIDAK BERLAKU</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>APAKAH JENIS ATAP RUMAH TERLUAS  <br><br></label>
                                <select class="form-control" name="pembangunan_keluarga_19">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">DAUN/RUMBIA</option>
                                    <option value="2">SENG/ASBES</option>
                                    <option value="3">GENTENG/SIRAP</option>
                                    <option value="4">LAINNYA</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>APAKAH SUMBER AIR MINUM  <br><br></label>
                                <select class="form-control" name="pembangunan_keluarga_23">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">LEDENG/KEMASAN</option>
                                    <option value="2">SUMUR TERLINDUNG / POMPA</option>
                                    <option value="3">AIR HUJAN / AIR SUNGAI</option>
                                    <option value="4">LAINNYA</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>BERAPA LUAS RUMAH/BANGUNAN KESELURUHAN (m2)  </label>
                                <div class="col-md-6 col-sm-8">
                                    <input type="text" class="form-control" id="pembangunan_keluarga_27" placeholder="Luas dalam m2" name="pembangunan_keluarga_27">
                                </div>
                                <div class="col-md-6 col-sm-8">
                                    m2<br><br>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-8">
                            <div class="form-group">
                                <label>SELURUH ANGGOTA KELUARGA MEMILIKI PAKAIAN YANG BERBEDA UNTUK DIRUMAH, BEKERJA/SEKOLAH DAN BEPERGIAN  </label>
                                <select class="form-control" name="pembangunan_keluarga_4">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="2">PERNAH</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>KELUARGA MEMILIKI TABUNGAN DALAM BENTUK UANG/EMAS/TANAH/HEWAN MINIMAL SENILAI Rp. 1.000.000,-  </label>
                                <select class="form-control" name="pembangunan_keluarga_8">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="2">PERNAH</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>KELUARGA MEMILIKI ANGGOTA YANG MENJADI PENGURUS KEGIATAN SOSIAL  <br><br></label>
                                <select class="form-control" name="pembangunan_keluarga_12">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="2">PERNAH</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>ADA ANGGOTA KELUARGA MASIH REMAJA IKUT PIK-R/M  </label>
                                <select class="form-control" name="pembangunan_keluarga_16">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="2">PERNAH</option>
                                    <option value="3">TIDAK BERLAKU</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>APAKAH JENIS DINDING RUMAH TERLUAS  <br><br></label>
                                <select class="form-control" name="pembangunan_keluarga_20">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">TEMBOK</option>
                                    <option value="2">KAYU/SENG</option>
                                    <option value="3">BAMBU</option>
                                    <option value="4">LAINNYA</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>APAKAH BAHAN BAKAR UTAMA UNTUK MEMASAK  </label>
                                <select class="form-control" name="pembangunan_keluarga_24">
                                    <option value="99" selected="">PILIH</option>
                                    <option value="1">LISTRIK/GAS</option>
                                    <option value="2">MINYAK TANAH</option>
                                    <option value="3">ARANG/KAYU</option>
                                    <option value="4">LAINNYA</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>BERAPA ORANG YANG TINGGAL DAN MENETAP DI RUMAH/BANGUNAN INI  </label>
                                <div class="col-md-6 col-sm-8">
                                    <input type="text" class="form-control" id="pembangunan_keluarga_28" placeholder="Luas dalam m2" name="pembangunan_keluarga_28">
                                </div>
                                <div class="col-md-6 col-sm-8">
                                    ORANG<br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" name="Submit" value="Simpan Data" class="form-control panel-primary">
            </div>
            </form>
            <br><br>
            <!-- /.panel -->


        </div>
        <!-- /.box-body -->
</div>
</section>
<!-- /.content -->
