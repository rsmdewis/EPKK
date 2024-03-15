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
						<h3><?php  echo number_format($t_dasawisma, 0, ',', '.') ?></h3>
						<p>Dasawisma</p>
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
						<h3><?php  echo number_format($t_kk, 0, ',', '.') ?></h3>
						<p>Kepala Keluarga</p>
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
						<h3><?php  echo number_format($t_biodata, 0, ',', '.') ?></h3>
						<p>Orang</p>
					</div>
					<div class="icon">
						<a href="<?php echo base_url("Download") ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><i class="ion ion-card"></i>
					</div>
					<a href="#" style="color: white;"><p class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a></p>
				</div>
			</div>
			
		</div>
   
  
		
 

</div>
<!-- /.content-wrapper -->

