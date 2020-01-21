<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>View</span> Users</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/3.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="users view content col-xs-8 center">

        <div class="inline col-xs-12 left push-t push-b">

            <?php if (AuthComponent::user('role') == 'superadmin') { ?>

                <div class="actions col-xs-12 left inline push-b">
                    <div class="col-xs-4 left inline">
                        <div class="btn-blue col-xs-5-2 center left">
                            <?php echo $this->Html->link(String::insert(__('Edit :action', true), array('action' => __('User', true))), array('action' => 'edit', $user['User']['id'])); ?>
                        </div>
                        <div class="btn-blue col-xs-5-2 center right">
                            <?php echo $this->Html->link(String::insert(__('List :action', true), array('action' => __('Users', true))), array('action' => 'index')); ?>
                        </div>
                    </div>
                    <div class="col-xs-7-2 left inline push-l" style="margin-top: -4px;">
                        <p class="left inline push-r push-l"><?php echo $this->Html->link(String::insert(__('Edit :action', true), array('action' => __('Profile', true))), array('controller' => 'profiles', 'action' => 'edit', $user['User']['id'])); ?> </p>
                        <p class="left inline push-r push-l"><?php echo $this->Html->link(String::insert(__('Edit :action', true), array('action' => __(' Custom Provisions', true))), array('controller' => 'provisions', 'action' => 'index', $user['User']['id'])); ?> </p>
                        <p class="left inline push-r push-l"><?php echo $this->Html->link('Leases', array('controller' => 'users', 'action' => 'list_leases', $user['User']['id'])); ?> </p>
                        <p class="left inline push-r push-l"><?php echo $this->Html->link('Notices', array('controller' => 'users', 'action' => 'list_notices', $user['User']['id'])); ?> </p>
                        <p class="left inline push-r push-l"><?php echo $this->Html->link('Evictions', array('controller' => 'users', 'action' => 'list_evictions', $user['User']['id'])); ?> </p>
                        <p class="left inline push-r push-l"><?php echo $this->Html->link('Address Book', array('controller' => 'address_books', 'action' => 'index', $user['User']['id'])); ?> </p>
                    </div>
                </div>

                <div class="dl col-xs-12 inline left">
                    <dl>
                        <?php $i = 0; $class = ' class="altrow"';?>
                        <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Role'); ?></dt>
                        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                            <?php echo $user['User']['role']; ?>
                            &nbsp;
                        </dd>
                        <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Username'); ?></dt>
                        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                            <?php echo $user['User']['username']; ?>
                            &nbsp;
                        </dd>
                        <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Allow Use of Electronic Signature?'); ?></dt>
                        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                            <?php if ($user['User']['use_signature'] == 1) echo 'Yes'; else echo 'No'; ?>
                            &nbsp;
                        </dd>
                        <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Allow Invoice Payment Method?'); ?></dt>
                        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                            <?php if ($user['User']['allow_alternate_payment'] == 1) echo 'Yes'; else echo 'No'; ?>
                            &nbsp;
                        </dd>
                        <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Allow Bypassing of Fee Agreement?'); ?></dt>
                        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                            <?php if ($user['User']['allow_fee_agreement_bypass'] == 1) echo 'Yes'; else echo 'No'; ?>
                            &nbsp;
                        </dd>
                        <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Allow Creation of Multi-Family Leases?'); ?></dt>
                        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                            <?php if ($user['User']['allow_multi_lease'] == 1) echo 'Yes'; else echo 'No'; ?>
                            &nbsp;
                        </dd>
                        <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Group user belongs to'); ?></dt>
                        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                            <?php if ($group_name != '') echo $group_name; else echo 'None'; ?>
                            &nbsp;
                        </dd>
                        <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Procuring Attorney'); ?></dt>
                        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                            <?php if (!empty($procuring_attorney)) echo $procuring_attorney['Attorney']['name']; ?>
                            &nbsp;
                        </dd>

                        <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Eviction'); ?></dt>
                        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                            <?php if ($user['User']['fee'] != '') echo '$'; echo $user['User']['fee']; ?>
                            &nbsp;
                        </dd>
                        <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Eviction w/Damages'); ?></dt>
                        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                            <?php if ($user['User']['fee_with_damages'] != '') echo '$'; echo $user['User']['fee_with_damages']; ?>
                            &nbsp;
                        </dd>
                        <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Lease (New)'); ?></dt>
                        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                            <?php if ($user['User']['fee'] != '') echo '$'; echo $user['User']['fee_lease_new']; ?>
                            &nbsp;
                        </dd>
                        <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Lease (Renewal)'); ?></dt>
                        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                            <?php if ($user['User']['fee'] != '') echo '$'; echo $user['User']['fee_lease_renewal']; ?>
                            &nbsp;
                        </dd>
                        <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Notice'); ?></dt>
                        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                            <?php if ($user['User']['fee'] != '') echo '$'; echo $user['User']['fee_notice']; ?>
                            &nbsp;
                        </dd>
                    </dl>
                </div>

                <?php } else if (AuthComponent::user('role') == 'admin') {  ?>
                    <div class="actions col-xs-6 left inline">
                        <p class="col-xs-3-2 push-r inline left"><strong><?php echo $this->Html->link('Leases', array('controller' => 'users', 'action' => 'list_leases', $user['User']['id'])); ?></strong></p>
                        <p class="col-xs-3-2 push-r inline left"><strong><?php echo $this->Html->link('Notices', array('controller' => 'users', 'action' => 'list_notices', $user['User']['id'])); ?></strong></p>
                        <p class="col-xs-3-2 push-r inline left"><strong><?php echo $this->Html->link('Evictions', array('controller' => 'users', 'action' => 'list_evictions', $user['User']['id'])); ?></strong></p>
                    </div>
                <?php } ?>

                <div class="related dl col-xs-12 inline left">
                    <?php if (!empty($user['Profile'])):?>
                        <dl>	<?php $i = 1; $class = ' class="altrow"';?>
                            <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('First Name');?></dt>
                            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                                <?php echo $user['Profile']['first_name'];?>
                                &nbsp;
                            </dd>
                            <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Last Name');?></dt>
                            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                                <?php echo $user['Profile']['last_name'];?>
                                &nbsp;
                            </dd>
                            <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Mailing Address1');?></dt>
                            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                                <?php echo $user['Profile']['mailing_address1'];?>
                                &nbsp;
                            </dd>
                            <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Mailing Address2');?></dt>
                            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                                <?php echo $user['Profile']['mailing_address2'];?>
                                &nbsp;
                            </dd>
                            <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('City');?></dt>
                            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                                <?php echo $user['Profile']['city'];?>
                                &nbsp;
                            </dd>
                            <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('State');?></dt>
                            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                                <?php echo $user['Profile']['state'];?>
                                &nbsp;
                            </dd>
                            <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Zip Code');?></dt>
                            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                                <?php echo $user['Profile']['zip_code'];?>
                                &nbsp;
                            </dd>
                            <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Primary Phone Number');?></dt>
                            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                                <?php echo $user['Profile']['primary_phone_number'];?>
                                &nbsp;
                            </dd>
                            <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Cell Phone Number');?></dt>
                            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                                <?php echo $user['Profile']['cell_phone_number'];?>
                                &nbsp;
                            </dd>
                            <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Fax Number');?></dt>
                            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                                <?php echo $user['Profile']['fax_number'];?>
                                &nbsp;
                            </dd>
                            <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Notification Email Address');?></dt>
                            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                                <?php echo $user['Profile']['email_address'];?>
                                &nbsp;
                            </dd>
                            <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Billing Email Address');?></dt>
                            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                                <?php echo $user['Profile']['billing_email_address'];?>
                                &nbsp;
                            </dd>
                            <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Company Name');?></dt>
                            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                                <?php echo $user['Profile']['company_name'];?>
                                &nbsp;
                            </dd>
                            <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Registration Date');?></dt>
                            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                                <?php echo $user['Profile']['created'];?>
                                &nbsp;
                            </dd>
                        </dl>
                    <?php endif; ?>

                </div>

        </div>

    </div>
    
</div>