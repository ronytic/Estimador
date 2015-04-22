<?php 
session_start();
include_once("basededatos.php");
/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
extract($_POST);
$Hora=date("H:i:s");
$consulta="INSERT INTO recibo VALUES(NULL,'$Fecha','$Hora','$Nombres','$Apellidos','$Telefono','$Celular','$Email','$Facebook','$Pagina','$SuperLibras','$SuperTotal','$SuperTotalG','$TodoTotal')";
//echo $consulta;
mysql_query($consulta) or die(mysql_error());
$id=mysql_insert_id($l);
$_SESSION['o']=$o;
$_SESSION['g']=$g;
?>
<iframe src="reporte.php?Id=<?php echo $id?>" width="100%" frameborder="0" height="700"></iframe>