<div id="wrapper" class="acc center fm-create clients index">
    
        <div class="hero col-xs-12 center">
            <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">Add a <span>Client</span></h1>
            </div>
            <div class="hr_over"></div>
            <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/1.jpg"></div>
        </div>
        
        <div class="db_tab col-xs-12 center">
            <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
        </div>
    
        <div class="content col-xs-8 center">

            <div class="damage_fees form inline col-xs-12 left push-t push-b">
                <?php 
                
                    echo $this->Form->create('DamageFeesCategory');
                
                    echo '<p class="left col-xs-12 inline">Name:</p>';
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