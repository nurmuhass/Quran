<head>
	<link rel="stylesheet" type="text/css" href="../css/index.css" />
</head>
<?php
	if(isset($_POST['verse_id'])){
		$verse_id = htmlentities(($_POST['verse_id']));
			include '../includes/connect.inc.php'?>
				<?php
					if($query = $handler->query("SELECT `verse_image` FROM `verses` WHERE `id`='$verse_id'")){
						$query_row = $query->fetch();
							$verse_image = $query_row['verse_image'];
					}else{
						echo 'Error: Please try again...';
					}
				?>
				<div id="dialogoverlay"></div>
				<div id="dlgbox">
					<div id="dlg_header">
						Verse View
						<span title="close" class="close">×</span>
					</div>
					<div id="dlg_body">
						<div id="check"></div>
						<?php echo '<center><img src=".'.$verse_image.'"></center>'?>
					</div>
					<div id="dlg_footer">
						<button onclick="dlgLogNo()">Close</button>
					</div>
				</div>
	<?php
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
	
	$('.close').click(function(){
		dlg.style.display = "none";
		dialogoverlay.style.display = "none";
	});
	
	function dlgLogNo(){
		dlg.style.display = "none";
		dialogoverlay.style.display = "none";
	}
</script>