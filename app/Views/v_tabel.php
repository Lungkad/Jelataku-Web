<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jelataku | Sebaran Wisata</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">
  <link rel="shortcut icon" type="image/png" href="<?= base_url('favicon.ico') ?>">
  <style>
    .container {
      padding-top: 50px;
    }

    /* footer */
    .footer-basic {
      padding: 40px 0;
      background-color: #212529;
      color: #eeeeee;
    }

    .footer-basic ul {
      padding: 0;
      list-style: none;
      text-align: center;
      font-size: 18px;
      line-height: 1.6;
      margin-bottom: 0;
    }

    .footer-basic li {
      padding: 0 10px;
    }

    .footer-basic ul a {
      color: inherit;
      text-decoration: none;
      opacity: 0.8;
    }

    .footer-basic ul a:hover {
      opacity: 1;
    }

    .footer-basic .social {
      text-align: center;
      padding-bottom: 25px;
    }

    .footer-basic .social>a {
      font-size: 24px;
      width: 40px;
      height: 40px;
      line-height: 40px;
      display: inline-block;
      text-align: center;
      border-radius: 50%;
      border: 1px solid #ccc;
      margin: 0 8px;
      color: inherit;
      opacity: 0.75;
    }

    .footer-basic .social>a:hover {
      opacity: 0.9;
    }

    .footer-basic .copyright {
      margin-top: 15px;
      text-align: center;
      font-size: 13px;
      color: #aaa;
      margin-bottom: 0;
    }

    /* card */
    .cardx {
      position: relative;
      display: flex;
      align-items: center;
      justify-content: left;
      /* width: 350px; */
      height: 450px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
      padding: 32px;
      overflow: hidden;
      border-radius: 10px;
      transition: all 0.5s cubic-bezier(0.23, 1, 0.320, 1);
      gap: 10px;
    }

    .contentx {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      gap: 20px;
      color: #383838;
      transition: all 0.5s cubic-bezier(0.23, 1, 0.320, 1);
    }

    .contentx .headingx {
      font-weight: 700;
      font-size: 1.5rem;
    }

    .contentx .parax {
      line-height: 1.5;
    }

    .contentx .btnx {
      color: #383838;
      text-decoration: none;
      padding: 10px;
      font-weight: 600;
      border: none;
      cursor: pointer;
      background: linear-gradient(-45deg, #FFC0CB 0%, #da9f51 100%);
      border-radius: 5px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }

    .cardx::before {
      content: "";
      position: absolute;
      left: 0;
      bottom: 0;
      width: 100%;
      height: 5px;
      background: linear-gradient(-45deg, #FFC0CB 0%, #da9f51 100%);
      z-index: -1;
      transition: all 0.5s cubic-bezier(0.23, 1, 0.320, 1);
    }

    .cardx:hover::before {
      height: 100%;
    }

    .cardx:hover {
      box-shadow: none;
    }

    .cardx:hover .btnx {
      color: #212121;
      background: #e8e8e8;
    }

    .contentx .btnx:hover {
      outline: 2px solid #e8e8e8;
      background: transparent;
      color: #e8e8e8;
    }

    .contentx .btnx:active {
      box-shadow: none;
    }

    .left {
      text-align: left;
    }

    /* Credit to https://epicbootstrap.com/snippets/footer-basic */
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
            <a class="nav-link disabled" aria-current="page" href="<?= base_url('home/tabel') ?>"><i class="fa-solid fa-circle-info"></i> Wisata</a>
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
  <div class=" my-5">
    <!-- Flashdata -->
    <?php if (session()->getFlashdata('message')) : ?>
      <div class="alert alert-<?= session()->getFlashdata('message')['type'] ?> alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('message')['content'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>



    <!-- <table class="table table-bordered" id="dataobjek">
          <thead class="table-dark">
            <tr>
              <th>No</th>
              <th>Wisata</th>
              <th>Deskripsi</th>
              <th>Alamat</th>
              <th>HTM</th>
              <th>Foto</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody> -->
    <!-- <tr>
              <td class="text-center"></?= $no++ ?></td>
              <td></?= $d['wisata'] ?></td>
              <td></?= $d['deskripsi'] ?></td>
              <td></?= $d['alamat'] ?></td>
              <td></?= $d['htm'] ?></td>
              <td>
                <img src="</?= base_url('upload/foto-objek/') . $d['foto'] ?>" width="150" alt="Tidak ada foto">
                </td>
                <td class="d-flex justify-content-center">
                  <a class="btn btn-primary" href="</?= base_url('home/edit_data/') . $d['gid'] ?>" role="button"><i class="fa-regular fa-pen-to-square"></i></a>
          </td>
          </tr> -->
    <section class="py-5 fade-in mx-5">
      <h1 class="my-5" style="text-align: center;">Sebaran Wisata di Kulonprogo</h1>
      <div class=" text-left">
        <div class="row gx-4 gy-5 ">
          <?php $no = 1;
          foreach ($dataobjek as $d) : ?>

            <div class="col-3">
              <center>
                <div class="cardx">
                  <div class="contentx">
                    <div>
                      <p class="headingx"><?= $d['wisata'] ?></p>
                    </div>
                    <div>
                      <p><img src="<?= base_url('upload/foto-objek/') . $d['foto'] ?>" width="150" height="100" alt="Tidak ada foto"></p>
                    </div>
                    <p class="parax left">
                      <?= $d['alamat'] ?> </br></br></br>
                      <a class="btnx" href="<?= base_url('home/data_detail/') . $d['gid'] ?>" role="button"> Selengkapnya</a>
                    </p>
                  </div>
                </div>
              </center>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <!-- </tbody>
        </table> -->

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-hash/0.2.1/leaflet-hash.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#dataobjek').DataTable();
      });
    </script>
</body>

</html>