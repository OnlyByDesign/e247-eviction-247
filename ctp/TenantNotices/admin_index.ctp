<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main">tenant <span>notices</span></h1>
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
                <?php echo $this->Html->link(String::insert(__('New :param1', true), array('param1' => __('Tenant', true))), array('action' => 'add', $notice_id)); ?>
            </div>
            <p class="left inline push-l center"><strong><?php echo $this->Html->link(String::insert(__('Back to :param1', true), array('param1' => __('Notice', true))), array('controller' => 'notices', 'action' => 'edit', $notice_id)); ?></strong></p>
        </div>

        <div class="tenants index col-xs-12 left flex push-t push-b">
            
            <table cellpadding="0" cellspacing="0">
                <tr>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Last Name</th>
                        <th class="actions"><?php __('Actions');?></th>
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
                    <!--td><?php echo $tenant['TenantNotice']['id']; ?>&nbsp;</td-->
                    <!--td>
                        <?php echo $this->Html->link(
                            $tenant['Eviction']['id'],
                            array('controller' => 'notices', 'action' => 'edit', $tenant['Eviction']['id'])
                        ); ?>
                    </td-->
                    <td><?php echo $tenant['TenantNotice']['first_name']; ?>&nbsp;</td>
                    <td><?php echo $tenant['TenantNotice']['middle_name']; ?>&nbsp;</td>
                    <td><?php echo $tenant['TenantNotice']['last_name']; ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(
                            'Edit',
                            array('action' => 'edit', $tenant['TenantNotice']['id'])
                        );
                        ?>
                        |
                        <?php echo $this->Html->link(
                            __('Delete', true),
                            array('action' => 'delete', $notice_id, $tenant['TenantNotice']['id']),
                            null,
                            String::insert(__('Are you sure you want to delete :param1 :param2?', true), array('param1' => $tenant['TenantNotice']['first_name'], 'param2' => $tenant['TenantNotice']['last_name'])));
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>

        </div>
        
    </div>
    
</div>