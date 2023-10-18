<section class="">
    <div class="h1__box">
            <h1 class="poster__description--h1 poster__description--h1--canva h1__cita"><span class="poster__description--span poster__description--h1--canva h1__cita">R</span><span class="poster__description--span2 poster__description--h1--canva h1__cita">egistra tu mascota </span><br>con Nosotros</h1>
    </div>
    <form class="form" action="" method="post">
        <div class="form__header">
            <!-- <a href="">
                <img class="left" src="assets/images/rght.png" alt="flecha">
            </a> -->
            <img class="form__header--img" src="assets/images/logolarge.png" alt="">
            <div>
                
            </div>
        </div>
        <div class="form__body">    
                <h2 class="form__h2" >Datos de Mascota</h2>
                <!-- <span class="form__span" >¿Tienes una cuenta? <a class="form--text form--text1" href="index.php?seccion=login">Iniciar Sesion</a></span> -->
                <!-- <p class="form__body--p">Para agendar tu cita con nosotros es necesario  que te identifiques, por favor ingresa tu numero de celular para registrarte, si ya tienes una cuenta, por favor <a class="form--text form--text1 a_cita" href="index.php?seccion=login">inicia sesion</a>.
                </p> -->
                <input name="namePet" class="input" type="text" placeholder="Nombre de Mascota" required >
                <!-- <input class="input" type="text" placeholder="Apellido"> -->
                <label for="lang">Especie:</label>
                    <select class="input" name="especie" id="lang">
                        <option value="gato">Gato</option>
                        <option value="perro">Perro</option>
                    </select>
               <label for="raza">Raza:</label>
                    <select class="input" name="especie" id="raza">
                        <option value="gato">Pitbull</option>
                        <option value="perro">Bulldog</option>
                        <option value="perro">Criollo</option>
                        <option value="perro">Siames</option>
                        <option value="perro">Angora</option>
                    </select>
                <input class="input" type="number" placeholder="Edad">
                <label for="sexo">Sexo:</label>
                    <select class="input" name="especie" id="sexo">
                        <option value="gato">Hembra</option>
                        <option value="perro">Macho</option>
                    </select>
                <input class="input" type="text" placeholder="color">
                <textarea class="textarea" name="textarea" rows="5" cols="" placeholder="caraceristicas adicionales"></textarea>
                
                    <div class="">
                    <h2 class="">Subir Imagen</h2>
                        <div>
                            <input class="upload_margin" type="file">
                        </div>
                    </div>
                <div class="bottom box__bottom box__bottom--logout">
                    <input type="submit" value="continuar">
                    <!-- <a class="bottom box__bottom--logout" href="">continuar</a> -->
                </div>
                <div class="box__label">
                    <label class=""><input class="" type="checkbox" id="" value="">Acepto <a class="" href="">Terminos y  Condiciones</a></label>
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

