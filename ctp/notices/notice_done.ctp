<div id="progress_image">
	<?php
		$progress_filename = '';
		if ($allow_fee_agreement_bypass) $progress_filename = '_bypass';
	?>
	<img src="/img/progress_step6<?php echo $progress_filename; ?>.png" height="53" alt="" title="" />
	<br />
	<?php echo $this->element('progress_notice' . $progress_filename); ?>
</div>


<h2>notice upload complete</h2>

<?php
	echo '<fieldset>';
	echo '	<legend class="textGreen">STATUS</legend>';
	echo '	<p>';

	$messageFax = '';
	if ($notice['Notice']['is_faxed'] == true) $messageFax = 'If you prefer, you can fax your documents to 1-904-239-5468.';
	
	switch($notice['Notice']['status_id']) {
		case 91:						//Documents uploaded
				echo 'We are in receipt of your information and will update you shortly.';
				break;

		case 90:					//Waiting for lease
				echo 'We are in receipt of your information, but require your Lease Agreement to proceed.  Please log back into your account and upload your Lease Agreement as soon as possible. ';
				echo $messageFax;
				echo '<br /><strong>We cannot proceed with your notice until we receive your Lease Agreement.</strong>';
				break;
	}
	echo '	</p>';
	echo '</fieldset>';


	echo '<fieldset>';
	echo '	<legend class="textGreen">NOTICE</legend>';
	echo '	<p>Please add the email address <strong>admin@mail.eviction247.com</strong> to your contacts to ensure that you get all status updates about your notice.</p>';
	echo '	<p>If you do not receive a confirming email from <strong>admin@mail.eviction247.com</strong> within a few minutes from now please check your "junk/spam" email folder. If the confirming email is in your "junk/spam" folder please move the email to your inbox, mark the email as safe and be sure to add <strong>admin@mail.eviction247.com</strong> to your contacts. Please do not hesitate to ' . $this->Html->link('contact us', array('controller' => 'forms', 'action' => 'contact')) . ' if you have any questions.</p>';
	echo '</fieldset>';

	echo '<p>Thank you for allowing us to assist you.</p>';


	echo '<p>You can go to the ' . $this->Html->link('Notices', array('controller' => 'notices', 'action' => 'index')) . ' page to view the details and status of this notice.</p>';



	include '/app/webroot/files/alert_popup.inc';
?>