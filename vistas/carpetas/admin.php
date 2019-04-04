<!DOCTYPE html>
<html>
<head>
	<title>Listado de pagos</title>
<body>
<link rel="stylesheet" href="https://unpkg.com/rmodal/dist/rmodal.css" type="text/css" />
    <script type="text/javascript" src="https://unpkg.com/rmodal/dist/rmodal.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <?php  include("header.php"); ?> 
          <body  style="   background: #fff; "  >
        <section id="content_outer_wrapper">
        <div id="content_wrapper" class="card-overlay">
  
 
    <font face="verdana"> 
<div class="modal fade" id="basic_modal" tabindex="-1" role="dialog" aria-labelledby="basic_modal" style="display: none;">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title" id="myModalLabel-2">Agregar Nuevo pago..</h4>
              <ul class="card-actions icons right-top">
                
                <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                  <i class="zmdi zmdi-close"></i>
                </a>
              
            </ul>
          </div>
          <div class="modal-body">    
<form action="index.php?c=pagos&a=create" method="post" autocomplete="off" enctype="multipart/form-data">
  <div class="card">
                  <div class="card-body">
                  <div class="form-group is-empty">
                          <div class="input-group">
                            <label >Fecha </label>
                            <input type="text" class="form-control datepicker" id="datepicker-theme" placeholder="Pikaday dark..." aria-label="Use the arrow keys to pick a date" name="Pagos[fecha]"   value="" required>
                          </div>
                          </div>
                          <div class="form-group is-empty">
                          <div class="input-group">
                            <label >Valor</label>
                            <input class="form-control datepicker" maxlength="45" type="text"  name="Pagos[valor]"   value="" required/>
                            </div>
                            </div>
                    
                            <input maxlength="266" type="hidden"  name="Pagos[id_trabajos]"   value="<?= $_GET["id"]?> "> </input>
                            <br>
                             
                          </div>
                          </div>  
                       <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Ok</button>
            </div>

     </div>
     </div>
     </div>
     </div>
     </font>
              
  <h2><b><center> Listado De pagos del cliente: <?= $clientes->nit ?></b></center></h2>
<br>

               <button class="btn btn-primary btn-flat"  data-toggle="modal" data-target="#basic_modal">Agregar</button>
   
        <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-striped" style="margin: 0%;">
                          <thead>
                            <tr>
                                <th style="text-align: center;">id</th>
                                <th style="text-align: center;">fecha</th>
                                <th style="text-align: center;">Trabajos</th>
                                <th style="text-align: center;">valor</th>
                                <th style="text-align: center;" colspan="2">Acciones</th>
                            </tr>
                          </thead>
                        <tbody>
                        <?php
                            $suma = 0;
                                 foreach ($pagos as $pago) 
                        {?>
                            <tr> 
                                <td align="center"><?= $pago->id_pagos; ?></td>
                                <td align="center"><?= $pago->fecha;?></td>
                                <td align="center"><?= $pago->id_trabajos;?></td>
                                <td align="center"><?= $pago->valor;?></td>
                                <td align="center">
                                    <button style="height:8px; line-height:5px; margin-left; margin:  0%;" class="btn btn-warning btn-flat" onclick="editar('<?= $pago->id_pagos; ?>','<?= $_GET["id"] ?>','<?= $pago->fecha ?>')">Editar</button> 
                                    <button  class="btn btn-primary btn-flat" style="height:8px; line-height:5px; margin-left; margin:  0%;"   onclick="eliminar('<?= $pago->id_pagos ?>','<?= $_GET["id"] ?> ')">Eliminar</button>
                                </td>
                            </tr>
                            <?php
                                $suma = $pago->valor + $suma; } ?>
                            <td colspan="5"> 
                                <h2 style="margin-left: 35.5%;">
                                    Total= $
                                    <?= $suma ?>  
                                </h2>    
                            </td> 
                          </tbody>
                        </table>
                    </div>
                </div>
    <script type="text/javascript" >
            function eliminar(de,id){
                swal({
                    title: "Esta seguro?",
                    text: "Esta pago se eliminara!",
                    icon: "error",
                    buttons: true,
                    dangerMode: true
                  }).then((willDelete) => {
                    if (willDelete) {
                        swal("Muy bien!", "Se ha eliminado","success");
                        setTimeout(function(){
                        location.href="index.php?c=pagos&a=delete&de="+de+"&id="+id;
                    }, 1000);
                    }
                  });
            }
             function editar(up,id,nit){
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
                        location.href="index.php?c=pagos&a=update&up="+up+"&id="+id;
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