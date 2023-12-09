<?php
include('./configuracion/conexion.php');
 $sectionUser = isset($_GET['seccionUser']) ? $_GET['seccionUser']:'home';
 if (isset($_SESSION['user_id'])) {
    if($_SESSION['nivel_usuario'] == 'administrador'){
    }else{
        $clase = "noneUser";  
    }
  }else{
        echo "<script>window.location.href='/veterinaria/index.php?set=1'</script>";
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
                <a class=" <?php echo $clase;?> " href="index.php?seccion=perfil&seccionUser=UserAdmin">
                    <p class="closeModal__acciones"><?php echo $_SESSION['nivel_usuario'] ; ?></p>
                </a>
                <a class="enlace_acciones" href="contenidos/user/logout.php">
                    <p class="closeModal__acciones">Logout</p>
                </a>
                                    
            </div>
                <div class="acciones">
                   <a class="<?php echo $clase; ?>" href="index.php?seccion=perfil&seccionUser=UserAdmin">
                        <div class="acciones--user">
                            <p class=" accion_perfil--p responsive"><?php echo $_SESSION['nivel_usuario'] ; ?>
                            </p>
                        </div>
                    </a>
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
    <div class="datos">
        <?php
        if (isset($_SESSION['nivel_usuario'])){
            if ($_SESSION['nivel_usuario'] == 'usuario' || $_SESSION['nivel_usuario'] == 'administrador'){
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
                    case "UserAdmin": include("contenidos/user/loginAdmin.php");
                    break;
                    default: 
                        echo "<p class='error'>La sección solicitada ($sectionUser), no existeeee</p>";
                        include( 'contenidos/home.php');
                }
            }else if($_SESSION['nivel'] == 'administrador'){
            }
        }
        ?>
    </div>
</section>