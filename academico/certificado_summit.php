<?php
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



$pdf = new FPDF('L');
$pdf->AddFont('MinionPro-Semibold','','MinionPro-Semibold.php');
$pdf->AddFont('MinionPro-Bold','','MinionPro-Bold.php');
$pdf->AddFont('MinionPro-Regular','','MinionPro-Regular.php');
$pdf->SetRightMargin(false);
$pdf->SetAutoPageBreak(false);// eliminar margin bottom (desactiva el salto a pagina)
$pdf->AddPage();
$pdf->Image('/plantilla/certificado.png', 0, 0, 297, 210);
//$pdf->Image('https://survey.dmc.pe/inscripcion/assets/img/certificado_asistencia.jpg', 0, 0, 297, 210);


/* Participante */
$value=array(//nombre
            "text"=>"GianCarlo Quispe Mamani",
            "fuente"=>"MinionPro-Semibold",
            "tamanio"=>"31",
            "color"=>array(0,0,0),
            "center"=>"ok",
            "position"=>array(0,112.2)
        );
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



/* Texto Horas */

$pdf->Output();

?>