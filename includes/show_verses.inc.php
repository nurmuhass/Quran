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
<?php
	if(isset($_POST['select_surah'])){
		if(isset($_POST['surah'])){
			$surah = htmlentities(stripslashes($_POST['surah']));
				if(!empty($surah)){
					?>
					<?php
						$pages_query = $handler->query("SELECT * FROM `verses` WHERE `surah_name`='$surah'  ORDER BY `verse_no` ASC");
						echo '<a href="../dashboard/verses.php"><center><h3>Back</h3></center></a>';
					?>
					
					<table class="all_post">
						<?php
							if($pages_query->rowCount() > 0){
								$query = $handler->query("SELECT * FROM `verses` WHERE `surah_name`='$surah'  ORDER BY `verse_no` ASC");
									if($sql_count = $query->rowCount() > 0){
										echo '<div id="feed_back"></div>';
										echo '
											<tr>
												<th>Surah No</th>
												<th>Surah Name</th>
												<th>Verse No</th>
												<th>Action</th>
											</tr>
											';
										while($query_row = $query->fetch()){
											$verse_id = $query_row['id'];	
											$surah_name = $query_row['surah_name'];	
											$surah_no = $query_row['surah_no'];	
											$verse_no = $query_row['verse_no'];	
											$verse_image = $query_row['verse_image'];	
												echo '
												<tr>
													<td>'.$surah_no.'</td>
													<td>'.$surah_name.'</td>
													<td>'.$verse_no.'</td>
													<td>
														<a id="verse_view" verse_id="'.$verse_id.'">View</a> | <a id="verse_edit" verse_id="'.$verse_id.'">Edit</a> | <a id="verse_trash" verse_id="'.$verse_id.'">Trash</a> 
													</td>
												</tr>';
										}	
									}else{
										echo '<script type="text/javascript">
												window.location = "./index.php";
											  </script>';
									}
							}else{
								echo '<b><center>No Verse Added...</center></b>';
							}
						?>
						<?php
					echo  '</table>';
				}else{
					echo 'Surah not selected...';
				}
		}
	}
?>
	
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript">
		//SURAH EDIT
			$(document).on('click', '#surah_edit', function(){
				alert();
				var surah_id = $(this).attr('surah_id');
					$.post('../includes/surah_edit.inc.php', {surah_id:surah_id},
						function(data){
							$('#feed_back').html(data);
						});
			});
		//END OF SURAH EDIT

		//SURAH DELETE
			$(document).on('click', '#surah_trash', function(){
				var surah_id = $(this).attr('surah_id');
					$.post('../includes/surah_trash.inc.php', {surah_id:surah_id},
						function(data){
							$('#feed_back').html(data);
						});
			});
		//END OF SURAH DELETE

		//VERSE VIEW
			$(document).on('click', '#verse_view', function(){
				var verse_id = $(this).attr('verse_id');
					$.post('../includes/verse_view.inc.php', {verse_id:verse_id},
						function(data){
							$('#feed_back').html(data);
						});
			});
		//END OF VERSE VIEW

		//VERSE EDIT
			$(document).on('click', '#verse_edit', function(){
				var verse_id = $(this).attr('verse_id');
					$.post('../includes/verse_edit.inc.php', {verse_id:verse_id},
						function(data){
							$('#feed_back').html(data);
						});
			});
		//END OF VERSE EDIT

		//VERSE TRASH
			$(document).on('click', '#verse_trash', function(){
				var verse_id = $(this).attr('verse_id');
					$.post('../includes/verse_trash.inc.php', {verse_id:verse_id},
						function(data){
							$('#feed_back').html(data);
						});
			});
		//END OF VERSE TRASH
	</script>
		
</body>
</html>