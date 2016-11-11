
<form id="guardarDatos">
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Nuevo Usuario:</h4>
      </div>
      <div class="modal-body">
			<div id="datos_ajax_register"></div>
       <div class="form-group">
          <label for="nombreusuario" class="control-label">Ingrese nombre de usuario</label> 
          <input  type="text" name="nombreusuario" id="nombreusuario" class="form-control" placeholder="Username"/>               
        </div> 
        <div class="form-group">
          <label for="pass1" class="control-label">Ingrese password de usuario</label> 
          <input  type="text" name="pass1" id="pass1" class="form-control" placeholder="Password"/>
        </div>
        <div class="form-group">
          <label for="pass2" class="control-label">Ingrese el password nuevamente</label> 
          <input  type="text" name="pass2" id="pass2" class="form-control" placeholder="Password"/>
        </div>
        <div class="form-group">
          <label for="direccion" class="control-label">dirección de usuario</label> 
          <input  type="text" name="direccion" id="direccion" class="form-control" placeholder="Dirección"/>
        </div>
        <div class="form-group">
          <label for="telefono" class="control-label">Ingrese teléfono de usuario</label> 
          <input  type="text" name="telefono" id="telefono" class="form-control" placeholder="Teléfono"/>
        </div>
        <div class="form-group">
          <label for="correo" class="control-label">Ingrese correo de usuario</label> 
          <input  type="text" name="correo" id="correo" class="form-control" placeholder="E-mail"/>
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar datos</button>
      </div>
    </div>
  </div>
</div>
</div>
</form>