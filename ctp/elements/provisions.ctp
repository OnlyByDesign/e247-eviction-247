<table cellpadding="0" cellspacing="0" id="table-provisions">
	<?php

		$i = 0;
		foreach ($provisions as $provision):
	    $class = null;
	    if ($i % 2 == 0) $class = ' class="altrow"';

			echo '<tr ' . $class . ' id="tr-provision' . $i . '">';
    	echo '	<td>';
    	echo $i+1;
    	echo '.</td><td>' . $provision['LeaseProvision']['description'] . '&nbsp;</td>';
			echo '<td>';
			if ($provision['LeaseProvision']['is_approved'] == 1) echo $this->Html->image('/img/icon_checkmark.png');
			else echo $this->Html->image('/img/icon-remove.png');
			echo '</td>';
			echo '</tr>';
			$i++;
		endforeach;
	?>
</table>