<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jelataku | Landing Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?= base_url('awesome-marker/dist/leaflet.awesome-markers.css') ?>">
  <link rel="stylesheet" href="<?= base_url('leaflet-locate/L.Control.Locate.min.css') ?>">
  <link rel="shortcut icon" type="image/png" href="<?= base_url('favicon.ico') ?>">

  <style>
    .bg-image-full {
      background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)),
        url("https://images.unsplash.com/photo-1441974231531-c6227db76b6e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80");
      background-repeat: no-repeat;
      background-attachment: scroll;
      background-position: center;
      background-size: cover;
      height: 800px;
    }


    * {
      box-sizing: border-box
    }

    .mySlides {
      display: none
    }

    img {
      vertical-align: middle;
    }

    /* Slideshow container */
    .slideshow-container {
      max-width: 1000px;
      position: relative;
      margin: auto;
    }

    /* Next & previous buttons */
    .prev,
    .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      padding: 16px;
      margin-top: -22px;
      color: white;
      font-weight: bold;
      font-size: 18px;
      transition: 0.6s ease;
      border-radius: 0 3px 3px 0;
      user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
      background-color: rgba(0, 0, 0, 0.8);
    }

    /* Caption text */
    .text {
      color: #f2f2f2;
      font-size: 20px;
      padding: 8px 12px;
      position: absolute;
      bottom: 8px;
      width: 100%;
      text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
      color: #fafafa;
      background-color: rgba(0, 0, 0, 0.5);
      font-size: 15px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
      cursor: pointer;
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.4s ease;
    }

    .actived,
    .dot:hover {
      background-color: #717171;
    }

    /* Fading animation */
    .fade {
      animation: fade 2s linear infinite;
    }

    @keyframes fade {
      from {
        opacity: 1
      }

      to {
        opacity: 1
      }
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {

      .prev,
      .next,
      .text {
        font-size: 11px
      }
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

    /* Credit to https://epicbootstrap.com/snippets/footer-basic */


    .btwhite {
      background: white;
      border-radius: 10px;
      margin-top: 10px;
      padding: 15px 20px 15px 20px;
      color: black;
      cursor: pointer;
      font-weight: bold;
      text-decoration: none;
    }

    .btwhite:hover {
      background: black;
      text-decoration: none;
    }

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

    .carousel-container {
      width: 50%;
      margin: auto;
      overflow: hidden;
    }

    .carousel-slide {
      display: flex;
      width: 100%;
      height: 500px;
    }

    .btntengah {
      width: 150px;
    }

    .content {
      position: absolute;
      /* Position the background text */
      bottom: 0;
      /* At the bottom. Use top:0 to append it to the top */
      background: rgb(0, 0, 0);
      /* Fallback color */
      background: rgba(0, 0, 0, 0.5);
      /* Black background with 0.5 opacity */
      color: #f1f1f1;
      /* Grey text */
      width: 100%;
      /* Full width */
      padding: 20px;
      /* Some padding */
    }

    /* animation */
    .fade-in {
      opacity: 0;
      /* Set opacity awal menjadi 0 */
      transition: opacity 1.0s ease-in;
      /* Animasi transition */
    }

    .fade-in.show {
      opacity: 1;
      /* Set opacity menjadi 1 saat class "show" ditambahkan */
    }

    /* card */
    .cardx {
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 350px;
      height: 500px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
      padding: 32px;
      overflow: hidden;
      border-radius: 10px;
      transition: all 0.5s cubic-bezier(0.23, 1, 0.320, 1);
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
      font-size: 32px;
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

    /* button */
    .primary-button {
      font-family: 'Ropa Sans', sans-serif;
      /* font-family: 'Valorant', sans-serif; */
      color: black;
      cursor: pointer;
      font-size: 13px;
      font-weight: bold;
      letter-spacing: 0.05rem;
      border: 1px solid #0E1822;
      padding: 0.8rem 2.1rem;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 531.28 200'%3E%3Cdefs%3E%3Cstyle%3E .shape %7B fill: %23FF4655 /* fill: %230E1822; */ %7D %3C/style%3E%3C/defs%3E%3Cg id='Layer_2' data-name='Layer 2'%3E%3Cg id='Layer_1-2' data-name='Layer 1'%3E%3Cpolygon class='shape' points='415.81 200 0 200 115.47 0 531.28 0 415.81 200' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E%0A");
      background-color: #ffffff;
      background-size: 200%;
      background-position: 200%;
      background-repeat: no-repeat;
      transition: 0.3s ease-in-out;
      transition-property: background-position, border, color;
      position: relative;
      z-index: 1;
    }

    .primary-button:hover {
      border: 1px solid #da9f51;
      color: white;
      background-position: 40%;
    }

    .primary-button:before {
      content: "";
      position: absolute;
      background-color: #0E1822;
      width: 0.2rem;
      height: 0.2rem;
      top: -1px;
      left: -1px;
      transition: background-color 0.15s ease-in-out;
    }

    .primary-button:hover:before {
      background-color: white;
    }

    .primary-button:hover:after {
      background-color: white;
    }

    .primary-button:after {
      content: "";
      position: absolute;
      background-color: #da9f51;
      width: 0.3rem;
      height: 0.3rem;
      bottom: -1px;
      right: -1px;
      transition: background-color 0.15s ease-in-out;
    }

    .button-borders {
      position: relative;
      width: fit-content;
      height: fit-content;
    }

    .button-borders:before {
      content: "";
      position: absolute;
      width: calc(100% + 0.5em);
      height: 50%;
      left: -0.3em;
      top: -0.3em;
      border: 1px solid #eeeeee;
      border-bottom: 0px;
      /* opacity: 0.3; */
    }

    .button-borders:after {
      content: "";
      position: absolute;
      width: calc(100% + 0.5em);
      height: 50%;
      left: -0.3em;
      bottom: -0.3em;
      border: 1px solid #eeeeee;
      border-top: 0px;
      /* opacity: 0.3; */
      z-index: 0;
    }

    .shape {
      fill: #eeeeee;
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
            <a class="nav-link disabled" aria-current="page" href="#"><i class="fa-solid fa-house"></i></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('home/tabel') ?>"><i class="fa-solid fa-circle-info"></i> Wisata</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('home/peta') ?>"><i class="fa-regular fa-map"></i> Peta</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('home/dashboard') ?>"><i class="fa-solid fa-gauge" style="color: #ebedef;"></i> Dashboard</a>
          </li>
          <!-- <li class="nav-item">
              <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#infoModal"><i class="fa-regular fa-user"></i> Info</a>
            </li> -->
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <header class="py-5 bg-image-full d-flex justify-content-center align-items-center">
    <div class="">
      <h1 class="d-flex flex-column text-white  " style="padding-top: 60px;">Jelajah Wisata Kulonprogo</h1>
      <p class="lead text-center text-white">Temukan Keindahan Wisata Kulonprogo</p></br>
      <center>
        <div class="button-borders">
          <button class="primary-button" onclick="window.location.href = '#kp'"> Learn More
          </button>
        </div>
      </center>
    </div>
  </header>
  <!-- Content section-->
  <section id="kp" class="py-5 my-4">
    <div class="container my-5 fade-in">
      <div class="row justify-content-center">
        <div class="col-lg-7">
          <center>
            <h1>Tentang Kulon Progo</h1>
          </center></br>
          <p class="justify" style="font-size: 20px;">Terletak di Provinsi Daerah Istimewa Yogyakarta, Kulonprogo merupakan daerah yang kaya akan pesona alam, budaya, dan sejarah. Kulonprogo adalah kabupaten yang berada di bagian barat Yogyakarta, dengan ibu kota kabupaten berlokasi di Wates. Daerah ini memiliki luas wilayah yang cukup luas, mencakup beragam jenis destinasi wisata yang menarik. Dari pantai-pantai yang mempesona hingga pegunungan yang menakjubkan, Kulonprogo menawarkan pengalaman wisata yang beragam dan menarik. Kabupaten ini berbatasan dengan Kabupaten Sleman dan Kabupaten Bantul di timur, Samudra Hindia di selatan, Kabupaten Purworejo di barat, serta Kabupaten Magelang di utara, nama Kulon Progo berarti sebelah barat Sungai Progo (kata kulon dalam Bahasa Jawa artinya barat). Kali Progo membatasi kabupaten ini di sebelah timur. Kulonprogo tidak hanya menawarkan keindahan alam dan warisan budaya, tetapi juga keramahan penduduknya. Masyarakat Kulonprogo dikenal sangat ramah dan menjunjung tinggi nilai-nilai kearifan lokal. Anda akan merasakan keramahan mereka saat menjelajahi daerah ini. Jadi, jika Anda mencari destinasi wisata yang kaya akan keindahan alam, budaya yang kaya, dan pengalaman yang autentik, Kulonprogo adalah tempat yang tepat untuk dikunjungi. Jelajahi semua yang Kulonprogo tawarkan melalui Jelataku dan siapkan diri Anda untuk petualangan tak terlupakan di daerah ini. Selamat menjelajahi Kulonprogo!</p></br>
        </div>
      </div>
    </div>
  </section>
  <section id="about" class="py-5 my-5">
    <div class="container py-5 my-5 fade-in">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <center>
            <h1>Apa itu Jelataku?</h1>
          </center></br>
          <p class="justify" style="font-size: 20px;">Selamat datang di Jelataku - platform webgis yang akan membawa Anda untuk menjelajahi keindahan dan pesona tempat wisata di Kulonprogo. Jelataku merupakan portal informasi yang lengkap dan interaktif, dirancang khusus untuk memudahkan Anda dalam merencanakan perjalanan dan menemukan destinasi wisata terbaik di daerah ini. Dengan Jelataku, Anda dapat menjelajahi berbagai tempat wisata yang memikat di Kulonprogo, termasuk pantai yang indah, wisata alam yang mempesona, situs budaya yang kaya sejarah, dan masih banyak lagi. Kami menyediakan peta interaktif yang memudahkan Anda menemukan lokasi tempat wisata, serta informasi lengkap mengenai setiap destinasi..</p></br>
          </br>
          <center>
            <div class="button-borders">
              <button class="primary-button" onclick="window.location.href = '<?= base_url('home/peta') ?>';"> Mulai Petualangan
              </button>
            </div>
          </center>
        </div>
      </div>
    </div>
  </section>

  <!-- Gallery section-->
  <section class="py-5 fade-in" id="gallery">
    <h1 class="my-5" style="text-align: center;">Galeri Wisata</h1>
    <div class="slideshow-container">
      <div class="mySlides fade">
        <div class="numbertext">1 / 20</div>
        <img src="<?= base_url('assets/pantaicongot.jpg') ?>" style="width:100%">
        <div class="text content">Pantai Congot</div>
      </div>
      <div class="mySlides fade">
        <div class="numbertext">2 / 20</div>
        <img src="<?= base_url('assets/pantaiglagah.jpg') ?>" style="width:100%">
        <div class="text content">Pantai Glagah</div>
      </div>
      <div class="mySlides fade">
        <div class="numbertext">3 / 20</div>
        <img src="<?= base_url('assets/pantaitrisik.png') ?>" style="width:100%">
        <div class="text content">Pantai Trisik</div>
      </div>
      <div class="mySlides fade">
        <div class="numbertext">4 / 20</div>
        <img src="<?= base_url('assets/pantaibugel.jpg') ?>" style="width:100%">
        <div class="text content">Pantai Bugel</div>
      </div>
      <div class="mySlides fade">
        <div class="numbertext">5 / 20</div>
        <img src="<?= base_url('assets/pantaimlarangan.jpg') ?>" style="width:100%">
        <div class="text content">Pantai Mlarangan Asri</div>
      </div>
      <div class="mySlides fade">
        <div class="numbertext">6 / 20</div>
        <img src="<?= base_url('assets/pantaipasirkadilangu.jpg') ?>" style="width:100%">
        <div class="text content">Pantai Pasir Kadilangu</div>
      </div>
      <div class="mySlides fade">
        <div class="numbertext">7 / 20</div>
        <img src="<?= base_url('assets/goasriti.webp') ?>" style="width:100%">
        <div class="text content">Goa Sriti</div>
      </div>
      <div class="mySlides fade">
        <div class="numbertext">8 / 20</div>
        <img src="<?= base_url('assets/goakiskendo.jpg') ?>" style="width:100%">
        <div class="text content">Goa Kiskendo</div>
      </div>
      <div class="mySlides fade">
        <div class="numbertext">9 / 20</div>
        <img src="<?= base_url('assets/goakebon.png') ?>" style="width:100%">
        <div class="text content">Goa Kebon</div>
      </div>
      <div class="mySlides fade">
        <div class="numbertext">10 / 20</div>
        <img src="<?= base_url('assets/goakidangkencana.jpg') ?>" style="width:100%">
        <div class="text content">Goa Kidang Kencana</div>
      </div>
      <div class="mySlides fade">
        <div class="numbertext">11 / 20</div>
        <img src="<?= base_url('assets/airterjunkembangsoka.jpg') ?>" style="width:100%">
        <div class="text content">Air Terjun Kembang Soka</div>
      </div>
      <div class="mySlides fade">
        <div class="numbertext">12 / 20</div>
        <img src="<?= base_url('assets/Kedungpedut.jpg') ?>" style="width:100%">
        <div class="text content">Air Terjun Kedungpedut</div>
      </div>
      <div class="mySlides fade">
        <div class="numbertext">13 / 20</div>
        <img src="<?= base_url('assets/tamansungaimudal.jpg') ?>" style="width:100%">
        <div class="text content">Taman Sungai Mudal</div>
      </div>
      <div class="mySlides fade">
        <div class="numbertext">14 / 20</div>
        <img src="<?= base_url('assets/grojogansew.jpg') ?>" style="width:100%">
        <div class="text content">Air Terjun Grojogan Sewu</div>
      </div>
      <div class="mySlides fade">
        <div class="numbertext">15 / 20</div>
        <img src="<?= base_url('assets/watujonggol.jpg') ?>" style="width:100%">
        <div class="text content">Grojogan Watu Jonggol</div>
      </div>
      <div class="mySlides fade">
        <div class="numbertext">16 / 20</div>
        <img src="<?= base_url('assets/sidoharjo.jpeg') ?>" style="width:100%">
        <div class="text content">Air Terjun Sidoharjo</div>
      </div>
      <div class="mySlides fade">
        <div class="numbertext">17 / 20</div>
        <img src="<?= base_url('assets/widosari.jpg') ?>" style="width:100%">
        <div class="text content">Puncak Widosari</div>
      </div>
      <div class="mySlides fade">
        <div class="numbertext">18 / 20</div>
        <img src="<?= base_url('assets/suroloyo.jpg') ?>" style="width:100%">
        <div class="text content">Puncak Suroloyo</div>
      </div>
      <div class="mySlides fade">
        <div class="numbertext">19 / 20</div>
        <img src="<?= base_url('assets/gerbosari.jpg') ?>" style="width:100%">
        <div class="text content">Kebun Bungan Krisan Gerbosari</div>
      </div>
      <div class="mySlides fade">
        <div class="numbertext">20 / 20</div>
        <img src="<?= base_url('assets/tehngglingo.jpg') ?>" style="width:100%">
        <div class="text content">Kebun Teh Ngglingo</div>
      </div>
      <a class="prev" onclick="plusSlides(-1)">❮</a>
      <a class="next" onclick="plusSlides(1)">❯</a>

    </div>
    <br>

    <div style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span>
      <span class="dot" onclick="currentSlide(2)"></span>
      <span class="dot" onclick="currentSlide(3)"></span>
      <span class="dot" onclick="currentSlide(4)"></span>
      <span class="dot" onclick="currentSlide(5)"></span>
      <span class="dot" onclick="currentSlide(6)"></span>
      <span class="dot" onclick="currentSlide(7)"></span>
      <span class="dot" onclick="currentSlide(8)"></span>
      <span class="dot" onclick="currentSlide(9)"></span>
      <span class="dot" onclick="currentSlide(10)"></span>
      <span class="dot" onclick="currentSlide(11)"></span>
      <span class="dot" onclick="currentSlide(12)"></span>
      <span class="dot" onclick="currentSlide(13)"></span>
      <span class="dot" onclick="currentSlide(14)"></span>
      <span class="dot" onclick="currentSlide(15)"></span>
      <span class="dot" onclick="currentSlide(16)"></span>
      <span class="dot" onclick="currentSlide(17)"></span>
      <span class="dot" onclick="currentSlide(18)"></span>
      <span class="dot" onclick="currentSlide(19)"></span>
      <span class="dot" onclick="currentSlide(20)"></span>
    </div>
  </section>
  <!-- Card --->
  <section class="py-5 py fade-in">
    <h1 class="my-5" style="text-align: center;">Sebaran Wisata di Kulonprogo</h1>
    <div class="container px-4 text-center">
      <div class="row gx-5">
        <div class="col-6">
          <center>
            <div class="cardx">
              <div class="contentx">
                <p class="headingx">Peta Persebaran</p>
                <p class="parax justify">
                  Sebuah adalah web peta interaktif untuk menemukan dan menjelajahi titik wisata di Kulonprogo, Yogyakarta. Web tersebut juga dilengkapi dengan fitur routing yang memudahkan pengguna menemukan jalan. </br></br></br>
                  <a href="<?= base_url('home/peta') ?>" class="btnx">Selengkapnya</a>
                </p>
              </div>
            </div>
          </center>
        </div>
        <div class="col-6">
          <center>
            <div class="cardx">
              <div class="contentx">
                <p class="headingx">Informasi Lengkap</p>
                <p class="parax justify">
                  Sebuah adalah web informasi lengkap tentang titik wisata di Kulonprogo, Yogyakarta, yang menyajikan deskripsi, foto, alamat, dan informasi lainnya untuk membantu pengguna dalam menjelajahi dan merencanakan kunjungan mereka. </br></br></br>
                  <a href="<?= base_url('home/tabel') ?>" class="btnx">Selengkapnya</a>
                </p>
              </div>
            </div>
          </center>
        </div>
      </div>
    </div>
  </section>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
  <script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      if (n > slides.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = slides.length
      }
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" actived", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " actived";
    }
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-hash/0.2.1/leaflet-hash.min.js"></script>
  <script src="<?= base_url('awesome-marker/dist/leaflet.awesome-markers.js') ?>"></script>
  <script src="<?= base_url('leaflet-locate/L.Control.Locate.min.js') ?>"></script>
  <script>
    function checkScroll() {
      var fadeElems = document.querySelectorAll('.fade-in');

      for (var i = 0; i < fadeElems.length; i++) {
        var elem = fadeElems[i];
        var rect = elem.getBoundingClientRect();

        if (rect.top < window.innerHeight && rect.bottom >= 0) {
          elem.classList.add('show'); // Tambahkan class "show" saat elemen masuk ke viewport
        } else {
          elem.classList.remove('show'); // Hapus class "show" saat elemen keluar dari viewport
        }
      }
    }

    window.addEventListener('scroll', checkScroll); // Panggil fungsi checkScroll saat discroll
    window.addEventListener('load', checkScroll); // Panggil fungsi checkScroll saat halaman selesai dimuat
  </script>
</body>

</html>