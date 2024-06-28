<nav id="nav-menu-container">
    <ul class="nav-menu">
        <li class="menu-active"><a href="#hero">Home</a></li>
        <li><a href="<?= base_url('peta') ?>">Peta</a></li>

        <li><a href="#about">About</a></li>
        <!-- <li><a href="#services">Fungsi</a></li> -->
        <li><a href="#portfolio">Wisata</a></li>
        <li><a href="#contact">Contact</a></li>
        <?php if ($this->session->userdata('email') == "") { ?>
        <li><a href="<?= base_url('auth') ?>">Login</a></li>
        <?php } else { ?>
        <li><a href="<?= base_url('auth/logout') ?>">Logout</a></li>
        <?php } ?>
        <?php if ($this->session->userdata('email') == "") { ?>
        <?php } else { ?>
        <li><a class="av-link scrollto" href="<?= base_url('backend') ?>">Admin Page</a></li>
        <?php } ?>
    </ul>
</nav><!-- #nav-menu-container -->
</div>
</header><!-- #header -->