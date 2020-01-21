<?php echo $this->element('datepicker_includes') ?>

<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>add</span> a defendant</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/2.jpeg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="actions col-xs-12 inline">
            <div class="btn-blue col-xs-3 center left">
                <?php echo $this->Html->link(String::insert(__('List :param1', true), array('param1' => __('Defendants', true))), array('action' => 'index', $eviction_id)); ?>
            </div>
        </div>

        <div class="defendants form col-xs-12 left flex push-t push-b">
            
            <?php echo $this->Form->create('Defendant', array('action' => 'add/' . $eviction_id));?>

            <table cellpadding="0" cellspacing="0">
                
                <?php
                echo $this->Form->input('eviction_id', array('type' => 'hidden', 'value' => $eviction_id));
                
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
                    'label' => false,
                    'required' => false
                ]);
                echo $this->Form->input('last_name', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Last name',
                    'placeholder' => 'Last name',
                    'label' => false
                ]);
                echo $this->Form->input('date_of_birth', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Date of birth',
                    'placeholder' => 'Date of birth',
                    'label' => false
                ]);
                ?>
                
                <div class="fm_input fm_text col-xs-3-2 inline left ssn">
                    <?php
                    echo $this->Form->input('ssn1' . $i . '.ssn1', array( 'class' => 'col-xs-4 input center', 'placeholder' => 'SSN 1', 'label' => false,  'div'=> false, 'size' => 1,  'maxlength' => '3' )) . ' - ';
                    echo $this->Form->input('ssn2' . $i . '.ssn2', array( 'class' => 'col-xs-3 input center', 'placeholder' => 'SSN 2', 'label' => false,  'div'=> false, 'maxlength' => '2' )) . ' - ';
                    echo $this->Form->input('ssn3' . $i . '.ssn3', array( 'class' => 'col-xs-4 input center', 'placeholder' => 'SSN 3', 'label' => false, 'div'=> false, 'size' => 3, 'maxlength' => '4' ));
                    ?>
                    <p class="left col-xs-12 inline">Social Security Number</p>
                </div>
                
            </table>
            
        </div>
        
        <?php
		echo $this->Form->submit('Save', array( 'type' => 'Save', 'type' => 'image', 'div' => array('class' => 'fm_input fm_text col-xs-3 inline center push-t last'), 'class' => 'btn-blue input')); 
		echo $this->Form->end();
        ?>
        
    </div>
    
</div>

<?php	echo $this->fetch('scriptBottom'); ?>