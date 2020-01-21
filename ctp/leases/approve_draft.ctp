

<h2>Approve Draft Lease</h2>

<?php
	echo '<div class="eviction-wrapper">';
	echo '	<h1><strong>Property address:</strong> ' . $address . '</h1><br />';
 	echo '	<strong>Owner(s):</strong> ' . $owners . '<br />';
 	echo '	<strong>Tenant(s):</strong> ' . $tenants . '<br />';
 	echo '	<strong>Matter #:</strong> ' . $lease_id . '<br /><br />';
	echo '</div>';
?>

<div class="leases form">
  <?php
  	echo $this->Form->create();

  	if ($submit_changes != 1) {
  		echo '<fieldset>';
			echo '	Click on the Continue button if you wish to approve this draft lease.';
			echo '</fieldset>';

	  	echo $this->Form->submit('/img/btn_continue.png', array('type' => 'Continue', 'type' => 'image', 'style' => 'width:129px; height:29px; display:block;', 'id' => 'btnContinue'));
			echo $this->Form->end();
			echo '<br />';
			echo $this->Html->link('Cancel', array('controller' => 'leases', 'action' => 'index'));

		} else {
  		echo '<fieldset>';
			echo '	You previously submitted changes to the lease. Once these changes are reviewed we will send you another draft lease for approval.';
			echo '</fieldset>';
//			echo '<br />';
//			echo $this->Html->link('My Leases', array('controller' => 'leases', 'action' => 'index'));
echo $this->Html->link($this->Html->image('/img/btn_my_leases.png'), array('controller' => 'leases', 'action' => 'index'), array('escape' => false));
		}
	?>

 </div>