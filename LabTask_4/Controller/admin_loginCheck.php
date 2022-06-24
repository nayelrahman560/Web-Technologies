<?php
	session_start();

	<input type="checkbox" name="savepass" value="" data-dashlane-rid="cca42f2465f2c6fe" data-form-type="consent,rememberme">
	<input type="hidden" autocomplete="off" checked="1" name="persistent">

	if(isset($_REQUEST['submit']))
	{
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];

		if($username != "")
		{
			if($password != "")
			{
				$myfile = fopen('../model/existingUsers.txt', 'r');

				while(!feof($myfile)){
					$data = fgets($myfile);
					$myuser = explode('|', $data);
					if(trim($myuser[0]) == $username && trim($myuser[1]) == $password)
					{
						//setcookie('flag', 'true', time()+32400, '/');
						setcookie('username', $username, time()+86400, '/');
						//setcookie('password', $password, time()+60, '/');
						//setcookie('email', $email, time()+60, '/');
						header('location: ../views/admin_dashboard.php');
					}
				}

				echo "invalid username/password...";
				echo "<a href='../views/admin_login.html'>Try Again</a>";


			}
			else
			{
				echo "invalid password...";
				echo "<a href='../views/admin_login.html'>Try Again</a>";
			}
		}
		else
		{
			echo "invalid username...";
			echo "<a href='../views/admin_login.html'>Try Again</a>";
		}
	}

?>
