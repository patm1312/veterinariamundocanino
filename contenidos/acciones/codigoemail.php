<?php
session_start();
echo 'se valida el codigo enviado al correo, suponiend q es verdadero';
$validar = true;


?>
<?php
if((isset($_POST['phone__dig1'])) && isset($_POST['phone__dig2']) && isset($_POST['phone__dig3']) && isset($_POST['phone__dig4'])){
    if((!empty($_POST['phone__dig1'])) && !empty($_POST['phone__dig2']) && !empty($_POST['phone__dig3']) && !empty($_POST['phone__dig4']) && (!empty($_SESSION['cita']))){
        $uno = $_POST['phone__dig1'];
        $dos= $_POST['phone__dig2'];
        $tres = $_POST['phone__dig3'];
        $cuatro = $_POST['phone__dig4'];
        $digito =  $uno;
        $digito .= $digito . $dos;
        $digito .= $digito . $tres;
        $digito .= $digito . $cuatro;
        echo 'la session es : ' . $_SESSION['cita'][0] . ', ' . $_SESSION['cita'][1];
        if(($validar == true) && (!empty($_SESSION['cita'][0])) && ($validar == true)){
            echo 'digito es :' . $digito;
            echo 'la session es : ' . $_SESSION['cita'];
            $_SESSION['cita'][2] = $validar;
            echo "<script>window.location.href='../../index.php?seccion=cita__datos'</script>";
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
    echo "<script>window.location.href='../../index.php?seccion=cita'</script>";
}
?>