<head>
	<link rel="stylesheet" type="text/css" href="../css/index.css" />
</head>
<?php
	if(isset($_POST['surah_id'])){
		$surah_id = htmlentities(($_POST['surah_id']));
			include '../includes/connect.inc.php'?>
				<?php
					if($query = $handler->query("SELECT `name` FROM `surah` WHERE `id`='$surah_id'")){
						$query_row = $query->fetch();
							$name = $query_row['name'];
					}else{
						echo 'Error: Please try again...';
					}
				?>
				<div id="dialogoverlay"></div>
				<div id="dlgbox">
					<div id="dlg_header">
						Surah Trash
						<span title="close" class="close">×</span>
					</div>
					<div id="dlg_body">
						<div id="check"></div>
						Are you sure you want to trash this Surah <?php echo ' <b id="name" surah_id="'.$surah_id.'">'.$name.'?</b>'?>
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
		surah_id = $('#name').attr('surah_id');
			$.post('../includes/surah_trash_confirm.inc.php', {surah_id:surah_id},
				function(data){
					$('#check').html('<b>'+data+'</b><hr />');
				});
	}

</script>