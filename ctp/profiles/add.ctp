<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>add</span> a profile</h1>
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
                <?php echo $this->Html->link(String::insert(__('List :action', true), array('action' => __('Profiles', true))), array('action' => 'index'));?>
            </div>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(String::insert(__('List :action', true), array('action' => __('Users', true))), array('controller' => 'users', 'action' => 'index')); ?></strong></p>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(String::insert(__('New :action', true), array('action' => __('User', true))), array('controller' => 'users', 'action' => 'add')); ?></strong></p>
        </div>

        <div class="profiles form col-xs-12 left flex push-t push-b">

            <?php echo $this->Form->create('Profile');?>
            
            <table cellpadding="0" cellspacing="0">
                <?php
                echo $this->Form->input('user_id');
                
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
                    'after' => 'Unit no.',
                    'placeholder' => 'Unit no.',
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
                    'after' => 'Primary phone',
                    'placeholder' => 'Primary phone',
                    'label' => false
                ]);
                echo $this->Form->input('cell_phone_number', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Cell phone',
                    'placeholder' => 'Cell phone',
                    'label' => false
                ]);
                echo $this->Form->input('fax_number', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Fax no.',
                    'placeholder' => 'Fax no.',
                    'label' => false
                ]);
                echo $this->Form->input('email_address', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Email address',
                    'placeholder' => 'Email address',
                    'label' => false
                ]);
                echo $this->Form->input('company_name', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Company name',
                    'placeholder' => 'Company name',
                    'label' => false
                ]);
                ?>
            </table>
            
        </div>
        
        <?php echo $this->Form->end(__('Submit', true));?>
        
    </div>
    
</div>