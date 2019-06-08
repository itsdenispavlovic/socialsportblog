<?php
include 'conn.php';
//get
$getcomment = @$_GET['cc'];
try
{
	$statement = $conn->prepare('SELECT COUNT(*) FROM comments WHERE userid = :userid AND postid = :postid');
	$statement->bindParam(':userid', $_SESSION['user'], PDO::PARAM_STR);
	$statement->bindParam(':postid', $getcomment, PDO::PARAM_STR);
	$statement->execute();
	$numara = $statement->fetchColumn();
	echo $numara;
}
catch(PDOException $e)
{
	echo $e->getMessage();
}
?>