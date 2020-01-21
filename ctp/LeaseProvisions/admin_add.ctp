<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>add</span> a provision</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/4.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="actions col-xs-12 inline">
            <div class="btn-blue col-xs-2 center left">
                <a href="<?php echo $this->Html->url(array('controller' => '#', 'action' => '#', $lease_id)); ?>"><p>Manage Landlords</p></a>
            </div>
            <p class="left inline push-l input center"><strong></strong></p>
        </div>

        <div class="provisions index col-xs-12 left flex push-t push-b">
            
            <?php echo $this->Form->create('Provision');?>

            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th></th>
                    <th>Description</th>
                    <th>Approved?</th>
                </tr>
                <?php
                    $i = 0;
                    foreach ($provisions as $provision):
                        $class = null;
                        if ($i++ % 2 == 0) $class = ' class="altrow"';
                ?>
                <tr<?php echo $class;?>>
                    <?php
                        echo $this->Form->input('Provision.' . $provision['Provision']['id'] . '.description', array('type' => 'hidden', 'value' => $provision['Provision']['description']));
                        echo $this->Form->input('Provision.' . $provision['Provision']['id'] . '.is_approved', array('type' => 'hidden', 'value' => $provision['Provision']['is_approved']));
                    ?>
                    <td><?php echo $this->Form->input('Provision.' . $provision['Provision']['id'] . '.id', array('label' => false, 'type' => 'checkbox', 'value' => $provision['Provision']['id'])); ?></td>
                    <td><?php echo $provision['Provision']['description']; ?></td>
                    <td style="text-align:center;"><?php echo ($provision['Provision']['is_approved'] == 1) ? "Yes" : "No"; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
            
        </div>

        <?php
        echo $this->Form->submit('Save', array( 'type' => 'Save', 'type' => 'image', 'div' => array('class' => 'fm_input fm_text col-xs-3 inline center push-t last'), 'class' => 'btn-blue input')); 
        echo $this->Form->end();
        echo '<p class="col-xs-12 center">';
        echo $this->Html->link('Cancel', array('controller' => 'lease_provisions', 'action' => 'index', $lease_id));
        echo '</p>';
        ?>

    </div>
    
</div>