<?php
	$message = '';
/*
	switch ($three_day_notice_option_id) {
		case 1:
				$message = 'After completing and posting your signed Notice to Pay please log back into your account and upload your Notice as soon as possible. ';
				break;
		case 2:
				$message = 'A Notice to Pay with instructions for completing are attached for your convenience. ';
				$message .= 'After completing and posting your signed Notice to Pay please log back into your account and upload your Notice as soon as possible. ';
				break;
		case 3:
*/
				if ($has_signature) {
					$message = 'Please login to your account by clicking on the link below to electronically sign the Notice to Pay. ';
				} else {
					$message = 'A Notice to Pay with instructions for completing are attached for your convenience. ';
					$message .= 'After signing the Notice please log back into your account and upload the Notice so we can post it at the property. ';
				}
/*
				break;
	}
*/
?>


<script type="text/javascript">
	function changeMessage() {
		if (document.getElementById('NoticeNoticeType3day').checked) {
			document.getElementById('NoticeMessage').value = '<?php echo $message; ?>';
		}	else {
			document.getElementById('NoticeMessage').value = 'This matter requires an 8 Day Notice to Pay because the address of the notice property is in a different County from where payment will be made. <?php echo $message; ?>';
		}
	}

	$(document).ready(function() {
		changeMessage();
	});
</script>


<h2>Create/Send Notice to pay</h2>

<?php
	echo '<div class="notice-wrapper">';
	echo '	<h1><strong>Property address:</strong> ' . $address . '</h1><br />';
 	echo '	<strong>Tenant(s):</strong> ' . $tenants . '<br />';
 	echo '	<strong>Matter #:</strong> ' . $notice_id . '<br />';
	echo '	<strong>Person Signing the Notice:</strong><br /> ' . $person_responsible;
	echo '</div>';
?>

<div class="notices form">
  <fieldset>
      <?php
      	echo $this->Form->create('Notice', array('action' => "create_notice/$notice_id/$page_number"));

				echo '<p>An email with a pre-filled Three/Eight Day Notice will be sent to the client.</p>';
				$options = array('3day' => 'Three Day Notice', '8day' => 'Eight Day Notice');
				$attributes = array('legend' => false, 'separator' => '<br />', 'value' => '3day', 'onclick' => 'changeMessage()');
				echo $this->Form->radio('notice_type', $options, $attributes);
			?>

			<br />
			<br />

			<p>Enter the message that will be sent to the client. </p>

      <?php
				echo $this->Form->input('message', array('type' => 'textarea', 'cols' => '60'));

				echo '<p>Enter additional email addresses separated by a comma</p>';
				echo $this->Form->input('email', array('type' => 'text', 'style' => 'width:441px;', 'value' => $profile_email));
      ?>
  </fieldset>


  <?php
  	echo $this->Form->submit('/img/btn_continue.png', array('type' => 'Continue', 'type' => 'image', 'style' => 'width:129px; height:29px; display:block;'));
		echo $this->Form->end();
		echo '<br />';
		echo $this->Html->link('Cancel', array('controller' => 'notices', 'action' => 'index'));
	?>
</div>