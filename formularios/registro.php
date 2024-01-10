<?php
    include('../configuracion/conexion.php');
    $nombre = $_POST['name'];
    $apellido = $_POST['subname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $clave = $_POST['password'];
    //funcion password hash, ver explicacion en word, parametrod, la clave que me llego, el metood o algoritmo par aencryptar y  el costo, que es el numero  de vecs que se genera una encryptacion sobre el resultado cada vez q se envia.
    $password_encrypt = password_hash($clave, PASSWORD_DEFAULT, ['cost' => 10] );
        $c = "INSERT INTO usuarios ( nombre,apellido,email,clave,fechaAlta, foto, fotoPortada) VALUES(:nombre, :apellido, :email, :clave, NOW(), :foto, :fotoP)";
        $foto = 'contenidos/user/assets/img/default/perfil.jpg';
        $fotoP = 'contenidos/user/assets/img/default/portada.png';
       
            try {
                    //preparar la consulta:
                $stm = $pdo->prepare($c);
                //ejecutar la consulta:
                //vincular los dats con bimparams(recomendado):
                //primer argumento es el argumento  que especifico  en la consulta, el segundo parametro es la variable recibida  en el formuario, y  el tercer parametro es el tipo  de dato(PDO::PARAM_STR(es dato string)):
                $stm->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $stm->bindParam(':apellido', $apellido, PDO::PARAM_STR);
                $stm->bindParam(':email', $email, PDO::PARAM_STR);
                $stm->bindParam(':foto', $foto, PDO::PARAM_STR);
                $stm->bindParam(':fotoP', $fotoP, PDO::PARAM_STR);
                $stm->bindParam(':clave', $password_encrypt, PDO::PARAM_STR);
                    //ejecutar la consulta:
                    $stm->execute();
               
            } catch (PDOException $exception) {
            }
             //Si el último identificador insertado es mayor que cero, la inserción funcionó.
            $lastInsertId = $pdo->lastInsertId();
    if($lastInsertId > 0){
        $_SESSION['rta'] = "ok__logadd";
    }else{
        $_SESSION['rta'] = "error";
        $error = $stm->errorInfo();
        $mystring = $error[2];
        $findme   = 'duplicate';
        $pos = stripos($mystring, $findme);
        if ($pos === false) {
        
        } else {
            $_SESSION['rta'] = "error__email_duplicate";
        }
    };

    header("Location: ../index.php?seccion=logout");
?>