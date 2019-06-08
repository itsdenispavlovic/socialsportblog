<?php
//Connection
session_start();
try
{	
	$user = 'root';
	$pass = '';
	$conn = new PDO('mysql:host=localhost;dbname=socialsportblog', $user, $pass);
} catch (PDOException $e)
{
	echo $e->getMessage();
}
include_once 'class/User.php';
$user = new User($conn);
?>