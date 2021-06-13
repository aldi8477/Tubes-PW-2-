<?php
    $id_shoes = $_GET['id_shoes'];
    $sql = "SELECT * FROM shoes WHERE id_shoes = $id_shoes";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id_shoes = $row['id_shoes'];
            $nama = $row['nama'];
            $kategori = $row['kategori'];
            $harga = $row['harga'];
            $size = $row['size'];
            $stock = $row['stock'];
            $komen = $row['komen'];
            $id_shoes = $row['id_shoes'];
            $gambar = $row['gambar'];
        }
    } else {
        echo "Data Tidak ada";
    }
?>
<fieldset>
    <legend>Ubah Data</legend>
    <form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_shoes" value="<?php echo $id_shoes; ?>">
        <input type="hidden" name="gambar_lama" value="<?php echo $gambar; ?>">
        
                <table>
                    <thead>
                    <tr>
                        <td>Kategori</td>
                        <td>:</td>
                        <td>
                            <select name="id_kategori">
                                <option value=""> - Pilih -</option>
                                <?php
                                    $query = $koneksi->query("SELECT * FROM kategori");
                                ?>
                                <?php foreach ($query as $qr) : ?>
                                    <?php if ($kategori == $qr['kategori']) : ?>
                                        <option value="<?php echo $qr['kategori'] ?>" selected>
                                            <?php echo $qr['kategori'] ?>
                                        </option>
                                    <?php else : ?>
                                        <option value="<?php echo $qr['nama_kategori'] ?>">
                                            <?php echo $qr['nama_kategori'] ?>
                                        </option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>nama</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="nama" value="<?php echo $nama; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>harga</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="harga" value="<?php echo $harga; ?>" >
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Gambar</td>
                        <td>:</td>
                        <td>
                            <img width="100" src="page/gambar/<?php echo $gambar; ?>" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td>gambar</td>
                        <td>:</td>
                        <td>
                            <input type="file" name="gambar" value="<?php echo $gambar; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>size</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="size" value="<?php echo $size; ?>">
                        </td>
                    </tr>
                    
                    <tr>
                        <td>stock</td>
                        <td>:</td>
                        <td>
                            <input type="number" name="stock" value="<?php echo $stock; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>komen</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="komen" value="<?php echo $komen; ?>">
                        </td>
                    </tr>
                    <tr>
                    <tr>
                    <tr>
                    <tr>
                        <td colspan="3">
                            <button name="btn-simpan">
                            ubah
                            </button>
                        </td>
                    </tr>
                </table>
            </form>
</fieldset>

<?php
    
    if (isset($_POST['btn-simpan'])) {
        $id_shoes = $_POST['id_shoes'];

        $sql = $koneksi->query("SELECT * FROM shoes WHERE id_shoes = $id_shoes ");
        $data = $sql->fetch_array();
        echo $fotoBarang = $data['gambar'];
        
    //$id_shoes = $_POST['id_shoes'];
        $nama = $_POST['nama'];
        $gambar_lama = $_POST['gambar_lama'];
        $kategori = $_POST['kategori'];
        $harga = $_POST['harga'];
        $size = $_POST['size'];
        $stock = $_POST['stock'];
        $komen = $_POST['komen'];
       
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambar_lama;
    } else {
            
        if ($fotoBarang != NULL) {
            if (file_exists("page/gambar/$gambar_lama")) {
                unlink("page/gambar/$gambar_lama");
            }
        }

        $namafile = $_FILES['gambar']['name'];
        $ukuranfile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpname = $_FILES['gambar']['tmp_name'];

        if ($error == 4) { // 4 adalah jumlah dari error
            echo "<script>alert('Pilih Gambar Dahulu');</script>";
            echo "<script>window.location.replace('?page=barang');</script>";
            exit;
        }

        $ekstensiGambarValid = ['jpg','jpeg','png'];
        $ekstensiGambar = explode('.', $namafile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>alert('Bukan Gambar');</script>";
        }
        if ($ukuranfile > 1000000) {
            echo "<script>alert('Ukuran Terlalu besar');</script>";
            echo "<script>window.location.replace('?page=sepatu');</script>";
            exit;
        }

        // gambar siap di upload
        // generate nama gambar baru
        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $ekstensiGambar;

        
    }

    if (!empty($tmpname)) {
        move_uploaded_file($tmpname, 'page/gambar/' . $namafilebaru);
        $query = $koneksi->query("UPDATE shoes SET nama = '$nama', gambar = '$namafilebaru', kategori = '$kategori', harga = '$harga', size = '$size', stock = '$stock', komen = '$komen' WHERE id_shoes = '$id_shoes' ");
    } else {
        $query = $koneksi->query("UPDATE shoes SET nama = '$nama', kategori = '$kategori', harga = '$harga', size = '$size', stock = '$stock', komen = '$komen' WHERE id_shoes = '$id_shoes' ");
    }

    
    if ($query != 0) {
        echo "<script>alert('Berhasil');</script>";
        echo "<script>window.location.replace('?page=sepatu');</script>";
    } else {
        echo "<script>alert('Gagal');</script>";
        // echo "<script>window.location.replace('?page=sepatu');</script>";
    }
    
}

?>