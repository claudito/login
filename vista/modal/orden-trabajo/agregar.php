<!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar Orden de Trabajo</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" id="agregar" autocomplete="off">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>CÓDIGO</label>
<input type="text" name="codigo" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>UNIDAD</label>
<select name="unidad" id="" class="form-control">
<option value="">[Seleccionar]</option>
<?php 
$unidad = new Unidad();
foreach ($unidad->lista() as $key => $value): ?>
<option value="<?php echo $value['id'] ?>"><?php echo $value['codigo'].' - '.$value['descripcion'] ?></option> 
<?php endforeach ?>
</select>
</div>
</div>
</div>

<div class="form-group">
<label>CLIENTE</label>
<select name="codigo_cliente" id="" class="form-control">
<option value="">[Seleccionar]</option>
<?php
$cliente = new Cliente(); 
foreach ($cliente->lista() as $key => $value): ?>
<option value="<?php echo $value['id'] ?>"><?php echo $value['codigo'].' - '.$value['contacto'] ?></option> 
<?php endforeach ?>
</select>
</div>

<div class="form-group">
<label>DESCRIPCIÓN</label>
<input type="text" name="descripcion" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>FECHA DE INICIO</label>
<input type="date" name="fecha_inicio" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>FECHA DE FIN</label>
<input type="date" name="fecha_fin" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>CANTIDAD</label>
<input type="text" name="cantidad" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>OBSERVACIÓN</label>
<input type="text" name="observacion" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>
</div>
</div>

<button type="submit" class="btn btn-primary">Agregar</button>

 <!--  </div> corregir este row -->
 <!--  </div> corregir este termino de div -->

</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->