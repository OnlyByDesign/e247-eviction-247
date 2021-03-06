<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>view</span> services</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/2.jpeg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_account')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="actions col-xs-12 inline">
            <div class="btn-blue col-xs-2 center left">
                <a href="<?php echo $this->Html->url(array('controller' => '#', 'action' => '#', $lease_id)); ?>"><p>Manage Landlords</p></a>
            </div>
        </div>

        <div class="services view col-xs-12 left flex push-t push-b">
            
            <dl><?php $i = 0; $class = ' class="altrow"';?>
                <!--dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $service['Service']['id']; ?>
                    &nbsp;
                </dd-->
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Name'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $service['Service']['name']; ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Fee'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $service['Service']['fee']; ?>
                    &nbsp;
                </dd>
            </dl>
        
        </div>
        
    </div>
    
</div>