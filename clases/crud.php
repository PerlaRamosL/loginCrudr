<?php 

class crud{
  public function agregar($datos){
   $obj= new Conexion();
   $conexion=$obj->conectar();

   $sql="INSERT INTO gastos(conceptgas,cantidad,fecha)
   VALUES ('$datos[0]',
   '$datos[1]',
   '$datos[2]')";

   return mysqli_query($conexion,$sql);
 }

 public function obtenDatos($idgasto){
  $obj= new Conexion();
  $conexion= $obj->conectar();

   $sql="SELECT id_gasto,
   conceptgas,
   cantidad,
   fecha
   from gastos
   where id_gasto='$idgasto'";

   $result=mysqli_query($conexion,$sql);
   $ver=mysqli_fetch_row($result);

   $datos=array(
              'id_gasto' =>$ver[0] , 
              'conceptgas' =>$ver[1],
              'cantidad'=>$ver[2] ,
              'fecha'=>$ver[3] ,
                 );
   return $datos;
 }

 public function actualizar($datos){
   $obj= new Conexion();
   $conexion= $obj->conectar();

   $sql="UPDATE gastos set conceptgas='$datos[0]',
                           cantidad='$datos[1]',
                           fecha='$datos[2]' 
                           where id_gasto='$datos[3]'";

    return mysqli_query($conexion,$sql);

 }


 public function eliminar($idgasto){
               $obj=new Conexion();
               $conexion=$obj->conectar();

               $sql="DELETE from gastos where id_gasto='$idgasto'";

               return mysqli_query($conexion,$sql);
           } 

}
?>