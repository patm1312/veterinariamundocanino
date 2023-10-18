<?php
session_start();
 $section = isset($_GET['seccion']) ? $_GET['seccion']:'home';
 //cada vez que el usuario  le da click en el logo de login, depende de s esta logueado o no:
 if(isset($_SESSION['user_id'])){
    $nombre = $_SESSION['user_name'];
    $url_login = 'index.php?seccion=perfil';
 }else{
    $nombre = "Login";
    $url_login = 'index.php?seccion=login';
 }
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
                <img class="header__boxLogo--imgLogo img__logo--large" src="assets/images/logolarge.png" alt="prueba de imagen">
            </div>
        </a>
        <a class="enlace_hm" href="">
            <img class="hm__responsive enlace_hm" src="assets/images/menuHm.png" alt="hamburguer">
        </a>
            <nav class="nav">
                <ul class="nav__ul">
                    <li>
                    <table class="table__search nav__search header-hm  none__search">
                    <tbody>
                        <thead>
                        <th class="tr_flex">
                        <td class="celda__border"><input type="text" name="search" class="search " placeholder="Buscar...">
                            <a href="">
                                    <img class="glass" src="assets/images/image6.png" alt="lupa">
                            </a>
                        </td>
                        </th>
                        </thead>
                        </tbody>

                    </table>
                    </li>
                    
                    <!-- <li class="nav__search header-hm none__search">
                        <div class="box__inline">    
                                <input type="text" name="search" class="search " placeholder="Buscar...">
                        </div>
                        <a href="">
                            <img class="glass" src="assets/images/image6.png" alt="lupa">
                        </a>
                        <img class="closee__menu" src="assets/images/close2.png" alt="hamburguer">
                    </li> -->
                    <li class="nav__none nav__item nav__item--border"><a class="nav__item" href="index.php?seccion=home">Inicio</a></li>
                    <li class="nav__none nav__item nav__item--border"><a class="nav__item" href="index.php?seccion=productos">Productos</a></li>
                    <li class="nav__none nav__item nav__item--border"><a class="nav__item" href="index.php?seccion=servicios">Servicios</a></li>
                    <li class="nav__none nav__item nav__item--border"><a class="nav__item" href="index.php?seccion=home">Blog</a></li>
                    <li class="li__bottom nav__none nav__item nav__item--border "><a class="nav__item bottom bottom__responsive " href="index.php?seccion=cita">Agenda Tu cita</a></li>
                    <!-- mdulode iniciar sesion -->
                    <li class="nav__none nav__item nav__item--border">
                        <div class="header__boxLogin">
                                <p class="header__boxLogin--p"><a class="header__boxLogin--p" href="<?php echo $url_login; ?>"><img class="header__boxLogin--img" src="assets/images/user.png" alt=""><?php echo $nombre; ?></a></p>  
                        </div>
                    </li>
                   <li class="nav__none nav__item ">
                   <a href="">
                        <img class="glass__search" src="assets/images/image6.png" alt="lupa">
                    </a>
                   </li>
                   
                    
                </ul>
                
                <div class="block__menu">
                        <h2>Contactanos:</h2>
                        <div class="block__menu--box">
                            <div  class="block__menu--item">
                                <img class="icon_hm" src="assets/images/whats.png" alt="whatsapp">
                                <p>numero de telefono</p>  
                            </div>
                            <div class="block__menu--item">
                                <img class="icon_hm" src="assets/images/email.png" alt="email">
                                <p>correo</p>  
                            </div>
                            <div class="block__menu--item">
                                <img class="icon_hm" src="assets/images/facebook.svg" alt="">
                                <p>facebbok</p>  
                            </div>
                        </div>
                        
                   </div>
            </nav>
    </header>
        <main class="main">
            
        <?php
        //si existe las esion resppuesta que es el mensaje de esito  o no cuando el ususario hace una peticion al sistema
            if(isset($_SESSION['rta'])){
                //si no pongo  el echo, no valida oksession. invstigar.
                echo "";
                if($_SESSION['rta'] == 'ok__session'){
                    //echo "si existe la sesion se llama logueado";
                    $message = "usuario logueado satisfactoriamente";
                    $clase = 'ok';
                }else if($_SESSION['rta'] == 'error__session'){
                    $message = "revisa los datos correctamente";
                    $clase = 'error';
                }else if($_SESSION['rta'] == 'ok__logadd'){
                    $message = "usuario creado satisfactoriamente";
                    $clase = 'ok';
                }else if($_SESSION['rta'] == 'error'){
                    $message = "revisa los datos correctamente e intentalo mas tarde";
                    $clase = 'error';
                }else if($_SESSION['rta'] == 'error__email_duplicate'){
                    $message = "este correo electronico ya existe";
                    $clase = 'error';
                }
            }
            unset($_SESSION['rta']);
            ?>
            <p class="<?php echo $clase; ?>"><?php echo $message; ?></p>
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
                case "adopta": include("contenidos/contenido__servicios/adopta.php");
                break;
                case "perfil": include("contenidos/user/index.php");
                break;
                case "productos": include("contenidos/productos.php");
                break;
                case "producto": include("contenidos/contenido_productos/producto.php");
                break;
                // case "updatePassword": include("contenidos/user/updatePassword.php");
                //break;
                // case "updateImage": include("contenidos/user/updateImage.php");
                // break;
                // case "pets": include("contenidos/user/mascota/mascota.php");
                // break;
                // case "petsAdd": include("contenidos/user/mascota/Addmascota.php");
                // break;
                default: 
					echo "<p class='error'>La sección solicitada ($section), no existe</p>";
					include( 'contenidos/home.php');
            }
        ?>
        <!-- <a href="index.php?seccion=cita">
        <img class="main__botonCita" src="assets/images/botoncitas.png" alt="asignar  cita">
        </a> -->
    </main>
    <footer class="footer">
        <div class="img__footer">
            <img class="img__footer" src="assets/images/logotransp.png" alt="">
        </div>
        <div class="">
            <h2 class="footer__boxenlaces--h2">Enlaces Utiles:</h2>
            <a class="enlaces enlaces__footer" href="">Servicios</a>
            <a class="enlaces enlaces__footer" href="">Acerca de</a>
            <a class="enlaces enlaces__footer" href="">Politica de Privacidad</a>
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
    <script src="scripts/index.js" type="module"></script>
</body>
</html>