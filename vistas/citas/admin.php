

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
        right: 'month,agendaWeek,agendaDay,listWeek',

      },
      defaultDate: '<?= $fecha ?>',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true,
      locale:'es', // allow "more" link when too many events
      events: [
      <?php foreach ($calendario as $cal ) { ?>
        
      
        {
          title: '<?= $cal->caracteristicas; ?>',
          start: '<?= $cal->fechaHora; ?>',
          url: 'index.php?c=citas&a=update&id=<?= $cal->id_citas; ?>',
          <?php if ($cal->estado == "activa") { ?>
              color: 'blue',
          <?php } ?>
                    <?php if ($cal->estado == "cancelada") { ?>
              color: 'red',
          <?php } ?>
                    <?php if ($cal->estado == "cumolida") { ?>
              color: 'red',
          <?php } ?>
          
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

</head>
 <?php include ("header.php"); ?>
<body>
<body  style="   background: #fff; "  >
        <section id="content_outer_wrapper">
        <div id="content_wrapper" class="card-overlay">
               <div class="container">
        <div class="row">
            <div class ="panel panel-primary">
                <div class="panel-heading" ><h2 align="center" style="padding: 0;margin: 0; color:#fff;">Mi Agenda</h2></div>
                    <div class="panel-body">     
          <div style="background: #fff;" id="header_wrapper" class="header-xl  profile-header">
            <ul class="card-actions fab-action right">
              <li>
                  <button class="btn btn-primary btn-fab"  data-toggle="modal" data-target="#basic_modal"><i class="zmdi zmdi-plus"></i><div class="ripple-container" ></div></button>
              </li>
            </ul>
          </div>                     
                            
 
            <div id='calendar'></div>
          </div>
        </div>
      </div>
   </div>
                <div class="panel-heading" ><h2 align="center" style="padding: 0;margin: 0;">Citas</h2></div>
                    <div class="panel-body">        
                      <form action="index.php?c=citas&a=create" method="post">        
                           <div style="float: left; margin-left: 25%;">
                               <label >Fecha Y Hora </label><br>
                               <input type="datetime-local" name="Citas[fechaHora]" id="dummyText" class="form-control"  required min="<?= $fecha ?>" />
                           
                            </div>
                           <div style="float: right; margin-right: 25%;">
                              <label >Caracteristicass </label>
                              <input type="text" name="Citas[caracteristicas]" id="dummyText" class="form-control"  required />
                           
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
                <th >Caracteristicas</th>
                <th>Estado</th>     
                <th  colspan="2">Acciones</th>
            </tr>
            <?php foreach($citas as $cita) {?>
		<tr>
			<td ><?= $cita->id_citas; ?></td>
			<td ><?= $cita->fechaHora; ?></td>
			<td ><?= $cita->caracteristicas; ?></td>
      <td ><?= $cita->estado; ?></td>
			<td >
 
                  <button
                    style="height:20px; line-height:2px; margin-left; margin:  3%;" onclick="editar('<?= $cita->id_citas; ?>','<?= $cita->fechaHora ?>')">Editar</button>

                    <button class="btn btn-danger" style="height:20px; line-height:2px; margin-right:; margin-left: 10px;"  onclick="eliminar(<?= $cita->id_citas; ?>)">Eliminar</button>
                </td>
        </tr>
			<?php } ?>
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


<?php include ("footer.php"); ?>

<div class="modal fade" id="basic_modal" tabindex="-1" role="dialog" aria-labelledby="basic_modal" style="display: none;">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title" id="myModalLabel-2">Agendar Cita..</h4>
              <ul class="card-actions icons right-top">
                
                <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                  <i class="zmdi zmdi-close"></i>
                </a>
              
            </ul>
          </div>
          <div class="modal-body">
            <form action="index.php?c=citas&a=create" method="post"> 
              <div class="form-group label-floating is-empty">
                 <div class="row">
                   <label class="control-label">Caracteristicas..</label>
                   <input type="text" class="form-control"  name="Citas[caracteristicas]"  
                   required="">
                 </div>
              </div>

              <div class="row">
               <div class="card-body">
                    <div class="form-group is-empty">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                        <input type="text" class="form-control datepicker" id="md_input_date_time" placeholder="Fecha y Hora" data-dtp="dtp_RlRax"
                        name="Citas[fechaHora]" required="">
                        <span class="input-group-addon last"><i class="zmdi zmdi-time"></i></span>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Ok</button>
            </div>
          </div>
          <!-- modal-content -->
        </div>
      </form>
        <!-- modal-dialog -->
      </div>


