<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            List Keluarga

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


                    <!-- /.box-header -->
                    <div class="box-body">
                        <br>
                        <a href="<?php echo base_url('Home/biodata'); ?>" class="btn btn-danger btn-sm" role="button">Tambah Keluarga</a>
                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default" role="button">Rekap</a>

                        <!-- lihat modal popup -->

                        <div class="modal fade" id="modal-default">
                            <div class="modal-dialog modal-lg">
                                <form action="<?php echo base_url('Home/rekap'); ?>" method="post">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Lihat Rekap</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Tahun</label>
                                                        <input type="number" class="form-control" placeholder="Tahun" name="tahun">
                                                        <h5>Keterangan: Data dibawah 2010 tidak tersedia</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-floppy-o"></i> Lihat Rekap</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>

                        <!-- end modal popup -->


                        <br><br>
                        <?php echo $this->session->flashdata('pesan'); ?>
                        <div class="scroll">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NIK</th>
                                        <th>Nama Kepala Keluarga</th>
                                        <th>Rt/Rw</th>
                                        <th>KK (Orang)</th>

                                        <th>Laki-laki (Orang)</th>
                                        <th>Perempuan (Orang)</th>
                                        <th>Lansia (Orang)</th>
                                        <th>Balita (Orang)</th>
                                        <th>Memiliki Tabungan (Orang)</th>
                                        <th>Aksi</th>
                                        <!-- <th>Aksi</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 0;

                                    foreach ($keluarga as $row) {
                                        $count++;
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $count; ?></th>
                                            <td><?php echo $row->nik; ?></td>
                                            <td><?php echo $row->namalengkap; ?></td>
                                            <td><?php echo $row->rt . '/' . $row->rw; ?></td>
                                            <?php
                                            $anggota = $this->M_kinerja->getAnggota($row->nort);
                                            foreach ($anggota as $rew) {
                                            ?>
                                                <th><?php echo $rew->jk; ?></th>
                                            <?php
                                            }
                                            $anggotalaki = $this->M_kinerja->getAnggotaLaki($row->nort);
                                            foreach ($anggotalaki as $rew) { ?>
                                                <th><?php echo $rew->jk; ?></th>
                                            <?php
                                            }
                                            $anggotap = $this->M_kinerja->getAnggotaP($row->nort);
                                            foreach ($anggotap as $rew) { ?>
                                                <th><?php echo $rew->jk; ?></th>
                                            <?php
                                            }
                                            $anggotalan = $this->M_kinerja->getAnggotaLansia($row->nort);
                                            foreach ($anggotalan as $rew) { ?>
                                                <th><?php echo $rew->idlansia ?></th>
                                            <?php
                                            }
                                            $balita = $this->M_kinerja->getBalita($row->nort);
                                            foreach ($balita as $rew) {
                                            ?>
                                                <th><?php echo $rew->balita; ?></th>
                                            <?php }
                                            $tabungan = $this->M_kinerja->getTabungan($row->nort);
                                            foreach ($tabungan as $rew) {
                                            ?>
                                                <th><?php echo $rew->tabungan; ?></th>
                                            <?php } ?>
                                            <td align="center">

                                                <a href="<?php echo base_url('Home/detail_keluarga/' . $row->nort . '/' . $row->iddasawisma) ?>" class="btn btn-danger btn-sm">Lihat</a>
                                            </td>
                                        </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <form action="<?php echo base_url('Home/TambahsubKegiatan'); ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tambah Kegiatan</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Pilih Program</label>

                            <select name="kategori" id="kategori" class="form-control">
                                <option value="0">-PILIH-</option>
                                <?php foreach ($program as $row) : ?>
                                    <option value="<?php echo $row->rek_program; ?>"><?php echo $row->nama_program; ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                        <div class="form-group">
                            <label>Pilih Kegiatan</label>
                            <select name="subkategori" id="kab" class="kab form-control">
                                <option value="0">-PILIH-</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>No Rekening</label>
                            <input type="text" class="form-control" placeholder="Rekening" name="rek_subkegiatan">
                        </div>
                        <div class="form-group">
                            <label>Nama Kegiatan</label>
                            <input type="text" class="form-control" placeholder="program" name="nama_subkegiatan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i>Simpan</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
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