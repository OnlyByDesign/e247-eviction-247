<?php
	if (!empty($evictions)) {
		foreach ($evictions as $eviction) { //debug($eviction);
        $editable = in_array($eviction['Eviction']['status_id'], $editable_status_ids);
        $hasNotification = in_array($eviction['Eviction']['id'], $notification_ids);

        $allow_fee_entry = (!$eviction['Eviction']['fees_entered'] && $eviction['Eviction']['service_id'] == 3 && $eviction['Status']['step'] == 14);



				$strAction = '';
				$incompleteMessage = '';
	
				if ($editable) $incompleteMessage = '<p class="incomplete alert col-xs-12 push-t left">Incomplete Submission: please provide additional information so we can process your Eviction!</p>';
				elseif ($eviction['Status']['step'] == 3) {
					if ($eviction['Eviction']['is_faxed']) $strAction = "fax or upload";
					else $strAction = "upload";

					switch ($eviction['Status']['sub_step']) {
						//Missing Notice to Pay
						case 'a':
							if ($eviction['User']['use_signature'] == 1 && $eviction['Eviction']['three_day_notice_option_id'] == 3) {
								if ($eviction['Document']['notice_ext'] != '') $incompleteMessage = '<p class="incomplete alert col-xs-12 push-t left">Incomplete Submission: please sign the Notice to Pay so we can process your Eviction!</p>';
								else $incompleteMessage = '<p class="incomplete alert col-xs-12 push-t left">Incomplete Submission: we are creating your Notice to Pay and will advise you when it is ready for you to sign.</p>';
							} else {
								$incompleteMessage = '<p class="incomplete alert col-xs-12 push-t left">Incomplete Submission: please ' . $strAction . ' a signed & posted Notice to Pay so we can process your Eviction!</p>';
							}
							break;

						//Missing Lease Agreement and Notice to Pay
						case 'b':
							if ($eviction['User']['use_signature'] == 1 && $eviction['Eviction']['three_day_notice_option_id'] == 3) {
								if ($eviction['Document']['notice_ext'] != '' && $eviction['Document']['lease_ext'] == '') $incompleteMessage = '<p class="incomplete alert col-xs-12 push-t left">Incomplete Submission: please ' . $strAction . ' the Lease Agreement and sign the Notice to Pay so we can process your Eviction!</p>';
								else if ($eviction['Document']['notice_ext'] == '' && $eviction['Document']['lease_ext'] == '') $incompleteMessage = '<p class="incomplete alert col-xs-12 push-t left">Incomplete Submission: please ' . $strAction . ' the Lease Agreement! / We are creating your Notice to Pay and will advise you when it is ready for you to sign.</p>';
								else if ($eviction['Document']['notice_ext'] == '' && $eviction['Document']['lease_ext'] != '') $incompleteMessage = '<p class="incomplete alert col-xs-12 push-t left">Incomplete Submission: we are creating your Notice to Pay and will advise you when it is ready for you to sign.</p>';
							} else {
								$incompleteMessage = '<p class="incomplete alert col-xs-12 push-t left">Incomplete Submission: please ' . $strAction . ' the Lease Agreement and a signed & posted Notice to Pay so we can process your Eviction!</p>';
							}
							break;

						//Missing Lease Agreement
						case 'c':
							$incompleteMessage = '<p class="incomplete alert col-xs-12 push-t left">Incomplete Submission: please ' . $strAction . ' the Lease Agreement so we can process your Eviction!</p>';
							break;
					}
                    
				//Display the link to allow the user to let us know when the property was returned to them
				} elseif ($eviction['Status']['step'] == Configure::read('Step_status_date_writ') && $eviction['Eviction']['status_date_possession'] == '') {
					$incompleteMessage = '<p class="incomplete alert col-xs-12 push-t left">Please ' . $this->Html->link('click here', array('controller' => 'evictions', 'action' => 'propertyReturned', $eviction['Eviction']['id'])) . ' to enter the date at which the property was returned to you.</p>';

				//Display the link to allow the user to let us know if we should proceed with the eviction
				} else if ($eviction['Status']['step'] == Configure::read('Step_status_notice_posted') && $eviction['ContactClient']['field_value'] != 1 && $eviction['Eviction']['three_day_notice_option_id'] == 3) {
					$incompleteMessage = '<p class="incomplete alert col-xs-12 push-t left">Please ' . $this->Html->link('click here', array('controller' => 'evictions', 'action' => 'notice_expired', $eviction['Eviction']['id'])) . ' to notify us on the outcome of the posting of the Notice to Pay.</p>';

				} else if ($eviction['Status']['step'] == Configure::read('Step_status_notice_posted') && $eviction['ContactClient']['field_value'] == 1) {
					$incompleteMessage = '<p class="incomplete alert col-xs-12 push-t left">>We have Received your Request and will Contact you Within 24 Hours.</p>';
				}

				if ($eviction['WritRequested']['field_value'] == 1) {
					$incompleteMessage .= '<p class="incomplete alert col-xs-12 push-t left">Writ of Possession Requested on ' . date('l, F jS Y', strtotime($eviction['WritRequestedDate']['field_value'])) . '</p>';
				}
?>

<a name="<?php echo $eviction['Eviction']['id']; ?>" id="<?php echo $eviction['Eviction']['id']; ?>"></a>

<div id="eviction-wrapper-<?php echo $eviction['Eviction']['id']; ?>" class="eviction-wrapper <?php if ($editable || $allow_fee_entry || $eviction['Status']['step'] == 3) echo 'editable'; ?> center col-xs-12" style="position:relative;">

		<div class="acc_overview center col-xs-10" style="position:relative;">
            
				<!-- EVICTION SUMMARY BOX -->
				<div id="eviction-summary-<?php echo $eviction['Eviction']['id']; ?>" class="acc-ov-summary eviction-summary col-xs-12 center <?php if ($editable || $allow_fee_entry || $eviction['Status']['step'] == 3) echo 'editable-summary'; ?>">
				    <div class="eviction-wrapper-top">
                        
				        <div class="acc-ov-l left col-xs-9">
	            		     
								<p class="push-b">
								    <?php if ($editable) ?>
										<strong>ADDRESS: </strong>
                                        <?php echo $eviction['Eviction']['property_street_address1'];
								        if ($eviction['Eviction']['property_street_address2'] != '') echo ', Unit No. ' . $eviction['Eviction']['property_street_address2'];
                                        if ($eviction['Eviction']['property_city'] != '') echo ', ' . $eviction['Eviction']['property_city'];
                                        if ($eviction['Eviction']['property_state'] != '') echo ', ' . $eviction['Eviction']['property_state'];
                                        if ($eviction['Eviction']['property_zip_code'] != '') echo ' ' . $eviction['Eviction']['property_zip_code'];
								    ?>
								</p>
				                <div class="col-xs-5-2 left inline">
									<p><strong>Owner: </strong>
                                        <?php if (!empty($eviction['Eviction']['property_owner_first_name']) && !empty($eviction['Eviction']['property_owner_last_name'])) { ?>
                                    </p>
						      	   <p><strong>Plaintiff: </strong><?=$eviction['Eviction']['property_owner_first_name']?> <?=$eviction['Eviction']['property_owner_last_name']?></p>
									<?php } else if (!empty($eviction['Eviction']['property_owner_company'])) { ?>
						      	   <p><strong>Plaintiff: </strong><?=$eviction['Eviction']['property_owner_company']?></p>
									<?php } ?>
                                </div>
                                <div class="col-xs-5-2 left inline">
                                    <p><strong>Defendant(s): </strong>
                                        <?php
                                            $defendants = $defendanto->findAllByEvictionId($eviction['Eviction']['id']);
                                            foreach ($defendants as $k => $defendant) {
                                                echo $defendant['Defendant']['first_name'] . " " . $defendant['Defendant']['last_name'];
                                                if (count($defendants)-1 != $k) echo ", ";
                                            }
                                        ?>
                                    </p>
									<p><strong>Matter No.: </strong><?php echo $eviction['Eviction']['id']; ?></p>
                              </div>
								<?php if ($this->Session->read("Is_Superuser") == 1) echo '<p><strong>Started By: </strong>' . $eviction['Profile']['first_name'] . ' ' . $eviction['Profile']['last_name'] . '</p>'; ?>
                                <?php
                                    if ($incompleteMessage <> '') echo $incompleteMessage;
                                    if ($eviction['Eviction']['in_settlement']) echo '<p class="red"><strong>Pending Settlement with the Defendant.</strong></p>';
                                    if ($eviction['Eviction']['is_contested']) echo '<p class="red"><strong>Tenant is Contesting the Eviction.</strong></p>';
                                ?>
                              
				        </div>

                        <div class="acc-ov-r right col-xs-2">
                            <?php
								if ($editable) {
								    echo '<div id="formOptionsTrig" class="col-xs-12 left"> <p class="inline center">Lease options</p> <i class="inline center fa fa-caret-right" aria-hidden="true"></i> </div>';
                                    echo '<div class="form_options col-xs-12">';
								    //-- Add the Continue link
                                    if ($editable) {
                                        echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                                        echo '<p class="push-b left">';
                                        //If the status is Payment Received, send the user to the Eviction Information Sheet
                                        if ($eviction['Status']['step'] == 1) echo $this->Html->link('Continue', array('controller' => 'evictions', 'action' => 'edit', $eviction['Eviction']['id']));
                                        //If the status is Information Provided...
                                        elseif ($eviction['Status']['step'] == 2) {
                                            echo $this->Html->link('Continue', array('controller' => 'notifications', 'action' => 'index', $eviction['Eviction']['id']));
                                        }
                                        echo '</p>';
                                    }
                                    echo '</div>';
                                }
								if ($eviction['Document']['notice_ext'] != '' && $eviction['Document']['signed_notice_ext'] == '' && $eviction['User']['use_signature'] == 1 && $eviction['Status']['step'] < 18) {
                                    echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                                    echo '<p class="push-b left">';
								    //Get the current page number
								    $page = 1;
								    if (isset($this->request->params['named']['page'])) $page = $this->request->params['named']['page'];
                                    echo $this->Html->link('Sign Notice to Pay', array('controller' => 'evictions', 'action' => 'sign_notice', $eviction['Eviction']['id'], $page));
                                    echo '</p>';
                                }
                            ?>
                            <div id="expand-collapse-<?php echo $eviction['Eviction']['id']; ?>" class="expand-collapse col-xs-12 inline right">
                                <i class="right inline col-xs-1-2 fas fa-plus"></i>
                                <p class="col-xs-9 inline left" alt="expand" title="expand">Expand</p>
                            </div>
			            </div>
                        
                    </div>                    
                </div>


				<!-- EVICTION DETAILED BOX -->
				<div id="eviction-detail-<?php echo $eviction['Eviction']['id']; ?>" class="acc-ov-detail eviction-detail <?php if ($editable || $allow_fee_entry || $eviction['Status']['step'] == 3) echo 'editable-detail'; ?> center col-xs-12" style="position:relative;">
			        <div class="eviction-wrapper-top">
                        
                        <div class="acc-ov-l left col-xs-9 inline">
                          
                          <p class="push-b">
                              <?php if ($editable) ?>
                              <strong>ADDRESS: </strong>
                              <?php
                                    echo $eviction['Eviction']['property_street_address1'];
                                    if ($eviction['Eviction']['property_street_address2'] != '') echo ', Unit No. ' . $eviction['Eviction']['property_street_address2'];
									if ($eviction['Eviction']['property_city'] != '') echo ', ' . $eviction['Eviction']['property_city'];
									if ($eviction['Eviction']['property_state'] != '') echo ', ' . $eviction['Eviction']['property_state'];
									if ($eviction['Eviction']['property_zip_code'] != '') echo ' ' . $eviction['Eviction']['property_zip_code'];
								?>
                          </p>
                          
                          <div class="col-xs-5-2 left inline">
                              
                                <p><strong>Started:</strong>
                                    <?php echo date('l, F jS Y', strtotime($eviction['Eviction']['created'])); ?>
                                </p>
			
                                <p><?php echo "<strong>Case Type:</strong> " . $eviction['Service']['name'] . " (#" . $eviction['Eviction']['id'] . ")"; ?></p>

                                <?php if (!empty($eviction['Eviction']['property_owner_first_name']) && !empty($eviction['Eviction']['property_owner_last_name'])) { ?>

                                <p><strong>Plaintiff: </strong><?=$eviction['Eviction']['property_owner_first_name']?> <?=$eviction['Eviction']['property_owner_last_name']?></p>

                                <?php } else if (!empty($eviction['Eviction']['property_owner_company'])) { ?>
                                <p><strong>Plaintiff: </strong><?=$eviction['Eviction']['property_owner_company']?></p>
                                <?php } ?>
                              
                            </div>
                            
                            <div class="col-xs-5-2 left inline">
			
                                <p><strong>Defendant(s): </strong>
                                    <?php
                                        $defendants = $defendanto->findAllByEvictionId($eviction['Eviction']['id']);
                                        foreach ($defendants as $k => $defendant) {
                                            echo $defendant['Defendant']['first_name'] . " " . $defendant['Defendant']['last_name'];
                                            if (count($defendants)-1 != $k) echo ", ";
                                        }
                                    ?>
                                  </p>
                                  <p><strong>County: </strong>
                                    <?php echo $eviction['County']['name']; ?>
                                  </p>
                                  <?php if ($this->Session->read("Is_Superuser") == 1) echo '<p><strong>Started By: </strong>' . $eviction['Profile']['first_name'] . ' ' . $eviction['Profile']['last_name'] . '</p>'; ?>
                            
                            </div>
                            <?php if ($incompleteMessage <> '') echo $incompleteMessage; ?>
                            
			             </div>
                        
                        <div class="acc-ov-r right col-xs-2 inline">
                             
			                <div class="col-xs-12 right">
                                
                                <div id="formOptionsTrig" class="col-xs-12 left">
                                    <p class="inline center">Lease options</p>
                                    <i class="inline center fa fa-caret-right" aria-hidden="true"></i>
                                </div>
                                
			                    <?php
                                echo '<div class="form_options col-xs-12">';
			                    if ($editable) {
                                    echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                                    echo '<p class="push-b left">';
                                    //If the status is Payment Received, send the user to the Eviction Information Sheet
								    if ($eviction['Status']['step'] == 1) echo $this->Html->link('Continue', array('controller' => 'evictions', 'action' => 'edit', $eviction['Eviction']['id']));
                                    //If the status is Information Provided...
                                    elseif ($eviction['Status']['step'] == 2) {
                                        if ($hasNotification) echo $this->Html->link('Continue', array('controller' => 'evictions', 'action' => 'upload_documents', $eviction['Eviction']['id']));
                                        else echo $this->Html->link('Continue', array('controller' => 'notifications', 'action' => 'add', $eviction['Eviction']['id']));
                                    }
                                    echo '</p>';
                                } else {
                                    
                                    //Get the current page number
                                    $page = 1;
                                    echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                                    echo '<p class="push-b left">';
                                    if (isset($this->request->params['named']['page'])) $page = $this->request->params['named']['page'];
                                    echo '</p>';
                                    
			                        //LINK: Detailed Case Information
                                    echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                                    echo '<p class="push-b left">';
			                        echo $this->Html->link('Detailed Case Information', array('action' => 'view', $eviction['Eviction']['id']));
                                    echo '</p>';
			
									//LINK: Eviction Status Timeline
                                    echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                                    echo '<p class="push-b left">';
				                    echo $this->Html->link('Eviction Status Timeline', array('action' => 'status', $eviction['Eviction']['id']));
                                    echo '</p>';
			
			                        //LINK: Enter Damages & Fees
			                        if ($allow_fee_entry) {
                                        echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                                        echo '<p class="push-b left">';
			                            echo $this->Html->link('Enter Damages & Fees', array('controller' => 'fees', 'action' => 'index', $eviction['Eviction']['id'], $page));
                                        echo '</p>';
			                        }

									//LINK: Upload Required Documents
									if ($eviction['Status']['step'] < 18) {
				                        if ($eviction['Document']['lease_ext'] == '' || $eviction['Document']['signed_notice_ext'] == '' || ($eviction['Eviction']['is_affidavit_required'] == true && $eviction['Document']['affidavit_ext'] == '')) {
                                            echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                                            echo '<p class="push-b left">';
											echo $this->Html->link('Upload Required Documents', array('controller' => 'evictions', 'action' => 'upload_notice', $eviction['Eviction']['id'], $page));
                                            echo '</p>';
				                      	}
			                      		if ($eviction['Document']['notice_ext'] != '' && $eviction['Document']['signed_notice_ext'] == '' && $eviction['User']['use_signature'] == 1) {
                                            echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                                            echo '<p class="push-b left">';
                                            echo $this->Html->link('Sign Notice to Pay', array('controller' => 'evictions', 'action' => 'sign_notice', $eviction['Eviction']['id'], $page));
                                            echo '</p>';
                                        }
								    }

                                    //LINK: Request Writ of Possession
                                    if (!$eviction['State']['include_writ']) {
                                        echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                                        echo '<p class="push-b left">';
                                        echo $this->Html->link('Request Writ of Possession', array('controller' => 'evictions', 'action' => 'request_writ', $eviction['Eviction']['id'], $page));
                                        echo'</p>';
                                    }
                                    
                                    //LINK: Documents
                                    foreach ($document_types as $document_type) {
                                        echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                                        echo '<p class="push-b left">';
                                        echo $this->element(
                                            'file_download_link',
                                            array(
                                                'document_type' => $document_type,
                                                'document' => $eviction['Document']
                                            ));
                                        echo'</p>';
                                    }
			                    }
                                echo '</div>';
			                 ?>
			            </div>
                            
                            <div id="expand-collapse-<?php echo $eviction['Eviction']['id']; ?>" class="expand-collapse col-xs-12 inline right">
                                <i class="right inline col-xs-1-2 fas fa-minus"></i>
                                <p class="col-xs-9 inline left" alt="expand" title="expand">Show less</p>
                            </div>
                            
                        </div>
			
                        <div class="status-wrapper col-xs-12 left">

                            <p><strong>Eviction Status: </strong>
                                <?php
                                    $status = '';
                                    foreach (Configure::read('status_date_steps') as $key => $status_date_step) {
                                        if ($eviction['Status']['step'] == $key) $status = format_status($eviction['Status']['name'], $eviction['Eviction'][$status_date_step]);
                                    }
                                    if ($status == '') echo $eviction['Status']['name'];
                                    else echo $status;
                                ?>
                            </p>

                            <?php if ($eviction['Eviction']['service_id'] == '3') { ?>
                                <p><strong>Damages Status:</strong>
                                  <?php echo format_status($eviction['DamagesStatus']['name'], $eviction['Eviction']['damages_status_date']); ?>
                                </p>
                            <?php } ?>

                            <?php
                                if ($eviction['Eviction']['in_settlement']) echo '<p class="red">Pending Settlement with the Defendant.</p>';
                                if ($eviction['Eviction']['is_contested']) echo '<p class="red">Tenant is Contesting the Eviction.</p>';
                            ?>

                        </div>
                        
                    </div>
                </div>
            
        </div>
    </div>
</div>
</div>
<div class="col-xs-12 center inline push-t">
    <?php }
        echo '<p>';
        echo $this->Paginator->counter(array(
            'format' =>'Page {:page} of {:pages}, showing {:current} records out of {:count} total'
        ));
        echo '</p>';
        echo '<div class="paging">';
        echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class' => 'disabled'));
        echo '  | 	';
        echo $this->Paginator->numbers();
        echo '  |  ';
        echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));
        echo '</div>';
    } else { ?>
        <div class="col-xs-10 push-b push-t center" style="outline: 1px solid #222;">
            <i class="push-t push-b far fa-hand-pointer" style="font-size:36px;color:#FF6802;"></i>
            <h2 class="push-b push-r push-l" style="text-align:center !important;">Click the orange button to start a new lease.</h2>
        </div>
    <?php } ?>
</div>
    
    
