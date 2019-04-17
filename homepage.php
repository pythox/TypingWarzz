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
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TypingWarzz - Main Page</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="stylesheet" href="lib/bootstrap-4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="lib/flipclock/flipclock.css">
	<style type="text/css">
		@font-face {
		  font-family: 'Karla';
		  font-style: normal;
		  font-weight: 400;
		  src: url('fonts/Karla-Regular.ttf');
		}
		body {
		  font-family: 'Karla', sans-serif !important;
		}
		.flip-clock-wrapper ul {
		    background: #fff;
		}

		.flip-clock-wrapper ul li a div.up:after {
		    background-color: #fff;
		    background-color: rgba(0, 0, 0, 0.4);
		}

		.flip-clock-wrapper ul li a div div.inn {
		    color: #007bff;
		    text-shadow: 0 1px 1px #555;
		    background-color: #ddd;
		}
	</style>
</head>

<body>
	<!-- NAVBAR ON THE TOP -->
	<div class="container">
		<nav class="navbar navbar-expand-md navbar-light bg-primary navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="/TypingWarzz/homepage.php" class="navbar-brand"><img src="images/logo.png" width=30 length=30></a>
					<span class="navbar-text" style="font-size: 20px;color: white;"> <b> TypingWarzz </b> </span>					
				</div>
		    <ul class="navbar-nav navbar-left">
				<li class="nav-item"> 
					<a href="/TypingWarzz/homepage.php" class="nav-link active"> 
						<b>Home</b>
					</a>
				</li>
				<li class="nav-item"> 
					<a href="/TypingWarzz/profile.php" class="nav-link"> 
						<b>Profile</b>
					</a>
				</li>
				<li class="nav-item"> 
					<a href="/TypingWarzz/aboutus.php" class="nav-link"> 
						<b>About Us</b>
					</a>
				</li>
			</ul>
			<ul class="navbar-nav navbar-right" style="font-size: 14	px;">
		      	<li class="nav-item"> 
					<span class="navbar-text" style="margin-left:5px;margin-right:10px;font-size: 13px;"><b>Rank</b></span>
				</li>
		      	<li class="nav-item">
					<span class="navbar-text" style="margin-left:5px;margin-right:5px;color: white;font-size: 13px;">
					<b><?php echo('@' . $_SESSION['username']);?></b>
					</span>
		      	</li>
		      	<li class="nav-item"> 
					<a href="index.php" class="nav-link" style="margin-left:5px;margin-right:0px;font-size: 13px;"><b>Logout</b></a>
				</li>
			</ul>
		</div>
		</nav>	
	</div>
	<!-- Typing box -->
	<div class="container" style="margin-top: 20px;">
		<div class="row">
			<div class="col-md-8 h-100"  style="min-height:300px;" id="pre_typing">
				<span class="badge badge-danger" style="margin-left:3px;"> Get Ready !! </span>
				<div class="jumbotron" style="min-height: 300px; margin-top:6px;">
					<div class="clock" style="width:300px;margin:0 auto;">
					</div>
				</div>
			</div>
			<div class="col-md-8 h-100"  style="min-height:300px;display: none;" id="results">
				<span class="badge badge-primary" style="margin-left:3px;"> Results </span>
				<div class="jumbotron" style="min-height: 300px; margin-top:6px;" style="font-size: 16px;">
					<b>Match ID : </b><span id="result_id"></span><br>
					<b>Average Speed : </b><span id="result_speed"></span><br>
					<b>Accuracy : </b><span id="result_error"></span><br>
					<b>Total time : </b><span id="result_time"></span><br><br>
					<a href="homepage.php" class="btn btn-primary" role="button">Race Again</a>
					<a href="homepage.php" class="btn btn-info" role="button">See the leaderboard</a>
				</div>
			</div>
			<div class="col-md-8 h-100"  style="min-height:300px;display: none;" id="post_typing">
				<span class="badge badge-primary" style="margin-left:3px;" id="speed"></span>
				<div class="jumbotron" style="min-height: 300px; margin-top:6px;white-space: nowrap;padding: 1%;">
					<p style="margin:2%;">
						<span id="correct"></span>
						<span id="wrong"></span>
						<span id="remaining"></span>
					</p>
				</div>	
			</div>
			<!-- Get the players history from the database -->
			<div class="col-md-4" style="min-height: 300px;">
					<span class="badge badge-info" style="margin-left:3px;"> History </span>
					<table class="table table-bordered" style="font-size: 10px;margin-top:6px;text-align: center;">
						<thead> 
							<tr>
								<td scope="col" class="bg-info"> MatchId </td>
								<td scope="col" class="bg-info"> Average WPM </td>
								<td scope="col" class="bg-info"> Total time taken </td>
							</tr>
						</thead>
						<?php
							$current_user = $_SESSION['username'];
							$query1 = "SELECT match_id, speed, time FROM matches WHERE profile_id='$current_user';";
							$result = mysqli_query($conn, $query1);
							while ($row = mysqli_fetch_assoc($result)) {
							    echo("<tr>");
							    echo("<td>");
							    echo($row['match_id']);
							    echo("</td>");
							    echo("<td>");
							    echo($row['speed']);
							    echo("</td>");
							    echo("<td>");
							    echo($row['time']);
							    echo("</td>");
							  	echo("</tr>");
							}	
						?>
					</table>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-8 h-100">
			<span class="badge badge-info"> Leaderboard </span>
			<table class="table table-bordered" style="font-size: 10px;margin-top:6px;text-align: center;">
				<thead> 
					<tr>
						<td scope="col" class="bg-info"> MatchId </td>
						<td scope="col" class="bg-info"> PlayerId </td>
						<td scope="col" class="bg-info"> WPM </td>
						<td scope="col" class="bg-info"> Time </td>
					</tr>
				</thead>
				<?php
					$current_user = $_SESSION['username'];
					$query1 = "SELECT match_id, profile_id, MAX(speed) as speed, time FROM matches GROUP BY profile_id ORDER BY speed DESC";
					$result = mysqli_query($conn, $query1);
					while ($row = mysqli_fetch_assoc($result)) {
					    echo("<tr>");
					    echo("<td>");
					    echo($row['match_id']);
					    echo("</td>");
					    echo("<td>");
					    echo($row['profile_id']);
					    echo("</td>");
					    echo("<td>");
					    echo($row['speed']);
					    echo("</td>");
					    echo("<td>");
					    echo($row['time']);
					    echo("</td>");
					  	echo("</tr>");
					}	
				?>
			</table>
			</div>
			<div class="col-md-4" style="min-height: 300px;">
				<!-- Display the Ratings ( Query in descending of Avg. speed and then get top 5 results ) -->
				<span class="badge badge-success"> Ratings </span>
				<table class="table table-bordered" style="font-size: 10px;margin-top:6px;text-align: center;">
					<thead> 
						<tr>
							<td scope="col" class="bg-success"> PlayerId </td>
							<td scope="col" class="bg-success"> Avg Speed </td>
							<td scope="col" class="bg-success"> Rank </td>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>

    <script type="text/javascript" src="lib/jquery-3.4.0.min.js"></script>
    <script type="text/javascript" src="lib/bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="lib/flipclock/flipclock.js"></script>
	<script type="text/javascript">
		window.onkeydown = function(e) {
  		if (e.keyCode == 32 && e.target == document.body) {
    		e.preventDefault();
  		}
		};
		var clock = $('.clock').FlipClock(5, {
			clockFace: 'MinuteCounter',
			countdown: true,
			events: true
		});

		const pre_typing = document.getElementById('pre_typing');
		const post_typing = document.getElementById('post_typing');
		const results = document.getElementById('results');

		setTimeout(() => {
        	pre_typing.style.display = 'none';
	    	post_typing.style.display = 'block';
			var match_id = Math.floor(Math.random()*101);
	    	var start_time = Math.round((new Date()).getTime() / 1000);

	    	var str = "<?php 
    			$query1 = "SELECT text_info FROM textdata ORDER BY RAND() LIMIT 1;";
				$result = mysqli_query($conn, $query1);
				while ($row = mysqli_fetch_assoc($result)) {
				    echo($row['text_info']);
				}	
	    		?>";
			var correct = document.getElementById("correct");
			var wrong = document.getElementById("wrong");
			var remaining = document.getElementById("remaining");
			var iNext = 0;
			var wrongCount = 0;
			var typingOn = true;
			var acc_count = 0;
			updatePage();
			document.addEventListener('keydown', function(event){
				if( typingOn==false ) return; 
				if( event.key!="Backspace" && event.key.length>1 ) return;
				if(wrongCount==0){
					if( event.key=="Backspace" ){
						if(iNext>0)
							iNext--;	
					}
					else if( event.key==str[iNext] ){
						iNext++;
						if(iNext==str.length) {
							typingOn = false;
					    	var end_time = Math.round((new Date()).getTime() / 1000);
					    	var current_speed = calc_wpm();
					    	var accuracy = ( str.length - acc_count ) / str.length;
					    	accuracy *= 100;
					    	var total_time = end_time - start_time ;
							document.getElementById("result_speed").textContent= current_speed.toString() + " WPM";
							document.getElementById("result_error").textContent= accuracy.toString() + " %";
							document.getElementById("result_time").textContent = total_time.toString() + " seconds";
							document.getElementById("result_id").textContent = match_id.toString();
					    	$.ajax({
					    		url: "dbhelper.php",
					    		type: 'POST',
					    		data: ({id:match_id, prof:"<?php echo($_SESSION['username']); ?>", speed:current_speed, time:total_time}),
					    		async: true
					    	})
					    	post_typing.style.display = 'none';
					    	results.style.display = 'block';
						}
					}
					else{
						if(wrongCount<str.length-iNext){
							wrongCount++;
							acc_count++;
						}
					}
				}
				else{
					if( event.key=="Backspace" ){
						wrongCount--;	
					}
					else{
						if(wrongCount<str.length-iNext){
							wrongCount++;
							acc_count++;
						}
					}
				}
				updatePage();
			});

			function updatePage(){
				var str1, str2, str3, temp;
				str1 = str.substring(0,iNext);
				str2 = str.substr(iNext,wrongCount);
				str3 = str.substring(iNext+wrongCount, str.length);
				correct.innerHTML = addBreaks(str1);
				wrong.innerHTML = addBreaks(str2);
				remaining.innerHTML = addBreaks(str3);
				current_speed = 0;
				current_speed = calc_wpm();
				document.getElementById("speed").textContent= current_speed.toString() + " WPM";
			}

			function addBreaks(textStr){
				var res = "";
				for(var i=0; i<textStr.length; i++){
					if(textStr[i]==" ")
						res += "&nbsp;<wbr>";
					else 
						res += textStr[i];
				}
				return res;
			}

			function calc_wpm(){
	    		var current_time = Math.round((new Date()).getTime() / 1000);
	    		var time_in_minutes = (current_time - start_time) / 60;
	    		var words_typed = iNext / 5;
	    		var current_speed = words_typed / time_in_minutes; 
	    		current_speed = Math.floor(current_speed);
				return current_speed;
			}

        }, 5500);
</script>
</body>
</html>
