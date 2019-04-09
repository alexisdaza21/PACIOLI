<!DOCTYPE html>
<html>
<head>
	<title>Editar trabajos</title>
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

                     &nbsp;<a href="index.php?c=clientes&a=trabajos&id=<?= $_GET["id"] ?>" align= "center"><h4>Volver</h4></a>
                    <form method="POST">
                  <header class="card-heading ">
                    <h2 class="card-title">Actualizar trabajo <?= $trabajos->tipo ?></h2>
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

                            <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                            <input type="date" class="form-control datepicker" id="datepicker-theme" placeholder="Fecha inicio..." aria-label="Use the arrow keys to pick a date" name="Trabajos[fechaInicio]"   value="<?=$trabajos->fechaInicio; ?>" required>
                         </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <div class="input-group">

                            <span class="input-group-addon"><i class=""></i></span>
                            <label >Tipo</label>
                            <input class="form-control " maxlength="45" type="text"  name="Trabajos[tipo]"   value="<?=$trabajos->tipo; ?>" required/>
                         </div>
                      </div>

                      <div class="form-group">
                      <div class="input-group">

                            <span class="input-group-addon"><i class=""></i></span>
                            <label>Costos </label>
                            <input maxlength="45" type="text"  name="Trabajos[costos]"   
                            value="<?= $trabajos->costos ?>" class="form-control" required/>
                         </div>
                      </div>


                      <div class="form-group">
                      <div class="input-group">

                            <span class="input-group-addon"><i class=""></i></span>

                            <label >Trabajador 1</label>

                            <select class="select form-control" required="" name="Trabajos[id_trabajadores]">
                           <option>Seleccion-</option>

                             
                           <option value="<?= $trabajos->id_trabajadores; ?>"><?=$trabajos->id_trabajadores; ?>  </option>

                         

                                    
                        </select>


                   
                            
                         </div>
                      </div>


                      <div class="form-group">
                      <div class="input-group">

                            <span class="input-group-addon"><i class=""></i></span>

                            <label >Trabajador 2</label>
                           <select class="select form-control" required="" name="Trabajos[id_trabajadores2]">
                           <option>Seleccion-</option>
                           
                           <option value="<?= $trabajador->id_trabajadores2; ?>"><?=$trabajos->id_trabajadores2 ?>  </option>
                                    
                        </select>
                        </select>


                   
                            
                         </div>
                      </div>

                           <div class="form-group">
                      <div class="input-group">

                            <span class="input-group-addon"><i class=""></i></span>

                          <label >Trabajador</label>
                           <select class="select form-control" required="" name="Trabajos[id_trabajadores3]">
                           <option>Seleccion-</option>
                               
                           <option value="<?= $trabajador->id_trabajadores3; ?>"><?=$trabajos->id_trabajadores3 ?>  </option>
                                
                        </select>
                        <input maxlength="45" type="hidden"  name="Trabajos[id_clientes]"   value="<?= $_GET["id"] ?>" />
                                    
                        </select>
                        </select>


                   
                            
                         </div>
                      </div>
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
</html>