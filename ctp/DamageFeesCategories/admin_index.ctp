<div id="wrapper" class="acc center fm-create leases index">
    
    <div class="hero col-xs-12 center">
        
            <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main"><span>Damage</span> Fees</h1>
            </div>
            <div class="hr_over"></div>
            <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/4.jpg"></div>
        </div>
        
        <div class="db_tab col-xs-12 center">
            <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
        </div>
    
        <div class="content col-xs-8 center">
            
            <div class="action inline left col-xs-5">

                <div class="btn-blue col-xs-5 input center left">
                    <?php echo $this->Html->link(String::insert(__('New :param1', true), array('param1' => __('Category', true))), array('action' => 'add')); ?>
                </div>

                <div class="btn-blue col-xs-5 input center right">
                    <?php echo $this->Html->link(String::insert(__('New :param1', true), array('param1' => __('Fee', true))), array('controller' => 'damagefees', 'action' => 'add')); ?>
                </div>

            </div>
            
            <div class="fees index inline col-xs-12 left push-t">
                
                <table class="col-xs-12 center left" cellpadding="0" cellspacing="0">

                    <?php
                        $i = 0;

                        foreach ($damagefeescategories as $damagefeecategory):
                            echo '<tr>';
                            echo '	<th>' . $damagefeecategory['DamageFeesCategory']['name'] . '</th>';
                    echo '	<th class="rightText">' . $this->Html->link(__('Delete', true), array('action' => 'delete', $damagefeecategory['DamageFeesCategory']['id']), null,
                                                    String::insert(__('Are you sure you want to delete the category :param1 and all it\'s fees?', true), array('param1' => $damagefeecategory['DamageFeesCategory']['name']))) . '</th>';
                    echo '</tr>';

            //			}

                            foreach ($damagefeecategory['DamageFee'] as $damagefee) {
                                $class = null;
                                if ($i++ % 2 == 0) {
                                    $class = ' class="altrow"';
                                }
                    ?>

                                <tr<?php echo $class;?>>
                                    <td><?php echo $damagefee['name']; ?>&nbsp;</td>
                                    <td class="actions">
                                    <?php
                                    echo $this->Html->link(__('Edit', true), array('controller' => 'damagefees', 'action' => 'edit', $damagefee['id']));
                                    echo " | ";
                                    echo $this->Html->link(__('Delete', true), array('controller' => 'damagefees', 'action' => 'delete', $damagefee['id']), null,
                                            String::insert(__('Are you sure you want to delete the fee for :param1|:param2?', true), array('param1' => $damagefeecategory['DamageFeesCategory']['name'], 'param2' => $damagefee['name'])));
                                    ?>
                                    </td>
                                </tr>
                    <?php
                    }
                    endforeach; ?>
                    
                </table>
                
            </div>
        
    </div>

</div>	
