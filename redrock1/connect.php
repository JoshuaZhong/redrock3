<?php
	$pagesize=5;
	$conne = mysql_connect("localhost","root","");//Resource id #3
	$dbname = Users_Mysql;
	$db_selected = mysql_select_db("users",$conn);

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Test for homework</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript">
			function InputCheck(form1) {
				if (form1.username.value == "") {
					alert("Enter your nickname");
					form1.username.focus();.
					return (false);
				}
				if (form1.content.value == "") {
					alert("Content is null!");
					form1.content.focus();
					return (false);
				}
			}
		</script>
	</head>
	<body>
		<div id="container">
			<div id="guestbook">
				<h3>GuestBook</h3>
				<?php
					#显示页面
					$page = $_GET['p'] ? $_GET['p'] : 1;
					$offset = ($page - 1) * $pagesize;

					#从SQL中查询留言内容
					if ($pdo) {
						$query_c = "SELECT * FROM comment ORDER BY comment_id DESC LIMIT $offset , $pagesize";
					 	$rs_c = $pdo -> query($query_c);
					 	$row_c = $rs_c -> fetch(PDO::FETCH_OBJ);
					 	$query_u = "SELECT * FROM user ORDER BY user_id DESC LIMIT $offset , $pagesize";
					 	$rs_u = $pdo -> query($query_u);
					 	$row_u = $rs_u -> fetch(PDO::FETCH_OBJ);
					 	// while (true) {
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
						<?php
							// if(!empty($row_c['replytime'])) {
						?>
						<p class="head">
							<span class="time">
								<?php
									echo date("Y-m-d H:i");  // 请设置时间戳
								?>
								</span>
						</p>
						<?php
							// }
						?>
					</div>
					<?php	
						// }					
					}
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
											echo '&nbsp;<a href="index.php?p='.$i.'">'.$i.'</a>';
										}
									}
								}
							?>
						</p>
					</div>
			</div>
			<div id="form">
				<h3>Leave a message</h3>
				<form id="form1" name="form1" method="post" action="submiting.php" onSubmit="return InputCheck(this)">
					<p>
						<label for="title">Username: </label>
						&nbsp;
						<input id="username" name="username" type="text">
						<span>(IMPORTANT!)</span>
					</p>
					<p>
						<label for="title">Content: </label>
						&nbsp;
						<textarea id="content" name="content"></textarea>
					</p>
					<input type="submit" name="submit" class="sub" value="Enter">
				</form>
			</div>
		</div>
	</body>
</html>