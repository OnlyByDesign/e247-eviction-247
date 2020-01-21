<script type="text/javascript">
  $(function() {
    $("#AddressBookState").change(function() {
    	var state_id = $(this).val();

			$.ajax({
			    url: '/index.php/evictions/loadCounties/' + state_id,
			    cache: false,
			    type: 'GET',
			    dataType: 'HTML',
			    success: function(response) {
              $('#AddressBookCounty').html(response);
          },
          error: function(e) {
              alert("An error occurred: " + e.responseText.message);
              console.log(e);
          }
			});
		});
  });
</script>

<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>Add</span> a New Contact</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/3.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="entries form inline col-xs-12 left push-t push-b">

            <?php
                echo $this->Form->create('AddressBook'); 
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
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'State',
                    'placeholder' => 'State',
                    'label' => false
                ]);
                echo $this->Form->input('county_id', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'County',
                    'placeholder' => 'County',
                    'label' => false
                ]);
                echo $this->Form->input('zip_code', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Zip code',
                    'placeholder' => 'Zip code',
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
                    'after' => 'Emergency Phone Number',
                    'placeholder' => 'Emergency Phone Number',
                    'label' => false
                ]);
            ?>

        </div>

        <?php
            echo $this->Form->submit('Save', array( 'type' => 'Save', 'type' => 'image', 'div' => array('class' => 'fm_input fm_text col-xs-3 inline center push-t last'), 'class' => 'btn-blue input')); 
            echo $this->Form->end();
            echo '<p class="col-xs-12 center">';
            echo $this->Html->link('Cancel', array('controller' => 'address_books', 'action' => 'index', $user_id));
            echo '</p>';
        ?>

    </div>

</div>
