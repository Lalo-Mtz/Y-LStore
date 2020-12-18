<link rel="stylesheet" href="css/princ.css">
<section class="m-c">
<br>
<img src="img/gif.gif" class="im1">
<!--<br><br><br><br><br><br><br><br>-->

<?php
        //session_start();
        //class="temp" para gif
        include ("mysql/mysql.php");
        $conn = connect();
        
        $sql2 = "SELECT COUNT(DISTINCT categoria) total FROM categoria";
        $res = $conn->query($sql2);
        $res = $res->fetch_assoc();
        $totalCat = array_pop($res);
        
        for($i=0; $i<$totalCat; $i++){
            echo '<div class="secMa">';
            $sql = "SELECT * FROM producto INNER JOIN categoria ON producto.idca=categoria.idca WHERE categoria.idca=".($i+1);
            $result = $conn->query($sql);
            if($result->num_rows > 0){
//                echo '<div class="divP">';
                while($row = $result->fetch_assoc()){
                    
                    
?>
                    <table class="catSec">
                                <tr>
                                    <td><a href="home.php?op=10&idp=<?php echo $row['idp'] ?>"><img src="<?php echo $row['imagen'] ?>"></a></td>
                                </tr>

                                <tr>
                                    <td><h5><a href="home.php?op=10&idp=<?php echo $row['idp'] ?>" class="nomP"> <?php echo $row['nombre'] ?></a></h5></td>
                                </tr>

                                <tr>
                                    <td><i>Calificaci&oacute;n: <?php echo $row['calificacion'] ?></i></td>
                                </tr>

                                <tr>
                                    <td><b>$ <?php echo $row['precio'] ?></b></td>
                                </tr>
                            </table>
                        <!--<h3> echo $row['categoria'] ?></h3>-->
    <?php
                }
               // echo '</div>';
            }
            else{
                echo "<H2 ALIGN=CENTER>No hay productos de la categoria</H2>";
            }
            echo'</div>';
        }
?>
</section>