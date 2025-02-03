<?php
session_start();

if(!isset($_SESSION['login'])){
    header("location: form_login.php?status=denied");
    exit;
}

include_once("function/navbar.php");
include_once("controller/Barang.php");

$barang = new Barang();
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
    <title>Document</title>
</head>

<body>
    <?php
    headerTemplate();
    ?>

    <h1>Form Tambah Barang</h1>
    <form method="post" action="update_barang.php?aksi=tambah">
        <table border=" 1px" align="left">
            <tr>
                <td width="150"> Id Barang </td>
                <td width="200"> <input type="text" name="id_barang" size="25" maxlength="11"></td>
            </tr>
            <tr>
                <td width="150"> Nama Barang </td>
                <td width="200"> <input type="text" name="nama_barang" size="25" maxlength="50"></td>
            </tr>
            <tr>
                <td width="150"> Harga </td>
                <td width="200"> <input type="text" name="harga" size="25" maxlength="15"></td>
            </tr>
            <tr>
                        <td>&nbsp;</td>
                        <td>
                        <button type="submit">simpan</button>   
                    </tr>
                    <tr>
                        <td colspan="2"><a href="tampil_barang.php"><<</a> </td>
                    </tr>
                </table>
        </table>
    </form>
</body>

</html>