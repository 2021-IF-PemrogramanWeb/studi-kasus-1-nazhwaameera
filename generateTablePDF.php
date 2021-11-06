<?php
require('mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
    // Logo
    $this->Image('images/dummy-logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Times','',18);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'2020 Sales Report',0,1,'C');
    // Line break
    $this->Ln(15);
    // // Ensure table header is printed
    parent::Header();
}
}

// Connect to database
$link = mysqli_connect("localhost", "root", "", "housing1");

$pdf = new PDF();
$pdf->AddPage();
$pdf->Table($link,'SELECT * FROM sales_data');
$pdf->Output();
?>