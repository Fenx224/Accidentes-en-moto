<?php
// Credenciales de la Base de Datos
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root'); // Cambiar por tu usuario
define('DB_PASSWORD', ''); // Cambiar por tu contraseña
define('DB_NAME', 'accidentes_en_moto'); // Cambiar por el nombre de tu base de datos

// Conexión a MySQL
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
// Opcional: Establecer el juego de caracteres a utf8
$conn->set_charset("utf8");
?>