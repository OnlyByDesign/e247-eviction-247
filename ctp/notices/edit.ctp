<?php echo $this->element('datepicker_includes') ?>

<div id="wrapper" class="acc center fm-notice">
        
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">Notice <span>information</span> sheet</h1>
            </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/pexels-photo-acc.jpeg"></div>
    </div>
        
    <div class="content col-xs-10 center">
            
        <div class="progress center col-xs-12">
                <i class="pg_icon inline center fas fa-plus"></i>
                <div class="pg_strike inline center"></div>
                <i class="pg_icon inline center fas fa-dollar-sign"></i>
                <div class="pg_strike inline center"></div>
                <i class="pg_icon inline center far fa-file-alt current"></i>
                <div class="pg_strike inline center"></div>
                <i class="pg_icon inline center far fa-bell"></i>
                <div class="pg_strike inline center"></div>
                <i class="pg_icon inline center fas fa-check"></i>
                <div class="progress_alt center col-xs-12">
                    <span class="pg_text step center inline">Start</span>
					<span class="pg_text step center inline">Tenant</span>
					<span class="pg_text step center inline">Managing</span>
                </div>
            </div>
            
        <div class="info col-xs-12 center clearfix notices form">
    
            <?php
                echo $this->Form->create('Notice');
                echo $this->Form->input('tenants_number', array('type' => 'hidden'));
                echo $this->Form->input('doContinue', array('type' => 'hidden', 'value' => 'false'));
            ?>

            <!--Start-->
            <div id="fm1" class="tab fld_notice col-xs-12 center flex">
					<h1 class="center">Getting <span>Started</span></h1>
                    <div class="col-xs-3 center inline">
                        <i class="fas fa-pen-square"></i>
                        <p class="col-xs-11 center">Fill out the information below and click the <span>« Continue »</span> button to submit your lease.</p>
                    </div>
					<div class="col-xs-3 center inline">
                        <i class="fas fa-file-alt"></i>
                        <p class="col-xs-11 center">A draft lease will be provided for your review and any revisions.</p>
                    </div>
                    <div class="col-xs-3 center inline">
                        <i class="fas fa-save"></i>
                        <p class="col-xs-11 center">If you need to finish your lease later click the <span>« Save Lease »</span> button.</p>
                    </div>
				</div> 
            
            <?php echo $this->Form->input('id'); ?>
            
            <!--Tenant-->
            <div id="fm2" class="tab fld col-xs-10 center">
                <div class="info_wrap lrg col-xs-12 center left">
                        <h2>tenant information</h2>
                        <p class="main">Provide all available information about the tenant(s) to be notified.</p>
                        <div id="tblTenants" class="col-xs-12 left flex">
                                <?php
                                    if (!empty($tenants)) {
                                        //i = 0;
                                        foreach ($tenants as $tenant) {
                                            echo $this->Form->input('TenantNotice.' . $i . '.id', array('label' => false, 'type' => 'hidden'));
                                            echo $this->Form->input('TenantNotice.' . $i . '.first_name', array(
                                                'div' => array('class' => 'fm_input fm_text col-xs-3-2 center inline left'),
                                                'class' => 'input col-xs-12 center',
                                                'type' => 'text',
                                                'after' =>  'Tenant first name',
                                                'placeholder' =>  'First name',
                                                'label' => false
                                            ));
                                            echo $this->Form->input('TenantNotice.' . $i . '.middle_name', array(
                                                'div' => array('class' => 'fm_input fm_text col-xs-3-2 center inline left'),
                                                'class' => 'input col-xs-12 center',
                                                'type' => 'text',
                                                'after' =>  'Tenant middle name',
                                                'placeholder' =>  'Middle name',
                                                'required' => false,
                                                'label' => false
                                            ));
                                            echo $this->Form->input('TenantNotice.' . $i . '.last_name', array(
                                                'div' => array('class' => 'fm_input fm_text col-xs-3-2 center inline last left'),
                                                'class' => 'input col-xs-12 center',
                                                'type' => 'text',
                                                'after' =>  'Tenant last name',
                                                'placeholder' =>  'Last name',
                                                'label' => false
                                            ));
                                            $i++;
                                        }
                                    } else {
                                        for ($i=0; $i<$tenants_number; $i++) {
                                            echo $this->Form->input('TenantNotice.' . $i . '.first_name', array(
                                                'div' => array('class' => 'fm_input fm_text col-xs-3-2 center inline left'),
                                                'class' => 'input col-xs-12 center',
                                                'type' => 'text',
                                                'placeholder' =>  'First name',
                                                'after' =>  'Tenant first name',
                                                'label' => false
                                            ));
                                            echo $this->Form->input('TenantNotice.' . $i . '.middle_name', array(
                                                'div' => array('class' => 'fm_input fm_text col-xs-3-2 center inline left'),
                                                'class' => 'input col-xs-12 center',
                                                'type' => 'text',
                                                'placeholder' =>  'Middle name',
                                                'after' =>  'Tenant middle name',
                                                'required' => false,
                                                'label' => false
                                            ));
                                            echo $this->Form->input('TenantNotice.' . $i . '.last_name', array(
                                                'div' => array('class' => 'fm_input fm_text col-xs-3-2 center inline left last'),
                                                'class' => 'input col-xs-12 center',
                                                'type' => 'text',
                                                'placeholder' =>  'Last name',
                                                'after' =>  'Tenant last name',
                                                'label' => false
                                            ));
                                        }
                                    }
                                ?>
                            </div>
                    </div>
                <div class="info_wrap lrg col-xs-12 center left">
                    <h2>Property Information</h2>
                    <div class="col-xs-12 left flex">
                        <?php
                          echo $this->Form->input('property_street_address1', array(
                              'div' => array('class' => 'fm_input fm_text col-xs-3 inline center left'),
                              'class' => 'input col-xs-12 center',
                              'placeholder' => 'Street Address',
                              'after' => 'Street Address',
                              'value' => $autofill_property['property_street_address1'],
                              'label' => false
                          ));
                          echo $this->Form->input('property_street_address2', array(
                              'div' => array('class' => 'fm_input fm_text col-xs-3 inline center left'),
                              'class' => 'input col-xs-12 center',
                              'placeholder' => 'Unit No.',
                              'after' => 'Unit No.',
                              'label' => false
                          ));
                          echo $this->Form->input('property_city', array(
                              'div' => array('class' => 'fm_input fm_text col-xs-3 inline center left last'),
                              'class' => 'input col-xs-12 center',
                              'placeholder' => 'City',
                              'after' => 'City',
                              'value' => $autofill_property['property_city'],
                              'label' => false
                          ));
                        ?>
                    </div>
                    <div class="col-xs-12 left flex">
                        <?php 
                            echo $this->Form->input('property_state', [
                                'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                                'class' => 'input col-xs-12 center',
                                'placeholder' =>  'State',
                                'after' =>  'State',
                                'options' => $states,
                                'value' => $property_state,
                                'label' => false
                            ]);
                        
                            echo $this->Form->input('property_county', [
                                'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                                'class' => 'input col-xs-12 center',
                                'options' => $counties,
                                'value' => $property_county,
                                'after' =>  'County',
                                'label' => false
                            ]);
                            
                            echo $this->Form->input('property_zip_code', array(
                                'div' => array('class' => 'fm_input fm_text col-xs-3 inline center left last'),
                                'class' => 'input col-xs-12 center',
                                'placeholder' => 'Zip Code',
                                'after' => 'Zip Code',
                                'value' => $autofill_property['property_zip_code'],
                                'label' => false
                            ));
                        ?>
                    </div>
                        
                    <?php
                        echo $this->Form->input('autofill_property', array(
                            'div' => array('class' => 'fm_mem col-xs-12 center right'),
                            'class' => 'fm_check',
                            'label' => 'Remember this information',
                            'type' => 'checkbox',
                            'checked' => $autofill_property['autofill_property']
                        ));
                    ?>
                    
                </div>
            </div>
            
            <!--Management-->
            <div id="fmf" class="tab fld col-xs-10 center">
                <div class="info_wrap lrg col-xs-12 center left">
                    <h2>Landlord or Landlord Agent's Information</h2>
                    <p class="left">This is the name and contact information of the person that will sign the Notice to Pay.</p>
                    <div class="col-xs-12 left flex push-t">
                        <?php
                        
                        echo $this->Form->input('monthly_rent', array(
                            'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                            'class' => 'input col-xs-12 center',
                            'label' => false,
                            'placeholder' => 'Monthly rent',
                            'after' => 'Monthly rent amount'
                        ));
                        
                        echo $this->Form->input('unpaid_rent', array(
                            'div' => array('class' => 'fm_input fm_text col-xs-3 inline left last'),
                            'class' => 'input col-xs-12 center',
                            'label' => false,
                            'placeholder' => 'Amount demanded in Notice.',
                            'after' => 'Amount demanded'
                        ));
                        
                        ?>
                    </div>
                    <h2>Past Due Rent Information</h2>
                    <div class="col-xs-12 left flex push-t">
                        <?php
                        
                        $parsed_first_unpaid_month = date_parse($first_unpaid_month);
                        $parsed_last_unpaid_month = date_parse($last_unpaid_month);
                        
                        if ($parsed_first_unpaid_month['year'] == 1969) {
                            $parsed_first_unpaid_month['month'] = date("m");
                            $parsed_first_unpaid_month['year'] = date("Y");
                        }
                        
                        if ($parsed_last_unpaid_month['year'] == 1969) {
                            $parsed_last_unpaid_month['month'] = date("m");
                            $parsed_last_unpaid_month['year'] = date("Y");
                        }
                        
                        echo $this->Form->input('fum', array(
                            'div' => array('class' => 'fm_input fm_text col-xs-4 left'),
                            'class' => 'input col-xs-6 center left',
                            'type'=>'date',
                            'after'=>'First Recorded Unpaid Month',
                            'dateFormat'=>'MY',
                            'minYear' => date('Y')-3,
                            'maxYear' => date('Y'),
                            'label' => false,
                            'selected' => array(
                                'day' => '1',
                                'month' => $parsed_first_unpaid_month['month'],
                                'year' => $parsed_first_unpaid_month['year']
                            )
                        ));
                        
                        echo $this->Form->input('lum', array(
                            'div' => array('class' => 'fm_input fm_text col-xs-4 left last'),
                            'class' => 'input col-xs-6 center left',
                            'type'=>'date',
                            'after'=>'Most Recent Unpaid Month',
                            'dateFormat'=>'MY',
                            'minYear' => date('Y')-3,
                            'maxYear' => date('Y'),
                            'label' => false,
                            'selected' => array(
                                'day' => '1', 'month' => $parsed_last_unpaid_month['month'],
                                'year' => $parsed_last_unpaid_month['year']
                            )
                        ));
                        
                        ?>
                    </div>
                </div>
            </div>

        </div>
        
        <div class="fld_cycle center col-xs-10 clearfix push-t">

                <button type="button" id="backBtn" class="fld_nav col-xs-2 center inline left" onclick="javascript:history.back();">
                    <i class="center inline fa fa-caret-left" aria-hidden="true"></i>
                    <p class="center inline">back</p>
                </button>

                <button type="button" id="prevBtn" class="fld_nav col-xs-2 center inline left" onclick="nextPrev(-1)">
                    <i class="center inline fa fa-caret-left" aria-hidden="true"></i>
                    <p class="center inline">prev</p>
                </button>

                <div id="fmActions" class="col-xs-2 center inline">
                    <?php		
                        echo $this->Form->submit('Save', array(
                            'name' => 'save_lease',
                            'type' => 'image',
                            'div' => array(
                                'id' => 'saveBtn',
                                'class' => 'fm_input fm_text col-xs-12 inline center left'),
                            'class' => 'btn-blue input'
                        ));
                    ?>                
                </div>

                <button type="button" id="nextBtn" class="fld_nav col-xs-2 center inline right" onclick="nextPrev(1)">
                    <p class="center inline">next</p>
                    <i class="center inline fa fa-caret-right" aria-hidden="true"></i>
                </button>

                <button type="button" id="submitBtn" class="fld_nav col-xs-2 center inline right">
                    <?php                
                        echo $this->Form->submit('Submit', array(
                            'div' => false,
                            'id' => 'btnSave',
                            'class' => 'center inline',
                            'after' => '<i class="center inline fa fa-caret-right" aria-hidden="true"></i>',
                            'type' => 'submit'
                        ));
                    ?>
                </button>

            </div>
        
        <?php echo $this->Form->end(); ?>

        <div class="popups col-xs-9 center">
                <div id="divPopupNotification">
                    <div class="ui-dialog-titlebar"><span class="ui-dialog-title">Notification</span></div>
                  <div class="inner_bg">
                    <div class="inner_padding">
                        <div class="message_success"></div>
                        <div class="message_error"></div>
                    </div>
                    </div>
                </div>

                <div id="divPopupAddressBook" class="popupStyle2">
                    <div class="ui-dialog-titlebar"><span class="ui-dialog-title">Address Book</span></div>
                  <div class="inner_bg">
                    <div class="inner_padding" style="height:310px;overflow:scroll;"></div>
                        <br />
                        <div class="left"><input type="submit" name="btnChoose" id="btnChoose" value="Choose" /> &nbsp;</div>
                        <div class="left"><input type="button" name="btnCancel" id="btnCancel" value="Cancel" /></div>
                    </div>
                </div>
            </div>  

    </div>  
    
