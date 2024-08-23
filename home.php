<?php 
session_start();
include "db_conn.php";

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_name'])) {
    header("Location: index.php");
    exit();
}

// Manejar el envío del comentario
if (isset($_POST['comment'])) {
    $comment = htmlspecialchars(trim($_POST['comment']));
    if (!empty($comment)) {
        $user_id = $_SESSION['id'];
        $sql = "INSERT INTO comments (user_id, comment) VALUES ('$user_id', '$comment')";
        mysqli_query($conn, $sql);
        header("Location: home.php");
        exit();
    } else {
        echo "<p class='error-message'>El comentario no puede estar vacío.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inicio</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #333;
            color: #fff;
            padding: 20px 0;
            border-bottom: 3px solid #77a6f7;
            text-align: center;
        }
        header h1 {
            margin: 0;
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
            background: #333;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }
        .comment-box button:hover {
            background: #555;
        }
        .comments-section {
            background: #fff;
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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
        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            text-align: center;
            font-size: 16px;
        }
        .back-button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['name']); ?></h1>
        </div>
    </header>
    <div class="container">
        <!-- Caja de comentarios -->
        <div class="comment-box">
            <form method="post" action="home.php">
                <textarea name="comment" rows="4" placeholder="Escribe tu comentario aquí..."></textarea><br>
                <button type="submit">Enviar</button>
            </form>
        </div>

        <a href="inicio.php" class="back-button">Regresar</a> 
        
        <h2>Comentarios:</h2>
        <div class="comments-section">
        <?php
        // Mostrar comentarios
        $sql = "SELECT comments.comment, users.user_name FROM comments 
                JOIN users ON comments.user_id = users.id ORDER BY comments.id DESC";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='comment'>";
            echo "<div class='comment-header'>";
            echo "<h3>" . htmlspecialchars($row['user_name']) . "</h3>";
            echo "</div>";
            echo "<div class='comment-body'>";
            echo "<p>" . htmlspecialchars($row['comment']) . "</p>";
            echo "</div>";
            echo "</div>";
        }
        ?>
        </div>
    </div>
</body>
</html>