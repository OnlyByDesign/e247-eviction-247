<div id="wrapper" class="acc center fm-lease">
        
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">lease <span>notifications</span></h1>
            </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/pexels-photo-acc.jpeg"></div>
    </div>
        
    <div class="content col-xs-10 center">
            
        <div class="progress center col-xs-9">
                <i class="pg_icon inline center fas fa-plus"></i>
                <div class="pg_strike inline center"></div>
                <i class="pg_icon inline center fas fa-dollar-sign"></i>
                <div class="pg_strike inline center"></div>
                <i class="pg_icon inline center far fa-file-alt current"></i>
                <div class="pg_strike inline center"></div>
                <i class="pg_icon inline center far fa-bell"></i>
                <div class="pg_strike inline center"></div>
                <i class="pg_icon inline center fas fa-check"></i>
                <div class="progress_alt center col-xs-12">
                    <span class="pg_text step center inline">Start</span>
					<span class="pg_text step center inline">Property</span>
					<span class="pg_text step center inline">Managing</span>
					<span class="pg_text step center inline">Lease</span>
                    <span class="pg_text step center inline">Additional</span>
                    <span class="pg_text step center inline">Maintenance</span>
                    <span class="pg_text step center inline">Utilities</span>
                    <span class="pg_text step center inline">Provisions</span>
                    <span class="pg_text step center inline">Addendum</span>
                </div>
            </div>
            
        <div class="info col-xs-12 center clearfix leases form">

            <h3 style="left col-xs-12 center">Add contacts to receive lease status updates.</h3>

            <div class="notifications index push-t">
                <?php echo $this->Form->create('Notification', array('url' => 'finish/' . $lease_id));?>

                <h2><?php __('Notifications');?></h2>
                <table class="col-xs-12 center left push-b" cellpadding="0" cellspacing="0">
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
                        <td><?php echo $notification['NotificationLease']['first_name']; ?>&nbsp;</td>
                        <td><?php echo $notification['NotificationLease']['last_name']; ?>&nbsp;</td>
                        <td><?php echo $notification['NotificationLease']['email_address']; ?>&nbsp;</td>
                        <td><?php echo $this->Form->input('NotificationLease.' . $i . '.send', array('label' => '', 'type' => 'checkbox', 'checked' => true, 'value' => $notification['NotificationLease']['id'], 'style' => 'float:none;text-align:center;', 'div' => array('style' => 'text-align:center;')));?></td>
                        <td class="actions">
                            <?php 
                      echo $this->Html->link(
                          __('Remove', true),
                          array('action' => 'delete', $lease_id, $notification['NotificationLease']['id']),
                          null,
                          String::insert(__('Are you sure you want to remove :param1 :param2?', true), array('param1' => $notification['NotificationLease']['first_name'], 'param2' => $notification['NotificationLease']['last_name']))
                      );
                      ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <a href="/index.php/leases/edit/<?php echo $lease_id; ?>">
                <div class="btn-blue input col-xs-3 center inline left">
                    Back
                </div></a>
                <?php
                    echo $this->Html->link('<p class="center inline">Add Contact</p>', array('controller' => 'notification_leases', 'action' => 'add', $lease_id),array('escape' => false));
                    if ($notifications) {
                        echo $this->Form->submit('Submit lease', array(
                            'type' => 'submit',
                            'div' => array(
                                'class' => 'fm_input fm_text col-xs-3 inline center right'),
                            'class' => 'btn-blue input'
                        ));
                    }
                    echo $this->Form->end();
                 ?>
            </div>
        </div>
    </div>
</div>


<?php include '/app/webroot/files/alert_popup.inc';?>