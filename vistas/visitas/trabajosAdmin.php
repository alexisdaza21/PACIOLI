<!DOCTYPE html>
<html>
<head>
	<title>Listado de costos</title>
    
<style type="text/css" media="print">
@media print {
#parte1 {display:none;}
#parte2 {display:none;}
}
</style>
<?php include("header.php"); ?>
</head>
     <body  style="   background: #fff; "  >
        <section id="content_outer_wrapper">
        <div id="content_wrapper" class="card-overlay">

 
    <font face="verdana"> 
<div class="modal fade" id="basic_modal" tabindex="-1" role="dialog" aria-labelledby="basic_modal" style="display: none;">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title" id="myModalLabel-2">Agregar Nuevo pago o costo..</h4>
              <ul class="card-actions icons right-top">
                
                <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                  <i class="zmdi zmdi-close"></i>
                </a>
              
            </ul>
          </div>
          <div class="modal-body">    
                     <form action="index.php?c=visitas&a=createTra" method="post" autocomplete="off" enctype="multipart/form-data">        
                   <div class="card">
                  <div class="card-body">
                        <div class="form-group is-empty">
                          <div class="input-group">
                               <label >Fecha </label><br>
                               <input type="date" name="Visitas[fecha]" id="dummyText" class="form-control"  required  />
                            </div>
              </div>
               <div class="form-group is-empty">
                          <div class="input-group">
                               <label >Tipo </label><br>
                              
                              <select class="select form-control" required="" name="Visitas[tipo]">
                                 <option value="">Selecci&oacute;n</option>
                                  <option value="Pago">Pago</option>
                                  <option value="Costo">Costo</option>
                              </select>
                              
                             </div>
             
              </div>
                        <div class="form-group is-empty">
                          <div class="input-group">
                              <label >Valor </label>
                              <input type="number" name="Visitas[costo]" id="dummyText" class="form-control"   />
                          </div>
                        </div>
                     
               </div>
              </div>

                              <input type="hidden" name="Visitas[id_trabajos]" id="dummyText" class="form-control" value="<?= $_GET["id"] ?>"   />
                           
                     
               
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
        
           <div class="card-body">
                     <button class="btn btn-primary btn-flat"  data-toggle="modal" data-target="#basic_modal">Agregar</button>
                     
                     <div id="pdff">
                      <div class="table-responsive">    
                         
                <div class="row">
                <div class="col-xs-12">
                  <div class="card">
                    
                    <header class="card-heading ">
                      <div align="center" >
                        <img  src="assets/images/logo_inferior_para_footer - copia.png" style="width: 300px; height: 100px;">
  </div>
  <h2 class="card-title" align="center">Centro Comercial el Pinal Of.105</h2>
   <h2 class="card-title" align="center">Cel.: 3133601274 / 3142448712 / 7438762</h2>
    <h3 class="card-title" align="center">EL SUSCRITO CONTADOR PÚBLICO CERTIFICA:</h3>
    <p align="center">Que la empresa <?= $client->razonSocial; ?> con nit <?= $client->nit; ?> presenta el siguiente estado de cuenta con la emresa PACIOLI para el trabajo <?= $trabajos->tipo ?>  </p>
                     

                    </header>
                    
        <table   id="datos" class="table table-striped" style="margin: 0%; ">
                          <thead>
            <tr>
                <th style="text-align: center;">Id</th>
                <th style="text-align: center;">Fecha</th>
                <th style="text-align: center;">Tipo</th> 
                <th style="text-align: center;">Valor</th>      
               
            </tr>
            
            <?php 
            $total = 0;
             
              foreach($visitas as $visita)           
             {  
                $total = $visita->costo + $total;
                 ?>
    <tr>
      <td align="center"><?= $visita->id_visitas; ?></td>
      <td align="center"><?= $visita->fecha; ?></td>
      <td align="center"><?= $visita->tipo; ?></td>
      <td align="center"><?= $visita->costo; ?></td>
    
      
        </tr>
      <?php } ?>
      <tr >

                <td colspan="3" align="right">total a pagar:</td>
      <td   style="text-align: center;"><label style="margin-left: 3%;"> $<?= $total ?></label></td>
      <a  target="_blank" href ="index.php?c=visitas&a=reporte&id=<?=$trabajos->id_trabajos;?>
      &nit=<?=$_GET["nit"];?>">pdf</a>
  
      
      </tr>
</div>
</div>
</div>
</div>
</div>
  </tbody>
                        </table><br><br><br>
   <?php include("footer.php"); ?>
            <script type="text/javascript" >
            function eliminar(de,id){
                swal({
                    title: "Esta seguro?",
                    text: "Este cita se eliminara!",
                    icon: "error",
                    buttons: true,
                    dangerMode: true
                  }).then((willDelete) => {
                    if (willDelete) {
                        swal("Muy bien!", "Se ha eliminado","success");
                        setTimeout(function(){
                        location.href="index.php?c=visitas&a=delete&de="+de+"&id="+id;
                    }, 1000);
                    }
                  });
            }
             function editar(id,cita){
                swal({
                    title: "Quieres editar la cita:",
                    text: cita,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true
                  }).then((willDelete) => {
                    if (willDelete) {
                       // swal("Muy bien!", "Espera un momento","//success");
                       // setTimeout(function(){
                        location.href="index.php?c=visitas&a=update&id="+id;
                   // }, 1000);
                    }
                  });
            }
  </script>
 
  

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
                                  

