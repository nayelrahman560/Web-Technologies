<?php
	session_start();

	if(isset($_POST['submit']))
	{
		$currpass = $_POST['currpass'];
		$newpass = $_POST['newpass'];
		$repass = $_POST['repass'];

		$special_characters = preg_match('@[^\w]@', $newpass);

		if($currpass == "" && $newpass == "" && $repass == "")
		{
			echo "<center><h2><font color=red>All the Password field must be filled up";
			header("refresh:3;	url=changePassword.html");
		}
		else if($currpass == $newpass)
		{
			echo "<center><h2><font color=red>Oopss...!! Current Password is cross-matched with New Password ## Please do fix it";
			header("refresh:3;	url=changePassword.html");
		}
		else if(strlen($newpass) < '8')
		{
			echo "<center><h2><font color = red>PASSWORD must be of at least 8 characters";
			header("refresh:3;	url=changePassword.html");
		}
		else if(!$special_characters)
		{
			echo "<center><h2><font color = orange>PASSWORD must contain at least 1 special character/symbol";
			header("refresh:5;	url=changePassword.html");
		}
		else if($currpass != $repass)
		{
			echo "<center><h2><font color=red>Hey...!! New Password is not confirmed yet... New Password must match with the Retyped Password ## Please do fix it";
			header("refresh:5;	url=changePassword.html");
		}
		else
		{
			echo "<center><h2><font color=green>!! Congrats !! your password has been updated !!";
			header("refresh:3;	url=Login.html");
		}
	}
	else
	{
		echo "<center><h2>Something is Wrong...Please Try Again";
		header("refresh:3;	url=changePassword.html");
	}

?>
