<?php
session_start();

$filename = $_FILES['myfile']['name'];
$des = 'screenshots/'.$filename;
$src = $_FILES['myfile']['tmp_name'];

$file_extension = pathinfo($src, PATHINFO_EXTENSION);

if (($file_extension == "jpg" && $file_extension == "png" && $file_extension == "jpeg") && ($_FILES["myfile"]["size"] <= 4000000) && (move_uploaded_file($src, $des)))
{
   $_SESSION['myimage'] = $filename;
   header('location: fileuploaded.php');
   // if ()
   // {
   //    echo "<center><h1><font color=red>Sorry, Image is too large to Upload [4mb is the limit]";
   //    header("refresh:6;	url=FileUpload.html");
   // }
}
else
{
   echo "<center><h1><font color=red>Error in Uploading image";
   header('refresh:2 url=FileUpload.html');
   // code...
}

   // echo "<center><h1><font color=red> Sorry, only jpg, jpeg and png image types are allowed";
   // echo "<center><h1><font color=red>Sorry, Image is too large to Upload [4mb is the limit]";
   // header("refresh:3;	url=FileUpload.html");
?>
