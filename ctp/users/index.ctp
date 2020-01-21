<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>manage</span> users</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/6.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_account')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="actions col-xs-12 inline">
            <div class="btn-blue col-xs-2 center left">
                <?php echo $this->Html->link(String::insert(__('New :action', true), array('action' => __('User', true))), array('action' => 'add')); ?>
            </div>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(String::insert(__('List :action', true), array('action' => __('Profiles', true))), array('controller' => 'profiles', 'action' => 'index')); ?></strong></p>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(String::insert(__('New :action', true), array('action' => __('Profile', true))), array('controller' => 'profiles', 'action' => 'add')); ?></strong></p>
        </div>

        <div class="users index col-xs-12 left flex push-t push-b">
            
            <table cellpadding="0" cellspacing="0">
                
                <tr>
                    <th><?php echo $this->Paginator->sort('id');?></th>
                    <th><?php echo $this->Paginator->sort('role');?></th>
                    <th><?php echo $this->Paginator->sort('username');?></th>
                    <th><?php echo $this->Paginator->sort('password');?></th>
                    <th class="actions"><?php __('Actions');?></th>
                </tr>
                
                <?php
                $i = 0;
                foreach ($users as $user):
                $class = null;
                if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
                }
                ?>
                
                <tr<?php echo $class;?>>
                    <td><?php echo $user['User']['id']; ?>&nbsp;</td>
                    <td><?php echo $user['User']['role']; ?>&nbsp;</td>
                    <td><?php echo $user['User']['username']; ?>&nbsp;</td>
                    <td><?php echo $user['User']['password']; ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View', true), array('action' => 'view', $user['User']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $user['User']['id'])); ?>
                        <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $user['User']['id']), null, String::insert(__('Are you sure you want to delete # :param1?', true), array('param1' => $user['User']['id']))); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                
            </table>
            
        </div>
        
        <p class="col-xs-12 center inline">
        <?php echo $this->Paginator->counter(array( 'format' =>'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}' )); ?>	
        </p>

        <div class="paging col-xs-12 center inline">
            <?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?> | <?php echo $this->Paginator->numbers();?> | <?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled')); ?>
        </div>
        
    </div>
        
</div>