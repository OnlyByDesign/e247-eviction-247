<div id="progress_image">
	<?php
		$progress_filename = '';
		if ($allow_fee_agreement_bypass) $progress_filename = '_bypass';
	?>
	<img src="/img/progress_step6<?php echo $progress_filename; ?>.png" height="53" alt="" title="" />
	<br />
	<?php echo $this->element('progress' . $progress_filename); ?>
</div>


<h2>eviction upload complete</h2>

<?php
	echo '<fieldset>';
	echo '	<legend class="textGreen">STATUS</legend>';
	echo '	<p>';

	$messageFax = '';
	if ($eviction['Eviction']['is_faxed'] == true) $messageFax = 'If you prefer, you can fax your documents to 1-904-239-5468.';
	
	switch($eviction['Eviction']['status_id']) {
		case 9:						//Documents uploaded
		case 15:
				echo 'We are in receipt of your information and will update you shortly.';
				break;

		case 66:					//Waiting for lease
		case 75:
				echo 'We are in receipt of your information, but require your Lease Agreement to proceed.  Please log back into your account and upload your Lease Agreement as soon as possible. ';
				echo $messageFax;
				echo '<br /><strong>We cannot proceed with your eviction until we receive your Lease Agreement.</strong>';
				break;

		case 64:					//Waiting for 3 day
		case 73:
				if ($eviction['Eviction']['three_day_notice_option_id'] == 1 || $eviction['Eviction']['three_day_notice_option_id'] == 2) {
					echo 'We are in receipt of your information, but require your signed and posted Notice to Pay to proceed.  After posting your signed Notice to Pay please log back into your account and upload your Notice to Pay as soon as possible. ';
					echo $messageFax;
					echo '<br /><strong>We cannot proceed with your eviction until we receive your Notice to Pay.</strong>';
				} elseif ($eviction['Eviction']['three_day_notice_option_id'] == 3) {
					echo 'We are in receipt of your information, but require your signed Notice to Pay to proceed. ';
					if ($eviction['User']['signature'] == '') echo 'After completing and signing your Notice to Pay please log back into your account and upload your Notice to Pay as soon as possible so we can have it posted at the property. ';
					else echo 'We will email you a notification shortly that the Notice to Pay is ready, at that time please log back into your account and sign the Notice electronically.';
					echo $messageFax;
					echo '<br /><strong>We cannot proceed with your eviction until we receive your Notice to Pay.</strong>';
				}
				if ($eviction['Eviction']['need_three_day_notice'] == true && $eviction['User']['signature'] == '') echo '<p>A Notice to Pay with instructions for completing will be sent to you shortly.</p>';
				//echo ' A blank copy of a Notice to Pay with instructions for completing are attached for your convenience.';
				break;

		case 65:					//Waiting for lease and 3 day
		case 74:
				if ($eviction['Eviction']['three_day_notice_option_id'] || $eviction['Eviction']['three_day_notice_option_id'] == 2) {
					echo 'We are in receipt of your information, but require your Lease Agreement and signed and posted Notice to Pay to proceed.  After posting your signed Notice to Pay please log back into your account and upload your Lease Agreement and Notice to Pay as soon as possible. ';
					echo $messageFax;
					echo '<br /><strong>We cannot proceed with your eviction until we receive your Lease Agreement and Notice to Pay.</strong>';
				} elseif ($eviction['Eviction']['three_day_notice_option_id'] == 3) {
					echo 'We are in receipt of your information, but require your Lease Agreement and signed Notice to Pay to proceed. ';
					if ($eviction['User']['signature'] == '') echo 'After completing and signing your Notice to Pay please log back into your account and upload your Notice to Pay as soon as possible so we can have it posted at the property. ';
					else echo 'We will email you a notification shortly that the Notice to Pay is ready, at that time please log back into your account and sign the Notice electronically.';
					echo $messageFax;
					echo '<br /><strong>We cannot proceed with your eviction until we receive your Lease Agreement and Notice to Pay.</strong>';
				}
				if ($eviction['Eviction']['need_three_day_notice'] == true && $eviction['User']['signature'] == '') echo '<p>A Notice to Pay with instructions for completing will be sent to you shortly.</p>';
				break;
	}
	echo '	</p>';
	echo '</fieldset>';


	echo '<fieldset>';
	echo '	<legend class="textGreen">NOTICE</legend>';
	echo '	<p>Please add the email address <strong>admin@mail.eviction247.com</strong> to your contacts to ensure that you get all status updates about your eviction.</p>';
	echo '	<p>If you do not receive a confirming email from <strong>admin@mail.eviction247.com</strong> within a few minutes from now please check your "junk/spam" email folder. If the confirming email is in your "junk/spam" folder please move the email to your inbox, mark the email as safe and be sure to add <strong>admin@mail.eviction247.com</strong> to your contacts. Please do not hesitate to ' . $this->Html->link('contact us', array('controller' => 'forms', 'action' => 'contact')) . ' if you have any questions.</p>';
	echo '</fieldset>';

	echo '<p>Thank you for allowing us to assist you.</p>';


	echo '<p>You can go to the ' . $this->Html->link('Evictions', array('controller' => 'evictions', 'action' => 'index')) . ' page to view the details and status of this eviction.</p>';



	include '/app/webroot/files/alert_popup.inc';
?>