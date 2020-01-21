<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>manage</span> occupants</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/5.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="actions col-xs-12 inline">
            <div class="btn-blue col-xs-2 center left">
                <?php echo $this->Html->link(String::insert(__('New :param1', true), array('param1' => __('Occupant', true))), array('action' => 'add', $lease_id)); ?>
            </div>
            <p class="left inline push-l center"><strong><?php echo $this->Html->link(String::insert(__('Back to :param1', true), array('param1' => __('Lease', true))), array('controller' => 'leases', 'action' => 'edit', $lease_id)); ?></strong></p>
        </div>

        <div class="occupants index col-xs-12 left flex push-t push-b">
            
            <table cellpadding="0" cellspacing="0">
                <tr>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Last Name</th>
                        <th class="actions"><?php __('Actions');?></th>
                </tr>
                <?php
                $i = 0;
                foreach ($occupants as $occupant):
                    $class = null;
                    if ($i++ % 2 == 0) {
                        $class = ' class="altrow"';
                    }
                ?>
                <tr<?php echo $class;?>>
                    <td><?php echo $occupant['Occupant']['first_name']; ?>&nbsp;</td>
                    <td><?php echo $occupant['Occupant']['middle_name']; ?>&nbsp;</td>
                    <td><?php echo $occupant['Occupant']['last_name']; ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(
                            'Edit',
                            array('action' => 'edit', $occupant['Occupant']['id'])
                        );
                        ?>
                        |
                        <?php echo $this->Html->link(
                            __('Delete', true),
                            array('action' => 'delete', $lease_id, $occupant['Occupant']['id']),
                            null,
                            String::insert(__('Are you sure you want to delete :param1 :param2?', true), array('param1' => $occupant['Occupant']['first_name'], 'param2' => $occupant['Occupant']['last_name'])));
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            
        </div>
        
    </div>
    
</div>