<?php
	$message = '';
	switch ($three_day_notice_option_id) {
		case 1:
				$message = 'After completing and posting your signed Notice to Pay please log back into your account and upload your Notice as soon as possible. ';
				break;
		case 2:
				$message = 'A Notice to Pay with instructions for completing are attached for your convenience. ';
				$message .= 'After completing and posting your signed Notice to Pay please log back into your account and upload your Notice as soon as possible. ';
				break;
		case 3:
				if ($has_signature) {
					//$message = 'Please login to your account by clicking on the link below to electronically sign the Notice to Pay. ';
				} else {
					$message = 'A Notice to Pay with instructions for completing are attached for your convenience. ';
					$message .= 'After signing the Notice please log back into your account and upload the Notice so we can post it at the property. ';
				}
				break;
	}
?>

<script type="text/javascript">
	function changeMessage() {
		if (document.getElementById('EvictionNoticeType3day').checked) {
			document.getElementById('EvictionMessage').value = '<?php echo $message; ?>';
		}	else {
			document.getElementById('EvictionMessage').value = 'This matter requires an 8 Day Notice to Pay because the address of the eviction property is in a different County from where payment will be made. <?php echo $message; ?>';
		}
	}

	$(document).ready(function() {
		changeMessage();
	});
</script>

<div id="wrapper" class="acc center fm-create">
    
        <div class="hero col-xs-12 center">
            <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">Create/Send <span>Notice to pay</span></h1>
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
                    <p class="col-xs-7 push-r left inline"><strong>Property address: </strong><br><?php echo $address ?></p>
                    <div class="col-xs-4 right inline">
                        <p class="col-xs-12 left"><strong>Plaintiff: </strong><?php $plaintiff ?></p>
                        <p class="col-xs-12 left"><strong>Defendant(s): </strong><?php $defendants ?></p>
                        <p class="col-xs-12 left"><strong>Matter #: </strong><?php $eviction_id ?></p>
                    </div>
                </div>
                
                <?php echo $this->Form->create('Eviction', array('action' => "create_notice/$eviction_id")); ?>
                
                <p class="col-xs-12 left inline push-t">An email with a pre-filled Three/Eight Day Notice will be sent to the client.</p>
                
                <div class="col-xs-12 left inline push-t">
                    <?php
                    echo '<p class="col-xs-3 left inline push-b">The plaintiff in this matter is:</p>';
                    echo '<div class="col-xs-9 fm_input fm_text inline center left last">';
                    $options = array('3day' => 'Three Day Notice', '8day' => 'Eight Day Notice');
                    $attributes = array(
                        'class' => 'input center',
                        'legend' => false,
                        'value' => '3day',
                        'onclick' => 'changeMatter();'
                    );
                    echo $this->Form->radio('notice_type', $options, $attributes);
                    echo '</div>';
                    ?>
                </div>
                
                <p class="col-xs-12 left inline push-t">Enter the message that will be sent to the client. </p>
                <?php 
                echo $this->Form->input('message', [
                    'div' => array('class' => 'fm_input fm_text col-xs-12 inline left push-b'),
                    'class' => 'col-xs-12 center',
                    'type' => 'textarea',
                    'cols' => '60',
                    'label' => false
                ]); ?>
                
                <p class="col-xs-12 left inline push-t">Enter additional email addresses separated by a comma</p>
                <?php 
                echo $this->Form->input('email', array(
                    'div' => array('class' => 'fm_input fm_text col-xs-12 inline left'),
                    'class' => 'col-xs-12 center input',
                    'type' => 'text', 
                    'label' => false,
                    'value' => $profile_email
                )); ?>
                
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