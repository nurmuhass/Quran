<?php
	if(isset($_POST['verse_id'])){
		$verse_id = htmlentities($_POST['verse_id']);
			include '../includes/connect.inc.php';
				$sql = $handler->query("SELECT `verse_image` FROM `verses` WHERE `id`='$verse_id'");
					$sql_row = $sql->fetch();
					$verse_image = '.'.$sql_row['verse_image'];
						unlink($verse_image);
							if($query = $handler->query("DELETE FROM `verses` WHERE `id`='$verse_id'")){
								echo 'Verse deleted...';
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
										counter(3, "../dashboard/verses.php");
									</script>';
							}else{
								echo 'Error: Please try again later...';
							}
	}
?>