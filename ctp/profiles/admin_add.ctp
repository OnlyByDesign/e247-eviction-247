<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><?php echo String::insert(__('Admin Add <span>:param1</span>', true), array('param1' => __('Profile', true))); ?></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/3.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-8 center">

        <?php echo $this->Form->create('Profile'); ?>

        <div class="actions col-xs-12 inline left push-t">
                <div class="btn-blue col-xs-2 center left">
                    <?php echo $this->Html->link(String::insert(__('New :param1', true), array('param1' => __('User', true))), array('controller' => 'users', 'action' => 'add')); ?>
                </div>
                <div class="col-xs-6 left inline">
                    <p class="center inline input push-l"><strong><?php echo $this->Html->link(String::insert(__('List :param1', true), array('param1' => __('Profiles', true))), array('action' => 'index'));?></strong></p>
                    <p class="center inline input push-l"><strong><?php echo $this->Html->link(String::insert(__('List :param1', true), array('param1' => __('Users', true))), array('controller' => 'users', 'action' => 'index')); ?></strong></p>
                </div>
                <?php echo $this->Form->input('user_id', array('div' => array('class' => 'fm_input fm_text col-xs-4 inline left last'), 'class' => 'input col-xs-12 center','options' => $users, 'label'=>false,'after'=>'Users')); ?>
            </div>

        <div class="profiles form inline col-xs-12 left push-t push-b">

            <?php                 
            echo $this->Form->input('first_name', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'User first name',
                'placeholder' => 'User first name',
                'label' => false
            ]);
            echo $this->Form->input('last_name', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'User last name',
                'placeholder' => 'User last name',
                'label' => false
            ]);
            echo $this->Form->input('mailing_address1', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left last'),
                'class' => 'input col-xs-12 center',
                'after' => 'User street address',
                'placeholder' => 'User street address',
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
                'after' => 'User city',
                'placeholder' => 'User city',
                'label' => false
            ]);
            echo $this->Form->input('state', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left last'),
                'class' => 'input col-xs-12 center',
                'after' => 'User state',
                'placeholder' => 'User state',
                'label' => false
            ]);
            echo $this->Form->input('zip_code', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'User zip code',
                'placeholder' => 'User zip code',
                'label' => false
            ]);
            echo $this->Form->input('primary_phone_number', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'User phone number',
                'placeholder' => 'User phone number',
                'label' => false
            ]);
            echo $this->Form->input('cell_phone_number', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left last'),
                'class' => 'input col-xs-12 center',
                'after' => 'User cell number',
                'placeholder' => 'User cell number',
                'label' => false
            ]);
            echo $this->Form->input('fax_number', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'User fax number',
                'placeholder' => 'User fax number',
                'label' => false
            ]);
            echo $this->Form->input('email_address', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'User Notification Email Address',
                'placeholder' => 'Notification Email',
                'label' => false
            ]);
            echo $this->Form->input('billing_email_address', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left last'),
                'class' => 'input col-xs-12 center',
                'after' => 'User Billing Email Address',
                'placeholder' => 'Billing Email',
                'label' => false
            ]);
            echo $this->Form->input('company_name', [
                'div' => array('class' => 'fm_input fm_text col-xs-12 inline left last'),
                'class' => 'input col-xs-12 center',
                'after' => 'User company name',
                'placeholder' => 'User company name',
                'label' => false
            ]);
            ?>

        </div>

        <?php
            echo $this->Form->submit('Save', array( 'type' => 'Save', 'type' => 'image', 'div' => array('class' => 'fm_input fm_text col-xs-3 inline center push-t last'), 'class' => 'btn-blue input')); 
            echo $this->Form->end();
            echo '<p class="col-xs-12 center">';
            echo $this->Html->link('Cancel', array('controller' => 'damage_fees_categories', 'action' => 'index'));
            echo '</p>';
        ?>

    </div>
    
</div>