<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Nombre de usuario</label>
     	<input type="text" name="uname" placeholder="User Name:"><br>

     	<label>Contraseña</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Entrar</button>
          <a href="signup.php" class="ca">Crea una cuenta</a>
     </form>
</body>
</html>