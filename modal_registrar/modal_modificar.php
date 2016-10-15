<form id="actualidarDatos">
<div class="modal fade" id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Agregar nuevo precio y producto de este producto:</h4>
      </div>
      <div class="modal-body">
			<div id="datos_ajax"></div>
        <div class="form-group">
            <label for="nombreproductor" class="control-label">Nombre Productor:</label>
            <input type="text" class="form-control" id="nombreproductor" name="nombreproductor" required maxlength="255">
          </div>
          
		  <div class="form-group">
            <label for="fechaingreso" class="control-label">Fecha Ingreso:</label>
             <input type="text" class="form-control" id="fechaingreso" name="fechaingreso" required maxlength="30" disabled="disabled" value="<?php   echo date('Y-m-j H:i:s'); ?>"> 
          </div>
      <h4 class="modal-title" id="exampleModalLabel">Hoja de recolecci&oacute;n de informaci&oacute;n de comercializaci&oacute;n de productos del cacao:</h4>
      <div class="form-group">
            <label for="tipoproduccion" class="control-label">Tipo de Producci&oacute;n:</label>
            <select class="form-control" value="" id="tipoproduccion" name="tipoproduccion" >
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
            <label for="tipoproducto" class="control-label">Elija el tipo de producto:</label>
            <select class="form-control" value="" id="tipoproducto" name="tipoproducto" >
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
            <label for="precio" class="control-label">Precio:</label>
            <input type="text" class="form-control" id="precio" name="precio" required maxlength="30"> 
          </div>
		  <div class="form-group">
            <label for="volumen" class="control-label">Volumen del producto:</label>
            <input type="text" class="form-control" id="volumen" name="volumen" required maxlength="15">
          </div>
          
       <div class="form-group">
            <label for="comentario" class="control-label">Comentario:</label>
            <input type="text" class="form-control" id="comentario" name="comentario" required maxlength="255">
          </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Agregar Nuevo precio</button>
      </div>
    </div>
  </div>
</div>
</form>