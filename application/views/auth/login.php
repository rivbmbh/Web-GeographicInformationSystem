    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center" style="margin-top: 100px;">

            <div class="col-lg-5">

                <div class="card o-hidden border-0 shadow-lg my-5 bg-white" style="border-radius: 18px;">
                    <!-- <img src="<?= base_url('assets/img/cult.jpg') ?>" alt="" height="200px"> -->
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4 font-italic">Login Page</h1>
                                    </div>



                                    <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="name"
                                                id="name" placeholder="Username" value="<?= set_value('name') ?>">
                                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>
                                        <div class=" form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="password" id="password" placeholder="Password">
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <!-- <div class="text-center">
                                        <a class="small text-info" style="font-size: 14px;"
                                            href="<?= base_url('auth/registration') ?>">Lupa Password</a>
                                    </div> -->
                                    <!-- <div class="text-center">
                                        <a class="small text-info" style="font-size: 14px;"
                                            href="<?= base_url('auth/registration') ?>">Buat Akun</a>
                                    </div> -->
                                    <div class="text-center">
                                        <a class="small text-info" style="font-size: 14px;"
                                            href=" <?= base_url('frontend') ?>">Masuk sebagai
                                            Tamu</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>