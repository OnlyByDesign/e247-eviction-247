<div class="actions">
	<h2>Manage Notifications</h2>

	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(String::insert(__('List :param1', true), array('param1' => __('Notifications', true))), array('action' => 'index', $lease_id));?></li>
		<li><?php echo $this->Html->link(String::insert(__('Back to :param1', true), array('param1' => __('Lease', true))), array('controller' => 'leases', 'action' => 'edit', $lease_id)); ?></li>
		<!--li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Leases', true)), array('controller' => 'leases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Lease', true)), array('controller' => 'leases', 'action' => 'add')); ?> </li-->
	</ul>
</div>

<div class="notification_leases form">
<?php echo $this->Form->create('NotificationLease');?>
	<fieldset>
 		<legend><?php echo String::insert(__('Add a :param1', true), array('param1' => __('Notification', true))); ?></legend>
		<?php
			//echo $this->Form->input('lease_id');
	    echo $this->Form->input('lease_id', array('type' => 'hidden', 'value' => $lease_id));
			echo $this->Form->input('first_name');
			echo $this->Form->input('last_name');
			echo $this->Form->input('email_address1', array( 'label' => 'Email Address' ) );
	    echo $this->Form->input('email_address2', array ( 'label' => 'Verify Email Address' ) );
		?>
	</fieldset>
	
	<?php
		echo $this->Form->submit('/img/btn_save.png', array('type' => 'Submit', 'type' => 'image', 'style' => 'width:129px; height:29px; display:block;'));
		echo $this->Form->end();
	?>

	<?php //echo $this->Form->end(__('Submit', true));?>
</div>
