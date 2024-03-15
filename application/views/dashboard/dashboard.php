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
						<h3><?php echo number_format($t_dasawisma, 0, ',', '.') ?></h3>
						<p>Manajemen User</p>
					</div>
					<div class="icon">
						<a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><i class="ion ion-person-add"></i>
					</div>
					<a href="#" style="color: white;">
						<p class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i>
					</a></p>
				</div>
			</div>

			<div class="col-lg-4 col-xs-6">
				<div class="small-box bg-aqua">
					<div class="inner text-center">
						<h3><?php echo number_format($t_kk, 0, ',', '.') ?></h3>
						<p>Kepala Keluarga</p>
					</div>
					<div class="icon">
						<a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><i class="ion ion-folder"></i>
					</div>
					<a href="#" style="color: white;">
						<p class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i>
					</a></p>
				</div>
			</div>

			<div class="col-lg-4 col-xs-6">
				<div class="small-box bg-yellow">
					<div class="inner text-center">
						<h3><?php echo number_format($t_biodata, 0, ',', '.') ?></h3>
						<p>Orang</p>
					</div>
					<div class="icon">
						<a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><i class="ion ion-card"></i>
					</div>
					<a href="#" style="color: white;">
						<p class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i>
					</a></p>
				</div>
			</div>
			<div class="col-lg-4 col-xs-6">
				<div class="small-box bg-red">
					<div class="inner text-center">
						<h3><?php echo number_format($t_role, 0, ',', '.') ?></h3>
						<p>Jumlah Role</p>
					</div>
					<div class="icon">
						<a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><i class="ion ion-card"></i>
					</div>
					<a href="#" style="color: white;">
						<p class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i>
					</a></p>
				</div>
			</div>

			<div class="col-lg-4 col-xs-6">
				<div class="small-box bg-green">
					<div class="inner text-center">
						<?php foreach ($t_hamil as $row) { ?>
							<h3><?php echo $row->hamil ?></h3>
						<?php } ?>
						<p>Jumlah Ibu Hamil</p>
					</div>
					<div class="icon">
						<a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><i class="ion ion-card"></i>
					</div>
					<a href="#" style="color: white;">
						<p class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i>
					</a></p>
				</div>
			</div>


			<div class="col-lg-4 col-xs-6">
				<div class="small-box bg-blue">
					<div class="inner text-center">
						<h3><?php echo number_format($t_susu, 0, ',', '.') ?></h3>
						<p>Jumlah Ibu Menyusui</p>
					</div>
					<div class="icon">
						<a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><i class="ion ion-card"></i>
					</div>
					<a href="#" style="color: white;">
						<p class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i>
					</a></p>
				</div>
			</div>
			<div class="col-lg-4 col-xs-6">
				<div class="small-box bg-teal">
					<div class="inner text-center">
						<?php foreach ($b_balita as $row) { ?>
							<h3><?php echo $row->balita ?></h3>
						<?php } ?>
						<p>Jumlah Balita</p>
					</div>
					<div class="icon">
						<a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><i class="ion ion-card"></i>
					</div>
					<a href="#" style="color: white;">
						<p class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i>
					</a></p>
				</div>
			</div>
			<div class="col-lg-4 col-xs-6">
				<div class="small-box bg-yellow">
					<div class="inner text-center">
						<?php foreach ($t_lansia as $row) { ?>
							<h3><?php echo $row->lansia ?></h3>
						<?php } ?>
						<p>Jumlah Lansia</p>
					</div>
					<div class="icon">
						<a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><i class="ion ion-card"></i>
					</div>
					<a href="#" style="color: white;">
						<p class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i>
					</a></p>
				</div>
			</div>

			<div class="col-lg-4 col-xs-6">
				<div class="small-box bg-aqua">
					<style></style>
					<div class="inner text-center">
						<?php foreach ($t_kematian as $row) { ?>
							<h3><?php echo $row->kematian ?></h3>
						<?php } ?>
						<p>Jumlah Kematian</p>
					</div>
					<div class="icon">
						<a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><i class="ion ion-card"></i>
					</div>
					<a href="#" style="color: white;">
						<p class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i>
					</a></p>
				</div>
			</div>
		</div>





</div>
<!-- /.content-wrapper -->