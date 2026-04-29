<?php include_once __DIR__ . '/../layout/header.php'; ?>
<h2>Listado de Proyectos</h2>
<?php if (empty($proyectos)): ?>
<div class="alert alert-info">No hay proyectos registrados aún.</div>
<?php else: ?>
<table class="table table-striped table-bordered">
<thead class="table-dark">
<tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Responsable</th>
<th>Acciones</th></tr>
</thead>
<tbody>
<?php foreach ($proyectos as $proy): ?>
<tr>
<td><?= $proy['id'] ?></td>
<td><?= htmlspecialchars($proy['nombre']) ?></td>
<td><?= htmlspecialchars($proy['descripcion']) ?></td>
<td><?= htmlspecialchars($proy['responsable']) ?></td>
<td>
<a href="index.php?action=eliminar&id=<?= $proy['id'] ?>" 
class="btn btn-danger btn-sm" 
onclick="return confirm('¿Eliminar este proyecto?')">
🗑
 
Eliminar</a>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<?php endif; ?>
<?php include_once __DIR__ . '/../layout/footer.php'; ?>