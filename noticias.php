<?php
// Tu clave de API de OpenWeatherMap
$apiKey = '79e7b7dd3b95b89052ff53f1c97c351e';

// La URL para obtener la calidad del aire en una ubicación específica (Guanajuato)
$latitude = '21.0190';
$longitude = '-101.2574';
$url = "http://api.openweathermap.org/data/2.5/air_pollution?lat=$latitude&lon=$longitude&appid=$apiKey";

// Iniciar una solicitud cURL
$ch = curl_init();

// Configurar opciones de cURL
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Ejecutar la solicitud cURL y obtener la respuesta
$response = curl_exec($ch);

// Cerrar la solicitud cURL
curl_close($ch);

// Decodificar la respuesta JSON
$airQualityData = json_decode($response, true);

// Verifica el contenido de la respuesta
if (!$airQualityData || isset($airQualityData['cod']) && $airQualityData['cod'] != 200) {
    // Imprime el mensaje de error exacto para depuración
    echo "<p class='no-data'>No se pudieron obtener los datos de calidad del aire. Inténtalo de nuevo más tarde.</p>";
    echo "<pre>";
    print_r($airQualityData);
    echo "</pre>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calidad del Aire en Guanajuato</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #eef2f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            background-image: url('Imagen/ECONT.jpeg'); /* Ruta de tu imagen de fondo */
            background-repeat: repeat;
        }
        .container {
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
            color: #333;
        }
        .data-section {
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 10px;
            background-color: #f9fafc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }
        .data-section h2 {
            margin: 0 0 10px;
            color: #555;
        }
        .data-section p {
            margin: 5px 0;
            font-size: 1.1em;
            color: #444;
        }
        .data-section small {
            color: #888;
        }
        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Calidad del Aire en Guanajuato</h1>
        <?php
        // Mostrar los datos de calidad del aire
        $aqi = $airQualityData['list'][0]['main']['aqi'];
        $components = $airQualityData['list'][0]['components'];
        
        $aqiLevel = [
            1 => 'Bueno',
            2 => 'Moderado',
            3 => 'Poco saludable para grupos sensibles',
            4 => 'Poco saludable',
            5 => 'Muy poco saludable'
        ];

        echo "<div class='data-section'>";
        echo "<h2>Índice de Calidad del Aire (AQI): " . $aqi . " - " . $aqiLevel[$aqi] . "</h2>";
        echo "<p><strong>CO:</strong> " . htmlspecialchars($components['co']) . " µg/m³</p>";
        echo "<p><strong>NO:</strong> " . htmlspecialchars($components['no']) . " µg/m³</p>";
        echo "<p><strong>NO<sub>2</sub>:</strong> " . htmlspecialchars($components['no2']) . " µg/m³</p>";
        echo "<p><strong>O<sub>3</sub>:</strong> " . htmlspecialchars($components['o3']) . " µg/m³</p>";
        echo "<p><strong>SO<sub>2</sub>:</strong> " . htmlspecialchars($components['so2']) . " µg/m³</p>";
        echo "<p><strong>PM2.5:</strong> " . htmlspecialchars($components['pm2_5']) . " µg/m³</p>";
        echo "<p><strong>PM10:</strong> " . htmlspecialchars($components['pm10']) . " µg/m³</p>";
        echo "<p><strong>NH<sub>3</sub>:</strong> " . htmlspecialchars($components['nh3']) . " µg/m³</p>";
        echo "</div>";
        ?>
        <a href="javascript:history.back()" class="back-button">Regresar</a>
    </div>
</body>
</html>