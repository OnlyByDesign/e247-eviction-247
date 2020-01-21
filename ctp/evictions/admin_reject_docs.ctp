<div id="wrapper" class="acc center fm-create">
    
        <div class="hero col-xs-12 center">
            <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">Reject client <span>documents</span></h1>
            </div>
            <div class="hr_over"></div>
            <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/5.jpg"></div>
        </div>
        
        <div class="db_tab col-xs-12 center">
            <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
        </div>
    
        <div class="evictions form content col-xs-8 center">

            <div class=" inline col-xs-12 left push-t push-b">
                
                <div class="inline left col-xs-12">
                    
                    <div class="inline left col-xs-12">
                        <p class="col-xs-7 push-r left inline"><strong>Property address: </strong><br><?php echo $address ?></p>
                        <div class="col-xs-4 right inline">
                            <p class="col-xs-12 left"><strong>Plaintiff: </strong><?php $plaintiff ?></p>
                            <p class="col-xs-12 left"><strong>Defendant(s): </strong><?php $defendants ?></p>
                            <p class="col-xs-12 left"><strong>Matter #: </strong><?php $eviction_id ?></p>
                        </div>
                    </div>
                    
                    <?php echo $this->Form->create('Eviction', array('action' => "reject_docs/$eviction_id"));
                            
                        if ($is_lease_uploaded)
                            
                            echo $this->Form->input('reject_3day', array('div' => array('class' => 'fm_mem inline input col-xs-12  push-t push-b left'), 'class' => 'fm_check', 'label' => 'Reject Notice to Pay', 'type' => 'checkbox'));
                            
                            if ($is_signed_three_day_uploaded) {
                                echo '<p class="col-xs-3 left inline push-b">The plaintiff in this matter is:</p>';
                                echo '<div class="col-xs-4 fm_input fm_text inline center left last">';
                                $options = array('3day' => '3 Day Notice to Pay', '8day' => '8 Day Notice to Pay');
                                $attributes = array(
                                    'class' => 'input center',
                                    'legend' => false,
                                    'default' => $notice_type
                                );
                                echo $this->Form->radio('reject_notice_type', $options, $attributes);
                                echo '</div>';
                            }
                            
                            if ($is_affidavit_uploaded) 
                                echo '<p class="col-xs-4 left inline push-b">An email with a copy of the Affidavit of Non-Military Service will be sent to the client.</p>';
                                echo '<div class="col-xs-4 fm_input fm_text inline center left last">';
                                echo $this->Form->input('reject_affidavit', array(
                                    'div' => array('class' => 'fm_mem inline input col-xs-12 left'),
                                    'class' => 'fm_check',
                                    'label' => 'Reject Client Affidavit of Non-Military Service',
                                    'type' => 'checkbox'
                                ));
                                echo '</div>';
                    ?>
                    
                    <p class="col-xs-12 left inline push-t">Enter the reason why this Lease/Notice to Pay/Client Affidavit of Non-Military Service is being rejected. </p>
                    <?php 
                    echo $this->Form->input('message', [
                        'div' => array('class' => 'fm_input fm_text col-xs-4 inline left'),
                        'class' => 'input col-xs-12 center',
                        'type' => 'textarea',
                        'after' => 'Reason for rejection',
                        'placeholder' => 'Reason for rejection',
                        'label' => false,
                        'cols' => '60'
                    ]); ?>
                    <p class="col-xs-12 left inline push-t">Enter additional email addresses separated by a comma</p>
                    <?php 
                    echo $this->Form->input('email', array(
                        'div' => array('class' => 'fm_input fm_text col-xs-12 inline left'),
                        'class' => 'input col-xs-12 center',
                        'type' => 'text',
                        'value' => $profile_email,
                        'label' => false
                    ));
                    ?>
                </div>
                
            </div>
            
            <?php
            echo $this->Form->submit('Save', array( 'type' => 'Save', 'type' => 'image', 'div' => array('class' => 'fm_input fm_text col-xs-3 inline center push-t last'), 'class' => 'btn-blue input')); 
            echo $this->Form->end();
            echo '<p class="col-xs-12 center">';
                    echo $this->Html->link('Cancel', array('controller' => 'damage_fees_categories', 'action' => 'index'));
            echo '</p>';
            ?>
            
        </div>
    
</div>