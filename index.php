<html>
<head>
<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Group Chat</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
// FROM VALIDATION
	function commentSubmit(){
		if(form1.name.value == '' && form1.comments.value == ''){ //exit if one of the field is blank
			alert('Enter your Name and Message !');
			return;
		}
		else if(form1.name.value == ''){ //exit if one of the field is blank
			alert('Enter your Name !');
			return;
		}
		else if(form1.comments.value == ''){ //exit if one of the field is blank
			alert('Enter your Message !');
			return;
		}
		var name = form1.name.value;
		var comments = form1.comments.value;
		var xmlhttp = new XMLHttpRequest(); //http request instance
		
		xmlhttp.onreadystatechange = function(){ //display the content of insert.php once successfully loaded
			if(xmlhttp.readyState==4&&xmlhttp.status==200){
				document.getElementById('comment_logs').innerHTML = xmlhttp.responseText; //the chatlogs from the db will be displayed inside the div section
			}
		}
		xmlhttp.open('GET', 'insert.php?name='+name+'&comments='+comments, true); 
		xmlhttp.send();
		
		
		
		var scroll = false;
function upScroll(){
    if(!scroll){
        var ele = document.getElementById("comment_logs");
        ele.scrollTop = ele.scrollHeight;
    }
	
}
setInterval(upScroll,100);
$("#comment_logs").on('scroll', function(){
    scroll=true;
});
		
		
	}
	
	$(document).ready(function(e) {
			$.ajaxSetup({cache:false});
			setInterval(function() {$('#comment_logs').load('logs.php');}, 2000);
		});
		
		
</script>
</head>
<body>
<div id="container">
	<div class="page_content">
    	 <img src="images/yaali_logo.png" style="width:50px;float:left;margin-top:-17px;"><h3>YAALI GROUP CHAT</h3>
    </div>
	<div id="comment_logs">
    	Loading Chat...
    </div>
    <div class="comment_input">
        <form name="form1">
        	<input type="text" name="name" placeholder="Name..."/></br></br>
            <textarea name="comments" placeholder="Type here..."></textarea></br></br>
            <a href="#" onClick="commentSubmit()" class="button">Send</a></br>
        </form>
    </div>   
</div>


<script type='text/javascript'>

// script to place the scrollbar at the bottom of overflow element
var scrolled = false;
function updateScroll(){
    if(!scrolled){
        var element = document.getElementById("comment_logs");
        element.scrollTop = element.scrollHeight;
    }
	
}
setInterval(updateScroll,100);
$("#comment_logs").on('scroll', function(){
    scrolled=true;
});

</script>

</body>
</html>