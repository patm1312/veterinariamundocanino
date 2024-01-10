<?php
//script editar mascota
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        $_SESSION['rta_admin'] == 'DateNull';
        echo "<script>window.location.href='../../../index.php?seccion=AdminUsuarios&accion=editarMascota'</script>";
    }
    //consulto la bd con la publicacion a la que quiero editar para autocomplear en el formulario:
    $c = "SELECT nombre, color, raza, edad, foto, talla, esterilizado, especie, sexo FROM pacientes WHERE idpacientes= :id";
    try {
            $stmt = $pdo->prepare($c);
        // Especificamos el fetch mode antes de llamar a fetch()
        //uso metodo execute con el metodo array para vincular el parametro a consultar:
        $stmt->execute(array(":id" => $id));
        //$stmt->execute([$id]);
        // $row = $stmt->fetch();
        $p = $stmt->fetchAll();
    } catch (\Throwable $th) {
        echo $th;
    }
     foreach($p as $r){
             $nombre =  $r->nombre;
             $color =  $r->color;
             $raza =  $r->raza;
             $edad =  $r->edad;
             $foto =  $r->foto;
             $talla =  $r->talla;
             $esterilizado =  $r->esterilizado;
             $especie =  $r->especie;
             $sexo =  $r->sexo;
            }
    $_SESSION['foto'] =  $foto;
?>
<input type="hidden" id="homeAdmin">
<form enctype="multipart/form-data" class="form contact-form" action="contenidos/user/acciones/updateMasc.php?id=<?php echo $id;?>" method="post">
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
                <p>Edita sus Datos:</p>
                <input name="name" class="input" type="text" value=" <?php echo $nombre; ?>" placeholder="Titulo de Publicacion" title="Titulo  Invalido" pattern="[a-zA-Z ]{1,40}$" required>
                <p>Edita raza  de su mascota:</p>
                <input name="raza" class="input" type="text" value=" <?php echo $raza; ?>" placeholder="Titulo de Publicacion" title="Titulo  Invalido" pattern="[a-zA-Z ]{1,40}$" required>
                <p>Edita el color de su mascota:</p>
                <input name="color" class="input" type="text" value=" <?php echo $color; ?>" placeholder="Titulo de Publicacion" title="Titulo  Invalido" pattern="[a-zA-Z ]{1,40}$" required>
                <p>
                    Especie:<br>
                    <input type="radio" name="especie" value="gato" <?php echo $resultado = $especie != 'gato' ? '' : 'checked'; ?> > Gato<br>
                    <input type="radio" name="especie" value="perro" <?php echo $resultado = $especie != 'perro' ? '' : 'checked'; ?>> Perro
                </p>
                <p>Edad de mascota:</p>
                <input name="edad" class="input" type="text" pattern="^(0|[1-9]|d\d|20)$" value="<?php echo $edad; ?>" placeholder="Años" title="año Invalido" required>
                <input name="edadMes" class="input" type="text" pattern="^(0?[1-9]|1[0-2])$" placeholder="Meses" title="Mes invalido" required>
                <p>
                    sexo:<br>
                    <input type="radio" name="sexo" value="Macho" <?php echo $resultado = $sexo != 'macho' ? '' : 'checked'; ?>>Macho<br>
                    <input type="radio" name="sexo" value="Hembra" <?php echo $resultado = $sexo != 'hembra' ? '' : 'checked'; ?> >Hembra
                </p>
                <p>
                    Talla:<br>
                    <input <?php echo $resultado = $talla != 'pequeño' ? '' : 'checked'; ?> type="radio" name="talla" value="pequeño">Pequeño<br>
                    <input <?php echo $resultado = $talla != 'mediano' ? '' : 'checked'; ?> type="radio" name="talla" value="mediano">Mediano<br>
                    <input <?php echo $resultado = $talla != 'grande' ? '' : 'checked'; ?> type="radio" name="talla" value="grande">Grande
                </p>
                <p>
                    Esterilizado:<br>
                    <input <?php echo $resultado = $esterilizado != 'si' ? '' : 'checked'; ?> type="radio" name="esterilizado" value="si">Si<br>
                    <input <?php echo $resultado = $esterilizado != 'no' ? '' : 'checked'; ?> type="radio" name="esterilizado" value="no">No<br>
                </p>
                <div id="input_file" class="">
                    <p>Actualiza imagen de su mascota:</p>
                    <input class="" id="archivoDefault" type="file" name="imagen[]" accept=".png, .jpg, .jpeg" tittle="La imagen debe ser cuadrada como minimo">
                </div>
                <div class="bottom box__bottom box__bottom--login">
                    <input id="submit" class="" type="submit" value="Continuar">        
                </div>
    </form>