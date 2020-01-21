<?php
	if ($notice_to_eviction == 1) $type = "hidden";
	else $type = "";
	echo $this->element('datepicker_includes');
?>

<div id="wrapper" class="acc center fm-evict">
        
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">lease <span>information</span> sheet</h1>
            </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/7.jpg"></div>
    </div>
        
    <div class="content col-xs-10 center">
            
        <div class="progress center col-xs-12">
                <i class="pg_icon inline center fas fa-plus"></i>
                <div class="pg_strike inline center"></div>
                <i class="pg_icon inline center fas fa-dollar-sign"></i>
                <div class="pg_strike inline center"></div>
                <i class="pg_icon inline center far fa-file-alt current"></i>
                <div class="pg_strike inline center"></div>
                <i class="pg_icon inline center far fa-bell"></i>
                <div class="pg_strike inline center"></div>
                <i class="pg_icon inline center fas fa-check"></i>
                <div class="progress_alt center col-xs-12">
                    <span class="pg_text step center inline">Start</span>
                    <i class="center inline fa fa-caret-right" aria-hidden="true"></i>
					<span class="pg_text step center inline">Defendant</span>
                    <i class="center inline fa fa-caret-right" aria-hidden="true"></i>
					<span class="pg_text step center inline">Plaintiff</span>
                    <i class="center inline fa fa-caret-right" aria-hidden="true"></i>
					<span class="pg_text step center inline">Property</span>
                    <i class="center inline fa fa-caret-right" aria-hidden="true"></i>
					<span class="pg_text step center inline">Management</span>
                    <i class="center inline fa fa-caret-right" aria-hidden="true"></i>
					<span class="pg_text step center inline">Information</span>
                </div>
            </div>
            
        <div class="info col-xs-12 center clearfix evictions form">
            
            <?php
            echo $this->Form->create('Eviction', array('novalidate' => true));
            echo $this->Form->input('defendants_number', array('type' => 'hidden'));
            echo $this->Form->input('doContinue', array('type' => 'hidden', 'value' => 'false'));
            echo $this->Form->input('county_id', array('type' => 'hidden'));
            echo $this->Form->input('id');
            ?>

            <!--Start-->
            <div id="fm1" class="tab fld_notice col-xs-12 center flex">
                <h1 class="center">Getting <span>Started</span></h1>
                    <div class="col-xs-3 center inline">
                        <i class="fas fa-pen-square"></i>
                        <p class="col-xs-11 center">Fill out the information below and click the <span>« Continue »</span> button to submit your lease.</p>
                    </div>
					<div class="col-xs-3 center inline">
                        <i class="fas fa-file-alt"></i>
                        <p class="col-xs-11 center">A draft lease will be provided for your review and any revisions.</p>
                    </div>
                    <div class="col-xs-3 center inline">
                        <i class="fas fa-save"></i>
                        <p class="col-xs-11 center">If you need to finish your lease later click the <span>« Save Lease »</span> button.</p>
                    </div>
            </div>
            
            <!--Defendant-->
            <div id="fm2" class="tab fld col-xs-10 center">
                <div class="info_wrap lrg col-xs-12 center left">
                    <h2>Defendant's Information</h2>
                    <p><?php
                        if ($notice_to_eviction == 1) echo 'Provide the Date of Birth and/or the Social Security Number for each tenant, if available.';
                        else echo 'Provide all available information about the tenant(s) to be evicted, including the Middle Name, Date of Birth, and Social Security Number if available.';
                    ?></p>
                    <div id="tblDefendants" class="col-xs-12 left push-t">
                        <?php
                            if (!empty($defendants)) {
                                $i = 0;
                                foreach ($defendants as $defendant) {
                                    echo $this->Form->input('Defendant.' . $i . '.id', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                        'class' => 'input col-xs-12 center',
                                        'placeholder' => 'Defendant',                                        
                                        'after' => 'Defendant',                                        
                                        'label' => false
                                    ));

                                    if ($notice_to_eviction == 1) echo $defendant['Defendant']['first_name'] . ' ';
                                    echo $this->Form->input('Defendant.' . $i . '.first_name', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                        'class' => 'input col-xs-12 center',
                                        'placeholder' => 'First name',
                                        'placeholder' => 'Defendant first name',
                                        'label' => false,
                                        'type' => $type
                                    ));

                                    if ($notice_to_eviction == 1) echo $defendant['Defendant']['middle_name'] . ' ';
                                    echo $this->Form->input('Defendant.' . $i . '.middle_name', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                        'class' => 'input col-xs-12 center',
                                        'placeholder' => 'Middle name',
                                        'placeholder' => 'Defendant middle name',
                                        'required' => false,
                                        'label' => false,
                                        'type' => $type
                                    ));

                                    if ($notice_to_eviction == 1) echo $defendant['Defendant']['last_name'] . ' ';
                                    echo $this->Form->input('Defendant.' . $i . '.last_name', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                        'class' => 'input col-xs-12 center',
                                        'placeholder' => 'Last name',
                                        'placeholder' => 'Defendant last name',
                                        'label' => false,
                                        'type' => $type
                                    ));

                                    echo $this->Form->input('Defendant.' . $i . '.date_of_birth', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                        'class' => 'input col-xs-12 center',
                                        'placeholder' => 'Date of Birth',
                                        'placeholder' => 'Defendant DOB',
                                        'type' => 'text',
                                        'label' => false,
                                        'required' => false,
                                        'onchange' => 'checkVal(this)'
                                    ));

                                    echo '<div class="fm_input fm_text col-xs-3-2 inline left ssn">';
                                        echo $this->Form->input('Defendant.' . $i . '.ssn1', array(
                                            'class' => 'col-xs-4 input center',
                                            'placeholder' => 'SSN 1',
                                            'label' => false, 
                                            'div'=> false,
                                            'size' => 1, 
                                            'maxlength' => '3', 
                                            'onkeyup' => 'checkVal(this)'
                                        )) . ' - ';
                                        echo $this->Form->input('Defendant.' . $i . '.ssn2', array(
                                            'class' => 'col-xs-3 input center',
                                            'placeholder' => 'SSN 2',
                                            'label' => false, 
                                            'div'=> false,
                                            'maxlength' => '2', 
                                            'onkeyup' => 'checkVal(this)'
                                        )) . ' - ';
                                        echo $this->Form->input('Defendant.' . $i . '.ssn3', array(
                                            'class' => 'col-xs-4 input center',
                                            'placeholder' => 'SSN 3',
                                            'label' => false, 
                                            'div'=> false, 
                                            'size' => 3, 
                                            'maxlength' => '4', 
                                            'onkeyup' => 'checkVal(this)'
                                        ));
                                        echo '<p class="left col-xs-12 inline">Social Security Number</p>';
                                    echo '</div>';

                                    if ($notice_to_eviction == 1) echo $defendant['Defendant']['phone_number'] . ' ';
                                    echo $this->Form->input('Defendant.' . $i . '.phone_number', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                        'class' => 'input center',
                                        'placeholder' => 'Phone',
                                        'placeholder' => 'Defendant phone',
                                        'label' => false,
                                        'type' => $type
                                    ));

                                    if ($notice_to_eviction == 1) echo $defendant['Defendant']['street_address1'] . ' ';
                                    else $this->Form->input('Defendant.' . $i . '.street_address1', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                        'class' => 'input center',
                                        'placeholder' => 'Address 1',
                                        'placeholder' => 'Defendant Address 1',
                                        'label' => false,
                                        'type' => $type
                                    ));

                                    if ($notice_to_eviction == 1) echo $defendant['Defendant']['street_address2'] . ' ';
                                    else $this->Form->input('Defendant.' . $i . '.street_address2', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                        'class' => 'input input center',
                                        'placeholder' => 'Address 2',
                                        'after' => 'Address 2',
                                        'label' => false, 
                                        'type' => $type
                                    ));

                                    if ($notice_to_eviction == 1) echo $defendant['Defendant']['city'] . ' ';
                                    else $this->Form->input('Defendant.' . $i . '.city', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                        'class' => 'input center',
                                        'placeholder' => 'City',
                                        'after' => 'Defendant City',
                                        'label' => false, 
                                        'type' => $type
                                    ));

                                    if ($notice_to_eviction == 1) echo $defendant['Defendant']['state'] . ' ';
                                    else $this->Form->input('Defendant.' . $i . '.state', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                        'class' => 'input center col-xs-12',
                                        'placeholder' => 'State',
                                        'after' => 'Defendant State',
                                        'label' => false, 
                                        'type' => $type
                                    ));

                                    if ($notice_to_eviction == 1) echo $defendant['Defendant']['zip_code'] . ' ';
                                    else $this->Form->input('Defendant.' . $i . '.zip_code', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                        'class' => 'input center',
                                        'placeholder' => 'Zip code',
                                        'placeholder' => 'Defendant Zip code',
                                        'label' => false, 
                                        'type' => $type
                                    ));

                                    $i++;
                                }
                            } else {
                                for ($i=0; $i<$defendants_number; $i++) {
                                    
                                    echo $this->Form->input('Defendant.' . $i . '.first_name', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                        'class' => 'input center',
                                        'placeholder' => 'First name',
                                        'after' => 'First name',
                                        'label' => false
                                    ));
                                    
                                    echo $this->Form->input('Defendant.' . $i . '.middle_name', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                        'class' => 'input center',
                                        'placeholder' => 'Middle name',
                                        'after' => 'Middle name',
                                        'required' => false, 
                                        'label' => false
                                    ));
                                    echo $this->Form->input('Defendant.' . $i . '.last_name', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                        'class' => 'input center',
                                        'placeholder' => 'Last name',
                                        'after' => 'Last name',
                                        'label' => false
                                    ));
                                    echo $this->Form->input('Defendant.' . $i . '.date_of_birth', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                        'class' => 'input center',
                                        'placeholder' => 'Date of birth',
                                        'placeholder' => 'Date of birth',
                                        'type' => 'text', 
                                        'label' => false, 
                                        'required' => false, 
                                        'onchange' => 'checkVal(this)'
                                    ));
                                    echo '<div class="fm_input fm_text col-xs-3-2 inline left ssn">';
                                        echo $this->Form->input('Defendant.' . $i . '.ssn1', array(
                                            'class' => 'col-xs-4 input center',
                                            'placeholder' => 'SSN 1',
                                            'label' => false, 
                                            'div'=> false,
                                            'size' => 1, 
                                            'maxlength' => '3', 
                                            'onkeyup' => 'checkVal(this)'
                                        )) . ' - ';
                                        echo $this->Form->input('Defendant.' . $i . '.ssn2', array(
                                            'class' => 'col-xs-3 input center',
                                            'placeholder' => 'SSN 2',
                                            'label' => false, 
                                            'div'=> false,
                                            'maxlength' => '2', 
                                            'onkeyup' => 'checkVal(this)'
                                        )) . ' - ';
                                        echo $this->Form->input('Defendant.' . $i . '.ssn3', array(
                                            'class' => 'col-xs-4 input center',
                                            'placeholder' => 'SSN 3',
                                            'label' => false, 
                                            'div'=> false, 
                                            'size' => 3, 
                                            'maxlength' => '4', 
                                            'onkeyup' => 'checkVal(this)'
                                        ));
                                        echo '<p class="left col-xs-12 inline">Social Security Number</p>';
                                    echo '</div>';
                                    
                                    echo $this->Form->input('Defendant.' . $i . '.phone_number', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                        'class' => 'input center',
                                        'placeholder' => 'Phone number',
                                        'after' => 'Phone number',
                                        'label' => false
                                    ));
                                    echo $this->Form->input('Defendant.' . $i . '.street_address1', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                        'class' => 'input center',
                                        'placeholder' => 'Street Address 1',
                                        'after' => 'Street Address 1',
                                        'label' => false
                                    ));
                                    echo $this->Form->input('Defendant.' . $i . '.street_address2', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                        'class' => 'input center',
                                        'placeholder' => 'Street Address 2',
                                        'after' => 'Street Address 2',
                                        'label' => false
                                    ));
                                    echo $this->Form->input('Defendant.' . $i . '.city', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                        'class' => 'input center',
                                        'placeholder' => 'City',
                                        'after' => 'City',
                                        'label' => false
                                    ));
                                    echo $this->Form->input('Defendant.' . $i . '.state', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                        'class' => 'input center col-xs-12',
                                        'placeholder' => 'State',
                                        'after' => 'State',
                                        'label' => false
                                    ));
                                    echo $this->Form->input('Defendant.' . $i . '.zip_code', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                        'class' => 'input center',
                                        'placeholder' => 'Zip code',
                                        'after' => 'Zip code',
                                        'label' => false
                                    ));
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            
            <!--Plaintiff-->
            <div id="fm3" class="tab fld col-xs-10 center">
                <div class="info_wrap lrg col-xs-12 center left">
                    <h2>Plaintiff's Information</h2>
                    <p>The Plaintiff will be the person or company that signed the lease as the lessor or landlord.</p>
                    <div class="col-xs-12 left push-t">
                        
                        <?php
                        echo $this->Form->input('property_owner_is_company', array(
                            'div' => array('class' => 'fm_mem inline input col-xs-12 left push-b'),
                            'class' => 'fm_check',
                            'label' => 'If the Plaintiff is a company check here.',
                            'type' => 'checkbox',
                            'onclick' => 'isCompany()',
                            'checked' => $autofill_plaintiff['property_owner_is_company']
                        ));
                        ?>
      
                        <div id="company_name" class="fm_input fm_text inline col-xs-12 left" id="company_name" style="display: none;">
                            <label for="EvictionPropertyOwnerCompany">Company Name</label>
                            <?php
                            echo $this->Form->input('property_owner_company', array(
                                'class' => 'input',
                                'label' => false, 
                                'div'=> false, 
                                'error' => false, 
                                'value' => $autofill_plaintiff['property_owner_company']
                            ));
                            ?>
                            <?php echo $this->Form->error('property_owner_company', null, array('class' => 'error-message')); ?>
                        </div>

                        <div id="names" class="col-xs-12 left inline">
                            
                            <?php
                            echo $this->Form->input('property_owner_first_name', array(
                                'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left'),
                                'class' => 'input col-xs-12 center',
                                'placeholder' => 'First name',
                                'after' => 'Property owner first name',
                                'value' => $autofill_plaintiff['property_owner_first_name'],
                                'label' => false
                            ));
                            echo $this->Form->input('property_owner_last_name', array(
                                'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left'),
                                'class' => 'input col-xs-12 center',
                                'placeholder' => 'Last Name',
                                'after' => 'Property owner last Name',
                                'value' => $autofill_plaintiff['property_owner_last_name'],
                                'label' => false
                            ));
                            ?>
                            
                        </div>
                        
                        <div class="col-xs-12 left inline push-t">
                            
                            <p class="col-xs-12 left">The Plaintiff in this matter is:</p>

                            <?php
                                echo '<div class="fm_input fm_text inline center left push-t flex">';
                                    $options = array('owner' => 'The Owner of the Property', 'manager' => 'The Manager of the Property', 'other' => 'Other (please describe)' );
                                    if ($autofill_plaintiff['autofill_plaintiff']) $defaultPlaintiff = $autofill_plaintiff['plantiff_in_matter'];
                                    else $defaultPlaintiff = 'owner';
                                    $attributes = array(
                                        'label' => array('class'=>'col-xs-3-2 inline center input push-r push-l'),
                                        'class' => 'inline input center col-xs-4',
                                        'legend' => false, 
                                        'onclick' => 'changeMatter();', 
                                        'default' => $defaultPlaintiff
                                    );
                                    echo $this->Form->radio('plantiff_in_matter', $options, $attributes);
                                echo '</div>';
                            echo $this->Form->input('plaintiff_in_matter_other', array(
                                'div' => array('class' => 'fm_input fm_text col-xs-12 inline left'),
                                'class' => 'input col-xs-12 center',
                                'placeholder' => 'Other Plaintiff',
                                'label' => false,
                                'error' => false, 
                                'style' => 'display:none;',
                                'value' => $autofill_plaintiff['plaintiff_in_matter_other']
                            ));
                            echo $this->Form->input('autofill_plaintiff', array(
                                'div' => array('class' => 'fm_mem col-xs-12 center right push-b'),
                                'class' => 'fm_check',
                                'label' => 'Remember this information',
                                'type' => 'checkbox',
                                'checked' => $autofill_plaintiff['autofill_plaintiff']
                            ));
                            echo $this->Form->error('plaintiff_in_matter_other', null, array('class' => 'error-message'));
                            ?>
                            
                        </div>     
                        
                    </div>
                </div>
            </div>
            
            <!--Property-->
            <div id="fm4" class="tab fld col-xs-10 center">
                <div class="info_wrap lrg col-xs-12 center left">
                    <h2>Eviction Property Information</h2>
                    <p>The Plaintiff will be the person or company that signed the lease as the lessor or landlord.</p>
                    <div class="col-xs-12 left push-t">
                        <?php
                        // Notice to Evict
                        if ($notice_to_eviction == 1) {
                        
                            echo '<div class="fm_input col-xs-12 inline left">';
                        
                                echo '<p class="left inline push-r">Street Address: <strong>' . $eviction['Eviction']['property_street_address1'] . '</strong></p>';
                        
                                echo '<p class="left inline push-r push-l">Unit No.: <strong>' . $eviction['Eviction']['property_street_address2'] . '</strong></p>';
                        
                                echo '<p class="left inline push-r push-l">City: <strong>' . $eviction['Eviction']['property_city'] . '</strong></p>';
                        
                                echo '<p class="left inline push-r push-l">State: <strong>' . $eviction['Eviction']['property_state'] . '</strong></p>';
                        
                                echo '<p class="left inline push-r push-l">County: <strong>' . $eviction['County']['name'] . '</strong></p>';
                        
                                echo '<p class="left inline push-l">Zip Code: <strong>' . $eviction['Eviction']['property_zip_code'] . '</strong></p>';

                                echo '<input type="hidden" name="data[Eviction][property_street_address1]" id="EvictionPropertyStreetAddress1" value="' . $eviction['Eviction']['property_street_address1'] . '" />';
                                echo '<input type="hidden" name="data[Eviction][property_street_address2]" id="EvictionPropertyStreetAddress2" value="' . $eviction['Eviction']['property_street_address2'] . '" />';
                                echo '<input type="hidden" name="data[Eviction][property_city]" id="EvictionPropertyCity" value="' . $eviction['Eviction']['property_city'] . '" />';

                                echo '<input type="hidden" name="data[Eviction][property_state]" id="EvictionPropertyState" value="' . $eviction['Eviction']['property_state'] . '" />';

                                echo '<input type="hidden" name="data[Eviction][property_zip_code]" id="EvictionPropertyZipCode" value="' . $eviction['Eviction']['property_zip_code'] . '" />';

                                echo '<input type="hidden" name="data[Eviction][autofill_property]" id="EvictionAutofillProperty" value="' . $autofill_property['autofill_property'] . '" />';
                        
                            echo '</div>';

                        //-- Normal Eviction --
                        } else {
                            
                            echo $this->Form->input('property_street_address1', array(
                                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                'class' => 'input col-xs-12 center',
                                'placeholder' => 'Street Address 1', 
                                'after' => 'Street Address 1', 
                                'value' => $autofill_property['property_street_address1'],
                                'label' => false
                            ));
                            
                            echo $this->Form->input('property_street_address2', array(
                                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                'class' => 'input col-xs-12 center',
                                'placeholder' => 'Unit No.',
                                'after' => 'Unit No.',
                                'label' => false
                            ));
                            
                            echo $this->Form->input('property_city', array(
                                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                'class' => 'input col-xs-12 center',
                                'label' => false, 
                                'placeholder' => 'City', 
                                'after' => 'City', 
                                'value' => $autofill_property['property_city']
                            ));
                            
                            echo $this->Form->input('property_state', array('type' => 'hidden', 'value' => $property_state));
                            
                            echo '<div class="fm_input col-xs-3-2 inline left input">';
                            echo '<p class="left inline col-xs-6">State: <strong>' . $property_state . '</strong></p>';
                            echo '<p class="left inline col-xs-6">County: <strong>' . $property_county . '</strong></p>';
                            echo '</div>';
                            
                            echo $this->Form->input('property_zip_code', array(
                                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                'class' => 'input col-xs-12 center',
                                'label' => false, 
                                'placeholder' => 'Zip Code', 
                                'after' => 'Zip Code', 
                                'value' => $autofill_property['property_zip_code']
                            ));
                        }
                        
                        echo $this->Form->input('autofill_property', array(
                            'div' => array('class' => 'fm_mem col-xs-12 center right'),
                            'class' => 'fm_check',
                            'label' => 'Remember this information',
                            'type' => 'checkbox',
                            'checked' => $autofill_property['autofill_property']
                        ));
                        
                    ?>
                        
                    </div>
                </div>
            </div>
            
            <!--Management-->
            <div id="fm5" class="tab fld col-xs-10 center">
                <div class="info_wrap lrg col-xs-12 center left">
                    <h2>Person Responsible for Handling Eviction</h2>
                    <p><?php
                        if ($notice_to_eviction == 1) echo 'Provide the name and contact information of the person to be contacted by the Sheriff\'s Department to schedule the return of the property.';
                        else echo 'Provide the name and contact information for the person we can contact if we have questions about this eviction. This is the person that will sign any Notices to Pay created by us for posting on the Tenant\'s door. This person will be contacted by the Sheriff\'s Department to schedule the return of the property.';
                    ?></p>
                    <div class="col-xs-12 left push-t">
                        <?php
                          echo $this->Form->input('contact_first_name', array(
                              'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                              'class' => 'input col-xs-12 center',
                              'placeholder' => 'First Name', 
                              'after' => 'First Name', 
                              'value' => $autofill_contact['contact_first_name'],
                              'label' => false
                          ));
                          echo $this->Form->input('contact_last_name', array(
                              'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                              'class' => 'input col-xs-12 center',
                              'placeholder' => 'Last Name', 
                              'after' => 'Last Name', 
                              'value' => $autofill_contact['contact_last_name'],
                              'label' => false
                          ));
                          echo $this->Form->input('contact_street_address1', array(
                              'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                              'class' => 'input col-xs-12 center',
                              'placeholder' => 'Street Address', 
                              'after' => 'Street Address', 
                              'value' => $autofill_contact['contact_street_address1'],
                              'label' => false
                          ));
                          echo $this->Form->input('contact_street_address2', array(
                              'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                              'class' => 'input col-xs-12 center',
                              'placeholder' => 'Unit No.',
                              'after' => 'Unit No.',
                              'label' => false
                          ));
                          echo $this->Form->input('contact_city', array(
                              'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                              'class' => 'input col-xs-12 center',
                              'placeholder' => 'City', 
                              'after' => 'City', 
                              'value' => $autofill_contact['contact_city'],
                              'label' => false
                          ));
                          echo $this->Form->input('contact_state', array(
                              'div' => array('id' => 'state-field', 'class' => 'fm_input fm_text col-xs-3-2 inline left'),
                              'class' => 'input col-xs-12 center',
                              'placeholder' => 'State', 
                              'after' => 'State', 
                              'options' => $states, 
                              'empty' => '<Please Select a State>', 
                              'value' => $autofill_contact['contact_state'],
                              'label' => false
                          ));
                          echo $this->Form->input('contact_state_province', array(
                              'div' => array('id' => 'state-province-field','class' => 'fm_input fm_text col-xs-3-2 inline left'),
                              'class' => 'input col-xs-12 center',
                              'placeholder' => 'State/Province', 
                              'after' => 'State/Province', 
                              'value' => $autofill_contact['contact_state_province'],
                              'label' => false
                          ));
                          echo $this->Form->input('contact_county_id', array(
                              'div' => array('id' => 'county-field', 'class' => 'fm_input fm_text col-xs-3-2 inline left'),
                              'class' => 'input col-xs-12 center',
                              'placeholder' => 'County', 
                              'after' => 'County', 
                              'options' => $counties, 
                              'value' => $autofill_contact['contact_county_id'],
                              'label' => false 
                          ));
                          echo $this->Form->input('contact_zip_code', array(
                              'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                              'class' => 'input col-xs-12 center',
                              'placeholder' => array('text' => 'Zip Code', 'id' => 'label-zip-code'), 
                              'after' => array('text' => 'Zip Code', 'id' => 'label-zip-code'), 
                              'value' => $autofill_contact['contact_zip_code'],
                              'label' => false
                          ));
                            echo $this->Form->input('contact_country', array(
                                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                'class' => 'input col-xs-12 center',
                                'placeholder' => 'Country', 
                                'after' => 'Country', 
                                'options' => $countries, 
                                'default' => 'US', 
                                'value' => $autofill_contact['contact_country'],
                                'label' => false
                            ));
                          echo $this->Form->input('contact_company_name', array(
                              'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                              'class' => 'input col-xs-12 center',
                              'placeholder' => 'Company Name', 
                              'after' => 'Company Name', 
                              'value' => $autofill_contact['contact_company_name'],
                                'label' => false
                          ));
                        ?>
                        
                        <div class="fm_input fm_text col-xs-3-2 inline left input text">
                            <?php 
                            echo $this->Form->input('cpn1', array(
                                'div' => array('class' => 'fm_text col-xs-3-2 inline'),
                                'class' => 'input col-xs-12 center',
                                'label' => false,
                                'error' => false, 
                                'size' => 3, 
                                'maxlength' => '3', 
                                'value' => $autofill_contact['cpn1'],
                                'required' => true
                            ))  .' - ';
                            echo $this->Form->input('cpn2', array(
                                'div' => array('class' => 'fm_text col-xs-3-2 inline'),
                                'class' => 'input col-xs-12 center',
                                'label' => false,
                                'error' => false, 
                                'size' => 3, 
                                'maxlength' => '3', 
                                'value' => $autofill_contact['cpn2'],
                                'required' => true
                            ))  .' - ';
                            echo $this->Form->input('cpn3', array(
                                'div' => array('class' => 'fm_text col-xs-3-2 inline last'),
                                'class' => 'input col-xs-12 center',
                                'label' => false,
                                'error' => false, 
                                'size' => 4, 
                                'maxlength' => '4', 
                                'value' => $autofill_contact['cpn3'],
                                'required' => true
                            ));
                            ?>
                            
                            <p for="EvictionContactPhoneNumber" class="col-xs-12 left">Phone Number</p>
                            
                            <?php echo $this->Form->error('contact_phone_number', null, array('class' => 'error-message')); ?>
                            
                        </div>

                        <?php
                        
                        if ($notice_to_eviction != 1) echo $this->Form->input('autofill_contact', array(
                            'div' => array('class' => 'fm_mem col-xs-12 center right'),
                            'class' => 'fm_check',
                            'label' => 'Remember this information',
                            'type' => 'checkbox',
                            'checked' => $autofill_contact['autofill_contact']
                        ));
                        
                        ?>
                        
                        <div class="info_wrap fm_add mid col-xs-8 center inline left">
                            <div id="openAddressBook" class="if_box col-xs-4 inline center left" onclick="return false;">
                                <i class="if_icon inline inline left far fa-address-book"></i>
                                <p class="inline">Open Address Book</p> 
                            </div>
                            <div id="addToAddressBook" class="if_box col-xs-4 center inline left" onclick="return false;">
                                <i class="if_icon inline left fas fa-plus"></i>
                                <p class="inline">Add to Address Book</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <!--Information-->
            <div id="fmf" class="tab fld col-xs-10 center">
                <div class="info_wrap lrg col-xs-12 center left">
                    <h2>Past Due Rent Information</h2>
                    <div class="col-xs-12 left push-t">
                        <?php
                        //-- Notice to Eviction --
                        if ($notice_to_eviction == 1) {
                            echo '<div class="fm_input col-xs-12 inline left">';
                        
                                echo '<p class="left inline push-r">Monthly Rent: <strong>$' . $eviction['Eviction']['monthly_rent'] . '</strong></p>';
                            
                                echo '<p class="left inline push-r">Unpaid Rent: <strong>$' . $eviction['Eviction']['unpaid_rent'] . '</strong></p>';
                            
                                echo '<p class="left inline push-r">First Unpaid Month: <strong>' . date('F Y', strtotime($eviction['Eviction']['first_unpaid_month'])) . '</strong></p>';

                                echo '<input type="hidden" name="data[Eviction][monthly_rent]" id="EvictionMonthlyRent" value="' . $eviction['Eviction']['monthly_rent'] . '" />';

                                echo '<input type="hidden" name="data[Eviction][unpaid_rent]" id="EvictionUnpaidRent" value="' . $eviction['Eviction']['unpaid_rent'] . '" />';

                                echo '<input type="hidden" name="data[Eviction][security_deposit]" id="EvictionSecurityDeposit" value="' . number_format($eviction['Eviction']['security_deposit'], 2) . '" />';

                                echo '<input type="hidden" name="data[Eviction][first_unpaid_month]" id="EvictionFirstUnpaidMonth" value="' . date('F Y', strtotime($eviction['Eviction']['first_unpaid_month'])) . '" />';

                                echo '<input type="hidden" name="data[Eviction][last_unpaid_month]" id="EvictionLastUnpaidMonth" value="' . date('F Y', strtotime($eviction['Eviction']['last_unpaid_month'])) . '" />';

                        //-- Normal Eviction --
                        } else {
                            
                          echo $this->Form->input('monthly_rent', array(
                              'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                              'class' => 'input col-xs-12 center',
                              'placeholder' => 'Monthly rent',
                              'after' => 'Provide the monthly rental amount.',
                              'label' => false
                          ));
                            
                          echo $this->Form->input('unpaid_rent', array(
                              'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                              'class' => 'input col-xs-12 center', 
                              'placeholder' => 'Amount demanded',
                              'after' => 'Provide the amount demanded in Notice.',
                              'label' => false
                          ));
                            
                          echo $this->Form->input('security_deposit', array(
                              'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left last'),
                              'class' => 'input col-xs-12 center', 
                              'placeholder' => 'Security deposit',
                              'after' => 'Provide the security deposit amount paid.',
                              'label' => false
                          )); ?>
                    </div>
                    <div class="col-xs-12 left push-t">
                        
                        <?php
                            $parsed_first_unpaid_month = date_parse($first_unpaid_month);
                            $parsed_last_unpaid_month = date_parse($last_unpaid_month);
                            
                            if ($parsed_first_unpaid_month['year'] == 1969) {
                                $parsed_first_unpaid_month['month'] = date("m");
                                $parsed_first_unpaid_month['year'] = date("Y");
                            }
                            
                            if ($parsed_last_unpaid_month['year'] == 1969) {
                                $parsed_last_unpaid_month['month'] = date("m");
                                $parsed_last_unpaid_month['year'] = date("Y");
                            }
                            
                            echo $this->Form->input('fum', array(
                                'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left'),
                                'class' => 'input col-xs-6 center left',
                                'type'=>'date', 
                                'after'=>'First Unpaid Month',
                                'label' => false,
                                'dateFormat'=>'MY', 
                                'minYear' => date('Y')-3, 
                                'maxYear' => date('Y'), 
                                'selected' => array(
                                    'day'=>'1', 
                                    'month' => $parsed_first_unpaid_month['month'],
                                    'year' => $parsed_first_unpaid_month['year']
                                )
                            ));
                            
                            echo $this->Form->input('lum', array(
                                'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left'),
                                'class' => 'input col-xs-6 center left',
                                'type'=>'date', 
                                'after'=>'Most Recent Unpaid Month',
                                'label' => false, 
                                'dateFormat'=>'MY', 
                                'minYear' => date('Y')-3, 
                                'maxYear' => date('Y'), 
                                'selected' => array(
                                    'day'=>'1', 
                                    'month' => $parsed_last_unpaid_month['month'], 
                                    'year' => $parsed_last_unpaid_month['year']
                                )
                            ));
                            
                        } ?>
                        
                    </div>
                    <div class="col-xs-12 left push-t">
                        <?php
                            if ($eviction['County']['state'] == 'TX') echo $this->Form->input('notice_to_vacate_delivery', array(
                                'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left'),
                                'class' => 'input col-xs-12 center left',
                                'type' => 'text', 
                                'placeholder' => 'Notice Delivered On',
                                'after' => 'Notice Delivered On',
                                'label' => false
                            ));
                            elseif ($eviction['County']['state'] == 'NC') echo $this->Form->input('notice_to_vacate_delivery', array(
                                'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left'),
                                'class' => 'input col-xs-12 center left',
                                'type' => 'text', 
                                'placeholder' => 'Date Rent Was Due',
                                'after' => 'Date Rent Was Due',
                                'label' => false
                            ));
                        ?>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="fld_cycle center col-xs-10 clearfix">
            
            <button type="button" id="backBtn" class="fld_nav col-xs-2 center inline left" onclick="javascript:history.back();">
                <i class="center inline fa fa-caret-left" aria-hidden="true"></i>
                <p class="center inline">back</p>
            </button>
            
            <button type="button" id="prevBtn" class="fld_nav col-xs-2 center inline left" onclick="nextPrev(-1)">
                <i class="center inline fa fa-caret-left" aria-hidden="true"></i>
                <p class="center inline">prev</p>
            </button>
            
            <div id="fmActions" class="col-xs-2 center inline">
                <?php		
                    echo $this->Form->submit('Save', array(
                        'name' => 'save_lease',
                        'type' => 'image',
                        'div' => array(
                            'id' => 'saveBtn',
                            'class' => 'fm_input fm_text col-xs-12 inline center left'),
                        'class' => 'btn-blue input'
                    ));
                ?>                
            </div>
            
            <button type="button" id="nextBtn" class="fld_nav col-xs-2 center inline right" onclick="nextPrev(1)">
                <p class="center inline">next</p>
                <i class="center inline fa fa-caret-right" aria-hidden="true"></i>
            </button>
            
            <button type="button" id="submitBtn" class="fld_nav col-xs-2 center inline right">
                <?php                
                    echo $this->Form->submit('Submit', array(
                        'div' => false,
                        'id' => 'btnSave',
                        'class' => 'center inline',
                        'after' => '<i class="center inline fa fa-caret-right" aria-hidden="true"></i>',
                        'type' => 'submit'
                    ));
                ?>
            </button>
            
        </div>
        
        <?php echo $this->Form->end(); ?>

        <div class="popups col-xs-9 center">
            <div id="divPopupDefendant" class="popupStyle2">
                <div class="ui-dialog-titlebar"><span class="ui-dialog-title">Missing DOB & SSN</span></div>
              <div class="inner_bg">
                <div class="inner_padding">
                    <input type="hidden" id="evictionID" value="" />
                    <p id="popupTitle"></p>
                    <p>The Date of Birth and Social Security Number are missing for at least one Defendant. Providing a Social Security Number or Date of Birth is very helpful when processing your eviction. If you are able to provide either, please do so now.</p>
                        <br />
                        <div class="left"><input type="button" name="btnClose" id="btnClose" value="Add SSN/DOB" /> &nbsp;</div>
                        <div class="left"><input type="submit" name="btnContinue" id="btnContinue" value="Continue" /></div>
                </div>
              </div>
            </div>

            <div id="divPopupNotification">
                <div class="ui-dialog-titlebar"><span class="ui-dialog-title">Notification</span></div>
              <div class="inner_bg">
                <div class="inner_padding">
                    <div class="message_success"></div>
                    <div class="message_error"></div>
                </div>
                </div>
            </div>

            <div id="divPopupAddressBook" class="popupStyle2">
                <div class="ui-dialog-titlebar"><span class="ui-dialog-title">Address Book</span></div>
              <div class="inner_bg">
                <div class="inner_padding" style="height:310px;overflow:scroll;"></div>
                    <br />
                    <div class="left"><input type="submit" name="btnChoose" id="btnChoose" value="Choose" /> &nbsp;</div>
                    <div class="left"><input type="button" name="btnCancel" id="btnCancel" value="Cancel" /></div>
                </div>
            </div>
        </div>
        
    </div>
