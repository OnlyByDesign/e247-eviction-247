<?php echo $this->element('datepicker_includes') ?>

<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>add</span> a Custom Provision</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/5.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-8 center">

        <div class="actions col-xs-12 inline left">
            <div class="btn-blue col-xs-3 center left">
                <?php echo $this->Html->link(String::insert(__('List :param1', true), array('param1' => __('Custom Provisions', true))), array('action' => 'index', $user_id)); ?>
            </div>
        </div>

        <div class="provisions form col-xs-12 left flex push-t push-b">

            <?php echo $this->Form->create('Provision', array('action' => 'add/' . $user_id));?>

            <table cellpadding="0" cellspacing="0">
                <?php
                echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => $user_id));
                echo $this->Form->input('description', [
                    'div' => array('class' => 'fm_input fm_text col-xs-12 inline left'),
                    'class' => 'col-xs-12 center provision',
                    'type' => 'textarea',
                    'cols' => 100,
                    'after' => 'Add a Custom Provision',
                    'label' => false
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