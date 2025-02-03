<?php
include_once("User.php");

$user = new User();
// var_dump(mysqli_fetch_assoc($user->get_username("admin")));

?>

<!DOCTYPE html>
<html lang="en">

<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f0f4f8;
    height: 100vh;
    margin: 0;
    }

    h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
    }

    form {
        background-color: #fff;
        padding: 20px 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
        margin: auto; /* Menambahkan ini agar tabel ke tengah */
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        text-align: center;
        font-size: 1.2em;
        background-color: #007bff;
        color: white;
        padding: 10px 0;
        border-radius: 8px 8px 0 0;
    }

    td {
        padding: 10px;
        color: #555;
    }

    input[type="text"],
    input[type="password"] {
        width: calc(100% - 20px);
        padding: 8px;
        margin: 5px 0;
        border: 1px solid #ddd;
        border-radius: 4px;
        outline: none;
        font-size: 0.9em;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
        border-color: #007bff;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 10px 15px;
        font-size: 1em;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login User</title>
</head>

<body>
    <?php
        if(isset($_GET['status'])){
            $status = $_GET["status"];

            if($status == "denied"){
                echo '<script type="text/javascript">';
                echo 'alert("AKSES ANDA DITOLAK, SILAHKAN LOGIN!");';
                echo 'window.location.href = "form_login.php";'; // Redirect ke halaman lain setelah alert
                echo '</script>';
            }
        }
    ?>
    <h1> HALAMAN LOGIN USER </h1>
    <br />
    <form action="login_auth.php" method="post" name="form_login">
        <table border="1">
            <tr>
                <th colspan="2">LOGIN</th>
            </tr>
            <tr>
                <td width="100px"> Nomor Pegawai </td>
                <td width="200px"><input type="text" name="nomor_pegawai" size="25"></td>
            </tr>
            <tr>
                <td width="100px"> PASSWORD </td>
                <td width="200px"><input type="password" name="password" size="25"></td>
            </tr>
            <tr>
                <td width="100px"> &nbsp; </td>
                <td width="150px"><input type="submit" name="btn_login" value="LOGIN"></td>
            </tr>
        </table>
    </form>
</body>

</html>