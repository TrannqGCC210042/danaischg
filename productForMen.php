    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="css/cardProduct.css" rel="stylesheet" media="all">

    <!-- Title and Sort By -->
    <div class="page-wrapper font-robo row d-flex">
        <div class="">
            <div class="row">
                <div class="col-md-10">
                    <h2 style="padding-left: 2%">All product</h2>
                </div>
                <div class="col-md-2">
                    <div class="input-group">
                        <div class="rs-select2 js-select-simple select--no-search">
                            <select name="sort_by">
                                <option disabled="disabled" value="2" selected>SORT BY</option>
                                <option value="0">Men</option>
                                <option value="1">Women</option>
                                <option value="2">High to low</option>
                                <option value="3">Low to high</option>
                            </select>
                            <div class="select-dropdown"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product -->
            <div class="container py-2">
                <div class="row">
                    <?php
                    // Check the id exists or not.
                    if (isset($_GET['catForMenOrWomen']) == 0 && isset($_GET['catForGender']) == 0) :
                        $id = $_GET['id'];
                        echo "hello word";
                        // $c = new Connect();
                        // $dblink = $c->connectToPDO();

                        // $sql = "SELECT * FROM `product` WHERE id = ?";

                        // $stmt = $dblink->prepare($sql);
                        // $stmt->execute(array("$id"));

                        // if ($stmt->rowCount() > 0) :
                        //     $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        //     $pro_name = $row['name'];
                        // else :
                        //     header("Location: ?page=productManagement");
                        // endif;
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
                    else :
                        header("Location: ?page=supplier");
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>