<h2><?php echo __('County');?></h2>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(String::insert(__('Edit :action', true), array('action' => __('County', true))), array('action' => 'edit', $county['County']['id'])); ?> </li>
		<li><?php echo $this->Html->link(String::insert(__('Delete :action', true), array('action' => __('County', true))), array('action' => 'delete', $county['County']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $county['County']['id'])); ?> </li>
		<li><?php echo $this->Html->link(String::insert(__('List :action', true), array('action' => __('Counties', true))), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(String::insert(__('New :action', true), array('action' => __('County', true))), array('action' => 'add')); ?> </li>
	</ul>
</div>

<div class="counties view">

	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<!--dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $county['County']['id']; ?>
			&nbsp;
		</dd-->

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $county['County']['name']; ?>
			&nbsp;
		</dd>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Jurisdiction'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $county['County']['jurisdiction']; ?>
			&nbsp;
		</dd>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Fee'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $county['County']['fee']; ?>
			&nbsp;
		</dd>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Fee With Damages'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $county['County']['fee_with_damages']; ?>
			&nbsp;
		</dd>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Summons'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $county['County']['summons']; ?>
			&nbsp;
		</dd>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Process Server'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $county['County']['process_server']; ?>
			&nbsp;
		</dd>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Writ of Possession'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $county['County']['writ']; ?>
			&nbsp;
		</dd>

		<!--dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Use Base Documents'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php if ($county['County']['use_base_documents']) echo "Yes"; else echo "No"; ?>
			&nbsp;
		</dd-->
	</dl>
</div>
