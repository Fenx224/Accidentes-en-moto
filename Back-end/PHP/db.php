<?php
$host = "localhost";
$usuario = "root";
$clave = "";
$base = "accidentes_en_moto";

$conexion = new mysqli($host, $usuario, $clave, $base);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}