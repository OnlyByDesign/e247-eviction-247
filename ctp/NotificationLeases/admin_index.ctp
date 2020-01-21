<div class="actions">
	<h2>Manage Notifications</h2>

	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(String::insert(__('New :param1', true), array('param1' => __('Notification', true))), array('action' => 'add', $lease_id)); ?></li>
		<li><?php echo $this->Html->link(String::insert(__('Back to :param1', true), array('param1' => __('Lease', true))), array('controller' => 'leases', 'action' => 'edit', $lease_id)); ?></li>
	</ul>
</div>

<div class="notifications index">
	<h2><?php __('Notifications');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<!--th><?php echo $this->Paginator->sort('id');?></th-->
			<!--th><?php echo $this->Paginator->sort('lease_id');?></th>
			<th><?php echo $this->Paginator->sort('first_name');?></th>
			<th><?php echo $this->Paginator->sort('last_name');?></th>
			<th><?php echo $this->Paginator->sort('email_address');?></th-->

			<!--th>Eviction ID</th-->
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($notifications as $notification):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<!--td><?php echo $notification['NotificationLease']['id']; ?>&nbsp;</td-->
		<!--td>
			<?php echo $this->Html->link($notification['Eviction']['id'], array('controller' => 'leases', 'action' => 'edit', $notification['Eviction']['id'])); ?>
		</td-->
		<td><?php echo $notification['NotificationLease']['first_name']; ?>&nbsp;</td>
		<td><?php echo $notification['NotificationLease']['last_name']; ?>&nbsp;</td>
		<td><?php echo $notification['NotificationLease']['email_address']; ?>&nbsp;</td>
		<td class="actions">
			<?php //echo $this->Html->link(__('View', true), array('action' => 'view', $notification['NotificationLease']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $notification['NotificationLease']['id'])); ?>
			|
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $lease_id, $notification['NotificationLease']['id']), null, String::insert(__('Are you sure you want to delete the notification for :param1 :param2?', true), array('param1' => $notification['NotificationLease']['first_name'], 'param2' => $notification['NotificationLease']['last_name']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<!--p>
	<?php
	echo $this->Paginator->counter(array(
		'format' =>'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
	</div-->
</div>
