<!DOCTYPE HTML>  
<html>
<body>  
<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $dobErr = $degErr = $bloodErr="" ;
$name = $email = $gender = $dob = $degree[] = $blood  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{  if (empty($_POST["name"])) 
	{ 
		$nameErr = "Name is required";
	} 
	else 
	{ 
		$name = $_POST["name"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) 
	{
      $nameErr = "Only letters and white space allowed";
    }
	else if (!preg_match('#^\w+\s\w+#', $name))
	{
		$nameErr = "Name must contains at least two words";
	}
	}
   if (empty($_POST["email"])) 
    {
		$emailErr = "Email is required";
	} 
	else 
	{
    $email = $_POST["email"];
	
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
      $emailErr = "Invalid email format";
    }
	}
	
	if (empty($_POST["dob"])) 
	{
		$dobErr = "Birth Date is required";
	} 
	else 
	{
		$dob = $_POST["dob"];
	}
	if (empty($_POST["gender"])) 
	{
		$genderErr = "Gender is required";
	} 
	else 
	{
		$gender = $_POST["gender"];
	}
	
	if (empty($_POST["degree"])) 
	{
		$degErr = "Degree is required";
	} 
	else 
	{
		$degree = $_POST["degree"];
		
		if (count($_POST['degree']) < 2) 
		{
			$degErr = " Atleast 2 Degrees are required";
		}
	
	}
			
      if (empty($_POST["blood"])) 
	{ 
		$bloodErr = "Blood group is required";
	} 
	else 
	{ 
		$blood = $_POST["blood"];
	}
} 
 ?>


<h1>The fieldset element</h1>

 <fieldset>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
 </fieldset>
 
  <fieldset>
    E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
   </fieldset>
   
  <fieldset>
   Birthday:<input type="date" name="dob" value="<?php echo $dob;?>">
  <span class="error">* <?php echo $dobErr;?></span>
  <br>
    </fieldset>

 <fieldset>
<p>Gender:</p>
 <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="Female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="Male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="Other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br>
 </fieldset>
<fieldset>
<p>DEGREE</p>
	<input type="checkbox" name="degree[]"<?php if (isset($degree) && $degree=="SSC")echo "checked";?> value="SSC">SSC
  
  <input type="checkbox" name="degree[]"<?php if (isset($degree) && $degree=="HSC")echo "checked";?> value="HSC">HSC
  
  <input type="checkbox" name="degree[]"<?php if (isset($degree) && $degree=="BSC")echo "checked";?> value="BSC">BSC

  <input type="checkbox" name="degree[]"<?php if (isset($degree) && $degree=="MSC")echo "checked";?> value="MSC">MSC
  <span class="error">* <?php echo $degErr;?></span>
  <br>
</fieldset>

<fieldset>
<p>Blood Group</p>
  <select name="blood">
    <option value="O+">O+</option>
    <option value="O-">O-</option>
    <option value="A+">A+</option>
<option value="AB+">AB+</option>
    <option value="B+">B+</option>
  </select>
  <span class="error">* <?php echo $bloodErr;?></span>
 </fieldset>
 <input type="submit" value="Submit">
</form>
 
  
  <?php
echo "<h2>Inputs Are:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $dob;
echo "<br>";
echo $gender;
echo "<br>";
echo implode(',', $degree);
echo "<br>";
echo $blood;
?>


</body>
</html>