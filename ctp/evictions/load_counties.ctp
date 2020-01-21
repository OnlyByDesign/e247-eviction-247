<?php
	echo '<option value="0">&lt;Please select a county&gt;</option>';
	foreach($counties as $key => $val) {
		echo '<option value="' . $key . '">' . $val . '</option>';
	}
?>