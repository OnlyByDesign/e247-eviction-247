<p>
		<?php
			echo $this->Paginator->counter(array(
				'format' =>'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'
			));
		?>
</p>
<div class="paging push-b">
		<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class' => 'disabled'));?> | <?php echo $this->Paginator->numbers();?> | <?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>	

<?php
foreach ($evictions as $eviction):
    $message = '';
    $insertSeparator = false;
    if ($eviction['Eviction']['need_three_day_notice'] == 1 && $eviction['Document']['notice_ext'] == '') {
        $message = 'Client requested a Notice to Pay';
        $insertSeparator = true;
    }
    if ($eviction['Eviction']['three_day_notice_option_id'] == 3 && $eviction['Status']['step'] < 5 && $eviction['PreviousStatus']['step'] != 6) {
        if ($insertSeparator) $message .= ' / ';
        $message .= 'Client requested posting of Notice to Pay';
    }
    if (isset($eviction['ContactClient']['field_value'])) if ($eviction['ContactClient']['field_value'] == 1) $message .= 'Contact Client within 24 Hours regarding Notice to Pay!';
    if (isset($eviction['NoticeToEviction']['field_value'])) if ($eviction['NoticeToEviction']['field_value'] == 1) $message .= 'Notice to Pay Posted.  Upload Affidavit of Service.';
    if (isset($eviction['NoticeExpired']['field_value'])) if ($eviction['NoticeExpired']['field_value'] == 1) $message .= 'Notice to Pay Expired. Proceed with Eviction!';
    if ($eviction['WritRequested']['field_value'] == 1) {
        if ($message != '') $message .= '<br />';
        $message .= 'Writ of Possession Requested on ' . date('l, F jS Y', strtotime($eviction['WritRequestedDate']['field_value']));
    }
?>
	
<a name="<?php echo $eviction['Eviction']['id']; ?>" id="<?php echo $eviction['Eviction']['id']; ?>"></a>

