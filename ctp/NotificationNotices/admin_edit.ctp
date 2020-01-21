<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>edit</span> a notice notification</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/3.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="actions col-xs-12 inline">
            <div class="btn-blue col-xs-2 center left">
                <?php echo $this->Html->link(String::insert(__('List :param1', true), array('param1' => __('Notifications', true))), array('action' => 'index', $notice_id));?>
            </div>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(String::insert(__('Back to :param1', true), array('param1' => __('Notice', true))), array('controller' => 'notices', 'action' => 'edit', $notice_id)); ?></strong></p>
        </div>

        <div class="notifications form col-xs-12 left flex push-t push-b">

            <?php echo $this->Form->create('NotificationNotice');?>
            
            <table cellpadding="0" cellspacing="0">
                
                <?php
                echo $this->Form->input('id');
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
                    'label' => false,
                    'value' => $this->data['NotificationNotice']['email_address']
                ]);
                echo $this->Form->input('email_address2', [
                    'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Verify Email Address',
                    'placeholder' => 'Verify Email Address',
                    'label' => false,
                    'value' => $this->data['NotificationNotice']['email_address']
                ]);
                ?>
                
	       </table>
            
        </div>
        
        <?php
		echo $this->Form->submit('Save', array( 'type' => 'Save', 'type' => 'image', 'div' => array('class' => 'fm_input fm_text col-xs-3 inline center push-t last'), 'class' => 'btn-blue input'));
		echo $this->Form->end();
        ?>
        
    </div>
    
</div>