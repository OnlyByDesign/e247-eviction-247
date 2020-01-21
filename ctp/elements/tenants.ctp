<table cellpadding="0" cellspacing="0" id="table-tenants">
	<tr>
    <th>First Name</th>
    <th>Middle Name</th>
    <th>Last Name</th>
    <th></th>
	</tr>

	<?php
		$i = 0;
		foreach ($tenants as $tenant):
	    $class = null;
	    if ($i % 2 == 0) {
	        $class = ' class="altrow"';
	    }

			echo '<tr ' . $class . '>';
    	echo '	<td id="Tenant' . $i . 'FirstName">' . $tenant['Tenant']['first_name'] . '&nbsp;</td>';
    	echo '	<td id="Tenant' . $i . 'MiddleName">' . $tenant['Tenant']['middle_name'] . '&nbsp;</td>';
    	echo '	<td id="Tenant' . $i . 'LastName">' . $tenant['Tenant']['last_name'] . '&nbsp;</td>';
    	echo '	<td id="Tenant' . $i . 'Action"></td>';
			echo '</tr>';
			$i++;
		endforeach;
	?>
</table>