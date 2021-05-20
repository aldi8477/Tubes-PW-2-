<a href="?halaman=tambah-kategori-prosedur"> Tambah Data</a>
<hr>
<table border="1" cellspacing="0" cellpadding="10">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $no = 0;
            $sql = "SELECT * FROM kategori";
            $result = mysqli_query($mysqli_procedur, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo ++$no; ?>.</td>
                        <td><?php echo $row['kategori']; ?></td>
                        <td>
                            <a href="?halaman=edit-kategori-procedur&id_ketegori=<?php echo $row['id_ketegori']; ?>">Edit</a> &bull;
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="id_ketegori" value="<?php echo $row['id_ketegori']; ?>">
                                <button type="submit" name="btn-hapus">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='3'>Data Tidak Ada</td></tr>";
            }
        ?>
    </tbody>
</table>

<?php

    if (isset($_POST['btn-hapus'])) {
        $id_ketegori = $_POST['id_ketegori'];

        $sql = "DELETE FROM kategori WHERE id_ketegori = $id_ketegori";

        if (mysqli_query($mysqli_procedur, $sql)) {
            echo "<script>alert('Data Berhasil di Hapus');</script>";
            exit;
        } else {
            echo "<script>alert('Data Gagal di Hapus');</script>";
            exit;
        }
    }

?>