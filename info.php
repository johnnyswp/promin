<?php
$mysqli = new mysqli("localhost", "promin10_2017", "promin2017");

/* verificar conexión */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

/* mostrar versión del servidor */
printf("Server version: %s\n", $mysqli->server_info);

/* cerrar conexión */
$mysqli->close();
?>