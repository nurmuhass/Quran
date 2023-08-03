<!--
	Name: The Qur'an
	Author (s): teampiccolo
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
	<head>
		<meta charset="utf-8">
	<!--	<meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

		<title>The Qur'an</title>
		<link rel="stylesheet" type="text/css" href="css/index.css" />
		<link rel="Icon" type="image/ico" href="./images/favicon.ico" />
	</head>
	<body>
	
		<div id="container" class="d-none d-sm-block" style="height:100%">
			<div id="title" >The Qur'an Memorization Tester</div>
			<div id="feed_back"></div>

			<!-- Sidebar start-->
			<div id="controls">
				<span class="heading">Surah Selection</span>
				<br /><br />
<p style="margin-bottom:3px">
	<i>Select Surah to start from </i> 
</p>
				<!-- start from surah start-->
				<select id="surah_start" class="surah">
					<option>--Select Surah--</option>
						<?php
							include './includes/connect.inc.php';
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
				<br /><br />
				<!-- start from surah ends-->


<p style="margin-bottom:3px">
	<i>	Select Verse number to start from </i> 
</p>

<!-- start from ayah start-->
				<select id="surah_start_no" class="surah_no">
					
				</select>
				<br /><br />
<!-- start from ayah ends-->

<p style="margin-bottom:3px">
	<i>Select Stopping Surah</i> 
</p>

				<!-- stopping surah start-->
				<select id="surah_end" class="surah">
					<option>--Select Surah--</option>
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
				<!-- stopping surah ends-->



				<br /><br />
<p style="margin-bottom:3px">
	<i>Select Stopping Verse</i> 
</p>
				<!-- stopping ayah start-->
				<select id="surah_end_no" class="surah_no">
					<option></option>
				</select>
				
				<!-- stopping ayah ends-->

				<br /><br />
<p style="margin-bottom:3px">
	<i>Number of Verses to Display</i> 
</p>
				<!-- Num of verses to display starts-->
		
				<input type="number" id="no_of_verse_to_display" value="1" class="surah_no">
				<br /><br />
				<input id="verse_display" class="surah_display" type="button" value="Display" />
	<!-- Num of verses to display ends-->

			</div>
		<!-- Sidebar ends-->	
		
<!-- Displays Starts-->
			<div id="displays">
				
				<?php


	$sql_3 = $handler->query("SELECT * FROM `verses` LIMIT 1");
					
	$sql_2 = $handler->query("SELECT * FROM `verses` ORDER BY rand()");
		
		$sql_3_row = $sql_3->fetch();
		$sql_2_row = $sql_2->fetch();
			
			$first = $sql_3_row['verse_image'];
			$displays = $sql_2_row['verse_image'];
				
				echo '<center><img style="width:50%;" src="'.$first.'"></center>';
				echo '<img style="width:96%;" src="'.$displays.'">';



			
				?>
			</div>

<!-- Displays Ends-->



			<center><marquee scrollamount="1">Designed and Developed by Kabir Yusuf Bashir | Tel: +(234) 8068593127 | Email: kabiryusufbashir@gmail.com</marquee></center>
		</div>
		
		<script type="text/javascript" src="./js/jquery.js"></script>
		<script type="text/javascript" src="./js/scripts.js"></script>
		
		
	</body>
</html>