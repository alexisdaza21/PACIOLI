<!DOCTYPE html>
<html>
<head>

	<title>Listado de Clientes</title>
<body>

  
    <?php include("header.php"); ?>

<body style="background: #fff;">
        <section id="content_outer_wrapper">
          <div style="background: #fff;" id="header_wrapper" class="header-xl  profile-header">
            <div class="imagen"></div>

          </div>   
 
                <div class="col-xs-12" style="margin-top: 1%;">
                  <div class="card">
                    <header class="card-heading ">
                      <h1 class="card-title" align="center">Lista de Clientes</h1>
                    </header>
                    <div class="card-body">
                     <button class="btn btn-primary btn-flat"  data-toggle="modal" data-target="#basic_modal">Agregar</button>
                      <div class="table-responsive">
                   
                        <table  style="margin: 0%; "  id="datos" class="table table-striped">
                          <thead>
                            <tr>
                              <th  style="text-align: center;">Id</th>
                              <th  style="text-align: center;">Logo</th>
                              <th  style="text-align: center;">Nit</th>
                              <th  style="text-align: center;">Dirección</th>
                              <th  style="text-align: center;">Razon Social</th>
                              <th  style="text-align: center;">Email</th>
                              <th  style="text-align: center;" >Telefono</th>
                              <th  style="text-align: center;" colspan="2">Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($clientes as $cliente) {?>
                              <tr> 
                                <td align="center"><?= $cliente->id_clientes; ?></td>
                                <td> <img src="pacioli/fotos/<?= $cliente->logo; ?>"  class="img-circle circle" ></td>
                                <td align="center"><?= $cliente->nit;?></td>
                                <td align="center"><?= $cliente->direccion;?></td>
                                <td align="center"><?= $cliente->razonSocial;?></td>
                                <td email= "asdda" href = "mailto:<?= $cliente->email;?>" align="center"><a title="enviar correo" href="mailto:<?= $cliente->email;?>"><?= $cliente->email;?></a></td>
                                <td align="center"><?= $cliente->telefono;?></td>
                                <td >
                                 <div class="btn-group " >
                                  <button type="button" class="btn btn-info btn-flat dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Seleccion <span class="caret"></span>
                                  <div class="ripple-container"></div></button>
                                  <ul class="dropdown-menu">
                                   <li><a  href="index.php?c=clientes&a=trabajos&id=<?= $cliente->id_clientes; ?>" class="btn btn-info btn-flat" >Trabajos</a></li>
                                    <?php 
                                          if ($_SESSION["sesion"] =="trabajador") { 
                                            if ($_SESSION["u"]->documento == 7181470) {
                                          ?>
                                         <li><a data-toggle="modal" data-target="#toolabr_modal" class="btn btn-primary btn-flat"  >Cambio Contraseña</a>

                                           <li><a data-toggle="modal" data-target="#modal_foto" class="btn btn-primary btn-flat"  >Cambio de Foto</a>
                                         
                                         </li>
                                        
                                    <li><a class="btn btn-green btn-flat" data-toggle="modal" data-target="#modal_actualizar">Editar</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a onclick="eliminar('<?= $cliente->id_clientes ?>')"
                                      class="btn btn-danger btn-flat">Eliminar</a></li>
                                      <?php
                   }
                  }
                ?> 
                                </ul>
                                </div>
                                </td>
                              </tr><?php } ?>
                           
                           </tbody>
                        </table><br><br><br>
                     
                    

    <script type="text/javascript" >
            function eliminar(id){
                swal({
                    title: "Esta seguro?",
                    text: "Esta empresa se eliminara!",
                    icon: "error",
                    buttons: true,
                    dangerMode: true
                  }).then((willDelete) => {
                    if (willDelete) {
                        swal("Muy bien!", "Se ha eliminado","success");
                        setTimeout(function(){
                        location.href="index.php?c=clientes&a=delete&id="+id;
                    }, 1000);
                    }
                  });
            }
             function editar(id,nit){
                swal({
                    title: "Quieres editar la empresa con nit:",
                    text: nit,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true
                  }).then((willDelete) => {
                    if (willDelete) {
                        //swal("Muy bien!", "Espera un momento","success");
                        //setTimeout(function(){
                        location.href="index.php?c=clientes&a=update&id="+id;
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


<!--modal cambio  conraseña-->


<div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="basic_modal" style="display: none; "  >

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
          <form action="index.php?c=clientes&a=pass&id=<?= $cliente->id_clientes ?>&tipo=perfil ?>" method="POST">
          <div class="modal-body" >
            <p><input type="password" placeholder="Contraseña" name="Clientes[pass]" required="" >
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancel<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 29.9688px; top: 2.5625px; background-color: rgb(104, 134, 150); transform: scale(14.5);"></div><div class="ripple ripple-on ripple-out" style="left: 34.9688px; top: 14.5625px; background-color: rgb(104, 134, 150); transform: scale(14.5);"></div></div></button>
              <button type="submit" class="btn btn-primary">Ok</button>
            </div>
          </form>
          </div>
          <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
      </div></p></div></form></div></div></div></div>


      <!--modal cambio  foto-->


<div class="modal fade" id="modal_foto" tabindex="-1" role="dialog" aria-labelledby="basic_modal" style="display: none; "  >

        <div class="modal-dialog" role="document" >
          <div class="modal-content" >
            <div class="modal-header">
              
              <h4 class="modal-title" id="myModalLabel-2">Cambio de Foto</h4>
              <ul class="card-actions icons right-top">
                
                <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                  <i class="zmdi zmdi-close"></i>
                </a>
              
            </ul>
          </div>
        <form action="index.php?c=clientes&a=logo&id=<?= $cliente->id_clientes ?>&tipo=perfil" enctype="multipart/form-data" method="POST">
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
      </div></p></div></form></div></div></div></div>


      <div class="modal fade" id="modal_actualizar" tabindex="-1" role="dialog" aria-labelledby="basic_modal" style="display: none; "  >

        <div class="modal-dialog" role="document" >
          <div class="modal-content" >
            <div class="modal-header">
              
              <h4 class="modal-title" id="myModalLabel-2">Actualizar Clientes</h4>
              <ul class="card-actions icons right-top">
                
                <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                  <i class="zmdi zmdi-close"></i>
                </a>
              
            </ul>
          </div>
       <form action="index.php?c=clientes&a=update&id=<?=  $cliente->id_clientes ?>" method="post" autocomplete="off" enctype="multipart/form-data"> 

                         <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <span class="input-group-addon"></i></span>

                              <label class="control-label">Nit. </label>
                            <input type="text" class="form-control" name="Clientes[nit]" 
                            value="<?= $cliente->nit ?>" >
                          </div>
                        </div>            </div>
                      <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <label class="control-label">Direcci&oacute;n</label>
                            <input type="text" class="form-control" name="Clientes[direccion]"   
                            value="<?= $cliente->direccion ?>"  >
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
                              <label class="control-label">Raz&oacute;n Social</label>
                            <input type="text" class="form-control" maxlength="45" type="text"  name="Clientes[razonSocial]"  
                            value="<?= $cliente->razonSocial ?>" onkeypress="return soloLetras(event)">
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <label class="control-label">Email</label>
                            <input type="text" class="form-control " maxlength="45" type="email"  name="Clientes[email]"   
                            value="<?= $cliente->email ?>" required >          
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
                              <label class="control-label">Telefono</label>
                            <input type="text" class="form-control"   name="Clientes[telefono]"   
                            value="<?= $cliente->telefono ?>" onkeypress="return numeros(event)" >
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
            
        
              
            </div>
          </form>
          </div>
          <!-- modal-content -->
        </div>
        <!-- modal-dialog -->


<div class="modal fade" id="toolabr_modal" tabindex="-1" role="dialog" aria-labelledby="toolabr_modal" style="display: none;">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="card m-0">
                                        <header class="card-heading p-b-20">
                                          <h2 class="card-title">Cambio de Contraseña</h2>
                                          <div class="card-search">
                                            <div class="form-group is-empty">
                                              <a href="javascript:void(0)" class="close-search" data-card-search="close" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back"> <i class="zmdi zmdi-arrow-left"></i></a>
                                              <input type="text" placeholder="Search and press enter..." class="form-control" autocomplete="off">
                                              <a href="javascript:void(0)" class="clear-search" data-card-search="clear" data-toggle="tooltip" data-placement="top" title="" data-original-title="Clear search"><i class="zmdi zmdi-close-circle"></i></a>
                                            </div>
                                          </div>
                                          <ul class="card-actions icons right-top">
                                            <li>
                                              <a href="javascript:void(0)" data-card-search="open">
                                                <i class="zmdi zmdi-search"></i>
                                              </a>
                                            </li>
                                            <li class="dropdown">
                                              <a href="javascript:void(0)" data-toggle="dropdown">
                                                <i class="zmdi zmdi-more-vert"></i>
                                              </a>
                                              <ul class="dropdown-menu btn-primary dropdown-menu-right">
                                                <li>
                                                  <a href="javascript:void(0)">Option One</a>
                                                </li>
                                                <li>
                                                  <a href="javascript:void(0)">Option Two</a>
                                                </li>
                                                <li>
                                                  <a href="javascript:void(0)">Option Three</a>
                                                </li>
                                              </ul>
                                            </li>
                                            <li>
                                              <a href="javascript:void(0)" data-dismiss="modal" aria-label="Close">
                                                <i class="zmdi zmdi-close"></i>
                                              </a>
                                            </li>
                                          </ul>
                                        </header>
                                      </div>
                                              <form action="index.php?c=clientes&a=pass&id=<?=  $cliente->id_clientes ?>&tipo=perfil"  method="POST">
          <div class="modal-body" >
            <p><input type="password" placeholder="Contraseña" name="Clientes[pass]" required="" >
            </div>
                                      
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancel</button>
                                          <button type="submit" class="btn btn-primary">Ok</button>
                                        </div>
                                      </div>
                                      </form>
                                      <!-- modal-content -->
                                    </div>
                                    <!-- modal-dialog -->
                                  </div>




<div class="modal fade" id="basic_modal" tabindex="-1" role="dialog" aria-labelledby="basic_modal" style="display: none;">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title" id="myModalLabel-2">Agregar Nuevo cliente..</h4>
              <ul class="card-actions icons right-top">
                <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                  <i class="zmdi zmdi-close"></i>
                </a>
              
            </ul>
          </div>
          <div class="modal-body">
          <form action="index.php?c=clientes&a=create" method="post" autocomplete="off" enctype="multipart/form-data">
          <div class="card">
                  <div class="card-body">
                    <div class="col-xs-6">
                        <div class="form-group is-empty">
                        <div class="input-group">
                        <label>Nit</label>
                        <input class="form-control datepicker" maxlength="50"  type="text"  name="Clientes[nit]"   value="" required class="" />
                  </div>
              </div>
              </div>
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <label >Direccion</label>
                            <input class="form-control datepicker" maxlength="45" type="text"  name="Clientes[direccion]"   value="" required/>
                  </div>
              </div>

               <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                           <label >Razon Social</label>
                            <input class="form-control datepicker" maxlength="266" type="text"  name="Clientes[razonSocial]"   value="" required/>
                  </div>
              </div>
              </div>
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <label >Email</label>
                            <input class="form-control datepicker" maxlength="45" type="email"  name="Clientes[email]"   value="" required/>
                
                  </div>
              </div>

               <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <label>Telefono</label>
                            <input class="form-control datepicker" maxlength="10" onkeypress="return numeros(event)" type="text" name="Clientes[telefono]"   value="" required/>
                  </div>
              </div>
              </div>
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <label>Contraseña</label>
                             <input class="form-control datepicker" type="password" name="Clientes[pass]"   value="" required/>
                 </div>



              </div>
              <div class="">
                    <div class="row">
                      <div class="">

                        <div class="modal-body">
                          <div class="input-group">
                              <label >Click Aqu&iacute; Para Ingresar Foto</label>
                              <p><input type="file" name="imagen" required="" class="btn btn-green btn-flat">

                          </div>
                        </div>
                      </div>
                      

                    </div>
                  </div>


              </div>
              </div>

               
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Ok</button>
            </div>
       </form>
     </div>
     </div>
     </div>
     </div>
     </font>
           </div>   
            <!-- modal-actualizar -->
<!--
<div class="modal fade" id="modal_" tabindex="-1" role="dialog" aria-labelledby="basic_modal" style="display: none;">




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

                              <label class="control-label">Nit. </label>
                            <input type="text" class="form-control" name="Clientes[nit]" 
                            value="<?= $cliente->nit ?>" onkeypress="return soloLetras(event)">
                          </div>
                        </div>            </div>
                      <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <label class="control-label">Direcci&oacute;n</label>
                            <input type="text" class="form-control" name="Clientes[direccion]"   
                            value="<?= $cliente->direccion ?>" onkeypress="return soloLetras(event)" >
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
                              <label class="control-label">Raz&oacute;n Social</label>
                            <input type="text" class="form-control" maxlength="45" type="text"  name="Clientes[razonSocial]"  
                            value="<?= $cliente->razonSocial ?>" onkeypress="return soloLetras(event)">
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <label class="control-label">Email</label>
                            <input type="text" class="form-control " maxlength="45" type="email"  name="Clientes[email]"   
                            value="<?= $cliente->email ?>" required >          
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
                              <label class="control-label">Telefono</label>
                            <input type="text" class="form-control"   name="Clientes[telefono]"   
                            value="<?= $cliente->telefono ?>" onkeypress="return numeros(event)" >
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
    -->        




      </div>



             




<!--actualizar-->

            
          <!-- modal-content -->


                
