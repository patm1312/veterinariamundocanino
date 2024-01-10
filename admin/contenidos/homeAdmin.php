<?php
 //seccionque se va a cargar en la pagina de homeadmin como pagina de control, controla los usuarios,. si no hay ningun dato por get entonces por defecro  cargo la administracion de usuarios
 $section = isset($_GET['accion']) ? $_GET['accion']:'user';
 switch($section){
     //pagina que se encarga de administrar a los usuarios
     case "user": include("contenidos/usuarios/users.php");
     break;
     //pagina que se encarga de editar contendo de usuarios
     case "editarUser": include("contenidos/usuarios/formularios/editarUser.php");
     break;
     case "eraseU": include("contenidos/usuarios/formularios/eraseUser.php");
     break;
     case "editarMascota": include("contenidos/usuarios/formularios/editarM.php");
     break;
     case "eraseM": include("contenidos/usuarios/formularios/deleteM.php");
     break;
     case "editarCita": include("contenidos/usuarios/formularios/editarC.php");
     break;
     case "deleteCita": include("contenidos/usuarios/formularios/deleteC.php");
     break;
     case "editarH": include("contenidos/usuarios/formularios/editarH.php");
     break;
     case "deleteH": include("contenidos/usuarios/formularios/deleteH.php");
     break;
     case "addH": include("contenidos/usuarios/formularios/addH.php");
     break;
     case "addPac": include("contenidos/usuarios/formularios/addpac.php");
     break;
     default: 
         echo "<p class='error'>La sección solicitada ($section), no existe</p>";
         include( 'contenidos/usuarios/users.php');
     break;
 }
?>
