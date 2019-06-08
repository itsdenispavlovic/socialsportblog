<?php
include 'conn.php';
//get
$getlike = @$_GET['cc'];
try
{
	$statement = $conn->prepare('SELECT COUNT(*) FROM likes WHERE postid = :postid AND userid = :userid');
	$statement->bindParam(':postid', $getlike, PDO::PARAM_STR);
	$statement->bindParam(':userid', $_SESSION['user'], PDO::PARAM_STR);
	$statement->execute();
	$numara = $statement->fetchColumn();
	echo $numara;
}
catch(PDOException $e)
{
	echo $e->getMessage();
}
?>