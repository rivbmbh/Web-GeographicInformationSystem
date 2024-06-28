<div class="card-body">
    <div class="row">
        <div class="col-sm-7">
            <?php
            echo validation_errors('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
            

            echo form_open_multipart('kampung/edit/' . $kampung->id_kampung);
            ?>
            <div class="form-group">
                <label>Kecamatan</label>
                <select name="id_kecamatan" class="form-control">
                    <?php foreach ($kecamatan as $key => $value) { ?>
                    <option value="<?= $value->id_kecamatan ?>"
                        <?= $value->id_kecamatan == $kampung->id_kecamatan ? 'selected' : ''  ?>>
                        <?= $value->nama_kecamatan ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Nama Kampung</label>
                <input name="n_kampung" value="<?= $kampung->n_kampung ?>" placeholder="Nama Kampung" type="text"
                    class="form-control">

            </div>
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