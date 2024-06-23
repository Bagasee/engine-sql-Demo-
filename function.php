<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db1");
$connect = mysqli_connect("localhost", "root", "", "db2");
$connection = mysqli_connect("localhost", "root", "", "db3");
$cn = mysqli_connect("localhost", "root", "", "produk");


// db1
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows [] = $row;
    }
    return $rows;
};


// db2
function query2($query) {
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows [] = $row;
    }
    return $rows;
};


// db3
function query3($query) {
    global $connection;
    $result = mysqli_query($connection, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows [] = $row;
    }
    return $rows;
};

function query4($query) {
    global $cn;
    $result = mysqli_query($cn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows [] = $row;
    }
    return $rows;
};


// table1
function tambah($data) {
    global $conn, $cn;

    $idproduk = htmlspecialchars($data["idproduk"]);
    $namaproduk = htmlspecialchars($data["namaproduk"]);
    $jumlahproduk = htmlspecialchars($data["jumlahproduk"]);

    // Periksa apakah idproduk sudah ada di database
    $query_check = "SELECT COUNT(*) as count FROM produk WHERE idproduk = '$idproduk'";
    $result_check = mysqli_query($conn, $query_check);
    $row_check = mysqli_fetch_assoc($result_check);

    if ($row_check['count'] > 0) {
        echo "ID produk sudah ada. Silakan gunakan ID yang berbeda.";
        return;
    }

    // Tambahkan data ke tabel produk
    $query = "INSERT INTO produk (idproduk, namaproduk, jumlahproduk) 
              VALUES ('$idproduk', '$namaproduk', '$jumlahproduk')";
    mysqli_query($conn, $query);

    // Tambahkan juga ke database gabungan
    tambahGabungan($data, 'db1');

    return mysqli_affected_rows($conn);
}


function ubah($data) {
    global $conn, $cn;

    $idproduk = $data["idproduk"];
    $namaproduk = htmlspecialchars($data["namaproduk"]);
    $jumlahproduk = htmlspecialchars($data["jumlahproduk"]);

    // Update tabel produk di database utama
    $query_produk = "UPDATE produk SET
                namaproduk = '$namaproduk',
                jumlahproduk = '$jumlahproduk'
                WHERE idproduk = '$idproduk'";

    mysqli_query($conn, $query_produk);

    // Ubah id produk gabungan dengan menambahkan kode unik ke depan idproduk
    $id_produk_gabungan = 'pbx1-' . $idproduk;

    // Update tabel pbx_produk di database gabungan
    $query_gabungan = "UPDATE pbx_produk SET
                namaproduk = '$namaproduk',
                jumlahproduk = '$jumlahproduk'
                WHERE idproduk = '$id_produk_gabungan'";

    mysqli_query($cn, $query_gabungan);

    return mysqli_affected_rows($conn); 
}




function hapus($idproduk) {
    global $conn;
    mysqli_query($conn, "DELETE FROM produk WHERE idproduk =$idproduk");

    return mysqli_affected_rows($conn);
    
}

// table2
function tambah2($data) {
    global $connect, $cn;

    $idproduk = htmlspecialchars($data["idproduk"]);
    $namaproduk = htmlspecialchars($data["namaproduk"]);
    $jumlahproduk = htmlspecialchars($data["jumlahproduk"]);

    // Periksa apakah idproduk sudah ada di database
    $query_check = "SELECT COUNT(*) as count FROM produk WHERE idproduk = '$idproduk'";
    $result_check = mysqli_query($connect, $query_check);
    $row_check = mysqli_fetch_assoc($result_check);

    if ($row_check['count'] > 0) {
        echo "ID produk sudah ada. Silakan gunakan ID yang berbeda.";
        return;
    }

    // Tambahkan data ke tabel produk
    $query = "INSERT INTO produk (idproduk, namaproduk, jumlahproduk) 
              VALUES ('$idproduk', '$namaproduk', '$jumlahproduk')";
    mysqli_query($connect, $query);

    // Tambahkan juga ke database gabungan
    tambahGabungan($data, 'db2');

    return mysqli_affected_rows($connect);
}




function ubah2($data) {
    global $connect, $cn;

    $idproduk = $data["idproduk"];
    $namaproduk = htmlspecialchars($data["namaproduk"]);
    $jumlahproduk = htmlspecialchars($data["jumlahproduk"]);

    // Update tabel produk di database utama
    $query_produk = "UPDATE produk SET
                namaproduk = '$namaproduk',
                jumlahproduk = '$jumlahproduk'
                WHERE idproduk = '$idproduk'";

    mysqli_query($connect, $query_produk);

    // Ubah id produk gabungan dengan menambahkan kode unik ke depan idproduk
    $id_produk_gabungan = 'pbx2-' . $idproduk;

    // Update tabel pbx_produk di database gabungan
    $query_gabungan = "UPDATE pbx_produk SET
                namaproduk = '$namaproduk',
                jumlahproduk = '$jumlahproduk'
                WHERE idproduk = '$id_produk_gabungan'";

    mysqli_query($cn, $query_gabungan);

    return mysqli_affected_rows($connect); 
}

