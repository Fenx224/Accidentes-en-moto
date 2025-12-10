<?php
// Datos de conexión
$host = "localhost";
$userDB = "root";
$passDB = "";
$database = "accidentes_en_moto";

// Conectar
$conexion = new mysqli($host, $userDB, $passDB, $database);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Si enviaron el formulario
if (isset($_POST["user"], $_POST["password"])) {

    $user = trim($_POST["user"]);
    $password = trim($_POST["password"]);

    // Buscar usuario
    $stmt = $conexion->prepare("SELECT userPassword FROM users WHERE userName = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado && $resultado->num_rows === 1) {

        $fila = $resultado->fetch_assoc();

        // Como tu BD tiene contraseñas en texto plano
        if ($password === $fila["userPassword"]) {
            // Si coincide, redirige
            header("Location: Tabla.php");
            exit;
        } else {
            echo "❌ Contraseña incorrecta";
        }

    } else {
        echo "❌ Usuario no encontrado";
    }

    $stmt->close();
}
?>
