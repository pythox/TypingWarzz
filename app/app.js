var str = "this is a simple paragraph that is meant to be nice and easy to type which is why there will be mommas no periods or any capital letters so i guess this means that it cannot really be considered a paragraph but just a series of run on sentences this should help you get faster at typing as im trying not to use too many difficult words in it although i think that i might start making it hard by including some more difficult letters I'm typing pretty quickly so forgive me for any mistakes i think that i will not just tell you a story about the time i went to the zoo and found a monkey and a fox playing together they";

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
} );

function updatePage(){
	var str1, str2, str3, temp;
	str1 = str.substring(0,iNext);
	str2 = str.substr(iNext,wrongCount);
	// if( str2.length>0 && str2[0]==" " )
	// 	str2 = "<span>&nbsp;</span>" + str2.substr(1,str2.length-1);
	str3 = str.substring(iNext+wrongCount, str.length);
	// if( str3.length>0 && str3[0]==" " )
	// 	str3 = "<span>&nbsp;</span>" + str3.substr(1,str3.length-1);
	
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
