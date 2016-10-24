<?php
if (isset($consultas)){ ?>

{
 "Result":"OK",
 "Records": [
 		<?php foreach ($consultas as $key => $datos): ?>
		{
		"tipo": "<?php echo $datos['Labdb']['tipo_laboratorio']; ?>",
		"total": <?php echo $datos['Labdb']['TOTAL_C']; ?>
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