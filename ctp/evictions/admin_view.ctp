
<script type="text/javascript">
	//====================================
	function addFee(divID, fee) {
		if (document.getElementById(divID).style.display == 'block') {
			document.getElementById(divID).style.display = 'none';
			//document.getElementById("EvictionCostTotal").value = parseFloat(parseFloat(document.getElementById("divCostTotal").innerText.replace(/,/g,'')) - fee) + ".00";
		} else {
			document.getElementById(divID).style.display = 'block';
			//document.getElementById("EvictionCostTotal").value = parseFloat(parseFloat(document.getElementById("divCostTotal").innerText.replace(/,/g,'')) + fee) + ".00";
		}
	}

	$(document).ready(function() {
  	<?php
  		//We're setting the fee to 0 because we only want to show the div and not affect the total
  		if ($eviction['Eviction']['court_appearance_1'] == 1) echo 'addFee("divCourtAppearance1", 0);';
  		if ($eviction['Eviction']['court_appearance_2'] == 1) echo 'addFee("divCourtAppearance2", 0);';
  		if ($eviction['Eviction']['court_appearance_3'] == 1) echo 'addFee("divCourtAppearance3", 0);';
  		if ($eviction['Eviction']['case_settlement'] == 1) echo 'addFee("divCaseSettlement", 0);';
  		if ($eviction['Eviction']['posting_3day'] == 1) echo 'addFee("divPosting3Day", 0);';
  	?>
	});
	
	$(window).load(function() {
		var pos = $('#divStatus').position();

		<?php if ($in_settlement == 1 && $is_contested == 1) { ?>
			$('#divStampPending').css({top: pos.top-25, left: pos.left+40});
			$('#divStampPending').show();
			$('#divStampContest').css({top: pos.top-25, left: pos.left+400});
			$('#divStampContest').show();
		<?php } elseif ($in_settlement == 1) { ?>
			$('#divStampPending').css({top: pos.top-25, left: pos.left+220});
			$('#divStampPending').show();
		<?php } elseif ($is_contested == 1) { ?>
			$('#divStampContest').css({top: pos.top-25, left: pos.left+220});
			$('#divStampContest').show();
		<?php } ?>
	});
</script>

