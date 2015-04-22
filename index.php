<?php
$titulo="Reportes";
$idmenu=1;
$folder="";
include_once("basededatos.php");


$consulta="SHOW TABLE STATUS LIKE 'recibo'";
$dato=consulta($consulta);
$dato=array_shift($dato);

include_once("cabecerahtml.php");
?>
<script language="javascript" src="js/reporte.js" type="text/javascript"></script>
<script language="javascript">
</script>
<?php
include_once("cabecera.php");
?>

    <fieldset>
        <legend>Criterios de Búsqueda</legend>
        <div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#Recibo" aria-controls="Recibo" role="tab" data-toggle="tab">Recibo</a></li>
    <li role="presentation"><a href="#Registro" aria-controls="Registro" role="tab" data-toggle="tab">Reporte</a></li>

  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="Recibo">
        <form action="guardar.php" method="post" class="formulario" >
            
                    
            <table class="table tabla table-bordered">
                <tr>
                    <td colspan="4"></td>
                    <td>Id:</td>
                    <td><input type="text" value="<?php echo $dato['Auto_increment']?>" class="form-control der" name="Id" required readonly></td>
                    <td>Fecha:</td>
                    <td><input type="date" value="<?php echo date("Y-m-d")?>" class="form-control der" name="Fecha" required></td>
                    
                </tr>
                <tr>
                    <td>Nombres</td>
                    <td>
                        <input type="text" value="" class="form-control" name="Nombres" required autofocus>
                    </td>
                    <td>Apellidos</td>
                    <td>
                        <input type="text" value="" class="form-control" name="Apellidos" required>
                    </td>
                    <td>Teléfono</td>
                    <td>
                        <input type="text" value="" class="form-control" name="Telefono" >
                    </td>
                    <td>Celular</td>
                    <td>
                        <input type="text" value="" class="form-control" name="Celular" >
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" value="" class="form-control" name="Email" >
                    </td>
                    <td>Facebook</td>
                    <td>
                        <input type="text" value="" class="form-control" name="Facebook" >
                    </td>
                    <td>Página</td>
                    <td colspan="3">
                        <input type="text" value="" class="form-control" name="Pagina" >
                    </td>
                    
                </tr>
                
            </table>
            <br>
            <table class="table table-striped">
                <thead>
                    <tr><th width="10">N</th><th>Producto</th><th>Item</th><th>Cantidad</th><th>Precio Unitario</th><th>Peso Libras</th><th>Total</th></tr>
                </thead>
                <tr class="contenido"><td colspan="4"><a href="#" class="aumentar"><i class="icon icon-plus"></i> Aumentar</a><br>
                    </td>
                    <td class="der">Total Peso y Compras<br></td>
                    <td>
                    <input type="number" name="SuperLibras" class="form-control der superlibras" value="0" readonly size="10" >
                    </td>
                    <td>
                    <input type="number" name="SuperTotal" class="form-control der supertotal" value="0" readonly size="10" >
                    </td>
                    </tr>
            </table>
            <h3></h3>
            <table class="table table-striped">
                <thead>
                    <tr><th width="10">N</th><th>Detalle</th><th width="200">Total</th></tr>
                </thead>
                <tr class="contenido"><td colspan="1"><a href="#" class="aumentargasto"><i class="icon icon-plus"></i> Aumentar</a><br>
                    </td>
                    <td class="der">Total<br></td>
                    <td>
                    <input type="number" name="SuperTotalG" class="form-control der SuperTotalG" value="0" readonly size="10" >
                    </td>
                    </tr>
                <tr class="success"><td colspan="1"></td>
                    <td class="der">Total<br></td>
                    <td>
                    <input type="number" name="TodoTotal" class="form-control der TodoTotal" value="0" readonly size="10" >
                    </td>
                    </tr>
            </table>
            <br>
            <table class="table">
                <tr>
                    <td><input type="submit" value="Guardar" class="btn btn-success"></td>
                    <td><a href="./"class="btn btn-danger">Nuevo Recibo</a></td>
                </tr>
            </table>
         </form> 
    </div><!-- Fin de Eventos-->
    <div role="tabpanel" class="tab-pane" id="Registro">
        <form action="mostrarlogs.php" method="post" class="formulario" >
            <table class="table tabla">
                <thead>
                    <tr>
                        <th>Fecha Desde</th>
                        <th>Fecha Hasta</th>
                        <th>Operador</th>
                    </tr>
                </thead>
                <tr>
                    <td>
                        <input type="date" value="<?php echo date("Y-m-d")?>" class="form-control" name="fechainicio" required>
                    </td>
                    <td>
                        <input type="date" value="<?php echo date("Y-m-d")?>" class="form-control" name="fechafin" required>
                    </td>
                    <td>
                        <input type="text" value="" class="form-control" name="operador" >
                    </td>
                    
                </tr>
                <tr>
                    <td><input type="submit" value="Buscar" class="btn btn-success"></td>
                </tr>
            </table>
         </form> 
    </div><!-- Fin Log-->

  </div>

</div>
         
         
    </fieldset>
    
    <fieldset>
        <div id="respuestaformulario"></div>
    </fieldset>
     
<?php
include_once("pie.php");
?>