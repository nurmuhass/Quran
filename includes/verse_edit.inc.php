<head>
	<link rel="stylesheet" type="text/css" href="../css/index.css" />
</head>
<?php
	if(isset($_POST['verse_id'])){
		$verse_id = htmlentities(($_POST['verse_id']));
			include '../includes/connect.inc.php'?>
				<div id="dialogoverlay"></div>
				<div id="dlgbox">
					<div id="dlg_header">
						Edit Verse
						<span title="close" class="close">×</span>
					</div>
					<div id="dlg_body">
						<div id="check"></div>
						
						<?php
							$query = $handler->query("SELECT * FROM `verses` WHERE `id`='$verse_id'");
								$query_row = $query->fetch();
									$verse_id = $query_row['id'];	
									$surah_name = $query_row['surah_name'];		
									$surah_no = $query_row['surah_no'];		
									$verse_no = $query_row['verse_no'];		
										
						?>
							<b>Surah No:</b> <input id="surah_no" title="surah_no" verse_id="<?php echo $verse_id;?>" class="act_title_text" type="text" value="<?php echo $surah_no; ?>"><br />
							<b>surah_name:</b> <input id="surah_name" title="surah_name" class="act_title_text" type="text" value="<?php echo $surah_name; ?>"><br />
							<b>Verse No:</b> <input id="verse_no" title="verse_no" class="act_title_text" type="text" value="<?php echo $verse_no; ?>"><br />
							
							
					</div>
					<div id="dlg_footer">
						<button onclick="dlgLogYes()">Edit</button>
						<button onclick="dlgLogNo()">Cancel</button>
					</div>
				</div>
	<?php
	}
	?>
<script type="text/javascript">
	var dlg = document.getElementById("dlgbox");
	var span = document.getElementsByClassName("close")[0];
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
		verse_id = $('#surah_no').attr('verse_id');
		surah_no = $('#surah_no').val();
		surah_name = $('#surah_name').val();
		verse_no = $('#verse_no').val();
			$.post('../includes/verse_edit_confirm.inc.php', {verse_id:verse_id, surah_no:surah_no, surah_name:surah_name, verse_no:verse_no},
				function(data){
					$('#check').html('<b>'+data+'</b><hr />');
				});
	}

</script>