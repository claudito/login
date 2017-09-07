<!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" id="agregar">

<div class="form-group">
<label>CÓDIGO</label>
<select name="codigo" id="idcodigo" class="demo-default" required="" >
<option value="">[Seleccionar]</option>
<?php 
$articulo  =  new Articulo();
foreach ($articulo->lista() as $key => $value): ?>
<?php if ($value['codigotipo']!=='N'): ?>
<option value="<?php echo $value['id']; ?>"><?php echo $value['codigo'].' - '.$value['descripcion']; ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
 <script >
$('#idcodigo').selectize({
maxItems: 1
});
</script>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>CANTIDAD</label>
<input type="number" step="any" name="cantidad" id="" class="form-control" required="" min="0.00">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>SALDO</label>
<input type="number" step="any" name="saldo" id="" class="form-control" required="" min="0.00">
</div>
</div>
</div>


<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>CENTRO DE COSTO</label>
<select name="centro_costo" id="" class="form-control" required="">
  <option value="">[Seleccionar]</option>
  <?php 
  $centro_costo = new Centro_costo();
  foreach ($centro_costo->lista() as $key => $value): ?>
   <option value="<?php echo $value['codigo']?>"><?php echo $value['codigo'].'-'.$value['descripcion']?></option> 
  <?php endforeach ?>
</select>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>ORDEN DE TRABAJO</label>
<select name="ot" id="" class="form-control">
<option value="">[Seleccionar]</option>
<?php 
$orden_trabajo = new Orden_trabajo();
foreach ($orden_trabajo->lista() as $key => $value): ?>
<option value="<?php echo $value['codigo'] ?>"><?php echo $value['codigo'].' - '.$value['cliente'] ?></option>
<?php endforeach ?>
</select>
</div>
</div>
</div>


<div class="form-group">
<label>COMENTARIO</label>
<textarea name="comentario" id="" rows="3" class="form-control" onchange="Mayusculas(this)"></textarea>
</div>


<input type="hidden"  name="idnumero"  id="idnumero"  value="<?php echo $_GET['codigo']; ?>">


<button type="submit" class="btn btn-primary">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->