<?php
    //pagina quese envia a travez de get cuando plso sobre la numeracion de  lapagina al final. (pag.1, pag.2 ...)
    $pagina_actual = isset( $_GET['p'] ) ? $_GET['p'] : 1;
    $cantPorPagina = 9;
    //devuelve la cantidad de usuarios 
    $cTextos2 = "SELECT COUNT(idproductos) AS TOTAL FROM productos";
    $stmt2 = $pdo->prepare($cTextos2);
    // Especificamos el fetch mode antes de llamar a fetch()
    $stmt2->setFetchMode(PDO::FETCH_ASSOC);
    // Ejecutamos
    try {
        $stmt2->execute();
    } catch (\Throwable $th) {
        echo  $th;
    }
   
    $row2 = $stmt2->fetch();
    $cantResultados = $row2['TOTAL'];
    //cuantas paginas son que debo mostar de acuerdo  a la cantidad de usuarios dividido  entre la cantidad por pagina que quiero mostrar
    $cantPaginas = ceil($cantResultados / $cantPorPagina);
    if( $pagina_actual > $cantPaginas ){
        $pagina_actual = $cantPaginas;
    }
    if( $pagina_actual < 1 ){
        $pagina_actual = 1;
    }
    $dondeInicio = ($pagina_actual - 1) * $cantPorPagina;
?>
<div class="info__personal border_prueba--contenedor"> 
    <div class="producto">
        <div class="description_services">
            <?php
                $cTextosProd = <<<SQL
                SELECT * FROM productos
                LIMIT $dondeInicio, $cantPorPagina
                SQL;
                $stmtProd = $pdo->prepare($cTextosProd);
                // Especificamos el fetch mode antes de llamar a fetch()
                $stmtProd->setFetchMode(PDO::FETCH_ASSOC);
                // Ejecutamos
                try {
                    $stmtProd->execute();
                } catch (\Throwable $th) {
                   
                    echo $th;
                   
                }
                //$rowProd = $stmtProd->fetch();

                if($stmtProd){
                    echo '<section class="container container__block">';
                    echo '<div class="description_services">';
                    //variable para este documento en especifico.
                    $var_accion_producto = true;
                    include("../contenidos/vistas/vista_productos.php");
                    echo '</div>';
                }else{
                    echo 'aqui aparecen los productos asociados a cada usuario';
                }
            ?>
        </div>
    </div>       
</div>
<?php 
    if( $cantPaginas > 1 ):
?>
        <div class="paginador">
            <ul class="paginador__ul">
            <?php 
                for( $i = 1; $i <= $cantPaginas; $i++ ){
                    echo "<li class='paginador__li'><a ";
                    if( $pagina_actual == $i ){
                        echo 'class="actual" ';
                    }
                    // echo "href='index.php?seccion=AdminUsuarios&p=$i'>pág. $i</a></li>";
                    echo "href='index.php?seccion=AdminProductos&p=$i'>pág. $i</a></li>";
                };
            ?>	
            </ul>
        </div>
        <?php 
        endif; 	
        ?>  