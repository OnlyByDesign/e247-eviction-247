<h2>Upload documents</h2>

<div class="leases form">
  <?php
	  echo $this->Form->create(
      'Lease', array('type' => 'file', 'action' => "upload_documents/$lease_id")
  	);

		echo '<div class="lease-wrapper">';
		echo '	<h1><strong>Property address:</strong> ' . $address . '</h1><br />';
	 	echo '	<strong>Landlord(s):</strong> ' . $landlord . '<br />';
	 	echo '	<strong>Tenant(s):</strong> ' . $tenants . '<br />';
	 	echo '	<strong>Matter #:</strong> ' . $lease_id . '<br /><br />';
		echo '</div>';
  ?>

  <fieldset>
    <?php
    	echo $this->Form->input('Lease.id', array('value' => $document_id));
    	echo $this->Form->input('Lease.file1', array('type' => 'file', 'label' => array('text' => __('Document 1', true), 'id' => 'uploadLabel1'), 'required' => false));
      echo $this->Form->input('Lease.file2', array('type' => 'file', 'label' => array('text' => __('Document 2', true), 'id' => 'uploadLabel2'), 'required' => false));
      echo $this->Form->input('Lease.file3', array('type' => 'file', 'label' => array('text' => __('Document 3', true), 'id' => 'uploadLabel3')));
    ?>
  </fieldset>


  <?php
  	echo $this->Form->submit('/img/btn_continue.png', array('type' => 'Continue', 'type' => 'image', 'style' => 'width:129px; height:29px; display:block;'));
		echo $this->Form->end();
		echo '<br />';
		echo $this->Html->link('Cancel', array('controller' => 'leases', 'action' => 'index'));
	?>
</div>