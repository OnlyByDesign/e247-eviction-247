<div class="evictions form">
    <?php
    echo $this->Form->create(
        'Eviction', array('type' => 'file', 'action' => "upload_notice/$eviction_id")
    );
    ?>
    <fieldset>
        <legend>Upload Required Documents</legend>
        <?php
        	echo '<p>';
        	if ($is_lease_uploaded == false) echo 'Please upload a new Lease Agreement <br />';
        	if ($is_signed_three_day_uploaded == false) echo 'Please upload the Notice to Pay that you signed and posted on the defendant\'s door.';
        	if ($is_affidavit_uploaded == false) echo 'Please upload the signed Affidavit of Non-Military Service.';
        	echo '</p>';

	        echo $this->Form->input('Eviction.id', array('value' => $document_id));
	      	if ($is_lease_uploaded == false) echo $this->Form->input('Eviction.lease', array('type' => 'file', 'label' => __('lease', true), 'id' => 'uploadLabel2'));
	        if ($is_signed_three_day_uploaded == false) echo $this->Form->input('Eviction.signed_notice', array('type' => 'file', 'label' => __('signed_notice', true)));
	        if ($is_affidavit_uploaded == false) echo $this->Form->input('Eviction.affidavit', array('type' => 'file', 'label' => __('affidavit', true)));
	      	echo $this->Form->input('Eviction.ledger', array('type' => 'file', 'div' => array('id' => 'divLedger'), 'label' => array('text' => __('ledger', true) . ' (Not required)')));
        ?>
    </fieldset>
    <?php
    	echo $this->Form->submit('/img/btn_continue.png', array('type' => 'Continue', 'type' => 'image', 'style' => 'width:129px; height:29px; display:block;'));
			echo $this->Form->end();
 			echo '<br />';
			echo $this->Html->link('Cancel', array('controller' => 'evictions', 'action' => 'index'));
    ?>
</div>