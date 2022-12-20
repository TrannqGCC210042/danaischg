    <!-- ========================================= Register ========================================= -->
    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/register-login.css" rel="stylesheet" media="all">

    <script>
        // Function to check valid data
        function formValid() {
            var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
            //Contains characters from A to Z, a to z, Numeric characters, Underscore, @ Character, Characters before @ have 6-32 characters, String after @ splits into two parts of the name domain Each part has 2-12 characters
            var mail = /^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/;
            var phone_pattern = /^(\(0\d{1,3}\)\d{7})|(0\d{9,10})$/;

            f = document.formRegister

            if (f.username.value.length > 10) {
                alert("The username must be less than 10 characters");
                f.username.focus();
                return false;
            }
            if (f.password.value != f.confirm_pw.value) {
                alert("Password does not match");
                f.confirm_pw.focus();
                return false;
            }
            if (f.password.value.length < 5) {
                alert("Password must be greater than 5 characters");
                f.password.focus();
                return false;
            }
            if (f.firstName.value.length > 20) {
                alert("First Name must be less than 20 characters");
                f.firstName.focus();
                return false;
            }
            if (format.test(f.firstName.value)) {
                alert("Invalid! First Name does not contain special characters");
                f.firstName.focus();
                return false;
            }
            if (f.lastName.value.length > 30) {
                alert("Last Name must be less than 30 characters");
                return false;
            }
            if (format.test(f.lastName.value)) {
                alert("Invalid! Last Name does not contain special characters");
                f.lastName.focus();
                return false;
            }
            if (mail.test(f.email.value) == false) {
                alert("Invalid email! Try again, please.");
                f.email.focus();
                return false;
            }
            if (f.gender.value == 2) {
                alert("PLease, choose your gender");
                return false;
            }
            if (f.address.value.length > 255) {
                alert("Address must be less than 255 characters");
                f.address.focus();
                return false;
            }
            return true;
        }
    </script>

    <div class="page-wrapper p-t-50 p-b-50 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-body">
                    <h2 class="title fw-bold text-center">Registration</h2>
                    <form name="formRegister" method="POST" onsubmit="return formValid()">
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="USERNAME" name="username" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="password" placeholder="PASSWORD" name="password" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="password" placeholder="CONFIRM PASSWORD" name="confirm_pw" required>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="FIRST NAME" name="firstName" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="LAST NAME" name="lastName" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1 js-datepicker" type="text" placeholder="BIRTHDATE" name="birthday" id="birthday" required>
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
                            <input class="input--style-1" type="text" placeholder="PHONE NUMBER" name="phone" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="EMAIL" name="email" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="ADDRESS" name="address" required>
                        </div>
                        <div class="p-t-20">
                            <input class="btn-click btn--radius btn--black" type="submit" value="Register" name="btn-register"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['btn-register'])) {
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

        if ($check == true) :
            // if(confirm)
            echo "<meta http-equiv='refresh' content='0;url=?page=login'>";
        else :
            echo "Failed!";
        endif;
    }
    ?>