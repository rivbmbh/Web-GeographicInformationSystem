<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Webgis</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="<?= base_url() ?>assets/frontend1/img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700"
        rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="<?= base_url() ?>assets/frontend1/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="<?= base_url() ?>assets/frontend1/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/frontend1/lib/animate/animate.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="<?= base_url() ?>assets/frontend1/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- peta -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    <!-- layer -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugin/leaflet.groupedlayercontrol.css" />
    <script src="<?= base_url() ?>assets/plugin/leaflet.groupedlayercontrol.js"></script>

    <!-- zoom -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugin/L.Control.ZoomBar.css" />
    <script type="text/javascript" src="<?= base_url() ?>assets/plugin/L.Control.ZoomBar.js"></script>

    <!-- search -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    <!-- kordinat -->
    <script type="text/javascript" src="<?= base_url() ?>assets/plugin/Leaflet.Coordinates-0.1.5.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugin/Leaflet.Coordinates-0.1.5.css" />

    <!-- jarak -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugin/leaflet-measure-master/leaflet-measure.css">
    <script src="<?= base_url() ?>assets/plugin/leaflet-measure-master/leaflet-measure.js"></script>

    <!-- lokasi -->
    <link rel="stylesheet"
        href="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.css">
    <script src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.min.js">
    </script>

    <!-- street view -->
    <script src="http://maps.google.com/maps/api/js?v=3.2&sensor=false&key=AIzaSyBXTXgQ7wZPndgKZilAsFVZjT5YWMr9WFs">
    </script>
    <script src="https://raruto.github.io/cdn/leaflet-google/0.0.3/leaflet-google.js"></script>

    <!-- kompas -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugin/leaflet-compass.css">
    <script src="<?= base_url() ?>assets/plugin/leaflet-compass.js"></script>
    <script src="<?= base_url() ?>assets/plugin/leaflet-compass.css"></script>

    <!-- panel layer -->
    <link rel="stylesheet"
        href="<?= base_url() ?>assets/plugin/leaflet-panel-layers-master/src/leaflet-panel-layers.css" />
    <script src="<?= base_url('assets/plugin/leaflet-panel-layers-master/src/leaflet-panel-layers.js') ?>"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <script src="assets/plugin/Leaflet.RotatedMarker-master/leaflet.rotatedMarker.js"></script>

    <!-- pencarian lokasi -->
    <link rel="stylesheet" href="<?= base_url('assets/plugin/leaflet-search-master/src/leaflet-search.css')?>" />
    <script src="<?= base_url('assets/plugin/leaflet-search-master/src/leaflet-search.js')?>"></script>

    <!-- load geojson -->
    <script src="<?= base_url('assets/geojson/alam.geojson') ?>"></script>

    <!-- import -->
    <script src="<?= base_url('assets/plugin/leaflet-easyPrint-gh-pages/dist/bundle.js')?>"></script>

</head>