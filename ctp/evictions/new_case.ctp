<script type="text/javascript">
  $(function() {
    $("#StateName").change(function() {
    	var state_id = $(this).val();

			$.ajax({
			    url: '/index.php/evictions/loadCounties/' + state_id,
			    cache: false,
			    type: 'GET',
			    dataType: 'HTML',
			    success: function(response) {
              $('#EvictionCounty').html(response);
          },
          error: function(e) {
              alert("An error occurred: " + e.responseText.message);
              console.log(e);
          }
			});
		});
  });

	$(document).ready(function() {
//		displayPaymentNotice();
		<?php
			if ($use_signature) {
				echo '	$("#Eviction3dayPost3").attr("checked", true);';
				echo '	$("#Eviction3dayPost4").attr("checked", true);';
				echo '	refresh3DayOptions();';
			}
		?>
	});


	//----------------------------------------------------------
/*
	function displayPaymentNotice() {
		if (document.getElementById('PaymentType').value == 'alternate') document.getElementById('payment-notice').style.display = 'inline-block';
		else {
			if ($('#payment-notice').length > 0) document.getElementById('payment-notice').style.display = 'none';
		}
	}
*/
	//----------------------------------------------------------

	//----------------------------------------------------------
	function refresh3DayOptions()	{
		var chkPost1 = document.getElementById("Eviction3dayPost1");
		var divPost1 = document.getElementById("div3DayPost1");
		var chkPost2 = document.getElementById("Eviction3dayPost2");
		var divPost2 = document.getElementById("div3DayPost2");
		var chkPost3 = document.getElementById("Eviction3dayPost3");
		var divPost3 = document.getElementById("div3DayPost3");
		var chkPost4 = document.getElementById("Eviction3dayPost4");
		var divPost4 = document.getElementById("div3DayPost4");

		if (chkPost1.checked == true) {
			chkPost2.disabled = true;
			divPost2.style.color = '#aeaeae';
			chkPost3.disabled = true;
			divPost3.style.color = '#aeaeae';
			chkPost4.checked = false;
			chkPost4.disabled = true;
			divPost4.style.color = '#aeaeae';
		} else if (chkPost2.checked == true)	{
			chkPost1.disabled = true;
			divPost1.style.color = '#aeaeae';
			chkPost3.disabled = true;
			divPost3.style.color = '#aeaeae';
		} else if (chkPost3.checked == true)	{
			chkPost1.disabled = true;
			divPost1.style.color = '#aeaeae';
			chkPost2.disabled = true;
			divPost2.style.color = '#aeaeae';
		} else {
			chkPost1.disabled = false;
			divPost1.style.color = '';
			chkPost2.disabled = false;
			divPost2.style.color = '';
			chkPost3.disabled = false;
			divPost3.style.color = '';
			chkPost4.disabled = false;
			divPost4.style.color = '';
		}
	}
	//----------------------------------------------------------
</script>

