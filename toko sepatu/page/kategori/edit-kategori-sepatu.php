<?php
    $id_ketegori = $_GET['id_ketegori'];

    $sql = "SELECT * FROM kategori WHERE id_ketegori = $id_ketegori";

    $result = mysqli_query($mysqli_procedur, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
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

        if (mysqli_query($mysqli_procedur, $sql)) {
            echo "<script>alert('Berhasil');</script>";
            echo "<script>window.location.replace('?halaman=kategori-prosedur');</script>";
            exit;
        } else {
            echo "<script>alert('Gagal');</script>";
            echo "<script>window.location.replace('?halaman=kategori-prosedur');</script>";
            exit;
        }
    }
?>