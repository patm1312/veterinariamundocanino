<?php
    include('../../../../configuracion/conexion.php');
    //este scrip es para procesar los datos enviados por formulario para editar informacion de historias medicas: 
    $_SESSION['rta_admin'];
    //seguridad de la pagina.
    $maximo = 2 * 1024 * 1024; //Tamaño en MB
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
    if(isset($_GET['idH'])){
        $idH = $_GET['idH'];
        $nombre = $_POST['name'];
        $diagnostico = $_POST['diagnostico'];
        $hospitalizacion = $_POST['hospitalizacion'];
        $fechaI = $_POST['fechaI'];
        $fechaA = $_POST['fechaA'];
        $prescripciones = $_POST['prescripciones'];
        $c = "UPDATE HistorialMedico set diagnostico=:diagnostico, hospitalizacion=:hospitalizacion, prescripciones=:prescripciones, fechaUpdate=now()";
        if($fechaI != ''){
            $c = $c .  ",fechaIngreso=:fechaI";
        }
        if($fechaA != ''){
            
            $c = $c .  ",fechaAlta=:fechaA";
        }
        $c = $c .  " WHERE idHistorialMedico=:idHM";

try {
    //preparar la consulta:
    $stm = $pdo->prepare($c);
    //ejecutar la consulta:
    //vincular los dats con bimparams(recomendado):
    //primer argumento es el argumento  que especifico  en la consulta, el segundo parametro es la variable recibida  en el formuario, y  el tercer parametro es el tipo  de dato(PDO::PARAM_STR(es dato string)):
    $stm->bindParam(':diagnostico', $diagnostico, PDO::PARAM_STR);
    $stm->bindParam(':hospitalizacion', $hospitalizacion, PDO::PARAM_STR);
    if($fechaI != ''){
        $stm->bindParam(':fechaI', $fechaI, PDO::PARAM_STR);
    }
    if($fechaA != ''){
        $stm->bindParam(':fechaA', $fechaA, PDO::PARAM_STR);
    }
    $stm->bindParam(':prescripciones', $prescripciones);
    $stm->bindParam(':idHM', $idH);
    //ejecutar la consulta:
    $stm->execute();
} catch (PDOException $exception) {
    echo $exception;
}
    //Si el último identificador insertado es mayor que cero, la inserción funcionó.
    $count = $stm->rowCount();
    if($count > 0){
    $_SESSION['rta_admin'] = "ok_form";
    echo "<script>window.location.href='../../../index.php?seccion=AdminUsuarios&accion=editarH&idH=$idH'</script>";
    }else{
    $_SESSION['rta_admin'] = "error";
    echo "<script>window.location.href='../../../index.php?seccion=AdminUsuarios&accion=editarH&idH=$idH'</script>";
    }
    }
   
        
?>