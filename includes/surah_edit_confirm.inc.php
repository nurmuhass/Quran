<?php
	if(isset($_POST['surah_id'], $_POST['surah_no'], $_POST['surah_name'], $_POST['no_of_verses'])){
		$surah_id = htmlentities($_POST['surah_id']);
		$surah_no = htmlentities($_POST['surah_no']);
		$surah_name = htmlentities($_POST['surah_name']);
		$no_of_verses = htmlentities($_POST['no_of_verses']);
			
			include '../includes/connect.inc.php';
				if($query = $handler->query("UPDATE `surah` SET `surah_no`='$surah_no', `name`='$surah_name', `no_of_verses`='$no_of_verses' WHERE `id`='$surah_id'")){
					echo 'Updated';
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
							counter(3, "../dashboard/surah.php");
						</script>';
				}else{
					echo 'Error: Please try again later...';
				}
				
	}
?>