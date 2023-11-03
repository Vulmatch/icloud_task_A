<?php
$target_dir = "logo/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
	
  //Now we save the posted image
  if( $_FILES['fileToUpload']['name'] != "" ) {
    //$path=$_FILES['fileToUpload']['name'];
	
	$info = pathinfo($_FILES['fileToUpload']['name']);
    $ext = $info['extension']; // get the extension of the file
    

    $pathto="logo/raw1.".$ext;
    move_uploaded_file( $_FILES['fileToUpload']['tmp_name'],$pathto) or die( "Could not copy file!");
	
	//Now run python script to resize the image
	$command = escapeshellcmd('resize.py');
    $output = shell_exec($command);
    echo $output;
	
	//Redirect to show page
	header('Location: show.html');
    }
   else {
	echo("error!");
    die("No file specified!");
   }

  } else {
    echo "File is not an image.";
    $uploadOk = 0;
	
 
  }
}
?>