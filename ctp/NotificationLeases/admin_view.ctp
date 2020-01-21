<div class="notifications view">
<h2><?php  __('Notification');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $notification['Notification']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Eviction'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($notification['Eviction']['id'], array('controller' => 'evictions', 'action' => 'view', $notification['Eviction']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('First Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $notification['Notification']['first_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Last Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $notification['Notification']['last_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Email Address'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $notification['Notification']['email_address']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(String::insert(__('Edit :param1', true), array('param1' => __('Notification', true))), array('action' => 'edit', $notification['Notification']['id'])); ?> </li>
		<li><?php echo $this->Html->link(String::insert(__('Delete :param1', true), array('param1' => __('Notification', true))), array('action' => 'delete', $notification['Notification']['id']), null, String::insert(__('Are you sure you want to delete # :param1?', true), array('param1' => $notification['Notification']['id']))); ?> </li>
		<li><?php echo $this->Html->link(String::insert(__('List :param1', true), array('param1' => __('Notifications', true))), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(String::insert(__('New :param1', true), array('param1' => __('Notification', true))), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(String::insert(__('List :param1', true), array('param1' => __('Evictions', true))), array('controller' => 'evictions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(String::insert(__('New :param1', true), array('param1' => __('Eviction', true))), array('controller' => 'evictions', 'action' => 'add')); ?> </li>
	</ul>
</div>
