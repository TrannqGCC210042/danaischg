    <!-- css -->
    <link rel="stylesheet" href="css/header.css" />

    <header>
        <img class="navbar-brand" src="images/logo.png" />
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
                    <a class="nav-link" href="?index.php">Home</a>
                    <a class="nav-link" href="?page=product">Product</a>
                    <div class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Women</a>
                        <div class="dropdown-menu">
                            <!-- Add category at homepage -->
                            <?php
                            $c = new Connect();
                            $dblink = $c->connectToMySQL();
                            $sql = "SELECT * FROM category";
                            $re = $dblink->query($sql);
                            while ($row = $re->fetch_row()) :
                            ?>
                                <a class="dropdown-item" href="?page=category+cate_id<?= $row[0] ?>"><?= $row[1] ?></a>
                            <?php
                            endwhile;
                            ?>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Men</a>
                        <div class="dropdown-menu">
                            <!-- Add category at homepage -->
                            <?php
                            $c = new Connect();
                            $dblink = $c->connectToMySQL();
                            $sql = "SELECT * FROM category";
                            $re = $dblink->query($sql);
                            while ($row = $re->fetch_row()) :
                            ?>
                                <a class="dropdown-item" href="cat.php?catid=<?= $row[0] ?>"><?= $row[1] ?></a>
                            <?php
                            endwhile;
                            ?>
                        </div>
                    </div>
                    <a class="nav-link" href="#">Delivery</a>
                    <a class="nav-link" href="#">Support</a>
                </div>
                <!-- Right elements -->
                <div class="d-flex align-items-center">
                    <!-- Icon -->
                    <!-- <a class="text-reset me-3" href="#">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </a> -->
                    <!-- Avatar -->
                    <!-- <div class="dropdown">
                        <a class="d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAccount" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="images/account.pnj" class="rounded-circle" height="36" alt="My account" loading="lazy" />
                            <label for="account" class="ms-2 me-4 link-dark">myaccount</label>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdownMenuAccount">
                            <li>
                                <a class="dropdown-item text-decoration-none" href="#">
                                    <i class="bi bi-person-fill"></i> My account</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="bi bi-box-arrow-right"></i> Logout</a>
                            </li>
                        </ul>
                    </div> -->
                    <?php
                    if (isset($_COOKIE['cc_usename'])) :
                    ?>
                        <a href="?page=login" class="btn btn-outline-dark me-2">My account <?= $_COOKIE['cc_usename'] ?></a>
                        <a href="?page=register" class="btn btn-dark me-2">Logout</a>

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