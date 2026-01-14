<?php

require('../academico/pdf/fpdf.php');


function generarPDF() {
  ob_start();

     $pdf = new FPDF();
     $pdf->AddPage();
     $pdf->SetFont('Arial', 'B', 16);
     $pdf->Cell(80, 70, iconv('UTF-8', 'ISO-8859-2', 'Hola múndo'));

     $contenidoPDF = $pdf->Output('', 'S'); // Generar el PDF y obtener su contenido como una cadena

     ob_end_clean();

     return $contenidoPDF;
}

  $contenidoPDF = generarPDF();

  // Importa las clases de PHPMailer
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\SMTP;

  // Carga cada archivo de la clase manualmente

  require '../academico/PHPMailer/src/Exception.php';
  require '../academico/PHPMailer/src/PHPMailer.php';
  require '../academico/PHPMailer/src/SMTP.php';

  $mail = new PHPMailer;


  $mail->isSMTP();
  $mail->Host = 'mail.intranetdmc.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'test@intranetdmc.com';
  $mail->Password = 'YZtOIDQ.5IqM';
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;


  $mail->setFrom('capacitacion@dmc.pe', "holaa from");
  $mail->addAddress("carlos.mori@dmc.pe", "omar");     // Add a recipient

  // Configurar el asunto y el cuerpo del correo electrónico
  $mail->Subject = 'Adjunto de PDF';
  $mail->Body = 'Adjunto de archivo PDF';

  // Adjuntar el archivo PDF generado con FPDF
//$mail->addStringAttachment($contenidoPDF, 'Examen resultados.pdf');

// Enviar el correo electrónico
if ($mail->send()) {
    echo 'El correo electrónico fue enviado correctamente.';
} else {
    echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
}



 ?>
 <!--  -->








 <div class="container">

   <!-- <div class="row justify-content-md-center">



    <div class="col-md-8" style="text-align: center;padding: 35px 20px 20px">

          <img  src="../img/logo.png" alt="Responsive image" class="img-responsive" width="60%" >

         </div>

 <br>

     <div style="padding: 25px 35px; border: 1px solid #c8c7c7; margin: 15px 0; border-radius: 6px; box-shadow: 0px 1px 5px #dddddd;background: white;">

       <div class="banner_inicial" style="text-align: center;" >

             <img  src="https://certificaciones.dmc.pe/img/logo_encuesta.png"  width="20%" >
             <h2> <b><?php// echo $nombreCap; ?></b> </h2>
       </div>

      <div class="div_tiempo" style="text-align:center">
         <h3><strong>Tiempo: <span id="countdown" ></span>  </strong> </h3>


       </div>
 <br>

 <div id="texto_inicial">

 <p>

 Hola, somos DMC Perú

 </p> -->



 <hr>

 <br>
