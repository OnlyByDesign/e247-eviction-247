<?php //debug($notice); ?>

<script type="text/javascript">
	//====================================
	function changeMatter()	{
		var other = document.getElementById("NoticeLandlordInMatterOtherDesc");
		
		if (document.getElementById("NoticeLandlordInMatterOther").checked == true) {
			other.style.display = '';
		} else {
			other.style.display = 'none';
		}
	}

	//====================================
	function addFee(divID, fee) {
		if (document.getElementById(divID).style.display == 'block') {
			document.getElementById(divID).style.display = 'none';
			//document.getElementById("NoticeCostTotal").value = parseFloat(parseFloat(document.getElementById("divCostTotal").innerText.replace(/,/g,'')) - fee) + ".00";
		} else {
			document.getElementById(divID).style.display = 'block';
			//document.getElementById("NoticeCostTotal").value = parseFloat(parseFloat(document.getElementById("divCostTotal").innerText.replace(/,/g,'')) + fee) + ".00";
		}
		//document.getElementById("divCostTotal").innerText = document.getElementById("NoticeCostTotal").value;
	}


	//***********************************************************************************************
	//
	//***********************************************************************************************
  $(function() {
		//When the state dropdown's value changes, load the counties associated to the selected state
    $("#NoticeContactState").change(function() {
    	var state_id = $(this).val();

			$.ajax({
			    url: '/index.php/admin/notices/loadCounties/' + state_id,
			    cache: false,
			    type: 'GET',
			    dataType: 'HTML',
			    success: function(response) {
              $('#NoticeContactCountyId').html(response);
              $('#NoticeContactCountyId').val(<?php echo $this->data['Notice']['contact_county_id']; ?>);
			    		//If there are counties associated to the selected state, show the county dropdown, if not hide it
							if (response != ' ') $('#county-field').show();
							else $('#county-field').hide();
          },
          error: function(e) {
              alert("An error occurred: " + e.responseText.message);
              console.log(e);
          }
			});
		});

	  $("#NoticeContactCountry").live('change', function() {
	   	if ($(this).val() == 'US') {
	   		$('#NoticeContactState').attr('required', true);
	  		$('#state-field').show();
	  		$('#state-province-field').hide();
	  		$('#label-zip-code').text('Zip Code');
				$('#NoticeContactState').trigger("change");
	  	}	else {
				$('#NoticeContactState').removeAttr('required');
	  		$('#state-field').hide();
	  		$('#state-province-field').show();
	  		$('#county-field').hide();
	  		$('#label-zip-code').text('Zip/Postal Code');
	  	}
		});

  });


	//====================================
	$(document).ready(function() {
  	changeMatter();
		$('#NoticeContactState').trigger("change");
   	$('#NoticeContactCountry').trigger("change");


    $("#NoticeStatusId").change(function() {
    	var statusID = $(this).val();
//alert('/index.php/admin/notices/getactiondate/<?php echo $notice_id;?>/' + statusID);
			$.ajax({
			    url: '/index.php/admin/notices/getactiondate/<?php echo $notice_id;?>/' + statusID,
			    cache: false,
			    type: 'GET',
			    dataType: 'HTML',
			    success: function (data) {
						if (data.trim() != '') {
							var obj = jQuery.parseJSON(data);
			        $('#NoticeActionDateActionDate').val(obj.action_date);
			        $('#NoticeActionDateNote').val(obj.note);
			      }
			    }
			});
		});


  	<?php
  		//We're setting the fee to 0 because we only want to show the div and not affect the total
  		if ($notice['Notice']['court_appearance_1'] == 1) echo 'addFee("divCourtAppearance1", 0);';
  		if ($notice['Notice']['court_appearance_2'] == 1) echo 'addFee("divCourtAppearance2", 0);';
  		if ($notice['Notice']['court_appearance_3'] == 1) echo 'addFee("divCourtAppearance3", 0);';
  		if ($notice['Notice']['case_settlement'] == 1) echo 'addFee("divCaseSettlement", 0);';
  		if ($notice['Notice']['posting_3day'] == 1) echo 'addFee("divPosting3Day", 0);';
  	?>


		Date.prototype.toInputFormat = function() {
	     var yyyy = this.getFullYear().toString();
	     var mm = (this.getMonth()+1).toString(); // getMonth() is zero-based
	     var dd  = this.getDate().toString();
	     return (mm[1]?mm:"0"+mm[0]) + "/" + (dd[1]?dd:"0"+dd[0]) + "/" + yyyy;
	  };

		//If a Status date field is changed, add 1 day to the chosen date and insert it into the Action Date field
		$('.hasDatepicker').change(function() {
			if ($(this).attr('id') != 'NoticeActionDateActionDate') {
				var date = new Date($(this).val());
				date.setDate(date.getDate() + 1)
				$('#NoticeActionDateActionDate').val(date.toInputFormat());
			}
		});

 
    $("#NoticeContactState").change(function() {
    	var state_id = $(this).val();

			$.ajax({
			    url: '/index.php/notices/loadCounties/' + state_id,
			    cache: false,
			    type: 'GET',
			    dataType: 'HTML',
			    success: function(response) {
              $('#NoticeContactCountyId').html(response);
          },
          error: function(e) {
              alert("An error occurred: " + e.responseText.message);
              console.log(e);
          }
			});
		});

	});


	var eviction_type_selected = false;

	//If the Save button is clicked and the selected status is "Proceeded with Eviction of the Tenant.", show a popup dialog so the case manager can select an Eviction type
	$("#btnSave").live("click", function() {
	  if (document.getElementById('NoticeStatusId').options[document.getElementById('NoticeStatusId').selectedIndex].value == 101 && eviction_type_selected == false) {
		  $('#overlay').fadeIn('slow');
		  $("#divPopupNotice").fadeIn('slow');
		  return false;
		}
	});

	//If the Continue button is clicked in the popup dialog, trigger the save action
	$('#btnContinue').live('click', function() {
		document.getElementById('NoticeEvictionType').value = $("input[name='data[Notice][service_name]']:checked").val()
		eviction_type_selected = true;
 		$('#divPopupNotice').fadeOut('slow');
 		$('#overlay').fadeOut('slow');
 		$('#btnSave').trigger('click');
	});

  //If the Cancel button was clicked, close the dialog box and do nothing
  $('#btnCancel').live('click', function() {
 		$('#divPopupNotice').fadeOut('slow');
 		$('#overlay').fadeOut('slow');
	});
