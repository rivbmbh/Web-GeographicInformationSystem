<div class="card-body">
    <div class="row">

        <div class="col-sm-8">
            <?php
            echo validation_errors('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
            if (isset($error_upload)) {
                echo '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload .
                    '</div>';
            }
            echo form_open_multipart('geojson/add');
            ?>
            <div class="form-group ">
                <label for="nama_objek">Nama Objek</label>
                <input id="nama_objek" name="nama_objek" placeholder="Nama Objek" type="text" class="form-control" value="<?= set_value('nama_objek') ?>">

            </div>
            <div class="form-group">
                <label>Type Geojson</label>
                <select name="type" class="form-control">
                    <option class="bg-info" value="">-Pilih tipe data-</option>
                    <option value="point">Point</option>
                    <option value="polygon">Polygon</option>
                    <option value="polyline">Polyline</option>
                    <option value="infra">Infrastruktur</option>
                    <option value="alam">Alam</option>
                    <option value="buatan">Buatan</option>
                    <option value="spotDiving">Spot Diving</option>
                    <option value="sejarah">Sejarah</option>
                </select>
            </div>
            <div class="form-group ">
                <label for="variabel">Kode Kolom</label>
                <input id="variabel" type="text" name="variabel" class="form-control" placeholder="Nama Kolom" value="<?= set_value('variabel') ?>">
            </div>
            <div class="form-group ">
                <label>File Geojson</label>
                <input type="file" name="file_geojson" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Marker</label>
                <select name="marker" class="form-control">
                    <option class="bg-info" value="">--Pilih Marker--</option>
                    <option value="default.png">Default</option>
                    <option value="alam.png">Alam</option>
                    <option value="buatan.png">Buatan</option>
                    <option value="sejarah.png">Sejarah</option>
                    <option value="spot diving.png">Spot Diving</option>
                    <option value="infrastruktur.png">Infrastruktur</option>
                </select>
                <small class="text-info">Pilih marker jika file geojson yang di upload type Point!!</small>

            </div>
            <div class="form-group ">
                <label for="color">Color</label>
                <input id="color" type="color" name="color" class="form-control" placeholder="Color" value="<?= set_value('color') ?>">
                <small class="text-info">Pilih warna jika file geojson yang di unggah type Polyline/Polygon!!</small>
            </div>
            <div>
                <button type="submit" class="btn btn-info">Tambah</button>
                <a class="btn btn-success" href="<?= site_url('geojson') ?>">Kembali</a>
            </div>
            <?php
            echo form_close();
            ?>
        </div>
    </div>
</div>
</div>
</div>