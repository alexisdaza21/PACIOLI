<!DOCTYPE html>
<html>
<head>
	<title>Editar clientes</title>
<body>
<a href="index.php?c=clientes&a=admin"><h4>Volver</h4></a>
<h2 align="center" >Actualizar empresa con nit: <?= $clientes->nit ?></h2>

<form method="post">
<center>
                            <br>
                            <br>
                            <br>
                            <label >Nit</label>
                            <input maxlength="45" type="text"  name="Clientes[nit]" 
                            value="<?= $clientes->nit ?>" required/>
                            <br>
                            <label >Direccion</label>
                            <input maxlength="45" type="text"  name="Clientes[direccion]"   
                            value="<?= $clientes->direccion ?>" required/>
                             <br>
                           <label >Razon Social</label>
                            <input maxlength="45" type="text"  name="Clientes[razonSocial]"  
                            value="<?= $clientes->razonSocial ?>" required/>
                            <br>
                             <label >Email</label>
                            <input maxlength="45" type="email"  name="Clientes[email]"   
                            value="<?= $clientes->email ?>" required/>
                              <br>
                        
                            <label>Telefono</label>
                            <input maxlength="10" type="text" name="Clientes[telefono]"   
                            value="<?= $clientes->telefono ?>" required/>
                            <br>
                           
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        </center>
                        </form>
                        <br><br><br>
 
      

</body>
</html>