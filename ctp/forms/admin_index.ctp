<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
            <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">Manage <span>Forms</span></h1>
            </div>
            <div class="hr_over"></div>
            <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/6.jpg"></div>
        </div>
        
        <div class="db_tab col-xs-12 center">
            <?php echo $this->element('admin_tabs', array('currentTab' => 'my_account')); ?>
        </div>
    
        <div class="content col-xs-8 center">
            
            <div class="actions btn-blue col-xs-2 center input left">
                <?php echo $this->Html->link(String::insert(__('New :param1', true), array('param1' => __('Form', true))), array('action' => 'add')); ?>
            </div>

            <div class="forms index inline col-xs-12 left push-t">
                
                <h2><?php __('Forms');?></h2>
                
                <table class="col-xs-12 center left" cellpadding="0" cellspacing="0">
                    <tr>
                      <th>Title</th>
                      <th>Filename</th>
                        <th class="actions"><?php __('Actions');?></th>
                    </tr>
                    <?php
                    $i = 0;
                    foreach ($forms as $form):
                        $class = null;
                        if ($i++ % 2 == 0) {
                            $class = ' class="altrow"';
                        }
                    ?>
                    <tr<?php echo $class;?>>
                        <td><?php echo $form['Form']['title']; ?>&nbsp;</td>
                        <td><?php echo $form['Form']['filename']; ?>&nbsp;</td>
                        <td class="actions">
                            <?php echo $this->Html->link(
                                'Edit',
                                array('action' => 'edit', $form['Form']['id'])
                            );
                            ?>
                            |
                            <?php echo $this->Html->link(
                                __('Delete', true),
                                array('action' => 'delete', $form['Form']['id']),
                                null,
                                String::insert(__('Are you sure you want to delete :param1?', true), array('param1' => $form['Form']['title'])));
                            ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    
                </table>
                
            </div>
            
        </div>
    
</div>