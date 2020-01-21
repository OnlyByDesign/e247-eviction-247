	
    <p>
		<?php
			echo $this->Paginator->counter(array(
				'format' =>'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'
			));
		?>
	</p>
	<div class="paging">
		<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?> | <?php echo $this->Paginator->numbers();?> | <?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
	</div>

	<?php
		foreach ($leases as $lease):
			$incompleteMessage = '';
 			if (($lease[0]['time_left'] >= 0 && $lease[0]['time_left'] <= 24) && $lease['Document']['lease_ext'] == '') $incompleteMessage = '<p class="incomplete col-xs-12 left push-t">URGENT: Lease needed within 24 hours!</p>';
			if ($lease['TempValues']['field_name'] == 'submit_changes') $incompleteMessage = '<p class="incomplete col-xs-12 left push-t">URGENT: Revisions Submitted!</p>';
			if ($lease['Status']['step'] == 4) $incompleteMessage = '<p class="info col-xs-12 left push-t">Draft Lease Sent: ' . date('l, F jS Y', strtotime($lease['Lease']['modified'])) . '</p>';
			if ($lease[0]['not_approved'] > 0) $incompleteMessage .= '<p class="incomplete col-xs-12 left push-t">This lease contains custom provisions that have not been approved.</p>';
	?>
	
<a name="<?php echo $lease['Lease']['id']; ?>" id="<?php echo $lease['Lease']['id']; ?>"></a>

