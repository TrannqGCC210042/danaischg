    <!-- ========================================= Login ========================================= -->
    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/register-login.css" rel="stylesheet" media="all">

    <?php
    $errLogin = "";

    if (isset($_POST['btnLogin'])) :
        if (isset($_POST['username']) && isset($_POST['password'])) :
            $username = $_POST['username'];
            $password = $_POST['password'];

            $c = new Connect();
            $dblink = $c->connectToPDO();
            $sql = "SELECT * FROM `user` WHERE username = ? AND password = ?";

            $stmt = $dblink->prepare($sql);
            $check = $stmt->execute(array("$username", "$password"));
            $numrow = $stmt->rowCount();
            $row = $stmt->fetch(PDO::FETCH_BOTH);

            if ($numrow == 1) :
                $_SESSION["username"] = $row['username'];
                $_SESSION["firstName"] = $row['firstName'];
                $_SESSION["lastName"] = $row['lastName'];
                $_SESSION["address"] = $row['address'];
                $_SESSION["telephone"] = $row['telephone'];

                $_SESSION["role"] = $row['role'];


                header("Location: index.php");
            else :
                $errLogin = "Username or password is incorrect!";
            endif;
        else :
            echo "Register";
        endif;
    endif;
    ?>

    <div class="page-wrapper p-t-50 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-body">
                    <h2 class="title fw-bold text-center">Login</h2>
                    <form method="POST" name="formLogin">
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="USERNAME" name="username" value="<?= isset($_POST['username']) ? $_POST['username'] : "" ?>" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="password" placeholder="PASSWORD" name="password" required>
                        </div>
                        <div class="input--style-1 text-center">
                            <p>You don't have an account yet? <a href="?page=register">Registration</a></p>
                        </div>
                        <?php
                        if ($errLogin != "") :
                        ?>
                            <div class="text-center">
                                <span class="text-danger"><?= $errLogin ?></span>
                            </div>
                        <?php
                        endif;
                        ?>
                        <div class="login text-center">
                            <button class="btn-click btn--radius btn--black" type="submit" name="btnLogin">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>