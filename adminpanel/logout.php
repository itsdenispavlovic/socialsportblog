<?php
include '../conn.php';
if($user->logout())
{
	$user->redirect('/socialsportblog/index.php');
}
?>