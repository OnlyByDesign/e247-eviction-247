<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>add</span> a notification</h1>
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
                <a href="<?php echo $this->Html->url(array('controller' => '#', 'action' => '#', $lease_id)); ?>"><p>Manage Landlords</p></a>
            </div>
            <p class="left inline push-l input center"><strong></strong></p>
        </div>

        <div class="notifications form col-xs-12 left flex push-t push-b">
            
            <?php echo $this->Form->create('NotificationNotice', array('url' => 'add/' . $notice_id));?>
            
            <p class="col-xs-12 left inline">Please provide the name and email address of a person that you would like to receive real-time email updates on the status of your case. (examples: property owner, property manager assistant, etc.)</p>
            
            <table cellpadding="0" cellspacing="0">
                
                <?php
                echo $this->Form->input('notice_id', array('type' => 'hidden', 'value' => $notice_id));
                
                echo $this->Form->input('first_name', [
                    'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => '#',
                    'placeholder' => '#',
                    'label' => false
                ]);
                echo $this->Form->input('last_name', [
                    'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => '#',
                    'placeholder' => '#',
                    'label' => false
                ]);
                echo $this->Form->input('email_address1', [
                    'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Email Address',
                    'placeholder' => 'Email Address',
                    'label' => false
                ]);
                echo $this->Form->input('email_address2', [
                    'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Verify Email Address',
                    'placeholder' => 'Verify Email Address',
                    'label' => false
                ]);
                
                echo $this->Form->input('autofill', array(
                    'div' => array('class' => 'fm_mem col-xs-12 center right'),
                    'class' => 'fm_check',
                    'label' => 'Remember this information',
                    'type' => 'checkbox'
                ));
                ?>
                
            </table>
            
        </div>
            
        <?php
        echo $this->Form->submit('Save', array( 'type' => 'Save', 'type' => 'image', 'div' => array('class' => 'fm_input fm_text col-xs-3 inline center push-t last'), 'class' => 'btn-blue input')); 
        echo $this->Html->link('Cancel', array('action' => 'index', $notice_id));
        echo $this->Form->end();
        ?>   

    </div>

</div>