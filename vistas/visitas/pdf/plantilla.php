<?php
	
		require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('assets/images/logo_inferior_para_footer - copia.png', 85, 5, 30 );
			$this->Ln(20);
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->SetFont('Times','I');
			$this->Cell(130,10,'Centro Comercial El Pinal Of. 105',0,10,'C');
			$this->SetFont('Times','I');
			$this->Cell(130,10, 'Cel.: 3133601274 / 3142448712 / 7438762',0,10,'C');
			$this->SetFont('Times','I');
			$this->Cell(130,10, 'EL SUSCRITO CONTADOR PÚBLICO CERTIFICA:',0,10,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>