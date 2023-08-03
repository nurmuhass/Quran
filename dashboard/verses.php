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
			<div id="title">Verses</div>
			<div id="feed_back"></div>
			<!--<div id="controls">
				<?php
					if(isset($_POST['submit'])){
						if(isset($_POST['surah_name'], $_POST['surah_no'], $_POST['verse_no'])){
							$surah_name = htmlentities(stripslashes($_POST['surah_name']));
							$surah_no = htmlentities(stripslashes($_POST['surah_no']));
							$verse_no = htmlentities(stripslashes($_POST['verse_no']));
							$verse_image_name = htmlentities($_FILES['verse_image']['name']);	
							$verse_image_size = htmlentities($_FILES['verse_image']['size']);	
							$verse_image_type = htmlentities($_FILES['verse_image']['type']);	
							$verse_image_tmp_name = htmlentities($_FILES['verse_image']['tmp_name']);
							$verse_media_name_ext = strtolower(substr($verse_image_name, strpos($verse_image_name, '.') +1));
							$path = './images/verses/'.$verse_image_name;
								if(!empty($surah_name)){
									if(!empty($surah_no)){
										if(!empty($verse_no)){
											if($verse_media_name_ext == 'jpg' || $verse_media_name_ext == 'jpeg' || $verse_media_name_ext == 'png' || $verse_media_name_ext == 'gif'){
												if($verse_image_type == 'image/jpeg' || $verse_image_type == 'image/png' || $verse_image_type == 'image/jpg' || $verse_image_type == 'image/gif'){
													$location = '../images/verses/'.$verse_image_name;
														if(move_uploaded_file($verse_image_tmp_name, $location)){
															$sql = $handler->query("SELECT `verse_no`, `surah_name` FROM `verses` WHERE `verse_no`='$verse_no' && `surah_name`='$surah_name'");
																if($count = $sql->rowCount() == 0){
																	$sql_2 = $handler->query("SELECT `name`, `surah_no` FROM `surah` WHERE `name`='$surah_name' && `surah_no`='$surah_no'");
																		if($sql_2->rowCount() == 1){
																			$stmt = $handler->prepare("INSERT INTO `verses`(surah_name, surah_no, verse_no, verse_image) VALUES(?, ?, ?, ?)");
																			$stmt->bindValue(1, $surah_name);
																			$stmt->bindValue(2, $surah_no);
																			$stmt->bindValue(3, $verse_no);
																			$stmt->bindValue(4, $path);
																				$stmt->execute();
																				echo 'Verse added...<br />';
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
																						counter(1, "../dashboard/verses.php");
																					</script>';	
																		}else{
																			echo '<b>'.$surah_name.'</b> is not the <b>'.$surah_no.'</b> surah in the Quran...<br />';
																		}
																}else{
																	echo '<b>'.$surah_name.'</b> with verse No"<b>'.$verse_no.'</b>" already exists...<br />';
																}	
														}else{
															echo 'Location not found...<br />';
														}
												}else{
													echo 'Document must be an Image...<br />';
												}
											}else{
												echo 'Please check your Image format and try again...<br />';
											}	
										}else{
											echo 'Verse No empty...<br />';
										}
									}else{
										echo 'Surah No not selected...<br />';
									}
								}else{
									echo 'Surah Name not seletced...<br />';
								}
						}
					}
				?>
				<span class="heading">Add Verse</span>
				<br /><br />
				<form action="verses.php" method="POST" enctype="multipart/form-data">
					<b>Surah:</b><br />
					<select name="surah_name" class="surah">
							<?php
								$sql = $handler->query("SELECT `name` FROM `surah` ORDER BY `surah_no` DESC");
									if($sql->rowCount() > 0){
										while($sql_row = $sql->fetch()){
											$surah_name = $sql_row['name'];
												echo '<option>'.$surah_name.'</option>';
										}	
									}else{
										echo '<option>No Surah Added</option>';
									}
							?>
					</select>
					<br />
					<b>Surah No:</b><br />
					<select id="surah_no_add" name="surah_no" class="surah_no">
							<?php
								$sql = $handler->query("SELECT `surah_no` FROM `surah` ORDER BY `surah_no` DESC");
									if($sql->rowCount() > 0){
										while($sql_row = $sql->fetch()){
											$surah_no = $sql_row['surah_no'];
												echo '<option>'.$surah_no.'</option>';
										}	
									}else{
										echo '<option>No Surah Added</option>';
									}
							?>
					</select>
					<br />
					<?php
						$sql_2 = $handler->query("SELECT * FROM `verses` ORDER BY `id` DESC LIMIT 1");
							if($sql_2->rowCount() > 0){
								while($sql_row_2 = $sql_2->fetch()){
									$verse_no = $sql_row_2['verse_no'] + 1;
								}	
							}
					?>
					<b>Verse No:</b><br />
					<input value="<?php echo $verse_no; ?>" name="verse_no" type="text" class="surah_no">
					<br /><br />
					<b>Verse Image:</b><br />
					<input name="verse_image" type="file"><br />
					<br /><br />
					<input name="submit" class="surah_display" type="submit" value="Add" />
				</form>
				
				<br /><br /><a href="./index.php">HOME</a>
			</div>-->
			<div id="displays" style="width:97%;">
				<br />
				<b><center><h2>Select Surah:</h2></center></b>
					<form method="POST" action="../includes/show_verses.inc.php">
						<select name="surah" class="surah_select">
							<option></option>
								<?php
									$sql = $handler->query("SELECT `name` FROM `surah` ORDER BY `surah_no` ASC");
										if($sql->rowCount() > 0){
											while($sql_row = $sql->fetch()){
												$name = $sql_row['name'];
													echo '<option>'.$name.'</option>';
											}	
										}else{
											echo '<option>No Surah Added</option>';
										}
								?>
						</select>
						<input name="select_surah" class="select" type="submit" value="Select" />
					</form>
					<br /><br />
			</div>
			<br /><a href="./index.php">Back</a>
		</div>
		
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/scripts.js"></script>
		
	</body>
</html>