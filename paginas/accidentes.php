<?php
    // Incluye el archivo de conexión
    include 'conexion_db.php'; 

    // 1. Validar que se recibió un ID por la URL (GET)
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        // Redirige si el ID es inválido o no existe
        header("Location: ../../paginas/lista_accidentes.php?error=id_invalido");
        exit();
    }

    $id_accidente = $_GET['id'];

    // 2. Consulta DELETE con sentencias preparadas
    // ¡ADVERTENCIA! Nunca olvides la cláusula WHERE.
    $sql_delete = "DELETE FROM accidente WHERE id_accidente = ?";
        
    $stmt = $conexion->prepare($sql_delete);
        
    // 'i' es para integer, ya que es el tipo del ID
    $stmt->bind_param("i", $id_accidente); 
        
    // 3. Ejecutar la consulta
    if ($stmt->execute()) {
        // Éxito: Redirigir al usuario a la página de listado con mensaje de éxito
        header("Location: ../../paginas/lista_accidentes.php?status=borrado_exito");
        exit();
    } else {
        // Error: Mostrar mensaje de error
        echo "<h1>Error al eliminar el registro.</h1>";
        echo "<p>Detalles del error: " . $stmt->error . "</p>";
        echo "<p><a href='../../paginas/lista_accidentes.php'>Volver al listado</a></p>";
    }

    $stmt->close();
    $conexion->close();

?>