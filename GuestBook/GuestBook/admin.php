<?php
	session_start();
	if(!isset($_SESSION['username'])) {
		header("Location: http://".$_SERVER['HTTP_POST'].rtrim(dirname($_SERVER['PHP_SELF']), '/\\')."login.php");
		exit;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Panel</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div id="container">
			<div id="guestbook">
				<h3>List</h3>
				<?php
					require('conn.php');
					require('config.php');

					# 显示页面
					$page = $_GET['p'] ? $_GET['p'] : 1;
					$offset = ($page - 1) * $pagesize;

					$query = "SELECT * FROM comment ORDER BY comment_id DESC LIMIT $offset , $pagesize";
					$rs = $pdo -> query($query);
					$row = $rs -> fetch(PDO::FETCH_OBJ);

					if (!$row) {
						exit ("Error: ".mysql_error().'[ <a href="javascript:history.back()">Back</a> ]');
					}
					// while($row) {
				?>
				<div class="list">
					<p class="head">
						<span class="bold">
							<?php
								// echo($row_u['username']);
							?>
						</span>
						<span class="time">
							<?php
								echo date("Y-m-d H:i");   // 请设置时间戳
							?>
						</span>
					</p>
					<p class="content">
						<?php
							// echo n12br($row_c['content']);
							// <?=n12br($row_c['content']) > -->
						?>
					</p>
					<form id="form1" name="form1" method="post" action="reply.php">
						<p>
							<label for="reply">Reply: </label>
						</p>
						<textarea id="reply" name="reply" cols="40" rows="5">
							<?php
							?>
						</textarea>
						<p>
							<input name="id" type="hidden" value="<?php ?>">
							<input type="submit" name="submit" value="reply">
						</p>
					</form>
				</div>
				<?php
					// }
				?>
				<div class="list-page">
					<p>
						<?php
							$count = $pdo -> query("SELECT count(*) FROM comment");
							$count_arr = $count -> fetch(PDO::FETCH_NUM);
							$num = count($count_arr);
							$pagenum = ceil($num / $pagesize);
							echo 'Total is '.$num.' lines';
							if ($pagenum > 1) {
								for ($i = 1;$i <= $pagenum; $i++) {
									if ($i == $pagenum) {
										echo '&nbsp;['.$i.']';
									} else {
										echo '&nbsp;<a href="admin.php?p='.$i.'">'.$i.'</a>';
									}
								}
							}
						?>
					</p>
				</div>
			</div>
		</div>
	</body>
</html>