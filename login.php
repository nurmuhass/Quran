<? session_start(); ?>

<!--
	Name: Memorization Tester
	Author (s): teampiccolo
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Memorization Tester</title>
		<link rel="stylesheet" type="text/css" href="css/index.css" />
		<link rel="Icon" type="image/ico" href="./images/favicon.ico" />
	</head>
	<body>
		
		<div id="form_login">	
			<div id="feedback_login"></div>
				<div>
					<form id="form">
						<b><label for="email_address">Username</label></b><br />
						<input id="email_address_login" autofocus="autofocus" class="textfield username" type="email" placeholder="Username"><br /><br />
						<b><label for="password">Password </label></b><br />
						<input id="password_login" class="textfield password show_password" type="password" placeholder="Password"><br /><br />
						<input id="submit_login" class="submit_login" type="button" value="Log in"><br /><br />
					</form>
				</div>
		</div>	
		
		<script type="text/javascript" src="./js/jquery.js"></script>
		<script type="text/javascript" src="./js/scripts.js"></script>
		
	</body>
</html>