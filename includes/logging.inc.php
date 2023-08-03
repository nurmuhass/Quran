<? session_start(); ?>

<!--
	Name: Memorization Tester
	Author (s): teampiccolo
-->

<?php
	include '../includes/connect.inc.php';
?>

<?php
	if(isset($_POST['email_address_login'], $_POST['password_login'])){
		$email_address_login = stripslashes(htmlentities($_POST['email_address_login'])); 
		$password_login = stripslashes(htmlentities(md5(md5('qwertyuioplmnbvcxza'.$_POST['password_login'].'asdfghjklpoiuytrewq'))));
			if(!empty($email_address_login)){
				if(!empty($password_login)){
					$query = $handler->query("SELECT `id`, `username` FROM `users` WHERE `username`='$email_address_login' && `password`='$password_login'");
						if($query->rowCount() == 1){
							$query_row = $query->fetch();
								$user_id = $query_row['id'];
								$user_name = $query_row['username'];
								$_SESSION['user_id'] = $user_id;
									$_SESSION['user_name'] = $user_name;
										if(isset($_SESSION['user_id'])){
											echo '<script type="text/javascript">
												window.location = "./dashboard/index.php";
											  </script>';
									}else{
											echo '<b>ERROR</b>: Please check your login details and try again';	
										}
						}else{
							echo '<b>ERROR</b>: The password you entered for the username <b>'.$email_address_login.'</b> is incorrect';
						}
				}else{
					echo 'Password field empty...';
				}
			}else{
				echo 'Username field empty...';
			}
	}else{
		echo 'Error: Please contact your database administrator';
	}
?>