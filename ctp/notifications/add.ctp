<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>Edit</span> Document Template</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/2.jpeg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_account')); ?>
    </div>

    <div class="content col-xs-8 center">

        <div class="notifications form inline col-xs-12 left push-t push-b">

            <?php echo $this->Form->create('Notification', array('url' => 'add/' . $eviction_id));?>

            <table cellpadding="0" cellspacing="0">
                <p><?php echo String::insert(__('Add :param1', true), array('param1' => __('Notification', true))); ?></p>
                <p style="font-size:16px;">Please provide the name and email address of a person that you would like to receive real-time email updates on the status of your case. (examples: property owner, property manager assistant, etc.)</p>
                <?php
                echo $this->Form->input('eviction_id', array('type' => 'hidden', 'value' => $eviction_id));
                echo $this->Form->input('first_name');
                echo $this->Form->input('last_name');
                echo $this->Form->input('email_address1', array( 'label' => 'Email Address' ) );
                echo $this->Form->input('email_address2', array ( 'label' => 'Verify Email Address' ) );
                echo $this->Form->input('autofill', array('label' => 'Remember this Notification', 'type' => 'checkbox', 'div' => array('style' => 'float:right;')));
                ?>
            </table>

            <?php
            echo $this->Form->submit('Save', array( 'type' => 'Save', 'type' => 'image', 'div' => array('class' => 'fm_input fm_text col-xs-3 inline center push-t last'), 'class' => 'btn-blue input')); 
            echo $this->Form->end();
            echo '<p class="col-xs-12 center">';
            echo $this->Html->link('action' => 'index', $eviction_id));
            echo '</p>';
            ?> 

        </div>

    </div>
    
</div>