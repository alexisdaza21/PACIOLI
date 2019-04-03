<!DOCTYPE html>
<html>
<head>
    <title>editar costos</title>

    <link rel="stylesheet" href="https://unpkg.com/rmodal/dist/rmodal.css" type="text/css" />
    <script type="text/javascript" src="https://unpkg.com/rmodal/dist/rmodal.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>

        <div style=" background-image:url(images/torneo.jpg); width:   100%; " >
            <a href="index.php?c=citas&a=admin" style="float: right; margin: 2%;margin-right: 5%; font-size: 135%; color: #fff; text-decoration: none;">-volver-</a>
    <br><br>

	<form method="POST">
       <center>
  <h1 align="center">Actualizar la cita de:  <?= $citas->fechaHora; ?></h1>


    <label >fecha</label><br>
    <input type="datetime-local" name="Citas[fechaHora]" id="dummyText" class="form-control"  required min=""  value="<?= date_format(date_create($citas->fechaHora), 'Y-m-d\TH:i:s'); ?>" /><br>

        <label >caracteristicas</label><br>
    <input  type="text" name="Citas[caracteristicas]" value="<?= $citas->caracteristicas ?>" required><br>
        <label >estado</label><br>
        <select name="Citas[estado]">
            <option value="activa"><?= $citas->estado ?></option>
        <?php  if ($citas->estado == 'activa') {?>
                 <option >cancelada</option>
                 <option >cumplida</option>
        <?php } ?>  

        <?php  if ($citas->estado == 'cancelada') {?>
                 <option >activa</option>
                 <option >cumplida</option>
        <?php } ?>   

        <?php  if ($citas->estado == 'cumplida') {?>
                 <option >activa</option>
                 <option >cancelada</option>
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
