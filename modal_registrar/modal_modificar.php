<form id="actualidarDatos">
<div class="modal fade" id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Agregar nuevo precio y producto de este productor:</h4>
      </div>
      <div class="modal-body">
			<div id="datos_ajax"></div>
        <div class="form-group">
            <label for="nombretecnico" class="control-label">Codigo Tecnico:</label>
            <input type="text" class="form-control" id="nombretecnico" name="nombretecnico" required maxlength="255">
          </div> 
		  <div class="form-group">
            <label for="fechaingreso" class="control-label">Fecha Ingreso:</label>
             <input type="text" class="form-control" id="fechaingreso" name="fechaingreso" required maxlength="30" disabled="disabled" value="<?php   echo date('Y-m-j H:i:s'); ?>"> 
          </div>
      <h4 class="modal-title" id="exampleModalLabel">Hoja de recolecci&oacute;n de informaci&oacute;n de comercializaci&oacute;n de productos del cacao:</h4>
      <div class="form-group">
            <label for="fecharecoleccion0" class="control-label" >fecha de recolecci&oacute;n:</label>

            <input type="date" class="form-control" id="fecharecoleccion0" name="fecharecoleccion" required maxlength="30"  value=""> 
        </div>
        <div class="form-group">
            <label for="puntorecoleccion" class="control-label">Punto de Recolecci&oacute;n:</label>
            <select class="form-control" value="" id="puntorecoleccion" name="puntorecoleccion" >
                      <option value="">--Opci&oacute;n--</option>
                     <?php
                        $conexion= new Conexion();
                        $result= $conexion->llenarPuntoRecoleccion();
                        while ($myrow = $result->fetch_assoc()) {
                          echo "<option value='".$myrow['codigo_punto_recoleccion']."'>".$myrow['punto_recoleccion']."</option>";
                        }
                        $conexion->cerrarConexion();  
                      ?>
                    </select>
          </div>
          <div class="form-group">
            <label for="tipotransaccion" class="control-label">Tipo de Transacci&oacute;n:</label>
            <select class="form-control" value="" id="tipotransaccion" name="tipotransaccion" >
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
            <label for="volumenproducto" class="control-label">Volumen del producto:</label>
            <input type="text" class="form-control" id="volumenproducto" name="volumenproducto" required maxlength="15">
          </div>
          
       <div class="form-group">
            <label for="comentario" class="control-label">Comentario:</label>
            <input type="text" class="form-control" id="comentario" name="comentario" required maxlength="255">
          </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Agregar</button>
      </div>
    </div>
  </div>
</div>
</form>