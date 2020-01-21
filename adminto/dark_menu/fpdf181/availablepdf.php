<?php
require('fpdf.php');
$db = new PDO('mysql:host=localhost;dbname=conzult','root','');

class myPDF extends FPDF{
    function header(){
        $this->Image('conzult1.png',10,6);
        $this->SetFont('Arial','B',14);
        $this->Cell(276,80,'ALL AVAILABLE CONSULTANTS REPORT',0,0,'C');
        $this->Ln();
        // $this->SetFont('Times','',12);
        $this->Cell(276,10,'',0,0,'C');
        $this->Ln();
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    function headerTable(){
        $this->SetFont('Times','B',12);
        $this->Cell(20,10,'ID',1,0,'C');
        $this->Cell(40,10,'User Name',1,0,'C');
        $this->Cell(40,10,'First Name',1,0,'C');
        $this->Cell(40,10,'Last Name',1,0,'C');
        $this->Cell(50,10,'Email',1,0,'C');
        $this->Cell(30,10,'Availability',1,0,'C');
        $this->Cell(60,10,'Department',1,0,'C');
        $this->Ln();

    }
    function viewTable($db){
        $this->SetFont('Times','',12);
        $stmt=$db->query('select * from users where availability="Available"');
        while($data=$stmt->fetch(PDO::FETCH_OBJ)){
            $this->Cell(20,10,$data->ID,1,0,'C');
            $this->Cell(40,10,$data->username,1,0,'L');
            $this->Cell(40,10,$data->firstname,1,0,'L');
            $this->Cell(40,10,$data->lastname,1,0,'L');
            $this->Cell(50,10,$data->email,1,0,'L');
            $this->Cell(30,10,$data->availability,1,0,'L');
            $this->Cell(60,10,$data->Department,1,0,'L');
            $this->Ln();
        }
    }
}
$pdf= new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();

?> 
