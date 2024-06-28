<head>
    <style>
    .bt1 {
        text-decoration: none;
        font-weight: bold;
        padding: 8px;
        background-color: #1A75F9;
        border-radius: 11px;
    }

    .bt1:hover {
        background-color: #0266D6;

    }
    </style>
</head>
<div class="content">
    <div class="text-light" style="background-color:#343b40; padding:20px">
        <a href="#hero"><img src="<?= base_url() ?>assets/img/logo/logo.png" alt="Logo Sangihe" style="margin-top:0px; "
                height="56px" /></img></a>

    </div>
    <div id="map" style="width: 100%; height: 90vh; color:black; border:none;">
    </div>
</div>

<!-- js untuk map -->
<script>
var point = new L.LayerGroup();
var buatan = new L.LayerGroup();
var alam = new L.LayerGroup();
var sejarah = new L.LayerGroup();
var spotDiving = new L.LayerGroup();
var polyline = new L.LayerGroup();
var polygon = new L.LayerGroup();
var infra = new L.LayerGroup();
var digit = new L.LayerGroup();



//base map
var map = L.map('map', {
    center: [3.603122, 125.508885],
    zoom: 10,
    zoomControl: false,
    layers: []
});

var GoogleSatelliteHybrid = L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
    maxZoom: 28,
    attribution: 'Kabupaten Kepulauan Sangihe'
});

var Stadia_AlidadeSmoothDark = L.tileLayer(
    'https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
        maxZoom: 28,
        attribution: 'Kabupaten Kepulauan Sangihe'
    })
var Esri_WorldImagery = L.tileLayer(
    'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        maxZoom: 25,
        attribution: 'Kabupaten Kepulauan Sangihe'
    }).addTo(map);

var Stadia_AlidadeSmooth = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth/{z}/{x}/{y}{r}.png', {
    maxZoom: 20,
    attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
});

//pilihan peta-peta dasar
var g_satellite = new L.Google('SATELLITE');

//DOWNLOAD FILE


//pencarian lokasi berdarkan file_geojson
var searchControl = L.control.search({
    position: "topleft",
    layer: point, //layer yang di cari
    initial: false,
    propertyName: 'nama_objek',
}).addTo(map);

// Tambahkan event listener untuk search:locationfound event
searchControl.on('search:locationfound', function(e) {
    // e.layer adalah layer yang ditemukan dari hasil pencarian
    var foundLayer = e.layer;

    // Zoom ke lokasi yang ditemukan 
    map.flyTo(foundLayer.getLatLng(),
        18);
    //tampil popup jika lokasi ditemukan
    foundLayer.openPopup();
});

// pilihan peta
var baseLayers = {
    '&nbsp;Esri_WorldImagery': Esri_WorldImagery,
    '&nbsp;Smooth Dark': Stadia_AlidadeSmoothDark,
    '&nbsp;Google Satellite Hybrid': GoogleSatelliteHybrid,
    '&nbsp;Google satellite': g_satellite,
};

//kordinat
L.control.coordinates({
    position: "bottomright",
    decimals: 6,
    decimalSeperator: ",",
    labelTemplateLat: "Latitude: {y}",
    labelTemplateLng: "Longitude: {x}"
}).addTo(map);

var groupedOverlays = {
    "Data Objek": {
        "&nbsp; Wisata": point,
        "&nbsp; Alam ": alam,
        "&nbsp; Buatan ": buatan,
        "&nbsp; Sejarah ": sejarah,
        "&nbsp; Spot Diving ": spotDiving,
        "&nbsp; Infrastruktur ": infra,
    },
    "Digitasi": {
        "&nbsp; Point": digit,
        "&nbsp;  Polyline": polyline,
        "&nbsp;  Polygon": polygon,
    },
};


L.control.groupedLayers(baseLayers, groupedOverlays, {
    collapsed: false
}).addTo(map);

//zoom bar
var zoom_bar = new L.Control.ZoomBar({
    position: "topleft"
}).addTo(map);

//ukur jarak tempuh
var measureControl = new L.Control.Measure({
    position: 'bottomright',
    primaryLengthUnit: 'meters',
    secondaryLengthUnit: 'kilometers',
    primaryAreaUnit: 'sqmeters',
    secondaryAreaUnit: 'hectares'
}).addTo(map);

//lokasi user
var locateControl = L.control.locate({
    position: "topleft",
    drawCircle: true,
    follow: true,
    setView: true,
    keepCurrentZoomLevel: true,
    markerStyle: {
        weight: 1,
        opacity: 0.8,
        fillOpacity: 0.8
    },
    circleStyle: {
        weight: 1,
        clickable: false
    },
    icon: "fas fa-location-arrow",
    metric: false,
    strings: {
        title: "My location",
        popup: "You are within {distance} {unit} from this point",
        outsideMapBoundsMsg: "You seem located outside the boundaries of the map"
    },
    locateOptions: {
        maxZoom: 18,
        watch: true,
        enableHighAccuracy: true,
        maximumAge: 10000,
        timeout: 10000
    }
}).addTo(map);


