<center>


    <h1 class="" style="font-weight:bold; font-size:50px"> Selamat Datang <?= $this->session->name ?></h1>
</center>
<hr>
<center>
    <div id="map" style="width: 100%; height: 70vh; color:black; border:none;">

        <script>
            var Stamen_Toner = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/toner/{z}/{x}/{y}{r}.{ext}', {
                attribution: 'KEPULAUAN SANGIHE',
                subdomains: 'abcd',
                maxZoom: 20,
                ext: 'png'
            });
            var map = L.map('map', {
                center: [3.5683613764056465, 125.51096335223455],
                zoom: 10,
                zoomControl: true,
                layers: [Stamen_Toner]
            });

            L.control.coordinates({
                position: "bottomleft",
                decimals: 6,
                decimalSeperator: ",",
                labelTemplateLat: "Latitude: {y}",
                labelTemplateLng: "Longitude: {x}"
            }).addTo(map);
        </script>
    </div>
    <!-- <img class="order-lg-2 order-1 wow fadeInRight" src="<?= base_url('assets/img/admin11.jpg') ?>" alt="gambar" width="100%" height="100%" allowfullscreen="" style="
    background-size:cover;
    background-repeat:no-repeat;
    background-attachment:fixed;
"> -->
</center>
<hr>