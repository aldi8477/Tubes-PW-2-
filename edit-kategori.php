<?php
    $id_ketegori = $_GET['id_ketegori'];

    $sql = "SELECT * FROM kategori WHERE id_ketegori = $id_ketegori";

    $result = $mysqli_object->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id_ketegori = $row['id_ketegori'];
            $nama_kategori = $row['kategori'];
        }
    }
?>
<form method="POST">
    <input type="hidden" name="id_ketegori" value="<?php echo $id_ketegori; ?>">
    Nama Kategori : <input type="text" name="kategori" value="<?php echo $nama_kategori; ?>">
    <input type="submit" name="btn-ubah" value="Simpan">

</form>

<?php
    if (isset($_POST['btn-ubah'])) {
        $id_ketegori = $_POST['id_ketegori'];
        $nama_kategori = $_POST['kategori'];

        $sql = "UPDATE kategori SET kategori = '$nama_kategori' WHERE id_ketegori = $id_ketegori ";

        if ($mysqli_object->query($sql) === TRUE) {
            echo "<script>alert('Berhasil');</script>";
            echo "<script>window.location.replace('?halaman=kategori');</script>";
            exit;
        } else {
            echo "<script>alert('Gagal');</script>";
            echo "<script>window.location.replace('?halaman=kategori');</script>";
            exit;
        }
    }
?>