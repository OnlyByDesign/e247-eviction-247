<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>View</span> a Notification</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/5.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-8 center">

        <div class="actions col-xs-12 left inline">
            <p class="col-xs-2 center inline"><?php echo $this->Html->link(String::insert(__('Edit :param1', true), array('param1' => __('Notification', true))), array('action' => 'edit', $notification['Notification']['id'])); ?></p>
            <p class="col-xs-2 center inline"><?php echo $this->Html->link(String::insert(__('Delete :param1', true), array('param1' => __('Notification', true))), array('action' => 'delete', $notification['Notification']['id']), null, String::insert(__('Are you sure you want to delete # :param1?', true), array('param1' => $notification['Notification']['id']))); ?></p>
            <p class="col-xs-2 center inline"><?php echo $this->Html->link(String::insert(__('List :param1', true), array('param1' => __('Notifications', true))), array('action' => 'index')); ?></p>
            <p class="col-xs-2 center inline"><?php echo $this->Html->link(String::insert(__('New :param1', true), array('param1' => __('Notification', true))), array('action' => 'add')); ?></p>
            <p class="col-xs-2 center inline"><?php echo $this->Html->link(String::insert(__('List :param1', true), array('param1' => __('Evictions', true))), array('controller' => 'evictions', 'action' => 'index')); ?></p>
            <p class="col-xs-2 center inline"><?php echo $this->Html->link(String::insert(__('New :param1', true), array('param1' => __('Eviction', true))), array('controller' => 'evictions', 'action' => 'add')); ?></p>
        </div>

        <div class="notifications view inline col-xs-12 left push-t push-b">

            <dl><?php $i = 0; $class = ' class="altrow"';?>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $notification['Notification']['id']; ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Eviction'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $this->Html->link($notification['Eviction']['id'], array('controller' => 'evictions', 'action' => 'view', $notification['Eviction']['id'])); ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('First Name'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $notification['Notification']['first_name']; ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Last Name'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $notification['Notification']['last_name']; ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Email Address'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $notification['Notification']['email_address']; ?>
                    &nbsp;
                </dd>
            </dl>

        </div>

    </div>
    
</div>