<div id="wrapper" class="acc center fm-create">
    
        <div class="hero col-xs-12 center">
            <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">Counties <span><?php __('Actions'); ?></span></h1>
            </div>
            <div class="hr_over"></div>
            <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/5.jpg"></div>
        </div>
        
        <div class="db_tab col-xs-12 center">
            <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
        </div>
    
        <div class="content col-xs-10 center">
            
            <div class="counties index inline col-xs-12 left push-t push-b">

                <div class="actions col-xs-12 center inline">
                    <div class="btn-blue col-xs-3 center left">
                        <?php echo $this->Html->link(String::insert(__('Add a new :action', true), array('action' => __('County', true))), array('action' => 'add')); ?>
                    </div>
                </div>
                
                <table cellpadding="0" cellspacing="0" class="push-b push-t">
                    <tr>
                        <!--th><?php echo $this->Paginator->sort('id');?></th-->
                        <th><?php echo $this->Paginator->sort('name');?></th>
                        <th><?php echo $this->Paginator->sort('state');?></th>
                        <th><?php echo $this->Paginator->sort('jurisdiction');?></th>
                        <th><?php echo $this->Paginator->sort('fee');?></th>
                        <th><?php echo $this->Paginator->sort('fee_with_damages');?></th>
                        <!--th><?php echo $this->Paginator->sort('summons');?></th>
                        <th><?php echo $this->Paginator->sort('process_server');?></th>
                        <th><?php echo $this->Paginator->sort('writ');?></th>
                        <th><?php echo $this->Paginator->sort('filing_fee_eviction');?></th>
                        <th><?php echo $this->Paginator->sort('filing_fee_damages');?></th-->
                        <th><?php echo $this->Paginator->sort('use_base_documents');?></th>
                        <th class="actions"><?php __('Actions');?></th>
                    </tr>
                    <?php
                        $i = 0;
                        foreach ($counties as $county):
                            $class = null;
                            if ($i++ % 2 == 0) {
                                $class = ' class="altrow"';
                            }
                    ?>
                    <tr<?php echo $class;?>>
                        <!--td><?php echo $county['County']['id']; ?>&nbsp;</td-->
                        <td><?php echo $county['County']['name']; ?>&nbsp;</td>
                        <td><?php echo $county['County']['state']; ?>&nbsp;</td>
                        <td><?php echo $county['County']['jurisdiction']; ?>&nbsp;</td>
                        <td>$<?php echo $county['County']['fee']; ?>&nbsp;</td>
                        <td>$<?php echo $county['County']['fee_with_damages']; ?>&nbsp;</td>
                        <!--td>$<?php echo $county['County']['summons']; ?>&nbsp;</td>
                        <td>$<?php echo $county['County']['process_server']; ?>&nbsp;</td>
                        <td>$<?php echo $county['County']['writ']; ?>&nbsp;</td>
                        <td>$<?php echo $county['County']['filing_fee_eviction']; ?>&nbsp;</td>
                        <td>$<?php echo $county['County']['filing_fee_damages']; ?>&nbsp;</td-->
                        <td><?php if ($county['County']['use_base_documents']) echo "Yes"; else echo "No"; ?>&nbsp;</td>
                        <td class="actions">
                            <?php //echo $this->Html->link(__('View', true), array('action' => 'view', $county['County']['id'])) . ' |'; ?>
                            <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $county['County']['id'])) . ' |'; ?>
                            <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $county['County']['id']), null, String::insert(__('Are you sure you want to delete :param1?', true), array('param1' => $county['County']['name']))); ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>

                <p class="col-xs-12 center inline push-t">
                    <?php
                        echo $this->Paginator->counter(array(
                            'format' =>'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'
                        ));
                    ?>
                </p>

                <div class="paging col-xs-12 center inline">
                    <?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?> | <?php echo $this->Paginator->numbers();?> | <?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
                </div>

            </div>
            
    </div>
    
</div>