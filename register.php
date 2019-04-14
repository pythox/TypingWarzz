<!DOCTYPE html>
<html>
<head>
	<title> TypingWarzz - Register Page</title>
	<link rel="stylesheet" href="lib/bootstrap-4.3.1/css/bootstrap.min.css"  rel="stylesheet" id="bootstrap-css">
	<script type="text/javascript" src="lib/jquery-3.4.0.min.js"></script>
	<script type="text/javascript" src="lib/bootstrap-4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
	<?php
		$servername = "localhost";
	    $username = "root";
	    $pass = "";
	    $dbname = "typingwarzz";
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
			$query = "INSERT INTO `profile`(`user_id`, `password`, `first_name`, `last_name`, `email`, `profession`, `rank`, `total_speed`, `total_races`, `total_accuracy`, `total_time`, `country`) VALUES ('$username','$password','$first_name','$last_name','$email','$profession', 'Noob', '0', '0', '0', '0', '$country');";
			if(mysqli_query($conn,$query))
			{
				echo "Success!!";
				$url = "index.php";
		        header('Location: '.$url);
		        exit();
			}
			else
			{
				echo "Error";
			}
		}
	?>
	<style type="text/css">
	body {
        font-family: 'Karla', sans-serif !important;
    }
	</style>
</head>
<body>
	<div class="container">
		<hr>
		<div class="row justify-content-center" style="margin-top: 5%;">
			<div class="col-md-6">
				<div class="card">
					<header class="card-header">
						<a href="index.php" class="float-right btn btn-outline-primary mt-1">Log in</a>
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
									<label>Profession</label>
									<input name="profession" type="text" class="form-control">
								</div> <!-- form-group end.// -->
								<div class="form-group col-md-6">
									<label>Country</label>
									<input name="country" type="text" class="form-control">
								</div> 
							</div> <!-- form-row.// -->
							<div class="form-group">
								<label>Create password</label>
								<input name="password" class="form-control" type="password">
							</div> <!-- form-group end.// -->  
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block"> Register  </button>
							</div> <!-- form-group// -->      
						</form>
					</article> <!-- card-body end .// -->
				</div> <!-- card.// -->
			</div> <!-- col.//-->
		</div> <!-- row.//-->
	</div>
</body>
</html>



