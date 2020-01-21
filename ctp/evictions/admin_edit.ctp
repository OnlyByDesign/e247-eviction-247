<?php //debug($eviction);
	echo $this->Html->css('jquery.ptTimeSelect');
	echo $this->Html->script('jquery.ptTimeSelect');
    echo $this->element('datepicker_includes');
?>
<script type="text/javascript">
	var status_date_array = <?php echo $status_date_array; ?>;

	//====================================
	function isCompany() {
		var names_box = document.getElementById("names");
		var company_box = document.getElementById("company_name");
		
		if (document.getElementById("EvictionPropertyOwnerIsCompany").checked == true) {
			names_box.style.display = 'none';
			company_box.style.display = 'block';
		} else {
			names_box.style.display = 'block';
			company_box.style.display = 'none';
		}		
	}
	
	//====================================
	function changeMatter()	{
		var other = document.getElementById("EvictionPlaintiffInMatterOther");
		
		if (document.getElementById("EvictionPlantiffInMatterOther").checked == true) {
			other.style.display = '';
		} else {
			other.style.display = 'none';
		}
	}

	//====================================
	function addFee(divID, fee) {
		if (document.getElementById(divID).style.display == 'block') {
			document.getElementById(divID).style.display = 'none';
			//document.getElementById("EvictionCostTotal").value = parseFloat(parseFloat(document.getElementById("divCostTotal").innerText.replace(/,/g,'')) - fee) + ".00";
		} else {
			document.getElementById(divID).style.display = 'block';
			//document.getElementById("EvictionCostTotal").value = parseFloat(parseFloat(document.getElementById("divCostTotal").innerText.replace(/,/g,'')) + fee) + ".00";
		}
		//document.getElementById("divCostTotal").innerText = document.getElementById("EvictionCostTotal").value;
	}

	//====================================
	//Get the existing date and note for the selected status
	$(function() {
    $("#EvictionStatusId").change(function() {
    	var statusID = $(this).val();
			$.ajax({
			    url: '/index.php/admin/evictions/getactiondate/<?php echo $eviction_id;?>/' + statusID,
			    cache: false,
			    type: 'GET',
			    dataType: 'HTML',
			    success: function (data) {
						if (data.trim() != '') {
							var obj = jQuery.parseJSON(data);
			        $('#EvictionActionDateActionDate').val(obj.action_date);
			        $('#EvictionActionDateNote').val(obj.note);
			      }
			    }
			});
		});
  });

	//====================================
	function isChecked() {
		if (document.getElementById('EvictionIsContested').checked == true) document.getElementById('EvictionStatusId').disabled = true;
		else document.getElementById('EvictionStatusId').disabled = false;
	}


	//***********************************************************************************************
	//
	//***********************************************************************************************
  $(function() {
		//When the state dropdown's value changes, load the counties associated to the selected state
    $("#EvictionContactState").change(function() {
    	var state_id = $(this).val();

			$.ajax({
			    url: '/index.php/admin/evictions/loadCounties/' + state_id,
			    cache: false,
			    type: 'GET',
			    dataType: 'HTML',
			    success: function(response) {
              $('#EvictionContactCountyId').html(response);
              $('#EvictionContactCountyId').val(<?php echo $this->data['Eviction']['contact_county_id']; ?>);
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

	  $("#EvictionContactCountry").on('change', function() {
	   	if ($(this).val() == 'US') {
	   		$('#EvictionContactState').attr('required', true);
	  		$('#state-field').show();
	  		$('#state-province-field').hide();
	   		$('#EvictionContactStateProvince').removeAttr('required');
	  		$('#label-zip-code').text('Zip Code');
				$('#EvictionContactState').trigger("change");
	  	}	else {
				$('#EvictionContactState').removeAttr('required');
	  		$('#state-field').hide();
	  		$('#state-province-field').show();
	   		$('#EvictionContactStateProvince').attr('required', true);
	  		$('#county-field').hide();
	  		$('#label-zip-code').text('Zip/Postal Code');
	  	}
		});

  });


	//====================================
	$(document).ready(function() {
  	isCompany();
  	changeMatter();
		$('#EvictionContactState').trigger("change");
		$('#EvictionContactCountry').trigger("change");

  	<?php
  		//We're setting the fee to 0 because we only want to show the div and not affect the total
  		if ($eviction['Eviction']['notice_to_pay_1'] == 1) echo 'addFee("divNoticeToPay1", 0);';
  		if ($eviction['Eviction']['notice_to_pay_2'] == 1) echo 'addFee("divNoticeToPay2", 0);';
  		if ($eviction['Eviction']['notice_to_pay_3'] == 1) echo 'addFee("divNoticeToPay3", 0);';
  		if ($eviction['Eviction']['court_appearance_1'] == 1) echo 'addFee("divCourtAppearance1", 0);';
  		if ($eviction['Eviction']['court_appearance_2'] == 1) echo 'addFee("divCourtAppearance2", 0);';
  		if ($eviction['Eviction']['court_appearance_3'] == 1) echo 'addFee("divCourtAppearance3", 0);';
  		if ($eviction['Eviction']['case_settlement'] == 1) echo 'addFee("divCaseSettlement", 0);';
//  		if ($eviction['Eviction']['posting_3day'] == 1) echo 'addFee("divPosting3Day", 0);';
  		if ($eviction['Eviction']['judicial_default'] == 1) echo 'addFee("divJudicialDefault", 0);';
  	?>

		$('#EvictionAdminEditForm').submit(function() {
		    $('#EvictionStatusId').removeAttr('disabled');
		});
/*
    $("#EvictionContactState").change(function() {
    	var state_id = $(this).val();

			$.ajax({
			    url: '/index.php/evictions/loadCounties/' + state_id,
			    cache: false,
			    type: 'GET',
			    dataType: 'HTML',
			    success: function(response) {
              $('#EvictionContactCountyId').html(response);
          },
          error: function(e) {
              alert("An error occurred: " + e.responseText.message);
              console.log(e);
          }
			});
		});
*/


		Date.prototype.toInputFormat = function() {
	     var yyyy = this.getFullYear().toString();
	     var mm = (this.getMonth()+1).toString(); // getMonth() is zero-based
	     var dd  = this.getDate().toString();
	     return (mm[1]?mm:"0"+mm[0]) + "/" + (dd[1]?dd:"0"+dd[0]) + "/" + yyyy;
	  };

		//If a Status date field is changed, add 1 day to the chosen date and insert it into the Action Date field
		$('.hasDatepicker').on('change', function() {
			if ($(this).attr('id') != 'EvictionActionDateActionDate') {
				var date = new Date($(this).val());
				date.setDate(date.getDate() + 1)
				$('#EvictionActionDateActionDate').val(date.toInputFormat());
			}
		});

		$('#EvictionStatusDateHearingTime').ptTimeSelect();
	});

</script>

<div id="wrapper" class="acc center fm-create evictions form">
    
        <div class="hero col-xs-12 center">
            <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">Detailed Case <span>Information</span></h1>
            </div>
            <div class="hr_over"></div>
            <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/6.jpg"></div>
        </div>
        
        <div class="db_tab col-xs-12 center">
            <?php echo $this->element('admin_tabs', array('currentTab' => 'evictions')); ?>
        </div>
    
        <div class="content col-xs-10 center">

            <div class="inline col-xs-12 left push-t push-b">
                
                <?php
                    echo $this->Form->create('Eviction');
                    echo $this->Form->input('id');
                    echo $this->Form->input('CostTotal', array('type' => 'hidden', 'value' => $eviction['Payment']['total']));
                    echo $this->Form->input('three_day_notice_option_id', array('type' => 'hidden'));
                    echo $this->Form->input('need_three_day_notice', array('type' => 'hidden'));
                    echo $this->Form->input('is_faxed', array('type' => 'hidden'))
                ?>
                
                <!--Property Info-->
                <div id="fm1" class="fld col-xs-10 center">
                    <div class="info_wrap lrg col-xs-12 center left">
                        <h2>Eviction Property Information</h2>
                        <div class="col-xs-12 left push-t">
                            <?php
                                echo $this->Form->input('property_street_address1', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                    'class' => 'input col-xs-12 center',
                                    'after' => 'Property Street Address',
                                    'placeholder' => 'Street Address',
                                    'label' => false
                                ]);
                                echo $this->Form->input('property_street_address2', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                    'class' => 'input col-xs-12 center',
                                    'after' => 'Property Unit No.',
                                    'placeholder' => 'Unit No.',
                                    'label' => false
                                ]);
                                echo $this->Form->input('property_city', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                    'class' => 'input col-xs-12 center',
                                    'after' => 'City',
                                    'placeholder' => 'City',
                                    'label' => false
                                ]);
                                echo $this->Form->input('county_id', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                    'class' => 'input col-xs-12 center',
                                    'after' => 'Property County',
                                    'placeholder' => 'County',
                                    'label' => false
                                ]);
                                echo $this->Form->input('property_state', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                    'class' => 'input col-xs-12 center',
                                    'after' => 'States',
                                    'placeholder' => 'States',
                                    'label' => false,
                                    'options' => $states
                                ]);
                                echo $this->Form->input('property_zip_code', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                    'class' => 'input col-xs-12 center',
                                    'after' => 'Zip code',
                                    'placeholder' => 'Zip code',
                                    'label' => false
                                ]);
                            ?>
                        </div>
                    </div>
                    <div class="info_wrap lrg col-xs-12 center left">
                        <h2 class="push-t">Plaintiff's Information</h2>
                        <div class="col-xs-12 left push-b flex">
                            <?php
                                echo $this->Form->input('property_owner_is_company', array(
                                    'div' => array('class' => 'fm_mem inline input col-xs-6 left'),
                                    'class' => 'fm_check',
                                    'label' => 'Plaintiff is a company',
                                    'type' => 'checkbox',
                                    'onclick' => 'isCompany()',
                                    'checked' => $autofill_maintenance['maintenance_ac_filters']
                                ));
                            ?>
                            <div class="fm_input fm_text col-xs-3-2 inline left" id="company_name" style="display: none;">
                                <?php
                                echo $this->Form->input('property_owner_company', [
                                    'class' => 'input col-xs-12 center',
                                    'after' => 'Company Name',
                                    'placeholder' => 'Company Name',
                                    'label' => false,
                                    'error' => false
                                ]);
                                ?>
                                <span>
                                    <?php echo $this->Form->error('property_owner_company', null, array('class' => 'error-message')); ?>
                                </span>
                            </div>
                            <div id="names" class="col-xs-12 left inline">
                                <?php
                                echo $this->Form->input('property_owner_first_name', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left'),
                                    'class' => 'input col-xs-12 center',
                                    'after' => 'Property owner first name',
                                    'placeholder' => 'First name',
                                    'label' => false
                                ]);
                                echo $this->Form->input('property_owner_last_name', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left'),
                                    'class' => 'input col-xs-12 center',
                                    'after' => 'Property owner last name',
                                    'placeholder' => 'Last name',
                                    'label' => false
                                ]);
                                ?>
                            </div>
                        </div>    
                        <div class="col-xs-12 left">
                            <?php
                                echo '<p class="col-xs-12 left inline push-b">The plaintiff in this matter is:</p>';
                                echo '<div class="col-xs-12 fm_input fm_text inline center left last">';
                                    $options = array('owner'=>'The Owner of the Property', 'manager' => 'The Manager of the Property', 'other' => 'Other (Please describe)' );
                                    $attributes = array(
                                        'class' => 'input center',
                                        'legend' => false,
                                        'onclick' => 'changeMatter();'
                                    );
                                    echo $this->Form->radio('plantiff_in_matter', $options, $attributes);
                                echo '</div>';
                            ?>
                            
                            
                            
                            <?php 
                                echo $this->Form->input('plaintiff_in_matter_other', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-12 inline left'),
                                    'class' => 'input col-xs-12 center',
                                    'placeholder' => 'Plaintiff in matter',
                                    'label' => false,
                                    'error' => false
                                ]);
                            ?>
                            
                            <span class="error-message">
                                <?php echo $this->Form->error('plaintiff_in_matter_other', null, array('wrap' => false)); ?>
                            </span>
                            
                            <span class="error-message">
                                <?php echo $this->Form->error('plantiff_in_matter', null, array('wrap' => false)); ?>
                            </span>
                            
                        </div>
                    </div>
                    <div class="info_wrap lrg col-xs-12 center left">
                        <h2>Defendant's Information</h2>
                        <?php echo $this->element('defendants'); ?>
                        <p><?php echo $this->Html->link('Manage Defendants', array('controller' => 'defendants', 'action' => 'index', $eviction_id)); ?></p>
                    </div>
                </div>
                
                <!--Defendant Info-->
                <div id="fm2" class="fld col-xs-10 center">
                    <div class="info_wrap lrg col-xs-12 center left push-t">
                        <h2 class="push-t">Lawsuit Status</h2>
                        <div class="col-xs-12 left push-t">
                            
                            <?php
                            
                            echo $this->Form->input('service_id', array('type' => 'hidden'));
                            
                            if ($eviction['Eviction']['is_contested'] == 1) $disabled = 'disabled=true';
                            else $disabled = '';
                            
                            echo '<p class="col-xs-12 left inline">Eviction Status:</p>';
                            echo $this->Form->input('status_id', array(
                                'div' => array('class'=>'col-xs-12 left fm_input fm_text last push-b'),
                                'class' => 'input col-xs-12 inline left',
                                'label' => false, 
                                $disabled
                            ));
                            
                            ?>
                            
                        </div>
                        <div class="col-xs-12 left push-t">
                            
                            <?php
                            
                            //Eviction status fields
                            echo $this->Form->input('status_date', [
                                'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left last'),
                                'class' => 'input col-xs-3-2 center',
                                'after' => 'Eviction Status Date',
                                'placeholder' => 'Eviction Status Date',
                                'required' => 'false',
                                'label' => false
                            ]);
                            echo $this->Form->input('status_date_judgment', [
                                'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left last'),
                                'class' => 'input col-xs-3-2 center',
                                'after' => 'Eviction Judgement Date',
                                'placeholder' => 'Eviction Judgement Date',
                                'required' => 'false',
                                'label' => false
                            ]);
                            echo $this->Form->input('status_date_writ', [
                                'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left last'),
                                'class' => 'input col-xs-3-2 center',
                                'after' => 'Eviction Writ Date',
                                'placeholder' => 'Eviction Writ Date',
                                'required' => 'false',
                                'label' => false
                            ]);
                            echo $this->Form->input('status_date_possession', [
                                'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left last'),
                                'class' => 'input col-xs-3-2 center',
                                'after' => 'Status Possession Date',
                                'placeholder' => 'Status Possession Date',
                                'required' => 'false',
                                'label' => false
                            ]);
                            echo $this->Form->input('status_date_expire', [
                                'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left last'),
                                'class' => 'input col-xs-3-2 center',
                                'after' => 'Status Expiration Date',
                                'placeholder' => 'Status Expiration Date',
                                'required' => 'false',
                                'label' => false
                            ]);
                            echo $this->Form->input('status_date_vacated', [
                                'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left last'),
                                'class' => 'input col-xs-3-2 center',
                                'after' => 'Status Vacate Date',
                                'placeholder' => 'Status Vacate Date',
                                'required' => 'false',
                                'label' => false
                            ]);
                            echo $this->Form->input('status_date_contested', [
                                'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left last'),
                                'class' => 'input col-xs-3-2 center',
                                'after' => 'Status Contested Date',
                                'placeholder' => 'Status Contested Date',
                                'required' => 'false',
                                'label' => false
                            ]);
                            echo $this->Form->input('status_date_withdrew', [
                                'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left last'),
                                'class' => 'input col-xs-3-2 center',
                                'after' => 'Status Withdraw Date',
                                'placeholder' => 'Status Withdrawn Date',
                                'required' => 'false',
                                'label' => false
                            ]);
                            echo $this->Form->input('status_date_vacated2', [
                                'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left last'),
                                'class' => 'input col-xs-3-2 center',
                                'after' => 'Status Vacated Date',
                                'placeholder' => 'Status Vacated Date',
                                'required' => 'false',
                                'label' => false
                            ]);
                            echo $this->Form->input('status_date_hearing_time', [
                                'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left last'),
                                'class' => 'input col-xs-3-2 center time',
                                'after' => 'Eviction Hearing Time',
                                'placeholder' => 'Eviction Hearing Time',
                                'required' => 'false',
                                'label' => false
                            ]);
                            
                            ?>
                            
                        </div>    
                        <div class="col-xs-12 left push-t">
                            
                            <?php
                            
                            //Damages status fields
                            if ($service_id == 3) {
                                echo $this->Form->input('damages_status_id', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-6 inline left'),
                                    'class' => 'input col-xs-12 center',
                                    'after' => 'Damage Status',
                                    'placeholder' => 'Damage Status',
                                    'required' => 'false',
                                    'label' => false,
                                    'options' => $damages_statuses,
                                    'empty' => 'N/A'
                                ]);
                                echo $this->Form->input('damages_status_date', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-6 inline left'),
                                    'class' => 'input col-xs-3-2 center',
                                    'after' => 'Damages Status Date',
                                    'placeholder' => 'Damages Status Date',
                                    'required' => 'false',
                                    'label' => false
                                ]);
                                echo $this->Form->input('damages_status_date_judgment', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-6 inline left'),
                                    'class' => 'input col-xs-3-2 center',
                                    'after' => 'Damages Status Judgement Date',
                                    'placeholder' => 'Damages Status Judgement Date',
                                    'required' => 'false',
                                    'label' => false
                                ]);
                                echo $this->Form->input('damages_status_date_fees', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-6 inline left'),
                                    'class' => 'input col-xs-3-2 center',
                                    'after' => 'Damages Status Fees',
                                    'placeholder' => 'Damages Status Fees',
                                    'required' => 'false',
                                    'label' => false
                                ]);
                            }
                            
                            echo $this->Form->input('EvictionActionDate.id', 					array('type' => 'hidden'));
                            
                            echo $this->Form->input('EvictionActionDate.action_date', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left'),
                                    'class' => 'input col-xs-3-2 center',
                                    'after' => 'Action Date',
                                    'placeholder' => 'Action Date',
                                    'required' => 'false',
                                    'label' => false
                                ]);
                            echo $this->Form->input('EvictionActionDate.note', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left'),
                                    'class' => 'input col-xs-12 center',
                                    'after' => 'Action Note',
                                    'placeholder' => 'Action Note',
                                    'required' => 'false',
                                    'label' => false
                            ]);
                            echo $this->Form->input('in_settlement', array(
                                'div' => array('class' => 'fm_mem inline input col-xs-5-2 left'),
                                'class' => 'fm_check',
                                'label' => 'Pending Settlement with the Defendant',
                                'type' => 'checkbox'
                            ));
                            echo $this->Form->input('is_contested', array(
                                'div' => array('class' => 'fm_mem inline input col-xs-5-2 left'),
                                'class' => 'fm_check',
                                'label' => 'Tenant is Contesting the Eviction',
                                'type' => 'checkbox'
                            ));
                            
                            ?>
                            
                        </div>
                    </div>
                </div>
                
                <!--Case Info-->
                <div id="fm3" class="fld col-xs-10 center">
                    <div class="info_wrap lrg col-xs-12 center left push-t">
                        <h2 class="push-t">Case Information</h2>
                        <div class="col-xs-12 left push-t">
                            <?php
                                echo '<p class="col-xs-6 inline left"><strong>' . $this->Form->label('Service') . ': </strong>' . $this->Form->label($service_name) . '</p>';
                                echo '<p class="col-xs-6 inline left"><strong>' . $this->Form->label('Matter No.', 'Matter No.') . ': </strong>' . $eviction['Eviction']['id'] . '</p>';
                                echo '<p class="col-xs-6 inline left"><strong>' . $this->Form->label('Eviction Creation Date') . ': </strong>' . date('l, F jS Y', strtotime($eviction['Eviction']['created'])) . '</p>';
                                echo '<p class="col-xs-6 inline left"><strong>' . $this->Form->label('Last Modification Date') . ': </strong>' . date('l, F jS Y', strtotime($eviction['Eviction']['modified'])) . '</p>';
                            ?>
                        </div>
                        <div class="col-xs-12 left push-t">
                            <?php    
                                echo '<p class="col-xs-3 left inline push-b">Section 8 Subsidized Rent?</p>';
                                echo '<div class="col-xs-3 fm_input fm_text inline center left last">';
                                    $options = array(1 => 'Yes', 0 => 'No');
                                    $attributes = array(
                                        'class' => 'input center',
                                        'legend' => false
                                    );
                                    echo $this->Form->radio('is_subsidized_rent', $options, $attributes);
                                echo '</div>';
                                
                                echo $this->Form->input('case', [
                                    'div' => array('class' => 'fm_input fm_text col-xs-6 inline left last'),
                                    'class' => 'input col-xs-12 center',
                                    'after' => 'Case No.',
                                    'placeholder' => 'Case No.',
                                    'label' => false
                                ]);

                                //Display a different label and a extra field for Texas
                                if ($eviction['County']['state'] == 'TX') {
                                    echo $this->Form->input('division', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-6 inline left last'),
                                        'class' => 'input col-xs-12 center',
                                        'placeholder' => 'Precinct',
                                        'after' => 'Precinct',
                                        'label' => false
                                    ));
                                    echo $this->Form->input('place', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-6 inline left last'),
                                        'class' => 'input col-xs-12 center',
                                        'placeholder' => 'Place',
                                        'after' => 'Place',
                                        'label' => false
                                    ));
                                }
                            
                                else echo $this->Form->input('division', array(
                                    'div' => array('class' => 'fm_input fm_text col-xs-5-2 inline left'),
                                    'class' => 'input col-xs-12 center',
                                    'placeholder' => 'Division',
                                    'after' => 'Division',
                                    'label' => false
                                ));
                            
                                echo $this->Form->input('in_pclaw', array(
                                    'div' => array('class' => 'fm_mem inline input col-xs-6 left'),
                                    'class' => 'fm_check',
                                    'label' => 'Entered in QuickBooks',
                                    'type' => 'checkbox'
                                ));
                            ?>
                        </div>
                    </div>
                    <div class="info_wrap lrg col-xs-12 center left">
                        <h2 class="push-t">Person Responsible for Handling Eviction</h2>
                        <p class="left inline col-xs-12">Person to be contacted by Sheriff's Department to schedule the execution of the writ of possession</p>
                        
                        <div class="col-xs-12 left push-t">
                        <?php
                            echo $this->Form->input('contact_first_name', [
                                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                'class' => 'input col-xs-12 center',
                                'after' => 'Contact first name',
                                'placeholder' => 'Contact first name',
                                'label' => false
                            ]);
                            echo $this->Form->input('contact_last_name', [
                                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                'class' => 'input col-xs-12 center',
                                'after' => 'Contact last name',
                                'placeholder' => 'Contact last name',
                                'label' => false
                            ]);
                            echo $this->Form->input('contact_street_address1', [
                                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left last'),
                                'class' => 'input col-xs-12 center',
                                'after' => 'Street address',
                                'placeholder' => 'Street address',
                                'label' => false
                            ]);
                            echo $this->Form->input('contact_street_address2', [
                                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                'class' => 'input col-xs-12 center',
                                'after' => 'Unit No.:',
                                'placeholder' => 'Unit No.:',
                                'label' => false
                            ]);
                            echo $this->Form->input('contact_city', [
                                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                'class' => 'input col-xs-12 center',
                                'after' => 'City',
                                'placeholder' => 'City',
                                'label' => false
                            ]);
                            echo $this->Form->input('contact_state', [
                                'div' => array('id' => 'state-field', 'class' => 'fm_input fm_text col-xs-3-2 inline left last'),
                                'class' => 'input col-xs-12 center',
                                'options' => $states,
                                'empty' => '<Please Select a State>',
                                'after' => 'City',
                                'label' => false
                            ]);
                            echo $this->Form->input('contact_state_province', [
                                'div' => array('id' => 'state-province-field', 'class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                'class' => 'input col-xs-12 center',
                                'after' => 'State/Province',
                                'placeholder' => 'State/Province',
                                'label' => false
                            ]);
                            echo $this->Form->input('contact_county_id', [
                                'div' => array('id' => 'county-field', 'class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                'class' => 'input col-xs-12 center',
                                'options' => $counties,
                                'empty' => '<Please select a county>',
                                'after' => 'County',
                                'label' => false
                            ]);
                            echo $this->Form->input('contact_zip_code', [
                                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left last'),
                                'class' => 'input col-xs-12 center',
                                'after' => 'Zip Code',
                                'placeholder' => 'Zip Code',
                                'label' => false
                            ]);
                            echo $this->Form->input('contact_country', [
                                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                'class' => 'input col-xs-12 center',
                                'options' => $countries,
                                'default' => 'US',
                                'after' => 'Country',
                                'label' => false
                            ]);
                            echo $this->Form->input('contact_company_name', [
                                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                'class' => 'input col-xs-12 center',
                                'placeholder' => 'Company name',
                                'after' => 'Company name',
                                'label' => false
                            ]);
                            echo $this->Form->input('contact_phone_number', [
                                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left last'),
                                'class' => 'input col-xs-12 center',
                                'placeholder' => 'Phone number',
                                'after' => 'Phone number',
                                'label' => false,
                                'required' => 'false'
                            ]);
                        ?>
                        <div class="col-xs-2 center left input">
                            <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'view', $eviction['Eviction']['user_id'])); ?>"><p>User profile</p></a>
                        </div>
                    </div>
                    </div>
                </div>
                
                <!--Managing Info-->
                <div id="fm4" class="fld col-xs-10 center">
                    <div class="info_wrap lrg col-xs-12 center left push-t">
                        <h2 class="push-t">Email Notifications</h2>
                        <div class="col-xs-12 left push-t">
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
                                    <td><?php echo $notification['Notification']['first_name']; ?>&nbsp;</td>
                                    <td><?php echo $notification['Notification']['last_name']; ?>&nbsp;</td>
                                    <td><?php echo $notification['Notification']['email_address']; ?>&nbsp;</td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                            <p>
                                <?php echo $this->Html->link('Manage Notifications', array('controller' => 'notifications', 'action' => 'index', $eviction_id)); ?>
                            </p>
                        </div>
                    </div>
                    <div class="info_wrap lrg col-xs-12 center left push-t">
                        <h2 class="push-t">Rent Information</h2>
                        <div class="col-xs-12 left push-t">
                            <?php
                            echo $this->Form->input('monthly_rent', [
                                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                'class' => 'input col-xs-12 center',
                                'after' => 'Monthly rent',
                                'placeholder' => 'Monthly rent',
                                'label' => false
                            ]);
                            echo $this->Form->input('unpaid_rent', [
                                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                'class' => 'input col-xs-12 center',
                                'after' => 'Unpaid rent',
                                'placeholder' => 'Unpaid rent',
                                'label' => false
                            ]);
                            echo $this->Form->input('security_deposit', [
                                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                'class' => 'input col-xs-12 center',
                                'after' => 'Security deposit',
                                'placeholder' => 'Security deposit',
                                'label' => false
                            ]);
                            ?>
                        </div>
                        <div class="col-xs-12 left">
                            <?php
                            if (isset($first_unpaid_month)) $parsed_first_unpaid_month = date_parse($first_unpaid_month);
                                else {
                                    echo '<div class="fm_input fm_text col-xs-3-2 inline left">';
                                    $parsed_first_unpaid_month['month'] = date('m');
                                    $parsed_first_unpaid_month['year'] = date('Y');
                                    echo '</div>';
                                }
                            
                            if (isset($last_unpaid_month)) $parsed_last_unpaid_month = date_parse($last_unpaid_month);
                                else {
                                    echo '<div class="fm_input fm_text col-xs-3-2 inline left">';
                                    $parsed_last_unpaid_month['month'] = date('m');
                                    $parsed_last_unpaid_month['year'] = date('Y');
                                    echo '</div>';
                                }
                            
                            echo $this->Form->input('fum', array(
                                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                                'class' => 'input col-xs-6 center left',
                                'type'=>'date', 
                                'after'=>'First Unpaid Month', 
                                'dateFormat'=>'MY', 
                                'label' => false,
                                'minYear' => date('Y')-3, 
                                'maxYear' => date('Y'), 
                                'selected' => array('day'=>'1', 'month'=>$parsed_first_unpaid_month['month'], 'year'=>$parsed_first_unpaid_month['year'])
                            ));
                            
                            echo $this->Form->input('lum', array('div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'), 'class' => 'input col-xs-6 center left','type'=>'date', 'after'=>'Last Unpaid Month', 'label' => false, 'dateFormat'=>'MY', 'minYear' => date('Y')-3, 'maxYear' => date('Y'), 'selected' => array('day'=>'1', 'month'=>$parsed_last_unpaid_month['month'], 'year'=>$parsed_last_unpaid_month['year'])));
                            
                            if ($eviction['County']['state'] == 'TX') echo $this->Form->input('notice_to_vacate_delivery', array('div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'), 'class' => 'input col-xs-12 center left', 'type' => 'text', 'after' => 'Notice to Vacate Delivered On', 'placeholder' => 'Notice to Vacate Delivered On', 'label' => false));
                            
                            elseif ($eviction['County']['state'] == 'NC') echo $this->Form->input('notice_to_vacate_delivery', array('div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'), 'class' => 'input col-xs-12 center left', 'type' => 'text', 'after' => 'Date Rent Was Due', 'placeholder' => 'Date Rent Was Due', 'label' => false));
                            
                            if ($eviction['Document']['signed_notice_ext'] == 'pdf' && $eviction['User']['signature'] != '') echo $this->Form->input('Eviction.notice_date', array('div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'), 'class' => 'input col-xs-12 center left', 'type' => 'text', 'after' => 'Notice to Pay Date', 'placeholder' => 'Notice to Pay Date', 'label' => false));
                            
                            ?>
                        </div>
                    </div>
                </div>

                <!--Damage Info-->
                <?php if ($service_id == 3) { ?>
                <div id="fm5" class="fld col-xs-10 center">
                    <!-- Only display these if it's an eviction with damages -->
                    <div class="info_wrap lrg col-xs-12 center left push-t">
                        <h2 class="push-t">Damages</h2>
                        <div class="col-xs-12 left push-t">
                        <?php echo $this->element('fees');
                            echo $this->Html->link('Manage Damages', array('controller' => 'fees', 'action' => 'index', $eviction_id));
                        ?>
                        </div>
                        <p>Affidavit as to Reasonableness of Attorney's Fee</p>
                        <div class="col-xs-12 left push-t">
                            <?php echo $this->Form->input('reasonable_attorney_fee'); ?>
                        </div>
                        <p>Affidavit by Plantiff's Counsel of Attorney's Fees and Costs</p>
                        <div class="col-xs-12 left push-t">
                            <?php
                              echo $this->Form->input('filing_fee');
                              echo $this->Form->input('service_of_process_fee');
                              echo $this->Form->input('writ_of_posession_fee');
                            ?>
                        </div>
                        <p>Final Default Judgment as to Count II for Damages</p>
                        <div class="col-xs-12 left push-t">
                            <?php
                            echo $this->Form->input('principal_sum');
                            echo $this->Form->input('attorney_fee');
                            ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
                <!--Service Info-->
                <div id="fm6" class="fld col-xs-10 center">
                    <div class="info_wrap lrg col-xs-12 center left push-t">
                        <h2 class="push-t">Client Documents - Client Charges</h2>
                        <div class="col-xs-12 left push-t">
                            <div id="divClientDocuments" class="col-xs-12 inline left view-info-table">
                                <dt>
                                    <div class="documentList">
                                        <ul>
                                            <?php
                                            foreach ($document_types as $document_type) {
                                                echo '<li>';
                                                echo $this->element('user_file_download_link', array('document_type' => $document_type, 'document' => $eviction['Document']));
                                                echo '</li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </dt>
                                <dt>
                                    <?php
                                        if (!empty($eviction['Document']['set_ext'])) {
                                            echo $this->Html->link(__('Pleadings', true), array('admin' => true, 'action' => 'listDocuments', $eviction['Eviction']['id']));
                                        }
                                    ?>
                                </dt>
                                <dt>
                                    <p><strong>Administrative Documents</strong></p>
                                    <?php
                                    if(substr($eviction['Payment']['transaction_id'], 0, 1) == 'C') {
                                            echo $this->Html->link('Invoiced Amount', array('controller' => 'payments', 'action' => 'view', $eviction['Payment']['id']));
                                            $totalTitle = 'Total Retainer';
                                        }
                                    else {
                                        echo $this->Html->link('Retainer Receipt', array('controller' => 'payments', 'action' => 'view', $eviction['Payment']['id']), array('style' => 'color:red;'));
                                        $totalTitle = 'Total Retainer';
                                    }
                                    echo $this->Html->link('Fee Agreement', array('controller' => 'payments', 'action' => 'view_fee_agreement', $eviction['Payment']['id'], 'eviction'));
                                    ?>
                                </dt>
                            </div>
                            <div id="divClientFees" class="col-xs-12 inline left payfield push-t">
                                <?php
                                echo '<div class="feesDetails col-xs-12"><strong>Attorney Fee:</strong></div><div class="left"></div>';
                                echo '<div class="left feesDetails">&nbsp;&nbsp; Flat Attorney Fee:</div><div class="right feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($eviction['Payment']['attorney_fee'], 2) . '</div></div><br class="clear" />';
                                if ($eviction['Payment']['cost_posting_fee'] > 0) echo '<div class="left feesDetails">&nbsp;&nbsp; Posting of Notice to Pay:</div><div class="right feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($eviction['Payment']['cost_posting_fee'], 2) . '</div></div><br class="clear" />';
                                echo '<div class="left feesDetails"><strong>Cost Retainer:</strong></div><div class="right feesDetailsAmount" style="border-bottom:2px solid black;"><div class="left">$</div><div class="right">' . number_format($eviction['Payment']['cost_summons'] + $eviction['Payment']['cost_process_server'] + $eviction['Payment']['cost_writ'] + $eviction['Payment']['cost_writ_issuance'] + $eviction['Payment']['cost_filing_fee'], 2) . '</div></div><br class="clear" />';
                                echo '<div class="left feesDetails total"><strong>' . $totalTitle . ':</strong></div> 	<div class="right feesDetailsAmount total"><div class="left">$</div><div id="divCostTotal" class="right">' . number_format($eviction['Payment']['amount'], 2) . '</div></div><br class="clear" />';
                                echo '<div id="costRetainer2" class="push-t"><strong>Estimated costs to be paid by the Cost Retainer</strong>';
                                echo '<div class="left feesDetails">&nbsp;&nbsp; Issuance of Summons:</div> <div class="right feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($eviction['Payment']['cost_summons'], 2) . '</div></div><br class="clear" />';
                                echo '<div class="left feesDetails">&nbsp;&nbsp; Process Server:</div><div class="right feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($eviction['Payment']['cost_process_server'], 2) . '</div></div>';
                                    if ($include_writ) {
                                        echo '<div class="left feesDetails">&nbsp;&nbsp; Writ of Possession:</div> <div class="right feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($eviction['Payment']['cost_writ'], 2) . '</div></div><br class="clear" />';
                                        echo '<div class="left feesDetails">&nbsp;&nbsp; Issuance of Writ of Possession:</div><div class="right feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($eviction['Payment']['cost_writ_issuance'], 2) . '</div></div><br class="clear" />';
                                    }
                                echo '<div class="left feesDetails">&nbsp;&nbsp; Clerk Filing Fee:</div><div class="right feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($eviction['Payment']['cost_filing_fee'], 2) . '</div></div>';
                                echo '</div>';
                                echo '<div class="inline col-xs-12 feesDetails push-t"><strong>Additional Client Charges:</strong></div> <div class="left"></div><br class="clear" />';
                                echo '<div id="divNoticeToPay1"			style="display:none;"><div class="left feesDetails">&nbsp;&nbsp; Notice Posted (1):</div>	  				<div class="right feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($extra_fees['ExtraFee']['notice_to_pay_1'], 2) . 			'</div></div><br class="clear" /></div>';
                                echo '<div id="divNoticeToPay2"			style="display:none;"><div class="left feesDetails">&nbsp;&nbsp; Notice Posted (2):</div>	  				<div class="right feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($extra_fees['ExtraFee']['notice_to_pay_2'], 2) . 			'</div></div><br class="clear" /></div>';
                                echo '<div id="divNoticeToPay3"			style="display:none;"><div class="left feesDetails">&nbsp;&nbsp; Notice Posted (3):</div>	  				<div class="right feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($extra_fees['ExtraFee']['notice_to_pay_3'], 2) . 			'</div></div><br class="clear" /></div>';
                                echo '<div id="divCourtAppearance1" style="display:none;"><div class="left feesDetails">&nbsp;&nbsp; Court Appearance (1):</div>				<div class="right feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($extra_fees['ExtraFee']['court_appearance_1'], 2) . '</div></div><br class="clear" /></div>';
                                echo '<div id="divCourtAppearance2" style="display:none;"><div class="left feesDetails">&nbsp;&nbsp; Court Appearance (2):</div>				<div class="right feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($extra_fees['ExtraFee']['court_appearance_2'], 2) . '</div></div><br class="clear" /></div>';
                                echo '<div id="divCourtAppearance3" style="display:none;"><div class="left feesDetails">&nbsp;&nbsp; Court Appearance (3):</div>				<div class="right feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($extra_fees['ExtraFee']['court_appearance_3'], 2) . '</div></div><br class="clear" /></div>';
                                echo '<div id="divCaseSettlement" 	style="display:none;"><div class="left feesDetails">&nbsp;&nbsp; Case Settlement:</div>							<div class="right feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($extra_fees['ExtraFee']['case_settlement'], 2) . 		'</div></div><br class="clear" /></div>';
                                echo '<div id="divJudicialDefault" 	style="display:none;"><div class="left feesDetails">&nbsp;&nbsp; Judicial Default:</div>						<div class="right feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($extra_fees['ExtraFee']['judicial_default'], 2) . 	'</div></div><br class="clear" /></div>';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--Additional Charges-->
                <div id="fm7" class="fld col-xs-10 center">
                    <div class="info_wrap lrg col-xs-12 center left push-t">
                        <h2 class="push-t">Additional Charges</h2>
                        <div class="col-xs-12 left push-t">
                            <?php
                            
                                echo $this->Form->input('notice_to_pay_1', array('type' => 'checkbox', "onclick" => 'addFee("divNoticeToPay1", ' . $extra_fees['ExtraFee']['notice_to_pay_1'] . ')', 'label' => 'Notice Posted (1)'));
                            
                                echo $this->Form->input('notice_to_pay_2', array('type' => 'checkbox', "onclick" => 'addFee("divNoticeToPay2", ' . $extra_fees['ExtraFee']['notice_to_pay_2'] . ')', 'label' => 'Notice Posted (2)'));
                                echo $this->Form->input('notice_to_pay_3', array('type' => 'checkbox', "onclick" => 'addFee("divNoticeToPay3", ' . $extra_fees['ExtraFee']['notice_to_pay_3'] . ')', 'label' => 'Notice Posted (3)'));
                                echo $this->Form->input('court_appearance_1', array('type' => 'checkbox', "onclick" => 'addFee("divCourtAppearance1", ' . $extra_fees['ExtraFee']['court_appearance_1'] . ')', 'label' => 'Court Appearance (1)'));
                                echo $this->Form->input('court_appearance_2', array('type' => 'checkbox', "onclick" => 'addFee("divCourtAppearance2", ' . $extra_fees['ExtraFee']['court_appearance_2'] . ')', 'label' => 'Court Appearance (2)'));
                                echo $this->Form->input('court_appearance_3', array('type' => 'checkbox', "onclick" => 'addFee("divCourtAppearance3", ' . $extra_fees['ExtraFee']['court_appearance_3'] . ')', 'label' => 'Court Appearance (3)'));
                                echo $this->Form->input('case_settlement', array('type' => 'checkbox', "onclick" => 'addFee("divCaseSettlement", ' . $extra_fees['ExtraFee']['case_settlement'] . ')'));
                                echo $this->Form->input('judicial_default', array('type' => 'checkbox', "onclick" => 'addFee("divJudicialDefault", ' . 	$extra_fees['ExtraFee']['judicial_default'] . ')'));
                            ?>
                        </div>
                    </div>
                </div>
                
                <!--Client Options-->
                <div id="fmf" class="fld col-xs-10 center">
                    <div class="info_wrap lrg col-xs-12 center left push-t">
                        <h2 class="push-t">Client Options</h2>
                        <div class="col-xs-12 left push-t">
                            <ul class="greenSquare">
                                <?php
                                if ($eviction['Eviction']['oral_lease'] == 1) echo '<p>Client has a oral lease.</p>';
                                switch($eviction['Eviction']['three_day_notice_option_id']) {
                                    case 1:
                                        echo '<p>Client has already posted the Notice to Pay.</p>';
                                        break;
                                    case 2:
                                        echo '<p>Client will personally post the Notice to Pay.</p>';
                                        break;
                                    case 3:
                                        echo '<p>Client would like Eviction 24/7 to post the Notice to Pay.</p>';
                                        break;
                                }
                                if ($eviction['Eviction']['need_three_day_notice'] == 1) echo '<p>Client requested a Notice to Pay.</p>';
                                if ($eviction['Eviction']['is_faxed'] == 1) echo '<p>Client chose to fax the documents.</p>';
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="center col-xs-10 inline push-t clearfix">
                
                <?php		
                echo $this->Form->submit('Save', array(
                    'name' => 'save_lease',
                    'type' => 'image',
                    'div' => array(
                        'id' => 'saveBtn',
                        'class' => 'fm_input fm_text col-xs-3-2 inline center'),
                    'class' => 'btn-blue input'
                ));
                echo $this->Form->submit('Submit', array(
                        'div' => array('id'=>'submitBtn', 'class'=>'col-xs-2 center inline'),
                        'id' => 'btnSave',
                        'class' => 'center inline',
                        'after' => '<i class="center inline fa fa-caret-right" aria-hidden="true"></i>',
                        'type' => 'submit'
                    ));
                ?>

            </div>
        
            <?php echo $this->Form->end(); ?>
            
            <div class="popups col-xs-9 center">
                <?php include '/app/webroot/files/admin_alert_popup.inc'; ?>
            </div>
    
        </div>
    
</div>

<?php echo $this->fetch('scriptBottom'); ?>