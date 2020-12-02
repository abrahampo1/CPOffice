<?php

/***************************
  Sample using a PHP array
****************************/

require('fpdm.php');
include("../conectar.php");

$viticultor = $_GET["v"];
$consulta = "SELECT * FROM personas WHERE ID =".$viticultor;
$resultado = mysqli_query($link, $consulta);
$row = mysqli_fetch_assoc($resultado);

$nombre_completo = $row["1APELLIDO"]." ".$row["2APELLIDO"].", ".$row["NOMBRE"];
$localidad = $row["MUNICIPIO"];
$codpost = $row["CODPOST"];
$dni = $row["DNI"];
$dir = $row["DIRECCION"];
$telefono = $row["TFNO"];
$variedad = "insertar variedad";
$kg_entregados = $row["KG_ENTREGADOS"]/100;
$hectareas = $row["SUPERFICIE"] /1000;
$bodega = "";
$bodega2 = "";
$provincia = $row["PROVINCIA"];
include_once("../getdate.php");
$ano = $ahora["year"];
$mes = $bMeses[$ahora["mon"]];
if($hectareas == 0){
	$hectareas = 1;
}
$rendimiento = round($kg_entregados / $hectareas, 2);
$row += [
	'rendimiento_total' => "$rendimiento",
	'hectareas' => "$hectareas",
	'nombre_completo' => "$nombre_completo",
	'hectareas2' => "$hectareas",
	'kg_totales' => "$kg_entregados",
	'kg_totales2' => "$kg_entregados",
	'kg_totales3' => "$kg_entregados",
	'kg_totales4' => "$kg_entregados",
	'kg_totales5' => "$kg_entregados",
	'provincia_pie' => "$provincia",
	'ano' => "$ano",
	'mes' => "$mes",
	'dia' => "$dia",
	'direccion' => "$direccion",
	'localidad' => "$localidad",
	'dni' => "$dni",
	'provincia' => "$provincia",
	'localidad' => "$localidad",
	'cod_post' => "$codpost",
	'telefono' => "$telefono",
	'localidad' => "$localidad",
	'rendimiento' => "$rendimiento"
];
$fields = $row;
?>
<?php
$pdf = new FPDM('contrato.pdf');
$pdf->Load($fields, true); // second parameter: false if field values are in ISO-8859-1, true if UTF-8
$pdf->Merge();
$pdf->Output();
?>
