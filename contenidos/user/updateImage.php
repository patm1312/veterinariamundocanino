<?php
    $id = $_SESSION['user_id'];
?>
<section class="section">
    <div class="h1__box">
            <h1 class="poster__description--h1 poster__description--h1--canva h1__cita"><span class="poster__description--span poster__description--h1--canva h1__cita">C</span><span class="poster__description--span2 poster__description--h1--canva h1__cita">ambia tu </span><br>foto de perfil</h1>
    </div>
    <div>
        <div class="box_linedonwn">
            <h1 class="h2 h2__perfil">Imagen de portada</h1>
        </div>
        <form enctype="multipart/form-data" class="form contact-form" action="contenidos/user/acciones/updateimage.php?id=<?php echo $id; ?>" method="post">
            <h2 class="h2 h2--servicios">Subir Imagen</h2>
            <div class="">
            <div id="input_file" class="img_perfil">
                    <p>Elige una imagen acorde  para tu perfil:</p>
                    <img class="img_perfil--img" src="assets/images/userperfil.png" alt="pencil editar">
                    <input class="" id="archivoDefault" type="file" name="imagen[]" accept=".png, .jpg, .jpeg" tittle="La imagen debe ser cuadrada como minimo" required >
                    <span class="messaje_form" id="span_input--default"></span>
            </div>
            <div id="input_file" class="img_perfil">
                    <p>Elige una imagen de portada:</p>
                    <img class="img_perfil--img" src="assets/images/default/userperfil.png" alt="pencil editar">
                    <input class="" id="archivoSlider" type="file" name="imagen[]" accept=".png, .jpg, .jpeg" tittle="formato de imagen  debe ser rectangular como minimo">
                    <span class="messaje_form" id="span_input--slider"></span>
            </div>
            <div class="bottom box__bottom box__bottom--login">
                    <input id="submit" class="" type="submit" value="Continuar">        
        </div>
                
            </div>
            
        </form>
    </div>
</section>