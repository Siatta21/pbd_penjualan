<?php
session_start();

if(!isset($_SESSION['login'])){
    header("location: form_login.php?status=denied");
    exit;
}

include_once("function/navbar.php");

?>


<!DOCTYPE html>
<html lang="en">

<style>
    body {
    font-family: Arial, sans-serif;
    margin: 20px;
    background-color: #f9f9f9;
    color: #333;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        position: relative;
    }

    h1::after {
        content: "";
        display: block;
        width: 100px;
        height: 3px;
        background-color: black;
        margin: 10px auto 0;
        border-radius: 4px;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Kelola Produk</title>
</head>

<body>
    <?php
    headerTemplate();
    ?>

    <h2>Halaman Dashboard <?php echo $_SESSION["jabatan"] ?> <br /></h2>
    <p>
        Selamat Datang <?php echo $_SESSION["nama_pegawai"] ?> <br />
        Silahkan pilih menu Kelola produk di navbar untuk memulai
    </p>

</body>

</html>