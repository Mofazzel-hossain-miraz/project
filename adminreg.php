<!DOCTYPE html>
<html>
<head>
	<title>Admin Registration</title>
</head>
	<link rel="stylesheet" type="text/css" href="styles/regstyle.css">
<body>
	
		<div class="header">
			<h1 style="left: 45%;"><marquee>University Management</marquee></h1>
			<h2 style="left: 13%;">Admin Registration!</h2>
		</div>
	
	<div class="container">
		<div class="logo">
			<p class="logtext">Fill Up<br>The<br>Registration<br>Form!</p>
		</div>

		<br><br><form class="regform" action="adminreg.php" method="post">
			
			<div>

				<p>Your Name : <input type="text" name="name" placeholder="Name" required></p>

				<p>Admin ID : <input type="number" name="id" placeholder="ID" required></p>

				<p>Email Address : <input type="email" name="email" placeholder="Email" required></p>

				<p>Phone Number : <input type="number" name="phone" placeholder="Phone Number" required></p>

				<p>Password : <input type="password" name="password" placeholder="Password" required></p>
				
				<p>Confirm Password : <input type="password" name="confirm_password" placeholder="Confirm Password" required></p>

				<button type="submit" name="register">Register</button>

			</div>

			<div class="notuser">
				<p>
				<label>Not an admin?</label>
				<label>Register as a <a href="registration.php"><b>student</b></a> or a <a href="teachereg.php"><b>teacher</b></a>.</label>
				</p>
			</div>

			<div class="login">
				
				<label>Already registered? <a href="adminlogin.php"><b>Login here!</b></a></label>

			</div>
		</form>
	</div>

<?php 

	session_start();
	
	$mydb = mysqli_connect('localhost','root','','project') or die("Couldn't connect to database!");
	if(isset($_POST['register']))
	{
		$username = $_POST['name'];
		$id = $_POST['id'];
		$mail = $_POST['email'];
		$phn = $_POST['phone'];
		$password = $_POST['password'];
		$con_pass = $_POST['confirm_password'];

		$sql=mysqli_query($mydb,"SELECT * FROM admins WHERE id=$id");
 			if(mysqli_num_rows($sql)>=1)
   			{
    			echo('ID already exists!');
   			}
 			else
    		{
    			if ($password==$con_pass) {
					$result = mysqli_query($mydb,"INSERT into stuffs values ('$username','$mail','$id','$phn','$password')");
					echo('Registered Successfully!');
					header('Location: adminlogin.php');
				}
				else
					echo('Passwords does not match!');

			}
	}


	 ?>

</body>
</html>