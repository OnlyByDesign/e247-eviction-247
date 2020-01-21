<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><?php echo String::insert(__('Edit <span>:param1</span>', true), array('param1' => __('Group', true))); ?></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/7.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-8 center">

        <div class="groups form inline col-xs-12 left push-t push-b">

                <?php

                echo $this->Form->create('Group');
            
                echo $this->Form->input('id', [
                    'div' => array('class' => 'fm_input fm_text col-xs-12 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Group ID',
                    'placeholder' => 'Group ID',
                    'label' => false
                ]);
            
                echo $this->Form->input('name', [
                    'div' => array('class' => 'fm_input fm_text col-xs-12 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Group Name',
                    'placeholder' => 'Group Name',
                    'label' => false
                ]);

                ?>
        </div>
        
        <?php
            echo $this->Form->submit('Save', array( 'type' => 'Save', 'type' => 'image', 'div' => array('class' => 'fm_input fm_text col-xs-3 inline center push-t last'), 'class' => 'btn-blue input')); 
            echo $this->Form->end();
            echo '<p class="col-xs-12 center">';
            echo $this->Html->link('Cancel', array('controller' => 'groups', 'action' => 'index'));
            echo '</p>';
        ?>

    </div>
    
</div>