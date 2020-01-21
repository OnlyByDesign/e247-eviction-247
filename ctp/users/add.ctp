<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>add</span> a user</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/7.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_account')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="actions col-xs-12 inline">
            <div class="btn-blue col-xs-2 center left">
                <?php echo $this->Html->link(String::insert(__('List :action', true), array('action' => __('Users', true))), array('action' => 'index'));?>
            </div>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(String::insert(__('List :action', true), array('action' => __('Profiles', true))), array('controller' => 'profiles', 'action' => 'index')); ?></strong></p>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(String::insert(__('New :action', true), array('action' => __('Profile', true))), array('controller' => 'profiles', 'action' => 'add')); ?></strong></p>
        </div>

        <div class="users form col-xs-12 left flex push-t push-b">

            <?php echo $this->Form->create('User');?>
            
            <table cellpadding="0" cellspacing="0">
                <?php
                echo $this->Form->input('role', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Role',
                    'placeholder' => 'Role',
                    'label' => false
                ]);
                echo $this->Form->input('username', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Username',
                    'placeholder' => 'Username',
                    'label' => false
                ]);
                echo $this->Form->input('password', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Password',
                    'placeholder' => 'Password',
                    'label' => false
                ]);
                ?>
            </table>
            
        </div>
        
        <?php echo $this->Form->end(__('Submit', true));?>
        
    </div>
        
</div>