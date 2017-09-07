<!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar Cliente</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" id="agregar" autocomplete="off">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>CÓDIGO</label>
<input type="text" name="codigo" id=""  required="" class="form-control" maxlength="20" 
 onchange="Mayusculas(this)">
</div>
</div>
<div class="col-md-6"></div>
</div>

<div class="form-group">
<label>CONTACTO</label>
<input type="text" name="contacto" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>


<div class="form-group">
<label>RAZÓN SOCIAL</label>
<input type="text" name="razon_social" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>RUC</label>
<input type="text" name="ruc" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>DNI</label>
<input type="text" name="dni" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>
</div>
</div>

<div class="form-group">
<label>DIRECCIÓN 1</label>
<input type="text" name="direccion1" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>

<div class="form-group">
<label>DIRECCIÓN 2</label>
<input type="text" name="direccion2" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>TELÉFONO</label>
<input type="text" name="telefono" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>CORREO</label>
<input type="text" name="correo" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>
</div>
</div>


  <button type="submit" class="btn btn-primary">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->