<!DOCTYPE html>
<html>
<head>
	<title>Registro de usuario</title>
	<link rel="stylesheet" href="estilos/estilos.css" type="text/css">
    <?php require_once "dependencias.php" ?>
</head>
<body style="background-color:#F5F5FB">
<div class="container">
	<div class="row justify-content-center align-items-center vh-100">
		<div class="col-sm-4">
			<form action="procesos/registro.php" method="post">
				<h2>Registro</h2>
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" required="">
				<label for="a_materno">Apellido materno</label>
				<input type="text" name="a_materno" class="form-control" required="">
				<label for="email">Email</label>
				<input type="email" name="email" class="form-control" required="">
				<label for="usuario">Usuario</label>
				<input type="text" name="usuario" class="form-control" required="">
                <label for="password">Password</label>
				<input type="text" name="password" class="form-control" required="">
				<br>
				<button class="btn btn-danger">Registrar</button>
				<a href="index.php" class="btn btn-primary">Login</a>
			</form>
		</div>
	</div>
</div>
</body>
</html>