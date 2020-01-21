<div class="actions">
	<h2>Manage Notifications</h2>

	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(String::insert(__('List :param1', true), array('param1' => __('Notifications', true))), array('action' => 'index', $lease_id));?></li>
		<li><?php echo $this->Html->link(String::insert(__('Back to :param1', true), array('param1' => __('Eviction', true))), array('controller' => 'leases', 'action' => 'edit', $lease_id)); ?></li>
		<!--li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Notification.id')), null, String::insert(__('Are you sure you want to delete # :param1?', true), array('param1' => $this->Form->value('Notification.id')))); ?></li-->
		<!--li><?php echo $this->Html->link(String::insert(__('List :param1', true), array('param1' => __('Evictions', true))), array('controller' => 'leases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(String::insert(__('New :param1', true), array('param1' => __('Eviction', true))), array('controller' => 'leases', 'action' => 'add')); ?> </li-->
	</ul>
</div>

<div class="notifications form">
<?php echo $this->Form->create('NotificationLease');?>
	<fieldset>
 		<legend><?php echo String::insert(__('Edit :param1', true), array('param1' => __('Notification', true))); ?></legend>
	<?php
		echo $this->Form->input('id');
    echo $this->Form->input('lease_id', array('type' => 'hidden', 'value' => $lease_id));
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('email_address1', array( 'label' => 'Email Address', 'value' => $this->data['NotificationLease']['email_address'] ) );
		echo $this->Form->input('email_address2', array( 'label' => 'Verify Email Address', 'value' => $this->data['NotificationLease']['email_address'] ) );
	?>
	</fieldset>

	<?php
		echo $this->Form->submit('/img/btn_save.png', array('type' => 'Submit', 'type' => 'image', 'style' => 'width:129px; height:29px; display:block;'));
		echo $this->Form->end();
	?>

<?php //echo $this->Form->end(__('Submit', true));?>
</div>
