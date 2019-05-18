<?php error_reporting(0);
require('fpdf/fpdf.php');
setlocale(LC_TIME, 'es_ES.UTF-8');
session_start();
$usuario = $_SESSION['username'];
    if(!isset($usuario)){
      header("location: index.php");
    }

// ###############-CONEXION-#############################
include 'conexion.php';

$cosulta = "SELECT * FROM alumnos WHERE matricula = '$usuario'";
$res = mysqli_query($con,$cosulta);
$row = $res->fetch_assoc();
//#######################################################
$txt = "UNIVERSIDAD POLITÉCNICA 
DEL ESTADO DE GUERRERO
DIR. DE ING. EN TELEMÁTICA
A QUIEN CORRESPONADA:
 ";

$formato = "El que suscribe Ing. Óscar Gonzáles Juárez Director de la Carrera Ing. En Telemática con clave de incorporación";
class PDF extends FPDF
{
// Cabecera de página
function Header()
{ 
setlocale(LC_TIME, 'es_ES.UTF-8');
// echo 'Después de setlocale es_ES.UTF-8 strftime devuelve: '.strftime("%A, %d de %B de %Y", $miFecha).'<br/>';
    // Arial bold 15
    $this->Ln(10);
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(20);
    // TítulO
    $this->Cell(110,10,utf8_decode('CAMPUZANO, TAXCO GRO A '),0,0,'R');
    $this->Cell(50,10,strtoupper (strftime("%d de %B de %Y")),0,1,'L'); //FECHA
    // Salto de línea
    $this->Ln(30);
}

}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(15);
$pdf->MultiCell(65, 5, utf8_decode($txt) , 0 , 'J', 0);

$pdf->Ln(10);
$pdf->Cell(65);

$pdf->Ln(20);
$pdf->Cell(15);
$pdf->SetFont('Arial','',12);
$pdf->MultiCell(160,5, utf8_decode(' '.$formato.$usuario.' . Hace constar que el C. '.$row[nombre].' '.$row[ap_pat].' '.$row[ap_mat].' '.'es alumno regular de ésta Institución educativa y se encuentra cursando '.$row['cuatri'].'cuatrimestre '.'en el ciclo escolar '.'2018-2019.'),0,'J',0);
$pdf->Ln(5);
$pdf->Cell(15);
$pdf->MultiCell(160,5, utf8_decode('Se extiende la presente a petición del interesado y para los fines que al mismo convenga.'),0,'J',0);

$pdf->Text(87,190,utf8_decode('ATENTAMENTE') );

// $pdf->tabla('MATERIA', 'CALIFICACIÓN');
$pdf->Ln(60);
$pdf->Cell(55);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(80,30, utf8_decode('FIRMA'),1,0,'C');

$pdf->Line(158,240,53,240);
$pdf->SetFont('Arial','B',12);
// $pdf->Text(75,248,utf8_decode('ING. ÓSCAR GONZÁLES JUÁREZ') );
$pdf->Text(55,248,utf8_decode('DIRECTOR DE LA CARRERA ING. EN TELEMÁTICA') );
// $pdf->setfillcolor(255,255,255); 
// // $pdf->Rect(10,240,195.5,30,"DF");
// $pdf->SetFont('Arial','B',10);

// $pdf->Text(94,245,'AUTORIZA SALIDA');

// $pdf->SetFont('Arial','B',8);
// $pdf->SetLineWidth(0.3);

// $pdf->Line(145,261,73,261);
// $pdf->Text(87,265,utf8_decode('ING. ÓSCAR GONZÁLES JUÁREZ') );
// $pdf->Text(74,269,utf8_decode('DIRECTOR DE LA CARRERA ING. EN TELEMÁTICA') );

//$pdf->Cell(40,10,date('d/m/Y'),0,1,'L'); FECHA



$pdf->Output();
?>