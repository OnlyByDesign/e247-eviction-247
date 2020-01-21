<script type="text/javascript">
	function isCompany(row) {
			if (document.getElementById('Owner' + row + 'FirstName').value != '' || document.getElementById('Owner' + row + 'MiddleName').value != '' || document.getElementById('Owner' + row + 'LastName').value != '') {
			document.getElementById('Owner' + row + 'FirstName').disabled = false;
			document.getElementById('Owner' + row + 'MiddleName').disabled = false;
			document.getElementById('Owner' + row + 'LastName').disabled = false;
			document.getElementById('Owner' + row + 'CompanyName').disabled = true;
		} else if (document.getElementById('Owner' + row + 'CompanyName').value != '') {
			document.getElementById('Owner' + row + 'FirstName').disabled = true;
			document.getElementById('Owner' + row + 'MiddleName').disabled = true;
			document.getElementById('Owner' + row + 'LastName').disabled = true;
			document.getElementById('Owner' + row + 'CompanyName').disabled = false;
		} else {
			document.getElementById('Owner' + row + 'FirstName').disabled = false;
			document.getElementById('Owner' + row + 'MiddleName').disabled = false;
			document.getElementById('Owner' + row + 'LastName').disabled = false;
			document.getElementById('Owner' + row + 'CompanyName').disabled = false;
		}
	}


	//====================================
	function showMinCharge() {
		if (document.getElementById("LeaseCleaningCharge1").checked == true) document.getElementById("divLeaseCleaningChargeFee").style.display = 'inline';
		else document.getElementById("divLeaseCleaningChargeFee").style.display = 'none';

		if (document.getElementById("LeaseCarpetCharge1").checked == true) document.getElementById("divLeaseCarpetChargeFee").style.display = 'inline';
		else document.getElementById("divLeaseCarpetChargeFee").style.display = 'none';

		if (document.getElementById("LeaseKeyCharge1").checked == true) document.getElementById("divLeaseKeyChargeFee").style.display = 'inline';
		else document.getElementById("divLeaseKeyChargeFee").style.display = 'none';
	}

	//====================================
	function showUtilities() {
		if (document.getElementById("LeaseUtilities1").checked == true) document.getElementById("utilities-wrapper").style.display = 'block';
		else document.getElementById("utilities-wrapper").style.display = 'none';
	}

	//====================================
	function showCommission() {
		if (document.getElementById("LeaseSalesCommissionPaid1").checked == true) document.getElementById("commission-wrapper").style.display = 'block';
		else document.getElementById("commission-wrapper").style.display = 'none';
	}

	//====================================
	function showLeaseTermination() {
		if (document.getElementById("LeaseLeaseTermination1").checked == true) document.getElementById("divLeaseTerminationDays").style.display = 'inline';
		else document.getElementById("divLeaseTerminationDays").style.display = 'none';
	}

	//====================================
	function showPersonalGuaranty() {
		if (document.getElementById("LeasePersonalGuaranty1").checked == true) document.getElementById("guaranty-wrapper").style.display = 'block';
		else document.getElementById("guaranty-wrapper").style.display = 'none';
	}

	//====================================
	function showEarlyTerminationFee() {
		if (document.getElementById("LeaseEarlyTermination1").checked == true) document.getElementById("early-termination-wrapper").style.display = 'block';
		else document.getElementById("early-termination-wrapper").style.display = 'none';
	}

	//====================================
	function showPet() {
		if (document.getElementById("LeasePet1").checked == true) {
			if (numOfPets == 0) numOfPets = 1;
			addPets(numOfPets);
			document.getElementById("pet-wrapper").style.display = 'block';
		}	else {
			document.getElementById("pet-wrapper").style.display = 'none';
			for (i=0; i<=9; i++) document.getElementById('Pet' + i + 'Type').required = false;
		}
	}
	
	//====================================
	function addPets(numOfPets) {
		//Hide all the rows
		$("#pet-table tr[class='petRow']").hide();
		
		//Show the number of rows selected
		for (i=0; i<numOfPets; i++) {
			$("#petRow" + i).show();
			document.getElementById('Pet' + i + 'Type').required = true;
		}
		for (i=numOfPets; i<10; i++) document.getElementById('Pet' + i + 'Type').required = false;
	}

	//====================================
	function showPoolMaintain() {
		if (document.getElementById("LeasePool1").checked == true) {
			document.getElementById("pool-maintain-wrapper").style.display = 'block';
			//document.getElementById("pool-maintain-pay-wrapper").style.display = 'block';
			document.getElementById("pool-repair-wrapper").style.display = 'block';
		}	else {
			document.getElementById("pool-maintain-wrapper").style.display = 'none';
			document.getElementById("pool-maintain-pay-wrapper").style.display = 'none';
			document.getElementById("pool-repair-wrapper").style.display = 'none';
		}
	}

	//====================================
	function showPoolMaintainPay() {
		if (document.getElementById("LeasePoolMaintain1").checked == true) {
			document.getElementById("pool-maintain-pay-wrapper").style.display = 'block';
		}	else {
			document.getElementById("pool-maintain-pay-wrapper").style.display = 'none';
		}
	}

	//====================================
	function showVehicles() {
		if (document.getElementById("LeaseVehiclesPermitted1").checked == true) {
			if (numOfVehicles == 0) $("#addVehicle").trigger("click");
			document.getElementById("vehicle-wrapper").style.display = 'block';
		}	else {
			document.getElementById("vehicle-wrapper").style.display = 'none';
			$("#vehicle-table").find("tr:gt(0)").remove();
		}
	}

	//====================================
