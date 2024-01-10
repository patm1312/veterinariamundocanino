<?php
//pagina quese envia a travez de get cuando plso sobre la numeracion de  lapagina al final. (pag.1, pag.2 ...)
$pagina_actual = isset( $_GET['p'] ) ? $_GET['p'] : 1;
$cantPorPagina = 5;
//devuelve la cantidad de usuarios 
$cTextos2 = "SELECT COUNT(idPAdopta) AS TOTAL FROM PAdopta";
$stmt2 = $pdo->prepare($cTextos2);
// Especificamos el fetch mode antes de llamar a fetch()
$stmt2->setFetchMode(PDO::FETCH_ASSOC);
// Ejecutamos
$stmt2->execute();
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
$cTextos = <<<SQL
SELECT 
	*
FROM
    PAdopta
LIMIT $dondeInicio, $cantPorPagina
SQL;
$stmt = $pdo->prepare($cTextos);
// Especificamos el fetch mode antes de llamar a fetch()
$stmt->setFetchMode(PDO::FETCH_ASSOC);
// Ejecutamos
$stmt->execute();
?>
<div class="info__personal"> 
    <input type="hidden" id="homeAdmin">
    <a class="a__aniadirP" href="index.php?seccion=AdminPublicaciones&accion=addM">
        <div class='aniadir-publicacion'>
            <img class="aniadir-publicacion-img" src="../assets/images/mas.png" alt="mas">
            <p>Añadir Nueva Mascota</p>
        </div>
    </a>
    <div class="info__personal--info dog">
        <!-- //el id de la tabla corresponde a cada clase de el enlace de ver  que es un usuario, se identifica por un numero -->
        <div>
            <table class='table--admin' ">
                <tr  class=''>
                    <th class='thVac--admin'>Numero</th>
                    <th class='thVac--admin'>nombre</th>
                    <th class='thVac--admin'>Especie</th>
                    <th class='thVac--admin'>Raza</th>
                    <th class='thVac--admin'>Edad</th>
                    <th class='thVac--admin'>Sexo</th>
                    <th class='thVac--admin'>Talla</th>
                    <th class='thVac--admin'>Esterilizado</th>
                    <th class='thVac--admin'>Color</th>
                    <th class='thVac--admin'>foto</th>
                    <th class='thVac--admin'>Acciones</th>
                </tr>
<?php
            while ($row = $stmt->fetch()){         
?>
                <tr class='trVac--admin'>
                    <td class='tdVac--admin' >
                        <a href="" class="AdminPublic__<?php echo $row["idpublicaciones"];  ?>">
                            <?php echo $row["idpublicaciones"];  ?>
                        </a>
                    </td>
                    <td class='tdVac--admin' ><?php echo $row["nombre"];  ?></td>
                    <td class='tdVac--admin' ><?php echo $row["especie"];  ?></td>
                    <td class='tdVac--admin' ><?php echo $row["raza"];  ?></td>
                    <td class='tdVac--admin' ><?php echo $row["edad"];  ?></td>
                    <td class='tdVac--admin' ><?php echo $row["sexo"];  ?></td>
                    <td class='tdVac--admin' ><?php echo $row["talla"];  ?></td>
                    <td class='tdVac--admin' ><?php echo $row["esterelizado"];  ?></td>
                    <td class='tdVac--admin' ><?php echo $row["color"];  ?></td>
                    <td class='tdVac--admin' >
                        <a class="openImg" href="" >
                            <!-- //pongo el icono de una imagen, cuando el usuario  le di click se recupera la ruta guardada en el input oculto que se abre la imagen  -->
                            <img class="openImg" src="contenidos/publicaciones/assets/default/img.png" alt="preview">
                            <input  type="hidden" value="<?php echo $row['foto'];?>">
                        </a>
                    </td>
                    <td class='tdVac--admin' >
                        <div class="acciones__table">
                            <div class="acciones__table-editar" >
                                <a href="index.php?seccion=AdminPublicaciones&accion=editarm&id=<?php echo $row["idPAdopta"] ;?>">
                                    <img src="../assets/images/lapiz.png" alt="lapiz">
                                    
                                </a>
                                
                            </div>
                            <div class="acciones__table-eliminar" >
                                <a href="index.php?seccion=AdminPublicaciones&accion=eraseM&id=<?php echo $row["idPAdopta"] ;?>">
                                    <img src="../assets/images/cruz.png" alt="cruz">
                                    
                                </a>
                                
                            </div>
                        </div>
                    </td>
                </tr>

    <?php
 };
?>
        </table>
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
                // http://localhost/veterinaria/admin/index.php?seccion=AdminUsuarios
				echo "href='index.php?seccion=AdminPublicaciones&accion=listadoM&p=$i'>pág. $i</a></li>";
			};
        ?>	
	    </ul>
	</div>
	<?php 
	endif; 	
    ?>
    	         
</div>