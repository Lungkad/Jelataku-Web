<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jelataku | Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <link rel="shortcut icon" type="image/png" href="<?= base_url('favicon.ico') ?>">
  <link rel="stylesheet" href="<?= base_url('css/global.css') ?>" />
  <style>
    .btblack {
      background: black;
      border-radius: 10px;
      margin-top: 10px;
      padding: 15px 20px 15px 20px;
      color: white;
      cursor: pointer;
      font-weight: bold;
      text-decoration: none;
    }

    .btblack:hover {
      background: orange;
      text-decoration: none;
    }
  </style>
</head>

<body>
  <div class="flex">
    <div class="text-gray-300 w-64 h-screen bg-gray-900">
      <ul class="navbar-nav m-5 text-md">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/">
            <h2 class="text-2xl font-bold">Jelataku</h2>
          </a>
        </li>
        <li class="nav-item mt-10">
          <a class="nav-link text-white" aria-current="page" href="#">Dashboard</a>
        </li>
        <li class="nav-item mt-8">
          <a class="nav-link" href="<?= base_url('home/tabeldb') ?>">Tabel Data Wisata</a>
        </li>
        <li class="nav-item mt-8">
          <a class="nav-link" href="<?= base_url('home/input') ?>">Input Data Wisata</a>
        <li class="nav-item mt-8">
          <a class="nav-link" href="#">Logout</a>
        </li>
      </ul>
    </div>
    <div class="content w-full bg-gray-100">
      <div class="navbar bg-white w-100 text-gray-800 flex justify-between px-16 py-5 items-center z-10 drop-shadow-md">
        <a href="/"> </a>
        <div class="">
          <a href="<?= base_url('home/landing') ?>" class="mx-5">Home</a>
          <a href="<?= base_url('home/peta') ?>" class="mx-5">Peta</a>
          <a href="<?= base_url('home/tabel') ?>" class="mx-5">Tabel</a>
            <a class="mx-5" href="<?= base_url('home/dashboard') ?>"><i class="fa-solid fa-gauge" style="color: #ebedef;"></i> Dashboard</a>
          <a href="#" class="mx-5">Logout</a>
        </div>
      </div>
      <div class="p-8">
        </br>
        </br>
        </br>
        </br>
        <center><img src="<?= base_url('assets/lg.png') ?>"" width="200px"> </center></br>
        <center>
          <h2 class="text-4xl font-bold">Jelajah Wisata Kulonprogo</h2>
        </center>
        <center>
          <h2 class="text-2xl">Temukan Keindahan Wisata Kulonprogo</h2>
        </center></br>
        <center><a href="<?= base_url('home/peta') ?>" class="btblack px-8 py-2 text-lg text-white rounded-lg mt-4">
            Mulai Petualangan
          </a></center>
      </div>
    </div>
  </div>
</body>

</html>