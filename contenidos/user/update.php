<section>
    <div class="h1__box">
            <h1 class="poster__description--h1 poster__description--h1--canva h1__cita"><span class="poster__description--span poster__description--h1--canva h1__cita">A</span><span class="poster__description--span2 poster__description--h1--canva h1__cita">ctualiza</span><br>tus datos <span class="poster__description--span2 poster__description--h1--canva h1__cita">Nombre</span></h1>
    </div>
    <form class="form contact-form" action="" method="post">
        <div class="form__header">
            <!-- <a href="">
                <img class="left" src="assets/images/rght.png" alt="flecha">
            </a> -->
            <img class="form__header--img" src="assets/images/logolarge.png" alt="">
            <div>
                
            </div>
        </div>
        <div class="form__body">    
                <h2 class="form__h2" >Datos Personales</h2>
                <!-- <span class="form__span" >¿Tienes una cuenta? <a class="form--text form--text1" href="index.php?seccion=login">Iniciar Sesion</a></span> -->
                <!-- <p class="form__body--p">Para agendar tu cita con nosotros es necesario  que te identifiques, por favor ingresa tu numero de celular para registrarte, si ya tienes una cuenta, por favor <a class="form--text form--text1 a_cita" href="index.php?seccion=login">inicia sesion</a>.
                </p> -->
                <input name="name" class="input" type="text" placeholder="Nombre"  title="Nombre sólo acepta letras y espacios en blanco" pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" required>
                <input class="input" type="text" placeholder="Apellido" name="subname" title="Nombre sólo acepta letras y espacios en blanco" pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" required>
                <input class="input" type="email" name="email" placeholder="email" title="Email incorrecto"
                    pattern="^[a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})$" required>
                <input name="phone" class="input" type="text" placeholder="Telefono" title="numero incorrecto"
                    pattern="[0-9]{7,10}" required>
                <input class="input" type="text" placeholder="Telefono Secundario">
                <input class="input" type="text" placeholder="Direccion">
                <!-- <input class="input" type="text" placeholder="confirmar contraseña"> -->
                <div class="bottom box__bottom box__bottom--logout">
                    <input type="submit" value="actualizar">
                    <!-- <a class="bottom box__bottom--logout" href="">Actualizar</a> -->
                </div>
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