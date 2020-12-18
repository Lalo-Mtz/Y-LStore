<?php
	include("../mysql/mysql.php");
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<!--<link rel="preconnect" href="https://fonts.gstatic.com">-->
	<link href="https://fonts.googleapis.com/css2?family=Mukta+Vaani:wght@200&display=swap" rel="stylesheet">

	<script type="text/javascript">
		function ajax(){
			var req = new XMLHttpRequest();

			req.onreadystatechange = function (){
				if(req.readyState == 4 && req.status == 200){
					document.getElementById('chat').innerHTML = req.responseText;
				}
			}
			req.open('GET', 'chat.php', true);
			req.send();
		}
		//linea que hace que se refresque la páginacada segundo
		setInterval(function(){ajax();}, 1000);
	</script>
</head>
<body onload="ajax();">
	<div id="contenedor">
		<div id="caja-chat">
			<div id="chat"></div>
		</div>
		<form action="index.php" method="POST">
			
			<textarea name="mens" placeholder="Ingresa tu mensaje"></textarea>
			<input type="submit" name="enviar" value="Enviar">
		</form>
		<?php
			$conn = connect();
			if(isset($_POST['enviar'])){
				$nom = $_SESSION['id'];
				$mens = $_POST['mens'];
				$sql = "INSERT INTO mensaje (idu, mgs, state) VALUES ('$nom','$mens', '1')";
				$res = $conn->query($sql);

				if($res){
					echo "<embed lop='flase' src='beep.mp3' hidden='true' autoplay='true'>";
				}
			}
		?>
	</div>
</body>
</html>