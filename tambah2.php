<?php
require 'function.php';

if( isset($_POST["submit"])){


    if(tambah2($_POST) >0 ){
        echo "
            <script>
                alert('data berhasil ditambah');
                document.location.href = 'index2.php'
            </script>
        ";
    }else {
        echo "
            <script>
                alert('data gagal ditambah');
                document.location.href = 'index2.php'
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
    <title>Tambah Data produk</title>
    <link rel="stylesheet" href="tambah.css">

</head>

<body>
    <div class="container">
        <h1>Tambah produk</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="idproduk">Id Produk:</label>
                <input type="text" name="idproduk" id="idproduk" required>
            </div>
            <div class="form-group">
                <label for="namaproduk">Nama Produk:</label>
                <input type="text" name="namaproduk" id="namaproduk" required>
            </div>

            <div class="form-group">
                <label for="jumlahproduk">jumlah produk:</label>
                <input type="text" name="jumlahproduk" id="jumlahproduk" required>
            </div>

            <div class="form-group">
                <button type="submit" name="submit">Tambah Data</button>
            </div>
        </form>
    </div>
</body>

</html>