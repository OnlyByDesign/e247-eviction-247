<div id="wrapper" class="acc center fm-create">

    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main">payments - <span><?php if (substr($payment['Payment']['transaction_id'], 0, 1) == 'C') { echo 'Invoiced Amount';; } else { echo 'Receipt'; } ?></span></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/3.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_account')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="payments view col-xs-12 left flex push-t push-b">

            <dl><?php $i = 0; $class = ' class="altrow"';?>
                <!--dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Case:'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $payment['Payment']['id']; ?>
                    &nbsp;
                </dd-->
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Amount:'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    $<?php echo $payment['Payment']['amount']; ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Transaction ID:'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $payment['Payment']['transaction_id']; ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Processed date:'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo date('l, F jS Y', strtotime($payment['Payment']['created'])); ?>
                    &nbsp;
                </dd>
            </dl>

        </div>
        
    </div>
    
</div>