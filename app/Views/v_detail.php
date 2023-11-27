<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jelataku | Informasi Detail Wisata</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="shortcut icon" type="image/png" href="<?= base_url('favicon.ico') ?>">
  <link rel="stylesheet" href="<?= base_url('css/style-edit.css') ?>">
  <style>
    .headingx {
      font-weight: 700;
      font-size: 2rem;
    }
  </style>
</head>
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
          <a class="nav-link disabled" href="<?= base_url('home/tabel') ?>"><i class="fa-solid fa-circle-info"></i> Wisata</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?= base_url('home/peta') ?>"><i class="fa-regular fa-map"></i> Peta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?= base_url('home/dashboard') ?>"><i class="fa-solid fa-gauge" style="color: #ebedef;"></i> Dashboard</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="row mx-5 my-5">
  <div class="col-6 my-5 d-flex flex-column justify-content-center">
    <p class="headingx"><?= $dataobjek['wisata'] ?></p>
    <table class="table table-hover">
      <tr>
        <td>Deskripsi</td>
        <td><?= $dataobjek['deskripsi'] ?></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td><?= $dataobjek['alamat'] ?></td>
      </tr>
      <tr>
        <td>HTM</td>
        <td><?= $dataobjek['htm'] ?></td>
      </tr>
      <tr>
        <td>Koordinat</td>
        <td><?= $dataobjek['latitude'] ?>, <?= $dataobjek['longitude'] ?></td>
      </tr>
    </table>
  </div>
  <div class="col-6 my-5 d-flex justify-content-center align-items-center">
    <div id="map" style="width: 600px;height: 450px"></div>
  </div>
</div>
<!-- Footer-->
<div class="footer-basic">
  <footer>
    <div class="social">
      <a href="#"><i class="fa-brands fa-instagram" style="color: #ed218b;"></i></a>
      <a href="#"><i class="fa-brands fa-github" style="color: #ffffff;"></i></a>
      <a href="#"><i class="fa-brands fa-facebook" style="color: #1a5fd5;"></i></a>
      <a href="#"><i class="fa-regular fa-envelope" style="color: #eef3fb;"></i></a>
    </div>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Home</a></li>
      <li class="list-inline-item"><a href="#">Tabel</a></li>
      <li class="list-inline-item"><a href="#">Peta</a></li>
      <li class="list-inline-item"><a href="#">Dashboard</a></li>
    </ul>
    <p class="copyright">Rochmat Fajar Nugroho © 2023</p>
  </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-hash/0.2.1/leaflet-hash.min.js"></script>
<script>
  /* Initial Map */
  let center = [<?= $dataobjek['latitude'] ?>, <?= $dataobjek['longitude'] ?>];
  let map = L.map('map').setView(center, 15); //lat, long, zoom
  map.scrollWheelZoom.disable(); //disable zoom with scroll

  /* Tile Basemap */
  let basemap = L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    attribution: 'Google Satellite | <a href="https://unsorry.net" target="_blank">unsorry@2020</a>'
  });
  basemap.addTo(map);

  /* Display zoom, latitude, longitude in URL */
  let hash = new L.Hash(map);

  /* Marker */
  let marker = L.marker(center, {
    draggable: true
  });
  marker.addTo(map);

  /* Tooltip Marker */
  marker.bindTooltip(tooltip);
  marker.openTooltip();

  //Dragend marker
  marker.on('dragend', dragMarker);

  //Move Map
  map.addEventListener('moveend', mapMovement);

  function dragMarker(e) {
    let latlng = e.target.getLatLng();

    //Displays coordinates on the form
    document.getElementById("latitude").value = latlng.lat.toFixed(5);
    document.getElementById("longitude").value = latlng.lng.toFixed(5);

    //Change the map center based on the marker location
    map.flyTo(new L.LatLng(latlng.lat.toFixed(9), latlng.lng.toFixed(5)));
  }

  function mapMovement(e) {
    let mapcenter = map.getCenter();

    //Displays coordinates on the form
    document.getElementById("latitude").value = mapcenter.lat.toFixed(5);
    document.getElementById("longitude").value = mapcenter.lng.toFixed(5);

    //Create marker
    marker.setLatLng([mapcenter.lat.toFixed(5), mapcenter.lng.toFixed(5)]).update();
    marker.on('dragend', dragMarker);
  }

  function mapCenter(e) {
    let mapcenter = map.getCenter();
    let x = document.getElementById("longitude").value;
    let y = document.getElementById("latitude").value;

    map.flyTo(new L.LatLng(y, x), 18);
  }
</script>
</body>

</html>