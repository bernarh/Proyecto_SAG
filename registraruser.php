<?php
session_start();
include 'conexion.php';

if(isset($_SESSION['user']) and($_SESSION['codigotipousuario']===3) ) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar usuario</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
 
<body>
   
        

        
    </nav>
    <div class="container">
         <div class="row form-horizontal">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_consultar" data-toggle="tab">Registro Nuevo Usuario</a></li>
              
              
            </ul>
        </div>
        </br>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_consultar">
                <div class="row form-horizontal">
                    <div class="panel panel-default">
                     
                    <form id="guardarusuario" method="POST" action="agregarusuario.php">   
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-xs-4  text-left">
                                     <label for="nombreusuario" class="control-label">Ingrese nombre de usuario</label> 
                                      <input  type="text" name="nombreusuario" id="nombreusuario" class="form-control" placeholder="Username"/>
                                </div>
                            </div> 
                            <div class="form-group">
                                <div class="col-xs-4  text-left">
                                     <label for="pass1" class="control-label">Ingrese password de usuario</label> 
                                      <input  type="text" name="pass1" id="pass1" class="form-control" placeholder="Password"/>
                                </div>
                             </div>
                             <div class="form-group">
                                 <div class="col-xs-4  text-left">
                                     <label for="pass2" class="control-label">Ingrese el password nuevamente</label> 
                                      <input  type="text" name="pass2" id="pass2" class="form-control" placeholder="Password"/>
                                </div>
                             </div>
                             <div class="form-group">
	                             <div class="col-xs-4">
	                                     <label for="direccion" class="control-label">dirección de usuario</label> 
	                                      <input  type="text" name="direccion" id="direccion" class="form-control" placeholder="Dirección"/>
	                                </div>
	                          </div>
	                          <div class="form-group">
                                <div class="col-xs-4  text-left">
                                     <label for="telefono" class="control-label">Ingrese teléfono de usuario</label> 
                                      <input  type="text" name="telefono" id="telefono" class="form-control" placeholder="Teléfono"/>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-xs-4  text-left">
                                     <label for="correo" class="control-label">Ingrese correo de usuario</label> 
                                      <input  type="text" name="correo" id="correo" class="form-control" placeholder="E-mail"/>
                                </div>
                               </div>
                        	  <div class="form-group">
					            <label for="tipousuario" class="control-label">Seleccione el tipo de usuario:</label>
					            <select class="form-control" value="" id="tipousuario" name="tipousuario" >
					            	<option value="">--Opci&oacute;n--</option>
					                      <?php
					                        $conexion= new Conexion();
					                        $result= $conexion->llenartipodeusuario();
					                        while ($myrow = $result->fetch_assoc()) {
					                          echo "<option value='".$myrow['codigo_tipo_usuario']."'>".$myrow['nombre_tipo_usuario']."</option>";
					                        }
					                        $conexion->cerrarConexion();  
					                      ?>
                   					 </select>
                   			</div>
                    		<div class="modal-footer">

					        	<button type="submit" class="btn btn-primary">Guardar datos</button>
					      	</div>
                            <div class="form-group">
                                <div id="lista"></div> 
                            </div> 
                            
                        </div>
                    </form>    
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab_registrar">
                
            </div>
                
        </div><!-- tab content -->
    </div>
    <script src="js/jquery-1.11.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
   
</body>
</html>
<?php
}else{
	echo '<script> window.location="index.php"; </script>';
}
?>
    