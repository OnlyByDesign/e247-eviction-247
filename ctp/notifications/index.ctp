<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main">Notifications</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/7.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_account')); ?>
    </div>

    <div class="content col-xs-8 center">

        <p class="col-xs-12 left inline">Add contacts to receive eviction status updates.</p>

        <div class="notifications index inline col-xs-12 left push-t push-b">

            <?php echo $this->Form->create('Notification', array('url' => 'finish/' . $eviction_id));?>

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
                    <td><?php echo $notification['Notification']['first_name']; ?>&nbsp;</td>
                    <td><?php echo $notification['Notification']['last_name']; ?>&nbsp;</td>
                    <td><?php echo $notification['Notification']['email_address']; ?>&nbsp;</td>
                    <td><?php echo $this->Form->input('Notification.' . $i . '.send', array('label' => '', 'type' => 'checkbox', 'checked' => true, 'value' => $notification['Notification']['id'], 'style' => 'float:none;text-align:center;', 'div' => array('style' => 'text-align:center;')));?></td>
                    <td class="actions">
                    <?php echo $this->Html->link(__('Remove', true), array('action' => 'delete', $eviction_id, $notification['Notification']['id']), null, String::insert(__('Are you sure you want to remove :param1 :param2?', true), array('param1' => $notification['Notification']['first_name'], 'param2' => $notification['Notification']['last_name']))); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php
            echo '<div>';
            echo $this->Html->link($this->Html->image('/img/btn_add_contact.png'), array('controller' => 'notifications', 'action' => 'add', $eviction_id), array('escape' => false));
            echo '</div>';

            if ($notifications) {
                echo '<div style="display:inline-block;margin-left:20px;"';
                echo $this->Form->submit('/img/btn_continue.png', array('type' => 'Continue', 'type' => 'image', 'style' => 'width:129px; height:29px; display:block;'));
                echo '</div>';
            }
            echo $this->Form->end();
            ?>

            <a href="/index.php/evictions/edit/<?php echo $eviction_id; ?>"><p>Back</p></a>

        </div>

    </div>
    
</div>


<?php include '/app/webroot/files/alert_popup.inc';?>