<div class="card-body">
    <div class="row">

        <div class="col-sm-8">
            <?php
            echo validation_errors('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');

            echo form_open_multipart('geojson/edit/' . $geo->id);
            ?>
            <div class="form-group ">
                <label>Nama Objek</label>
                <input name="nama_objek" placeholder="Nama Objek" type="text" class="form-control" value="<?= $geo->nama_objek ?>">
            </div>
            <div class="form-group">
                <label>Type Geojson</label>
                <select name="type" class="form-control" id="tipe">
                    <option class="bg-info" value="<?= $geo->type ?>"><?= $geo->type ?></option>
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
                <label>Kode Kolom</label>
                <input value="<?= $geo->variabel ?>" type="text" name="variabel" class="form-control" placeholder="Code Geojson">
            </div>
            <div class="form-group ">
                <label>Unggah File Geojson Baru</label>
                <input value="<?= $geo->file_geojson ?>" type="file" name="file_geojson" class="form-control">
                <small class="text-success">Biarkan kosong jika tidak ingin diubah!!</small>
            </div>
            <div class="form-group">
                <label>Marker</maker>
                    <select name="marker" class="form-control" id="mark">
                        <option value="<?= $geo->marker ?>"><?= $geo->marker ?></option>
                        <option class="bg-info" value="">--Pilih Marker--</option>
                        <option value="default.png">Default</option>
                        <option value="alam.png">Alam</option>
                        <option value="buatan.png">Buatan</option>
                        <option value="sejarah.png">Sejarah</option>
                        <option value="spot diving.png">Spot Diving</option>
                        <option value="infrastruktur.png">Infrastruktur</option>
                    </select>

            </div>
            <div class="form-group ">
                <label for="color">Color</label>
                <input id="color" type="color" name="color" class="form-control" placeholder="Color" value="<?= $geo->color ?>">
                <small class="text-info">Pilih warna jika file geojson yang di unggah type Polyline/Polygon!!</small>
            </div>
            <div>
                <button type="submit" class="btn btn-info">Simpan</button>
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

<script>
    var shapeSelect = document.getElementById("tipe");
    var markerInput = document.getElementById("mark");
    var colorInput = document.getElementById("color");

    shapeSelect.addEventListener("change", function() {
        var selectedValue = shapeSelect.value;

        if (selectedValue === "point") {
            markerInput.style.display = "block";
            colorInput.style.display = "none";
        } else if (selectedValue === "polyline" || selectedValue === "polygon") {
            markerInput.style.display = "none";
            colorInput.style.display = "block";
        } else {
            markerInput.style.display = "none";
            colorInput.style.display = "none";
        }
    });
</script>