<?php
//script editar mascota
    if(isset($_GET['idM']) && isset($_GET['idU'])){
        $dato_consultaM = $_GET['idM'];
        $idUser = $_GET['idU'];
    }else{
        $_SESSION['rta_admin'] == 'DateNull';
        echo "<script>window.location.href='../../../index.php?seccion=AdminPublicaciones&accion=editarpS'</script>";
    }
    //consulto la bd con la publicacion a la que quiero editar para autocomplear en el formulario:
    $c = "SELECT nombre, color, raza, edad, certificados, estado, foto FROM pacientes WHERE idpacientes= :idM AND usuario_idusuario= :idU";
    //preparar la consulta:
    try {
            $stmt = $pdo->prepare($c);
        // Especificamos el fetch mode antes de llamar a fetch()
        //uso metodo execute con el metodo array para vincular el parametro a consultar:
        $stmt->execute(array(":idM" => $dato_consultaM, ":idU" => $idUser));
        // $row = $stmt->fetch();
        $p = $stmt->fetchAll();
    } catch (\Throwable $th) {
        echo $th;
    }

     foreach($p as $r){
             $nombre =  $r->nombre;
             $edad =  $r->edad;
             $raza =  $r->raza;
             $color =  $r->color;
             $foto =  $r->foto;
            }
    $_SESSION['foto'] =  $foto;
    echo  $edad;
    echo  $nombre;
?>
<input type="hidden" id="homeAdmin">
<form enctype="multipart/form-data" class="form contact-form" action="contenidos/usuarios/acciones/updateM.php?idU=<?php echo $idUser;?>&idM=<?php echo $dato_consultaM;?>" method="post">
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
                <p>Edita sus Datos::</p>
                <input name="name" class="input" type="text" value=" <?php echo $nombre; ?>" placeholder="Titulo de Publicacion" title="Titulo  Invalido" pattern="[a-zA-Z ]{1,40}$" required>
                <p>Edita raza  de su mascota:</p>
                <input name="raza" class="input" type="text" value=" <?php echo $raza; ?>" placeholder="Titulo de Publicacion" title="Titulo  Invalido" pattern="[a-zA-Z ]{1,40}$" required>
                <p>Edita el color de su mascota:</p>
                <input name="color" class="input" type="text" value=" <?php echo $color; ?>" placeholder="Titulo de Publicacion" title="Titulo  Invalido" pattern="[a-zA-Z ]{1,40}$" required>
                <p>Edita la edad:</p>
                <input value="<?php echo $edad; ?>" name="edad" class="input" type="tel" placeholder="edad" title="numero incorrecto" pattern="[0-9]{7,10}" required>

                <div id="input_file" class="">
                    <p>Actualiza imagen de su mascota:</p>
                    <input class="" id="archivoDefault" type="file" name="imagen[]" accept=".png, .jpg, .jpeg" tittle="La imagen debe ser cuadrada como minimo">
                    <div>
                        <a href="" class="openImg">
                            <img class="openImg" src="contenidos/publicaciones/assets/default/img.png" alt="foto">
                            <!-- //aqu guardo la rutade la imagen para recuperarla, se puede mostar haciendo click en la imagen visualizar, se usa js. y readIumg.php abre la imagen. -->
                            <input  type="hidden" value="<?php echo $foto;?>">
                        </a>
                    </div>
                    <span class="messaje_form" id="span_input--default"></span>
                </div>
                <div class="bottom box__bottom box__bottom--login">
                    <input id="submit" class="" type="submit" value="Continuar">        
                </div>
    </form>