<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main">Detailed <span>Eviction</span> Information</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/3.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-10 center">
        
        <div class="actions col-xs-12 left inline">
            
            <div class="btn-blue col-xs-3 center left">
                <?php echo $this->Html->link('Back to User Evictions', array('controller' => 'users', 'action' => 'list_evictions', $user_id)); ?>
            </div>
            
        </div>

        <div class="view-info-table evictions view inline col-xs-12 left push-t push-b">

            <fieldset>
                <h3>Eviction Property Information</h3>

                <dt><?php echo __('Property Street Address'); ?></dt>
                <dd>
                    <?php echo $eviction['Eviction']['property_street_address1']; ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Property Unit No.'); ?></dt>
                <dd>
                    <?php echo $eviction['Eviction']['property_street_address2']; ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Property City'); ?></dt>
                <dd>
                    <?php echo $eviction['Eviction']['property_city']; ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Property State'); ?></dt>
                <dd>
                    <?php echo $eviction['Eviction']['property_state']; ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Property Zip Code'); ?></dt>
                <dd>
                    <?php echo $eviction['Eviction']['property_zip_code']; ?>
                    &nbsp;
                </dd>
                <br />
                <dt><?php echo __('County'); ?></dt>
                <dd>
                    <?php echo $eviction['County']['name']; ?>
                    &nbsp;
                </dd>

            </fieldset>

            <fieldset>
            <h3>Plaintiff's Information</h3>

                <?php if (!empty($eviction['Eviction']['property_owner_first_name']) && !empty($eviction['Eviction']['property_owner_last_name'])) { ?>
                    <dt><?php echo __('First Name'); ?></dt>
                    <dd>
                        <?php echo $eviction['Eviction']['property_owner_first_name']; ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Last Name'); ?></dt>
                    <dd>
                        <?php echo $eviction['Eviction']['property_owner_last_name']; ?>
                        &nbsp;
                    </dd>
                <?php } else if (!empty($eviction['Eviction']['property_owner_company'])) { ?>
                    <dt><?php echo __('Company Name'); ?></dt>
                    <dd>
                        <?php echo $eviction['Eviction']['property_owner_company']; ?>
                        &nbsp;
                    </dd>
                <?php } ?>
            </fieldset>

            <fieldset>
            <h3>Defendant's Information</h3>
            <?php echo $this->element('defendants'); ?>
            </fieldset>

            <fieldset>
                <h3><?php echo __('Eviction Status'); ?></h3>
                <?php
                echo '<div id="divStampPending" class="stampPending push-b"><p><strong style="color: red;">Pending Settlement with Defendant</strong></p></div>';
                echo '<div id=""divStampContest" class="stampContest push-b"><p><strong style="color: red;">Tenant is Contesting the Eviction</strong></p></div>';
                
                echo '<div id="divStatus">';
                $status = '';
                foreach (Configure::read('status_date_steps') as $key => $status_date_step) {
                    if ($eviction['Status']['step'] == $key) $status = format_status($eviction['Status']['name'], $eviction['Eviction'][$status_date_step]);
                }
                if ($status == '') echo $eviction['Status']['name'];
                else echo $status;
                echo '</div>';
                ?>                
            </fieldset>

            <?php if ($eviction['Service']['id'] == 3) { ?>
                <fieldset>
                <h3><?php echo __('Damages Status'); ?></h3>

                    <!--dt><?php echo __('Damages Status'); ?></dt>
                        <dd-->
                            <?php echo format_status($eviction['DamagesStatus']['name'], $eviction['Eviction']['damages_status_date']); ?>
                            &nbsp;
                        <!--/dd-->
                </fieldset>
            <?php } ?>


            <fieldset>
            <h3>Case Information</h3>

                <dt><?php echo __('Eviction creation date'); ?></dt>
                <dd>
                    <?php echo date('l, F jS Y', strtotime($eviction['Eviction']['created'])); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Service'); ?></dt>
                <dd>
                    <?php echo $eviction['Service']['name'] . " (#" . $eviction['Eviction']['id'] . ")"; ?>
                    &nbsp;
                </dd>

                <br />

                <dt><?php echo __('Case No.'); ?></dt>
                <dd>
                    <?php echo $eviction['Eviction']['case']; ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Division'); ?></dt>
                <dd>
                    <?php echo $eviction['Eviction']['division']; ?>
                    &nbsp;
                </dd>
            </fieldset>


            <fieldset>
            <h3>Person Responsible for Handling Eviction</h3>

                <dt><?php echo __('First Name'); ?></dt>
                <dd>
                    <?php echo $eviction['Eviction']['contact_first_name']; ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Last Name'); ?></dt>
                <dd>
                    <?php echo $eviction['Eviction']['contact_last_name']; ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Street Address'); ?></dt>
                <dd>
                    <?php echo $eviction['Eviction']['contact_street_address1']; ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Unit No.'); ?></dt>
                <dd>
                    <?php echo $eviction['Eviction']['contact_street_address2']; ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('City'); ?></dt>
                <dd>
                    <?php echo $eviction['Eviction']['contact_city']; ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('State'); ?></dt>
                <dd>
                    <?php echo $eviction['Eviction']['contact_state']; ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Zip Code'); ?></dt>
                <dd>
                    <?php echo $eviction['Eviction']['contact_zip_code']; ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Company Name'); ?></dt>
                <dd>
                    <?php echo $eviction['Eviction']['contact_company_name']; ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Phone Number'); ?></dt>
                <dd>
                    <?php echo $eviction['Eviction']['contact_phone_number']; ?>
                    &nbsp;
                </dd>
            </fieldset>


            <fieldset>
            <h3>Email Notifications</h3>

            <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email Address</th>
                    </tr>
                    <?php
                        $i = 0;

                        foreach ($eviction['Notification'] as $notification):
                        $class = null;
                        if ($i++ % 2 == 0) {
                            $class = ' class="altrow"';
                        }
                    ?>
                    <tr <?php echo $class;?>>
                        <td><?php echo $notification['first_name']; ?>&nbsp;</td>
                        <td><?php echo $notification['last_name']; ?>&nbsp;</td>
                        <td><?php echo $notification['email_address']; ?>&nbsp;</td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </fieldset>

            <?php if ($eviction['Service']['id'] == 3) { ?>
                <fieldset>
                <h3>Affidavit as to Reasonableness of Attorney's Fee</h3>

                    <dt><?php echo __('Reasonable Attorney Fee'); ?></dt>
                    <dd>
                        <?php
                            if ($eviction['Eviction']['reasonable_attorney_fee'] != '') echo "$";
                            echo $eviction['Eviction']['reasonable_attorney_fee'];
                        ?>
                        &nbsp;
                    </dd>
                </fieldset>

                <fieldset>
                <h3>Affidavit by Plantiff's Counsel of Attorney's Fees and Costs</h3>

                    <dt><?php echo __('Filing Fee'); ?></dt>
                    <dd>
                        <?php
                            if ($eviction['Eviction']['filing_fee'] != '') echo "$";
                            echo $eviction['Eviction']['filing_fee'];
                        ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Service Of Process Fee'); ?></dt>
                    <dd>
                        <?php
                            if ($eviction['Eviction']['service_of_process_fee'] != '') echo "$";
                            echo $eviction['Eviction']['service_of_process_fee'];
                        ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Writ Of Posession Fee'); ?></dt>
                    <dd>
                        <?php
                            if ($eviction['Eviction']['writ_of_posession_fee'] != '') echo "$";
                            echo $eviction['Eviction']['writ_of_posession_fee'];
                        ?>
                        &nbsp;
                    </dd>
                </fieldset>

                <fieldset>
                <h3>Final Default Judgment as to Count II for Damages</h3>

                    <dt><?php echo __('Principal Sum'); ?></dt>
                    <dd>
                        <?php
                            if ($eviction['Eviction']['principal_sum'] != '') echo "$";
                            echo $eviction['Eviction']['principal_sum'];
                        ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Attorney Fee'); ?></dt>
                    <dd>
                        <?php
                            if ($eviction['Eviction']['attorney_fee'] != '') echo "$";
                            echo $eviction['Eviction']['attorney_fee'];
                        ?>
                        &nbsp;
                    </dd>
                </fieldset>
            <?php } ?>

            <fieldset>
                <h3>Rent Information</h3>

                <dt><?php echo __('Monthly Rent'); ?></dt>
                <dd>
                    <?php echo "$" . number_format($eviction['Eviction']['monthly_rent'],2); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Security Deposit'); ?></dt>
                <dd>
                    <?php echo "$" . number_format($eviction['Eviction']['security_deposit'],2); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('First Unpaid Month'); ?></dt>
                <dd>
                    <?php if ($eviction['Eviction']['first_unpaid_month'] != '') echo date('F Y', strtotime($eviction['Eviction']['first_unpaid_month'])); ?>
                    &nbsp;
                </dd>
            </fieldset>

            <?php if ($eviction['Service']['id'] == 3) { ?>
            <!--dt><?php echo __('Fees Entered'); ?></dt>
            <dd>
                <?php
                    if ($eviction['Eviction']['fees_entered'] == 1) echo "Yes";
                    else echo "No";
                ?>
                &nbsp;
            </dd-->
            <?php } ?>

            <fieldset class="payfield">
                
                <h3>Client Documents and Charges</h3>

                <div id="divClientDocuments" class="col-xs-12 inline left">
                    <dt>
                        <div class="documentList">
                            
                            <ul>
                                <?php
                                echo '<h5>Pleadings</h5>';
                                    foreach ($document_types as $document_type) {
                                        $displayLink = true;
                                        if ($document_type == 'notice' && ($eviction['Status']['id'] != 64 && $eviction['Status']['id'] != 65)) $displayLink = false;

                                        if ($displayLink == true) {
                                  echo '<li>';
                                  echo $this->element(
                                      'user_file_download_link',
                                      array(
                                          'document_type' => $document_type,
                                          'document' => $eviction['Document']
                                      )
                                  );
                                  echo '</li>';
                                        }
                                }
                                ?>
                            </ul>
                            
                            <ul>
                                <?php
                                    if ($eviction['Document']['set_ext'] == 'pdf') {
                                        foreach($pleadings_list as $pleadings) {
                                            echo '<li>' . $this->Html->link(
                                            $this->Html->image('pdf.png') . ' ' . $pleadings['name'], 
                                                array(
                                            'admin' => true,
                                            'controller' => 'documentTemplates',
                                            'action' => 'download_documents',
                                            $pleadings['path']
                                        ),
                                        array(
                                            'escape' => false
                                        )
                                            ) . '</li>';
                                        }
                                    }
                                ?>
                            </ul>
                            
                        </div>
                    </dt>

                    <dt>
                        <h5>Administrative Documents</h5>
                        <?php
                            if(substr($eviction['Payment']['transaction_id'], 0, 1) == 'C') {
                                echo $this->Html->link('Invoiced Amount', array('controller' => 'payments', 'action' => 'view', $eviction['Payment']['id'], 'evictions'));
                                $totalTitle = 'Total Retainer';
                            }
                            else {
                                echo $this->Html->link('Receipt', array('controller' => 'payments', 'action' => 'view', $eviction['Payment']['id'], 'evictions'));
                                $totalTitle = 'Total Retainer';
                            }
                            //if ($eviction['Payment']['signature'] != '') {
                                echo '<br />';
                                echo $this->Html->link('Fee Agreement', array('controller' => 'payments', 'action' => 'view_fee_agreement', $eviction['Payment']['id'], 'eviction'));
                            //}
                        ?>
                        &nbsp;
                    </dt>
                </div>

                <div id="divClientFees" class="col-xs-12 inline left push-t">
                    <?php
                      echo '<div class="left feesDetails"><strong>Attorney Fee:</strong></div> 								<div class="left"></div><br class="clear" />';
                      echo '<div class="left feesDetails">&nbsp;&nbsp; Flat Attorney Fee:</div> 							<div class="left feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($eviction['Payment']['attorney_fee'], 2) . '</div></div><br class="clear" />';
                    if ($eviction['Payment']['cost_posting_fee'] > 0) echo '<div class="left feesDetails">&nbsp;&nbsp; Posting of Notice to Pay:</div>			<div class="left feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($eviction['Payment']['cost_posting_fee'], 2) . '</div></div><br class="clear" />';
                      echo '<div class="left feesDetails"><strong>Cost Retainer:<sup>*</sup></strong></div> 	<div class="left feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($eviction['Payment']['cost_summons'] + $eviction['Payment']['cost_process_server'] + $eviction['Payment']['cost_writ'] + $eviction['Payment']['cost_writ_issuance'] + $eviction['Payment']['cost_filing_fee'], 2) . '</div></div><br class="clear" />';
                      echo '<br />';
                      echo '<div class="left feesDetails total"><strong>' . $totalTitle . ':</strong></div> 	<div class="left feesDetailsAmount total" style="border-top:2px solid black;"><div class="left">$</div><div class="right">' . number_format($eviction['Payment']['amount'], 2) . '</div></div><br class="clear" />';
                        echo '<br />';

                        echo '<div id="costRetainer2"><strong>Estimated costs to be paid by the Cost Retainer<sup>*</sup></strong>';
                        echo '	<br /><br />';
                      echo '	<div class="left feesDetails">&nbsp;&nbsp; Issuance of Summons:</div> 						<div class="left feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($eviction['Payment']['cost_summons'], 2) . '</div></div><br class="clear" />';
                      echo '	<div class="left feesDetails">&nbsp;&nbsp; Process Server:</div> 									<div class="left feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($eviction['Payment']['cost_process_server'], 2) . '</div></div><br class="clear" />';
                      echo '	<div class="left feesDetails">&nbsp;&nbsp; Writ of Possession:</div> 							<div class="left feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($eviction['Payment']['cost_writ'], 2) . '</div></div><br class="clear" />';
                      echo '	<div class="left feesDetails">&nbsp;&nbsp; Issuance of Writ of Possession:</div> 	<div class="left feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($eviction['Payment']['cost_writ_issuance'], 2) . '</div></div><br class="clear" />';
                      echo '	<div class="left feesDetails">&nbsp;&nbsp; Clerk Filing Fee:</div> 								<div class="left feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($eviction['Payment']['cost_filing_fee'], 2) . '</div></div><br class="clear" />';
                        echo '	<br />';
                        echo '	<span class="costDisclaimer"><sup>*</sup>Your actual final costs may vary based on the facts of your case.</span>';
                        echo '</div>';

                      echo '<br />';
                      echo '<div class="left feesDetails"><strong>Additional Client Charges:</strong></div> 														<div class="left"></div><br class="clear" />';
                        echo '<div id="divCourtAppearance1"><div class="left feesDetails">&nbsp;&nbsp; Court Appearance (1):</div>				<div class="left feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($extra_fees['ExtraFee']['court_appearance_1'], 2) . '</div></div><br class="clear" /></div>';
                        echo '<div id="divCourtAppearance2"><div class="left feesDetails">&nbsp;&nbsp; Court Appearance (2):</div>				<div class="left feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($extra_fees['ExtraFee']['court_appearance_2'], 2) . '</div></div><br class="clear" /></div>';
                        echo '<div id="divCourtAppearance3"><div class="left feesDetails">&nbsp;&nbsp; Court Appearance (3):</div>				<div class="left feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($extra_fees['ExtraFee']['court_appearance_3'], 2) . '</div></div><br class="clear" /></div>';
                        echo '<div id="divCaseSettlement">	<div class="left feesDetails">&nbsp;&nbsp; Case Settlement:</div>							<div class="left feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($extra_fees['ExtraFee']['case_settlement'], 2) . 		'</div></div><br class="clear" /></div>';
                        echo '<div id="divPosting3Day">			<div class="left feesDetails">&nbsp;&nbsp; Posting of Notice to Pay:</div>	<div class="left feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($extra_fees['ExtraFee']['posting_3day'], 2) . 			'</div></div><br class="clear" /></div>';
                    ?>
                </div>
                
            </fieldset>

        </div>

    </div>
    
</div>
