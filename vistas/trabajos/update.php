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
                        <span class="input-group-addon"></span>
                           <label >Fecha de inicio </label><br>
                           <input maxlength="45" type="text"  name="Trabajos[fechaInicio]" class="form-control">
                   <br>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="l"></i></span>
                        <label >Tipo</label> <br>
                            <input maxlength="45" type="text"  name="Trabajos[tipo]"   
                            value="<?= $trabajos->tipo ?>" required class="form-control"/>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class=""></i></span>
                         
                    <label >Costos</label> <br>
                            <input maxlength="45" type="text"  name="Trabajos[costos]"   
                            value="<?= $trabajos->costos ?>" class="form-control" required/>
                             <br>
   
                      </div>
                    </div>

                     <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class=""></i></span>
                         
                     <label >Trabajador</label> <br>
                            <input maxlength="45" type="text"  name="Trabajos[id_trabajadores]"  
                            value="<?= $trabajos->id_trabajadores ?>" class="form-control"required/>
                            <br>
                      </div>
                    </div>

                     <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class=""></i></span>
                         
                    <label >Trabajador</label> <br>
                            <input maxlength="45" type="text"  name="Trabajos[id_trabajadores2]"  
                            value="<?= $trabajos->id_trabajadores ?>" class="form-control" required/>
                      </div>
                    </div>

                     <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class=""></i></span>
                         
                    <label >Trabajador</label> <br>
                            <input maxlength="45" type="text"  name="Trabajos[id_trabajadores3]"  
                            value="<?= $trabajos->id_trabajadores ?>" class="form-control" required/>
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