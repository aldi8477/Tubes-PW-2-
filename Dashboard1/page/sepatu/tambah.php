
    <fieldset>
        <legend>
            <a href="tambah.php">+ tambah data</a>
        </legend>
            <form method="POST" enctype="multipart/form-data">
                <table>
                    <thead>
                    <tr>
                        <td>Kategori</td>
                        <td>:</td>
                        <td>
                            <select name="kategori">
                                <option value=""> - Pilih -</option>
                                <?php
                                    $query = $koneksi->query("SELECT * FROM kategori");
                                ?>
                                <?php foreach ($query as $qr) : ?>
                                    <option value="<?php echo $qr['id_kategori'] ?>">
                                        <?php echo $qr['nama_kategori']; ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>nama</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="nama" >
                    </tr>
                    <tr>
                        <td>harga</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="harga"  >
                        </td>
                    </tr>
                    
                    <tr>
                        <td>gambar</td>
                        <td>:</td>
                        <td>
                            <input type="file" name="gambar">
                        </td>
                    </tr>
                    <tr>
                        <td>size</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="size">
                        </td>
                    </tr>
                    
                    <tr>
                        <td>stock</td>
                        <td>:</td>
                        <td>
                            <input type="number" name="stock">
                        </td>
                    </tr>
                    <tr>
                        <td>komen</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="komen">
                        </td>
                    <tr>
                    
                    
                    <tr>
                        <td colspan="3">
                            <button name="btn-tambah">
                            Tambah Data
                            </button>
                        </td>
                    </tr>
                </table>
            </form>
    </fieldset>
    <?php
    if (isset($_POST["btn-tambah"])){
   
        $kategori = $_POST['kategori'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $size = $_POST['size'];
        $stock = $_POST['stock'];
        $komen = $_POST['komen'];


        $namafile = $_FILES["gambar"]["name"];
        $ukuranfile = $_FILES["gambar"]["size"];
        $error = $_FILES["gambar"]["error"];
        $tmpname = $_FILES["gambar"]["tmp_name"];

        if($error == 4) { //4 adalah jumlah dari error
            echo "<script>alert('pilih gambar dahulu');</script>";
            echo "<sript>window.location.replace('?page=tambah-sepatu');</script>";
            exit;
            }
        
            $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
            $ekstensiGambar = explode('.', $namafile);
            $ekstensiGambar = strtolower(end($ekstensiGambar));
        
            if (!in_array($ekstensiGambar, $ekstensiGambarValid)){
                echo "<script>alert('Bukan Gambar');</script>";
                echo "<script>window.location.replace('?page=tambah-sepatu');</script>";
                exit;
            }
        
            if ($ukuranfile > 1000000) {
                echo "<script>alert('Ukuran Terlalu Besar');</script>";
                echo "<sript>window.location.replace('?page=tambah-sepatu');</script>";
            }
        
           
            $namafilebaru = uniqid();
            $namafilebaru .= '.';
            $namafilebaru .= $ekstensiGambar;
            
            move_uploaded_file($tmpname, 'page/gambar/' . $namafilebaru);
        
            $sql = $koneksi->query("INSERT INTO shoes VALUES('','$nama','$kategori','$harga','$namafilebaru', '$size', '$stock', '$komen')");
        
            if ($sql != 0) {
                echo "<script>alert('Berhasil');</script>";
                echo "<script>window.location.replace('?page=sepatu');</script>";
            } else {
                echo "<script>alert('gagal');</script>";
                //echo "<script>window.location.replace('?page=sepatu');</script>";
            }
    }
?>