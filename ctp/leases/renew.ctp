<?php
	echo $this->element('datepicker_includes');
	echo $this->Html->css('jquery.ptTimeSelect');
	echo $this->Html->script('jquery.ptTimeSelect');
?>


<script type="text/javascript">
  $(document).ready(function() {
		displayPaymentNotice();
		$('#LeaseRequestedByTime').ptTimeSelect();
  });


	//----------------------------------------------------------
	function displayPaymentNotice() {
		if (document.getElementById('PaymentType').value == 'alternate') document.getElementById('payment-notice').style.display = 'inline-block';
		else {
			if ($('#payment-notice').length > 0) document.getElementById('payment-notice').style.display = 'none';
		}
	}
	//----------------------------------------------------------
</script>



<?php echo $this->Form->create(); ?>

<div id="progress_image">
	<?php
		$progress_filename = '';
		if ($allow_fee_agreement_bypass) $progress_filename = '_bypass';
	?>
	<img src="/img/progress_lease_step1<?php echo $progress_filename; ?>.png" height="53" alt="" title="" />
	<br />
	<?php echo $this->element('progress_lease' . $progress_filename); ?>
</div>




<h2>Create a Renewal Lease</h2>

<?php
	echo '<div class="eviction-wrapper">';
	echo '	<h3><strong>Property address:</strong> ';
	echo $lease['Lease']['property_street_address1'];
	if ($lease['Lease']['property_street_address2'] != '') echo ', Unit No. ' . $lease['Lease']['property_street_address2'];
	if ($lease['Lease']['property_city'] != '') echo ', ' . $lease['Lease']['property_city'];
	if ($lease['Lease']['property_state'] != '') echo ', ' . $lease['Lease']['property_state'];
	echo '</h3>';
	echo '</div>';


	if ($allow_multi_lease) {
		echo '<div class="input select">';
		echo '	<label>Lease Property Type</label> ';
		if ($lease['Lease']['lease_type'] == 'single') echo 'Single-Family';
		else echo 'Multi-Family';
		echo '</div>';
	}


	echo '<div class="input select">';
	echo '	<label>Lease Property County</label> ' . $lease_county_name;
	echo $this->Form->input('county', array('label' => false, 'type' => 'hidden', 'value' => $lease['Lease']['county_id']));
	echo '</div>';

	echo $this->Form->input('Tenants.number', array('label' => false, 'type' => 'hidden', 'value' => $tenants_number));
	echo $this->Form->input('Occupants.number', array('label' => false, 'type' => 'hidden', 'value' => $occupants_number));
	echo $this->Form->input('Owners.number', array('label' => false, 'type' => 'hidden', 'value' => $owners_number));


	echo '<div class="input-radio-short"><label class="main-label">Who will Manage the Property</label>';
	$options = array(Configure::read('Lease.manager_company') => 'Management Company', Configure::read('Lease.manager_owner') => 'Property Owner');
	$attributes = array('legend' => false, 'separator' => ' ', 'default' => $lease['Lease']['manager'], 'onclick' => 'checkManageOption();');
	echo $this->Form->radio('manager', $options, $attributes);
	echo '</div>';

	echo '<div class="input-radio-short"><label class="main-label">Who is signing the Lease</label>';
	$options = array(Configure::read('Lease.signer_agent') => 'Management Company Agent', Configure::read('Lease.signer_owner') => 'Property Owner');
	if ($renewal_signer) $attributes = array('legend' => false, 'separator' => ' ', 'default' => $renewal_signer);
	else $attributes = array('legend' => false, 'separator' => ' ', 'default' => $lease['Lease']['signer']);
	echo $this->Form->radio('signer', $options, $attributes);
	echo '</div>';

	echo '<br />';

	if ($allow_alternate_payment) echo $this->Form->input('Payment.type', array('label' => 'Payment Type', 'options' => $payment_types, 'default' => 'alternate', 'onclick' => 'displayPaymentNotice()', 'after' => ' <div id="payment-notice" style="color:red;">NOTICE: All invoiced amounts are due immediately upon receipt of the invoice.</div>'));
	else echo $this->Form->input('Payment.type', array('type' => 'hidden', 'value' => 'credit_card'));

	echo $this->Form->input('requested_by', array('type' => 'text', 'label' => 'I need this lease by', 'placeholder' => 'date', 'after' => '&nbsp; ' . $this->Form->input('requested_by_time', array('type' => 'text', 'div' => false, 'label' => false, 'placeholder' => 'time', 'style' => 'width:60px;'))));

	If ($this->Session->read('Is_Superuser') > 0) echo $this->Form->input('assign_to_user_id', array('label' => 'Lease Assigned To', 'options' => $assign_to_list, 'empty' => 'Please select', 'required' => true));

	echo '<br />';
	echo '<br />';

	echo $this->Form->submit('/img/btn_continue.png', array('type' => 'Continue', 'type' => 'image', 'style' => 'width:129px; height:29px; display:block;'));
	echo $this->Form->end();


	include '/app/webroot/files/alert_popup.inc';
	echo $this->fetch('scriptBottom');
?>