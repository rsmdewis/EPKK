<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('admin/dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php $nama = $this->session->userdata('Nama');
echo $nama;
?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <!--<form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                  </button>
                </span>
          </div>
        </form>-->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>


            <!--<li>
      <a href="<?php echo base_url('Utama'); ?>">
        <i class="fa fa-envelope"></i> <span>Surat Masuk</span>
       
      </a>
    </li>
            
            <li>
      <a href="<?php echo base_url('Utama/draft'); ?>">
        <i class="fa fa-edit"></i> <span>Draft Surat Masuk</span>
       
      </a>
    </li>
            
            <li>
      <a href="<?php echo base_url('Utama/keluar'); ?>">
        <i class="fa fa-envelope"></i> <span>Surat Keluar</span>
       
      </a>
    </li>
            -->
            <li><a href="<?php echo base_url('Home'); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>



            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file"></i> <span>Master Data</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('Home/dasawisma'); ?>"><i class="fa fa-file-o"></i> Dasa Wisma</a></li>
                                          <!--	<li><a href="<?php echo base_url('Home/program'); ?>"><i class="fa fa-file-o"></i> Manajemen User</a></li> -->
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file"></i> <span>Data Keluarga</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('Home/list_keluarga'); ?>"><i class="fa fa-file-o"></i>Keluarga</a></li>
                    <li><a href="<?php echo base_url('Home/rekap'); ?>"><i class="fa fa-file-o"></i>Rekap Keluarga</a></li>
                </ul>
            </li>

        <!--<li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Bantuan</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>-->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>