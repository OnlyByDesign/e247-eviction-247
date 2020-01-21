<div id="wrapper" class="acc center fm-create leases index">
    
    <div class="hero col-xs-12 center">
            <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">Manage <span>Attorneys</span></h1>
            </div>
            <div class="hr_over"></div>
            <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/6.jpg"></div>
        </div>
        
        <div class="db_tab col-xs-12 center">
            <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
        </div>
    
        <div class="content col-xs-8 center">
            
            <div class="actions btn-blue col-xs-2 center input left">
                <?php echo $this->Html->link(String::insert(__('New :param1', true), array('param1' => __('Attorney', true))), array('action' => 'add')); ?>
            </div>

            <div class="forms index inline col-xs-12 left push-t">
                
                <h2><?php __('Attorneys');?></h2>
                <table class="col-xs-12 inlne left" cellpadding="0" cellspacing="0">
                    <tr>
                        <th><?php echo $this->Paginator->sort('first_name', 'First Name');?></th>
                        <th><?php echo $this->Paginator->sort('last_name', 'Last Name');?></th>
                        <th class="actions"><?php __('Actions');?></th>
                    </tr>
                    <?php
                    $i = 0;
                    foreach ($attorneys as $attorney):
                        $class = null;
                        if ($i++ % 2 == 0) {
                            $class = ' class="altrow"';
                        }
                        ?>
                        <tr<?php echo $class;?>>
                            <td><?php echo $attorney['Attorney']['first_name']; ?>&nbsp;</td>
                            <td><?php echo $attorney['Attorney']['last_name']; ?>&nbsp;</td>
                            <td class="actions">
                                <?php echo $this->Html->link(
                                    'Edit',
                                    array('action' => 'edit', $attorney['Attorney']['id'])
                                );
                                ?>
                                |
                                <?php echo $this->Html->link(
                                    __('Delete', true),
                                    array('action' => 'delete', $attorney['Attorney']['id']),
                                    null,
                                    String::insert(__('Are you sure you want to delete :param1 :param2?', true), array('param1' => $attorney['Attorney']['first_name'], 'param2' => $attorney['Attorney']['last_name'])));
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
    </div>
</div>