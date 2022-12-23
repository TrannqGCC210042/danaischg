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
                            <select name="sort_by" onchange="location = this.value;">
                                <option disabled="disabled" value="2" selected>SORT BY</option>
                                <option value="?page=product&sort_by=name&order=ASC">A -> Z</option>
                                <option value="?page=product&sort_by=name&order=DESC">Z -> A</option>
                                <option value="?page=product&sort_by=price&order=ASC">Low to high</option>
                                <option value="?page=product&sort_by=price&order=DESC">High to low</option>
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
                    $c = new Connect();
                    $dblink = $c->connectToMySQL();
                    // Sort by gender
                    if (isset($_GET['id']) && isset($_GET['gender'])) :
                        if ($_GET['gender'] == 0) :
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM `product` p JOIN `category` c ON p.cate_id = c.id AND p.for_gender = 0 AND c.id = '$id'";
                        else :
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM `product` p JOIN `category` c ON p.cate_id = c.id AND p.for_gender = 1 AND c.id = '$id'";
                        endif;
                    // Sort by name or price
                    elseif (isset($_GET['sort_by'])) :
                        if ($_GET['sort_by'] == "name") :
                            if ($_GET['order'] == "ASC") : //name
                                $sql = "SELECT * FROM `product` ORDER BY name";
                            else :
                                $sql = "SELECT * FROM `product` ORDER BY name DESC";
                            endif;
                        else :
                            if ($_GET['order'] == "ASC") : //price
                                $sql = "SELECT * FROM `product` ORDER BY price";
                            else :
                                $sql = "SELECT * FROM `product` ORDER BY price DESC";
                            endif;
                        endif;
                    // Search
                    elseif (isset($_POST['btnSearch'])) :
                        $searchValue = $_POST['searchValue'];
                        $keyword = explode(' ', $searchValue);
                        $searchTermByKeyword = array();

                        foreach ($keyword as $word) :
                            $searchTermByKeyword[] = "name LIKE '%$word%'";
                        endforeach;

                        $sql = "SELECT * FROM `product` WHERE " . implode('AND ', $searchTermByKeyword);
                    else :
                        $sql = "SELECT * FROM product";
                    endif;

                    $result = $dblink->query($sql);

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
                                            <input type="hidden" name="pro_quantity" value="1" />
                                            <input type="submit" class="add-to-cart fw-bold" name="btn_AddtoCart" value="Add to Cart" />
                                        </form>

                                    </div>
                                    <div class="product-content">
                                        <h3 class="title"><a href="?page=cartDetail&pro_id=<?= $row['id'] ?>"><?= $row['name'] ?></a></h3>
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
        </div>
    </div>