<div id="wrapper" class="acc center fm-create">
        
    <div class="hero col-xs-12 center">
            <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">create a <span>new</span> eviction</h1>
            </div>
            <div class="hr_over"></div>
            <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/pexels-photo-acc.jpeg"></div>
        </div>
        
    <div class="content col-xs-10 center">
            
        <div class="progress center col-xs-9">
                <i class="pg_icon inline center fas fa-plus current"></i>
                <div class="pg_strike inline center current"></div>
                <i class="pg_icon inline center fas fa-dollar-sign"></i>
                <div class="pg_strike inline center"></div>
                <i class="pg_icon inline center far fa-file-alt"></i>
                <div class="pg_strike inline center"></div>
                <i class="pg_icon inline center far fa-bell"></i>
                <div class="pg_strike inline center"></div>
                <i class="pg_icon inline center fas fa-check"></i>
            </div>
        
        <h1 class="center push-b">Start a <span>New</span> Eviction</h1>
        
        <div class="instructions col-xs-10 inline push-b push-t center">
            <div class="col-xs-6 left">
                <p class="left">Before we get started, please have the following available:</p>
                <p class="left"><strong>1. </strong>A complete copy of the Written Lease (if applicable)</p>
                <p class="left"><strong>2. </strong>The Notice to Pay (if already posted)</p>
                <p class="left"><strong>3. </strong>Tenant Rental Ledger (if available)</p>
            </div>
            <p class="col-xs-6 left"><strong>NOTICE:</strong> Shortly you will be asked to upload or fax your Written Lease (if applicable) and Notice to Pay. If you choose to upload these documents they must be in a PDF (Adobe) format.</p>
        </div>
            
        <div class="info col-xs-10 center inline push-b push-t"> 
            <?php echo $this->Form->create(); ?>
            <div class="fld col-xs-12 center">                        
                <div class="lrg col-xs-12 center">
                    <div class="flex col-xs-12 center">
                        <?php
                            echo $this->Form->input('State.name', array(
                                'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                                'class' => 'input col-xs-12 center',
                                'placeholder' => 'Lease Property State',
                                'after' => 'Lease Property State',
                                'options' => $states,
                                'empty' => '<Please select a state>',
                                'required' => true,
                                'label' => false
                            ));
                            echo $this->Form->input('Eviction.county', array(
                                'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                                'class' => 'input col-xs-12 center',
                                'placeholder' => 'Lease Property County',
                                'after' => 'Lease Property County',
                                'options' => $counties,
                                'empty' => '<Please select a county>',
                                'required' => false,
                                'label' => false
                            ));
                            echo $this->Form->input('Service.name', array(
                                'div' => array('class' => 'fm_input fm_text col-xs-3 inline left last'),
                                'class' => 'input col-xs-12 center',
                                'placeholder' => 'Service Type',
                                'after' => 'Service Type',
                                'options' => $services,
                                'label' => false
                            )); 
                        ?>
                    </div>
                    <div class="flex col-xs-12 center">
                        <?php
                        
                        echo $this->Form->input('Defendants.number', array(
                            'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                            'class' => 'input col-xs-12 center',
                            'placeholder' => 'Number of defendants',
                            'after' => 'Number of defendants',
                            'options' => $defendants,
                            'label' => false
                        ));

                        if ($allow_alternate_payment) echo $this->Form->input('Payment.type', array(
                            'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                            'class' => 'input col-xs-12 center',
                            'placeholder' => 'Payment Type',
                            'after' => 'Payment Type',
                            'options' => $payment_types,
                            'default' => 'alternate',
                            'label' => false
                        ));

                        else echo $this->Form->input('Payment.type', array('type' => 'hidden','value' => 'alternate'));

                        if ($this->Session->read('Is_Superuser') > 0) echo $this->Form->input('assign_to_user_id', array(
                            'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                            'class' => 'input col-xs-12 center',
                            'placeholder' => 'Eviction Assigned To',
                            'after' => 'Eviction Assigned To',
                            'options' => $assign_to_list,
                            'empty' => 'Please select',
                            'required' => true,
                            'label' => false
                        ));
                        ?>
                    </div>
                    <div class="left inline col-xs-12 center push-t">
                        <p class="col-xs-12 left">Please select the option that applies to your matter:</p>
                        
                        <?php
                        
                            echo '<div id="div3DayPost1" class="col-xs-6 fm-check left inline">' . PHP_EOL;
                            echo $this->Form->input('3day_post_1', array(
                                'div' => array('class' => 'fm_mem inline input col-xs-12 left'),
                                'class' => 'inputCheckbox fm_check',
                                'label' => 'I have already posted the Notice to Pay',
                                'type' => 'checkbox',
                                'onclick' => 'refresh3DayOptions();'
                            )) . PHP_EOL;
                            echo '</div>' . PHP_EOL;
                        
                            echo '<div id="div3DayPost2" class="col-xs-6 fm-check left inline">' . PHP_EOL;
                            echo $this->Form->input('3day_post_2', array(
                                'div' => array('class' => 'fm_mem inline input col-xs-12 left'),
                                'class' => 'inputCheckbox fm_check',
                                'label' => 'I have not posted the Notice to Pay, but I will shortly',
                                'type' => 'checkbox',
                                'onclick' => 'refresh3DayOptions();'
                            )) . PHP_EOL;
                            echo '</div>' . PHP_EOL;

                            echo '<div id="div3DayPost3" class="col-xs-6 fm-check left inline">' . PHP_EOL;
                            echo $this->Form->input('3day_post_3', array(
                                'div' => array('class' => 'fm_mem inline input col-xs-12 left'),
                                'class' => 'inputCheckbox fm_check',
                                'label' => 'I would like Eviction 24/7 to post the Notice to Pay',
                                'type' => 'checkbox',
                                'onclick' => 'refresh3DayOptions();'
                            )) . PHP_EOL;
                            echo '</div>' . PHP_EOL;
                        
                            echo '<div id="div3DayPost4" class="col-xs-6 fm-check left inline">' . PHP_EOL;
                            echo $this->Form->input('3day_post_4', array(
                                'div' => array('class' => 'fm_mem inline input col-xs-12 left'),
                                'class' => 'inputCheckbox fm_check',
                                'label' => 'I need Eviction 24/7 to provide me with a Notice to Pay',
                                'type' => 'checkbox',
                                'onclick' => 'refresh3DayOptions();'
                            )) . PHP_EOL;
                            echo '</div>' . PHP_EOL;
                        
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
        
        <?php
            echo $this->Form->submit('Save', array(
                'type' => 'image',
                'div' => array(
                    'class' => 'fm_input fm_text col-xs-3 inline center push-t'),
                'class' => 'btn-blue input'
            ));
            echo $this->Form->end();
        ?>
        
    </div>
</div>

<?php include '/app/webroot/files/alert_popup.inc';?>