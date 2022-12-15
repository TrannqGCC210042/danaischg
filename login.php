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
                // echo "Ok";
                $_SESSION["username"] = $row['username'];
                $_SESSION["role"] = $row['role'];
              
                // setcookie("username", $row['username'],time()+30);
                // setcookie("role", $row['role'],time()+30);

                header("Location: index.php");
                // echo "<meta http-equiv='refresh' content='0;url=index.php'>";
            else :
                echo "Sai rồi má!";
            endif;
        else :
            echo "Đăng ký đi bà";
        endif;
    endif;
    ?>
    <div class="page-wrapper p-t-50 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-body">
                    <h2 class="title fw-bold text-center">Login</h2>
                    <form method="POST">
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="USERNAME" name="username">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="password" placeholder="PASSWORD" name="password">
                        </div>
                        <div class="p-t-20">
                            <button class="btn-click btn--radius btn--black" type="submit" name="btnLogin">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['btnLogin'])) :
        $username = $_POST['username'];
        $password = $_POST['password'];

        $c = new Connect();
        $dblink = $c->connectToPDO();
        $sql = "SELECT * FROM `user` WHERE `username` = ? AND `password` = ?";

        $result = $dblink->prepare($sql);
        $check = $result->execute(array("$username", "$password"));

        if ($check) :
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $_COOKIE['username'] = $row['username'];
        endif;
    endif;
    ?>