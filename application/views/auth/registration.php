    <div class="container" style="margin-top: 150px;">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-5 mx-auto" style="border-radius: 18px;">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4 font-italic">Registration</h1>
                            </div>
                            <form class="user" method="post" action="<?= base_url('auth/registration') ?>">
                                <!-- NAMA LENGKAP -->
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="name" id="name" placeholder="Nama Lengkap" value="<?= set_value('name') ?>">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <!-- EMAIL -->
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="email" id="email" placeholder="Email" value="<?= set_value('email') ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <!-- PASSWORD -->
                                <div class=" form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password1" id="password1" placeholder="Password">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="password2" id="password2" placeholder="Repeat Password">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success btn-user btn-block">
                                    Register
                                </button>
                            </form>
                            <hr>
                            <!-- <div class="text-center">
                                <a class="small text-dark" style="font-size: 14px;" href="forgot-password.html">Lupa
                                    Password</a>
                            </div> -->
                            <div class="text-center">
                                <a class="small text-dark" style="font-size: 15px; text-decoration:none"> Sudah
                                    punya akun</a>
                                <a class="small text-info" style="font-size: 15px;" href="<?= base_url('auth') ?>"> Login disini</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>