<?php
$servername = "localhost";
$username = "root"; // usuario por defecto de XAMPP
$password = ""; // la contraseña por defecto es vacía en XAMPP
$dbname = "salida_almacen";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $nombre_despachador = $_POST['nombre_despachador'];
    $fecha = $_POST['fecha'];
    $id_producto = $_POST['id_producto'];
    $valor_producto = $_POST['valor_producto'];
    $punto_venta = $_POST['punto_venta'];
    $elemento = $_POST['elemento'];

    // Preparar y ejecutar la consulta SQL
    $sql = "INSERT INTO salidas_almacen (nombre_despachador, fecha, id_producto, valor_producto, punto_venta, elemento)
            VALUES ('$nombre_despachador', '$fecha', '$id_producto', '$valor_producto', '$punto_venta', '$elemento')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro de salida de almacén exitoso!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
