<script type="text/javascript">
	function willFax() {
		if (document.getElementById("LeaseIsFaxed").checked == true) {
			document.getElementById("EvictionLedger").disabled = true;
		} else {
			document.getElementById("EvictionLedger").disabled = false;
		}
	}	
</script>



<div id="progress_image">
	<?php
		$progress_filename = '';
		if ($allow_fee_agreement_bypass) $progress_filename = '_bypass';
	?>
	<img src="/img/progress_lease_step5<?php echo $progress_filename; ?>.png" height="53" alt="" title="" />
	<br />
	<?php echo $this->element('progress_lease' . $progress_filename); ?>
</div>

<h2>Upload Documents</h2>

<div class="leases form">
  <?php
  	echo $this->Form->create(
      'Lease', array('type' => 'file', 'action' => "upload_documents/$lease_id")
  );
  ?>
  <fieldset>
			<p style="text-align:center;"><strong>NOTICE:</strong> If you choose to upload your documents they must be in a PDF (Adobe) format.</p>

      <?php
      	echo $this->Form->input('Lease.id', array('value' => $document_id));
	      echo $this->Form->input('Lease.ledger', array('type' => 'file', 'div' => array('id' => 'divLedger'), 'label' => array('text' => __('ledger', true) . ' (Not Required)', 'id' => 'uploadLabel4')));
      ?>
  </fieldset>
  
	<?php
		echo $this->Form->input('is_faxed', array('label' => 'I will fax the documents to 1-904-239-5468 or upload them later to my dashboard.', 'class' => 'inputCheckbox', "onclick" => 'willFax()'));
	?>
	<br />
	<br />
  
  <?php
  	echo $this->Form->submit('/img/btn_continue.png', array('type' => 'Continue', 'type' => 'image', 'style' => 'width:129px; height:29px; display:block;'));
		echo $this->Form->end();
  ?>
	
	<br />
	<a href="/index.php/leases/edit/<?php echo $lease_id; ?>">Back</a>
</div>


<?php include '/app/webroot/files/alert_popup.inc';?>