<!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar Registro de Máquina</h4>
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

<div class="col-md-6">
<div class="form-group">
<label>FECHA DE ADQUISICIÓN</label>
<input type="date" name="fecha_adquisicion" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>
</div>
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
<label>FECHA DE TÉRMINO</label>
<input type="date" name="fecha_termino" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>CANTIDAD</label>
<input type="number" name="cantidad" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>FACTURA DE CONTRATO</label>
<input type="text" name="contrato_factura" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>
</div>
</div>


<div class="form-group">
<label>DESCRIPCIÓN</label>
<input type="text" name="descripcion" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>DESCRIPCIÓN ABREVIADA</label>
<input type="text" name="descripcion_abrv" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>MODELO</label>
<input type="text" name="modelo" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>SERIE</label>
<input type="text" name="serie" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>MARCA</label>
<input type="text" name="marca" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>
</div>
</div>

  <button type="submit" class="btn btn-primary">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->