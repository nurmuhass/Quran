<?php
	if(isset($_POST['surah_id'])){
		$surah_id = htmlentities($_POST['surah_id']);
			include '../includes/connect.inc.php';
				if($query = $handler->query("DELETE FROM `surah` WHERE `id`='$surah_id'")){
					echo 'Surah deleted...';
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