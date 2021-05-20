<form method="POST">
    Nama Kategori : <input type="text" name="nama_kategori">
    <input type="submit" name="btn-simpan" value="Tambah">

</form>

<?php
    if (isset($_POST['btn-simpan'])) {
        $nama_kategori = $_POST['nama_kategori'];

        $sql = "INSERT INTO kategori VALUES ('', '$nama_kategori')";

        if ($mysqli_object->query($sql) === TRUE) {
            echo "<script>alert('Berhasil');</script>";
            echo "<script>window.location.replace('?halaman=kategori');</script>";
            exit;
        } else {
            echo "<script>alert('Gagal');</script>";
            echo "<script>window.location.replace('?halaman=tambah-kategori');</script>";
            exit;
        }
    }
?>