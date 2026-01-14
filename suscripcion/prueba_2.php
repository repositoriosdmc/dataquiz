<?
require_once "../dao/dao_encuesta.php";

$encuesta=new encuesta();

$cursos=$encuesta->listado_curso_form();
$profesores=$encuesta->listado_profesor();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Encuesta</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap-datepicker3.min.css">
	<link rel="stylesheet" href="../css/select2.min.css">
	<script src="../js/jquery-1.10.0.min.js"></script>
	<script src="../js/bootstrap-datepicker.min.js"></script>
	<script src="../js/locales/bootstrap-datepicker.es.js" charset="UTF-8"></script>
	<script src="../js/moment-with-locales.js"></script>
	<script src="../js/select2.full.min.js"></script>
	<style type="text/css">
		.calendar,
.datepicker {
  display: inline-block;
}
.datepicker table tr td.new, .datepicker table tr td.old{
	color: white;
	}
	.datepicker table tr td.active.old,.datepicker table tr td.active.new{
		    color: white;
    background-color:white;
    border-color: white;
    text-shadow: none;
	}
	</style>

</head>
<body>
	<div class="container" style="margin-top: 45px;">
	    <div class="row justify-content-center">
	        <div class="col-md-5">
	            <form action="../controller/controller_encuesta.php" method="post">
	            	<div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Curso</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="curso_id" name="curso_id" required="required">
	            			    <option disabled="disabled" selected="selected" value="">Seleccione Curso</option>
	            			    <?php foreach ($cursos as $key => $curso): ?>
	            				    <option value="<?=$curso['id']?>"><?=utf8_encode($curso["nombre"])?></option>
	            			    <?php endforeach ?>
	            		    </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Profesor</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="profesor_id" name="profesor_id" required="required">
	            			    <option disabled="disabled" selected="selected" value="">Seleccione Profesor</option>
	            			    <?php foreach ($profesores as $key => $profesor): ?>
	            				    <option value="<?=$profesor['id']?>"><?=utf8_encode($profesor["nombre"])?></option>
	            			    <?php endforeach ?>
	            		    </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Inicio</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="fh_inicio" name="fh_inicio" placeholder="Inicio">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Frecuencia</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="frecuencia_array" name="frecuencia_array" required="required" multiple="multiple">
	            			    <optgroup label="Seleccione los días">
	            			        <option value="Lun">Lunes</option>
	            			        <option value="Mar">Martes</option>
	            			        <option value="Mie">Miércoles</option>
	            			        <option value="Jue">Jueves</option>
	            			        <option value="Vie">Viernes</option>
	            			        <option value="Sab">Sábados</option>
	            			        <option value="Dom">Domingo</option>
	            			    </optgroup>
	            		    </select>
                        </div>
                    </div>
                    <input type="hidden" name="frecuencia" id="frecuencia">
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Cant. Sesiones</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="sesiones" name="sesiones" min="1" max="10" placeholder="6">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Hora de de Inicio</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control" id="hora_ini" name="hora_fin" placeholder="Frecuencia">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Hora de de Fin</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control" id="hora_fin" name="hora_fin" placeholder="Frecuencia">
                        </div>
                    </div>
                    <input type="hidden" name="total_horas" id="total_horas">
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Fecha no Clases</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fh_no_clases" name="fh_no_clases" placeholder="Fin" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Fin</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="fh_fin" name="fh_fin" placeholder="Fin" readonly="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Salón</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="salon" name="salon" min="1" max="2" placeholder="6">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Grupo</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="grupo" name="grupo" min="1" max="10" placeholder="6">
                        </div>
                    </div>
                    <div class="">
                    	<button class="">Enviar</button>
                    </div>
                </form>
            </div>
            <div class="col-md-5">
            	<div class="calendar">
            		
            	</div>
            	<div class="calendar">
            		
            	</div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    	$(document).ready(function(){
    		$("#curso_id,#profesor_id,#frecuencia_array").select2();
    		$('#frecuencia_array').change(function(){
    			valor=$(this).val();
    			frecuencia=valor.join('-');
    			$('#frecuencia').val(frecuencia);
    		});
    		function lista_fechas(){
    			var cant=$('#sesiones').val();
    			var fh_inicio=$('#fh_inicio').val();
    			var frecuencia=$('#frecuencia').val();
    			var no_clases=$('#date_exception').val();
    			var fechas=new Array();
    			var dia={0:"Dom",1:"Lun",2:"Mar",3:"Mie",4:"Jue",5:"Vie",6:"Sab"};
    			var arr_frec=frecuencia.split("-");
    			var arr_no_clases=no_clases.split(",");
    			var sesion=1,num_day;
    			var fh_ini=moment(fh_inicio).add(1,'days').format("YYYY-MM-DD");

    			if (sesion>0 && fh_inicio!="" && frecuencia!="") {
    				console.log(arr_no_clases);
    			    while (sesion<=cant) {
    				    num_day=new Date(fh_ini).getDay();
    				    date_normal=moment(fh_ini).add(-1,'days').format("YYYY-MM-DD");
    				    if (arr_frec.indexOf(dia[num_day])!==-1 && arr_no_clases.indexOf(date_normal)==-1) {
    					    fechas.push(date_normal);
    					    sesion++;
    				    }
    				    fh_ini=moment(fh_ini).add(1,'days').format("YYYY-MM-DD");
    			    }
                    fh_fin=fechas[fechas.length-1];
    			}

                $('#fh_fin').val(fh_fin);
    			$('.calendar').datepicker("setDate", fechas);

    			console.log(fechas);

    		}

    		$('#sesiones,#date_exception').change(lista_fechas);

    		$('#date_exception').datepicker({
    			language: "es",
                multidate: true,
	            format: 'yyyy-mm-dd'
            });

            /*$('#calendar').datepicker({
                language: "es",
                multidate: true,
                numberOfMonths: 2,
	            format: 'yyyy-mm-dd'
            });*/
            $('.calendar').map(function(index) {
  $(this).datepicker({
  	defaultViewDate: {
      year: (new Date()).getFullYear(),
      month: (new Date()).getMonth() + index,
      date: 1
    },
    disabledDates: [
                        moment("04/20/2018"),
                    ],
    language: "es",
    multidate: true,
	format: 'yyyy-mm-dd',
    updateViewDate: false
  });
});

// keep month in sync
var orderMonth = function(e) {
  var target = e.target;
  var date = e.date;
  var calendars = $('.calendar');
  var positionOfTarget = calendars.index(target);
  calendars.each(function(index) {
    if (this === target) {
      return;
    }
    var newDate = new Date(date);
    newDate.setUTCDate(1);
    newDate.setMonth(
      date.getMonth() + index - positionOfTarget
    );
    
    $(this).datepicker('_setDate', newDate, 'view');
  });
};
$('.calendar').on('changeMonth', orderMonth);

// keep dates in sync
$('.calendar').on('changeDate', function(e) {
  var calendars = $('.calendar');
  var target = e.target;
  var newDates = $(target).datepicker('getUTCDates');
  calendars.each(function() {
    if (this === e.target) {
    	return;
    }
    
    // setUTCDates triggers changeDate event
    // could easily run into an infinite loop
    // therefore we check if currentDates equal newDates
    var currentDates = $(this).datepicker('getUTCDates');
    if (
      currentDates &&
      currentDates.length === newDates.length &&
      currentDates.every(function(currentDate) {
 				return newDates.some(function(newDate) {
          return currentDate.toISOString() === newDate.toISOString();
        })
      })
    ) {
      return;
    }
    
    $(this).datepicker('setUTCDates', newDates);
  });
});







    	});
    </script>
</form>
</body>
</html>