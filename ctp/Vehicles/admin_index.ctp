<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main">Manage <span>Vehicles</span></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/3.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-8 center">

        <div class="actions col-xs-12 inline left">
            <div class="btn-blue col-xs-2 center left">
                <?php echo $this->Html->link(String::insert(__('New :param1', true), array('param1' => __('Vehicle', true))), array('action' => 'add', $lease_id)); ?>
            </div>
            <p class="left input inline push-l"><strong><?php echo $this->Html->link(String::insert(__('Back to :param1', true), array('param1' => __('Lease', true))), array('controller' => 'leases', 'action' => 'edit', $lease_id)); ?></strong></p>
        </div>

        <div class="vehicles index inline col-xs-12 left push-t push-b">

            <table cellpadding="0" cellspacing="0">
                <tr>
                  <th>Type</th>
                  <th>Make</th>
                  <th>Model</th>
                  <th>Color</th>
                  <th>License</th>
                        <th class="actions"><?php __('Actions');?></th>
                </tr>
                <?php
                    $i = 0;
                    foreach ($vehicles as $vehicle):
                        $class = null;
                        if ($i++ % 2 == 0) {
                            $class = ' class="altrow"';
                        }
                ?>
                <tr<?php echo $class;?>>
                    <td><?php echo $vehicle['Vehicle']['type']; ?>&nbsp;</td>
                    <td><?php echo $vehicle['Vehicle']['make']; ?>&nbsp;</td>
                    <td><?php echo $vehicle['Vehicle']['model']; ?>&nbsp;</td>
                    <td><?php echo $vehicle['Vehicle']['color']; ?>&nbsp;</td>
                    <td><?php echo $vehicle['Vehicle']['license']; ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(
                            'Edit',
                            array('action' => 'edit', $vehicle['Vehicle']['id'])
                        );
                        ?>
                        |
                        <?php echo $this->Html->link(
                            __('Delete', true),
                            array('action' => 'delete', $lease_id, $vehicle['Vehicle']['id']),
                            null,
                            String::insert(__('Are you sure you want to delete :param1 :param2?', true), array('param1' => $vehicle['Vehicle']['make'], 'param2' => $vehicle['Vehicle']['model'])));
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>