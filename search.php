<!DOCTYPE   HTML>
<?php include("db.php"); 
	
	if(isset($_POST['search'])) {
		
		$name = htmlspecialchars($_POST['search']);
		$sql = "select * from tasks where name like '%$name%'";
		$rows = $db->query($sql);
		
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
				<center> <h1>Todo list</h1></center>
				<button type="button" data-target="#myModal" data-toggle="modal" class="btn btn-success">Add Task</button>
				<button type="button" class="btn btn-default pull-right" onclick="print()">Print</button>
				<hr>
				<br>
				<!-- Modal -->
				<div id="myModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
						
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Add Task</h4>
							</div>
							<div class="modal-body">
								<form method="post" action="add.php">
								<div class="form-group">
									<label for="task">Task Name</label>
								<input type="text" required name="task" id="task" class="form-control">
								</div>
								<input type="submit" name="send" value="Add Task" class="btn btn-success">
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
						
					</div>
				</div>
				<div class="col-md-15 col-md-offset-1">
					
					<div class="col-md-12 text-center">
						<p>Search</p>
						<form action="" method="post" class="form-group" >
							<input type="text" placeholder="Search" name="search" class="form-control">
						</form>
					</div>
					<?php if(mysqli_num_rows($rows) < 1){?>
						
							<h2 class="text-danger text-center">Not found</h2>
							<a href="index.php" class="btn btn-warning">Go Back</a>
							
						<?php }else {?>
					
					
					<table class="table table-hover">
					
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Task</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php while($row = $rows->fetch_assoc()){ ?>
										
							
								<th><?php echo $row['id']; ?></th>
								<td class="col-md-10"><?php echo $row['name']; ?></td>
								<td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a></td>
								<td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
							</tr>
							
							<?php }	?>
							
						</tbody>
					</table>
					<?php }?>

				</div>
			</div>
		</div>
	</body>
</html>