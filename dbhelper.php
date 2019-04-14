<?php
	session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "typingwarzz";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } 
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$prof = $_SESSION['username'];
		$speed = $_POST['speed'];
		$time = $_POST['time'];
		$query = "INSERT INTO `matches` (`match_id`, `profile_id`, `speed`, `rank`, `time`) VALUES (NULL, '$prof', '$speed', 'NOOB', '$time');";
		$query .= "UPDATE `profile` SET `total_speed`=`total_speed`+$speed,`total_races`=`total_races`+1, `total_time`=`total_time` + $time WHERE user_id='$prof';";
		if(mysqli_multi_query($conn,$query))
			echo "Success!!";
		else
			echo "Error";
	}
?>