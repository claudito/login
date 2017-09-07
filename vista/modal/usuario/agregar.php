<!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" id="agregar" autocomplete="off">


<div class="form-group">
<label>NOMBRES</label>
<input type="text" name="nombres" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>

<div class="form-group">
<label>APELLIDOS</label>
<input type="text" name="apellidos" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>

<div class="form-group">
<label>CORREO</label>
<input type="email" name="correo" id=""  required="" class="form-control">
</div>

<div class="form-group">
<label>CELULAR</label>
<input type="text" name="celular" id=""  required="" class="form-control" maxlength="200" onchange="Mayusculas(this)">
</div>

<div class="form-group">
<label>CONTRASEÑA</label>
<input type="password" name="pass" id=""  required="" class="form-control" maxlength="200">
</div>







  <button type="submit" class="btn btn-primary">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->