<nav id="nav-menu-container">
    <ul class="nav-menu">

        <li class="menu"><a href="<?= base_url('frontend') ?>">Home</a></li>
        <!-- cek apakah user berada pada halaman peta -->
        <?php if (uri_string() === 'peta') { ?>
        <!-- jika berada pada halaman peta maka status nav aktif -->
        <li class="menu-active"><a href="<?= base_url('peta') ?>">Peta</a></li>
        <?php } else { ?>
        <!-- jika tidak berada pada di halaman peta maka status nav nonaktif -->
        <li class="menu"><a href="<?= base_url('peta') ?>">Peta</a></li>
        <?php } ?>

        <!-- cek jika admin sudah login atau blm -->
        <?php if ($this->session->userdata('email') == "") { ?>
        <li><a href="<?= base_url('auth') ?>">Login</a></li>
        <?php } else { ?>
        <li><a href="<?= base_url('auth/logout') ?>">Logout</a></li>
        <?php } ?>

        <!-- admin page akan muncul hanya ketika admin sudah login -->
        <?php if ($this->session->userdata('email') == "") { ?>
        <?php } else { ?>
        <li><a class="av-link scrollto" href="<?= base_url('backend') ?>">Admin Page</a></li>
        <?php } ?>
    </ul>
</nav><!-- #nav-menu-container -->
</div>
</header><!-- #header -->