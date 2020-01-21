<?php
	if ($page == '') $page = 1;
?>

<p>
		<?php
			echo $this->Paginator->counter(array(
				'format' =>'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'
			));
		?>
</p>
<div class="paging">
		<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class' => 'disabled'));?> | <?php echo $this->Paginator->numbers();?> | <?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>


<?php foreach ($notices as $notice): ?>
	
<a name="<?php echo $notice['Notice']['id']; ?>" id="<?php echo $notice['Notice']['id']; ?>"></a>

<div id="notice-wrapper-<?php echo $notice['Notice']['id']; ?>" class="notice-wrapper <?php if ($notice['Status']['id'] == 91) echo 'ready-to-process'; ?> left col-xs-12 push-b">
    
    <div class="acc_overview center col-xs-10" style="position:relative;">
        
        <!-- NOTICE SUMMARY BOX -->
        <div id="notice-summary-<?php echo $notice['Notice']['id']; ?>" class="acc-ov-summary notice-summary center col-xs-12" style="position:relative;">
            
            <div class="notice-wrapper-top">
                
                <div class="acc-ov-l left col-xs-9">
                        
                        <p class="push-b"><strong>ADDRESS: </strong>
                            <?php
                            echo $notice['Notice']['property_street_address1'];
                            if ($notice['Notice']['property_street_address2'] != '') echo ', Unit No. ' . $notice['Notice']['property_street_address2'];
                            if ($notice['Notice']['property_city'] != '') echo ', ' . $notice['Notice']['property_city'];
                            if ($notice['Notice']['property_state'] != '') echo ', ' . $notice['Notice']['property_state'];
                            if ($notice['Notice']['property_zip_code'] != '') echo ' ' . $notice['Notice']['property_zip_code'];
							?>
                        </p>
                        
                            <?php
                                echo '<p><strong>Landlord: </strong>' . $notice['Notice']['contact_first_name'] . ' ' . $notice['Notice']['contact_last_name'] . '</p>';
                            ?>

                            <p><strong>Tenant(s): </strong>
                                <?php
                                    $strTenantNotices = '';
                                    $tenants = $this->requestAction('admin/notices/getTenants/' . $notice['Notice']['id']);
                                    foreach ($tenants as $tenant) {
                                        $strTenantNotices .= $tenant['TenantNotice']['first_name'] . ' ' . $tenant['TenantNotice']['last_name'] . ', ';
                                    }
                                    echo substr($strTenantNotices, 0, strlen($strTenantNotices)-2);
                                ?>
                            </p>

                            <p><strong>Matter No.: </strong><?php echo $notice['Notice']['id']; ?></p>
                    
                    <?php
                    if ($notice['Document']['signed_notice_ext'] == 'pdf' && $notice['Status']['step'] < 5) echo '<p class="incomplete alert col-xs-12 push-t left">Client requested posting of Notice to Pay</p>';
                    if ($notice['ContactClient']['field_value'] == 1) echo '<p class="incomplete alert col-xs-12 push-t left">Contact Client within 24 Hours regarding Notice to Pay!</p>';
                    if ($notice['NoticeSent']['field_value'] == 1) echo '<p class="incomplete alert col-xs-12 push-t left">Blank Notice to Pay Sent to Client</p>';
                    ?>
                    
                    
                </div>
                
                <div class="acc-ov-r right col-xs-3">

                    <div class="col-xs-12 right">
                        
                        <?php
                            echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                            echo '<p class="push-b left">';
                            echo '<a href="#" onclick="return false;" class="update_status" id="' . $notice['Notice']['id'] . '">Update Status</a>';
                            echo '</p>';
                        ?>
                        
                    </div>
                    
                    <div id="expand-collapse-<?php echo $notice['Notice']['id']; ?>" class="expand-collapse col-xs-12 inline right">
                        <i class="right inline col-xs-1-2 fas fa-plus"></i>
                        <p class="col-xs-9 inline left" alt="expand" title="expand">Expand</p>
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
        <!-- NOTICE DETAILED BOX -->
        <div id="notice-detail-<?php echo $notice['Notice']['id']; ?>" class="acc-ov-detail notice-detail center col-xs-12" style="position:relative;">
            
            <div class="acc-ov-l left col-xs-9">
                
                <p class="push-b">ADDRESS: <?php echo $notice['Notice']['property_street_address1'];
                    if ($notice['Notice']['property_street_address2'] != '') echo ', Unit No. ' . $notice['Notice']['property_street_address2'];
                    if ($notice['Notice']['property_city'] != '') echo ', ' . $notice['Notice']['property_city'];
                    if ($notice['Notice']['property_state'] != '') echo ', ' . $notice['Notice']['property_state'];
                    if ($notice['Notice']['property_zip_code'] != '') echo ' ' . $notice['Notice']['property_zip_code'];
                    ?>
                </p>
                
                <div class="col-xs-5-2 left inline">
                
                    <p><strong>Started:</strong>
                        <?php echo date('l, F jS Y', strtotime($notice['Notice']['created'])) . ' <strong>By:</strong> ' . $notice['p']['first_name'] . ' ' . $notice['p']['last_name']; ?>
                    </p>
                
                    <?php echo '<p><strong>Landlord: </strong>' . $notice['Notice']['contact_first_name'] . ' ' . $notice['Notice']['contact_last_name'] . '</p>'; ?>
                    
                    <p><strong>Matter No.: </strong><?php echo $notice['Notice']['id']; ?></p>
                    
                </div>
                
                <div class="col-xs-5-2 left inline">
                
                    <p><strong>Tenant(s): </strong>
                        <?php
                        $strTenantNotices = '';
                        $tenants = $this->requestAction('admin/notices/getTenants/' . $notice['Notice']['id']);
                        foreach ($tenants as $tenant) {
                            $strTenantNotices .= $tenant['TenantNotice']['first_name'] . ' ' . $tenant['TenantNotice']['last_name'] . ', ';
                        }
                        echo substr($strTenantNotices, 0, strlen($strTenantNotices)-2);
                        ?>
                    </p>
                
                    <p><strong>County: </strong><?php echo $notice['County']['name']; ?></p>
                    <?php
                    if ($notice['Notice']['in_pclaw']) echo '><p><strong>Entered in QuickBooks</strong></p>';
                    if (substr($notice['Payment']['transaction_id'], 0, 1) != 'C') echo '<br /><span style="color:#FF0000;">Retainer Receipt</span>';
                    ?>
                    
                </div>
                
                <?php
                    if ($notice['Document']['signed_notice_ext'] == 'pdf' && $notice['Status']['step'] < 5) echo '<p class="incomplete alert col-xs-12 push-t left">Client requested posting of Notice to Pay</p>';
                    if ($notice['ContactClient']['field_value'] == 1) echo '<p class="incomplete alert col-xs-12 push-t left">Contact Client within 24 Hours regarding Notice to Pay!</p>';
                    if ($notice['NoticeSent']['field_value'] == 1) echo '<p class="incomplete alert col-xs-12 push-t left">Blank Notice to Pay Sent to Client</p>';
                ?>
                
            </div>
            
            <div class="acc-ov-r right col-xs-3">
                
                <div class="col-xs-12 right">
                    
                    <?php
                    echo '<div class="form_options col-xs-12">';
                        //-- Add a link to the notice details page
                        echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                        echo '<p class="push-b left">';
                        echo $this->Html->link(__('Detailed Case Information', true), array('action' => 'edit', $notice['Notice']['id'], $page));
                        echo '</p>';
                        
                        if ($notice['Status']['step'] >= 3 && $notice['Status']['step'] < 7) {
                            //-- Add a link to create the Notice to Pay
                            echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                            echo '<p class="push-b left">';
                            echo $this->Html->link(__('Create/Send Notice to Pay', true), array('action' => 'create_notice', $notice['Notice']['id'], $page));
                            echo '</p>';
                            
                            //-- Add a link to upload faxed documents and reject 3 day notice & lease agreement
                            echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                            echo '<p class="push-b left">';
                            echo $this->Html->link(__('Upload Required Documents', true), array('action' => 'upload_documents', $notice['Notice']['id'], $page));
                            echo '</p>';
                            
                            if ($notice['Document']['signed_notice_ext'] == "pdf" || $notice['Document']['lease_ext'] == "pdf") {
                                echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                                echo '<p class="push-b left">';
                                echo $this->Html->link(__('Reject Client Documents', true), array('action' => 'reject_docs', $notice['Notice']['id'], $page));
                                echo '</p>';
                            }
			            }
                        
                        //-- Add links to the uploaded documents
                        foreach ($document_types as $document_type) {
                            echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                            echo '<p class="push-b left">';
                            echo $this->element('admin_file_download_link', array('document_type' => $document_type, 'document' => $notice['Document']));
                            echo '</p>';
                        }
                        if ($notice['Notice']['is_cancelled'] != 1) {
                            echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                            echo '<p class="push-b left">';
                            echo $this->Html->link(__('Cancel this notice', true), '#', array('class' => 'cancel', 'id' => $notice['Notice']['id']));
                            echo '</p>';
		            	}

		            	if ($notice['Notice']['is_cancelled'] == 1 && $listType == 'can') {
                            echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                            echo '<p class="push-b left">';
                            echo $this->Html->link(__('Restore this notice', true), '#', array('class' => 'restore', 'id' => $notice['Notice']['id']));
                            echo '</p>';
		            	}
                    echo '</div>'
                    ?>
                
                </div>
                
                <div id="expand-collapse-<?php echo $notice['Notice']['id']; ?>" class="expand-collapse col-xs-12 inline right">
                        <i class="right inline col-xs-1-2 fas fa-minus"></i>
                        <p class="col-xs-9 inline left" alt="expand" title="expand">Show less</p>
                </div>
            
            </div>
            
        </div>
        
        <div class="status-wrapper left col-xs-12">
            <p>
                <strong>Notice Status: </strong>
                <?php
                $status = '';
                foreach (Configure::read('status_date_steps') as $key => $status_date_step) {
                    if ($notice['Status']['step'] == $key) $status = format_status($notice['Status']['name'], $notice['Notice'][$status_date_step]);
                }
                if ($status == '') echo $notice['Status']['name'];
                else echo $status;
                ?>
            </p>
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


