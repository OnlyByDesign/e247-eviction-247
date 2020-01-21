<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main">User <span><?php echo  __('Profiles');?></span></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/7.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="profiles index inline col-xs-12 left push-t push-b">

            <div class="actions col-xs-12 left inline push-b">
                <div class="btn-blue col-xs-2 inline left">
                    <?php echo $this->Html->link(String::insert(__('New :param1', true), array('param1' => __('Profile', true))), array('action' => 'add')); ?>
                </div>
                <div class="col-xs-3 left inline push-l">
                    <p class="col-xs-5-2 input center inline"><strong><?php echo $this->Html->link(String::insert(__('List :param1', true), array('param1' => __('Users', true))), array('controller' => 'users', 'action' => 'index')); ?></strong></p>
                    <p class="col-xs-5-2 input center inline"><strong><?php echo $this->Html->link(String::insert(__('New :param1', true), array('param1' => __('User', true))), array('controller' => 'users', 'action' => 'add')); ?></strong></p>
                </div>
            </div>

            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <!--th><?php echo $this->Paginator->sort('id');?></th-->
                    <th><?php echo $this->Paginator->sort('user_id');?></th>
                    <th><?php echo $this->Paginator->sort('first_name');?></th>
                    <th><?php echo $this->Paginator->sort('last_name');?></th>
                    <!--th><?php echo $this->Paginator->sort('mailing_address1');?></th>
                    <th><?php echo $this->Paginator->sort('mailing_address2');?></th>
                    <th><?php echo $this->Paginator->sort('city');?></th>
                    <th><?php echo $this->Paginator->sort('state');?></th>
                    <th><?php echo $this->Paginator->sort('zip_code');?></th-->
                    <th><?php echo $this->Paginator->sort('primary_phone_number');?></th>
                    <th><?php echo $this->Paginator->sort('cell_phone_number');?></th>
                    <!--th><?php echo $this->Paginator->sort('fax_number');?></th-->
                    <th><?php echo $this->Paginator->sort('email_address');?></th>
                    <!--th><?php echo $this->Paginator->sort('company_name');?></th-->
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
                    <!--td><?php echo $profile['Profile']['id']; ?>&nbsp;</td-->
                    <td>
                        <?php echo $this->Html->link($profile['User']['username'], array('controller' => 'users', 'action' => 'view', $profile['User']['id'])); ?>
                    </td>
                    <td><?php echo $profile['Profile']['first_name']; ?>&nbsp;</td>
                    <td><?php echo $profile['Profile']['last_name']; ?>&nbsp;</td>
                    <!--td><?php echo $profile['Profile']['mailing_address1']; ?>&nbsp;</td>
                    <td><?php echo $profile['Profile']['mailing_address2']; ?>&nbsp;</td>
                    <td><?php echo $profile['Profile']['city']; ?>&nbsp;</td>
                    <td><?php echo $profile['Profile']['state']; ?>&nbsp;</td>
                    <td><?php echo $profile['Profile']['zip_code']; ?>&nbsp;</td-->
                    <td><?php echo $profile['Profile']['primary_phone_number']; ?>&nbsp;</td>
                    <td><?php echo $profile['Profile']['cell_phone_number']; ?>&nbsp;</td>
                    <!--td><?php echo $profile['Profile']['fax_number']; ?>&nbsp;</td-->
                    <td><?php echo $profile['Profile']['email_address']; ?>&nbsp;</td>
                    <!--td><?php echo $profile['Profile']['company_name']; ?>&nbsp;</td-->
                    <td class="actions">
                        <?php echo $this->Html->link(__('View', true), array('action' => 'view', $profile['Profile']['id'])); ?>
                        <br />
                        <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $profile['User']['id'])); ?>
                        <br />
                        <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $profile['Profile']['id']), null, String::insert(__('Are you sure you want to delete :first :last?', true), array('first' => $profile['Profile']['first_name'], 'last' => $profile['Profile']['last_name']))); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>

            <p class="col-xs-12 inline center"> <?php echo $this->Paginator->counter(array('format' => 'Page {:page} of {:pages}, showing {:current} records out of {:count} total')); ?>  </p>

            <div class="paging col-xs-12 inline center">
                <?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?> | <?php echo $this->Paginator->numbers();?> | <?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
            </div>

        </div>

    </div>
    
</div>
