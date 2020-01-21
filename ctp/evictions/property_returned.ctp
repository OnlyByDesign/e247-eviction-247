<?php
	echo $this->element('datepicker_includes');
?>


<h2>Possession Returned Date</h2>

<?php
	echo '<div class="eviction-wrapper">';
	echo '	<h1><strong>Property address:</strong> ' . $address . '</h1><br />';
 	echo '	<strong>Plaintiff:</strong> ' . $plaintiff . '<br />';
 	echo '	<strong>Defendant(s):</strong> ' . $defendants . '<br />';
 	echo '	<strong>Matter #:</strong> ' . $eviction_id . '<br /><br />';
	echo '</div>';
?>

<div class="evictions form">
  <?php
  	echo $this->Form->create();
  
  	if ($possession_date == '') {
  		echo '<fieldset>';
			//echo '	Possession of the property was returned to you on ' . 
			echo $this->Form->input('possession_date', array('type' => 'text', 'required' => 'true', 'label' => 'Possession of the property was returned to you on'));
			echo '</fieldset>';

	  	echo $this->Form->submit('/img/btn_continue.png', array('type' => 'Continue', 'type' => 'image', 'style' => 'width:129px; height:29px; display:block;', 'id' => 'btnContinue'));
			echo $this->Form->end();
			echo '<br />';
			echo $this->Html->link('Cancel', array('controller' => 'evictions', 'action' => 'index'));
		} else {
  		echo '<fieldset>';
				echo 'Possession of the Property was returned on ' . date('l, F jS Y', strtotime($possession_date));
			echo '</fieldset>';
			echo '<br />';
			echo $this->Html->link('My Evictions', array('controller' => 'evictions', 'action' => 'index'));
		}
	?>
 </div>