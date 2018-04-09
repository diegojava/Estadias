<?php

	include('../conexion.php');

	$action = $_REQUEST['action'];
	
	if($action=="showAll"){
		
		$stmt = "SELECT * FROM clientes ORDER BY id";
		$stmt_general=$mysqli->query($stmt);
		
		$count=($stmt_general->num_rows);
	}else{
		$stmt = "SELECT * FROM clientes WHERE categoria=".$action." ORDER BY id";
		$stmt_general=$mysqli->query($stmt);
		$count=($stmt_general->num_rows);
	}
	
	?>
<script src="js/wow.min.js"></script>
<script>
		 new WOW().init();
</script>
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
	<div>
	<?php
	if($count > 0){
		while($row=$stmt_general->fetch_assoc())
		{
	
			?>
			<div class="grid_3 post wow fadeInLeft animated" data-wow-delay="0.2s">
				<div class="block_clientes">
                	<div class="block_images_clientes">
						<img src="imagen/clientes/<?php echo $row['imagen']; ?>" width="100%">
                    </div>
					<?php echo $row['nombre']; ?>
                </div>
			</div>
			<?php		
		}
		
	}else{
		
		?>
       <div class="grid_3 post wow fadeInLeft animated" data-wow-delay="0.2s">
				<div class="block_clientes" id="block_clientes">
                	<div class="block_images_clientes">
						<img src="imagen/clientes/<?php echo $row['imagen']; ?>" width="100%">
                    </div>
					<?php echo $row['nombre']; ?>
                </div>
		</div>
        <?php		
	}
	
	
	?>
	</div>