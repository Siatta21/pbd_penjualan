<?php

include_once("controller/Cabang.php");

if (isset($_GET["aksi"])) {
    $cabang = new Cabang();
    $aksi = $_GET["aksi"];

    if (($_SERVER["REQUEST_METHOD"] == "POST") && ($aksi == "tambah")) {
        $id_cabang = $_POST["id_cabang"];
        $nama_toko = $_POST["nama_toko"];
        $alamat = $_POST["alamat"];
        $no_telp = $_POST["no_telp"];

        try {
            $data = $cabang->insert_cabang($id_cabang, $nama_toko, $alamat, $no_telp);
            if ($data == true) {
                echo '<script type="text/javascript">';
                echo 'alert("Data Cabang berhasil disimpan !");';
                echo 'window.location.href = "tampil_cabang.php";'; // Redirect ke halaman lain setelah alert
                echo '</script>';
            }
        } catch (mysqli_sql_exception $ex) {
            echo '<script type="text/javascript">';
            echo 'alert("Data Cabang Tidak Berhasil Disimpan !");';
            echo 'window.location.href = "tampil_cabang.php";'; // Redirect ke halaman lain setelah alert
            echo '</script>';
        }
    } else if (($_SERVER["REQUEST_METHOD"] == "POST") && ($aksi == "edit")) {
        $id_cabang = $_POST["id_cabang"];
        $nama_toko = $_POST["nama_toko"];
        $alamat = $_POST["alamat"];
        $no_telp = $_POST["no_telp"];

        try {
            $data = $cabang->update_cabang($id_cabang, $nama_toko, $alamat, $no_telp);
            if ($data == true) {
                echo '<script type="text/javascript">';
                echo 'alert("Data Cabang berhasil Diubah !");';
                echo 'window.location.href = "tampil_cabang.php";'; // Redirect ke halaman lain setelah alert
                echo '</script>';
            }
        } catch (mysqli_sql_exception $ex) {
            echo '<script type="text/javascript">';
            echo 'alert("Data Cabang Tidak Berhasil Diubah !");';
            echo 'window.location.href = "tampil_cabang.php";'; // Redirect ke halaman yang sama setelah alert
            echo '</script>';
        }
    } else if (($_SERVER["REQUEST_METHOD"] == "GET") && ($aksi == "hapus")) {
        $id_cabang = $_GET["id"];
        try {
            $data = $cabang->delete_cabang($id_cabang);
            if ($data == true) {
                echo '<script type="text/javascript">';
                echo 'alert("Data Cabang dengan id : ' . $id_cabang . ' berhasil dihapus !");';
                echo 'window.location.href = "tampil_cabang.php";'; // Redirect ke halaman lain setelah alert
                echo '</script>';
            }
        } catch (mysqli_sql_exception $ex) {
            echo '<script type="text/javascript">';
            echo 'alert("Data Cabang dengan id : ' . $id_cabang . ' Tidak Ditemukan !");';
            echo 'window.location.href = "tampil_cabang.php";'; // Redirect ke halaman lain setelah alert
            echo '</script>';
        }
    }
}
