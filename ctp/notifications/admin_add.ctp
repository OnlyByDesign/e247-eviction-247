<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>Edit</span> Document Template</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/7.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-8 center">

        <div class="actions col-xs-12 inline left">
            <p class="col-xs-2 center inline"><?php echo $this->Html->link(String::insert(__('List :param1', true), array('param1' => __('Notifications', true))), array('action' => 'index', $eviction_id));?></p>
            <p class="col-xs-2 center inline"><?php echo $this->Html->link(String::insert(__('Back to :param1', true), array('param1' => __('Eviction', true))), array('controller' => 'evictions', 'action' => 'edit', $eviction_id)); ?></p>
            <p class="col-xs-2 center inline"><?php echo $this->Html->link(sprintf(__('List %s', true), __('Evictions', true)), array('controller' => 'evictions', 'action' => 'index')); ?></p>
            <p class="col-xs-2 center inline"><?php echo $this->Html->link(sprintf(__('New %s', true), __('Eviction', true)), array('controller' => 'evictions', 'action' => 'add')); ?></p>
        </div>

        <div class="notifications form inline col-xs-12 left push-t push-b">

            <?php echo $this->Form->create('Notification');?>
            <table cellpadding="0" cellspacing="0">
                <p><?php echo String::insert(__('Add a :param1', true), array('param1' => __('Notification', true))); ?></p>
                <?php
                echo $this->Form->input('eviction_id', array('type' => 'hidden', 'value' => $eviction_id));
                echo $this->Form->input('first_name');
                echo $this->Form->input('last_name');
                echo $this->Form->input('email_address1', array( 'label' => 'Email Address' ) );
                echo $this->Form->input('email_address2', array ( 'label' => 'Verify Email Address' ) );
                ?>
            </table>

            <?php
            echo $this->Form->submit('Save', array( 'type' => 'Save', 'type' => 'image', 'div' => array('class' => 'fm_input fm_text col-xs-3 inline center push-t last'), 'class' => 'btn-blue input'));
            echo $this->Form->end();
            ?>

        </div>

    </div>
    
</div>
