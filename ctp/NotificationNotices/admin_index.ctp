<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main">manage <span>notices</span></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/2.jpeg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="actions col-xs-12 inline">
            <div class="btn-blue col-xs-2 center left">
                <?php echo $this->Html->link(String::insert(__('New :param1', true), array('param1' => __('Notification', true))), array('action' => 'add', $notice_id)); ?>
            </div>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(String::insert(__('Back to :param1', true), array('param1' => __('Notice', true))), array('controller' => 'notices', 'action' => 'edit', $notice_id)); ?></strong></p>
        </div>

        <div class="notifications index col-xs-12 left flex push-t push-b">
            
            <table cellpadding="0" cellspacing="0">
                <tr>
                        <!--th><?php echo $this->Paginator->sort('id');?></th-->
                        <!--th><?php echo $this->Paginator->sort('notice_id');?></th>
                        <th><?php echo $this->Paginator->sort('first_name');?></th>
                        <th><?php echo $this->Paginator->sort('last_name');?></th>
                        <th><?php echo $this->Paginator->sort('email_address');?></th-->

                        <!--th>Notice ID</th-->
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
                    <!--td><?php echo $notification['NotificationNotice']['id']; ?>&nbsp;</td-->
                    <!--td>
                        <?php echo $this->Html->link($notification['Notice']['id'], array('controller' => 'notices', 'action' => 'edit', $notification['Notice']['id'])); ?>
                    </td-->
                    <td><?php echo $notification['NotificationNotice']['first_name']; ?>&nbsp;</td>
                    <td><?php echo $notification['NotificationNotice']['last_name']; ?>&nbsp;</td>
                    <td><?php echo $notification['NotificationNotice']['email_address']; ?>&nbsp;</td>
                    <td class="actions">
                        <?php //echo $this->Html->link(__('View', true), array('action' => 'view', $notification['NotificationNotice']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $notification['NotificationNotice']['id'])); ?>
                        |
                        <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $notice_id, $notification['NotificationNotice']['id']), null, String::insert(__('Are you sure you want to delete the notification for :param1 :param2?', true), array('param1' => $notification['NotificationNotice']['first_name'], 'param2' => $notification['NotificationNotice']['last_name']))); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            
        </div>
        
    </div>
    
</div>