</script>



<?php	echo $this->element('datepicker_includes'); ?>

<div class="notices form">
	<?php
		echo $this->Form->create('Notice');
		echo $this->Form->input('id');
		echo $this->Form->input('CostTotal', array('type' => 'hidden', 'value' => $notice['Payment']['total']));
		echo $this->Form->input('three_day_notice_option_id', array('type' => 'hidden'));
		echo $this->Form->input('need_three_day_notice', array('type' => 'hidden'));
		echo $this->Form->input('is_faxed', array('type' => 'hidden'));
		echo $this->Form->input('eviction_type', array('type' => 'hidden'));
	?>


	<h2>Detailed Notice Information</h2>


  <fieldset>
  	<legend>Property Information</legend>

    <?php
			echo $this->Form->input('property_street_address1', array('label' => 'Property Street Address'));
			echo $this->Form->input('property_street_address2', array('label' => 'Property Unit No.'));
			echo $this->Form->input('property_city');
			echo $this->Form->input('property_state', array('options' => $states));
			echo $this->Form->input('property_zip_code');
			echo '<br />';
			echo $this->Form->input('county_id', array('label' => 'Property County'));
    ?>
  </fieldset>



  <fieldset>
		<legend>Tenant's Information</legend>
    <?php echo $this->element('tenants_notices'); ?>
    <p>
    <?php echo $this->Html->link('Manage Tenants', array('controller' => 'tenant_notices', 'action' => 'index', $notice_id)); ?>
    </p>
  </fieldset>



  <fieldset>
    <legend>Notice Status</legend>
    <?php
