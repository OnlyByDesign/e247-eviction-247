<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><?php echo String::insert(__('Edit <span>:action</span>', true), array('action' => __('County', true))); ?></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/7.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="counties form inline col-xs-12 left push-t push-b">
            
            <?php 
            echo $this->Form->create('County');
            echo $this->Form->input('id');
            ?>
            
            <div class="col-xs-12 center flex push-t">
                <?php
                echo $this->Form->input('state', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center currency',
                    'after' => 'State',
                    'options' => $states,
                    'label' => false
                ]);
                echo $this->Form->input('name', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center currency',
                    'after' => 'County',
                    'placeholder' => 'County',
                    'label' => false
                ]);
                echo $this->Form->input('jurisdiction', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left last'),
                    'class' => 'input col-xs-12 center currency',
                    'after' => 'Jurisdiction',
                    'placeholder' => 'Jurisdiction',
                    'label' => false
                ]);
                ?>
            </div>
            
            <div class="col-xs-12 center flex push-t">
                
                <div class="col-xs-4 push-r left inline">
                    <?php
                    echo $this->Form->input('fee', [
                        'div' => array('class' => 'fm_input fm_text col-xs-12 inline left last'),
                        'class' => 'input col-xs-12 center currency',
                        'after' => 'Fee',
                        'placeholder' => 'Fee',
                        'label' => false
                    ]);
                    echo $this->Form->input('propagate_fee_eviction', array('type'=>'checkbox', 'div' => array('class' => 'fm_input fm_text text left last col-xs-12'), 'class' => 'col-xs-10 inline left', 'label' => array('class'=>'left push-r', 'text'=>'Propagate this fee to all counties')));
                    ?>
                </div>
                
                <div class="col-xs-4 push-r left inline">
                    <?php
                    echo $this->Form->input('fee_with_damages', [
                        'div' => array('class' => 'fm_input fm_text col-xs-12 inline left last'),
                        'class' => 'input col-xs-12 center currency',
                        'after' => 'Fee with damages',
                        'placeholder' => 'Fee with damages',
                        'label' => false
                    ]);
                    echo $this->Form->input('propagate_fee_damages', array('type'=>'checkbox', 'div' => array('class' => 'fm_input fm_text text left last col-xs-12'), 'class' => 'col-xs-10 inline left', 'label' => array('class'=>'left push-r', 'text'=>'Propagate this fee to all counties')));
                    ?>
                </div>
                
                <?php echo $this->Form->input('summons', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3 inline left last'),
                    'class' => 'input col-xs-12 center currency',
                    'after' => 'Issuance of Summons',
                    'placeholder' => 'Issuance of Summons',
                    'label' => false
                ]); ?>
                
            </div>
            
            <div class="col-xs-12 center flex push-t">
                <?php
                echo $this->Form->input('process_server', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                    'class' => 'input col-xs-12 center currency',
                    'after' => 'Service of Process',
                    'placeholder' => 'Service of Process',
                    'label' => false
                ]);
                echo $this->Form->input('writ', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                    'class' => 'input col-xs-12 center currency',
                    'after' => 'Writ of Possession',
                    'placeholder' => 'Writ of Possession',
                    'label' => false
                ]);
                echo $this->Form->input('writ_2', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                    'class' => 'input col-xs-12 center currency',
                    'after' => 'Writ of Possession (additional Def.)',
                    'placeholder' => 'Writ of Possession',
                    'label' => false
                ]);
                echo $this->Form->input('writ_issuance', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center currency',
                    'after' => 'Issuance of Writ of Possession',
                    'placeholder' => 'Issuance of Writ of Possession',
                    'label' => false
                ]);
                ?>
            </div>
            
            <div class="col-xs-12 center flex push-t">
                <?php
                echo $this->Form->input('posting_fee', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center currency',
                    'after' => 'Notice to Pay Posting',
                    'placeholder' => 'Notice to Pay Posting',
                    'label' => false
                ]);
                echo $this->Form->input('filing_fee_eviction', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center currency',
                    'after' => 'Eviction filling fee',
                    'placeholder' => 'Eviction filling fee',
                    'label' => false
                ]);
                echo $this->Form->input('filing_fee_damages', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center currency',
                    'after' => 'Filling fee with damages',
                    'placeholder' => 'Filling fee with damages',
                    'label' => false
                ]);
                ?>
            </div>
            
            <div class="col-xs-12 center push-t">
                <p class="col-xs-12 left inline">If their is any relevant court information, input it here:</p>
                <?php
                echo $this->Form->input('court_information', [
                    'div' => array('class' => 'fm_input fm_text col-xs-12 inline left'),
                    'class' => 'col-xs-12 center',
                    'placeholder' => 'Court Information',
                    'label' => false,
                    'cols' => 80, 
                    'rows' => 10
                ]);
                echo $this->Form->input('use_base_documents', array('div' => array('class' => 'fm_input fm_text text left last col-xs-5-2'), 'class' => 'col-xs-10 inline left', 'label' => array('class'=>'left push-r', 'text'=>'Use Base Documents')));
                ?>
            </div>
            
            <div class="col-xs-12 center flex push-t">
                
                <div class="col-xs-3-2 push-r left inline">
                    <?php
                    echo $this->Form->input('fee_lease_new', [
                        'div' => array('class' => 'fm_input fm_text col-xs-12 inline left last'),
                        'class' => 'input col-xs-12 center currency',
                        'after' => 'New lease fee',
                        'placeholder' => 'New lease fee',
                        'label' => false
                    ]);
                    echo $this->Form->input('propagate_fee_lease_new', array('type'=>'checkbox', 'div' => array('class' => 'fm_input fm_text text left last col-xs-12'), 'class' => 'col-xs-10 inline left', 'label' => array('class'=>'left push-r', 'text'=>'Propagate this fee to all counties')));
                    ?>
                </div>
                
                <div class="col-xs-3-2 push-r left inline">
                    <?php
                    echo $this->Form->input('fee_lease_renewal', [
                        'div' => array('class' => 'fm_input fm_text col-xs-12 inline left last'),
                        'class' => 'input col-xs-12 center currency',
                        'after' => 'Lease renewal fee',
                        'placeholder' => 'Lease renewal fee',
                        'label' => false
                    ]);
                    echo $this->Form->input('propagate_fee_lease_renewals', array('type'=>'checkbox', 'div' => array('class' => 'fm_input fm_text text left last col-xs-12'), 'class' => 'col-xs-10 inline left', 'label' => array('class'=>'left push-r', 'text'=>'Propagate this fee to all counties')));
                    ?>
                </div>
                
                <div class="col-xs-3-2 push-r left inline">
                    <?php
                    echo $this->Form->input('fee_notice', [
                        'div' => array('class' => 'fm_input fm_text col-xs-12 inline left last'),
                        'class' => 'input col-xs-12 center currency',
                        'after' => 'Lease renewal fee',
                        'placeholder' => 'Lease renewal fee',
                        'label' => false
                    ]);
                    echo $this->Form->input('propagate_fee_notice', array('type'=>'checkbox', 'div' => array('class' => 'fm_input fm_text text left last col-xs-12'), 'class' => 'col-xs-10 inline left', 'label' => array('class'=>'left push-r', 'text'=>'Propagate this fee to all counties')));
                    ?>
                </div>
                
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