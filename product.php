    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <link href="css/cardProduct.css" rel="stylesheet" media="all">
    <link href="css/register.css" rel="stylesheet" media="all">


    <div class="page-wrapper font-robo row d-flex">
        <!-- <div class="col-md-3 col-sm-3">
        <div class="card-body">
            <h2 class="title fw-bold">Registration</h2>
            <h1>echo</h1>
        </div>
    </div> -->
        <div class="">
            <div class="row">
                <div class="col-md-10">
                    <h2 style="padding-left: 2%">All product</h2>
                </div>
                <div class="col-md-2">
                    <div class="input-group">
                        <div class="rs-select2 js-select-simple select--no-search">
                            <select name="gender">
                                <option disabled="disabled" value="2" selected>SORT BY</option>
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                            </select>
                            <div class="select-dropdown"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container py-2">
                <div class="row">
                    <?php
                    $c = new Connect();
                    $dblink = $c->connectToMySQL();
                    $sql = "SELECT * FROM product";

                    //<1>
                    $result = $dblink->query($sql);
                    $row1 = $result->fetch_row();
                    // $row1[5];
                    $result->data_seek(0);

                    if ($result->num_rows > 0) :
                        while ($row = $result->fetch_assoc()) :

                    ?>
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="product-grid">
                                    <div class="product-image">
                                        <a href="#" class="image">
                                            <img src="images/<?= $row['images'] ?>" class="card-img-top" alt="<?= $row['name'] ?>" />
                                        </a>
                                        <ul class="product-links">
                                            <li><a href="#"><i class="fa fa-search"></i></a></li>
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                        <a href="detail.php?id_pro = <?= $row['id'] ?>" class="add-to-cart fw-bold">Add to Cart</a>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="title"><a href="#"><?= $row['name'] ?></a></h3>
                                        <span class="product-color d-flex justify-content-center">
                                            <ul class="ul-color">
                                                <li><a href="" class="green-active"></a></li>
                                                <li><a href="" class="blue"></a></li>
                                                <li><a href="" class="yellow"></a></li>
                                            </ul>
                                        </span>
                                        <div class="price"><?= $row['price'] ?></div>
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
        </div>
    </div>
    </div>