</div>
        
<?php
	include '/app/webroot/files/alert_popup.inc';
	echo $this->fetch('scriptBottom');
?>
<script type="text/javascript" src="/app/webroot/js/dev/forms.js"></script>
<script type="text/javascript">
	//***********************************************************************************************
	//
	//***********************************************************************************************
	function isCompany() {
		var names_box = document.getElementById("names");
		var company_box = document.getElementById("company_name");
		
		if (document.getElementById("EvictionPropertyOwnerIsCompany").checked == true) {
			names_box.style.display = 'none';
			company_box.style.display = 'block';
			document.getElementById('EvictionPropertyOwnerCompany').required = true;
			document.getElementById('EvictionPropertyOwnerFirstName').required = false;
			document.getElementById('EvictionPropertyOwnerLastName').required = false;
		}	else {
			names_box.style.display = 'block';
			company_box.style.display = 'none';
			document.getElementById('EvictionPropertyOwnerCompany').required = false;
			document.getElementById('EvictionPropertyOwnerFirstName').required = true;
			document.getElementById('EvictionPropertyOwnerLastName').required = true;
		}
	}


	//***********************************************************************************************
	//
	//***********************************************************************************************
	function changeMatter()	{
		var other = document.getElementById("EvictionPlaintiffInMatterOther");
		
		if (document.getElementById("EvictionPlantiffInMatterOther").checked == true) {
			other.style.display = '';
		}	else {
			other.style.display = 'none';
		}
	}


	//***********************************************************************************************
	//
	//***********************************************************************************************
	function checkVal(element) {
		if (element.value != "") {
			var nameParts = element.name.split("[");
			var fieldIndex = nameParts[2].replace("]", "");

			if (element.name.indexOf("date_of_birth") > -1) {
				$(element).removeClass('inputDefendantEmpty');
				$("#Defendant" + fieldIndex + "Ssn1").removeClass('inputDefendantEmpty');
				$("#Defendant" + fieldIndex + "Ssn2").removeClass('inputDefendantEmpty');
				$("#Defendant" + fieldIndex + "Ssn3").removeClass('inputDefendantEmpty');
			} else if (element.name.indexOf("ssn") > -1) {
				if (document.getElementById("Defendant" + fieldIndex + "Ssn1").value != "" && document.getElementById("Defendant" + fieldIndex + "Ssn2").value != "" && document.getElementById("Defendant" + fieldIndex + "Ssn3").value != "") {
					$("#Defendant" + fieldIndex + "DateOfBirth").removeClass('inputDefendantEmpty');
					$("#Defendant" + fieldIndex + "Ssn1").removeClass('inputDefendantEmpty');
					$("#Defendant" + fieldIndex + "Ssn2").removeClass('inputDefendantEmpty');
					$("#Defendant" + fieldIndex + "Ssn3").removeClass('inputDefendantEmpty');
				}
			}
		}
	}


	//***********************************************************************************************
	//
	//***********************************************************************************************
  $(function() {
		//When the state dropdown's value changes, load the counties associated to the selected state
    $("#EvictionContactState").change(function() {
    	var state_id = $(this).val();
			$.ajax({
			    url: '/index.php/evictions/loadCounties/' + state_id,
			    cache: false,
			    type: 'GET',
			    dataType: 'HTML',
			    success: function(response) {
              $('#EvictionContactCountyId').html('<option value="0">&lt;Please Select a County&gt;</option>' + response);
              $('#EvictionContactCountyId').val(<?php echo $autofill_contact['contact_county_id']; ?>);
			    		//If there are counties associated to the selected state, show the county dropdown, if not hide it
							if (response != ' ') $('#county-field').show();
							else $('#county-field').hide();
          },
          error: function(e) {
              alert("An error occurred: " + e.responseText.message);
              console.log(e);
          }
			});
		});


	  $("#EvictionContactCountry").on('change', function() {
	   	if ($(this).val() == 'US') {
	   		$('#EvictionContactState').attr('required', true);
	  		$('#state-field').show();
	  		$('#state-province-field').hide();
	   		$('#EvictionContactStateProvince').removeAttr('required');
	  		$('#label-zip-code').text('Zip Code');
				$('#EvictionContactState').trigger("change");
	  	}	else {
				$('#EvictionContactState').removeAttr('required');
	  		$('#state-field').hide();
	  		$('#state-province-field').show();
	   		$('#EvictionContactStateProvince').attr('required', true);
	  		$('#county-field').hide();
	  		$('#label-zip-code').text('Zip/Postal Code');
	  	}
		});

  });


	//***********************************************************************************************
	//
	//***********************************************************************************************
	$(document).ready(function() {
    	isCompany();
    	changeMatter();
    	$("#EvictionContactCountry").trigger("change");
			$('#EvictionContactState').trigger("change");

			//If an error message is displayed, scroll to it
			if ($('body').find('.error-message').html() != null) {
				$('html, body').animate({
				    scrollTop: $('.error-message:visible:first').offset().top - $('#header-container').height() - 100
				}, 1000);
			}
	});


	//Set a variable to indicate if the form was submitted or not
	var submit_clicked = false;
	
	//If the user is trying to leave the current page without submitting the form, display a warning message
	window.onbeforeunload = function() {
		if (submit_clicked == false) return "If you navigate away from this page you will lose all your information and will need to provide it again!  Are you sure you want to leave?";
	};



	//If the Save button is clicked, warn the client if at least one defendant is missing the DOB and SSN
	$("#btnSave").on("click", function() {
		var isFieldsEmpty = false;

		//Set the flag to indicate the form was submitted
		submit_clicked = true;

		if ($('#EvictionDoContinue').val() == 'false') {
			for (i=0; i<=$('#EvictionDefendantsNumber').val(); i++) {
				if ($('#Defendant'+i+'DateOfBirth').val() == '' && $('#Defendant'+i+'Ssn1').val() == '') {
					isFieldsEmpty = true;
					break;
				}
			}

			if (isFieldsEmpty) {
			  $('#overlay').fadeIn('slow');
			  $("#divPopupDefendant").fadeIn('slow');
			  return false;
			}
		}
	});

	//If the Continue button is clicked in the popup dialog, trigger the save action
	$('#btnContinue').on('click', function() {
 		$('#EvictionDoContinue').val('');
 		$('#divPopupDefendant').fadeOut('slow');
 		$('#overlay').fadeOut('slow');
 		$('#btnSave').trigger('click');
	});

	//If the Close button is clicked in the popup dialog, highlight the empty DOB and SSN fields and scroll back up
  $('#btnClose').on('click', function() {
		submit_clicked = false;

 		$('#divPopupDefendant').fadeOut('slow');
 		$('#overlay').fadeOut('slow');
		//Highlight all the fields that are empty
		for (i=0; i<=$('#EvictionDefendantsNumber').val(); i++) {
			if ($('#Defendant'+i+'DateOfBirth').val() == '' && $('#Defendant'+i+'Ssn1').val() == '') {
				$('#Defendant'+i+'DateOfBirth').addClass('inputDefendantEmpty');
				$('#Defendant'+i+'Ssn1').addClass('inputDefendantEmpty');
				$('#Defendant'+i+'Ssn2').addClass('inputDefendantEmpty');
				$('#Defendant'+i+'Ssn3').addClass('inputDefendantEmpty');
			}
		}
		$("html, body").animate({ scrollTop: 0 }, "slow");
  });


	//***********************************************************************************************
	//	Retrieve the info from the Address Book for the selected entry 
	//	and fill-in the contact fields
	//***********************************************************************************************
	var addressBookCountyID;

	function getAddressBookEntry(entryID) {
		$.ajax({
		    url: '/index.php/address_books/getEntryInfo/' + entryID,
		    cache: false,
		    type: 'GET',
		    dataType: 'HTML',
		    success: function (data) {
					if (data != '') {
						var obj = jQuery.parseJSON(data);
		        $('#EvictionContactFirstName').val(obj.first_name);
		        $('#EvictionContactLastName').val(obj.last_name);
		        $('#EvictionContactStreetAddress1').val(obj.street_address1);
		        $('#EvictionContactStreetAddress2').val(obj.street_address2);
		        $('#EvictionContactCity').val(obj.city);
		        if (obj.country == 'US') {
			        $('#EvictionContactState').val(obj.state);
							$('#EvictionContactState').trigger("change");
							//Since we need to trigger a change event on the State drop-down to reload the associated counties, we can't set the county here because it will get overridden.
							// We're saving the county ID in a global var so we can retrieve later (see ajaxComplete function below)
							addressBookCountyID = obj.county_id;
							$('#EvictionContactStateProvince').val('');
			    		$('#state-field').show();
			    		$('#state-province-field').hide();
			    		$('#county-field').show();
  		    		$('#label-zip-code').text('Zip Code');
						} else {
							$('#EvictionContactState').val('');
							$('#EvictionContactStateProvince').val(obj.state_province);
			    		$('#state-field').hide();
			    		$('#state-province-field').show();
			    		$('#county-field').hide();
   		    		$('#label-zip-code').text('Zip/Postal Code');
						}
		        $('#EvictionContactZipCode').val(obj.zip_code);
		        $('#EvictionContactCountry').val(obj.country);
		        $('#EvictionContactCompanyName').val(obj.company_name);
						phoneNumber = obj.phone_number;
		        $('#EvictionCpn1').val(phoneNumber.substring(0, 3));
		        $('#EvictionCpn2').val(phoneNumber.substring(3, 6));
		        $('#EvictionCpn3').val(phoneNumber.substring(6, 10));
		      }
		    },
		    error: function (error) {
		    	alert('An error occured while processing your request.');
		    }
		});
	}

	//This is called whenever a Ajax function finishes executing
	$(document).ajaxComplete(function(event, xhr, settings) {
		//If the loadCounties function was called and the addressBookCountyID var is not empty it means that the contact info was populated from the address book,
		// we need to set the county drop-down to the value from the address book
		if (settings.url.indexOf("loadCounties") > -1 && (addressBookCountyID !== undefined && addressBookCountyID != "")) {
			$('#EvictionContactCountyId').val(addressBookCountyID);
		}
	});


	//***********************************************************************************************
	// Get the address book list for the logged-in user
	//***********************************************************************************************
	$('#openAddressBook').on('click', function() {
		$.ajax({
		    url: '/index.php/address_books/getList/',
		    cache: false,
		    type: 'GET',
		    dataType: 'HTML',
		    success: function (data) {
					if (data != '') {
						$('#divPopupAddressBook').find('.inner_padding').html(data);
					  $('#overlay').fadeIn('slow');
					  $("#divPopupAddressBook").fadeIn('slow');
					}
				},
		    error: function (error) {
		    	alert(error);
		    }
		});
	});

  $('#btnChoose').on('click', function() {
		getAddressBookEntry($('input:radio[name=rdoEntry\\[\\]]:checked').val());
 		$('#divPopupAddressBook').fadeOut('slow');
 		$('#overlay').fadeOut('slow');
	});

  $('#btnCancel').on('click', function() {
 		$('#divPopupAddressBook').fadeOut('slow');
 		$('#overlay').fadeOut('slow');
	});

	//***********************************************************************************************
	// Add the current person responsible info to the logged-in user's address book
	//***********************************************************************************************
	$('#addToAddressBook').on('click', function() {
		$.ajax({
				type:"POST",
				data:$('#EvictionEditForm').serialize(),
		    url: '/index.php/address_books/addEntry/Eviction',
		    success: function (data) {
					if (data == 1) {
						$('.message_success').text('The person was added successfully to your address book.');
					} else {
						$('.message_error').text('The person could not be added to your address book.');
					}
				  $('#overlay').fadeIn('slow');
				  $("#divPopupNotification").fadeIn('slow').delay(800).fadeOut('slow');
				  $('#overlay').delay(800).fadeOut('slow');
				}
		});
	});

</script>