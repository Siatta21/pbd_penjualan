<?php

include_once("controller/Barang.php");

if (isset($_GET["aksi"])) {
    $barang = new Barang();
    $aksi = $_GET["aksi"];

    if (($_SERVER["REQUEST_METHOD"] == "POST") && ($aksi == "tambah")) {
        $id_barang = $_POST["id_barang"];
        $nama_barang = $_POST["nama_barang"];
        $harga = $_POST["harga"];

        try {
            $data = $barang->insert_barang($id_barang, $nama_barang, $harga);
            if ($data == true) {
                echo '<script type="text/javascript">';
                echo 'alert("Data Barang berhasil disimpan !");';
                echo 'window.location.href = "tampil_barang.php";'; // Redirect ke halaman lain setelah alert
                echo '</script>';
            }
        } catch (mysqli_sql_exception $ex) {
            echo '<script type="text/javascript">';
            echo 'alert("Data Barang Tidak Berhasil Disimpan !");';
            echo 'window.location.href = "tampil_barang.php";'; // Redirect ke halaman lain setelah alert
            echo '</script>';
        }
    } else if (($_SERVER["REQUEST_METHOD"] == "POST") && ($aksi == "edit")) {
        $id_barang = $_POST["id_barang"];
        $nama_barang = $_POST["nama_barang"];
        $harga = $_POST["harga"];

        try {
            $data = $barang->update_barang($id_barang, $nama_barang, $harga);
            if ($data == true) {
                echo '<script type="text/javascript">';
                echo 'alert("Data Barang berhasil Diubah !");';
                echo 'window.location.href = "tampil_barang.php";'; // Redirect ke halaman lain setelah alert
                echo '</script>';
            }
        } catch (mysqli_sql_exception $ex) {
            echo '<script type="text/javascript">';
            echo 'alert("Data Barang Tidak Berhasil Diubah !");';
            echo 'window.location.href = "tampil_barang.php";'; // Redirect ke halaman yang sama setelah alert
            echo '</script>';
        }
    } else if (($_SERVER["REQUEST_METHOD"] == "GET") && ($aksi == "hapus")) {
        $id_barang = $_GET["id"];
        try {
            $data = $barang->delete_barang($id_barang);
            if ($data == true) {
                echo '<script type="text/javascript">';
                echo 'alert("Data Barang dengan id : ' . $id_barang . ' berhasil dihapus !");';
                echo 'window.location.href = "tampil_barang.php";'; // Redirect ke halaman lain setelah alert
                echo '</script>';
            }
        } catch (mysqli_sql_exception $ex) {
            echo '<script type="text/javascript">';
            echo 'alert("Data Barang dengan id : ' . $id_barang . ' Tidak Ditemukan !");';
            echo 'window.location.href = "tampil_barang.php";'; // Redirect ke halaman lain setelah alert
            echo '</script>';
        }
    }
}
