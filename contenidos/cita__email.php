<section class="">
    <?php
    if(isset($_SESSION['cita'][0])){
        echo $_SESSION['cita'][0];
        echo '<br>';
        echo $_SESSION['cita'][1];
    }else{
        echo 'no existe  servicio';
    }
       
    ?>
    <div class="h1__box">
            <h1 class="poster__description--h1 poster__description--h1--canva h1__cita"><span class="poster__description--span poster__description--h1--canva h1__cita">A</span><span class="poster__description--span2 poster__description--h1--canva h1__cita">genda</span><br>una cita con nosotros</h1>
    </div>
    <form class="form formdig" action="contenidos/acciones/codigoemail.php" method="post">
        <div class="form__header form__header--cita">
            <a href="index.php?seccion=citaUser">
                <img class="left" src="assets/images/rght.png" alt="flecha">
            </a>
            <img class="form__header--img" src="assets/images/logolarge.png" alt="">
            <div>
                
            </div>
        </div>
        <div class="form__body">    
                <h2 class="form__h2 poster__description--h1" >Valida tu Identificacion</h2>
                <!-- <span class="form__span" >¿Tienes una cuenta? <a class="form--text form--text1" href="index.php?seccion=login">Iniciar Sesion</a></span> -->
                <p class="form__p poster__description--h1">Por favor ingresa el codigo  enviado  a tu correo
                </p>
                <div id="form_dig" class="box_form_dig">
                    <input name="phone__dig1" class="input input_dig" type="text" placeholder="" title="numero incorrecto"
                    pattern="[0-9]{1}" required>
                    <input name="phone__dig2" class="input input_dig" type="text" placeholder="" title="numero incorrecto"
                    pattern="[0-9]{1}" required>
                    <input name="phone__dig3" class="input input_dig" type="text" placeholder="" title="numero incorrecto"
                    pattern="[0-9]{1}" required>
                    <input name="phone__dig4" class="input input_dig" type="text" placeholder="" title="numero incorrecto"
                    pattern="[0-9]{1}" required>
                </div>
                <input class="bottom__form bottom bottom--orange bottom__serv" type="submit" value="Continuar">
                <div class="box__label">
                    <a class="enlace enlace__form" href="index.php?seccion=citaUser">Corregir numero de celular o correo</a>
                </div> 
                <a class="" href="">
                    <div class="form__boxayuda">
                        <img class="form__boxayuda--img" src="assets/images/whatsapp.png" alt="whatsapp">
                        <p class="form__boxayuda--p">¿Necesitas <br> ayuda?</p>
                    </div>
                </a>          
        </div>
    </form>
</section>
