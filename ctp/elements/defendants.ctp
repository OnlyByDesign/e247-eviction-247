<table class="col-xs-12 left" cellpadding="0" cellspacing="0" style="display:table;">
	<tr>
    <th>First Name</th>
    <th>Middle Name</th>
    <th>Last Name</th>
    <th>DOB</th>
    <th>SSN</th>
    <th>Phone Number</th>
	</tr>

	<?php
		$i = 0;
		foreach ($defendants as $defendant):
	    $class = null;
	    if ($i++ % 2 == 0) {
	        $class = ' class="altrow"';
	    }
	?>
	<tr <?php echo $class;?>>
    <td><?php echo $defendant['Defendant']['first_name']; ?>&nbsp;</td>
    <td><?php echo $defendant['Defendant']['middle_name']; ?>&nbsp;</td>
    <td><?php echo $defendant['Defendant']['last_name']; ?>&nbsp;</td>
    <td><?php echo $defendant['Defendant']['date_of_birth']; ?>&nbsp;</td>
    <td><?php echo $defendant['Defendant']['ssn']; ?>&nbsp;</td>
    <td><?php echo $defendant['Defendant']['phone_number']; ?>&nbsp;</td>
	</tr>
	<?php endforeach; ?>
</table>