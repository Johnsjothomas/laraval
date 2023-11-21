<?php 
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Access-Control-Allow-Origin: *');

if(!function_exists('pre'))
{
    function pre($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}

$id = @$_REQUEST['id'] ? $_REQUEST['id'] : '';
if(empty($id))
{
	echo '<h2 style="color: red;">Id not found...!</h2>';
	die;
}
$id = base64_decode($id);
$idArr = explode('~@~', $id);

use setasign\Fpdi\Fpdi;
//use setasign\FpdiPdfParser\FpdiPdfParser;

require_once('src/fpdf.php');
require_once('src/autoload.php');
require_once('parser_src/autoload.php');
//require_once('src/PdfParser/PdfParser.php');


// initiate FPDI
function isHebrew12($string)
{
    // return strlen($string) != strlen(utf8_decode($string));
    return preg_match("/\p{Hebrew}/u", $string);
	//return preg_match("/^\p{Hebrew}+$/u", $string);
}

$pdf = new Fpdi();
// add a page
//$pdf->AddPage();

// $userName = 'Pritam';
// $employerName = 'employer name';
// $moduleName = 'Module Name';

// $userName = @$_REQUEST['userName'] ? $_REQUEST['userName'] : '';
// $employerName = @$_REQUEST['employerName'] ? $_REQUEST['employerName'] : '';
// $moduleName = @$_REQUEST['moduleName'] ? $_REQUEST['moduleName'] : '';

$userName = $idArr[0];
$employerName = $idArr[1];
$moduleName = $idArr[2];

$new_name = 'certificate-demo.pdf';
// file_put_contents($new_name, $fff);

$pdf->AddPage();
$pdf->AddFont('PinyonScript-Regular','','PinyonScript-Regular.php');
// $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);

$pdf->SetFont('PinyonScript-Regular','',49);

$pdf->setSourceFile($new_name);
// import page 1 

// now write some text above the imported page 
$pdf->SetTextColor(203,159,73);

$tplIdx = $pdf->importPage(1);
// $pdf->useTemplate($tplIdx, 0, 0, 794, 1123, true); //215.6, 350.9
$pdf->useTemplate($tplIdx, 0, 0, 210, 297, true); //215.6, 350.9

//for add image
// $pdf->SetXY(58, 220);
// $pdf->Image("api.png", 58, 220, 15, 15);


// $pdf->SetXY(11.5, 144);
// $this->SetX($this->lMargin);
//$value = iconv('UTF-8', 'windows-1255', html_entity_decode($value));
$value = iconv('UTF-8', 'windows-1255//IGNORE', html_entity_decode($userName));//windows-1255//TRANSLIT //IGNORE
// $value = (isHebrew12($value) !== false) ? $value : strrev($value);
$pdf->SetX(11.5);
$pdf->SetY(144);
$pdf->Cell(0,10,$value,0,0,'C');


$pdf->AddFont('EBGaramond-VariableFont_wght','','EBGaramond-VariableFont_wght.php');
$pdf->SetFont('EBGaramond-VariableFont_wght','',15);

$pdf->SetTextColor(0,0,0);
$pdf->SetX(11.5);
$pdf->SetY(168);//154
$pdf->Cell(0,10,'The Testing and Verfication module created by "'.$employerName.'" for',0,0,'C');

$pdf->SetX(11.5);
$pdf->SetY(174);//160
$pdf->Cell(0,10,'testing skill for "'.$moduleName.'"',0,0,'C');


// $pdf->Write(0, $value);
// $pdf->Cell(0,10,'Left text',0,0,'L');
// $pdf->SetX($pdf->lMargin);
// $pdf->Cell(0,10,'Center text:',0,0,'C');
// $pdf->SetX($pdf->lMargin);
// $pdf->Cell( 0, 10, 'Right text', 0, 0, 'R' ); 


$pdf->Output('I', "certificate.pdf"); //D == download   //F === save   // I == view
//$return_arr = array("file_name" => $new_name);
//echo json_encode($return_arr, JSON_UNESCAPED_UNICODE);
//die;

// http://www.fpdf.org/makefont/