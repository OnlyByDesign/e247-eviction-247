<table cellpadding="0" cellspacing="0">
	<tr>
    <th>First Name</th>
    <th>Middle Name</th>
    <th>Last Name</th>
	</tr>

	<?php
		$i = 0;
		foreach ($tenants as $tenant):
	    $class = null;
	    if ($i % 2 == 0) {
	        $class = ' class="altrow"';
	    }

			echo '<tr ' . $class . '>';
    	echo '	<td id="Tenant' . $i . 'FirstName">' . $tenant['TenantNotice']['first_name'] . '&nbsp;</td>';
    	echo '	<td id="Tenant' . $i . 'MiddleName">' . $tenant['TenantNotice']['middle_name'] . '&nbsp;</td>';
    	echo '	<td id="Tenant' . $i . 'LastName">' . $tenant['TenantNotice']['last_name'] . '&nbsp;</td>';
			echo '</tr>';
			$i++;
		endforeach;
	?>
</table>