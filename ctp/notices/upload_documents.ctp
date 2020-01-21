<script type="text/javascript">
	function willFax() {
		if (document.getElementById("NoticeIsFaxed").checked == true) {
			NoticeLease.required = false;
			document.getElementById("divLease").className = document.getElementById("divLease").className.replace( /(?:^|\s)required(?!\S)/g , '' )
			document.getElementById("NoticeLease").disabled = true;
			document.getElementById("NoticeLedger").disabled = true;
		} else {
			if (!document.getElementById("NoticeOralLease").checked) {
				NoticeLease.required = true;
				document.getElementById("divLease").className += " required";
				document.getElementById("NoticeLease").disabled = false;
			}
			document.getElementById("NoticeLedger").disabled = false;
		}
	}	


	function oralLease() {
		if (document.getElementById("NoticeOralLease").checked == true) {
			document.getElementById("NoticeLease").required = false;
			document.getElementById("divLease").className = document.getElementById("divLease").className.replace( /(?:^|\s)required(?!\S)/g , '' );
			document.getElementById("NoticeLease").disabled = true;
		} else {
			document.getElementById("NoticeLease").required = true;
			document.getElementById("divLease").className += " required";
			document.getElementById("NoticeLease").disabled = false;
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

<div class="notices form">
  <?php echo $this->Form->create('Notice', array('type' => 'file', 'action' => "upload_documents/$notice_id")); ?>

  <fieldset>
  	<br />
		<p style="text-align:center;"><strong>NOTICE:</strong> If you choose to upload your documents they must be in a PDF (Adobe) format.</p>

    <?php
    	echo $this->Form->input('Notice.id', array('value' => $document_id));
      echo $this->Form->input('Notice.lease', array('type' => 'file', 'div' => array('id' => 'divLease'), 'label' => array('text' => __('lease', true), 'id' => 'uploadLabel2')));
      echo $this->Form->input('Notice.ledger', array('type' => 'file', 'div' => array('id' => 'divLedger'), 'label' => array('text' => __('ledger', true) . ' (Not required)', 'id' => 'uploadLabel4')));
    ?>
  </fieldset>
  
	<?php
		echo $this->Form->input('oral_lease', array('label' => 'I do not have a written lease agreement. I have an oral lease with the tenant.', 'class' => 'inputCheckbox', "onclick" => 'oralLease()'));
		echo $this->Form->input('is_faxed', array('label' => 'I will fax the documents to 1-904-239-5468 instead of uploading them.', 'class' => 'inputCheckbox', "onclick" => 'willFax()'));
	?>
	<br />
	<br />
  
  <?php
  	echo $this->Form->submit('/img/btn_continue.png', array('type' => 'Continue', 'type' => 'image', 'style' => 'width:129px; height:29px; display:block;'));
		echo $this->Form->end();
  ?>
	
	<br />
	<a href="/index.php/notification_notices/index/<?php echo $notice_id; ?>">Back</a>
</div>


<?php include '/app/webroot/files/alert_popup.inc';?>