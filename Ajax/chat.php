<?php
	session_start();
	include("../mysql/mysql.php");
	
	$conn = connect();
	$id = $_SESSION['id'];
	$chat = $_SESSION['chat'];
	$sql = "SELECT * FROM mensaje INNER JOIN usuario ON mensaje.idu=usuario.idu WHERE usuario.idu = $chat ORDER BY idm DESC"; //WHERE mensaje.idu=".$id
	$res = $conn->query($sql);
	
	
	while($row = $res->fetch_array()):
		if($chat != 0){
			if($row['idu'] == $id && $row['state'] == 0){

?>
			<div class="message-row your-message">
					<div class="message-text"><?php echo $row['mgs']; ?></div>
					<div class="message-tiem"><?php echo formatearFecha($row['fecha_hora']); ?></div>
			</div>
<?php
			}else{
				if($_SESSION['type'] == 1 && $row['state'] == 1){

?>	
					<div class="message-row your-message">
						<div class="message-text"><?php echo $row['mgs']; ?></div>
						<div class="message-tiem"><?php echo formatearFecha($row['fecha_hora']); ?></div>
					</div>
<?php
				}else{
?>
					<div class="message-row other-message">
							<div class="message-text"><?php echo $row['mgs']; ?></div>
							<div class="message-tiem"><?php echo formatearFecha($row['fecha_hora']); ?></div>
					</div>
<?php 
				}
			}
	}
	endwhile; 
?>