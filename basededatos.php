<?php
$host="localhost";
$user="root";
$pass="";
$database="estimador";

date_default_timezone_set('America/La_Paz');
setlocale(LC_CTYPE, "es_ES");
setlocale(LC_ALL, 'sp'); 
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");

$sqlserver=0;

if($sqlserver){
    //sqlserver
    mssql_connect($host,$user,$pass) or die("No se Pudo conectar a la BD");
    mssql_select_db($database) or die("No se Pudo Seleccionar la BD");
}else{
    //mysql
    $l=mysql_connect($host,$user,$pass) or die("No se Pudo conectar a la BD");
    mysql_select_db($database,$l) or die("No se Pudo Seleccionar la BD");
}

function consulta($sql){
    //echo $sql;
    global $sqlserver,$l;
    if($sqlserver){
        $res=mssql_query($sql);
        $resultado =array ();
        if ($res)
        {
            while ($consF =mssql_fetch_assoc ($res))
            array_push ($resultado, $consF);
        }
       
    }else{
        $res=mysql_query($sql,$l);    
        $resultado =array ();
        if ($res)
        {
            while ($consF =mysql_fetch_assoc ($res))
            array_push ($resultado, $consF);
        }
        //echo print_r($resultado);
        return $resultado;
    }
}

?>