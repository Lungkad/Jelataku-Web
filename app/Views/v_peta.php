<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jelataku | Peta Lokasi Wisata</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?= base_url('awesome-marker/dist/leaflet.awesome-markers.css') ?>">
  <link rel="stylesheet" href="<?= base_url('leaflet-locate/L.Control.Locate.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('leaflet-routing-machine/dist/leaflet-routing-machine.css') ?>">
  <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
  <link rel="shortcut icon" type="image/png" href="<?= base_url('favicon.ico') ?>">
  <style>
    #map {
      height: calc(100vh - 50px);
      width: 100%;
      margin-top: 50px;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-dark fixed-top" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><i class="fa-solid fa-crown" style="color: #d9dce3;"></i></i> Jelataku</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('home/landing') ?>"><i class="fa-solid fa-house"></i></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('home/tabel') ?>"><i class="fa-solid fa-circle-info"></i> Wisata</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-current="page" href="#"><i class="fa-regular fa-map"></i> Peta</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('home/dashboard') ?>"><i class="fa-solid fa-gauge" style="color: #ebedef;"></i> Dashboard</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div id="map"></div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-hash/0.2.1/leaflet-hash.min.js"></script>
  <script src="<?= base_url('awesome-marker/dist/leaflet.awesome-markers.js') ?>"></script>
  <script src="<?= base_url('leaflet-locate/L.Control.Locate.min.js') ?>"></script>
  <script src="<?= base_url('leaflet-routing-machine/dist/leaflet-routing-machine.js') ?>"></script>
  <script src="<?= base_url('leaflet-routing-machine/dist/leaflet-routing-machine.min.js') ?>"></script>
  <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
  <script>
    /* Initial Map */
    var map = L.map("map").setView([-7.777567, 110.1606899], 10);

    /* Tile Basemap */
    var basemap1 = L.tileLayer(
      "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: '<a href = "https://www.openstreetmap.org/copyright" > OpenStreetMap < /a> | <a href = "https://www.unsorry.net" target = "_blank" > unsorry @2022 < /a>',
      }
    );
    var basemap2 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
      attribution: 'Tiles &copy; Esri | <a href="Latihan WebGIS" target="_blank">DIVSIG UGM</a>'
    });

    var basemap3 = L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
      subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
      attribution: 'Google Satellite | <a href="https://unsorry.net" target="_blank">unsorry@2020</a>'
    });

    var basemap4 = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
      attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
    });
    basemap1.addTo(map);

    /* Display zoom, latitude, longitude in URL */
    let hash = new L.Hash(map);

    var icons = {
      pantai: L.AwesomeMarkers.icon({
        icon: 'umbrella-beach',
        stylePrefix: 'fas',
        prefix: 'fa',
        markerColor: 'blue',
        iconColor: '#ffffff'
      }),
      nature: L.AwesomeMarkers.icon({
        icon: 'tree',
        stylePrefix: 'fas',
        prefix: 'fa',
        markerColor: 'green',
        iconColor: '#ffffff'
      }),
      goa: L.AwesomeMarkers.icon({
        icon: 'mountain',
        stylePrefix: 'fas',
        prefix: 'fa',
        markerColor: 'purple',
        iconColor: '#ffffff'
      }),
      water: L.AwesomeMarkers.icon({
        icon: 'droplet',
        stylePrefix: 'fas',
        prefix: 'fa',
        markerColor: 'cadetblue',
        iconColor: '#ffffff'
      }),
    }
    /* GeoJSON Point */
    var point = L.geoJson(null, {
      pointToLayer: function(feature, latlng) {
        var Jenis = feature.properties.jenis;

        var icon;
        if (Jenis === 'Pantai') {
          icon = icons.pantai;
        } else if (Jenis === 'Nature') {
          icon = icons.nature;
        } else if (Jenis === 'Goa') {
          icon = icons.goa;
        } else if (Jenis === 'Water') {
          icon = icons.water;
        } else {
          // Jika tipe wisata tidak cocok dengan ikon yang ada, gunakan ikon default atau logika lainnya
          icon = icons.default;
        }

        return L.marker(latlng, {
          icon: icon
        });
      },
      onEachFeature: function(feature, layer) {
        var popupContent = "Wisata: " + feature.properties.wisata;
        layer.on({
          click: function(e) {
            point.bindPopup(popupContent);
          },
          mouseover: function(e) {
            point.bindTooltip(feature.properties.wisata);
          },
        });
      },
    });

    $.getJSON("<?= base_url('api/index') ?>", function(data) {
      point.addData(data);
      map.addLayer(point);
    });

    /* GeoJSON Polygon */
    var polygon = L.geoJson(null, {
      onEachFeature: function(feature, layer) {
        var popupContent = "Nama: " +
          feature.properties.name_3;
        layer.on({
          click: function(e) {
            polygon.bindPopup(popupContent);
          },
          mouseover: function(e) {
            polygon.bindTooltip(feature.properties.name_3);
          },
        });
      },
    });
    $.getJSON("<?= base_url('api/polygon') ?>", function(data) {
      polygon.addData(data);
      map.addLayer(polygon);
    });
    /*Plugin Routing Machine*/
    L.Routing.control({
        position: 'bottomleft',
        showAlternatives: true,
        geocoder: L.Control.Geocoder.nominatim(),
      })
      .on("routesfound", function(e) {
        var routes = e.routes;
        alert("Found " + routes.length + " route(s).");
      })
      .addTo(map);

    /* control layer */
    var baseMaps = {
      "OpenStreetMap": basemap1,
      "Esri World Street": basemap2,
      "Google Satellite": basemap3,
      "Stadia Dark Mode": basemap4
    };
    L.control.layers(baseMaps).addTo(map);

    /* Scale Bar */
    L.control.scale({
      maxWidth: 150,
      position: 'bottomright'
    }).addTo(map);

    /* Location */
    var locateControl = L.control.locate({
      position: "topleft",
      drawCircle: true,
      follow: true,
      setView: true,
      keepCurrentZoomLevel: false,
      flyTo: true,
      markerStyle: {
        weight: 1,
        opacity: 0.8,
        fillOpacity: 0.8,
      },
      circleStyle: {
        weight: 1,
        clickable: false,
      },
      icon: "fas fa-crosshairs",
      metric: true,
      strings: {
        title: "Click for Your Location",
        popup: "Accuracy {distance} {unit}",
        outsideMapBoundsMsg: "Not available"
      },
      locateOptions: {
        maxZoom: 16,
        watch: true,
        enableHighAccuracy: true,
        maximumAge: 10000,
        timeout: 10000
      },
    }).addTo(map);
  </script>
</body>

</html>