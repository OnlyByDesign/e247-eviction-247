<?php
	if (!empty($notices)) {
        
		foreach ($notices as $notice) { //debug($notice);
        $editable = in_array($notice['Notice']['status_id'], $editable_status_ids);
        $hasNotification = in_array($notice['Notice']['id'], $notification_ids);
        $strAction = '';
        if ($notice['Notice']['is_faxed']) $strAction = "fax or upload";
        else $strAction = "upload";
        $incompleteMessage = '';
        if ($editable) $incompleteMessage = '<p class="incomplete alert col-xs-12 push-t left">Incomplete Submission: please provide additional information so we can process your Notice!</p>';
        elseif ($notice['Status']['step'] == 3) {
        switch ($notice['Status']['id']) {
        //Missing Lease Agreement
        case 90:
        $incompleteMessage = '<p class="incomplete alert col-xs-12 push-t left">Incomplete Submission: please ' . $strAction . ' the Lease Agreement so we can process your Notice!</p>';
            break;
        }

        //Display a message to let the client know that they need to sign and upload/fax the Notice to Pay
        } else if ($notice['Status']['step'] == Configure::read('Step_status_information_received') && $notice['NoticeSent']['field_value'] == 1) {
        if ($notice['User']['use_signature'] == 1) $incompleteMessage = '<p class="incomplete alert col-xs-12 push-t left">Incomplete Submission: please electronically sign the Notice so we can proceed!</p>';
        else $incompleteMessage = '<p class="incomplete alert col-xs-12 push-t left">Incomplete Submission: please ' . $strAction . ' the signed Notice so we can proceed!</p>';
        //Display a link to allow the user to let us know if we should proceed with the eviction
        } else if ($notice['Status']['step'] == Configure::read('Step_status_notice_posted') && $notice['ContactClient']['field_value'] != 1) {
        $incompleteMessage = '<p class="incomplete alert col-xs-12 push-t left">Please ' . $this->Html->link('click here', array('controller' => 'notices', 'action' => 'notice_expired', $notice['Notice']['id'])) . ' to notify us on the outcome of the posting of the Notice to Pay.</p>';

        //Display a message to let the client know we have received their contact request
        } else if ($notice['Status']['step'] == Configure::read('Step_status_notice_posted') && $notice['ContactClient']['field_value'] == 1) {
        $incompleteMessage = '<p class="incomplete alert col-xs-12 push-t left">We have Received your Request and will Contact you Within 24 Hours.</p>';
            
    }
?>

<a name="<?php echo $notice['Notice']['id']; ?>" id="<?php echo $notice['Notice']['id']; ?>"></a>

<div id="notice-wrapper-<?php echo $notice['Notice']['id']; ?>" class="notice-wrapper <?php if ($editable || $notice['Status']['step'] == 3) echo 'editable'; ?> left col-xs-12 push-b">

    <div class="acc_overview center col-xs-10" style="position:relative;">

        <!-- NOTICE SUMMARY BOX -->
        <div id="notice-summary-<?php echo $notice['Notice']['id']; ?>" class="acc-ov-summary notice-summary <?php if ($editable || $notice['Status']['step'] == 3) echo 'editable-summary'; ?> center col-xs-12" style="position:relative;">
            <div class="notice-wrapper-top">

                <div class="acc-ov-l left col-xs-9">

                    <p class="push-b">
                        <?php if ($editable) ?>
                            <strong>Address: </strong><?php echo $notice['Notice']['property_street_address1'];
                            if ($notice['Notice']['property_street_address2'] != '') echo ', Unit No. ' . $notice['Notice']['property_street_address2'];
                            if ($notice['Notice']['property_city'] != '') echo ', ' . $notice['Notice']['property_city'];
                            if ($notice['Notice']['property_state'] != '') echo ', ' . $notice['Notice']['property_state'];
                            if ($notice['Notice']['property_zip_code'] != '') echo ' ' . $notice['Notice']['property_zip_code'];
                        ?>
                    </p>

                    <div class="col-xs-5-2 left inline">
                        <p><strong>Tenant(s): </strong>
                            <?php
                                $tenants = $tenanto->findAllByNoticeId($notice['Notice']['id']);
                                foreach ($tenants as $k => $tenant) {
                                    echo $tenant['TenantNotice']['first_name'] . " " . $tenant['TenantNotice']['last_name'];
                                    if (count($tenants)-1 != $k) echo ", ";
                                }
                            ?>
                        </p>
                    </div>

                    <div class="col-xs-5-2 left inline">  
                        <?php if ($this->Session->read("Is_Superuser") == 1) echo '<p><strong>Started By: </strong>' . $notice['Profile']['first_name'] . ' ' . $notice['Profile']['last_name'] . '</p>'; ?>
                        <p><strong>Matter No.: </strong><?php echo $notice['Notice']['id']; ?></p>
                    </div>

                    <?php if ($incompleteMessage <> '') echo $incompleteMessage; ?>

                </div>

                <div class="acc-ov-r right col-xs-2">

                    <div class="col-xs-12 right">

                         <div id="formOptionsTrig" class="col-xs-12 left">
                            <p class="inline center">Lease options</p>
                            <i class="inline center fa fa-caret-right" aria-hidden="true"></i>
                        </div>

                        <?php
                            echo '<div class="form_options col-xs-12">';
                            if ($editable) {
                                //-- Add the Continue link
                                if ($editable) {
                                    echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                                    echo '<p class="push-b left">';
                                    //If the status is Payment Received, send the user to the Notice Information Sheet
                                    if ($notice['Status']['step'] == 1) echo $this->Html->link('Continue', array('controller' => 'notices', 'action' => 'edit', $notice['Notice']['id']));
                                    //If the status is Information Provided...
                                    elseif ($notice['Status']['step'] == 2) {
                                        echo $this->Html->link('Continue', array('controller' => 'notification_notices', 'action' => 'index', $notice['Notice']['id']));
                                    }
                                    echo '</p>';
                                }
                            }

                            if ($notice['Document']['notice_ext'] != '' && $notice['Document']['signed_notice_ext'] == '' && $notice['Status']['step'] == Configure::read('Step_status_information_received') /* < 18*/) { ?>
                                <i class="right inline fas fa-chevron-circle-right"></i>
                                <p class="push-b left">
                                <?php
                                    //Get the current page number
                                    $page = 1;
                                    if (isset($this->request->params['named']['page'])) $page = $this->request->params['named']['page'];
                                    if ($notice['User']['use_signature'] == 1) echo $this->Html->link('Sign Notice to Pay', array('controller' => 'notices', 'action' => 'sign_notice', $notice['Notice']['id'], $page), array('style' => 'text-align:center;padding:0;'));
                                    else echo $this->Html->link('Upload Signed Notice', array('controller' => 'notices', 'action' => 'upload_notice', $notice['Notice']['id'], $page));
                                ?>
                            </p>
                        <?php }
                        echo '</div>'; ?>
                    </div>

                    <div id="expand-collapse-<?php echo $notice['Notice']['id']; ?>" class="expand-collapse col-xs-12 inline right">
                        <i class="right inline col-xs-1-2 fas fa-minus"></i>
                        <p class="col-xs-9 inline left" alt="expand" title="expand">Expand</p>
                    </div>

                </div>

            </div>
        </div>

            <!-- NOTICE DETAILED BOX -->
        <div id="notice-detail-<?php echo $notice['Notice']['id']; ?>" class="acc-ov-detail notice-detail <?php if ($editable || $notice['Status']['step'] == 3) echo 'editable-detail'; ?> center col-xs-12" style="position:relative;">
            <div class="notice-wrapper-top">

                <div class="acc-ov-l left col-xs-9">

                    <p class="push-b">
                             <?php if ($editable) ?>
                            <strong>ADDRESS: </strong> 
                            <?php
                                echo $notice['Notice']['property_street_address1'];
                                if ($notice['Notice']['property_street_address2'] != '') echo ', Unit No. ' . $notice['Notice']['property_street_address2'];
                                if ($notice['Notice']['property_city'] != '') echo ', ' . $notice['Notice']['property_city'];
                                if ($notice['Notice']['property_state'] != '') echo ', ' . $notice['Notice']['property_state'];
                                if ($notice['Notice']['property_zip_code'] != '') echo ' ' . $notice['Notice']['property_zip_code'];
                            ?>
                        </p>

                    <div class="col-xs-5-2 left inline">

                            <p><strong>Started:</strong>
                                <?php echo date('l, F jS Y', strtotime($notice['Notice']['created'])); ?>
                            </p>

                            <p><strong>Tenant(s): </strong>
                                <?php
                                    $tenants = $tenanto->findAllByNoticeId($notice['Notice']['id']);

                                        foreach ($tenants as $k => $tenant) {
                                        echo $tenant['TenantNotice']['first_name'] . " " . $tenant['TenantNotice']['last_name'];
                                        if (count($tenants)-1 != $k) echo ", ";
                                    }
                                ?>
                            </p>

                        </div>

                    <div class="col-xs-5-2 left inline">

                            <p><strong>County: </strong>
                                <?php echo $notice['County']['name']; ?>
                            </p>

                            <p><strong>Matter No.: </strong><?php echo $notice['Notice']['id']; ?></p>

                            <?php if ($this->Session->read("Is_Superuser") == 1) echo '<p><strong>Started By: </strong>' . $notice['Profile']['first_name'] . ' ' . $notice['Profile']['last_name'] . '</p>'; ?>

                        </div>

                    <?php if ($incompleteMessage <> '') echo $incompleteMessage; ?>

                </div>

                <div class="acc-ov-r right col-xs-2">

                        <div class="col-xs-12 right">
                                 <?php
                                    echo '<div class="form_options col-xs-12">';
                                     if ($editable) {
                                        echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                                        echo '<p class="push-b left">';
                                        //If the status is Payment Received, send the user to the Notice Information Sheet
                                        if ($notice['Status']['step'] == 1) echo $this->Html->link('Continue', array('controller' => 'notices', 'action' => 'edit', $notice['Notice']['id']));
                                            //If the status is Information Provided...
                                            elseif ($notice['Status']['step'] == 2) {
                                                if ($hasNotification) echo $this->Html->link('Continue', array('controller' => 'notices', 'action' => 'upload_documents', $notice['Notice']['id']));
                                                else echo $this->Html->link('Continue', array('controller' => 'notification_notices', 'action' => 'index', $notice['Notice']['id']));
                                            }
                                         echo '</p>';
                                         } else {
                                            echo '<i class="right inline fas fa-chevron-circle-right"></i>';
                                            //Get the current page number
                                            $page = 1;
                                            echo '<p class="push-b left">';
                                            if (isset($this->request->params['named']['page'])) $page = $this->request->params['named']['page'];
                                             $this->Html->link('Detailed Case Information', array('action' => 'view', $notice['Notice']['id']));
                                             if ($notice['Document']['lease_ext'] == '' || ($notice['Document']['notice_ext'] == 'pdf' && $notice['Document']['signed_notice_ext'] != 'pdf')) {
                                                 echo $this->Html->link('Upload Required Documents', array('controller' => 'notices', 'action' => 'upload_notice', $notice['Notice']['id'], $page));
                                             }
                                             if ($notice['Document']['notice_ext'] != '' && $notice['Document']['signed_notice_ext'] == '' && $notice['User']['use_signature'] == 1) echo $this->Html->link('Sign Notice to Pay', array('controller' => 'notices', 'action' => 'sign_notice', $notice['Notice']['id'], $page));
                                            echo '</p>';
                                         }
                                    echo '</div>';

                                    //-- Add links to the uploaded documents
                                    foreach ($document_types as $document_type) {
                                        echo $link = $this->element(
                                            'notice_file_download_link',
                                            array(
                                                'document_type' => $document_type,
                                                'document' => $notice['Document'],
                                                'notice_id' => $notice['Notice']['id']
                                            ));
                                    }
                                ?>
                            
                            </div>

                        <div id="expand-collapse-<?php echo $notice['Notice']['id']; ?>" class="expand-collapse col-xs-12 inline right">
                            <i class="right inline col-xs-1-2 fas fa-minus"></i>
                            <p class="col-xs-9 inline left" alt="expand" title="expand">Show less</p>
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

    </div>
    
</div>

<div class="pagination col-xs-12 center push-t">
    <?php
        }
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