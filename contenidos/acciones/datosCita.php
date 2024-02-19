<?php
session_start();
?>
<?php
if((isset($_POST['nombre'])) && isset($_POST['mascota'])){
    echo 'no';
    if((!empty($_POST['nombre'])) && !empty($_POST['mascota']) && (($_SESSION['cita'][2] == true)) ){
        $nombre = $_POST['nombre'];
        $mascota= $_POST['mascota'];
        $motivo= $_POST['motivo'];
        echo 'la session es : ' . $_SESSION['cita'][0] . ', ' . $_SESSION['cita'][1] . $_SESSION['cita'][2];
        if(($_SESSION['cita'][2] == true)){
            echo 'nombre' . $nombre;
            echo 'la session es : ' . $_SESSION['cita'][2];
            $_SESSION['cita'][3] = $nombre;
            $_SESSION['cita'][4] = $mascota;
            $_SESSION['cita'][5] = $motivo;
            echo "<script>window.location.href='../../index.php?seccion=cita__fecha'</script>";
            foreach ($_SESSION['cita'] as $key => $value) {
                echo '<br>';
                echo $value;
            }
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