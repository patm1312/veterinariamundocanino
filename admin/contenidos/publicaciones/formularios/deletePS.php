<?php
    include('../../../../configuracion/conexion.php');
    echo $prueba;
    echo 'estoy en pserviciopubic',
    //este scrip es para eliminar una publicacion, es un borrado inteligente, no va a aestar activa al publicacion, pero no se va a viusalizar en las publicaciones en la web.: 
    $_SESSION['rta_admin'];
    //seguridad de la pagina:
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

    if(isset( $_GET['idp'] ) && isset( $_GET['idPS'] )){
        if((!empty($_GET['idp'])) && (!empty($_GET['idPS']))){
            
            echo 'no vacios';
            $estado = 0;
            $idP = $_GET['idp'];
            $idPS = $_GET['idPS'];
            echo '<br>';
            echo $idP;
            echo $idPS;
            echo '<br>';
            $c = "UPDATE PServicio set estado=:estado, fechaAlta=now() WHERE idPservicio=:idp AND publicaciones_idpublicaciones=:idPS";
            echo $c;
            echo '<br>';
            $stm = $pdo->prepare($c);
            $stm->bindParam(':idp', $idPS, PDO::PARAM_INT);
            $stm->bindParam(':idPS', $idP, PDO::PARAM_INT);
            $stm->bindParam(':estado', $estado, PDO::PARAM_INT);
            //ejecutar la consulta:
            try {
            $stm->execute();
            } catch (\Throwable $th) {
                echo $th;
            }
            //Si el último identificador insertado es mayor que cero, la inserción funcionó.
            $count = $stm->rowCount();
            echo $count;
            if($count > 0){
                $_SESSION['rta_admin'] = "ok_form";
                echo 'salta a la 1';
                echo "<script>window.location.href='index.php?seccion=AdminPublicaciones'</script>";
            }else{
                $_SESSION['rta_admin'] = "error";
                echo 'salta a la dos';
                //echo "<script>window.location.href='index.php?seccion=AdminPublicaciones'</script>";
            }
        }else{
            $_SESSION['rta_admin'] = "error";
            //echo "<script>window.location.href='index.php?seccion=AdminPublicaciones'</script>";
        }
        
    }else{
        $_SESSION['rta_admin'] = "error";
        //echo "<script>window.location.href='index.php?seccion=AdminPublicaciones'</script>";
    }
?>
