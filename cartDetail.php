<!-- Favicon-->
<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
<!-- Bootstrap icons-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

<!-- Vendor CSS-->
<link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
<link href="css/cardProduct.css" rel="stylesheet" media="all">

<!-- Product detail-->
<?php
// Check the id exists on URL or not.
if (isset($_GET['pro_id'])) :
    $pro_id = $_GET['pro_id'];

    $c = new Connect();
    $dblink = $c->connectToPDO();

    $sql = "SELECT * FROM `product` WHERE id = ?";

    $stmt = $dblink->prepare($sql);
    $stmt->execute(array("$pro_id"));

    // Check the id exists in DB or not.
    if ($stmt->rowCount() > 0) :
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    else :
        header("Location: ?page=product");
    endif;

?>
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6 pe-5"><img class="card-img-top mb-5 mb-md-0" src="images/<?= $row['image'] ?>" alt="..." /></div>
            <div class="col-md-6 pe-0 ps-5">
                <h1 class="display-4 fw-bolder"><?= $row['name'] ?></h1>
                <div class="fs-5 mb-5">
                    <span class="text-decoration-line-through">$<?= $row['price'] ?></span>
                    <span>$<?= $row['price'] ?></span>
                </div>
                <p class="lead"><?= $row['description'] ?></p>
                <div class="d-flex">
                    <input class="form-control text-center me-3" id="inputQuantity" type="number" value="1" style="max-width: 4rem" />
                    <button class="btn btn-outline-dark flex-shrink-0" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php
endif;
?>
<!-- Related items-->
<section>
    <div class="container px-4 px-lg-5">

        <h2 class="fw-bolder mb-4">Other products</h2>
        <div class="row">
            <?php
            $c = new Connect();
            $dblink = $c->connectToMySQL();
            $sql = "SELECT * FROM `product` LIMIT 4";

            //<1>
            $result = $dblink->query($sql);
            $row1 = $result->fetch_row();
            // $row1[5];
            $result->data_seek(0);

            if ($result->num_rows > 0) :
                while ($row = $result->fetch_assoc()) :

            ?>
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="?page=cartDetail&pro_id=<?= $row['id'] ?>" class="image">
                                    <img src="images/<?= $row['image'] ?>" class="card-img-top" alt="<?= $row['name'] ?>" />
                                </a>
                                <ul class="product-links">
                                    <li><a href="#"><i class="fa fa-search"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                                <form action="?page=shoppingcart" method="POST">
                                    <input type="hidden" name="pro_id" value="<?= $row['id'] ?>">

                                    <input type="submit" class="add-to-cart fw-bold" name="btnAddtoCart" value="Add to Cart" />
                                </form>

                            </div>
                            <div class="product-content">
                                <h3 class="title"><a href="#"><?= $row['name'] ?></a></h3>
                                <div class="price">$<?= $row['price'] ?></div>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
            else :
                echo "Product does not exist!";
            endif;
            ?>
        </div>

    </div>
</section>
<?php
if(isset($_GET['btnAddtoCart'])):
    $id = $_POST['id'];
    $name = $_POST['name'];
    $telephone = $_POST['telephone'];
    $address = $_POST['address'];

    $c = new Connect();
    $dblink = $c->connectToPDO();
    $sql = "INSERT INTO `supplier`(`id`, `name`, `phone`, `address`) VALUES (?, ?, ?, ?)";

    $result = $dblink->prepare($sql);
    $check = $result->execute(array("$id", "$name", "$telephone", "$address"));

    if ($check == true) :
        header("Location: ?page=supplier");
        else :
        echo "Failed!";
    endif;
endif;
?>