<?php
    include('../../../configuracion/conexion.php');
    //este scrip es para actualizar las imaganes de portada y perfil  de un usuario:
    $_SESSION['rta_admin'];
    if(isset($_SESSION['user_id'])){
        if($_SESSION['nivel_usuario'] == 'administrador'){
            //echo "<script>window.location.href='/veterinaria/admin/index.php'</script>";
        }else{
            //echo "No existe usuario administrador";
            $_SESSION['rta'] = 'noAutorizado';
            echo "<script>window.location.href='/veterinaria/index.php?seccion=perfil'</script>";
        }
    }else{
        //echo "existe usuario";
        $_SESSION['rta'] = 'noAutorizado';
        echo "<script>window.location.href='/veterinaria/index.php'</script>";
    }
    $maximo = 2 * 1024 * 1024; //Tamaño en MB
    $imagenuno;
    $tmp1_dir;
    $imagendos;
    //si  va a tener una imagen de portada
    $upload_dir; // upload directory
    $img1Ext; 
    $carpeta;
    $path1DB;
    $path2DB;
    if(isset($_SESSION['fotoperfil'])){
        $fotoperfil = $_SESSION['fotoperfil'];
    }else{
    }
    $fotoPortada = $_SESSION['fotoPortada'];
    
     //le quito esta ruta, ya que es la ruta almacenada en la DB, y con esa ruta no puedo elimnar la imagen en el servidor.
     $fotoDB = str_replace('contenidos/user/assets/img/perfil/', '', $fotoperfil);
     $fotoDBP = str_replace('contenidos/user/assets/img/portada/', '', $fotoPortada);
    unset($_SESSION['fotoperfil']);
    unset($_SESSION['fotoPortada']);
    if(($_FILES['imagen']['size'][0] > $maximo) || ($_FILES['imagen']['size'][1] > $maximo)){
        $_SESSION['rta_admin'] = "img_big";
        header("Location: ../../../index.php?seccion=prefil&seccionUser=updateImage");
    }else{
        if(($_FILES['imagen']['size'][0] > 0) || ($_FILES['imagen']['size'][1] > 0)){
            $c = "UPDATE usuarios SET";
            $usuario = $_SESSION['user_id'];
            if(($_FILES['imagen']['size'][0] > 0)){
                //hay imagen de Pservicio cargada 
                $imagenuno = $_FILES['imagen']['name'][0];
                $tmp1_dir = $_FILES['imagen']['tmp_name'][0];
                //este es el recurso q se guarda en la carpeta del servidor
                $upload_diruno = '../assets/img/perfil/'; // upload directory
                $img1Ext = strtolower(pathinfo($imagenuno,PATHINFO_EXTENSION)); 
                $fotoErase = $upload_diruno . $fotoDB;
                $fileImguno = time( ).rand(1,1000).".".$img1Ext;
                //esta es la ruta que se guarda en la bd para acceder a ella desde readImg.php
                $path1DBp = 'contenidos/user/assets/img/perfil/'. $fileImguno;
                //concateno la consulta,
                $c = $c . " foto=:foto";
                try {
                    //elimino la img del servidor
                    unlink($fotoErase);
                    //cargo la nueva imagen en el servidor.
                    move_uploaded_file($tmp1_dir,$upload_diruno.$fileImguno);
                } catch (\Throwable $th) {
                    echo $th;
                }
            }
            if(($_FILES['imagen']['size'][1] > 0)){
                $c = $c . ", fotoPortada=:fotoP";
                //hay imagen de ContenidoPservicio cargada 
                //imagenes  
                $imagendos = $_FILES['imagen']['name'][1]; 
                $tmp2_dir = $_FILES['imagen']['tmp_name'][1]; 
                $upload_dir2 = '../assets/img/portada/'; // upload directory 
                $img2Ext = strtolower(pathinfo($imagendos,PATHINFO_EXTENSION)); 
                $fileImg2 = time( ).rand(1,1000).".".$img2Ext;
                $path2DBP = 'contenidos/user/assets/img/portada/'. $fileImg2;
                $fotoEraseS = $upload_dir2 . $fotoDBP;
                unlink($fotoEraseS);
                move_uploaded_file($tmp2_dir,$upload_dir2.$fileImg2);
            }
           $c = $c .  " WHERE idusuario=:id";
                try {
                    //preparar la consulta:
                    $stm = $pdo->prepare($c);
                    //ejecutar la consulta:
                    //vincular los dats con bimparams(recomendado):
                    //primer argumento es el argumento  que especifico  en la consulta, el segundo parametro es la variable recibida  en el formuario, y  el tercer parametro es el tipo  de dato(PDO::PARAM_STR(es dato string)):
                        if($_FILES['imagen']['size'][0] > 0){
                            $stm->bindParam(':foto', $path1DBp);
                        }
                        if($_FILES['imagen']['size'][1] > 0){
                            $stm->bindParam(':fotoP', $path2DBP);
                        }
                        $stm->bindParam(':id', $usuario);
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
                   echo "<script>window.location.href='../../../index.php?seccion=perfil'</script>";
               }
        }
        
    }
    
?>