</div>

<?php
    include '/app/webroot/files/alert_popup.inc';
?>
<script type="text/javascript" src="/app/webroot/js/dev/forms.js"></script>
<script type="text/javascript">
	function changeMatter()	{
		var other = document.getElementById("NoticeLandlordInMatterOtherDesc");
		
		if (document.getElementById("NoticeLandlordInMatterOther").checked == true) {
			other.style.display = '';
		}	else {
			other.style.display = 'none';
		}
	}


  $("#NoticeContactState").click('change', function() {
  	var state_id = $(this).val();

		$.ajax({
		    url: '/index.php/notices/loadCounties/' + state_id,
		    cache: false,
		    type: 'GET',
		    dataType: 'HTML',
		    success: function(response) {
						$('#NoticeContactCountyId').html('<option value="0">&lt;Please Select a County&gt;</option>' + response);
						if (response != ' ') {
							$('#county-field').show();
							$('#NoticeContactCountyId option[value="<?php echo $autofill_contact['contact_county_id']; ?>"]').attr('selected', 'selected');
						}
						else $('#county-field').hide();
        },
        error: function(e) {
            alert("An error occurred: " + e.responseText.message);
            console.log(e);
        }
		});
	});


  $("#NoticeContactCountry").on('change', function() {
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


	$(document).ready(function() {
    	changeMatter();
    	$('#NoticeContactCountry').change();
    	$('#NoticeContactState').change();

			//If an error message is displayed, scroll to it
			if ($('body').find('.error-message').html() != null) {
				$('html, body').animate({
				    scrollTop: $('.error-message:visible:first').offset().top - $('#header-container').height() - 100
				}, 1000);
			}
	});



	//***********************************************************************************************
	//	Retrieve the info from the Address Book for the selected entry 
	//	and fill-in the contact fields
	//***********************************************************************************************
	var addressBookCountyID;

	function getAddressBookEntry(entryID) {
		$.ajax({
		    url: '/index.php/address_books/getEntryInfo/' + entryID,
		    cache: false,
		    type: 'GET',
		    dataType: 'HTML',
		    success: function (data) {
					if (data != '') {
						var obj = jQuery.parseJSON(data);

		        $('#NoticeContactFirstName').val(obj.first_name);
		        $('#NoticeContactLastName').val(obj.last_name);
		        $('#NoticeContactStreetAddress1').val(obj.street_address1);
		        $('#NoticeContactStreetAddress2').val(obj.street_address2);
		        $('#NoticeContactCity').val(obj.city);
		        if (obj.country == 'US') {
			        $('#NoticeContactState').val(obj.state);
							$('#NoticeContactState').trigger("change");
							//Since we need to trigger a change event on the State drop-down to reload the associated counties, we can't set the county here because it will get overridden.
							// We're saving the county ID in a global var so we can retrieve it later (see ajaxComplete function below)
							addressBookCountyID = obj.county_id;
							$('#NoticeContactStateProvince').val('');
			    		$('#state-field').show();
			    		$('#state-province-field').hide();
			    		$('#county-field').show();
  		    		$('#label-zip-code').text('Zip Code');
						} else {
							$('#NoticeContactStateProvince').val(obj.state_province);
							$('#NoticeContactState').val('');
							$('#NoticeContactState').removeAttr('required');
			    		$('#state-field').hide();
			    		$('#state-province-field').show();
			    		$('#county-field').hide();
   		    		$('#label-zip-code').text('Zip/Postal Code');
						}
		        $('#NoticeContactZipCode').val(obj.zip_code);
		        $('#NoticeContactCountry').val(obj.country);
		        $('#NoticeContactCompanyName').val(obj.company_name);
						phoneNumber = obj.phone_number;
		        $('#NoticeCpn1').val(phoneNumber.substring(0, 3));
		        $('#NoticeCpn2').val(phoneNumber.substring(3, 6));
		        $('#NoticeCpn3').val(phoneNumber.substring(6, 10));
		      }
		    },
		    error: function (error) {
		    	alert('An error occured while processing your request.');
		    }
		});
	}

	//This is called whenever a Ajax function finishes executing
	$(document).ajaxComplete(function(event, xhr, settings) {
		//If the loadCounties function was called and the addressBookCountyID var is not empty it means that the contact info was populated from the address book,
		// we need to set the county drop-down to the value from the address book
		if (settings.url.indexOf("loadCounties") > -1 && (addressBookCountyID !== undefined && addressBookCountyID != "")) {
			$('#NoticeContactCountyId').val(addressBookCountyID);
		}
	});


	//***********************************************************************************************
	// Get the address book list for the logged-in user
	//***********************************************************************************************
	$('#openAddressBook').on('click', function() {
		$.ajax({
		    url: '/index.php/address_books/getList/',
		    cache: false,
		    type: 'GET',
		    dataType: 'HTML',
		    success: function (data) {
					if (data != '') {
						$('#divPopupAddressBook').find('.inner_padding').html(data);
					  $('#overlay').fadeIn('slow');
					  $("#divPopupAddressBook").fadeIn('slow');
					}
				},
		    error: function (error) {
		    	alert(error);
		    }
		});
	});

  $('#btnChoose').on('click', function() {
		getAddressBookEntry($('input:radio[name=rdoEntry\\[\\]]:checked').val());
 		$('#divPopupAddressBook').fadeOut('slow');
 		$('#overlay').fadeOut('slow');
	});

  $('#btnCancel').on('click', function() {
 		$('#divPopupAddressBook').fadeOut('slow');
 		$('#overlay').fadeOut('slow');
	});

	//***********************************************************************************************
	// Add the current person responsible info to the logged-in user's address book
	//***********************************************************************************************
	$('#addToAddressBook').on('click', function() {
		$.ajax({
				type:"POST",
				data:$('#NoticeEditForm').serialize(),
		    url: '/index.php/address_books/addEntry/Notice',
		    success: function (data) {
					if (data == 1) {
						$('.message_success').text('The person was added successfully to your address book.');
						$('.message_error').text('');
					} else {
						$('.message_error').text('The person could not be added to your address book.');
						$('.message_success').text('');
					}
				  $('#overlay').fadeIn('slow');
				  $("#divPopupNotification").fadeIn('slow').delay(800).fadeOut('slow');
				  $('#overlay').delay(800).fadeOut('slow');
				}
		});
	});
</script>