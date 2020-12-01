<?php

/***************************
  Sample using a PHP array
****************************/

require('fpdm.php');
include("../conectar.php");

$viticultor = $_GET["v"];
$consulta = "SELECT * FROM personas WHERE vit =".$viticultor;
$resultado = mysqli_query($link, $consulta);
$row = mysqli_fetch_assoc($resultado);

$nombre_completo = $row["apellidos"].", ".$row["nombre"];
$direccion = $row["municipio"]." ".$row["cod_post"];
$dni = $row["dni"];
$dir = $row["direccion"];
$variedad = $row["variedad"];
$kg_entregados = $row["kg_entregados"]/100;
$hectareas = $row["superficie"] /1000;
$consulta = "SELECT DISTINCT bodega FROM palets WHERE n_viticultor =".$row["vit"];
$resultado = mysqli_query($link , $consulta);
$bodega = "";
$bodega2 = "";
$provincia = $row["provincia"];
$i = 0;
$peso_total = 0;
while($row2 = mysqli_fetch_assoc($resultado))
{
	$consulta = "SELECT * FROM bodegas WHERE id=".$row2["bodega"];
	$sql = mysqli_query($link, $consulta);
	$data = mysqli_fetch_assoc($sql);
	$nombre =  $data["nombre"];
	$nif =  $data["nif"];
	$consulta = "SELECT * FROM palets WHERE n_viticultor=".$viticultor." AND bodega =".$row2["bodega"];
	$sql = mysqli_query($link, $consulta);
	$peso_bodega = 0;
	while($data = mysqli_fetch_assoc($sql))
	{
		$peso_caja = 0;
		$peso_palet = 0;
		$consulta = "SELECT * FROM cajas WHERE id=".$data["tipo_caja"];
		$sql = mysqli_query($link, $consulta);
		$res = mysqli_fetch_assoc($sql);
		$peso_caja = $res["peso"];
		$consulta = "SELECT * FROM tipo_palets WHERE id=".$data["tipo_palet"];
		$sql = mysqli_query($link, $consulta);
		$res = mysqli_fetch_assoc($sql);
		$peso_palet = $res["peso"];
		$peso_bodega += $data["peso"] - ($peso_caja*$data["c_cajas"]) - $peso_palet;
	}
	$peso_bodega = $peso_bodega/100;
	$row += [
		"peso_bodega$i" => "$peso_bodega",
		"bodega$i" => "$nombre",
		"bodega_nif$i" => "$nif"
	];
	$peso_total += $peso_bodega;
	$i++;
}
include_once("../../Acciones/getdate.php");
$ano = $ahora["year"];
$mes = $bMeses[$ahora["mon"]];
$kg_entregados = $peso_total;
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
