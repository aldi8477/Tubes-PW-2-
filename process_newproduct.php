<?php

include_once 'dbconection.php';

tangkap request dari form (nama element formnya)
simpan ke variabel
$nama = $_POST['nama'];
$kategori= $_POST['kategori'];
$harga = $_POST['harga'];
$gambar = $_POST['gambar'];
$size = $_POST['size'];
$stock = $_POST['stock'];
$komen  = $_POST['komen'];


//simpan ke data array
$data[] = $nama; // ? 1
$data[] = $kategori; // ? 2
$data[] = $harga; // ? 3
$data[] = $gambar; // ? 4
$data[] = $size; // ? 5
$data[] = $stock; // ? 6
$data[] = $komen; // ? 7

//proses
$tombol = $_POST['proses'];
        if($tombol == 'Save'){
         // jika diklik tombol simpan
         $sql="INSERT INTO shoes (nama, kategori, harga, gambar, size, stock, komen)
             VALUES (?,?,?,?,?,?,?)";
        }
        elseif ($tombol == 'Edit'){
         //tangkap hidden field idx
         $data[] = $_POST['idx']; // ? ke -7 u/ id
            
         //jika diklik tombol ubah
            $sql = "UPDATE shoes SET
            nama=?,kategori=?,harga=?,gambar=?,
            size=?,stock=?,komen=?
            WHERE id_shoes=?";
        }
        elseif ($tombol == 'Remove'){
         //hapus ke 11 ? di atas
         unset($data);
         //tangkap hidden field idx
         $data[] = $_POST['idx']; // ? ke -1 u/ id
         //jika diklik tombol hapus
            $sql = "DELETE FROM shoes WHERE id_kategori=?";
        }
        else{
         //batal proses dan kembalikan ke halaman pertama
         header('location:index.php?hal=home');
        }
        
                 
            //PDO
            //prepare statement query
            $ps = $dbh->prepare($sql); //siapkan query
            $ps->execute($data);

            //setelah selesai proses kembalikan ke halaman pegawai
            header('location:index.php?hal=products');
?>