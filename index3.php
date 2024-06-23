<?php
require 'function.php';

$produk3 = query3("SELECT * FROM produk");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <header>
        <ul>
            <li><a href="index.php">pbx1</a>
            </li>
            <li><a href="index2.php">pbx2</a>
            </li>
            <li><a href="index3.php">pbx3</a>
            </li>
            <li><a href="index4.php">produk</a>
            </li>
        </ul>
    </header>
    <main>
        <h1>pbx3</h1>

        <a href="tambah3.php">
            <h1>Tambah Produk </h1>
        </a>
        <table>

            <tr>

                <th>id produk</th>
                <th>nama produk</th>
                <th>jumlah produk</th>
                <th>Aksi</th>

            </tr>
            <?php $i = 1; ?>

            <?php  foreach( $produk3 as $row): ?>
            <tr>
                <td><?= $row["idproduk"]; ?></td>
                <td><?= $row["namaproduk"]; ?></td>
                <td><?= $row["jumlahproduk"]; ?></td>
                <td class="aksi">
                    <a href="ubah3.php?id= <?= $row["idproduk"]; ?>">ubah</a> |
                    <a href="hapus3.php?id= <?= $row["idproduk"]; ?>" onclick="
    return confirm ('yakin?')">hapus</a>
                </td>
            </tr>
            <?php $i++ ; ?>
            <?php endforeach ; ?>

        </table>

    </main>

</body>

</html>