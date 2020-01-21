<?php echo $this->element('datepicker_includes') ?>

<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>edit</span> a provision</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/6.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="actions col-xs-12 inline">
            <div class="btn-blue col-xs-2 center left">
                <?php echo $this->Html->link(String::insert(__('List :param1', true), array('param1' => __('Provisions', true))), array('action' => 'index', $lease_id)); ?>
            </div>
            <p class="left inline push-l input center"><strong><?php echo $this->Html->link(String::insert(__('Back to :param1', true), array('param1' => __('Lease', true))), array('controller' => 'leases', 'action' => 'edit', $lease_id)); ?></strong></p>
        </div>

        <div class="lease_provisions form col-xs-12 left flex push-t push-b">
            
            <?php echo $this->Form->create('LeaseProvision');?>

            <table cellpadding="0" cellspacing="0">
                <?php
                echo $this->Form->input('LeaseProvision.id');
                echo $this->Form->input('lease_id', array('type' => 'hidden'));
                echo $this->Form->input('provision_id', array('type' => 'hidden'));
                echo $this->Form->input('LeaseProvision.original_description', array('type' => 'hidden', 'value' => $this->data['LeaseProvision']['description']));
                
                echo $this->Form->input('LeaseProvision.description', [
                    'div' => array('class' => 'fm_input fm_text col-xs-12 inline left provision'),
                    'class' => 'input col-xs-12 center',
                    'after' => '<p class="col-xs-12 inline left">Lease provision description</p>',
                    'placeholder' => 'Lease provision description',
                    'label' => false
                ]);
                echo $this->Form->input('LeaseProvision.is_approved', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'type' => 'checkbox',
                    'label' => 'Approved'
                ]);
                if ($this->data['LeaseProvision']['provision_id'] != 0) 
                    echo $this->Form->input('LeaseProvision.do_modify', [
                        'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                        'class' => 'input col-xs-12 center',
                        'after' => '#',
                        'placeholder' => '#',
                        'label' =>'Apply changes to provision on clients list',
                        'type' => 'checkbox'
                    ]);
                echo $this->Form->input('create_custom', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'label' => 'Add provision to client\'s list',
                    'type' => 'checkbox',
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