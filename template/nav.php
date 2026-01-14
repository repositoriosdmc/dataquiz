
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="miNavbar">
  <!-- <a class="navbar-brand" href="#">DMC</a> -->

  <!-- <img class="h-log2" src="../../img/logo dmc.png" width="7%"> -->
    <button onclick="paginaDmc()" style="border: none; background: none;"><img class="h-log2" src="/certificaciones/img/logo%20secundario%20dmc%20institute-01.png" style="width: 110px; height: 70px;"></button>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

  

    </ul>
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <?php echo  $_SESSION['USUARIO'] ?>
   </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

            <a class="logout dropdown-item" style="cursor: pointer;">Salir</a>
      </div>
    </div>


  </div>
</nav>


<script>
function paginaDmc() {
  let text = "¡Salir de Certificaciones! ";
  if (confirm(text) == true) {
   
    window.location.href = "https://dmc.pe/";

  } 

}
$(document).on('click','.logout',function(){


$.getJSON('../../suscripcion/dao/dao_logout.php',{},function(data){

  console.log(data);
  


 if(data.type=='success')
 {

Swal.fire({

title:data.title,
icon:data.type,
text:data.text,
timer:3000,
showConfirmButton:false
});


 setTimeout(function(){

window.location.href='../../suscripcion/inicio_formulario.php'


},3000);


 }
 else
 {



alert("error");

 }


});



});

</script>
<!-- fin nav -->
