<!DOCTYPE html>
<html>
<head>
    <title>editar tareas</title>

    <link rel="stylesheet" href="https://unpkg.com/rmodal/dist/rmodal.css" type="text/css" />
    <script type="text/javascript" src="https://unpkg.com/rmodal/dist/rmodal.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>


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
                    <h2 class="card-title">Actualizar la tarea de:  <?= $tareas->fechaInicio; ?></h2>
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

                        <label > Descripci&oacute;n de la tarea</label><br>
                        <input type="text" name="Tareas[nombreTarea]" id="dummyText" class="form-control"  value="<?= $tareas->nombreTarea ?>" />
                     <br>
                      </div>
                    </div>

                      <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="l"></i></span>
                        <label > Tipo de Tarea </label>
                       <select required="" name="Tareas[id_trabajos]" class="form-control">
                        </option>
                                                   <option>-Seleccion-</option>
                               <?php foreach ( $trabajos as $trabajo) {?>
                           <option value="<?= $trabajo  ->id_trabajos; ?>"><?=$trabajo->tipo; ?> 

                             </option>
                                    <?php } ?>
                        </select><br>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="l"></i></span>
                        <label > Cliente </label>
                       <select required="" name="Tareas[id_clientes]" class="form-control">
                        </option>
                        <?php foreach ( $clientes as $cliente) {?>
                   <option value="<?= $cliente->id_clientes; ?>">Nit:<?=$cliente->nit; ?> &nbsp; Raz&oacute;n Social: <?=$cliente->razonSocial; ?>  </option>
                         <?php } ?>
                        </select><br>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class=""></i></span>
                         
        
   
                      </div>

                       <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="l"></i></span>
                        <label > Trabajador Encargado </label>
                        <select required="" name="Tareas[id_trabajadores]" class="form-control">
                            </option>
                             <?php foreach ( $trabajadores as $trabajador) {?>
                             <option value="<?= $trabajador->id_trabajadores; ?>"><?=$trabajador->nombres; ?> <?=$trabajador->apellidos; ?>  </option>
                               <?php } ?>
                             </select>

                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class=""></i></span>
                         
        
   
                      </div>
                    </div>

                     <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="l"></i></span>
                        <label >Fecha de Inicio</label><br>
                      <input type="date" name="Tareas[fechaInicio]" id="dummyText" class="form-control"  required min=""  value="<?= date_format(date_create($tareas->fechaInicio), 'Y-m-d'); ?>" /><br>

                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class=""></i></span>
                         
        
   
                      </div>
                    </div>

                     <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="l"></i></span>
                         <label >Fecha de Finalizaci&oacute;n</label><br>
                        <input type="date" name="Tareas[fechaFin]" id="dummyText" class="form-control"  required min=""  value="<?= date_format(date_create($tareas->fechaFin), 'Y-m-d'); ?>" /><br>

                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class=""></i></span>
                         
        
   
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="l"></i></span>
                        <label > Estado de la Tarea </label>
                       <select   required="" name="Tareas[estado]" class="form-control">
            <option value="activa"><?= $tareas->estado ?></option>
        <?php  if ($tareas->estado == 'Activa') {?>
                
                 <option >Terminada</option>
                  <option >En curso</option>


        <?php } ?>  

        <?php  if ($tareas->estado == 'Terminada') {?>
                 <option >Activa</option>
                 <option >En curso</option>
        <?php } ?>   

                   
        </select>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class=""></i></span>
                         
        
   
                      </div>
                    </div>
                   
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary">Guardar Cambios</button>
                  </div>
                </div>
              </div>
         </form>
              

        <div style=" background-image:url(images/torneo.jpg); width:   100%; " >
            <a href="index.php?c=tareas&a=admin" style="float: right; margin: 2%;margin-right: 5%; font-size: 135%; color: #fff; text-decoration: none;">-volver-</a>
    <br><br>

	
     <br><br><br><br><br><br><br><br>
</div>
</div>
</body>
