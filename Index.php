<?php
// Define the email address to send the form data to
$to_email = "misionsucreurumaco@gmail.com";
$success_message = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $nombres = htmlspecialchars(trim($_POST['nombres']));
    $apellidos = htmlspecialchars(trim($_POST['apellidos']));
    $fecha_nacimiento = htmlspecialchars(trim($_POST['fecha-nacimiento']));
    $cedula = htmlspecialchars(trim($_POST['cedula']));
    $telefono = htmlspecialchars(trim($_POST['telefono']));
    $correo = htmlspecialchars(trim($_POST['correo']));
    $direccion = htmlspecialchars(trim($_POST['direccion']));
    $edad = htmlspecialchars(trim($_POST['edad']));
    $carrera = htmlspecialchars(trim($_POST['carrera']));
    $semestre = htmlspecialchars(trim($_POST['semestre']));
    $serial_carnet = htmlspecialchars(trim($_POST['serial-carnet']));
    $codigo_carnet = htmlspecialchars(trim($_POST['codigo-carnet']));
    $trabaja = htmlspecialchars(trim($_POST['trabaja']));

    // Build the email subject and body
    $subject = "Caracterización Estudiantes Universitarios";
    $email_body = "Detalles del Formulario:\n\n";
    $email_body .= "Nombres completos: " . $nombres . "\n";
    $email_body .= "Apellidos completos: " . $apellidos . "\n";
    $email_body .= "Fecha de nacimiento: " . $fecha_nacimiento . "\n";
    $email_body .= "Cédula: " . $cedula . "\n";
    $email_body .= "Teléfono: " . $telefono . "\n";
    $email_body .= "Correo: " . $correo . "\n";
    $email_body .= "Dirección de habitación: " . $direccion . "\n";
    $email_body .= "Edad: " . $edad . "\n";
    $email_body .= "Carrera que estás cursando: " . $carrera . "\n";
    $email_body .= "Semestre a cursar en septiembre 2025: " . $semestre . "\n";
    $email_body .= "Serial del carnet de la patria: " . $serial_carnet . "\n";
    $email_body .= "Código del carnet de la patria: " . $codigo_carnet . "\n";
    $email_body .= "Trabajas actualmente: " . $trabaja . "\n";

    // Set the headers
    $headers = "From: misionsucreurumaco@gmail.com" . "\r\n";
    $headers .= "Reply-To: " . $correo . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8" . "\r\n";

    // Send the email
    if (mail($to_email, $subject, $email_body, $headers)) {
        $success_message = "¡Formulario enviado con éxito! Gracias.";
    } else {
        $error_message = "¡Oops! Hubo un problema al enviar el formulario. Por favor, inténtelo de nuevo.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caracterización Estudiantes Universitarios</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        :root {
            --primary-color: #004d99;
            --secondary-color: #e6f2ff;
            --accent-color: #00cc66;
            --text-color: #333;
            --light-text-color: #666;
            --border-color: #ccc;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--secondary-color);
            margin: 0;
            padding: 20px;
            color: var(--text-color);
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 10px;
        }

        p {
            text-align: center;
            color: var(--light-text-color);
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--primary-color);
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="number"],
        input[type="date"],
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="tel"]:focus,
        input[type="number"]:focus,
        input[type="date"]:focus,
        select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 5px rgba(0, 77, 153, 0.2);
        }

        .radio-group {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .radio-group input[type="radio"] {
            margin-right: 5px;
        }

        button {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: var(--accent-color);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #00b359;
        }

        .success-message {
            text-align: center;
            color: var(--accent-color);
            font-weight: 600;
            margin-top: 20px;
        }

        .error-message {
            text-align: center;
            color: #e74c3c;
            font-weight: 600;
            margin-top: 20px;
        }

        .form-row {
            display: flex;
            gap: 20px;
        }

        .form-row .form-group {
            flex: 1;
        }

        @media (max-width: 600px) {
            .form-row {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Caracterización Estudiantes Universitarios</h1>
        <p>Por favor, completa el siguiente formulario para la caracterización de los estudiantes.</p>
        
        <?php if (!empty($success_message)): ?>
            <div class="success-message"><?php echo $success_message; ?></div>
        <?php elseif (!empty($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            
            <!-- Grupo de Nombres y Apellidos -->
            <div class="form-row">
                <div class="form-group">
                    <label for="nombres">Nombres completos</label>
                    <input type="text" id="nombres" name="nombres" required>
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos completos</label>
                    <input type="text" id="apellidos" name="apellidos" required>
                </div>
            </div>

            <!-- Grupo de Cédula y Teléfono -->
            <div class="form-row">
                <div class="form-group">
                    <label for="cedula">Cédula (sin puntos)</label>
                    <input type="text" id="cedula" name="cedula" pattern="[0-9]{5,10}" title="Por favor, ingrese un número de cédula válido (solo dígitos)." required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" id="telefono" name="telefono" required>
                </div>
            </div>

            <!-- Grupo de Correo y Edad -->
            <div class="form-row">
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="email" id="correo" name="correo" required>
                </div>
                <div class="form-group">
                    <label for="edad">Edad</label>
                    <input type="number" id="edad" name="edad" min="15" max="100" required>
                </div>
            </div>

            <!-- Dirección de habitación -->
            <div class="form-group">
                <label for="direccion">Dirección de habitación</label>
                <input type="text" id="direccion" name="direccion" required>
            </div>
            
            <!-- Fecha de nacimiento -->
            <div class="form-group">
                <label for="fecha-nacimiento">Fecha de nacimiento</label>
                <input type="date" id="fecha-nacimiento" name="fecha-nacimiento" required>
            </div>

            <!-- Carrera y Semestre -->
            <div class="form-row">
                <div class="form-group">
                    <label for="carrera">Carrera que estás cursando</label>
                    <input type="text" id="carrera" name="carrera" required>
                </div>
                <div class="form-group">
                    <label for="semestre">Semestre a cursar en septiembre 2025</label>
                    <input type="text" id="semestre" name="semestre" required>
                </div>
            </div>

            <!-- Carnet de la Patria -->
            <div class="form-row">
                <div class="form-group">
                    <label for="serial-carnet">Serial del carnet de la patria</label>
                    <input type="text" id="serial-carnet" name="serial-carnet" required>
                </div>
                <div class="form-group">
                    <label for="codigo-carnet">Código del carnet de la patria</label>
                    <input type="text" id="codigo-carnet" name="codigo-carnet" required>
                </div>
            </div>
            
            <!-- Trabajas actualmente -->
            <div class="form-group">
                <label>Trabajas actualmente</label>
                <div class="radio-group">
                    <label><input type="radio" name="trabaja" value="Si" required> Si</label>
                    <label><input type="radio" name="trabaja" value="No"> No</label>
                </div>
            </div>

            <button type="submit">Enviar Caracterización</button>

        </form>
    </div>
</body>
</html>
