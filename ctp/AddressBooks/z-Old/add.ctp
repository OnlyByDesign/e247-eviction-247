<script type="text/javascript">
  $(function() {
		//When the state dropdown's value changes, load the counties associated to the selected state
    $("#AddressBookState").change(function() {
    	var state_id = $(this).val();
			$.ajax({
			    url: '/index.php/evictions/loadCounties/' + state_id,
			    cache: false,
			    type: 'GET',
			    dataType: 'HTML',
			    success: function(response) {
              $('#AddressBookCountyId').html('<option value="0">&lt;Please Select a County&gt;</option>' + response);
			    		//If there are counties associated to the selected state, show the county dropdown, if not hide it
							if (response != ' ') {
								$('#county-field').show();
    						$('#AddressBookCountyId').prop('required', true);
							} else {
//    						$('#AddressBookCountyId').prop('required', false);
								$('#county-field').hide();
							}
          },
          error: function(e) {
              alert("An error occurred: " + e.responseText.message);
              console.log(e);
          }
			});
		});

    $("#AddressBookCountry").change(function() {
    	if ($(this).val() == 'US') {
    		$('#state-field').show();
    		$('#state-province-field').hide();
    		$('#label-zip-code').text('Zip Code');
				$('#AddressBookState').trigger("change");
    	}	else {
				$('#AddressBookState').removeAttr('required');
    		$('#state-field').hide();
    		$('#state-province-field').show();
				$('#AddressBookCountyId').removeAttr('required');
    		$('#county-field').hide();
    		$('#label-zip-code').text('Zip/Postal Code');
    	}
		});

  });



	$(document).ready(function() {
		$('#AddressBookState').trigger("change");
	});
</script>


<h2><?php echo String::insert(__('Add a New :param1', true), array('param1' => __('Contact', true))); ?></h2>


<div class="entries form">
	<?php echo $this->Form->create('AddressBook');?>
	<?php
    echo $this->Form->input('first_name');
    echo $this->Form->input('last_name');
    echo $this->Form->input('street_address1');
    echo $this->Form->input('street_address2');
    echo $this->Form->input('city');
    echo $this->Form->input('state', array('empty' => '<Please Select a State>', 'div' => array('id' => 'state-field')));
    echo $this->Form->input('state_province', array('label' => 'State/Province', 'div' => array('id' => 'state-province-field')));
    echo $this->Form->input('county_id', array('empty' => '<Please Select a county>', 'div' => array('id' => 'county-field')));
    echo $this->Form->input('zip_code', array('label' => array('id' => 'label-zip-code')));
		echo $this->Form->input('country', array('label' => 'Country', 'options' => $countries, 'default' => 'US'));
    echo $this->Form->input('company_name');
    echo $this->Form->input('phone_number');
    echo $this->Form->input('phone_number_emergencies', array('label' => 'Emergency Phone Number'));
  ?>
  
 	<?php
		echo $this->Form->submit('/img/btn_save.png', array('type' => 'Save', 'type' => 'image', 'style' => 'width:129px; height:29px; display:block;'));
		echo $this->Form->end();

		echo '<br />';
		echo $this->Html->link('Cancel', array('controller' => 'address_books', 'action' => 'index'));
	?>

</div>
