<table cellpadding="0" cellspacing="0">
	<tr>
    <th>Type</th>
    <th>Make</th>
    <th>Model</th>
    <th>Color</th>
    <th>License</th>
	</tr>

	<?php
		$i = 0;
		foreach ($vehicles as $vehicle):
	    $class = null;
	    if ($i++ % 2 == 0) {
	        $class = ' class="altrow"';
	    }
	?>
	<tr <?php echo $class;?>>
    <td><?php echo $vehicle['Vehicle']['type']; ?>&nbsp;</td>
    <td><?php echo $vehicle['Vehicle']['make']; ?>&nbsp;</td>
    <td><?php echo $vehicle['Vehicle']['model']; ?>&nbsp;</td>
    <td><?php echo $vehicle['Vehicle']['color']; ?>&nbsp;</td>
    <td><?php echo $vehicle['Vehicle']['license']; ?>&nbsp;</td>
	</tr>
	<?php endforeach; ?>
</table>