<!DOCTYPE html>
<html>
<head>
    <title>Editar Citas</title>

    <link rel="stylesheet" href="https://unpkg.com/rmodal/dist/rmodal.css" type="text/css" />
    <script type="text/javascript" src="https://unpkg.com/rmodal/dist/rmodal.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<?php include("header.php"); ?>
<body  style="   background: #fff; "  >
        <section id="content_outer_wrapper">
        <div id="content_wrapper" class="card-overlay">
          <div style="background: #fff;" id="header_wrapper" class="header-xl  profile-header">

          </div>   
 
    <font face="verdana"> 

    <br>

    <div id="content" class="container-fluid">
            <div class="content-body">
            <div class="row">
     
                <div class="card">
                	<form method="POST">
                  <header class="card-heading ">
                    <h2 class="card-title">Actualizar la cita de: <br> <?= $citas->fechaHora; ?></h2>
                    <ul class="card-actions icons right-top">
                      <li>
                        <a href="javascript:void(0)" data-toggle-view="code">
                          <i class="zmdi zmdi-code"></i>
                        </a>
                      </li>
                    </ul>
                  </header>
                  <div class="card-body">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                       <label >fecha</label><br>
    				<input type="datetime-local" name="Citas[fechaHora]" id="dummyText" class="form-control"  required min=""  value="<?= date_format(date_create($citas->fechaHora), 'Y-m-d\TH:i:s'); ?>" /><br>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="l"></i></span>
             			<label >caracteristicas</label><br>
  					  <input  type="text" name="Citas[caracteristicas]" value="<?= $citas->caracteristicas ?> "" class="form-control"required><br>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class=""></i></span>
                         
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
   
                      </div>
                    </div>
                   
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary">Guardar Cambios</button>
                  </div>
                </div>
              </div>
         </form>
              


	
</div>
</div>
</body>
