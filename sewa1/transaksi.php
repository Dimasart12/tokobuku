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
<br />
<br />
<br />
    <div class="container">
        <div class="card mt-3">
            <div class="card-header bg-success">
                <h4>Riwayat Sewa</h4>
            </div>
            <div class="card-body">
                <?php
                    $sql = "select * from transaksi t inner join customer c
                    on t.id_customer = c.id_customer where t.id_customer = '".$_SESSION["id_customer"]."' order by t.tgl desc";
                    $query = mysqli_query($connect,$sql);
                ?>

                <ul class="list-group">
                    <?php foreach($query as $transaksi): ?>
                    <li class="list-group-item mb-4">
                        <h6>ID sewa: <?php echo $transaksi["id_sewa"]; ?></h6>
                        <h6>Nama Pembeli: <?php echo $transaksi["nama"]; ?></h6>
                        <h6>Tgl. Transaksi: <?php echo $transaksi["tgl"]; ?></h6>
                        <?php
                            $sql2 = "select * from detail d inner join ps b
                            on d.kode_barang = b.kode_barang
                            where d.id_sewa='".$transaksi["id_sewa"]."'";
                            $query2 = mysqli_query($connect, $sql2);
                        ?>
                      <?php endforeach; ?>


</body>
</html>
