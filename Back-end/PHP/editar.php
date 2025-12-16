<?php
// Incluir el archivo de conexión a la base de datos
require_once 'C:\xampp\htdocs\Accidentes-en-moto\Back-end\PHP\db.php';

$id = null; // Variable para almacenar el ID del casco
$casco = []; // Array para almacenar los datos del casco

// --- LÓGICA DE MANEJO DE ENVÍO (POST) ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Recoger los datos del formulario (Sanitizar o validar si fuera necesario)
    $id = $_POST['id'] ?? null;
    $marca = $_POST['marca'] ?? '';
    $modelo = $_POST['modelo'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    $certificacion = $_POST['certificacion'] ?? '';
    $precio = $_POST['precio'] ?? 0.00;
    $imagen_url_actual = $_POST['imagen_url_actual'] ?? '';
    
    if (!$id) {
        die("Error: ID del casco no proporcionado para la edición.");
    }

    // 2. Lógica para manejar la imagen (si se sube una nueva)
    $nueva_imagen_url = $imagen_url_actual; 
    
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        
        $target_dir = "uploads/";
        // Usar un nombre de archivo seguro o único, pero para simplicidad usamos el original
        $target_file = $target_dir . basename($_FILES["imagen"]["name"]);

        // Intentar mover el archivo subido
        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
            $nueva_imagen_url = $target_file; // Actualizar con la nueva ruta relativa
            // Nota: Se recomienda eliminar la imagen anterior para evitar archivos basura
        } else {
            echo "Error al subir el archivo de imagen.";
            // Continuar con la URL actual si la subida falla, o detener la ejecución si es crítica
        }
    }

    // 3. Sentencia SQL UPDATE
    $sql = "UPDATE cascos SET 
                marca = ?, 
                modelo = ?, 
                tipo = ?, 
                certificacion = ?, 
                precio = ?, 
                imagen_url = ? 
            WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        // Enlazar los parámetros: sssssdi (5 strings, 1 decimal/double, 1 integer)
        $stmt->bind_param("ssssdsi", $marca, $modelo, $tipo, $certificacion, $precio, $nueva_imagen_url, $id);

        if ($stmt->execute()) {
            // Éxito: Redirigir a la página principal
            header("location: index.php");
            exit();
        } else {
            echo "<div class='alert alert-danger'>Error al actualizar: " . $stmt->error . "</div>";
        }
        $stmt->close();
    } else {
        echo "<div class='alert alert-danger'>Error de preparación de la consulta: " . $conn->error . "</div>";
    }

} 

// --- LÓGICA DE CARGA DE DATOS (GET) ---
// Se ejecuta si no se ha enviado el formulario (al cargar la página por primera vez)
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    $id = trim($_GET["id"]);
    
    // Preparar la consulta SELECT para obtener los datos del casco
    $sql = "SELECT id, marca, modelo, tipo, certificacion, precio, imagen_url FROM cascos WHERE id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            
            if ($result->num_rows == 1) {
                // Obtener el registro como un array asociativo
                $casco = $result->fetch_assoc();
            } else {
                // No existe el registro
                echo "<div class='alert alert-warning'>Casco no encontrado.</div>";
                exit();
            }
        } else {
            echo "<div class='alert alert-danger'>Oops! Algo salió mal.</div>";
        }
        $stmt->close();
    }
} else if (!isset($_POST["id"])) { 
    // Si no hay ID en GET y no es POST, redirigir
    header("location: index.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Casco</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
            padding-top: 50px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Editar Casco: <?php echo htmlspecialchars($casco['marca'] ?? 'N/A') . ' ' . htmlspecialchars($casco['modelo'] ?? 'N/A'); ?></h2>
                    <p>Por favor, edite los valores del formulario y presione "Guardar Cambios".</p>
                    
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                        
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id ?? ''); ?>">
                        
                        <input type="hidden" name="imagen_url_actual" value="<?php echo htmlspecialchars($casco['imagen_url'] ?? ''); ?>">

                        <div class="form-group">
                            <label>Marca</label>
                            <input type="text" name="marca" class="form-control" value="<?php echo htmlspecialchars($casco['marca'] ?? ''); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Modelo</label>
                            <input type="text" name="modelo" class="form-control" value="<?php echo htmlspecialchars($casco['modelo'] ?? ''); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Tipo</label>
                            <input type="text" name="tipo" class="form-control" value="<?php echo htmlspecialchars($casco['tipo'] ?? ''); ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Certificación</label>
                            <input type="text" name="certificacion" class="form-control" value="<?php echo htmlspecialchars($casco['certificacion'] ?? ''); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Precio</label>
                            <input type="number" step="0.01" name="precio" class="form-control" value="<?php echo htmlspecialchars($casco['precio'] ?? ''); ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Imagen Actual</label><br>
                            <?php if (!empty($casco['imagen_url'])): ?>
                                <img src="<?php echo htmlspecialchars($casco['imagen_url']); ?>" alt="Imagen Actual del Casco" style="max-width: 150px; height: auto;">
                            <?php else: ?>
                                <p>No hay imagen actual.</p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group">
                            <label>Cambiar Imagen (opcional)</label>
                            <input type="file" name="imagen" class="form-control-file">
                        </div>

                        <input type="submit" class="btn btn-primary" value="Guardar Cambios">
                        <a href="C:\xampp\htdocs\Accidentes-en-moto\Back-end\PHP\index.php" class="btn btn-secondary ml-2">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>