<?php
	session_start();

	if(isset($_POST['submit']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		//$mismatch = $_POST['username'];

		$alpha_numeric	= preg_match('@/^[A-Za-z0-9]+$/@', $username);
		$period	= preg_match('@[ ]@', $username);
		$dash	= preg_match('@[-]@', $username);
		$underscore	= preg_match('@[_]@', $username);

		$special_characters = preg_match('@[^\w]@', $password);

		if($username == "" && $password == "")
		{
			echo "<center><h2><font color = red>Username and Password field cannot be empty";
			header("refresh:3;	url=Login.html");
		}
		else if(!$alpha_numeric && !$period && !$dash && !$underscore)
		{
			echo "<center><h2><font color = red>Username can only contain alpha-numeric characters [ any value within a-z, A-Z, 0-9 ], spacebar [  ], dash [ - ] and underscore [ _ ]<br>";
			echo "<center><h2><font color = blue>Alphabet is mandatory for a username while other characters could also be ignored";
			header("refresh:10;	url=Login.html");
		}
		else if(strlen($username) < '2')
		{
			echo "<center><h2><font color = red>Username must be of at least 2 characters";
			header("refresh:3;	url=Login.html");
		}
		else if(strlen($password) < '8')
		{
			echo "<center><h2><font color = red>PASSWORD must be of at least 8 characters";
			header("refresh:3;	url=Login.html");
		}
		else if(!$special_characters)
		{
			echo "<center><h2><font color = red>PASSWORD must contain at least 1 special character/symbol";
			header("refresh:3;	url=Login.html");
		}
		else
		{
			echo "<center><h2><font color = green>!! Congrats !! you are at your homepage now !!";
			header("refresh:5;	url=Login.html");
		}
	}
	else
	{
		echo "<center><h2>Something is Wrong...Please Try Again";
		header("refresh:3;	url=Login.html");
	}

?>

<!-- //else if($username != preg_match("/^[a-zA-Z0-9 _-]+$/", $mismatch[0])) -->
