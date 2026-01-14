<?php

require('../../academico/pdf/fpdf.php');
require "../../libreria/phpqrcode/qrlib.php";

$capacitacion = $_REQUEST['cap'];
$usuario = $_REQUEST['us'];
$intento = $_REQUEST['in'];
$filename = "../../img/qr/test.png";

$tamanio = 1;
$level = "M";
$frameSize = 3;
$contenido = 'https://certificaciones.dmc.pe/template/consulta-certificaciones.php?cap='.$capacitacion.'&us='.$usuario.'&in='.$intento;



require_once "../../suscripcion/dao/dao_formularioLogin.php";

$dao_formularioLogin = new dao_formularioLogin();
$resultado = $dao_formularioLogin->datosUsuario($capacitacion, $usuario);


if (!$resultado ) { //si no existe datos
   
    header("Location: https://certificaciones.dmc.pe/suscripcion/inicio_formulario.php"); 
 }

//QRcode::png($contenido,$filename,$level,$tamanio,$frameSize);

// echo "<img src='".$filename."' >"; 


class PDF extends FPDF
{
    function RoundedRect($x, $y, $w, $h, $r, $style = '')
    {
        $k = $this->k;
        $hp = $this->h;
        if($style=='F')
            $op='f';
        elseif($style=='FD' || $style=='DF')
            $op='B';
        else
            $op='S';
        $MyArc = 4/3 * (sqrt(2) - 1);
        $this->_out(sprintf('%.2F %.2F m',($x+$r)*$k,($hp-$y)*$k ));
        $xc = $x+$w-$r ;
        $yc = $y+$r;
        $this->_out(sprintf('%.2F %.2F l', $xc*$k,($hp-$y)*$k ));

        $this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);
        $xc = $x+$w-$r ;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-$yc)*$k));
        $this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);
        $xc = $x+$r ;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2F %.2F l',$xc*$k,($hp-($y+$h))*$k));
        $this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);
        $xc = $x+$r ;
        $yc = $y+$r;
        $this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$yc)*$k ));
        $this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
        $this->_out($op);
    }

    function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
    {
        $h = $this->h;
        $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c ', $x1*$this->k, ($h-$y1)*$this->k,
            $x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
    }

    // Función para imprimir texto con tamaño variable dentro del rectángulo
    function DynamicText($x, $y, $w, $h, $text)
    {
        $fontSize = 10; // Tamaño de fuente inicial
        $fontStep = 0.1; // Incremento de tamaño de fuente
        $maxFontSize = 50; // Tamaño de fuente máximo

        // Iterar hasta encontrar el tamaño de fuente que encaje el texto dentro del rectángulo
        while ($fontSize <= $maxFontSize) {
            // Establecer tamaño de fuente
            $this->SetFont('Arial', '', $fontSize);

            // Obtener ancho del texto
            $textWidth = $this->GetStringWidth($text);

            // Si el texto cabe dentro del rectángulo, imprimirlo y salir del bucle
            if ($textWidth <= $w) {
                $this->SetXY($x, $y + ($h - $fontSize) / 2);
                $this->Cell($w, $fontSize, $text, 0, 0, 'C');
                break;
            }

            // Incrementar el tamaño de fuente
            $fontSize += $fontStep;
        }
    }
}


ini_set('memory_limit', '-1');

$pdf = new PDF("L");

// Añadimos una página al documento
$pdf->AddPage();
$pdf->SetAutoPageBreak(false);


// Agregamos una imagen de fondo
 $pdf->Image('../../img/fondo-certificado-examen.jpg',  0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight()); // Ajusta las dimensiones según lo necesites


 // Genera el código QR
 QRcode::png($contenido,$filename,$level,$tamanio,$frameSize);

// Obtén las dimensiones del código QR generado
list($anchoQR, $altoQR) = getimagesize($filename);

// Calcula las coordenadas para colocar el código QR en la parte inferior izquierda
$posicionX = 30; // Ajusta la posición X según sea necesario
$posicionY = $pdf->GetPageHeight() - $altoQR - 27; // Ajusta la posición Y según sea necesario

// Agrega el código QR al PDF
$pdf->Image($filename, $posicionX, $posicionY, $anchoQR, $altoQR);

 // Establecemos la fuente y el tamaño del texto
$pdf->SetFont('Arial','B',22);
 // Establecer el color del texto utilizando los componentes RGB
 $pdf->SetTextColor(hexdec("0A"), hexdec("6B"), hexdec("FC"));
$pdf->Cell(0,130, utf8_decode($resultado["nombres_completos"]) ,0,1,'C');
// $pdf->SetTextColor(0, 0, 0);
/*
// Agregamos un párrafo de texto color blanco
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial','B',14);

 $pdf->Cell(0, -44, utf8_decode('SQL SERVER'), 0, 10, 'C', false);


// Restaurar el color del texto al predeterminado (negro) si es necesario
$pdf->SetTextColor(0, 0, 0); */


// Definir las coordenadas y dimensiones del rectángulo
$x = 91;
$y = 120;
$w = 120;
$h = 10;
$pdf->SetFillColor(0, 104, 255); // Establece el color de fondo del rectángulo
$pdf->RoundedRect($x, $y, $w, $h, 3, 'F'); // Dibuja el rectángulo

$text = $resultado["nombre"];
$pdf->SetFont('Times', 'B', 15); // Establece la fuente en negrita y tamaño 5
$pdf->SetTextColor(255, 255, 255); // Establece el color del texto en blanco
$pdf->SetXY($x, $y); // Establece la posición para el texto
$pdf->Cell($w, $h, utf8_decode($text), 0, 0, 'C'); // Imprime el texto dentro del rectángulo


$pdf->Output(); 



/*
// Uso del PDF extendido
$pdf = new PDF();
$pdf->AddPage();

// Definir las coordenadas y dimensiones del rectángulo
$x = 10;
$y = 10;
$w = 100;
$h = 20;
$pdf->SetFillColor(0, 104, 255); // fondo
// Dibujar el rectángulo
$pdf->RoundedRect($x, $y, $w, $h, 5, 'F');
$pdf->SetFont('Arial', 'B', 12); // Establece la fuente en negrita
$pdf->SetTextColor(255, 255, 255); // Establece el color del texto en blanco (RGB)

// Texto con tamaño variable dentro del rectángulo
$text = "Texto con tamaño variableTexto con tamaño variable";
$pdf->DynamicText($x, $y, $w, $h, utf8_decode($text));

$pdf->Output();


*/


?>