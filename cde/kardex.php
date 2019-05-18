
<?php error_reporting(0);
require('fpdf/fpdf.php');
session_start();
$usuario = $_SESSION['username'];
    if(!isset($usuario)){
      header("location: index.php");
    }

// ###############-CONEXION-#############################
include 'conexion.php';

$cosulta = "SELECT ap_pat,ap_mat,nombre,nom_materia,calificacion FROM alumnos INNER JOIN calificaciones on alumnos.matricula = calificaciones.matri_alumno INNER JOIN materias on materias.id_materia = calificaciones.mat_id WHERE matri_alumno = '$usuario'";
$res = mysqli_query($con,$cosulta);
$row = $res->fetch_assoc();
//#######################################################

class PDF extends FPDF
{
// Cabecera de página
function Header()
{ 
    // Arial bold 15
    $this->Ln(5);
    $this->SetFont('Arial','B',16);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,utf8_decode('UNIVERSIDAD POLITÉCNICA DEL ESTADO DE GUERRERO'),0,0,'C');
    // Salto de línea
    $this->Ln(3);
    $this->Cell(80);
    $this->SetFont('Arial','B',14);
    $this->Cell(30,20,utf8_decode('DIRECCIÓN DE INGENIERÍA EN TELEMÁTICA'),0,0,'C');
    $this->Ln(30);

}
function tabla($c1, $c2){
    $this->SetFont('Arial','',12);
    $this->Cell(25);
    $this->Cell(100,10, utf8_decode($c1),1,0,'L');
    $this->Cell(40,10, utf8_decode($c2),1,1,'C');
}

}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30,10, utf8_decode('MATRÍCULA: '.$usuario),0,0,'L');
$pdf->Cell(40,10, utf8_decode(''),0,1,'L');
$pdf->Cell(30,10, utf8_decode('ALUMNO: '.$row['nombre'].' '.$row['ap_pat'].' '.$row['ap_mat']),0,0,'L');
$pdf->Cell(40,10, utf8_decode(''),0,1,'L');
$pdf->Ln(10);
$pdf->Cell(65);
$pdf->Cell(60,10, utf8_decode('HISTORIAL ACADÉMICO'),0,0,'C');
$pdf->Ln(20);
$pdf->Cell(25);
$pdf->Cell(100,10, utf8_decode('MATERIA'),1,0,'C');
$pdf->Cell(40,10, utf8_decode('CALIFICACIÓN'),1,1,'C');
// $pdf->tabla('MATERIA', 'CALIFICACIÓN');
while($row = $res->fetch_assoc()){
    $pdf->tabla(utf8_encode($row['nom_materia']),utf8_encode($row['calificacion']));
}
// $pdf->tabla('','');
// $pdf->tabla('','');
// $pdf->tabla('','');
// $pdf->tabla('','');
// $pdf->tabla('','');
// $pdf->tabla('','');
// $pdf->tabla('','');
// $pdf->tabla('','');
$pdf->Ln(50);
$pdf->Cell(58);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(80,20, utf8_decode('FIRMA'),1,0,'C');
$pdf->Line(145,261,73,261);
$pdf->SetFont('Arial','B',8);
$pdf->SetFont('Arial','B',12);

$pdf->Text(55,270,utf8_decode('DIRECTOR DE LA CARRERA ING. EN TELEMÁTICA') );

// $pdf->Text(87,265,utf8_decode('ING. ÓSCAR GONZÁLES JUÁREZ') );
// $pdf->Text(74,269,utf8_decode('DIRECTOR DE LA CARRERA ING. EN TELEMÁTICA') );
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