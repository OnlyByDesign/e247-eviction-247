<script type="text/javascript" id="javascript-block">
	function showServiceType() {
		if (document.getElementById('NoticeActionYes').checked == true) document.getElementById('service-type').style.display = 'block';
		else document.getElementById('service-type').style.display = 'none';
	}

	//If the user clicked on the "Continue" button at the bottom of the form
	$('#btnContinue').live('click', function() {
		//If no action was selected, display an alert
		if (document.getElementById('NoticeActionYes').checked == false && document.getElementById('NoticeActionNo').checked == false && document.getElementById('NoticeActionMaybe').checked == false) {
			$('#divPopupAlert2').contents().find(".message_error").text("Please indicate what you would like to do.");
		  $('#overlay').fadeIn('slow');
		  $("#divPopupAlert2").fadeIn('slow').delay(1800).fadeOut('slow');
		  $('#overlay').delay(1200).fadeOut('slow');
			return false

		} else {
			//If the user chose to proceed with an eviction
			if (document.getElementById('NoticeActionYes').checked) {

				if (document.getElementById('NoticeServiceName2').checked == false && document.getElementById('NoticeServiceName3').checked == false) {
					$('#divPopupAlert2').contents().find(".message_error").text("Please select a Service Type for this Eviction.");
				  $('#overlay').fadeIn('slow');
				  $("#divPopupAlert2").fadeIn('slow').delay(1800).fadeOut('slow');
				  $('#overlay').delay(1200).fadeOut('slow');
					return false
				} else {
					//Show a dialog box asking the user to confirm that they want to proceed
				  $('#overlay').fadeIn('slow');
				  $("#divPopupContinue").fadeIn('slow');
					return false;
				}
	
			} else {
				//If the user chose not to proceed or asked to be contacted then submit the form
				return true;
			}
		}
	});


	//If the user clicked on the "Continue" button in the popup window, submit the form
	$('#btnContinueNow').live('click', function() {
		$('form').submit();
	});


	//If the user clicked on the "Continue Later" button in the popup window, close the popup and stay on this page
	$('#btnContinueLater').live('click', function() {
		  $("#divPopupContinue").fadeOut('slow');
		  $('#overlay').fadeOut('slow');
	});

</script>


<h2>Notice to Pay has Expired</h2>

<?php
	echo '<div class="notice-wrapper">';
	echo '	<h1><strong>Property address:</strong> ' . $address . '</h1><br />';
 	echo '	<strong>Tenant(s):</strong> ' . $tenants . '<br />';
 	echo '	<strong>Matter #:</strong> ' . $notice_data['Notice']['id'] . '<br /><br />';
	echo '</div>';
?>

<div class="notices form">
  <?php
  	echo $this->Form->create();
  
  	if ($notice_data['Status']['step'] == Configure::read('Step_status_notice_posted') && !$contact_client) {
  		echo '<fieldset>';

			echo '<p>What would you like to do?</p>';
			$options = array(
			    'yes' => 'Proceed with an Eviction of the Tenant(s)',
			    'no' => 'Don\'t Proceed with an Eviction of the Tenant(s)',
			    'maybe' => 'Not Sure What to Do, Contact Me Immediately!'
			);
//		    'value' => 'yes',

			$attributes = array(
			    'separator' => '<br />',
			    'legend' => false,
			    'onclick' => 'showServiceType();'
			);
			echo $this->Form->radio('action', $options, $attributes);
			echo '<div id="service-type">';
			echo '	<br /><br />';
			echo '	<p>Please select a Service Type for this Eviction<p>';
			$attributes = array('legend' => false, 'separator' => '<br />');
			echo $this->Form->radio('service_name', $services, $attributes);
			echo '</div>';

			echo '</fieldset>';

	  	echo $this->Form->submit('/img/btn_continue.png', array('type' => 'Continue', 'type' => 'image', 'style' => 'width:129px; height:29px; display:block;', 'id' => 'btnContinue'));
			echo $this->Form->end();
			echo '<br />';
			echo $this->Html->link('Cancel', array('controller' => 'notices', 'action' => 'index'));

  	} else if ($notice_data['Status']['step'] == Configure::read('Step_status_notice_posted') && $contact_client) {
  		echo '<fieldset>';
			echo '	We have Received your Request and will Contact you Within 24 Hours.';
			echo '</fieldset>';
			echo '<br />';
			echo $this->Html->link('My Notices', array('controller' => 'notices', 'action' => 'index'));

		} else if ($notice_data['Status']['step'] >= Configure::read('Step_status_notice_yes')) {
  		echo '<fieldset>';
			echo '	You have decided to Proceed with an Eviction of the Tenant(s)';
			echo '</fieldset>';
			echo '<br />';
			echo $this->Html->link('My Notices', array('controller' => 'notices', 'action' => 'index'));

		} else if ($notice_data['Status']['step'] == Configure::read('Step_status_notice_no')) {
  		echo '<fieldset>';
			echo '	You have decided not to Proceed with an Eviction of the Tenant(s)';
			echo '</fieldset>';
			echo '<br />';
			echo $this->Html->link('My Notices', array('controller' => 'notices', 'action' => 'index'));
		}
	?>
 </div>


<div id="divPopupContinue" class="popupStyle2">
	<div class="ui-dialog-titlebar"><span class="ui-dialog-title"">Proceed with an Eviction</span></div>
  <div class="inner_bg">
    <div class="inner_padding" style="height:270px;overflow:none;padding:2px;">
			<div class="instructions">
			  <p style="font-size:32px !important;text-align:center;color:#143b7d;margin-top:16px;font-family:bebas_neueregular;">Before we get started</p>
			  <p style="text-align:center;font-size:18px !important;">Please have the following available:</p>
			  <ul>
			    <li style="font-size:18px;line-height:32px;text-align:center;list-style-image: url(/img/sqgreen.gif);">The date of birth or Social Security No. for each Tenant (if available)</li>
			    <li style="font-size:18px;line-height:32px;text-align:center;list-style-image: url(/img/sqgreen.gif);">Full name of the Landlord as it appears on the Lease</li>
			  </ul>
			  <p>&nbsp;</p>
			</div>
    </div>

		<div class="left" style="margin-left:20px;">
			<p>Proceed with filing an eviction</p>
			<input type="image" src="/app/webroot/img/btn_continue.png" style="width:129px; height:29px; display:block;" id="btnContinueNow">
		</div>
		<div class="right" style="margin-right:20px;">
			<p>I need to gather the above information</p>
			<input type="image" src="/app/webroot/img/btn_continue_later.png" style="width:163px; height:29px; display:block;" id="btnContinueLater">
		</div>
	</div>
</div>


<?php include '/app/webroot/files/alert_popup.inc';?>

 
<div id="divPopupAlert2" style="display:none;">
	<div class="ui-dialog-titlebar"><span class="ui-dialog-title">Notification</span></div>
  <div class="inner_bg">
    <div class="inner_padding">
    	<div class="message_error"></div>
  	</div>
	</div>
</div>
