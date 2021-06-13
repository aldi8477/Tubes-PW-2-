<?php

include_once 'dbconection.php';

//tangkap request dari form (name element formnya)
//simpan ke variabel
$nama = $_POST['nama'];

//simpan ke data array
$data[] = $nama; // ?

//proses
$tombol = $_POST['proses'];
        if($tombol == 'Input'){
         // jika diklik tombol simpan
        $sql="INSERT INTO kategori (name) VALUES (?)";

        }
        elseif ($tombol == 'Edit'){
         //tangkap hidden field idcat
         $data[] = $_POST['idcat']; 
            
         //jika diklik tombol ubah
            $sql = "UPDATE kategori SET
            name=? WHERE id_kategori=?";
        }
        elseif ($tombol == 'Remove'){
         //hapus
         unset($data);
         //tangkap hidden field idcat
         $data[] = $_POST['id_kategori']; // ? u/ id
         //jika diklik tombol hapus
            $sql = "DELETE FROM kategori WHERE id_kategori=?";
        }
        else{
         //batal proses dan kembalikan ke halaman pertama
         header('location:index.php?hal=home');
        }

//PDO
//prepare statement query
$ps = $dbh->prepare($sql); //siapkan query
$ps->execute($data);

//setelah selesai proses kembalikan ke halaman katagori
header('location:index.php');
?>