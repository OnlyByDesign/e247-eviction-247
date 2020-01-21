<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main">manage <span>notifications</span></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/7.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_account')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="actions col-xs-12 inline">
            
            <p class="left inline push-l input center"><strong></strong></p>
        </div>

        <div class="notifications index col-xs-12 left flex push-t push-b">
            
            <div class="instructions col-xs-12 left inline">
                <h2>Notifications</h2>
                <p>Add contacts to receive notice status updates.</p>
            </div>
            
	       <?php echo $this->Form->create('Notification', array('url' => 'finish/' . $notice_id));?>
            
            <table cellpadding="0" cellspacing="0">
                <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>E-mail Address</th>
                        <th style="text-align:center;">Send to this person?</th>
                        <th class="actions"><?php __('Actions');?></th>
                </tr>
                <?php
                    $i = 0;
                    foreach ($notifications as $notification):
                        $class = null;
                        if ($i++ % 2 == 0) $class = ' class="altrow"';
                ?>
                <tr<?php echo $class;?>>
                    <td><?php echo $notification['NotificationNotice']['first_name']; ?>&nbsp;</td>
                    <td><?php echo $notification['NotificationNotice']['last_name']; ?>&nbsp;</td>
                    <td><?php echo $notification['NotificationNotice']['email_address']; ?>&nbsp;</td>
                    <td><?php echo $this->Form->input('NotificationNotice.' . $i . '.send', array('label' => '', 'type' => 'checkbox', 'checked' => true, 'value' => $notification['NotificationNotice']['id'], 'style' => 'float:none;text-align:center;', 'div' => array('style' => 'text-align:center;')));?></td>
                    <td class="actions">
                        <?php 
                  echo $this->Html->link(
                      __('Remove', true),
                      array('action' => 'delete', $notice_id, $notification['NotificationNotice']['id']),
                      null,
                      String::insert(__('Are you sure you want to remove :param1 :param2?', true), array('param1' => $notification['NotificationNotice']['first_name'], 'param2' => $notification['NotificationNotice']['last_name']))
                  );
                  ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            
        </div>
        
        <div class="col-xs-12 inline left">
            <div class="btn-blue col-xs-3 center left">
                <?php echo $this->Html->link('Add Contact', array('controller' => 'notification_notices', 'action' => 'add', $notice_id), array('escape' => false)); ?>
            </div>
            <?php if ($notifications) { ?>
            <div class="btn-blue col-xs-3 center left">
                <?php echo $this->Form->submit('/img/btn_continue.png', array('type' => 'Continue', 'type' => 'image', 'style' => 'width:129px; height:29px; display:block;')); ?>
            </div>
            <?php  } 
            echo $this->Form->end();
            ?>
        </div>
        
        <p class="col-xs-12 left inline"><a href="/index.php/notices/edit/<?php echo $notice_id; ?>">Back</a></p>
    
    </div>
    
</div>


<?php include '/app/webroot/files/alert_popup.inc';?>