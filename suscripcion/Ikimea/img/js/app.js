$(document).ready(function(){

  var adress;

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

   

        $('#select-beast').selectize({

            create: true,

            render: { 

                'option_create': function(data, escape) {

                    return '<div class="create">Añadir <strong>' + escape(data.input) + '</strong></div>';

                }

            }

        });



        $('#select').selectize({

            plugins: ['remove_button'],

        });



        adress="right";





    }



    $('#num_documento').popover({ trigger: 'focus',placement: adress , content: "Si ud. se ha registrado antes, solo escriba su D.N.I y evite escribir de nuevo los demás datos personales." })



    



  



    $('#num_documento,#correo').blur(function(){

      var dni=$(this).val();

      if(dni.length>0){

        $.post("jx/dni.php",{dni:dni},function(data){

          if(data.id>0) {

            $('#codigo').val(data.id);

            $('.show input').removeAttr("required").hide();

            $('.show').addClass("ignore");

          }else{

            $('#codigo').val('');

            $('.show input').attr("required","required").show();

                    $('#datos,#telefono,#centro_trabajo').removeAttr("required");

            $('.show').removeClass("ignore");

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