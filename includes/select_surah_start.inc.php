<?php
	if(isset($_POST['surah_name'])){
		$surah_name = htmlentities(stripslashes($_POST['surah_name']));
			if(!empty($surah_name)){
				if($surah_name != '--Select Surah--'){
					include '../includes/connect.inc.php';
						$sql = $handler->query("SELECT `no_of_verses` FROM `surah` WHERE `name`='$surah_name'");
							$sql_row = $sql->fetch();
							$no_of_verses = $sql_row['no_of_verses'];
								for($x=1; $x<=$no_of_verses; $x++){
									echo '<option>'.$x.'</option>';
								}
				}else{
					echo 'Please select a Surah...';
				}
			}else{
				echo 'Surah not selected...';
			}
	}
?>