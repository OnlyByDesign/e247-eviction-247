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
								$('#county-field').hide();
//    						$('#AddressBookCountyId').prop('required', false);
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
		$('#AddressBookCountry').trigger("change");
	});
</script>

<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><?php echo String::insert(__('Edit <span>:param1</span>', true), array('param1' => __('Contact', true))); ?></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/6.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-8 center">

        <div class="entries form inline col-xs-12 left push-t push-b">
            <?php
            echo $this->Form->create('AddressBook');
            echo $this->Form->input('id');
            
            echo $this->Form->input('first_name', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'First name',
                'placeholder' => 'First name',
                'label' => false
            ]);
            echo $this->Form->input('last_name', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Last name',
                'placeholder' => 'Last name',
                'label' => false
            ]);
            echo $this->Form->input('street_address1', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Street address',
                'placeholder' => 'Street address',
                'label' => false
            ]);
            echo $this->Form->input('street_address2', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Unit No.',
                'placeholder' => 'Unit No.',
                'label' => false
            ]);
            echo $this->Form->input('city', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'City',
                'placeholder' => 'City',
                'label' => false
            ]);
            echo $this->Form->input('state', [
                'div' => array('id' => 'state-field', 'class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'State',
                'empty' => '<Please Select a State>',
                'label' => false
            ]);
            echo $this->Form->input('state_province', [
                'div' => array('id' => 'state-province-field', 'class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'State/Province',
                'placeholder' => 'State/Province',
                'label' => false
            ]);
            echo $this->Form->input('county_id', [
                'div' => array('id' => 'county-field', 'class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'State/Province',
                'empty' => '<Please Select a county>',
                'label' => false
            ]);
            echo $this->Form->input('zip_code', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Zip code',
                'placeholder' => 'Zip code',
                'label' => false
            ]);
            echo $this->Form->input('country', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Country',
                'placeholder' => 'Country',
                'options' => $countries,
                'default' => 'US',
                'label' => false
            ]);
            echo $this->Form->input('company_name', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Company name',
                'placeholder' => 'Company name',
                'label' => false
            ]);
            echo $this->Form->input('phone_number', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Phone number',
                'placeholder' => 'Phone number',
                'label' => false
            ]);
            echo $this->Form->input('phone_number_emergencies', [
                'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Emergency phone number',
                'placeholder' => 'Emergency phone number',
                'label' => false
            ]);
            ?>
        </div>

        <?php
        echo $this->Form->submit('Save', array( 'type' => 'Save', 'type' => 'image', 'div' => array('class' => 'fm_input fm_text col-xs-3 inline center push-t last'), 'class' => 'btn-blue input')); 
        echo $this->Form->end();
        echo '<p class="col-xs-12 center">';
        echo $this->Html->link('Cancel', array('controller' => 'address_books', 'action' => 'index'));
        echo '</p>';
        ?>

    </div>
    
</div>