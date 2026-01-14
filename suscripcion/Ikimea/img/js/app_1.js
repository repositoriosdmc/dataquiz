function convert_int_sumar(x,y){
  var z;
  if(!x){
    x=0;
    if(y==0){
      z=null;
    }else{
      z=x+y;
    }
  }else{
    z=parseInt(x)+y;
  }
  return z;
}

var Actividad= React.createClass({
  render: function(){
    var actividad=this.props.data;
    var item=[null,"glyphicon-envelope","glyphicon-phone","glyphicon-phone-alt"];
    return <div className="tqq">
    <span className={"xp glyphicon "+item[actividad.medio_int]}></span>
    <span className="xp">{actividad.fecha_actividad}</span>
    <div className="xp">{actividad.comentarios}</div>
    </div>;
  }
});

var Suscriptor = React.createClass({
  render: function() {
        var suscriptor=this.props.data;
        return  <div className={this.props.focus}>
          <div className="name" title={"DNI:" + suscriptor.dni}>
            {suscriptor.nombres} {suscriptor.ape_pat} {suscriptor.ape_mat}
            <span className="work">{suscriptor.centro_trabajo ? "( "+suscriptor.centro_trabajo+" ) " : ""}</span>
            <span className="date">- {suscriptor.fecha_registro}</span>
          </div>
          <div className="curso">
          <b>{suscriptor.cant_curso} curso{suscriptor.cant_curso>1 ? "s" : ""} : </b>
          {suscriptor.curso_interes}
          </div>
          <div className="text">
            {suscriptor.consulta}
            <div className="medio" title={suscriptor.medio_comunicacion}>{suscriptor.medio_comunicacion}
            <span className="label label-danger" title="Fecha de revisión" style={{fontSize:11,marginLeft:11}}>{suscriptor.fecha_revision}</span></div>
          </div>
          <div className="info">
             <button type="button" className={this.props.Click_actividad ? "btn btn-default pull-right" : "hidden" } onClick={this.props.Click_actividad}>Ver Actividad</button>
             <div className={suscriptor.cantidad_correo>0 ? "t checked" : "t" }>
             <a href={"mailto:" + suscriptor.correo + "?subject=Informes del curso&body=" + suscriptor.consulta} title={suscriptor.correo} onClick={this.props.Click_correo} target="_blank">
             <span className="glyphicon glyphicon-envelope"></span> <span className="xt">{suscriptor.correo}</span>
             <span style={{marginLeft:10}} className="badge progress-bar-warning">{suscriptor.cantidad_correo}</span>
             </a></div>
             <div className={suscriptor.cantidad_celular>0 ? "t checked" : "t" }>
             <a href={"tel:+51" + suscriptor.celular} onClick={this.props.Click_celular}>
             <span className="glyphicon glyphicon-phone"></span> {suscriptor.celular}
             <span style={{marginLeft:10}} className="badge progress-bar-warning">{suscriptor.cantidad_celular}</span>
             </a></div>
             <div className={suscriptor.telefono ? "t" : "hidden" }>
             <a href={"tel:+51" + suscriptor.telefono}  onClick={this.props.Click_telefono}>
             <span className="glyphicon glyphicon-phone-alt"></span> {suscriptor.telefono}
             <span style={{marginLeft:10}} className="badge progress-bar-warning">{suscriptor.cantidad_telefono}</span>
             </a></div>
          </div>
       </div>;
  }
});

