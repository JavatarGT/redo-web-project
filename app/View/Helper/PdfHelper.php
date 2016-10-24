<?php
App::import('Vendor','TCPDF',array('file' => 'tcpdf/tcpdf.php'));   //1
class PdfHelper  extends AppHelper                                  
{
    var $core;
 
    function PdfHelper() {
        $this->core = new MYPDF();                                  //3
    }

    public function titulo($t){
		$this->core->titulo($t);
	}

    public function hstring($t){
        $this->core->hstring($t);
    }
     
}

class MYPDF extends TCPDF {
	var $tit, $st;
	public function titulo($t){
		$this->tit = $t;
	}
    public function hstring($t){
        $this->st = $t;
    }
    // //Page header
    public function Header() {
        // Logo
        $image_file = 'img/psLogo.png';
        $this->Image($image_file, 15, 10, 40, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 14);
        // Title
        //$this->Cell(0, 15, $this->tit, 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->SetX(17);
        $this->MultiCell(0, 5, $this->tit, 0, 'C', 0, 1, '', '', true, 0, false, true, 0, 'T', false);
        $this->SetFont('helvetica', 0, 10);
        $this->MultiCell(0, 5, $this->st, 0, 'C', 0, 1, '', '', true, 0, false, true, 0, 'T', false);
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, '', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}
?>