<!DOCTYPE html>
<html>
<head>
	<title>Listado de costos</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- fullcalendar-->
    <link href='fullcalendar/fullcalendar.min.css' rel='stylesheet' />
    <link href='fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
    <script src='fullcalendar/lib/moment.min.js'></script>
     <script src='fullcalendar/lib/es-us.js'></script>
    <script src='fullcalendar/lib/jquery.min.js'></script>
    <script src='fullcalendar/fullcalendar.min.js'></script>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<script>
  

  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      defaultDate: '<?= $fecha ?>',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true,
      locale:'es', // allow "more" link when too many events
      events: [
      <?php foreach ($visitas as $calendario ) { ?>
        
      
        {
          title: '<?= $calendario->tipo; ?>',
          start: '<?= $calendario->fechaHora; ?>',
          url: 'index.php?c=visitas&a=update&id=<?= $calendario->id_visitas; ?>',

          
        },
      <?php } ?> 
      ]
    });

  });

</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
<?php include("header.php"); ?>
</head>
   <body  style="   background: #fff; "  >
        <section id="content_outer_wrapper">
        <div id="content_wrapper" class="card-overlay">

 
    <font face="verdana"> 
     <div class="container">
        <div class="row">
            <div class ="panel panel-primary">
                <div class="panel-heading" ><h2 align="center" style="padding: 0;margin: 0; color:#fff;">Visitas</h2></div>
                    <div class="panel-body">        
                      <form action="index.php?c=visitas&a=create" method="post">        
                           <div style="float: left; margin-left: 25%;">
                               <label >Fecha Y Hora </label><br>
                               <input type="datetime-local" name="Visitas[fechaHora]" id="dummyText" class="form-control"  required  />
                           
                            </div>
                           <div style="float: right; margin-right: 25%;">
                              <label >Costos </label>
                              <input type="number" name="Visitas[costo]" id="dummyText" class="form-control"  required />
                           
                           </div>
                          <div style="float: left; margin-left: 25%;">
                               <label >Tipo </label><br>
                               <input type="text" name="Visitas[tipo]" id="dummyText" class="form-control"  required />
                           
                            </div>
                           <div style="float: right; margin-right: 25%;">
                              <label >Trabajo </label>
                              <input type="text" name="Visitas[id_trabajos]" id="dummyText" class="form-control"  required  value="<?= $_GET["id"] ?>" />
                           
                           </div><br><br><br>
                          <div style="margin-left: 65%; padding: 1%;"> 
                             <button type="button" class="btn btn-default" data-dismiss="modal">     Cerrar</button>
                             <button type="submit" class="btn btn-info">Agregar</button>
                          </div>
                      </form>
            </div>
            <div id='calendar'></div>
          </div>
        </div>
      </div>
   </div>

  <h2><b style="color: #fff;"><center > Listado De Citas</b></center></h2> 



<br>
    <p><div style="overflow: auto ;">
        <table id="datos" align="center" width="80%" border="1" style="color: black;">
            <tr>
                <th >Id</th>
                <th >Fecha y Hora</th>
                <th >Costo</th>
                <th>Tipo</th>    
                <th>Trabajos</th>     
                <th  colspan="2">Acciones</th>
            </tr>
            
            <?php 
            $total = 0;
             
              foreach($visitas as $visita)           
             {  
                $total = $visita->costo + $total;
                 ?>
		<tr>
			<td ><?= $visita->id_visitas; ?></td>
			<td ><?= $visita->fechaHora; ?></td>
			<td ><?= $visita->costo; ?></td>
      <td ><?= $visita->tipo; ?></td>
      <td ><?= $visita->id_trabajos; ?></td>
      <td > <button
                    style="height:20px; line-height:2px; margin-left; margin:  3%;" onclick="editar('<?= $visita->id_visitas; ?>','<?= $visita->fechaHora ?>')">Editar</button>

                    <button class="btn btn-danger" style="height:20px; line-height:2px; margin-right:; margin-left: 10px;"  onclick="eliminar(<?= $visita->id_visitas; ?>)">Eliminar</button>
                </td>
        </tr>
			<?php } ?>
      <tr >
                <td colspan="4">total</td>
      <td colspan="2"  style="text-align: right;"><label style="margin-right: 3%;"> <?= $total ?></label></td>
      </tr>

	</table>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	</div>
</div>


            <script type="text/javascript" >
            function eliminar(id){
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
                        location.href="index.php?c=citas&a=delete&id="+id;
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
                        location.href="index.php?c=citas&a=update&id="+id;
                   // }, 1000);
                    }
                  });
            }
  </script>
   <?php include("footer.php"); ?>



