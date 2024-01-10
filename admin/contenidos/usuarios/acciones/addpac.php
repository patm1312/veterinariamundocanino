<?php
    include('../../../../configuracion/conexion.php');
    //este scrip es para procesar los datos enviados por formulario para crear nueva publicacion: no esta inlcuida en el index, por lo  que la seguridad la repito aqui:
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
    if(isset($_GET['id'])){
        if(!empty($_GET['id'])){
            $id = $_GET['id'];
            $maximo = 2 * 1024 * 1024; //Tamaño en MB
            $titulo = $_POST['tittle'];
            $especie = $_POST['especie'];
            $raza = $_POST['raza'];
            $edadAnios = $_POST['edad'];
            $edadMeses = $_POST['edadMes'];
            $color = $_POST['color'];
            $sexo = $_POST['sexo'];
            $talla = $_POST['talla'];
            $esterilizado = $_POST['esterilizado'];
            $caracter = $_POST['caract'];
            $publicacion = 55;
            $imagenuno;
            $tmp1_dir;
            //si  va a tener una imagen de slider
            $upload_dir; // upload directory
            $img1Ext; 
            $carpeta;
            $path1DB;
            if(($_FILES['imagen']['size'][0] > $maximo)){
                $_SESSION['rta_admin'] = "img_big";
                header("Location: ../../../index.php?seccion=AdminUsuarios&accion=Pac&id=$id");
            }else{
                //la amscota va a estar activa
                $estado = 1;
                if(($_FILES['imagen']['size'][0] > 0)){
                    //hay imagen de Pservicio cargada 
                    $imagenuno = $_FILES['imagen']['name'][0];
                    $tmp1_dir = $_FILES['imagen']['tmp_name'][0];
                    //este es el recurso q se guarda en la carpeta del servidor
                    $upload_diruno = '../assets/'; // upload directory
                    $img1Ext = strtolower(pathinfo($imagenuno,PATHINFO_EXTENSION)); 
                    $fileImguno = time( ).rand(1,1000).".".$img1Ext;
                    //esta es la ruta que se guarda en la bd para acceder a ella desde readImg.php
                    $path1DB = '/contenidos/usuarios/assets/'. $fileImguno;
                    try {
                        move_uploaded_file($tmp1_dir,$upload_diruno.$fileImguno);
                    } catch (\Throwable $th) {
                        echo $th;
                }
            }else{
                //si no  se subio nunguna imagen se va a generar una imagen por defecto
                $path1DB = '/contenidos/usuarios/assets/default/default.jpg';
            }
            $c = "INSERT INTO pacientes (nombre, raza, color, certificados, usuario_idusuario, estado, edad, fechaAlta,  especie, esterilizado, sexo, talla, foto) VALUES(:nombre, :raza, :color, :certificado, :usuario, :estado, :edad, now(), :especie, :esterilizado, :sexo, :talla, :foto)";
                try {
                    //preparar la consulta:
                    $stm = $pdo->prepare($c);
                    //ejecutar la consulta:
                    //vincular los dats con bimparams(recomendado):
                    //primer argumento es el argumento  que especifico  en la consulta, el segundo parametro es la variable recibida  en el formuario, y  el tercer parametro es el tipo  de dato(PDO::PARAM_STR(es dato string)):
                    $stm->bindParam(':nombre', $titulo, PDO::PARAM_STR);
                    $stm->bindParam(':raza', $raza);
                    $stm->bindParam(':color', $color, PDO::PARAM_STR);
                    $stm->bindParam(':certificado', $certificado, PDO::PARAM_STR);
                    $stm->bindParam(':usuario', $id, PDO::PARAM_STR);
                    $stm->bindParam(':estado', $estado, PDO::PARAM_STR);
                    $stm->bindParam(':edad', $edad);
                    $stm->bindParam(':especie', $especie, PDO::PARAM_STR);
                    $stm->bindParam(':esterilizado', $esterilizado, PDO::PARAM_STR);
                    $stm->bindParam(':sexo', $sexo, PDO::PARAM_STR);
                    $stm->bindParam(':talla', $talla, PDO::PARAM_STR);
                    $stm->bindParam(':foto', $path1DB);

                    //ejecutar la consulta:
                    $stm->execute();
                } catch (PDOException $exception) {
                    echo $exception;
                }
                //Si el último identificador insertado es mayor que cero, la inserción funcionó.
                    $lastInsertId = $pdo->lastInsertId();
                if($lastInsertId > 0){
                    $_SESSION['rta_admin'] = "ok_form";
                    echo "<script>window.location.href='../../../index.php?seccion=AdminPublicaciones'</script>";
                }else{
                    $_SESSION['rta_admin'] = "error";
                   echo "<script>window.location.href='../../../index.php?seccion=AdminPublicaciones'</script>";
                };
        
    }
        }else{
            $_SESSION['rta_admin'] = "DateNull";
            echo "<script>window.location.href='../../../index.php?seccion=AdminPublicaciones&accion=addPac'</script>";
        }
            
    }else{
        $_SESSION['rta_admin'] = "DateNull";
            echo "<script>window.location.href='../../../index.php?seccion=AdminPublicaciones&accion=addPac'</script>";
    }
    
    
?>