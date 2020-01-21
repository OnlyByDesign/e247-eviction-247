<div id="wrapper" class="acc center fm-lease">
        
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main"><span>add</span> a property</h1>
            </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/4.jpg"></div>
    </div>
    
    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_account')); ?>
    </div>
        
    <div class="content col-xs-10 center">

        <div class="entries form col-xs-12 center">
            
            <?php 
            echo $this->Form->create('PropertyAddressBook');
            
            echo $this->Form->input('street_address1', [
                'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Street address',
                'placeholder' => 'Street address',
                'label' => false
            ]);
            echo $this->Form->input('street_address2', [
                'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Unit No.',
                'placeholder' => 'Unit No.',
                'label' => false
            ]);
            echo $this->Form->input('city', [
                'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'City',
                'placeholder' => 'City',
                'label' => false
            ]);
            echo $this->Form->input('zip_code', [
                'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Zip code',
                'placeholder' => 'Zip code',
                'label' => false
            ]);
            ?>
            
        </div>
        
        <?php
        echo $this->Form->submit('Save', array(
            'type' => 'save',
            'type' => 'image',
            'div' => array(
                'class' => 'fm_input fm_text col-xs-3 center'
            ),
            'class' => 'btn-blue input'
        ));
        echo $this->Html->link('Cancel', array('controller' => 'property_address_books', 'action' => 'index'));
        echo $this->Form->end();
        ?>
        
    </div>
    
</div>