<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <style>
        body {
          background-image: url('Imagen/ECONT.jpeg'); /* Ruta de tu imagen de fondo */
          background-repeat: repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            text-align: center;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #1690A7;
            margin-bottom: 30px;
        }

        a {
            display: inline-block;
            background-color: #555555;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #333333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hola, <?php echo htmlspecialchars($_SESSION['user_name']); ?></h1>
        <a href="inicio.php">Continuar</a>
    </div>
</body>
</html>

<?php 
} else {
    header("Location: index.html");
    exit();
}
?>