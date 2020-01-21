<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main">Manage <span>Custom</span> Provisions</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/2.jpeg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-8 center">

        <div class="provisions index inline col-xs-12 left push-t push-b">

            <div class="actions col-xs-12 left inline push-b">
                <div class="btn-blue col-xs-3 center left">
                    <?php echo $this->Html->link(String::insert(__('New :param1', true), array('param1' => __('Custom Provision', true))), array('action' => 'add', $user_id)); ?>
                </div>
                <p class="push-l left inline input"><strong><?php echo $this->Html->link(String::insert(__('Back to :param1', true), array('param1' => __('User', true))), array('controller' => 'users', 'action' => 'view', $user_id)); ?></strong></p>
            </div>
            
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
                <tr <?php echo $class;?>>
                    <td><?php echo $provision['Provision']['description']; ?>&nbsp;</td>
                    <td style="text-align:center;">
                        <?php if ($provision['Provision']['is_approved'] == 1) echo 'Yes'; else echo 'No'; ?>
                    </td>
                    <td class="actions">
                        <?php echo $this->Html->link( 'Edit', array('action' => 'edit', $provision['Provision']['id'])); ?> | <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $user_id, $provision['Provision']['id']), null, 'Are you sure you want to delete this custom provision?');
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>

        </div>

    </div>
    
</div>