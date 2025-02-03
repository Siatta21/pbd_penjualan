<?php
session_start();

if(!isset($_SESSION['login'])){
    header("location: form_login.php?status=denied");
    exit;
}

include_once("function/navbar.php");
include_once("controller/Pegawai.php");
$pegawai = new Pegawai();

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

    .judulSection h1 {
        text-align: center;
        margin-bottom: 20px;
        position: relative;
    }

    .judulSection h1::after {
        content: "";
        display: block;
        width: 100px;
        height: 3px;
        background-color: black;
        margin: 10px auto 0;
        border-radius: 4px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    th, td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: #007bff;
        color: #fff;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    button {
        background-color: #007bff;
        border: none;
        color: #fff;
        padding: 5px 10px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #0056b3;
    }

    a {
        text-decoration: none;
    }

    a button {
        margin-right: 5px;
    }

</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pegawai</title>
</head>
<body>  
    <?php
    headerTemplate();
    ?>

    <div class="judulSection">
        <h1>DATA PEGAWAI</h1>
    </div>

    <!-- Tombol Tambah Pegawai -->
    <div style="margin-bottom: 10px;">
        <a href="form_tambah_pegawai.php">
            <button style="font-size: 20px; padding: 5px 15px;">+</button>
        </a>
    </div>

    <table border="1px" align="left">
        <tr>
            <th>Id Pegawai</th>
            <th>Nama Pegawai</th>
            <th>Jabatan</th>
            <th>Bekerja Di Toko</th>
            <th width="150">Aksi</th>
        </tr>
        <?php
        foreach ($pegawai->tampil_pegawai() as $data_pegawai) {
        ?>
            <tr>
                <td><?php echo $data_pegawai["nomor_pegawai"]; ?></td>
                <td><?php echo $data_pegawai["nama_pegawai"]; ?> </td>
                <td><?php echo $data_pegawai["jabatan"]; ?> </td>
                <td><?php echo $data_pegawai["id_cabang"]; ?> </td>
                <td width="150" align="center">
                    <a href="form_ubah_pegawai.php?id=<?php echo $data_pegawai['nomor_pegawai']; ?>"><button>EDIT</button></a> |
                    <a href="update_pegawai.php?id=<?php echo $data_pegawai['nomor_pegawai']; ?>&aksi=hapus"><button>HAPUS</button></a>
                </td>
            </tr>
        <?php
        } ?>
    </table>

</body>

</html>