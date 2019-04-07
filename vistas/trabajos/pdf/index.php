<?php
	include 'plantilla.php';
	require 'conexion.php';
	
	$id = $_GET["id"]; 
	
	$query = "SELECT * FROM trabajos where id_clientes = ".$id;
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','I','C');
	$pdf->Cell(100,10, 'id_clientes', 0, 5, 30);
	$pdf->SetFillColor(144,30,30);
	$pdf->SetFont('Arial','B',15);
	$pdf->SetFont('Times','I');
	$pdf->Cell(50,6,'fecha de Inicio',0,0,'C');
	$pdf->Cell(50,6,'tipo',0,0,'C');
	$pdf->Cell(50,6,'costos',0,1,'C');
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())

	{
		
		$pdf->Cell(50,6,$row['fechaInicio'],0,0,'C');
		$pdf->Cell(50,6,utf8_decode($row['tipo']),0,0,'C');
		$pdf->Cell(50,6,utf8_decode($row['costos']),0,1,'C');
	}
	$pdf->Output();
?>