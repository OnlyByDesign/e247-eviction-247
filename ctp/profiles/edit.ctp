<div id="wrapper" class="acc center">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>change</span> your information</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/5.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_account')); ?>
    </div>

<div class="content col-xs-9 center profiles form">

	<?php    
        echo $this->Form->create('Profile', array('url' => '/profile'));    
		echo $this->Form->input('id');    
		echo $this->Form->input('qbo_customer_id', array('type' => 'hidden'));
	?>
    <div class="col-xs-12 center left">
        <h3 class="col-xs-12 push-b push-t left">User Name</h3>
        <?php
            echo $this->Form->input('first_name', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'placeholder' => 'First name',
                'label' => false
            ]);
            echo $this->Form->input('last_name', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'placeholder' => 'Last name',
                'label' => false
            ]);
            echo $this->Form->input('company_name', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left last'),
                'class' => 'input col-xs-12 center',
                'placeholder' => 'Company name',
                'label' => false
            ]);
        ?>
    </div>
    <div class="col-xs-12 center left">
        <h3 class="col-xs-12 push-b push-t left">Main Address</h3>
        <?php
            echo $this->Form->input('mailing_address1', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'placeholder' => 'Street Address 1',
                'label' => false
            ]);    
            echo $this->Form->input('mailing_address2', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'placeholder' => 'Street Address 2',
                'label' => false
            ]);    
            echo $this->Form->input('city', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left last'),
                'class' => 'input col-xs-12 center',
                'placeholder' => 'City',
                'label' => false
            ]);    
            echo $this->Form->input('state', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'placeholder' => 'State',
                'options' => $states,
                'label' => false
            ]);    
            echo $this->Form->input('zip_code', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'placeholder' => 'Zip code',
                'label' => false
            ]);
        ?>
    </div>
    <div class="col-xs-12 center left">
        <h3 class="col-xs-12 push-b push-t left">Contact Information</h3>
        <?php
            echo $this->Form->input('primary_phone_number', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'placeholder' => 'Primary phone number',
                'label' => false
            ]);    
            echo $this->Form->input('cell_phone_number', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'placeholder' => 'Cell phone number',
                'label' => false
            ]);    
            echo $this->Form->input('fax_number', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left last'),
                'class' => 'input col-xs-12 center',
                'placeholder' => 'Cell phone number',
                'label' => false
            ]);    
            echo $this->Form->input('email_address', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'placeholder' => 'Notification Email Address',
                'label' => false
            ]);    
            echo $this->Form->input('billing_email_address', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center required',
                'placeholder' => 'Cell phone number',
                'after' => '<span>Separate multiple emails with a comma</span>',
                'label' => false
            ]);            
        ?>
    </div>
    <div class="col-xs-12 center left push-t">
        <?php

            echo $this->Form->submit('Save', array(
                'type' => 'image',
                'div' => array(
                    'id' => 'saveBtn',
                    'class' => 'col-xs-3-2 center'),
                'class' => 'btn-blue input'
            ));
            echo $this->Html->link('<p class="center col-xs-12 push-t">Cancel</p>', array('controller' => 'users', 'action' => 'dashboard'), array('escape' => false));

            echo $this->Form->end();	
        ?>
        </div>
    </div>
</div>