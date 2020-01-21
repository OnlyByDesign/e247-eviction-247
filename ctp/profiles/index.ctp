<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main">manage <span>profiles</span></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/4.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_account')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="actions col-xs-12 inline">
            <div class="btn-blue col-xs-2 center left">
                <?php echo $this->Html->link(String::insert(__('New :action', true), array('action' => __('Profile', true))), array('action' => 'add')); ?>
            </div>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(String::insert(__('List :action', true), array('action' => __('Users', true))), array('controller' => 'users', 'action' => 'index')); ?></strong></p>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(String::insert(__('New :action', true), array('action' => __('User', true))), array('controller' => 'users', 'action' => 'add')); ?></strong></p>
        </div>

        <div class="profiles index col-xs-12 left flex push-t push-b">
            
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th><?php echo $this->Paginator->sort('id');?></th>
                    <th><?php echo $this->Paginator->sort('user_id');?></th>
                    <th><?php echo $this->Paginator->sort('first_name');?></th>
                    <th><?php echo $this->Paginator->sort('last_name');?></th>
                    <th><?php echo $this->Paginator->sort('mailing_address1');?></th>
                    <th><?php echo $this->Paginator->sort('mailing_address2');?></th>
                    <th><?php echo $this->Paginator->sort('city');?></th>
                    <th><?php echo $this->Paginator->sort('state');?></th>
                    <th><?php echo $this->Paginator->sort('zip_code');?></th>
                    <th><?php echo $this->Paginator->sort('primary_phone_number');?></th>
                    <th><?php echo $this->Paginator->sort('cell_phone_number');?></th>
                    <th><?php echo $this->Paginator->sort('fax_number');?></th>
                    <th><?php echo $this->Paginator->sort('email_address');?></th>
                    <th><?php echo $this->Paginator->sort('company_name');?></th>
                    <th class="actions"><?php __('Actions');?></th>
                </tr>
                
                <?php
                $i = 0;
                foreach ($profiles as $profile):
                    $class = null;
                    if ($i++ % 2 == 0) {
                        $class = ' class="altrow"';
                    }
                ?>

                <tr<?php echo $class;?>>
                    <td><?php echo $profile['Profile']['id']; ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($profile['User']['id'], array('controller' => 'users', 'action' => 'view', $profile['User']['id'])); ?>
                    </td>
                    <td><?php echo $profile['Profile']['first_name']; ?>&nbsp;</td>
                    <td><?php echo $profile['Profile']['last_name']; ?>&nbsp;</td>
                    <td><?php echo $profile['Profile']['mailing_address1']; ?>&nbsp;</td>
                    <td><?php echo $profile['Profile']['mailing_address2']; ?>&nbsp;</td>
                    <td><?php echo $profile['Profile']['city']; ?>&nbsp;</td>
                    <td><?php echo $profile['Profile']['state']; ?>&nbsp;</td>
                    <td><?php echo $profile['Profile']['zip_code']; ?>&nbsp;</td>
                    <td><?php echo $profile['Profile']['primary_phone_number']; ?>&nbsp;</td>
                    <td><?php echo $profile['Profile']['cell_phone_number']; ?>&nbsp;</td>
                    <td><?php echo $profile['Profile']['fax_number']; ?>&nbsp;</td>
                    <td><?php echo $profile['Profile']['email_address']; ?>&nbsp;</td>
                    <td><?php echo $profile['Profile']['company_name']; ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View', true), array('action' => 'view', $profile['Profile']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $profile['Profile']['id'])); ?>
                        <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $profile['Profile']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $profile['Profile']['id'])); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            
        </div>
        
        <p class="col-xs-12 center inline">
            <?php echo $this->Paginator->counter(array( 'format' =>'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}' )); ?>
        </p>

        <div class="paging col-xs-12 center inline">
            <?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?> | <?php echo $this->Paginator->numbers();?> | <?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
        </div>

    </div>
    
</div>