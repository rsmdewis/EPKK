<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            DETAIL KELUARGA
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Admin</a></li>
            <li class="active">Tambah Data KB</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php
        foreach($detail_keluarga as $klg) {
        
        $dusun = $klg->dusun;
		$aktifitas_usaha_lingkungan = $klg->aktifitas_usaha_lingkungan;
        $beras = $klg->beras;
		$jenis_beras = $klg->jenis_beras;
        $stiker = $klg->stiker;
        $tps = $klg->tps;
        $jamban = $klg->jamban;
		$jml_jamban = $klg->jml;
        $sumber_air = $klg->sumber_air;
		$sumber_air_lain = $klg->sumber_air_lain;
        $saluran_limbah = $klg->saluran_limbah;
		$aktifitas = $klg->aktifitas;
		$aktifitas_lain = $klg->aktifitas_lain;
        $kriteria_rumah = $klg->kriteria_rumah;
        $nik = $klg->nik;
        
        }
       
       
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

               
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        I.I. DATA WILAYAH
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Nama Dasawisma</label>
                                <input type="text" required="" class="form-control"  name="dasawisma" value="<?php echo $this->session->userdata('nama_dasawisma');?>" readonly>
								<input type="hidden" required="" class="form-control"  name="iddasawisma" value="<?php echo $this->session->userdata('iddasawisma');?>">
                            </div>
							<div class="form-group">
                                <label>Desa/Kelurahan</label>
                                <input type="text" required="" class="form-control"  name="desa" value="<?php echo $this->session->userdata('nm_desa');?>" readonly>
                            </div>
							<div class="form-group">
                                <label>RT</label>
                                <input type="text" required="" class="form-control" name="rt" value="<?php echo $this->session->userdata('rt');?>" readonly>
                            </div>
							<div class="form-group">
                                <label>RW</label>
                                <input type="text" required="" class="form-control" name="rw" value="<?php echo $this->session->userdata('rw');?>" readonly>
                            </div>
							
                        </div>
						
						 <div class="col-md-6 col-sm-6">
                            
							<div class="form-group">
                                <label>Kecamatan</label>
                                <input type="text" required="" class="form-control" name="kecamatan" value="<?php echo $this->session->userdata('nm_kec');?>" readonly>
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
                                <input type="text" class="form-control" name="dusun"  readonly value="<?php echo $dusun; ?>">
                            </div>
                        </div>
						
                    </div>

                    <div class="panel-heading">
                        I.II. DATA KELUARGA
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                             <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>Hubungan Keluarga</th>
                                    <th>Status</th>
                                    <th>Pendidikan</th>
                                    <th>Pekerjaan</th>
                                    <th>Aksi</th>
                                    <!-- <th>Aksi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;
                               
                                    foreach ($detail_biodata as $row) {
                                        $count++;
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $count; ?></th>
                                            <td><?php echo $row->nik; ?></td>
                                            <td><?php echo $row->namalengkap; ?></td>
                                            <td><?php echo $row->nama_hub; ?></td>
                                            <th><?php echo $row->nama_stskawin; ?></th>
                                            <th><?php echo $row->nama_pendidikan; ?></th>
                                            <th><?php echo $row->nama_pekerjaan; ?></th>
                                            <td align="center">
                                               
                                             <!--   <a href="<?php echo base_url('Home/detail_keluarga/'.$row->idbiodata) ?>" class="btn btn-warning btn-sm">Lihat</a> -->
                                              <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default<?php echo $row->nik; ?>" role="button">Lihat</a>
                                            </td>
                                        </tr>
                                        <!-- lihat modal popup -->
                                        
                                        <div class="modal fade" id="modal-default<?php echo $row->nik; ?>">
                                            <div class="modal-dialog modal-lg">
                                                <form  action="<?php echo base_url('Home/edit_biodata'); ?>" method="post">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Lihat Biodata</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                        <div class="row">  
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="text" required="" class="form-control"  placeholder="Nomor Induk Keluarga" name="nik" value="<?php echo $row->nik; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>NAMA LENGKAP</label>
                                        <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="<?php echo $row->namalengkap; ?>">
                                        <input type="hidden" class="form-control" name="nort" value="<?php echo $this->uri->segment(3); ?>">
                                        <input type="hidden" class="form-control" name="iddasawisma" value="<?php echo $this->uri->segment(4); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>TANGGAL LAHIR</label>
                                        <input type="date" required="" class="form-control" id="tahun_lahir" placeholder="Tanggal Lahir" name="tanggal_lahir"  value="<?php echo $row->tgllahir; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Hubungan Keluarga</label>
                                        <select class="form-control" name="hub_dgn_kk" id="hub_dgn_kk">
										<?php 
											foreach ($hub_keluarga as $hk) {  
												if($row->idHub == $hk->idHub){
													?>
													<option value="<?php echo $hk->idHub; ?>" selected><?php echo $hk->nama_hub; ?></option>
													<?php
												} else {
													?>
													<option value="<?php echo $hk->idHub; ?>"><?php echo $hk->nama_hub; ?></option>
													<?php
												}
                                            } ?>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Status Perkawinan</label>
                                        <select class="form-control" name="sts_kawin" id="sts_kawin">
											<?php 
											foreach ($kawin as $kwn) {  
												if($row->idstatusperkawinan == $kwn->idstskawin){
													?>
													<option value="<?php echo $kwn->idstskawin; ?>" selected><?php echo $kwn->nama_stskawin; ?></option>
													<?php
												} else {
													?>
													<option value="<?php echo $kwn->idstskawin; ?>"><?php echo $kwn->nama_stskawin; ?></option>
													<?php
												}
                                            } ?>
											
											
                                        </select>
                                    </div>
                                     <div class="form-group">
                                        <label>Mengikuti Program Bina Keluarga Balita</label>
                                        <select class="form-control" name="bina">
                                            <?php if($row->b_balita == 1 ){
											?>
											<option value="1" selected>Ya</option>
											<option value="2">Tidak</option>
											<?php
										} elseif($row->b_balita == 2 ){
											?>
											<option value="1">Ya</option>
											<option value="2" selected>Tidak</option>
											<?php
										}
										?> 
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label>Memiliki Tabungan</label>
                                        <select class="form-control" name="tabungan">
                                        <?php if($row->tabungan == 1 ){
											?>
											<option value="1" selected>Ya</option>
											<option value="2">Tidak</option>
											<?php
										} elseif($row->tabungan == 2 ){
											?>
											<option value="1">Ya</option>
											<option value="2" selected>Tidak</option>
											<?php
										}
										?> 
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label>Mengikuti Kelompok Belajar</label>
                                        <select class="form-control" name="belajar">
                                         <?php if($row->idkelompokbelajar == 1 ){
											?>
											<option value="1" selected>Ya</option>
											<option value="2">Tidak</option>
											<?php
										} elseif($row->idkelompokbelajar == 2 ){
											?>
											<option value="1">Ya</option>
											<option value="2" selected>Tidak</option>
											<?php
										}
										?> 
                                        </select>
                                    </div> 
                                    
                                    <div class="form-group">
                                        <label>Pasangan Usia Subur (PUS)</label>
                                        <select class="form-control" name="pus">
                                           <?php if($row->idpus == 1 ){
											?>
											<option value="1" selected>Ya</option>
											<option value="2">Tidak</option>
											<?php
										} elseif($row->idpus == 2 ){
											?>
											<option value="1">Ya</option>
											<option value="2" selected>Tidak</option>
											<?php
										}
										?> 
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label>Wanita Usia Subur (WUS)</label>
                                        <select class="form-control" name="wus">
                                        <?php if($row->idwus == 1 ){
											?>
											<option value="1" selected>Ya</option>
											<option value="2">Tidak</option>
											<?php
										} elseif($row->idwus == 2 ){
											?>
											<option value="1">Ya</option>
											<option value="2" selected>Tidak</option>
											<?php
										}
										?> 
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label>Hamil</label>
                                        <select class="form-control" name="hamil">
                                          <?php if($row->idhamil == 1 ){
											?>
											<option value="1" selected>Ya</option>
											<option value="2">Tidak</option>
											<?php
										} elseif($row->idhamil == 2 ){
											?>
											<option value="1">Ya</option>
											<option value="2" selected>Tidak</option>
											<?php
										}
										?> 
                                        </select>
                                    </div> 
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label>JENIS KELAMIN</label>
                                        <select class="form-control" name="jen_kel" id="jen_kel">
                                           <?php if($row->jk == 1 ){
											?>
											<option value="1" selected>Laki-Laki</option>
											<option value="2">Perempuan</option>
											<?php
										} elseif($row->jk == 2 ){
											?>
											<option value="1">Laki-Laki</option>
											<option value="2" selected>Perempuan</option>
											<?php
										}
										?> 
                                        </select>
                                    </div>
                            
                                    <div class="form-group">
                                         <label>AGAMA</label>
                                        <select class="form-control" name="agama" id="agama">
                                           <?php 
											foreach ($agama as $agm) {  
												if($row->idagama == $agm->idagama){
													?>
													<option value="<?php echo $agm->idagama; ?>" selected><?php echo $agm->nama_agama; ?></option>
													<?php
												} else {
													?>
													<option value="<?php echo $agm->idagama; ?>"><?php echo $agm->nama_agama; ?></option>
													<?php
												}
                                            } ?>
										   
                                        </select>
                                    </div>
                           
                                    <div class="form-group">
                                        <label>Pendidikan Terakhir</label>
                                        <select class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir">
                                             <?php 
											foreach ($pendidikan as $pdk) {  
												if($row->idpendidikan == $pdk->idpendidikan){
													?>
													<option value="<?php echo $pdk->idpendidikan; ?>" selected><?php echo $pdk->nama_pendidikan; ?></option>
													<?php
												} else {
													?>
													<option value="<?php echo $pdk->idpendidikan; ?>"><?php echo $pdk->nama_pendidikan; ?></option>
													<?php
												}
                                            } ?>
											 
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Pekerjaan</label>
                                        <select class="form-control" name="pekerjaan" id="pekerjaan">
                                             <?php 
											foreach ($pekerjaan as $pkj) {  
												if($row->idpekerjaan == $pkj->idpekerjaan){
													?>
													<option value="<?php echo $pkj->idpekerjaan; ?>" selected><?php echo $pkj->nama_pekerjaan; ?></option>
													<?php
												} else {
													?>
													<option value="<?php echo $pkj->idpekerjaan; ?>"><?php echo $pkj->nama_pekerjaan; ?></option>
													<?php
												}
                                            } ?>
											
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label>Akseptor KB</label>
                                        <select class="form-control" name="kb">  
                                            <?php if($row->akseptorkb == 1 ){
											?>
											<option value="1" selected>Ya</option>
											<option value="2">Tidak</option>
											<?php
										} elseif($row->akseptorkb == 2 ){
											?>
											<option value="1">Ya</option>
											<option value="2" selected>Tidak</option>
											<?php
										}
										?> 
                                        </select>
                                    </div> 
                                     <div class="form-group">
                                        <label>Aktif dalam kegiatan posyandu</label>
                                        <select class="form-control" name="posyandu">
                                            <?php if($row->k_posyandu == 1 ){
											?>
											<option value="1" selected>Ya</option>
											<option value="2">Tidak</option>
											<?php
										} elseif($row->k_posyandu == 2 ){
											?>
											<option value="1">Ya</option>
											<option value="2" selected>Tidak</option>
											<?php
										}
										?> 
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label>Mengikuti PAUD/Sejenis</label>
                                        <select class="form-control" name="paud">
                                            <?php if($row->paud == 1 ){
											?>
											<option value="1" selected>Ya</option>
											<option value="2">Tidak</option>
											<?php
										} elseif($row->paud == 2 ){
											?>
											<option value="1">Ya</option>
											<option value="2" selected>Tidak</option>
											<?php
										}
										?> 
                                        </select>
                                    </div> 
                                     <div class="form-group">
                                        <label>Ikut Dalam Kegiatan Koperasi</label>
                                        <select class="form-control" name="koperasi">
                                            <?php if($row->koperasi == 1 ){
											?>
											<option value="1" selected>Ya</option>
											<option value="2">Tidak</option>
											<?php
										} elseif($row->koperasi == 2 ){
											?>
											<option value="1">Ya</option>
											<option value="2" selected>Tidak</option>
											<?php
										}
										?> 
                                        </select>
                                    </div> 
                                     <div class="form-group">
                                        <label>Jenis Koperasi</label>
                                        <input type="text" class="form-control" name="jeniskoperasi" >
                                    </div> 
                                     <div class="form-group">
                                        <label>Menyusui</label>
                                        <select class="form-control" name="susu">
                                           <?php if($row->id_susu == 1 ){
											?>
											<option value="1" selected>Ya</option>
											<option value="2">Tidak</option>
											<?php
										} elseif($row->is_susu == 2 ){
											?>
											<option value="1">Ya</option>
											<option value="2" selected>Tidak</option>
											<?php
										}
										?> 
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label>Tuna Netra (Buta)</label>
                                        <select class="form-control" name="buta">
                                         <?php if($row->id_buta == 1 ){
											?>
											<option value="1" selected>Ya</option>
											<option value="2">Tidak</option>
											<?php
										} elseif($row->id_buta == 2 ){
											?>
											<option value="1">Ya</option>
											<option value="2" selected>Tidak</option>
											<?php
										}
										?> 
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label>Lansia</label>
                                        <select class="form-control" name="lansia">
                                           <?php if($row->id_lansia == 1 ){
											?>
											<option value="1" selected>Ya</option>
											<option value="2">Tidak</option>
											<?php
										} elseif($row->id_lansia == 2 ){
											?>
											<option value="1">Ya</option>
											<option value="2" selected>Tidak</option>
											<?php
										}
										?> 
                                        </select>
                                    </div> 
                            </div>
                    </div>       
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-floppy-o"></i> Simpan dan Tutup</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
                                        
                                        <!-- end modal popup -->
                                   
                                <?php  } ?>
                            </tbody>
                        </table>     
                         <a href="" class="btn btn-danger  btn-sm" data-toggle="modal" data-target="#modal-default" role="button">Tambah Keluarga</a>
                         
                        </div>
                    </div>


   <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
            <form  action="<?php echo base_url('Home/simpan_biodata'); ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tambah Keluarga</h4>
                    </div>
                    <div class="modal-body">
                    <div class="row">  
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="text" required="" class="form-control"  placeholder="Nomor Induk Keluarga" name="nik" onkeyup="getNik()"  maxlength="16">
                                    </div>
                                    <div class="form-group">
                                        <label>NAMA LENGKAP</label>
                                        <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
                                        <input type="hidden" class="form-control" name="nort" value="<?php echo $this->uri->segment(3); ?>">
                                        <input type="hidden" class="form-control" name="iddasawisma" value="<?php echo $this->uri->segment(4); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>TANGGAL LAHIR</label>
                                        <input type="date" required="" class="form-control" id="tahun_lahir" placeholder="Tanggal Lahir" name="tanggal_lahir">
                                    </div>
                                    <div class="form-group">
                                        <label>Hubungan Keluarga</label>
                                        <select class="form-control" name="hub_dgn_kk" id="hub_dgn_kk">
                                            <?php foreach ($hub_keluarga as $hk) {  ?>
                                            <option value="<?php echo $hk->idHub; ?>"><?php echo $hk->nama_hub; ?></option>
                                            <?php } ?>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Status Perkawinan</label>
                                        <select class="form-control" name="sts_kawin" id="sts_kawin">
                                            
                                            <?php foreach ($kawin as $kwn) {  ?>
                                            <option value="<?php echo $kwn->idstskawin; ?>"><?php echo $kwn->nama_stskawin; ?></option>
                                            <?php } ?>
                                        </select>
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
                                    <div class="form-group">
                                        <label>Pasangan Usia Subur (PUS)</label>
                                        <select class="form-control" name="pus">
                                           <option value="<?php echo $row->idpus; ?>"><?php echo $row->namapus; ?></option>  
                                            <option value="1">YA</option>
                                            <option value="2">TIDAK</option>
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label>Wanita Usia Subur (WUS)</label>
                                        <select class="form-control" name="wus">
                                        <option value="<?php echo $row->idwus; ?>"><?php echo $row->namawus; ?></option>   
                                            <option value="1">YA</option>
                                            <option value="2">TIDAK</option>
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label>Hamil</label>
                                        <select class="form-control" name="hamil">
                                          <option value="<?php echo $row->idhamil; ?>"><?php echo $row->namahamil; ?></option>     
                                            <option value="1">YA</option>
                                            <option value="2">TIDAK</option>
                                        </select>
                                    </div> 
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control" name="jen_kel" id="jen_kel">
                                           
                                            <option value="1">LAKI-LAKI</option>
                                            <option value="2">PEREMPUAN</option>
                                        </select>
                                    </div>
                            
                                    <div class="form-group">
                                         <label>AGAMA</label>
                                        <select class="form-control" name="agama" id="agama">
                                           
                                           <?php foreach ($agama as $agm) {  ?>
                                            <option value="<?php echo $agm->idagama; ?>"><?php echo $agm->nama_agama; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                           
                                    <div class="form-group">
                                        <label>Pendidikan Terakhir</label>
                                        <select class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir">
                                             <?php foreach ($pendidikan as $pdk) {  ?>
                                            <option value="<?php echo $pdk->idpendidikan; ?>"><?php echo $pdk->nama_pendidikan; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Pekerjaan</label>
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
                                        <input type="text" class="form-control" name="jeniskoperasi" >
                                    </div> 
                                     <div class="form-group">
                                        <label>Menyusui</label>
                                        <select class="form-control" name="susu">
                                           <option value="<?php echo $row->idsusu; ?>"><?php echo $row->namasusu; ?></option>  
                                            <option value="1">YA</option>
                                            <option value="2">TIDAK</option>
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label>Tuna Netra (Buta)</label>
                                        <select class="form-control" name="buta">
                                        <option value="<?php echo $row->idbuta; ?>"><?php echo $row->namabuta; ?></option>   
                                            <option value="1">YA</option>
                                            <option value="2">TIDAK</option>
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label>Lansia</label>
                                        <select class="form-control" name="lansia">
                                          <option value="<?php echo $row->idlansia; ?>"><?php echo $row->namalansia; ?></option>     
                                            <option value="1">YA</option>
                                            <option value="2">TIDAK</option>
                                        </select>
                                    </div> 
                            </div>
                    </div>       
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i>Simpan</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

                  <div class="panel-heading">
                        I.I. DATA PRIMER
                    </div>
					<form  action="<?php echo base_url('Home/update_keluarga'); ?>" method="post">
						<div class="panel-body">
                    
                    <input type="hidden" class="form-control"  name="nort" value="<?php echo $this->uri->segment(3); ?>">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Makanan Pokok Sehari-Hari</label>
                                 <select class="form-control" name="makan_pokok">
										<?php if($beras == 1 ){
											?>
											<option value="1" selected>Beras</option>
											<option value="2">Non Beras</option>
											<?php
										} elseif($beras == 2 ){
											?>
											<option value="1">Beras</option>
											<option value="2" selected>Non Beras</option>
											<?php
										}
										?>
											                      
                                 </select>
                            </div>
							<div class="form-group">
                                <label>Jenis (selain Beras)</label>
                                <input type="text" class="form-control" value="<?php echo $jenis_beras;?>"  name="jenis_beras">
                            </div>
							 <div class="form-group">
                                <label>Mempunyai Jamban Keluarga</label>
                                 <select class="form-control" name="jamban">
											<?php if($jamban == 1 ){
											?>
											<option value="1" selected>Ya</option>
											<option value="2">Tidak</option>
											<?php
										} elseif($jamban == 2 ){
											?>
											<option value="1">Ya</option>
											<option value="2" selected>Tidak</option>
											<?php
										}
										?>
                                            
                                 </select>
                            </div>
							<div class="form-group">
                                <label>Jumlah Jamban</label>
                                <input type="text" class="form-control" value="<?php echo $jml_jamban; ?>"  name="jml_jamban2">
                            </div>
							<div class="form-group">
                                <label>Sumber Air Keluarga</label>
                                 <select class="form-control" name="sumber_air1">
                                        <?php if($sumber_air == 1 ){
											?>
											<option value="1" selected>Pdam</option>
											<option value="2">Sumur</option>
											<option value="2">Sungai</option>
											<?php
										} elseif($sumber_air == 2 ){
											?>
											<option value="1">Pdam</option>
											<option value="2" selected>Sumur</option>
											<option value="2">Sungai</option>
											<?php
										}elseif($sumber_air == 3 ){
											?>
											<option value="1">Pdam</option>
											<option value="2">Sumur</option>
											<option value="2" selected>Sungai</option>
											<?php
										}
										?>   
                                 </select>
                            </div>
							<div class="form-group">
                                <label>Lainnya (Sumber Air Lainnya)</label>
                                <input type="text" class="form-control" value="<?php echo $sumber_air_lain ?>"  name="sumber_air2">
                            </div>
							
							<div class="form-group">
                                <label>Memiliki Tempat Pembuangan Sampah</label>
                                 <select class="form-control" name="tps">
                                        <?php if($tps == 1 ){
											?>
											<option value="1" selected>Ya</option>
											<option value="2">Tidak</option>
											<?php
										} elseif($tps == 2 ){
											?>
											<option value="1">Ya</option>
											<option value="2" selected>Tidak</option>
											<?php
										}
										?> 
                                                           
                                 </select>
                            </div>
							
                        </div>
						
						 <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Mempunyai Saluran Pembuangan Limbah</label>
                                 <select class="form-control" name="limbah">
                                        <?php if($spl == 1 ){
											?>
											<option value="1" selected>Ya</option>
											<option value="2">Tidak</option>
											<?php
										} elseif($spl == 2 ){
											?>
											<option value="1">Ya</option>
											<option value="2" selected>Tidak</option>
											<?php
										}
										?> 
                                 </select>
                            </div>
							<div class="form-group">
                                <label>Menempel Stiker P4K</label>
                                 <select class="form-control" name="stiker">
                                             <?php if($stiker == 1 ){
											?>
											<option value="1" selected>Ya</option>
											<option value="2">Tidak</option>
											<?php
										} elseif($stiker == 2 ){
											?>
											<option value="1">Ya</option>
											<option value="2" selected>Tidak</option>
											<?php
										}
										?> 
                                 </select>
                            </div>
							
							<div class="form-group">
                                <label>Kriteria Rumah</label>
                                 <select class="form-control" name="kriteria">
                                          <?php if($kriteria_rumah == 1 ){
											?>
											<option value="1" selected>Sehat</option>
											<option value="2">Tidak Sehat</option>
											<?php
										} elseif($kriteria_rumah == 2 ){
											?>
											<option value="1">Sehat</option>
											<option value="2" selected>Tidak Sehat</option>
											<?php
										}
										?> 
                                 </select>
                            </div>
							
							<div class="form-group">
                                <label>Aktifitas UP2K</label>
                                 <select class="form-control" name="up2k">
                                            <?php if($aktifitas == 1 ){
											?>
											<option value="1" selected>Ya</option>
											<option value="2">Tidak</option>
											<?php
										} elseif($aktifitas == 2 ){
											?>
											<option value="1">Ya</option>
											<option value="2" selected>Tidak</option>
											<?php
										}
										?> 
                                 </select>
                            </div>
							<div class="form-group">
                                <label>Lainnya</label>
                                <input type="text" class="form-control" value="<?php echo $aktifitas_lain; ?>" name="up2k2">
                            </div>
							<div class="form-group">
                                <label>Aktifitas Kegiatan Usaha Kesehatan Lingkungan</label>
                                 <select class="form-control" name="aktifitas">
                                            <?php 
											foreach ($aktifitass as $akt) {  
												if($aktifitas_usaha_lingkungan == $akt->idaktifitas){
													?>
													<option value="<?php echo $akt->idaktifitas; ?>" selected><?php echo $akt->nama_aktifitas; ?></option>
													<?php
												} else {
													?>
													<option value="<?php echo $akt->idaktifitas; ?>"><?php echo $akt->nama_aktifitas; ?></option>
													<?php
												}
                                            } ?>
                                 </select>
                            </div>
                        </div>
						
						</div>
						<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-floppy-o"></i> Kembali dan Simpan</button>
				        
					</form>

                
                </div>
						
                
            </div>
         
            <br><br>
            <!-- /.panel -->


        </div>
        <!-- /.box-body -->
</div>
</section>
<!-- /.content -->
