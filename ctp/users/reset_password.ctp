<div id="wrapper" class="acc center user">   
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main">reset your <span>password</span></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/pexels-photo-acc.jpeg"></div>
    </div>
    
    <div class="content center col-xs-9 users form">
        
        <p>Enter your email address.</p>
        
        <?php
        echo $this->Form->create('User');
        echo $this->Form->input('Profile.email', array(
            'div' => array('class' => 'col-xs-12 fm_input fm_text center inline last'),
            'class' => 'input col-xs-12',
            'placeholder' => 'Email Address',
            'label' => false
        ));
        echo $this->Form->submit('Save', array(
            'name' => 'save_lease',
            'type' => 'image',
            'div' => array(
                'id' => 'saveBtn',
                'class' => 'fm_input fm_text col-xs-12 inline center left'),
            'class' => 'btn-blue input'
        ));
        echo $this->Form->end();
        ?>
        
        <p>We will immediately send you an email with your new temporary password and instructions on how to access your account.</p>
        
    </div>


<?php include '/app/webroot/files/alert_popup.inc'; ?>