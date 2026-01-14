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
</head>
<body class="container"  >
<!-- style="background-image: url('https://certificaciones.dmc.pe/img/fondo general.jpg')" -->


<div class="row justify-content-center mt-4">
        <div class="col-md-7">
            <div class="card">
            <div class="card-body"  >
                <!-- <div class="card-body" style=" background-color: rgba(0, 0, 0, 0.9);" > -->
                     
   
                       <div class="text-center m-4"> 
                        <img src="https://certificaciones.dmc.pe/img/logo_dmc.png" alt="dmc.pe" width="35%" >
                        <h3 class="text-center  m-4">Restablecer contraseña</h3>
                        <h4><?php echo $_GET['mail'] ?></h4>
                
                        </div>

                    <form id="form-registro"  class="row g-3 needs-validation mt-2" novalidate>



                    <input type="hidden" name="email" value="<?php echo $_GET['mail'] ?>" >        
                    <input type="hidden" name="ha" value="<?php echo $_GET['ha'] ?>"  >  
                     
                    

                          <div class="row mb-3">
                     

                                <div class="col-md-6 offset-md-3">
                            
                                    <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPassword"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="password" placeholder="Escriba su nueva contraseña" id="password" aria-describedby="inputGroupPassword" minlength="6" maxlength="12" required>
                                    <div class="invalid-feedback">
                                    Necesita una contraseña válida de mínimo 6 dígitos.
                                    </div>
                                    </div>
                                </div>
                                
                            </div> 


                            <div class="row mb-3">
                     

                                <div class="col-md-6 offset-md-3">
                            
                                    <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPassword2"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="repite_password" placeholder="Repita la nueva contraseña" id="repite_password" aria-describedby="inputGroupPassword2" minlength="6" maxlength="12"  required>
                                    <div class="invalid-feedback">
                                    Necesita una contraseña válida de mínimo 6 dígitos.
                                    </div>
                                    </div>
                                </div>
                                
                            </div> 


                        <div class="row mb-2">
                        <div class="col-md-6 offset-md-3">
                         
                         <button class="btn btn-primary" style="width: 100%;" id="btn-form" type="submit">Enviar</button>

                      </div>
                        </div>

                        <div id="mensaje" class="row">
                            
                        </div>

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
    }, false)
  })
})()


let button = document.querySelector("#form-registro");
let btnForm = document.querySelector("#btn-form");


let passwordInput = button.querySelector("#password");
let repite_passwordInput = button.querySelector("#repite_password");

button.addEventListener('submit', async (event) => {
    event.preventDefault();

    if(passwordInput.value === "" || repite_passwordInput.value === "" || passwordInput.value.length < 6 || repite_passwordInput.value.length < 6) return; 

    btnForm.disabled = true; 

     const params = new FormData(button);

  

      const resp = await fetch("../suscripcion/controller/controller_formularioLogin_reset.php?op=reset-password", {
          method: 'POST',
          body: params
      });
      const data = await resp.json();

    
      if (data.valor === 'success') {
       btnForm.disabled = true;
   
      }else {
       btnForm.disabled = false; 
      }



     let divElement = document.getElementById("mensaje");
  

    divElement.innerHTML = `<div class="col-md-6 offset-md-3">
                 <div class="alert alert-${data.valor}" role="alert">
               ${data.text}
                        </div></div>`;
 
});


</script>

</body>
</html>