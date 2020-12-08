<?php 

require_once "../clases/conexion.php";
$obj= new Conexion();
$conexion= $obj->conectar();
$sql="SELECT id_gasto,
conceptgas,
cantidad,
fecha
from gastos";

$result=mysqli_query($conexion,$sql);
?>

<div>
	<table class="table table-hover table-condensed table-bordered" id="idtable">
		<thead style="background-color: #1B1E75;color: white;font-weight: bold;">
			<tr>
				<td>Concepto de gasto</td>
				<td>Cantidad de gasto</td>
				<td>Fecha</td>
                <td>Editar</td>
                <td>Eliminar</td>
			</tr>
		</thead>
		<tfoot style="background-color: #ccc;color:white; font-weight: bold;">
			<tr>
				<td>Concepto de gasto</td>
				<td>Cantidad de gasto</td>
				<td>Fecha</td>
                <td>Editar</td>
                <td>Eliminar</td>
			</tr>	
		</tfoot>
		<tbody style="background-color: white">
			<?php 
			while($mostrar=mysqli_fetch_row($result)){    
				?>
				<tr>
					<td><?php echo $mostrar[1] ?></td>
					<td><?php echo $mostrar[2] ?></td>
					<td><?php echo $mostrar[3] ?></td>
					<td style="text-align: center;"> 
						<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#mdEditar" onclick="agregaFrmActualizar('<?php echo $mostrar[0] ?>')">
							<span class="far fa-edit"></span>
						</span>
					</td>
                    <td style="text-align: center;">
                    	<span class="btn btn-danger btn-sm" onclick="eliminarDatos('<?php echo $mostrar[0] ?>')">
                    		<span class="far fa-trash-alt"></span>
                    	</span>
                    </td>
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#idtable').DataTable();
	} );
</script>
