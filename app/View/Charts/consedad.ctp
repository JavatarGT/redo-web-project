<?php
if (isset($consultas)){ ?>

{
 "Result":"OK",
 "Records": [
 		<?php foreach ($consultas as $key => $datos): ?>
		{
		"tipo": "<?php echo $datos['Edaddb']['clasificacion']; ?>",
		"total": <?php echo $datos['Edaddb']['TOTAL_C']; ?>
		}
		<?php
			end($consultas);
		    if ($key === key($consultas))
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