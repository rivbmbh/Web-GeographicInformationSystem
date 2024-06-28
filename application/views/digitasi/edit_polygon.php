<div class="card-body">
    <div class="row">
        <div class="col-sm-7">
            <!-- peta -->
            <div id="map" style="width: 100%; height: 600px;"></div>
            <!-- end peta -->
        </div>
        <div class="col-sm-5">
            <?php echo validation_errors('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>'); 
if (isset($error_upload)) { echo '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . 
'</div>'; 
} 
echo form_open_multipart('polygon/edit/' .$polygon->id); 
?>
            <div class="form-group">
                <label>Nama Objek</label>
                <input name="nama_objek" value="<?= $polygon->nama_objek ?>" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>GeoJSON</label>
                <textarea name="geojson" value="<?= $polygon->geojson ?>" rows="4" class="form-control"
                    readonly></textarea>
            </div>
            <div class="form-group">
                <label>Color</label>
                <div class="input-group my-colorpicker2">
                    <input type="color" value="<?= $polygon->color ?>" name="color" class="form-control" readonly />
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-square"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <img src="<?= base_url('assets/gambar/'.$polygon->gambar) ?>" width="120px">
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar" class="form-control">
            </div>
            <div>
                <button type="submit" class="btn btn-info">Simpan</button>
                <a class="btn btn-success" href="<?= site_url('polygon') ?>">Kembali</a>
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
    attribution: 'WebGIS Trainning by Roni Haryadi-0823-8812-8916'
});
var OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
});
var map = L.map('map', {
    center: [3.876956, 101.837510],
    zoom: 7,
    zoomControl: false,
    layers: [GoogleSatelliteHybrid]
});
var baseLayers = {
    "Google Satellite Hybrid": GoogleSatelliteHybrid,
    "Open Street Map Mapnik": OpenStreetMap_Mapnik
};
var overlays = {};
L.control.layers(baseLayers).addTo(map);
// FeatureGroup is to store editable layers
var drawnItems = new L.geoJSON(<?= $polygon->geojson ?>);
map.addLayer(drawnItems);
var drawControl = new L.Control.Draw({
    draw: {
        polygon: false,
        marker: false,
        circle: false,
        circlemarker: false,
        rectangle: false,
        polygon: true,
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
map.fitBounds(drawnItems.getBounds());
</script>