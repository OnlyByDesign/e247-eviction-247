


<?php if (!$this->request->is("ajax")) { ?>

	<div class="left">
		<h2>Users</h2>
	</div>
	
	<br class="clear" />
	
	
	<!-- TABS -->
	<ul class="tabContainer">
		<li class="tabElement current">
			<?php echo $this->Html->link('<span class="tabElementTitle">Users</span>', array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?>
		</li>
	
		<li class="tabElement">
			<?php echo $this->Html->link('<span class="tabElementTitle">Groups</span>', array('controller' => 'groups', 'action' => 'index'), array('escape' => false)); ?>
	  </li>
	</ul>
	<!-- END TABS -->
	
	
	
	<?php if (Configure::read('Rights.canCreateAdmins')): ?>
		<div class="actions">
			<h3><?php __('Actions'); ?></h3>
			<ul>
				<li><?php echo $this->Html->link('Add a new Administrator', array('action' => 'add')); ?></li>
				<li><?php echo $this->Html->link(String::insert(__('New :action', true), array('action' => __('Profile', true))), array('controller' => 'profiles', 'action' => 'add')); ?> </li>
			</ul>
		</div>
	<?php endif ?>
	
	
	<div id="searchBar">
		Search: <input type="text" id="txtSearch" size="50" placeholder="username, name, company name" value="<?php echo $searchValue; ?>" />
		&nbsp;
		<input type="image" src="/img/btn_clear.png" id="btnClear" />
	</div>
	<br class="clear" />
<?php } ?>


<div id="list">


<div class="users index">
	<h2><?php __('Users');?></h2>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this->Paginator->sort('role');?></th>
			<th><?php echo $this->Paginator->sort('Profile.last_name', 'Name');?></th>
			<th><?php echo $this->Paginator->sort('username');?></th>
			<th><?php echo $this->Paginator->sort('Profile.company_name', 'Company Name');?></th>
			<th>Group</th>
			<th>Group admin?</th>
			<th class="actions"><?php __('Actions');?></th>
		</tr>
		<?php
			$i = 0;
			foreach ($users as $user):
				$class = null;
				if ($i++ % 2 == 0) {
					$class = 'class="altrow"';
				}
				$name = '';
				if ($user['Profile']['last_name'] != '' && $user['Profile']['first_name'] != '') $name = $user['Profile']['last_name'] . ', ' . $user['Profile']['first_name'];
				else if ($user['Profile']['first_name'] != '') $name = $user['Profile']['first_name'];
		?>
		<tr <?php echo $class;?>>
			<td><?php echo $user['User']['role']; ?>&nbsp;</td>
			<td><?php echo $name; ?>&nbsp;</td>
			<td><?php echo $user['User']['username']; ?>&nbsp;</td>
			<td><?php echo $user['Profile']['company_name']; ?></td>
			<td><?php echo $user['Group']['name']; ?></td>
			<td><?php if ($user['GroupUser']['is_superuser'] == 1) echo 'Yes'; else echo 'No'; ?></td>
			<td class="actions">
				<?php 
          echo $this->Html->link(__('View', true), array('action' => 'view', $user['User']['id']));

          if (in_array($user['User']['role'], Configure::read('Rights.changePasswordRoles'))) {
          	echo '<br />';
            echo $this->Html->link(__('Change Password', true), array('action' => 'edit', $user['User']['id']));
          }

          if (in_array($user['User']['role'], Configure::read('Rights.deleteRoles'))) {
          	echo '<br />';
            echo $this->Html->link('Delete', array('action' => 'delete', $user['User']['id']), null, String::insert(__('Are you sure you want to delete :param1?', true), array('param1' => $user['User']['username'])));
          }
					if (AuthComponent::user('role') == 'superadmin') {
          	echo '<br />';
						echo $this->Html->link(__('Add to QB', true), array('action' => 'addUserToQuickbooks', $user['User']['id']), null, 'Are you sure you want to add this user to QB?');
					}
				?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>

	<p>
		<?php
			echo $this->Paginator->counter(array(
		  	'format' => 'Page {:page} of {:pages}, showing {:current} records out of {:count} total'
			));
		?>
	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
	</div>

</div>