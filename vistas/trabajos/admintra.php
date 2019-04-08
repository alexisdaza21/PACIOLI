<!DOCTYPE html>
<html>
<head>
  <title>Listado de trabajos</title>
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
                      <h1 class="card-title" align="center"> Mis Trabajos</h1>
                    </header>
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
                                 <th style="text-align: center;" >Trabajador</th>
                              <th style="text-align: center;" >Trabajador</th>
                              <th style="text-align: center;" >Nit de la empresa</th>
                              <?php if ($_SESSION["sesion"] =="cliente") { ?>
                              <th style="text-align: center;" >Mis Carpetas</th>
                              <?php } ?>
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
    <td align="center"><?= $trabajo->Clie->nit;?></td>
   <?php if ($_SESSION["sesion"] =="cliente") { ?>

   <td align="center"><a href="index.php?c=carpetas&a=admin&id=<?= $trabajo->id_trabajos;?>&nit=<?= $_SESSION["u"]->nit ?>"  >Mis Carpetas <i style="margin: 0.5%;" class="zmdi zmdi-folder"></i></a></td> <?php } ?>
    </tr>

    <?php } ?>
       
            

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