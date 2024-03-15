
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Realisasi Anggaran 2022
        <small><?php echo $this->session->userdata('NamaDinas'); ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
		
          <div class="box">
           
		    <div class="box-header">
                        
                         <div class="pull-right"> <a href="<?php echo base_url('Home/Cetak');?>" class="btn btn-danger btn-sm" target="_blank">Cetak</a></div>
                    </div>
			
            <!-- /.box-header -->
            <div class="box-body">
			
			<?php echo 	$this->session->flashdata('pesan');	?>
           
			<table width="100%" id="realisasi" class="table table-bordered table-striped">
				 <thead>
				  <tr>
					<th rowspan="3" scope="row" width="2%">No</th>
					<td rowspan="3" width="20%">Program</td>
					<td rowspan="3" width="28%">Sub Kegiatan</td>
					<td rowspan="3">Target</td>
					<td rowspan="3" width="10%" align="right">Pagu</td>
					<td colspan="8"><div align="center">Realisasi Kinerja Pada Triwulan </div></td>
					<td rowspan="3">Kendala</td>
					<td rowspan="3">Aksi</td>
				  </tr>
				  <tr>
					<td colspan="2"><div align="center">1</div></td>
					<td colspan="2"><div align="center">2</div></td>
					<td colspan="2"><div align="center">3</div></td>
					<td colspan="2"><div align="center">4</div></td>
				  </tr>
				  <tr>
					<td>Kinerja</td>
					<td>Anggaran</td>
					<td>Kinerja</td>
					<td>Anggaran</td>
					<td>Kinerja</td>
					<td>Anggaran</td>
					<td>Kinerja</td>
					<td>Anggaran</td>
				  </tr>
				  </thead>
				   <?php
					$count = 0; 
				   foreach ($realisasi as $row) { $count++;?>
				   <tbody>
				  <tr>
					<th scope="row"><?php echo $count;?></th>
					<td><?php echo $row->nama_program;?></td>
					<td><?php echo $row->nama_subkegiatan;?></td>
					<td><?php echo $row->indikator. ' '.$row->satuan;?></td>
					<td align="right"><?php echo 'Rp '.number_format( $row->pagu, 0, ',', '.'); ?></td>
					<td><?php echo $row->kinerja1. ' '.$row->satuan;?></td>
					<td align="right"><?php echo 'Rp '.number_format( $row->anggaran1, 0, ',', '.'); ?></td>
					<td><?php echo $row->kinerja2. ' '.$row->satuan;?></td>
					<td align="right"><?php echo 'Rp '.number_format( $row->anggaran2, 0, ',', '.'); ?></td>
					<td><?php echo $row->kinerja3. ' '.$row->satuan;?></td>
					<td align="right"><?php echo 'Rp '.number_format( $row->anggaran3, 0, ',', '.'); ?></td>
					<td><?php echo $row->kinerja4. ' '.$row->satuan;?></td>
					<td align="right"><?php echo 'Rp '.number_format( $row->anggaran4, 0, ',', '.'); ?></td>
					<td>&nbsp;</td>
					<td><a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default<?php echo $row->AutoID;?>">Edit</a></td>
				  </tr>
				  </tbody>
				  <div class="modal fade" id="modal-default<?php echo $row->AutoID;?>">
					  <div class="modal-dialog modal-lg">
					   <form  action="<?php echo base_url('Home/UpdateRealisasi');?>" method="post">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Indikator Kinerja</h4>
							<label><?php echo $row->nama_program;?></label><br>
							<label><?php echo $row->nama_subkegiatan;?></label>
						  </div>
							<div class="modal-body">
								<div class="row">
									<div class="col-md-6">
								
										<div class="form-group">
											<label>Triwulan I</label>
											<br>
											<label>Jumlah</label>
											<input type="hidden" class="form-control"  name="AutoID" value="<?php echo $row->AutoID;?>">
											<input type="text" class="form-control" placeholder="Kinerja" name="kinerja1" value="<?php echo $row->kinerja1;?>">
											<label>Satuan</label>
											<input type="text" class="form-control"  value="<?php echo $row->satuan;?>" readonly>
											<label>Total Anggaran</label>
											<input type="text" class="form-control" placeholder="Rp" name="anggaran1" value="<?php echo $row->anggaran1;?>">
										</div>
										<div class="form-group">
											<label>Triwulan II</label>
											<br>
											<label>Jumlah</label>
											<input type="text" class="form-control" placeholder="Kinerja" name="kinerja2" value="<?php echo $row->kinerja2;?>">
											<label>Satuan</label>
											<input type="text" class="form-control"  value="<?php echo $row->satuan;?>" readonly>
											<label>Total Anggaran</label>
											<input type="text" class="form-control" placeholder="Rp" name="anggaran2" value="<?php echo $row->anggaran2;?>">
											<label>Faktor Pendorong</label>
											<input type="text" class="form-control" placeholder="" name="pendorong" value="<?php echo $row->pendorong;?>">
											<label>Masalah</label>
											<input type="text" class="form-control" placeholder="" name="masalah" value="<?php echo $row->masalah;?>">
										</div>
									</div>	
									<div class="col-md-6">
										<div class="form-group">
											<label>Triwulan III</label><br>
											<label>Jumlah</label>
											<input type="text" class="form-control" placeholder="Kinerja" name="kinerja3" value="<?php echo $row->kinerja3;?>">
											<label>Satuan</label>
											<input type="text" class="form-control"  value="<?php echo $row->satuan;?>" readonly>
											<label>Total Anggaran</label>
											<input type="text" class="form-control" placeholder="Rp" name="anggaran3" value="<?php echo $row->anggaran3;?>">
										</div>
										<div class="form-group">
											<label>Triwulan IV</label>
											<br>
											<label>Jumlah</label>
											<input type="text" class="form-control" placeholder="Kinerja" name="kinerja4" value="<?php echo $row->kinerja4;?>">
											<label>Satuan</label>
											<input type="text" class="form-control"  value="<?php echo $row->satuan;?>" readonly>
											<label>Total Anggaran</label>
											<input type="text" class="form-control" placeholder="Rp" name="anggaran4" value="<?php echo $row->anggaran4;?>">
											<label>Faktor Penghambat</label>
											<input type="text" class="form-control" placeholder="" name="penghambat" value="<?php echo $row->penghambat;?>">
											<label>Solusi</label>
											<input type="text" class="form-control" placeholder="" name="solusi" value="<?php echo $row->solusi;?>">
										</div>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="container-fluid">
										<div class="col-md-3 col-sm-6 col-12">
										<div class="info-box">
										  <span class="info-box-icon bg-primary"><i class="fa fa-battery-half"></i></span>

										  <div class="info-box-content">
											<span class="info-box-text">Akumulasi</span>
											<span class="info-box-number"><?php $nilai= $row->kinerja1 + $row->kinerja2 + $row->kinerja3 + $row->kinerja4; echo number_format( $nilai, 0, ',', '.'); ?></span>
										  </div>
										  <!-- /.info-box-content -->
										</div>
										<!-- /.info-box -->
										</div>
									
										<div class="col-md-3 col-sm-6 col-12">
										<div class="info-box">
										  <span class="info-box-icon bg-danger"><i class="fa fa-battery-full"></i></span>

										  <div class="info-box-content">
											<span class="info-box-text">Nilai Akhir</span>
											<span class="info-box-number"><?php echo number_format($row->kinerja4, 0, ',', '.');?></span>
										  </div>
										  <!-- /.info-box-content -->
										</div>
										<!-- /.info-box -->
										</div>
										
										<div class="col-md-3 col-sm-6 col-12">
										<div class="info-box">
										  <span class="info-box-icon bg-danger"><i class="fa fa-arrow-circle-o-up"></i></span>

										  <div class="info-box-content">
											<span class="info-box-text">Tertinggi</span>
											<span class="info-box-number"><?php echo number_format(max($row->kinerja1,$row->kinerja2,$row->kinerja3,$row->kinerja4), 0, ',', '.');?></span>
										  </div>
										  <!-- /.info-box-content -->
										</div>
										<!-- /.info-box -->
										</div>
										
										<div class="col-md-3 col-sm-6 col-12">
										<div class="info-box">
										  <span class="info-box-icon bg-danger"><i class="fa fa-money"></i></span>

										  <div class="info-box-content">
											<span class="info-box-text">T.A. Realisasi</span>
											<span class="info-box-number"><?php $total= $row->anggaran1 + $row->anggaran2 + $row->anggaran3 + $row->anggaran4; echo number_format( $total, 0, ',', '.'); ?></span>
										  </div>
										  <!-- /.info-box-content -->
										</div>
										<!-- /.info-box -->
										</div>
									</div>
								</div>
							</div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
							 <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> Update</button>
						  </div>
						</div>
						</form>
						<!-- /.modal-content -->
					  </div>
				<!-- /.modal-dialog -->
					</div>
				   <?php } ?>
				  
			</table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

