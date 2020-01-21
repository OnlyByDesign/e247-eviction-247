<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>view</span> profile info</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/2.jpeg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="actions col-xs-12 inline">
            <div class="btn-blue col-xs-2 center left">
                <?php echo $this->Html->link(String::insert(__('Edit :param1', true), array('param1' => __('Profile', true))), array('action' => 'edit', $profile['Profile']['id'])); ?>
            </div>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(String::insert(__('Delete :param1', true), array('param1' => __('Profile', true))), array('action' => 'delete', $profile['Profile']['id']), null, String::insert(__('Are you sure you want to delete :first :last?', true), array('first' => $profile['Profile']['first_name'], 'last' => $profile['Profile']['last_name']))); ?></strong></p>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(String::insert(__('List :param1', true), array('param1' => __('Profiles', true))), array('action' => 'index')); ?></strong></p>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(String::insert(__('New :param1', true), array('param1' => __('Profile', true))), array('action' => 'add')); ?></strong></p>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(String::insert(__('List :param1', true), array('param1' => __('Users', true))), array('controller' => 'users', 'action' => 'index')); ?></strong></p>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(String::insert(__('New :param1', true), array('param1' => __('User', true))), array('controller' => 'users', 'action' => 'add')); ?></strong></p>
        </div>

        <div class="profiles view col-xs-12 left flex push-t push-b">

            <dl><?php $i = 0; $class = ' class="altrow"';?>
                <!--dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $profile['Profile']['id']; ?>
                    &nbsp;
                </dd-->
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('User'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $this->Html->link($profile['User']['id'], array('controller' => 'users', 'action' => 'view', $profile['User']['id'])); ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('First Name'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $profile['Profile']['first_name']; ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Last Name'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $profile['Profile']['last_name']; ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Mailing Address1'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $profile['Profile']['mailing_address1']; ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Mailing Address2'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $profile['Profile']['mailing_address2']; ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('City'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $profile['Profile']['city']; ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('State'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $profile['Profile']['state']; ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Zip Code'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $profile['Profile']['zip_code']; ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Primary Phone Number'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $profile['Profile']['primary_phone_number']; ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Cell Phone Number'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $profile['Profile']['cell_phone_number']; ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Fax Number'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $profile['Profile']['fax_number']; ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Notification Email Address'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $profile['Profile']['email_address']; ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Billing Email Address'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $profile['Profile']['billing_email_address']; ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Company Name'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $profile['Profile']['company_name']; ?>
                    &nbsp;
                </dd>
            </dl>

        </div>
        
    </div>
    
</div>