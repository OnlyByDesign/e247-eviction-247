<div class="actions">
	<h2>Manage Landlords</h2>

	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(String::insert(__('New :param1', true), array('param1' => __('Landlord', true))), array('action' => 'add', $lease_id)); ?></li>
		<li><?php echo $this->Html->link(String::insert(__('Back to :param1', true), array('param1' => __('Lease', true))), array('controller' => 'leases', 'action' => 'edit', $lease_id)); ?></li>
	</ul>
</div>
<div class="owners index">
	<h2><?php __('Owners');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
      <th>First Name</th>
      <th>Middle Name</th>
      <th>Last Name</th>
      <th>Company Name</th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($owners as $owner):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $owner['Owner']['first_name']; ?>&nbsp;</td>
		<td><?php echo $owner['Owner']['middle_name']; ?>&nbsp;</td>
		<td><?php echo $owner['Owner']['last_name']; ?>&nbsp;</td>
		<td><?php echo $owner['Owner']['company_name']; ?>&nbsp;</td>
		<td class="actions">
            <?php echo $this->Html->link(
                'Edit',
                array('action' => 'edit', $owner['Owner']['id'])
            );
            ?>
            |
			<?php echo $this->Html->link(
                __('Delete', true),
                array('action' => 'delete', $lease_id, $owner['Owner']['id']),
                null,
                String::insert(__('Are you sure you want to delete :param1 :param2?', true), array('param1' => $owner['Owner']['first_name'], 'param2' => $owner['Owner']['last_name'])));
            ?>
		</td>
	</tr>
    <?php endforeach; ?>
	</table>
</div>