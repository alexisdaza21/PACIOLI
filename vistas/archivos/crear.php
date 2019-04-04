<?php
$msg =null;
if ( isset($_POST['directorio']) ){

    $carpeta = htmlspecialchars($_POST["carpeta"]);
    $ruta = htmlspecialchars($_POST["ruta"]);
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
        $smg = "El directorio que intestas crear ya existe ";
    }
}

?>

 <!DOCTYPE html>
 <html>
 <head>
     <title></title>
 </head>
 <body>
    <h3>Crear Carpetas</h3>
<strong> <?php echo $msg ?></strong>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
        <table>
            
            <tr>
                <td>Nombre de la Carpeta</td>
                <td>
                    <input type="text" name="carpeta">
                </td>
            </tr>
           <tr>
                <td>Ruta</td>
                <td>

                    <select name="ruta" >
                        <option value="ruta" >
                           Pagos/
                        </option>
                    </select>
                    
                </td>

                   <td>guardar en la ruta:</td>
                <td><input type="text" name"ruta"></td


            </tr>
        </table>

        <input type="hidden" name="directorio">

        <input type="submit" value="Crear">

    </form>

 </body>
 </html>