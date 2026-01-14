<?php
ini_set('memory_limit', '-1');
require('pdf/fpdf.php');
require_once "certificicado_detalle.php";


function pdf_text_center($ct){
	//ct -> detalle del certificado
	$pdfx = new FPDF('L');
	$pdfx->AddFont($ct["fuente"],'',$ct["fuente"].".php");
	$pdfx->AddPage();
	$pdfx->SetFont($ct["fuente"],'',$ct["tamanio"]);
	$midPtX = $pdfx->GetPageWidth() / 2;
    //now we need to know how long the write string is
    $len=$pdfx->GetStringWidth($ct["text"]);
    //now we need to divide that by two to calculate the shift
    $shiftLeft = $len / 2;
    //now calculate our new X value
    $x = $midPtX - $shiftLeft;
    return $x;
}

$certificado=new certificado();

$detalle=$certificado->certificado;

$notas=$certificado->notas;


if(isset($codigo)){

    $detalle["codigo"]["text"]=$codigo;
    
}

$nombreApellidos = "MArco Antonio Medrano Contreras";

if(isset($nombreApellidos)){

    $detalle["nombre"]["text"]=$nombreApellidos;
    
}

if(isset($capacitacion)){

    $detalle["capacitacion"]["text"]=$capacitacion;
    
}

if(isset($horas)){

    $detalle["horas"]["text"]=$horas;
    
}

//setlocale(LC_ALL, 'es_PE');
    
//$detalle["fecha"]["text"]=strftime("%I:%M %P",strtotime(date("Ymd")));



$pdf = new FPDF('L');
$pdf->AddFont('MinionPro-Semibold','','MinionPro-Semibold.php');
$pdf->AddFont('MinionPro-Bold','','MinionPro-Bold.php');
$pdf->AddFont('MinionPro-Regular','','MinionPro-Regular.php');
$pdf->SetRightMargin(false);
$pdf->SetAutoPageBreak(false);// eliminar margin bottom (desactiva el salto a pagina)
$pdf->AddPage();
//$pdf->Image('https://survey.dmc.pe/plantilla/certificado.png', 0, 0, 297, 210);
$pdf->Image('http://digitacion.dmc.pe/academico/certificado/plantilla_certificado_4.png', 0, 0, 297, 210);
/* Linea de firma Instructor */
$line_x=110;
$pdf->Line($line_x+0.8, 177.0, $line_x-55, 177.0); 

/* Texto Horas */

$horas_acamedicas="realizado en el centro de capacitación DMC, con una duración de ".$detalle["horas"]["text"]." horas académicas.";
$detalle["horas"]["text"]=$horas_acamedicas;

foreach ($detalle as $key => $value) {
	$pdf->SetFont($value["fuente"],'',$value["tamanio"]);
    /* Transformación a UTF8 */
    $text = iconv('UTF-8', 'windows-1252', $value["text"]);
    $color=$value["color"];
    $pdf->SetTextColor($color[0],$color[1],$color[2]);
    $x=$value["position"][0];
    $y=$value["position"][1];
    $estado=$value["center"];
    /* Centrar en bloques */
    if ($estado=="ok") {
    	$x=pdf_text_center($value);
    }else if($estado=="right"){
        $len=$pdf->GetStringWidth($text)/2;
        $x=$x-$len;
    }

    $pdf->setXY($x,$y); 
    $pdf->Write(0, $text); 
}
//$img1="http://digitacion.dmc.pe/academico/certificado/firma/Alex_Rayon.png";
//$pdf->Cell(100,200, "", 500, 100, 'C',$pdf->Image($img1,65,164,0,16));


//Notas
$pdf->AddPage();
$pdf->Image('http://digitacion.dmc.pe/academico/certificado/plantilla_notas_1.png', 0, 0, 297, 210);
foreach ($notas as $key => $value) {
    $pdf->SetFont($value["fuente"],'',$value["tamanio"]);
    /* Transformación a UTF8 */
    $text = iconv('UTF-8', 'windows-1252', $value["text"]);
    $color=$value["color"];
    $pdf->SetTextColor($color[0],$color[1],$color[2]);
    $x=$value["position"][0];
    $y=$value["position"][1];
    $estado=$value["center"];
    /* Centrar en bloques */
    if ($estado=="ok") {
        $x=pdf_text_center($value);
    }

    $pdf->setXY($x,$y); 
    $pdf->Write(0, $text); 
}


$pdf->Output();
?>