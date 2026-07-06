<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/header.css">
</head>
<body>
     <header>
        <nav>
            <a href="index.php" class="logo"> <img src="img/logo.png" alt="Techgol" class="logo-img">TECHGOL</a>

            <ul class="nav-links" id="navLinks">
                <li><a href="index.php">Inicio</a></li>
                <li class="dropdown">
                    <a href="categoria.php">Categorías</a>
                </li>
                <li class="dropdown">
                    <a href="marcas.php">Marcas</a>
                </li>
                <li class="dropdown">
                <a href="contacto.php">Contacto</a>
              </li> 
                <li class="search-container">
                    <input type="text" class="search-box" placeholder="Buscar prendas">
                </li>
                <li>
                    <a href="#carrito" class="cart-icon">
                        🛒 Carrito
                        <span class="cart-count">3</span>
                    </a>
                </li>

                <?php if(isset($_SESSION['tipo'])){ ?>

                    <?php if($_SESSION['tipo'] == 1){ ?>
                        <!-- Solo Administrador -->
                        <li class="dropdown">
                            <a href="#">⚙️ Dashboard</a>
                            <ul class="dropdown-menu">
                                <li><a href="usuarios.php">👥 Usuarios</a></li>
                                <li> <a href="mensajes.php">📨 Mensajes</a></li>
                                <li><a href="admin_categoria.php">📁 Categorías</a></li>
                                <li><a href="admin_marcas.php">🏷️ Marcas</a></li>
                            </ul>
                        </li>
                    <?php } ?>

                    <?php if($_SESSION['tipo'] == 2){ ?>
                        <!-- Solo Trabajador -->
                        <li class="dropdown">
                            <a href="#">📦 Panel</a>
                            <ul class="dropdown-menu">
                                 <li> <a href="mensajes.php">📨 Mensajes</a></li>
                                <li><a href="admin_categoria.php">📁 Categorías</a></li>
                                <li><a href="admin_marcas.php">🏷️ Marcas</a></li>
                            </ul>
                        </li>
                    <?php } ?>

                    <!-- Todos los logueados ven esto -->
                    <li class="dropdown">
                        <a href="perfil.php">👤 <?php echo $_SESSION['nombre']; ?></a>
                        <ul class="dropdown-menu">
                            <li><a href="perfil.php">Mi Perfil</a></li>
                            <li><a href="editarperfil.php">✏️ Editar Perfil</a></li>
                            <li><a href="logout.php">🚪 Cerrar Sesión</a></li>
                        </ul>
                    </li>

                <?php } else { ?>
                    <!-- Si NO está logueado -->
                    <li><a href="inisesion.php">Iniciar Sesión</a></li>
                    <li><a href="registro.php">Registrarse</a></li>
                <?php } ?>

            </ul>
        </nav>
    </header>