//import peta
L.easyPrint({
    title: 'My awesome print button',
    position: 'topleft',
    exportOnly: true,
    // filename: 'WebGIS Pariwisata Kepulauan Sangihe',
    sizeModes: ['A4Portrait', 'A4Landscape']
}).addTo(map);

// arah mata angin
var north = L.control({
    position: "bottomleft"
});
north.onAdd = function(map) {
    var div = L.DomUtil.create("div", "info legend");
    div.innerHTML = '<img src="<?= base_url() ?>assets/img/mataangin.png">';
    return div;
}
north.addTo(map);

//skala
L.control.scale().addTo(map);

//menampilkan digitasi marker
<?php foreach ($point as $key => $value) { ?>
L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
    icon: L.icon({
        iconUrl: '<?= base_url('assets/marker/' . $value->marker) ?>',
        iconSize: [30, 35], // size of the icon 
    })
}).addTo(digit).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
    "<tr><th>Nama Objek</th><td>" + "<?= $value->jenis_wisata ?>" + "</td></tr>" +
    "<tr><th>Keterangan</th><td>" + "<?= $value->nama_objek ?>" + "</td></tr>" +
    "<tr><th>Action</th><td>" +
    "<a style='color:white' href='<?= base_url('point/detail/' . $value->id) ?>' class='btn-sm btn-primary'>Info Detail</a>" +
    "</td></tr>" +
    "<table>");
<?php } ?>;

//polyline
<?php foreach ($polyline as $key => $value) { ?> polyline = L.geoJSON(<?= $value->geojson; ?>, {
    style: {
        color: "<?= $value->color ?>"
    },
}).addTo(polyline);
polyline.eachLayer(function(layer) {
    layer.bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
        "<tr><th>Nama Objek</th><td>" + "<?= $value->nama_objek ?>" + "</td></tr>" +
        "<tr><th>Color</th><td>" + "<?= $value->color ?>" + "</td></tr>" +
        "<tr><th>Gambar</th><td>" +
        "<img src='<?= base_url('assets/gambar/' . $value->gambar) ?>'width='180px'>" + "</td></tr>" +
        "<table>");
});
<?php } ?>;

<?php foreach ($polygon as $key => $value) { ?> polygon = L.geoJSON(<?= $value->geojson; ?>, {
    style: {
        color: 'white',
        dashArray: '3',
        lineCap: 'butt',
        lineJoin: 'miter',
        fillColor: '<?= $value->color ?>',
        fillOpacity: 1.0,
    },
}).addTo(polygon);
polygon.eachLayer(function(layer) {
    layer.bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
        "<tr><th>Nama Objek</th><td>" + "<?= $value->nama_objek ?>" + "</td></tr>" +
        "<tr><th>Color</th><td>" + "<?= $value->color ?>" + "</td></tr>" +
        "<tr><th>Gambar</th><td>" +
        "<img src='<?= base_url('assets/gambar/' . $value->gambar) ?>'width='180px'>" + "</td></tr>" +
        "<table>");
});
<?php } ?>;


//GEOJSON 
<?php foreach ($geojson as $geo) : ?>
$.getJSON("assets/geojson/<?= $geo->file_geojson ?>", function(data) {
    L.geoJSON(data, {
        onEachFeature: function(feature, layer) {
            var popupContent = '';

            if (feature.properties) {
                // pada konten popup dari masing-masing file GeoJSON
                var properties = Object.keys(feature.properties.<?= $geo->variabel ?>);
                properties.forEach(function(property) {
                    popupContent += feature.properties.<?= $geo->variabel ?>[property];
                });

                if (feature.geometry.type === 'Point') {
                    var infoUrl = '<?= site_url("peta/info"); ?>?feature=' +
                        encodeURIComponent(JSON.stringify(feature));
                    popupContent +=
                        '<tr><th>Action</th><td><a style="color: white;" class="btn-sm btn-primary" href="' +
                        infoUrl + '">Info Detail</a></td></tr>';

                    // Menambahkan ikon marker kustom
                    var customIcon = L.icon({
                        iconUrl: 'assets/marker/<?= $geo->marker ?>',
                        iconSize: [30, 35], // Ukuran ikon dalam piksel
                        iconAnchor: [16, 32] // Titik anchor ikon (pusat bawah)
                    });

                    layer.setIcon(customIcon);
                }

                // Cek tipe geometri
                if (feature.geometry.type === 'Polygon' || feature.geometry.type ===
                    'MultiPolygon') {
                    // Menambahkan gaya fill (warna isi)
                    layer.setStyle({
                        fillColor: '<?= $geo->color ?>',
                        fillOpacity: 1,
                        color: '<?= $geo->color ?>',
                        weight: 2
                    });
                } else if (feature.geometry.type === 'LineString' || feature.geometry.type ===
                    'MultiLineString') {
                    // Menambahkan gaya garis
                    layer.setStyle({
                        color: '<?= $geo->color ?>',
                        weight: 2
                    });
                }
            }

            layer.bindPopup(
                "<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama Objek</th><td>" + "<?= $geo->nama_objek ?>" + "</td></tr>" +
                "<tr><th>Keterangan</th><td>" + popupContent + "</td></tr>" +
                "<table>");
        }
    }).addTo(<?= $geo->type ?>);
});
<?php endforeach; ?>
</script>