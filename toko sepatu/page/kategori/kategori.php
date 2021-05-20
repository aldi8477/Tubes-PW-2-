<a href="?halaman=tambah-kategori"> Tambah Data</a>
<hr>
<table border="1" cellspacing="0" cellpadding="10">
    <thead>
        <tr>
            <th>no</th>
            <th>id_kategori</th>
            <th>nama_kategori</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $nomor = 0;
        $sql = "SELECT *FROM kategori ORDER BY nama_kategori ASC";
        $result = $object->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assocs()) {
                ?>
                <tr>
                    <td><?php echo ++$no; ?> .</td>
                    <td><?php echo $row['kategori']; ?></td>
                    <td>
                        <a href="?halaman=edit-kategori"></a>
                        <form method="POST" style="display">
                            <input type="hidden" name="">
                            <button type="submit" name="">
                            Hapus
                            </button>
                        </form>
                    </td>
                </tr>
    <?php
    }
    else {
            echo "<tr><td colspan='3' align='center'><b><i>Data Tidak Ada</i></b></td></tr>";
        }
    ?>
    </tbody>
</table>