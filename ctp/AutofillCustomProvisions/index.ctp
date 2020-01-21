<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main">manage custom <span>provisions</span></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/6.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_account')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="actions col-xs-12 inline">
            <div class="btn-blue col-xs-3 center left">
                <?php echo $this->Html->link(String::insert(__('New :param1', true), array('param1' => __('Provision', true))), array('action' => 'add')); ?>
            </div>
        </div>

        <div class="provisions index col-xs-12 left flex push-t push-b">
            
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th>Description</th>
                    <th class="actions"><?php __('Actions');?></th>
                </tr>
                <?php
                $i = 0;
                foreach ($autofill_custom_provisions as $autofill_custom_provision):
                    $class = null;
                    if ($i++ % 2 == 0) {
                        $class = ' class="altrow"';
                    }
                ?>
                <tr<?php echo $class;?>>
                    <td><?php echo $autofill_custom_provision['AutofillCustomProvision']['description']; ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(
                            'Edit',
                            array('action' => 'edit', $autofill_custom_provision['AutofillCustomProvision']['id'])
                        );
                        ?>
                        |
                        <?php echo $this->Html->link(
                            __('Delete', true),
                            array('action' => 'delete', $autofill_custom_provision['AutofillCustomProvision']['id']),
                            null,
                            String::insert(__('Are you sure you want to delete :param1?', true), array('param1' => $autofill_custom_provision['AutofillCustomProvision']['description'])));
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            
        </div>
        
    </div>
    
</div>