<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><?php echo String::insert(__('Edit <span>:param1</span>', true), array('param1' => __('Profile', true))); ?></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/4.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-8 center">

        <div class="profiles form inline col-xs-12 left push-t push-b">

        <?php 
            echo $this->Form->create('Profile');
            echo $this->Form->input('id');
            echo $this->Form->input('qbo_customer_id', array('type' => 'hidden'));

            echo $this->Form->input('first_name', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'First name',
                'placeholder' => 'First name',
                'label' => false
            ]);
            echo $this->Form->input('last_name', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Last name',
                'placeholder' => 'Last name',
                'label' => false
            ]);
            echo $this->Form->input('_name', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Full name',
                'placeholder' => 'Full name',
                'label' => false
            ]);
            echo $this->Form->input('mailing_address1', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Street address',
                'placeholder' => 'Street address',
                'label' => false
            ]);
            echo $this->Form->input('mailing_address2', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Unit No.',
                'placeholder' => 'Unit No.',
                'label' => false
            ]);
            echo $this->Form->input('city', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'City',
                'placeholder' => 'City',
                'label' => false
            ]);
            echo $this->Form->input('state', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'State',
                'placeholder' => 'State',
                'label' => false
            ]);
            echo $this->Form->input('zip_code', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Zip code',
                'placeholder' => 'Zip code',
                'label' => false
            ]);
            echo $this->Form->input('primary_phone_number', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Primary phone number',
                'placeholder' => 'Primary phone number',
                'label' => false
            ]);
            echo $this->Form->input('cell_phone_number', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Cell phone number',
                'placeholder' => 'Cell phone number',
                'label' => false
            ]);
            echo $this->Form->input('fax_number', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Fax number',
                'placeholder' => 'Fax number',
                'label' => false
            ]);
            echo $this->Form->input('email_address', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Notification Email Address',
                'placeholder' => 'Notification Email Address',
                'label' => false
            ]);
            echo $this->Form->input('billing_email_address', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center required',
                'after' => 'Separate multiple emails with a comma',
                'placeholder' => 'Notification Email Address',
                'label' => false
            ]);
            echo $this->Form->input('company_name', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center required',
                'after' => 'Company address',
                'placeholder' => 'Company address',
                'label' => false
            ]);
        ?>

        </div>

        <?php
            echo $this->Form->submit('Save', array( 'type' => 'Save', 'type' => 'image', 'div' => array('class' => 'fm_input fm_text col-xs-3 inline center push-t last'), 'class' => 'btn-blue input')); 
            echo $this->Form->end();
            echo '<p class="col-xs-12 center">';
            echo $this->Html->link('Cancel', array('controller' => 'users', 'action' => 'index'));
            echo '</p>';
        ?>

    </div>
    
</div>
