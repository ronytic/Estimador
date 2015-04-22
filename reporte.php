<?php
session_start();
$o=$_SESSION['o'];
$g=$_SESSION['g'];

include_once("impresion/pdf.php");
$titulo="Reporte de Ordenes";
include_once("basededatos.php");
class PDF extends PPDF{
	function Cabecera(){
		global $FechaInicio,$FechaFin;
        //$this->Linea();

	}	
}

extract($_GET);

$pdf=new PDF("P","mm","letter");
$pdf->SetMargins(0,0,0);
$pdf->SetAutoPageBreak(1,0);
$pdf->AddPage();


$sql="SELECT * FROM recibo WHERE Id='$Id'";
$r=consulta($sql);
$r=array_shift($r);




$pdf->SetWidths(array(15,30,20,20,20,40,40));
$pdf->Fuente("",9);
$pdf->SetAligns(array("R","L","L","C","C","L","","L","R","R","R","C"));
    $pdf->CuadroCuerpo(140,"",0,"",0);
    $pdf->CuadroCuerpo(20,"Id:",0,"",1);
    $pdf->CuadroCuerpo(20,"".$r['Id'],0,"C",1);
    $pdf->ln();
    $pdf->CuadroCuerpo(140,"",0,"",0);
    $pdf->CuadroCuerpo(20,"Fecha:",0,"",1);
    $pdf->CuadroCuerpo(20,"".date("d/m/Y",strtotime($r['Fecha'])),0,"C",1);
    
    $pdf->ln();
    $pdf->ln();

	$pdf->CuadroCuerpo(20,"Nombres:",0,"",1,"","B");
    $pdf->CuadroCuerpo(40,"".$r['Nombres'],0,"C",1);
    $pdf->CuadroCuerpo(20,"Apellidos:",0,"",1,"","B");
    $pdf->CuadroCuerpo(40,"".$r['Apellidos'],0,"C",1);
    $pdf->CuadroCuerpo(20,"Teléfono:",0,"",1,"","B");
    $pdf->CuadroCuerpo(40,"".$r['Telefono'],0,"C",1);
    $pdf->ln();
    $pdf->CuadroCuerpo(20,"Celular:",0,"",1,"","B");
    $pdf->CuadroCuerpo(40,"".$r['Celular'],0,"C",1);
    $pdf->CuadroCuerpo(20,"Email:",0,"",1,"","B");
    $pdf->CuadroCuerpo(40,"".$r['Email'],0,"C",1);
    $pdf->CuadroCuerpo(20,"Facebook:",0,"",1,"","B");
    $pdf->CuadroCuerpo(40,"".$r['Facebook'],0,"C",1);
    $pdf->ln();
    $pdf->CuadroCuerpo(20,"Página Web:",0,"","LB","","B");
    $pdf->CuadroCuerpo(160,"".$r['Pagina'],0,"L","BR");

    $pdf->ln();
    $pdf->ln();
    $pdf->ln();
    $pdf->CuadroCuerpo(10,"N",1,"C",1,"","B");
    $pdf->CuadroCuerpo(45,"Producto",1,"C",1,"","B");
    $pdf->CuadroCuerpo(25,"Item",1,"C",1,"","B");
    $pdf->CuadroCuerpo(25,"Cant.",1,"C",1,"","B");
    $pdf->CuadroCuerpo(25,"Precio Unit.",1,"C",1,"","B");
    $pdf->CuadroCuerpo(25,"Peso Lb",1,"C",1,"","B");
    $pdf->CuadroCuerpo(25,"Total",1,"C",1,"","B");
    $pdf->CuadroCuerpo(25,"",0,"C",0,"","");
    $pdf->ln();
    $pdf->SetWidths(array(10,45,25,25,25,25,25));
    $pdf->SetAligns(array("R","L","L","R","R","R","R"));
    foreach($o as $op){$i++;
        $val=array(utf8_decode($i),
                    utf8_decode($op['Producto']),
                    utf8_decode($op['Item']),
                    utf8_decode($op['Cantidad']),
                    utf8_decode($op['PrecioUnitario']),
                    utf8_decode($op['PesoLibras']),
                    utf8_decode($op['Total']),
                );   
        $pdf->Row($val); 
    }
    $pdf->CuadroCuerpo(130,"Total Peso y Compras",1,"C",1,"","B");
    $pdf->CuadroCuerpo(25,number_format($r['SuperLibras'],2),1,"R",1,"","B");
    $pdf->CuadroCuerpo(25,number_format($r['SuperTotal'],2),1,"R",1,"","B");
    
    
    
    $pdf->ln();
    $pdf->ln();
    $pdf->ln();
    $pdf->CuadroCuerpo(10,"N",1,"C",1,"","B");
    $pdf->CuadroCuerpo(145,"Detalle",1,"C",1,"","B");
    $pdf->CuadroCuerpo(25,"Total",1,"C",1,"","B");
    $pdf->CuadroCuerpo(25,"",0,"C",0,"","");
    $pdf->ln();
    $pdf->SetWidths(array(10,145,25));
    $pdf->SetAligns(array("R","L","R"));
    $i=0;
    foreach($g as $op){$i++;
        $val=array(utf8_decode($i),
                    utf8_decode($op['Detalle']),
                    utf8_decode(number_format($op['Total'],2)),
                );   
        $pdf->Row($val); 
    }
    
    $pdf->CuadroCuerpo(155,"Total",1,"C",1,"","B");
    $pdf->CuadroCuerpo(25,number_format($r['SuperTotalG'],2),1,"R",1,"","B");
    $pdf->ln();
    $pdf->CuadroCuerpo(155,"",0,"C",0,"","B");
    $pdf->CuadroCuerpo(25,number_format($r['TodoTotal'],2),1,"R",1,"","B");
    
$pdf->Output("Reporte de Log de Acceso.pdf","I");
?>