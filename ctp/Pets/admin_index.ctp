<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>manage</span> pets</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/7.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="actions col-xs-12 inline">
            <div class="btn-blue col-xs-2 center left">
                <?php echo $this->Html->link(String::insert(__('New :param1', true), array('param1' => __('Pet', true))), array('action' => 'add', $lease_id)); ?>
            </div>
            <p class="left inline push-l center"><strong><?php echo $this->Html->link(String::insert(__('Back to :param1', true), array('param1' => __('Lease', true))), array('controller' => 'leases', 'action' => 'edit', $lease_id)); ?></strong></p>
        </div>

        <div class="pets index col-xs-12 left flex push-t push-b">
            
            <table cellpadding="0" cellspacing="0">
                <tr>
                  <th>Type</th>
                  <th>Breed</th>
                  <th>Color</th>
                  <th>Weight</th>
                  <th>Name</th>
                        <th class="actions"><?php __('Actions');?></th>
                </tr>
                <?php
                $i = 0;
                foreach ($pets as $pet):
                    $class = null;
                    if ($i++ % 2 == 0) {
                        $class = ' class="altrow"';
                    }
                ?>
                <tr<?php echo $class;?>>
                    <td><?php echo $pet['Pet']['type']; ?>&nbsp;</td>
                    <td><?php echo $pet['Pet']['breed']; ?>&nbsp;</td>
                    <td><?php echo $pet['Pet']['color']; ?>&nbsp;</td>
                    <td><?php echo $pet['Pet']['weight']; ?>&nbsp;</td>
                    <td><?php echo $pet['Pet']['name']; ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(
                            'Edit',
                            array('action' => 'edit', $pet['Pet']['id'])
                        );
                        ?>
                        |
                        <?php echo $this->Html->link(
                            __('Delete', true),
                            array('action' => 'delete', $lease_id, $pet['Pet']['id']),
                            null,
                            String::insert(__('Are you sure you want to delete :param1?', true), array('param1' => $pet['Pet']['name'])));
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>

        </div>
        
    </div>
    
</div>