
<!DOCTYPE html>
<html>
<head>
  <title>Listado de Trabajadores</title>
 
<?php include("header.php"); ?>

<body  style="   background: |; "  >
        <section id="content_outer_wrapper">
        <div id="content_wrapper" class="card-overlay">
          <div style="background: #fff;" id="header_wrapper" class="header-xl  profile-header">
            <div class="imagen"></div>

          </div>   
 
    <font face="verdana"> 
          <div id="content" class="container-fluid">
            <div class="row">
              <div class="col-xs-12">
                <div class="card card-transparent">
                  <div class="card-body wrapper">
                    <div class="row">
                      <div class="col-md-12 col-lg-3"style="margin-left: 32.3%; width: 37%; margin-top: 32%;">
                        <div class="card type--profile" >
                          
                  <header class="card-heading ">
                    <h2 class="card-title">Lista de Trabajadores</h2>

                    <a href="javascript:void(0)" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#basic_modal">Agregar Nuevo Trabajador</a>
                     

                    <ul class="card-actions icons right-top">
                      <li>
                        <a href="javascript:void(0)" data-toggle-view="code">
                          <i class="zmdi zmdi-code"></i>
                        </a>
                      </li>
                    </ul>
                  </header>
                  <div class="card-body">
                    <div class="list-group">
                      <?php foreach($trabajadores as $trabajador) {?>
                                                 
                    <div class="btn-group open" style="float: right; margin-right: 1%;">
                        <button type="button" class="btn btn-info btn-flat dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                          Opciones <span class="caret"></span>
                        <div class="ripple-container"></div></button>
                        <ul class="dropdown-menu">

                         <li><a data-toggle="modal" data-target="#modal_foto" class="btn btn-primary btn-flat"  >Cambio de foto</a></li>
                         <li><a data-toggle="modal" data-target="#modal_documento" class="btn btn-primary btn-flat"  >Cambio de <br>Hoja de Vida</a></li>
                               <li> <a data-toggle="modal" data-target="#modal_contraseña" class="btn btn-primary btn-flat"  >Cambio Contraseña</a></li>
                          <li><a class="btn btn-green btn-flat" data-toggle="modal" data-target="#modal_actualizar">Editar</a></li>

                          <li role="separator" class="divider"></li>
                          <li><a onclick="eliminar('<?= $trabajador->id_trabajadores ?>')"
                            class="btn btn-danger btn-flat">Eliminar</a></li>
                      </ul>
                  
                    </div>
                      <div class="list-group">
                        <div class="row-action-primary">
                          <img src="fotos/<?= $trabajador->foto; ?>" alt="contact person" class="img-circle circle" >
                        </div>
                        <div class="row-content">
                          <div class="least-content"><a href="javascript:void" data-toggle="tooltip" data-placement="left" title="" data-original-title="Opciones ">


                          <h4 class="list-group-item-heading"  align="center">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $trabajador->nombres."&nbsp;".$trabajador->apellidos; ?></h4>
                            <p class="list-group-item-text">                       
                              <h5 align="center">
                                Documento:&nbsp;<?= $trabajador->documento; ?>
                             
                                Fecha de Nacimiento:&nbsp;<?= $trabajador->fechaNacimiento; ?>
                        
                                Fecha de Vinculaci&oacute;<?= $trabajador->fechaIngreso; ?>
                            
                                <br>
                                Telefono:<?= $trabajador->telefono; ?>
                              </h5>
                              <h5 align="center">
                                Tipo de Empleado :&nbsp;<?= $trabajador->tipo; ?>
                            
                                <a href="documentos/<?= $trabajador->hojaVida; ?>" target="_blank"> Ver Hoja de Vida </a>
                              
                                Perfil Profesional :&nbsp;<?= $trabajador->perfilPro; ?>
                              </h5>
                            </p>
                        </div>
                      </div>


                      <?php }?>
                    </div>
               
                </div>
     <script type="text/javascript" >
            function eliminar(id){
                swal({
                    title: "Esta seguro?",
                    text: "Este trabajador se eliminará!",
                    icon: "error",
                    buttons: true,
                    dangerMode: true
                  }).then((willDelete) => {
                    if (willDelete) {
                        swal("Muy bien!", "Se ha eliminado","success");
                        setTimeout(function(){
                        location.href="index.php?c=trabajadores&a=delete&id="+id;
                    }, 1000);
                    }
                  });
            }
             function editar(id,nombres){
                swal({
                    title: "Quieres editar a :",
                    text: nombres,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true
                  }).then((willDelete) => {
                    if (willDelete) {
                        //swal("Muy bien!", "Espera un momento","success");
                        //setTimeout(function(){
                        location.href="index.php?c=trabajadores&a=update&id="+id;
                        //}, 1000);
                    }
                  });
            }
  </script>
  <script type="text/javascript">
    function numeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 0123456789";
    especiales = [8,37,39,46];
 
    tecla_especial = false
    for(var i in especiales){
 if(key == especiales[i]){
     tecla_especial = true;
     break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}
    </script>
    <script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>   
<?php include("footer.php"); ?>

<?php include("footer.php"); ?>

<div class="modal fade" id="basic_modal" tabindex="-1" role="dialog" aria-labelledby="basic_modal" style="display: none;">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title" id="myModalLabel-2">Agregar Nuevo Trabajador..</h4>
              <ul class="card-actions icons right-top">
                
                <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                  <i class="zmdi zmdi-close"></i>
                </a>
              
            </ul>
          </div>
          <div class="modal-body">
            <form action="index.php?c=trabajadores&a=create" method="post" autocomplete="off" enctype="multipart/form-data"> 
             
             <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <span class="input-group-addon"></i></span>
                              <label class="control-label">Nombres Del Trabajador</label>
                            <input type="text" class="form-control"  name="trabajadores[nombres]" onkeypress="return soloLetras(event)" >
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <label class="control-label">Apellidos Del Trabajador</label>
                            <input type="text" class="form-control" name="trabajadores[apellidos]" onkeypress="return soloLetras(event)" >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <span class="input-group-addon"></i></span>
                              <label class="control-label">Documento</label>
                            <input type="text" class="form-control"  name="trabajadores[documento]" onkeypress="return numeros(event)">
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <label class="control-label">Fecha de Nacimiento</label>
                            <input type="text" class="form-control datepicker" id="start_date" placeholder="Fecha de Nacimiento..." name="trabajadores[fechaNacimiento]" >                  </div>
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="card-body">
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <span class="input-group-addon"></i></span>
                              <label class="control-label">Telefono</label>
                            <input type="text" class="form-control"  name="trabajadores[telefono]" onkeypress="return numeros(event) ">
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <label class="control-label">Perfil Profesional</label>
                            <input type="text" class="form-control" name="trabajadores[perfilPro]" onkeypress="return soloLetras(event)"  >
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <span class="input-group-addon"></i></span>
                              <label class="control-label">Fecha de Ingreso</label>
                             <input type="text" class="form-control datepicker" id="end_date" placeholder="Fecha de Ingreso..." name="trabajadores[fechaIngreso]" >   
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <label class="control-label">Password</label>
                            <input type="password" class="form-control" name="trabajadores[pass]"   >
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                 <div class="card-body">
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <span class="input-group-addon"></i></span>
                              <label class="control-label">Tipo de Trabajador</label>

                              <select class="select form-control" required="" name="trabajadores[tipo]">
                                  <option>Contador</option>
                                  <option>Trabajador</option>
                              </select>
                              
                          </div>
                        </div>
                      </div>
                      
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                      
                      <div class="col-xs-6">

                        <div class="modal-body">
                          <div class="input-group">
                            <span class="input-group-addon"></i></span>
                              <label >Click Aqu&iacute; Para Ingresar Hoja de Vida</label>
                              <p><input type="file" name="documento" required="" >
                          </div>
                        </div>
                      </div>
                      

                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-xs-6">

                        <div class="modal-body">
                          <div class="input-group">
                            <span class="input-group-addon"></i></span>
                              <label >Click Aqu&iacute; Para Ingresar Foto</label>
                              <p><input type="file" name="imagen" required="" >

                          </div>
                        </div>
                      </div>
                      

                    </div>
                  </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- modal-content -->
        </div>
      </form>
        <!-- modal-dialog -->
      </div>
              

           
              
            
      </div>




<!--modal cambio  contraseña-->

<div class="modal fade" id="modal_contraseña" tabindex="-1" role="dialog" aria-labelledby="basic_modal" style="display: none; "  >
        <div class="modal-dialog" role="document" >
          <div class="modal-content" >
            <div class="modal-header">
              
              <h4 class="modal-title" id="myModalLabel-2">Cambio de Contraseña</h4>
              <ul class="card-actions icons right-top">
                
                <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                  <i class="zmdi zmdi-close"></i>
                </a>
              
            </ul>
          </div>
          <form action="index.php?c=trabajadores&a=pass&id=<?= $trabajador->id_trabajadores ?>&tipo=perfil" method="POST">
          <div class="modal-body" >
            <p><input type="password" placeholder="Contraseña" name="trabajadores[pass]" required="" >
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 29.9688px; top: 2.5625px; background-color: rgb(104, 134, 150); transform: scale(14.5);"></div><div class="ripple ripple-on ripple-out" style="left: 34.9688px; top: 14.5625px; background-color: rgb(104, 134, 150); transform: scale(14.5);"></div></div></button>
              <button type="submit" class="btn btn-primary">Ok</button>
            </div>
          </form>
          </div>
          <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
      </div>


<!--modal cambio  foto-->

  <div class="modal fade" id="modal_foto" tabindex="-1" role="dialog" aria-labelledby="basic_modal" style="display: none; "  >
        <div class="modal-dialog" role="document" >
          <div class="modal-content" >
            <div class="modal-header">
              
              <h4 class="modal-title" id="myModalLabel-2">Selecciona una imagen</h4>
              <ul class="card-actions icons right-top">
                
                <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                  <i class="zmdi zmdi-close"></i>
                </a>
              
            </ul>
          </div>
          <form action="index.php?c=trabajadores&a=foto&id=<?=  $trabajador->id_trabajadores ?>&tipo=perfil" enctype="multipart/form-data" method="POST">
          <div class="modal-body" >
            <p><input type="file" name="imagen" value="<?= $_SESSION["u"]->foto ?>"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar
                <div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 29.9688px; top: 2.5625px; background-color: rgb(104, 134, 150); transform: scale(14.5);"></div><div class="ripple ripple-on ripple-out" style="left: 34.9688px; top: 14.5625px; background-color: rgb(104, 134, 150); transform: scale(14.5);"></div></div></button>
              <button type="submit" class="btn btn-primary">Cambiar Foto</button>
            </div>
          </form>
          </div>
          <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
      </div>



      <!--modal cambio  Hoja de Vida-->

  <div class="modal fade" id="modal_documento" tabindex="-1" role="dialog" aria-labelledby="basic_modal" style="display: none; "  >
        <div class="modal-dialog" role="document" >
          <div class="modal-content" >
            <div class="modal-header">
              
              <h4 class="modal-title" id="myModalLabel-2">Selecciona un documento</h4>
              <ul class="card-actions icons right-top">
                
                <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                  <i class="zmdi zmdi-close"></i>
                </a>
              
            </ul>
          </div>
          <form action="index.php?c=trabajadores&a=documento&id=<?=  $trabajador->id_trabajadores ?>" enctype="multipart/form-data" method="POST">
          <div class="modal-body" >
            <p><input type="file" name="documento" value="<?= $_SESSION["u"]->documento ?>"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar
                <div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 29.9688px; top: 2.5625px; background-color: rgb(104, 134, 150); transform: scale(14.5);"></div><div class="ripple ripple-on ripple-out" style="left: 34.9688px; top: 14.5625px; background-color: rgb(104, 134, 150); transform: scale(14.5);"></div></div></button>
              <button type="submit" class="btn btn-primary">Cambiar Documento</button>
            </div>
          </form>
          </div>
          <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
      </div>

   <!-- modal-actualizar -->
<div class="modal fade" id="modal_actualizar" tabindex="-1" role="dialog" aria-labelledby="basic_modal" style="display: none;">




        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              

              <h4 class="modal-title" id="myModalLabel-2">Actualizar Trabajador</h4>

               <ul class="card-actions icons right-top">
                
                <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                  <i class="zmdi zmdi-close"></i>
                </a>
              
            </ul>
          </div>
          <div class="modal-body">

            <form action="index.php?c=trabajadores&a=update&id=<?=  $trabajador->id_trabajadores ?>" method="post" autocomplete="off" enctype="multipart/form-data"> 

             
             <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <span class="input-group-addon"></i></span>

                              <label class="control-label">Nombres Del Trabajador</label>
                            <input type="text" class="form-control"  name="trabajadores[nombres]"  value="<?= $trabajador->nombres?>" onkeypress="return soloLetras(event)">
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <label class="control-label">Apellidos Del Trabajador</label>
                            <input type="text" class="form-control" name="trabajadores[apellidos]" value="<?= $trabajador->apellidos?>" onkeypress="return soloLetras(event)" >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <span class="input-group-addon"></i></span>
                              <label class="control-label">Documento</label>
                            <input type="text" class="form-control"  name="trabajadores[documento]"  value="<?= $trabajador->documento?>" onkeypress="return numeros(event)">
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <label class="control-label">Fecha de Nacimiento</label>
                            <input type="text" class="form-control datepicker" id="start_date" placeholder="Fecha de Nacimiento..." name="trabajadores[fechaNacimiento]" value="<?= $trabajador->fechaNacimiento?>">                  </div>
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="card-body">
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <span class="input-group-addon"></i></span>
                              <label class="control-label">Telefono</label>
                            <input type="text" class="form-control"  name="trabajadores[telefono]" value="<?= $trabajador->telefono?>" onkeypress="return numeros(event)" >
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <label class="control-label">Perfil Profesional</label>
                            <input type="text" class="form-control" name="trabajadores[perfilPro]" value="<?= $trabajador->perfilPro?>" onkeypress="return soloLetras(event)">
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <span class="input-group-addon"></i></span>
                              <label class="control-label">Fecha de Ingreso</label>
                             <input type="text" class="form-control datepicker" id="end_date" placeholder="Fecha de Ingreso..." name="trabajadores[fechaIngreso]" value="<?= $trabajador->fechaIngreso?>" onkeypress="return soloLetras(event)" >   
                          </div>
                        </div>
                      </div>
                      
                    </div>
                </div>
                 <div class="card-body">
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <span class="input-group-addon"></i></span>
                              <label class="control-label">Tipo de Trabajador</label>

                              <select class="select form-control" required="" name="trabajadores[tipo]">
                                  <option>Contador</option>
                                  <option>Auxiliar</option>
                              </select>
                              

                          </div>
                        </div>
                      </div>
                      

                    </div>
                </div>
                

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- modal-content -->
        </div>
      </form>
        <!-- modal-dialog -->
      </div>
              

           
              
            
      </div>








