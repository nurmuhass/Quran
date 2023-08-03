<head>
	<link rel="stylesheet" type="text/css" href="../css/index.css" />
</head>
<?php
	if(isset($_POST['verse_id'])){
		$verse_id = htmlentities(($_POST['verse_id']));
			include '../includes/connect.inc.php'?>
				<?php
					if($query = $handler->query("SELECT * FROM `verses` WHERE `id`='$verse_id'")){
						$query_row = $query->fetch();
							$verse_image = $query_row['verse_image'];
							$surah_name = $query_row['surah_name'];
							$verse_no = $query_row['verse_no'];
							$verse_image = $query_row['verse_image'];
					}else{
						echo 'Error: Please try again...';
					}
				?>
				<div id="dialogoverlay"></div>
				<div id="dlgbox">
					<div id="dlg_header">
						Verse Trash
						<span title="close" class="close">×</span>
					</div>
					<div id="dlg_body">
						<div id="check"></div>
						Are you sure you want to trash this Verse <?php echo ' <img src=".'.$verse_image.'" id="verse_image" verse_id="'.$verse_id.'"> <br /> From Surah <b>'.$surah_name.'</b> and verse No <b>'.$verse_no.'?</b>'?>
					</div>
					<div id="dlg_footer">
						<button onclick="dlgLogYes()">Yes</button>
						<button onclick="dlgLogNo()">No</button>
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
	
	function dlgLogYes(){
		verse_id = $('#verse_image').attr('verse_id');
			$.post('../includes/verse_trash_confirm.inc.php', {verse_id:verse_id},
				function(data){
					$('#check').html('<b>'+data+'</b><hr />');
				});
	}

</script>