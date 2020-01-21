<?php
	echo $this->element('datepicker_includes');
	echo $this->Html->css('jquery.ptTimeSelect');
	echo $this->Html->script('jquery.ptTimeSelect');
?>
<script type="text/javascript">
  $(document).ready(function() {
		displayPaymentNotice();

    $("#StateName").change(function() {
    	var state_id = $(this).val();

			$.ajax({
			    url: '/index.php/leases/loadCounties/' + state_id,
			    cache: false,
			    type: 'GET',
			    dataType: 'HTML',
			    success: function(response) {
              $('#LeaseCounty').html(response);
          },
          error: function(e) {
              alert("An error occurred: " + e.responseText.message);
              console.log(e);
          }
			});
		});
        $('#LeaseRequestedBy').datepicker();
		$('#LeaseRequestedByTime').ptTimeSelect();
  });


	//----------------------------------------------------------
	function checkManageOption() {
		if (document.getElementById('LeaseManager2').checked == true) {
			document.getElementById('LeaseSigner1').checked = true;
			document.getElementById('LeaseSigner1').disabled = true;
			document.getElementById('LeaseSigner2').disabled = true;
		}	else {
			document.getElementById('LeaseSigner1').disabled = false;
			document.getElementById('LeaseSigner2').disabled = false;
		}
	}

	//----------------------------------------------------------
	function displayPaymentNotice() {
		if (document.getElementById('PaymentType').value == 'alternate') document.getElementById('payment-notice').style.display = 'inline-block';
		else {
			if ($('#payment-notice').length > 0) document.getElementById('payment-notice').style.display = 'none';
		}
	}
	//----------------------------------------------------------
</script>

<div id="wrapper" class="acc center fm-create">
        
        <div class="hero col-xs-12 center">
            <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">create a <span>new</span> lease</h1>
            </div>
            <div class="hr_over"></div>
            <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/2.jpeg"></div>
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
                                    echo $this->Form->input('lease_type', [
                                        'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                                        'class' => 'input col-xs-12 center',
                                        'empty' => 'Lease Property Type',
                                        'options' => $lease_types,
                                        'required' => true,
                                        'label' => false
                                    ]);
                                    echo $this->Form->input('State.name', [
                                        'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                                        'class' => 'input col-xs-12 center',
                                        'empty' => 'Select a state',
                                        'options' => $states,
                                        'required' => true,
                                        'label' => false
                                    ]);
                                    echo $this->Form->input('county', [
                                        'div' => array('class' => 'fm_input fm_text col-xs-5 inline left last'),
                                        'class' => 'input col-xs-12 center',
                                        'empty' => 'Select a county',
                                        'options' => $counties,
                                        'required' => true,
                                        'label' => false
                                    ]);
                                ?>
                            </div>
                            <div class="flex col-xs-12 center">
                                <?php
                                    echo $this->Form->input('Tenants.number', [
                                        'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                                        'class' => 'input col-xs-12 center',
                                        'empty' => 'Number of tenants',
                                        'options' => $tenants,
                                        'required' => true,
                                        'label' => false
                                    ]);
                                    echo $this->Form->input('Occupants.number', [
                                        'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                                        'class' => 'input col-xs-12 center',
                                        'empty' => 'Number of occupants',
                                        'options' => $occupants,
                                        'required' => true,
                                        'label' => false
                                    ]);
                                    echo $this->Form->input('Owners.number', [
                                        'div' => array('class' => 'fm_input fm_text col-xs-3 inline left last'),
                                        'class' => 'input col-xs-12 center',
                                        'empty' => 'Number of landlords',
                                        'options' => $owners,
                                        'required' => true,
                                        'label' => false
                                    ]);
                                ?>
                            </div>
                            <div class="col-xs-12 center">
                                <?php
                                    echo '<p class="inline left push-r">Property manager:</p>';
                                    echo '<div class="fm_input fm_text col-xs-4 inline center left">';   
                                        $options = array(Configure::read('Lease.manager_company') => 'Management Company', Configure::read('Lease.manager_owner') => 'Property Owner');
                                        $attributes = array('legend' => false, 'separator' => ' ', 'default' => Configure::read('Lease.manager_company'), 'onclick' => 'checkManageOption();', 'class' => 'input center right push-b');
                                        echo $this->Form->radio('manager', $options, $attributes);
                                    echo '</div>';
                                    echo '<p class="inline left push-r">Signing lease:</p>';
                                    echo '<div class="fm_input fm_text col-xs-4 inline center left last">';  
                                        $options = array(Configure::read('Lease.signer_agent') => 'Management Company Agent', Configure::read('Lease.signer_owner') => 'Property Owner');
                                        if ($renewal_signer) $attributes = array('legend' => false, 'separator' => ' ', 'default' => $renewal_signer);
                                        else $attributes = array('legend' => false, 'separator' => ' ', 'default' => Configure::read('Lease.signer_owner'), 'class' => 'input center left push-b');
                                        echo $this->Form->radio('signer', $options, $attributes);
                                    echo '</div>';
                                ?>
                            </div>
                            <div class="flex col-xs-12 center">
                                <?php
                                    echo $this->Form->input('Payment.type', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                                        'class' => 'input col-xs-12 center',
                                        'empty' => 'Payment Type',
                                        'options' => $payment_types,
                                        'onclick' => 'displayPaymentNotice()',
                                         'after' => ' <div id="payment-notice" style="color:red;">NOTICE: All invoiced amounts are due immediately upon receipt of the invoice.</div>',
                                         'label' => false
                                    ));
                                
                                    echo $this->Form->input('requested_by', array(
                                        'div' => array('class' => 'fm_input fm_text col-xs-6 inline left last'),
                                        'class' => 'input col-xs-6 center inline left',
                                        'type' => 'text',
                                        'placeholder' => 'Date needed',
                                        'label' => false,
                                        'after' => '&nbsp; ' . $this->Form->input('requested_by_time', array(
                                            'class' => 'input col-xs-5-2 center inline right',
                                            'type' => 'text',
                                            'div' => false,
                                            'label' => false,
                                            'placeholder' => 'Time needed')
                                        )
                                    ));                                	
                                ?>
                            </div>
                            <div class="flex col-xs-12 center">
                                <?php
                                    if ($this->Session->read('Is_Superuser') > 0) {
                                        echo $this->Form->input('assign_to_user_id', array(
                                            'div' => array('class' => 'fm_input fm_text col-xs-12 inline left'),
                                        'class' => 'input col-xs-12 center',
                                            'placeholder' => 'Lease Assigned To',
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
                                    include '/app/webroot/files/alert_popup.inc';
                                ?>
                            </div>
                        </div>                        
                    </div>               
            </div>
            
        </div>
        
    </div>