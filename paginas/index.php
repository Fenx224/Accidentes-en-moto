
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
    <?php
        include 'C:\xampp\htdocs\Accidentes-en-moto\Back-end\PHP\ola.php'; 
        // Variable para guardar la salida de la consulta (la tabla HTML)
        // Detectar si el formulario fue enviado (si se hizo clic en el botón 'consultar_datos')
        if (isset($_POST['consultar_datos'])) {
            // Iniciar el buffer de salida: esto captura todo lo que Consultar() imprime (la tabla)
            ob_start();
            // Llamar a la función que ejecuta la consulta y MUESTRA la tabla
            Consultar($conexion); 
            // Capturar el contenido generado por Consultar() en la variable
        }
        // CERRAR LA CONEXIÓN: Este paso debe ser el ÚLTIMO después de usar $conexion.
        $conexion->close();
    ?>
</body>
</html>