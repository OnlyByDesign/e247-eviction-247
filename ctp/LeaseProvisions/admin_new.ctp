<?php echo $this->element('datepicker_includes') ?>

<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>new</span> provision</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/5.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="actions col-xs-12 inline">
            <div class="btn-blue col-xs-3 center left">
                <?php echo $this->Html->link(String::insert(__('List :param1', true), array('param1' => __('Provisions', true))), array('action' => 'index', $lease_id)); ?>
            </div>
        </div>

        <div class="provisions form col-xs-12 left flex push-t push-b">

            <?php echo $this->Form->create('LeaseProvision', array('action' => 'new/' . $lease_id));?>
            
            <table cellpadding="0" cellspacing="0">
                <?php
                echo $this->Form->input('lease_id', array('type' => 'hidden', 'value' => $lease_id));
                
                echo $this->Form->input('description', [
                    'div' => array('class' => 'fm_input fm_text col-xs-12 inline left provision'),
                    'class' => 'input col-xs-12 center',
                    'before' => '<p class="col-xs-12 inline left>Provision description</p>',
                    'placeholder' => 'Provision description',
                    'type' => 'textarea',
                    'label' => false
                ]);
                echo $this->Form->input('is_approved', [
                    'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left checkbox'),
                    'class' => 'input col-xs-12 center',
                    'label' => 'Approved',
                    'type' => 'checkbox',
                ]);
                echo $this->Form->input('create_custom', [
                    'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left checkbox'),
                    'class' => 'input col-xs-12 center',
                    'type' => 'checkbox',
                    'label' => 'Add to custom provisions list'
                ]);
                ?>
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