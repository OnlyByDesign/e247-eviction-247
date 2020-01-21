<?php
	if (!empty($leases)) {
//		$i = 0;
	 	foreach ($leases as $lease) { //debug($lease);
//			$i++;
        $editable = in_array($lease['Lease']['status_id'], $editable_status_ids);
				$strAction = '';
				$incompleteMessage = '';
				if ($editable) $incompleteMessage = '<p class="incomplete alert col-xs-12 push-t">Incomplete: provide additional information to process your Lease!</p>';
				elseif ($lease['Status']['step'] == Configure::read('Lease.status_step_draft') && $lease['Document']['lease_ext'] == 'pdf') {
					$incompleteMessage = '<p class="incomplete">Select: ' . $this->Html->link('Approve the Lease', array('controller' => 'leases', 'action' => 'approve_draft', $lease['Lease']['id'])) . ' or ' . $this->Html->link('Submit Changes', array('controller' => 'leases', 'action' => 'submit_changes', $lease['Lease']['id'])) . '</p>';
				}
				if ($lease['Status']['step'] == Configure::read('Lease.status_step_received')) $incompleteMessage = '<h3 class="info">Lease Request Submitted: ' . date('l, F jS Y', strtotime($lease['Lease']['created'])) . '</h3>';
				if ($lease['TempValues']['field_name'] == 'submit_changes') $incompleteMessage = '<h3 class="info">Lease Revisions Submitted: ' . date('l, F jS Y', strtotime($lease['Lease']['modified'])) . '</h3>';
        ?>
        <a name="<?php echo $lease['Lease']['id']; ?>" id="<?php echo $lease['Lease']['id']; ?>"></a>
        <div id="lease-wrapper-<?php echo $lease['Lease']['id']; ?>" class="lease-wrapper <?php if ($editable) echo 'editable'; ?> left col-xs-12">
        <?php if ($lease['Renewal']['field_value'] == 1 && $listType == 'inp') { ?><div class="ribbon-wrapper-purple"><div class="ribbon-purple">RENEWAL</div></div><?php } ?>
            
        <div class="center col-xs-10" style="position:relative;">                
        <!-- LEASE SUMMARY BOX -->
        <div id="lease-summary-<?php echo $lease['Lease']['id']; ?>" class="lease-summary col-xs-10 center <?php if ($editable) echo 'editable-summary'; ?>">
            <div class="lease-wrapper-top">
				<div class="left">	               
                    <p class="push-b"><strong>
				        <?php
                            if ($editable) ?>
				            Address: <?php echo $lease['Lease']['property_street_address1'];
                            if ($lease['Lease']['property_street_address2'] != '') echo ', Unit No. ' . $lease['Lease']['property_street_address2'];
                            if ($lease['Lease']['property_city'] != '') echo ', ' . $lease['Lease']['property_city'];
                            if ($lease['Lease']['property_state'] != '') echo ', ' . $lease['Lease']['property_state'];
                            if ($lease['Lease']['property_zip_code'] != '') echo ' ' . $lease['Lease']['property_zip_code'];
				        ?>
				    </strong></p>
				    <p><strong>Owner(s):</strong>
                        <?php
                            $owners = $ownero->findAllByLeaseId($lease['Lease']['id']);
                            foreach ($owners as $k => $owner) {								    if ($owner['Owner']['first_name']       != '') echo $owner['Owner']['first_name'] . " " . $owner['Owner']['last_name'];
                                else echo $owner['Owner']['company_name'];
                                if (count($owners)-1 != $k) echo ", ";
                            }
				        ?>
                    </p>
				    <p><strong>Tenant(s):</strong>
				        <?php
                            $tenants = $tenanto->findAllByLeaseId($lease['Lease']['id']);				            
                            foreach ($tenants as $k => $tenant) {
                            echo $tenant['Tenant']['first_name'] . " " . $tenant['Tenant']['last_name'];
                                if (count($tenants)-1 != $k) echo ", ";
                            }
				        ?>
                    </p>
                    <?php if ($this->Session->read("Is_Superuser") == 1) echo '<p><strong>Started By: </strong>' . $lease['Profile']['first_name'] . ' ' . $lease['Profile']['last_name'] . '</p>'; ?>
                    <p class="push-t"><strong>Matter No.:</strong> <?php echo $lease['Lease']['id']; ?></p>
                    
                    <?php if ($incompleteMessage <> '') echo $incompleteMessage; ?>
				</div>
                
                <div class="right">
                <?php
                    if (!empty($lease['Document']['lease_ext']) || !empty($lease['Document']['set_ext']) || $editable) {
                        echo '	<ul>';
				            //-- Add the Continue link
                            if ($editable) {
								//If the status is Payment Received, send the user to the Lease Information Sheet
								if ($lease['Status']['step'] == 1) echo $this->Html->link('Continue', array('controller' => 'leases', 'action' => 'edit', $lease['Lease']['id']));
								//If the status is Information Provided, send the user to the notifications page
								elseif ($lease['Status']['step'] == 2) {
								    echo $this->Html->link('Continue', array('controller' => 'notification_leases', 'action' => 'index', $lease['Lease']['id']));
								}
                            }
                            //-- Add a link to renew the lease or modify the lease
				            if ($lease['Status']['step'] >= 5) {
								$today = date("Y-m-d");
								$limit_date = date('Y-m-d', strtotime($lease['Lease']['lease_start'] . ' + 1 day'));

								if ($today <= $limit_date) {
	                               $link = $this->Html->link('Revise Lease', array('action' => 'revise', $lease['Lease']['id']));
	                               echo $this->Html->tag('li', $link);
	                           } else {
	                               $link = $this->Html->link('Renew Lease', array('action' => 'renew', $lease['Lease']['id']), ['class' => 'button-green']);
	                               echo $this->Html->tag('li', $link);
	                           }
				            }
                            echo '<br />';
                            //-- Add a link to the lease
				            if (!empty($lease['Document']['lease_ext']) || !empty($lease['Document']['set_ext'])) {
								$path = str_replace('leases', '', $lease['Document']['path']);
	        			        $year = '20' . substr($path, 1, 2);
				  		        if (!empty($lease['Document']['set_ext'])) {
				  						$title = ' Lease Agreement';
				  						$filename = '_residential_lease_agreement.pdf';
				  		        } else {
				  						$title = ' Lease Agreement (DRAFT)';
				  						$filename = '_residential_lease_agreement_DRAFT.pdf';
				  		        }
                                echo '<li>' . $this->Html->link(
                                $this->Html->image('pdf.png') . $title, array(
								        'admin' => true,
								        'controller' => 'documentTemplates',
								        'action' => 'download_documents',
								        $path,
								        $year . '_' . $lease['Lease']['id'] . $filename,
								          true
								    ),
								    array(
								        'escape' => false,
								        'class' => 'download-link'
								    )
								) . '</li>';
				            }
                            echo '</ul>';
			         } ?>
                    <div id="expand-collapse-<?php echo $lease['Lease']['id']; ?>" class="expand-collapse col-xs-2 inline right">
                        <img src="/img/expand.png" width="16" height="16" alt="expand" title="expand" />
                    </div> 
                </div>        
            </div>
        </div>

				<!-- LEASE DETAILED BOX -->
				<div id="lease-detail-<?php echo $lease['Lease']['id']; ?>" class="lease-detail <?php if ($editable) echo 'editable-detail'; ?>">
			        <div class="lease-wrapper-top">
			          <div class="left">
			            	<?php if ($incompleteMessage <> '') echo $incompleteMessage; ?>			            
			                <h3>
                                <?php if ($editable) ?>
                                    ADDRESS: <?php
                                    echo $lease['Lease']['property_street_address1'];
                                    if ($lease['Lease']['property_street_address2'] != '') echo ', Unit No. ' . $lease['Lease']['property_street_address2'];
                                    if ($lease['Lease']['property_city'] != '') echo ', ' . $lease['Lease']['property_city'];
                                    if ($lease['Lease']['property_state'] != '') echo ', ' . $lease['Lease']['property_state'];
                                    if ($lease['Lease']['property_zip_code'] != '') echo ' ' . $lease['Lease']['property_zip_code'];
                                ?>
			                </h3>
                            <p><strong>Owner(s): </strong>
                                <?php
                                    $owners = $ownero->findAllByLeaseId($lease['Lease']['id']);
                                    foreach ($owners as $k => $owner) {
                                        if ($owner['Owner']['first_name'] != '') echo $owner['Owner']['first_name'] . " " . $owner['Owner']['last_name'];
                                        else echo $owner['Owner']['company_name'];
                                        if (count($owners)-1 != $k) echo ", ";
                                    }
                                ?>
							</p>
                            <p><strong>Tenant(s): </strong>
				                <?php
				                	$tenants = $tenanto->findAllByLeaseId($lease['Lease']['id']);				                
				                	foreach ($tenants as $k => $tenant) {
				                		echo $tenant['Tenant']['first_name'] . " " . $tenant['Tenant']['last_name'];
				                		if (count($tenants)-1 != $k) echo ", ";
								    }
								?>
			                </p>
                            <p><strong>County: </strong>
                                <?php echo $lease['County']['name']; ?></p>
                                <?php if ($this->Session->read("Is_Superuser") == 1) echo '<p><strong>Started By: </strong>' . $lease['Profile']['first_name'] . ' ' . $lease['Profile']['last_name'] . '</p>'; ?>
				            <p><strong>Started: </strong>
                                <?php echo date('l, F jS Y', strtotime($lease['Lease']['created'])); ?></p>
			                 <p><strong>Lease Needed By: </strong>
								<?php
									if (strlen($lease['Lease']['requested_by']) > 10) echo date('l, F jS Y - g:ia', strtotime($lease['Lease']['requested_by']));
									else echo date('l, F jS Y', strtotime($lease['Lease']['requested_by']));
								?>
							</p>
                            <p><strong>Matter No.: </strong><?php echo $lease['Lease']['id']; ?></p>
			            </div>
			
			            <div class="right">
			                <ul>
			                    <?php
			                    if ($editable) {
								    //If the status is Payment Received, send the user to the Lease Information Sheet
									if ($lease['Status']['step'] == 1) echo $this->Html->link('Continue', array('controller' => 'leases', 'action' => 'edit', $lease['Lease']['id']));
									//If the status is Information Provided, send the user to the Notification page
									elseif ($lease['Status']['step'] == 2) {
                                        echo $this->Html->link('Continue', array('controller' => 'notification_leases', 'action' => 'index', $lease['Lease']['id']));
                                    }		
			                    } else {
									//Get the current page number
									$page = 1;
									if (isset($this->request->params['named']['page'])) $page = $this->request->params['named']['page'];
                                        //Add a link to renew the lease
										if ($lease['Status']['step'] >= 5) {
					                       $link = $this->Html->link('Renew Lease', array('action' => 'renew', $lease['Lease']['id']), ['class' => 'button-green']);
					                       echo $this->Html->tag('li', $link);
										}
			                        //Add a link to the Detailed Lease Information sheet
			                        $link = $this->Html->link('Detailed Lease Information', array('action' => 'view', $lease['Lease']['id']));
			                        echo $this->Html->tag('li', $link);
                                    //Add a link to the lease
									if (!empty($lease['Document']['lease_ext']) || !empty($lease['Document']['set_ext'])) {
										echo '<br />';
                                        $path = str_replace('leases', '', $lease['Document']['path']);
						        		$year = '20' . substr($path, 1, 2);
									  	if (!empty($lease['Document']['set_ext'])) {
									  		$title = ' Lease Agreement';
									  		$filename = '_residential_lease_agreement.pdf';
									  	} else {
									  		$title = ' Lease Agreement (DRAFT)';
									  		$filename = '_residential_lease_agreement_DRAFT.pdf';
									  	}
						                echo '<li>' . $this->Html->link($this->Html->image('pdf.png') . $title, array(
											'admin' => true,
											'controller' => 'documentTemplates',
											'action' => 'download_documents',
											$path, $year . '_' . $lease['Lease']['id'] . $filename, true
										), array(
											'escape' => false,
											'class' => 'download-link'
										)) . '</li>';
								    }
			                     }
			                 ?>
			             </ul>
			         </div>
			     </div>
                </div>
            </div>
        </div>
<?php
    }
    echo '<p>';
    echo $this->Paginator->counter(array('format' =>'Page {:page} of {:pages}, showing {:current} records out of {:count} total'));
    echo '</p>';
    echo '<div class="paging">';
    echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class' => 'disabled'));
    echo '  | 	';
    echo $this->Paginator->numbers();
    echo '  |  ';
    echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));
    echo '</div>';

	} else {
		/*if (isset($listType) && $listType == 'act')*/ echo '<img src="/img/myleases_blank.jpg" alt="" title="" />';
	}
?>