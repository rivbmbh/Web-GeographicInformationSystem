<div class="card-body">
    <?php            
         echo validation_errors('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
        ?>
    <div class="row">

        <div class="col-sm-8">
            <form action="" method="post">

                <div class="form-group " style="display: flex;">
                    <input type="number" name="i" placeholder=" Tambah Kolom">
                    <button type="submit" name="tambah" class="btn btn-info" style="margin-left: 20px;">
                        +</button>
                </div>
            </form>
            <?php
 
            echo form_open_multipart('kampung/tambah');
            ?>
            <div class="form-group">
                <label>Kecamatan</label>
                <select name="id_kecamatan" class="form-control">
                    <option value="">--Pilih Kecamatan--</option>
                    <?php foreach ($kecamatan as $key => $value) { ?>
                    <option value="<?= $value->id_kecamatan ?>"><?= $value->nama_kecamatan ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Nama Kampung/Desa</label>
                <input name="n_kampung[]" placeholder="Nama Kampung" type="text" class="form-control">
            </div>

            <?php 
            if(isset($_POST['tambah']))
            {
                for($i = 0; $i < $this->input->post('i'); $i++){
                    echo '<div class="form-group">
                            <label>Nama Kampung/Desa</label>
                            <input name="n_kampung[]" placeholder="Nama Kampung" type="text" class="form-control">
                        </div>';
                }

            }
            ?>
            <div>
                <button type="submit" class="btn btn-info">Tambah</button>
                <a class="btn btn-success" href="<?= site_url('kampung') ?>">Kembali</a>
            </div>
            <?php
    echo form_close();
    ?>
        </div>
    </div>
</div>
</div>
</div>