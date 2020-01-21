<?php
/*
	if ($lease['Lease']['property_owner_is_company']) {
		echo '<table class="list-items">';
		echo '	<tr>';
		echo '		<td>' . __('Company Name') . '</td>';
		echo '		<td>' . $lease['Owner'][0]['company_name'] . '</td>';
		echo '	</tr>';
		echo '</table>';
	} else {
	*/
?>
	
	<table cellpadding="0" cellspacing="0">
		<tr>
	    <th>First Name</th>
	    <th>Middle Name</th>
	    <th>Last Name</th>
	    <th>Company Name</th>
		</tr>
	
		<?php

			$i = 0;
			foreach ($owners as $owner):
		    $class = null;
		    if ($i % 2 == 0) {
		        $class = ' class="altrow"';
		    }
				echo '<tr ' . $class . '>';

				if ($owner['Owner']['company_name'] != '' && !is_null($owner['Owner']['company_name'])) {
					echo '	<td>&nbsp;</td>';
					echo '	<td>&nbsp;</td>';
					echo '	<td>&nbsp;</td>';
					echo '	<td id="Owner' . $i . 'CompanyName">' . $owner['Owner']['company_name'] . '&nbsp;</td>';
				} else {
					echo '	<td id="Owner' . $i . 'FirstName">' . $owner['Owner']['first_name'] . '&nbsp;</td>';
					echo '	<td id="Owner' . $i . 'MiddleName">' . $owner['Owner']['middle_name'] . '&nbsp;</td>';
					echo '	<td id="Owner' . $i . 'LastName">' . $owner['Owner']['last_name'] . '&nbsp;</td>';
					echo '	<td>&nbsp;</td>';
				}

				echo '</tr>';
				$i++;
			endforeach;
			echo '</table>';
?>