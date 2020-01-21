<div id="wrapper" class="acc center fm-lease">
        
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main"><span>add</span> a provisions</h1>
            </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/pexels-photo-acc.jpeg"></div>
    </div>
    
    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_account')); ?>
    </div>
        
    <div class="content col-xs-8 center">

        <div class="provisions form col-xs-12 center push-b">
            
            <?php
            
                echo $this->Form->create('Provision', array('action' => 'add'));            
            
                echo $this->Form->input('description', [
                    'div' => array('class' => 'fm_input fm_text col-xs-12 inline xs-msg left'),
                    'class' => 'col-xs-12 center provision',
                    'type' => 'textarea',
                    'placeholder' => 'Additional Late Rent Fee',
                    'label' => false
                ]);
            
            ?>
            
        </div>
        <?php
        echo $this->Form->submit('Save', array(
            'type' => 'save',
            'type' => 'image',
            'div' => array(
                'class' => 'fm_input fm_text col-xs-3 center push-t'
            ),
            'class' => 'btn-blue input'
        ));
        
        echo $this->Html->link('Cancel', array('controller' => 'provisions', 'action' => 'index'));
        
        echo $this->Form->end();
        ?>
    </div>
</div>