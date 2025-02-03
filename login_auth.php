<?php
session_start();
include_once("User.php");

if(isset($_POST["btn_login"])){
    // Proses authentikasi User
    $nomor_pegawai = $_POST["nomor_pegawai"];
    $password = $_POST["password"];

    try{
        // Panggil method untuk mencari data user berdasarkan nomor_pegawai
        $user = new User();
        $result = $user->get_username($nomor_pegawai);
        if(mysqli_num_rows($result)===1){
            // Mengecek password
            $data = mysqli_fetch_assoc($result);
            if ($password === $data["password"]) {
                // Login berhasil
                // tambahkan sebuah session untuk mengecek status login pengguna
                $_SESSION["login"] = true;
                $_SESSION["nama_pegawai"]= $data["nama_pegawai"];
                $_SESSION["jabatan"] = $data["jabatan"];

                echo '<script type="text/javascript">';
                echo 'alert("LOGIN BERHASIL!");';
                echo 'window.location.href = "dashboard.php";'; // Redirect ke halaman lain setelah alert
                echo '</script>';

                // if(password_verify($password, $data["password"])){
                //     //Login Berhasil
                //     echo '<script type="text/javascript">';
                //     echo 'alert("LOGIN BERHASIL !");';
                //     echo 'window.location.href = "dashboard.php";'; // Redirect ke halaman lain setelah alert
                //     echo '</script>';
            }else{
                // Tampil pesan jika password user salah
                echo '<script type="text/javascript">';
                echo 'alert("PASSWORD YANG DIMASUKAN SALAH !");';
                echo 'window.location.href = "form_login.php";'; // Redirect ke halaman lain setelah alert
                echo '</script>';
            }
        }else{
            // Tampilkan pesan data user tidak ditemukan
            echo '<script type="text/javascript">';
            echo 'alert("DATA USER TIDAK DITEMUKAN !");';
            echo 'window.location.href = "form_login.php";'; // Redirect ke halaman lain setelah alert
            echo '</script>';
        }


    }catch(mysqli_sql_exception $ex){
        // Ketika query tidak berhasil, tampilkan pesan

        echo '<script type="text/javascript">';
        echo 'alert("QUERY DATABASE GAGAL !");';
        echo 'window.location.href = "form_login.php";'; // Redirect ke halaman lain setelah alert
        echo '</script>';
    }
}