<?php
    session_start();
    include("config.php");

    if (isset($_POST["add_to_cart"])){
        // tampung kode_ps dan jumlah beli
        $kode_barang = $_POST["kode_barang"];
        $jumlah_beli = $_POST["jumlah_beli"];

        // ambil data ps dari database sesuai dg kode_ps yang dipilih
        $sql = "select * from ps where kode_barang='$kode_barang'";
        $query = mysqli_query($connect, $sql); // eksekusi sintak sql nya
        $ps = mysqli_fetch_array($query); // menampung data dari database ke array

        $item = [
            "kode_barang" => $ps["kode_barang"],
            "jenis" => $ps["jenis"],
            "image" => $ps["image"],
            "harga" => $ps["harga"],
            "jumlah_beli" => $jumlah_beli
        ];

        //masukan item ke keranjang(cart)
        array_push($_SESSION["cart"], $item);

        header("location:tampilan_customer.php");
    }

    //menghapus item dalam cart
    if (isset($_GET["hapus"])) {
        //tampung data
        $kode_barang = $_GET["kode_barang"];

        // cari index cart sesuai dengan kode_ps yg dihapus
        $index = array_search(
            $kode_barang, array_column(
                $_SESSION["cart"], "kode_barang"
            )
        );

        // hapus item pada cart
        array_splice($_SESSION["cart"], $index, 1);
        header("location:cart.php");
    }

    //checkout
    if (isset($_GET["checkout"])) {
        // masukan data pada cart ke database (tabel transaksi)
        $id_sewa = "ID".rand(1,10000);
        $tgl = date("Y-m-d H:i:s");
        $id_customer = $_SESSION["id_customer"];

        // buat query
        $sql = "insert into transaksi values('$id_sewa','$tgl','$id_customer')";
        mysqli_query($connect, $sql);

        foreach($_SESSION["cart"] as $cart){
            $kode_barang = $cart["kode_barang"];
            $jumlah = $cart["jumlah_beli"];
            $harga = $cart["harga"];

            //buat query
            $sql = "insert into detail values ('$id_sewa','$kode_barang','$jumlah','$harga')";
            mysqli_query($connect, $sql);

            $sql2 = "update ps set stok = stok - $jumlah where kode_barang ='$kode_barang'";
            mysqli_query($connect, $sql2);
        }
        // kosongkan cart nya
        $_SESSION["cart"] = array();

        header("location:transaksi.php");
    }
?>
