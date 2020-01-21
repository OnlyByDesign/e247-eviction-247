<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>manage</span> provisions</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/3.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="actions col-xs-12 inline">
            <div class="btn-blue col-xs-2 center left">
                <?php echo $this->Html->link(String::insert(__('Add :param1', true), array('param1' => __('Provision', true))), array('action' => 'add', $lease_id)); ?>
            </div>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(String::insert(__('New :param1', true), array('param1' => __('Provision', true))), array('action' => 'new', $lease_id)); ?></strong></p>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(String::insert(__('Back to :param1', true), array('param1' => __('Lease', true))), array('controller' => 'leases', 'action' => 'edit', $lease_id)); ?></strong></p>
        </div>

        <div class="provisions index col-xs-12 left flex push-t push-b">
            
            <table cellpadding="0" cellspacing="0">
                <tr>
                  <th>Description</th>
                  <th>Approved?</th>
                        <th class="actions"><?php __('Actions');?></th>
                </tr>
                <?php
                $i = 0;
                foreach ($provisions as $provision):
                $class = null;
                if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
                }
                ?>
                <tr<?php echo $class;?>>
                    <td><?php echo $provision['LeaseProvision']['description']; ?>&nbsp;</td>
                    <td><?php echo ($provision['LeaseProvision']['is_approved'] == 1) ? "Yes" : "No"; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link('Edit',array('action' => 'edit', $provision['LeaseProvision']['id']));
                        echo ' | ';
                        echo $this->Html->link(__('Remove', true), array('action' => 'remove', $lease_id, $provision['LeaseProvision']['id']), null, 'Are you sure you want to remove this provision?');
                        echo $this->Html->link(__('Delete from List', true), array('action' => 'delete', $lease_id, $provision['LeaseProvision']['id']), null, 'Are you sure you want to delete this provision permanently?');
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>

        </div>
        
    </div>
    
</div>