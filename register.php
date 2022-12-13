    <!-- ========================================= Register ========================================= -->
    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/register.css" rel="stylesheet" media="all">

    <?php
    include_once 'connect.php';

    $register = isset($_POST['btn-register']) ? $_POST['btn-register'] : "";
    if ($register) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $gender = $_POST['gender'];
        $birthday = date('Y-m-d', strtotime($_POST['birthday']));
        $telephone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];

        $c = new Connect();
        $dblink = $c->connectToPDO();
        $sql = "INSERT INTO `user`(`username`, `password`, `firstName`, `lastName`, `gender`, `birthday`, `telephone`, `email`, `address`, `role`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $result = $dblink->prepare($sql);
        $check = $result->execute(array("$username", "$password", "$firstName", "$lastName", $gender, "$birthday", "$telephone", "$email", "$address", 0));


        if ($check == true):
            // if(confirm)
            echo "<meta http-equiv='refresh' content='0;url=?page=login'>";
        else:
            echo "Failed!";
        endif;
    }
    ?>

    <div class="page-wrapper p-t-50 p-b-50 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-body">
                    <h2 class="title fw-bold text-center">Registration</h2>
                    <form method="POST">
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="USERNAME" name="username">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="password" placeholder="PASSWORD" name="password">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="password" placeholder="CONFIRM PASSWORD" name="confirm_pw">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="FIRST NAME" name="firstName">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="LAST NAME" name="lastName">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1 js-datepicker" type="text" placeholder="BIRTHDATE" name="birthday" id="birthday">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option disabled="disabled" value="2" selected>GENDER</option>
                                            <option value="0">Male</option>
                                            <option value="1">Female</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="PHONE NUMBER" name="phone">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="EMAIL" name="email">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="ADDRESS" name="address">
                        </div>
                        <div class="p-t-20">
                            <input class="btn-register btn--radius btn--black" type="submit" value="Register" name="btn-register"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
        
    ?>