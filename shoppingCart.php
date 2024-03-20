<link href="css/shoppingCart.css" rel="stylesheet" media="all">

<script>
    // Function to check if the user wants to delete or not.
    function deleteConfirm() {
        if (confirm("Are you sure to delete!")) {
            return true;
        } else {
            return false;
        }
    }
</script>

<section class="py-2 h-100">
    <div class="container d-flex justify-content-center align-items-center h-100">
        <div class="card card-registration card-registration-2" style="border: none;">
            <div class="card-body p-0">
                <div class="row g-0">
                    <?php
                    if (isset($_POST['btn_AddtoCart'])) :
                        if (!isset($_SESSION['username'])) :
                            header("Location: ?page=login");
                        else :
                            $id = $_POST['pro_id'];
                            $user = $_SESSION['username'];
                            $qty = $_POST['pro_quantity'];

                            $c = new Connect();
                            $dblink = $c->connectToPDO();
                            $sql = "SELECT * FROM `cart` WHERE pid = ? AND username = ?";

                            $result = $dblink->prepare($sql);
                            $result->execute(array("$id", "$user"));
                            $row_cart = $result->fetch(PDO::FETCH_ASSOC);

                            echo $result->rowCount();
                            // Check the exists in Cart on DB or not.
                            if ($result->rowCount() > 0) :
                                $update_quantity = $row_cart['pcount'] + $qty;
                                $sql_updateQty = "UPDATE `cart` SET `pcount`= ? WHERE pid = ? AND username = ?";

                                $pro_qty = $dblink->prepare($sql_updateQty);
                                $pro_qty->execute(array($update_quantity, "$id", "$user"));

                            else :
                                $sql_insertToCart = "INSERT INTO `cart`( `username`, `pid`, `pcount`) VALUES (?, ?, ?)";

                                $result = $dblink->prepare($sql_insertToCart);
                                $result->execute(array("$user", "$id", $qty));
                            endif;
                            header("Location: ?page=shoppingcart");
                        endif;
                    endif;
                    ?>
                    <div class="col-lg-8">
                        <div class="p-5">
                            <div class="d-flex justify-content-between align-items-center mb-5">
                                <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                            </div>
                            <?php
                            $c = new Connect();
                            $dblink_display = $c->connectToPDO();

                            $user = $_SESSION['username'];

                            $sql_display = "SELECT p.id as pro_id, p.name as pro_name, p.price, p.image as pro_image, cat.name as cat_name, c.pcount as quantity 
                                FROM `cart` c JOIN `product` p ON p.id = c.pid JOIN `category` cat ON cat.id = p.cate_id WHERE c.username = ?";

                            $result = $dblink_display->prepare($sql_display);
                            $result->execute(array("$user"));
                            // Check the id exists in DB or not.
                            if ($result->rowCount() > 0) :
                                $row = $result->fetchAll(PDO::FETCH_ASSOC);
                                $total = 0;

                                foreach ($row as $r) :
                            ?>
                                    <form method="get">
                                        <hr class="my-4">
                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <img src="images/<?= $r['pro_image'] ?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <h6 class="text-muted"><?= $r['cat_name'] ?></h6>
                                                <h6 class="text-black mb-0"></h6><?= $r['pro_name'] ?></h6>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                <button class="btn btn-link px-2" type="number" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                    <i class="fas fa-minus"></i>
                                                </button>

                                                <input id="form1" min="0" name="quantity" value="<?= $r['quantity'] ?>" type="number" class="form-control form-control-sm" />

                                                <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                <h6 class="mb-0">$<?= $r['price'] * $r['quantity'] ?></h6>
                                            </div>
                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                <a href="?page=shoppingcart&function=del&id=<?= $r['pro_id'] ?>" onclick="return deleteConfirm()" class="text-muted"><i class="fas fa-times"></i></a>
                                            </div>
                                        </div>
                                    </form>
                                <?php
                                    $total += $r['price'] * $r['quantity'];
                                endforeach;
                                ?>
                                <hr class="my-4">

                                <div class="pt-5">
                                    <h6 class="mb-0"><a href="?page=product" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                                </div>
                                <?php
                                $c = new Connect();
                                $dblink = $c->connectToPDO();

                                // Delete a data
                                if (isset($_GET['']) && isset($_GET['function']) == "del") :

                                    $id = $_GET['pro_id'];
                                    $user = $_SESSION['username'];
                                    echo $id;
                                    $sqlSelect = "DELETE FROM `cart` WHERE username = ? AND pid = ?";
                                    $stmt = $dblink->prepare($sqlSelect);
                                    $execute = $stmt->execute(array("$id", "$user"));

                                    if ($execute) :
                                        header("Location: ?page=shoppingcart");
                                    endif;
                                    echo "Failed" . $execute;
                                endif;
                                ?>
                        </div>
                    </div>

                    <div class="col-lg-4 bg-grey">
                        <div class="p-5">
                            <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                            <hr class="my-4">

                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="text-uppercase">items <?= $result->rowCount() ?></h5>
                                <h5>$<?= $total ?></h5>
                            </div>

                            <h5 class="text-uppercase mb-3">Shipping</h5>

                            <div class="mb-4 pb-2">
                                <select class="form-control">
                                    <option value="1">Standard-Delivery- $5.00</option>
                                </select>
                            </div>

                            <hr class="my-4">

                            <div class="d-flex justify-content-between mb-5">
                                <h5 class="text-uppercase">Total price</h5>
                                <h5>$<?= $total + 5 ?></h5>
                            </div>

                            <a href="?page=payment" class="btn btn-dark btn-block btn-lg" name="btnCheckout">Checkout</a>
                        </div>
                    </div>
                <?php
                            else :
                                echo "Your Cart is empty!";
                ?>
                    <div class="pt-5">
                        <h6 class="mb-0"><a href="?page=product" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                    </div>
                <?php
                            endif;
                ?>
                </div>
            </div>
        </div>
    </div>
</section>