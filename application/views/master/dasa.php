<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manajemen User
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


                    <!-- /.box-header -->
                    <div class="box-body">
                        <a href="" class="btn btn-danger" role="button" data-toggle="modal" data-target="#modal-default">Tambah User Baru</a>
                        <br><br>
                        <?php echo $this->session->flashdata('pesan'); ?>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Kecamatan</th>
                                    <th>Desa</th>
                                    <th>Rt/Rw</th>
                                    <th>Nama Dasawisma</th>
                                    <th>Role</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;

                                foreach ($alldata as $row) {
                                    $count++;
                                ?>

                                    <tr>
                                        <th scope="row"><?php echo $count; ?></th>
                                        <td><?php echo $row->nm_kec; ?></td>
                                        <td><?php echo $row->nm_desa; ?></td>
                                        <td><?php echo $row->rt . '/' . $row->rw; ?></td>
                                        <td><?php echo $row->nama_dasawisma; ?></td>
                                        <td><?php echo $row->nama_role; ?></td>
                                        <td></td>


                                        <td align="center">
                                            <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-default<?php echo $row->iddasawisma; ?>">Edit</a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="modal-default<?php echo $row->iddasawisma; ?>">
                                        <div class="modal-dialog">
                                            <form action="<?php echo base_url('Home/UpdateDasa'); ?>" method="post">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title">Edit Dasawisma (<?php echo $row->iddasawisma; ?>)</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Rt</label>
                                                            <input type="hidden" name="iddasawisma" value="<?php echo $row->iddasawisma; ?>">
                                                            <input type="text" class="form-control" name="rt" value="<?php echo $row->rt; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Rw</label>

                                                            <input type="text" class="form-control" name="rw" value="<?php echo $row->rw; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama Dasawisma</label>
                                                            <input type="text" class="form-control" name="nama_dasawisma" value="<?php echo $row->nama_dasawisma; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal"> Tutup</button>
                                                        <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> Simpan dan Tutup</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->


                                <?php } ?>
                            </tbody>

                        </table>
                    </div>

                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <form action="<?php echo base_url('Home/Tambahdasa'); ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tambah User</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" placeholder="username" name="username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="password" name="password">
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" placeholder="nama lengkap" name="nama">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" placeholder="alamat" name="alamat">
                            </div>
                            <div class="form-group">
                                <label>No Telp</label>
                                <input type="number" class="form-control" placeholder="no telp" name="notelp">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="email" name="email">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>

                                <div class="form-group">
                                    <select class="form-control" name="id_role">
                                        <option value="1">Super Admin</option>
                                        <option value="2">Admin Kecamatan</option>
                                        <option value="3">Admin Desa</option>
                                        <option value="4">Admin RW</option>
                                        <option value="5">Admin RT</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Pilih Kecamatan</label>

                                <select name="kecamatan" id="kategori" class="form-control">
                                    <option value="0">-PILIH-</option>
                                    <?php foreach ($kecamatan as $kec) : ?>
                                        <option value="<?php echo $kec->id_kec; ?>"><?php echo $kec->nm_kec; ?></option>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Pilih Desa</label>
                                <select name="desa" id="desa" class="desa form-control">
                                    <option value="0">-PILIH-</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Rw</label>
                                <input type="text" class="form-control" placeholder="Rw" name="rw">
                            </div>
                            <div class="form-group">
                                <label>Rt</label>
                                <input type="text" class="form-control" placeholder="Rt" name="rt">
                            </div>
                            <div class="form-group">
                                <label>Nama Dasa Wisma</label>
                                <input type="text" class="form-control" placeholder="Nama Dasawisma" name="nama_dasawisma">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i>Simpan</button>
                        <button type="button" class="btn btn-default">Close</button>

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