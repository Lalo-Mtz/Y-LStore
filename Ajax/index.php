<?php
	session_start();
	include("../mysql/mysql.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Chat</title>

	<link rel="stylesheet" type="text/css" href="estilo.css">
	<!--<link rel="preconnect" href="https://fonts.gstatic.com">-->
	<link href="https://fonts.googleapis.com/css2?family=Mukta+Vaani:wght@200&display=swap" rel="stylesheet">


	<script type="text/javascript">

		function ajax(){
			var req = new XMLHttpRequest();

			req.onreadystatechange = function (){
				if(req.readyState == 4 && req.status == 200){
					document.getElementById('chat-message-list').innerHTML = req.responseText;
				}
			}

			req.open('GET', 'chat.php', true);
			req.send();
		}


		//linea que hace que se refresque la páginacada segundo
		setInterval( function(){ajax();} , 1000);


	</script>



</head>



<body onload="ajax();">

	<div id="chat-container">
        <div id="search-container">
            <input type="text" name="" id="" placeholder="Search">
        </div>

        <div id="conversation-list"></div>

        <div id="new-message-container">
            <a href="#">+</a>
        </div>

        <div id="chat-title">
            <span><?php echo $_SESSION['username']?></span>
			<img src="../img/trash-alt-solid.svg" alt="Delete Conversation">
        </div>

        <div id="chat-message-list"></div>

        <div id="chat-form">
			<input type="hidden" id="idu" value='<?php echo $_SESSION['id'];?>'>
			<input type="hidden" id="tipo" value='<?php echo $_SESSION['type'];?>'>
			<img src="../img/paper-plane-regular.svg" alt="attachment-logo.svg">
            <input type="text" placeholder="Type a message" id="sendMe">
            
        </div>
    </div>

	<script src="sendMessage.js"></script>

</body>
</html>