<?php $logged_in = $this->Session->check('Auth.User.id'); ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
	jQuery('.creload').on('click', function() {
	    var mySrc = $(this).prev().attr('src');
	    var glue = '?';
	    if(mySrc.indexOf('?')!=-1)  {
	        glue = '&';
	    }
	    $(this).prev().attr('src', mySrc + glue + new Date().getTime());
	    return false;
	});
</script>

<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <?php if ($logged_in == 0) { ?>
                <h1 class="main"><span>register</span> for an account</h1>
            <?php } ?>
            <?php if ($logged_in == 1) { ?>
                <h1 class="main"><span>register</span> a user</h1>
            <?php } ?>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/4.jpg"></div>
    </div>

    <?php if ($logged_in == 1) { ?>
    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_account')); ?>
    </div>
    <?php } ?>

    <div class="content col-xs-10 center">

        <div class="users form col-xs-12 left flex push-t push-b">
            
            <?php echo $this->Form->create('User');?>
            
            <?php
            echo $this->Form->input('User.username', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Username',
                'placeholder' => 'Username',
                'label' => false
            ]);
            echo $this->Form->input('User.password1', array(
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Password',
                'placeholder' => 'Password',
                'type' => 'password',
                'label' => false
            ));
            echo $this->Form->input('User.password2', array(
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Confirm Password',
                'placeholder' => 'Confirm Password',
                'type' => 'password',
                'label' => false
            ));
            echo $this->Form->input('Profile.first_name', [ 
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'First name',
                'placeholder' => 'First name',
                'label' => false
            ]);
            echo $this->Form->input('Profile.last_name', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Last name',
                'placeholder' => 'Last name',
                'label' => false                       
            ]);
            echo $this->Form->input('Profile.mailing_address1', array(
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Mailing Address',
                'placeholder' => 'Mailing Address',
                'label' => false
            ));
            echo $this->Form->input('Profile.mailing_address2', array(
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Mailing Address (Line 2)',
                'placeholder' => 'Mailing Address (Line 2)',
                'label' => false
            ));
            echo $this->Form->input('Profile.city', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'City',
                'placeholder' => 'City',
                'label' => false
            ]);
            echo $this->Form->input('Profile.state', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'States',
                'placeholder' => 'States',
                'options' => $states,
                'label' => false
            ]);
            echo $this->Form->input('Profile.zip_code', array(
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'ZIP Code',
                'placeholder' => 'ZIP Code',
                'label' => false
            ));
            echo $this->Form->input('Profile.primary_phone_number', array(
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Home/Office Phone Number',
                'placeholder' => 'Home/Office Phone Number',
                'label' => false
            ));
            echo $this->Form->input('Profile.cell_phone_number', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Cell phone',
                'placeholder' => 'Cell phone',
                'label' => false
            ]);
            echo $this->Form->input('Profile.fax_number', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Fax number',
                'placeholder' => 'Fax number',
                'label' => false
            ]);
            echo $this->Form->input('Profile.email_address', array(
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Notification Email Address',
                'placeholder' => 'Notification Email Address',
                'label' => false
            ));
            echo $this->Form->input('Profile.billing_email_address', array(
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left input text required'),
                'class' => 'input col-xs-12 center',
                'after' => 'Billing email address',
                'placeholder' => 'Billing email address',
                'label' => false
            ));
            echo $this->Form->input('Profile.company_name', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Company name',
                'placeholder' => 'Company name',
                'label' => false
            ]);
            ?>
            
        </div>
        
        <div class="col-xs-6 center inline">
            <div class="col-xs-8 inline left">
                <?php
                echo $this->Captcha->input('Register', [
                    'div' => array('class' => 'fm_input fm_text col-xs-6 center left inline last'),
                    'class' => 'input col-xs-12 center left',
                    'type' => 'captcha',
                    'name' => 'captcha',
                    'placeholder' =>  'Captcha',
                    'label' => false
                ]);
                ?>
            </div>
            <?php 
            echo $this->Form->submit('Register', array(
                'type' => 'Save',
                'type' => 'image', 
                'div' => array('class' => 'fm_input fm_text col-xs-3 inline center push-t last right'),
                'class' => 'btn-blue input'
            ));
            echo $this->Form->end();
            ?>
        </div>
        
    </div>
    
</div>

<?php include '/app/webroot/files/alert_popup.inc'; ?>