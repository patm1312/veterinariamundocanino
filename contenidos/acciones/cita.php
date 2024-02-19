<?php
session_start();
if(isset($_POST['citaS'])){
    if(!empty($_POST['citaS'])){
        $servicio = $_POST['citaS'];
        $_SESSION['cita'][0] = $servicio;
        echo "<script>window.location.href='../../index.php?seccion=citaUser'</script>";
    }else{
        $_SESSION['rta_admin'] = "error";
        echo "<script>window.location.href='../../index.php?seccion=cita'</script>";
    }
}else{
    $_SESSION['rta_admin'] = "error";
    echo "<script>window.location.href='../../index.php?seccion=cita'</script>";
}
?>