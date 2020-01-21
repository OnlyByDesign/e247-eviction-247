<script type="text/javascript">
	function removeLogo(logo_id) {
		document.getElementById('UserLogo' + logo_id + 'Hidden').value = '';
		document.getElementById('div-logo' + logo_id).innerHTML = '';
	}

	function removeSignature() {
		document.getElementById('UserSignatureHidden').value = '';
		document.getElementById('div-signature').innerHTML = '';
	}
</script>

<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><?php echo String::insert(__('Edit <span>:param1</span>', true), array('param1' => __('User', true))); ?></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/3.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="users form inline col-xs-12 left push-t push-b">

            <?php
                $relative_path = 'portal/' . $this->data['User']['username'];
                $absolute_path = 'http://' . env('SERVER_NAME') . '/app/docs/' . $relative_path . '/';
                echo $this->Form->create('User', array('type' => 'file'));
                echo $this->Form->input('id');
            ?>
            
            <div class="col-xs-12 inline center flex">
                <?php
                echo $this->Form->input('username', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Username',
                    'placeholder' => 'Username',
                    'label' => false,
                    'readonly' => true
                ]);
                echo $this->Form->input('password1', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Password - Leave blank if you do not wish to change the password',
                    'placeholder' => 'Password',
                    'label' => false,
                    'type' => 'password', 
                    'required' => false
                ]);
                echo $this->Form->input('password2', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 last inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Confirm Password',
                    'placeholder' => 'Confirm Password',
                    'label' => false,
                    'type' => 'password', 
                    'required' => false
                ]);
                ?>
            </div>
            
            <div class="col-xs-12 inline center push-t">
                
                <div class="col-xs-3-2 push-r left inline">
                    <?php
                    $afterText = '';
                    if ($this->data['User']['signature'] != '') $afterText = ' <div id="div-signature">(<a href="' . $absolute_path . $this->data['User']['signature'] . '" target="_blank">View current signature</a> / <a href="#" onclick="removeSignature();return false;">Remove signature</a>)</div>';
                    echo $this->Form->input('signature', array('div'=>false, 'class'=>'fm_input fm_text col-xs-12 inline left last', 'type' => 'file', 'after' => $afterText, 'label'=>array('class'=>'col-xs-12 fm_input fm_text left inline', 'text'=>'<strong>Signature</strong>')));
                    echo $this->Form->input('signature_hidden', array('type' => 'hidden', 'value' => $this->data['User']['signature']));
                    echo $this->Form->input('use_signature', array('div' => array('class' => 'fm_input fm_text text left last col-xs-12'), 'class' => 'col-xs-10 inline left', 'label' => array('class'=>'left push-r', 'text'=>'Allow Use of Electronic Signature'), 'type' => 'checkbox'));
                    ?>
                </div>
                
                <div class="col-xs-3-2 push-r left inline">
                    <?php
                    $afterText = '';
                    if ($this->data['User']['logo1'] != '') $afterText = '<div id="div-logo1">(<a href="' . $absolute_path . $this->data['User']['logo1'] . '" target="_blank">View current logo left</a> / <a href="#" onclick="removeLogo(1);return false;">Remove logo</a>)</div>';
                    echo $this->Form->input('logo1', array('div'=>false, 'class'=>'fm_input fm_text col-xs-12 inline left last', 'type' => 'file', 'after' => $afterText, 'label' => array('class' => 'col-xs-12 fm_input fm_text left inline', 'text' => '<strong>Logo Left</strong>')));
                    echo $this->Form->input('logo1_hidden', array('type' => 'hidden', 'value' => $this->data['User']['logo1']));
                    echo $this->Form->input('use_logos_lease', array('div' => array('class' => 'fm_input fm_text text left last col-xs-12'), 'class' => 'col-xs-10 inline left', 'label' => array('class'=>'left push-r', 'text'=>'Use logos on Leases'), 'type' => 'checkbox'));
                    ?>
                </div>
                
                <div class="col-xs-3-2 push-r left inline last">
                    <?php
                    $afterText = '';
                    if ($this->data['User']['logo2'] != '') $afterText = '<div id="div-logo2">(<a href="' . $absolute_path . $this->data['User']['logo2'] . '" target="_blank">View current logo left</a> / <a href="#" onclick="removeLogo(2);return false;">Remove logo</a>)</div>';
                    echo $this->Form->input('logo2', array('div'=>false, 'class'=>'fm_input fm_text col-xs-12 inline left last', 'type' => 'file', 'after' => $afterText, 'label' => array('class' => 'col-xs-12 fm_input fm_text left inline', 'text' => '<strong>Logo Left</strong>')));
                    echo $this->Form->input('logo2_hidden', array('type' => 'hidden', 'value' => $this->data['User']['logo1']));
                    echo $this->Form->input('use_logos_eviction', array('div' => array('class' => 'fm_input fm_text text left last col-xs-12'), 'class' => 'col-xs-10 inline left', 'label' => array('class'=>'left push-r', 'text'=>'Use logos on Evictions'), 'type' => 'checkbox'));
                    ?>
                </div>
                
            </div>
            
            <div class="col-xs-12 inline center push-t">
                <?php
                $checked = "";
                if ($is_superuser == 1) $checked = "checked";
                echo $this->Form->input('group', array('div' => array('class'=>'col-xs-3 fm_input fm_text inline left center'), 'class' => 'col-xs-12 input inline left', 'type' =>'select', 'after' => 'Group user belongs to', 'options' => $groups, 'empty' => array(0 => 'None'), 'value' => $group_id, 'label' => false));
                echo $this->Form->input('procuring_attorney_id', array('div' => array('class'=>'fm_input fm_text inline left center'), 'class' => 'col-xs-12 input left inline', 'type' =>'select', 'after' => 'Procuring Attorney','label' => false, 'options' => $attorneys, 'empty' => array(0 => 'None')));
                ?>
            </div>
            
            <div class="col-xs-12 inline center push-t">
                
                <?php
                
                echo $this->Form->input('allow_alternate_payment', array('div' => array('class' => 'fm_input fm_text text left last col-xs-4'), 'class' => 'col-xs-10 inline left', 'label' => array('class'=>'left push-r', 'text'=>'Allow Invoice Payment Method')));   
                
                echo $this->Form->input('allow_fee_agreement_bypass', array('div' => array('class' => 'fm_input fm_text text left last col-xs-4'), 'class' => 'col-xs-10 inline left', 'label' => array('class'=>'left push-r', 'text'=>'Allow Bypassing of Fee Agreement')));
                
                echo $this->Form->input('allow_multi_lease', array('div' => array('class' => 'fm_input fm_text text left last col-xs-4'), 'class' => 'col-xs-10 inline left', 'label' => array('class'=>'left push-r', 'text'=>'Allow Creation of Multi-Family Leases'))); 
                
                ?>
                
            </div>
            
            <div class="col-xs-12 inline center push-t">
                <p class="col-xs-12 left inline"><strong>Fees</strong></p>
                <div class="top-only col-xs-12 inline left flex">
                    <?php
                    echo $this->Form->input('fee', array('div' => array('class' => 'fm_input fm_text col-xs-2 left'), 'class' => 'input inline left', 'after' => 'Eviction', 'label' => false));
                    echo $this->Form->input('fee_with_damages', array('div' => array('class' => 'fm_input fm_text col-xs-2 left'), 'class' => 'input inline left', 'after' => 'Eviction (w/Damages)', 'label' => false));
                    echo $this->Form->input('fee_lease_new', array('div' => array('class' => 'fm_input fm_text col-xs-2 left'), 'class' => 'input inline left', 'after' => 'Lease (New)', 'label' => false));
                    echo $this->Form->input('fee_lease_renewal', array('div' => array('class' => 'fm_input fm_text col-xs-2 left'), 'class' => 'input inline left', 'after' => 'Lease (Renewal)', 'label' => false));
                    echo $this->Form->input('fee_notice', array('div' => array('class' => 'fm_input fm_text col-xs-2 left last'), 'class' => 'input inline left', 'after' => 'Notice', 'label' => false));
                    ?>
                </div>
            </div>

        </div>

        <?php
            echo $this->Form->submit('Save', array( 'type' => 'Save', 'type' => 'image', 'div' => array('class' => 'fm_input fm_text col-xs-3 inline center push-t last'), 'class' => 'btn-blue input')); 
            echo $this->Form->end();
            echo '<p class="col-xs-12 center">';
                echo $this->Html->link('Cancel', array());
            echo '</p>';
        ?>

    </div>
    
</div>

<?php include '/app/webroot/files/alert_popup.inc'; ?>