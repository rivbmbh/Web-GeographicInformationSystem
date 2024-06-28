<div class="card-body">
    <div class="row">
        <div class="col-sm-6">
            <?php
            echo validation_errors('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>'); 
            if (isset($error_upload)) { echo '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . 
            '</div>'; 
            } 
            

            echo form_open_multipart('point/e_point/' . $point->id);
            ?>
            <div class="form-group">
                <label>Nama Objek</label>
                <input name="nama_objek" value="<?= $point->nama_objek ?>" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>Jenis Wisata</label>
                <select name="jenis_wisata" class="form-control">
                    <option value="<?= $point->jenis_wisata ?>"><?= $point->jenis_wisata ?></option>
                    <option value="Alam">Alam</option>
                    <option value="Buatan">Buatan</option>
                    <option value="Sejarah">Sejarah</option>
                    <option value="Spot Diving">Spot Diving</option>
                </select>
            </div>
            <div class="form-group">
                <label>Latitude</label>
                <input id="Latitude" value="<?= $point->latitude ?>" name="latitude" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>Longitude</label>
                <input name="longitude" value="<?= $point->longitude ?>" id="Longitude" class="form-control">
            </div>
            <div class="form-group">
                <label>Kecamatan</label>
                <select name="id_kecamatan" id="kecamatan" class="form-control">
                    <?php foreach ($kecamatan as $key => $value) { ?>
                    <option value="<?= $value->id_kecamatan ?>"
                        <?= $value->id_kecamatan == $point->id_kecamatan ? 'selected' : ''  ?>>
                        <?= $value->nama_kecamatan ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Kampung</label>
                <select name="id_kampung" id="kampung" class="form-control">
                    <?php foreach ($kampung as $key => $value) { ?>
                    <option value="<?= $value->id_kampung ?>"
                        <?= $value->id_kampung == $point->id_kampung ? 'selected' : ''  ?>><?= $value->n_kampung ?>
                    </option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>Infrastruktur Pendukung</label>
                <div class="menu-has-children" aria-labelledby="dropdownMenuButton">

                    <label class="dropdown-item"><input type="checkbox" name="infrastruktur[]" value="WC Umum"
                            <?php echo (strpos($point->infrastruktur, 'WC Umum') !== false) ? 'checked' : ''; ?>>&nbsp;
                        WC
                        Umum</label>

                    <label class="dropdown-item"><input type="checkbox" name="infrastruktur[]" value="Tempat Makan"
                            <?php echo (strpos($point->infrastruktur, 'Tempat Makan') !== false) ? 'checked' : ''; ?>>&nbsp;
                        Tempat Makan</label>
                    <label class="dropdown-item"><input type="checkbox" name="infrastruktur[]" value="Tempat Parkir"
                            <?php echo (strpos($point->infrastruktur, 'Tempat Parkir') !== false) ? 'checked' : ''; ?>>&nbsp;
                        Tempat Parkir </label>
                    <label class=" dropdown-item"><input type="checkbox" name="infrastruktur[]" value="Penginapan"
                            <?php echo (strpos($point->infrastruktur, 'Penginapan') !== false) ? 'checked' : ''; ?>>&nbsp;
                        Penginapan
                    </label>

                </div>
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <img src="<?= base_url('assets/gambar/' . $point->gambar) ?>" width=235px height=115px
                    style="display: flex; margin-bottom:20px;">

            </div>
            <div class="form-group">
                <label>Ubah Gambar</label>
                <input type="file" name="gambar" class="form-control">
                <small class="text-success">Biarkan kosong jika tidak ingin diubah!!</small>

            </div>
            <div class="form-group">
                <label>Marker</maker>
                    <select name="marker" class="form-control">
                        <option value="<?= $point->marker ?>"><?= $point->marker ?></option>
                        <option value="alam.png">Alam</option>
                        <option value="buatan.png">Buatan</option>
                        <option value="sejarah.png">Sejarah</option>
                        <option value="spot diving.png">Spot Diving</option>
                    </select>
            </div>
            <div class="form-group">
                <label for="ket">Keterangan</label>
                <textarea name=" ket" id="ket" style="display: flex;"> <?= $point->ket ?></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-info">Simpan</button>
                <a class="btn btn-success" href="<?= site_url('point/p_view') ?>">Kembali</a>
            </div>
            <?php
            echo form_close();
            ?>
        </div>
        <div class="col-sm-6">
            <!-- peta -->
            <div id="map" style="width: 100%; height: 400px;"></div>
            <!-- end peta -->
        </div>
    </div>
</div>
</div>
</div>

<script src="<?php echo base_url("js/jquery.min.js"); ?>" type="text/javascript"></script>
<script>
//ajax untuk kampung by kecamatan
$(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
    // sembunyikan dulu untuk loadingnya
    $("#loading").hide();

    $("#kecamatan").change(function() { // Ketika user mengganti atau memilih data kecamatan
        $("#kampung").hide(); // Sembunyikan dulu combobox kampung nya
        $("#loading").show(); // Tampilkan loadingnya

        $.ajax({
            type: "POST", // Method pengiriman data bisa dengan GET atau POST
            url: "<?php echo base_url("point/listKampung"); ?>", // Isi dengan url/path file php yang dituju
            data: {
                id_kecamatan: $("#kecamatan").val()
            }, // data yang akan dikirim ke file yang dituju
            dataType: "json",
            beforeSend: function(e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                }
            },
            success: function(response) { // Ketika proses pengiriman berhasil
                $("#loading").hide(); // Sembunyikan loadingnya

                // set isi dari combobox kampung
                // lalu munculkan kembali combobox kampungnya
                $("#kampung").html(response.list_kampung).show();
            },
            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                alert(xhr.status + "\n" + xhr.responseText + "\n" +
                    thrownError); // Munculkan alert error
            }
        });
    });
});

var GoogleSatelliteHybrid = L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
    maxZoom: 22,
    attribution: 'WebGIS'
});
var OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
});
var map = L.map('map', {
    center: [<?= $point->latitude ?>, <?= $point->longitude ?>],
    zoom: 16,
    zoomControl: true,
    layers: [GoogleSatelliteHybrid]
});
var baseLayers = {
    "Google Satellite Hybrid": GoogleSatelliteHybrid,
    "Open Street Map Mapnik": OpenStreetMap_Mapnik
};
var overlays = {};
L.control.layers(baseLayers).addTo(map);
// L.Control.geocoder({position :"topleft", collapsed:false}).addTo(map);
var curLocation = [0, 0];
if (curLocation[0] == 0 && curLocation[1] == 0) {
    curLocation = [<?= $point->latitude ?>, <?= $point->longitude ?>];
}
map.attributionControl.setPrefix(false);
var marker = new L.marker(curLocation, {
    draggable: 'true'
});
marker.on('dragend', function(event) {
    var position = marker.getLatLng();
    marker.setLatLng(position, {
        draggable: 'true'
    }).bindPopup(position).update();
    $("#Latitude").val(position.lat);
    $("#Longitude").val(position.lng).keyup();
});
$("#Latitude, #Longitude").change(function() {
    var position = [parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
    marker.setLatLng(position, {
        draggable: 'true'
    }).bindPopup(position).update();
    map.panTo(position);
});
map.addLayer(marker);
</script>