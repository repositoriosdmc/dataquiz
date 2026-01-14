<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMC - Consultar Certificado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <style>
        .tp div {
            margin-right: 56px;
        }
    </style>



</head>

<body>
    <div>
        <div class="banner">

            <img src="https://socialdata-peru.com/wp-content/uploads/2020/11/comuestu.jpg" alt="" style=" width: 100%; height: 300px; ">

            <img src="https://dmc.pe/wp-content/uploads/2021/02/cropped-logotipo.png" alt="" style=" position: absolute; left: 0; top: 30px; left: 30px; ">
            <h2 style=" position: absolute; top: 0; color: white; text-align: center; left: 33%; top: 20%; font-size: 45px; text-shadow: -1px 2px 1px #000000fa; ">Consulta Certificado</h2>
        </div>
        <div class="container-sm" style="width: 600px; margin: 15px auto;background: #e7e7e7; height: 330px; padding: 40px;">
            <div class="">
                <div class="mb-3">
                    <input type="text" class="form-control" id="dni" placeholder="Colocar DNI">
                    <div class="d-grid gap-2" style="margin-top: 12px;">
                        <button type="button" class="btn btn-primary" id="btnBuscar">Buscar</button>
                    </div>

                </div>
            </div>
            <div class="resultado">
                <div class="ok" id="ok" style="display: none;">
                    <div class="tp" style="display: flex;">
                        <div>31586</div>
                        <div>Gobierno de datos</div>
                        <div>Edición - 4</div>
                        <div><a href="https://dmc-documentos.s3.amazonaws.com/CAS-31586.pdf" target="_blank">Asistencia</a></div>
                    </div>
                </div>
                <div id="nok" style="display: none;">
                    <div>No hay resultados</div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>

<script type="text/javascript">
    var btn = document.getElementById("btnBuscar");

    btn.addEventListener("click", function(e) {
        var dni = document.getElementById("dni").value;

        if(dni == '73258925'){
            document.getElementById("ok").style.display = "block";
            document.getElementById("nok").style.display = "none";
        }else{
            document.getElementById("ok").style.display = "none";
            document.getElementById("nok").style.display = "block";
        }


    });
</script>