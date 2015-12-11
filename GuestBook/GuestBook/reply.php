<?php
	session_start();

	if (!isset($_SESSION['username'])) {
		header("Location: http://".$_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['PHP_SELF']), '/\\')."login.php");
		exit;
	}
	require('conn.php');
	if ($_POST) {
		if (get_magic_quotes_gpc()) {
			$reply = htmlspecialchars(trim($_POST['reply']));
		} else {
			$reply = addslashes(htmlspecialchars(trim($_POST['reply'])));
		}

		$replytime = $reply ? time() : 'NULL';
		$update_sql = "UPDATE comment SET comment = '$reply' , replytime = $replytime WHERE comment_id = $_POST[id]";
		$rs = $pdo -> query($update_sql);
		if ($rs) {
			exit('<script type="text/javascript">alert("Reply successful! ");self.location = "admin.php";</script>');
		} else {
			exit('Error: '.mysql_error().'[ <a href="javascript:history.back()">Back</a> ]');
		}
	}

	# 删除留言
	if ($_GET['action'] == 'delete') {
		$delete_sql = "DELETE FROM comment WHERE id = $_GET[id]";
		$rs_d = $pdo -> query($delete_sql);
		if ($rs_d) {
			exit('<script type="text/javascript">alert(Delete successful! ");self.location = "admin.php";</script>');
		} else {
			exit('Error: '.mysql_error().'[ <a href="javascript:history.back()">Back</a> ])');
		}
	}
?>