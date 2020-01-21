<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
            <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">Form <span>Edit</span></h1>
            </div>
            <div class="hr_over"></div>
            <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/5.jpg"></div>
        </div>
        
        <div class="db_tab col-xs-12 center">
            <?php echo $this->element('admin_tabs', array('currentTab' => 'my_account')); ?>
        </div>
    
        <div class="content col-xs-8 center">
            
            <div class="actions btn-blue col-xs-2 center input left">
                <a href="<?php echo $this->Html->url(String::insert(__('List :param1', true), array('param1' => __('Forms', true))), array('action' => 'index')); ?>"><p>Form List</p></a>
            </div>

            <div class="forms form inline col-xs-12 left push-t">
                
                <?php
                
                echo $this->Form->create('Form', array('type' => 'file', 'action' => 'edit'));
                
                echo $this->Form->input('id');
                
                echo '<p class="left col-xs-2 inline">Form Title:</p>';
                echo $this->Form->input('title', array('class' => 'col-xs-12 inline left', 'label' => false, 'div' => array('class' => 'input fm_input fm_text text last')));
                
                ?>
                
            </div>
            <div class="forms form inline col-xs-12 left push-t">
                
                <?php
                
                echo '<p class="left col-xs-1 inline">File:</p>';
                
                echo $this->Form->input('title', array('type' => 'file', 'class' => 'col-xs-12 inline left', 'label' => false, 'after' => '<span>Current file: ' . $this->data['Form']['filename'] . '</span>', 'style' => 'font-size: 18px; padding-left: 0px !important; padding-bottom: 10px;', 'div' => array('class' => 'inline col-xs-10 left')));
                
                ?>
                
            </div>
            
            <?php
                
                echo $this->Form->submit('Save', array(
                    'type' => 'Save', 
                    'type' => 'image',
                    'div' => array(
                        'class' => 'fm_input fm_text col-xs-3 inline center last'),
                    'class' => 'btn-blue input'
                ));
                
                echo $this->Form->end();
                
            ?>
            
    </div>
    
</div>