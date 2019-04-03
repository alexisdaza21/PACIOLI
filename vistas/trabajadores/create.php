<!DOCTYPE html>
<html>
<head>
	<title>Crear Trabajadores</title>
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript">
		$(function(){
			$('#enviar').on('click',function(e){
				e.preventDefault();
			})
		})
	</script>
</head>
<body>

	<font face="arial">

		<h1 align=""> Registrar Trabajadores</h1>
		
		<form action="index.php?c=trabajadores&a=create" method="post" class="" autocomplete="off" enctype="multipart/form-data">
			
			<label>Nombres</label>
			<input type="text" name="trabajadores[nombres]"  onkeypress="return soloLetras(event)" >
			<br>

			<label>Apellidos</label>
			<input type="text" name="trabajadores[apellidos]" required maxlength="20" minlength="3" title="Ingrese Un M&aacute;ximo de 20 Caracteres Minimo 3" onkeypress="return soloLetras(event)" >
			<br>

			<label>Documento</label>
			<input type="text" name="trabajadores[documento]" required title="Ingrese un Documento Valido" onkeypress="return numeros(event)" >
			<br>

			
			<label>Fecha de Nacimiento</label>
			<input type="date" name="trabajadores[fechaNacimiento]" required onkeypress="return soloLetras(event)">
			<br>

			<label>Telefono</label>
			<input type="text" name="trabajadores[telefono]" required onkeypress="return numeros(event)">
			<br>

			<label>Foto</label>
			<input type="file" name="imagen">
			<br>

			<label>Perfil Profesional</label>
			<input type="text" name="trabajadores[perfilPro]" required onkeypress="return soloLetras(event)" >
			<br>

			<label>Fecha de Ingreso</label>
			<input type="date" name="trabajadores[fechaIngreso]">
			<br>

			<label>Hoja de Vida</label>
			<input type="file" name="documento" href="documento" > 
			<br>

			

			<label>Contrase&ntilde;a</label>
			<input type="password" name="trabajadores[pass]" required maxlength="6" minlength="4" title="Ingrese Una Contrase&ntilde;a de Minimo 4 caracteres m&aacute;ximo 6">
			<br>

			<label>Tipo de Trabajador</label>
			<input type="text" name="trabajadores[tipo]" required onkeypress="return soloLetras(event)">
			<br>


			<button type="submit" id="enviar">Guardar</button>

			<br>

			<button type="clear">Limpiar</button>


		</form>


	</font>


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

</body>
</html>