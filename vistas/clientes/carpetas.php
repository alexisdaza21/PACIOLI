<!DOCTYPE html>
<html>
<head>
	<title>Listado de Clientes</title>
<body>
  
    <?php include("header.php"); ?>
    <body  style="   background: #fff; "  >
        <section id="content_outer_wrapper">
        <div id="content_wrapper" class="card-overlay">

 
    <font face="verdana"> 
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
                        <input class="form-control datepicker" maxlength="20" onkeypress="return numeros(event)" type="text"  name="Clientes[nit]"   value="" required class="" />
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

<div class="row">
                <div class="col-xs-12">
                  <div class="card">
                    <header class="card-heading ">
                      <h1 class="card-title" align="center">Lista de Clientes</h1>
                    </header>
                    <div class="card-body">
                     <button class="btn btn-primary btn-flat"  data-toggle="modal" data-target="#basic_modal">Agregar</button>
                     <center>
                     <table  style="margin: 0%; overflow: hidden;"  id="datos" >
                          <thead>
                            <tr>
                              <th  style="text-align: center;" >
                              <h1>Carpetas </h1></th>
                              <th  style="text-align: center;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                            </tr>
                          </thead>
                          <tbody>
                                <tr> 
                                  <td colspan="2"> <br> <br> <br></td>
                                </tr>
                                 
                                <tr>
                      <?php foreach ($clientes as $cliente) {?>
                                <td align="center">
                                
                                    <div class="card card-folder card-item enable-context-menu" data-item-selected="false" data-item-type="Folder" data-item-size="72 KB" data-item-location="Projects" data-item-modified="Jan 3, 2017" data-item-opened="Jan 5, 2017" data-item-created="Jan 1, 2017"
                                    data-item-offline="true" >
                                    <div class="card-heading" > 
                                      <i class="zmdi zmdi-folder"></i>
                                    </div>
                                    <div class="card-body">
                                      <span class="title"><?= $cliente->nit;?></span>
                                    </div>
                                    <div class="card-footer">
                                      <a  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="text-decoration: none;">
                                      <i class="zmdi zmdi-info-outline zmdi-hc-fw"></i>

                                <span class="caret"></span>
                                  <div class="ripple-container"></div></a>
                                  <ul class="dropdown-menu">
                                   <li><a  href="index.php?c=clientes&a=subcarpetas&id=<?= $cliente->id_clientes; ?>" class="btn btn-info btn-flat" >Sub Carpetas</a></li>
                                         <li><a data-toggle="modal" data-target="#toolabr_modal" class="btn btn-primary btn-flat"  >Cambio Contraseña</a>
                                         
                                         </li>
                                    <li><a onclick="editar('<?= $cliente->id_clientes; ?>','<?= $cliente->nit ?>')"
                                      class="btn btn-green btn-flat">Editar</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a onclick="eliminar('<?= $cliente->id_clientes ?>')"
                                      class="btn btn-danger btn-flat">Eliminar</a></li>
                                </ul>
                                </div>
                                    </div>
                                  </div>
                                
                              </td>
                            </tr>
                           <?php } ?>
                            <tr>
                              <td><br><br><br><br><br><td><br><br><br><br><br><td><br><br><br><br><br><td><br><br><br><br><br><td><br><br><br><br><br></td>   <td><br><br><br><br><br><td><br><br><br><br><br><td><br><br><br><br><br><td><br><br><br><br><br><td><br><br><br><br><br></td>

                              </tr>
                           </tbody>
                        </table></center><br><br><br>
                     
                    

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
              
              <h4 class="modal-title" id="myModalLabel-2">Selecciona una imagen</h4>
              <ul class="card-actions icons right-top">
                
                <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                  <i class="zmdi zmdi-close"></i>
                </a>
              
            </ul>
          </div>
          <form action="index.php?c=clientes&a=pass&id=<?= $id ?>" method="POST">
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


<div class="modal fade" id="toolabr_modal" tabindex="-1" role="dialog" aria-labelledby="toolabr_modal" style="display: none;">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="card m-0">
                                        <header class="card-heading p-b-20">
                                          <h2 class="card-title">Toolbar</h2>
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
                                              <form action="index.php?c=clientes&a=pass"  method="POST">
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