//      echo $this->Form->input('service_id', array('type' => 'hidden'));
      echo $this->Form->input('status_id', array('label' => 'Notice Status'));

			//Notice status fields
      echo $this->Form->input('status_date_expire', array('type' => 'text', 'required' => 'false', 'label' => 'Notice Status Date'));

			echo '<br />';
      echo $this->Form->input('NoticeActionDate.id', 					array('type' => 'hidden'));
      echo $this->Form->input('NoticeActionDate.action_date', array('type' => 'text', 'label' => 'Action Date'));
      echo $this->Form->input('NoticeActionDate.note', 				array('style' => 'width:530px;'));

			echo '<br />';
			echo $this->Form->submit('/img/btn_save.png', array('id' => 'btnSave', 'type' => 'image', 'style' => 'width:129px; height:29px; display:block;'));
    ?>
	</fieldset>



  <fieldset>
    <legend>Notice Information</legend>
		<?php
			echo '<div class="input text">' . $this->Form->label('Notice Creation Date') . date('l, F jS Y', strtotime($notice['Notice']['created'])) . '</div>';
		 	echo '<div class="input text">' . $this->Form->label('Last Modification Date') . date('l, F jS Y', strtotime($notice['Notice']['modified'])) . '</div>';
			echo '<div class="input text">' . $this->Form->label('Matter No.', 'Matter No.') . $notice['Notice']['id'] . '</div>';

      echo "<br />";
			echo $this->Form->input('in_pclaw', array('label' => 'Entered in QuickBooks'));
		?>
	</fieldset>



	<fieldset>
  	<legend>Landlord or Landlord Agent's Information</legend>
    <p>
    	Person to be contacted by Sheriff's Department to schedule the execution of the writ of possession
    </p>
    <?php
			echo $this->Form->input('contact_first_name');
			echo $this->Form->input('contact_last_name');
      echo $this->Form->input('contact_street_address1', array('label' => 'Contact Street Address'));
      echo $this->Form->input('contact_street_address2', array('label' => 'Contact Unit No.'));
      echo $this->Form->input('contact_city');
      echo $this->Form->input('contact_state', array('options' => $states, 'empty' => '<Please Select a State>', 'div' => array('id' => 'state-field')));
      echo $this->Form->input('contact_state_province', array('label' => 'State/Province', 'div' => array('id' => 'state-province-field')));
      echo $this->Form->input('contact_county_id', array('options' => $counties, 'empty' => '<Please select a county>', 'div' => array('id' => 'county-field')));
      echo $this->Form->input('contact_zip_code', array('label' => array('text' => 'Zip Code', 'id' => 'label-zip-code')));
			echo $this->Form->input('contact_country', array('label' => 'Country', 'options' => $countries, 'default' => 'US'));
			echo $this->Form->input('contact_company_name');
			echo $this->Form->input('contact_phone_number', array('required' => 'false'));

			echo '<br /><p>The person signing the Notice to Pay is:</p>';

			$options = array('owner'=>'The Owner of the Property', 'manager' => 'The Manager of the Property', 'other' => 'Other (Please describe)' );
			$attributes = array('legend'=>false, 'separator' => '<br />', 'onclick' => 'changeMatter();');
			
			echo $this->Form->radio('landlord_in_matter', $options, $attributes);
			echo $this->Form->input('landlord_in_matter_other_desc',array('label' => false, 'div'=> false, 'error' => false, 'style' => 'display: none;margin-left:45px;', 'size' => 50));
			echo '<span class="error-message">';
			echo $this->Form->error('landlord_in_matter_other_desc', null, array('wrap' => false));
			echo '</span>';
			echo '<span class="error-message">';
			echo $this->Form->error('landlord_in_matter', null, array('wrap' => false));
			echo '</span>';
			echo '<br />';
			echo '<br />';

			echo '<p>' . $this->Html->link('User profile', array('controller' => 'users', 'action' => 'view', $notice['Notice']['user_id'])) . '</p>';
    ?>
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
			foreach ($notifications as $notification):
			    $class = null;
			    if ($i++ % 2 == 0) {
			        $class = ' class="altrow"';
			    }
			?>
			<tr<?php echo $class;?>>
				<td><?php echo $notification['NotificationNotice']['first_name']; ?>&nbsp;</td>
				<td><?php echo $notification['NotificationNotice']['last_name']; ?>&nbsp;</td>
				<td><?php echo $notification['NotificationNotice']['email_address']; ?>&nbsp;</td>
			</tr>
			<?php endforeach; ?>
		</table>

		<p>
    	<?php echo $this->Html->link('Manage Notifications', array('controller' => 'notification_notices', 'action' => 'index', $notice_id)); ?>
    </p>
	</fieldset>



	<fieldset>
  	<legend>Rent Information</legend>
    <?php
      echo $this->Form->input('monthly_rent');
      echo $this->Form->input('unpaid_rent');
//      echo $this->Form->input('security_deposit');

			if (isset($first_unpaid_month)) $parsed_first_unpaid_month = date_parse($first_unpaid_month);
			else {
				$parsed_first_unpaid_month['month'] = date('m');
				$parsed_first_unpaid_month['year'] = date('Y');
			}
				
			if (isset($last_unpaid_month)) $parsed_last_unpaid_month = date_parse($last_unpaid_month);
  		else {
  			$parsed_last_unpaid_month['month'] = date('m');
  			$parsed_last_unpaid_month['year'] = date('Y');
  		}

			echo $this->Form->input('fum', array('type'=>'date', 'label'=>'First Unpaid Month', 'dateFormat'=>'MY', 'minYear' => date('Y')-3, 'maxYear' => date('Y'), 'selected' => array('day'=>'1', 'month'=>$parsed_first_unpaid_month['month'], 'year'=>$parsed_first_unpaid_month['year'])));
			echo $this->Form->input('lum', array('type'=>'date', 'label'=>'Last Unpaid Month', 'dateFormat'=>'MY', 'minYear' => date('Y')-3, 'maxYear' => date('Y'), 'selected' => array('day'=>'1', 'month'=>$parsed_last_unpaid_month['month'], 'year'=>$parsed_last_unpaid_month['year'])));
		
			//echo $this->Form->input('first_unpaid_month', array('type' => 'text'));
			//echo $this->Form->input('last_unpaid_month', array('type' => 'text'));

