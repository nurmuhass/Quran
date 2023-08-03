<head>
	<link rel="stylesheet" type="text/css" href="../css/index.css" />
</head>
<?php
	if(isset($_POST['surah_start'], $_POST['surah_start_no'], $_POST['surah_end'], $_POST['surah_end_no'], $_POST['no_of_verse_to_display'])){
		$surah_start = htmlentities(stripslashes($_POST['surah_start']));
		$surah_start_no = htmlentities(stripslashes($_POST['surah_start_no']));
		$surah_end = htmlentities(stripslashes($_POST['surah_end']));
		$surah_end_no = htmlentities(stripslashes($_POST['surah_end_no']));
		$no_of_verse_to_display = htmlentities(stripslashes($_POST['no_of_verse_to_display']));
			if(!empty($surah_start)){
				if($surah_start != '--Select Surah--'){
					if(!empty($surah_start_no)){
						if(!empty($surah_end)){
							if($surah_end != '--Select Surah--'){
								if(!empty($surah_end_no)){
									if(!empty($no_of_verse_to_display)){
										if($no_of_verse_to_display > 0){
											include '../includes/connect.inc.php';
												if($query = $handler->query("SELECT `id` FROM `verses` WHERE `surah_name`='$surah_start' && `verse_no`='$surah_start_no' ORDER BY `verse_no`")){
													$query_row = $query->fetch();
														 $start = $query_row['id'];
															if($query_2 = $handler->query("SELECT `id` FROM `verses` WHERE `surah_name`='$surah_end' && `verse_no`='$surah_end_no' ORDER BY `verse_no`")){
																$query_row_2 = $query_2->fetch();
																$end = $query_row_2['id'];
																	$rand = rand($start, $end);
																	if($query_3 = $handler->query("SELECT `verse_image`, `verse_no` FROM `verses` WHERE `id`='$rand'")){
																		if($query_3->rowCount() > 0){
																			$query_row_3 = $query_3->fetch();
																			$verse_no_display = $query_row_3['verse_no'];
																			$verse_image = $query_row_3['verse_image'];
																			
																			$next_verse = 1 + $rand;
																			$previous_verse = $rand - 1;
																			
																			$sql = $handler->query("SELECT `verse_image`, `verse_no` FROM `verses` WHERE `id` >= '$next_verse' && `id` <= $end LIMIT $no_of_verse_to_display");
																			
																			$sql_2 = $handler->query("SELECT `verse_image` FROM `verses` WHERE `id`='$previous_verse'");
																			$sql_2_row = $sql_2->fetch();
																			$previous_verse_image = $sql_2_row['verse_image'];
																			
																			$sql_3 = $handler->query("SELECT * FROM `verses` LIMIT 1");
																			
																			$sql_3_row = $sql_3->fetch();
																				
																				$first = $sql_3_row['verse_image'];
																			
																			echo '
																			<div id="dialogoverlay"></div>
																				<div id="dlgbox">
																					<div id="dlg_header">
																						Verse View
																					</div>
																					<div id="dlg_body">
																						<div id="check"></div>';
																						
																						if($verse_no_display == 1){
																							echo '<img style="width:80%;" src="'.$previous_verse_image.'">';
																							echo '<img style="width:80%;" src="'.$first.'">';
																							echo '<img style="background:yellow; width:80%;" src="'.$verse_image.'">';
																						}else{
																							echo '<img style="width:80%;" src="'.$previous_verse_image.'">';
																							echo '<img style="background:yellow; width:80%;" src="'.$verse_image.'">';
																						}
																						
																						while($sql_row = $sql->fetch()){
																							$next_verse_image = $sql_row['verse_image'];
																							$verse_no = $sql_row['verse_no'];
																								if($verse_no == 1){
																									echo '<img style="width:80%;" src="'.$first.'">';
																									echo '<img style="width:80%;" src="'.$next_verse_image.'">';
																								}else{
																									echo '<img style="width:80%;" src="'.$next_verse_image.'">';
																								}
																						}
																				echo '	</div>
																					<div id="dlg_footer">
																						<button onclick="dlgLogNo()">Close</button>
																					</div>
																				</div>
																			';	
																		}else{
																			$rand++;
																			if($query_4 = $handler->query("SELECT `verse_image` FROM `verses` WHERE `id`='$rand'")){
																				$query_row_4 = $query_4->fetch();
																				$verse_image = $query_row_4['verse_image'];
																					echo
																					'<div id="dialogoverlay"></div>
																						<div id="dlgbox">
																							<div id="dlg_header">
																								Verse View		
																							</div>
																							<div id="dlg_body">
																								<div id="check"></div>
																								<img src="'.$verse_image.'">
																							</div>
																							<div id="dlg_footer">
																								<button onclick="dlgLogNo()">Close</button>
																							</div>
																						</div>
																					';	
																			}else{
																				echo 'Please check your inputs and try again...';
																			}
																		}
																	}else{
																		echo 'Please check your inputs and try again...';
																	}
															}else{
																echo 'Error: Please try again...';
															}
												}else{
													echo 'Error: Please try again...';
												}
										}else{
											echo 'No of Verse to display must be greater than 0...<br />';
										}
									}else{
										echo 'No of Verse to display empty...<br />';
									}
								}else{
									echo 'Verse ending number empty...<br />';
								}
							}else{
								echo 'Please select a Surah to end...<br />';
							}
						}else{
							echo 'Surah Ending not selected...<br />';
						}
					}else{
						echo 'Verse starting number empty...<br />';
					}
				}else{
					echo 'Please select a Surah to start...<br />';
				}
			}else{
				echo 'Surah Starting not selected...<br />';
			}
	}
?>
<script type="text/javascript">
	var dlg = document.getElementById("dlgbox");
	var span = document.getElementsByClassverse_image("close")[0];
	var dialogoverlay = document.getElementById("dialogoverlay");
	var winWidth = window.innerWidth;
	var winHeight = window.innerHeight;
		dialogoverlay.style.display = "block";
		dialogoverlay.style.height = winHeight +"px";
	
	function dlgLogNo(){
		dlg.style.display = "none";
		dialogoverlay.style.display = "none";
	}
</script>