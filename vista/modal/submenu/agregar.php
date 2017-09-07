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
<label>DESCRIPCIÓN</label>
<input type="text" name="descripcion" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>

<div class="form-group">
<label>RUTA</label>
<input type="text" name="ruta" id=""  required="" class="form-control" maxlength="100">
</div>

<div class="form-group">
<label>ITEM</label>
<input type="number" min="1" name="item" id=""  required="" class="form-control">
</div>

<div class="form-group">
<label>MENÚ</label>
<select name="menu" id="" class="form-control" required="">
<option value="">[ Seleccionar ]</option>
<?php $menu = new Menu(); ?>
<?php foreach ($menu->lista() as $key => $value): ?>
<option value="<?php echo $value['id'] ?>"><?php echo $value['descripcion']; ?></option>
<?php endforeach ?>
</select>
</div>


  <button type="submit" class="btn btn-primary">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->