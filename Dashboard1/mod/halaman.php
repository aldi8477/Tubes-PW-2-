<?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = "dashboard";
    }
?>

<?php

    switch ($page) {
        case 'dashboard':
            include 'page/dashboard.php';
            break;

        // sepatu
        case 'sepatu':
            include 'page/sepatu/list.php';
            break;
        
        case 'tambah-sepatu':
            include 'page/sepatu/tambah.php';
            break;

        case 'edit-data':
            include 'page/sepatu/edit_data.php';
            break;

            case 'edit-data':
                include 'page/sepatu/edit_data.php';
                break;
        // end
        //kategori
        case 'kategori':
            include 'page/kategori/data.php';
            break;

        case 'tambah-kategori':
             include 'page/tambah-kategori.php';
             break;
        
         case 'edit-kategori':
            include 'page/edit-kategori.php';
            break;

            case 'logout':
            include 'page/login/logout.php';
            break;

        case 'customer':
            include 'page/customer/data_customer.php';
            break;
       
        // end
        
        default:
            echo "404 Not Found";
            break;
    }

?>