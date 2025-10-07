<?php
// Variables PHP con información personal
$nombre = "Ruben";
$edad = 21;
$ciudad = "Granada";

// Obtener fecha y hora actual
$fecha_actual = date("d/m/Y");
$hora_actual = date("H:i:s");
$dia_semana = date("l");

// Pasar de ingles a español
$dias_espanol = [
    'Monday' => 'Lunes',
    'Tuesday' => 'Martes', 
    'Wednesday' => 'Miércoles',
    'Thursday' => 'Jueves',
    'Friday' => 'Viernes',
    'Saturday' => 'Sábado',
    'Sunday' => 'Domingo'
];
$dia_espanol = $dias_espanol[$dia_semana];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Primera Página PHP - <?php echo $nombre; ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
        }
        
        .container {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 500px;
            width: 90%;
            animation: fadeIn 0.8s ease-in;
        }
        h1 {
            color: #667eea;
            margin-bottom: 1rem;
            font-size: 2.2rem;
            font-weight: 300;
        }
        h3 {
            color: #555;
            margin-bottom: 1rem;
            font-weight: 500;
        }   

        .info-card {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 10px;
            margin: 1rem 0;
            border-left: 4px solid #667eea;
        }
        
        .info-item {
            margin: 0.8rem 0;
            font-size: 1.1rem;
        }
        
        .label {
            font-weight: bold;
            color: #555;
            display: inline-block;
            width: 120px;
            text-align: left;
        }
        
        .value {
            color: #555;
            font-weight: 600;
        }
        
        .datetime-card {
            background: #667eea;
            color: white;
            padding: 1.5rem;
            border-radius: 10px;
            margin: 1rem 0;
        }
        
        .datetime-card h3 {
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }
        
        .php-badge {
            background: #8892b0;
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            display: inline-block;
            margin-top: 1rem;
        }
        
        .footer {
            margin-top: 1.5rem;
            font-size: 0.9rem;
            color: #666;
            font-style: italic;
        }
        
        @media (max-width: 600px) {
            .container {
                padding: 1.5rem;
            }
            h1 {
                font-size: 1.8rem;
            }
            .label {
                width: 100px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>¡Hola! Soy <?php echo $nombre; ?></h1>
        
        <div class="info-card">
            <h3>Información Personal</h3>
            <div class="info-item">
                <span class="label">Nombre:</span>
                <span class="value"><?php echo $nombre; ?></span>
            </div>
            <div class="info-item">
                <span class="label">Edad:</span>
                <span class="value"><?php echo $edad; ?> años</span>
            </div>
            <div class="info-item">
                <span class="label">Ciudad:</span>
                <span class="value"><?php echo $ciudad; ?></span>
            </div>
        </div>
        
        <div class="datetime-card">
            <h3> Fecha y Hora Actual</h3>
            <div class="info-item">
                <span class="label">Fecha:</span>
                <span class="value"><?php echo $dia_espanol . ", " . $fecha_actual; ?></span>
            </div>
            <div class="info-item">
                <span class="label">Hora:</span>
                <span class="value"><?php echo $hora_actual; ?></span>
            </div>
        </div>
    </div>
</body>
</html>