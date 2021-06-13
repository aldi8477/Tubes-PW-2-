    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
            <div class="sidebar_box"><span class="bottom"></span>
            
        <!-- sesion start -->        
        <?php 
        if(empty($_SESSION['MEMBER'])){
         ?>
            	<!-- <h3>Login</h3>   
                <div class="content"> 
                    <form action="process_login.php" method="POST">
                        <label>Username</label><br/>
                            <input type="text" name="user" value="username" size="15" onFocus="this.value=''"/><br/>
                        <label>Password</label><br/>
                            <input type="password" name="pass" size="15" value="12345" onFocus="this.value=''"/><br/>
                            
                            <input type="submit" class="button" name="proses" value="Login"/>
                    </form>
                </div> -->
                
        <?php } ?>
        <!-- sesion finish -->
                
            </div> 
<?php
//proses
//tangkap request dari link edit (idedit)
$ideditcat = $_GET['ideditcat'];
if(!empty($ideditcat))//modus mengedit data lama  
{
        $ed = "SELECT * FROM kategori WHERE id_kategori = ?";
        //PDO
        $ca = $dbh->prepare($ed);
        $ca->execute(array($ideditcat));
        $cat = $ca->fetch(); //ambil satu baris data
}
 else { //modus entry data baru from dalam keadaan kosong
     $cat = array(); //tidak ada data lama yang diedit
}


$sql= "SELECT * FROM kategori ORDER BY nama_kategori";
$rs = $dbh->query($sql);

?>
            
            <div class="sidebar_box"><span class="bottom"></span>
            	<h3>Kategori</h3>   
                <div class="content"> 
                    <ul class="sidebar_list">
                        <?php
                        foreach ($rs as $ro) {
                        echo '<li><a href="index.php?hal=products&cat='.$ro['id_kategori'].'">'.$ro['nama_kategori'].'</a> &nbsp; &nbsp; &nbsp;';
        
        if(!empty($_SESSION['MEMBER'])){
        echo
                        '<a href="index.php?ideditcat='.$ro['id_kategori'].'"><img src="images/edit.png" width="20"/></a>
                              </li>';
        
                        } // tutup sesion
                        }
                        ?>
                        <li class="last"></li>
                    </ul>
                </div>
            </div>
            <div class="sidebar_box"><span class="bottom"></span>
        <?php 
        if(!empty($_SESSION['MEMBER'])){
         ?>
            	<h3>Input Kategori</h3>   
                <div class="content"> 
                     <form action="process_category.php" method="POST">			
                        <p>			
                        <label>Kategori</label>
                            <input name="nama_kategori" value="<?php echo $cat['nama_kategori'];?>" type="text" size="15" />
                            <br/><br/>	
                            
                            <?php
                            if(empty($ideditcat)){  //modus entry data baru
                            ?>
                            <input class="button" type="submit" name="proses" value="Input" />&nbsp;
                            <?php
                            } 
                            else { //modus data lama
                            ?>
                            <input class="button" type="submit" name="proses" value="Edit" />&nbsp;
                            <input class="button" type="submit" name="proses" value="Remove"/>
                            <input type="hidden" name="idcat" value="<?php echo $ideditcat;?>" />
                            <?php
                            }
                            ?>                
                            <input class="button" type="submit" name="proses" value="Cancel" />
                            
                            
                        </p>		
                    </form>	
                </div>
              <?php } ?>                
            </div>
        </div>
        