/*
	function addVehicles(numOfVehicles) {
		var strHtml = '';
	
		$("#vehicle-table").find("tr:gt(0)").remove();

		for (var i=1; i<=numOfVehicles; i++) {
			strHtml += '<tr><td><input name="data[Vehicle][' + i + '][type]" type="text" id="Vehicle' + i + 'Type" maxlength="50" class="short"></td>';
			strHtml += '<td><input name="data[Vehicle][' + i + '][make]" type="text" id="Vehicle' + i + 'Make" maxlength="50" class="short"></td>';
			strHtml += '<td><input name="data[Vehicle][' + i + '][model]" type="text" id="Vehicle' + i + 'Model" maxlength="50" class="short"></td>';
			strHtml += '<td><input name="data[Vehicle][' + i + '][color]" type="text" id="Vehicle' + i + 'Color" maxlength="50" class="short"></td>';
			strHtml += '<td><input name="data[Vehicle][' + i + '][license]" type="text" id="Vehicle' + i + 'License" maxlength="50" class="short"></td></tr>';
		}
		$('#vehicle-table tr:last').after(strHtml);
	}
*/

	//====================================
	function changeType() {
		if (document.getElementById("LeaseRentLateFeeType1").checked == true) $('#divRentLateFee').html($('#divRentLateFee').html().replace('$','%'));
		else $('#divRentLateFee').html($('#divRentLateFee').html().replace('%','$'));
	}

	//====================================
	function removeProvision(id) {
		if (confirm("Are you sure you want to remove this provision?")) {
			//Remove the selected provision
			$("#div-provision" + id).remove();

			var i = 1;
			$("span.provision-number").each(function() {
				$(this).text(i + ".");
				i++;
			});
			provisionNumbering--;
		}
	}

	//====================================
	function deleteProvision(id) {
		if (confirm("Are you sure you want to delete this provision?")) {
			$.ajax({
			    url: '/index.php/provisions/delete/' + id + '/true',
			    cache: false,
			    type: 'GET',
			    dataType: 'HTML',
			    success: function (data) {
						if (data != '') {
							$('#divPopupProvisionsList').find('.inner_padding').html(data);
						}
					},
			    error: function (error) {
			    	alert("error: " + error);
			    }
			});
		}
	}

	//====================================
	function removeVehicle(id) {
		$("#vehicle-table").find("#vehicle" + id).remove();
		numOfVehicles--;
	}

	//====================================
	function disable_maintenance(appliance) {
		<?php	if ($this->data['Lease']['lease_type'] != 'short') { ?>
			if (document.getElementById('LeaseAppliances' + appliance).checked)	{
				document.getElementById('LeaseMaintenance' + appliance).checked = false;
				document.getElementById('LeaseMaintenance' + appliance).disabled = true;
			} else document.getElementById('LeaseMaintenance' + appliance).disabled = false;
		<?php } ?>
	}

	//====================================
	function disable_appliances(maintenance) {
		<?php	if ($this->data['Lease']['lease_type'] != 'short') { ?>
			if (document.getElementById('LeaseMaintenance' + maintenance).checked) {
				document.getElementById('LeaseAppliances' + maintenance).checked = false;
				document.getElementById('LeaseAppliances' + maintenance).disabled = true;
			} else document.getElementById('LeaseAppliances' + maintenance).disabled = false;
		<?php } ?>
	}



	//===============================================================================================
	// Retrieve the provisions selected by the user and add them to the custom provisions list
	//===============================================================================================
	function getProvisions(selected_provisions) {
		$.ajax({
		    url: '/index.php/provisions/getProvisions/' + selected_provisions,
		    cache: false,
		    type: 'GET',
		    dataType: 'HTML',
		    success: function (data) {
					if (data != '') {
						var obj = jQuery.parseJSON(data);

						$.each(obj, function(key, value) {
							var row_class = '';
							strHtml = '<div id="div-provision' + numOfProvisions + '" class="div-provision" style="margin-bottom:2px;">';
							strHtml += '	<input type="hidden" name="data[Provision][' + numOfProvisions + '][id]" value="' + key + '" />';
							strHtml += '	<span id="provision-number' + numOfProvisions + '" class="provision-number">' + provisionNumbering + '.</span>';
							strHtml += '	<textarea name="data[Provision][' + numOfProvisions + '][description]" id="Provision' + numOfProvisions + 'Description" class="provision" rows="6" cols="30" style="display:inline-block;vertical-align: middle">' + value + '</textarea> &nbsp;';
							strHtml += '	<div class="provision-icons">';
							strHtml += '		<div style="float:left;"><a href="#" onclick="removeProvision(' + numOfProvisions + ');return false;" alt="Remove this Custom Provision" title="Remove this Custom Provision"><img src="/img/icon_trash.png" /></a></div>';
							strHtml += '		<div id="provision-actions' + numOfProvisions + '" style="float:left;display:none;"><input type="radio" name="data[Provision][' + numOfProvisions + '][option]" id="Provision' + numOfProvisions + 'Option0" value="overwrite" />Modify original provision';
							strHtml += '		<br /><input type="radio" name="data[Provision][' + numOfProvisions + '][option]" id="Provision' + numOfProvisions + 'Option1" value="save" />Save as new provision';
							strHtml += '		<br /><input type="radio" name="data[Provision][' + numOfProvisions + '][option]" id="Provision' + numOfProvisions + 'Option2" value="ignore" checked />Use for this lease only</div>';
							strHtml += '	</div>';
							strHtml += '</div>';
							$('#div-provisions').append(strHtml);

							numOfProvisions++;
							provisionNumbering++;
						}); 
		      }
		    },
		    error: function (error) {
					alert('error: ' + error.responseText);
		    	alert('An error occured while processing your request.');
		    }
		});
	}


	//***********************************************************************************************
	// Get the list of custom provisions for the logged-in user
	//***********************************************************************************************
	$('#openProvisionsList').live('click', function() {
		$.ajax({
		    url: '/index.php/provisions/getList/',
		    cache: false,
		    type: 'GET',
		    dataType: 'HTML',
		    success: function (data) {
					if (data != '') {
						$('#divPopupProvisionsList').find('.inner_padding').html(data);
					  $('#overlay').fadeIn('slow');
					  $("#divPopupProvisionsList").fadeIn('slow');
					}
				},
		    error: function (error) {
		    	alert("error: " + error);
		    }
		});
	});

  //One or more entries have been selected from the provisions list, get the info to populate the form
  $('#btnChooseProvision').live('click', function() {
		var selected_provisions = [];
		$('#divPopupProvisionsList input:checked').each(function() {
	    selected_provisions.push($(this).val());
		});
		getProvisions(selected_provisions);
 		$('#divPopupProvisionsList').fadeOut('slow');
 		$('#overlay').fadeOut('slow');
	});

  //Close the provisions list popup
  $('#btnCancelProvision').live('click', function() {
 		$('#divPopupProvisionsList').fadeOut('slow');
 		$('#overlay').fadeOut('slow');
	});
	

	<?php
		echo 'var numOfVehicles = ' . count($vehicles) . ';';
		//echo 'var numOfProvisions = ' . $autofill_custom_provisions['autofill_custom_provisions_count'] . ';';
		echo 'var numOfProvisions = ' . $provisions_number . ';';
		if (isset($this->data['Lease']['how_many_pets'])) echo 'var numOfPets = ' . $this->data['Lease']['how_many_pets'] . ';';
		else echo 'var numOfPets = 1;';
	?>
	var provisionNumbering = numOfProvisions;


	$(document).ready(function() {
    	changeType();
    	showUtilities();
    	showMinCharge();
    	showPersonalGuaranty();
    	showPet();
    	<?php
    		if ($this->data['Lease']['lease_type'] != 'multi') echo 'showVehicles(); showCommission();';
    		if ($this->data['Lease']['lease_type'] == 'single') echo 'showPoolMaintain(); showPoolMaintainPay(); showLeaseTermination(); showEarlyTerminationFee();';
    	?>
//    	$("#LeaseContactCountry").change();
			$('#LeaseContactState').change();

			var i=<?php echo $provisions_number; ?>;

			<?php if ($lease_renewal != 1) { ?>
				for (i=0; i<<?php echo count($tenants_number); ?>; i++) {
					isCompany(i);
				}
			<?php } ?>

    	<?php	if ($this->data['Lease']['lease_type'] != 'short') { ?>
				//If any appliances are checked, disable the corresponding maintenance checkbox
				$('.appliances').each(function(i, obj) {
					if (obj.checked) {
						var maintenanceID = obj.id;
						maintenanceID = maintenanceID.replace('Appliances', 'Maintenance');
						document.getElementById(maintenanceID).checked = false;
						document.getElementById(maintenanceID).disabled = true;
					}
				});
	
				//If any maintenance items are checked, disable the corresponding appliances checkbox
				$('.maintenance').each(function(i, obj) {
					if (obj.checked) {
						var applianceID = obj.id;
						applianceID = applianceID.replace('Maintenance', 'Appliances');
						document.getElementById(applianceID).checked = false;
						document.getElementById(applianceID).disabled = true;
					}
				});
			<?php } ?>	

			//When the state dropdown's value changes, load the counties associated to the selected state
		  $("#LeaseContactState").live('change', function() {
		  	var state_id = $(this).val();
		
				$.ajax({
				    url: '/index.php/leases/loadCounties/' + state_id,
				    cache: false,
				    type: 'GET',
				    dataType: 'HTML',
				    success: function(response) {
								$('#LeaseContactCountyId').html('<option value="0">&lt;Please Select a County&gt;</option>' + response);
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

		  $("#LeaseContactCountry").live('change', function() {
		   	if ($(this).val() == 'US') {
		  		$('#state-field').show();
		  		$('#state-province-field').hide();
		  		$('#label-zip-code').text('Zip Code');
					$('#LeaseContactState').trigger("change");
		  	}	else {
		  		$('#state-field').hide();
		  		$('#state-province-field').show();
		  		$('#county-field').hide();
		  		$('#label-zip-code').text('Zip/Postal Code');
		  	}
			});


			//If a provision is modified, show the options for overwriting the original provision, saving as a new provision or using for the current lease only
//			$("textarea.provision").keydown(function(event) {
				$("textarea.provision").live("keypress", function() {
			  var strID = this.id;
			 	var newStr = strID.replace('Description', '');
			 	var divID = newStr.replace('Provision', '');
			 	$('#Provision' + divID + 'Option1').attr('checked', true);
			 	$('#provision-actions' + divID).show();
			});
			//---------------------


			//-- Add a provision --
			$("#addProvision").click(function(event) {
  			event.preventDefault();

				strHtml = '<div id="div-provision' + numOfProvisions + '" class="div-provision" style="margin-bottom:2px;"><span id="provision-number' + numOfProvisions + '" class="provision-number">' + provisionNumbering + '.</span> <textarea name="data[Provision][' + numOfProvisions + '][description]" id="Provision' + numOfProvisions + 'Description" class="provision" rows="6" cols="30" style="display:inline-block;vertical-align: middle"></textarea> &nbsp; ';
				strHtml += '	<div class="provision-icons">';
				strHtml += '		<div style="float:left;"><a href="#" onclick="removeProvision(' + numOfProvisions + ');return false;" alt="Remove this Custom Provision" title="Remove this Custom Provision"><img src="/img/icon_trash.png" /></a></div>';
				strHtml += '		<div style="float:left;"><input type="radio" name="data[Provision][' + numOfProvisions + '][option]" id="Provision' + numOfProvisions + 'Option1" checked value="save" />Save as new provision';
				strHtml += '		<br /><input type="radio" name="data[Provision][' + numOfProvisions + '][option]" id="Provision' + numOfProvisions + 'Option2" value="ignore" />Use for this lease only </div>';
				strHtml += '	</div>';
				strHtml += '</div>';
				$('#div-provisions').append(strHtml);

				numOfProvisions++;
				provisionNumbering++;
			});
			//---------------------


			//-- Add a vehicle --
			$("#addVehicle").click(function(event) {
  			event.preventDefault();
				var strHtml = '';

				strHtml += '<tr id="vehicle' + numOfVehicles + '"><td><input name="data[Vehicle][' + numOfVehicles + '][type]" type="text" id="Vehicle' + numOfVehicles + 'Type" maxlength="50" class="short"></td>';
				strHtml += '<td><input name="data[Vehicle][' + numOfVehicles + '][make]" type="text" id="Vehicle' + numOfVehicles + 'Make" maxlength="50" class="short"></td>';
				strHtml += '<td><input name="data[Vehicle][' + numOfVehicles + '][model]" type="text" id="Vehicle' + numOfVehicles + 'Model" maxlength="50" class="short"></td>';
				strHtml += '<td><input name="data[Vehicle][' + numOfVehicles + '][color]" type="text" id="Vehicle' + numOfVehicles + 'Color" maxlength="50" class="short"></td>';
				strHtml += '<td><input name="data[Vehicle][' + numOfVehicles + '][license]" type="text" id="Vehicle' + numOfVehicles + 'License" maxlength="50" class="short"></td>';
				strHtml += '<td><a href="#" onclick="removeVehicle(' + numOfVehicles + ');return false;"><img src="/img/icon_trash.png" /></a></td></tr>';

				$('#vehicle-table tr:last').after(strHtml);

				numOfVehicles++;
			});
			//--------------------


	});
</script>


<?php echo $this->element('datepicker_includes') ?>

<div id="progress_image">
	<?php
		$progress_filename = '';
		if ($allow_fee_agreement_bypass) $progress_filename = '_bypass';
	?>
	<img src="/img/progress_lease_step3<?php echo $progress_filename; ?>.png" height="53" alt="" title="" />
	<br />
	<?php echo $this->element('progress_lease' . $progress_filename); ?>
</div>


<h2>Lease Information Sheet</h2>

<div class="instructions">
    <ul>
	    <li style="font-size:18px;line-height:38px;text-align:center;list-style-image: url(/img/sqgreen.gif);">Please make your changes and submit them so we can process your lease.</li>
    </ul>
</div>

<div class="leases form">
  <?php
  	echo $this->Form->create('Lease');
  	echo $this->Form->input('tenants_number', array('type' => 'hidden'));
  	echo $this->Form->input('doContinue', array('type' => 'hidden', 'value' => 'false'));
		echo $this->Form->input('id');
	?>



  <fieldset>
  	<legend>Tenant's Information</legend>
		<br />
   	<p style="font-size:16px;">Tenants are persons that will reside at the property and are signing the lease.</p>

<?php
	if ($lease_renewal == 1) { 
		echo $this->element('tenants');
	} else {
?>

    <table id="table-tenants">
			<tr>
				<th><div class="required"><label>First Name</label></div></th>
				<th>Middle Name</th>
				<th><div class="required"><label>Last Name</label></div></th>
			</tr>

			<?php
				if (!empty($tenants)) {
					$i = 0;
	        foreach ($tenants as $tenant) {
						echo '<tr>';
						echo $this->Form->input('Tenant.' . $i . '.id', array('label' => false));
						echo '	<td>' . $this->Form->input('Tenant.' . $i . '.first_name', array('label' => false)) . '</td>';
						echo '	<td>' . $this->Form->input('Tenant.' . $i . '.middle_name', array('required' => false, 'label' => false)) . '</td>';
						echo '	<td>' . $this->Form->input('Tenant.' . $i . '.last_name', array('label' => false)) . '</td>';
						echo '</tr>';
						$i++;
					}
				} else {
					for ($i=0; $i<$tenants_number; $i++) {
						echo '<tr>';
						echo '	<td>' . $this->Form->input('Tenant.' . $i . '.first_name', array('label' => false)) . '</td>';
						echo '	<td>' . $this->Form->input('Tenant.' . $i . '.middle_name', array('required' => false, 'label' => false)) . '</td>';
						echo '	<td>' . $this->Form->input('Tenant.' . $i . '.last_name', array('label' => false)) . '</td>';
						echo '</tr>';
					}
				}
			?>
		</table>
<?php } ?>
    <br />
  </fieldset>


	<?php if ($occupants_number > 0) { ?>
	  <fieldset>
	  	<legend>Occupants</legend>
			<br />
	   	<p style="font-size:16px;">Occupants are persons that will reside at the property, but are not signing the lease (example: minor children).</p>
	
	    <table id="table-occupants">
				<tr>
					<th><div class="required"><label>First Name</label></div></th>
					<th>Middle Name</th>
					<th><div class="required"><label>Last Name</label></div></th>
				</tr>
	
					<?php
						if (!empty($occupants)) {
							$i = 0;
			        foreach ($occupants as $occupant) {
								echo '<tr>';
								echo $this->Form->input('Occupant.' . $i . '.id', array('label' => false));
								echo '	<td>' . $this->Form->input('Occupant.' . $i . '.first_name', array('label' => false)) . '</td>';
								echo '	<td>' . $this->Form->input('Occupant.' . $i . '.middle_name', array('required' => false, 'label' => false)) . '</td>';
								echo '	<td>' . $this->Form->input('Occupant.' . $i . '.last_name', array('label' => false)) . '</td>';
								echo '</tr>';
								$i++;
							}
						} else {
							for ($i=0; $i<$occupants_number; $i++) {
								echo '<tr>';
								echo '	<td>' . $this->Form->input('Occupant.' . $i . '.first_name', array('label' => false)) . '</td>';
								echo '	<td>' . $this->Form->input('Occupant.' . $i . '.middle_name', array('required' => false, 'label' => false)) . '</td>';
								echo '	<td>' . $this->Form->input('Occupant.' . $i . '.last_name', array('label' => false)) . '</td>';
								echo '</tr>';
							}
						}
					?>
	
			</table>
	  	<br />
	  </fieldset>
	<?php } ?>


  <fieldset>
    <legend>Property Owner's Information</legend>
    <br />
    <p style="font-size:16px;">Be sure to use the complete and proper name of the record title holder of the property.</p>


    <?php
    	//echo $this->Form->input('property_owner_is_company', array('label' => "If the Owner is a company check here.", 'type' => "checkbox", "onclick" => 'isCompany()'));
    ?>

    <!--div class="input text required" id="company_name" style="display: none;">
	  	<label for="OwnerCompanyName">Company Name</label>
	  	<?php echo $this->Form->input('Owner.0.company_name', array('label' => false, 'div' => false, 'error' => false)); ?>
			<span><?php echo $this->Form->error('Owner.0.company_name', null, array('class' => 'error-message')); ?></span>
  	</div-->
  	
  	<div id="names">
<?php
	if ($lease_renewal == 1) {
		echo $this->element('owners');
	} else {
?>
	    <table id="table-owners">
				<tr>
					<th>First Name</th>
					<th>Middle Name</th>
					<th>Last Name</th>
					<th></th>
					<th>Company Name</th>
				</tr>
				<?php
					if (!empty($owners)) {
						$i = 0;
		        foreach ($owners as $owner) {
							echo '<tr>';
							echo $this->Form->input('Owner.' . $i . '.id', array('label' => false));
							echo '	<td>' . $this->Form->input('Owner.' . $i . '.first_name', array('label' => false, 'onkeyup' => 'isCompany(' . $i . ');')) . '</td>';
							echo '	<td>' . $this->Form->input('Owner.' . $i . '.middle_name', array('required' => false, 'onkeyup' => 'isCompany(' . $i . ');', 'label' => false)) . '</td>';
							echo '	<td>' . $this->Form->input('Owner.' . $i . '.last_name', array('label' => false, 'onkeyup' => 'isCompany(' . $i . ');')) . '</td>';
							echo '	<td>OR</td>';
							echo '	<td>' . $this->Form->input('Owner.' . $i . '.company_name', array('required' => false, 'onkeyup' => 'isCompany(' . $i . ');', 'label' => false, 'class' => 'company-field')) . '</td>';
							echo '</tr>';
							$i++;
						}
					} else {
						for ($i=0; $i<$owners_number; $i++) {
							echo '<tr>';
							echo $this->Form->input('Owner.' . $i . '.id', array('label' => false));
							echo '	<td>' . $this->Form->input('Owner.' . $i . '.first_name', array('label' => false, 'onkeyup' => 'isCompany(' . $i . ');')) . '</td>';
							echo '	<td>' . $this->Form->input('Owner.' . $i . '.middle_name', array('required' => false, 'onkeyup' => 'isCompany(' . $i . ');', 'label' => false)) . '</td>';
							echo '	<td>' . $this->Form->input('Owner.' . $i . '.last_name', array('label' => false, 'onkeyup' => 'isCompany(' . $i . ');')) . '</td>';
							echo '	<td>OR</td>';
							echo '	<td>' . $this->Form->input('Owner.' . $i . '.company_name', array('required' => false, 'onkeyup' => 'isCompany(' . $i . ');', 'label' => false, 'class' => 'company-field')) . '</td>';
							echo '</tr>';
						}
					}
				?>
			</table>
<?php } ?>
		</div>
	

    <br /><br />
	</fieldset>



  <fieldset>
  	<legend>Lease Property Information</legend>
    <br />
    <?php
			if ($lease_renewal == 1) {
		?>
				<table class="list-items">
					<tr>
						<td><?php echo __('Street Address'); ?></td>
						<td><?php echo $this->data['Lease']['property_street_address1']; ?></td>
					</tr>
					<tr>
						<td><?php echo __('Unit No.'); ?></td>
						<td><?php echo $this->data['Lease']['property_street_address2']; ?></td>
					</tr>
					<tr>
						<td><?php echo __('City'); ?></td>
						<td><?php echo $this->data['Lease']['property_city']; ?></td>
					</tr>
					<tr>
						<td><?php echo __('State'); ?></td>
						<td><?php echo $this->data['Lease']['property_state']; ?></td>
					</tr>
					<tr>
						<td><?php echo __('County'); ?></td>
						<td><?php echo $this->data['County']['name']; ?></td>
					</tr>
					<tr>
						<td><?php echo __('Zip Code'); ?></td>
						<td><?php echo $this->data['Lease']['property_zip_code']; ?></td>
					</tr>
				</table>

		<?php
			} else {
	      echo $this->Form->input('property_street_address1', array('label' => 'Street Address'));
	      echo $this->Form->input('property_street_address2', array('label' => 'Unit No.'));
	      echo $this->Form->input('property_city', array('label' => 'City'));
	      echo $this->Form->input('property_state', array('type' => 'hidden'));
				echo '<div class="input text"><label style="height:23px;">State</label>' . $property_state . '</div>';
				echo '<div class="input text"><label style="height:23px;">County</label>' . $property_county . '</div>';
	      echo $this->Form->input('property_zip_code', array('label' => 'Zip Code'));
			}
    ?>
    <br />
  </fieldset>



  <fieldset>
		<legend>Person Responsible for Managing the Property</legend>
    <br />
    <p style="font-size:16px;">
      Provide the name and contact information for the person we can contact if we have questions about this lease.</p>
      <br />
    <?php
      echo $this->Form->input('contact_company_name', array('label' => 'Company Name'));
      echo $this->Form->input('contact_first_name', array('label' => 'First Name'));
      echo $this->Form->input('contact_last_name', array('label' => 'Last Name'));
      echo $this->Form->input('contact_street_address1', array('label' => 'Street Address'));
      echo $this->Form->input('contact_street_address2', array('label' => 'Unit No.'));
      echo $this->Form->input('contact_city', array('label' => 'City'));
      echo $this->Form->input('contact_state', array('label' => 'State', 'options' => $states, 'div' => array('id' => 'state-field')));
//      echo $this->Form->input('contact_state_province', array('label' => 'State/Province', 'div' => array('id' => 'state-province-field')));
      echo $this->Form->input('contact_county_id', array('label' => 'County', 'options' => $counties, 'div' => array('id' => 'county-field')));
      echo $this->Form->input('contact_zip_code', array('label' => 'Zip Code'));
//			echo $this->Form->input('contact_country', array('label' => 'Country', 'options' => $countries));
    ?>

		<div class="input text">
    	<label for="LeaseContactPhoneNumber">Phone Number<span style="font-size:16px;color: #a5db00;">*</span></label>
    	<?php echo $this->Form->input('cpn1', array('label' => false, 'div'=> false, 'error' => false, 'size' => 3, 'maxlength' => '3')); ?> - 
			<?php echo $this->Form->input('cpn2', array('label' => false, 'div'=> false, 'error' => false, 'size' => 3, 'maxlength' => '3')); ?> - 
			<?php echo $this->Form->input('cpn3', array('label' => false, 'div'=> false, 'error' => false, 'size' => 4, 'maxlength' => '4', 'after' => '<span>Business Hours</span>')); ?>
			<span>
				<?php echo $this->Form->error('contact_phone_number', null, array('class' => 'error-message')); ?>
			</span>
  	</div>

		<div class="input text">
    	<label for="LeaseContactPhoneNumberEmegencies">Phone Number<span style="font-size:16px;color: #a5db00;">*</span></label>
    	<?php echo $this->Form->input('cpne1', array('label' => false, 'div'=> false, 'error' => false, 'size' => 3, 'maxlength' => '3')); ?> - 
			<?php echo $this->Form->input('cpne2', array('label' => false, 'div'=> false, 'error' => false, 'size' => 3, 'maxlength' => '3')); ?> - 
			<?php echo $this->Form->input('cpne3', array('label' => false, 'div'=> false, 'error' => false, 'size' => 4, 'maxlength' => '4', 'after' => '<span>After Hours Emergencies</span>')); ?>
			<span>
				<?php echo $this->Form->error('contact_phone_number_emergencies', null, array('class' => 'error-message')); ?>
			</span>
  	</div>
    <br />
  </fieldset>


  <fieldset>
  	<legend>Lease Information</legend>
    <br />
    <?php
			echo '<div class="input-radio-short"><label class="main-label">Who will Manage the Property</label>';
			$options = array(Configure::read('Lease.manager_company') => 'Management Company', Configure::read('Lease.manager_owner') => 'Property Owner');
			$attributes = array('legend' => false, 'separator' => ' ');
			echo $this->Form->radio('manager', $options, $attributes);
			echo '</div>';
		
			echo '<div class="input-radio-short"><label class="main-label">Who is signing the Lease</label>';
			$options = array(Configure::read('Lease.signer_agent') => 'Management Company Agent', Configure::read('Lease.signer_owner') => 'Property Owner');
			$attributes = array('legend' => false, 'separator' => ' ');
			echo $this->Form->radio('signer', $options, $attributes);
			echo '</div>';
			echo '<br />';


			//-- Term
			echo '<fieldset class="top-only"><legend>Term</legend>';
			echo $this->Form->input('lease_start', array('type' => 'text'));
			echo $this->Form->input('lease_end', array('type' => 'text'));
			echo '</fieldset>';


			//-- Rent
			echo '<fieldset class="top-only"><legend>Rent</legend>';
      echo $this->Form->input('monthly_rent', array('before' => '$ ', 'class' => 'currency', 'after' => '<span>Provide the monthly rental amount in the lease.</span>'));
      echo $this->Form->input('sales_tax', array('before' => '$ ', 'class' => 'currency', 'after' => '<span>If applicable</span>', 'required' => false));
      echo $this->Form->input('county_tax', array('before' => '$ ', 'class' => 'currency', 'after' => '<span>If applicable</span>', 'required' => false));
			echo $this->Form->input('rent_due_date', array('options' => $rent_due_date_options, 'default' => 5));
			echo $this->Form->input('rent_late_date', array('options' => $rent_due_date_options));
			echo '<div class="input-radio"><label class="main-label">Late Rent Fee Type</label>';
			$options = array(1 => 'Percentage of Rent', 0 => 'Flat Fee');
			$attributes = array('legend' => false, 'separator' => '<br />', 'default' => 0, 'onclick' => 'changeType();');
			echo $this->Form->radio('rent_late_fee_type', $options, $attributes);
			echo '</div>';
			echo $this->Form->input('rent_late_fee', array('before' => '$ ', 'class' => 'currency', 'label' => 'Initial Late Rent Fee', 'div'=>array('id' => 'divRentLateFee')));
			echo $this->Form->input('rent_late_fee_daily', array('before' => '$ ', 'class' => 'currency', 'label' => 'Additional Late Rent Fee', 'after' => ' per ' . $this->Form->input('rent_late_date_type', array('options' => array("day", "week"), 'label' => false))));
			echo '<div class="input-radio"><label class="main-label">Cash Payment Accepted</label>';
			$options = array(1 => 'Yes', 0 => 'No');
			$attributes = array('legend' => false, 'separator' => '<br />', 'default' => 0);
			echo $this->Form->radio('cash_payment', $options, $attributes);
			echo '</div>';
			echo '</fieldset>';


			//-- Prorated Rent
			echo '<fieldset class="top-only"><legend>Prorated Rent</legend>';
			echo $this->Form->input('prorated_rent', array('before' => '$ ', 'class' => 'currency'));
//			if ($lease_type == 'short') {
	      echo $this->Form->input('prorated_sales_tax', array('label' => 'Sales Tax', 'before' => '$ ', 'class' => 'currency', 'after' => '<span>If applicable</span>', 'required' => false));
	      echo $this->Form->input('prorated_county_tax', array('label' => 'County Tax', 'before' => '$ ', 'class' => 'currency', 'after' => '<span>If applicable</span>', 'required' => false));
//	    }
      echo $this->Form->input('prorated_start_date', array('type' => 'text', 'required' => 'false'));
      echo $this->Form->input('prorated_end_date', array('type' => 'text', 'required' => 'false'));
      echo $this->Form->input('prorated_rent_due_date', array('type' => 'text', 'required' => 'false'));
			echo '</fieldset>';


			//-- Advance Rent
			echo '<fieldset class="top-only"><legend>Advance Rent</legend>';
			echo $this->Form->input('advance_rent', array('before' => '$ ', 'class' => 'currency'));
//			if ($lease_type == 'short') {
	      echo $this->Form->input('advance_sales_tax', array('label' => 'Sales Tax', 'before' => '$ ', 'class' => 'currency', 'after' => '<span>If applicable</span>', 'required' => false));
	      echo $this->Form->input('advance_county_tax', array('label' => 'County Tax', 'before' => '$ ', 'class' => 'currency', 'after' => '<span>If applicable</span>', 'required' => false));
//	    }
			echo '</fieldset>';


			//-- Security Deposit
			echo '<fieldset class="top-only"><legend>Security Deposit</legend>';
      echo $this->Form->input('security_deposit', array('before' => '$ ', 'class' => 'currency', 'after' => '<span>Provide the security deposit amount paid by the Tenant</span>', 'required' => false));

			echo '<div class="input-radio"><label class="main-label">Security Deposit Account Type</label>';
			$options = array(Configure::read('Lease.account_type_interest') => 'Interest Bearing', Configure::read('Lease.account_type_no_interest') => 'Non-Interest Bearing');
			$attributes = array('legend' => false, 'separator' => '<br />', 'default' => Configure::read('Lease.account_type_no_interest'));
			echo $this->Form->radio('security_deposit_account_type', $options, $attributes);
			echo '</div>';

      echo $this->Form->input('security_deposit_bank_account', array('label' => 'Name and Address of Bank where Security Deposit Held', 'required' => false));

			echo '</fieldset>';

			if ($lease_type != 'short') {
				//-- Termination and Renewal of Lease
				echo '<fieldset class="top-only"><legend>Termination and Renewal of Lease</legend>';
	      echo $this->Form->input('notice_non_renewal', array('label' => 'Notice of Tenant Non-Renewal', 'options' => $notice_non_renewal_options, 'required' => false));
				echo '</fieldset>';
			}


			//-- Mandatory Charges When Tenant Vacates
			echo '<fieldset class="top-only"><legend>Mandatory Charges When Tenant Vacates</legend>';
			echo '<div class="input-radio"><label class="main-label">Cleaning Mandatory Minimum Charge?</label>';
			$options = array(1 => 'Yes &nbsp;' . $this->Form->input('cleaning_charge_fee', array('before' => '$ ', 'class' => 'currency', 'label' => false, 'div' => array('id' => 'divLeaseCleaningChargeFee', 'class' => 'min_charge'))), 0 => 'No');
			$attributes = array('legend' => false, 'separator' => '<br />', 'default' => 0, 'onclick' => 'showMinCharge();');
			echo $this->Form->radio('cleaning_charge', $options, $attributes);
			echo '</div>';

			echo '<div class="input-radio"><label class="main-label">Carpet/Floor Cleaning Mandatory Minimum Charge?</label>';
			$options = array(1 => 'Yes &nbsp;' . $this->Form->input('carpet_charge_fee', array('before' => '$ ', 'class' => 'currency', 'label' => false, 'div' => array('id' => 'divLeaseCarpetChargeFee', 'class' => 'min_charge'))), 0 => 'No');
			$attributes = array('legend' => false, 'separator' => '<br />', 'default' => 0, 'onclick' => 'showMinCharge();');
			echo $this->Form->radio('carpet_charge', $options, $attributes);
			echo '</div>';

			echo '<div class="input-radio"><label class="main-label">Missing Keys, Garage Remotes, Access Card Mandatory Minimum Charge?</label>';
			$options = array(1 => 'Yes &nbsp;' . $this->Form->input('key_charge_fee', array('before' => '$ ', 'class' => 'currency', 'label' => false, 'div' => array('id' => 'divLeaseKeyChargeFee', 'class' => 'min_charge'))), 0 => 'No');
			$attributes = array('legend' => false, 'separator' => '<br />', 'default' => 0, 'onclick' => 'showMinCharge();');
			echo $this->Form->radio('key_charge', $options, $attributes);
			echo '</div>';
			echo '</fieldset>';


			//-- Appliances
			echo '<fieldset class="top-only"><legend>Appliances and Fixtures</legend>';
			echo "<label>Appliances and Fixtures Included, Repaired and Maintained by the Landlord.</label>";
			echo $this->Form->input('appliances_ceiling_fans', 			array('label' => 'Ceiling Fans', 								'type' => 'checkbox', 'class' => 'appliances', 'onclick' => 'disable_maintenance(\'CeilingFans\');'));
			echo $this->Form->input('appliances_dishwasher', 				array('label' => 'Dishwasher', 									'type' => 'checkbox', 'class' => 'appliances', 'onclick' => 'disable_maintenance(\'Dishwasher\');'));
			echo $this->Form->input('appliances_dryer', 						array('label' => 'Dryer', 											'type' => 'checkbox', 'class' => 'appliances', 'onclick' => 'disable_maintenance(\'Dryer\');'));
			echo $this->Form->input('appliances_garbage_disposal', 	array('label' => 'Garbage Disposal', 						'type' => 'checkbox', 'class' => 'appliances', 'onclick' => 'disable_maintenance(\'GarbageDisposal\');'));
			echo $this->Form->input('appliances_irrigation', 				array('label' => 'Irrigation/Sprinkler System', 'type' => 'checkbox', 'class' => 'appliances', 'onclick' => 'disable_maintenance(\'Irrigation\');'));
			echo $this->Form->input('appliances_microwave', 				array('label' => 'Microwave', 									'type' => 'checkbox', 'class' => 'appliances', 'onclick' => 'disable_maintenance(\'Microwave\');'));
			echo $this->Form->input('appliances_oven', 							array('label' => 'Oven', 												'type' => 'checkbox', 'class' => 'appliances', 'onclick' => 'disable_maintenance(\'Oven\');'));
			echo $this->Form->input('appliances_range', 						array('label' => 'Range', 											'type' => 'checkbox', 'class' => 'appliances', 'onclick' => 'disable_maintenance(\'Range\');'));
			echo $this->Form->input('appliances_refrigerator', 			array('label' => 'Refrigerator', 								'type' => 'checkbox', 'class' => 'appliances', 'onclick' => 'disable_maintenance(\'Refrigerator\');'));
			echo $this->Form->input('appliances_washer', 						array('label' => 'Washer', 											'type' => 'checkbox', 'class' => 'appliances', 'onclick' => 'disable_maintenance(\'Washer\');'));
			echo $this->Form->input('appliances_water_conditioner', array('label' => 'Water Softener', 							'type' => 'checkbox', 'class' => 'appliances', 'onclick' => 'disable_maintenance(\'WaterConditioner\');'));
			echo $this->Form->input('appliances_water_heater', 			array('label' => 'Water Heater', 								'type' => 'checkbox', 'class' => 'appliances', 'onclick' => 'disable_maintenance(\'WaterHeater\');'));
			echo $this->Form->input('appliances_window_blinds', 		array('label' => 'Window Blinds', 							'type' => 'checkbox', 'class' => 'appliances', 'onclick' => 'disable_maintenance(\'WindowBlinds\');'));
			//echo $this->Form->input('appliances_other', array('label' => 'Other', 'type' => 'checkbox', 'after' => '&nbsp; ' . $this->Form->input('appliances_other_desc', array('label' => false, 'div' => false, 'after' => '<span>Please separate each item with a semi-colon</span>'))));
//			echo $this->Form->input('appliances_other_desc', array('label' => 'Other', 'style' => 'width:auto;', 'after' => '<span>Please separate each item with a semi-colon</span>'));
			echo '<div class="input textarea" style="margin-left:24px;">';
			echo $this->Form->label('LeaseAppliancesOtherDesc', 'Other <span>(Please separate each item with a semi-colon)</span>', array('style="width:100%"'));
			echo '<br />';
			echo $this->Form->input('appliances_other_desc', array('label' => false, 'div' => false, 'type' => 'textarea'));
			echo '</div>';
			echo '</fieldset>';


			if ($lease_type != 'short') {
				//-- Property maintenance and repair
				echo '<fieldset class="top-only"><legend>Property Maintenance and Repair</legend>';
				echo "<label>Maintenance and Repairs at Tenant's Expense.</label>";
				echo $this->Form->input('maintenance_ac_filters', 						array('label' => 'A/C Filters', 									'type' => 'checkbox'));
				echo $this->Form->input('maintenance_drain_lines', 						array('label' => 'All Drain Lines', 							'type' => 'checkbox'));
				echo $this->Form->input('maintenance_ceiling_fans', 					array('label' => 'Ceiling Fans', 									'type' => 'checkbox', 'onclick' => 'disable_appliances(\'CeilingFans\');', 'class' => 'maintenance'));
				echo $this->Form->input('maintenance_dishwasher', 						array('label' => 'Dishwasher', 										'type' => 'checkbox', 'onclick' => 'disable_appliances(\'Dishwasher\');', 'class' => 'maintenance'));
				echo $this->Form->input('maintenance_dryer', 									array('label' => 'Dryer', 												'type' => 'checkbox', 'onclick' => 'disable_appliances(\'Dryer\');', 'class' => 'maintenance'));
				echo $this->Form->input('maintenance_garbage_disposal', 			array('label' => 'Garbage Disposal', 							'type' => 'checkbox', 'onclick' => 'disable_appliances(\'GarbageDisposal\');', 'class' => 'maintenance'));
				echo $this->Form->input('maintenance_irrigation', 						array('label' => 'Irrigation/Sprinkler System', 	'type' => 'checkbox', 'onclick' => 'disable_appliances(\'Irrigation\');', 'class' => 'maintenance'));
				echo $this->Form->input('maintenance_light_bulbs', 						array('label' => 'Light Bulbs', 									'type' => 'checkbox'));
				echo $this->Form->input('maintenance_locks', 									array('label' => 'Locks and Keys', 								'type' => 'checkbox'));
				echo $this->Form->input('maintenance_microwave', 							array('label' => 'Microwave', 										'type' => 'checkbox', 'onclick' => 'disable_appliances(\'Microwave\');', 'class' => 'maintenance'));
				echo $this->Form->input('maintenance_oven', 									array('label' => 'Oven', 													'type' => 'checkbox', 'onclick' => 'disable_appliances(\'Oven\');', 'class' => 'maintenance'));
				echo $this->Form->input('maintenance_range', 									array('label' => 'Range', 												'type' => 'checkbox', 'onclick' => 'disable_appliances(\'Range\');', 'class' => 'maintenance'));
				echo $this->Form->input('maintenance_refrigerator', 					array('label' => 'Refrigerator', 									'type' => 'checkbox', 'onclick' => 'disable_appliances(\'Refrigerator\');', 'class' => 'maintenance'));
				echo $this->Form->input('maintenance_refrigerator_ice_maker', array('label' => 'Refrigerator Ice Maker', 				'type' => 'checkbox'));
				echo $this->Form->input('maintenance_refrigerator_dispenser', array('label' => 'Refrigerator Water Dispenser', 	'type' => 'checkbox'));
				echo $this->Form->input('maintenance_refrigerator_filter', 		array('label' => 'Refrigerator Water Filter', 		'type' => 'checkbox'));
				echo $this->Form->input('maintenance_smoke_detector', 				array('label' => 'Smoke Detector Batteries', 			'type' => 'checkbox'));
				echo $this->Form->input('maintenance_washer', 								array('label' => 'Washer', 												'type' => 'checkbox', 'onclick' => 'disable_appliances(\'Washer\');', 'class' => 'maintenance'));
				echo $this->Form->input('maintenance_water_conditioner', 			array('label' => 'Water Softener', 								'type' => 'checkbox', 'onclick' => 'disable_appliances(\'WaterConditioner\');', 'class' => 'maintenance'));
				echo $this->Form->input('maintenance_water_filter', 					array('label' => 'Water Filter', 									'type' => 'checkbox'));
				echo $this->Form->input('maintenance_water_heater', 					array('label' => 'Water Heater', 									'type' => 'checkbox', 'onclick' => 'disable_appliances(\'WaterHeater\');', 'class' => 'maintenance'));
				echo $this->Form->input('maintenance_window_blinds', 					array('label' => 'Window Blinds', 								'type' => 'checkbox', 'onclick' => 'disable_appliances(\'WindowBlinds\');', 'class' => 'maintenance'));
				if ($lease_type == 'single') echo $this->Form->input('maintenance_windows_screens', array('label' => 'Windows &amp; Screens', 'type' => 'checkbox'));
	//			echo $this->Form->input('maintenance_other', array('label' => 'Other', 'type' => 'checkbox', 'after' => '&nbsp; ' . $this->Form->input('maintenance_other_desc', array('label' => false, 'div' => false, 'after' => '<span>Please separate each item with a semi-colon</span>'))));
				echo '<div class="input textarea" style="margin-left:24px;">';
				echo $this->Form->label('LeaseMaintenanceOtherDesc', 'Other <span>(Please separate each item with a semi-colon)</span>', array('style="width:100%"'));
				echo '<br />';
				echo $this->Form->input('maintenance_other_desc', array('label' => false, 'div' => false, 'type' => 'textarea'));
				echo '</div>';
				echo '</fieldset>';
			}


			if ($lease_type == 'single') {
				//-- Pool
				echo '<fieldset class="top-only"><legend>Landscaping and Pool Maintenance</legend>';
				echo '<div class="input-radio"><label class="main-label">If there is lawn or landscaping to maintain at the Property who is responsible?</label>';
				$options = array(1 => 'Landlord', 0 => 'Tenant');
				$attributes = array('legend' => false, 'separator' => '<br />', 'default' => 0);
				echo $this->Form->radio('lawn', $options, $attributes);
				echo '</div>';
	
				echo '<div class="input-radio"><label class="main-label">If there is lawn or landscaping at the Property who is responsible for irrigation / watering?</label>';
				$options = array(1 => 'Landlord', 0 => 'Tenant');
				$attributes = array('legend' => false, 'separator' => '<br />', 'default' => 0);
				echo $this->Form->radio('lawn_watering', $options, $attributes);
				echo '</div>';
	
				echo '<div class="input-radio"><label class="main-label">Is there a pool or hot tub at the Property?</label>';
				$options = array(1 => 'Yes', 0 => 'No');
				$attributes = array('legend' => false, 'separator' => '<br />', 'default' => 0, 'onclick' => 'showPoolMaintain();');
				echo $this->Form->radio('pool', $options, $attributes);
				echo '</div>';
	
				echo '<div id="pool-maintain-wrapper">';
				echo '	<div class="input-radio"><label class="main-label">Who will maintain the pool/hot tub?</label>';
				$options = array(1 => 'Professional Pool Company', 2 => 'Landlord', 3 => 'Tenant');
				$attributes = array('legend' => false, 'separator' => '<br />', 'default' => 3, 'onclick' => 'showPoolMaintainPay();');
				echo $this->Form->radio('pool_maintain', $options, $attributes);
				echo '	</div>';
				echo '</div>';
	
				echo '<div id="pool-maintain-pay-wrapper">';
				echo '	<div class="input-radio"><label class="main-label">Who will pay for the professional pool company?</label>';
				$options = array(1 => 'Landlord', 0 => 'Tenant');
				$attributes = array('legend' => false, 'separator' => '<br />', 'default' => 0);
				echo $this->Form->radio('pool_maintain_pay', $options, $attributes);
				echo '	</div>';
				echo '</div>';
	
				echo '<div id="pool-repair-wrapper">';
				echo '	<div class="input-radio"><label class="main-label">Who will pay for the repair or replacement of pool components such as filters and heating system parts?</label>';
				$options = array(1 => 'Landlord', 0 => 'Tenant');
				$attributes = array('legend' => false, 'separator' => '<br />', 'default' => 0);
				echo $this->Form->radio('pool_repair', $options, $attributes);
				echo '	</div>';
				echo '</div>';
				echo '</fieldset>';
			}


			//-- Utilities
			echo '<fieldset class="top-only"><legend>Utilities</legend>';
			echo '<div class="input-radio"><label class="main-label">Is Landlord responsible to provide and pay for any utilities?</label>';
			$options = array(1 => 'Yes', 0 => 'No');
			$attributes = array('legend' => false, 'separator' => '<br />', 'default' => 0, 'onclick' => 'showUtilities();');
			echo $this->Form->radio('utilities', $options, $attributes);
			echo '	<div id="utilities-wrapper">';
			echo $this->Form->input('utilities_cable', array('label' => 'Basic Cable', 'type' => 'checkbox'));
			echo $this->Form->input('utilities_electricity', array('label' => 'Electricity', 'type' => 'checkbox'));
			echo $this->Form->input('utilities_garbage', array('label' => 'Garbage', 'type' => 'checkbox'));
			echo $this->Form->input('utilities_gas', array('label' => 'Gas', 'type' => 'checkbox'));
			echo $this->Form->input('utilities_internet', array('label' => 'Internet', 'type' => 'checkbox'));
			echo $this->Form->input('utilities_reclaimed_water', array('label' => 'Reclaimed Water', 'type' => 'checkbox'));
			echo $this->Form->input('utilities_recycling_pickup', array('label' => 'Recycling Pickup', 'type' => 'checkbox'));
			echo $this->Form->input('utilities_satellite', array('label' => 'Satellite', 'type' => 'checkbox'));
			echo $this->Form->input('utilities_sewer', array('label' => 'Sewer', 'type' => 'checkbox'));
			echo $this->Form->input('utilities_trash_pickup', array('label' => 'Trash Pickup', 'type' => 'checkbox'));
			echo $this->Form->input('utilities_water', array('label' => 'Water', 'type' => 'checkbox'));
//			echo $this->Form->input('utilities_oil', array('label' => 'Oil', 'type' => 'checkbox'));
//			echo $this->Form->input('utilities_local_phone', array('label' => 'Local Phone', 'type' => 'checkbox'));
			echo $this->Form->input('utilities_other', array('label' => 'Other', 'type' => 'checkbox', 'after' => '&nbsp; ' . $this->Form->input('utilities_other_desc', array('label' => false, 'div' => false))));
			echo '	</div>';
			echo '</div>';
			echo '</fieldset>';


			if ($lease_type == 'single' || $lease_type == 'short') {
				//-- Vehicles
				echo '<fieldset class="top-only"><legend>Vehicles</legend>';
		 		echo '	<div class="input-radio"><p class="explanation">What vehicles are permitted on the property?</p>';
		 		echo '		<span>(examples: Automobiles, motorcycles, trailers, campers, boats, recreational vehicles, four-wheelers, dirt-bikes, go-carts, golf carts, etc.)</span><br />';
				$options = array(0 => 'Do not specify particular vehicles', 1 => 'The following specific vehicles:');
				$attributes = array('legend' => false, 'separator' => '<br />', 'default' => 0, 'onclick' => 'showVehicles()');
				echo $this->Form->radio('vehicles_permitted', $options, $attributes);
				echo '	</div>';
	
				echo '	<div id="vehicle-wrapper">';
	//      echo $this->Form->input('how_many_vehicles', array('options' => $how_many_vehicles, 'required' => false, 'onchange' => 'addVehicles(this.value)'));
		    echo '		<table id="vehicle-table">';
				echo '			<tr>';
				echo '				<th><div class="required"><label>Type of Vehicle</label></div></th>';
				echo '				<th><div class="required"><label>Make</label></div></th>';
				echo '				<th><div class="required"><label>Model</label></div></th>';
				echo '				<th><div class="required"><label>Color of Vehicle</label></div></th>';
				echo '				<th>License Plate No. <br />(if applicable)</th>';
				echo '				<th></th>';
				echo '			</tr>';
	
				if (!empty($vehicles)) {
					$i = 0;
	        foreach ($vehicles as $vehicle) {
						echo '<tr id="vehicle' . $i . '">';
						echo $this->Form->input('Vehicle.' . $i . '.id', array('label' => false));
						echo '	<td>' . $this->Form->input('Vehicle.' . $i . '.type', array('label' => false, 'class' => 'short')) . '</td>';
						echo '	<td>' . $this->Form->input('Vehicle.' . $i . '.make', array('required' => false, 'label' => false, 'class' => 'short')) . '</td>';
						echo '	<td>' . $this->Form->input('Vehicle.' . $i . '.model', array('label' => false, 'class' => 'short')) . '</td>';
						echo '	<td>' . $this->Form->input('Vehicle.' . $i . '.color', array('label' => false, 'class' => 'short')) . '</td>';
						echo '	<td>' . $this->Form->input('Vehicle.' . $i . '.license', array('label' => false, 'class' => 'short')) . '</td>';
						echo '	<td><a href="#" onclick="removeVehicle(' . $i . ');return false;">' . $this->Html->image('/img/icon_trash.png') . '</a></td>';
						echo '</tr>';
						$i++;
					}
				}
				echo '		</table>';
				echo '	<br /> <a href="#" id="addVehicle">Add A Vehicle</a>';
				echo '	</div>';
				echo '</fieldset>';
			}


			//-- Additional Provisions
			echo '<fieldset class="top-only"><legend>Additional Provisions</legend>';
			echo '	<div class="input-radio"><label class="main-label">Is smoking permitted inside the property?</label>';
			$options = array(1 => 'Yes', 0 => 'No');
			$attributes = array('legend' => false, 'separator' => '<br />', 'default' => 0);
			echo $this->Form->radio('smoking_inside', $options, $attributes);
			echo '	</div>';
	
			echo '	<div class="input-radio"><label class="main-label">Is smoking permitted on the porches, patios and balconies?</label>';
			$options = array(1 => 'Yes', 0 => 'No');
			$attributes = array('legend' => false, 'separator' => '<br />', 'default' => 0);
			echo $this->Form->radio('smoking_outside', $options, $attributes);
			echo '	</div>';

			if ($lease_type == 'single' || $lease_type == 'short') {
				echo '	<div class="input-radio"><label class="main-label">Commission Paid to Broker on Sale of Property?</label>';
				$options = array(1 => 'Yes', 0 => 'No');
				$attributes = array('legend' => false, 'separator' => '<br />', 'default' => 0, 'onclick' => 'showCommission();');
				echo $this->Form->radio('sales_commission_paid', $options, $attributes);
				echo '	</div>';
				echo '	<div id="commission-wrapper">';
				echo $this->Form->input('sales_commission', array('after' => '%', 'class' => 'currency', 'required' => false));
				echo $this->Form->input('sales_commission_paid_to', array('label' => 'Who will be paid the commission?', 'required' => false));
				echo '		<br />';
				echo '	</div>';
			}

			if ($lease_type == 'single') {
				echo '	<div class="input-radio"><label class="main-label">Lease Termination on Sale or Contract Clause?</label>';
				$options = array(1 => 'Yes &nbsp;' . $this->Form->input('lease_termination_days', array('label' => false, 'options' => $lease_termination_options, 'required' => false, 'div' => array('id' => 'divLeaseTerminationDays', 'class' => 'min_charge'))), 0 => 'No');
				$attributes = array('legend' => false, 'separator' => '<br />', 'default' => 0, 'onclick' => 'showLeaseTermination();');
				echo $this->Form->radio('lease_termination', $options, $attributes);
				echo '	</div>';
			}

			echo '	<p class="explanation">Need a custom lease provision? List each provision separately. All custom provisions will be reviewed and edited if necessary.</p>';
			echo '<div style="line-height: 36px;">' . $this->Html->image('/img/icon_address_book.png') . '&nbsp; <a href="#" onclick="return false;" style="vertical-align:top;" id="openProvisionsList">Open My List of Custom Provisions</a></div>';
			echo '<br />';

			echo '	<div id="div-provisions">';
			if (!empty($provisions)) {
				$i=0;
				foreach ($provisions as $provision) {
		    	$class = null;
	    		//if ($i % 2 == 0) $class = ' class="altrow"';
					echo '<div id="div-provision' . $i . '" class="div-provision" style="margin-bottom:2px;"><span id="provision-number' . $i . '" class="provision-number">';
					echo $i+1;
					echo '.</span>';
					echo '	<input type="hidden" name="data[Provision][' . $i . '][id]" value="' . $provision['LeaseProvision']['provision_id'] . '" />';
					echo '	<input type="hidden" name="data[Provision][' . $i . '][is_approved]" value="' . $provision['LeaseProvision']['is_approved'] . '" />';
					echo '	<textarea name="data[Provision][' . $i . '][description]" id="Provision' . $i . 'Description" class="provision" rows="6" cols="30" style="display:inline-block;vertical-align:middle;">' . $provision['LeaseProvision']['description'] . '</textarea> &nbsp; ';
					echo '	<div class="provision-icons">';
					echo '		<a href="#" onclick="removeProvision(' . $i . ');return false;" alt="Remove this Custom Provision" title="Remove this Custom Provision">' . $this->Html->image('/img/icon_trash.png') . '</a>';
					echo '		<div id="provision-actions' . $i . '" style="float:left;display:none;"><input type="radio" name="data[Provision][' . $i . '][option]" id="Provision' . $i . 'Option0" value="overwrite" />Modify original provision';
					echo '		<br /><input type="radio" name="data[Provision][' . $i . '][option]" id="Provision' . $i . 'Option1" value="save" />Save as new provision';
					echo '		<br /><input type="radio" name="data[Provision][' . $i . '][option]" id="Provision' . $i . 'Option2" value="ignore" checked />Use for this lease only</div>';
					echo ' 	</div>';
					echo '</div>';
					$i++;
				}
			}
			echo '	</div>';
			echo '	<br /> <a href="#" id="addProvision">Add New Provision</a>';

			echo '</fieldset>';

		?>
  </fieldset>



  <fieldset>
  	<legend>Lease Addendum</legend>
  	
		<?php
			echo '<div class="input-radio"><label class="main-label">Was the property built before 1978?</label>';
			$options = array(1 => 'Yes', 0 => 'No');
			$attributes = array('legend' => false, 'separator' => '<br />', 'default' => 0);
			echo $this->Form->radio('prior_1979', $options, $attributes);
			echo '</div>';

			echo '<div class="input-radio"><label class="main-label">Does the tenant have a Pet?</label>';
			$options = array(1 => 'Yes', 0 => 'No');
			$attributes = array('legend' => false, 'separator' => '<br />', 'default' => 0, 'onclick' => 'showPet();');
			echo $this->Form->radio('pet', $options, $attributes);
			echo '</div>';

			echo '<div id="pet-wrapper">';
      echo $this->Form->input('how_many_pets', array('options' => $how_many_pets, 'required' => false, 'onchange' => 'addPets(this.value)'));
			echo $this->Form->input('monthly_pet_fee', array('before' => '$ ', 'class' => 'currency'));
			echo $this->Form->input('pet_fee', array('before' => '$ ', 'label' => 'Non-Refundable Fee', 'class' => 'currency'));
			echo $this->Form->input('pet_deposit', array('before' => '$ ', 'label' => 'Additional Security Deposit', 'class' => 'currency'));
			echo '<table id="pet-table">';
			echo '	<tr>';
			echo '		<th>Type</th>';
			echo '		<th>Breed</th>';
			echo '	 	<th>Color</th>';
			echo '		<th>Weight</th>';
			echo '		<th>Name</th>';
			echo '	</tr>';
			for ($i=0; $i<10; $i++) {
				echo '<tr id="petRow' . $i . '" class="petRow">';
				echo '	<td>' . $this->Form->input('Pet.' . $i . '.type', array('label' => false)) . '</td>';
				echo '	<td>' . $this->Form->input('Pet.' . $i . '.breed', array('label' => false, 'required' => false)) . '</td>';
				echo '	<td>' . $this->Form->input('Pet.' . $i . '.color', array('label' => false)) . '</td>';
				echo '	<td>' . $this->Form->input('Pet.' . $i . '.weight', array('label' => false)) . '</td>';
				echo '	<td>' . $this->Form->input('Pet.' . $i . '.name', array('label' => false)) . '</td>';
				echo '</tr>';
			}
/*
			if (!empty($pets)) {
				$i = 0;
        foreach ($pets as $pet) {
					echo '<tr>';
					echo $this->Form->input('Pet.' . $i . '.id', array('label' => false));
					echo '	<td>' . $this->Form->input('Pet.' . $i . '.type', array('label' => false)) . '</td>';
					echo '	<td>' . $this->Form->input('Pet.' . $i . '.breed', array('required' => false, 'label' => false)) . '</td>';
					echo '	<td>' . $this->Form->input('Pet.' . $i . '.color', array('label' => false)) . '</td>';
					echo '	<td>' . $this->Form->input('Pet.' . $i . '.weight', array('label' => false)) . '</td>';
					echo '	<td>' . $this->Form->input('Pet.' . $i . '.name', array('label' => false)) . '</td>';
					echo '</tr>';
					$i++;
				}
			}
*/
			echo '</table>';
			echo '<br />';
			echo '</div>';


			echo '	<div class="input-radio"><label class="main-label">Is there a Personal Guaranty?</label>';
			$options = array(1 => 'Yes', 0 => 'No');
			$attributes = array('legend' => false, 'separator' => '<br />', 'default' => 0, 'onclick' => 'showPersonalGuaranty();');
			echo $this->Form->radio('personal_guaranty', $options, $attributes);
			echo '	</div>';
			echo '	<div id="guaranty-wrapper">';
			echo $this->Form->input('how_many_guarantors', array('label' => 'How many Guarantors?', 'options' => $how_many_guarantors, 'required' => false));
			echo '	</div>';

			//----- Waterfront Property
			echo '<div class="input-radio"><label class="main-label">Is this a waterfront property (ocean/river/pond/canal)?</label>';
			$options = array(1 => 'Yes', 0 => 'No');
			$attributes = array('legend' => false, 'separator' => '<br />', 'default' => 0);
			echo $this->Form->radio('waterfront', $options, $attributes);
			echo '</div>';
			//-----


			if ($lease_type == 'single') {
				//----- Early Termination Fee
				echo '<div class="input-radio"><label class="main-label">Allow Tenant Option for Early Lease Termination?</label>';
				$options = array(1 => 'Yes', 0 => 'No');
				$attributes = array('legend' => false, 'separator' => '<br />', 'default' => 0, 'onclick' => 'showEarlyTerminationFee();', 'value' => $autofill_addendums['early_termination']);
				echo $this->Form->radio('early_termination', $options, $attributes);
				echo '</div>';
				echo '	<div id="early-termination-wrapper">';
				echo $this->Form->input('early_termination_fee', array('label' => 'Lease Termination Fee', 'required' => false, 'before' => '<span class="dollar-sign">$</span> ', 'class' => 'currency', 'after' => ' (cannot exceed 2 x monthly rent)', 'value' => $autofill_addendums['early_termination_fee']));
				echo '	<br /></div>';
				//-----
			}


			if ($lease_type == 'multi') {
				echo '<div class="input-radio"><label class="main-label">Include access gates addendum?</label>';
				$options = array(1 => 'Yes', 0 => 'No');
				$attributes = array('legend' => false, 'separator' => '<br />', 'default' => 0);
				echo $this->Form->radio('access_gate', $options, $attributes);
				echo '</div>';
	
	
				echo '<div class="input-radio"><label class="main-label">Include community code addendum?</label>';
				$options = array(1 => 'Yes', 0 => 'No');
				$attributes = array('legend' => false, 'separator' => '<br />', 'default' => 0);
				echo $this->Form->radio('community_code', $options, $attributes);
				echo '</div>';
	

				echo '<div class="input-radio"><label class="main-label">Include early termination fee addendum?</label>';
				$options = array(1 => 'Yes', 0 => 'No');
				$attributes = array('legend' => false, 'separator' => '<br />', 'default' => 0, 'onclick' => 'showEarlyTerminationFee();');
				echo $this->Form->radio('early_termination', $options, $attributes);
				echo '</div>';
				echo '	<div id="early-termination-wrapper">';
				echo $this->Form->input('early_termination_fee', array('label' => 'Early Termination Fee Amount', 'required' => false, 'class' => 'currency', 'before' => '<span class="dollar-sign">$</span> '));
				echo '	<br /></div>';

	
				echo '<div class="input-radio"><label class="main-label">Include mold addendum?</label>';
				$options = array(1 => 'Yes', 0 => 'No');
				$attributes = array('legend' => false, 'separator' => '<br />', 'default' => 0);
				echo $this->Form->radio('mold', $options, $attributes);
				echo '</div>';
	
	
				echo '<div class="input-radio"><label class="main-label">Include pool rules and regulations addendum?</label>';
				$options = array(1 => 'Yes', 0 => 'No');
				$attributes = array('legend' => false, 'separator' => '<br />', 'default' => 0);
				echo $this->Form->radio('pool_rules', $options, $attributes);
				echo '</div>';
			}
		?>
	</fieldset>



	<br />

	<?php		
		echo $this->Form->submit('/img/btn_continue.png', array('id' => 'btnSave', 'type' => 'Continue', 'type' => 'image', 'style' => 'width:129px; height:29px; display:block;'));
		echo $this->Form->end();

	?>
	
</div>



<?php include '/app/webroot/files/alert_popup.inc';?>

<div id="divPopupProvisionsList" class="popupStyle2">
	<div class="ui-dialog-titlebar"><span class="ui-dialog-title"">Custom Provisions</span></div>
  <div class="inner_bg">
    <p style="padding:3px 0 0 3px;">Select to add/modify a custom provision</p>
    
		<table>
    	<tr>
				<th style="width:45px;">Select</th>
				<th>Provision</th>
				<th style="width:45px;"></th>
			</tr>
		</table>

    <div class="inner_padding" style="height:450px;overflow:scroll;"></div>
		<br />
		<div class="left"><input type="submit" name="btnChoose" id="btnChooseProvision" value="Select" style="width:143px;margin-left:5px;" /> &nbsp;</div>
		<div class="left"><input type="button" name="btnCancel" id="btnCancelProvision" value="Cancel" style="width:143px;" /></div>
	</div>
</div>
