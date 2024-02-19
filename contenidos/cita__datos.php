<section class="">
    <div class="h1__box">
    <input type="hidden" class="form_radio">
            <h1 class="poster__description--h1 poster__description--h1--canva h1__cita"><span class="poster__description--span poster__description--h1--canva h1__cita">A</span><span class="poster__description--span2 poster__description--h1--canva h1__cita">genda</span><br>una cita con nosotros</h1>
    </div>
    <?php
    if(isset($_SESSION['cita'][0])){
        echo $_SESSION['cita'][0];
        echo '<br>';
        echo $_SESSION['cita'][1];
        echo '<br>';
        echo $_SESSION['cita'][2];
    }else{
        echo 'no existe  servicio';
    }
       
    ?>
    <form class="form" action="contenidos/acciones/datosCita.php" method="post">
        <div class="form__header form__header--cita">
            <a href="">
                <img class="left" src="assets/images/rght.png" alt="flecha">
            </a>
            <img class="form__header--img" src="assets/images/logolarge.png" alt="">
            <div>
                
            </div>
        </div>
        <div class="form__body">    
                <h2 class="form__h2 poster__description--h1" >Agenda en pocos pasos</h2>
                <!-- <span class="form__span" >¿Tienes una cuenta? <a class="form--text form--text1" href="index.php?seccion=login">Iniciar Sesion</a></span> -->
                <p class="form__p poster__description--h1">Por favor llena el  siguiente formulario para validar tu cuenta y asignar una cita a tu mascota<a class="enlace__form" href="index.php?seccion=login">inicia sesion</a>.
                </p> 
                <input name="nombre" class="input" type="text" placeholder="Ingresa tu nombre" value="<?php echo $_SESSION['cita'][3]; ?>">
                <h3 class="h3__form poster__description--h1" >Elige tu mascota que tomara el servicio</h3>
                <div class="formJs form__radio">
                    Gato
                    <input type="radio" id="dog" name="mascota" value="gato" <?php echo $resultado =  $_SESSION['cita'][4] == 'gato' ? 'checked' : ''; ?>/>
                </div>
                <div class="formJs form__radio">
                    Perro
                    <input type="radio" id="cat" name="mascota" value="perro" <?php echo $resultado =  $_SESSION['cita'][0] == 'perro' ? 'checked' : ''; ?> />
                </div>
                <textarea name="motivo" id="motivo" cols="30" rows="10" placeholder="motivo consulta"><?php echo $_SESSION['cita'][5]; ?></textarea>
                <input class="bottom__form bottom bottom--orange bottom__serv" type="submit" value="Continuar">
                
                
                <!-- <div class="box__label">
                    <label class=""><input class="" type="checkbox" id="" value="">Acepto <a class="" href="">Terminos y  Condiciones</a></label>
                </div> -->
                <a class="" href="">
                    <div class="form__boxayuda">
                        <img class="form__boxayuda--img" src="assets/images/whatsapp.png" alt="whatsapp">
                        <p class="form__boxayuda--p">¿Necesitas <br> ayuda?</p>
                    </div>
                </a>          
        </div>
    </form>
</section>
