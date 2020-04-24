<?php
session_start();
if(!isset($_SESSION["id_customer"])){
    header("location:login_customer.php");
}
include("config.php");
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Rental PlayStation</title>
    <style media="screen">
    body{
    background: #abbaab;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #ffffff, #abbaab);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #ffffff, #abbaab); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

  }
  .header{
    height: 500px;
    background: url("men.jpg") no-repeat;
    text-align: center;
    background-size: cover;
    align-content: center;
    background-position: center;
    box-shadow: inset 0 0 0 500px rgba(0, 0, 0, 0.7);
    color: white;
    font-family: serif;
    padding-top: 225px;
    font-size: 100px;
  }
    </style>
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        Detail = (item) => {
            document.getElementById('kode_barang').value = item.kode_barang;
            document.getElementById('jenis').innerHTML = item.jenis;
            document.getElementById('harga').innerHTML = "harga: " + item.harga;
            document.getElementById('stok').innerHTML = "stok: " + item.stok;
            document.getElementById('jumlah_beli').value = "1";
            document.getElementById('jumlah_beli').max = item.stok;

            document.getElementById('image').src = "image/" + item.image;
        }
    </script>

</head>
<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
        <a href="#">
            <img src="mmg.png" width="100" alt="">
        </a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu">
            <span class="navbar navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav">
                <li class="nav-item"><a href="tampilan_customer.php" class="nav-link">Beranda</a></li>
                <li class="nav-item"><a href="transaksi.php" class="nav-link">Order</a></li>
                <li class="nav-item"><a href="cart.php" class="nav-link">Cart (<?php echo count($_SESSION["cart"])?>)</a></li>
                <li class="nav-item"><a href="proses_login_customer.php?logout=true" class="nav-link">
                 Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <?php
            if(isset($_POST["cari"])){
                //query jika mencari
                $cari = $_POST["cari"];
                $sql = "select * from ps where jenis like '%$cari%'";
            }else {
                //query jika tidak mencari
                $sql = "select * from ps";
            }

            //eksekusi perintah SQL-nya
            $query = mysqli_query($connect, $sql);
        ?>
        <br />
        <br />
        <div class="header col-12">
    </div>
        <!-- start card -->
        <form action="playstation.php" method="post">
            <input type="text" name="cari" class="form-control" placeholder="Pencarian...">
        </form>
        <div class="row">
            <?php foreach ($query as $ps): ?>
            <div class="card col-md-2">
                <img src="<?php echo 'image/'.$ps['image']?>" class="card-img-top" alt="Foto Ps" width="20px" height="130px" />
                <div class="card-header bg-info text-white">
                    <h4><?php echo $ps["jenis"] ?></h4>
                </div>
                <div class="card-body" >
                    <h5>Rp <?php echo $ps["harga"] ?> / hari</h5>
                    <h5>Stok <?php echo $ps["stok"] ?> </h5>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-success" onclick='Detail(<?php echo json_encode($ps); ?>)'
                      data-toggle="modal" data-target="#largemodal">
                        Info lebih
                    </button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <!-- end card -->
    </div>

    <div class="modal fade" id="largemodal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h4>Info Ps</h4>
                    <span class="close" data-dismiss="modal">&times;</span>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <!-- untuk gambar -->
                            <img style="width:100%; height: auto;" id="image">
                        </div>
                        <div class="col-6">
                            <h4 id="jenis"></h4>
                            <h4 id="stok"></h4>
                            <h4 id="harga"></h4>

                            <form action="proses_cart.php" method="post">
                                <input type="hidden" name="kode_barang" id="kode_barang">
                                dalam satu pemesanan hanya bisa pesan 1 barang
                                TOTAL HARI :
                                <input type="number" name="jumlah_beli" id="jumlah_beli" class="form-control" min="1">
                                <button type="submit" name="add_to_cart" class="btn btn-success">
                                    Tambahkan ke Keranjang
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
