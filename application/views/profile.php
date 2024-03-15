<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <!-- <h1>
            Profil
            <small><?php //echo $this->session->userdata('NamaDinas'); 
                    ?></small>
        </h1> -->
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Profil</li>
        </ol>
    </section>

    <!-- Main content -->
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">PROFILE</div>
        <div class="panel-body">
            <img src="<?php echo base_url('admin/dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">
        </div>

        <!-- List group -->
        <ul class="list-group">
            <li class="list-group-item">Nama Lengkap :<?= $this->session->userdata('namalengkap') ?></li>
            <li class="list-group-item">Alamat :<?= $this->session->userdata('alamat') ?></li>
            <li class="list-group-item">Email :<?= $this->session->userdata('email') ?></li>
            <li class="list-group-item">No Telpon :<?= $this->session->userdata('notelp') ?></li>
        </ul>
    </div>
    <!-- /.content-wrapper -->