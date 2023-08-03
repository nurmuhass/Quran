<?php
	if(isset($_POST['verse_id'], $_POST['surah_no'], $_POST['surah_name'], $_POST['verse_no'])){
		$verse_id = htmlentities($_POST['verse_id']);
		$surah_no = htmlentities($_POST['surah_no']);
		$surah_name = htmlentities($_POST['surah_name']);
		$verse_no = htmlentities($_POST['verse_no']);
			
			include '../includes/connect.inc.php';
				if($query = $handler->query("UPDATE `verses` SET `surah_no`='$surah_no', `surah_name`='$surah_name', `verse_no`='$verse_no' WHERE `id`='$verse_id'")){
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
							counter(3, "../dashboard/verses.php");
						</script>';
				}else{
					echo 'Error: Please try again later...';
				}
				
	}
?>