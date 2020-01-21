<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>view</span> users</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/3.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="actions col-xs-12 inline">
            <div class="btn-blue col-xs-3 center left">
                <?php echo $this->Html->link(String::insert(__('Edit :action', true), array('action' => __('Profile', true))), array('controller' => 'profiles', 'action' => 'edit', $user['Profile']['id'])); ?>
            </div>
        </div>

        <div class="users view col-xs-12 left flex push-t push-b">
            
            <dl><?php $i = 0; $class = ' class="altrow"';?>
                <!--dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $user['User']['id']; ?>
                    &nbsp;
                </dd-->
                <!--dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Role'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $user['User']['role']; ?>
                    &nbsp;
                </dd-->
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Username'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $user['User']['username']; ?>
                    &nbsp;
                </dd>
                <!--dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Password'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $user['User']['password']; ?>
                    &nbsp;
                </dd-->
            </dl>
            
            <h3 class="left col-xs-12 inline"><?php echo String::insert(__('Related :param1', true), array('param1' => __('Profiles', true)));?></h3>
            <?php if (!empty($user['Profile'])):?>
            <dl><?php $i = 0; $class = ' class="altrow"';?>
                <!--dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id');?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $user['Profile']['id'];?>
            &nbsp;</dd>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('User Id');?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
        <?php echo $user['Profile']['user_id'];?>
    &nbsp;</dd-->
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('First Name');?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
        <?php echo $user['Profile']['first_name'];?>
    &nbsp;</dd>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Last Name');?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
        <?php echo $user['Profile']['last_name'];?>
    &nbsp;</dd>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Mailing Address1');?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
        <?php echo $user['Profile']['mailing_address1'];?>
    &nbsp;</dd>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Mailing Address2');?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
        <?php echo $user['Profile']['mailing_address2'];?>
    &nbsp;</dd>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('City');?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
        <?php echo $user['Profile']['city'];?>
    &nbsp;</dd>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('State');?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
        <?php echo $user['Profile']['state'];?>
    &nbsp;</dd>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Zip Code');?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
        <?php echo $user['Profile']['zip_code'];?>
    &nbsp;</dd>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Primary Phone Number');?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
        <?php echo $user['Profile']['primary_phone_number'];?>
    &nbsp;</dd>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Cell Phone Number');?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
        <?php echo $user['Profile']['cell_phone_number'];?>
    &nbsp;</dd>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Fax Number');?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
        <?php echo $user['Profile']['fax_number'];?>
    &nbsp;</dd>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Email Address');?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
        <?php echo $user['Profile']['email_address'];?>
    &nbsp;</dd>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Company Name');?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
        <?php echo $user['Profile']['company_name'];?>
    &nbsp;</dd>
            </dl>
        <?php endif; ?>
            
	   </div>
        
    </div>
    
</div>