<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
	jQuery('.creload').on('click', function() {
	    var mySrc = $(this).prev().attr('src');
	    var glue = '?';
	    if(mySrc.indexOf('?')!=-1)  {
	        glue = '&';
	    }
	    $(this).prev().attr('src', mySrc + glue + new Date().getTime());
	    return false;
	});
</script>



<h2>Contact Us</h2>

<div style="float:right;">
	<div style="width:250px;position:relative;margin-top:0px;border:solid 1px #d5d5d5;background-color:#eaeaea;padding: 23px 23px 0px 23px;">
		<!--<h2 style="font-size:40px;">866-235-1646</h2>-->
		<?php
			/*if (CakeSession::read('CurrentSite') == 'leases')*/ //echo '<img src="/img/wilkinslawfirm_sml_logo.png" style="margin: 0px 0px 8px 0px;" /><br /><br />';
			//else echo '<img src="/img/eviction247_hpg_logo.png" width="240px" style="margin: 0px 0px 8px 0px;" /><br /><br />';
		?>
		<p id="hpgtext" style="line-height:normal; font-size:18px; font-weight:bold;">Jeffery M. Wilkins, Esq.</p> 
		<p id="hpgtext" style="line-height:normal; font-size:18px;">Phone: (904) 660-0020<br />
		Fax: (904) 239-5468</p>
		<p id="hpgtext" style="line-height:normal; font-size:18px;">822 N A1A, Suite 100<br />
		Ponte Vedra Beach, Florida 32082</p>
	</div>

	<div style="margin:20px auto 0 auto;text-align:center;">
		<a href="https://www.facebook.com/eviction247" target="_blank"><img src="/img/btn_fb.png" width="150" height="45" alt="Like us on Facebook" title="Like us on Facebook" /></a>
	</div>
</div>


<span class="text2"><span class="requiredField">*</span> = Required fields</span>
<br />
<br />

<?php
	echo $this->Form->create('ContactForm');
	
	echo $this->Form->input('first_name');
	echo $this->Form->input('last_name');
	echo $this->Form->input('street_address1');
	echo $this->Form->input('street_address2');
	echo $this->Form->input('city');
//	echo $this->Form->input('state', $states);
	echo $this->Form->input('state', array('label' => 'State/Province'));
	echo $this->Form->input('zip_code', array('label' => 'Zip/Postal Code'));
	echo $this->Form->input('country', array('options' => $countries, 'default' => 'US'));
	echo $this->Form->input('company_name');
	echo $this->Form->input('phone_number');
	echo $this->Form->input('fax_number');
	echo $this->Form->input('email_address');
	echo $this->Form->input('message', array('type' => 'textarea'));

	$this->Captcha->input('Contact');

	echo $this->Form->submit('/img/btn_submit.png', array('type' => 'Submit', 'type' => 'image', 'style' => 'width:129px; height:29px; display:block;'));
	echo $this->Form->end();


	include '/app/webroot/files/alert_popup.inc';
?>