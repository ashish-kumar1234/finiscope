<?php
require_once('tcpdf/tcpdf.php');

// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Sample PDF');
$pdf->SetSubject('Sample PDF');
$pdf->SetKeywords('TCPDF, PDF, example, sample');

// Remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 12);

// Add some content
$html = '
<h1>Sample PDF</h1>
<p>This is a sample PDF file created using TCPDF library.</p>
<p>You can add any HTML content here.</p>
';

$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF
$pdf->Output('sample.pdf', 'I');
?>
