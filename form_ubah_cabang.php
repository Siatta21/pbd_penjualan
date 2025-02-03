<?php
session_start();

if(!isset($_SESSION['login'])){
    header("location: form_login.php?status=denied");
    exit;
}

include_once("function/navbar.php");
include_once("controller/Cabang.php");

$cabang = new Cabang();
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
    <title>Form Ubah Cabang</title>
</head>

<body>
    <?php
    headerTemplate();
    ?>

    <h1>Form Ubah Data Cabang</h1>
    <form method="post" action="update_cabang.php?id=<?php echo $_GET["id"]; ?>&aksi=edit">
        <?php
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $data = $cabang->get_cabang_by_id($id);

            foreach ($data as $data_cabang) {

        ?>
                <table border=" 1px" align="left">
                    <tr>
                        <td width="150"> Id Cabang </td>
                        <td width="200"> <input type="text" name="id_cabang" size="25" maxlength="3"
                                value="<?php echo $data_cabang["id_cabang"]; ?>" readonly> </td>
                    </tr>
                    <tr>
                        <td width="150"> Nama Toko </td>
                        <td width="200"> <input type="text" name="nama_toko" size="25" maxlength="50"
                                value="<?php echo $data_cabang["nama_toko"]; ?>"></td>
                    </tr>
                    <tr>
                        <td width="150"> Alamat </td>
                        <td width="200"> <input type="text" name="alamat" size="25" maxlength="15"
                                value="<?php echo $data_cabang["alamat"]; ?>"></td>
                    </tr>
                    <tr>
                        <td width="150"> No Telp </td>
                        <td width="200"> <input type="text" name="no_telp" size="25" maxlength="15"
                                value="<?php echo $data_cabang["no_telp"]; ?>"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                        <button type="submit">simpan</button>   
                    </tr>
                    <tr>
                        <td colspan="2"><a href="tampil_cabang.php"><<</a> </td>
                    </tr>
                </table>
        <?php }
        } ?>
    </form>
</body>

</html>