<div id="wrapper" class="acc center fm-lease">
        
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">lease <span>information</span> sheet</h1>
            </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/pexels-photo-acc.jpeg"></div>
    </div>
        
    <div class="content col-xs-10 center">
            
        <div class="progress center col-xs-9">
            <i class="pg_icon inline center fas fa-plus"></i>
            <div class="pg_strike inline center"></div>
            <i class="pg_icon inline center fas fa-dollar-sign"></i>
            <div class="pg_strike inline center"></div>
            <i class="pg_icon inline center far fa-file-alt"></i>
            <div class="pg_strike inline center"></div>
            <i class="pg_icon inline center far fa-bell"></i>
            <div class="pg_strike inline center"></div>
            <i class="pg_icon inline center fas fa-check current"></i>
        </div>

        <div class="notifications form col-xs-12 center">
            
            <?php echo $this->Form->create('NotificationLease', array('url' => 'add/' . $lease_id));?>
                
                <h1 class="col-xs-12 center push-b"><?php echo String::insert(__('Add :param1', true), array('param1' => __('Notification', true))); ?></h1>
                
                <p class="left col-xs-12 push-b">Please provide the name and email address of a person that you would like to receive real-time email updates on the status of your case. (examples: property owner, property manager assistant, etc.)</p>
            
                <div class="col-xs-12 center">
                <?php
            
                    echo $this->Form->input('lease_id', array('type' => 'hidden', 'value' => $lease_id));
            
                    echo $this->Form->input('first_name', [
                        'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left'),
                        'class' => 'input col-xs-12 center provision',
                        'before' => 'First name',
                        'label' => false
                    ]);
                    echo $this->Form->input('last_name', [
                        'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left last'),
                        'class' => 'input col-xs-12 center provision',
                        'before' => 'Last name',
                        'label' => false
                    ]);            
                    echo $this->Form->input('email_address1', [
                        'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left'),
                        'class' => 'input col-xs-12 center provision',
                        'before' => 'Email address',
                        'label' => false
                    ]);
                    echo $this->Form->input('email_address2', [
                        'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left last'),
                        'class' => 'input col-xs-12 center provision',
                        'before' => 'Verify email dddress',
                        'label' => false
                    ]);

                    echo $this->Form->input('autofill', array(
                        'div' => array('class' => 'fm_mem col-xs-12 center right'),
                        'class' => 'fm_check',
                        'label' => 'Remember this notification',
                        'type' => 'checkbox'
                    ));
                    
                    echo $this->Form->submit('Save', array(
                        'type' => 'submit',
                        'div' => array(
                            'class' => 'fm_input fm_text col-xs-3 center'
                        ),
                        'class' => 'btn-blue input'
                    ));
                    echo $this->Html->link('Cancel', array('action' => 'index', $lease_id));
                    
                    echo $this->Form->end();
                ?>
            </div>
        </div>
    </div>
</div>
