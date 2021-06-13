<fieldset>
    <a href="?page=tambah-sepatu">Tambah Data</a>
    <hr>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>nama</th>
                <th>kategori</th>
                <th>harga</th>
                <th>gambar</rth>
                <th>size</th>
                <th>stock</th>
                <th>komen</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $nomor = 0;
                $sql = "SELECT * FROM shoes LEFT join kategori on shoes.kategori=kategori.id_kategori ORDER BY kategori.id_kategori ASC";
                $result = $koneksi->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo ++$nomor; ?>.</td>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['kategori']; ?></td>
                            <td><?php echo $row['harga'] ?></td>
                            <td>
                                <img src="page/gambar/<?php echo $row['gambar']; ?>" width="100" alt="">
                            </td>
                            <td><?php echo $row['size'] ?></td>
                            <td><?php echo $row['stock'] ?></td>
                            <td><?php echo $row['komen'] ?></td>
                            <td>
                                <a href="?page=edit-data&id_shoes=<?php echo $row['id_shoes']; ?>"><button style="background-color:#6495ED; color:white;">Edit</button></a> &bull;
                                <form style="display: inline;" method="POST">
                                    <input type="hidden" name="id_shoes" value="<?php echo $row['id_shoes']; ?>">
                                    <button style="background-color:red; color:white;  " onclick="return confirm('Yakin ? Anda Ingin Menghapus Data Ini ?')" type="submit" name="btn-hapus">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='6'><b><i>Note : Data Tidak Ada</i></b></td></tr>";
                }
            ?>
        </tbody>
    </table>
</fieldset>

<?php
    if (isset($_POST['btn-hapus'])) {
        $id_shoes = $_POST['id_shoes'];

        $sql = mysqli_query($koneksi, "SELECT * FROM shoes WHERE id_shoes = $id_shoes");
        $data = $sql->fetch_array();
        $foto = $data['gambar'];
        
        if (file_exists("page/gambar/$foto")) {
            unlink("page/gambar/$foto");
        }

        $query = $koneksi->query("DELETE FROM shoes WHERE id_shoes = $id_shoes ");

        if ($query != 0) {
            echo "<script>alert('Berhasil');</script>";
            echo "<script>window.location.replace('?page=sepatu');</script>";
        } else {
            echo "<script>alert('Gagal');</script>";
            echo "<script>window.location.replace('?page=sepatu');</script>";
        }
    }
?>