<!DOCTYPE html>
<html>
<head>
	<title>Listado de trabajos</title>
<body>
<link rel="stylesheet" href="https://unpkg.com/rmodal/dist/rmodal.css" type="text/css" />
    <script type="text/javascript" src="https://unpkg.com/rmodal/dist/rmodal.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php include("header.php"); ?>
        <body  style="   background: #fff; "  >
        <section id="content_outer_wrapper">
        <div id="content_wrapper" class="card-overlay">
                          <h2><b><center> listado de Trabajos </b></center></h2>
<br>
   
        <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-striped" style="margin: 0%; overflow: hidden;" id="datos">
                          <thead>
            <tr>
           <tr >
                              <th style="text-align: center;" >id</th>
                              <th style="text-align: center;" >fecha de inicio</th>
                              <th style="text-align: center;" >Tipo</th>
                              <th style="text-align: center;" >Trabajador</th>
                              <th style="text-align: center;" >Nit de la empresa</th>
                              
                            </tr>
                            </thead>
                          <tbody>
        
              <div id="content" class="container-fluid">
            <div class="content-body">
              <section id="gridview" class="m-t-30">
                <h3>Folders</h3>
                <?php foreach ($trabajos as $trabajo) {?>
                <ul class="folders">
                      <?php for ($i=0; $i <3 ; $i++) { ?>
                   
                  <li>
                    <div class="card card-folder card-item enable-context-menu" data-item-selected="false" data-item-type="Folder" data-item-size="72 KB" data-item-location="Projects" data-item-modified="Jan 3, 2017" data-item-opened="Jan 5, 2017" data-item-created="Jan 1, 2017"
                    data-item-offline="true">
                    <div class="card-heading">
                      <i class="zmdi zmdi-folder"></i>
                    </div>
                    <div class="card-body">
                      <span class="title"><?= $trabajo->Clie->nit;?></span>
                    </div>
                    <div class="card-footer">
                      <i class="zmdi zmdi-info"></i>
                    </div>
                  </div>
                </li>
                <nav id="context-menu" class="context-menu context-menu" style="left: 479px; top: -110px;">
  <ul class="context-menu__items">
    <li class="context-menu__item">
      <a href="javascript:void(0)" class="context-menu__link" data-action="View"><i class="zmdi zmdi-account-add"></i> Share...</a>
    </li>
    <li class="context-menu__item">
      <a href="javascript:void(0)" class="context-menu__link" data-action="Edit"><i class="zmdi zmdi-link"></i> Get shareable link</a>
    </li>
    <li class="context-menu__item">
      <a href="javascript:void(0)" class="context-menu__link" data-action="Delete"><i class="mdi mdi-folder-move"></i> Move to...</a>
    </li>
    <li class="context-menu__item">
      <a href="javascript:void(0)" class="context-menu__link" data-action="Delete"><i class="mdi mdi-folder-star"></i> Add star</a>
    </li>
    <li class="context-menu__item">
      <a href="javascript:void(0)" class="context-menu__link" data-action="Delete"><i class="mdi mdi-palette"></i> Change color</a>
    </li>
    <li class="context-menu__item">
      <a href="javascript:void(0)" class="context-menu__link" data-action="Delete"><i class="mdi mdi-rename-box"></i> Rename...</a>
    </li>
    <li role="separator" class="divider"></li>
    <li class="context-menu__item">
      <a href="javascript:void(0)" class="context-menu__link" data-action="Edit"><i class="mdi mdi-download"></i> Download</a>
    </li>
    <li role="separator" class="divider"></li>
    <li class="context-menu__item">
      <a href="javascript:void(0)" class="context-menu__link" data-action="Delete"><i class="mdi mdi-delete"></i> Remove</a>
    </li>
  </ul>
</nav>
              <?php }?>
              </ul>
                <?php } ?>
            </section>
          </div>
        </div>
                 

    <tr> 

   <!-- <td align="center"><?= $trabajo->id_trabajos; ?></td>
    <td align="center"><?= $trabajo->fechaInicio;?></td>
    <td align="center"><?= $trabajo->tipo;?></td>
    <td align="center"><?= $trabajo->Trab->nombres;?></td>
    <td align="center"><?= $trabajo->Clie->nit;?></td>
   
    </tr>-->

  
       
            

	</table>

    <script type="text/javascript" >
            function eliminar(id){
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
                        location.href="index.php?c=trabajos&a=delete&id="+id;
                    }, 1000);
                    }
                  });
            }
             function editar(id,nit){
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
                        location.href="index.php?c=trabajos&a=update&id="+id;
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

