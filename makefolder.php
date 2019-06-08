<?php 
include 'conn.php';
//The name of the directory that we need to create
//$directoryname = '/users/{username}/images/profilepics'
//We store here the uploaded images
//get username
try
{
	$st = $conn->prepare('SELECT * FROM users WHERE id = :uid');
	$st->bindParam(':uid', $_SESSION['user'], PDO::PARAM_STR);
	$st->execute();
	$row = $st->fetch(PDO::FETCH_ASSOC);
	$gusername = $row['USERNAME'];
} catch(PDOException $e)
{
	echo $e->getMessage();
}
$directoryName = 'users/'.$gusername.'/images/profilepics';

//Check if the directory already exists
if(!is_dir($directoryName))
{
	//Directory does not exist, so lets create it
	mkdir($directoryName, 0755, true);
}

//Target dir
$directoryName = 'users/'.$gusername.'/images/profilepics/';
$target_file = $directoryName . basename($_FILES["fileToUpload"]["name"]);
//Use it to add into database $target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    try
    {
    	//First make an update
    	$statement = $conn->prepare('UPDATE users SET profilepic=:profilepic WHERE id = :uid');
    	$statement->bindParam(':profilepic', $target_file, PDO::PARAM_STR);
    	$statement->bindParam(':uid', $_SESSION['user'], PDO::PARAM_STR);
    	$statement->execute();

    	//After that insert it into image db
    	$statement2 = $conn->prepare('INSERT INTO userimages (uid, url) VALUES (:uid, :url)');
    	$statement2->bindParam(':uid', $_SESSION['user'], PDO::PARAM_STR);
    	$statement2->bindParam(':url', $directoryName, PDO::PARAM_STR);
    	$statement2->execute();

    } catch(PDOException $e)
    {
    	echo $e->getMessage();
    }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<form action="makefolder.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>