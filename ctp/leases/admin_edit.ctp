<?php echo $this->element('datepicker_includes') ?>

<div id="wrapper" class="acc center fm-lease">
        
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">lease <span>information</span> sheet</h1>
            </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/pexels-photo-acc.jpeg"></div>
    </div>
        
    <div class="content col-xs-10 center">
            
        <div class="progress center col-xs-9">
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
					<span class="pg_text step center inline">Property</span>
                    <i class="center inline fa fa-caret-right" aria-hidden="true"></i>
					<span class="pg_text step center inline">Managing</span>
                    <i class="center inline fa fa-caret-right" aria-hidden="true"></i>
					<span class="pg_text step center inline">Lease</span>
                    <i class="center inline fa fa-caret-right" aria-hidden="true"></i>
                    <span class="pg_text step center inline">Additional</span>
                    <i class="center inline fa fa-caret-right" aria-hidden="true"></i>
                    <span class="pg_text step center inline">Maintenance</span>
                    <i class="center inline fa fa-caret-right" aria-hidden="true"></i>
                    <span class="pg_text step center inline">Utilities</span>
                    <i class="center inline fa fa-caret-right" aria-hidden="true"></i>
                    <span class="pg_text step center inline">Provisions</span>
                    <i class="center inline fa fa-caret-right" aria-hidden="true"></i>
                    <span class="pg_text step center inline">Addendum</span>
                </div>
            </div>
            
        <div class="info col-xs-12 center clearfix leases form">
            
				<?php
					echo $this->Form->create('Lease');
                    echo $this->Form->input('id');
                    echo $this->Form->input('CostTotal', array('type' => 'hidden', 'value' => $lease['Payment']['total']));
                    echo $this->Form->input('is_faxed', array('type' => 'hidden'));
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
                
                <!--Tenant-->
                <div id="fm2" class="tab fld col-xs-10 center">
                    <!--Property Info-->
                    <div class="info_wrap lrg col-xs-12 center left">
                        <h2>Lease Property Information</h2>
                        <div class="col-xs-12 center">
                            <?php
                                echo $this->Form->input('property_street_address1', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-6 inline left'),
                                    'class' => 'input col-xs-12 center',
                                    'type' => 'text',
                                    'placeholder' =>  'Street address',
                                    'after' =>  'Street address',
                                    'value' => $autofill_property['property_street_address1'],
                                    'label' => false
                                ]);
                                echo $this->Form->input('property_street_address2', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-2 inline left'),
                                    'class' => 'input col-xs-12 center',
                                    'type' => 'text',
                                    'placeholder' =>  'Unit No.',
                                    'after' =>  'Unit No.',
                                    'label' => false
                                ]);
                                echo $this->Form->input('property_city', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-3 inline last left'),
                                    'class' => 'input col-xs-12 center',
                                    'type' => 'text',
                                    'value' => $autofill_property['property_city'],
                                    'placeholder' =>  'City',
                                    'after' =>  'City',
                                    'label' => false
                                ]);
                                echo $this->Form->input('property_county', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                                    'class' => 'input col-xs-12 center',
                                    'options' => $counties,
                                    'value' => $property_county,
                                    'placeholder' =>  'County',
                                    'after' =>  'County',
                                    'label' => false
                                ]);
                                echo $this->Form->input('property_zip_code', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                                    'class' => 'input col-xs-12 center',
                                    'type' => 'text',
                                    'value' => $autofill_property['property_zip_code'],
                                    'placeholder' =>  'Zip/Postal Code',
                                    'after' =>  'Zip/Postal Code',
                                    'label' => false
                                ]);
                                echo $this->Form->input('property_state', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-3 inline left last'),
                                    'class' => 'input col-xs-12 center',
                                    'placeholder' =>  'State',
                                    'after' =>  'State',
                                    'options' => $states,
                                    'value' => $property_state,
                                    'label' => false
                                ]);
                            ?>
                        </div>
                    </div>
                    <!--Owner Info-->
                    <div class="info_wrap lrg col-xs-12 center left">
                        <h2>Property Owner / Landlord Information</h2>
                        <p class="main">Be sure to use the complete and proper name of the record title holder of the property.</p>
                        <div id="names" class="col-xs-12 left">
                            <div id="table-owners" class="col-xs-12 left">
                                <?php
                                $i = 0;
                                foreach ($owners as $owner):
                                    $class = null;
                                        if ($i % 2 == 0) {
                                            $class = ' class="altrow"';
                                        }
                                        echo '<tr>';
                                            echo $this->Form->input('Owner' . $i . '.id', array('label' => false)); 
                                            echo '<td>' . $this->Form->input('Owner' . $i . 'FirstName', [
                                                'div' => array('class' => 'fm_input fm_text col-xs-2-2 inline center left'),
                                                'class' => 'input col-xs-12 center',
                                                'required' => false,
                                                'type' => 'text',
                                                'onkeyup' => 'isCompany(' . $i . ');',
                                                'placeholder' =>  'Manager first name',
                                                'after' =>  'Manager first name',
                                                'required' => true,
                                                'label' => false
                                            ]) . '</td>';                                      
                                            echo '<td>' . $this->Form->input('Owner' . $i . 'MiddleName', [
                                                'div' => array('class' => 'fm_input fm_text col-xs-2-2 inline center left'),
                                                'class' => 'input col-xs-12 center',
                                                'required' => false,
                                                'type' => 'text',
                                                'onkeyup' => 'isCompany(' . $i . ');',
                                                'placeholder' =>  'Manager first name',
                                                'after' =>  'Manager first name',
                                                'label' => false
                                            ]) . '</td>';                                      
                                            echo '<td>' . $this->Form->input('Owner' . $i . 'LastName', [
                                                'div' => array('class' => 'fm_input fm_text col-xs-2-2 inline center left'),
                                                'class' => 'input col-xs-12 center',
                                                'required' => false,
                                                'type' => 'text',
                                                'onkeyup' => 'isCompany(' . $i . ');',
                                                'placeholder' =>  'Manager first name',
                                                'afterr' =>  'Manager first name',
                                                'required' => true,
                                                'label' => false
                                            ]) . '</td>';                                      
                                            echo $this->Form->input('Owner' . $i . 'CompanyName', [
                                                'div' => array('class' => 'fm_input fm_text col-xs-2-2 inline center left last'),
                                                'class' => 'input col-xs-10 right company-field',
                                                'before' => '<span class="left">OR</span>',
                                                'required' => false,
                                                'type' => 'text',
                                                'name' => 'mlname',
                                                'placeholder' =>  'Company name',
                                                'after' =>  'Company name',
                                                'required' => false,
                                                'label' => false
                                            ]);
                                        echo '</tr>';
                                    $i++;
                                ?>
                            </div>
                            <div class="btn-blue col-xs-2 center left">
                                <a href="<?php echo $this->Html->url(array('controller' => 'owners', 'action' => 'index', $lease_id)); ?>"><p>Manage Landlords</p></a>
                            </div>
                        </div>
                    </div>
                    <!--Tenant-->
                    <div class="info_wrap lrg col-xs-12 center left">
                        <h2>tenant information</h2>
                        <div class="col-xs-12 left inline flex">
                            <?php echo $this->element('tenants'); ?>
                            <div class="btn-blue col-xs-2 center left">
                                <a href="<?php echo $this->Html->url(array('controller' => 'owners', 'tenants' => 'index', $lease_id)); ?>"><p>Manage Tenants</p></a>
                            </div>
                        </div>
                    </div>
                    <!--Occupant-->
                    <div class="info_wrap lrg col-xs-12 center left">
                        <h2>occupant information</h2>
                        <div class="col-xs-12 left inline flex">
                            <?php echo $this->element('occupants'); ?>
                            <div class="btn-blue col-xs-2 center left">
                                <a href="<?php echo $this->Html->url(array('controller' => 'occupants', 'tenants' => 'index', $lease_id)); ?>"><p>Manage Tenants</p></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--Management-->
                <div id="fm3" class="tab fld col-xs-10 center"> 
                    <!-- Lease Status-->
                    <div class="info_wrap lrg col-xs-12 center inline left">
                        <h2>Lease status</h2>  
                        <div class="flex col-xs-12 center">
                            <?php
                            
                            echo '<p class="left col-xs-6 left">' . $this->Form->label('Lease Creation Date') . date('l, F jS Y', strtotime($lease['Lease']['created'])) . '</p>';
                            
                            echo '<p class="left col-xs-6 left">' . $this->Form->label('Last Modification Date') . date('l, F jS Y', strtotime($lease['Lease']['modified'])) . '</p>';
                            
                            echo '<p class="left col-xs-6 left">' . $this->Form->label('Lease needed by');
                            
                                if (strlen($lease['Lease']['requested_by']) > 10) echo date('l, F jS Y - g:ia', strtotime($lease['Lease']['requested_by']));

                                else echo date('l, F jS Y', strtotime($lease['Lease']['requested_by']));

                                echo '<input type="hidden" name="data[Lease][requested_by]" value="' . $lease['Lease']['requested_by'] . '" />';
                            
                            echo '</p>';
                            
                            echo '<p class="left col-xs-6 left">' . $this->Form->label('Matter No.', 'Matter No.') . $lease['Lease']['id'] . '</p>';
                            
                            echo $this->Form->input('status_id', array(
                                'label' => 'Lease Status'
                            ));
                            
                            echo $this->Form->input('note', array(
                                'style' => 'width:530px;',
                                'label' => 'Lease Notes'
                            ));
                            
                            echo $this->Form->input('in_pclaw', array(
                                'label' => 'Entered in QuickBooks'
                            ));
                            
                            echo $this->Form->submit('Save', array('type' => 'image', 'style' => 'width:129px; height:29px; display:block;', 'div' => array('style' => 'float:left;')));
                            
                            echo $this->Form->submit('Submit', array('name' => 'submit_changes', 'type' => 'image', 'style' => 'width:164px; height:29px; display:block;', 'div' => array('style' => 'float:left;margin-left:20px;')));
                            
                            ?>
                        </div>
                    </div>                    
                </div>
                
                <!--Lease-->
                <div id="fm4" class="tab fld col-xs-10 center">                    
                    <div class="info_wrap lrg col-xs-12 center inline left">
                        <h2 class="push-b">Lease Information</h2>
                        <h3>Term:</h3>
                        <div class="col-xs-12 left">
                            <?php 
                                if ($lease_renewal != 1) {
                                    echo $this->Form->input('lease_start', [
                                        'div' => array('class' => 'fm_input fm_text col-xs-4 inline left'),
                                        'id' => 'leaseStartDate',
                                        'class' => 'input col-xs-12 center',
                                        'placeholder' => 'Starting date',
                                        'after' => 'Starting date',
                                        'type' => 'text',
                                        'label' => false
                                    ]);
                                    echo $this->Form->input('lease_end', [
                                        'div' => array('class' => 'fm_input fm_text col-xs-4 inline left'),
                                        'id' => 'leaseEndDate',
                                        'class' => 'input col-xs-12 center',
                                        'placeholder' => 'Ending date',
                                        'after' => 'Ending date',
                                        'type' => 'text',
                                        'label' => false
                                    ]);
                                } else { 
                                    echo $this->Form->input('lease_start', [
                                        'div' => array('class' => 'fm_input fm_text col-xs-4 inline left'),
                                        'id' => 'leaseStartDate',
                                        'class' => 'input col-xs-12 center',
                                        'placeholder' => 'Starting date',
                                        'value' => $this->request->data['Lease']['lease_start'],
                                        'after' => 'Starting date, <span>Prior Lease Start: ' . $this->request->data['Lease']['prior_lease_start'] . '</span>',
                                        'type' => 'text',
                                        'label' => false
                                    ]);
                                    echo $this->Form->input('lease_end', [
                                        'div' => array('class' => 'fm_input fm_text col-xs-4 inline left'),
                                        'id' => 'rentStartDate',
                                        'class' => 'input col-xs-12 center',
                                        'placeholder' => 'Ending date',
                                        'value' => $this->request->data['Lease']['lease_end'],
                                        'after' => 'Ending date <span>Prior Lease Start: ' . $this->request->data['Lease']['prior_lease_end'] . '</span>',
                                        'type' => 'text',
                                        'label' => false
                                    ]);                                    
                                    echo $this->Form->input('prior_lease_start', array('type' => 'hidden', 'value' => $this->request->data['Lease']['prior_lease_start']));
                                    echo $this->Form->input('prior_lease_end', array('type' => 'hidden', 'value' => $this->request->data['Lease']['prior_lease_end']));
                                }
                            ?>
                        </div>
                    </div>
                    <div class="info_wrap lrg col-xs-12 center inline left">
                        <h3>Rent:</h3>
                        <div class="flex col-xs-12 center">
                            <?php                                
                                echo $this->Form->input('monthly_rent', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-4 inline left'),
                                    'class' => 'input col-xs-12 center currency',
                                    'placeholder' => 'Monthly rent',
                                    'after' => 'Monthly rent',
                                    'type' => 'text',
                                    'onkeypress' => 'return isNumber(event)',
                                    'label' => false
                                ]);  
                                echo $this->Form->input('sales_tax', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                                    'class' => 'input col-xs-12 center currency',
                                    'placeholder' => 'Sales tax',
                                    'type' => 'text',
                                    'after' => 'Sales tax <span>If applicable</span>',
                                    'onkeypress' => 'return isNumber(event)',
                                    'required' => false,
                                    'label' => false
                                ]);
                                echo $this->Form->input('county_tax', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-3 inline left last'),
                                    'class' => 'input col-xs-12 center currency',
                                    'placeholder' => 'County tax',
                                    'type' => 'text',
                                    'after' => 'County tax <span>If applicable</span>',
                                    'onkeypress' => 'return isNumber(event)',
                                    'required' => false,
                                    'label' => false
                                ]);
                            ?>
                        </div>
                        <div class="flex col-xs-12 center">
                            <?php
                                echo '<p class="mob col-xs-12 left">Relevant dates</p>';
                                echo $this->Form->input('rent_due_date', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-2 inline left'),
                                    'id' => 'rentDueDate',
                                    'class' => 'input col-xs-12 center date',
                                    'empty' => 'Due date',
                                    'after' => 'Due date',
                                    'options' => $rent_due_date_options,
                                    'label' => false
                                ]);
                                echo $this->Form->input('rent_late_date', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-2 inline left'),
                                    'id' => 'rentLateDate',
                                    'class' => 'input col-xs-12 center date',
                                    'empty' => 'Late date',
                                    'after' => 'Late date',
                                    'options' => $rent_due_date_options,
                                    'label' => false
                                ]); 
                                echo $this->Form->input('rent_late_fee', [
                                    'div' => array('id' => 'divRentLateFee', 'class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                    'class' => 'input col-xs-12 center currency',
                                    'placeholder' => 'Late Rent Fee',
                                    'after' => 'Late Rent Fee',
                                    'onkeypress' => 'return isNumber(event)',
                                    'type' => 'text',
                                    'label' => false
                                ]);
                                echo $this->Form->input('rent_late_fee_daily', [
                                    'div' => array('id' => 'divRentLateFee', 'class' => 'fm_input fm_text col-xs-6 inline left last'),
                                    'class' => 'input col-xs-7 center currency left',
                                    'after' => $this->Form->input('rent_late_date_type', array(
                                        'options' => array("Every day", "Every week"), 'label' => false, 'class' => 'input col-xs-12 center inline','div' => array('class' => 'fm_per inline right col-xs-4'))
                                    ) . 'Additional fees',
                                    'placeholder' => 'Additional fees',
                                    'before' => '<span class="center inline">Per</span>',
                                    'type' => 'text',
                                    'onkeypress' => 'return isNumber(event)',
                                    'label' => false
                                ]); 
                            ?>
                        </div>
                        <div class="col-xs-12 center">
                            <p class="inline left push-r">Late Rent Fee Type:</p>
                            <div class="fm_input fm_text col-xs-2 inline center left">
                                <?php
                                    $options = array(1 => 'Percentage of Rent', 0 => 'Flat Fee');
                                     $attributes = array('class' => 'input center', 'legend' => false, 'default' => 0, 'onclick' => 'changeType();'); 
                                    echo $this->Form->radio('rent_late_fee_type', $options, $attributes);
                                ?>
                            </div>
                            <p class="inline left push-r">Cash Payment Accepted:</p>
                            <div class="fm_input fm_text col-xs-2 inline center left"> 
                                <?php
                                    $options = array(1 => 'Yes', 0 => 'No');
			                        $attributes = array('class' => 'input center', 'legend' => false, 'default' => 0);
                                    echo $this->Form->radio('cash_payment', $options, $attributes);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="info_wrap lrg col-xs-12 center inline left">    
                        <h3>Prorated rent:</h3>
                        <div class="flex col-xs-12 center">
                            <?php
                                echo $this->Form->input('prorated_rent', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                                    'class' => 'input col-xs-12 center currency',
                                    'after' => 'Prorated rent <span>Provide the monthly rental amount in the lease.</span>',
                                    'placeholder' => 'Prorated rent',
                                    'type' => 'text',
                                    'onkeypress' => 'return isNumber(event)',
                                    'required' => false,
                                    'label' => false
                                ]);
                                echo $this->Form->input('prorated_sales_tax', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                                    'class' => 'input col-xs-12 center currency',
                                    'after' => 'Sales tax <span>If applicable</span>',
                                    'placeholder' => '',
                                    'type' => 'text',
                                    'onkeypress' => 'return isNumber(event)',
                                    'required' => false,
                                    'label' => false
                                ]);
                                echo $this->Form->input('prorated_county_tax', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-3 inline left last'),
                                    'class' => 'input col-xs-12 center currency',
                                    'after' => 'County tax <span>If applicable</span>',
                                    'placeholder' => 'County tax',
                                    'type' => 'text',
                                    'onkeypress' => 'return isNumber(event)',
                                    'required' => false,
                                    'label' => false
                                ]);
                            ?>
                        </div>
                        <div class="flex col-xs-12 center">
                            <?php
                                echo '<p class="mob col-xs-12 left">Relevant dates</p>';
                                echo $this->Form->input('prorated_start_date', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                                    'class' => 'input col-xs-12 center',
                                    'placeholder' => 'Prorated start date',
                                    'after' => 'Prorated start date',
                                    'type' => 'text',
                                    'required' => false,
                                    'label' => false
                                ]);
                                echo $this->Form->input('prorated_end_date', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                                    'class' => 'input col-xs-12 center',
                                    'placeholder' => 'Prorated end date',
                                    'after' => 'Prorated end date',
                                    'type' => 'text',
                                    'required' => false,
                                    'label' => false
                                ]);
                                echo $this->Form->input('prorated_rent_due_date', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-3 inline left last'),
                                    'class' => 'input col-xs-12 center',
                                    'placeholder' => 'Prorated due date',
                                    'after' => 'Prorated due date',
                                    'type' => 'text',
                                    'required' => false,
                                    'label' => false
                                ]);
                            ?>
                        </div>
                    </div>
                    <div class="info_wrap lrg col-xs-12 center inline left">    
                        <h3>Advance rent:</h3>
                        <div class="flex col-xs-12 center">
                            <?php
                                echo $this->Form->input('advance_rent', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                                    'class' => 'input col-xs-12 center currency',
                                    'placeholder' => 'Advance rent',
                                    'after' => 'Advance rent',
                                    'type' => 'text',
                                    'onkeypress' => 'return isNumber(event)',
                                    'required' => false,
                                    'label' => false
                                ]);
                                echo $this->Form->input('advance_sales_tax', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                                    'class' => 'input col-xs-12 center currency',
                                    'after' => 'Sales tax <span>If applicable</span>',
                                    'placeholder' => 'Sales tax',
                                    'type' => 'text',
                                    'onkeypress' => 'return isNumber(event)',
                                    'required' => false,
                                    'label' => false
                                ]);
                                echo $this->Form->input('advance_county_tax', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-3 inline left last'),
                                    'class' => 'input col-xs-12 center currency',
                                    'after' => 'County tax <span>If applicable</span>',
                                    'placeholder' => 'County tax',
                                    'type' => 'text',
                                    'onkeypress' => 'return isNumber(event)',
                                    'required' => false,
                                    'label' => false
                                ]);                           
                            ?>
                        </div>
                    </div>
                </div>
                
                <!--Additional-->
                <div id="fm5" class="tab fld col-xs-10 center">
                    <div class="info_wrap lrg col-xs-12 center inline left">
                        <h2 class="push-b">Additional Information</h2>
                        <h3>Security deposit:</h3>
                        <div class="flex col-xs-12 center">
                            <?php
                                echo $this->Form->input('security_deposit', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-5 inline left'),
                                    'class' => 'input col-xs-12 center currency',
                                    'after' => 'Security deposit amount',
                                    'placeholder' => 'Security deposit amount',
                                    'onkeypress' => 'return isNumber(event)',
                                    'type' => 'text',
                                    'label' => false,
                                    'required' => true
                                ]);                            
                                echo '<p class="inline left push-r">Security Deposit Account:</p>';
                            
                                echo '<div class="fm_input fm_text col-xs-2 inline center left">'; 
                                    $options = array(Configure::read('Lease.account_type_interest') => 'Interest Bearing', Configure::read('Lease.account_type_no_interest') => 'Non-Interest Bearing');
			                         $attributes = array('class' => 'input center', 'legend' => false, 'separator' => '<br />', 'default' => Configure::read('Lease.account_type_no_interest'), 'value' => $autofill_security_deposit['security_deposit_account_type']);                          
                                    echo $this->Form->radio('security_deposit_account_type', $options, $attributes); 
                                echo '</div>';
                            ?>
                        </div>
                        <div class="col-xs-12 center">
                            <?php
                                echo $this->Form->input('security_deposit_bank_account', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-12 left last'),
                                    'class' => 'input col-xs-12 center',
                                    'after' => 'Name and address of bank where security deposit held.',
                                    'placeholder' => 'Bank information',
                                    'type' => 'text',
                                    'label' => false,
                                    'required' => false,
                                    'value' => $autofill_security_deposit['security_deposit_bank_account']
                                ]);
                                echo $this->Form->input('autofill_security_deposit', array(
                                    'div' => array('class' => 'fm_mem center right'),
                                    'class' => 'fm_check',
                                    'label' => 'Remember this information',
                                    'type' => 'checkbox',
                                    'checked' => $autofill_security_deposit['autofill_security_deposit']
                                ));
                            ?>
                        </div>                        
                    </div>
                    <?php if ($lease_type != 'short') { ?>
                    <div class="info_wrap lrg col-xs-12 center inline left">
                        <h3>Termination and Renewal of Lease</h3>
                        <div class="col-xs-12 center inline">
                            <?php                                
                                    echo '<p class="col-xs-8 left inline">How much time before the end of the lease must the Tenant give you notice of not renewing?</p>';
                                    echo $this->Form->input('notice_non_renewal', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-3 inline right last'),
                                        'class' => 'input col-xs-12 center',
                                        'label' => false,
                                        'options' => $notice_non_renewal_options,
                                        'required' => false,
                                        'value' => $autofill_renewal['notice_non_renewal']
                                    ));
                                    echo $this->Form->input('autofill_renewal', array(
                                        'div' => array('class' => 'fm_mem col-xs-12 center right'),
                                        'class' => 'fm_check',
                                        'label' => 'Remember this information',
                                        'type' => 'checkbox',
                                        'checked' => $autofill_security_deposit['autofill_renewal']
                                    ));
                            ?>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="info_wrap lrg col-xs-12 center inline left">
                        <h3>Mandatory Charges When Tenant Vacates</h3>
                        <p class="left">Do you want to charge the Tenant a minimum fee for the following matters at the end of the lease?</p>
                        <div class="col-xs-12 center inline push-t">
                            <?php                            
                                echo '<p class="col-xs-8 left inline">Cleaning Mandatory Minimum Charge?</p>';
                                echo '<div class="fm_input fm_text inline center right last">';
                                    $options = array(
                                        1 => 'Yes ' . $this->Form->input('cleaning_charge_fee', array(
                                            'placeholder' => 'Amount',
                                            'after' => 'Amount',
                                            'class' => 'currency inline',
                                            'label' => false,
                                            'value' => $autofill_charges['cleaning_charge_fee'],
                                            'type' => 'text',
                                            'onkeypress' => 'return isNumber(event)',
                                            'div' => array(
                                                'id' => 'divLeaseCleaningChargeFee',
                                                'class' => 'min_charge inline right'
                                            )
                                        )
                                    ), 0 => 'No');
                                    $attributes = array(
                                        'class' => 'input center',
                                        'legend' => false,
                                        'default' => 0,
                                        'onclick' => 'showMinCharge();',
                                        'value' => $autofill_charges['cleaning_charge']
                                    );
                                    echo $this->Form->radio('cleaning_charge', $options, $attributes);
                                echo '</div>';                            
                            ?>
                        </div>
                        <div class="col-xs-12 center inline push-t">
                            <?php                            
                                echo '<p class="col-xs-8 left inline">Carpet/Floor Cleaning Mandatory Minimum Charge?</p>';
                                echo '<div class="fm_input fm_text inline center right last">';
                                    $options = array(
                                        1 => 'Yes ' . $this->Form->input('carpet_charge_fee', array(
                                            'placeholder' => 'Amount',
                                            'after' => 'Amount',
                                            'class' => 'currency inline',
                                            'label' => false,
                                            'value' => $autofill_charges['carpet_charge_fee'],
                                            'type' => 'text',
                                            'onkeypress' => 'return isNumber(event)',
                                            'div' => array(
                                                'id' => 'divLeaseCarpetChargeFee',
                                                'class' => 'min_charge inline right'
                                            )
                                        )
                                    ), 0 => 'No');
                                    $attributes = array(
                                        'class' => 'input center',
                                        'legend' => false,
                                        'default' => 0,
                                        'onclick' => 'showMinCharge();',
                                        'value' => $autofill_charges['carpet_charge']
                                    );
                                    echo $this->Form->radio('carpet_charge', $options, $attributes);
                                echo '</div>';                            
                            ?>
                        </div>
                        <div class="col-xs-12 center inline push-t">
                            <?php                            
                                echo '<p class="col-xs-8 left inline">Missing Keys, Garage Remotes, Access Card Mandatory Minimum Charge?</p>';
                                echo '<div class="fm_input fm_text inline center right last">';
                                    $options = array(
                                        1 => 'Yes ' . $this->Form->input('key_charge_fee', array(
                                            'placeholder' => 'Amount',
                                            'after' => 'Amount',
                                            'class' => 'currency inline',
                                            'label' => false,
                                            'value' => $autofill_charges['key_charge_fee'],
                                            'type' => 'text',
                                            'onkeypress' => 'return isNumber(event)',
                                            'div' => array(
                                                'id' => 'divLeaseKeyChargeFee',
                                                'class' => 'min_charge inline right'
                                            )
                                        )
                                    ), 0 => 'No');
                                    $attributes = array(
                                        'class' => 'input center',
                                        'legend' => false,
                                        'default' => 0,
                                        'onclick' => 'showMinCharge();',
                                        'value' => $autofill_charges['key_charge']
                                    );
                                    echo $this->Form->radio('key_charge', $options, $attributes);
                                echo '</div>';
                            
                                echo $this->Form->input('autofill_charges', array(
                                    'div' => array('class' => 'fm_mem col-xs-12 center right'),
                                    'class' => 'fm_check',
                                    'label' => 'Remember this information',
                                    'type' => 'checkbox',
                                    'checked' => $autofill_security_deposit['autofill_charges']
                                ));
                            ?>
                        </div>
                    </div>
                </div>
                
                <!--Maintenance-->
                <div id="fm6" class="tab fld  chk-fld col-xs-10 center">
                    <div class="info_wrap lrg col-xs-12 center inline left">
                        <h2 class="push-b">Appliance Maintenance</h2>
                        <h3>Appliances and Fixtures:</h3>
                        <p>Appliances and Fixtures Included, Repaired and Maintained by the Landlord.</p>
                        <div class="col-xs-12 center left push-t push-b">
                            <?php
                                echo $this->Form->input('appliances_ceiling_fans', array(
                                    'div' => array('class' => 'fm_mem inline input col-xs-3 left'),
                                    'label' => 'Ceiling Fans',
                                    'type' => 'checkbox',
                                    'class' => 'fm_check appliances',
                                    'checked' => $autofill_appliances['appliances_ceiling_fans'],
                                    'onclick' => 'disable_maintenance(\'CeilingFans\');'
                                ));
                                echo $this->Form->input('appliances_dishwasher', array(
                                    'div' => array(
                                        'class' => 'fm_mem inline input col-xs-3 left'
                                    ),
                                    'label' => 'Dishwasher',
                                    'type' => 'checkbox',
                                    'class' => 'fm_check appliances',
                                    'checked' => $autofill_appliances['appliances_dishwasher'],
                                    'onclick' => 'disable_maintenance(\'Dishwasher\');'));
                                echo $this->Form->input('appliances_dryer', array(
                                    'div' => array(
                                        'class' => 'fm_mem inline input col-xs-3 left'
                                    ),
                                    'label' => 'Dryer',
                                    'type' => 'checkbox', 'class' => 'fm_check appliances', 'checked' => $autofill_appliances['appliances_dryer'], 'onclick' => 'disable_maintenance(\'Dryer\');'));                            
                                echo $this->Form->input('appliances_garbage_disposal', array('div' => array('class' => 'fm_mem inline input col-xs-3 left'), 'label' => 'Garbage Disposal', 'type' => 'checkbox', 'class' => 'fm_check appliances', 'checked' => $autofill_appliances['appliances_garbage_disposal'], 'onclick' => 'disable_maintenance(\'GarbageDisposal\');'));
                            
                                echo $this->Form->input('appliances_irrigation', array('div' => array('class' => 'fm_mem inline input col-xs-3 left'), 'label' => 'Irrigation/Sprinkler System', 'type' => 'checkbox', 'class' => 'fm_check appliances', 'checked' => $autofill_appliances['appliances_irrigation'], 'onclick' => 'disable_maintenance(\'Irrigation\');'));
                                echo $this->Form->input('appliances_microwave', array('div' => array('class' => 'fm_mem inline input col-xs-3 left'), 'label' => 'Microwave', 'type' => 'checkbox', 'class' => 'fm_check appliances', 'checked' => $autofill_appliances['appliances_microwave'], 'onclick' => 'disable_maintenance(\'Microwave\');'));                            
                                echo $this->Form->input('appliances_oven', array('div' => array('class' => 'fm_mem inline input col-xs-3 left'), 'label' => 'Oven', 'type' => 'checkbox', 'class' => 'fm_check appliances', 'checked' => $autofill_appliances['appliances_oven'], 'onclick' => 'disable_maintenance(\'Oven\');'));
                                echo $this->Form->input('appliances_range', array('div' => array('class' => 'fm_mem inline input col-xs-3 left'), 'label' => 'Range', 'type' => 'checkbox', 'class' => 'fm_check appliances', 'checked' => $autofill_appliances['appliances_range'], 'onclick' => 'disable_maintenance(\'Range\');'));
                            
                                echo $this->Form->input('appliances_refrigerator', array('div' => array('class' => 'fm_mem inline input col-xs-3 left'), 'label' => 'Refrigerator', 'type' => 'checkbox', 'class' => 'fm_check appliances', 'checked' => $autofill_appliances['appliances_refrigerator'], 'onclick' => 'disable_maintenance(\'Refrigerator\');'));
                                echo $this->Form->input('appliances_washer', array('div' => array('class' => 'fm_mem inline input col-xs-3 left'), 'label' => 'Washer',  'type' => 'checkbox', 'class' => 'fm_check appliances', 'checked' => $autofill_appliances['appliances_washer'], 'onclick' => 'disable_maintenance(\'Washer\');'));
                                echo $this->Form->input('appliances_water_conditioner', array('div' => array('class' => 'fm_mem inline input col-xs-3 left'), 'label' => 'Water Softener', 'type' => 'checkbox', 'class' => 'fm_check appliances', 'checked' => $autofill_appliances['appliances_water_conditioner'], 'onclick' => 'disable_maintenance(\'WaterConditioner\');'));
                                echo $this->Form->input('appliances_water_heater', array('div' => array('class' => 'fm_mem inline input col-xs-3 left'), 'label' => 'Water Heater',  'type' => 'checkbox', 'class' => 'fm_check appliances', 'checked' => $autofill_appliances['appliances_water_heater'], 'onclick' => 'disable_maintenance(\'WaterHeater\');'));
                            
                                echo $this->Form->input('appliances_window_blinds', array('div' => array('class' => 'fm_mem inline input col-xs-3 left'), 'label' => 'Window Blinds', 'type' => 'checkbox', 'class' => 'fm_checkappliances', 'checked' => $autofill_appliances['appliances_window_blinds'], 'onclick' => 'disable_maintenance(\'WindowBlinds\');'));
                                
                                echo '<p class="col-xs-12 left" style="padding-bottom:10px">Other:</p>';
                                echo $this->Form->input('appliances_other_desc', array(
                                    'div' => array('class' => 'fm_input fm_text col-xs-12 inline left'),
                                    'class' => 'input col-xs-12 center date',
                                    'after' => '<span class="left">(Please separate each item with a semi-colon)</span>',
                                    'label' => false,
                                    'type' => 'text',
                                    'value' => $autofill_appliances['appliances_other_desc'])
                                );
                                echo $this->Form->input('autofill_appliances', array(
                                    'div' => array('class' => 'fm_mem col-xs-12 center right'),
                                    'class' => 'fm_check',
                                    'label' => 'Remember this information',
                                    'type' => 'checkbox',
                                    'checked' => $autofill_appliances['autofill_appliances']
                                ));
                            ?>
                        </div>
                    </div>
                    <?php if ($lease_type != 'short') { ?>
                    <div class="info_wrap lrg col-xs-12 center inline left">
                        <h3>Property Maintenance and Repair:</h3>
                        <p>Maintenance Items and Repairs that are Tenant's Responsibility and Expense.</p>
                        <div class="col-xs-12 center left push-t">
                            <?php                                
                                echo $this->Form->input('maintenance_ac_filters', array(
                                    'div' => array('class' => 'fm_mem inline input col-xs-3 left'),
                                    'class' => 'fm_check',
                                    'label' => 'A/C Filters',
                                    'type' => 'checkbox',
                                    'checked' => $autofill_maintenance['maintenance_ac_filters']
                                ));
                                echo $this->Form->input('maintenance_drain_lines', array(
                                    'div' => array('class' => 'fm_mem inline input col-xs-3 left'),
                                    'class' => 'fm_check',
                                    'label' => 'All Drain Lines',
                                    'type' => 'checkbox',
                                    'checked' => $autofill_maintenance['maintenance_drain_lines']
                                ));
                                echo $this->Form->input('maintenance_ceiling_fans', array(
                                    'div' => array('class' => 'fm_mem inline input col-xs-3 left'),
                                    'class' => 'fm_check maintenance',
                                    'label' => 'Ceiling Fans',
                                    'type' => 'checkbox',
                                    'checked' => $autofill_maintenance['maintenance_ceiling_fans'], 		'onclick' => 'disable_appliances(\'CeilingFans\');'
                                ));
                                echo $this->Form->input('maintenance_dishwasher', array(
                                    'div' => array('class' => 'fm_mem inline input col-xs-3 left'),
                                    'class' => 'fm_check maintenance',
                                    'label' => 'Dishwasher',
                                    'type' => 'checkbox',
                                    'checked' => $autofill_maintenance['maintenance_dishwasher'], 			'onclick' => 'disable_appliances(\'Dishwasher\');'
                                ));
                                echo $this->Form->input('maintenance_dryer', array(
                                    'div' => array('class' => 'fm_mem inline input col-xs-3 left'),
                                    'class' => 'fm_check maintenance',
                                    'label' => 'Dryer', 												'type' => 'checkbox',
                                    'checked' => $autofill_maintenance['maintenance_dryer'], 				'onclick' => 'disable_appliances(\'Dryer\');'
                                ));
                                echo $this->Form->input('maintenance_garbage_disposal', array(
                                    'div' => array('class' => 'fm_mem inline input col-xs-3 left'),
                                    'class' => 'fm_check maintenance',
                                    'label' => 'Garbage Disposal',
                                    'type' => 'checkbox',
                                    'checked' => $autofill_maintenance['maintenance_garbage_disposal'],
                                    'onclick' => 'disable_appliances(\'GarbageDisposal\');'
                                ));
                                echo $this->Form->input('maintenance_irrigation', array(
                                    'div' => array('class' => 'fm_mem inline input col-xs-3 left'),
                                    'class' => 'fm_check maintenance',
                                    'label' => 'Irrigation/Sprinkler System',
                                    'type' => 'checkbox',
                                    'checked' => $autofill_maintenance['maintenance_irrigation'],
                                    'onclick' => 'disable_appliances(\'Irrigation\');'
                                ));
                                echo $this->Form->input('maintenance_light_bulbs', array(
                                    'div' => array('class' => 'fm_mem inline input col-xs-3 left'),
                                    'class' => 'fm_check',
                                    'label' => 'Light Bulbs',
                                    'type' => 'checkbox',
                                    'checked' => $autofill_maintenance['maintenance_light_bulbs']
                                ));
                                echo $this->Form->input('maintenance_locks', array(
                                    'div' => array('class' => 'fm_mem inline input col-xs-3 left'),
                                    'class' => 'fm_check',
                                    'label' => 'Locks and Keys',
                                    'type' => 'checkbox',
                                    'checked' => $autofill_maintenance['maintenance_locks']
                                ));
                                echo $this->Form->input('maintenance_microwave', array(
                                    'div' => array('class' => 'fm_mem inline input col-xs-3 left'),
                                    'class' => 'fm_check maintenance',
                                    'label' => 'Microwave',
                                    'type' => 'checkbox',
                                    'checked' => $autofill_maintenance['maintenance_microwave'],
                                    'onclick' => 'disable_appliances(\'Microwave\');'
                                ));
                                echo $this->Form->input('maintenance_oven', array(
                                    'div' => array('class' => 'fm_mem inline input col-xs-3 left'),
                                    'class' => 'fm_check maintenance',
                                    'label' => 'Oven', 													'type' => 'checkbox',
                                    'checked' => $autofill_maintenance['maintenance_oven'],
                                    'onclick' => 'disable_appliances(\'Oven\');'
                                ));
                                echo $this->Form->input('maintenance_range', array(
                                    'div' => array('class' => 'fm_mem inline input col-xs-3 left'),
                                    'class' => 'fm_check maintenance',
                                    'label' => 'Range', 												'type' => 'checkbox',
                                    'checked' => $autofill_maintenance['maintenance_range'],
                                    'onclick' => 'disable_appliances(\'Range\');'
                                ));
                                echo $this->Form->input('maintenance_refrigerator', array(
                                    'div' => array('class' => 'fm_mem inline input col-xs-3 left'),
                                    'class' => 'fm_check maintenance',
                                    'label' => 'Refrigerator',
                                    'type' => 'checkbox',
                                    'checked' => $autofill_maintenance['maintenance_refrigerator'],
                                    'onclick' => 'disable_appliances(\'Refrigerator\');'
                                ));
                                echo $this->Form->input('maintenance_refrigerator_ice_maker', array(
                                    'div' => array('class' => 'fm_mem inline input col-xs-3 left'),
                                    'class' => 'fm_check',
                                    'label' => 'Refrigerator Ice Maker',
                                    'type' => 'checkbox',
                                    'checked' => $autofill_maintenance['maintenance_refrigerator_ice_maker']
                                ));
                                echo $this->Form->input('maintenance_refrigerator_dispenser', array(
                                    'div' => array('class' => 'fm_mem inline input col-xs-3 left'),
                                    'class' => 'fm_checke',
                                    'label' => 'Refrigerator Water Dispenser', 
                                    'type' => 'checkbox',
                                    'checked' => $autofill_maintenance['maintenance_refrigerator_dispenser']
                                ));
                                echo $this->Form->input('maintenance_refrigerator_filter', array(
                                    'div' => array('class' => 'fm_mem inline input col-xs-3 left'),
                                    'class' => 'fm_check',
                                    'label' => 'Refrigerator Water Filter',
                                    'type' => 'checkbox',
                                    'checked' => $autofill_maintenance['maintenance_refrigerator_filter']
                                ));
                                echo $this->Form->input('maintenance_smoke_detector', array(
                                    'div' => array('class' => 'fm_mem inline input col-xs-3 left'),
                                    'class' => 'fm_check',
                                    'label' => 'Smoke Detector Batteries',
                                    'type' => 'checkbox',
                                    'checked' => $autofill_maintenance['maintenance_smoke_detector']
                                ));
                                echo $this->Form->input('maintenance_washer', array(
                                    'div' => array('class' => 'fm_mem inline input col-xs-3 left'),
                                    'class' => 'fm_check maintenance',
                                    'label' => 'Washer',
                                    'type' => 'checkbox',
                                    'checked' => $autofill_maintenance['maintenance_washer'],
                                    'onclick' => 'disable_appliances(\'Washer\');'
                                ));
                                echo $this->Form->input('maintenance_water_conditioner', array(
                                    'div' => array('class' => 'fm_mem inline input col-xs-3 left'),
                                    'class' => 'fm_check maintenance',
                                    'label' => 'Water Softener',
                                    'type' => 'checkbox',
                                    'checked' => $autofill_maintenance['maintenance_water_conditioner'],
                                    'onclick' => 'disable_appliances(\'WaterConditioner\');'
                                ));
                                echo $this->Form->input('maintenance_water_filter', array(
                                    'div' => array('class' => 'fm_mem inline input col-xs-3 left'),
                                    'class' => 'fm_check',
                                    'label' => 'Water Filter',
                                    'type' => 'checkbox',
                                    'checked' => $autofill_maintenance['maintenance_water_filter']
                                ));
                                echo $this->Form->input('maintenance_water_heater', array(
                                    'div' => array('class' => 'fm_mem inline input col-xs-3 left'),
                                    'class' => 'fm_check maintenance',
                                    'label' => 'Water Heater',
                                    'type' => 'checkbox',
                                    'checked' => $autofill_maintenance['maintenance_water_heater'],
                                    'onclick' => 'disable_appliances(\'WaterHeater\');'
                                ));
                                echo $this->Form->input('maintenance_window_blinds', array(
                                    'div' => array('class' => 'fm_mem inline input col-xs-3 left'),
                                    'class' => 'fm_check maintenance',
                                    'label' => 'Window Blinds',
                                    'type' => 'checkbox', 
                                    'checked' => $autofill_maintenance['maintenance_window_blinds'],
                                    'onclick' => 'disable_appliances(\'WindowBlinds\');'
                                ));
                                                      
                                if ($lease_type == 'single') echo $this->Form->input('maintenance_windows_screens', array(
                                    'div' => array('class' => 'fm_mem inline input col-xs-3 left'),
                                    'class' => 'fm_check maintenance',
                                    'label' => 'Windows &amp; Screens',
                                    'type' => 'checkbox',
                                    'checked' => $autofill_maintenance['maintenance_windows_screens']
                                ));
                                
                                echo '<p class="col-xs-12 left" style="padding-bottom:10px">Other:</p>';
                                echo $this->Form->input('maintenance_other_desc', array(
                                    'div' => array('class' => 'fm_input fm_text col-xs-12 inline left'),
                                    'class' => 'input col-xs-12 center date',
                                    'after' => '<span class="left">Please separate each item with a semi-colon</span>',
                                    'label' => false,
                                    'type' => 'text',
                                    'value' => $autofill_appliances['maintenance_other_desc']
                                ));
    
                                echo $this->Form->input('autofill_maintenance', array(
                                    'div' => array('class' => 'fm_mem col-xs-12 center right'),
                                    'class' => 'fm_check',
                                    'label' => 'Remember this information',
                                    'type' => 'checkbox',
                                    'checked' => $autofill_maintenance['autofill_maintenance']
                                ));
                            ?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if ($lease_type != 'single') { ?>
                    <div class="info_wrap lrg col-xs-12 center inline left">
                        <h2>Grounds</h2>                        
                        <h3>Landscaping and Pool Maintenance:</h3>
                        <div class="col-xs-12 center inline push-t">
                                <?php                            
                                    echo '<p class="col-xs-8 left inline">If there is lawn or landscaping to maintain at the Property who is responsible?</p>';
                                    echo '<div class="fm_input fm_text col-xs-3 inline center right last">';
                                        $options = array(1 => 'Landlord', 0 => 'Tenant');
                                        $attributes = array(
                                            'class' => 'input center',
                                            'legend' => false,
                                            'default' => 0,
                                            'value' => $autofill_landscaping['lawn']
                                        );
                                        echo $this->Form->radio('lawn', $options, $attributes);
                                    echo '</div>';

                                    echo '<p class="col-xs-8 left inline">If there is lawn or landscaping at the Property who is responsible for irrigation / watering?</p>';
                                    echo '<div class="fm_input fm_text col-xs-3 inline center right last">';
                                        $options = array(1 => 'Landlord', 0 => 'Tenant');
                                        $attributes = array(
                                            'class' => 'input center',
                                            'legend' => false,
                                            'default' => 0,
                                            'value' => $autofill_landscaping['lawn_watering']
                                        );
                                        echo $this->Form->radio('lawn_watering', $options, $attributes);
                                    echo '</div>';

                                    echo '<p class="col-xs-8 left inline">Is there a pool or hot tub at the Property?</p>';
                                    echo '<div class="fm_input fm_text col-xs-3 inline center right last">';
                                        $options = array(1 => 'Landlord', 0 => 'Tenant');
                                        $attributes = array(
                                            'class' => 'input center',
                                            'legend' => false,
                                            'onclick' => 'showPoolMaintain();',
                                            'default' => 0,
                                            'value' => $autofill_landscaping['pool']
                                        );
                                        echo $this->Form->radio('pool', $options, $attributes);
                                    echo '</div>';

                                    echo $this->Form->input('pool_maintain_pay', array(
                                        'div' => array('class' => 'fm_mem col-xs-12 center right'),
                                        'class' => 'fm_check',
                                        'label' => 'Remember this information',
                                        'type' => 'checkbox',
                                        'checked' => $autofill_landscaping['pool_maintain_pay']
                                    ));
                                ?>
                            </div>
                        <div class="col-xs-12 center inline push-t">
                                <?php    
                                    echo '<p class="col-xs-8 left inline">Who will maintain the pool/hot tub?</p>';
                                    echo '<div class="fm_input fm_text col-xs-3 inline center right last">';
                                        $options = array(1 => 'Professional Pool Company', 2 => 'Landlord', 3 => 'Tenant');
                                        $attributes = array(
                                            'class' => 'input center',
                                            'legend' => false,
                                            'default' => 3,
                                            'onclick' => 'showPoolMaintainPay();',
                                            'value' => $autofill_landscaping['pool_maintain']
                                        );
                                        echo $this->Form->radio('pool_maintain', $options, $attributes);
                                    echo '</div>';
    
                                    echo '<p class="col-xs-8 left inline">Who will pay for the professional pool company?</p>';
                                    echo '<div class="fm_input fm_text col-xs-3 inline center right last">';
                                        $options = array(1 => 'Landlord', 0 => 'Tenant');
                                        $attributes = array(
                                            'class' => 'input center',
                                            'legend' => false,
                                            'default' => 0,
                                            'value' => $autofill_landscaping['pool_maintain_pay']
                                        );
                                        echo $this->Form->radio('pool_maintain_pay', $options, $attributes);
                                    echo '</div>';
    
                                    echo '<p class="col-xs-8 left inline">Who will pay for the repair or replacement of pool components such as filters and heating system parts?</p>';
                                    echo '<div class="fm_input fm_text col-xs-3 inline center right last">';
                                        $options = array(1 => 'Landlord', 0 => 'Tenant');
                                        $attributes = array(
                                            'class' => 'input center',
                                            'legend' => false,
                                            'default' => 0,
                                            'value' => $autofill_landscaping['pool_repair']
                                        );
                                        echo $this->Form->radio('pool_repair', $options, $attributes);
                                    echo '</div>';
                                    echo $this->Form->input('autofill_landscaping', array(
                                        'div' => array('class' => 'fm_mem col-xs-12 center right'),
                                        'class' => 'fm_check',
                                        'label' => 'Remember this information',
                                        'type' => 'checkbox',
                                        'checked' => $autofill_maintenance['autofill_landscaping']
                                    ));
                                ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                
                <!--Utilites-->
                <div id="fm7" class="tab fld chk-fld col-xs-10 center">                    
                    <div class="info_wrap lrg col-xs-12 center inline left">
                        <h2>Utilites</h2>
                        <?php if ($lease_type != 'short') { ?>
                        <div class="lrg col-xs-12 center inline left">
                             <?php                       
                                echo '<p class="col-xs-8 left inline">Is Landlord responsible to provide and pay for any utilities?</p>';
                                echo '<div class="fm_input fm_text inline center right last">';
                                    $options = array(1 => 'Yes', 0 => 'No');
                                    $attributes = array(
                                        'class' => 'input center',
                                        'legend' => false,
                                        'default' => 0,
                                        'onclick' => 'showUtilities();',
                                        'value' => $autofill_landscaping['utilities']
                                    );
                                    echo $this->Form->radio('utilities', $options, $attributes);
                               echo '</div>';
                            } else {
                                echo '<p class="col-xs-8 left inline">What utilities does the Landlord provide?</p>';
                            }    
                            echo '<div id="utilities-wrapper" class="col-xs-12 left inline">';
                                echo $this->Form->input('utilities_cable', array('div' => array('class' => 'fm_mem inline input col-xs-3 left'), 'class' => 'fm_check', 'label' => 'Basic Cable', 'type' => 'checkbox', 'checked' => $autofill_utilities['utilities_cable']));
                                echo $this->Form->input('utilities_electricity', array('div' => array('class' => 'fm_mem inline input col-xs-3 left'), 'class' => 'fm_check', 'label' => 'Electricity', 'type' => 'checkbox', 'checked' => $autofill_utilities['utilities_electricity']));
                                echo $this->Form->input('utilities_garbage', array('div' => array('class' => 'fm_mem inline input col-xs-3 left'), 'class' => 'fm_check', 'label' => 'Garbage', 'type' => 'checkbox', 'checked' => $autofill_utilities['utilities_garbage']));
                                echo $this->Form->input('utilities_gas', array('div' => array('class' => 'fm_mem inline input col-xs-3 left'), 'class' => 'fm_check', 'label' => 'Gas', 'type' => 'checkbox', 'checked' => $autofill_utilities['utilities_gas']));
                                echo $this->Form->input('utilities_internet', array('div' => array('class' => 'fm_mem inline input col-xs-3 left'), 'class' => 'fm_check', 'label' => 'Internet', 'type' => 'checkbox', 'checked' => $autofill_utilities['utilities_internet']));
                                echo $this->Form->input('utilities_reclaimed_water', array('div' => array('class' => 'fm_mem inline input col-xs-3 left'), 'class' => 'fm_check', 'label' => 'Reclaimed Water', 'type' => 'checkbox', 'checked' => $autofill_utilities['utilities_reclaimed_water']));
                                echo $this->Form->input('utilities_recycling_pickup', array('div' => array('class' => 'fm_mem inline input col-xs-3 left'), 'class' => 'fm_check', 'label' => 'Recycling Pickup', 'type' => 'checkbox', 'checked' => $autofill_utilities['utilities_recycling_pickup']));
                                echo $this->Form->input('utilities_satellite', array('div' => array('class' => 'fm_mem inline input col-xs-3 left'), 'class' => 'fm_check', 'label' => 'Satellite', 'type' => 'checkbox', 'checked' => $autofill_utilities['utilities_satellite']));
                                echo $this->Form->input('utilities_sewer', array('div' => array('class' => 'fm_mem inline input col-xs-3 left'), 'class' => 'fm_check', 'label' => 'Sewer', 'type' => 'checkbox', 'checked' => $autofill_utilities['utilities_sewer']));
                                echo $this->Form->input('utilities_trash_pickup', array('div' => array('class' => 'fm_mem inline input col-xs-3 left'), 'class' => 'fm_check', 'label' => 'Trash Pickup', 'type' => 'checkbox', 'checked' => $autofill_utilities['utilities_trash_pickup']));
                                echo $this->Form->input('utilities_water', array('div' => array('class' => 'fm_mem inline input col-xs-3 left'), 'class' => 'fm_check', 'label' => 'Water', 'type' => 'checkbox', 'checked' => $autofill_utilities['utilities_water']));                            

                                echo '<p class="col-xs-12 left" style="padding-bottom:10px">Other:</p>';
                                echo $this->Form->input('utilities_other_desc', array(
                                    'div' => array('class' => 'fm_input fm_text col-xs-12 inline left'),
                                    'class' => 'input col-xs-12 center date',
                                    'after' => '<span class="left">Please separate each item with a semi-colon</span>',
                                    'label' => false,
                                    'type' => 'text',
                                    'value' => $autofill_appliances['utilities_other_desc']
                                ));

                                echo $this->Form->input('autofill_utilities', array(
                                    'div' => array('class' => 'fm_mem col-xs-12 center right'),
                                    'class' => 'fm_check',
                                    'label' => 'Remember this information',
                                    'type' => 'checkbox',
                                    'checked' => $autofill_utilities['autofill_utilities']
                                ));
                            echo '</div>';
                         ?>
                       </div>
                    </div>
                    <div class="info_wrap lrg col-xs-12 center inline left">    
                        <?php if ($lease_type == 'single' || $lease_type == 'short') { ?>
                        <h2 class="push-t">Vehicles</h2>
                        <div class="lrg col-xs-12 center inline left">
                            <?php
                                echo '<p class="col-xs-8 left inline">What vehicles are permitted on the property?</p>';
                                echo '<span class="col-xs-8 left">E.g.: Automobiles, motorcycles, trailers, campers, boats, recreational vehicles, four-wheelers, dirt-bikes, go-carts, golf carts, etc.</span>'; 
                                echo '<div class="fm_input fm_text inline center right last">';
                                    $options = array(0 => 'Do not specify particular vehicles', 1 => 'The following specific vehicles:');
                                    $attributes = array(
                                        'class' => 'input center',
                                        'legend' => false,
                                        'default' => 0,
                                        'onclick' => 'showVehicles()'
                                    );
                                    echo $this->Form->radio('vehicles_permitted', $options, $attributes);
                                echo '</div>'; 
                            ?>
                        </div>
                        <div id="vehicle-wrapper" class="lrg col-xs-12 center inline left">
                            <?php
                                echo '<p class="col-xs-7 left inline">How Many Vehicles will be on the property?</p>';
                                echo $this->Form->input('how_many_vehicles', array(
                                    'div' => array('class' => 'fm_input fm_text col-xs-2 inline right last'),
                                    'class' => 'input col-xs-12 center',
                                    'label' => false,
                                    'options' => $how_many_vehicles,
                                    'onchange' => 'addVehicles(this.value)',
                                    'required' => false
                                ));    
                                echo '<table id="vehicle-table" class="table col-xs-12 left>';
                                    for ($i=0; $i<10; $i++) {
                                        echo '<tr id="vehicleRow' . $i . '" class="vehicleRow">';
                                            echo '<td>' . $this->Form->input('Vehicle.' . $i . '.type', [
                                                    'div' => array('class' => 'fm_input fm_text col-xs-12 inline left'),
                                                    'class' => 'input col-xs-12 center',
                                                    'placeholder' => 'Type of Vehicle',
                                                    'after' => 'Type of Vehicle',
                                                    'label' => false,
                                                    'required' => true
                                                ]) . '</td>';
                                            echo '<td>' . $this->Form->input('Vehicle.' . $i . '.make', [
                                                    'div' => array('class' => 'fm_input fm_text col-xs-12 inline left'),
                                                    'class' => 'input col-xs-12 center',
                                                    'placeholder' => 'Make',
                                                    'after' => 'Make',
                                                    'label' => false,
                                                    'required' => true
                                                ]) . '</td>';
                                            echo '<td>' . $this->Form->input('Vehicle.' . $i . '.model', [
                                                    'div' => array('class' => 'fm_input fm_text col-xs-12 inline left'),
                                                    'class' => 'input col-xs-12 center',
                                                    'placeholder' => 'Model',
                                                    'after' => 'Model',
                                                    'label' => false,
                                                    'required' => true
                                                ]) . '</td>';
                                            echo '<td>' . $this->Form->input('Vehicle.' . $i . '.color', [
                                                    'div' => array('class' => 'fm_input fm_text col-xs-12 inline left'),
                                                    'class' => 'input col-xs-12 center',
                                                    'placeholder' => 'Color',
                                                    'after' => 'Color',
                                                    'label' => false,
                                                    'required' => true
                                                ]) . '</td>';
                                            echo '<td>' . $this->Form->input('Vehicle.' . $i . '.license', [
                                                    'div' => array('class' => 'fm_input fm_text col-xs-12 inline left'),
                                                    'class' => 'input col-xs-12 center',
                                                    'placeholder' => 'License Plate No.',
                                                    'after' => 'License Plate No.',
                                                    'label' => false,
                                                    'required' => true
                                                ]) . '</td>';
                                            echo '<td><a href="#" onclick="removeVehicle(' . numOfVehicles . ');return false;"><img src="/img/icon_trash.png" /></a></td>';
                                        echo '</tr>';
                                    }
                                echo '</table>';
                            ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            
                <!--Provisions-->
                <div id="fm8" class="tab fld col-xs-10 center">                    
                    <div class="info_wrap lrg col-xs-12 center inline left">
                        <h2>Additional Provisions</h2>
                        <div class="lrg col-xs-12 center inline left">
                            <?php                            
                                echo '<p class="col-xs-10 left inline">Is smoking permitted inside the property?</p>';
                                echo '<div class="fm_input fm_text inline center right last">';
                                    $options = array(1 => 'Yes', 0 => 'No');
                                    $attributes = array(
                                        'class' => 'input center',
                                        'legend' => false,
                                        'default' => 0,
                                        $autofill_provisions['smoking_inside']
                                    );
                                    echo $this->Form->radio('smoking_inside', $options, $attributes);
                                echo '</div>';
                            ?>                            
                        </div>
                        <div class="lrg col-xs-12 center inline left">
                                <?php
                                    echo '<p class="col-xs-10 left inline">Is smoking permitted on the porches, patios and balconies?</p>';
                                    echo '<div class="fm_input fm_text inline center right last">';
                                        $options = array(1 => 'Yes', 0 => 'No');
                                        $attributes = array(
                                            'class' => 'input center',
                                            'legend' => false,
                                            'default' => 0,
                                            $autofill_provisions['smoking_outside']
                                        );
                                        echo $this->Form->radio('smoking_outside', $options, $attributes);
                                    echo '</div>';
                                ?>
                            </div>
                        <?php if ($lease_type == 'single' || $lease_type == 'short') { ?>
                        <div class="lrg col-xs-12 center inline left">
                            <?php    
                            echo '<p class="col-xs-10 left inline">Commission Paid to Broker on Sale of Property?</p>';
                            echo '<div class="fm_input fm_text inline center right last">';
                                $options = array(1 => 'Yes', 0 => 'No');
                                $attributes = array(
                                    'class' => 'input center',
                                    'legend' => false,
                                    'default' => 0,
                                    'onclick' => 'showCommission();',
                                    $autofill_provisions['sales_commission_paid']
                                );
                                echo $this->Form->radio('sales_commission_paid', $options, $attributes);
                            echo '</div>';    
                            echo '<div id="commission-wrapper" class="col-xs-12 left inline push-b">';    
                                echo $this->Form->input('sales_commission', [
                                    'div' => array('id' => 'divRentLateFee', 'class' => 'fm_input fm_text col-xs-2 inline left'),
                                    'class' => 'input col-xs-12 center currency',
                                    'placeholder' => 'Commission %',
                                    'after' => 'Commission %',
                                    'onkeypress' => 'return isNumber(event)',
                                    'value' => $autofill_provisions['sales_commission'],
                                    'label' => false,
                                    'required' => false
                                ]);
                                echo $this->Form->input('sales_commission_paid_to', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-4 inline left'),
                                    'class' => 'input col-xs-12 center currency',
                                    'placeholder' => 'Who will be paid the commission?',
                                    'after' => 'Who will be paid the commission?',
                                    'value' => $autofill_provisions['sales_commission_paid_to'],
                                    'label' => false,
                                    'required' => false
                                ]);
                            echo '</div>';
                            ?>
                        </div>
                        <?php }
                        if ($lease_type == 'single') { ?>  
                        <div class="lrg col-xs-12 center inline left">
                            <?php                            
                                echo '<p class="col-xs-8 left inline">Can the Lease be terminated by the Landlord if the Property is sold?  If yes, then with how many days notice to Tenant?</p>';
                                echo '<div class="fm_input fm_text inline center right last">';
                                    $options = array(1 => 'Yes ' . $this->Form->input('lease_termination_days', array('label' => false, 'options' => $lease_termination_options, 'required' => false, 'value' => $autofill_provisions['lease_termination_days'], 'div' => array('id' => 'divLeaseTerminationDays', 'class' => 'min_charge inline right'))), 0 => 'No');
                                    $attributes = array(
                                        'class' => 'input center',
                                        'legend' => false,
                                        'default' => 0,
                                        'onclick' => 'showLeaseTermination();',
                                        'value' => $autofill_provisions['lease_termination']
                                    );
                                    echo $this->Form->radio('lease_termination', $options, $attributes);
                                echo '</div>';
                                echo $this->Form->input('autofill_provisions', array(
                                    'div' => array('class' => 'fm_mem col-xs-12 center right push-t'),
                                    'class' => 'fm_check',
                                    'label' => 'Remember this information',
                                    'type' => 'checkbox',
                                    'checked' => $autofill_provisions['autofill_provisions']
                                ));
                            ?>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="info_wrap lrg col-xs-12 center inline left">
                        <h2>Custom Provisions</h2>
                        <h3>Need a custom lease provision?</h3>
                        <p class="left">List each provision separately. All custom provisions will be reviewed and edited if necessary.</p>
                        <div class="lrg col-xs-12 center inline left">
                            <div id="div-provisions" class="col-xs-12 left">
                                    <?php
                                    /*if (isset($autofill_custom_provisions['Provisions'])) {
                                        $i=0;
                                        foreach ($autofill_custom_provisions['Provisions'] as $provision) { */
                                            echo '<div id="div-provision' . $i . '" class="div-provision push-t">';
                                            echo ' <input type="hidden" name="data[Provision][' . $i . '][id]" id="Provision' . $i . 'id" value="' . $provision['id'] . '" />';
                                            echo ' <span id="provision-number' . $i . '" class="provision-number"><p>';
                                            echo '<strong>Provision Number: </strong>', $i+1;
                                            echo '</p></span>';

                                            echo $this->Form->input('message', [
                                                'div' => array('class' => 'fm_input fm_text col-xs-12 left lrg-msg last push-t'),
                                                'id' => 'Provision' . $i . 'Description',
                                                'class' => 'input col-xs-12 center',
                                                'type' => 'textarea',
                                                'name' => 'data[Provision][' . $i . '][description]',
                                                'options' => $provision['description'],
                                                'placeholder' =>  'Message',
                                                'label' => false
                                            ]);

                                            echo '<div class="provision-icons">';
                                            echo '<div style="float:left;"><a href="#" onclick="removeProvision(' . $i . ');return false;" alt="Remove this Custom Provision" title="Remove this Custom Provision"><img src="/img/icon_trash.png" /></a></div>';
                                
                                            echo '<div id="provision-actions' . $i . '" style="float:left;display:none;"><input type="radio" name="data[Provision][' . $i . '][option]" id="Provision' . $i . 'Option0" value="overwrite" />Modify original provision';

                                            echo '<input type="radio" name="data[Provision][' . $i . '][option]" id="Provision' . $i . 'Option1" value="save" />Save as new provision';
                                            echo '<input type="radio" name="data[Provision][' . $i . '][option]" id="Provision' . $i . 'Option2" value="ignore" checked />Use for this lease only</div>';

                                            echo '</div>';
                                            echo '</div>';
                                            /*$i++;
                                         } 
                                    }*/
                                    ?>
                                </div> 
                            <div id="openProvisionsList" class="if_box col-xs-2 center inline left" onclick="return false;">
                                <p class="inline">Open Provisions List</p>
                                <i class="if_icon inline right fas fa-plus"></i>                                
                            </div>
                            <?php
                                echo $this->Form->input('autofill_custom_provisions', array(
                                    'div' => array('class' => 'fm_mem col-xs-12 center right'),
                                    'class' => 'fm_check',
                                    'label' => 'Remember this information',
                                    'type' => 'checkbox',
                                    'checked' => $autofill_custom_provisions['autofill_custom_provisions']
                                ));
                            ?>
                        </div>
                    </div>
                </div>
                
                <!--Addendum-->
                <div id="fmf" class="tab fld col-xs-10 center">                    
                    <div class="info_wrap lrg col-xs-12 center inline left">
                        <h2 class="push-b">Lease Addendum</h2>
                        <div class="lrg col-xs-12 center inline left">
                            <?php
                                echo '<p class="col-xs-8 left inline">Was the property built before 1978?</p>';
                                echo '<div class="fm_input fm_text inline center right last">';
                                    $options = array(1 => 'Yes', 0 => 'No');
                                    $attributes = array(
                                        'class' => 'input center',
                                        'legend' => false,
                                        'default' => 0,
                                            'value' => $autofill_addendums['lead_paint']
                                         );
                                    echo $this->Form->radio('prior_1979', $options, $attributes);
                                echo '</div>';
                            ?>
                        </div>
                        <div class="lrg col-xs-12 center inline left">
                            <?php
                                echo '<p class="col-xs-8 left inline">Does the tenant have a Pet?</p>';
                                echo '<div class="fm_input fm_text inline center right last">';
                                    $options = array(1 => 'Yes', 0 => 'No');
                                    $attributes = array(
                                        'class' => 'input center',
                                        'legend' => false,
                                        'default' => 0,
                                        'onclick' => 'showPet();'
                                    );
                                    echo $this->Form->radio('pet', $options, $attributes);
                                echo '</div>';
                            ?>
                        </div>
                        <div id="pet-wrapper" class="lrg col-xs-12 center inline left">
                            <?php                         
                                echo $this->Form->input('how_many_pets', [
                                        'div' => array('class' => 'fm_input fm_text col-xs-2 left'),
                                        'id' => 'rentDueDate',
                                        'class' => 'input col-xs-12 center',
                                        'empty' => 'How Many Pets?',
                                        'after' => 'How Many Pets?',
                                        'options' => $how_many_pets,
                                        'label' => false,
                                        'required' => false,
                                        'onchange' => 'addPets(this.value)'
                                    ]);
                                echo $this->Form->input('monthly_pet_fee', [
                                        'div' => array('class' => 'fm_input fm_text col-xs-3 center inline left'),
                                        'class' => 'input col-xs-4 center inline right',
                                        'type' => 'text',
                                        'before' =>  '<p class="col-xs-7 left inline">Monthly Pet Fee</p>',
                                        'label' => false,
                                        'onkeypress' => 'return isNumber(event)'
                                    ]);
                                echo $this->Form->input('pet_fee', [
                                        'div' => array('class' => 'fm_input fm_text col-xs-3 center inline left'),
                                        'class' => 'input col-xs-4 center inline right',
                                        'type' => 'text',
                                        'before' =>  '<p class="col-xs-7 left inline">Non-Refundable Fee</p>',
                                        'label' => false,
                                        'onkeypress' => 'return isNumber(event)'
                                    ]);
                                echo $this->Form->input('pet_deposit', [
                                        'div' => array('class' => 'fm_input fm_text col-xs-3 center inline left last'),
                                        'class' => 'input col-xs-4 inline center right',
                                        'type' => 'text',
                                        'before' =>  '<p class="col-xs-7 left inline">Additional Deposit</p>',
                                        'label' => false,
                                        'onkeypress' => 'return isNumber(event)'
                                    ]);
                                echo '<table id="pet-table" class="table col-xs-12 left">';
                                    for ($i=0; $i<10; $i++) {
                                        echo '<tr id="petRow' . $i . '" class="petRow">';
                                            echo '<td>' . $this->Form->input('Pet.' . $i . '.type', [
                                                    'div' => array('class' => 'fm_input fm_text col-xs-12 inline left'),
                                                    'class' => 'input col-xs-12 center',
                                                    'placeholder' => 'Type',
                                                    'after' => 'Type',
                                                    'label' => false
                                                ]) . '</td>';
                                            echo '<td>' . $this->Form->input('Pet.' . $i . '.breed', [
                                                    'div' => array('class' => 'fm_input fm_text col-xs-12 inline left'),
                                                    'class' => 'input col-xs-12 center',
                                                    'placeholder' => 'Breed',
                                                    'after' => 'Breed',
                                                    'label' => false
                                                ]) . '</td>';
                                            echo '<td>' . $this->Form->input('Pet.' . $i . '.color', [
                                                    'div' => array('class' => 'fm_input fm_text col-xs-12 inline left'),
                                                    'class' => 'input col-xs-12 center',
                                                    'placeholder' => 'Color',
                                                    'after' => 'Color',
                                                    'label' => false
                                                ]) . '</td>';
                                            echo '<td>' . $this->Form->input('Pet.' . $i . '.weight', [
                                                    'div' => array('class' => 'fm_input fm_text col-xs-12 inline left'),
                                                    'class' => 'input col-xs-12 center',
                                                    'placeholder' => 'Weight',
                                                    'after' => 'Weight',
                                                    'label' => false
                                                ]) . '</td>';
                                            echo '<td>' . $this->Form->input('Pet.' . $i . '.name', [
                                                    'div' => array('class' => 'fm_input fm_text col-xs-12 inline left last'),
                                                    'class' => 'input col-xs-12 center',
                                                    'placeholder' => 'Name',
                                                    'after' => 'Name',
                                                    'label' => false
                                                ]) . '</td>';
                                        echo '</tr>';
                                    }
                                echo '	</table>';
                            ?>                        
                    </div>
                        <div class="lrg col-xs-12 center inline left">
                            <?php
                                echo '<p class="col-xs-8 left inline">Is there a Personal Guarantee?</p>';
                                echo '<div class="fm_input fm_text inline center right last">';
                                    $options = array(1 => 'Yes', 0 => 'No');
                                    $attributes = array(
                                        'class' => 'input center',
                                        'legend' => false,
                                        'default' => 0,
                                        'onclick' => 'showPersonalGuaranty();',
                                        'value' => $autofill_addendums['personal_guaranty']
                                    );
                                    echo $this->Form->radio('personal_guaranty', $options, $attributes);
                                echo '</div>';
                            ?>
                        </div>
                        <div id="guaranty-wrapper" class="lrg col-xs-12 center inline left">
                            <?php
                                echo '<p class="col-xs-8 left inline">How many Guarantors?</p>';
                                echo $this->Form->input('how_many_guarantors', array(
                                    'div' => array('class' => 'fm_input fm_text col-xs-3 inline right last'),
                                    'class' => 'input col-xs-12 center',
                                    'label' => false,
                                    'options' => $how_many_guarantors,
                                    'required' => false,
                                    'value' => $autofill_addendums['how_many_guarantors']
                               ));
                            ?>
                        </div>
                        <div class="lrg col-xs-12 center inline left">
                            <?php
                                echo '<p class="col-xs-8 left inline">Is this a waterfront property? E.g. ocean/river/pond/canal</p>';
                                echo '<div class="fm_input fm_text inline center right last">';
                                    $options = array(1 => 'Yes', 0 => 'No');
                                    $attributes = array(
                                        'class' => 'input center',
                                        'legend' => false,
                                        'default' => 0,
                                        'onclick' => 'showPersonalGuaranty();',
                                        'value' => $autofill_addendums['waterfront']
                                    );
                                    echo $this->Form->radio('waterfront', $options, $attributes);
                                echo '</div>';
                            ?>
                        </div>
                        <?php if ($lease_type == 'single' || $lease_type == 'short') { ?>
                        <div class="lrg col-xs-12 center inline left">
                            <?php
                                echo '<p class="col-xs-8 left inline">Allow Tenant Option for Early Lease Termination?</p>';
                                echo '<div class="fm_input fm_text inline center right last">';
                                    $options = array(1 => 'Yes', 0 => 'No');
                                    $attributes = array(
                                        'class' => 'input center',
                                        'legend' => false,
                                        'default' => 0,
                                        'onclick' => 'showEarlyTerminationFee();',
                                        'value' => $autofill_addendums['early_termination']
                                    );
                                    echo $this->Form->radio('early_termination', $options, $attributes);
                                echo '</div>';
                            ?>
                        </div>
                        <div id="early-termination-wrapper" class="lrg col-xs-12 center inline left">
                            <?php
                                echo '<p class="col-xs-8 left inline">Lease Termination Fee</p>';
                                echo $this->Form->input('early_termination_fee', array(
                                    'div' => array('class' => 'fm_input fm_text col-xs-3 inline right last'),
                                    'class' => 'input col-xs-12 center currency',
                                    'label' => false,
                                    'after' => '<span>Cannot exceed 2 x monthly rent</span>',
                                    'options' => $notice_non_renewal_options,
                                    'required' => false,
                                    'value' => $autofill_addendums['early_termination_fee'],
                                    'onkeypress' => 'return isNumber(event)'
                                ));
                            ?>
                        </div>
                        <?php } ?>
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
            
            <div id="divPopupNotification">
                <div class="ui-dialog-titlebar"><span class="ui-dialog-title">Notification</span></div>
              <div class="inner_bg">
                    <div class="inner_padding">
                        <div class="message_success"></div>
                        <div class="message_error"></div>
                    </div>
                </div>
            </div>

            <div id="divPopupPropertyAddressBook" class="popupStyle2">
                <div class="ui-dialog-titlebar"><span class="ui-dialog-title">Property Address Book</span></div>
              <div class="inner_bg">
                <div class="inner_padding" style="height:510px;overflow:scroll;"></div>
                    <div class="left col-xs-6 inline center"><input class="btn-blue" type="submit" name="btnChoose" id="btnChooseProperty" value="Choose" style="width:143px;margin-left:5px;" /> </div>
                    <div class="right col-xs-6 inline center"><input class="btn-blue" type="button" name="btnCancel" id="btnCancelProperty" value="Cancel" style="width:143px;" /></div>
                </div>
            </div>

            <div id="divPopupAddressBook" class="popupStyle2">
                <div class="ui-dialog-titlebar"><span class="ui-dialog-title">Address Book</span></div>
              <div class="inner_bg">
                <div class="inner_padding" style="height:510px;overflow:scroll;"></div>
                    <div class="left col-xs-6 inline center"><input class="btn-blue" type="submit" name="btnChoose" id="btnChoose" value="Choose" style="width:143px;margin-left:5px;" /> </div>
                    <div class="right col-xs-6 inline center"><input class="btn-blue" type="button" name="btnCancel" id="btnCancel" value="Cancel" style="width:143px;" /></div>
                </div>
            </div>

            <div id="divPopupProvisionsList" class="popupStyle2">
                <div class="ui-dialog-titlebar"><span class="ui-dialog-title">Custom Provisions</span></div>
              <div class="inner_bg">
                <p style="padding:3px 0 0 3px;">Select to add/modify a custom provision</p>
                <table>
                    <tr>
                        <th style="width:45px;">Select</th>
                        <th>Provision</th>
                        <th style="width:45px;"></th>
                    </tr>
                </table>

                <div class="inner_padding" style="height:450px;overflow:scroll;"></div>
                    <div class="left col-xs-6 inline center"><input class="btn-blue" type="submit" name="btnChoose" id="btnChooseProvision" value="Select" style="width:143px;margin-left:5px;" /> </div>
                    <div class="right col-xs-6 inline center"><input class="btn-blue" type="button" name="btnCancel" id="btnCancelProvision" value="Cancel" style="width:143px;" /></div>
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
    
	function isCompany(row) {
			if (document.getElementById('Owner' + row + 'FirstName').value != '' || document.getElementById('Owner' + row + 'MiddleName').value != '' || document.getElementById('Owner' + row + 'LastName').value != '') {
			document.getElementById('Owner' + row + 'FirstName').disabled = false;
			document.getElementById('Owner' + row + 'MiddleName').disabled = false;
			document.getElementById('Owner' + row + 'LastName').disabled = false;
			document.getElementById('Owner' + row + 'CompanyName').disabled = true;
		} else if (document.getElementById('Owner' + row + 'CompanyName').value != '') {
			document.getElementById('Owner' + row + 'FirstName').disabled = true;
			document.getElementById('Owner' + row + 'MiddleName').disabled = true;
			document.getElementById('Owner' + row + 'LastName').disabled = true;
			document.getElementById('Owner' + row + 'CompanyName').disabled = false;
		} else {
			document.getElementById('Owner' + row + 'FirstName').disabled = false;
			document.getElementById('Owner' + row + 'MiddleName').disabled = false;
			document.getElementById('Owner' + row + 'LastName').disabled = false;
			document.getElementById('Owner' + row + 'CompanyName').disabled = false;
		}
	}

	//====================================
	function showMinCharge() {
		if (document.getElementById("LeaseCleaningCharge1").checked == true) document.getElementById("divLeaseCleaningChargeFee").style.display = 'inline';
		else document.getElementById("divLeaseCleaningChargeFee").style.display = 'none';

		if (document.getElementById("LeaseCarpetCharge1").checked == true) document.getElementById("divLeaseCarpetChargeFee").style.display = 'inline';
		else document.getElementById("divLeaseCarpetChargeFee").style.display = 'none';

		if (document.getElementById("LeaseKeyCharge1").checked == true) document.getElementById("divLeaseKeyChargeFee").style.display = 'inline';
		else document.getElementById("divLeaseKeyChargeFee").style.display = 'none';
	}

	//====================================
	function showUtilities() {
		if (document.getElementById("LeaseUtilities1").checked == true) document.getElementById("utilities-wrapper").style.display = 'block';
		else document.getElementById("utilities-wrapper").style.display = 'none';
	}

	//====================================
	function showCommission() {
		if (document.getElementById("LeaseSalesCommissionPaid1").checked == true) document.getElementById("commission-wrapper").style.display = 'block';
		else document.getElementById("commission-wrapper").style.display = 'none';
	}

	//====================================
	function showLeaseTermination() {
		if (document.getElementById("LeaseLeaseTermination1").checked == true) document.getElementById("divLeaseTerminationDays").style.display = 'inline';
		else document.getElementById("divLeaseTerminationDays").style.display = 'none';
	}

	//====================================
	function showPersonalGuaranty() {
		if (document.getElementById("LeasePersonalGuaranty1").checked == true) document.getElementById("guaranty-wrapper").style.display = 'block';
		else document.getElementById("guaranty-wrapper").style.display = 'none';
	}

	//====================================
	function showEarlyTerminationFee() {
		if (document.getElementById("LeaseEarlyTermination1").checked == true) document.getElementById("early-termination-wrapper").style.display = 'block';
		else document.getElementById("early-termination-wrapper").style.display = 'none';
	}

	//====================================
	function showPet() {
		if (document.getElementById("LeasePet1").checked == true) {
			if (numOfPets == 0) numOfPets = 1;
			addPets(numOfPets);
			document.getElementById("pet-wrapper").style.display = 'block';
		}	else {
			document.getElementById("pet-wrapper").style.display = 'none';
		}
	}
	
	//====================================
	function addPets(numOfPets) {
		//Hide all the rows
		$("#pet-table tr[class='petRow']").hide();
		
		//Show the number of rows selected
		for ($i=0; $i<numOfPets; $i++) $("#petRow" + $i).show();
	}

	//====================================
	function showPoolMaintain() {
		if (document.getElementById("LeasePool1").checked == true) {
			document.getElementById("pool-maintain-wrapper").style.display = 'block';
			//document.getElementById("pool-maintain-pay-wrapper").style.display = 'block';
			document.getElementById("pool-repair-wrapper").style.display = 'block';
		}	else {
			document.getElementById("pool-maintain-wrapper").style.display = 'none';
			document.getElementById("pool-maintain-pay-wrapper").style.display = 'none';
			document.getElementById("pool-repair-wrapper").style.display = 'none';
		}
	}

	//====================================
	function showPoolMaintainPay() {
		if (document.getElementById("LeasePoolMaintain1").checked == true) {
			document.getElementById("pool-maintain-pay-wrapper").style.display = 'block';
		}	else {
			document.getElementById("pool-maintain-pay-wrapper").style.display = 'none';
		}
	}
    
	//====================================
	function showVehicles() {
		if (document.getElementById("LeaseVehiclesPermitted1").checked == true) {
			if (numOfVehicles == 0) numOfVehicles = 1;
			addVehicles(numOfVehicles);
			if (numOfVehicles == 0) $("#addVehicle").trigger("click");
			document.getElementById("vehicle-wrapper").style.display = 'block';
		}	else {
			document.getElementById("vehicle-wrapper").style.display = 'none';
            //$('#vehicle-table').find('tr').first().remove();
			//$("#vehicle-table").find("tr:gt(0)").remove();
		}
	}

	//====================================
	function addVehicles(numOfVehicles) {
		//Hide all the rows
		$("#vehicle-table tr[class='vehicleRow']").hide();
		
		//Show the number of rows selected
		for ($i=0; $i<numOfVehicles; $i++) $("#vehicleRow" + $i).show();

		var strHtml = '';
	   
        //$('#vehicle-table').find('tr').first().remove();
		//$("#vehicle-table").find("tr:gt(0)").remove();
        /*
		for (var i=1; i<=numOfVehicles; i++) {
            strHtml += '<tr id="vehicleRow' + $i + '" class="vehicleRow"><td><div class="fm_input fm_text col-xs-12 inline left required"><input name="data[Vehicle][' + i + '][type]" class="input col-xs-12 center" placeholder="Type of Vehicle" required="required" maxlength="25" type="text" id="Vehicle' + i + 'Type"></div</td>';
            
            strHtml += '<td><div class="fm_input fm_text col-xs-12 inline left required"><input name="data[Vehicle][' + i + '][make]" class="input col-xs-12 center" placeholder="Type of Vehicle" required="required" maxlength="25" type="text" id="Vehicle' + i + 'make"></div</td>';  
            
            strHtml += '<td><div class="fm_input fm_text col-xs-12 inline left required"><input name="data[Vehicle][' + i + '][model]" class="input col-xs-12 center" placeholder="Type of Vehicle" required="required" maxlength="25" type="text" id="Vehicle' + i + 'model"></div</td>'; 
            
            strHtml += '<td><div class="fm_input fm_text col-xs-12 inline left required"><input name="data[Vehicle][' + i + '][color]" class="input col-xs-12 center" placeholder="Type of Vehicle" required="required" maxlength="25" type="text" id="Vehicle' + i + 'color"></div</td>';     
            
            strHtml += '<td><div class="fm_input fm_text col-xs-12 inline left required"><input name="data[Vehicle][' + i + '][license]" class="input col-xs-12 center" placeholder="Type of Vehicle" required="required" maxlength="25" type="text" id="Vehicle' + i + 'license"></div</td>'; 
            
			strHtml += '<td><a href="#" onclick="removeVehicle(' + numOfVehicles + ');return false;"><img src="/img/icon_trash.png" /></a></td></tr>';
		}*/
		$('#vehicle-table tr:last').after(strHtml);
		
	}   

	//====================================
	function changeType() {
		if (document.getElementById("LeaseRentLateFeeType1").checked == true) $('#divRentLateFee').html($('#divRentLateFee').html().replace('$','%'));
		else $('#divRentLateFee').html($('#divRentLateFee').html().replace('%','$'));
	}

	//====================================
	function removeProvision(id) {
		if (confirm("Are you sure you want to remove this provision?")) {
			//Remove the selected provision
			$("#div-provision" + id).remove();

			var i = 1;
			$("span.provision-number").each(function() {
				$(this).text(i + ".");
				i++;
			});
			provisionNumbering--;
		}
	}

	//====================================
	function addCustomProvision(id) {
		description = document.getElementById('Provision' + id + 'Description').value;

		$.ajax({
				type: "POST",
				data: {"description" : description},
				dataType: "json",
		    url: '/index.php/provisions/add_custom_provision',
		    success: function (data) {
					alert(data);
				},
		    error: function (error) {
					alert('error: ' + error.responseText);
		    	alert('An error occured while processing your request.');
		    }
		});
	}

	//====================================
	function deleteProvision(id) {
		if (confirm("Are you sure you want to delete this provision?")) {
			$.ajax({
			    url: '/index.php/provisions/delete/' + id + '/true',
			    cache: false,
			    type: 'GET',
			    dataType: 'HTML',
			    success: function (data) {
						if (data != '') {
							$('#divPopupProvisionsList').find('.inner_padding').html(data);
						}
					},
			    error: function (error) {
			    	alert("error: " + error);
			    }
			});
		}
	}

	//====================================
	function removeVehicle(id) {
		$("#vehicle-table").find("#vehicleRow" + id).remove();
		numOfVehicles-= 1;
	}

	//====================================
	function removeTenant(id) {
		$("#table-tenants").find("#tenant" + id).remove();
		if (numOfTenants > 0) numOfTenants--;
	}

	//====================================
	function removeOccupant(id) {
		$("#table-occupants").find("#occupant" + id).remove();
		numOfOccupants--;
	}

	//====================================
	function disable_maintenance(appliance) {
    <?php	if ($lease_type != 'short') { ?>
			if (document.getElementById('LeaseAppliances' + appliance).checked)	{
				document.getElementById('LeaseMaintenance' + appliance).checked = false;
				document.getElementById('LeaseMaintenance' + appliance).disabled = true;
			} else document.getElementById('LeaseMaintenance' + appliance).disabled = false;
		<?php } ?>
	}

	//====================================
	function disable_appliances(maintenance) {
    <?php	if ($lease_type != 'short') { ?>
			if (document.getElementById('LeaseMaintenance' + maintenance).checked) {
				document.getElementById('LeaseAppliances' + maintenance).checked = false;
				document.getElementById('LeaseAppliances' + maintenance).disabled = true;
			} else document.getElementById('LeaseAppliances' + maintenance).disabled = false;
		<?php } ?>
	}


	//====================================
	function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    	if (charCode == 44 || charCode == 46) return true;
      else return false;
    }
    return true;
	}

	//===============================================================================================
	//	Retrieve the info from the Property Address Book for the selected entry 
	//	and fill-in the lease property information fields
	//===============================================================================================
	function getPropertyAddressBookEntry(entryID) {
		$.ajax({
		    url: '/index.php/property_address_books/getEntryInfo/' + entryID,
		    cache: false,
		    type: 'GET',
		    dataType: 'HTML',
		    success: function (data) {
					if (data != '') {
						var obj = jQuery.parseJSON(data);

		        $('#LeasePropertyStreetAddress1').val(obj.street_address1);
		        $('#LeasePropertyStreetAddress2').val(obj.street_address2);
		        $('#LeasePropertyCity').val(obj.city);
		        $('#LeasePropertyZipCode').val(obj.zip_code);
		      }
		    },
		    error: function (error) {
		    	alert('An error occured while processing your request.');
		    }
		});
	}


	//===============================================================================================
	//	Retrieve the info from the Address Book for the selected entry 
	//	and fill-in the contact fields
	//===============================================================================================
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

		        $('#LeaseContactFirstName').val(obj.first_name);
		        $('#LeaseContactLastName').val(obj.last_name);
		        $('#LeaseContactStreetAddress1').val(obj.street_address1);
		        $('#LeaseContactStreetAddress2').val(obj.street_address2);
		        $('#LeaseContactCity').val(obj.city);
		        if (obj.country == 'US') {
			        $('#LeaseContactState').val(obj.state);
							$('#LeaseContactState').trigger("change");
							//Since we need to trigger a change event on the State drop-down to reload the associated counties, we can't set the county here because it will get overridden.
							// We're saving the county ID in a global var so we can retrieve later (see ajaxComplete function below)
							addressBookCountyID = obj.county_id;
							$('#LeaseContactStateProvince').val('');
			    		$('#state-field').show();
			    		$('#state-province-field').hide();
			    		$('#county-field').show();
  		    		$('#label-zip-code').text('Zip Code');
						} else {
							$('#LeaseContactState').val('');
							$('#LeaseContactStateProvince').val(obj.state_province);
			    		$('#state-field').hide();
			    		$('#state-province-field').show();
			    		$('#county-field').hide();
   		    		$('#label-zip-code').text('Zip/Postal Code');
						}
		        $('#LeaseContactZipCode').val(obj.zip_code);
		        $('#LeaseContactCountry').val(obj.country);
		        $('#LeaseContactCompanyName').val(obj.company_name);
						phoneNumber = obj.phone_number;
		        $('#LeaseCpn1').val(phoneNumber.substring(0, 3));
		        $('#LeaseCpn2').val(phoneNumber.substring(3, 6));
		        $('#LeaseCpn3').val(phoneNumber.substring(6, 10));
						phoneNumberEmergencies = obj.phone_number_emergencies;
		        $('#LeaseCpne1').val(phoneNumberEmergencies.substring(0, 3));
		        $('#LeaseCpne2').val(phoneNumberEmergencies.substring(3, 6));
		        $('#LeaseCpne3').val(phoneNumberEmergencies.substring(6, 10));
		      }
		    },
		    error: function (error) {
		    	alert('An error occured while processing your request.');
		    }
		});
	}


	//===============================================================================================
	// Retrieve the provisions selected by the user and add them to the provisions list
	//===============================================================================================
	function getProvisions(selected_provisions) {
		$.ajax({
		    url: '/index.php/provisions/getProvisions/' + selected_provisions,
		    cache: false,
		    type: 'GET',
		    dataType: 'HTML',
		    success: function (data) {
					if (data != '') {
						var obj = jQuery.parseJSON(data);

						$.each(obj, function(key, value) {
							var row_class = '';
							strHtml = '<div id="div-provision' + numOfProvisions + '" class="div-provision" style="margin-bottom:2px;"> <input type="hidden" name="data[Provision][' + numOfProvisions + '][id]" value="' + key + '" /> <span id="provision-number' + numOfProvisions + '" class="provision-number">' + provisionNumbering + '.</span> <textarea name="data[Provision][' + numOfProvisions + '][description]" id="Provision' + numOfProvisions + 'Description" class="provision" rows="6" cols="30" style="display:inline-block;vertical-align: middle">' + value + '</textarea> ';
							strHtml += '	<div class="provision-icons">';
							strHtml += '		<div style="float:left;"><a href="#" onclick="removeProvision(' + numOfProvisions + ');return false;" alt="Remove this Custom Provision" title="Remove this Custom Provision"><img src="/img/icon_trash.png" /></a></div>';
							strHtml += '		<div id="provision-actions' + numOfProvisions + '" style="float:left;display:none;"><input type="radio" name="data[Provision][' + numOfProvisions + '][option]" id="Provision' + numOfProvisions + 'Option0" value="overwrite" />Modify original provision';
							strHtml += '		<br /><input type="radio" name="data[Provision][' + numOfProvisions + '][option]" id="Provision' + numOfProvisions + 'Option1" value="save" />Save as new provision';
							strHtml += '		<br /><input type="radio" name="data[Provision][' + numOfProvisions + '][option]" id="Provision' + numOfProvisions + 'Option2" value="ignore" checked />Use for this lease only</div>';
							strHtml += '	</div>';
							strHtml += '</div>';
							$('#div-provisions').append(strHtml);

							numOfProvisions++;
							provisionNumbering++;
						}); 
		      }
		    },
		    error: function (error) {
					alert('error: ' + error.responseText);
		    	alert('An error occured while processing your request.');
		    }
		});
	}
    
	//This is called whenever a Ajax function finishes executing
	$(document).ajaxComplete(function(event, xhr, settings) {
		//If the loadCounties function was called and the addressBookCountyID var is not empty it means that the contact info was populated from the address book,
		// we need to set the county drop-down to the value from the address book
		if (settings.url.indexOf("loadCounties") > -1 && (addressBookCountyID !== undefined && addressBookCountyID != "")) {
			$('#LeaseContactCountyId').val(addressBookCountyID);
		} else {
			//If this is a lease renewal then we need to set the county dropdown to the value copied from the original lease
			$('#LeaseContactCountyId').val(<?php echo $autofill_contact['contact_county_id']; ?>);
		}
	});


	//***********************************************************************************************
	// Get the property address book list for the logged-in user
	//***********************************************************************************************
	$('#openPropertyAddressBook').on('click', function() {
        $(this).show();
		$.ajax({
		    url: '/index.php/property_address_books/getList/',
		    cache: false,
		    type: 'GET',
		    dataType: 'HTML',
		    success: function (data) {
					if (data != '') {
						$('#divPopupPropertyAddressBook').find('.inner_padding').html(data);
					  $('#overlay').fadeIn('slow');
					  $("#divPopupPropertyAddressBook").fadeIn('slow');
					}
				},
		    error: function (error) {
		    	alert(error);
		    }
		});
	});

  //An entry has been selected from the property address book, get the info to populate the form
  $('#btnChooseProperty').on('click', function() {
		getPropertyAddressBookEntry($('input:radio[name=rdoEntry\\[\\]]:checked').val());
 		$('#divPopupPropertyAddressBook').fadeOut('slow');
 		$('#overlay').fadeOut('slow');
	});

  //Close the property address book popup
  $('#btnCancelProperty').on('click', function() {
 		$('#divPopupPropertyAddressBook').fadeOut('slow');
 		$('#overlay').fadeOut('slow');
	});


	//***********************************************************************************************
	// Add the current property info to the logged-in user's property address book
	//***********************************************************************************************
	$('#addToPropertyAddressBook').on('click', function() {
        $(this).show();
		$.ajax({
            type:"POST",
            data:$('#LeaseEditForm').serialize(),
		    url: '/index.php/property_address_books/addEntry/Lease',
		    success: function (data) {
					if (data == 1) {
						$('.message_success').text('The property was added successfully to your property address book.');
					} else {
						$('.message_error').text('The property could not be added to your property address book.');
					}
                $('#overlay').fadeIn('slow');
				$("#divPopupNotification").fadeIn('slow').delay(800).fadeOut('slow');
				$('#overlay').delay(800).fadeOut('slow');
            }
		});
	});



	//***********************************************************************************************
	// Get the address book list for the logged-in user
	//***********************************************************************************************
	$('#openAddressBook').on('click', function() {
        $(this).show();
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

  //An entry has been selected from the address book, get the info to populate the form
  $('#btnChoose').on('click', function() {
		getAddressBookEntry($('input:radio[name=rdoEntry\\[\\]]:checked').val());
 		$('#divPopupAddressBook').fadeOut('slow');
 		$('#overlay').fadeOut('slow');
	});

  //Close the address book popup
  $('#btnCancel').on('click', function() {
 		$('#divPopupAddressBook').fadeOut('slow');
 		$('#overlay').fadeOut('slow');
	});


	//***********************************************************************************************
	// Add the current person responsible info to the logged-in user's address book
	//***********************************************************************************************
	$('#addToAddressBook').on('click', function() {
        $(this).show();
		$.ajax({
				type:"POST",
				data:$('#LeaseEditForm').serialize(),
		    url: '/index.php/address_books/addEntry/Lease',
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


	//***********************************************************************************************
	// Get the list of custom provisions for the logged-in user
	//***********************************************************************************************
	$('#openProvisionsList').on('click', function() {
        $(this).show();
		$.ajax({
		    url: '/index.php/provisions/getList/',
		    cache: false,
		    type: 'GET',
		    dataType: 'HTML',
		    success: function (data) {
					if (data != '') {
						$('#divPopupProvisionsList').find('.inner_padding').html(data);
					  $('#overlay').fadeIn('slow');
					  $("#divPopupProvisionsList").fadeIn('slow');
					}
				},
		    error: function (error) {
		    	alert("error: " + error);
		    }
		});
	});

  //One or more entries have been selected from the provisions list, get the info to populate the form
  $('#btnChooseProvision').on('click', function() {
		var selected_provisions = [];
		$('#divPopupProvisionsList input:checked').each(function() {
	    selected_provisions.push($(this).val());
		});
		getProvisions(selected_provisions);
 		$('#divPopupProvisionsList').fadeOut('slow');
 		$('#overlay').fadeOut('slow');
	});

  //Close the provisions list popup
  $('#btnCancelProvision').on('click', function() {
 		$('#divPopupProvisionsList').fadeOut('slow');
 		$('#overlay').fadeOut('slow');
	});


	//***********************************************************************************************
	// Autosave the Lease info
	//***********************************************************************************************
	function autosave() {
alert("autosave");
    $.ajax({
        type: 'POST',
        data: $('#LeaseEditForm').serialize(),
        url: '/index.php/leases/autosave',
        success: function(data) {
            if (data && data == 'success') {
                // Save successfully completed, no need to do anything
            } else {
                // Save failed, report the error if you desire
            }
        }
    });
	}


	//When the state dropdown's value changes, load the counties associated to the selected state
  $("#LeaseContactState").on('change', function() {
  	var state_id = $(this).val();

		$.ajax({
		    url: '/index.php/leases/loadCounties/' + state_id,
		    cache: false,
		    type: 'GET',
		    dataType: 'HTML',
		    success: function(response) {
						$('#LeaseContactCountyId').html('<option value="0">&lt;Please Select a County&gt;</option>' + response);
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


  $("#LeaseContactCountry").on('change', function() {
   	if ($(this).val() == 'US') {
  		$('#state-field').show();
  		$('#state-province-field').hide();
  		$('#label-zip-code').text('Zip Code');
			$('#LeaseContactState').trigger("change");
  	}	else {
  		$('#state-field').hide();
  		$('#state-province-field').show();
  		$('#county-field').hide();
  		$('#label-zip-code').text('Zip/Postal Code');
  	}
	});


	<?php
		if (isset($this->data['Lease']['how_many_vehicles'])) echo 'var numOfVehicles = ' . $this->data['Lease']['how_many_vehicles'] . ';';
		else echo 'var numOfVehicles = 1;';
//		echo 'var numOfVehicles = ' . count($vehicles) . ';';
		echo 'var numOfOccupants = ' . count($occupants) . ';';
		echo 'var numOfProvisions = ' . $autofill_custom_provisions['autofill_custom_provisions_count'] . ';';
		if (isset($this->data['Lease']['how_many_pets'])) echo 'var numOfPets = ' . $this->data['Lease']['how_many_pets'] . ';';
		else echo 'var numOfPets = 1;';
	?>
	var provisionNumbering = numOfProvisions + 1;
	var numOfTenants = 0;


	$(document).ready(function() {
	   	changeType();
    	<?php
    		if ($lease_type == 'short') echo 'document.getElementById("utilities-wrapper").style.display = "block";';
  			else echo 'showUtilities();';
    		if ($lease_type != 'multi') echo 'showVehicles(); showCommission();';
    		if ($lease_type == 'single') echo 'showPoolMaintain(); showPoolMaintainPay(); showLeaseTermination();';
				if ($lease_type != 'short') echo 'showEarlyTerminationFee();';
    	?>
    	showMinCharge();
    	showPersonalGuaranty();
    	showPet();
    	$("#LeaseContactCountry").change();
    	$('#LeaseContactState').change();

			<?php if ($lease_renewal != 1) { ?>
				for (i=0; i<<?php echo count($tenants_number); ?>; i++) {
					isCompany(i);
				}
			<?php } ?>

	    <?php	if ($lease_type != 'short') { ?>
				//If any appliances are checked, disable the corresponding maintenance checkbox
				$('.appliances').each(function(i, obj) {
					if (obj.checked) {
						var maintenanceID = obj.id;
						maintenanceID = maintenanceID.replace('Appliances', 'Maintenance');
						if (document.getElementById(maintenanceID) != null) {
							document.getElementById(maintenanceID).checked = false;
							document.getElementById(maintenanceID).disabled = true;
						}
					}
				});
	
				//If any maintenance items are checked, disable the corresponding appliances checkbox
				$('.maintenance').each(function(i, obj) {
					if (obj.checked) {
						var applianceID = obj.id;
						applianceID = applianceID.replace('Maintenance', 'Appliances');
						if (document.getElementById(applianceID) != null) {
							document.getElementById(applianceID).checked = false;
							document.getElementById(applianceID).disabled = true;
						}
					}
				});
			<?php } ?>


//DISABLED UNTIL I GET MORE TIME TO WORK ON THIS
//			setInterval(autosave, 120000);	//Do this every 2 minutes


			//If a provision is modified, show the options for overwriting the original provision, saving as a new provision or using for the current lease only
//			$("textarea.provision").keydown(function(event) {
				$("textarea.provision").on("keypress", function() {
			  var strID = this.id;
			 	var newStr = strID.replace('Description', '');
			 	var divID = newStr.replace('Provision', '');
			 	$('#Provision' + divID + 'Option1').attr('checked', true);
			 	$('#provision-actions' + divID).show();
			});
			//---------------------


			//-- Add a provision --
			$("#addProvision").click(function(event) {
  			event.preventDefault();

				strHtml = '<div id="div-provision' + numOfProvisions + '" class="div-provision" style="margin-bottom:2px;"><span id="provision-number' + numOfProvisions + '" class="provision-number">' + provisionNumbering + '.</span> <textarea name="data[Provision][' + numOfProvisions + '][description]" id="Provision' + numOfProvisions + 'Description" class="provision" rows="6" cols="30" style="display:inline-block;vertical-align: middle"></textarea>  ';
				strHtml += '	<div class="provision-icons">';
				strHtml += '		<div style="float:left;"><a href="#" onclick="removeProvision(' + numOfProvisions + ');return false;" alt="Remove this Custom Provision" title="Remove this Custom Provision"><img src="/img/icon_trash.png" /></a></div>';
				strHtml += '		<div style="float:left;"><input type="radio" name="data[Provision][' + numOfProvisions + '][option]" id="Provision' + numOfProvisions + 'Option1" checked value="save" />Save as new provision';
				strHtml += '		<br /><input type="radio" name="data[Provision][' + numOfProvisions + '][option]" id="Provision' + numOfProvisions + 'Option2" value="ignore" />Use for this lease only </div>';
				strHtml += '	</div>';
				strHtml += '</div>';
				$('#div-provisions').append(strHtml);

				numOfProvisions++;
				provisionNumbering++;
			});
			//---------------------

/*
			//-- Add a vehicle --
			$("#addVehicle").click(function(event) {
  			event.preventDefault();
				var strHtml = '';

				strHtml += '<tr id="vehicle' + numOfVehicles + '"><td><input name="data[Vehicle][' + numOfVehicles + '][type]" type="text" id="Vehicle' + numOfVehicles + 'Type" maxlength="50" class="short"></td>';
				strHtml += '<td><input name="data[Vehicle][' + numOfVehicles + '][make]" type="text" id="Vehicle' + numOfVehicles + 'Make" maxlength="50" class="short"></td>';
				strHtml += '<td><input name="data[Vehicle][' + numOfVehicles + '][model]" type="text" id="Vehicle' + numOfVehicles + 'Model" maxlength="50" class="short"></td>';
				strHtml += '<td><input name="data[Vehicle][' + numOfVehicles + '][color]" type="text" id="Vehicle' + numOfVehicles + 'Color" maxlength="50" class="short"></td>';
				strHtml += '<td><input name="data[Vehicle][' + numOfVehicles + '][license]" type="text" id="Vehicle' + numOfVehicles + 'License" maxlength="50" class="short"></td>';
				strHtml += '<td><a href="#" onclick="removeVehicle(' + numOfVehicles + ');return false;"><img src="/img/icon_trash.png" /></a></td></tr>';
alert(strHtml);
				$('#vehicle-table tr:last').after(strHtml);

				numOfVehicles++;
			});
			//--------------------
*/

			//-- Add a tenant --
			$("#addTenant").click(function(event) {
  			event.preventDefault();
				var strHtml = '';

				strHtml += '<tr id="tenant' + numOfTenants + '">';
				strHtml += '<td><input name="data[Tenant][' + numOfTenants + '][first_name]" type="text" id="Tenant' + numOfTenants + 'FirstName" maxlength="50"></td>';
				strHtml += '<td><input name="data[Tenant][' + numOfTenants + '][middle_name]" type="text" id="Tenant' + numOfTenants + 'MiddleName" maxlength="50"></td>';
				strHtml += '<td><input name="data[Tenant][' + numOfTenants + '][last_name]" type="text" id="Tenant' + numOfTenants + 'LastName" maxlength="50"></td>';
				strHtml += '<td><a href="#" onclick="removeTenant(' + numOfTenants + ');return false;"><img src="/img/icon_trash.png" /></a></td></tr>';

				$('#table-tenants tr:last').after(strHtml);

				numOfTenants++;
			});
			//--------------------


			//-- Add an occupant --
			$("#addOccupant").click(function(event) {
  			event.preventDefault();
				var strHtml = '';

				strHtml += '<tr id="occupant' + numOfOccupants + '">';
				strHtml += '<td><input name="data[Occupant][' + numOfOccupants + '][first_name]" type="text" id="Occupant' + numOfOccupants + 'FirstName" maxlength="50"></td>';
				strHtml += '<td><input name="data[Occupant][' + numOfOccupants + '][middle_name]" type="text" id="Occupant' + numOfOccupants + 'MiddleName" maxlength="50"></td>';
				strHtml += '<td><input name="data[Occupant][' + numOfOccupants + '][last_name]" type="text" id="Occupant' + numOfOccupants + 'LastName" maxlength="50"></td>';
				strHtml += '<td><a href="#" onclick="removeOccupant(' + numOfOccupants + ');return false;"><img src="/img/icon_trash.png" /></a></td></tr>';

				$('#table-occupants tr:last').after(strHtml);

				numOfOccupants++;
			});
			//--------------------


			//If an error message is displayed, scroll to it
			if ($('body').find('.error-message').html() != null) {
				$('html, body').animate({
				    scrollTop: $('.error-message:visible:first').offset().top - $('#header-container').height() - 100
				}, 1000);
			}
	});
</script>