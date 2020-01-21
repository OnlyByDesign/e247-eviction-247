<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main">manage <span>fees</span></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/7.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_account')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="actions col-xs-12 inline">
            <div class="btn-blue col-xs-3 center left">
                <?php echo $this->Html->link("Add a fee", array('action' => 'add/' . $eviction_id)); ?>
            </div>
        </div>

        <div class="fees index col-xs-12 left flex push-t push-b">
            
            <table cellpadding="0" cellspacing="0" class="tblFees">
                <tr>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th class="actions"></th>
                </tr>

                <?php
                    $i = 0;
                    foreach ($fees as $fee):
                        $class = null;
                        if ($i++ % 2 == 0) {
                            $class = ' class="altrow"';
                        }
                ?>

                <tr<?php echo $class;?>>
                    <td><?php echo $fee['Fee']['category']; ?>&nbsp;</td>
                    <td><?php echo $fee['Fee']['name']; ?>&nbsp;</td>
                    <td><?php echo $fee['Fee']['amount']; ?>&nbsp;</td>
                    <td class="actions">
                        <?php 
                    echo $this->Html->link(
                        __('Delete', true),
                        array('action' => 'delete', $eviction_id, $fee['Fee']['id']),
                        null,
                        String::insert('Are you sure you want to delete the ":param1|:param2" fee?', array('param1' => $fee['Fee']['category'], 'param2' => $fee['Fee']['name']))
                        );
                    ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            
        </div>
        
        <div class="btn-blue col-xs-3 center">
            <?php echo $this->Html->link('Continue', array('action' => 'finish', $eviction_id), array('escape' => false), 'Are you sure that you entered all fees?'); ?>
        </div>
        
    </div>

</div>