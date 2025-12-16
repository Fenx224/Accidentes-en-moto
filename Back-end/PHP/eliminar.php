<?php
require_once 'C:\xampp\htdocs\Accidentes-en-moto\Back-end\PHP\db.php';

// 1. Solo procesar si la petición es POST (por seguridad)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 2. Capturar y sanear el ID
    $id = $_POST['id'] ?? null;

    if ($id) {
        // 3. Obtener la URL de la imagen (opcional, para eliminar el archivo)
        $sql_select = "SELECT imagen_url FROM cascos WHERE id = ?";
        if ($stmt_select = $conn->prepare($sql_select)) {
            $stmt_select->bind_param("i", $id);
            $stmt_select->execute();
            $resultado = $stmt_select->get_result();
            if ($row = $resultado->fetch_assoc()) {
                $imagen_a_eliminar = $row['imagen_url'];
            }
            $stmt_select->close();
        }

        // 4. Preparar y ejecutar la consulta DELETE
        $sql = "DELETE FROM cascos WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                // 5. (Opcional) Eliminar el archivo físico de la imagen
                if (isset($imagen_a_eliminar) && file_exists($imagen_a_eliminar)) {
                    unlink($imagen_a_eliminar);
                }
                
                // Éxito: Redirigir
                header("location: index.php?status=deleted");
                exit();
            } else {
                // Error al eliminar, puedes registrar el error si lo necesitas
            }
            $stmt->close();
        }
    }
}

// Redirigir siempre si el acceso fue incorrecto o después de la operación
$conn->close();
header("location: index.php");
exit();