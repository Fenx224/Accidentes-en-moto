<?php
require_once 'C:\xampp\htdocs\Accidentes-en-moto\Back-end\PHP\db.php';

$mensaje = ''; // Variable para mensajes de éxito o error

// 1. Lógica para procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1.1. Capturar y sanear los datos
    $marca = $conn->real_escape_string($_POST['marca'] ?? '');
    $modelo = $conn->real_escape_string($_POST['modelo'] ?? '');
    $tipo = $conn->real_escape_string($_POST['tipo'] ?? '');
    $certificacion = $conn->real_escape_string($_POST['certificacion'] ?? '');
    $precio = (float)($_POST['precio'] ?? 0);
    $imagen_url = 'https://via.placeholder.com/60'; // Valor por defecto si no hay subida de imagen real

    // (Opcional) Lógica básica para manejar la subida de una imagen real
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
        
        // Crear el directorio si no existe
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
            $imagen_url = $target_file; // Guardar la ruta relativa de la imagen
        } else {
            $mensaje = "<div class='alert alert-warning'>Error al subir la imagen.</div>";
        }
    }

    // 1.2. Preparar la consulta INSERT
    $sql = "INSERT INTO cascos (marca, modelo, tipo, certificacion, precio, imagen_url) VALUES (?, ?, ?, ?, ?, ?)";
    
    // 1.3. Usar sentencia preparada (por seguridad)
    if ($stmt = $conn->prepare($sql)) {
        // Enlazar parámetros: 's' para string, 'd' para double/float
        $stmt->bind_param("ssssds", $marca, $modelo, $tipo, $certificacion, $precio, $imagen_url);
        
        // 1.4. Ejecutar la sentencia
        if ($stmt->execute()) {
            // Éxito: Redirigir al usuario a la tabla principal
            header("location: index.php?status=created");
            exit();
        } else {
            $mensaje = "<div class='alert alert-danger'>Error al guardar el registro: " . $stmt->error . "</div>";
        }
        $stmt->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Casco</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>➕ Crear Nuevo Casco</h2>
    <hr>
    <?php echo $mensaje; ?>
    
    <form action="crear.php" method="POST" enctype="multipart/form-data">
        
        <div class="form-group">
            <label>Marca</label>
            <input type="text" name="marca" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label>Modelo</label>
            <input type="text" name="modelo" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label>Tipo</label>
            <input type="text" name="tipo" class="form-control">
        </div>

        <div class="form-group">
            <label>Certificación</label>
            <input type="text" name="certificacion" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Precio Aprox.</label>
            <input type="number" step="0.01" name="precio" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label>Imagen</label>
            <input type="file" name="imagen" class="form-control-file">
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar Casco</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>