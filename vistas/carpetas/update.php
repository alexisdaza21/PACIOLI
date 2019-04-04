<!DOCTYPE html>
<html>
<head>
	<title>Editar pagos</title>
<body>
<a href="index.php?c=trabajos&a=pagos&id=<?= $_GET["id"] ?>"><h4>Volver</h4></a>
<h2 align="center" >Actualizar pagos</h2>

<form method="post">
<center>
                            <br>
                            <br>
                            <br>
                            <label >Fecha  </label>
                            <input maxlength="45" type="text"  name="Pagos[fecha]" 
                            value="<?= $pagos->fecha ?>" required/>
                            <br>
                            <label >valor</label>
                            <input maxlength="45" type="text"  name="Pagos[valor]"   
                            value="<?= $pagos->valor ?>" required/>
                             <br>
                           <label >Trabajo</label>
                            <input maxlength="45" "hidden"  name="Pagos[id_trabajos]"  
                            value="<?= $pagos->id_trabajos ?>" required/>
                            <br>
                           
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        </center>
                        </form>
                        <br><br><br>
 
      

</body>
</html>