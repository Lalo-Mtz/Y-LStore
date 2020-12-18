<link rel="stylesheet" href="css/princ.css">
<section class="m-c">

<div class="">
    <div class="">
        <section class="">
            <center>
                <br>
                <img src="img/gif.gif" class="im1">
                <br><br><br><br><br><br>
                <form name="buscar" method="get" >
                    <input type="text" name="busc" size="50">
                    <input type="hidden" name=op value="0">
                    <a href="home.php"><button >Buscar</button></a>
                </form>
            </center>
        </section>
                
        <section class="tema">
            <center>
                <?php
                    //session_start();
                    //class="temp" para gif
                    include ("mysql/mysql.php");
                    $conn = connect();
                    $sql2 = "SELECT COUNT(DISTINCT categoria) total FROM categoria";
                    $res = $conn->query($sql2);
                    $res = $res->fetch_assoc();
                    $totalCat = array_pop($res);

                    if(isset($_GET['busc'])==false){
                        for($i=0; $i<$totalCat; $i++){
                            echo '<br><br><br><br><div class="secMa">';
                            $sql = "SELECT * FROM producto INNER JOIN categoria ON producto.idca=categoria.idca WHERE categoria.idca=".($i+1);
                            //echo 'TODO';
                            $result = $conn->query($sql);
                            if($result->num_rows > 0){
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
                            }
                            echo '</div>';
                        }
                    }
                    else{
                        echo '<br><br><br><br><div class="secBus">';
                        $sql = "SELECT * FROM producto INNER JOIN categoria ON producto.idca=categoria.idca WHERE nombre LIKE '%".$_GET['busc']."%'".
                        " OR categoria.categoria LIKE '%".$_GET['busc']."%'";
                        //echo 'BUSQUEDA';
                        $result = $conn->query($sql);
                        if($result->num_rows > 0){
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
                        }
                        echo '</div>';
                    }                
                ?>
            </center>
        </section>
    </div>
</div>

</section>