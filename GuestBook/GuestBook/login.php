<?php
	session_start();
	$_SESSION['username'] = $_POST['username'];

	# 注销
	if ($_GET['action'] == 'logout') {
		session_unregister("username");
		exit('<script type="text/javascript">alert("Logout successful! ");self.location = "login.php";</script>');
	}
	# 检测是否登录
	if (isset($_SESSION['username'])) {
		header("Location: http://".$_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['PHP_SELF']),'/\\')."/admin.php");
		exit;
	}

	if ($_POST) {
		require("conn.php");

		$password = md5(trim($_POST['password']));
		$query = "SELECT user_id FROM user WHERE username = '$username' AND password = '$password'";
		$rs = $pdo -> query($query);
		$check_result = $rs -> fetchAll();
		if ($check_result) {
			session_register("username");
			header("Location: http://".$_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['PHP_SELF']), '/\\')."admin.php");
			exit;
		} else {
			echo '<script type="text/javascript">alert("Password error! ");self.location = "login.php";</script>';
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Panel</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript">
			function InputCheck(form1) {
				if (form1.password.value == "") {
					alert("Please enter your password!");
					form1.password.focus();
					return (false);
				};
			}
		</script>
	</head>
	<body>
		<div class="login">
			<form id="form1" name="form1" method="post" action="login.php" onSubmit="return InputCheck(this)">
				<p>
					<label for="username">Username: </label>
					<input type="text" name="username" id="username">
					<label for="password">Password: </label>
					<input id="password" name="password" type="password">
					<input type="submit" name="submit" value="Enter">
					&nbsp;
					<a href="index.php">Back to index</a>
				</p>
			</form>
		</div>
	</body>
</html>