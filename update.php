<?php
include 'koneksi.php';

if(isset($_GET['id'])) {
    $id = intval(value: $_GET['id']);
    $query = "SELECT * FROM mahasiswa WHERE id=$id";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);

    if(!$data) {
        echo "Data tidak ditemukan.";
        exit();
    }
}else{
    echo "ID tidak ditemukan.";
    exit();
}

if(isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $updateQuery = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', jurusan = '$jurusan' WHERE id = $id";
    $updateResult = mysqli_query($koneksi, $updateQuery);

    if ($updateResult) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='read.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!'); window.location='read.php';</script>";
    }
}
?>

    
    <form action="" method="POST">
    NPM: <input type="text" name="nim" value="<?php echo $data['nim']; ?>"><br>
    Nama: <input type="text" name="nama" value="<?php echo $data['nama']; ?>"><br>
    Jurusan: <input type="text" name="jurusan" value="<?php echo $data['jurusan']; ?>"><br>
    <input type="submit" name="submit" value="Update Data">
</form>
