<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	 <link rel="stylesheet" href="estilos/estilos.css" type="text/css">
	<?php require_once "dependencias.php"; ?>
</head>
<body style="background-color:#F5F5FB">
<div class="container">
	<div class="row justify-content-center align-items-center vh-100">
         <div class="col-sm-4">	
         <br>	
		 	<form action="procesos/login.php" method="post" id="frmLogin">
		 		<h2>Login de usuarios</h2>
		 		<label for="usuario">Usuario</label>
		 		<input type="text" name="usuario" id="usuario" class="form-control">
		 		<label for="password">Password</label>
                <input type="password" name="password" class="form-control">
                <br>
                <button class="btn btn-primary">Entrar</button>
                <a href="registro.php" class="btn btn-success">Registrar</a>
		 	</form>
		 </div>
		 </div>
	</div>
</body>
</html>