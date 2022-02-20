<?php

session_start();
$message='';

if(isset($_FILES['image'])){
   
    $name=$_FILES['image']['name'];
    $tmpn=$_FILES['image']['tmp_name'];
    $imgType=$_FILES['image']['type'];
    $imgSize=$_FILES['image']['size'];
    $fname='upload/'.$name;
}
//Check whether file already exists
if (file_exists($fname)) {
    echo "Sorry, file already exists.";
    $flag = 0;
  }
//Check FIle Size
if ($_FILES["image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $flag = 0;
  }
//Check file type
if($imgType != "jpg" && $imgType != "png" && $imgType != "jpeg"
&& $imgType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $flag = 0;
}

// Check if $flag is set to 0 by an error
if ($flag == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($tmpn,$name)){
        echo "The file ". $tmpn. " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Image Gallery</h1>
    <p>This page displays the list of uploaded images.</p><br>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="Submit" value="Upload More">
    </form>
</body>
</html>