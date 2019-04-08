  <?php include("header.php"); ?>

<body style="background: #fff;">
        <section id="content_outer_wrapper">
          <div style="background: #fff;" id="header_wrapper" class="header-xl  profile-header">
            <div class="imagen"></div>

          </div>   
 
                <div class="col-xs-12" style="margin-top: 1%;">
                  <div class="card">
                    <header class="card-heading ">
                      <h1 class="card-title" align="center">Seguimiento  Nicc1</h1>
                    </header>
                    <div class="card-body">
                     <button class="btn btn-primary btn-flat"  data-toggle="modal" data-target="#basic_modal">Agregar</button>
                      <div class="table-responsive">
                   
                        <table  style="margin: 0%; "  id="datos" class="table table-striped">
                          <thead>
                            <tr>
                              <th  style="text-align: center;">Id</th>
                              <th  style="text-align: center;">Archivo</th>
                              <th  style="text-align: center;">Nombre</th>
                              <th  style="text-align: center;">Descripcion</th>
                              <th  style="text-align: center;" colspan="2">Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($nicc as $nic) {?>
                              <tr> 
                                <td align="center"><?= $nic->id_nicc1; ?></td>
                                <td align="center"><?= $nic->archivo;?></td>
                                <td align="center"><?= $nic->nombre;?></td>
                                <td align="center"><textarea readonly="readonly"><?= $nic->descripcion;?></textarea></td>
                                <td align="center">
                               <a onclick="eliminar('<?= $nic->id_nicc1 ?>')"
                                      class="btn btn-danger btn-flat">Eliminar</a></center>
                                </td>
                              </tr><?php } ?>
                           
                           </tbody>
                        </table><br><br><br>
                     
                    

    <script type="text/javascript" >
            function eliminar(id){
                swal({
                    title: "Esta seguro?",
                    text: "Este archivo se eliminara!",
                    icon: "error",
                    buttons: true,
                    dangerMode: true
                  }).then((willDelete) => {
                    if (willDelete) {
                        swal("Muy bien!", "Se ha eliminado","success");
                        setTimeout(function(){
                        location.href="index.php?c=nicc1&a=delete&id="+id;
                    }, 1000);
                    }
                  });
            }
  </script>

  <?php include("footer.php"); ?>

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
          <form action="index.php?c=nicc1&a=create" method="post" autocomplete="off" enctype="multipart/form-data">
          <div class="card">
                  <div class="card-body">
                    <div class="col-xs-6">
                        <div class="form-group is-empty">
                        <div class="input-group">
                        <label>Nombre</label>
                        <input class="form-control datepicker" maxlength="20"  type="text"  name="Nicc[nombre]"   value="" required class="" />
                  </div>
              </div>
              </div>
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <label >Descripcion</label>
                            <textarea class="form-control datepicker" maxlength="45" type="text"  name="Nicc[descripcion]"   value="" required/></textarea>
                  </div>
              </div>

               <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                             <label >Seleccione un archivo...</label><i class="mdi mdi-file-document"></i>
                            <input class="form-control datepicker" maxlength="266" type="file"  name="archivo"   value="" required/>
                  </div>
              </div>
              </div>
                        <div class="form-group is-empty">
                     <br>
              </div>

                        <div class="form-group is-empty">
                        
                 
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
