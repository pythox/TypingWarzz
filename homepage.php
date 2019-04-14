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
					<a href="/TypingWarzz/homepage.php" class="navbar-brand"><img src="logo.png" width=30 length=30></a>
					<span class="navbar-text" style="font-family: 'Helvetica';color: white;font-size: 20px;"> <b> TypingWarzz </b> </span>					
				</div>
		    <ul class="navbar-nav navbar-left">
				<li class="nav-item"> 
					<a href="/TypingWarzz/homepage.php" class="nav-link active"> 
						Home
					</a>
				</li>
				<li class="nav-item"> 
					<a href="/TypingWarzz/profile.php" class="nav-link"> 
						Profile
					</a>
				</li>
				<li class="nav-item"> 
					<a href="/TypingWarzz/aboutus.php" class="nav-link"> 
						About Us
					</a>
				</li>
			</ul>
			<ul class="navbar-nav navbar-right" style="font-size: 14	px;">
				<li class="nav-item"> 
					<span class="navbar-text" style="margin-left:5px;margin-right:5px;font-size: 13px;"><b> Speed </b></span>
				</li>
		      	<li class="nav-item">
					<span class="navbar-text" style="margin-left:5px;margin-right:5px;color: white;font-size: 13px;"> <b> Profile Name </b> </span>
		      	</li>
		      	<li class="nav-item"> 
					<a href="#" class="nav-link" style="margin-left:0px;margin-right:5px;font-size: 13px;"> <b> Logout  </b></a>
				</li>
			</ul>
		</div>
		</nav>	
	</div>
	<!-- Typing box -->
	<div class="container" style="margin-top: 20px;">
		<div class="row">
			<div class="col-md-8 h-100"  style="min-height:300px;" id="pre_typing">
				<span class="badge badge-primary" style="margin-left:3px;"> Get Ready !! </span>
				<div class="jumbotron" style="min-height: 300px; margin-top:6px;">
					<div class="clock" style="margin-left: 23%;">
					</div>
				</div>
			</div>

			<div class="col-md-8 h-100"  style="min-height:300px;display: none;" id="results">
				<span class="badge badge-primary" style="margin-left:3px;"> Results </span>
				<div class="jumbotron" style="min-height: 300px; margin-top:6px;">
					<span id="result"></span>
					<a href="homepage.php" class="btn btn-primary" role="button">Race Again</a>
				</div>
			</div>
				
			<div class="col-md-8 h-100"  style="min-height:300px;display: none;" id="post_typing">
				<span class="badge badge-primary" style="margin-left:3px;" id="speed"></span>
				<div class="jumbotron" style="min-height: 300px; margin-top:6px;">
					<p>
						<span id="correct"></span>
						<span id="wrong"></span>
						<span id="remaining"></span>
					</p>
				</div>	
			</div>
			<div class="col-md-4" style="min-height: 300px;">
					<span class="badge badge-primary" style="margin-left:3px;"> History </span>
					<table class="table table-bordered" style="font-size: 10px;margin-top:6px;text-align: center;">
						<thead> 
							<tr>
								<td scope="col" class="bg-primary"> MatchId </td>
								<td scope="col" class="bg-primary"> Average WPM </td>
								<td scope="col" class="bg-primary"> Total time taken </td>
							</tr>
						</thead>
					</table>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-8 h-100">
			<span class="badge badge-primary"> Leaderboard </span>
			<table class="table table-bordered" style="font-size: 10px;margin-top:6px;text-align: center;">
				<thead> 
					<tr>
						<td scope="col" class="bg-primary"> MatchId </td>
						<td scope="col" class="bg-primary"> PlayerId </td>
						<td scope="col" class="bg-primary"> WPM </td>
						<td scope="col" class="bg-primary"> Time </td>
					</tr>
				</thead>
			</table>
			</div>
			<div class="col-md-4" style="min-height: 300px;">
				<span class="badge badge-primary"> Ratings </span>
				<table class="table table-bordered" style="font-size: 10px;margin-top:6px;text-align: center;">
					<thead> 
						<tr>
							<td scope="col" class="bg-primary"> PlayerId </td>
							<td scope="col" class="bg-primary"> Rating </td>
							<td scope="col" class="bg-primary"> Rank </td>
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
	    	// Get the start time
	    	var start_time = Math.round((new Date()).getTime() / 1000);
	    	var str = "this is a simple paragraph that is meant to be nice and easy to type which is why there will be mommas no periods or any capital letters";
			var correct = document.getElementById("correct");
			var wrong = document.getElementById("wrong");
			var remaining = document.getElementById("remaining");

			var iNext = 0;
			var wrongCount = 0;
			var typingOn = true;

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
							document.getElementById("result").textContent= current_speed.toString() + " WPM";
							// Save the total time and Speed to the database
					    	//
					    	post_typing.style.display = 'none';
					    	results.style.display = 'block';
						}
					}
					else{
						if(wrongCount<str.length-iNext)
							wrongCount++;
					}
				}
				else{
					if( event.key=="Backspace" ){
						wrongCount--;	
					}
					else{
						if(wrongCount<str.length-iNext)
							wrongCount++;
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
