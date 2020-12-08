<?php 

    require_once "../clases/Conexion.php";
    require_once "../clases/crud.php";

    $obj=new crud();

    $datos=array(
    $_POST['conceptgasU'],
    $_POST['cantidadU'],
    $_POST['fechaU'],
    $_POST['idgasto']
                 );

    echo $obj->actualizar($datos);



 ?>