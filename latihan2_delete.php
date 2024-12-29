!<?php
include "latihan2.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $data = getData();

    if (isset($data[$id])) {
        unset($data[$id]);

        file_put_contents($jsonname, json_encode(array_values($data)));

        echo "<h2>Data Berhasil Dihapus</h2>";
    } else {
        echo "<h2>Data Tidak Ditemukan</h2>";
    }
} else {
    echo "<h2>ID Tidak Ditemukan</h2>";
}

echo '<button id="backToDashboard">Kembali ke Dashboard</button>';
?>

<script>
document.getElementById('backToDashboard').addEventListener('click', function() {
    window.location.href = 'latihan2_fe.php'; 
});
</script>
