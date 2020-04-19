<?php
session_start();
include_once('connection.php');
//$query="select * from signin";
$result=mysqli_query($con,"select * from signin") or die("could not fetch query".mysqli_error());
?>

<html>
	<head>
		<title>Home Page</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
<div class="container">
	<table align="center" border="1px" style="width: 600px; line-height: 40px;">
			<tr>
				<th colspan="4"><h2>Users Record</h2></th>
			</tr>
			<t>
				<th>Id</th>
				<th>Name</th>
				<th>Password</th>
			</t>
		
	<?php
if(isset($_POST['submitDeletion'])){
	$key = $_POST['KeyToDelete'];

	$check = mysqli_query($con,"select * from signin where id = '$key'") or die("not found".mysqli_error());
	if(mysqli_num_rows($check)>0){
$queryDelete=mysqli_query($con,"DELETE from signin where id = '$key'") or die("not deleted".mysqli_error());
?>
<div class="alert alert-success">
	<p>Record deleted !!</p>
</div>
<?php
header('location:home.php');
?>
	}
	else{
		<div class="alert alert-warning">
		<p>Record does not exist!</p></div>
<?php	}
}

?>			
<?php
$sql="select * from signin";
$result=mysqli_query($con,$sql);
$r1=mysqli_num_rows($result);
if($r1>0){

			while($rows=mysqli_fetch_assoc($result))
			{?>
				<tr>
					<td><?php echo $rows['Id']; ?></td>
					<td><?php echo $rows['Name']; ?></td>
					<td><?php echo $rows['Password']; ?></td>
					<td>
						<input type="checkbox" name="KeyToDelete" value="<?php echo $rows['Id']; ?>" required>
					</td>
					<td>
						<input type="submit" name="submitDeletion" class="btn btn-info">
					</td>
				</tr>
				<?php 
			}
			}
			?>
		</table>
		<a href="logout.php" class="float-right">LOGOUT</a>
	</div>
	</body>
</html>