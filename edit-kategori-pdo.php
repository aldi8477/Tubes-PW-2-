<?php
    $id_ketegori = $_GET['id_ketegori'];
    $statement = $pdo->prepare("SELECT * FROM kategori WHERE id_ketegori = $id_ketegori");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {

    }
?>
<form method="POST">
    <input type="hidden" name="id_ketegori" value="<?php echo $row['id_ketegori']; ?>">
    Nama Kategori : <input type="text" name="kategori" value="<?php echo $row['kategori']; ?>">
    <input type="submit" name="btn-ubah" value="Tambah">

</form>

<?php
    if (isset($_POST['btn-ubah'])) {
        $id_ketegori = $_POST['id_ketegori'];
        $kategori = $_POST['kategori'];
        $pdo_statement = $pdo->prepare("UPDATE kategori SET kategori = '$kategori' WHERE id_ketegori = $id_ketegori");
        $result = $pdo_statement->execute();

        echo "<script>window.location.replace('?halaman=kategori-pdo');</script>";
    }
?>