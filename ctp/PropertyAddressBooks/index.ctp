<div id="wrapper" class="acc center fm-lease">
        
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">property address book</h1>
            </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/2.jpeg"></div>
    </div>
    
    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_account')); ?>
    </div>
        
    <div class="content col-xs-10 center">
        
        <div class="actions right col-xs-12">
            <div class="btn-blue col-xs-2 center left">
                <?php echo $this->Html->link(String::insert(__('Add a New :action', true), array('action' => __('Entry', true))), array('action' => 'add')); ?>
            </div>
        </div>

        <div class="entry index col-xs-12 center left push-b push-t">
            
            <table cellpadding="0" cellspacing="0">
                
                <tr>
                    <th><?php echo $this->Paginator->sort('Address');?></th>
                    <th><?php echo $this->Paginator->sort('Unit No.');?></th>
                    <th><?php echo $this->Paginator->sort('City');?></th>
                    <th><?php echo $this->Paginator->sort('Zip code');?></th>
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
                    <td><?php echo $entry['PropertyAddressBook']['street_address1']; ?>&nbsp;</td>
                    <td><?php echo $entry['PropertyAddressBook']['street_address2']; ?>&nbsp;</td>
                    <td><?php echo $entry['PropertyAddressBook']['city']; ?>&nbsp;</td>
                    <td><?php echo $entry['PropertyAddressBook']['zip_code']; ?>&nbsp;</td>
                    <td class="actions col-xs-4 right">
                        <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $entry['PropertyAddressBook']['id'])) . ' |'; ?>
                        <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $entry['PropertyAddressBook']['id']), null, String::insert(__('Are you sure you want to delete :param1?', true), array('param1' => $entry['PropertyAddressBook']['street_address1']))); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                
            </table>

            <p class="col-xs-12 center inline">
                <?php
                    echo $this->Paginator->counter(array(
                        'format' =>'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'
                    ));
                ?>
            </p>

            <div class="paging col-xs-12 center inline">
                <?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
             | 	<?php echo $this->Paginator->numbers();?>
         |
                <?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
            </div>
        </div>
    </div>
</div>