<?php //echo $this->element('datepicker_includes') ?>

<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>edit</span> a provision</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/1.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_account')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="actions col-xs-12 inline">
            <div class="btn-blue col-xs-2 center left">
                <?php echo $this->Html->link(String::insert(__('Custom List :param1', true), array('param1' => __('Provisions', true))), array('action' => 'index')); ?>
            </div>
        </div>

        <div class="provisions form col-xs-12 left flex push-t push-b">
            
            <?php echo $this->Form->create('Provision');?>

            <table cellpadding="0" cellspacing="0">
                <?php
                echo $this->Form->input('id');
                echo $this->Form->input('description', array('class' => 'provision'));
                ?>
            </table>
            
        </div>
        
        <?php
        echo $this->Form->submit('Save', array( 'type' => 'Save', 'type' => 'image', 'div' => array('class' => 'fm_input fm_text col-xs-3 inline center push-t last'), 'class' => 'btn-blue input')); 
        echo $this->Form->end();
        echo '<p class="col-xs-12 center">';
        echo $this->Html->link('Cancel', array('controller' => 'provisions', 'action' => 'index'));
        echo '</p>';
        ?>
        
    </div>
        
</div>