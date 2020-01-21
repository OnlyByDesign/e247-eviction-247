<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>view</span> occupants</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/1.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="actions col-xs-12 inline">
            <div class="btn-blue col-xs-2 center left">
                <?php echo $this->Html->link(sprintf(__('Edit %s', true), __('Defendant', true)), array('action' => 'edit', $defendant['Defendant']['id'])); ?>
            </div>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(sprintf(__('Delete %s', true), __('Defendant', true)), array('action' => 'delete', $defendant['Defendant']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $defendant['Defendant']['id'])); ?></strong></p>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(sprintf(__('List %s', true), __('Defendants', true)), array('action' => 'index')); ?></strong></p>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(sprintf(__('New %s', true), __('Defendant', true)), array('action' => 'add')); ?></strong></p>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(sprintf(__('List %s', true), __('Evictions', true)), array('controller' => 'evictions', 'action' => 'index')); ?></strong></p>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(sprintf(__('New %s', true), __('Eviction', true)), array('controller' => 'evictions', 'action' => 'add')); ?></strong></p>
        </div>

        <div class="defendants view col-xs-12 left flex push-t push-b">
            
            <dl><?php $i = 0; $class = ' class="altrow"';?>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $defendant['Defendant']['id']; ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Eviction'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $this->Html->link($defendant['Eviction']['id'], array('controller' => 'evictions', 'action' => 'view', $defendant['Eviction']['id'])); ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('First Name'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $defendant['Defendant']['first_name']; ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Middle Name'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $defendant['Defendant']['middle_name']; ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Last Name'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $defendant['Defendant']['last_name']; ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date Of Birth'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $defendant['Defendant']['date_of_birth']; ?>
                    &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ssn'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo $defendant['Defendant']['ssn']; ?>
                    &nbsp;
                </dd>
            </dl>
            
        </div>
        
    </div>
    
</div>
