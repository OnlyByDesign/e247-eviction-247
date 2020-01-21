<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><?php echo String::insert(__('Add <span>:action</span>', true), array('action' => __('County', true))); ?></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/1.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-8 center">

        <div class="counties form inline col-xs-12 left push-t push-b">
            
            <?php echo $this->Form->create('County'); ?>
            
            <div class="col-xs-12 left flex">
                <?php
                echo $this->Form->input('state', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'State',
                    'options' => $states,
                    'label' => false
                ]);
                echo $this->Form->input('name', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'County',
                    'placeholder' => 'County',
                    'label' => false
                ]);
                echo $this->Form->input('jurisdiction', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Jurisdiction',
                    'placeholder' => 'Jurisdiction',
                    'label' => false
                ]);
                ?>
            </div>
            
            <div class="col-xs-12 left flex">
                <?php
                echo $this->Form->input('fee', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Fee',
                    'placeholder' => 'Fee',
                    'label' => false
                ]);
                echo $this->Form->input('fee_with_damages', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Fee with Damages',
                    'placeholder' => 'Fee with Damages',
                    'label' => false
                ]);
                echo $this->Form->input('summons', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Issuance of Summons',
                    'placeholder' => 'Issuance of Summons',
                    'label' => false
                ]);
                ?>
            </div>
            
            <div class="col-xs-12 left flex">            
                <?php
                echo $this->Form->input('process_server', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Service of Process',
                    'placeholder' => 'Service of Process',
                    'label' => false
                ]);
                echo $this->Form->input('writ', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Writ of Possession',
                    'placeholder' => 'Writ of Possession',
                    'label' => false
                ]);
                echo $this->Form->input('writ_2', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Writ of Possession (Additional)',
                    'placeholder' => 'Writ of Possession (Additional)',
                    'label' => false
                ]);
                ?>
            </div>
            
            <div class="col-xs-12 left flex">            
                <?php
                echo $this->Form->input('writ_issuance', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Issuance of Writ of Possession',
                    'placeholder' => 'Issuance of Writ of Possession',
                    'label' => false
                ]);
                echo $this->Form->input('posting_fee', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => '3 Day Notice Posting',
                    'placeholder' => '3 Day Notice Posting',
                    'label' => false
                ]);
                echo $this->Form->input('filling_fee_eviction', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Eviction Filling Fee',
                    'placeholder' => 'Eviction Filling Fee',
                    'label' => false
                ]);
                ?>
            </div>
            
            <div class="col-xs-12 left flex">
                <?php
                echo $this->Form->input('filling_fee_damages', [
                    'div' => array('class' => 'fm_input fm_text col-xs-7-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Eviction Filling Fee (Damages)',
                    'placeholder' => 'Eviction Filling Fee (Damages)',
                    'label' => false
                ]);
                echo $this->Form->input('use_base_documents', array(
                    'div' => array('class' => 'fm_input fm_text text left last col-xs-4'), 
                    'class' => 'col-xs-10 inline left', 
                    'label' => array('class'=>'left push-r', 'text'=>'Use Base Documents')
                ));
                ?>
            </div>
            
            <div class="col-xs-12 left flex">
                <?php
                echo $this->Form->input('court_information', [
                    'div' => array('class' => 'fm_input fm_text col-xs-12 inline left'),
                    'class' => 'col-xs-12 center',
                    'after' => 'Court Information',
                    'placeholder' => 'Court Information',
                    'label' => false,
                    'rows' => 5
                ]);
                ?>
            </div>
            
            <div class="col-xs-12 left flex push-t">
                <?php
                echo $this->Form->input('fee_lease_new', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'New Lease Fee',
                    'placeholder' => 'New Lease Fee',
                    'label' => false
                ]);
                echo $this->Form->input('fee_lease_renewal', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Lease Renewal Fee',
                    'placeholder' => 'Lease Renewal Fee',
                    'label' => false
                ]);
                echo $this->Form->input('fee_notice', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Notice Fee',
                    'placeholder' => 'Notice Fee',
                    'label' => false
                ]);
                ?>
            </div>
                
        </div>

        <?php
        echo $this->Form->submit('Save', array( 'type' => 'Save', 'type' => 'image', 'div' => array('class' => 'fm_input fm_text col-xs-3 inline center push-t last'), 'class' => 'btn-blue input')); 
        echo $this->Form->end();
        echo '<p class="col-xs-12 center">';
        echo $this->Html->link('Cancel', array('controller' => 'counties', 'action' => 'index'));
        echo '</p>';
        ?>

    </div>
    
</div>