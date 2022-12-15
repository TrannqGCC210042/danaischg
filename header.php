    <!-- css -->
    <link rel="stylesheet" href="css/header.css" />

    <header>
        <img class="navbar-brand" src="images/logo.png" onclick="window.location='index.php'" />
        <hr class="line" />
        <div class="navbar navbar-expand-xl navbar-light bg-light">
            <!-- Menu in mobile phone-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Left element -->
            <div class="d-flex ms-4">
                <!-- Search -->
                <input type="text" class="form-control rounded me-2" placeholder="search..." aria-label="search" aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                    <i class="fas fa-search"></i>
                </span>
            </div>
            <!-- collapse: thu ra thu vào -->
            <div class="collapse navbar-collapse header" id="navbarMain">
                <!-- Menu bar -->
                <div class="container navbar-nav justify-content-center">
                    <!-- active: highline -->
                    <a class="nav-link" href="index.php">Home</a>
                    <a class="nav-link" href="?page=product">Product</a>
                    <div class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Women</a>
                        <div class="dropdown-menu">
                            <?php
                            $c = new Connect();
                            $dblink = $c->connectToMySQL();

                            $sql = "SELECT c.id as cat_id, c.name as cat_name FROM `category` AS c join product as p ON c.id = p.cate_id WHERE p.for_gender = 1";
                            $re = $dblink->query($sql);
                            while ($row = $re->fetch_assoc()) :
                            ?>
                                <a class="dropdown-item" href="?page=product&cat_id=<?= $row['cat_id'] ?>"><?= $row['cat_name'] ?></a>
                            <?php
                            endwhile;
                            ?>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Men</a>
                        
                        <div class="dropdown-menu">
                            <?php
                            $c = new Connect();
                            $dblink = $c->connectToMySQL();
                            $sql = "SELECT c.id as cat_id, c.name as cat_name FROM `category` AS c join product as p ON c.id = p.cate_id WHERE p.for_gender = 0";
                            $re = $dblink->query($sql);
                            while ($row = $re->fetch_assoc()) :
                            ?>
                                <a class="dropdown-item" href="?page=product&cat_id=<?= $row['cat_id'] ?>"><?= $row['cat_name'] ?></a>
                            <?php
                            endwhile;
                            ?>
                        </div>
                    </div>
                    <!-- <a class="nav-link" href="#">Delivery</a>
                    <a class="nav-link" href="#">Support</a> -->
                </div>
                <!-- Right elements -->
                <div class="d-flex align-items-center">

                    <?php
                    if (isset($_SESSION['username'])) :
                    ?>
                        <!-- Icon -->
                        <a class="text-reset me-3" href="#">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </a>
                        <!-- Avatar -->
                        <div class="dropdown">
                            <a class="d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAccount" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="images/account.png" class="rounded-circle" height="36" alt="My account" loading="lazy" />
                                <label for="account" class="ms-2 me-4 link-dark"><?= $_SESSION['username'] ?></label>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdownMenuAccount">
                                <li>
                                    <a href="?page=index.php" class="dropdown-item">Profile</a>
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