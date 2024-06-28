<div class="card-body">
    <div class="row">
        <div class="col-sm-6">
            <?php
            echo validation_errors('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>'); 
            if (isset($error_upload)) { echo '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . 
            '</div>'; 
            } 
            
            echo form_open_multipart('point/tambah');
            ?>
            <div class="form-group">
                <label>Nama Objek Wisata</label>
                <input name="nama_objek" placeholder="Nama Objek Wisata" type="text" class="form-control"
                    value="<?= set_value('nama_objek') ?>">
            </div>
            <div class="form-group">
                <label>Jenis Wisata</label>
                <select name="jenis_wisata" class="form-control">
                    <option value="">--Pilih Jenis Wisata--</option>
                    <option value="Alam">Alam</option>
                    <option value="Buatan">Buatan</option>
                    <option value="Sejarah">Sejarah</option>
                    <option value="Spot Diving">Spot Diving</option>
                    <option value="Infrastruktur">Infrastruktur</option>

                </select>
            </div>
            <div class="form-group">
                <label>Latitude</label>
                <input id="Latitude" name="latitude" placeholder="Latitude" type="text" class="form-control"
                    value="<?= set_value('latitude') ?>">
            </div>
            <div class="form-group">
                <label>Longitude</label>
                <input name="longitude" id="Longitude" placeholder="Longitude" class="form-control"
                    value="<?= set_value('longitude') ?>">
            </div>
            <div class="form-group">
                <label>Kecamatan</label>
                <select name="id_kecamatan" id="kecamatan" class="form-control">
                    <option value="">--Pilih Kecamatan--</option>
                    <?php foreach ($kecamatan as $key => $data) { ?>
                    <option value="<?= $data->id_kecamatan ?>"><?= $data->nama_kecamatan ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Kampung</label>
                <select name="id_kampung" id="kampung" class="form-control">
                    <option value="">--Pilih Kampung--</option>

                </select>
            </div>

            <div class="form-group">
                <label>Infrastruktur Pendukung</label>
                <div class="menu-has-children" aria-labelledby="dropdownMenuButton">

                    <label class="dropdown-item"><input type="checkbox" name="infrastruktur[]" value="WC Umum">&nbsp;WC
                        Umum</label>
                    <label class="dropdown-item"><input type="checkbox" name="infrastruktur[]"
                            value="Tempat Makan">&nbsp;
                        Tempat Makan</label>
                    <label class="dropdown-item"><input type="checkbox" name="infrastruktur[]"
                            value="Tempat Parkir">&nbsp; Tempat
                        Parkir</label>
                    <label class=" dropdown-item"><input type="checkbox" name="infrastruktur[]"
                            value="Penginapan">&nbsp;
                        Penginapan</label>

                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" name="gambar" class="form-control" required>

                </div>
                <div class="form-group">
                    <label>Marker</label>
                    <select name="marker" class="form-control">
                        <option value="">--Pilih Marker--</option>
                        <option value="alam.png">Alam</option>
                        <option value="buatan.png">Buatan</option>
                        <option value="sejarah.png">Sejarah</option>
                        <option value="spot diving.png">Spot Diving</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ket">Keterangan</label>
                    <textarea name="ket" id="ket" style="display: flex;"> <?= set_value('ket') ?></textarea>
                </div>
                <div>
                    <button type="submit" class="btn btn-info">Tambah</button>
                    <a class="btn btn-success" href="<?= site_url('point/p_view') ?>">Kembali</a>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div>
        <div class="col-sm-6">
            <!-- peta -->
            <div id="map" style="width: 100%; height: 400px;"></div>
            <!-- end peta -->
        </div>
    </div>
</div>
</div>
<!-- Load librari/plugin jquery nya -->
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
    center: [3.603122, 125.508885],
    zoom: 11,
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
    curLocation = [3.603122, 125.508885];
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