<!-- 
 <form name="form" id="form" autocomplete="off">




 <div class="form-group div_preguntas">

 </div>

 <div class="row">

                     <div class="col-md-12" >



                           <button type="submit" class="btn btn-primary btn-envia" id="button">Enviar</button>



                   </div>      </div>

       </form> -->



     </div>



 </div>



   </div>

 </div>

 <script type="text/javascript">

   var capacitacion ="";
   // var preguntas = "";
   var json_data = [];



 $(document).ready(function(event)

 {


       capacitacion = "<?php echo $valorDecodificado; ?>";


    // preguntas = "";


 listaPreguntas();


 });


 function listaPreguntas(){
   $.ajax({

         url:'../suscripcion/controller/controller_formularioLogin.php?op=consultaPreguntas',

         type:'POST',

         data:{"capacitacion":capacitacion},
          dataType:'JSON',
           beforeSend:function(){
             Swal.fire({

            title:'Cargando',
            text:'Espere un momento',
            imageUrl:"../img/loader2.gif",
            showConfirmButton:false

            });
                          },

         success:function(data){

           if (data.mensaje == "existe") {
             window.location.href="../template/home.php";
           }else {


           var contador = 0;


           data.datos.forEach((item, i) => {
               var contadorOpciones = 0;
             contador++;
             var filaHTML = '<label class="pay no-select" style="font-family: Helvetica, Arial, sans-serif; color:#8E93A3">'+contador+'. ';
                 filaHTML += item.pregunta+'</label><br>';


               if (item.opciones) {
                   res = JSON.parse(item.opciones);
                     res.forEach(function(is) {
                       contadorOpciones ++;
                       filaHTML += '<div style="font-family: Helvetica, Arial, sans-serif; color:#8E93A3" class="custom-control custom-radio">';
                         filaHTML += '<input type="radio"  id="radio'+contador+'-'+contadorOpciones+'" name="'+contador+'" value="'+item.id_pregunta+'/'+is.opcion+'/'+is.numero+'" class="custom-control-input">';
                         filaHTML += '<label class="custom-control-label" for="radio'+contador+'-'+contadorOpciones+'">'+is.opcion+'</label>';
                       filaHTML += '</div>';

                     });

               }
               $(".div_preguntas").append(filaHTML);

               // incio guarda preguntas

               // data = {
               //             numero: contador,
               //             pregunta : item.pregunta,
               //             id_pregunta : item.id_pregunta
               //             };
               //             json_data.push(data);
               //             preguntas = JSON.stringify(json_data);
               //fin gp
               });


               Swal.fire({

               title:"¡El tiempo de duración del examen es de 20 minutos!",
               text:"Empieza ahora.",
               icon:"success",
               timer:3000,
               showConfirmButton:true
               });
 }

 }

 });
 }

 function countdown(minutes, seconds) {
   var targetTime = new Date().getTime() + (minutes * 60 * 1000) + (seconds * 1000);

   var countdownTimer = setInterval(function() {
     var now = new Date().getTime();
     var distance = targetTime - now;

     var remainingMinutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
     var remainingSeconds = Math.floor((distance % (1000 * 60)) / 1000);

     document.getElementById("countdown").innerHTML = remainingMinutes + "m " + remainingSeconds + "s";

     if (distance < 0) {
       clearInterval(countdownTimer);
       document.getElementById("countdown").innerHTML = "Tiempo finalizado";
       //
       $.ajax({

     url:'../suscripcion/controller/controller_formularioLogin.php?op=registraRespuestas',
     type:'POST',
     data:$("#form").serialize()+ '&capacitacion='+capacitacion,
     dataType:'JSON',
     beforeSend:function(){

     Swal.fire({
     title:'Cargando..',
     text:'Espere un momento',
      showConfirmButton : false
     })

     },
     success:function(data){
       Swal.fire({

       title:"¡El tiempo se término!",
       text:data.text,
       icon:data.type,
       timer:3000,
       showConfirmButton:false
       });

       setTimeout(function(){
       window.location.href='../suscripcion/inicio_formulario.php'
       },3000);

     }

     });
       //
     }
   }, 1000);
 }

 countdown(<?php echo $remainingMinutes; ?>, <?php echo $remainingSeconds; ?>);

 $(document).on('submit','#form',function(e){



   $.ajax({

         url:'../suscripcion/controller/controller_formularioLogin.php?op=registraRespuestas',

         type:'POST',

         data:$(this).serialize()+ '&capacitacion='+capacitacion,
          dataType:'JSON',
         beforeSend: function() {

             $('.btn-envia').prop("disabled", true) ;
             Swal.fire({

            title:'Cargando',
            text:'Espere un momento',
            imageUrl:"../img/loader2.gif",
            showConfirmButton:false

            });
         },

         success:function(data){

           $('.btn-envia').prop("disabled", false) ;
       setTimeout(function(){

       window.location.href='../suscripcion/inicio_formulario.php'


       },3000);
       Swal.fire({

       title:data.title,
       text:data.text,
       icon:data.type,
       timer:3000,
       showConfirmButton:false
       });
 }

 });

  e.preventDefault();

 });

 // desactivar en back
 (function (global) {

 	if(typeof (global) === "undefined")
 	{
 		throw new Error("window is undefined");
 	}

     var _hash = "!";
     var noBackPlease = function () {
         global.location.href += "#";

 		// making sure we have the fruit available for juice....
 		// 50 milliseconds for just once do not cost much (^__^)
         global.setTimeout(function () {
             global.location.href += "!";
         }, 50);
     };

 	// Earlier we had setInerval here....
     global.onhashchange = function () {
         if (global.location.hash !== _hash) {
             global.location.hash = _hash;
         }
     };

     global.onload = function () {

 		noBackPlease();

 		// disables backspace on page except on input fields and textarea..
 		document.body.onkeydown = function (e) {
             var elm = e.target.nodeName.toLowerCase();
             if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                 e.preventDefault();
             }
             // stopping event bubbling up the DOM tree..
             e.stopPropagation();
         };

     };

 })(window);
 </script>


 <?php include "footer.php"; ?>
