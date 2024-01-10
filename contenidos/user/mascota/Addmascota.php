<?php
//script añadir mascota

?>
<input type="hidden" id="homeAdmin">
<form enctype="multipart/form-data" class="form contact-form" action="contenidos/user/acciones/addmasc.php" method="post">
        <div class="form__header">
            <!-- <a href="">
                <img class="left" src="assets/images/rght.png" alt="flecha">
            </a> -->
            <img class="form__header--img" src="assets/images/logolarge.png" alt="imagen logo">
            <div>
            </div>
        </div>
        <div class="form__body">    
                <h2 class="form__h2" >Datos de tu Mascota:</h2>
                <p>Nombre:</p>
                <input name="name" class="input" type="text" value="" placeholder="Titulo de Publicacion" title="Titulo  Invalido" pattern="[a-zA-Z ]{1,40}$" required>
                <p>Raza  de su mascota:</p>
                <input name="raza" class="input" type="text" value="" placeholder="Titulo de Publicacion" title="Titulo  Invalido" pattern="[a-zA-Z ]{1,40}$" required>
                <p>Color de su mascota:</p>
                <input name="color" class="input" type="text" value=" " placeholder="Titulo de Publicacion" title="Titulo  Invalido" pattern="[a-zA-Z ]{1,40}$" required>
                <p>
                    Especie:<br>
                    <input type="radio" name="especie" value="gato"> Gato<br>
                    <input type="radio" name="especie" value="perro"> Perro
                </p>
                <p>Edad de mascota:</p>
                <input name="edad" class="input" type="text" pattern="^(0|[1-9]|d\d|20)$" value="" placeholder="Años" title="año Invalido" required>
                <input name="edadMes" class="input" type="text" pattern="^(0?[1-9]|1[0-2])$" placeholder="Meses" title="Mes invalido" required>
                <p>
                    sexo:<br>
                    <input type="radio" name="sexo" value="Macho" >Macho<br>
                    <input type="radio" name="sexo" value="Hembra" >Hembra
                </p>
                <p>
                    Talla:<br>
                    <input type="radio" name="talla" value="pequeño">Pequeño<br>
                    <input  type="radio" name="talla" value="mediano">Mediano<br>
                    <input type="radio" name="talla" value="grande">Grande
                </p>
                <p>
                    Esterilizado:<br>
                    <input  type="radio" name="esterilizado" value="si">Si<br>
                    <input  type="radio" name="esterilizado" value="no">No<br>
                </p>
                <div id="input_file" class="">
                    <p>Sube imagen de su mascota:</p>
                    <input class="" id="archivoDefault" type="file" name="imagen[]" accept=".png, .jpg, .jpeg" tittle="La imagen debe ser cuadrada como minimo">
                </div>
                <div class="bottom box__bottom box__bottom--login">
                    <input id="submit" class="" type="submit" value="Continuar">        
                </div>
    </form>