

<!DOCTYPE html>

<html lang="es">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<title>Login | DMC Institute</title>

<!-- Css -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">





<!-- Css Datatable -->

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">



<!-- Css FontAwesome -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



<!-- Sweet Alert -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

<link rel="icon"  href="../img/1 (5).png" >

    
<style media="screen">

@import url('https://fonts.googleapis.com/css?family=Raleway&display=swap');

* {

	box-sizing: border-box;

}

body {

	margin: 0;

	padding: 0;

	font-family: 'Raleway', sans-serif;

}

.box {
    display: flex;
    background-color: white;
    align-items: center;
    justify-content: center;
    background-color: #225694;
    min-height: 100vh; /* Altura mínima de la ventana */
    width: 100%; /* Asegura que ocupe todo el ancho */
    flex-wrap: wrap; /* Permite que el contenido se ajuste si es necesario */
    padding: 20px; /* Añade espacio interno para evitar que los elementos se peguen a los bordes */
    box-sizing: border-box; /* Asegura que padding y border estén incluidos en el tamaño */
}




.login-form {

  	min-width: 250px;

  	max-width: 400px;

	/* border-radius: 24px; */

	padding: 15px;

	/* background-color: white; */

	/* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); */

}

.login-form h1 {

	text-align: center;

	font-size: 2.5rem;

	margin-top: 35px;

}

.login-form input[type = "text"] {

	margin-top: 30px;

}

.login-form input[type = "password"] {

	margin-top: 10px;

}

input {

  outline: none;

 }

.links {

	margin-top: 10px;

	display: flex;

	flex-wrap: wrap;

	flex-direction: row;

}

.links > a:first-of-type {

	margin-right: 5px;

}

.links > a {

	background-color: #E0E0E0;

	border-radius: 24px;

	font-weight: 400;

	color: black;

	line-height: 12px;

	flex: 1;

	text-align: center;

	padding: 10px;

	text-decoration: none;

  font-family: 'Raleway';

	transition: 0.25s;

}

.links > a:hover {

	opacity: 0.6;

}

.login-form input[type = "submit"] {

	background-color:  #2E9CE3;

	/* background-image: linear-gradient(19deg, #21D4FD 0%, #B721FF 100%); */

	width: 100%;

	color: white;

  	border: none;

	margin-top: 35px;

  	cursor: pointer;

	padding: 10px;

  	font-family: 'Raleway', sans-seriff;

  	font-size: 1.3rem;

	font-weight: bold;

	border-radius: 54px;

	transition: 0.25s;

}

.login-form input[type = "submit"]:hover {

	/* opacity: 0.8; */

}

.login-form input[type = "text"]:focus, .login-form input[type = "password"]:focus {

 	border: 2px #21D4FD solid;

 }

.login-form input[type = "text"], .login-form input[type = "password"] {

	width: 100%;

	border: none;

	border-radius: 24px;

  	font-size: 1rem;

  	font-family: 'Raleway', sans-seriff;

	background-color: #2865A6;

	padding: 15px;



}



.login-form input[type="text"]::placeholder,

.login-form input[type="password"]::placeholder {

    color: white;

}



.login-form input[type="text"]:not(:placeholder-shown),

.login-form input[type="password"]:not(:placeholder-shown) {

    color: #E0F0FF;

}


.google-login-btn {
            display: inline-block;
            background-color: #DD4B39;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 10px;
        }
        .google-login-btn .fa-google {
            margin-right: 8px;
        }
        .google-login-btn:hover {
            background-color:#E07050;
            color: white;
        }
      
</style>





</head>

<body >





		<div class="box" >

			

			<form class="login-form" id="login" autocomplete="off">

			<!-- <h4 style="text-align:center; color:white" >CERTIFICACIONES </h4>  -->

				<div style="text-align:center" ><img src="../img/logo secundario dmc institute-02.png"  width="70%"></div>

				<p style="text-align:center; color:white" class="pt-4" >Ingrese sus datos de acceso2.</p>



				<input type="text" name="usuario" placeholder="Correo" required>

				<input type="password" name="password" placeholder="Password" required>

				<input type="submit" value="Ingresar" ><br>

				

				 <br> 



			</form>



		</div>







<!-- JS -->

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



<!-- JS Datatable -->



<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>



<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>







<script>

$(document).on('submit','#login',function(e){



parametros = $(this).serialize();



//

$.ajax({



url:'../suscripcion/dao/dao_login.php',

type:'POST',

data:parametros,

 dataType:'JSON', 

 beforeSend:function()

{



swal({



title:'Cargando',

text:'Espere un momento',

imageUrl:"../img/loader2.gif",

showConfirmButton:true



});





}, 

success:function(data)

{



// console.log(data.text);





swal({



title:data.title,

text:data.text,

type:data.type,

timer:3000,

showConfirmButton:false

});





//refres login

if(data.type=='success')

{



setTimeout(function(){



window.location.href='../suscripcion/inicio_formulario.php'





},3000);





}











}









});





//



e.preventDefault();

});







</script>



</body>

</html>

