<form id="guardarDatos">
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Nuevo Productor:</h4>
      </div>
      <div class="modal-body">
			<div id="datos_ajax_register"></div>

      <div class="form-group">
            <label for="ruta0" class="control-label">Elija La Ruta:</label>
            <select class="form-control" value="" id="ruta0" name="ruta" >
                      <option value="">--Opci&oacute;n--</option>
                      <?php
                        $conexion= new Conexion();
                        $result= $conexion->llenarNoZona();
                        while ($myrow = $result->fetch_assoc()) {
                          echo "<option value='".$myrow['codigo_zona']."'>".$myrow['numero_zona']."</option>";
                        }
                        $conexion->cerrarConexion();  
                      ?>
                    </select>
          </div>

      <div class="form-group">
            <label for="municipio0" class="control-label">Elija El Municipio:</label>
            <select class="form-control" value="" id="municipio0" name="municipio" >
                      <option value="">--Opci&oacute;n--</option>
                      <?php
                        $conexion= new Conexion();
                        $result= $conexion->llenarMunicipio();
                        while ($myrow = $result->fetch_assoc()) {
                          echo "<option value='".$myrow['codigo_municipio']."'>".$myrow['nombre_municipio']."</option>";
                        }
                        $conexion->cerrarConexion();  
                      ?>
                    </select>
          </div>

      <div class="form-group">
            <label for="nombretecnico0" class="control-label">Nombre del Productor:</label>
            <input type="text" class="form-control" id="nombretecnico0" name="nombretecnico" required maxlength="30">
      </div>
		  <div class="form-group">
            <label for="telefono0" class="control-label">Tel&eacute;fono:</label>
            <input type="text" class="form-control" id="telefono0" name="telefono" required maxlength="20">
          </div>
       <div class="form-group">

       <div class="form-group">
            <label for="ubicacion0" class="control-label">Ubicaci&oacute;n:</label>
            <input type="text" class="form-control" id="ubicacion0" name="ubicacion" required maxlength="50">
          </div>
       <div class="form-group">

            <label for="fechaingreso0" class="control-label" >fecha ingreso:</label>

            <input type="text" class="form-control" id="fechaingreso0" name="fechaingreso" required maxlength="30" disabled="disabled" value="<?php   echo date('Y-m-j H:i:s'); ?>"> 
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar datos</button>
      </div>
    </div>
  </div>
</div>
</form>