function hapus2($idproduk) {
    global $connect;
    mysqli_query($connect, "DELETE FROM produk WHERE idproduk =$idproduk");

    return mysqli_affected_rows($connect);
    
}

// table3
function tambah3($data) {
    global $connection, $cn;

    $idproduk = htmlspecialchars($data["idproduk"]);
    $namaproduk = htmlspecialchars($data["namaproduk"]);
    $jumlahproduk = htmlspecialchars($data["jumlahproduk"]);

    // Periksa apakah idproduk sudah ada di database
    $query_check = "SELECT COUNT(*) as count FROM produk WHERE idproduk = '$idproduk'";
    $result_check = mysqli_query($connection, $query_check);
    $row_check = mysqli_fetch_assoc($result_check);

    if ($row_check['count'] > 0) {
        echo "ID produk sudah ada. Silakan gunakan ID yang berbeda.";
        return;
    }

    // Tambahkan data ke tabel produk
    $query = "INSERT INTO produk (idproduk, namaproduk, jumlahproduk) 
              VALUES ('$idproduk', '$namaproduk', '$jumlahproduk')";
    mysqli_query($connection, $query);

    // Tambahkan juga ke database gabungan
    tambahGabungan($data, 'db3');

    return mysqli_affected_rows($connection);
}

function ubah3($data) {
    global $connection, $cn;

    $idproduk = $data["idproduk"];
    $namaproduk = htmlspecialchars($data["namaproduk"]);
    $jumlahproduk = htmlspecialchars($data["jumlahproduk"]);

    // Update tabel produk di database utama
    $query_produk = "UPDATE produk SET
                namaproduk = '$namaproduk',
                jumlahproduk = '$jumlahproduk'
                WHERE idproduk = '$idproduk'";

    mysqli_query($connection, $query_produk);

    // Ubah id produk gabungan dengan menambahkan kode unik ke depan idproduk
    $id_produk_gabungan = 'pbx3-' . $idproduk;

    // Update tabel pbx_produk di database gabungan
    $query_gabungan = "UPDATE pbx_produk SET
                namaproduk = '$namaproduk',
                jumlahproduk = '$jumlahproduk'
                WHERE idproduk = '$id_produk_gabungan'";

    mysqli_query($cn, $query_gabungan);

    return mysqli_affected_rows($connection); 
}

function hapus3($idproduk) {
    global $connection;
    mysqli_query($connection, "DELETE FROM produk WHERE idproduk =$idproduk");

    return mysqli_affected_rows($connection);
    
}

function tambahGabungan($data, $database) {
    global $cn;

    $idproduk = htmlspecialchars($data["idproduk"]);
    $namaproduk = htmlspecialchars($data["namaproduk"]);
    $jumlahproduk = htmlspecialchars($data["jumlahproduk"]);
    $kode_unik = '';

    // Tentukan kode unik berdasarkan nama database
    switch ($database) {
        case 'db1':
            $kode_unik = 'pbx1';
            break;
        case 'db2':
            $kode_unik = 'pbx2';
            break;
        case 'db3':
            $kode_unik = 'pbx3';
            break;
        default:
            $kode_unik = 'unknown';
    }

    $id_produk_gabungan = $kode_unik . '-' . $idproduk;

    // Periksa apakah id produk gabungan sudah ada
    $check_query = "SELECT * FROM pbx_produk WHERE idproduk = '$id_produk_gabungan'";
    $result = mysqli_query($cn, $check_query);

    if (mysqli_num_rows($result) > 0) {
        // ID sudah ada, lakukan tindakan yang sesuai, misalnya memperbarui data
        // atau menolak untuk memasukkan data baru.
        // Di sini, Anda bisa menambahkan penanganan konflik yang sesuai.
        echo "ID Produk Gabungan Sudah Ada!";
    } else {
        // ID belum ada, lakukan penambahan data
        $insert_query = "INSERT INTO pbx_produk (idproduk, namaproduk, jumlahproduk) 
                         VALUES ('$id_produk_gabungan', '$namaproduk', '$jumlahproduk')";
        mysqli_query($cn, $insert_query);
    }

    return mysqli_affected_rows($cn);
}