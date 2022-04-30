<?php 
	include 'db.php';
	if(isset($_GET['id'])) {
	$id =  (int)$_GET['id'];
	
	$sql ="delete from tasks where id = '$id'";
	$val = $db->query($sql);
		
		if($val) {
			header('location: index.php');
			}
	}
	
?>