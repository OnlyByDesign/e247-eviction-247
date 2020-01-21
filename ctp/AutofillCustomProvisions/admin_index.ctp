<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main">manage custom <span>provisions</span></h1>
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
                <?php echo $this->Html->link(String::insert(__('New :param1', true), array('param1' => __('Custom Provision', true))), array('action' => 'add', $user_id)); ?>
            </div>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(String::insert(__('Back to :param1', true), array('param1' => __('User', true))), array('controller' => 'users', 'action' => 'view', $user_id)); ?></strong></p>
        </div>

        <div class="provisions index col-xs-12 left flex push-t push-b">
            
            <table cellpadding="0" cellspacing="0">
                <tr>
                  <th>Description</th>
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
                    <td><?php echo $provision['AutofillCustomProvision']['description']; ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(
                            'Edit',
                            array('action' => 'edit', $provision['AutofillCustomProvision']['id'])
                        );
                        ?>
                        |
                        <?php echo $this->Html->link(
                      __('Delete', true),
                      array('action' => 'delete', $user_id, $provision['AutofillCustomProvision']['id']),
                      null,
                      'Are you sure you want to delete this custom provision?');
                  ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            
        </div>
        
    </div>
    
</div>