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

              
 


   
   <!--     <div class="card-body">
     <h2><b><center> Cliente/trabajos/<?= $trabajos->tipo; ?></b></center></h2>
                      <div class="table-responsive">
                        <table class="table table-striped" style="margin: 0%;">
                          <thead>
                            <tr>
                                <th style="text-align: center;">id</th>
                                 <th style="text-align: center;">Nombre</th>
                                <th style="text-align: center;">fecha de Creacion</th>
                                <th style="text-align: center;">Documento Trabajador</th>
                                <th style="text-align: center;" colspan="2">Acciones</th>
                            </tr>
                          </thead>
                        <tbody>
                        <?php
                                 foreach ($carpetas as $carpeta) 
                        {?>
                            <tr> 
                                <td style="color:red;" align="center"><?= $carpeta->id_carpetas; ?></td>
                                <td align="center"><?= $carpeta->nombre;?></td>
                                <td align="center"><?= $carpeta->fechaCre;?></td>
                                <td align="center"><?= $carpeta->Trab->documento;?></td>
                                <td align="center">
                                    <button style="height:8px; line-height:5px; margin-left; margin:  0%;" class="btn btn-warning btn-flat" onclick="editar('<?= $carpeta->id_carpetas; ?>','<?= $_GET["id"] ?>','<?= $carpeta->fechaCre ?>')">Editar</button> 
                                    <button  class="btn btn-primary btn-flat" style="height:8px; line-height:5px; margin-left; margin:  0%;"   onclick="eliminar('<?= $carpeta->id_carpetas ?>','<?= $_GET["id"] ?> ')">Eliminar</button>
                                </td>
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>

                    </div>
                </div>-->
                    <section id="content_outer_wrapper" class="file-manager">
        <div id="content_wrapper" class="rightnav_v2 lg">
          <div id="header_wrapper" class="header-md">
            <ul class="card-actions icons lg alt-actions left-top">
              <li>
                <a href="javascript:void(0)" class="drawer-trigger" data-drawer="open-left">
                <!--  <i class="zmdi zmdi-menu"></i>-->
                </a>
              </li>
            </ul>
            <div class="container-fluid">
              <div class="row">
                <div class="col-xs-12">
                  <header id="header">
                    <h1> Carpetas</h1>
                    <ol class="breadcrumb">
                      <li><a href="javascript:void(0)"><?=  $_GET["nit"]; ?></a></li>
                      <li><a href="javascript:void(0)"><?= $trabajos->tipo; ?></a></li>
                      <li class="active">Projects</li>
                    </ol>
                  </header> 
                </div>
              </div>
            </div>
            <ul class="card-actions icons lg alt-actions right-top">
              <li>
                <a href="javascript:void(0)">
                  <i class="zmdi zmdi-search"></i>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  <i class="zmdi zmdi-view-list-alt"></i>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)" class="drawer-trigger" data-drawer="toggle-right">
                  <i class="zmdi zmdi-info"></i>
                </a>
              </li>
            </ul>
            <nav class="btn-fab-group">
              <button class="btn btn-primary btn-fab fab-menu" data-fab="down">
                <i class="zmdi zmdi-plus"></i>
              </button>
              <ul class="nav-sub">
                <li><span data-toggle="tooltip" data-placement="right" title="Nueva Carpeta"><a href="javascript:void(0)" data-toggle="modal" data-target="#basic_modal" class="btn btn-info btn-fab btn-fab-sm"><i class="mdi mdi-folder-plus"></i></a></span> </li>
                <li><span data-toggle="tooltip" data-placement="left" title="New Document"><a href="javascript:void(0)" data-toggle="modal" data-target="#new_doc_modal" class="btn btn-info btn-fab btn-fab-sm"><i class="mdi mdi-file-document"></i></a></span> </li>
                <li>
                  <a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Upload Folder" class="btn btn-info btn-fab btn-fab-sm">
                    <div class="icon-upload"><label for="file-input-folder"><i class="mdi mdi-folder-upload"></i></label><input id="file-input-folder" type="file"></div>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Upload File" class="btn btn-info btn-fab btn-fab-sm">
                    <div class="icon-upload"><label for="file-input"><i class="mdi mdi-cloud-upload"></i></label><input id="file-input" type="file"></div>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
          
          
          <div id="content" class="container-fluid">
            <div class="content-body">
              <section id="gridview" class="m-t-30">
                <h3>Folders</h3>
                <ul class="folders">
                   <?php
                         foreach ($carpetas as $carpeta) 
                        {?>
                  <li>
                    <div class="card card-folder card-item enable-context-menu" data-item-selected="false" data-item-type="Folder" data-item-size="72 KB" data-item-location="Projects" data-item-modified="<?= $carpeta->fechaCre;?>" data-item-opened="<?= $carpeta->Trab->documento;?>" data-item-created="<?= $carpeta->fechaCre;?>"
                    data-item-offline="true">
                    <div class="card-heading">
                      <i class="zmdi zmdi-folder"></i>
                    </div>
                    <div class="card-body">
                      <span class="title"><?= $carpeta->nombre;?></span>
                    </div>
                    <div class="card-footer">
                        <a href="index.php?c=archivos&a=admin&id=<?= $_GET["id"]; ?>&nit=<?= $_GET["nit"]; ?>&carpeta=<?= $carpeta->id_carpetas;  ?>"><i class="zmdi zmdi-info"></i></a>

                      
                    </div>
                  </div>
                </li>
              <?php } ?>
          </ul>
        </section>
      
