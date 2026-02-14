<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Para ti ❤️</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family: 'Poppins', sans-serif;
    overflow:hidden;
    background:black;
}

/* PORTADA */
.portada{
    height:100vh;
    width:100%;
    position:relative;
    overflow:hidden;
}

/* GRID IMÁGENES */
.grid-imagenes{
    position:absolute;
    inset:0;
    display:grid;
    grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
    grid-auto-rows:1fr;
}

.grid-imagenes img{
    width:100%;
    height:100%;
    object-fit:cover;
    filter:brightness(1.2);
    transition:0.5s;
}

@media (hover: hover){
    .grid-imagenes img:hover{
        filter:brightness(0.6);
        transform:scale(1.05);
    }
}

/* CAPA OSCURA */
.portada::before{
    content:'';
    position:absolute;
    inset:0;
    background:linear-gradient(to bottom, rgba(0,0,0,0.6), rgba(0,0,0,0.8));
    z-index:1;
}

/* CONTENIDO */
.contenido-portada{
    position:relative;
    z-index:2;
    height:100%;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    text-align:center;
    color:white;
    padding:20px;
}

/* CORAZÓN SVG */
.corazon-linea{
    width:220px;
    margin-bottom:20px;
    animation: latido 2s infinite;
}

.corazon-linea text{
    fill:white;
    font-size:15px;
    font-weight:bold;
}

/* TITULO */
.contenido-portada h1{
    font-size:clamp(2rem, 6vw, 4rem);
    margin-bottom:15px;
    color:#ff4d6d;
    text-shadow:
        0 0 10px #20479c,
        0 0 20px #ff4d6d,
        0 0 40px #ff4d6d;
    animation: aparecer 1.5s ease;
}

@keyframes latido{
    0%,100%{transform:scale(1);}
    50%{transform:scale(1.1);}
}

/* TEXTO */
.contenido-portada p{
    font-size:clamp(1rem, 3vw, 1.6rem);
    margin-bottom:30px;
    max-width:600px;
    line-height:1.6;
}

/* BOTÓN */
.boton-entrar{
    padding:15px 45px;
   background:linear-gradient(45deg,##2D6A4F,#2D6A4F);
    color:white;
    text-decoration:none;
    border-radius:50px;
    font-size:1.2rem;
    font-weight:bold;
    transition:0.4s;
    box-shadow:0 0 20px rgba(77, 255, 181, 0.8);
}

.boton-entrar:hover{
    transform:scale(1.1);
    box-shadow:0 0 40px rgb(22, 85, 16);
}

/* CORAZONES FLOTANDO */
.corazon{
    position:absolute;
    color:#ff4d6d;
    font-size:10px;
    animation: flotar 10s linear infinite;
    opacity:0.6;
}

@keyframes flotar{
    0%{
        transform:translateY(100vh) scale(1);
        opacity:0;
    }
    10%{opacity:1;}
    100%{
        transform:translateY(-10vh) scale(1.3);
        opacity:0;
    }
}

@keyframes aparecer{
    from{
        opacity:0;
        transform:translateY(30px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

/* RESPONSIVE */
@media (max-width:768px){
    .grid-imagenes{
        grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
    }
}
</style>
</head>
<body>

<?php
$estilo = isset($_GET['estilo']) ? $_GET['estilo'] : 'portada';

switch($estilo){
    case "romantico": $carpeta="imagenes/romantico/"; break;
    case "atardecer": $carpeta="imagenes/atardecer/"; break;
    case "playa": $carpeta="imagenes/playa/"; break;
    case "flores": $carpeta="imagenes/flores/"; break;
    case "nuestra": $carpeta="imagenes/nuestra/"; break;
    default: $carpeta="imagenes/"; break;
}

$imagenes = glob($carpeta . "*.{jpg,JPG,jpeg,JPEG,png,PNG,gif,GIF,webp,WEBP}", GLOB_BRACE);
?>

<div class="portada">

    <div class="grid-imagenes">
        <?php
        if($imagenes){
            foreach($imagenes as $img){
                echo "<img src='$img'>";
            }
        }
        ?>
    </div>

    <div class="contenido-portada">

        <!-- CORAZÓN DE LÍNEAS -->
        <svg class="corazon-linea" viewBox="0 0 100 90">
            <path d="M50 80 
                     L20 50 
                     A15 15 0 1 1 50 30 
                     A15 15 0 1 1 80 50 Z"
                  fill="none"
                  stroke="#04693a"
                  stroke-width="3"/>
            <text x="50%" y="55%" text-anchor="middle" dominant-baseline="middle">
                b & y
            </text>
        </svg>

        <h1>💖 Para mi amorcito  💖</h1>

        <p>
            Yosiiii amor, estoy feliz de pasar esta fecha juntos,
            se que vendran muchas mas,  
            Este pequeño detalle es solo una muestra
            de lo mucho que significas para mí.  
            Gracias por estar conmigo y por hacer mis dias  más locos cada día ❤️
        </p>

        <a href="juego.php" class="boton-entrar">
            🍁 Presiona pa jugar k l k  💚
        </a>

    </div>

</div>

<script>
for(let i=0;i<25;i++){
    let corazon=document.createElement("div");
    corazon.classList.add("corazon");
    corazon.innerHTML="❤";
    corazon.style.left=Math.random()*100+"%";
    corazon.style.fontSize=(Math.random()*20+10)+"px";
    corazon.style.animationDuration=(Math.random()*5+5)+"s";
    document.body.appendChild(corazon);
}
</script>

</body>
</html>
