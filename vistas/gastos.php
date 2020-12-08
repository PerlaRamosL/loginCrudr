<?php 
session_start();
if(isset($_SESSION['usuario'])){
	require_once "dependencias.php";
	require_once "menu.php";

	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Gastos</title>
    <link rel="stylesheet" href="../estilos/estilos.css" type="text/css">
  </head>
  <body>
    <div class="container">
     <div class="row">
      <div class="col-sm-12">
       <br>
       <div class="card text-left">
        <div class="card-header" style="background-color: #ccc;text-align: center; font-family: 'Montserrat', sans-serif;font-size:22pt;">
         Gastos
       </div>
       <div class="card-body">
         <span class="btn btn-primary" data-toggle="modal" data-target="#nuevo">Agregar nuevo
           <span class="fas fa-plus-circle"></span>
         </span>
         <hr>
         <div id="tablaDatatable"></div>
       </div>
       <div class="card-footer text-muted">
       </div>
     </div>
   </div>
 </div>
</div>

<!-- Modal -->
<div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agrega nuevos gastos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmnuevo">
        	<label>Concepto de gasto</label>
          <input type="text" class="form-control input-sx" id="conceptgas" name="conceptgas">
          <label>Cantidad de gasto</label>
          <input type="int" class="form-control input-sx" id="cantidad" name="cantidad">
          <label>Fecha</label>
          <input type="date" class="form-control input-sx" id="fecha" name="fecha">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="btnAgregarnuevo" class="btn btn-primary" >Agregar nuevo</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="mdEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar gastos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmnuevoU">
          <input type="text" hidden="" id="idgasto" name="idgasto">
          <label>Concepto de gasto</label>
          <input type="text" class="form-control input-sx" id="conceptgasU" name="conceptgasU">
          <label>Cantidad de gasto</label>
          <input type="int" class="form-control input-sx" id="cantidadU" name="cantidadU">
          <label>Fecha</label>
          <input type="date" class="form-control input-sx" id="fechaU" name="fechaU">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-warning" id="btnActualizar">Actualizar</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>

<script type="text/javascript">
 $(document).ready(function(){
   $('#btnAgregarnuevo').click(function(){
     datos=$('#frmnuevo').serialize();

     $.ajax({
      type:"POST",
      data:datos,
      url:"../procesos/agregar.php",
      success:function(r){
        if(r==1){
          $('#frmnuevo')[0].reset();
          $('#tablaDatatable').load('tabla.php');
          alertify.success("Agregado con exito XD");
        }
        else {
          alertify.error("Fallo al agregar X(");
        }
      } 
    });
   });
   
   $('#btnActualizar').click(function(){
    datos=$('#frmnuevoU').serialize();

    $.ajax({
      type:"POST",
      data:datos,
      url:"../procesos/actualizar.php",
      success:function(r){
        if(r==1){
          $('#tablaDatatable').load('tabla.php');
          alertify.success("Actualizado con exito XD");
        }
        else {
          alertify.error("Fallo al actualizar X(");
        }
      } 
    });
  });   
 });
 
</script>

<script type="text/javascript">
  $(document).ready(function(){
   $('#tablaDatatable').load('tabla.php');
 });
</script>

<script type="text/javascript">
  function agregaFrmActualizar(idgasto){
   $.ajax({
    type:"POST",
    data:"idgasto="+ idgasto,
    url:"../procesos/obtenDatos.php",
    success:function(r){
      datos=jQuery.parseJSON(r);
      $('#idgasto').val(datos['id_gasto']);
      $('#conceptgasU').val(datos['conceptgas']);
      $('#cantidadU').val(datos['cantidad']);
      $('#fechaU').val(datos['fecha']);
    }
  });
 }

 function eliminarDatos(idgasto){
   alertify.confirm('Eliminar gasto', '¿ Seguro de eliminar este gasto ?', function()
   {   
    $.ajax({
      type:"POST",
      data:"idgasto="+ idgasto,
      url:"../procesos/eliminar.php",
      success:function(r){
        if (r==1) {
         $('#tablaDatatable').load('tabla.php');
         alertify.success('Eliminado con exito !');
       }else{
        alertify.error('No se pudo eliminar');
      }
      
    }
  });

  }
  , function(){
    
  });

 }

</script>
<?php 
} 
else{
	header("location:../index.php");
}
?>
