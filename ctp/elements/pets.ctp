<table cellpadding="0" cellspacing="0">
	<tr>
    <th>Type</th>
    <th>Breed</th>
    <th>Color</th>
    <th>Weight</th>
    <th>Name</th>
	</tr>

	<?php
		$i = 0;
		foreach ($pets as $pet):
	    $class = null;
	    if ($i % 2 == 0) {
	        $class = ' class="altrow"';
	    }

			echo '<tr ' . $class . '>';
			echo '	<td id="Pet' . $i . 'Type">' .  $pet['Pet']['type'] . '&nbsp;</td>';
			echo '	<td id="Pet' . $i . 'Breed">' .  $pet['Pet']['breed'] . '&nbsp;</td>';
			echo '	<td id="Pet' . $i . 'Color">' .  $pet['Pet']['color'] . '&nbsp;</td>';
			echo '	<td id="Pet' . $i . 'Weight">' .  $pet['Pet']['weight'] . '&nbsp;</td>';
			echo '	<td id="Pet' . $i . 'Name">' .  $pet['Pet']['name'] . '&nbsp;</td>';
			echo '</tr>';
			$i++;
		endforeach;
	?>
</table>