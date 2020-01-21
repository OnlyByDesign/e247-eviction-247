<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
            <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">Form <span>Edit</span></h1>
            </div>
            <div class="hr_over"></div>
            <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/5.jpg"></div>
        </div>
        
        <div class="db_tab col-xs-12 center">
            <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
        </div>
    
        <div class="content col-xs-8 center">
            
            <div class="actions btn-blue col-xs-2 center input left">
                <a href="<?php echo $this->Html->url(String::insert(__('List :param1', true), array('param1' => __('Clients', true))), array('action' => 'index')); ?>"><p>Cleint List</p></a>
            </div>
            
            <div class="damage_fees form inline col-xs-12 left push-t push-b">
                
                <?php
                
                echo $this->Form->create('DamageFee');
                
                echo $this->Form->input('damage_fees_category_id', array('options' => $categories, 'style' => 'font-size:18px;', 'class' => ' input col-xs-4 inline left', 'div' => array('class' => 'input fm_input fm_text text last'), 'label' => array('class'=>'left push-r')));
                
                echo '<p class="left col-xs-12 inline push-t">Description:</p>';
                echo $this->Form->input('name', array('class' => 'col-xs-12 inline left', 'label' => false, 'div' => array('class' => 'input fm_input fm_text text last')));
                
                ?>
                
            </div>

            <?php
                    echo $this->Form->submit('Save', array(
                        'type' => 'Save', 
                        'type' => 'image',
                        'div' => array(
                            'class' => 'fm_input fm_text col-xs-3 inline center push-t last'),
                        'class' => 'btn-blue input'
                    )); 
                    echo $this->Form->end();

                    echo '<p class="col-xs-12 center">';
                        echo $this->Html->link('Cancel', array('controller' => 'damage_fees_categories', 'action' => 'index'));
                    echo '</p>';
            ?>
            
        </div>
    
</div>