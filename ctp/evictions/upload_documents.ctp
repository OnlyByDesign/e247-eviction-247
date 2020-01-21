<script type="text/javascript">
	function willFax() {

		if (document.getElementById("EvictionIsFaxed").checked == true) {
			document.getElementById("EvictionLease").required = false;
			document.getElementById("divLease").className = document.getElementById("divLease").className.replace( /(?:^|\s)required(?!\S)/g , '' )
			document.getElementById("EvictionLease").disabled = true;
			if (document.getElementById("EvictionSignedNotice") !== null) {
				document.getElementById("EvictionSignedNotice").required = false;
				document.getElementById("divSignedNotice").className = document.getElementById("divSignedNotice").className.replace( /(?:^|\s)required(?!\S)/g , '' )
				document.getElementById("EvictionSignedNotice").disabled = true;
			}
			document.getElementById("EvictionLedger").disabled = true;
		} else {
			if (!document.getElementById("EvictionOralLease").checked) {
				document.getElementById("EvictionLease").required = true;
				document.getElementById("divLease").className += " required";
				document.getElementById("EvictionLease").disabled = false;
			}
			if (document.getElementById("EvictionSignedNotice") !== null) {
				document.getElementById("EvictionSignedNotice").required = true;
				document.getElementById("divSignedNotice").className += " required";
				document.getElementById("EvictionSignedNotice").disabled = false;
			}
			document.getElementById("EvictionLedger").disabled = false;
		}
	}	


	function oralLease() {
		if (document.getElementById("EvictionOralLease").checked == true) {
			document.getElementById("EvictionLease").required = false;
			document.getElementById("divLease").className = document.getElementById("divLease").className.replace( /(?:^|\s)required(?!\S)/g , '' );
			document.getElementById("EvictionLease").disabled = true;
		} else {
			document.getElementById("EvictionLease").required = true;
			document.getElementById("divLease").className += " required";
			document.getElementById("EvictionLease").disabled = false;
		}
	}	
</script>



<div id="progress_image">
	<?php
		$progress_filename = '';
		if ($allow_fee_agreement_bypass) $progress_filename = '_bypass';
	?>
	<img src="/img/progress_step5<?php echo $progress_filename; ?>.png" height="53" alt="" title="" />
	<br />
	<?php echo $this->element('progress' . $progress_filename); ?>
</div>

<h2>Upload Documents</h2>

<div class="evictions form">
  <?php
  echo $this->Form->create('Eviction', array('type' => 'file', 'action' => "upload_documents/$eviction_id"));
  ?>
  <fieldset>
			<p style="text-align:center;"><strong>NOTICE:</strong> If you choose to upload your documents they must be in a PDF (Adobe) format.</p>

      <?php
      	echo $this->Form->input('Eviction.id', array('value' => $document_id));
	      echo $this->Form->input('Eviction.lease', array('type' => 'file', 'div' => array('id' => 'divLease'), 'label' => array('text' => __('lease', true), 'id' => 'uploadLabel2')));
	      if ($three_day_notice_option_id == 1) {
	      	echo $this->Form->input('Eviction.signed_notice', array('type' => 'file', 'div' => array('id' => 'divSignedNotice'), 'label' => array('text' => __('signed_notice', true), 'id' => 'uploadLabel3')));
	      }
	      echo $this->Form->input('Eviction.ledger', array('type' => 'file', 'div' => array('id' => 'divLedger'), 'label' => array('text' => __('ledger', true) . ' (Not Required)', 'id' => 'uploadLabel4')));
      ?>
  </fieldset>
  
	<?php
		echo $this->Form->input('oral_lease', array('label' => 'I do not have a written lease agreement. I have an oral lease with the tenant.', 'class' => 'inputCheckbox', "onclick" => 'oralLease()'));
		echo $this->Form->input('is_faxed', array('label' => 'I will fax the documents to 1-904-239-5468 or upload them later to my dashboard.', 'class' => 'inputCheckbox', "onclick" => 'willFax()'));
	?>
	<br />
	<br />
  
  <?php
  	echo $this->Form->submit('/img/btn_continue.png', array('type' => 'Continue', 'type' => 'image', 'style' => 'width:129px; height:29px; display:block;'));
		echo $this->Form->end();
  ?>
	
	<br />
	<a href="/index.php/notifications/index/<?php echo $eviction_id; ?>">Back</a>
</div>


<?php include '/app/webroot/files/alert_popup.inc';?>