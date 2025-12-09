<?php
include 'db.php'; 

// Variable para guardar la salida de la consulta (la tabla HTML)
$output_consulta = ''; 

// Detectar si el formulario fue enviado (si se hizo clic en el botón 'consultar_datos')
if (isset($_POST['consultar_datos'])) {
    // Iniciar el buffer de salida: esto captura todo lo que Consultar() imprime (la tabla)
    ob_start();
    // Llamar a la función que ejecuta la consulta y MUESTRA la tabla
    Consultar($conexion); 
    // Capturar el contenido generado por Consultar() en la variable
    $output_consulta = ob_get_clean(); 
}

// CERRAR LA CONEXIÓN: Este paso debe ser el ÚLTIMO después de usar $conexion.
$conexion->close();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motocicletas - Consulta PHP</title>
</head>
<body>

    <h1>Consulta de Datos de Cascos</h1>

    <form method="POST" action="">
        <input type="submit" name="consultar_datos" value="Ejecutar Consulta">
    </form>
    
    <hr>
    
    <div id="resultados">
        <?php echo $output_consulta; ?>
    </div>

</body>
</html>