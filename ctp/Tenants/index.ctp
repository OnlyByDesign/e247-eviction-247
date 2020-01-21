<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>View</span> Tenenats</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/7.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_account')); ?>
    </div>

    <div class="content col-xs-10 center">

        <?php if ($tenant_count < $tenants_number) { ?>
            <div class="actions col-xs-12 inline">
                <div class="btn-blue col-xs-2 center left">
                    <?php
                    $link_title = 'Add a tenant';
                    if ($tenant_count > 0) {
                        $link_title = 'Add the next tenant';
                    }
                    echo $this->Html->link(
                        $link_title,
                        array('action' => 'add', $lease_id)
                    );
                    ?>
                </div>
            </div>
        <?php } ?>

        <div class="tenants index col-xs-12 left flex push-t push-b">

            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th class="actions"></th>
                </tr>
                <?php
                $i = 0;
                foreach ($tenants as $tenant):
                $class = null;
                if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
                }
                ?>
                <tr<?php echo $class;?>>
                    <td><?php echo $tenant['Tenant']['first_name']; ?>&nbsp;</td>
                    <td><?php echo $tenant['Tenant']['middle_name']; ?>&nbsp;</td>
                    <td><?php echo $tenant['Tenant']['last_name']; ?>&nbsp;</td>
                    <td class="actions">
                        <?php
                        echo $this->Html->link(
                            'Delete',
                            array('action' => 'delete', $lease_id, $tenant['Tenant']['id']),
                            null,
                            String::insert(
                                __('Are you sure you want to delete :param1 :param2?', true),
                                array('param1' => $tenant['Tenant']['first_name'],
                                            'param2' => $tenant['Tenant']['last_name']))
                        );
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>

        </div>

        <?php if (!empty($tenants)) { ?>
            <div class="btn-blue col-xs-3 center left">
                <?php echo $this->Html->link($this->Html->image('Save'), array('controller' => 'leases', 'action' => 'edit', $lease_id), array('escape' => false)); ?>
            </div>
        <?php } ?>

    </div>
    
</div>