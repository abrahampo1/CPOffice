<?php
$bMeses = array("void","Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
$ahora = getdate();
if($ahora["mday"]<10){
$dia = "0".$ahora["mday"];
}else{
$dia = $ahora["mday"];
}
if($ahora["mon"]<10){
$mon = "0".$ahora["mon"];
}else{
$mon = $ahora["mon"];
}

$data = $ahora["year"].'-'.$mon.'-'.$dia;
?>