<?php
    include('../../../configuracion/conexion.php');
    //este scrip es para procesar los datos enviados por formulario para editar informacion de usuario: 
    $_SESSION['rta_admin'];
    //seguridad de la pagina.
    $maximo = 2 * 1024 * 1024; //Tamaño en MB
    if(isset($_SESSION['user_id'])){
    }else{
        //echo "existe usuario";
        $_SESSION['rta'] = 'noAutorizado';
        echo "<script>window.location.href='/veterinaria/index.php'</script>";
    }
    if(isset($_SESSION['foto'])){
        $foto = $_SESSION['foto'];
    }else{
    }
    if(isset($_GET['id'])){
        if(!empty($_GET['id'])){
             //foto del slider que se envia a travez de session , es la ruta de la imagen que esta en la db de la publicacion en cuestion, q se va a modificar.
    //le quito esta ruta, ya que es la ruta almacenada en la DB, y con esa ruta no puedo elimnar la imagen en el servidor.
    $fotoM = str_replace('/contenidos/usuarios/assets/imgMascotas/', '', $foto);
    unset($_SESSION['foto']);
    $nombre = $_POST['name'];
    $talla = $_POST['talla'];
    $sexo = $_POST['sexo'];
    $esterilizado= $_POST['esterilizado'];
    $raza = $_POST['raza'];
    $color = $_POST['color'];
    $especie = $_POST['especie'];
    $fechaN = $_POST['fechaN'];
    $idM = $_GET['id'];
    if(($_FILES['imagen']['size'][0] > $maximo)){
        $_SESSION['rta_admin'] = "img_big";
        echo "<script>window.location.href='../../../index.php?seccion=AdminUsuarios&accion=editarMascota&idM=$idM&idU=$idU'</script>";
        }else{
            $c = "UPDATE pacientes set nombre=:nombre, raza=:raza, color=:color, fechaNac=:fechaN, esterilizado=:esterilizado, sexo=:sexo, especie=:especie, talla=:talla";
            if(($_FILES['imagen']['size'][0] > 0)){
                //hay imagen de Pservicio cargada 
                $imagenuno = $_FILES['imagen']['name'][0];
                $tmp1_dir = $_FILES['imagen']['tmp_name'][0];
                //este es el recurso q se guarda en la carpeta del servidor
                $upload_diruno = '../../../admin/contenidos/usuarios/assets/imgMascotas/'; // upload directory
                $img1Ext = strtolower(pathinfo($imagenuno,PATHINFO_EXTENSION)); 
                $fotoErase = $upload_diruno . $fotoM;
                $fileImguno = time( ).rand(1,1000).".".$img1Ext;
                //esta es la ruta que se guarda en la bd para acceder a ella desde readImg.php
                $path1DB = '/contenidos/usuarios/assets/imgMascotas/'. $fileImguno;
                //concateno la consulta,
                $c = $c . ", foto=:foto";
                try {
                    //elimino la img del servidor
                    unlink($fotoErase);
                    //cargo la nueva imagen en el servidor.
                    move_uploaded_file($tmp1_dir,$upload_diruno.$fileImguno);
                } catch (\Throwable $th) {
                    echo $th;
                }
            }
            echo '<img class="" src="../../../admin/contenidos/usuarios/assets/imgMascotas/170474918742.png" alt="imagen logo">';
           $c = $c .  " WHERE idpacientes=:idM";
                try {
                    //preparar la consulta:
                    $stm = $pdo->prepare($c);
                    //ejecutar la consulta:
                    //vincular los dats con bimparams(recomendado):
                    //primer argumento es el argumento  que especifico  en la consulta, el segundo parametro es la variable recibida  en el formuario, y  el tercer parametro es el tipo  de dato(PDO::PARAM_STR(es dato string)):
                        echo 'talla es ' . $talla;
                    $stm->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                    $stm->bindParam(':raza', $raza, PDO::PARAM_STR);
                    $stm->bindParam(':color', $color, PDO::PARAM_STR); 
                    $stm->bindParam(':fechaN', $fechaN);
                    $stm->bindParam(':esterilizado', $esterilizado);
                    $stm->bindParam(':sexo', $sexo);
                    $stm->bindParam(':especie', $especie);
                    $stm->bindParam(':talla', $talla);
                    $stm->bindParam(':idM', $idM);
                    if($_FILES['imagen']['size'][0] > 0){
                        $stm->bindParam(':foto', $path1DB);
                    }
                    //ejecutar la consulta:
                    $stm->execute();
                } catch (PDOException $exception) {
                    echo $exception;
                }
                  //Si el último identificador insertado es mayor que cero, la inserción funcionó.
                  $count = $stm->rowCount();
                  if($count > 0){
                      $_SESSION['rta_admin'] = "ok_form";
                      echo "<script>window.location.href='../../../index.php?seccion=perfil'</script>";
                  }else{
                      $_SESSION['rta_admin'] = "error";
                      echo "<script>window.location.href='../../../index.php?seccion=perfil&seccionUser=pet&id=$idM '</script>";
                  }
        }
        }else{
            $_SESSION['rta_admin'] = "error";
            echo "<script>window.location.href='../../../index.php?seccion=perfil'</script>";
        }
    }else{
        $_SESSION['rta_admin'] = "error";
        echo "<script>window.location.href='../../../index.php?seccion=perfil'</script>";
    }
   
?>