<?php 
   
   require_once "../clases/Usuarios.php";
   $Usuarios=new Usuarios();
   
   $nombre=$_POST['nombre'];
   $a_materno=$_POST['a_materno'];
   $email=$_POST['email'];
   $usuario=$_POST['usuario'];
   $password=$_POST['password'];

   $respuesta=$Usuarios->agregarUsuario($nombre,$a_materno,$email,$usuario,$password);

   if($respuesta){
   
   ?>

     <script>
     	alert("Registro exitoso!");
     	window.location.href='../registro.php';
     </script>


   <?php 

     } else{ 

     ?>

     	<script>
     		alert("Fallo el registro");
     		window.location.href='../registro.php';
     	</script>

    <?php 
 
   }
 ?>