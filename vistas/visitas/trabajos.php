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
                        <img  src="assets/images/logo_inferior_para_footer - copia.png">
  </div>
                      <h1 class="card-title" align="center">pagos del trabajo <?= $trabajos->tipo ?></h1>
                    </header>
                    
        <table   id="datos" class="table table-striped" style="margin: 0%; ">
                          <thead>
            <tr>
                <th style="text-align: center;">Id</th>
                <th style="text-align: center;">Fecha</th>
                <th style="text-align: center;">Tipo</th> 
                <th style="text-align: center;">Valor</th>      
                <th style="text-align: center;" colspan="2">Acciones</th>
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
    
      <td align="center">
          
                    <td align="center">
                                 
                                 <button class="btn btn-danger" style="height:20px; line-height:2px; margin-right:; margin-left: 10px;"  onclick="eliminar('<?= $visita->id_visitas; ?>','<?= $trabajos->id_trabajos ?>','<?= $_GET["nit"];?> ')">Eliminar</button>
                </td>
        </tr>
      <?php } ?>
      <tr >

                <td colspan="3" align="right">total a pagar:</td>
      <td   style="text-align: center;"><label style="margin-left: 3%;"> $<?= $total ?></label>
 
 

      </td>
      <a  target="_blank" href ="index.php?c=visitas&a=reporte&id=<?=$trabajos->id_trabajos;?>
      &nit=<?=$_GET["nit"];?>">pdf</a>
      </tr>
  </div>
  </tbody>
                        </table><br><br><br>
  <div align="right">         

</div>
            <script type="text/javascript" >
            function eliminar(de,id,nit){
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
                        location.href="index.php?c=visitas&a=delete&de="+de+"&id="+id+"&nit="+nit;
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
 
   <?php include("footer.php"); ?>

