<?php
session_start();
?>
<?php
if((isset($_POST['fechaC']))){
    echo 'no';
    if((!empty($_POST['fechaC'])) ){
        $fechaC = $_POST['fechaC'];
        if(($_SESSION['cita'][2] == true)){
            echo 'la session es : ' . $_SESSION['cita'][2];
            $_SESSION['cita'][3] = $nombre;
            $_SESSION['cita'][4] = $mascota;
            $_SESSION['cita'][5] = $motivo;
            $_SESSION['cita'][6] = $fechaC;
            //se envia informacion al correo electronico y  se verifica si la fehca esa disponible, is es asi, se envia al usuario la fehc de cita al correo electronico, y  se muestra el mensaje ne pantalla llevandolo  al index.php
            unset($_SESSION['cita']);
            echo "<script>window.location.href='../../index.php?seccion=cita'</script>";
            foreach ($_SESSION['cita'] as $key => $value) {
                echo '<br>';
                echo $value;
            }
            echo $_SESSION['cita'][5];
        }else{
            echo 'no valida';
            $_SESSION['rta_admin'] = "error";
    
            echo "<script>window.location.href='../../index.php?seccion=cita'</script>";
        }
    }else{
        $_SESSION['rta_admin'] = "error";
        echo "<script>window.location.href='../../index.php?seccion=cita'</script>";
    }
}else{
    $_SESSION['rta_admin'] = "error";
    //echo "<script>window.location.href='../../index.php?seccion=cita'</script>";
}
?>