<?php

	include(__DIR__.'/conexion.php');

	$action = $_REQUEST['action'];
	
	if($action=="showAll"){
		
		$stmt = "SELECT * FROM alumnos ORDER BY matricula";
		$stmt_general=$mysqli->query($stmt);
		
		$count=($stmt_general->num_rows);
	}else{
		$stmt = "SELECT * FROM alumnos WHERE escuela='".$action."' ORDER BY matricula";
		$stmt_general=$mysqli->query($stmt);
		$count=($stmt_general->num_rows);
	}
	
	?>

<link rel="stylesheet" type="text/css" href="css/animate.css">

<style>
	.block_clientes{
		 padding:30px 22px;
		 text-align:center;
		 min-height:250px;
	}	
	.block_images_clientes{
		width:90%;
		margin:0 auto;}
</style>
	
		<table class="table table-striped table-bordered" style="width:100%">
		 <thead>
            <tr>
            	<th>Matricula</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Escuela</th>
                <th>Grado</th>
                <th>Grupo</th>
                <th>Estatus</th>
            </tr>
        </thead>
         <p></p>
	<?php
	if($count > 0){
		while($row=$stmt_general->fetch_assoc())
		{
			?>
			
						<tbody>
                    
                    
            		<tr>
            		<td style="width:50px"><b><?php echo strtoupper($row['matricula']); ?></b></td>
					<td style="width:50px"><?php echo strtoupper($row['nombreA']); ?></td>
					<td style="width:50px"><?php echo strtoupper($row['apellidoP']) . ' ' . strtoupper($row['apellidoM']); ?></td>
					<td style="width:50px"><?php echo strtoupper($row['escuela']); ?></td>
					<td style="width:50px"><?php echo strtoupper($row['grado']); ?></td>
					<td style="width:50px"><?php echo strtoupper($row['grupo']); ?></td>
					<td style="width:50px"><?php if($row['isActivo'] == 1) { echo 'Activo';} else { echo 'Inactivo'; } ?></td>
					</tr>
				
			<?php		
		}
		
		?>

</tbody>
               </table>
		<?php
	}else{
		
		?>
      		 <div class="grid_3 post wow fadeInLeft animated" data-wow-delay="0.2s">
				<div class="block_clientes" id="block_clientes">
                	<div class="block_images_clientes">
						<img src="imagen/clientes/<?php echo $row['matricula']; ?>" width="100%">
                    </div>
					<?php echo $row['nombreA']; ?>
                </div>
		</div>
        <?php		
	}
	
	
	?>
	</div>