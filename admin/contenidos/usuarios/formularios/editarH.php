<?php
echo 'estoy en editar h';
//script editar cita
    if(isset($_GET['idH'])){
        $dato_consultaHistoria = $_GET['idH'];
        echo 'dato es' .  $dato_consultaHistoria;
    }else{
        $_SESSION['rta_admin'] == 'DateNull';
        echo "<script>window.location.href='../../../index.php?seccion=AdminPublicaciones'</script>";
    }
    //consulto la bd con la publicacion a la que quiero editar para autocomplear en el formulario:
    $c = "SELECT * FROM HistorialMedico WHERE idHistorialMedico =:idHm";
    //preparar la consulta:
    try {
            $stmt = $pdo->prepare($c);
        // Especificamos el fetch mode antes de llamar a fetch()
        //uso metodo execute con el metodo array para vincular el parametro a consultar:
        $stmt->execute(array(":idHm" => $dato_consultaHistoria));
        // $row = $stmt->fetch();
        $p = $stmt->fetchAll();
    } catch (\Throwable $th) {
        echo $th;
    }

     foreach($p as $r){
             $nombre =  $r->nombre;
             $idPaciente =  $r->idpacientes;
             $diagnostico =  $r->diagnostico;
             $hospitalizacion =  $r->hospitalizacion;
             $fechaIngreso =  $r->fechaIngreso;
             $fechaAlta =  $r->fechaAlta;
             $documentos =  $r->documentos;
             $prescripciones =  $r->prescripciones;
            }
?>
<input type="hidden" id="homeAdmin">
<form enctype="multipart/form-data" class="form contact-form" action="contenidos/usuarios/acciones/updateH.php?idH=<?php echo $dato_consultaHistoria;?>" method="post">
        <div class="form__header">
            <!-- <a href="">
                <img class="left" src="assets/images/rght.png" alt="flecha">
            </a> -->
            <img class="form__header--img" src="assets/images/logolarge.png" alt="imagen logo">
            <div>
            </div>
        </div>
        <div class="form__body">    
                <h2 class="form__h2" >Historial de <?php echo $nombre; ?></h2>
                <p>Edita Datos de Historial de : <?php echo $nombre; ?></p>
                <input name="name" class="input" type="text" value=" <?php echo $nombre; ?>" readonly >
                <p>Edita Diagnostico:</p>
                <textarea placeholder="Descripcion" name="diagnostico" rows="10" cols=""><?php echo $diagnostico; ?></textarea>
                <p>Edita  hospitalizacion:</p>
                <textarea placeholder="Descripcion" name="hospitalizacion" rows="10" cols=""><?php echo $hospitalizacion; ?></textarea>
                <p>Edita  prescripciones:</p>
                <textarea placeholder="Descripcion" name="prescripciones" rows="10" cols=""><?php echo $prescripciones; ?></textarea>
                <p>Edita fecha de ingreso:</p>
                <input name="fechaI" class="input" type="datetime-local" value="<?php echo $fechaIngreso; ?>" placeholder="fecha INvalida">
                <p>Edita fecha de alta de Mascota:</p>
                <input name="fechaA" class="input" type="datetime-local" value="<?php echo $fechaAlta; ?>" placeholder="fecha INvalida">
                <div id="input_file" class="">
                    <p>Actualiza documentos:</p>
                    <input class="" id="archivoDefault" type="file" name="doc[]" accept="" tittle="debe ser documento en pdf">
                    <div>
                        <a href="" class="openImg">
                            <img class="openImg" src="contenidos/publicaciones/assets/default/img.png" alt="foto">
                            <!-- //aqu guardo la rutade la imagen para recuperarla, se puede mostar haciendo click en la imagen visualizar, se usa js. y readIumg.php abre la imagen. -->
                            <input  type="hidden" value="<?php echo $foto;?>">
                        </a>
                    </div>
                <div class="bottom box__bottom box__bottom--login">
                    <input id="submit" class="" type="submit" value="Continuar">        
                </div>
    </form>