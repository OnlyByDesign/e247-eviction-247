<script type="text/javascript">
/*
  $(function() {
    $("#StateName").change(function() {
    	var state_id = $(this).val();

			$.ajax({
			    url: '/index.php/evictions/loadCounties/' + state_id,
			    cache: false,
			    type: 'GET',
			    dataType: 'HTML',
			    success: function(response) {
              $('#CountyName').html(response);
          },
          error: function(e) {
              alert("An error occurred: " + e.responseText.message);
              console.log(e);
          }
			});
		});
  });
  */
</script>


<h2>Export Leases to Excel</h2>


<div class="export form">
  <fieldset>
      <?php echo $this->Form->create('Export'); ?>

			<br />

			<p>Select any of the filters below to narrow your search results</p>

      <?php
//started date range, 

				echo $this->Form->input('user', array('type' => 'text', 'label' => 'User'));

				echo $this->Form->input('address', array('type' => 'text', 'label' => 'Property Address'));
				echo $this->Form->input('city', array('type' => 'text', 'label' => 'Property City'));
				//echo $this->Form->input('county', array('type' => 'text', 'label' => 'Property County'));
	//echo $this->Form->input('state', array('label' => 'Property State', 'options' => $states));
	echo $this->Form->input('county', array('label' => 'Property County', 'options' => $counties));

				echo $this->Form->input('owner', array('type' => 'text', 'label' => 'Owner'));
				echo $this->Form->input('tenant', array('type' => 'text', 'label' => 'Tenant'));
      ?>
  </fieldset>

<!--a class="btn" href="">Export</a-->
<a href="#" onclick="document.forms[0].submit();return false;" class="btn">Export</a>

  <?php
  	//echo $this->Form->submit('/img/btn_continue.png', array('type' => 'Continue', 'type' => 'image', 'style' => 'width:129px; height:29px; display:block;'));
		echo $this->Form->end();
		echo '<br /><br />';
		echo $this->Html->link('Cancel', array('controller' => 'leases', 'action' => 'index'));
	?>
</div>