<?php
	
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->SetY(10);
			$this->Image('assets/images/logo_inferior_para_footer.png', 85, 5, 30 );
			$this->SetY(20);
			$this->SetFont('Times','I','C');
			$this->Cell(100,10, 'Centro Comercial El Pinal Of. 105', 0, 5, 30);
			$this->Cell(100,10, 'Cel.: 3133601274 / 3142448712 / 7438762',0,7,30);
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