<?php
require_once 'C:\xampp\htdocs\Accidentes-en-moto\Back-end\PHP\db.php';

$casco = null;
$id = $_GET['id'] ?? null; // Obtener el ID del URL

if ($id) {
    // 1. Consulta para seleccionar un solo registro por ID
    $sql = "SELECT * FROM cascos WHERE id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        // 2. Enlazar el parámetro ID
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            $resultado = $stmt->get_result();
            
            if ($resultado->num_rows == 1) {
                // 3. Obtener el registro
                $casco = $resultado->fetch_assoc();
            }
        }
        $stmt->close();
    }
}

$conn->close();

// Si el casco no fue encontrado, redirigir a la lista principal
if (!$casco) {
    header("location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Casco</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Detalle del Casco: <?php echo htmlspecialchars($casco['modelo']); ?></h2>
    <hr>
    
    <div class="row">
        <div class="col-md-4">
            <h4>Imagen</h4>
            <img src="<?php echo htmlspecialchars($casco['imagen_url']); ?>" class="img-fluid rounded" alt="Imagen del Casco">
        </div>
        <div class="col-md-8">
            <dl class="row">
                <dt class="col-sm-3">ID:</dt>
                <dd class="col-sm-9"><?php echo htmlspecialchars($casco['id']); ?></dd>
                
                <dt class="col-sm-3">Marca:</dt>
                <dd class="col-sm-9"><?php echo htmlspecialchars($casco['marca']); ?></dd>
                
                <dt class="col-sm-3">Modelo:</dt>
                <dd class="col-sm-9"><?php echo htmlspecialchars($casco['modelo']); ?></dd>
                
                <dt class="col-sm-3">Tipo:</dt>
                <dd class="col-sm-9"><?php echo htmlspecialchars($casco['tipo']); ?></dd>
                
                <dt class="col-sm-3">Certificación:</dt>
                <dd class="col-sm-9"><?php echo htmlspecialchars($casco['certificacion']); ?></dd>
                
                <dt class="col-sm-3">Precio Aprox.:</dt>
                <dd class="col-sm-9">$<?php echo number_format($casco['precio'], 2); ?></dd>
            </dl>
        </div>
    </div>

    <p class="mt-4">
        <a href="index.php" class="btn btn-primary">Volver al Inventario</a>
        <a href="editar.php?id=<?php echo htmlspecialchars($casco['id']); ?>" class="btn btn-warning">Editar</a>
    </p>
</div>
</body>
</html>