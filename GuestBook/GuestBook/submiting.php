<?php
	# 禁止非POST方式访问
	if (!isset($_POST['submit'])) {
		exit('Error!');
	}

	if (get_magic_quotes_gpc()) {
		$username = htmlspecialchars(trim($_POST['username']));
		$content = htmlspecialchars(trim($_POST['content']));
	} else {
		$username = addslashes(htmlspecialchars(trim($_POST['username'])));
		$content = addslashes(htmlspecialchars(trim($_POST['content'])));
	}

	require('conn.php');

	$create_time = time();

	$insert_c = "INSERT INTO comment (content, time) VALUES ('$content','$create_time')";

	if ($pdo -> query($insert_c)) {
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Refresh" content="2;url=index.php">
		<title>Successful! </title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="refresh">
			<p>
				Yes!Then will go back!
			</p>
		</div>
	</body>
</html>
<?php
	} else {
		echo 'Error:',mysql_error(),'[ <a href="javascript:history.back()">Back</a> ]';
	}
?>