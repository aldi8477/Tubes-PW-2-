<form method="POST">
    Nama Kategori : <input type="text" name="kategori">
    <input type="submit" name="btn-simpan" value="Tambah">

</form>

<?php
    if (isset($_POST['btn-simpan'])) {
        $sql = "INSERT INTO kategori (kategori) VALUES (:kategori)";
        $pdo_statement = $pdo->prepare($sql);

        $result = $pdo_statement->execute(array(':kategori'=>$_POST['kategori']));

        header("location:?halaman=kategori-pdo");
    }
?>