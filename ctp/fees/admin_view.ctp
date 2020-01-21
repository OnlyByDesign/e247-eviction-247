<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span></span></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/#.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="actions col-xs-12 inline">
            <div class="btn-blue col-xs-2 center left">
                <?php echo $this->Html->link(sprintf(__('Edit %s', true), __('Fee', true)), array('action' => 'edit', $fee['Fee']['id'])); ?>
            </div>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(sprintf(__('Delete %s', true), __('Fee', true)), array('action' => 'delete', $fee['Fee']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $fee['Fee']['id'])); ?></strong></p>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(sprintf(__('List %s', true), __('Fees', true)), array('action' => 'index')); ?></strong></p>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(sprintf(__('New %s', true), __('Fee', true)), array('action' => 'add')); ?></strong></p>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(sprintf(__('List %s', true), __('Evictions', true)), array('controller' => 'evictions', 'action' => 'index')); ?></strong></p>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(sprintf(__('New %s', true), __('Eviction', true)), array('controller' => 'evictions', 'action' => 'add')); ?></strong></p>
        </div>

        <div class="fees view col-xs-12 left flex push-t push-b">
            
            <dl><?php $i = 0; $class = ' class="altrow"';?>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $fee['Fee']['id']; ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Eviction'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $this->Html->link($fee['Eviction']['id'], array('controller' => 'evictions', 'action' => 'view', $fee['Eviction']['id'])); ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Category'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $fee['Fee']['category']; ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $fee['Fee']['name']; ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Amount'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $fee['Fee']['amount']; ?>
                    &nbsp;
                </dd>
            </dl>
        
        </div>
        
    </div>
    
</div>