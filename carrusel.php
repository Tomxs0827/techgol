<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/carrusel.css">
</head>
<body>
    <div class="carrusel-container">
    <div class="carrusel-wrapper">

        <!-- Slides -->
        <div class="carrusel-slide active">
            <img src="img/foto1.png" alt="Foto 1">
            <div class="carrusel-caption">
                <h2>Nueva Colección</h2>
                <p>Descubre las mejores prendas deportivas</p>
                <a href="categoria.php" class="btn-carrusel">Ver más</a>
            </div>
        </div>

        <div class="carrusel-slide">
            <img src="img/foto2.png" alt="Foto 2">
            <div class="carrusel-caption">
                <h2>Las Mejores Marcas</h2>
                <p>Equipos oficiales de tus equipos favoritos</p>
                <a href="marcas.php" class="btn-carrusel">Ver más</a>
            </div>
        </div>

        <div class="carrusel-slide">
            <img src="img/foto3.png" alt="Foto 3">
            <div class="carrusel-caption">
                <h2>Ofertas Especiales</h2>
                <p>Los mejores precios del mercado</p>
                <a href="categoria.php" class="btn-carrusel">Ver ofertas</a>
            </div>
        </div>

        <div class="carrusel-slide">
            <img src="img/foto4.png" alt="Foto 4">
            <div class="carrusel-caption">
                <h2>Envío Gratis</h2>
                <p>En compras mayores a $100.000</p>
                <a href="index.php" class="btn-carrusel">Comprar ahora</a>
            </div>
        </div>

        <div class="carrusel-slide">
            <img src="img/foto5.png" alt="Foto 5">
            <div class="carrusel-caption">
                <h2>¡YA DISPONIBLES!</h2>
                <p>Camisetas retro dese 120.000</p>
                <a href="index.php" class="btn-carrusel">Comprar ahora</a>
            </div>
        </div>

        <!-- Flechas -->
        <button class="carrusel-btn prev" onclick="cambiarSlide(-1)">&#10094;</button>
        <button class="carrusel-btn next" onclick="cambiarSlide(1)">&#10095;</button>

        <!-- Puntos -->
        <div class="carrusel-dots">
            <span class="dot active" onclick="irASlide(0)"></span>
            <span class="dot" onclick="irASlide(1)"></span>
            <span class="dot" onclick="irASlide(2)"></span>
            <span class="dot" onclick="irASlide(3)"></span>
        </div>

    </div>
</div>
</body>
</html>

<script>
let slideActual = 0;
let autoPlay;

function mostrarSlide(n){
    const slides = document.querySelectorAll('.carrusel-slide');
    const dots   = document.querySelectorAll('.dot');

    if(n >= slides.length) slideActual = 0;
    if(n < 0) slideActual = slides.length - 1;

    slides.forEach(s => s.classList.remove('active'));
    dots.forEach(d => d.classList.remove('active'));

    slides[slideActual].classList.add('active');
    dots[slideActual].classList.add('active');
}

function cambiarSlide(n){
    slideActual += n;
    mostrarSlide(slideActual);
    resetAutoPlay();
}

function irASlide(n){
    slideActual = n;
    mostrarSlide(slideActual);
    resetAutoPlay();
}

function resetAutoPlay(){
    clearInterval(autoPlay);
    autoPlay = setInterval(() => {
        slideActual++;
        mostrarSlide(slideActual);
    }, 4000);
}

// Autoplay cada 4 segundos
autoPlay = setInterval(() => {
    slideActual++;
    mostrarSlide(slideActual);
}, 4000);
</script>