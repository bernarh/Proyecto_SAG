<form id="eliminarDatos">
<div class="modal fade" id="dataDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div id="datos_ajax_delete"></div>
      <input type="hidden" id="fechaingresoproducto" name="fechaingresoproducto">
      <input type="hidden" id="codigoproductor" name="codigoproductor">
      <input type="hidden" id="codigoproducto" name="codigoproducto">
      <input type="hidden" id="cantidad" name="cantidad">
      <input type="hidden" id="precio" name="precio">
      <input type="hidden" id="codigotipoproduccion" name="codigotipoproduccion">
      <input type="hidden" id="codigousuario" name="codigousuario">
      <input type="hidden" id="codigotipotransaccion" name="codigotipotransaccion">
      <input type="hidden" id="codigopuntorecoleccion" name="codigopuntorecoleccion">
      <input type="hidden" id="comentario" name="comentario">
      <input type="hidden" id="fecharecoleccion" name="fecharecoleccion">
      <h2 class="text-center text-muted">Estas seguro?</h2>
	  <p class="lead text-muted text-center" style="display: block;margin:10px">Esta acción eliminará de forma permanente el registro. Deseas continuar?</p>
      <div class="modal-footer">
        <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-lg btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>
</form>