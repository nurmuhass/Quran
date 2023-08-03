<head>
	<link rel="stylesheet" type="text/css" href="../css/index.css" />
</head>
<?php
	if(isset($_POST['surah_id'])){
		$surah_id = htmlentities(($_POST['surah_id']));
			include '../includes/connect.inc.php'?>
				<div id="dialogoverlay"></div>
				<div id="dlgbox">
					<div id="dlg_header">
						Edit Surah
						<span title="close" class="close">×</span>
					</div>
					<div id="dlg_body">
						<div id="check"></div>
						
						<?php
							$query = $handler->query("SELECT * FROM `surah` WHERE `id`='$surah_id'");
								$query_row = $query->fetch();
									$surah_id = $query_row['id'];	
									$surah_no = $query_row['surah_no'];		
									$surah_name = $query_row['name'];		
									$no_of_verses = $query_row['no_of_verses'];		
										
						?>
							<b>Surah No:</b> <input id="surah_no" title="surah_no" surah_id="<?php echo $surah_id;?>" class="act_title_text" type="text" value="<?php echo $surah_no; ?>"><br />
							<b>surah_name:</b> <input id="surah_name" title="surah_name" class="act_title_text" type="text" value="<?php echo $surah_name; ?>"><br />
							<b>No of Verses:</b> <input id="no_of_verses" title="no_of_verses" class="act_title_text" type="text" value="<?php echo $no_of_verses; ?>"><br />
							
							
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
		surah_id = $('#surah_no').attr('surah_id');
		surah_no = $('#surah_no').val();
		surah_name = $('#surah_name').val();
		no_of_verses = $('#no_of_verses').val();
			$.post('../includes/surah_edit_confirm.inc.php', {surah_id:surah_id, surah_no:surah_no, surah_name:surah_name, no_of_verses:no_of_verses},
				function(data){
					$('#check').html('<b>'+data+'</b><hr />');
				});
	}

</script>