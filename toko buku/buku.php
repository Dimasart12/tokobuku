<?php
session_start();
if(!isset($_SESSION["id_admin"])){
    header("location:login_admin.php");
}
include("config.php");
?>

<!DOCTYPE html>
<html lang="en" >
<style media="screen">
.header{
    height: 500px;
    background: url("p.jpg") no-repeat;
    text-align: center;
    background-size: cover;
    align-content: center;
    background-position: center;
    box-shadow: inset 0 0 0 500px rgba(0, 0, 0, 0.5);
    text-decoration-color:white;
    color: white;
    font-family: serif;
    padding-top: 225px;
    font-size: 100px;
  }
body{
    background: #abbaab;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #ffffff, #abbaab);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #ffffff, #abbaab); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

  }
</style>
<head>
    <meta charset="UTF-8">
    <title>Toko Buku</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        Add = () => {
            document.getElementById('action').value = "insert";
            document.getElementById('kode_buku').value = "";
            document.getElementById('judul').value = "";
            document.getElementById('penulis').value = "";
            document.getElementById('tahun').value = "";
            document.getElementById('harga').value = "";
            document.getElementById('stok').value = "";
            document.getElementById('image').value = "";
        }

        Edit = (item) =>{
            document.getElementById('action').value = "update";
            document.getElementById('kode_buku').value = item.kode_buku;
            document.getElementById('judul').value = item.judul;
            document.getElementById('penulis').value = item.penulis;
            document.getElementById('tahun').value = item.tahun;
            document.getElementById('harga').value = item.harga;
            document.getElementById('stok').value = item.stok;
        }
    </script>

</head>
<body>
    <?php
    if(isset($_POST["cari"])){
        //query jika mencari
        $cari = $_POST["cari"];
        $sql = "select * from buku where kode_buku like '%$cari%' or judul like '%$cari%' or penulis like '%$cari%' or tahun like '%$cari%' or harga like '%$cari%' or stok like '%$cari%'";
    }else {
        //query jika tidak mencari
        $sql = "select * from buku";
    }

    //eksekusi perintah SQL-nya
    $query = mysqli_query($connect, $sql);
    ?>
    <div class="container">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
            <a href="#">
                <img src="mmg.png" width="100" alt="">
            </a>

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu">
                <span class="navbar navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="buku.php" class="nav-link">Beranda</a></li>
                    <li class="nav-item"><a href="admin.php" class="nav-link">Admin</a></li>
                    <li class="nav-item"><a href="customer.php" class="nav-link">Customer</a></li>
                    <li class="nav-item"><a href="proses_login_admin.php?logout=true" class="nav-link">
                        Logout</a></li>
                </ul>
            </div>
        </nav>

        <div class="header">
              <h1>WELCOME TO LIBRARY</h1>
            </div>
            <br />
            <br />
            <div class="container">
            <!-- start card -->
        <div class="card" margin-top>
            <div class="card-header bg-danger text-white">
                <h4>Data Buku</h4>
            </div>
            <div class="card-body">
                <form action="buku.php" method="post">
                    <input type="text" name="cari" class="form-control" placeholder="Pencarian...">
                </form>
                <table class="table" border="1">
                    <thead>
                        <tr>
                            <th>Kode Buku</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Tahun</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Foto</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($query as $buku): ?>
                        <tr>
                            <td><?php echo $buku["kode_buku"] ?></td>
                            <td><?php echo $buku["judul"] ?></td>
                            <td><?php echo $buku["penulis"] ?></td>
                            <td><?php echo $buku["tahun"] ?></td>
                            <td><?php echo $buku["harga"] ?></td>
                            <td><?php echo $buku["stok"] ?></td>
                            <td>
                                <img src="<?php echo 'image/'.$buku['image'];?>" alt="Foto Buku" width="200" />
                            </td>
                            <td>
                                <button data-toggle="modal" data-target="#modal_buku" type="button" class="btn btn-sm btn-primary" onclick='Edit(<?php echo json_encode($buku);?>)'> Edit</button>
                                <a href="proses_crud_buku.php?hapus=true&kode_buku=<?php echo $buku["kode_buku"];?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini')">
                                    <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <button data-toggle="modal" data-target="#modal_buku" type="button" class="btn btn-sm btn-success" onclick="Add()">Tambah Data</button>
                </div>
            </div>
        <!-- end card -->
        <!-- form modal -->
        <div class="modal fade" id="modal_buku">
            <div class="modal-dialog">
                <div class="modal-content">
                <form action="proses_crud_buku.php" method="post" enctype="multipart/form-data">
                    <div class="modal-header bg-info text-white">
                        <h4>Form Buku</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="action" id="action">
                        Kode Buku
                        <input type="number" name="kode_buku" id="kode_buku" class="form-control" required />
                        Judul
                        <input type="text" name="judul" id="judul" class="form-control" required />
                        Penulis
                        <input type="text" name="penulis" id="penulis" class="form-control" required />
                        Tahun
                        <input type="text" name="tahun" id="tahun" class="form-control" required />
                        Harga
                        <input type="text" name="harga" id="harga" class="form-control" required />
                        Stok
                        <input type="text" name="stok" id="stok" class="form-control" required />
                        Foto
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="save_buku" class="btn btn-success">Simpan</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <!-- end modal -->
    </div>
</body>
</html>
