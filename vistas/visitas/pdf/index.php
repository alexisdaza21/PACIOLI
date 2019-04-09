<?php
	include 'plantilla.php';
	require 'conexion.php';
	
	//$id = $_GET["id"]; 
	$nit = $_GET["nit"]; 
	//$tip = $_GET["tip"]; 
	$clientes = "SELECT * FROM clientes where nit = ".$nit;
	$cliente = $mysqli->query($clientes);



	$query = "SELECT * FROM visitas where id_trabajos = ".$id;

	//$query = "SELECT * FROM trabajos WHERE tipo = ".$tip;
	//$query = "SELECT * FROM clientes WHERE nit = ".$nit;
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFont('Arial','I',10);
/*	$pdf->MultiCell(190,5,'Que la empresa '.$cliente->razonSocial.'con nit'.$cliente->nit.' presenta el siguiente estado de cuenta con la emresa PACIOLI para el trabajo '.$trabajos->tipo);*/
 	$pdf->Ln(20);
	$pdf->SetFillColor(144,30,30);
	$pdf->SetFont('Arial','B',15);
	$pdf->SetFont('Times','I');
	$pdf->Cell(50,6,'fecha de Inicio',0,0,'C');
	$pdf->Cell(50,6,'tipo',0,0,'C');
	$pdf->Cell(50,6,'costos',0,1,'C');
	$pdf->SetFont('Arial','',10);
	$pdf->Ln(5);
	$suma = 0;
	while($row = $resultado->fetch_assoc())

	{
		
		$pdf->Cell(50,6,$row['fecha'],0,0,'C');
		$pdf->Cell(50,6,utf8_decode($row['tipo']),0,0,'C');
		$pdf->Cell(50,6,utf8_decode($row['costo']),0,1,'C');
		$suma = $suma +$row['costo'];
	}
	$pdf->Ln(5);
	$pdf->Cell(160,6,'TOTAL A PAGAR',0,1,'C');
	$pdf->Cell(160,6,utf8_decode($suma ),0,1,'C');
	
	$pdf->Output();
?>