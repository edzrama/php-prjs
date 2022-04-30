<!DOCTYPE   HTML>
<?php include("db.php"); 
	
if(isset($_GET['id'])) {
	$id =  (int)$_GET['id'];
	
	$sql ="select * from tasks where id = '$id'";
	$rows = $db->query($sql);
		if($rows) {
			$row = $rows->fetch_assoc();
		}
	}
if(isset($_POST['send'])) {	
	// prevent injections
	$task =  htmlspecialchars($_POST['task']);
	$sql ="update tasks set name = '$task' where id = '$id'";
	$db->query($sql);
	$val = $db->query($sql);
		if($val) {
			header('location: index.php');
			}
	}
	
?>
<html>
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel   ="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		
		<title>CRUD App</title>
	</head>
	<body>
		<div class = "container">
			<div class="row" style="margin-top: 70px;">
				<center> <h1>Update Record <?php echo $id;?>  - <?php echo $row['name'];?></h1></center>
				<hr>
				<br>
								<form method="post">
								<div class="form-group">
									<label for="task">Task Name</label>
								<input type="text" required name="task" id="task" class="form-control" value="<?php echo $row['name'];?>">
								</div>
								<input type="submit" name="send" value="Update Task" class="btn btn-success">
								&nbsp;
								<a href="index.php" class="btn btn-default">Back</a>
								</form>

			</div>
		</div>
	</body>
</html>