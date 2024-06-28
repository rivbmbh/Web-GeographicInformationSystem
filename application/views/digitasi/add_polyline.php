<div class="card-body">
    <div class="row">
        <div class="col-sm-7">
            <!-- peta -->
            <div id="map" style="width: 100%; height: 600px;"></div>
            <!-- end peta -->
        </div>
        <div class="col-sm-5">
            <?php
            echo validation_errors('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
            if (isset($error_upload)) {
                echo '<div class="alert alert-danger 
alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
            }
            echo form_open_multipart('Polyline/add');
            ?>
            <div class="form-group">
                <label>Nama Objek</label>
                <input name="nama_objek" placeholder="Nama Objek" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>GeoJSON</label>
                <textarea name="geojson" rows="4" class="form-control" readonly></textarea>
            </div>
            <div class="form-group"><label>Weight</label>
                <input name="weight" id="weight" placeholder="Weight" type="text" class="form-control" value="<?= set_value('weight') ?>">
            </div>
            <div class="form-group">
                <label>Color</label>
                <div class="input-group my-colorpicker2">
                    <input type="color" name="color" class="form-control" />
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fasquare"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar" class="form-control" required>
            </div>
            <div>
                <button type="submit" class="btn btn-info">Simpan</button>
                <button type="reset" class="btn btn-success">Reset</button>
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
        zoomControl: false,
        layers: [GoogleSatelliteHybrid]
    });
    var baseLayers = {
        "Google Satellite Hybrid": GoogleSatelliteHybrid,
        "Open Street Map Mapnik": OpenStreetMap_Mapnik
    };
    var overlays = {

    };

    L.control.layers(baseLayers).addTo(map);
    // FeatureGroup is to store editable layers
    var drawnItems = new L.FeatureGroup();
    map.addLayer(drawnItems);
    var drawControl = new L.Control.Draw({
        draw: {
            polygon: false,
            marker: false,
            circle: false,
            circlemarker: false,
            rectangle: false,
            polyline: true,
        },
        edit: {
            featureGroup: drawnItems
        }
    });

    map.addControl(drawControl);
    //membuat draw
    map.on('draw:created', function(event) {
        var layer = event.layer;
        var feature = layer.feature = layer.feature || {};
        feature.type = feature.type || "Feature";

        var props = feature.properties = feature.properties || {};
        drawnItems.addLayer(layer);
        $("[name=geojson]").html(JSON.stringify(drawnItems.toGeoJSON()));
    });

    //edit draw
    map.on('draw:edited', function(e) {
        $("[name=geojson]").html(JSON.stringify(drawnItems.toGeoJSON()));
    });

    //delete draw
    map.on('draw:deleted', function(e) {
        $("[name=geojson]").html(JSON.stringify(drawnItems.toGeoJSON()));
    });
</script>