<?php
session_start();
unset($_SESSION['especie']);
unset($_SESSION['edad']);
unset($_SESSION['raza']);
unset($_SESSION['sexo']);
unset($_SESSION['esterilizado']);
unset($_SESSION['talla']);
unset($_SESSION['consulta']);
echo "<script>window.location.href='/veterinaria/index.php?seccion=adopta'</script>";
?>