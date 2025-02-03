<?php
session_start();

if(!isset($_SESSION['login'])){
    header("location: form_login.php?status=denied");
    exit;
}

include_once("function/navbar.php");
include_once("controller/Pegawai.php");

include_once("controller/Cabang.php"); 

$cabang = new Cabang();
$dataCabang = $cabang->tampil_cabang();

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

    table {
        width: 100%;
        max-width: 500px;
        margin: 0 auto;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    td {
        padding: 10px;
        border: 1px solid #ddd;
    }

    td:first-child {
        font-weight: bold;
        background-color: #f2f2f2;
        width: 150px;
    }

    input[type="text"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
        transition: border-color 0.3s;
    }
    

    input[type="text"]:focus {
        border-color: #007bff;
        outline: none;
    }

    select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
    transition: border-color 0.3s;
    background-color: white;
    font-size: 14px;
    appearance: none; /* Hilangkan default dropdown di beberapa browser */
    }

    select:focus {
        border-color: #007bff;
        outline: none;
    }


    button {
        background-color: #007bff;
        color: #fff;
        padding: 8px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #0056b3;
    }

    a {
        display: inline-block;
        color: #007bff;
        padding: 8px 15px;
        border: 1px solid #007bff;
        border-radius: 4px;
        text-decoration: none;
        margin-left: 10px;
        transition: background-color 0.3s, color 0.3s;
    }

    a:hover {
        background-color: #007bff;
        color: #fff;
    }

</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Pegawai</title>
</head>

<body>
    <?php
    headerTemplate();
    ?>

    <h1>Form Tambah Pegawai</h1>
    <form method="post" action="update_pegawai.php?aksi=tambah">
        <table border=" 1px" align="left">
            <tr>
                <td width="150"> Nomor Pegawai </td>
                <td width="200"> <input type="text" name="nomor_pegawai" size="25" maxlength="11"></td>
            </tr>
            <tr>
                <td width="150"> Nama Pegawai </td>
                <td width="200"> <input type="text" name="nama_pegawai" size="25" maxlength="50"></td>
            </tr>
            <tr>
                <td width="150"> Jabatan </td>
                <td width="200">
                    <select name="jabatan">
                        <option value="">-- Pilih Jabatan --</option>
                        <option value="Admin">Admin</option>
                        <option value="Kasir">Kasir</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="150"> Password </td>
                <td width="200"> <input type="text" name="password" size="25" maxlength="15"></td>
            </tr>
            <tr>
                <td width="150"> Toko Bekerja </td>
                <td width="200">
                    <select name="id_cabang">
                        <option value="">-- Pilih Cabang --</option>
                        <?php
                        foreach ($dataCabang as $cabang) {
                            echo "<option value='" . $cabang['id_cabang'] . "'>" . $cabang['id_cabang'] . " - " . $cabang['nama_toko'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                        <td>&nbsp;</td>
                        <td>
                        <button type="submit">simpan</button>   
                    </tr>
                    <tr>
                        <td colspan="2"><a href="tampil_pegawai.php"><<</a> </td>
                    </tr>
                </table>
        </table>
    </form>
</body>

</html>