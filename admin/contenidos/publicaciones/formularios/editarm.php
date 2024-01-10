<?php
    if(isset($_GET['id'])){
        $dato_consulta = $_GET['id'];
    }else{
        $_SESSION['rta_admin'] == 'DateNull';

        echo "<script>window.location.href='../../../index.php?seccion=AdminPublicaciones&accion=editarM'</script>";
    }
    //consulto la bd con la publicacion a la que quiero editar para autocomplear en el formulario:
    $c = "SELECT nombre, especie, raza, edad, sexo, talla, esterilizado, color, foto FROM PAdopta WHERE idPAdopta=?";
    //preparar la consulta:
    try {
            $stmt = $pdo->prepare($c);
        // Especificamos el fetch mode antes de llamar a fetch()
        //uso metodo execute con el metodo array para vincular el parametro a consultar:
        $stmt->execute([$dato_consulta]);
        // $row = $stmt->fetch();
        $p = $stmt->fetchAll();
    } catch (\Throwable $th) {
        echo $th;
    }
    $nombre;
    $especie;
    $raza;
    $edad;
    $sexo;
    $talla;
    $esterilizado;
    $color;

     foreach($p as $r){
        $nombre =  $r->nombre;;
        $especie =  $r->especie;;
        $raza =  $r->raza;
        $edad =  $r->edad;
        $sexo =  $r->sexo;
        $talla=  $r->talla;
        $esterilizado=  $r->esterilizado;
        $color=  $r->color;
        $foto =  $r->foto;
    }
    echo '<br>';
    $_SESSION['foto'] =  $foto;

?>
<input type="hidden" id="homeAdmin">
<form enctype="multipart/form-data" class="form contact-form" action="contenidos/publicaciones/acciones/updateM.php?id=<?php echo $dato_consulta;?>" method="post">
        <div class="form__header">
            <!-- <a href="">
                <img class="left" src="assets/images/rght.png" alt="flecha">
            </a> -->
            <img class="form__header--img" src="assets/images/logolarge.png" alt="imagen logo">
            <div>
            </div>
        </div>
        <div class="form__body">    
                <h2 class="form__h2" >Datos de Mascota:</h2>
                <p>Nombre de mascota:</p>
                <input value="<?php echo $nombre; ?>" name="tittle" class="input" type="name"  placeholder="Titulo de Publicacion" title="Nombre Invalido" pattern="[a-zA-Z ]{1,40}$" required>
                <p>
                    Especie:<br>
                    <input <?php echo $resultado =  $especie == 'gato' ? 'checked' : ''; ?> type="radio" name="especie" value="gato"> Gato<br>
                    <input <?php echo $resultado =  $especie == 'perro' ? 'checked' : ''; ?> type="radio" name="especie" value="perro"> Perro
                </p>
                <p>Raza de mascota:</p>
                <input value="<?php echo $raza; ?>" name="raza" class="input" type="name"  placeholder="Titulo de Publicacion" title="Raza Invalida" pattern="[a-zA-Z ]{1,40}$" required>
                <p>Edad de mascota:</p>
                <input value="<?php echo $edad; ?>" name="edad" class="input" type="text" pattern="^(0|[1-9]|d\d|20)$" placeholder="Años" title="año Invalido" required>
                <input value="<?php echo $edad; ?>" name="edadMes" class="input" type="text" pattern="^(0?[1-9]|1[0-2])$" placeholder="Meses" title="Mes invalido" required>
                <input value="<?php echo $color; ?>" name="color" class="input" type="name"  placeholder="Color" title="color invalido" pattern="[a-zA-Z ]{1,40}$" required>
                <p>
                    sexo:<br>
                    <input <?php echo $resultado = $sexo == 'macho' ? 'checked' : ''; ?> type="radio" name="sexo" value="macho">Macho<br>
                    <input <?php echo $resultado =  $especie == 'hembra' ? 'checked' : ''; ?> type="radio" name="sexo" value="hembra">Hembra
                </p>
                <p>
                    Talla:<br>
                    <input <?php echo $resultado =  $talla == 'pequeño' ? 'checked' : ''; ?> type="radio" name="talla" value="pequeño">Pequeño<br>
                    <input <?php echo $resultado =  $talla == 'mediano' ? 'checked' : ''; ?> type="radio" name="talla" value="mediano">Mediano<br>
                    <input <?php echo $resultado =  $talla == 'grande' ? 'checked' : ''; ?> type="radio" name="talla" value="grande">Grande
                </p>
                <p>
                    Esterilizado:<br>
                    <input <?php echo $resultado =  $esterilizado == 'si' ? 'checked' : ''; ?> type="radio" name="esterilizado" value="si">Si<br>
                    <input <?php echo $resultado =  $esterilizado == 'no' ? 'checked' : ''; ?> type="radio" name="esterilizado" value="no">No<br>
                </p>
                <div id="input_file" class="">
                    <p>Actualiza imagen de tu publicacion:</p>
                    <input class="" id="archivoDefault" type="file" name="imagen[]" accept=".png, .jpg, .jpeg" tittle="La imagen debe ser cuadrada como minimo">
                    <div>
                        <a href="" class="openImg">
                            <img class="openImg" src="contenidos/publicaciones/assets/default/img.png" alt="foto">
                            //aqu guardo la rutade la imagen para recuperarla, se puede mostar haciendo click en la imagen visualizar, se usa js. y readIumg.php abre la imagen.
                            <input  type="hidden" value="<?php echo $foto;?>">
                        </a>
                    </div>
                    <span class="messaje_form" id="span_input--default"></span>
                </div>
                <div class="bottom box__bottom box__bottom--login">
                    <input id="submit" class="" type="submit" value="Continuar">        
        </div>
    </form>