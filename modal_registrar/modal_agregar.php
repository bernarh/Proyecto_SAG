<form id="guardarDatos">
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Hoja de recolecci&oacute;n de informaci&oacute;n de comercializaci&oacute;n de productos del cacao:</h4>
      </div>
      <div class="modal-body">
			<div id="datos_ajax_register"></div>
      <div class="form-group">
            <label for="nombretecnico0" class="control-label">Nombre del Productor:</label>
            <input type="text" class="form-control" id="nombretecnico0" name="nombretecnico" required maxlength="30">
      </div>
		  <div class="form-group">
            <label for="telefono0" class="control-label">Tel&eacute;fono:</label>
            <input type="text" class="form-control" id="telefono0" name="telefono" required maxlength="20">
          </div>
       <div class="form-group">
            <label for="fechaingreso0" class="control-label" >fecha ingreso:</label>

            <input type="text" class="form-control" id="fechaingreso0" name="fechaingreso" required maxlength="30" disabled="disabled" value="<?php   echo date('Y-m-j H:i:s'); ?>"> 
        </div>
      <h4 class="modal-title" id="exampleModalLabel">Informaci&oacute;n de compra/venta</h4>
      <br>
    
      <div class="form-group">
            <label for="puntorecoleccion0" class="control-label">Punto de recolecci&oacute;n:</label>
            <input type="text" class="form-control" id="puntorecoleccion0" name="puntorecoleccion" required maxlength="30">
          </div>
		  <div class="form-group">
            <label for="tipotransaccion0" class="control-label">Tipo de transacci&oacute;n:</label>
            <select class="form-control" value="" id="tipotransaccion0" name="tipotransaccion" >
                      <option value="">--Opci&oacute;n--</option>
                      <?php
                        $conexion= new Conexion();
                        $result= $conexion->llenarTipoTransaccion();
                        while ($myrow = $result->fetch_assoc()) {
                          echo "<option value='".$myrow['codigo_tipo_transaccion']."'>".$myrow['tipo_transaccion']."</option>";
                        }
                        $conexion->cerrarConexion();  
                      ?>
                    </select>
          </div>
      <div class="form-group">
            <label for="tipoproduccion0" class="control-label">Tipo de Producci&oacute;n:</label>
            <select class="form-control" value="" id="tipoproduccion0" name="tipoproduccion" >
                      <option value="">--Opci&oacute;n--</option>
                     <?php
                        $conexion= new Conexion();
                        $result= $conexion->llenarTipoProduccion();
                        while ($myrow = $result->fetch_assoc()) {
                          echo "<option value='".$myrow['codigo_tipo_produccion']."'>".$myrow['tipo_produccion']."</option>";
                        }
                        $conexion->cerrarConexion();  
                      ?>
                    </select>
          </div>
      <div class="form-group">
            <label for="tipoproducto0" class="control-label">Elija el tipo de producto:</label>
            <select class="form-control" value="" id="tipoproducto0" name="tipoproducto" >
                      <option value="">--Opci&oacute;n--</option>
                     <?php
                        $conexion= new Conexion();
                        $result= $conexion->llenarProductos();
                        while ($myrow = $result->fetch_assoc()) {
                          echo "<option value='".$myrow['codigo_producto']."'>".$myrow['descripcion_producto']." ".$myrow['nombre_tipo_cacao']."</option>";
                        }
                        $conexion->cerrarConexion();  
                      ?>
                    </select>
          </div>
      <div class="form-group">
            <label for="precio0" class="control-label">Precio del Producto:</label>
            <input type="text" class="form-control" id="precio0" name="precio" required maxlength="10">
          </div>
		  
		  <div class="form-group">
            <label for="volumenproducto0" class="control-label">Volumen de producto:</label>
            <input type="text" class="form-control" id="volumenproducto0" name="volumenproducto" required maxlength="10">
          </div>
      <div class="form-group">
            <label for="comentario0" class="control-label">Comentario:</label>
            <input type="text" class="form-control" id="comentario0" name="comentario" required maxlength="15">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar datos</button>
      </div>
    </div>
  </div>
</div>
</form>