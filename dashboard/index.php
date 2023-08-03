<? session_start(); ?>

<!--
	Name: Pyramid NewsPaper
	Author (s): teampiccolo
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Memorization Tester</title>
		<link rel="stylesheet" type="text/css" href="../css/index.css" />
		<link rel="Icon" type="image/ico" href="../images/favicon.ico" />
	</head>
	<body>
		<?php include '../includes/session.inc.php'; ?>
		
		<div class="activity">
			<div class="act_body">
				<div class="contain">
					<a href="./index.php">
						<div class="bars">
							<p>
								<img src="../images/home_icon.png" /><br />
									HOME
							</p>
						</div>
					</a>
					
					<a href="./surah.php">
						<div class="bars">
							<p>
								<img src="../images/surah.png" /><br />
									SURAH
							</p>
						</div>
					</a>
					
					<a href="./verses.php">
						<div class="bars">
							<p>
								<img src="../images/verses.png" /><br />
									VERSE
							</p>
						</div>
					</a>
					
					<a href="../includes/logout.inc.php">
						<div class="bars">
							<p>
								<img src="../images/logout_icon.png" /><br />
									LOGOUT
							</p>
						</div>
					</a>
					
				</div>
			</div>
		</div>
		
	</body>
</html>