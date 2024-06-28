<div class="card-body">
    <?php            
         echo validation_errors('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
        ?>
    <div class="row">

        <div class="col-sm-8">

            <?php
 
            echo form_open_multipart('kecamatan/tambah');
            ?>

            <div class="form-group">
                <label>Nama Kecamatan</label>
                <input name="nama_kecamatan" placeholder="Nama Kecamatan" type="text" class="form-control">
            </div>

            <div>
                <button type="submit" class="btn btn-info">Tambah</button>
                <a class="btn btn-success" href="<?= site_url('kecamatan') ?>">Kembali</a>
            </div>
            <?php
    echo form_close();
    ?>
        </div>
    </div>
</div>
</div>
</div>