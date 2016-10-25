<?php if (isset($programa)){ ?>

{
 "Result":"OK",
 "Records": [
 		<?php foreach ($programa as $key => $datos): ?>
		{
		"codigo": "<?php echo $datos['Programa']['id']; ?>",
		"nombre": "<?php echo $datos['Programa']['nombre']; ?>",
		"descripcion": "<?php echo $datos['Programa']['descripcion']; ?>"
 		}
		<?php
			end($programa);
		    if ($key === key($programa))
		        echo '';
		    else
		    	echo ',';
		 ?>
		 <?php endforeach; ?>
 	]
}
<?php } else { ?>
{
 "Result":"ERROR",
 "Message": "<?php echo $mensaje ?>"
}

<?php } ?>