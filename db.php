<?php
	
	$db = new Mysqli;
	
	$db-> connect('localhost','root','mysql','crudtest');
	
	if(!$db) {
		echo "failed";
	}
		
?>