
<?php
session_start();
if(isset($_POST['email'])){
    if(!empty($_POST['email'])){
        //se envia el codigo  al email y s eguarada el email  en la session
        $email = $_POST['email'];
        $_SESSION['cita'][1] = $email;
        echo "<script>window.location.href='../../index.php?seccion=cita__email'</script>";
    }else{
        $_SESSION['rta_admin'] = "error";
        echo "<script>window.location.href='../../index.php?seccion=cita'</script>";
    }
}else{
    $_SESSION['rta_admin'] = "error";
    echo "<script>window.location.href='../../index.php?seccion=cita'</script>";
}
?>