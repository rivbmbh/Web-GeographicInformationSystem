<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <?php if (!$this->session->userdata('email') == "") : ?>

            <a href="<?= base_url('auth/logout') ?>" style="margin-right: 30px;"><i
                    class="nav-icon fas fa-user-circle"></i> Logout</a>
            <?php endif; ?>
        </li>
    </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Right navbar links -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?= base_url('backend') ?>" class="brand-link elevation-4">
            <!-- <img src="<?= base_url() ?>assets/img/logo/logo.png" alt="" class="brand-image img-circle elevation-3"
                style="opacity: .8"> -->
            <span class="brand" style="margin-left:20px;"><i class="fas fa-code">
                    Administrator</i> </span>
        </a>



        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="profile_pic">
                    <img src="<?= base_url('assets/img/adminfoto.jpg') ?>" class="img-circle profile_img"
                        alt="User Image" style="border: solid 2px #c7c7c7;">
                </div>
                <div class="info">
                    <a href="#" class="d-block" style="color: white;font-style:italic"> <?= $this->session->name ?> </a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item">
                        <a href="<?= base_url('frontend') ?>" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Beranda</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('peta') ?>" class="nav-link">
                            <i class="nav-icon fas fa-sharp fa-solid fa-map" style="color: #c7c7c7;"></i>
                            <p>Peta</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('geojson') ?>" class="nav-link">
                            <i class="nav-icon fas fa-layer-group"></i>
                            <p>Geojson</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">

                            <i class="nav-icon fas fa-map-marked"></i>
                            <p>Digitasi
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('point/p_view') ?>" class="nav-link">
                                    <i class=" nav-icon  fas fa-map-marker-alt"></i>
                                    <p>Point</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('Polyline') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-bacon"></i>
                                    <p> Polyline </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('polygon') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-square-full"></i>
                                    <p> Polygon </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">

                            <i class="nav-icon fas fa-folder"></i>
                            <p>Kecamatan/Kampung
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?= base_url('Kecamatan') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-monument"></i>
                                    <p>Kecamatan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('Kampung') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-dungeon"></i>
                                    <p>Kampung</p>
                                </a>
                            </li>
                        </ul>
                    <li class="nav-item">
                        <a href="<?= base_url('auth/logout') ?>" class="nav-link">
                            <i class="nav-icon fas fas fa-sign-out-alt" style="color: red;"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>


</ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="font-weight:bold;">WebGIS Pariwisata
                            </h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"
                                    data-toggle="tooltip" title="Remove">
                                    <i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">