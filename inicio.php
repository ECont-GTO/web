<!DOCTYPE html>
<html lang="es">
<head>
    <title>ECONT</title>
    <meta charset="UTF-8">

    <style>
        body {
            color: #008000; /* Texto verde */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('Imagen/ECONT.jpeg'); /* Ruta de tu imagen de fondo */
            background-repeat: repeat;
            padding-top: 60px; /* Espacio para el menú fijo */
        }

        h1, h2, h3, p, a, li {
            color: #008000; /* Texto verde */
        }

        nav {
            background-color: #008000; /* Fondo verde */
            padding: 10px 0;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center; /* Centra los elementos del menú */
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: #006400; /* Fondo verde oscuro al pasar el ratón */
        }

        .container {
            display: flex;
            justify-content: flex-end; /* Alinea el contenido a la derecha */
            margin: 20px;
        }

        .cerrar-sesion {
            display: inline-block;
            color: #fff;
            background-color: #008000; /* Fondo verde */
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .cerrar-sesion:hover {
            background-color: #006400; /* Fondo verde oscuro al pasar el ratón */
        }

        .apartados, .Secciones, .comments-section {
            margin: 20px auto 20px auto; /* Margen superior e inferior */
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #ffffff; /* Fondo blanco para secciones */
            max-width: 800px; /* Ancho máximo para centrado */
        }

        footer {
            margin-top: 30px;
            padding: 20px;
            border-top: 1px solid #ccc;
            background-color: #004d40;
            color: #fff;
            text-align: center;
        }
        footer p {
            font-size: 14px;
            margin: 0;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        img.small {
            width: 30%; /* Reduce el tamaño de la imagen al 30% del contenedor */
        }

        .menu-secundario {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px; /* Añadir margen superior */
        }

        .menu-secundario a {
            display: inline-block;
            padding: 10px 20px;
            background-color: green;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .menu-secundario a:hover {
            background-color: darkgreen;
        }

        .comment-box {
            background: #fff;
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .comment-box textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            resize: vertical;
        }

        .comment-box button {
            display: block;
            width: 100%;
            background: #008000;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        .comment-box button:hover {
            background: #006400;
        }

        .comment {
            padding: 15px;
            border-bottom: 1px solid #eee;
            display: flex;
            flex-direction: column;
        }

        .comment:last-child {
            border-bottom: none;
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .comment-header h3 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }

        .comment-body {
            font-size: 16px;
            color: #555;
        }

        .comment-time {
            font-size: 14px;
            color: #999;
        }

        .error-message {
            color: red;
            margin: 10px 0;
            font-size: 16px;
        }
        a {
            color: #006400;
            text-decoration: none;
            font-weight: bold;
            display: block;
            margin: 10px 0;
            transition: color 0.3s;
        }
        
        a:hover {
            color: #4CAF50;
        }
        
    </style>
</head>
<body>
    <div class="container"> 
        <a href="index.php" class="cerrar-sesion">Cerrar Sesión</a>
    </div>

    <nav>
        <ul>
            <li><a href="municipios.html">Municipios</a></li>
            <li><a href="acciones.html">Acciones de Prevención</a></li>
            <li><a href="sabias.html">¿Sabías que?</a></li>
            <li><a href="CEAgua.html">Cuidar el Agua</a></li>
            <li><a href="CEAire.html">Cuidar el Aire</a></li>
            <li><a href="CeSuelo.html">Cuidar el Suelo</a></li>
            <li><a href="otro.html">Otras</a></li>
        </ul>
    </nav>

    <div class="menu-secundario">
        <a href="home.php">Sección de comentarios</a>
        <a href="noticias.php">Calidad del aire en tiempo real</a>
        <a href="juegos.html">Juegos</a>
    </div>

    <div class="apartados">
        <h1>ECont</h1>
    </div>
    <div class="Secciones">
        <h2>Función de ECont</h2>
        <p>ECont es una página web que informa sobre la contaminación ambiental en el estado de Guanajuato y sirve para educar a las personas sobre los diversos tipos de contaminación,
        
        sus efectos en el medio ambiente y la salud humana, y las medidas que se pueden tomar para reducir y prevenir la contaminación.
         <br>
        También puede proporcionar datos en tiempo real sobre la calidad del aire, del agua, entre otros problemas ambientales, para ayudar a las 
        personas a tomar decisiones informadas sobre combatir la contaminación en su vida cotidiana.</p>
    </div>

    <div class="Secciones">
        <h2>¿Qué es la contaminación?</h2>
        <p>La contaminación se refiere a la introducción de sustancias o agentes externos al ambiente natural que causan efectos adversos en la 
            salud humana, la vida silvestre o el ecosistema en general. Puede manifestarse en diversas formas, como la contaminación del aire, 
            el agua, el suelo o el ruido. 
        </p>
        <a href="https://www.youtube.com/watch?v=6auQt24b1zo">Mira este video de "EcologíaVerde" que nos dice como cuidar al medio ambiente.</a>
    </div>

    <div class="Secciones comments-section">
        <h2>Dejanos un comentario:</h2>
        <div class="comment-box">
            <form method="post" action="home.php">
                <textarea name="comment" rows="4" placeholder="Escribe tu comentario aquí..."></textarea><br>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>
</body>
<footer>
        <p>Esta página fue creada por alumnos del Centro de Bachillerato Tecnológico Industrial y de Servicios No. 171 con el fin de titularse como técnicos en programación.</p>
    </footer>
</html>