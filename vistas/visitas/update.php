<!DOCTYPE html>
<html>
<head>
    <title>editar costos</title>
</head>
<body>

        <div style=" background-image:url(images/torneo.jpg); width:   100%; " >
            <a href="index.php?c=citas&a=admin" style="float: right; margin: 2%;margin-right: 5%; font-size: 135%; color: #fff; text-decoration: none;">-volver-</a>
    <br><br>

	<form method="POST">
       <center>
  <h1 align="center">Actualizar la visita de:  <?= $visitas->fecha; ?></h1>


    <label >fecha</label><br>
    <input type="date" name="Visitas[fecha]" id="dummyText" class="form-control"  required min=""  value="<?= date_format(date_create($visitas->fecha), 'Y-m-d'); ?>" /><br>

        <label >Costo</label><br>
    <input  type="text" name="Visitas[costo]" value="<?= $visitas->costo ?>" required><br>
            <label >Tipo</label><br>
    <input  type="text" name="Visitas[tipo]" value="<?= $visitas->tipo ?>" required><br>
            <label >Trabajo</label><br>
    <input  type="text" name="Visitas[id_trabajos]" value="<?= $visitas->id_trabajos ?>" required><br>
   
 



    <br><br>

		<button type="submit"  class="btn btn-success" style="margin-left: 0.5%;">Guardar cambios</button>&nbsp;

        </center>
     </form>
     <br><br><br><br><br><br><br><br>
</div>
</div>
</body>
