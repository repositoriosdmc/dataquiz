<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMC Perú</title>
    <link rel="icon"  href="https://certificaciones.dmc.pe/img/1%20(5).png" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
<body class="container" >


<div class="row justify-content-center mt-4">
        <div class="col-md-7">
            <div class="card">
                <!-- <div class="card-header">Restablecer contraseña</div> -->

                <div class="card-body">
                            
                       <div class="text-center"> 
                       <img src="https://certificaciones.dmc.pe/img/logo_dmc.png" alt="dmc.pe" width="30%" >
                        <h2 class="text-center">¿Has olvidado tu contraseña?</h2>
                  <p>Puede restablecer su contraseña aquí.</p>
                        </div>

                    <form id="form-registro"  class="row g-3 needs-validation mt-2" novalidate>

                    <div class="row mb-3">
                     

                 
                         <div class="row mb-3">
                     

                            <div class="col-md-6 offset-md-3">
                         
                            <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupCorreo"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                            <input type="email" class="form-control" name="email" placeholder="Escriba su correo" id="validacionCorreo" aria-describedby="inputGroupCorreo" required>
                            <div class="invalid-feedback">
                            Necesita un correo válido.
                            </div>
                            </div>
                         </div>
                            
                        </div> 

                        <div class="row mb-2">
                        <div class="col-md-6 offset-md-3">
                         
                         <button class="btn btn-primary" type="submit" style="width: 100%;" id="btn-form" type="submit">Enviar</button>

                      </div>
                        </div>


                        <div class="row" id="mensaje" > </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
    (() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    
    },
     false)
  })
})()





let button = document.querySelector("#form-registro");
let btnForm = document.querySelector("#btn-form");

let correoInput = button.querySelector("#validacionCorreo");

button.addEventListener('submit', async (event) => {
    event.preventDefault();
    if(correoInput.value === "") return ;

    
    btnForm.disabled = true; 
     const params = new FormData(button);

     const resp = await fetch("../suscripcion/controller/controller_formularioLogin_reset.php?op=reset", {
         method: 'POST',
         body: params
     });

     const data = await resp.json(); // Convertir la respuesta a JSON

    
     if (data.datos === 'enviado') {
      btnForm.disabled = true;
   
     }else {
      btnForm.disabled = false; 
    }



    let spanElement = document.getElementById("mensaje");
  

   spanElement.innerHTML = data.text;

});




</script>

</body>
</html>