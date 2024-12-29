<?php 
    include "latihan2.php";

    $method = $_SERVER['REQUEST_METHOD'];

    if($method == "POST") {

        $nama = $_POST['nama'];
        $umur = $_POST['umur'];
        $jenis_kelamin = $_POST['jenis_kelamin'];

        $user = new User($nama, $jenis_kelamin, $umur);
        addData($user);

        echo "<h2>Data Berhasil Ditambahkan</h2>";
        echo '<button id="backToDashboard">Kembali ke Dashboard</button>';
    }
?>

<script>
    document.getElementById('backToDashboard').addEventListener('click', function() {
        window.location.href = 'latihan2_fe.php'; 
    });
</script>
