<?php

// https://www.shanidkv.com/blog/font-awesome-icons-css-content-values

session_start();

if (!isset($_SESSION[ID])) {

  header('location: ../suscripcion/inicio_formulario.php');
}

include "header.php";

include 'nav.php';

?>

<br><br>

<div class="alert alert-success" role="alert" style="background-image: url('../../img/Fondo de vista inicial.jpg');  background-repeat: no-repeat; background-size: 100% 100%; ">

  <br>
  <h4 style="color:white">¡Bienvenido <?php echo $_SESSION[NOMBRE]. " ".$_SESSION[APELLIDO] ?>!</h4>

  <p style="color:white">Seleccione el challenge que desea realizar.</p>



  <br><br>

</div>





<br>





<br>



<table class="table">

  <thead>

    <tr>

      <th scope="col">#</th>

      <th scope="col"></th>

      <th scope="col" style="text-align: left; padding-left: 25px;"> </th>





    </tr>

  </thead>

  <tbody class="listado">







  </tbody>





</table>



  <script>
    $(document).ready(function() {



      // id_e = window.btoa("44444444");



      $.ajax({

        url: '../suscripcion/controller/controller_formularioLogin.php?op=listaCapacitaciones',

        type: 'POST',

        data: {},

        dataType: 'JSON',

        // beforeSend: function() {

        //    $('.btn-guardar').prop("disabled", true) ;

        // },

        success: function(data) {

          var html = "";



          let contador = 0;



          data.forEach((item, i) => {

            if (item.estado_examen === "pendiente" &&  item.formulario == 1 ) {

              contador++;

              html += `
<tr>
<th scope="row">${contador} </th>
<td>${item.nombre} </td>
<th scope="col">
<a href="../template/formulario-concurso-data?cap=${window.btoa(item.id_formulario)}&nom=${window.btoa(item.nombre)}&pre=${window.btoa(item.cantidad_preguntas)}" class="btn btn-sm" style="background-color:#268CEB; color:white;border-radius: 24px;width: 100px;">Iniciar</a>
</th>
</tr>`;


            }

          });



          $(".listado").html(html);



        }

      });



    });





    $(document).on('click', '.btn-empezar', function(e) {

      console.log("Hola")

      var id = $(this).data('id_formulario');

      var nomCapacitacion = $(this).data('nombre');

      var ti = $(this).data('ti');

      Swal.fire({

        title: 'El examen solo se puede realizar una vez.',

        text: "Una ves comenzado se contará como realizado.",

        icon: "info",

        showCancelButton: true,

        confirmButtonColor: '#3085d6',

        cancelButtonColor: '#d33',

        confirmButtonText: 'Comenzar',

        cancelButtonText: 'Cancelar',

      }).then((result) => {

        if (result.value) {

          //AJAX

          window.location.href = '../template/formulario-preguntas.php?cap=' + window.btoa(id) + '&nom=' + window.btoa(nomCapacitacion) + '&va=' + window.btoa(ti);



          //fin ajax



        }

      })

    });
  </script>



  <!-- fin -->

  <?php

  include "footer.php";

  ?>
