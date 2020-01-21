<div id="wrapper" class="acc center fm-lease">
        
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">manage <span>custom</span> provisions</h1>
            </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/pexels-photo-acc.jpeg"></div>
    </div>
    
    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_account')); ?>
    </div>
        
    <div class="content col-xs-10 center">
        
        <h1>Provisions</h1>  

        <div class="col-xs-1 strike center"></div>
        
        <div class="actions right col-xs-12">
            <h3><?php __('Actions'); ?></h3>
            <ul>
                <li class="link">
                    <?php echo $this->Html->link(String::insert(__('Add a New :action', true), array('action' => __('Entry', true))), array('action' => 'add')); ?>
                </li>
            </ul>
        </div>

        <div class="provisions index">
            <table class="col-xs-12 center left push-b" cellpadding="0" cellspacing="0">
                <tr>
                  <th>Description</th>
                        <th class="actions"><?php __('Actions');?></th>
                </tr>
                <?php
                $i = 0;
                foreach ($provisions as $provision):
                    $class = null;
                    if ($i++ % 2 == 0) $class = ' class="altrow"';
                ?>
                <tr<?php echo $class;?>>
                    <td><?php echo $provision['Provision']['description']; ?>&nbsp;</td>
                    <td class="actions">
                  <?php echo $this->Html->link(
                      'Edit',
                      array('action' => 'edit', $provision['Provision']['id'])
                  );
                  ?>
                  |
                        <?php echo $this->Html->link(
                            __('Delete', true),
                            array('action' => 'delete', $provision['Provision']['id']),
                            null,
                            String::insert(__('Are you sure you want to delete ":param1"?', true), array('param1' => $provision['Provision']['description'])));
                  ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

<?php include '/app/webroot/files/alert_popup.inc';?>