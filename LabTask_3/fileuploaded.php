<?php
	session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<title>Uploaded Image</title>
</head>

<body><center>

   <fieldset>
      <legend>Uploaded Image : </legend>
      <table>
         <tr>
            <td><img src="screenshots/<?=$_SESSION['myimage']?>"  width='400px' height='400px'></td>
         </tr>
         <tr>
            <td colspan="2"><hr></td>
         </tr>
         <tr>
            <td><a href="FileUpload.html"><h1>BACK</a></td>
         </tr>
      </table>
   </fieldset>

</center></body>
</html>
