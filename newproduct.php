<?php
//proses
//tangkap request dari link edit (idedit)
$idedit = $_GET['idedit'];
$id[] = $idedit; //simpan data array
if(!empty($idedit))//modus mengedit data lama  
{
        $qe = "SELECT * FROM shoes WHERE id_kategori = ?";
        //PDO
        $ps = $dbh->prepare($qe);
        $ps->execute($id_kategori);
        $row = $ps->fetch(); //ambil satu baris data
}
 else { //modus entry data baru from dalam keadaan kosong
     $row = array(); //tidak ada data lama yang diedit
}
?>

<form method="POST" name="newproduct" action="process_newproduct.php">
    <table align="left" cellpadding="10" width="400">
        <thead>
            <tr><th colspan ="2" align="left"><h1>Produk Baru</h1></th></tr>
        </thead>
        <tfoot>
            <tr><th colspan ="2" align="left">
                    
                <?php
                if(empty($idedit)){  //modus entry data baru
                ?>
                <input class="button" type="submit" name="proses" value="Save" />&nbsp;
                <?php
                } 
                else { //modus data lama
                ?>
                <input class="button" type="submit" name="proses" value="Edit" />&nbsp;
                <input class="button" type="submit" name="proses" value="Remove"
                       onclick ="return confirm ('Anda Yakin Ingin Menghapus Data ...??')"/>
                <input type="hidden" name="idx" value="<?php echo $idedit;?>" />
                <?php
                }
                ?>                
                <input class="button" type="submit" name="proses" value="Cancel" />
                
            </th></tr>
        </tfoot>
        <tbody>
            <tr>
                <td> Nama </td>
                <td>
                    <input type="text" value="<?php echo $row['name'];?>" name="name" size="30" />
                </td>
            </tr>
            
            <tr>
                <td> Kategori</td>
                <td>
                    
<?php
//tampilkan data katagori
$qd = "SELECT * FROM kategori ORDER BY name";
//PDO mengeksekusi query dan mengambil seluruh baris hasil eksekusi query
$rd = $dbh->query($qd);

                        echo '<select nama="kategori">
                        <option value="">-- Select Category --</option>';
                        foreach ($rd as $data){
                        //edit divisi
                        if($data ['id_kategori'] == $row['kategori']) $c = 'selected';
                        else $c ='';
                            echo '<option value="'.$data['id_shoes'].'"'.$c.'>'.$data['nama'].'</option>';
                        }                        
                        ?>                    
                    </select>
                </td>
            </tr>
            
            <tr>
                <td> Harga </td>
                <td>
                    <input type="text" value="<?php echo $row['harga'];?>" nama="harga" size="30" />
                </td>
            </tr>
            
            <tr>
                <td> Gambar </td>
                <td>
                    <input type="text" value="<?php echo $row['gambar'];?>" nama="gambar" size="30" />                  
                </td>
            </tr>
            
            <tr>
                <td> Ukuran </td>
                <td>
                    <input type="text" value="<?php echo $row['size'];?>" nama="size" size="30" />
                </td>
            </tr>
            <tr>
                <td> Stock </td>
                <td>
                    <input type="text" value="<?php echo $row['stock'];?>" name="stock" size="30" />
                </td>
            </tr>
            
            <tr>
                <td valign="top"> komentar </td>
                <td>
                     <textarea nama="komen" cols="30" row="7" ><?php echo $row['komen'];?></textarea>
                </td>
            </tr>
              
        </tbody>
    </table>
</form>
