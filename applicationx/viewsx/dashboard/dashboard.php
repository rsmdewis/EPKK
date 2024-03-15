<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            DASHBOARD
            <small><?php echo $this->session->userdata('NamaDinas'); ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="row">
		
			<div class="col-lg-4 col-xs-6">
				<div class="small-box bg-purple">
					<div class="inner text-center">
						<h3><?php  echo number_format(count(@$program), 0, ',', '.') ?></h3>
						<p>Program</p>
					</div>
					<div class="icon">
						<a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><i class="ion ion-person-add"></i>
					</div>
					<a href="#" style="color: white;"><p class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a></p>
				</div>
			</div>
			
			<div class="col-lg-4 col-xs-6">
				<div class="small-box bg-aqua">
					<div class="inner text-center">
						<h3><?php  echo number_format(count(@$kegiatan), 0, ',', '.') ?></h3>
						<p>Kegiatan</p>
					</div>
					<div class="icon">
						<a href="<?php echo base_url("Artikel") ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><i class="ion ion-folder"></i>
					</div>
					<a href="#" style="color: white;"><p class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a></p>
				</div>
			</div>

			<div class="col-lg-4 col-xs-6">
				<div class="small-box bg-yellow">
					<div class="inner text-center">
						<h3><?php  echo number_format(count(@$subkegiatan), 0, ',', '.') ?></h3>
						<p>Sub Kegiatan</p>
					</div>
					<div class="icon">
						<a href="<?php echo base_url("Download") ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><i class="ion ion-card"></i>
					</div>
					<a href="#" style="color: white;"><p class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a></p>
				</div>
			</div>
			
		</div>
   
   <div class="row">
		

			
			<div class="col-lg-4 col-xs-4">
				<div class="small-box bg-danger">
					<div class="inner text-center">
						<h3><?php $pag=0; foreach ($pagu as $jml) {$pag=$pag + $jml->pagu; }  echo 'Rp '.number_format($pag, 0, ',', '.') ?></h3>
						<p>Pagu Anggaran</p>
					</div>
					<div class="icon">
						<a href="<?php echo base_url("Artikel") ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><i class="ion ion-folder"></i>
					</div>
					<a href="#" style="color: white;"><p class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a></p>
				</div>
			</div>
      
      <?php 

  foreach($summary as $total) { 
  $t1=$total->t1;
  $t2=$total->t2;  
  $t3=$total->t3;  
  $t4=$total->t4;  
  
  $realisasi= $t1+$t2+$t3+$t4;
  }?>	
  
      	<div class="col-lg-4 col-xs-4">
				<div class="small-box bg-danger">
					<div class="inner text-center">
						<h3><?php   echo 'Rp '.number_format($realisasi, 0, ',', '.') ?></h3>
						<p>Realisasi</p>
					</div>
					<div class="icon">
						<a href="<?php echo base_url("Artikel") ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><i class="ion ion-folder"></i>
					</div>
					<a href="#" style="color: white;"><p class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a></p>
				</div>
			</div>
      
      	<div class="col-lg-4 col-xs-4">
				<div class="small-box bg-danger">
					<div class="inner text-center">
						<h3><?php $persen=($realisasi/$pag)*100;  echo round($persen,2).' %'; ?></h3>
						<p>Realisasi</p>
					</div>
					<div class="icon">
						<a href="<?php echo base_url("Artikel") ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><i class="ion ion-folder"></i>
					</div>
					<a href="#" style="color: white;"><p class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a></p>
				</div>
			</div>

		
			
		</div>
		
   <div class="row">
	<?php 

  foreach($summary as $total) { 
  $t1=$total->t1;
  $t2=$total->t2;  
  $t3=$total->t3;  
  $t4=$total->t4;  
  }?>	
   
   
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-purple">
					<div class="inner text-center">
						<h3><?php  echo 'Rp '.number_format(($t1), 0, ',', '.') ?></h3>
						<p>TRIWULAN I</p>
					</div>
					<div class="icon">
						<a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><i class="ion ion-person-add"></i>
					</div>
					<a href="#" style="color: white;"><p class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a></p>
				</div>
			</div>
			
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-aqua">
					<div class="inner text-center">
						<h3><?php  echo 'Rp '.number_format(($t2), 0, ',', '.') ?></h3>
						<p>TRIWULAN II</p>
					</div>
					<div class="icon">
						<a href="<?php echo base_url("Artikel") ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><i class="ion ion-folder"></i>
					</div>
					<a href="#" style="color: white;"><p class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a></p>
				</div>
			</div>

			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-yellow">
					<div class="inner text-center">
						<h3><?php  echo 'Rp '.number_format(($t3), 0, ',', '.') ?></h3>
						<p>TRIWULAN III</p>
					</div>
					<div class="icon">
						<a href="<?php echo base_url("Download") ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><i class="ion ion-card"></i>
					</div>
					<a href="#" style="color: white;"><p class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a></p>
				</div>
			</div>


<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-yellow">
					<div class="inner text-center">
						<h3><?php  echo 'Rp '.number_format(($t4), 0, ',', '.') ?></h3>
						<p>TRIWULAN IV</p>
					</div>
					<div class="icon">
						<a href="<?php echo base_url("Download") ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><i class="ion ion-card"></i>
					</div>
					<a href="#" style="color: white;"><p class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a></p>
				</div>
			</div>			
		</div>
		
        
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

