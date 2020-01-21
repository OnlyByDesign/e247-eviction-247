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


<h2><?php echo String::insert(__('Add a New :param1', true), array('param1' => __('Contact', true))); ?></h2>


<div class="entries form">
	<?php echo $this->Form->create('AddressBook');?>
	<?php
    echo $this->Form->input('first_name');
    echo $this->Form->input('last_name');
    echo $this->Form->input('street_address1');
    echo $this->Form->input('street_address2');
    echo $this->Form->input('city');
    echo $this->Form->input('state');
    echo $this->Form->input('county_id');
    echo $this->Form->input('zip_code');
    echo $this->Form->input('company_name');
    echo $this->Form->input('phone_number');
    echo $this->Form->input('phone_number_emergencies', array('label' => 'Emergency Phone Number'));
  ?>
  
 	<?php
		echo $this->Form->submit('/img/btn_save.png', array('type' => 'Save', 'type' => 'image', 'style' => 'width:129px; height:29px; display:block;'));
		echo $this->Form->end();

		echo '<br />';
		echo $this->Html->link('Cancel', array('controller' => 'address_books', 'action' => 'index', $user_id));
	?>

</div>
