<?php
// Asegúrate de que la solicitud sea por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recolectar los datos del formulario de forma segura
    $nombres = htmlspecialchars($_POST['nombres']);
    $apellidos = htmlspecialchars($_POST['apellidos']);
    $cedula = htmlspecialchars($_POST['cedula']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $dia = htmlspecialchars($_POST['dia']);
    $mes = htmlspecialchars($_POST['mes']);
    $ano = htmlspecialchars($_POST['ano']);
    $edad = htmlspecialchars($_POST['edad']); // Se obtiene del campo oculto
    $correo_remitente = htmlspecialchars($_POST['correo']);
    $direccion = htmlspecialchars($_POST['direccion']);
    $carrera = htmlspecialchars($_POST['carrera']);
    $semestre = htmlspecialchars($_POST['semestre']);
    $serial_carnet = htmlspecialchars($_POST['serialCarnet']);
    $codigo_carnet = htmlspecialchars($_POST['codigoCarnet']);

    // Dirección de correo a la que se enviará el formulario
    $destinatario = "misionsucreurumaco@gmail.com"; // **IMPORTANTE: CAMBIA ESTO POR TU CORREO**
    $asunto = "Nuevo formulario de estudiante: $nombres $apellidos";

    // Contenido del correo en formato HTML
    $cuerpo_correo = "
    <html>
    <body>
        <h2>Formulario de Caracterización de Estudiantes</h2>
        <p><strong>Nombres:</strong> $nombres</p>
        <p><strong>Apellidos:</strong> $apellidos</p>
        <p><strong>Cédula:</strong> $cedula</p>
        <p><strong>Teléfono:</strong> $telefono</p>
        <p><strong>Fecha de nacimiento:</strong> $dia/$mes/$ano</p>
        <p><strong>Edad:</strong> $edad</p>
        <p><strong>Correo:</strong> $correo_remitente</p>
        <p><strong>Dirección:</strong> $direccion</p>
        <p><strong>Carrera:</strong> $carrera</p>
        <p><strong>Semestre:</strong> $semestre</p>
        <p><strong>Serial Carnet de la Patria:</strong> $serial_carnet</p>
        <p><strong>Código Carnet de la Patria:</strong> $codigo_carnet</p>
    </body>
    </html>
    ";

    // Encabezados para el correo
    $encabezados = "MIME-Version: 1.0" . "\r\n";
    $encabezados .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $encabezados .= 'From: <webmaster@tudominio.com>' . "\r\n"; // Reemplaza con un correo válido de tu dominio

    // Enviar el correo usando la función mail() de PHP
    if (mail($destinatario, $asunto, $cuerpo_correo, $encabezados)) {
        echo "¡Gracias! El formulario ha sido enviado correctamente.";
    } else {
        echo "Lo sentimos, hubo un error al enviar el formulario. Por favor, inténtalo de nuevo más tarde.";
    }

} else {
    // Si alguien intenta acceder directamente a este script sin enviar el formulario,
    // se le redirige a la página principal.
    header("Location: /"); 
    exit;
}
?>
