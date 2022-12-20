<link href="css/cardProduct.css" rel="stylesheet" media="all">

<section>
    <img class="imageCenter" src="images/Poster_header.jpg" alt="Images Danaischg Store" />
</section>
</body>

<hr />
<section>
    <h4 class="attentive ms-3">Best seller</h4>
    <div class="container py-4">
        <div class="row">
            <?php
            $c = new Connect();
            $dblink = $c->connectToMySQL();

            $sql = "SELECT * FROM `product` LIMIT 4;";
            $stmt = $dblink->query($sql);

            while ($row = $stmt->fetch_assoc()) :
            ?>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="product-grid">
                        <div class="product-image">
                            <a href="?page=cartDetail&pro_id=<?= $row['id'] ?>" class="image">
                                <img src="images/<?= $row['image'] ?>">
                            </a>
                            <ul class="product-links">
                                <li><a href="#"><i class="fa fa-search"></i></a></li>
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                            <form action="?page=shoppingcart" method="POST">
                                <input type="hidden" name="pro_id" value="<?= $row['id'] ?>">
                                <input type="hidden" name="pro_quantity" value="1" />
                                <input type="submit" class="add-to-cart fw-bold" name="btn_AddtoCart" value="Add to Cart" />
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
            ?>
        </div>
    </div>
</section>

<hr />
<section>
    <h4 class="attentive ms-3">Products</h4>
    <div class="container py-4">
        <div class="row">
            <?php
            $c = new Connect();
            $dblink = $c->connectToMySQL();

            $sql = "SELECT * FROM `product` LIMIT 4;";
            $stmt = $dblink->query($sql);

            while ($row = $stmt->fetch_assoc()) :
            ?>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="product-grid">
                        <div class="product-image">
                            <a href="#" class="image">
                                <img src="images/<?= $row['image'] ?>">
                            </a>
                            <!-- <span class="product-discount-label">-23%</span> -->
                            <ul class="product-links">
                                <li><a href="#"><i class="fa fa-search"></i></a></li>
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                            <form action="?page=shoppingcart" method="POST">
                                <input type="hidden" name="pro_id" value="<?= $row['id'] ?>">
                                <input type="hidden" name="pro_quantity" value="1" />
                                <input type="submit" class="add-to-cart fw-bold" name="btn_AddtoCart" value="Add to Cart" />
                            </form>
                        </div>
                        <div class="product-content">
                            <h3 class="title"><a href="?page=<?php ?>"><?= $row['name'] ?></a></h3>
                            <div class="price">$<?= $row['price'] ?></span></div>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
            ?>
        </div>
    </div>
    <style>
        .btn-see-more {
            line-height: 40px;
            display: inline-block;
            padding: 0 25px;
            cursor: pointer;
            -o-transition: all 0.4s ease;
            -moz-transition: all 0.4s ease;
            transition: all 0.4s ease;
            color: black;


        }

        .btn-radius {
            border: none;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }

        .btn-see-more:hover {
            background: black;
            color: white;
        }
    </style>
    <div class="text-center">
        <a href="?page=product" class="btn-see-more btn-radius text-center"> See More</a>
    </div>
</section>