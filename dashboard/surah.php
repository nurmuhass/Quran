<? session_start(); ?>

<!--
	Name: Pyramid NewsPaper
	Author (s): teampiccolo
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Memorization Tester</title>
		<link rel="stylesheet" type="text/css" href="../css/index.css" />
		<link rel="Icon" type="image/ico" href="../images/favicon.ico" />
	</head>
	<body>
		<?php include '../includes/session.inc.php'; ?>
		<?php include '../includes/connect.inc.php'; ?>
		
		<div id="container">
			<div id="title">Surahs</div>
			<div id="feed_back"></div>
			<!--<div id="controls">
				<?php
					/* if(isset($_POST['submit'])){
						if(isset($_POST['surah_name'], $_POST['surah_no'], $_POST['no_of_verses'])){
							$surah_name = htmlentities(stripslashes($_POST['surah_name']));
							$surah_no = htmlentities(stripslashes($_POST['surah_no']));
							$no_of_verses = htmlentities(stripslashes($_POST['no_of_verses']));
								$sql = $handler->query("SELECT `name` FROM `surah` WHERE `name`='$surah_name'");
									if($count = $sql->rowCount() == 0){
										$stmt = $handler->prepare("INSERT INTO `surah`(surah_no, name, no_of_verses) VALUES(?, ?, ?)");
										$stmt->bindValue(1, $surah_no);
										$stmt->bindValue(2, $surah_name);
										$stmt->bindValue(3, $no_of_verses);
											$stmt->execute();
											echo '<b>'.$surah_name.'</b> added...<br />';
											echo '<script type="text/javascript">
												function counter(time, url){
													var interval = setInterval(function(){
														time = time - 1;
																if(time == 0){
																	clearInterval(interval);
																	window.location = url;
																}
													}, 1000)
												}
												counter(1, "../dashboard/surah.php");
											</script>';
									}else{
										echo '<b>'.$surah_name.'</b> already exists...<br />';
									}
						}
					} */
				?>
				<span class="heading">Add Surah</span>
				<br /><br />
				<form id="surah_add" method="POST" action="surah.php">
					<b>Surah:</b><br />
					<input name="surah_name" id="surah" class="act_input" type="text">
					<br />
					<b>Surah No:</b><br />
					<input name="surah_no" type="number" class="surah_no">
					<br />
					<b>No of Verses:</b><br />
					<input name="no_of_verses" type="number" class="surah_no">
					<br /><br />
					<input name="submit" class="surah_display" type="submit" value="Add" />
				</form>
				
			</div>-->
			<div id="displays" style="width:97%;">
				<?php
					//$per_page = 10;
					$pages_query = $handler->query("SELECT * FROM `surah` ORDER BY `surah_no` ASC");
					//$pages = ceil($pages_query->rowCount() / $per_page);
					//$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
					//$start = ($page - 1) * $per_page; */
				?>
				<table class="all_post">
					<?php
						if($pages_query->rowCount() > 0){
							$query = $handler->query("SELECT * FROM `surah` ORDER BY `surah_no` ASC");
								if($sql_count = $query->rowCount() > 0){
									echo '
										<tr>
											<th>No</th>
											<th>Surah</th>
											<th>No of Verse</th>
											<th>Action</th>
										</tr>
										';
									while($query_row = $query->fetch()){
										$surah_id = $query_row['id'];	
										$name = $query_row['name'];	
										$surah_no = $query_row['surah_no'];	
										$no_of_verse = $query_row['no_of_verses'];	
											echo '
											<tr>
												<td>'.$surah_no.'</td>
												<td>'.$name.'</td>
												<td>'.$no_of_verse.'</td>
												<td>
													<a id="surah_edit" surah_id="'.$surah_id.'">Edit</a> | <a id="surah_trash" surah_id="'.$surah_id.'">Trash</a> 
												</td>
											</tr>';
									}	
								}else{
									echo '<script type="text/javascript">
											window.location = "./index.php";
										  </script>';
								}
								
								/* if($pages >= 1 && $pages != 1){
									for($x=1; $x <=$pages; $x++){
										echo '<div style="float:left; margin-bottom:18px; position:relative; top:5px;"><a style="background:#666; border-right:1px solid #f6f6f6; text-decoration:none; color:#fff; padding:7px 15px;" href="?page='.$x.'">'.$x.'</a></div>';
									}
								} */
						}else{
							echo '<b><center>No Surah Added...</center></b>';
						}
					?>
				</table>
			</div>
			<br /><a href="./index.php">Back</a>
		</div>
		
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/scripts.js"></script>
		
	</body>
</html>