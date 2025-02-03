<?php

include_once("controller/Pegawai.php");

if (isset($_GET["aksi"])) {
    $pegawai = new Pegawai();
    $aksi = $_GET["aksi"];

    if (($_SERVER["REQUEST_METHOD"] == "POST") && ($aksi == "tambah")) {
        $nomor_pegawai = $_POST["nomor_pegawai"];
        $nama_pegawai = $_POST["nama_pegawai"];
        $jabatan = $_POST["jabatan"];
        $password = $_POST["password"];
        $id_cabang = $_POST["id_cabang"];

        try {
            $data = $pegawai->insert_pegawai($nomor_pegawai, $nama_pegawai, $jabatan, $password, $id_cabang);
            if ($data == true) {
                echo '<script type="text/javascript">';
                echo 'alert("Data Pegawai berhasil disimpan !");';
                echo 'window.location.href = "tampil_pegawai.php";'; // Redirect ke halaman lain setelah alert
                echo '</script>';
            }
        } catch (mysqli_sql_exception $ex) {
            echo '<script type="text/javascript">';
            echo 'alert("Data Pegawai Tidak Berhasil Disimpan !");';
            echo 'window.location.href = "tampil_pegawai.php";'; // Redirect ke halaman lain setelah alert
            echo '</script>';
        }
    } else if (($_SERVER["REQUEST_METHOD"] == "POST") && ($aksi == "edit")) {
        $nomor_pegawai = $_POST["nomor_pegawai"];
        $nama_pegawai = $_POST["nama_pegawai"];
        $jabatan = $_POST["jabatan"];
        $password = $_POST["password"];
        $id_cabang = $_POST["id_cabang"];

        try {
            $data = $pegawai->update_pegawai($nomor_pegawai, $nama_pegawai, $jabatan, $password, $id_cabang);
            if ($data == true) {
                echo '<script type="text/javascript">';
                echo 'alert("Data Pegawai berhasil Diubah !");';
                echo 'window.location.href = "tampil_pegawai.php";'; // Redirect ke halaman lain setelah alert
                echo '</script>';
            }
        } catch (mysqli_sql_exception $ex) {
            echo '<script type="text/javascript">';
            echo 'alert("Data Pegawai Tidak Berhasil Diubah !");';
            echo 'window.location.href = "tampil_pegawai.php";'; // Redirect ke halaman yang sama setelah alert
            echo '</script>';
        }
    } else if (($_SERVER["REQUEST_METHOD"] == "GET") && ($aksi == "hapus")) {
        $nomor_pegawai = $_GET["id"];
        try {
            $data = $pegawai->delete_pegawai($nomor_pegawai);
            if ($data == true) {
                echo '<script type="text/javascript">';
                echo 'alert("Data Pegawai dengan id : ' . $nomor_pegawai . ' berhasil dihapus !");';
                echo 'window.location.href = "tampil_pegawai.php";'; // Redirect ke halaman lain setelah alert
                echo '</script>';
            }
        } catch (mysqli_sql_exception $ex) {
            echo '<script type="text/javascript">';
            echo 'alert("Data Pegawai dengan id : ' . $nomor_pegawai . ' Tidak Ditemukan !");';
            echo 'window.location.href = "tampil_cabang.php";'; // Redirect ke halaman lain setelah alert
            echo '</script>';
        }
    }
}
