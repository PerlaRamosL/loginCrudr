<?php 
     
     class Conexion{
     public function conectar(){
       $conexion= mysqli_connect('localhost',
       	                         'root',
       	                         '',
       	                         'logincrud');

      return $conexion;

      }
    }
 ?>