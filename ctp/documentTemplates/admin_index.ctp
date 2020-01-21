<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        
            <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">Document <span>Templates</span></h1>
            </div>
            <div class="hr_over"></div>
            <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/5.jpg"></div>
        </div>
        
        <div class="db_tab col-xs-12 center">
            <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
        </div>
    
        <div class="content col-xs-10 center">            

                <div class="action inline left col-xs-6">
                        
                        <div class="btn-blue col-xs-5-2 input center left">
                            <?php echo $this->Html->link(String::insert(__('New :param1', true), array('param1' => __('Document Template'), true)), array('action' => 'add')); ?>
                        </div>
                        <?php if ($county != "base"): ?>
                        <div class="btn-blue col-xs-5-2 input center right">
                            <?php echo $this->Html->link(__('Switch To Base Documents', true), array('admin' => true, 'controller' => 'document_templates', 'action' => 'index', 'base'));?>
                        </div>
                        <?php else: ?>
                        <div class="btn-blue col-xs-5-2 input center right">
                            <?php echo $this->Html->link(__('Switch To County Documents', true), array('admin' => true, 'controller' => 'document_templates', 'action' => 'index'));?>
                        </div>
                        <?php endif; ?>
                        
                </div>
            
                <p class="col-xs-12 left inline push-t"><strong>
                        <?php
                            if ($county == "base") echo "Base ";
                            else echo "County ";
                            echo __('Document Templates');
                        ?>
                    </strong></p>
                
                <div class="documentTemplates index inline col-xs-12 left push-t">
                    
                    <table class="col-xs-12 center left push-b" cellpadding="0" cellspacing="0">
                        
                    <tr>
                            <!--th><?php echo $this->Paginator->sort('id');?></th-->
                            <th><?php echo $this->Paginator->sort('state');?></th>
                            <?php //if ($county != "base") { ?>
                            <th><?php echo $this->Paginator->sort('county_id');?></th>
                            <?php //} ?>
                            <th><?php echo $this->Paginator->sort('order');?></th>
                            <th><?php echo $this->Paginator->sort('name');?></th>
                            <th><?php echo $this->Paginator->sort('Service.name');?></th>
                            <!-- th><?php echo $this->Paginator->sort('is_multiple');?></th -->
                            <th class="actions"><?php __('Actions');?></th>
                    </tr>
                    <?php
                    $i = 0;
                    foreach ($documentTemplates as $documentTemplate):
                        $class = null;
                        if ($i++ % 2 == 0) {
                            $class = ' class="altrow"';
                        }
                    ?>
                    <tr<?php echo $class;?>>
                        <!--td><?php echo $documentTemplate['DocumentTemplate']['id']; ?>&nbsp;</td-->
                        <td><?php echo $documentTemplate['County']['state']; ?></td>
                        <?php //if ($county != "base") { ?>
                        <td><?php echo $documentTemplate['County']['name']; ?></td>
                        <?php //} ?>
                        <td><?php echo $documentTemplate['DocumentTemplate']['order']; ?>&nbsp;</td>
                        <td><?php echo $documentTemplate['DocumentTemplate']['name']; ?>&nbsp;</td>
                        <td><?php echo $documentTemplate['Service']['name']; ?>&nbsp;</td>
                        <!-- td><?php echo $documentTemplate['DocumentTemplate']['is_multiple']; ?>&nbsp;</td -->
                        <td class="actions">
                            <?php
                        echo $this->Html->link('Preview', array('action' => 'preview', $documentTemplate['DocumentTemplate']['id']), array('target' => '_blank'));
                                echo ' | ';
                                echo $this->Html->link(__('Edit', true), array('action' => 'edit', $documentTemplate['DocumentTemplate']['id']));
                                echo ' | ';
                                echo $this->Html->link(__('Delete', true), array('action' => 'delete', $documentTemplate['DocumentTemplate']['id']), null, String::insert(__('Are you sure you want to delete ":param1"?', true), array('param1' => $documentTemplate['DocumentTemplate']['name'])));
                      ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                    </table>
                    <p class="col-xs-12 center push-t">
                        <?php
                            echo $this->Paginator->counter(array(
                                'format' =>'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'
                            ));
                        ?>
                    </p>

                    <div class="paging col-xs-12 center">
                        <?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class' => 'disabled'));?>
                     | 	<?php echo $this->Paginator->numbers();?>
                 |
                        <?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
                    </div>
                </div>
    </div>
</div>