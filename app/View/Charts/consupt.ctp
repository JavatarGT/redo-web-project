<?php
if (isset($consultas)){ ?>

{
 "Result":"OK",
 "Records": [
 		<?php foreach ($consultas as $key => $datos): ?>
		{
		"tipo": "<?php echo $datos['Ptcontroldb']['genero']; ?>",
		"total": <?php echo $datos['Ptcontroldb']['TOTAL_C']; ?>
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