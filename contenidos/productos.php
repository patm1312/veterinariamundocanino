<?php
session_start();
include('configuracion/conexion.php');
    //pagina quese envia a travez de get cuando plso sobre la numeracion de  lapagina al final. (pag.1, pag.2 ...)
    $pagina_actual = isset( $_GET['p'] ) ? $_GET['p'] : 1;
    $cantPorPagina = 9;
    //devuelve la cantidad de usuarios 
    $cTextos2 = "SELECT COUNT(idproductos) AS TOTAL FROM productos";
    try {
    $stmt2 = $pdo->prepare($cTextos2);
    // Especificamos el fetch mode antes de llamar a fetch()
    $stmt2->setFetchMode(PDO::FETCH_ASSOC);
    // Ejecutamos
    
        $stmt2->execute();
    } catch (\Throwable $th) {
        echo  $th;
    }
   
    $row2 = $stmt2->fetch();
    $cantResultados = $row2['TOTAL'];
    echo $cantResultados;
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
<section class="container container__block">
    <input type="hidden" id="productos">
                 <h2 class="h2 h2--servicios bottom__gray">productos</h2>
                 <div class="tittle_productos">
                    <h2 class="info_result">Resultado de busqueda: <span class="info_result">x productos encontrados</span></h2>
                    <p>
                            Ordenar:
                            <select name="ordenar">
                            <option>Selecciona:</option>
                            <option>precio</option>
                            <option>Farmacia</option>
                            <option>Juguetes</option>
                            <option>Alimento</option>
                            <option>Ropa y Accesorios</option>
                            <option>varios</option>
                            </select>
                    </p>
                 </div>
                 <div class="description_services">

                 <?php
                $cTextosProd = <<<SQL
                SELECT * FROM productos
                LIMIT $dondeInicio, $cantPorPagina
                SQL;
                try {
                $stmtProd = $pdo->prepare($cTextosProd);
                // Especificamos el fetch mode antes de llamar a fetch()
                $stmtProd->setFetchMode(PDO::FETCH_ASSOC);
                // Ejecutamos
               
                    $stmtProd->execute();
                } catch (\Throwable $th) {
                   
                    echo $th;
                   
                }
                //$rowProd = $stmtProd->fetch();
                if($stmtProd){
                    include("contenidos/vistas/vista_productos.php");
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
                    echo "href='index.php?seccion=productos&p=$i'>pág. $i</a></li>";
                };
            ?>	
            </ul>
        </div>
        <?php 
        endif; 	
        ?>  
</section>