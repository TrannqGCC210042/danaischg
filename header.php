    <!-- css -->
    <link rel="stylesheet" href="css/header.css" />

    <header class="mt-4">
        <img class="navbar-brand" alt="logo" src="images/logo.png" onclick="window.location='index.php'"/>
        <hr class="line" />
        <div class="navbar navbar-expand-xl navbar-light bg-light mx-5">
            <!-- Menu in mobile phone-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Left element -->
            <form action="?page=product" method="POST" class="d-flex ms-4">
                <!-- Search -->
                <input type="text" class="form-control rounded me-2" name="searchValue" placeholder="search..." aria-label="search" aria-describedby="search-addon" />
                <button type="submit" name="btnSearch" class="input-group-text border-0">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <!-- collapse: thu ra thu vào -->
            <div class="collapse navbar-collapse header" id="navbarMain">
                <!-- Menu bar -->
                <div class="container navbar-nav justify-content-center">
                    <!-- active: highline -->
                    <a class="nav-link" href="index.php">Home</a>
                    <a class="nav-link" href="?page=product">Product</a>
                    <div class="dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Women</a>
                        <div class="dropdown-menu">
                            <?php
                            $c = new Connect();
                            $dblink = $c->connectToMySQL();

                            // Display all category on women
                            $sql = "SELECT c.id as cate_id, c.name as cat_name, p.for_gender as for_gender FROM `category` c JOIN product p ON c.id = p.cate_id WHERE p.for_gender = 1 GROUP BY c.id";
                            $re = $dblink->query($sql);

                            while ($row = $re->fetch_assoc()) :
                            ?>
                                <a class="dropdown-item" href="?page=product&id=<?= $row['cate_id'] ?>&gender=<?= $row['for_gender'] ?>"><?= $row['cat_name'] ?></a>
                            <?php
                            endwhile;
                            ?>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" onclick="document.write(productForMen)">Men</a>
                        <div class="dropdown-menu">
                            <form action="allProduct&cat_id=" method="get">
                                <?php
                                $c = new Connect();
                                $dblink = $c->connectToMySQL();

                                // Display all category on men
                                $sql = "SELECT c.name as cat_name, c.id as cat_id, p.id as pro_id, p.for_gender as for_gender FROM `product` p JOIN `category` c ON c.id = p.cate_id WHERE p.for_gender = 0 and p.cate_id = c.id GROUP BY c.id";
                                $re = $dblink->query($sql);
                                while ($row = $re->fetch_assoc()) :
                                ?>
                                    <a class="dropdown-item" href="?page=product&id=<?= $row['cat_id'] ?>&gender=<?= $row['for_gender'] ?>"><?= $row['cat_name'] ?></a>
                                <?php
                                endwhile;
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Right elements -->
                <div class="d-flex align-items-center">

                    <?php
                    if (isset($_SESSION['username'])) :
                    ?>
                        <!-- Icon -->
                        <a class="text-reset ms-5 ps-4 me-4" href="?page=shoppingcart">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </a>
                        <!-- Avatar -->
                        <div class="dropdown">
                            <a class=" hidden-arrow" href="#" id="navbarDropdownMenuAccount" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="images/account.png" class="rounded-circle" height="36" alt="My account" loading="lazy" />
                                <label for="account" class="ms-2 me-4 link-dark" style="font-size: 1rem;"><?= $_SESSION['username'] ?></label>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdownMenuAccount">
                                <li>
                                    <a href="?page=profile" class="dropdown-item">Profile</a>
                                </li>
                                <li>
                                    <a href="?page=logout">
                                        <a href="?page=logout" class="dropdown-item">Logout</a>
                                </li>
                            </ul>
                        </div>

                    <?php
                    else :
                    ?>
                        <a href="?page=login" class="btn btn-outline-dark me-2 ms-5">Login</a>
                        <a href="?page=register" class="btn btn-dark me-4">Sign-up</a>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </header>