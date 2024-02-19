<section class="">
    <div class="h1__box">
            <h1 class="poster__description--h1 poster__description--h1--canva h1__cita"><span class="poster__description--span poster__description--h1--canva h1__cita">A</span><span class="poster__description--span2 poster__description--h1--canva h1__cita">genda</span><br>una cita con nosotros</h1>
    </div>
    <?php
    if(isset($_SESSION['cita'][0])){
        echo $_SESSION['cita'][0];
        echo '<br>';
        echo $_SESSION['cita'][1];
        echo '<br>';
        echo $_SESSION['cita'][2];
        echo '<br>';
        echo $_SESSION['cita'][3];
        echo '<br>';
        echo $_SESSION['cita'][4];
        echo '<br>';
        echo $_SESSION['cita'][5];
        echo '<br>';
        echo $_SESSION['cita'][6];
    }else{
        echo 'no existe  servicio';
    }
       
    ?>
    <form class="form" action="contenidos/acciones/datosCitaF.php" method="post">
        <div class="form__header form__header--cita">
            <a href="index.php?seccion=cita__datos">
                <img class="left" src="assets/images/rght.png" alt="flecha">
            </a>
            <img class="form__header--img" src="assets/images/logolarge.png" alt="">
            <div>
                
            </div>
        </div>
        <div class="form__body">    
                <h2 class="form__h2 poster__description--h1" >Agenda en pocos pasos</h2>
                <!-- <span class="form__span" >¿Tienes una cuenta? <a class="form--text form--text1" href="index.php?seccion=login">Iniciar Sesion</a></span> -->
                <p class="form__p poster__description--h1">Por favor elige la fecha para tu cita con el medico veterinario</a>.
                </p> 
                <input name="fechaC" class="input" type="datetime-local" value="<?php echo $_SESSION['cita'][6];?>">
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
