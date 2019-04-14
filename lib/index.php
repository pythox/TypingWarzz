<!DOCTYPE html>
<html>
<head>
	<title>TypingWarzz - Main Page</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
	<center>
		<div id="typebox">
			<p>
				<span id="correct"></span>
				<span id="wrong"></span>
				<span id="remaining"></span>
			</p>
		</div>
	</center>

	<script type="text/javascript">
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
					if(iNext==str.length)
						typingOn = false;
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
</script>
</body>
</html>
