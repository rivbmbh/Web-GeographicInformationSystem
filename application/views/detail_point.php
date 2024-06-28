<head>

    <style>
    body {
        background-image: url(<?= base_url('assets/img/BG6.jpg') ?>);
    }

    .konten {
        width: 90%;
        height: max-content;
        color: black;
        border: none;
        display: inline-block;
        vertical-align: top;
        display: flex;
        padding-top: 10px;
        background-color: #fff;
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;

    }

    .header {

        margin-top: 20px;
    }

    .judul {
        text-align: center;
        background-color: limegreen;
        margin-bottom: 0;
        margin-left: 600px;
        color: white;
        font-style: italic;

    }
    </style>
</head>
<div class="text-light" style="background-color:#343b40; padding:20px">
    <a href="#hero"><img src="<?= base_url() ?>assets/img/logo/logo.png" alt="Logo Sangihe" style="margin-top:0px; "
            height="56px" /></img></a>

</div>
<div class="header col-sm-8">

</div>
<div align="center" style="height:max-content">

    <h1 class="text-dark font-italic font-weight-bold">Detail Wisata</h1>
    <div class="konten">
        <div class=" col-sm-7">
            <div id="map" style="width: 100%; height: 60vh; color:black; border:none;">

                <script>
                var GoogleSatelliteHybrid = L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
                    maxZoom: 22,
                    attribution: 'WebGIS Wisata'
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
                L.control.coordinates({
                    position: "bottomleft",
                    decimals: 6,
                    decimalSeperator: ",",
                    labelTemplateLat: "Latitude: {y}",
                    labelTemplateLng: "Longitude: {x}"
                }).addTo(map);

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
            </div>
            <div align="left">
                <div style="font-size: 13px;">

                    <?php
                    $namaKecamatan = '';
                    foreach ($kecamatan as $key => $value) :
                    ?>
                    <?php if ($value->id_kecamatan == $point->id_kecamatan) : ?>
                    <span>Lokasi : Kepulauan Sangihe, <?= $value->nama_kecamatan ?>,

                    </span>
                    <?php
                        endif;
                    endforeach;
                    ?>
                    <!-- kampung -->
                    <?php
                    $namaKampung = '';
                    foreach ($kampung as $key => $value) :
                    ?>
                    <?php if ($value->id_kampung == $point->id_kampung) : ?>
                    <span><?= $value->n_kampung ?></span>
                    <?php
                        endif;
                    endforeach;
                    ?>
                    <!-- kordinat -->
                    <!-- <span style="margin-left: 158px;">Kordinat X (<?= $point->latitude ?>) Y
                        (<?= $point->longitude ?>)</span> -->
                </div>
            </div>
        </div>

        <div class="col-sm-5" align="left" style="height: max-content;">
            <img src="<?= base_url('assets/gambar/' . $point->gambar) ?>" width="100%" height="300px">
            <h6 align="left" style="margin-top: 20px; margin-bottom:0; font-size:large "> <i
                    class="nav-icon fas fa-map-signs"></i>
                <?= $point->nama_objek ?></h6>
            <div style="font-size: 13px; margin-top:10px">

                <?php
                $namaKecamatan = '';
                foreach ($kecamatan as $key => $value) :
                ?>
                <?php if ($value->id_kecamatan == $point->id_kecamatan) : ?>
                <span>Alamat : <?= $value->nama_kecamatan ?>,

                </span>
                <?php
                    endif;
                endforeach;
                ?>
                <!-- kampung -->
                <?php
                $namaKampung = '';
                foreach ($kampung as $key => $value) :
                ?>
                <?php if ($value->id_kampung == $point->id_kampung) : ?>
                <span><?= $value->n_kampung ?></span>
                <?php
                    endif;
                endforeach;
                ?>
                <div>
                    <span>Jenis Wisata : <?= $point->jenis_wisata ?></span>
                </div>
            </div>
            <hr>
            <div align="left" style="margin-bottom: 30px;">
                <div>
                    <div><span>Keterangan :</span></div>
                    <div><span><?= $point->ket ?> Untuk infrastruktur
                            pendukung <?= $point->infrastruktur ?>. </span>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <center>
        <div style="margin-top: 20px;"></div>
    </center>
</div>