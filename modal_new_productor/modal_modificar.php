<form id="actualidarDatos">
<div class="modal fade" id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Nuevo Productor:</h4>
      </div>
      <div class="modal-body">
			 <div id="datos_ajax_register"></div>
      
        <input type="hidden" class="form-control" id="codigotecnico" name="codigotecnico" required maxlength="30">
        <div class="form-group">
              <label for="nombretecnico" class="control-label">Nombre del Productor:</label>
              <input type="text" class="form-control" id="nombretecnico" name="nombretecnico" required maxlength="30">
        </div>
        <div class="form-group">
              <label for="telefono" class="control-label">Tel&eacute;fono:</label>
              <input type="text" class="form-control" id="telefono" name="telefono" required maxlength="20">
        </div>
        <div class="form-group">
              <label for="correo" class="control-label">Correo:</label>
              <input type="text" class="form-control" id="correo" name="correo" required maxlength="20">
        </div>
        <div class="form-group">
            <label for="ruta" class="control-label">Elija La Ruta:</label>
            <select class="form-control" value="" id="ruta" name="ruta" >
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
            <label for="municipio" class="control-label">Elija El Municipio:</label>
            <select class="form-control" value="" id="municipio" name="municipio" >
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
            <label for="ubicacion" class="control-label">Ubicaci&oacute;n:</label>
            <input type="text" class="form-control" id="ubicacion" name="ubicacion" required maxlength="50">
          </div>
       <div class="form-group">

            <label for="fechaingreso" class="control-label" >fecha ingreso:</label>

            <input type="text" class="form-control" id="fechaingreso" name="fechaingreso" required maxlength="30" disabled="disabled" value="<?php   echo date('Y-m-j H:i:s'); ?>"> 
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