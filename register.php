<!DOCTYPE html>
<html>
<head>
	<title> TypingWarzz - Register Page</title>
	<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="lib/bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
	<?php
		$servername = "localhost";
	    $username = "root";
	    $pass = "";
	    $dbname = "type_racer";
	    $conn = mysqli_connect($servername, $username, $pass, $dbname);
	    if (!$conn) {
	    	die("Connection failed: " . mysqli_connect_error());
	    } 
		if($_SERVER["REQUEST_METHOD"]=='POST')
		{
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$country = $_POST['country'];
			$query1 = "INSERT INTO `register`(`user_name`, `password`, `first_name`, `last_name`, `email`, `country`) VALUES ('$username','$password','$first_name','$last_name','$email','$country');";
			$query1 .= "INSERT INTO `login`(`user_name`, `password`) VALUES('$username','$password');";
			if(mysqli_multi_query($conn,$query1))
			{
				echo "Success!!";
				$url = "/typeracer/login.php";
		        header('Location: '.$url);
		        exit();
			}
			else
			{
				echo "Error";
			}
		}
	?>
</head>
<body>
	<div class="container">
		<hr>
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<header class="card-header">
						<a href="login.phps" class="float-right btn btn-outline-primary mt-1">Log in</a>
						<h4 class="card-title mt-2">Sign up</h4>
					</header>
					<article class="card-body">
						<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
							<div class="form-row">
								<div class="col form-group">
									<label>First name </label>   
									<input name="first_name" type="text" class="form-control" placeholder="">
								</div> <!-- form-group end.// -->
								<div class="col form-group">
									<label>Last name</label>
									<input name="last_name" type="text" class="form-control" placeholder=" ">
								</div> <!-- form-group end.// -->
							</div> <!-- form-row end.// -->
							<div class="form-group">
								<label>Usename</label>
								<input name="username" type="text" class="form-control" placeholder="">
							</div> <!-- form-group end.// -->
							<div class="form-group">
								<label>Email address</label>
								<input name="email" type="email" class="form-control" placeholder="">
								<small class="form-text text-muted">We'll never share your email with anyone else.</small>
							</div> <!-- form-group end.// -->	
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>City</label>
									<input name="city" type="text" class="form-control">
								</div> <!-- form-group end.// -->
								<div class="form-group col-md-6">
									<label>Country</label>
									<select name="country" id="inputState" class="form-control">
										<option> Choose...</option>
										<option>Uzbekistan</option>
										<option>Russia</option>
										<option selected="">United States</option>
										<option>India</option>
										<option>Afganistan</option>
									</select>
								</div> <!-- form-group end.// -->
							</div> <!-- form-row.// -->
							<div class="form-group">
								<label>Create password</label>
								<input name="password" class="form-control" type="password">
							</div> <!-- form-group end.// -->  
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block"> Register  </button>
							</div> <!-- form-group// -->      
							<small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>                                          
						</form>
					</article> <!-- card-body end .// -->
					<div class="border-top card-body text-center">Have an account? <a href="login.php">Log In</a></div>
				</div> <!-- card.// -->
			</div> <!-- col.//-->
		</div> <!-- row.//-->
	</div>
</body>
</html>



