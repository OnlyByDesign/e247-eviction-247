<div id="wrapper" class="acc center fm-create leases index">
    
    <div class="hero col-xs-12 center">
            <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">Manage <span>Attorneys</span></h1>
            </div>
            <div class="hr_over"></div>
            <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/5.jpg"></div>
        </div>
        
        <div class="db_tab col-xs-12 center">
            <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
        </div>
    
        <div class="content col-xs-8 center">

            <div class="actions btn-blue col-xs-2 center input left">
                <a href="<?php echo $this->Html->url(String::insert(__('List :param1', true), array('param1' => __('Attorneys', true))), array('action' => 'index')); ?>"><p>New Attorney</p></a>
            </div>

            <div class="attorneys form inline col-xs-12 left push-t">
                
                <?php echo $this->Form->create('Attorney', array('type' => 'file', 'action' => 'edit'));?>
                
                <?php
                
                echo $this->Form->input('id');
                
                echo $this->Form->input('first_name', array('div'=>array('class'=>'fm_input fm_text inline col-xs-5-2 left'), 'class'=>'input left'));
                
                echo $this->Form->input('last_name', array('div'=>array('class'=>'fm_input fm_text inline col-xs-5-2 left'), 'class'=>'input left'));
                
                ?>
                
            </div>
            
            <?php
                echo $this->Form->submit('Save', array(
                    'type' => 'Save', 
                    'type' => 'image',
                    'div' => array(
                        'class' => 'fm_input fm_text col-xs-3 inline center last push-t'),
                    'class' => 'btn-blue input'
                ));
                echo $this->Form->end();
            ?>
    </div>
    
</div>