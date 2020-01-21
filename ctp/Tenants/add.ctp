<?php echo $this->element('datepicker_includes') ?>

<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>add</span> a tenant</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/5.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_account')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="actions col-xs-12 inline">

            <div class="btn-blue col-xs-2 center left">
                <?php echo $this->Html->link('View all defendants', array('action' => 'index', $eviction_id));?>
            </div>
        </div>

        <div class="defendants form col-xs-12 left flex push-t push-b">

            <?php echo $this->Form->create('Defendant', array('action' => 'add/' . $eviction_id));?>
            <h2 class="col-xs-12 left inline">Tenants to be Evicted</h2>
            <div class="instructions col-xs-12 left inline">
                <p>Please provide the full name and all available information about the first tenant to be evicted.</p>
            </div>
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
                'after' => 'Middle name (If available)',
                'placeholder' => 'Middle name (If available)',
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
            echo $this->Form->input('date_of_birth', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'type' => 'date', 
                'after' => 'Date of birth',
                'placeholder' => 'Date of birth',
                'empty' => true, 
                'dateFormat' => 'MDY', 
                'minYear' => 1910, 
                'maxYear' => 2009,
                'label' => false
            ]);
            ?>
            <div class="input text">
                <label for="DefendantSsn1">Social Security Number</label>
                <?php echo $this->Form->input('ssn1', array('label' => false, 'div'=> false, 'style' => 'width: 40px;', 'size' => 1, 'maxlength' => '3')); ?> - 
                    <?php echo $this->Form->input('ssn2', array('label' => false, 'div'=> false, 'style' => 'width: 20px;', 'maxlength' => '2')); ?> - 
                    <?php echo $this->Form->input('ssn3', array('label' => false, 'div'=> false, 'style' => 'width: 40px;', 'size' => 3, 'maxlength' => '4')); ?>
                <span>Please provide if available.</span>
            </div>

        </div>

    </div>
    
</div>