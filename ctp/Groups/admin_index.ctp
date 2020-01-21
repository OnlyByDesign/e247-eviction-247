<div id="wrapper" class="acc center fm-create users index">
    
    <div class="hero col-xs-12 center">
            <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">Account <span>Groups</span></h1>
            </div>
            <div class="hr_over"></div>
            <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/3.jpg"></div>
        </div>
        
        <div class="db_tab col-xs-12 center">
            <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
        </div>
    
        <div class="content col-xs-8 center">
            
            <div class="acc_srch center col-xs-12 inline">
                
                <div class="action inline left col-xs-3">
                        
                        <div class="btn-blue col-xs-12 input center left">
                            <?php echo $this->Html->link('Add a new Group', array('action' => 'add')); ?>
                        </div>
                
                </div>
                
                <div class="col-xs-2 inline left input push-l">
                    <?php
                        echo $this->Html->link('<p class="inline col-xs-6 center" style="font-weight:bold;">Users</p>', array('controller' => 'users', 'action' => 'index'), array('escape' => false));
                        echo $this->Html->link('<p class="inline col-xs-6 center" style="font-weight:bold;">Groups</p>', array('controller' => 'groups', 'action' => 'index'), array('escape' => false));
                    ?>
                </div>
            </div>
            
            <div class="groups index info col-xs-12 center">
                    
                            <p><?php __('Groups');?></p>
                    
                            <table class="col-xs-12 left" cellpadding="0" cellspacing="0" style="display: table;">
                                <tr>
                                    <th><?php echo $this->Paginator->sort('name');?></th>
                                    <th># of Users</th>
                                    <th>Group Admin(s)</th>
                                    <th class="actions"><?php __('Actions');?></th>
                                </tr>
                                <?php
                                    $i = 0;
                                    foreach ($groups as $group):
                                        $class = null;
                                        if ($i++ % 2 == 0) {
                                            $class = 'class="altrow"';
                                        }
                                ?>
                                <tr <?php echo $class;?>>
                                    <td><?php echo $group['Group']['name']; ?>&nbsp;</td>
                                    <td><?php echo $group['Group']['UserCount']; ?></td>
                                    <td><?php echo $group['Group']['group_admin']; ?></td>
                                    <td class="actions">
                                        <?php 
                                        echo $this->Html->link(
                                            __('Edit', true),
                                            array('action' => 'edit', $group['Group']['id'])
                                        );

                                        echo ' | ';
                                      echo $this->Html->link(
                                          'Delete',
                                          array('action' => 'delete', $group['Group']['id']),
                                          null,
                                          String::insert(__('Are you sure you want to delete :param1?', true), array('param1' => $group['Group']['name']))
                                      );
                                        ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </table>

                            <p class="col-xs-12 center push-t inline">
                                <?php
                                    echo $this->Paginator->counter(array(
                                    'format' => 'Page {:page} of {:pages}, showing {:current} records out of {:count} total'
                                    ));
                                ?>
                            </p>

                            <div class="paging push-t">
                                <?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class' => 'disabled'));?>
                             | 	<?php echo $this->Paginator->numbers();?>
                         |
                                <?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
                        </div>
                </div>
            </div>
    </div>