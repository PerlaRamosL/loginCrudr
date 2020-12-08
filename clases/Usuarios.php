<?php 
      
      require_once	"Conexion.php";
      


    class Usuarios extends Conexion{

       public function agregarUsuario($nombre,$a_materno,$email,$usuario,$password){

         $conexion=Conexion::conectar();

         $password=sha1($password);

         $sql="INSERT INTO usuarios (nombre,a_materno,email,usuario,password)
               VALUES ('$nombre',
                       '$a_materno',
                       '$email',
                       '$usuario',
                       '$password')";

        $result=mysqli_query($conexion,$sql);

        return $result;



       }

       public function login($usuario,$password){

           $conexion=Conexion::conectar();
           $password=sha1($password);

           $sql="SELECT count(*) as total FROM usuarios 
                 WHERE usuario='$usuario' AND password='$password'";

           $result=mysqli_query($conexion,$sql);
           $datos=mysqli_fetch_array($result);

           if($datos['total']>0){

           	 $_SESSION['usuario']=$usuario;
             header("location:../vistas/gastos.php");
             
           } else{

           	 header("location:../index.php");

          }
       }
    }
 ?>