<h2>Upload required documents</h2>

<div class="notices form">
  <?php
	  echo $this->Form->create(
      'Notice', array('type' => 'file', 'action' => "upload_documents/$notice_id")
  	);

		echo '<div class="notice-wrapper">';
		echo '	<h1><strong>Property address:</strong> ' . $address . '</h1><br />';
	 	echo '	<strong>Tenant(s):</strong> ' . $tenants . '<br />';
	 	echo '	<strong>Matter #:</strong> ' . $noticeID . '<br /><br />';
		echo '</div>';
  ?>

  <fieldset>
      <?php
      	echo $this->Form->input('Notice.id', array('value' => $document_id));
      	echo $this->Form->input('Notice.lease', array('type' => 'file', 'label' => array('text' => __('lease', true), 'id' => 'uploadLabel2'), 'required' => false));
	      echo $this->Form->input('Notice.signed_notice', array('type' => 'file', 'label' => array('text' => __('signed_notice', true), 'id' => 'uploadLabel3'), 'required' => false));
      ?>
  </fieldset>


  <?php
  	echo $this->Form->submit('/img/btn_continue.png', array('type' => 'Continue', 'type' => 'image', 'style' => 'width:129px; height:29px; display:block;'));
		echo $this->Form->end();
		echo '<br />';
		echo $this->Html->link('Cancel', array('controller' => 'notices', 'action' => 'index'));
	?>
</div>