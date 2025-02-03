<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alamart</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php


    function headerTemplate()
    { 
        $jabatan = isset($_SESSION['jabatan']) ? $_SESSION['jabatan'] : ''; // Ambil peran pengguna
        ?>
        <nav>
            <h1>SISTEM PENJUALAN ALAMART</h1>
            <div>
                <a href="dashboard.php">Beranda</a>
    
                <?php if ($jabatan === 'admin') : ?>
                    <a href="tampil_barang.php">Kelola Barang</a>
                    <a href="tampil_cabang.php">Kelola Cabang</a>
                    <a href="tampil_pegawai.php">Kelola Pegawai</a>
                    <a href="tampil_laporan.php">Pelaporan</a>
                <?php elseif ($jabatan === 'kasir') : ?>
                    <a href="tampil_transaksi.php">Transaksi</a>
                    <a href="tampil_laporan.php">Pelaporan</a>
                <?php endif; ?>
    
                <a href="logout.php">LogOut</a>
            </div>
        </nav>
        <br />
    <?php
    }
    ?>
</body>

</html>
