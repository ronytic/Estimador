<?php
$titulo="Reportes";
$idmenu=1;
$folder="";
include_once("basededatos.php");


$consulta="SELECT * FROM usuarios ORDER BY usuario";
$usuarios=consulta($consulta);
$consulta="SELECT * FROM codigos ORDER BY codigo";
$codigos=consulta($consulta);
$consulta="SELECT * FROM clientes ORDER BY nombre";
$clientes=consulta($consulta);
$consulta="SELECT * FROM grupos ORDER BY grupo";
$grupos=consulta($consulta);

include_once("cabecerahtml.php");
?>
<script language="javascript" src="js/reporte.js" type="text/javascript"></script>
<script language="javascript">
$(document).on("ready",function(){var linea=0;
var lineag=0;
    $(document).on("click",".aumentar",function(e){
		e.preventDefault();linea++;
		var posi=$(this).parent().parent();
		$.post("aumentar.php",{'l':linea},function(data){
			posi.before(data);
		});
	}) 
    $(".aumentar").click();
    $(document).on("click",".aumentargasto",function(e){
		e.preventDefault();lineag++;
		var posi=$(this).parent().parent();
		$.post("aumentargasto.php",{'l':lineag},function(data){
			posi.before(data);
		});
	}) 
    $(".aumentargasto").click();
    $(document).on("change",".ocantidad,.opreciounitario,.opreciolibras",function(){
        var lin=$(this).attr("rel");
        var cantidad=parseFloat($(".ocantidad[rel="+lin+"]").val());
        var preciounitario=parseFloat($(".opreciounitario[rel="+lin+"]").val());
        var preciolibras=parseFloat($(".opreciolibras[rel="+lin+"]").val());
        var total=(cantidad*preciounitario).toFixed(2);
        $(".ototal[rel="+lin+"]").val(total)
        
    });
});


</script>
<?php
include_once("cabecera.php");
?>

    <fieldset>
        <legend>Criterios de Búsqueda</legend>
        <div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#Eventos" aria-controls="Eventos" role="tab" data-toggle="tab">Recibo</a></li>
    <li role="presentation"><a href="#Logs" aria-controls="Logs" role="tab" data-toggle="tab">Reporte</a></li>

  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="Eventos">
        <form action="mostrar.php" method="post" class="formulario" >
            
                    
            <table class="table tabla table-bordered">
                <tr>
                    <td colspan="4"></td>
                    <td>Id:</td>
                    <td><input type="text" value="" class="form-control" name="Id" required readonly></td>
                    <td>Fecha:</td>
                    <td><input type="date" value="<?php echo date("Y-m-d")?>" class="form-control" name="Fecha" required></td>
                    
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td>
                        <input type="text" value="" class="form-control" name="Nombres" required autofocus>
                    </td>
                    <td>Apellidos</td>
                    <td>
                        <input type="text" value="" class="form-control" name="Apellidos" required>
                    </td>
                    <td>Teléfono</td>
                    <td>
                        <input type="text" value="" class="form-control" name="Apellidos" required>
                    </td>
                    <td>Celular</td>
                    <td>
                        <input type="text" value="" class="form-control" name="Apellidos" required>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" value="" class="form-control" name="Nombres" required>
                    </td>
                    <td>Facebook</td>
                    <td>
                        <input type="text" value="" class="form-control" name="Apellidos" required>
                    </td>
                    <td>Página</td>
                    <td colspan="3">
                        <input type="text" value="" class="form-control" name="Apellidos" required>
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
                    <input type="number" name="SuperTotal" class="form-control der supertotal" value="0" readonly size="10" >
                    </td>
                    <td>
                    <input type="number" name="SuperTotal" class="form-control der supertotal" value="0" readonly size="10" >
                    </td>
                    </tr>
            </table>
            <h3>Gastos</h3>
            <table class="table table-striped">
                <thead>
                    <tr><th width="10">N</th><th>Gasto</th><th width="200">Total</th></tr>
                </thead>
                <tr class="contenido"><td colspan="1"><a href="#" class="aumentargasto"><i class="icon icon-plus"></i> Aumentar</a><br>
                    </td>
                    <td class="der">Total Peso y Compras<br></td>
                    <td>
                    <input type="number" name="SuperTotal" class="form-control der supertotal" value="0" readonly size="10" >
                    </td>
                    </tr>
            </table>
            <br>
            <table class="table">
                <tr>
                    <td><input type="submit" value="Guardar" class="btn btn-success"></td>
                </tr>
            </table>
         </form> 
    </div><!-- Fin de Eventos-->
    <div role="tabpanel" class="tab-pane" id="Logs">
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