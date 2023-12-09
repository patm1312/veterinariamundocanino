<?php
if(isset($_SESSION['user_id'])){
    if($_SESSION['nivel_usuario'] == 'administrador'){
        echo "<script>window.location.href='/veterinaria/admin/index.php'</script>";
    }else{
        echo "<script>window.location.href='/veterinaria/index.php?seccion=perfil'</script>";
    }
}else{
    echo "<script>window.location.href='/veterinaria/index.php'</script>";
}

?>