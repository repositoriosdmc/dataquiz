<!DOCTYPE html>
<html>
<head>
	<title>Becas DMC</title>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://survey.dmc.pe/suscripcion/assets/css/intlTelInput.min.css">


	
    


    <style type="text/css">

    	html, body {

            height: 100%;

        }

        .paddingForm{

        	padding: 7px 35px;
            padding-bottom: 35px;

        }

        .padre {
           display: flex;
           align-items: center;
        }
    	.tpp{
            height: 100px;
            line-height: 100px;
            text-align: center;
            border: 2px dashed #f69c55;
    	}

    	.fondo{
    		background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            -webkit-background-size: cover;
            background-size: cover;
            z-index: 1;
            color: white;
            width: 100%;
            height: 100%;

    	}

    	.columna-1 .form-group label,.columna-2 .form-group label{
            font-weight: 600;
            font-size: 14px;
    	}

    	.columna-1 .form-control,.columna-2 .form-control{
            border-radius: 25px;
            background: transparent;
    	}

    	.columna-1 .form-group label{
    		color: #4ca8f1;
    	}

    	.columna-1 .form-control{
    		border: 1px solid #50abf3;
    	}

    	.columna-2 .form-group label{
    		color: white;
    	}

    	.columna-2 .form-control{
    		border: 1px solid white;
    		color:white;
    	}

    	.columna-2 select.form-control  option {
    		color :black;
    	}
    	.iti{
    		display: block;
    	}

    </style>
</head>
<body>
	<div class="fondo" style="background-image: url(https://survey.dmc.pe/suscripcion/assets/img/dmcsky.png)">
	<img src="https://survey.dmc.pe/suscripcion/assets/img/estudiante.png" style="position: absolute; bottom: 0; right: 0; width: 345px; height: 85%;">
	<div class="container">
		<div class="row">
			<div class="col-md-9" style="zoom:0.8;height: 100vh;">
				<div class="row">
					<form method="post" id="form" action="controller/controller_suscripcion.php" class="col-md-10" style="position: absolute; top: 15%;">
						<input type="hidden" name="medio" value="24">
						<input type="hidden" name="documento" value="DNI">
                        <input type="hidden" name="codigo" id="codigo">
                        <input type="hidden" name="browser" id="browser">
                        <input type="hidden" name="version" id="version">
                        <input type="hidden" name="pais" id="pais">
                        <input type="hidden" name="celular" id="celular">
                        <input type="hidden" name="atendido" id="atendido" value="4">
						<div class="row">
				        <div class="col-md-6 paddingForm" style="background: white; color:black;    border-radius: 30px 0 0 30px;">
				    	    <div style="text-align:center;padding: 16px 0;">
				    		    <h1 style="color: #3a96de; font-size: 27px; letter-spacing: 5px;">FORMULARIO</h1>
				    		    <h2 style="color: #a4d7ff; font-size: 14px;">PROGRAMA DE BECAS</h2>
				    	    </div>
				    	    <div class="columna-1">
				    	    	<div class="form-group">
                                    <label for="exampleFormControlInput1">NOMBRE</label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">APELLIDOS</label>
                                    <input type="text" class="form-control" id="apellidos" name="apellidos"  autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">EMAIL</label>
                                    <input type="email" class="form-control" id="correo" name="correo"  autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">TELÉFONO</label>
                                    <input type="number" class="form-control" id="phone" name="phone"  autocomplete="off" required>
                                    <label id="phone-error" class="error" for="phone" style="display: none;"></label>
                                </div>
                                <div class="row">
                                	<div class="form-group col-md-6">
                                        <label for="exampleFormControlInput1">TIPO DE DOCUMENTO</label>
                                        <select class="form-control" id="tDocumento" name="tDocumento">
                                        	<option value="" required>Seleccione</option>
                                        	<option value="DNI">DNI</option>
                                        	<option value="PASAPORTE">PASAPORTE</option>
                                        	<option value="CE">CARNÉ DE EXTRANJERÍA</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleFormControlInput1">Nº</label>
                                        <input type="text" class="form-control" id="num_documento" name="num_documento"  autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">SEXO</label>
                                    <select class="form-control" id="sexo" name="sexo">
                                        <option value="" required>Seleccione</option>
                                        <option value="M">MASCULINO</option>
                                        <option value="F">FEMENINO</option>
                                    </select>
                                </div>
				    	    </div>
				        </div>
				        <div class="col-md-6 paddingForm" style="background: #007da7;border-radius: 0 30px 30px 0;">
				        	<div style="text-align:center;padding: 16px 0;">
				    		    <h1 style="color: #007da7; font-size: 27px; letter-spacing: 5px;">FORMULARIO</h1>
				    		    <h2 style="color: #007da7; font-size: 14px;">PROGRAMACIÓN DE BECAS</h2>
				    	    </div>
				        	<div class="columna-2">
				        		<div class="form-group">
                                    <label for="exampleFormControlInput1">SELECCIONE EL CURSO</label>
                                    <select class="form-control" name="cursos[]" id="cursos" required>
                                        <option value="" required>Seleccione</option>
                                    	<option value="926">Power BI User</option>
                                    	<option value="929">Python for Analytics</option>
                                        <option value="937">AWS Basics</option>
                                        <option value="936">Fundamentos de programación con Python</option>
                                    	<option value="939">SQL for Analytics Básico</option>
                                    	<option value="925">Dashboard en Excel</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">CUÉNTANOS TU CASO</label>
                                    <textarea class="form-control" name="mensaje" id="mensaje"  required rows="8" maxlength="250"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>

				        	</div>
				        </div>
				        </div>
				    </form>
				</div>
			</div>
		</div>
	</div>
</div>
<script  src="https://survey.dmc.pe/suscripcion/assets/js/jquery.min.js"></script>
	<script src="https://survey.dmc.pe/suscripcion/assets/js/popper.min.js"></script>
	<script  src="https://survey.dmc.pe/suscripcion/assets/js/bootstrap.min.js"></script>
	<script src="https://survey.dmc.pe/suscripcion/assets/js/jquery.validate.min.js"></script>
    <script src="https://survey.dmc.pe/suscripcion/assets/js/additional-methods.min.js"></script>
    <script src="https://survey.dmc.pe/suscripcion/assets/js/selectize.min.js"></script>
	<script src="https://survey.dmc.pe/suscripcion/assets/js/detect.js"></script>
    <script  src="https://survey.dmc.pe/suscripcion/assets/js/intlTelInput.min.js"></script>
    <script  src="https://survey.dmc.pe/suscripcion/assets/js/utils.js"></script>
    <script  src="https://survey.dmc.pe/suscripcion/assets/js/app_prueba.js?v=0.15"></script>
</body>
</html>