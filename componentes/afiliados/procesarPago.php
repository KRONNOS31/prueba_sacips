<?php
include "../../componentes/conexiones/conexionbd.php";

if ($_POST["dato"] == 'insertar_archivo') {

    $id_persona = $_POST['id_persona'];
    $pendienteStatus = 'Pendiente';
    $usuario = $_POST['usuario'];

    if($usuario == 1){
        $usuario = 'Afiliado';
    }elseif($usuario == 2){
        $usuario = 'Invitado';
    }

    $tipoAporte = $_POST['tipo_aporte'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $monto = $_POST['monto'];
    $telefono = $_POST['telefono'];
    $cedula = $_POST['cedula'];
    $referencia = $_POST['referencia'];
    $fechaActual = $_POST['fecha_actual'];
    $concepto = $_POST['concepto'];
    $banco = $_POST['banco'];

    if (!empty($_FILES['capture']['tmp_name'])) {
        $archivos = $_FILES['capture'];
        $numArchivos = count($archivos['tmp_name']);

        // Prepare SQL query with prepared statement
        $sql = "INSERT INTO aportes_afiliados (id_persona, usuario, tipo_aporte, fechaAporte, nombre, apellido, monto, banco, telefono, cedula, referencia, concepto, estado, capture) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);

        for ($i = 0; $i < $numArchivos; $i++) {
            $contenidoImagen = file_get_contents($archivos['tmp_name'][$i]);
            $imageBase64 = base64_encode($contenidoImagen);

            $stmt->bind_param("ssssssssssssss",$id_persona, $usuario, $tipoAporte, $fechaActual, $nombre, $apellido, $monto, $banco, $telefono, $cedula, $referencia, $concepto, $pendienteStatus, $imageBase64);

            if ($stmt->execute()) {
                // Prepare response data
                $responseData = [
                    "pendienteStatus" => $pendienteStatus,
                    "id_persona" => $id_persona,
                    "usuario" => $usuario,
                    "tipo_aporte" => $tipoAporte,
                    "fechaAporte" => $fechaActual,
                    "nombre" => $nombre,
                    "apellido" => $apellido,
                    "monto" => $monto,
                    "telefono" => $telefono,
                    "cedula" => $cedula,
                    "referencia" => $referencia,
                    "concepto" => $concepto,
                    "banco" => $banco,
                    // Add form data to JSON response
                    "formData" => $_POST
                ];

                // Encode the receipt data to JSON format
                $jsonData = json_encode($responseData);

                // Send the JSON data back to the main script via AJAX
                // (Remove direct echo)
                // echo "<script>window.opener.postMessage('$jsonData', '*');</script>";

                echo $jsonData;
            } else {
                $response = ["message" => "Error en la base de datos: " . $stmt->error];
                echo json_encode($response);
            }
        }
    } else {
        // Handle the case when there are no files uploaded
        $responseData = [
            "fechaAporte" => $fechaActual,
            "nombre" => $nombre,
            "apellido" => $apellido,
            "monto" => $monto,
            "telefono" => $telefono,
            "cedula" => $cedula,
            "referencia" => $referencia,
            "concepto" => $concepto,
            "banco" => $banco,
            // Add form data to JSON response
            "formData" => $_POST
        ];

        echo json_encode($responseData);
    }
}