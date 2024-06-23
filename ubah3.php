<?php
require 'function.php';

$idproduk = $_GET["id"];

$produk = query3("SELECT * FROM produk WHERE idproduk = $idproduk")[0];


if( isset($_POST["submit"])){


    if( ubah3 ($_POST) >  0 ){
        echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = 'index3.php'
            </script>
        ";
    }else {
        echo "
            <script>
                alert('data gagal diubah');
                document.location.href = 'index3.php'
            </script>
    ";
    };
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data produk</title>
    <link rel="stylesheet" href="ubah.css">
</head>

<body>
    <div class="container">
        <h1>Ubah Data produk</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="idproduk" value="<?= $produk['idproduk']; ?>">

            <div class="form-group">
                <label for="namaproduk">Nama Produk:</label>
                <input type="text" name="namaproduk" id="namaproduk" value="<?= $produk['namaproduk']; ?>" required>
            </div>

            <div class="form-group">
                <label for="jumlahproduk">jumlah Produk:</label>
                <input type="text" name="jumlahproduk" id="jumlahroduk" value="<?= $produk['jumlahproduk']; ?>"
                    required>
            </div>

            <div class="form-group">
                <button type="submit" name="submit">Ubah Data</button>
            </div>
        </form>
    </div>
</body>

</html>