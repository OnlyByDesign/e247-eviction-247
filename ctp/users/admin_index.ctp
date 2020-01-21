
<script type="text/javascript">	
  $(function() {
    $("#txtSearch").keyup(function() {
    	var searchValue = $(this).val();
			$.ajax({
			    url: '/index.php/admin/users/livesearch/' + searchValue,
			    cache: false,
			    type: 'GET',
			    dataType: 'HTML',
			    success: function (data) {
			        $('#list').html(data);
			    }
			});
		});
		
		$("#btnClear").click(function() {
			$('#txtSearch').val('');
			$('#txtSearch').keyup();
		});
  });
</script>

<div id="wrapper" class="acc center fm-create users index">
    
    <div class="hero col-xs-12 center">
            <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">Account <span>Users</span></h1>
            </div>
            <div class="hr_over"></div>
            <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/6.jpg"></div>
        </div>
        
        <div class="db_tab col-xs-12 center">
            <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
        </div>
    
        <div class="content col-xs-10 center">
            
            <div class="acc_srch center col-xs-12 inline">

                    <div class="action inline left col-xs-4">
                        
                        <?php
                        
                        if (Configure::read('Rights.canCreateAdmins')): ?>
                        
                        <div class="btn-blue col-xs-5-2 input center left">
                            <?php echo $this->Html->link(String::insert(__('New :action', true), array('action' => __('Profile', true))), array('controller' => 'profiles', 'action' => 'add')); ?>
                        </div>
                        
                        <div class="btn-blue col-xs-5-2 input center right">
                            <?php echo $this->Html->link(String::insert(__('New User', true), array('action' => __('Profile', true))), array('controller' => 'users', 'action' => 'add')); ?>
                        </div>
                        
                        <?php endif ?>
                        
                    </div>
                
                    <div class="col-xs-2 inline left input push-l">
                        <?php
                            echo $this->Html->link('<p class="inline col-xs-6 center" style="font-weight:bold;">Users</p>', array('controller' => 'users', 'action' => 'index'), array('escape' => false));
                            echo $this->Html->link('<p class="inline col-xs-6 center" style="font-weight:bold;">Groups</p>', array('controller' => 'groups', 'action' => 'index'), array('escape' => false));
                        ?>
                    </div>
                    
                    <div id="searchBar" class="sbmt fm_input fm_text col-xs-4 inline right">
                        <input id="btnClear" class="right btn-blue col-xs-3 inline last" type="submit" name="submit" value="search" />
                        <input id="txtSearch" class="right input inline col-xs-9" type="text" placeholder="Search by address, plaintiff, user or defendant"  />
                    </div>
                        
            </div>
    
            <div class="info col-xs-12 center">
                
                <div id="list" class="info_wrap lrg center">
                    
                    <h3><?php __('Users');?></h3>
                    
                    <table class="col-xs-12 inline left" style="display: table;">
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
            </div>
</div>

	<?php echo $this->Html->link(__('Export Users', true), array('admin' => true, 'controller' => 'users', 'action' => 'export'), array('escape' => false)); ?>

</div>


<?php include '/app/webroot/files/alert_popup.inc'; ?>