<!DOCTYPE html>
<html>
<head>
	<title>Listado de pagos</title>
<body>
  <?php  include("header.php"); ?> 
          <body  style="   background: #fff; "  >

                    <section id="content_outer_wrapper" class="file-manager">
        <div id="content_wrapper" class="rightnav_v2 lg">
          <div id="header_wrapper" class="header-md" style="background-image: url(assets/images/banner_inicio.jpg);background-size: cover;
          padding-bottom: 30%;">
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
                    <h1> Archivos</h1>
                    <ol class="breadcrumb">
                      <li><a href="javascript:void(0)"><?=  $_GET["nit"]; ?></a></li>
                      <li><a href="javascript:void(0)"><?= $trabajos->tipo; ?></a></li>
                      <li ><a href="javascript:void(0)"><?=  $carpetas->nombre; ?></a></li>
                      <li class="active">Archivos</li>
                    </ol>
                  </header>
                </div>
              </div>
            </div>
            <ul class="card-actions icons lg alt-actions right-top">
              <li>
                <a href="javascript:void(0)" class="drawer-trigger" data-drawer="toggle-right" title="acoplar" >
                  <i class="zmdi zmdi-info"></i>
                </a>
              </li>
            </ul>  
              
              
         <nav class="btn-fab-group">
              <button class="btn btn-primary btn-fab fab-menu" data-fab="down">
                <i class="zmdi zmdi-plus"></i>
              <div class="ripple-container"></div></button>
              <ul class="nav-sub">
                <li style="transform: translateY(48px);"><span data-toggle="tooltip" data-placement="right" title="" data-original-title="Nuevo Archivo"><a href="javascript:void(0)" data-toggle="modal" data-target="#basic_modal" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-cloud-upload"></i></a></span> </li>
              </ul>
            </nav>
          </div>
          
          
          <div id="content" class="container-fluid">
            <div class="content-body">
        <section id="files">
          <h3>Archivos</h3>
          <ul class="files">
            <?php foreach ($archivos as $archivo) {
              ?>
            
            <li>
              <div class="card card-file card-item enable-context-menu selected" data-item-selected="" data-item-type="Image" data-item-size="2 MB" data-item-location="<?=  $archivo->nombre; ?>" data-item-modified="<?=$carpetas->nombre;?>" data-item-opened=" " data-item-created=" <?=  $archivo->fechaHora; ?>"  data-item-offline="" data-item-image="fotos/<?= $clientes->logo;?>">
                <a style="margin-left: 90%;"  onclick="eliminar('<?= $archivo->id_archivos; ?>','<?= $_GET["id"]; ?>','<?= $_GET["nit"];?>','<?= $_GET["carpeta"];
                        ?>')"><i class="zmdi zmdi-delete"title="eliminar" ></i> </a>
              <div class="card-body">
                <img src="fotos/<?= $clientes->logo;?>" alt="" style="width: 90%; height: 90%; align-content: center;" />
              </div>
              <div class="card-footer">
              <a target="_blank" href="documentos/<?=  $_GET["nit"]; ?>/<?= $trabajos->id_trabajos; ?>/<?=  $carpetas->id_carpetas; ?>/<?=  $archivo->nombre; ?>">
                <i class="zmdi zmdi-download"></i>
                <span class="title"><?=  $archivo->nombre; ?> </span>
              </div>
            </div>
          </a>
          </li>
         <?php }?>

</ul>
</section>

      
<aside id="rightnav" class="item-panel p-15 scrollbar">
  <h3 id="item-title"><i class="zmdi zmdi-file-plus"></i> <span class="title">Archivos</span></h3>
  <div class="tabpanel">
    <ul class="nav nav-tabs nav-justified darken">
      <li class="active" role="presentation"><a href="#file-detail-panel" data-toggle="tab" aria-expanded="true">Detalles</a></li>
    </ul>
  </div>
  <div class="tab-content p-t-15">
    <div class="tab-pane fadeIn active" id="file-detail-panel">
      <figure id="current-img">
        <img src="fotos/<?= $clientes->logo;?>">
      </figure> <br>
      <ul id="item-details" class="style-none border-grey-top-1px border-grey-bottom-1px p-t-15 p-b-15">
        <li id="type"><span class='title'>Tipo</span><span class="info"></span></li>
        <li id="location"><span class='title'>Nombre</span><span class="info"></span></li>
        <li id="created"><span class='title'>Fecha Creacion</span><span class="info"></span></li>
        <li id="modified"><span class='title'>carpeta</span><span class="info"></span></li>
      </ul>
      <ul id="item-desc" class="style-none p-t-15 p-b-15">
       <li><span class='title'>Pacioli</span><a href="javascript:void(0)" class="pull-right"><i class="zmdi zmdi-file-text"></i></a></li>
      </ul>
    </div>
  </div>
</aside>


</div>
</div>
    <script type="text/javascript" >
            function eliminar(de,id,nit,carpeta){
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
                        location.href="index.php?c=archivos&a=delete&de="+de+"&id="+id+"&nit="+nit+"&carpeta="+carpeta;
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
              
              <h4 class="modal-title" id="myModalLabel-2">Agregar Archivos..</h4>
              <ul class="card-actions icons right-top">
                
                <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                  <i class="zmdi zmdi-close"></i>
                </a>
              
            </ul>
          </div>
          <div class="modal-body">    
            <form action="index.php?c=archivos&a=create" method="post" autocomplete="off" enctype="multipart/form-data">
              <div class="card">
                  <div class="card-body">
                  <div class="form-group is-empty">
                          <div class="input-group">
                            <label >Seleccione un archivo...</label><i class="mdi mdi-file-document"></i>
                            <input type="file" class="form-control datepicker"  placeholder="Pikaday dark..." aria-label="Use the arrow keys to pick a date" name="archivo"   value="" required>
                                 <input type="hidden" name="Archivos[trabajo]"  
                                  value="<?= $_GET["id"]; ?>" >
                                 <input type="hidden" name="Archivos[nit]"   value="<?= $_GET["nit"]; ?>" >
                                 <input type="hidden" name="Archivos[carpeta]"   value="<?= $_GET["carpeta"]; ?>" >
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