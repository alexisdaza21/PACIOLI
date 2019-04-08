<!DOCTYPE html>
<html>
<head>
	<title>Listado de trabajos</title>
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
              
              <h4 class="modal-title" id="myModalLabel-2">Agregar Nuevo trabajo..</h4>
              <ul class="card-actions icons right-top">
                
                <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                  <i class="zmdi zmdi-close"></i>
                </a>
              
            </ul>
          </div>
          <div class="modal-body">        
        <form action="index.php?c=trabajos&a=create" method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="card">
                  <div class="card-body">
                   <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                            <input type="text" class="form-control datepicker" id="datepicker-theme" placeholder="Fecha inicio..." aria-label="Use the arrow keys to pick a date" name="Trabajos[fechaInicio]"   value="" required>
                         </div>
                        </div>
                      </div>
                            <div class="form-group is-empty">
                          <div class="input-group">
                            <label >Tipo</label>
                            <input class="form-control datepicker" maxlength="45" type="text"  name="Trabajos[tipo]"   value="" required/>
                        </div>
                        </div>
                          <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <label >Costos</label>
                            <input class="form-control datepicker" maxlength="45" type="text"  name="Trabajos[costos]" onkeypress="return numeros(event)"  value="" required/>
                        </div>
                        </div>
                        </div>
                 <div class="form-group is-empty">
                          <div class="input-group">
                           <label >Trabajador</label>
                           <select class="select form-control" required="" name="Trabajos[id_trabajadores]">
                           <option>Seleccion-</option>
                               <?php foreach ( $trabajadores as $trabajador) {?>
                           <option value="<?= $trabajador->id_trabajadores; ?>"><?=$trabajador->nombres; ?>  </option>
                                    <?php } ?>
                        </select>
                          </div>
             
              </div>
                <div class="col-xs-6">
                  <div class="form-group is-empty">
                          <div class="input-group">
                           <label >Trabajador</label>
                           <select class="select form-control" required="" name="Trabajos[id_trabajadores2]">
                           <option>Seleccion-</option>
                               <?php foreach ( $trabajadores as $trabajador) {?>
                           <option value="<?= $trabajador->id_trabajadores; ?>"><?=$trabajador->nombres; ?>  </option>
                                    <?php } ?>
                        </select>
                          </div>
             </div>
              </div>
               <div class="form-group is-empty">
                          <div class="input-group">
                           <label >Trabajador</label>
                           <select class="select form-control" required="" name="Trabajos[id_trabajadores3]">
                           <option>Seleccion-</option>
                               <?php foreach ( $trabajadores as $trabajador) {?>
                           <option value="<?= $trabajador->id_trabajadores; ?>"><?=$trabajador->nombres; ?>  </option>
                                    <?php } ?>
                        </select>
                          </div>
             
              </div>
              </div>
              </div>
                           
                            <input maxlength="45" type="hidden"  name="Trabajos[id_clientes]"   value="<?= $_GET["id"] ?>" />
                         

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
       
      <a  href="index.php?c=clientes&a=admin" ><h4>Volver a clientes</h4></a>
  <h2><b><center> Trabajos del cliente <?= $clientes->razonSocial ?></b></center></h2>
<br>
<button class="btn btn-primary btn-flat"  data-toggle="modal" data-target="#basic_modal">Agregar</button>
   
        <div class="card-body">

                      <div class="table-">
                       <table class="table table-striped" style="margin: 0%; " id="datos">

                          <thead>
            <tr>
           <tr >
                              <th style="text-align: center;" >id</th>
                              <th style="text-align: center;" >fecha de inicio</th>
                              <th style="text-align: center;" >Tipo</th>
                              <th style="text-align: center;" >Trabajador</th>
                               <th style="text-align: center;" >Trabajador</th>
                              <th style="text-align: center;" >Trabajador</th>
                               <th style="text-align: center;" >Costos</th>
                              <th style="text-align: center;" colspan="2" >Acciones</th>
                            </tr>
                            </thead>
                          <tbody>
            <?php foreach ($trabajos as $trabajo) {?>
                 

    <tr> 
    <td align="center"><?= $trabajo->id_trabajos; ?></td>
    <td align="center"><?= $trabajo->fechaInicio;?></td>
    <td align="center"><?= $trabajo->tipo;?></td>
    <td align="center"><?= $trabajo->Trab->nombres;?></td>
    <td align="center"><?= $trabajo->Trab2->nombres;?></td>
    <td align="center"><?= $trabajo->Trab3->nombres;?></td>
    <td align="center"><?= $trabajo->costos;?></td>
    
                                <td align="center">
                                  <div class="btn-group " >
                                  <button type="button" class="btn btn-info btn-flat dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Seleccion <span class="caret"></span>
                                  <div class="ripple-container"></div></button>
                                  <ul class="dropdown-menu">

                                   <li><a  href="index.php?c=carpetas&a=admin&id=<?= $trabajo->id_trabajos;?>&nit=<?= $clientes->nit ?>" class="btn btn-info btn-flat">Carpetas</a></li>

                                         <li><a  href="index.php?c=visitas&a=trabajos&id=<?= $trabajo->id_trabajos?>&nit=<?= $clientes->nit ?>" class="btn btn-primary btn-flat">Cuenta</a></li>
                                          <li><a  href="index.php?c=visitas&a=admin&id=<?= $trabajo->id_trabajos?>&nit=<?= $clientes->nit ?>" class="btn btn-primary btn-flat">Administrar cuenta</a></li>
                                         <?php 
                                          if ($_SESSION["sesion"] =="trabajador") { 
                                            if ($_SESSION["u"]->documento == 7181470) {
                                          ?>
                                    <li><a onclick="editar('<?= $trabajo->id_trabajos; ?>','<?= $trabajo->tipo ?>','<?= $_GET["id"]?>')"
                                      class="btn btn-green btn-flat">Editar</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a onclick="eliminar('<?= $trabajo->id_trabajos ?>
                                    ','<?= $_GET["id"]?>')"
                                      class="btn btn-danger btn-flat">Eliminar</a></li>
                                </ul>
                                      <?php
                   }
                  }
                ?> 
                                </div>
                                </td> 
                               </tr>
                           <?php } ?>
                           <tr>
                           
                           </tbody>
                        </table>
                    </div>
                </div>

    <script type="text/javascript" >
            function eliminar(de,id){
                swal({
                    title: "Esta seguro?",
                    text: "Esta trabajo se eliminara!",
                    icon: "error",
                    buttons: true,
                    dangerMode: true
                  }).then((willDelete) => {
                    if (willDelete) {
                        swal("Muy bien!", "Se ha eliminado","success");
                        setTimeout(function(){
                        location.href="index.php?c=trabajos&a=delete&de="+de+"&id="+id;
                    }, 1000);
                    }
                  });
            }
             function editar(up,nit,id){
                swal({
                    title: "Quieres editar este trabajo de tipo:",
                    text: nit,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true
                  }).then((willDelete) => {
                    if (willDelete) {
                        //swal("Muy bien!", "Espera un momento","success");
                        //setTimeout(function(){
                        location.href="index.php?c=trabajos&a=update&up="+up+"&id="+id;
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