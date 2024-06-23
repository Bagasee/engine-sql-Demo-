<?php

require 'function.php';

$idproduk = $_GET["id"];

if(hapus2($idproduk) > 0 ) {
    echo "
        <script>
            alert('data berhasil dihapus');
            document.location.href = 'index2.php'
        </script>
    ";
} else {
    echo "
    <script>
        alert('data gagal dihapus');
        document.location.href = 'index2.php'
    </script>
";
}

?>