<?php
//es la nueva ventana q se abre cuando  le di click en icono  de admin publicaciones, este script esta incluido en el indexadmin:
    //$pic = isset($_GET['pic']) ? $_GET['pic']:'default/default.png';
    $src;
    if(isset($_GET['pic'])){
        $src = './' . $_GET['pic'];
        // if(empty($_GET['id'])){
        //     $src = 'contenidos/publicaciones/assets/' . $pic;
        // }else{
        //     $src = 'contenidos/publicaciones/assets/ContenidoPServ/' . $pic;
        // }
    }
   echo $src;
?>
<p>titulo de prueba</p>
<img src="<?php echo $src; ?>" alt="foto">   
