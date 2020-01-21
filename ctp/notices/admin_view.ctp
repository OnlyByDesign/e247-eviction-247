
<script type="text/javascript">
	//====================================
	function addFee(divID, fee) {
		if (document.getElementById(divID).style.display == 'block') {
			document.getElementById(divID).style.display = 'none';
			//document.getElementById("NoticeCostTotal").value = parseFloat(parseFloat(document.getElementById("divCostTotal").innerText.replace(/,/g,'')) - fee) + ".00";
		} else {
			document.getElementById(divID).style.display = 'block';
			//document.getElementById("NoticeCostTotal").value = parseFloat(parseFloat(document.getElementById("divCostTotal").innerText.replace(/,/g,'')) + fee) + ".00";
		}
	}

	$(document).ready(function() {
  	<?php
  		//We're setting the fee to 0 because we only want to show the div and not affect the total
  		if ($notice['Notice']['court_appearance_1'] == 1) echo 'addFee("divCourtAppearance1", 0);';
  		if ($notice['Notice']['court_appearance_2'] == 1) echo 'addFee("divCourtAppearance2", 0);';
  		if ($notice['Notice']['court_appearance_3'] == 1) echo 'addFee("divCourtAppearance3", 0);';
  		if ($notice['Notice']['case_settlement'] == 1) echo 'addFee("divCaseSettlement", 0);';
  		if ($notice['Notice']['posting_3day'] == 1) echo 'addFee("divPosting3Day", 0);';
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



<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link('Back to User\'s Notices', array('controller' => 'users', 'action' => 'list_notices', $user_id)); ?></li>
	</ul>
</div>


<div class="notices view">
  <h2>Detailed Notice Information</h2>
	<br />


	<fieldset>
		<legend>Property Information</legend>

		<dt><?php echo __('Property Street Address'); ?></dt>
		<dd>
			<?php echo $notice['Notice']['property_street_address1']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Property Unit No.'); ?></dt>
		<dd>
			<?php echo $notice['Notice']['property_street_address2']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Property City'); ?></dt>
		<dd>
			<?php echo $notice['Notice']['property_city']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Property State'); ?></dt>
		<dd>
			<?php echo $notice['Notice']['property_state']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Property Zip Code'); ?></dt>
		<dd>
			<?php echo $notice['Notice']['property_zip_code']; ?>
			&nbsp;
		</dd>
		<br />
		<dt><?php echo __('County'); ?></dt>
		<dd>
			<?php echo $notice['County']['name']; ?>
			&nbsp;
		</dd>

	</fieldset>



	<fieldset>
  	<legend>Tenant's Information</legend>
    <?php echo $this->element('tenants_notices'); ?>
	</fieldset>


	<fieldset>
  	<legend><?php echo __('Notice Status'); ?></legend>

		
			<?php
	    	$status = '';
				foreach (Configure::read('status_date_steps') as $key => $status_date_step) {
					if ($notice['Status']['step'] == $key) $status = format_status($notice['Status']['name'], $notice['Notice'][$status_date_step]);
				}
				if ($status == '') echo $notice['Status']['name'];
				else echo $status;
			?>
		
	</fieldset>



	<fieldset>
  	<legend>Notice Information</legend>

		<dt><?php echo __('Notice creation date'); ?></dt>
		<dd>
			<?php echo date('l, F jS Y', strtotime($notice['Notice']['created'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Service'); ?></dt>
		<dd>
			<?php echo "#" . $notice['Notice']['id']; ?>
			&nbsp;
		</dd>

		<!--br />

		<dt><?php echo __('Case No.'); ?></dt>
		<dd>
			<?php echo $notice['Notice']['case']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Division'); ?></dt>
		<dd>
			<?php echo $notice['Notice']['division']; ?>
			&nbsp;
		</dd-->
	</fieldset>


	<fieldset>
  	<legend>Landlord or Landlord Agent's Information</legend>

		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo $notice['Notice']['contact_first_name']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo $notice['Notice']['contact_last_name']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street Address'); ?></dt>
		<dd>
			<?php echo $notice['Notice']['contact_street_address1']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unit No.'); ?></dt>
		<dd>
			<?php echo $notice['Notice']['contact_street_address2']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo $notice['Notice']['contact_city']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo $notice['Notice']['contact_state']; ?>
			&nbsp;
		</dd>

		<?php if (isset($notice['Notice']['contact_county_name'])) { ?>
		<tr>
			<td><?php echo __('County'); ?></td>
			<td><?php echo $notice['Notice']['contact_county_name']; ?></td>
		</tr>
		<?php } ?>

		<dt><?php echo __('Zip Code'); ?></dt>
		<dd>
			<?php echo $notice['Notice']['contact_zip_code']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company Name'); ?></dt>
		<dd>
			<?php echo $notice['Notice']['contact_company_name']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone Number'); ?></dt>
		<dd>
			<?php echo $notice['Notice']['contact_phone_number']; ?>
			&nbsp;
		</dd>

		<br />
		<dt><?php echo __('The Landlord in this matter is'); ?></dt>
		<dd>
			<?php
				switch ($notice['Notice']['landlord_in_matter']) {
					case 'owner':
							echo 'The Owner of the Property';
							break;

					case 'manager':
							echo 'The Manager of the Property';
							break;

					case 'other':
							echo $notice['Notice']['landlord_in_matter_other_desc'];
							break;
				}
			?>
			&nbsp;
		</dd>
	</fieldset>


	<fieldset>
  	<legend>Email Notifications</legend>

    <table cellpadding="0" cellspacing="0">
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email Address</th>
			</tr>
			<?php
				$i = 0;
			
				foreach ($notice['NotificationNotice'] as $notification):
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



	<fieldset>
		<legend>Rent Information</legend>

		<dt><?php echo __('Monthly Rent'); ?></dt>
		<dd>
			<?php echo "$" . number_format($notice['Notice']['monthly_rent'],2); ?>
			&nbsp;
		</dd>
		<!--dt><?php echo __('Security Deposit'); ?></dt>
		<dd>
			<?php echo "$" . number_format($notice['Notice']['security_deposit'],2); ?>
			&nbsp;
		</dd-->
		<dt><?php echo __('First Unpaid Month'); ?></dt>
		<dd>
			<?php if ($notice['Notice']['first_unpaid_month'] != '') echo date('F Y', strtotime($notice['Notice']['first_unpaid_month'])); ?>
			&nbsp;
		</dd>
	</fieldset>



	<fieldset>
		<legend>Client Documents</legend>
		<legend class="secondLegend">Client Charges</legend>

		<div id="divClientDocuments">
			<dt>
				<div class="documentList">
					<ul>
						<?php
							foreach ($document_types as $document_type) {
								$displayLink = true;
								if ($document_type == 'notice' && ($notice['Status']['id'] != 64 && $notice['Status']['id'] != 65)) $displayLink = false;
	
								if ($displayLink == true) {
				          echo '<li>';
				          echo $this->element(
				              'user_file_download_link',
				              array(
				                  'document_type' => $document_type,
				                  'document' => $notice['Document']
				              )
				          );
				          echo '</li>';
								}
			    		}
						?>
					</ul>

				</div>
			</dt>
	
			<dt>
				<h5>Administrative Documents</h5>
				<?php
					if(substr($notice['Payment']['transaction_id'], 0, 1) == 'C') {
						echo $this->Html->link('Invoiced Amount', array('controller' => 'payments', 'action' => 'view', $notice['Payment']['id'], 'notices'));
					}
					else {
						echo $this->Html->link('Receipt', array('controller' => 'payments', 'action' => 'view', $notice['Payment']['id'], 'notices'));
					}
					//if ($notice['Payment']['signature'] != '') {
						echo '<br />';
						echo $this->Html->link('Fee Agreement', array('controller' => 'payments', 'action' => 'view_fee_agreement', $notice['Payment']['id'], 'notice'));
					//}
				?>
				&nbsp;
			</dt>
		</div>

		<div id="divClientFees">
			<?php
			  echo '<div class="left feesDetails total"><strong>Total:</strong></div> 	<div class="left feesDetailsAmount total"><div class="left">$</div><div class="right">' . number_format($notice['Payment']['amount'], 2) . '</div></div><br class="clear" />';
			?>
		</div>
		
		<br class="clear" />
	</fieldset>

</div>
