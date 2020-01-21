<table cellpadding="0" cellspacing="0">
	<tr>
    <th>First Name</th>
    <th>Middle Name</th>
    <th>Last Name</th>
	</tr>

	<?php
		$i = 0;
		foreach ($occupants as $occupant):
	    $class = null;
	    if ($i % 2 == 0) {
	        $class = ' class="altrow"';
	    }

			echo '<tr ' . $class . '>';
			echo '	<td id="Occupant' . $i . 'FirstName">' . $occupant['Occupant']['first_name'] . '&nbsp;</td>';
			echo '	<td id="Occupant' . $i . 'MiddleName">' . $occupant['Occupant']['middle_name'] . '&nbsp;</td>';
			echo '	<td id="Occupant' . $i . 'LastName">' . $occupant['Occupant']['last_name'] . '&nbsp;</td>';
			echo '</tr>';
			$i++;
		endforeach;
	?>
</table>