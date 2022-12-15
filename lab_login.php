<?php
include_once("connect.php");

/*
Put your code right here
1. Check if button 'btnLogin' is submitted, if it's true, go to 2.
2. Check if you get $_POST of input of email and input of password. if it's true, go to 3.
3. Connect to PDO
4. write a query to check from table 'Users' if user's email and user's password are both true.
5. Excute it.
6. Count row of result
7. Fetch data from result
8. save session 
9. Redirect to homepage.
*/

if (isset($_POST['btnLogin'])) :
	if (isset($_POST['txtEmail']) && isset($_POST['txtPass'])) :
		$username = $_POST['txtEmail'];
		$password = $_POST['txtPass'];

		$c = new Connect();
		$dblink = $c->connectToPDO();
		$sql = "SELECT * FROM `user` WHERE username = ? AND password = ?";

		$stmt = $dblink->prepare($sql);
		$check = $stmt->execute(array("$username", "$password"));
		$numrow = $stmt->rowCount();
		$row = $stmt->fetch(PDO::FETCH_BOTH);

		if ($numrow == 1) :
			echo "Ok";
			$_SESSION["username"] = $row['username'];
			$_SESSION["role"] = $row['role'];
			header("Location: index.php");
			// echo "<meta http-equiv='refresh' content='0;url=index.php'>";
		else :
			echo "Cặc! Anh biến đi";
		endif;
	else :
		echo "Đăng ký đi mày";
	endif;
endif;
?>

<div class="container">
	<h2 class="pt-3">Member Login</h2>
	<form id="form1" name="form1" method="POST" action="">

		<div class="row">
			<div class="form-group">
				<label for="txtEmail" class="col-sm-2 control-label">Email(*): </label>
				<div class="col-sm-10">
					<input type="text" name="txtEmail" id="txtEmail" class="form-control" placeholder="Email" value="" />
				</div>
			</div>

			<div class="form-group">
				<label for="txtPass" class="col-sm-2 control-label">Password(*): </label>
				<div class="col-sm-10">
					<input type="password" name="txtPass" id="txtPass" class="form-control" placeholder="Password" value="" />
				</div>
			</div>
			<div class="form-group pt-3">
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<input type="submit" name="btnLogin" class="btn btn-primary" id="btnLogin" value="Login" />
					<input type="reset" name="btnCancel" class="btn btn-primary" id="btnCancel" value="Cancel" />
				</div>
			</div>
		</div>

	</form>
</div>