<div id="wrapper" class="acc center fm-notice">
        
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">Change your <span>password</span></h1>
            </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/pexels-photo-acc.jpeg"></div>
    </div>
    
    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_account')); ?>
    </div>
        
    <div class="content col-xs-8 center">
        
        <div class="info col-xs-12 center clearfix users form push-t">
            <div class="col-xs-2 center btn-blue left input" onclick="javascript:history.back();">
                <i class="center inline fa fa-caret-left" aria-hidden="true"></i>
                <p class="center inline">Back</p>
            </div>
            <?php
                echo $this->Form->create('User', array('url' => '/password'));
                echo $this->Form->input('id');
                echo $this->Form->input('current_password', [
                    'div' => array('style' => 'text-align:left;padding-right:0;', 'class' => 'fm_input fm_text col-xs-6 center'),
                    'class' => 'input col-xs-12 center',
                    'placeholder' => 'Current Password',
                    'after' => 'Current Password',
                    'label' => false,
                    'type' => 'password'
                ]);
                echo $this->Form->input('password1', [
                    'div' => array('style' => 'text-align:left;padding-right:0;', 'class' => 'fm_input fm_text col-xs-6 center'),
                    'class' => 'input col-xs-12 center',
                    'placeholder' => 'New Password',
                    'after' => 'New Password',
                    'label' => false,
                    'type' => 'password'
                ]);
                echo $this->Form->input('password2', [
                    'div' => array('style' => 'text-align:left;padding-right:0;', 'class' => 'fm_input fm_text col-xs-6 center'),
                    'class' => 'input col-xs-12 center',
                    'placeholder' => 'Confirm New Password',
                    'after' => 'Confirm New Password',
                    'label' => false,
                    'type' => 'password'
                ]);
            ?>
            <?php
                echo $this->Form->submit('Continue', array(
                    'div' => array('class' => 'submit col-xs-6 center'),
                    'class' => 'btn-blue input col-xs-12 center',
                    'type' => 'submit'
                ));
                echo $this->Form->end();
            ?>
            <div class="col-xs-12 center push-t">
                <?php echo $this->Html->link('Cancel', array('controller' => 'users', 'action' => 'dashboard')); ?>
            </div>
            
        </div>
        
    </div>
    
</div>