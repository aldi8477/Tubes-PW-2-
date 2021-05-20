<?php
    include 'config/koneksi.php';
    $no = 0;
    $query = $pdo->prepare("SELECT * FROM kategori");
    $query->execute();
    $data = $query->fetchAll();
?>
<a href="?halaman=tambah-kategori-pdo">Tambah Data</a>
<hr>
<table border="1" cellpadding="10" cellspacing="0">
  <tr>
    <td>No</td>
    <td>Nama Kategori</td>
    <td>Aksi</td></tr>
            <?php foreach ($data as $value): ?>
                <tr>
                    <td><?php echo ++$no;?>.</td>
                    <td><?php echo $value['kategori'] ?></td>
                    <td>
                        <a href="?halaman=edit-pdo&id_ketegori=<?php echo $value['id_ketegori']; ?>">Edit</a> &bull;
                        <form style="display: inline;" method="POST">
                            <input type="hidden" name="id_ketegori" value="<?php echo $value['id_ketegori']; ?>">
                            <button type="submit" name="btn-hapus">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
 </td>
  </tr>
<?php endforeach; ?>
</table>

<?php
    if (isset($_POST['btn-hapus'])) {
        $id_ketegori = $_POST['id_ketegori'];
        $pdo_statement=$pdo->prepare("delete from kategori where id_ketegori = $id_ketegori ");
        $pdo_statement->execute();

        echo "<script>window.location.replace('?halaman=kategori-pdo');</script>";
        
    }
?>