//			if ($notice['Document']['signed_notice_ext'] == 'pdf' && $notice['User']['signature'] != '') echo $this->Form->input('Notice.notice_date', array('type' => 'text', 'label' => 'Notice to Pay Date'));
  	?>
	</fieldset>




	<fieldset >
		<legend>Client Documents</legend>
		<legend class="secondLegend">Client Charges</legend>
		<div id="divClientDocuments">
			<dt>
				<div class="documentList">
					<ul>
						<?php	
							foreach ($document_types as $document_type) {
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
						?>
					</ul>
				</div>
			</dt>
	
			<dt>
				<?php
					if (!empty($notice['Document']['set_ext'])) {
						echo $this->Html->link(__('Pleadings', true), array('admin' => true, 'action' => 'listDocuments', $notice['Notice']['id']));
						echo '<br /><br />';
		      }
				?>
			</dt>

			<dt>
				<h5>Administrative Documents</h5>
				<?php
					if(substr($notice['Payment']['transaction_id'], 0, 1) == 'C') {
						echo $this->Html->link('Invoiced Amount', array('controller' => 'payments', 'action' => 'view', $notice['Payment']['id']));
						$totalTitle = 'Total Retainer';
					}
					else {
						echo $this->Html->link('Retainer Receipt', array('controller' => 'payments', 'action' => 'view', $notice['Payment']['id']), array('style' => 'color:red;'));
						$totalTitle = 'Total Retainer';
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
			  echo '<div class="left feesDetailsLease">Notice:</div> 	<div class="left feesDetailsAmount"><div class="left">$</div><div id="divCostTotal">' . number_format($notice['Payment']['amount'], 2) . '</div></div><br class="clear" />';
			  echo '<div class="left feesDetailsLease total">&nbsp;&nbsp;&nbsp;&nbsp; <strong>Total:</strong></div> 	<div class="left feesDetailsAmount total"><div class="left">$</div><div id="divCostTotal">' . number_format($notice['Payment']['amount'], 2) . '</div></div><br class="clear" />';
				echo '<br />';
			?>
		</div>
		
		<br class="clear" />
	</fieldset>



	<fieldset >
		<legend>Client Options</legend>

		<ul class="greenSquare">
		  <?php
				if ($notice['Notice']['oral_lease'] == 1) echo '<li>Client has a oral lease.</li>';
	
				switch($notice['Notice']['three_day_notice_option_id']) {
					case 1:
							echo '<li>Client has already posted the Notice to Pay.</li>';
							break;
					case 2:
							echo '<li>Client will personally post the Notice to Pay.</li>';
							break;
					case 3:
							echo '<li>Client would like Notice 24/7 to post the Notice to Pay.</li>';
							break;
				}
	
				if ($notice['Notice']['need_three_day_notice'] == 1) echo '<li>Client requested a Notice to Pay.</li>';
				if ($notice['Notice']['is_faxed'] == 1) echo '<li>Client chose to fax the documents.</li>';
			?>
		</ul>
	</fieldset>



	<br />

	<?php
		echo $this->Form->submit('/img/btn_save.png', array('id' => 'btnSave', 'type' => 'image', 'style' => 'width:129px; height:29px; display:block;'));
		echo $this->Form->end();
		echo '<br />';
		echo $this->Html->link('Cancel', array('controller' => 'notices', 'action' => 'index'));
	?>
</div>

<?php include '/app/webroot/files/admin_alert_popup.inc'; ?>


<div id="divPopupNotice" class="ui-dialog">
	<div class="ui-dialog-titlebar"><span class="ui-dialog-title"">Notice Expired</span></div>
  <div class="inner_bg">
    <div class="inner_padding">
    	Please select a Service Type for this Eviction
			<p>
				<input type="radio" name="data[Notice][service_name]" id="NoticeServiceName2" value="2" checked>
				<label for="NoticeServiceName2">Eviction Only, No Damage Claim</label>
				<br />
				<input type="radio" name="data[Notice][service_name]" id="NoticeServiceName3" value="3">
				<label for="NoticeServiceName3">Eviction with Damage Claim</label>
			</p>
    </div>
		<br />
		<div class="left"><input type="submit" name="btnContinue" id="btnContinue" value="Continue" style="width:125px;" /> &nbsp;</div>
		<div class="left"><input type="button" name="btnCancel" id="btnCancel" value="Cancel" style="width:125px;" /></div>
	</div>
</div>