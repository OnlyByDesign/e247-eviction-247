<div id="wrapper" class="acc center fm-create">
    
        <div class="hero col-xs-12 center">
            <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">Address Book for <span><?php echo $user_name; ?></span></h1>
            </div>
            <div class="hr_over"></div>
            <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/5.jpg"></div>
        </div>
        
        <div class="db_tab col-xs-12 center">
            <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
        </div>
    
        <div class="content col-xs-8 center">
            
            <div class="entry index inline col-xs-12 left push-t push-b">

                <div class="actions col-xs-6 left inline push-b">
                    <div class="btn-blue col-xs-5-2 center left">
                        <?php echo $this->Html->link(String::insert(__('Add a New :action', true), array('action' => __('Contact', true))), array('action' => 'add', $user_id)); ?>
                    </div>
                    <div class="btn-blue col-xs-5-2 center right">
                        <?php echo $this->Html->link('Back to User Profile', array('controller' => 'users', 'action' => 'view', $user_id)); ?>
                    </div>                    
                </div>
                
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th><?php echo $this->Paginator->sort('First name');?></th>
                        <th><?php echo $this->Paginator->sort('Last name');?></th>
                        <th><?php echo $this->Paginator->sort('Address');?></th>
                        <th><?php echo $this->Paginator->sort('Unit No.');?></th>
                        <th><?php echo $this->Paginator->sort('City');?></th>
                        <th><?php echo $this->Paginator->sort('State');?></th>
                        <th><?php echo $this->Paginator->sort('County');?></th>
                        <th><?php echo $this->Paginator->sort('Zip code');?></th>
                        <!--th><?php echo $this->Paginator->sort('Company');?></th>
                        <th><?php echo $this->Paginator->sort('Phone number');?></th-->
                        <th class="actions"><?php __('Actions');?></th>
                    </tr>
                    <?php
                        $i = 0;
                        foreach ($entries as $entry):
                            $class = null;
                            if ($i++ % 2 == 0) {
                                $class = ' class="altrow"';
                            }
                    ?>
                    <tr<?php echo $class;?>>
                        <td><?php echo $entry['AddressBook']['first_name']; ?>&nbsp;</td>
                        <td><?php echo $entry['AddressBook']['last_name']; ?>&nbsp;</td>
                        <td><?php echo $entry['AddressBook']['street_address1']; ?>&nbsp;</td>
                        <td><?php echo $entry['AddressBook']['street_address2']; ?>&nbsp;</td>
                        <td><?php echo $entry['AddressBook']['city']; ?>&nbsp;</td>
                        <td><?php echo $entry['AddressBook']['state']; ?>&nbsp;</td>
                        <td><?php echo $entry['County']['name']; ?>&nbsp;</td>
                        <td><?php echo $entry['AddressBook']['zip_code']; ?>&nbsp;</td>
                        <!--td><?php echo $entry['AddressBook']['company_name']; ?>&nbsp;</td>
                        <td><?php echo $entry['AddressBook']['phone_number']; ?>&nbsp;</td-->
                        <td class="actions">
                            <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $entry['AddressBook']['id'], $user_id)) . ' |'; ?>
                            <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $entry['AddressBook']['id'], $user_id), null, String::insert(__('Are you sure you want to delete :param1?', true), array('param1' => $entry['AddressBook']['first_name'] . ' ' . $entry['AddressBook']['last_name']))); ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>

                <p class="col-xs-12 center inline push-t">
                    <?php echo $this->Paginator->counter(array('format' =>'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}' )); ?>
                </p>

                <div class="paging col-xs-12 center inline">
                    <?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class' => 'disabled'));?> | <?php echo $this->Paginator->numbers();?> | <?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
                </div>

            </div>
            
        </div>
    
</div>

<?php include '/app/webroot/files/alert_popup.inc';?>