<?php
//si un usuario esta logueado no deberia ver esta pagina.
     if (isset($_SESSION['user_id'])) {
         header('Location:index.php');
       }
        //si esta seteado el serverreferer pues vo a laurl que estaba pero si no existe pues voy al index.php:
        $_SESSION['referer'] = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER']:'../index.php';
?>
<section class="">
    <div class="h1__box">
            <h1 class="poster__description--h1 poster__description--h1--canva h1__cita"><span class="poster__description--span poster__description--h1--canva h1__cita">L</span><span class="poster__description--span2 poster__description--h1--canva h1__cita">ogueate</span><br>aqui</h1>
    </div>
    <form class="form contact-form" action="formularios/login.php" method="post">
        <div class="form__header">
            <!-- <a href="">
                <img class="left" src="assets/images/rght.png" alt="flecha">
            </a> -->
            <img class="form__header--img" src="assets/images/logolarge.png" alt="">
            <div>
                
            </div>
        </div>
        <div class="form__body">    
                <h2 class="form__h2" >Iniciar Sesion</h2>
                <span class="form__span" >¿Eres nuevo? <a class="form--text form--text1 enlace" href="index.php?seccion=logout"> Registrate</a></span>
                
                <input name="email" class="input" type="email" placeholder="Ingresa tu correo" title="Email incorrecto" pattern="[a-zA-Z0-9!#$%&'*\/=?^_`\{\|\}~\+\-]([\.]?[a-zA-Z0-9!#$%&'*\/=?^_`\{\|\}~\+\-])+@[a-zA-Z0-9]([^@&%$\/\(\)=?¿!\.,:;]|\d)+[a-zA-Z0-9][\.][a-zA-Z]{2,4}([\.][a-zA-Z]{2})?" required>
                <input name="password" class="input" type="password" placeholder="Ingresa tu contraseña" required >
                <div class="bottom box__bottom box__bottom--login">
                    <input class="" type="submit" value="Continuar">
                </div>
                <span class="form__span form__span-password" ><a class="form--text form--text1 enlace" href="index.php?seccion=logadd">Recuperar contraseña</a></span>
                <a class="" href="">
                    <div class="form__boxayuda">
                        <img class="form__boxayuda--img" src="assets/images/whatsapp.png" alt="whatsapp">
                        <p class="form__boxayuda--p">¿Necesitas <br> ayuda?</p>
                    </div>
                </a>          
        </div>
    </form>
</section>