<?php include_once __DIR__ . '/../layout/header.php'; ?>
<h2>Agregar Nuevo Proyecto</h2>
<form action="index.php?action=guardar" method="POST">
<div class="mb-3">
<label for="nombre" class="form-label">Nombre del proyecto *</label>
<input type="text" class="form-control" id="nombre" name="nombre" 
required>
</div>
<div class="mb-3">
<label for="descripcion" class="form-label">Descripción</label>
<textarea class="form-control" id="descripcion" name="descripcion" 
rows="3"></textarea>
</div>
<div class="mb-3">
<label for="responsable" class="form-label">Responsable</label>
<input type="text" class="form-control" id="responsable" 
name="responsable">
</div>
<button type="submit" class="btn btn-success">Guardar Proyecto</button>
<a href="index.php?action=index" class="btn btn-secondary">Cancelar</a>
</form>
<?php include_once __DIR__ . '/../layout/footer.php'; ?>