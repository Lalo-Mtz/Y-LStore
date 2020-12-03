<?php
    session_start();
    include("sections.php");
    if($_SESSION['registered'] == true){
        $o = $_GET['op'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Y&L Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/home.css">

    <script src="https://kit.fontawesome.com/eefb3f6366.js" crossorigin="anonymous"></script>
</head>
<body>
    <input type="checkbox" name="" id="check" checked>

    <header class="site-header">

        <div class="site-elements">

            <div class="header-left">
                <label for="check"><i class="fas fa-bars" id="sidebar_btn"></i></label>
                <h1>STORE <span>Y&L</span></h1>
            </div>

            <div class="header-right">
                <a href="funciones/closeSession.php">
                    <button>Logout</button>
                </a>
            </div>

        </div>

    </header>


    <div class="sidebar">

        <div class="profile-data">
            <h4>Gerardo Martínez</h4>
        </div>

        <a href="home.php?op=1"><i class="fas fa-shopping-cart"></i><span>Shopping</span></a>
        <a href="home.php?op=2"><i class="fas fa-users"></i><span>Users</span></a>
        <a href="home.php?op=3"><i class="fas fa-store"></i><span>Products</span></a>
        <a href="home.php?op=4"><i class="fas fa-comments"></i><span>Carrito</span></a>
        <a href="home.php?op=5"><i class="fas fa-sliders-h"></i><span>Settings</span></a>
    </div>

    <main class="content">
        <?php
            switch($o){
                case 5 : settings();
            }
        ?>
        
    </main>
    
    <?php
        }else{
            header("Location: index.html");
        }
    ?>
</body>
</html>