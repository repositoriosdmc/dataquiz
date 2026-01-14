$(document).ready(function(){

  var adress;

  $.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
       return null;
    }
    else{
       return results[1] || 0;
    }
}

  $('#browser').val(window.ui.browser);
  $('#version').val(window.ui.version);
  $('#so').val(window.ui.os);

  jQuery.extend(jQuery.validator.messages, {required: "Campo obligatorio"});

  $.validator.addMethod("pattern", function(value, element, param) {

      if (this.optional(element)) {

        return true;

      }

      if (typeof param === "string") {

        param = new RegExp("^(?:" + param + ")$");

      }

      return param.test(value);

    }, "Formato inválido");



    $.validator.setDefaults({

        ignore: []

    });



    $('#form').validate().settings.ignore = [];



    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {

        $('#select-beast,#select').addClass("form-control");

        $('#show').hide();

        $("#second").show();

        adress="bottom";

    }else{

        



        adress="top";





    }

    var curso=$.urlParam('curso');console.log(curso);
    var medio=$.urlParam('medio');console.log(medio);

    $('#select').selectize({
      items: [curso],
      plugins: ['remove_button'],

    });

    $('#medio').val(medio);


    $('#correo').popover({ trigger: 'focus',placement: adress , content: "Si ud. se ha registrado antes, solo escriba su E-mail y evite escribir de nuevo los demás datos personales." })



    



  



    $('#num_documento,#correo').blur(function(){

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

        },"json")

      }

    })



    $('#form').validate({

      ignore: ':hidden', 

        ignoreTitle: true,

      rules:

      {
        'num_documento':
        {
          required:true,
          pattern:/^[0-9]{8}$/,
          dni_repeat:true,
          verificar_inscripcion:true
        },
        'correo':
        {
          required:true,
          pattern: /^\S+@\S+\.\S+$/
        },
        'nombres':
        {
          required:true,
          pattern:/^[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}$/
        },

        'ap_pat':
        {
          required:true,
          pattern:/^[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}$/
        },

        'ap_mat':
        {
          required:true,
          pattern:/^[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}$/
        },

        'celular':
        {
          required:true,
          pattern:/^((RPM|rpm|rpc|RPC|\*|#)[0-9]{6,7})|((#|\*|)9[0-9]{8})$/
        },

        'medio':
        {
          required:true
        },

        'curso[]':

        {
          required:true
        }

      }

    });



    function jquery_validation_focus(){

        validator = $("#form").validate({invalidHandler: function() { return validator.numberOfInvalids()}});

        //console.log(validator.errorList);

    }



    function alto(){

        var alto=$('.tp').height();

        $(".log-b").css("height",alto-30+"px");

    }



    $('#show_t').click(function(){

        $("#first").show();

        $('#centro_trabajo').focus();

        $(this).hide();

    });

    $('#show').click(function(){

        $("#second").show();

        $('#consulta').focus();

        $(this).hide();

    });



    $("form").submit(function() {

      jquery_validation_focus();

    if($("#form").valid()===true){

        var btn = $('#button');

            btn.button('loading');

            $('#button').button('loading');  

        }

    });



    







})