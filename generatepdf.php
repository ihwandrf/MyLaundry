<?php

// Include the main TCPDF library (search for installation path).
require_once('TCPDF-main/tcpdf.php');
class PDF extends TCPDF
{
    public function Header()
    {
        $imageFile = K_PATH_IMAGES . 'detergent.png';
        $this->Image($imageFile, 40, 10, 30, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $this->Ln(5); // font name size style
        $this->SetFont('helvetica', 'B', 12);
        $this->Cell(189, 3, 'MyLaundry', 0, 1, "C"); // total width of A4 page height, border, line
        $this->SetFont('helvetica', '', 8);
        $this->Cell(189, 3, 'Jalan Kaliurang km 13.5', 0, 1, "C");
        $this->Cell(189, 3, 'Sleman', 0, 1, "C");
        $this->Cell(189, 3, 'Yogyakarta', 0, 1, "C");
        $this->Cell(189, 3, 'Phone: +62 823 xxxx xxx', 0, 1, "C");
        $this->Cell(189, 3, 'Email: mylaundry@gmail.com', 0, 1, "C");
        $this->SetFont('helvetica', 'B', 11);
        $this->Ln(2);
        $this->Cell(189, 3, 'BUY & SALE ORDER', 0, 1, "C");
    }

    public function Footer()
    {
        $this->SetY(-148); // Posisi 15 mm dari bawah
        $this->Ln(5); // font name size style
        $this->SetFont('times', 'B', 10);
        // $this->MultiCell(189,15,)
        $this->MultiCell(189, 15, "The Market order is valid for __________ Days from the date I/We have deposited above _______ Receives the above securities in advance in trust for execution of the order", 0, 'J', 0, 1, '', '', true);
        $this->Ln(2);
        $this->Cell(20, 1, '____________________', 0, 0);
        $this->Cell(118, 1, '', 0, 0);
        $this->Cell(51, 1,  '________________________', 0, 1);
        $this->Cell(20, 5, 'Authorized Signature', 0, 0);
        $this->Cell(118, 5, '', 0, 0);
        $this->Cell(51, 5,  'Customer/POA Signature(s)', 0, 1);

        $this->Cell(8, 1, '', 0, 0);
        $this->Cell(118, 5, '(Office Use)', 0, 1);
        $this->Ln(5);

        $this->Cell(100, 5,  'Transaction Instruction Form (PAY IN)', 0, 1, 'R');
        $this->Cell(89, 5, '', 0, 1, 'C');

        $this->Cell(110, 5,  'Please transfer the above noted sold securities to the clearing stated below', 0, 1, 'C');
        $this->Cell(79, 5, '', 0, 1, 'C');

        $this->Cell(110, 5,  'DSE Clearing A/C-------------------------------------', 0, 0);
        $this->Cell(79, 5,  'Exchange ID-------------------------------------', 0, 1, 'C');
        $this->Ln(5);


        $this->Cell(110, 5,  'CSE Clearing A/C-------------------------------------', 0, 0);
        $this->Cell(79, 5,  'Exchange ID-------------------------------------', 0, 1, 'C');
        $this->Ln(4);

        $this->SetFont('times', 'B', 10);
        $this->Cell(189, 5, 'DECLARATION', 0, 1, 'L');

        $this->SetFont('times', '', 10);
        $html = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce placerat massa a tortor ullamcorper, vulputate semper metus efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aliquam commodo turpis ligula, pellentesque molestie ipsum lacinia malesuada. Aenean molestie velit sed tellus eleifend, vitae iaculis est vestibulum. Etiam interdum ex eget eros consectetur hendrerit. Donec vel ligula at justo porttitor ultrices vitae eget tortor. Integer congue enim nec enim interdum aliquet. Pellentesque vitae ipsum nec ligula convallis porta ac at ipsum. Pellentesque maximus pellentesque porta. Nullam elit ipsum, iaculis ac velit ac, ultricies placerat risus. Pellentesque sed est quis nisl volutpat mattis sed nec dolor. </p>';

        $this->writeHTML($html, true, false, true, false, '');


        $this->Ln(8);
        $this->SetFont('times', 'B', 10);
        $this->Cell(20, 1, '___________________', 0, 0);
        $this->Cell(118, 1, '', 0, 0);
        $this->Cell(51, 1, '________________________', 0, 1);

        $this->Cell(20, 5, 'Authorized Signature', 0, 0);
        $this->Cell(118, 5, '', 0, 0);
        $this->Cell(51, 5, 'Customer/POA Signature(s)', 0, 1);

        $this->Cell(7, 1, '', 0, 0);
        $this->Cell(182, 5, '(Office Use)', 0, 1);
        $this->Ln(7);

        $this->SetFont('helvetica', 'I', 8);

        // Page number
        date_default_timezone_set("Asia/Jakarta");
        $today = date("F j, Y/ g:i A", time());

        $this->Cell(25, 5, 'Generation Date/Time: ' . $today, 0, 0, 'L');
        $this->Cell(164, 5, 'Page ' . $this->getAliasNumPage() . ' of ' . $this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
}
// create new PDF document
$pdf = new PDF("p", "mm", "A4", true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nabil Najmudin');
$pdf->SetTitle('Invoice');
$pdf->SetSubject('TCPDF Invoice');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
$pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);




// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}


// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);


// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();


// Close and output PDF document
$pdf->Output('example_001.pdf', 'I');
