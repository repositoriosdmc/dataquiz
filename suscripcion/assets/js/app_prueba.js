function detect_country(){

            var celular = $("#phone").val();

            if(celular){

                var pais = $(".iti__selected-flag").attr("title").split(" ");

                var nombrePais = pais[0].replace(":", "");;

                var full_phone = iti.getNumber();

                $('#celular').val(full_phone);

                $('#pais').val(nombrePais);

            }
    
        }

$(document).ready(function () {

  $('#phone').blur(detect_country).keyup(detect_country).keydown(detect_country);

  var input = document.querySelector("#phone");

  iti = window.intlTelInput(input, {
    initialCountry: "auto",
    geoIpLookup: function (callback) {
      $.get('https://ipinfo.io', function () { }, "jsonp").always(function (resp) {

        var countryCode = (resp && resp.country) ? resp.country : "";

        if (countryCode == "PE") {
          $('#pais').val("Peru");
          $('#tDocumento').val("DNI");
        }
        detect_country()
        callback(countryCode);
      });
    },
  });


  var adress;

  $.urlParam = function (name) {
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results == null) {
      return null;
    }
    else {
      return results[1] || 0;
    }
  }

  $('#browser').val(window.ui.browser);
  $('#version').val(window.ui.version);
  $('#so').val(window.ui.os);

  jQuery.extend(jQuery.validator.messages, { required: "Campo obligatorio" });

  $.validator.addMethod("phoneInternational", function (value, element, param) {

    if (iti.isValidNumber()) {

      return true;

    } else {

      return false;

    }


  }, "Formato inválido");

  $.validator.addMethod("pattern", function (value, element, param) {

    if (this.optional(element)) {

      return true;

    }

    if (typeof param === "string") {

      param = new RegExp("^(?:" + param + ")$");

    }

    return param.test(value);

  }, "Formato inválido");

  $.validator.addMethod("selectmultiple", function (value, element, param) {

    if($("#select option:selected").length < 4){

      return true;

    }else{

      return false;

    }

  }, "Supera el límite de curso");

  var mobile = window.ui.os == "Android" ||  window.ui.so == "iPhone" ? "Mobile" : "Desktop" ;

        var url = document.referrer == "" ? null : document.referrer;

        var input = document.querySelector("#phone");

        var curso_id = $('#curso_id').val();

        var curso_=$('#capacitacion_id').val();

        var curso=curso_==undefined ? [] :curso_.split(",");

  $.post("./ajax/visitasW.php", {

            dispositivo : mobile,
            navegador : window.ui.browser,
            so: window.ui.os,
            capacitacion_id: curso_id,
            url: url

        },function(data){

            console.log(data);

        });







  var curso_ = $('#capacitacion_id').val();
  var curso = curso_ == undefined ? [] : curso_.split(",");

  if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {

    $('#select-beast,#select').addClass("form-control");

    $('#show').hide();

    $("#second").show();

    adress = "bottom";

    //$('#select').val(curso);

  } else {





    adress = "top";

    $('#select').selectize({
      items: curso,
      maxItems:3,
      plugins: ['remove_button'],

    });



  }



  var medio = $.urlParam('medio');//console.log(medio);



  $('#medio').val(medio);


  //$('#correo').popover({ trigger: 'focus',placement: adress , content: "Si ud. se ha registrado antes, solo escriba su E-mail y evite escribir de nuevo los demás datos personales." })











  /*$('#num_documento,#correo').blur(function(){

    var dni=$(this).val();

    if(dni.length>0){

      $.post("jx/dni.php",{dni:dni},function(data){

        if(data.id>0) {

          $('#codigo').val(data.id);

          $('.show_tt input').removeAttr("required").hide();

          $('.show_tt').addClass("ignore");

        }else{

          $('#codigo').val('');

          $('.show_tt input').attr("required","required").show();

                  $('#datos,#centro_trabajo').removeAttr("required");

          $('.show_tt').removeClass("ignore");

        }

      },"json");

    }

  });*/




  $('#form').validate({

    ignore: ':hidden',

    ignoreTitle: true,

    rules:

    {
      'num_documento':
      {
        required: true,
        pattern: /^[0-9]{8}$/,
        /*dni_repeat:true,
        verificar_inscripcion:true*/
      },
      'correo':
      {
        required: true,
        pattern: /^\S+@\S+\.\S+$/
      },
      'nombres':
      {
        required: true,
        pattern: /^[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}$/
      },

      'ap_pat':
      {
        required: true,
        pattern: /^[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}$/
      },

      'ap_mat':
      {
        required: true,
        pattern: /^[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}$/
      },

      'phone':
      {
        required: true,
        phoneInternational: true,
        //pattern:/^((RPM|rpm|rpc|RPC|\*|#)[0-9]{6,7})|((#|\*|)9[0-9]{8})$/
      },


      'charla_informativa':
      {
        prueba: true,
        required: true

      },

      'cursos[]':

      {
        required: true,
        selectmultiple: true
      }

    }

  });



  function jquery_validation_focus() {

    validator = $("#form").validate({ invalidHandler: function () { return validator.numberOfInvalids() } });

    console.log(validator.errorList);

  }



  function alto() {

    var alto = $('.tp').height();

    $(".log-b").css("height", alto - 30 + "px");

  }



  $('#show_t').click(function () {

    $("#first").show();

    $('#centro_trabajo').focus();

    $(this).hide();

  });

  $('#show').click(function () {

    $("#second").show();

    $('#consulta').focus();

    $(this).hide();

  });



  $("form").submit(function () {

    jquery_validation_focus();

    if ($("#form").valid() === true) {

      var btn = $('#button');
      btn.attr("disabled", "disabled");
      btn.text("Enviando...");

    }

  });











})