<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>Manage</span> Notifications</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/3.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="actions col-xs-12 left inline input">
            <div class="btn-blue col-xs-2 center left">
                <?php echo $this->Html->link(String::insert(__('New :param1', true), array('param1' => __('Notification', true))), array('action' => 'add', $eviction_id)); ?>
            </div>
            <p class="col-xs-1-2 center inline push-l"><strong><?php echo $this->Html->link(String::insert(__('Back to :param1', true), array('param1' => __('Eviction', true))), array('controller' => 'evictions', 'action' => 'edit', $eviction_id)); ?></strong></p>
            <p class="col-xs-1-2 center inline"><strong><?php echo $this->Html->link(String::insert(__('List :param1', true),array('param1' =>  __('Evictions', true))), array('controller' => 'evictions', 'action' => 'index')); ?></strong></p>
            <p class="col-xs-1-2 center inline"><strong><?php echo $this->Html->link(String::insert(__('New :param1', true), array('param1' => __('Eviction', true))), array('controller' => 'evictions', 'action' => 'add')); ?></strong></p>
        </div>

        <div class="notifications index inline col-xs-12 left push-t push-b">

            <table cellpadding="0" cellspacing="0">

               <tr>
                   <!--th><?php echo $this->Paginator->sort('id');?></th-->
                    <!--th><?php echo $this->Paginator->sort('eviction_id');?></th>
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
                    <td><?php echo $notification['Notification']['first_name']; ?>&nbsp;</td>
                    <td><?php echo $notification['Notification']['last_name']; ?>&nbsp;</td>
                    <td><?php echo $notification['Notification']['email_address']; ?>&nbsp;</td>
                    <td class="actions">
                        <?php //echo $this->Html->link(__('View', true), array('action' => 'view', $notification['Notification']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $notification['Notification']['id'])); ?>
                        |
                        <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $eviction_id, $notification['Notification']['id']), null, String::insert(__('Are you sure you want to delete the notification for :param1 :param2?', true), array('param1' => $notification['Notification']['first_name'], 'param2' => $notification['Notification']['last_name']))); ?>
                    </td>
                </tr>

                <?php endforeach; ?>

            </table>

        </div>
        
        <p class="col-xs-12 center inline">
            <?php echo $this->Paginator->counter(array( 'format' =>'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}' )); ?>
        </p>
        <div class="paging col-xs-12 center inline">
            <?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?> | <?php echo $this->Paginator->numbers();?> | <?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
        </div>

    </div>
    
</div>