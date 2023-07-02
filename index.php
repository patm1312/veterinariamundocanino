<?php
 $section = isset($_GET['seccion']) ? $_GET['seccion']:'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mundo Canino</title>
    <link rel="icon" type="image/x-icon" href="assets/images/word.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css"/>  
</head>
<body>
    <header class="header">
        <a href="index.php?seccion=home" class="enlace__img__logo">
            <div class="img__logo--box">
                <img class="header__boxLogo--imgLogo img__logo--large" src="" alt="prueba de imagen">
            </div>
        </a>
        <a class="enlace_hm" href="">
            <img class="hm__responsive enlace_hm" src="assets/images/menuHm.png" alt="hamburguer">
        </a>
        
            <nav class="nav">
                <ul class="nav__ul">
                    <li class="nav__item"><a class="nav__item" href="index.php?seccion=home">Inicio</a></li>
                    <li class="nav__item"><a class="nav__item" href="index.php?seccion=servicios">Productos/Servicios</a></li>
                    <li class="nav__item"><a class="nav__item" href="index.php?seccion=home">Foro</a></li>
                    <li class="nav__item "><a class="nav__item bottom " href="index.php?seccion=cita">Agenda Tu cita</a></li>
                    <div class="header__boxLogin">
                            <p class="header__boxLogin--p"><a class="header__boxLogin--p" href="index.php?seccion=login">Registro/Login <img class="header__boxLogin--img" src="assets/images/user.png" alt=""></a></p>
                            
                    </div>
                </ul>
            </nav>
        </div>
    </header>
        <main class="main">
        
        <?php
            switch($section){
                case "home": include("contenidos/home.php");
                break;
                case "login": include("contenidos/login.php");
                break;
                case "logout": include("contenidos/logout.php");
                break;
                case "logadd": include("contenidos/logadd.php");
                break;
                case "servicios": include("contenidos/servicios.php");
                break;
                case "cita": include("contenidos/cita.php");
                break;
                case "citaUser": include("contenidos/cita__user.php");
                break;
                case "cita__celular": include("contenidos/cita__celular.php");
                break;
                case "cita__datos": include("contenidos/cita__datos.php");
                break;
                case "cita__fecha": include("contenidos/cita__fecha.php");
                break;
                default: 
					echo "<p class='error'>La sección solicitada ($section), no existe</p>";
					include( 'contenidos/home.php');
            }
        ?>
        <a href="index.php?seccion=cita">
        <img class="main__botonCita" src="assets/images/botoncitas.png" alt="asignar  cita">
        </a>
        
    </main>
    <footer class="footer">
        <div class="img__footer">
            <img class="img__footer" src="assets/images/logotransp.png" alt="">
        </div>
        <div class="">
            <h2 class="footer__boxenlaces--h2">Enlaces Utiles:</h2>
           <a class="enlaces enlaces__footer" href="">Foro</a>
           <a class="enlaces enlaces__footer" href="">Servicios</a>
           <a class="enlaces enlaces__footer" href="">Acerca de</a>
        </div>
        <div class="footer__boxcontacto">
            <h2 class="footer__boxcontacto--h2">Información de contacto:</h2>
                <p class="enlaces">3153704398</p>
                <p class="enlaces">Avenida 3e # 7- 46 Brr. Popular <br> Cucuta, Norte de Santander</p>
        </div>
        <div class="footer__social">
                <h2 class="footer__social--h2">Redes sociales:</h2>
                        <img class="footer__social--img" src="assets/images/facebook.svg" alt="social">
                        <img class="footer__social--img" src="assets/images/instagram.svg" alt="social">
                    
        </div>
    </footer>
    <script src="scripts/index.js"></script>
</body>
</html>