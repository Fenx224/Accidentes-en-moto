<?php
// Incluir el archivo de configuración de la BD
require_once 'C:\xampp\htdocs\Accidentes-en-moto\Back-end\PHP\db.php';

// 1. Definir la consulta SELECT
$sql = "SELECT id, marca, modelo, tipo, certificacion, precio, imagen_url FROM cascos ORDER BY id DESC";
$resultado = $conn->query($sql);

$cascos = [];
if ($resultado && $resultado->num_rows > 0) {
    // 2. Recorrer los resultados y guardarlos en un array
    while($fila = $resultado->fetch_assoc()) {
        $cascos[] = $fila;
    }
}

// 3. Cerrar la conexiónD
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Cascos - CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">📋 Inventario de Cascos</h2>
    <a href="crear.php" class="btn btn-success mb-3">➕ Agregar Nuevo Casco</a>
    
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Tipo</th>
                    <th>Certificación</th>
                    <th>Precio aprox.</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($cascos) > 0): ?>
                    <?php foreach ($cascos as $casco): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($casco['id']); ?></td>
                            <td><?php echo htmlspecialchars($casco['marca']); ?></td>
                            <td><?php echo htmlspecialchars($casco['modelo']); ?></td>
                            <td><?php echo htmlspecialchars($casco['tipo']); ?></td>
                            <td><?php echo htmlspecialchars($casco['certificacion']); ?></td>
                            <td>$<?php echo number_format($casco['precio'], 2); ?></td>
                            <td>
                                <img src="<?php echo htmlspecialchars($casco['imagen_url']); ?>" 
                                     class="rounded" 
                                     alt="Imagen de Casco" 
                                     style="width: 60px; height: auto;">
                            </td>
                            <td>
                                <a href="ver.php?id=<?php echo $casco['id']; ?>" class="btn btn-sm btn-outline-secondary">Ver</a>
                                <a href="editar.php?id=<?php echo $casco['id']; ?>" class="btn btn-sm btn-outline-primary">Editar</a>
                                
                                <form method="POST" action="eliminar.php" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este casco?');">
                                    <input type="hidden" name="id" value="<?php echo $casco['id']; ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center">No hay cascos registrados. Por favor, agregue uno.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>