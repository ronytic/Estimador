<?php
include_once("basededatos.php");
//print_r($_POST);
extract($_POST);
$datos=array();
foreach($_POST as $k=>$v){
	array_push($datos,$k."=".$v);
}

$datos=implode("&",$datos);
$Nombres=$Nombres!=""?$Nombres."%":"%";
$Apellidos=$Apellidos!=""?$Apellidos."%":"%";

$sql="SELECT * FROM recibo WHERE Nombres LIKE '$Nombres'  and Apellidos  LIKE '$Apellidos' ORDER BY Apellidos,Nombres ";
//echo $sql;
$resultado=consulta($sql);

?>
<div class="pull-right">
    
</div>

<table class="table tabla table-bordered table-striped table-hover tablaexportar">
    <thead>
        <tr>
            <th width="50">N</th>
            <th>Apellidos</th>
            <th>Nombres</th>
            <th>Teléfono</th>
            <th>Celular</th>
            <th>Email</th>
            <th>Facebook</th>
            <th>Página</th>
            <th>Fecha</th>
            <th>Hora</th>
        </tr>
    </thead>
    <?php
    if(count($resultado)){
        foreach($resultado as $r){$i++;
            ?>
            <tr>
                <td class="der"><?php echo $i?></td>
                <td><?php echo $r['Apellidos']?></td>
                <td><?php echo $r['Nombres']?></td>
                <td><?php echo $r['Telefono']?></td>
                <td><?php echo $r['Celular']?></td>
                <td><?php echo $r['Email']?></td>
                <td><?php echo $r['Facebook']?></td>
                <td><?php echo $r['Pagina']?></td>
                <td><?php echo date("d/m/Y",strtotime($r['Fecha']))?></td>
                <td><?php echo $r['Hora']?></td>
            </tr>
            <?php   
        }
    }else{
        ?>
        <tr>
            <td colspan="10">No se encontraron resultados para esta búsqueda</td>
        </tr>
        <?php
    }
    ?>
</table>