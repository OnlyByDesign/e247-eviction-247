<script type="text/javascript">
  $(function() {
    $("#PropertyAddressBookState").change(function() {
    	var state_id = $(this).val();

			$.ajax({
			    url: '/index.php/evictions/loadCounties/' + state_id,
			    cache: false,
			    type: 'GET',
			    dataType: 'HTML',
			    success: function(response) {
              $('#PropertyAddressBookCounty').html(response);
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
            <h1 class="main"><?php echo String::insert(__('Edit <span>:param1</span>', true), array('param1' => __('Entry', true))); ?></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/4.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_account')); ?>
    </div>

    <div class="content col-xs-8 center">

        <div class="entries form inline col-xs-12 left push-t push-b">

            <?php echo $this->Form->create('PropertyAddressBook');?>

            <?php
                echo $this->Form->input('id');
            
                echo $this->Form->input('street_address1', [
                    'div' => array('class' => 'fm_input fm_text col-xs-12 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Street address',
                    'placeholder' => 'Street address',
                    'label' => false
                ]);
            ?>
            <div class="col-xs-12 flex left">
                <?php
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
                echo $this->Form->input('zip_code', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left last'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Zip code',
                    'placeholder' => 'Zip code',
                    'label' => false
                ]);
                ?>
            </div>

        </div>

        <?php
        echo $this->Form->submit('Save', array( 'type' => 'Save', 'type' => 'image', 'div' => array('class' => 'fm_input fm_text col-xs-3 inline center push-t last'), 'class' => 'btn-blue input')); 
        echo $this->Form->end();
        echo '<p class="col-xs-12 center">';
        echo $this->Html->link('Cancel', array('controller' => 'property_address_books', 'action' => 'index'));
        echo '</p>';
        ?>

    </div>
    
</div>