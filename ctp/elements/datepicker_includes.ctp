<?php
	echo $this->Html->css('cupertino/jquery-ui-1.8.1.custom', 'stylesheet');
	echo $this->Html->css('jquery-ui-theme-fixes', 'stylesheet');
	echo $this->Html->script('jquery-ui-1.8.1.custom.min', array('block' => 'scriptBottom'));
	echo $this->Html->script('jquery.maskedinput-1.3.1', array('block' => 'scriptBottom'));
	echo $this->Html->script('date-field', array('block' => 'scriptBottom'));
?>