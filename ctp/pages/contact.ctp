<div id="wrapper" class="center">
        
    <div class="hero hr_alt ct col-xs-12 center">
        <div class="hr_sp hr_sp_1"></div>
        <div class="hr_sp hr_sp_2"></div>
        <img class="hr_split" src="/img/dev/3.jpg" width="100%" />
    </div>

    <div class="contact col-xs-9 center">
        
        <div class="ct_ov col-xs-12 center"></div>
        <h1 class="ct col-xs-12 center"><span>Contact</span> Us</h1>

        <?php echo $this->Form->create('ContactForm'); ?>	
        
        <div class="ct_left col-xs-5 center inline">
            <?php
                echo $this->Form->input('first_name', [
                    'div' => array('class' => 'fm_input fm_text col-xs-12 center last'),
                    'class' => 'input col-xs-11 center',
                    'name' => 'fname',
                    'placeholder' =>  'First name',
                    'label' => false
                ]);
                echo $this->Form->input('last_name', [
                    'div' => array('class' => 'fm_input fm_text col-xs-12 center last'),
                    'class' => 'input col-xs-11 center',
                    'name' => 'lname',
                    'placeholder' =>  'Last name',
                    'label' => false
                ]);
                echo $this->Form->input('address_one', [
                    'div' => array('class' => 'fm_input fm_text col-xs-12 center last'),
                    'class' => 'input col-xs-11 center',
                    'name' => 'add1',
                    'placeholder' =>  'Address line 1',
                    'label' => false
                ]);
                echo $this->Form->input('address_two', [
                    'div' => array('class' => 'fm_input fm_text col-xs-12 center last'),
                    'class' => 'input col-xs-11 center',
                    'name' => 'add2',
                    'placeholder' =>  'Address line 2',
                    'label' => false
                ]);
                echo $this->Form->input('city', [
                    'div' => array('class' => 'fm_input fm_text col-xs-12 center last'),
                    'class' => 'input col-xs-11 center',
                    'name' => 'city',
                    'placeholder' =>  'City',
                    'label' => false
                ]);
                echo $this->Form->input('state', [
                    'div' => array('class' => 'fm_input fm_text col-xs-12 center last'),
                    'class' => 'input col-xs-11 center',
                    'name' => 'state',
                    'placeholder' =>  'State/Province',
                    'label' => false
                ]);
                echo $this->Form->input('postal', [
                    'div' => array('class' => 'fm_input fm_text col-xs-12 center last'),
                    'class' => 'input col-xs-11 center',
                    'name' => 'postal',
                    'placeholder' =>  'Zip/Postal code',
                    'label' => false
                ]);
            ?>
        </div>	
        
        <div class="ct_right col-xs-5 center inline">
            <?php
                echo $this->Form->input('country', [
                    'div' => array('class' => 'fm_input fm_text col-xs-12 center last'),
                    'class' => 'input col-xs-11 center',
                    'name' => 'country',
                    'placeholder' =>  'Country',
                    'label' => false
                ]);
                echo $this->Form->input('company', [
                    'div' => array('class' => 'fm_input fm_text col-xs-12 center last'),
                    'class' => 'input col-xs-11 center',
                    'name' => 'company',
                    'placeholder' =>  'Company name',
                    'label' => false
                ]);
                echo $this->Form->input('email', [
                    'div' => array('class' => 'fm_input fm_text col-xs-12 center last'),
                    'class' => 'input col-xs-11 center',
                    'name' => 'email',
                    'placeholder' =>  'Email address',
                    'label' => false
                ]);
                echo $this->Form->input('phone', [
                    'div' => array('class' => 'fm_input fm_text col-xs-12 center last'),
                    'class' => 'input col-xs-11 center',
                    'name' => 'phone',
                    'placeholder' =>  'Phone number',
                    'label' => false
                ]);
                echo $this->Form->input('message', [
                    'div' => array('class' => 'fm_input fm_text col-xs-12 center msg last'),
                    'class' => 'input col-xs-11 center',
                    'type' => 'textarea',
                    'name' => 'message',
                    'placeholder' =>  'Message',
                    'label' => false
                ]);
            ?>
            <div class="fm_input fm_text col-xs-11 center last required right flex" style="padding:0">
                <div class="col-xs-8 inline left">
                    <?php					
                        echo $this->Captcha->input('Contact', [
                            'div' => array('class' => 'fm_input fm_text col-xs-3-2 center left inline last'),
                            'class' => 'input col-xs-12 center',
                            'type' => 'captcha',
                            'name' => 'captcha',
                            'placeholder' =>  'Captcha',
                            'label' => false
                        ]);
                    ?>
                </div>
                <?php    
                    echo $this->Form->submit('submit', [
                        'div' => array('class' => 'col-xs-3 center inline right last'),
                        'class' => 'btn-orng input col-xs-12 center inline',
                        'type' => 'submit',
                        'name' => 'submit',
                        'value' => 'Submit',
                        'label' => false
                    ]);
                    echo $this->Form->end();										
                    include '/app/webroot/files/alert_popup.inc';					
                ?>
            </div>			
        </div>  

    </div>
</div>