var Popup = React.createClass({
  getInitialState: function() {
    return {
      now : "",
      medio: ["Correo","Celular","Teléfono"],
      select : "",
      position: "",
      comentarios: "",
      button: "Guardar",
      disabled: "",
      error:""
    };
  },
  update_estado: function(id,fecha_registro,medio,comentarios) {
    if(comentarios && medio){
      this.setState({
        button : "Guardando...",
        disabled : 'disabled="disabled"'
      });
      $.post("jx/update.php",{ id: id,fecha_registro: fecha_registro, medio: medio,comentarios: comentarios}, function (result) {
        if(result==1){
          $('#cliente').modal("hide");
          this.props.click_(fecha_registro,medio);
          this.setState({
            comentarios : "",
            button : "Guardar",
            disabled : "",
            error : ""
          });
        }
      }.bind(this),"json");
    }else{
      this.setState({
        error: "Campo obligatorio"
      });
    }
  },
  handleChange : function(e) {
    this.setState({
      now: e.target.value
    });
  },
  TextChange : function(e) {
    this.setState({
      comentarios: e.target.value
    });
  },
  selectChange: function (e){
    this.setState({
      select : e.target.value
    });
  },
  click : function() {
    this.setState({now:"",select:"",comentarios:""});
  },
  render : function() {
    var data=this.props.data;
    var select=this.state.select ? this.state.select : this.props.medio;
    var now_= this.state.now ? this.state.now : moment().format('YYYY-MM-DDTHH:mm:ss') ;
    var historial=this.props.actividad;
    var comentarios=this.state.comentarios;

    return <div id="cliente" className="modal fade" tabindex="-1" data-backdrop="static">
     <div className="modal-dialog">
      <div className="modal-content">
       <div className="modal-body">
         <button type="button" className="close" onClick={this.click} data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <Suscriptor data={data} />
         <div className="po">
         {historial.map(function(data,i) {
            return (<Actividad data={data} />);
         }.bind(this))}
         </div>
         <div className="input-group" style={{marginBottom:20}}>
             <span className="input-group-addon" id="sizing-addon1">
                 <select id="resizing_select" required onChange={this.selectChange} value={select} >
                     <option>Seleccione una opción</option>
                     {this.state.medio.map(function(medio,i) {
                       var num=i+1;
                       return (<option value={num}>{medio}</option>);
                     },this)}
                 </select>
                 <select id="width_tmp_select">
                     <option id="width_tmp_option"></option>
                 </select>
             </span>
             <input type="datetime-local" id="value" className="form-control" onChange={this.handleChange} value={now_} />
         </div>
         <textarea className="form-control" rows="3" placeholder="Registro de actividad..." onChange={this.TextChange} value={comentarios} />
         <label className="error">{this.state.error}</label>
         <div className="clear"></div>
        </div>
        <div className="modal-footer">
         <button type="button" className="btn btn-default" data-dismiss="modal" onClick={this.click}>Cerrar</button>
         <button type="button" className="btn btn-primary" disabled={this.state.disabled} onClick={this.update_estado.bind(this,data.id,now_,select,comentarios)} >{this.state.button}</button>
        </div>
       </div>
      </div>
     </div>;
  }
});

