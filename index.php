<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
   <?php include 'header.php'?>  
   
    <?php include 'carrusel.php'?>
   

   <section class="destacados">

        <h1>Productos Destacados</h1>

        <div class="contenedor-destacadas">

            <div class="producto">
                <img src="img/guayo1.png" alt="">
                <h2>280.000</h2>
            </div>

            <div class="producto">
                <img src="img/tenisbask1.png" alt="">
                <h2>420.000</h2>
            </div>

            <div class="producto">
                <img src="img/uniforme1.png" alt="">
                <h2>120.000</h2>
            </div>

            <div class="producto">
                <img src="img/guantesbox1.png" alt="">
                <h2>240.000</h2>
            </div>


        </div>

    </section>


   <footer> <?php include 'footer.php'?> </footer>
</body>
</html>