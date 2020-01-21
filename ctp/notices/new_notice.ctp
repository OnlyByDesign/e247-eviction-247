<script type="text/javascript">
  $(function() {
    $("#StateName").change(function() {
    	var state_id = $(this).val();

			$.ajax({
			    url: '/index.php/notices/loadCounties/' + state_id,
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


	//----------------------------------------------------------
	function displayPaymentNotice() {
		if (document.getElementById('PaymentType').value == 'alternate') document.getElementById('payment-notice').style.display = 'inline-block';
		else {
			if ($('#payment-notice').length > 0) document.getElementById('payment-notice').style.display = 'none';
		}
	}
	//----------------------------------------------------------


	$(document).ready(function() {
		displayPaymentNotice();
	});
</script>

<div id="wrapper" class="acc center fm-create">
        
        <div class="hero col-xs-12 center">
            <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">create a <span>new</span> lease</h1>
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
            
            <div class="info col-xs-10 center">                    
                    <?php echo $this->Form->create(); ?>
                    <div class="fld col-xs-12 center">                        
                        <div class="info_wrap lrg col-xs-12 center">
                            <div class="flex col-xs-12 center">
                                <?php
                                    echo $this->Form->input('State.name', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                                        'class' => 'input col-xs-12 center',
                                        'empty' => 'Lease Property State',
                                        'after' => 'Lease Property State',
                                        'options' => $states,
                                        'required' => true,
                                        'label' => false
                                    ));
                                    echo $this->Form->input('county', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                                        'class' => 'input col-xs-12 center',
                                        'empty' => 'Please select a county',
                                        'after' => 'Lease Property County',
                                        'options' => $counties,
                                        'required' => false,
                                        'label' => false
                                    ));
                                    echo $this->Form->input('Tenants.number', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-3 inline left last'),
                                        'class' => 'input col-xs-12 center',
                                        'placeholder' => 'Number of tenants',
                                        'after' => 'Number of tenants',
                                        'options' => $tenants,
                                        'required' => false,
                                        'label' => false
                                    ));
                                ?>
                            </div>
                            <div class="flex col-xs-12 center">
                                <?php
                                    if ($allow_alternate_payment) echo $this->Form->input('Payment.type', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-3 inline left last'),
                                        'class' => 'input col-xs-12 center',
                                        'empty' => 'Payment Type',
                                        'default' => 'alternate',
                                        'options' => $payment_types,
                                        'onclick' => 'displayPaymentNotice()',
                                        'after' => ' <div id="payment-notice" style="color:red;">NOTICE: All invoiced amounts are due immediately upon receipt of the invoice.</div>',
                                        'required' => true,
                                        'label' => false
                                    ));
                                    else echo $this->Form->input('Payment.type', array('type' => 'hidden', 'value' => 'credit_card'));
                                    if ($this->Session->read('Is_Superuser') > 0) {
                                        echo $this->Form->input('assign_to_user_id', array(
                                            'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                                            'class' => 'input col-xs-12 center',
                                            'placeholder' => 'Notice Assigned To',
                                            'after' => 'Notice Assigned To',
                                            'options' => $assign_to_list,
                                            'empty' => 'Please select',
                                            'required' => true
                                        ));
                                    }
                                    echo $this->Form->submit('Continue', array(
                                        'div' => array('class' => 'submit col-xs-12 last'),
                                        'class' => 'btn-orng input col-xs-12 center',
                                        'type' => 'submit'
                                    ));

                                    echo $this->Form->end();
                                ?>
                            </div>
                        </div>
                </div>
            </div>
    </div>
</div>

<?php include '/app/webroot/files/alert_popup.inc';?>