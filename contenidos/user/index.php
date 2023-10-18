<?php
 $sectionUser = isset($_GET['seccionUser']) ? $_GET['seccionUser']:'home';
 if (!isset($_SESSION['user_id'])) {
    header('Location:index.php');
  }
?>
<section class="closeModal__acciones closeModal__acciones__section">
    <input type="hidden" id="hiddenPerfil">
        <div class="portada">
            <div class="windowopen modal__none">
                                    <a class="enlace_acciones" href="index.php?seccion=perfil&seccionUser=updatePassword">
                                        <p class="closeModal__acciones">Cambiar Contraseña</p>
                                    </a>
                                    <a class="enlace_acciones none" href="index.php?seccion=perfil&seccionUser=updateImage">
                                        <p class="closeModal__acciones">Cambiar Imagenes</p>
                                    </a>
                                    <a class="enlace_acciones none" href="index.php?seccion=perfil&seccionUser=home">
                                        <p class="closeModal__acciones">Inicio</p>
                                    </a>
                                    <a class="enlace_acciones" href="contenidos/user/logout.php">
                                        <p class="closeModal__acciones">Logout</p>
                                    </a>
                                    
            </div>
                <div class="acciones">
                   <a class="" href="index.php?seccion=perfil&seccionUser=home">
                        <div class="acciones--user">
                            <p class=" accion_perfil--p responsive">Inicio
                            </p>
                        </div>
                    </a>
                
                    <a class="accion_perfil" href="">
                        <div class="acciones--user">
                            <img class="accion_perfil" src="assets/images/acciones.png" alt="">
                            <p class="accion_perfil accion_perfil--p responsive">Acciones 
                            </p>
                        </div>
                    </a>
                    <a class="responsive" href="index.php?seccion=perfil&seccionUser=updateImage">
                        <div class="acciones--img">
                            <img src="assets/images/pencil.png" alt="">
                            <p>Cambiar Imagenes</p>
                        </div>
                    </a>
                    
                </div>
                <img class="img__portada" src="assets/images/portadadogs.jpg" alt="">
                <div class="preview_portada">
                    <img class="previewperfil" src="assets/images/userperfil.png" alt="foto_preview">
                    <div class="previewperfil--info">
                        <h1 class="h2">Nombre usuario usuario </h1>
                        <p>Usuario</p>
                        <p>telefono</p>

                    </div>
                </div>

        </div>
        <!-- <div>
            <div class="header__perfil">
                <a class="a_block" href="">
                    <div class="a_block--container">
                        <p class="h2--servicios perfil_nav">Informacion de personal </p>
                        <img class="previewperfil" src="assets/images/flechaabajo.png" alt="foto_preview">
                    </div>
                    
                </a>
                <a class="a_block" href="">
                    <div class="a_block--container">
                        <p class="h2--servicios perfil_nav">MIs mascotas </p>
                        <img class="previewperfil" src="assets/images/flechaabajo.png" alt="foto_preview">
                    </div>
                    
                </a>
                <a class="a_block" href="">
                    <div class="a_block--container">
                        <p class="h2--servicios perfil_nav">mis productos </p>
                        <img class="previewperfil" src="assets/images/flechaabajo.png" alt="foto_preview">
                    </div>
                    
                </a>
            </div>
        </div> -->
    
    <div class="datos">
        <?php
        echo $_SESSION['nivel_usuario'];
        if (isset($_SESSION['nivel_usuario'])){
            echo $sectionUser;
            echo $_SESSION['nivel'];
            if ($_SESSION['nivel_usuario'] == 'usuario'){
                echo $sectionUser;
                switch($sectionUser){
                    case "home": include("home.php");
                    break;
                    case "updatePassword": include("contenidos/user/updatePassword.php");
                    break;
                    case "updateImage": include("contenidos/user/updateImage.php");
                    break;
                    case "updateUser": include("contenidos/user/update.php");
                    break;
                    case "updateMascota": include("contenidos/user/mascota/Addmascota.php");
                    break;
                    case "mascota": include("contenidos/user/mascota/mascota.php");
                    break;
                    default: 
                        echo "<p class='error'>La sección solicitada ($sectionUser), no existeeee</p>";
                        include( 'contenidos/home.php');
                }
            }else if($_SESSION['nivel'] == 'administrador'){
                header("location: ../../admin/admin_usuario/index.php");
            }
        }
        
        ?>
    </div>
    
</section>