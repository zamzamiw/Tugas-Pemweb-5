<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $query = "DELETE FROM mahasiswa WHERE id = $id";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data berhasil dihapus!'); window.location='read.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!'); window.location='read.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.location='read.php';</script>";
}
?>