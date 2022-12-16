<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Writing by Vietnamese -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- The size of brower = 100% -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dana.ischg Store</title>
    <link rel="icon" href="images/icon.png" />
    <!-- bootstrap 5 cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>

<body>
    <?php
    include_once 'connect.php';
    include_once 'header.php';

    if (isset($_GET['page'])) :
        $page = $_GET['page'];

        // Login & Register
        if ($page == "register") :
            include_once 'register.php';
        elseif ($page == "login") :
            include_once 'login.php';
        elseif ($page == "logout") :
            include_once 'logout.php';
        // Home
        elseif ($page == "product") :
            include_once 'allProduct.php';

        // Admin page
        elseif ($page == "order") :
            include_once 'admin/order/order.php';

        // Manament category
        elseif ($page == "category") :
            include_once 'admin/category/list.php';
        elseif ($page == "addCategory") :
            include_once 'admin/category/add.php';
        elseif ($page == "updateCategory") :
            include_once 'admin/category/update.php';

        // Manament supplier
        elseif ($page == "supplier") :
            include_once 'admin/supplier/list.php';
        elseif ($page == "addSupplier") :
            include_once 'admin/supplier/add.php';
        elseif ($page == "updateSupplier") :
            include_once 'admin/supplier/update.php';

        // Manament product
        elseif ($page == "productManagement") :
            include_once 'admin/product/list.php';
        elseif ($page == "addProduct") :
            include_once 'admin/product/add.php';
        elseif ($page == "updateProduct") :
            include_once 'admin/product/update.php';
        elseif ($page == "productImages") :
            include_once 'admin/product/pro_images.php';

        // Manament orderDetail
        elseif ($page == "orderDetail") :
            include_once 'admin/orderDetail/list.php';
        elseif ($page == "addOrderDetail") :
            include_once 'admin/orderDetail/add.php';
        elseif ($page == "updateOrderDetail") :
            include_once 'admin/orderDetail/update.php';
        // shoppingcart
        elseif ($page == "shoppingcart") :
            include_once 'shoppingCart.php';
        // shoppingcart
        elseif ($page == "productForMen") :
            include_once 'productForMen.php';
        // shoppingcart
        elseif ($page == "cartDetail") :
            include_once 'cartDetail.php';

        endif;
    else :
        include_once 'home.php';
    endif;

    // include_once 'productCart.php';
    include_once 'footer.php';

    ?>


    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
</body>

</html>