<aside id="rightnav" class="item-panel p-15 scrollbar">
  <h3 id="item-title"><i class="zmdi zmdi-image pink-text"></i> <span class="title">Photos</span></h3>
  <div class="tabpanel">
    <ul class="nav nav-tabs nav-justified darken">
      <li class="active" role="presentation"><a href="#file-detail-panel" data-toggle="tab" aria-expanded="true">Details</a></li>
      <li role="presentation"><a href="#file-activity-panel" data-toggle="tab" aria-expanded="true">Activity</a></li>
    </ul>
  </div>
  <div class="tab-content p-t-15">
    <div class="tab-pane fadeIn active" id="file-detail-panel">
      <figure id="current-img">
      </figure>
      <div class="togglebutton m-t-20 m-b-20">
        <label>
          <input type="checkbox" class="toggle-info" id="toggle-offline"> Available Offline
        </label>
      </div>
      <ul id="item-details" class="style-none border-grey-top-1px border-grey-bottom-1px p-t-15 p-b-15">
        <li id="type"><span class='title'>Tipo</span><span class="info"></span></li>
        <li id="location"><span class='title'>Nombre</span><span class="info"></span></li>
        <li id="modified"><span class='title'>Modified</span><span class="info"></span></li>
        <li id="opened"><span class='title'>Creada Por</span><span class="info"></span></li>
        <li id="created"><span class='title'>Fecha Creacion</span><span class="info"></span></li>
      </ul>
      <ul id="item-desc" class="style-none p-t-15 p-b-15">
        <li><span class='title'>Add a description</span><a href="javascript:void(0)" class="pull-right"><i class="zmdi zmdi-edit"></i></a></li>
      </ul>
    </div>
    <div class="tab-pane fadeIn" id="file-activity-panel">
      <h6>Yesterday</h6>
      <div class="card">
        <div class="card-body">
          <ul class="list-group ">
            <li class="list-group-item ">
              <span class="pull-left"><img src="assets/img/profiles/02.jpg" alt="" class="img-circle max-w-40 m-r-10 "></span>
              <div class="list-group-item-body">
                <div class="list-group-item-heading">You uploaded an item</div>
                <div class="font-size-10 list-group-item-time">Mon 7:11 AM</div>
                <ul>
                  <li>
                    <i class="zmdi zmdi-language-javascript md-text-amber"></i> <span>sidebar-overlay.js</span>
                  </li>
                  <li>
                    <i class="zmdi zmdi-language-javascript md-text-amber"></i> <span>bundle.min.js</span>
                  </li>
                  <li>
                    <i class="zmdi zmdi-language-javascript md-text-amber"></i> <span>offline.js</span>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
      
      
      <div class="card">
        <div class="card-body">
          <ul class="list-group ">
            <li class="list-group-item ">
              <span class="pull-left"><img src="assets/img/profiles/02.jpg" alt="" class="img-circle max-w-40 m-r-10 "></span>
              <div class="list-group-item-body">
                <div class="list-group-item-heading">You uploaded 15 items</div>
                <div class="font-size-10 list-group-item-time">Mon 7:00 AM</div>
                <ul class="file-activity">
                  <li>
                    <i class="zmdi zmdi-file-text mw-blue-text"></i> <span>app-mail.html</span>
                  </li>
                  <li>
                    <i class="zmdi zmdi-file-text mw-blue-text"></i> <span>app-notes.html</span>
                  </li>
                  <li>
                    <i class="zmdi zmdi-file-text mw-blue-text"></i> <span>app-calendar.html</span>
                  </li>
                  <li>
                    <i class="zmdi zmdi-file-text mw-blue-text"></i> <span>app-contacts.html</span>
                  </li>
                  <li>
                    <i class="zmdi zmdi-file-text mw-blue-text"></i> <span>app-taskboard.html</span>
                  </li>
                  <li>
                    <i class="zmdi zmdi-file-text mw-blue-text"></i> <span>charts-c3.html</span>
                  </li>
                  <li>
                    <i class="zmdi zmdi-file-text mw-blue-text"></i> <span>sidebar-overlay.html</span>
                  </li>
                  <li>
                    <i class="zmdi zmdi-file-text mw-blue-text"></i> <span>form-layouts.html</span>
                  </li>
                  <li>
                    <i class="zmdi zmdi-file-text mw-blue-text"></i> <span>form-validation.html</span>
                  </li>
                  <li>
                    <i class="zmdi zmdi-file-text mw-blue-text"></i> <span>form-wizard.html</span>
                  </li>
                  <li>
                    <i class="zmdi zmdi-file-text mw-blue-text"></i> <span>bundle.html</span>
                  </li>
                  <li>
                    <i class="zmdi zmdi-file-text mw-blue-text"></i> <span>charts-morris.html</span>
                  </li>
                  <li>
                    <i class="zmdi zmdi-file-text mw-blue-text"></i> <span>page-profile.html</span>
                  </li>
                  <li>
                    <i class="zmdi zmdi-file-text mw-blue-text"></i> <span>page-timeline.html</span>
                  </li>
                  <li>
                    <i class="zmdi zmdi-file-text mw-blue-text"></i> <span>ui-alerts.html</span>
                  </li>
                  
                </ul>
                
              </div>
            </li>
          </ul>
        </div>
        <div class="card-footer">
          <a href="javascript:void(0)" class="btn btn-default btn-flat btn-block m-b-0" data-files="show-all">Show all</a>
        </div>
      </div>
    </div>
  </div>
</aside>


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

<div class="modal fade" id="basic_modal" tabindex="-1" role="dialog" aria-labelledby="basic_modal" style="display: none;">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title" id="myModalLabel-2">Agregar Nueva Carpeta..</h4>
              <ul class="card-actions icons right-top">
                
                <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                  <i class="zmdi zmdi-close"></i>
                </a>
              
            </ul>
          </div>
          <div class="modal-body">    
<form action="index.php?c=carpetas&a=create" method="post" autocomplete="off" enctype="multipart/form-data">
  <div class="card">
                  <div class="card-body">
                  <div class="form-group is-empty">
                          <div class="input-group">
                            <label >Nombre </label>
                            <input type="text" class="form-control datepicker"  placeholder="Pikaday dark..." aria-label="Use the arrow keys to pick a date" name="Carpetas[nombre]"   value="" required>
                                 <input type="hidden" name="Carpetas[id]"   value="<?= $_GET["id"]; ?>" >
                                 <input type="hidden" name="Carpetas[nit]"   value="<?= $_GET["nit"]; ?>" >
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