<?php
   if(isset($_SESSION['idSesion'])){
   	header("Location: index.php");
   	exit();
   }
   
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>TLALLIMAP - Inicio</title>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
      <link rel="stylesheet" href="css/main.css" />
      <link rel="stylesheet" href="css/carrusel.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   </head>
   <body class="landing is-preload">
      <!-- Page Wrapper (div principal)-->
      <div id="page-wrapper">
         <!-- Header -->
         <header id="header" class="alt">
            <img src="img/logo2_1.png" width="40" height="40" id="loguito" alt="Tlallimap">
            <h1><a href="main.php">TLALLIMAP</a></h1>
            <nav id="nav">
               <ul>
                  <li class="special">
                     <a href="#menu" class="menuToggle"><span></span></a>
                     <div id="menu">
                        <ul>
                           <li><a href="main.php">Mis rutas</a></li>
                           <li><a href="logout.php">Salir</a></li>
                        </ul>
                     </div>
                  </li>
               </ul>
            </nav>
         </header>
         <main>
            <!-- Banner -->
            <section id="banner">
            <div class="logo">
               <img src="img/logo2_1.png" width="220" height="220" alt="">
            </div>
               <h2>TLALLIMAP</h2>
               <p>Descubre las<br />
                  maravillas de tu<br />
                  ciudad
               </p>
               <ul class="actions text-center">
                  <li><a href="#" id="iniciar" class="button primary">Iniciar</a></li>
               </ul>
            </section>
            <!-- Ruta -->
            <section id="one" class="wrapper style1 special">
               <div class="inner">
                  <header class="major">
                     <h2>Rutas en 
                        <br /> la Ciudad de México
                     </h2>
                  </header>
                  <div class="container text-center" id="rutas">
                     <section>
                        <div class="carousel text-center">
                           <img src="img/carrusel3.jpg" alt="Image 1"/>
                           <img src="img/carrusel1.jpg" alt="Image 2" />
                           <img src="img/carrusel2.png" alt="Image 3" />
                        </div>
                        <div class="content">
                           <h2></h2>
                           <p></p>
                           <br><br>
                           <button id="iniciarRecorrido" class="btn btn-danger btn-block">INICIAR RECORRIDO</button>
                        </div>
                     </section>
                  </div>
               </div>
            </section>
         </main>
         <!-- Footer -->
         <footer id="footer">
            <ul class="copyright">
               <li>&copy; Tlallimap</li>
               <li>Desarrollado por:</li>
               <li>Rosa Reyna González Torres</li>
               <li>Jovanny Ulloa Peñafiel</li>
               <li>2019</li>
            </ul>
         </footer>
      </div>
      <!-- Scripts -->
      <script src="js/jquery/jquery.min.js"></script> 
      <script src="js/jquery/jquery.scrollex.min.js"></script>
      <script src="js/jquery/jquery.scrolly.min.js"></script>
      <script src="js/jquery/browser.min.js"></script>
      <script src="js/jquery/breakpoints.min.js"></script>
      <script src="js/jquery/util.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
      <!-- Para carrusel -->
      <script src="js/carrusel.js"></script>
   </body>
</html>