<?php
// Configura datos de conexión
$host = "localhost";
$usuario = "root";
$clave = "";
$base = "accidentes_en_moto";

// Crear conexión
$conexion = new mysqli($host, $usuario, $clave, $base);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// DEFINICIÓN de la función (debe aceptar la conexión como argumento)
function Consultar($db_connection) {
    $sql = "SELECT * FROM CASCOS";
    $resultado = $db_connection->query($sql);
    if($resultado->num_rows > 0) {
        echo "<table border='1'>";
        // Alinear los encabezados con los campos de la tabla CASCOS
        echo "<tr><th>ID</th><th>Marca</th><th>Modelo</th><th>Tipo</th><th>Certificaciones</th><th>Precio Aprox</th><th>Imagen</th><th>Descripción</th><th>Fecha Registro</th></tr>";
        while($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($fila["cascoID"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["marca"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["modelo"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["tipo"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["certificaciones"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["precio_aprox"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["imagen"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["descripcion"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["fecha_registro"]) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } 
    else {
        echo "No se encontraron resultados.";
    }
}
// 3. Llamada a la función
Consultar($conexion);

// 4. Cerrar conexión (se hace después de la llamada a la función)
//$conexion->close();
?>