<?php
	session_start();
	include("../mysql/mysql.php");
	$conn = connect();
	$id = $_SESSION['id'];
	$sql = "SELECT * FROM mensaje INNER JOIN usuario ON mensaje.idu=usuario.idu"; //WHERE mensaje.idu=".$id
	$res = $conn->query($sql);
	while($row = $res->fetch_array()):
?>
		<div id="datos-chat">
			<span style="color: #1c62c4;"> <?php echo $row['nombre']; ?></span>
			<span style="color: #848484;"> <?php echo $row['mgs']; ?></span>
			<span style="float: right;"> <?php echo formatearFecha($row['fecha_hora']); ?></span>
		</div>
<?php endwhile; ?>