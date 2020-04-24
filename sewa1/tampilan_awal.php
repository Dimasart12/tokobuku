<?php
session_start();
include("config.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SMD</title>
    <style media="screen">
      body{
        margin: 0;
        padding: 0;
        font-family: poppins;

      }
      .navbar{
        position: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: row;
        flex-wrap: wrap;
        background-color: #d4d7de;
        width: 100%;
        height: 75px;
        z-index: 1;
      }
      .nav{
        display: flex;
        justify-content: right;
        list-style: none;
        margin-right: 15%;
      }
      .logo{
        flex: 1 1 auto;
        margin-left: 2%;
        text-transform: uppercase;
        letter-spacing: 0px;
        font-weight: lighter;
        font-size: 30px;
        font-family: fantasy;
        color: grey;
      }
      .logo1{
        margin-left: 5%;
        margin-right: 5%;
        text-transform: uppercase;
        letter-spacing: 0px;
        font-family: cursive;
        font-size: 15px;

      }
      a{
        margin: 15px;
        color: #000;
        text-decoration: none;
        text-transform: uppercase;
      }
      a:hover{
        color: #000;
      }
      .banner-area{
        /* height: 100vh;
        background: url("hm1.jpg") no-repeat;
        text-align: center;
        background-size: cover;
        align-content: center;
        background-position: center;
        box-shadow: inset 0 0 0 500px rgba(0, 0, 0, 0.5);
        text-decoration-color:white;
        color: white;
        font-family: serif;
        padding-top: 50px;
        padding-left: 30px */
        height: 100vh;
        background-image: url("hm6jpg.jpg");
        text-align: center;
        background-size: cover;
        align-content: center;
        background-position: center;
        background-attachment: fixed;
        box-shadow: inset 0 0 0 500px rgba(0, 0, 0, 0.5);
        text-decoration-color:white;
        color: white;
        padding-top: 100px;
      }
      .port-area, .contact-area{
        position: relative;
        display: flow-root;
        justify-content: space-around;
        align-items: center;
        flex-wrap: wrap;
        flex-direction: row;
        width: 100%;
        height: 675px;
      }
      .about-area, .service-area{
        position: relative;
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-wrap: wrap;
        flex-direction: row;
        width: 100%;
        height: 400px;
        padding-top: 0px;
      }
      .text-part{
        padding-top: 100px;
        text-align: center;
        font-size: 50px;
        font-style: italic;
        font-family: fantasy;
        color: lightgrey;
      }
      .text-part1{
        padding-top: px;
        text-align: center;
        font-weight: bold;
      }
      h1{
        font-size: 50px;
        font-family: Auidiowide;
      }
      p{
        font-size: 24px;
        line-height: 50px;
      }
      .about-area, .service-area{
        background: black;
        color: white;
      }
      .port-area{
       background-image: url("hm4.jpg");
       text-align: center;
       background-size: cover;
       align-content: center;
       background-position: center;
       background-attachment: fixed;
       box-shadow: inset 0 0 0 500px rgba(0, 0, 0, 0.5);
       text-decoration-color:white;
       color: white;
       padding-top: 200px;
      }
      .contact-area{
        background-image: url("spot bawah.webp");
        text-align: center;
        background-size: cover;
        align-content: center;
        background-position: center;
        background-attachment: fixed;
        box-shadow: inset 0 0 0 500px rgba(0, 0, 0, 0.5);
        text-decoration-color:white;
        padding-top: 200px;
      }
      html{
        scroll-behavior: smooth;
      }
      .pp{
        color: lightgrey;
      }
      }

    </style>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        Add = () => {
            document.getElementById('action').value = "insert";
            document.getElementById('id_cutomer').value = "";
            document.getElementById('nama').value = "";
            document.getElementById('alamat').value = "";
            document.getElementById('kontak').value = "";
            document.getElementById('username').value = "";
            document.getElementById('password').value = "";
        }

        Edit = (item) =>{
            document.getElementById('action').value = "update";
            document.getElementById('id_customer').value = item.id_customer;
            document.getElementById('nama').value = item.nama;
            document.getElementById('alamat').value = item.alamat;
            document.getElementById('kontak').value = item.kontak;
            document.getElementById('username').value = item.username;
            document.getElementById('password').value = item.password;
        }
    </script>
  </head>
  <body>
    <!-- <div class="navbar">
      <a href="#" class="logo">PlayStation</a>
      <ul class="nav">
        <li><a href="#home">Beranda</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#portofolio">Portofolio</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#contact">login</a></li>
      </ul>
    </div> -->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
      <div class="logo">
        PlayStation
      </div>
        &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
        &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;

           <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu">
               <span class="navbar navbar-toggler-icon"></span>
           </button>

           <div class="collapse navbar-collapse" id="menu">
             <ul class="navbar-nav">
                 <li><a href="#home" class="nav-link">beranda</a></li>
                 <li><a href="#about" class="nav-link">tentang</a></li>
                 <li><a href="#portofolio" class="nav-link">Have Fun!</a></li>
                 <li><a href="#services" class="nav-link">Services</a></li>
                 <li><a href="#contact" class="nav-link">Register</a></li>
                 <li class="nav-item dropdown">
                   <a href="#" class="nav-link dropdown-toggle" id="kontak" data-toggle="dropdown">LOGIN</a>
                   <div class="dropdown-menu">
                     <a href="login_admin.php" class="dropdown-item" class="nav-link">Admin</a>
                     <a href="login_customer.php" class="dropdown-item" class="nav-link">Customer</a>
                   </div>
                 </li>
             </ul>
           </div>
       </nav>
    <div class="banner-area" id="home">
      <div class="text-part">
        Welcome, Dude!
      </div>
    </div>
    <div class="about-area" id="about">
      <div class="text-part1">
        <h1>About</h1>
        <p class="logo1">
          Selamat Datang di Rental PlayStation Malang!
          Disisni anda para penggemar PlayStation akan merasakan nyaman dan amannya
          jual beli dan sewa PS.
          Dengan barang yang memuaskan dan anti penipuan membuat rental kami menjadi
          rental terbaik di kota Malang.
        </p>
      </div>
    </div>
    <div class="port-area" id="portofolio">
      <div class="text-part">
        OH NO!
      </div>
    </div>
    <div class="service-area" id="services">
      <div class="text-part1">
        <h1>Services Area</h1>
        <p class="logo1">
          Tenang!
          jika dari kalian terdapat komponen - komponen PlayStation
          yang rusak sehingga menjadi anda tidak nyaman,
          kami membuka service segala komponen PlayStation
          dengan cepat dan mudah!
        </p>
      </div>
    </div>
    <div class="contact-area" id="contact">
      <div class="text-part">
        REGISTER CUSTOMER
        </div>
        <!-- <div class="card-body">
              <form action="register_anggota.php" method="post">
                  <button type="submit" name="login_admin" class="btn btn-success"> Daftar </button>

              </form>
          </div> -->

        <button data-toggle="modal" data-target="#modal_customer" type="button" class="btn btn-sm btn-success" onclick="Add()">Register</button>
        <div class="card-body">
          <div class="modal fade" id="modal_customer">
              <div class="modal-dialog">
                  <div class="modal-content">
                  <form action="proses_register_customer.php" method="post" enctype="multipart/form-data">
                      <div class="modal-header bg-danger text-white">
                          <h4 align="center">Register customer</h4>
                      </div>
                      <div class="modal-body" bg-white text-black>
                          <input type="hidden" name="action" id="action">
                          ID Customer
                          <input type="number" name="id_customer" id="id_customer" class="form-control" required />
                          Nama
                          <input type="text" name="nama" id="nama" class="form-control" required />
                          Alamat
                          <input type="text" name="alamat" id="alamat" class="form-control" required />
                          Kontak
                          <input type="text" name="kontak" id="kontak" class="form-control" required />
                          Username
                          <input type="text" name="username" id="username" class="form-control" required />
                          Password
                          <input type="text" name="password" id="password" class="form-control" required />
                      </div>
                      <div class="modal-footer">
                          <button type="submit" name="save_customer" class="btn btn-success" onclick='return confirm("Berhasil! tekan oke untuk LOGIN CUSTOMER")'>
                            Simpan
                          </button>
                      </div>
                  </form>
                  </div>
              </div>
          </div>
          <!-- end modal -->
      </div>
                </form>
                <br />
                <br />
                <figcaption align="center" class="pp">
                  &copy; 2020 DIMASINSNR04
          </div>
        </div>
      </div>
    </div>
        </div>
  </body>
</html>
