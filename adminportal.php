<?php 
	session_start();
	if ($_SESSION['id']) {
		echo "Hello " . $_SESSION['id']. ("");
	}
	else
		header("Location: adminlogin.php");

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Admin Portal</title>
</head>
	<link rel="stylesheet" type="text/css" href="styles/adminportal.css">
<body>
	<div class="header">
		<h1>Welcome to Admin Portal!</h1>
	</div>

	<div class="result">
		
		<form method="post" name="f1">
		<p><font size="6"  face="script"> Assign Student Result : </font></p>
		<p>Student ID :
		<input type="text" name="id" required> </p>
		<p>Course Name : 
		<input type="text" name="cname" required></p>
		<p>Faculty Initial : 
		<input type="text" name="ini" required></p>
		<p>Section : 
		<input type="text" name="sec" required></p>
		<p>Semester : 
		<input type="text" name="semester" required></p>
		<p>Obtained Grade : 
		<input type="text" name="grade" required></p>
		<button type="submit" name="done">Submit</button> 
		</form>

		<?php 

		$mydb = mysqli_connect('localhost','root','','project') or die("Couldn't connect to database!");
		if(isset($_POST['done']))
		{
			$id = $_POST['id'];
			$cname = $_POST['cname'];
			$ini = $_POST['ini'];
			$sec = $_POST['sec'];
			$semester = $_POST['semester'];
			$grade = $_POST['grade'];

			$result = mysqli_query($mydb,"INSERT into results values ('$id','$cname','$ini','$sec','$semester','$grade')");
			echo('Grade submitted Successfully!');
		}
		 ?>


	</div>

	<div class="container">
		<form method="post" name="f2">
		<button type="submit" name="stinfo">Get Student info</a></button> <br>
		<button type="submit" name="tcinfo">Get Teacher info</a></button><br>
		</form>


		<?php 

		if (isset($_POST['stinfo'])) 
			{
				$sql=mysqli_query($mydb,"SELECT * FROM students");
 				if(mysqli_num_rows($sql)>=1)
   				{
  					echo "<table border = '1'><tr><th>Name</th><th>Email</th><th>Phone Number</th><th>ID</th><th>Parent's Number</th>";
    				while ($row = mysqli_fetch_assoc($sql)) 
    				{
   						echo "<tr><td>".$row['name']."</td><td>".$row['email']."</td><td>"."0".$row['phone']."</td><td>".$row['id']."</td><td>"."0".$row['guardians_number']."</td>";
    				}
   				}else
   				{
   					echo('No student is currently enrolled!');
   				}
   			}

   		if (isset($_POST['tcinfo'])) 
			{
				$tcl=mysqli_query($mydb,"SELECT * FROM teachers");
 				if(mysqli_num_rows($tcl)>=1)
   				{
  					echo "<table border = '1'><tr><th>Name</th><th>Email</th><th>Phone Number</th>";
    				while ($row = mysqli_fetch_assoc($tcl)) 
    				{
   						echo "<tr><td>".$row['name']."</td><td>".$row['email']."</td><td>"."0".$row['phone']."</td>";
    				}
   				}else
   				{
   					echo('No teacher is currently enrolled!');
   				}
   			}	

		 ?>
	</div>

	<div class="logout">
		
		<p><a href="logout.php">Logout</a></p>

	</div>
</body>
</html>