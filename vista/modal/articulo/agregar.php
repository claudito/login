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
<label>CÓDIGO</label>
<input type="text" name="codigo" id=""  required="" class="form-control" maxlength="20" 
 onchange="Mayusculas(this)" autocomplete="off">
</div>

<div class="form-group">
<label>CÓDIGO 2</label>
<input type="text" name="codigo2" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)" autocomplete="off">
</div>

<div class="form-group">
<label>DESCRIPCIÓN</label>
<input type="text" name="descripcion" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)" autocomplete="off">
</div>

<div class="form-group">
<label>DESCRIPCIÓN 2</label>
<input type="text" name="descripcion2" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)" autocomplete="off">
</div>


<div class="form-group">
<label>CÓDIGO DE FAMILIA</label>
<select name="familia" id="" class="form-control" required="">
<option value="">[Seleccionar]</option>
<?php 
$familia = new Familia();
foreach ($familia->lista() as $key => $value): ?>
<option value="<?php echo $value['id'] ?>"><?php echo $value['codigo'].'-'.$value['descripcion']  ?></option>
<?php endforeach ?>
</select>
</div>

<div class="form-group">
<label>CÓDIGO DE UNIDAD</label>
<select name="unidad" id="" class="form-control">
  <option value="">[Seleccionar]</option>
  <?php 
  $unidad = new Unidad();
  foreach ($unidad->lista() as $key => $value): ?>
   <option value="<?php echo $value['id'] ?>"><?php echo $value['codigo'].'-'.$value['descripcion'] ?></option> 
  <?php endforeach ?>
</select>
</div>

<div class="form-group">
<label>CODIGO DE TIPO DE ARTÍCULO</label>
<select name="tipo" id="" class="form-control">
  <option value="">[Seleccionar]</option>
  <?php 
  $articulo_tipo = new Articulo_tipo();
  foreach ($articulo_tipo->lista() as $key => $value): ?>
  <option value="<?php echo $value['id'] ?>"><?php echo $value['codigo'].'-'.$value['descripcion'] ?></option> 
  <?php endforeach ?>
</select>
</div>

<div class="form-group">
<label>FICHA TÉCNICA</label>
<textarea name="ficha" id="" rows="5" class="form-control" onchange="Mayusculas(this)"></textarea>
</div>


  <button type="submit" class="btn btn-primary">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->