<div id="eviction-wrapper-<?php echo $eviction['Eviction']['id']; ?>" class="eviction-wrapper <?php if ($eviction['Status']['id'] == 9 || $eviction['Status']['id'] == 15) echo 'ready-to-process'; ?> left col-xs-12 push-b">
    
    <div class="acc_overview center col-xs-10" style="position:relative;">
        
        <!-- EVICTION SUMMARY BOX -->
        <div id="eviction-summary-<?php echo $eviction['Eviction']['id']; ?>" class="acc-ov-summary eviction-summary center col-xs-12" style="position:relative;">
            
            <div class="eviction-wrapper-top">
                
                <div class="acc-ov-l left col-xs-9">
                    
                    <p class="push-b"><strong>Address: </strong>
                        <?php
                            echo $eviction['Eviction']['property_street_address1'];
                            if ($eviction['Eviction']['property_street_address2'] != '') echo ', Unit No. ' . $eviction['Eviction']['property_street_address2'];
                            if ($eviction['Eviction']['property_city'] != '') echo ', ' . $eviction['Eviction']['property_city'];
                            if ($eviction['Eviction']['property_state'] != '') echo ', ' . $eviction['Eviction']['property_state'];
                            if ($eviction['Eviction']['property_zip_code'] != '') echo ' ' . $eviction['Eviction']['property_zip_code'];
                        ?>
                    </p>
                    
                    <div class="col-xs-5-2 left inline">
                    
                        <?php
                        if ($eviction['Eviction']['property_owner_is_company'] == 1) echo '<p><strong>Plaintiff: </strong>' . $eviction['Eviction']['property_owner_company'] . '</p>';
                        else echo '<p><strong>Plaintiff: </strong>' . $eviction['Eviction']['property_owner_first_name'] . ' ' . $eviction['Eviction']['property_owner_last_name'] . '</p>';
                        ?>

                        <p><strong>Defendant(s): </strong>
                            <?php
                                $strDefendants = '';
                                $defendants = $this->requestAction('admin/evictions/getDefendants/' . $eviction['Eviction']['id']);
                                foreach ($defendants as $defendant) {
                                    $strDefendants .= $defendant['Defendant']['first_name'] . ' ' . $defendant['Defendant']['last_name'] . ', ';
                                }
                                echo substr($strDefendants, 0, strlen($strDefendants)-2);
                            ?>
                        </p>
                        
                    </div>
                    
                    <div class="col-xs-5-2 left inline">
                        
                        <p><strong>Matter No.: </strong><?php echo $eviction['Eviction']['id']; ?></p>
                        
                    </div>
                    
                    <?php
                    if ($message != '') echo '<p class="incomplete alert col-xs-12 push-t left">' . $message . '</p>';
                    if ($eviction['Eviction']['in_settlement']) echo '<p class="incomplete alert col-xs-12 push-t left"><strong>Pending Settlement with the Defendant.</p>';
                    if ($eviction['Eviction']['is_contested']) echo '<p class="incomplete alert col-xs-12 push-t left"><strong>Tenant is Contesting the Eviction.</p>';
                    ?>
                    
                </div>
                
                <div class="acc-ov-r right col-xs-3">
                    
                    <?php if (!$eviction['Eviction']['is_contested']) { ?>
                        <div class="col-xs-12 right">

                            <div id="formOptionsTrig" class="col-xs-12 left">
                                <p class="inline center">Lease options</p>
                                <i class="inline center fa fa-caret-right" aria-hidden="true"></i>
                            </div>

                            <?php
                            echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                            echo '<p class="push-b left">';
                            echo '<a href="#" onclick="return false;" class="update_status" id="' . $eviction['Eviction']['id'] . '">Update Status</a>';
                            echo '</p>';
                            ?>

                        </div>
                    <?php } ?>
                    
                    <div id="expand-collapse-<?php echo $eviction['Eviction']['id']; ?>" class="expand-collapse col-xs-12 inline right">
                        <i class="right inline col-xs-1-2 fas fa-plus"></i>
                        <p class="col-xs-9 inline left" alt="expand" title="expand">Expand</p>
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
        <!-- EVICTION DETAILED BOX -->
        <div id="eviction-detail-<?php echo $eviction['Eviction']['id']; ?>" class="acc-ov-detail eviction-detail center col-xs-12" style="position:relative;">
            
            <div class="eviction-wrapper-top">
                
                <div class="acc-ov-l left col-xs-9">
                    
                    <p class="push-b"><strong>Address: </strong>
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
                            <?php echo date('l, F jS Y', strtotime($eviction['Eviction']['created'])) . ' <strong>By:</strong> ' . $eviction['p']['first_name'] . ' ' . $eviction['p']['last_name']; ?>
                        </p>

                        <p><strong>Matter No.: </strong><?php echo $eviction['Eviction']['id']; ?></p>

                        <?php
                        if (!empty($eviction['Eviction']['property_owner_first_name']) && !empty($eviction['Eviction']['property_owner_last_name'])) { ?>

                        <p><strong>Plaintiff: </strong> <?=$eviction['Eviction']['property_owner_first_name']?> <?=$eviction['Eviction']['property_owner_last_name']?></p>

                        <?php } else if (!empty($eviction['Eviction']['property_owner_company'])) { ?>

                        <p><strong>Plaintiff: </strong><?=$eviction['Eviction']['property_owner_company']?></p>

                        <?php } ?>
                        
                    </div>
                    
                    <div class="col-xs-5-2 left inline">
                        
                        <p><?php echo "<strong>Case Type:</strong> " . $eviction['Service']['name']; ?></p>

                        <p><strong>Defendant(s): </strong>
                            <?php
                                    $strDefendants = '';
                                    $defendants = $this->requestAction('admin/evictions/getDefendants/' . $eviction['Eviction']['id']);
                                    foreach ($defendants as $defendant) {
                                        $strDefendants .= $defendant['Defendant']['first_name'] . ' ' . $defendant['Defendant']['last_name'] . ', ';
                                    }
                                    echo substr($strDefendants, 0, strlen($strDefendants)-2);
                            ?>
                        </p>

                        <p><strong>County: </strong><?php echo $eviction['County']['name']; ?></p>

                        <?php
                        if ($eviction['Eviction']['in_pclaw']) echo '<br /><p><strong>Entered in QuickBooks</strong></p>';
                        if (substr($eviction['Payment']['transaction_id'], 0, 1) != 'C') echo '<br /><span style="color:#FF0000;">Retainer Receipt</span>';
                        ?>
                        
                    </div>
                    
                    <?php if ($message != '') echo '<p class="incomplete alert col-xs-12 push-t left">' . $message . '</p>'; ?>
                    
                    <div class="status-wrapper left col-xs-12 push-t">
                        <p>
                            <strong>Eviction Status: </strong>
                            <?php
                            $status = '';
                            foreach ($status_date_fields as $key => $status_date_step) {
                                if ($eviction['Status']['id'] == $key) {
                                    $status = format_status($eviction['Status']['name'], $eviction['Eviction'][$status_date_step]);
                                    if (strpos($status, 'time') > 0) $status = str_replace('{time}', $eviction['Eviction'][$status_date_step . '_hearing_time'], $status);
                                    break;
                                }
                            }
                            if ($status == '') echo $eviction['Status']['name'];
                            else echo $status;
                            ?>
                        </p>
                        <p>
                            <?php
                            echo '<strong>Action date:</strong> ';
                            if ($eviction['EvictionActionDate']['action_date'] != null) echo date('l, F jS Y', strtotime($eviction['EvictionActionDate']['action_date']));
                            ?>
                        </p>
                        <p>
                            <?php if ($eviction['Eviction']['service_id'] == '3') { ?>
                                <strong>Damages Status:</strong>
                                <?php echo format_status($eviction['DamagesStatus']['name'], $eviction['Eviction']['damages_status_date']);
                            }
                            ?>
                        </p>
                        <p>
                            <?php
                                if ($eviction['Eviction']['in_settlement']) echo '<p class="red"><strong>Pending Settlement with the Defendant.</p>';
                                if ($eviction['Eviction']['is_contested']) echo '<p class="red"><strong>Tenant is Contesting the Eviction.</p>';
                            ?>
                        </p>
                    </div>
                    
                </div>
            
                <div class="acc-ov-r right col-xs-3">
                    
                    <div class="col-xs-12 right">
                        <?php
                        echo '<div class="form_options col-xs-12">';
                        
                            //-- Add a link to create the documents
			        		if (($eviction['Document']['lease_ext'] == 'pdf' && $eviction['Document']['signed_notice_ext'] == 'pdf') || ($eviction['Document']['signed_notice_ext'] == 'pdf' && $eviction['Eviction']['oral_lease'] == 1)) {
                                echo '<div class="col-xs-12 left inline"><i class="right inline fas fa-chevron-circle-right"></i>';
                                echo '<p class="push-b left">';
                                echo $this->Html->link(__('Create Pleadings', true),
                                    array(
                                    'admin' => true,
                                    'controller' => 'documentTemplates',
                                    'action' => 'parse',
                                    $eviction['Eviction']['id'],
                                    $eviction['Eviction']['service_id'],
                                    $eviction['Eviction']['county_id']
                                ), array(
                                        'escape' => false
                                    )
                                );
                                echo '</p></div>';
                            }
                        
                        //-- Add a link to create amended documents
                        if (($eviction['Document']['lease_ext'] == 'pdf' && $eviction['Document']['signed_notice_ext'] == 'pdf') || ($eviction['Document']['signed_notice_ext'] == 'pdf' && $eviction['Eviction']['oral_lease'] == 1)) {
                            echo '<div class="col-xs-12 left inline"><i class="right inline fas fa-chevron-circle-right"></i>';
                            echo '<p class="push-b left">';
                            echo $this->Html->link(__('Create Amended Pleadings', true),
			                array(
			                    'admin' => true,
			                    'controller' => 'documentTemplates',
			                    'action' => 'parse_amended',
			                    $eviction['Eviction']['id'],
			                    $eviction['Eviction']['service_id'],
			                    $eviction['Eviction']['county_id']
			                ), array(
			                    'escape' => false
                            ));
                            echo '</p></div>';
                        }	
		
                        //-- Add a link to the eviction details page
                        echo '<div class="col-xs-12 left inline"><i class="right inline fas fa-chevron-circle-right"></i>';
                        echo '<p class="push-b left">';
                        echo $this->Html->link(__('Detailed Case Information', true), array('action' => 'edit', $eviction['Eviction']['id'], $page));
                        echo '</p></div>';
                        
                        echo '<div class="col-xs-12 left inline"><i class="right inline fas fa-chevron-circle-right"></i>';
                        echo '<p class="push-b left">';
                        echo $this->Html->link('Eviction Status Timeline', array('action' => 'status', $eviction['Eviction']['id']));
                        echo '</p></div>';
                        
                        if ($eviction['Status']['step'] >= 3 && $eviction['Status']['step'] <= 13) {
                            //-- Add a link to create the Notice to Pay
                            echo '<div class="col-xs-12 left inline"><i class="right inline fas fa-chevron-circle-right"></i>';
                            echo '<p class="push-b left">';
                            echo $this->Html->link(__('Create/Send Notice to Pay', true), array('action' => 'create_notice', $eviction['Eviction']['id'], $page));
                            echo '</p></div>';
                            
                            //-- Add a link to upload faxed documents and reject 3 day notice & lease agreement
                            echo '<div class="col-xs-12 left inline"><i class="right inline fas fa-chevron-circle-right"></i>';
                            echo '<p class="push-b left">';
                            echo $this->Html->link(__('Upload Required Documents', true), array('action' => 'upload_documents', $eviction['Eviction']['id'], $page));
                            echo '</p></div>';
                            
                            if ($eviction['Document']['signed_notice_ext'] == "pdf" || $eviction['Document']['lease_ext'] == "pdf") {
                                echo '<div class="col-xs-12 left inline"><i class="right inline fas fa-chevron-circle-right"></i>';
                                echo '<p class="push-b left">';
                                echo $this->Html->link(__('Reject Client Documents', true), array('action' => 'reject_docs', $eviction['Eviction']['id'], $page));
                                echo '</p></div>';
                            }
                            
			            }
                        
                        //-- Add a link to the pleadings
                        if (!empty($eviction['Document']['set_ext'])) {
                            echo '<div class="col-xs-12 left inline"><i class="right inline fas fa-chevron-circle-right"></i>';
                            echo '<p class="push-b left">';
                            echo $this->Html->link(__('Pleadings', true), array('admin' => true, 'action' => 'listDocuments', $eviction['Eviction']['id']));
                            echo '</p></div>';
                        }
                        
                        if ($eviction['Eviction']['is_cancelled'] != 1) {
                            if (AuthComponent::user('role') == 'superadmin') {
                                echo '<div class="col-xs-12 left inline"><i class="right inline fas fa-chevron-circle-right"></i>';
                                echo '<p class="push-b left">';
                                echo $this->Html->link(__('Transfer to QuickBooks', true), array('admin' => true, 'action' => 'transferToQuickbooks', $eviction['Eviction']['id']), null, 'Are you sure you want to transfer this eviction to QuickBooks?');
                                echo '</p></div>';
                            }
                            
                            //-- Add a link to cancel the eviction
                            echo '<div class="col-xs-12 left inline"><i class="right inline fas fa-chevron-circle-right"></i>';
                            echo '<p class="push-b left">';
                            echo $this->Html->link(__('Cancel this eviction', true), '#', array('class' => 'cancel', 'id' => $eviction['Eviction']['id']));
                            echo '</p></div>';
		            	}
                        
                        if ($eviction['Eviction']['is_cancelled'] == 1 && $listType == 'can') {
                            echo '<div class="col-xs-12 left inline"><i class="right inline fas fa-chevron-circle-right"></i>';
                            echo '<p class="push-b left">';
                            echo $this->Html->link(__('Restore this eviction', true), '#', array('class' => 'restore', 'id' => $eviction['Eviction']['id']));
                            echo '</p></div>';
                        }
                        
                        //-- Add links to the uploaded documents
                        foreach ($document_types as $document_type) {
                            echo '<div class="col-xs-12 left inline"><p class="left">';
                            echo $this->element('admin_file_download_link', array('document_type' => $document_type, 'document' => $eviction['Document']));
                            echo '</p></div>';
                        }
                        
                        echo '</div>';
                        
                    ?>
                    </div>
                    
                    <div id="expand-collapse-<?php echo $eviction['Eviction']['id']; ?>" class="expand-collapse col-xs-12 inline right push-t">
                            <i class="right inline col-xs-1-2 fas fa-minus"></i>
                            <p class="col-xs-9 inline left" alt="expand" title="expand">Show less</p>
                        </div>
                    
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
		<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?> | <?php echo $this->Paginator->numbers();?> | <?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled')); ?>
</div>