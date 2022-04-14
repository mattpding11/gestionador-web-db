<?php

//phpinfo();

#Establecer conexion con base de datos
require('config/conn.php');

#Crear conexion de la base de datos
$sql = "select * from periodos";


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <title>Periodos</title>
</head>
<body>
<p><span>Seleccione el código de periodo para ver el detalle.</span><p>
<table id="periodo_table">
    <thead>
    <tr>
        <th>Periodo </th>
        <th>Año de periodo</th>
        <th>Número de periodo</th>
    </tr>
    </thead>
    <tbody>
    <?php
    #validar si la consulta se valida
    if ($response = mysqli_query($conn, $sql)) {
        while ($row = mysqli_fetch_assoc($response)) {
            echo "
                        <tr>
                        <td id='codigoPeriodo'>" . $row["codigoPeriodo"] . "</td>
                        <td id='periodoYear'>" . $row["periodoYear"] . "</td>
                        <td id='periodoNum'>" . $row["periodoNum"] . "</td>
                        </tr>
                        ";
        }
    } else {
        echo "Error : no es posible realizar la consulta";
    }

    #liberar resultado de la consulta
    mysqli_free_result($response);
    #cerrar la conexion de la base de datos
    mysqli_close($conn);

    ?>
    </tbody>
</table>
<p>
    <button onclick="window.location.href='index.php'">Regresar</button>
</p>
</body>

</html>