
<h2>Notice to Pay has Expired</h2>

<?php
	echo '<div class="eviction-wrapper">';
	echo '	<h1><strong>Property address:</strong> ' . $address . '</h1><br />';
 	echo '	<strong>Plaintiff:</strong> ' . $plaintiff . '<br />';
 	echo '	<strong>Defendant(s):</strong> ' . $defendants . '<br />';
 	echo '	<strong>Matter #:</strong> ' . $eviction_data['Eviction']['id'] . '<br /><br />';
	echo '</div>';
?>

<div class="evictions form">
  <?php
  	echo $this->Form->create();
  
  	if ($eviction_data['Status']['step'] == Configure::read('Step_status_notice_posted') && !$contact_client) {
  		echo '<fieldset>';

			echo '<p>What would you like to do?</p>';

			$options = array(
			    'yes' => 'Proceed with an Eviction of the Tenant(s)',
			    'no' => 'Don\'t Proceed with an Eviction of the Tenant(s)',
			    'maybe' => 'Not Sure What to Do, Contact Me Immediately!'
			);
			
			$attributes = array(
			    'value' => 'yes',
			    'separator' => '<br />',
			    'legend' => false
			);
			echo $this->Form->radio('action', $options, $attributes);

			echo '</fieldset>';

	  	echo $this->Form->submit('/img/btn_continue.png', array('type' => 'Continue', 'type' => 'image', 'style' => 'width:129px; height:29px; display:block;', 'id' => 'btnContinue'));
			echo $this->Form->end();
			echo '<br />';
			echo $this->Html->link('Cancel', array('controller' => 'evictions', 'action' => 'index'));

  	} else if ($eviction_data['Status']['step'] == Configure::read('Step_status_notice_posted') && $contact_client) {
  		echo '<fieldset>';
			echo '	We have Received your Request and will Contact you Within 24 Hours.';
			echo '</fieldset>';
			echo '<br />';
			echo $this->Html->link('My Evictions', array('controller' => 'evictions', 'action' => 'index'));

		} else if ($eviction_data['Status']['step'] >= Configure::read('Step_status_eviction_yes')) {
  		echo '<fieldset>';
			echo '	You have decided to Proceed with an Eviction of the Tenant(s)';
			echo '</fieldset>';
			echo '<br />';
			echo $this->Html->link('My Evictions', array('controller' => 'evictions', 'action' => 'index'));

		} else if ($eviction_data['Status']['step'] == Configure::read('Step_status_eviction_no')) {
  		echo '<fieldset>';
			echo '	You have decided not to Proceed with an Eviction of the Tenant(s)';
			echo '</fieldset>';
			echo '<br />';
			echo $this->Html->link('My Evictions', array('controller' => 'evictions', 'action' => 'index'));
		}
	?>
 </div>
 