<div id="lease-wrapper-<?php echo $lease['Lease']['id']; ?>" class="lease-wrapper <?php if ($lease['Status']['step'] == 3) echo 'ready-to-process'; ?> left col-xs-12">

	<div class="acc_overview center col-xs-10" style="position:relative;">
        
        <?php if ($lease['Renewal']['field_value'] == 1) { ?><div class="ribbon-wrapper-purple col-xs-12 left inline"><p><strong style="color:#3665AF;">Renewal</strong></p></div><?php } ?>
        
        <div id="lease-summary-<?php echo $lease['Lease']['id']; ?>" class="acc-ov-summary lease-summary col-xs-12 center" style="position:relative;">
            
            <div class="lease-wrapper-top">
                
                <div class="acc-ov-l left col-xs-9">
                        
                        <p class="push-b"><strong>Address: </strong>
                            <?php
                                echo $lease['Lease']['property_street_address1'];
                                if ($lease['Lease']['property_street_address2'] != '') echo ', Unit No. ' . $lease['Lease']['property_street_address2'];
                                if ($lease['Lease']['property_city'] != '') echo ', ' . $lease['Lease']['property_city'];
                                if ($lease['Lease']['property_state'] != '') echo ', ' . $lease['Lease']['property_state'];
                                if ($lease['Lease']['property_zip_code'] != '') echo ' ' . $lease['Lease']['property_zip_code'];
							?>
                        </p>
                        
                        <div class="col-xs-5-2 left inline">
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
				                <?php $tenants = $tenanto->findAllByLeaseId($lease['Lease']['id']);
                                foreach ($tenants as $k => $tenant) {
                                    echo $tenant['Tenant']['first_name'] . " " . $tenant['Tenant']['last_name'];
                                    if (count($tenants)-1 != $k) echo ", ";
                                }
                                ?>
                            </p>
                        </div>
                        
                        <div class="col-xs-5-2 left inline">
							<p><strong>Matter No.: </strong><?php echo $lease['Lease']['id']; ?></p>
                        </div>
                        
                        <?php echo $incompleteMessage; ?>
                </div>
                
                <div class="acc-ov-r right col-xs-3">
                    
                    <div id="expand-collapse-<?php echo $lease['Lease']['id']; ?>" class="expand-collapse col-xs-12 inline right">
                        <i class="right inline col-xs-1-2 fas fa-plus"></i>
                        <p class="col-xs-9 inline left" alt="expand" title="expand">Expand</p>
                    </div>
                    
                </div>
                
                
            </div>
        </div>

        <div id="lease-detail-<?php echo $lease['Lease']['id']; ?>" class="acc-ov-detail lease-detail center col-xs-12" style="position:relative;">
            
            <div class="lease-wrapper-top">
                
                <div class="acc-ov-l left col-xs-9 inline">
                    
				        <p class="push-b"><strong>Address: </strong>
                            <?php echo $lease['Lease']['property_street_address1'];
                            if ($lease['Lease']['property_street_address2'] != '') echo ', Unit No. ' . $lease['Lease']['property_street_address2'];
                            if ($lease['Lease']['property_city'] != '') echo ', ' . $lease['Lease']['property_city'];
                            if ($lease['Lease']['property_state'] != '') echo ', ' . $lease['Lease']['property_state'];
                            if ($lease['Lease']['property_zip_code'] != '') echo ' ' . $lease['Lease']['property_zip_code'];
                        ?>
                        </p>
                    
                        <div class="col-xs-5-2 left inline">
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
                            <p><strong>County: </strong><?php echo $lease['County']['name']; ?></p>
                            <p><strong>Started By: </strong> <?php echo $lease['p']['first_name'] . ' ' . $lease['p']['last_name']; ?></p>
                        </div>    
                    
                        <div class="col-xs-5-2 left inline">
                            <p><strong>Started: </strong><?php echo date('l, F jS Y', strtotime($lease['Lease']['created'])); ?></p>
							<p><strong>Matter No.: </strong><?php echo $lease['Lease']['id']; ?></p>
							<?php
								if ($lease['Lease']['in_pclaw']) echo '<p><strong>Entered in QuickBooks</strong></p>';
								if (substr($lease['Payment']['transaction_id'], 0, 1) != 'C') echo '<span>Retainer Receipt</span>';
							?>
						</div>
                    
                        <?php echo $incompleteMessage; ?>
                    
                </div>
		
				<div class="acc-ov-r right col-xs-3 inline">
                    
			        <div class="col-xs-12 right">
                        <div class="col-xs-12 inline">
			        	    <?php
			        		if ($lease['Status']['step'] == 5) {
                                echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                                echo '<p class="push-b left">';
                                echo $this->Html->link(__('Create Lease', true),
                                array(
                                    'admin' => true,
                                    'controller' => 'leases',
                                    'action' => 'create_lease',
                                    $lease['Lease']['id'],
                                    $lease['Lease']['county_id']
                                    ), array(
                                        'escape' => false
                                    )
                                );
                                echo '</p>';
				            }
                            ?>
                        </div>
                        <div class="col-xs-12 inline">
                            <?php
                            if ($lease['Status']['step'] == 4) {
                                echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                                echo '<p class="push-b left">';
                                echo $this->Html->link(__('Create Draft', true),
                                array(
                                    'admin' => true,
                                    'controller' => 'leases',
                                    'action' => 'create_lease',
                                    $lease['Lease']['id'],
                                    $lease['Lease']['county_id'],
                                    true
                                    ), array(
                                        'escape' => false
                                    )
                                );
                                echo '</p>';
                            }
                            ?>
                        </div>
                        <?php
                        //Get the current page number
                        $page = 1;
                        if (isset($this->request->params['named']['page'])) $page = $this->request->params['named']['page'];
                        ?>
                        <div class="col-xs-12 inline">
                            <?php
                            //-- Add a link to the lease details page
                            echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                            echo '<p class="push-b left">';
                            echo $this->Html->link(__('Detailed Lease Information', true), array('action' => 'edit', $lease['Lease']['id'], $page));
                            echo '</p>';
                            ?>
                        </div>
                        <div class="col-xs-12 inline">
                            <?php   
                            //-- Add a link to upload documents
                            echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                            echo '<p class="push-b left">';
                            echo $this->Html->link(__('Upload Documents', true), array('action' => 'upload_documents', $lease['Lease']['id'], $page));
                            echo '</p>';
                            ?>
                        </div>
                        <div class="col-xs-12 inline">
                            <?php
                            //-- Add a link to the lease
                            if (!empty($lease['Document']['lease_ext']) || !empty($lease['Document']['set_ext'])) {
                                $path = str_replace('leases', '', $lease['Document']['path']);
                                $year = '20' . substr($path, 1, 2);
                                if ($lease['Status']['step'] == 5) {
                                            $title = ' Lease Agreement';
                                            $filename = '_residential_lease_agreement.pdf';
                                        } else if ($lease['Status']['step'] == 4) {
                                            $title = ' Lease Agreement (DRAFT)';
                                            $filename = '_residential_lease_agreement_DRAFT.pdf';
                                }
                                echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                                echo '<p class="push-b left">';
                                echo $this->Html->link(
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
                                );
                                echo '</p>';
                            }
                            ?>
                        </div>
                        <?php
                        //-- Add a link to cancel the lease
                        if ($lease['Lease']['is_cancelled'] != 1) {
                            if (AuthComponent::user('role') == 'superadmin') {
                                echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                                echo '<p class="push-b left">';
                                echo $this->Html->link(__('Transfer to QuickBooks', true), array('admin' => true, 'action' => 'transferToQuickbooks', $lease['Lease']['id']), null, 'Are you sure you want to transfer this lease to QuickBooks?');
                                echo '</p>';
                            }
                            echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                            echo '<p class="push-b left">';
                            echo $this->Html->link(__('Cancel this lease', true), array('admin' => true, 'action' => 'cancelLease', $lease['Lease']['id'], $page), null, 'Are you sure you want to cancel this lease?');
                            '</p>';
                        }
                        ?>
			        </div>
                    
                    <div id="expand-collapse-<?php echo $lease['Lease']['id']; ?>" class="expand-collapse col-xs-12 inline right">
                        <i class="right inline col-xs-1-2 fas fa-minus"></i>
                        <p class="col-xs-9 inline left" alt="expand" title="expand">Show less</p>
                    </div>
                    
		        </div>
                
                <div class="status-wrapper left col-xs-12">
                    <p>
                        <strong>Notice Status: </strong>
                        <?php
                            echo '<strong>Lease Needed By:</strong> ';
                            if (strlen($lease['Lease']['requested_by']) > 10) echo date('l, F jS Y - g:ia', strtotime($lease['Lease']['requested_by']));
                            else echo date('l, F jS Y', strtotime($lease['Lease']['requested_by']));
                        ?>
                    </p>
                </div>
                
            </div>
            
        </div>
        
    </div>
    
</div>

<?php endforeach ?>

<p>
		<?php
			echo $this->Paginator->counter(array(
				'format' =>'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'
			));
		?>
	</p>
	
<div class="paging">
		<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?> | <?php echo $this->Paginator->numbers();?> | <?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
	</div>
