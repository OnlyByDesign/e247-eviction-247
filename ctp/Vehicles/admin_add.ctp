<?php echo $this->element('datepicker_includes') ?>

<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main">Add a <span>Vehicle</span></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/6.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-8 center">

        <div class="actions">
            <div class="btn-blue col-xs-2 center left">
                <?php echo $this->Html->link(String::insert(__('List :param1', true), array('param1' => __('Vehicles', true))), array('action' => 'index', $lease_id)); ?>
            </div>
        </div>

        <div class="defendants form inline col-xs-12 left push-t push-b">

            <?php echo $this->Form->create('Vehicle', array('action' => 'add/' . $lease_id));?>

            <table cellpadding="0" cellspacing="0">
                
                <?php
                    echo $this->Form->input('lease_id', array('type' => 'hidden', 'value' => $lease_id));
                    echo $this->Form->input('type', [
                        'div' => array('class' => 'fm_input fm_text col-xs-1-2 inline left'),
                        'class' => 'input col-xs-12 center',
                        'after' => 'Vehicle type',
                        'placeholder' => 'Vehicle type',
                        'label' => false
                    ]);
                    echo $this->Form->input('make', [
                        'div' => array('class' => 'fm_input fm_text col-xs-1-2 inline left'),
                        'class' => 'input col-xs-12 center',
                        'after' => 'Vehicle make',
                        'placeholder' => 'Vehicle make',
                        'label' => false
                    ]);
                    echo $this->Form->input('model', [
                        'div' => array('class' => 'fm_input fm_text col-xs-1-2 inline left'),
                        'class' => 'input col-xs-12 center',
                        'after' => 'Vehicle model',
                        'placeholder' => 'Vehicle model',
                        'label' => false
                    ]);
                    echo $this->Form->input('color', [
                        'div' => array('class' => 'fm_input fm_text col-xs-1-2 inline left'),
                        'class' => 'input col-xs-12 center',
                        'after' => 'Vehicle color',
                        'placeholder' => 'Vehicle color',
                        'label' => false
                    ]);
                    echo $this->Form->input('license', [
                        'div' => array('class' => 'fm_input fm_text col-xs-1-2 inline left'),
                        'class' => 'input col-xs-12 center',
                        'after' => 'Vehicle license',
                        'placeholder' => 'Vehicle license',
                        'label' => false
                    ]);
                ?>
                
            </table>

        </div>

        <?php
            echo $this->Form->submit('Save', array( 'type' => 'Save', 'type' => 'image', 'div' => array('class' => 'fm_input fm_text col-xs-3 inline center push-t last'), 'class' => 'btn-blue input')); 
            echo $this->Form->end();
        ?>

    </div>
    
</div>