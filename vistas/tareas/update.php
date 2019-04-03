<!DOCTYPE html>
<html>
<head>
    <title>editar tareas</title>

    <link rel="stylesheet" href="https://unpkg.com/rmodal/dist/rmodal.css" type="text/css" />
    <script type="text/javascript" src="https://unpkg.com/rmodal/dist/rmodal.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>

        <div style=" background-image:url(images/torneo.jpg); width:   100%; " >
            <a href="index.php?c=tareas&a=admin" style="float: right; margin: 2%;margin-right: 5%; font-size: 135%; color: #fff; text-decoration: none;">-volver-</a>
    <br><br>

	<form method="POST">
       <center>
  <h1 align="center">Actualizar la tarea de:  <?= $tareas->fechaInicio; ?></h1>



   <label > Nombre de la Tarea </label><br>
    <input type="text" name="Tareas[nombreTarea]" id="dummyText" class="form-control"  value="<?= $tareas->nombreTarea ?>" />
    <br>


 <label > Trabajador Encargado </label>
        <select required="" name="Tareas[id_trabajadores]" class="form-control">
            </option>
                <?php foreach ( $trabajadores as $trabajador) {?>
                   <option value="<?= $trabajador->id_trabajadores; ?>"><?=$trabajador->nombres; ?>  </option>
            <?php } ?>
        </select>



    <label >Fecha de Inicio</label><br>
    <input type="date" name="Tareas[fechaInicio]" id="dummyText" class="form-control"  required min=""  value="<?= date_format(date_create($tareas->fechaInicio), 'Y-m-d'); ?>" /><br>
    <br>

       <label >Fecha de Finalizaci&oacute;n</label><br>
    <input type="date" name="Tareas[fechaFin]" id="dummyText" class="form-control"  required min=""  value="<?= date_format(date_create($tareas->fechaFin), 'Y-m-d'); ?>" /><br>

        
        <label >estado</label><br>
        <select name="Tareas[estado]">
            <option value="activa"><?= $tareas->estado ?></option>
        <?php  if ($tareas->estado == 'activa') {?>
                
                 <option >terminada</option>

        <?php } ?>  

        <?php  if ($tareas->estado == 'terminada') {?>
                 <option >activa</option>
                 <option >terminada</option>
        <?php } ?>   

                   
        </select>
   
 



    <br><br>

		<button type="submit"  class="btn btn-success" style="margin-left: 0.5%;">Guardar cambios</button>&nbsp;

        </center>
     </form>
     <br><br><br><br><br><br><br><br>
</div>
</div>
</body>