var UserGist = React.createClass({
  getInitialState: function() {
    return {
      data : [],
      cantidad: "",
      historial_actividad:[],
      update : [],
      medio : "",
      select : 1,
      search : "",
      position : ""
    };
  },
  componentDidMount: function() {
    this.serverRequest = $.post(this.props.source, function (result) {
      //var lastGist = result[0];
      this.setState({
        data: result
      });
    }.bind(this),"json");
    this.Cantidad();
  },
  Cantidad: function(){
    $.post("jx/cantidad.php", function (result) {
      //var lastGist = result[0];
      this.setState({
        cantidad: result
      });
    }.bind(this),"json");
  },
  componentWillUnmount: function() {
    this.Cantidad();
    this.serverRequest.abort();
  },
  search: function(valor) {
    $.post("jx/search.php",{codigo : this.state.select , text : valor }, function (result) {
      //var lastGist = result[0];
      this.setState({
        data: result,
      });
    }.bind(this),"json");
  },
  selectChange: function (e){
    this.setState({
      select : e.target.value
    });
  },
  TextChange : function(e){
    var valor=e.target.value;
    this.setState({
      search : valor
    });
    if(valor){
      this.setState({
        position : ""
      });
      this.search(valor);
    }else{
      this.serverRequest.abort();
    }
  },
  handleClick(i){
    var data=this.state.data;
    this.setState({update: data[i],position:i});
    $('#cliente').modal("show");
  },
  update_medio(x){
    this.setState({medio:x});
  },
  update_data(i,fecha_registro,medio){
    var data=this.state.data;
    var medio_array=[0,0,0];
    medio_array[medio-1]=1;
    data[i]["fecha_revision"]=moment(fecha_registro).format('YYYY-MM-DD HH:mm:ss');
    data[i]["cantidad_correo"]=convert_int_sumar(data[i]["cantidad_correo"],medio_array[0]);
    data[i]["cantidad_celular"]=convert_int_sumar(data[i]["cantidad_celular"],medio_array[1]);
    data[i]["cantidad_telefono"]=convert_int_sumar(data[i]["cantidad_telefono"],medio_array[2]);

    this.setState(
      {
        data:data
      }
    );
  },
  actividad: function(id){
    if(id){
      $.post("jx/actividad.php",{ id: id }, function (result) {
        this.setState({historial_actividad:result});
      }.bind(this),"json");
    }
  },
  render: function() {
      return (
        <div className="container">
           <div className="row">
              <div className="col-md-10 col-md-offset-1">
                  <div className="head" style={{width:"65%",margin:"25px auto"}}>
                      <div className="input-group">
                         <span className="input-group-addon">
                             <select id="x" onChange={this.selectChange} value={this.state.select}>
                                <option value="1">Cursos</option>
                                <option value="2">Apellidos y Nombres</option>
                                <option value="3">Consulta</option>
                                <option value="4">Empresa</option>
                                <option value="5">Cantidad de Cursos</option>
                                <option value="6">Correo</option>
                                <option value="7">Sin contestar</option>
                             </select>
                         </span>
                         <input type="text" placeholder="Buscar..." className="search form-control" onChange={this.TextChange} value={this.state.search} />
                      </div>
                      <div>
                      {this.state.cantidad}
                      <div>Suscritos Hoy</div>  
                      </div>
                  </div>
                  {this.state.data.map(function(suscriptor,i) {
                    var boundClick = this.handleClick.bind(this,i);
                    var update_medio=this.update_medio.bind(this);
                    var actividad=this.actividad.bind(this,suscriptor.id);
                    var bound_act= function(){ boundClick(); update_medio(""); actividad(); };
                    var bound_cor= function(){ boundClick(); update_medio(1); actividad();};
                    var bound_cel= function(){ boundClick(); update_medio(2); actividad();};
                    var bound_tel= function(){ boundClick(); update_medio(3); actividad();};
                    var focus= this.state.position===i ? "box focus" : "box" ;
                    return (<Suscriptor data={suscriptor} key={i} focus={focus} Click_actividad={bound_act} Click_correo={bound_cor} Click_celular={bound_cel} Click_telefono={bound_tel} />);
                  }.bind(this))}
              </div>
           </div>
           <Popup data={this.state.update} actividad={this.state.historial_actividad} medio={this.state.medio} click_={this.update_data.bind(this,this.state.position)}/>
        </div>
      );
  }
});



ReactDOM.render(
  <UserGist source="http://survey.dataminingperu.com/suscripcion/jx/interesados.php" />,
  document.getElementById('example')
);


$(document).ready(function() {
 $('#resizing_select').change(function(){
    $("#width_tmp_option").html($('#resizing_select option:selected').text());
    $(this).width($("#width_tmp_select").width());
 });
});

$(function() {

    var $sidebar = $(".head"),
        $window = $(window),
        offset = $sidebar.offset(),
        topPadding = 0;

    $window.scroll(function() {
        if ($window.scrollTop() > offset.top) {
            $sidebar.addClass("navbar-fixed-top");
        } else {
            $sidebar.removeClass("navbar-fixed-top");
        }
    });
});
