<?php

//proses pencarian
$keyword=$_GET['keyword'];
if(!empty($keyword)) $x=" WHERE name LIKE '%$keyword%'";

//tampilkan perkatagori
$kategori=$_GET['kategori'];

if(!empty($kategori)) $q=" WHERE kategori =$kategori";

//difinisikan query
$sql= "SELECT * FROM shoes ORDER BY id_shoes  DESC ";
$rs = $dbh->query($sql);
?>
<h1> Products</h1>

<?php
while ($r = $rs->fetch(PDO::FETCH_ASSOC)) {
$rp=$r['harga'];    
echo '<div class="product_box">
        <h3>'.$r['nama'].'</h3>
     <a href="#"><img src="../../shoes-store-master/Dashboard1/page/gambar/'.$r['gambar'].'" width="100" /></a>
     <br> <a href="index.php?hal=checkout" class="btn btn-primary">Beli</a> 
     <p class="product_harga">Rp. '.number_format($rp,2,',','.');
echo '</p>
     <p> '.$r['comment'].'</p>';
        if(!empty($_SESSION['MEMBER'])){ //sesion start
        echo '<a href="index.php?hal=newproduct&idedit='.$r['id_shoes'].'">Edit</a>';
        } // sesion finish
echo '</div>';  
}
?>