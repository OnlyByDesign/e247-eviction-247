<?php echo $this->element('datepicker_includes') ?>

<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>edit</span> occupant info</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/7.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="actions col-xs-12 inline">
            <div class="btn-blue col-xs-2 center left">
                <?php echo $this->Html->link(String::insert(__('List :param1', true), array('param1' => __('Occupants', true))), array('action' => 'index', $lease_id)); ?>
            </div>
            <p class="left inline push-l center"><strong><?php echo $this->Html->link(String::insert(__('Back to :param1', true), array('param1' => __('Lease', true))), array('controller' => 'leases', 'action' => 'edit', $lease_id)); ?></strong></p>
        </div>

        <div class="occupants form col-xs-12 left flex push-t push-b">
            
            <?php echo $this->Form->create('Occupant');?>
            
            <table cellspacing="0" cellpadding="0">
                <?php
                echo $this->Form->input('id');
                echo $this->Form->input('lease_id', array('type' => 'hidden', 'value' => $lease_id));

                echo $this->Form->input('first_name', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'First name',
                    'placeholder' => 'First name',
                    'label' => false
                ]);
                echo $this->Form->input('middle_name', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Middle name',
                    'placeholder' => 'Middle name',
                    'required' => false,
                    'label' => false
                ]);
                echo $this->Form->input('last_name', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Last name',
                    'placeholder' => 'Last name',
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