
<!-- Listar Archivos de Una Carpeta -->
<?php 

$listar = null;
$directorio = opendir("rutajuan/");
while($elemento = readdir($directorio)){

	if($elemento != '.' && $elemento != '..'){



	if (is_dir("prueba/".$elemento)) {
		# code...
		$listar .= "<li> <a href = 'prueba/$elemento' target = '_blank'> $elemento/ </a> </li>";
	}

	else{

		$listar .= "<li> <a href = 'prueba/$elemento' target = '_blank'> $elemento </a> </li>";
	}
}

}


 ?>

 <!-- PhP para  Crear Carpetas -->

 <?php
$msg =null;
if ( isset($_POST['directorio']) ){

    $carpeta = htmlspecialchars($_POST['carpeta']);
    $ruta = htmlspecialchars($_POST['ruta']);
    $directorio = $ruta.$carpeta;

    if( !is_dir($directorio) )
    {
        $crear = mkdir($directorio, 0777, true);
        if($crear)
        {
            $msg = "Directorio $directorio  creado correctamente";
        }    
        else{
            $msg = "Ha ocurrido un error al crear el directorio ";
        }
    }else{
        $smg = "El directorio que intentas crear ya existe ";
    }
}

?>

 <!DOCTYPE html>
 <html>
 <head>
     <title></title>

     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Script Para Elegir Carpeta -->
    <script language="text/javascript"> 
function SelCarpeta() 
{ 


var objShell = new ActiveXObject("Shell.Application"); 

var objFolder = objShell.BrowseForFolder(0, "SELECCIONE LA RUTA DONDE DESEA GUARDAR EL ARCHIVO", 0,18); 
if (objFolder != null) 
{ 
var objFolderItem = objFolder.Items().Item(); 
var objPath = objFolderItem.Path; 
var foldername = objPath; 
document.Frm.text.value = foldername; 
return false; 
} 
} 
</script> 
 </head>
 <body>

    <h1>Listar Carpetas de un Directorio</h1>

    <h3>Listado de Archivos y Carpetas del Directorio Prueba</h3>

    <ul>
    	<?php echo $listar ?>
    </ul>


    <br>
     
 
 </body>
 </html>