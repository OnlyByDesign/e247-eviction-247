<h2>Upload Required Documents</h2>

<?php
	echo '<div class="notice-wrapper">';
	echo '	<h1><strong>Property address:</strong> ' . $address . '</h1><br />';
 	echo '	<strong>Landlord:</strong> ' . $landlord . '<br />';
 	echo '	<strong>Tenant(s):</strong> ' . $tenants . '<br />';
 	echo '	<strong>Matter #:</strong> ' . $notice_id . '<br /><br />';
	echo '</div>';
?>


<div class="notices form">
    <?php echo $this->Form->create('Notice', array('type' => 'file', 'action' => "upload_notice/$notice_id")); ?>

    <fieldset>
      <?php
      	echo '<p>';
      	if ($is_lease_uploaded == false) echo 'Please upload a new Lease Agreement <br />';
      	if ($show_signed_notice_upload) echo 'Please upload your signed Notice to Pay.';
      	echo '</p>';

        echo $this->Form->input('Notice.id', array('value' => $document_id));
      	if ($is_lease_uploaded == false) echo $this->Form->input('Notice.lease', array('type' => 'file', 'label' => __('lease', true), 'id' => 'uploadLabel2'));
        if ($show_signed_notice_upload) echo $this->Form->input('Notice.signed_notice', array('type' => 'file', 'label' => __('signed_notice', true)));
      ?>
    </fieldset>

    <?php
    	echo $this->Form->submit('/img/btn_continue.png', array('type' => 'Continue', 'type' => 'image', 'style' => 'width:129px; height:29px; display:block;'));
			echo $this->Form->end();
 			echo '<br />';
			echo $this->Html->link('Cancel', array('controller' => 'notices', 'action' => 'index'));
    ?>
</div>