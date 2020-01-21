
<div class="evictions form">
  <fieldset>
      <legend>Reject Three Day Notice</legend>

			<p>Enter the reason why this Three Day Notice is being rejected. An email with a pre-filled Three Day Notice will be sent to the client.</p>

      <?php
      echo $this->Form->create('Eviction', array('action' => "reject_notice/$eviction_id"));
      	//echo $this->Form->input('Eviction.id', array('value' => $eviction_id));
		  	//echo $this->Form->create('Eviction');
				//echo $this->Form->input('id');
				echo $this->Form->input('message', array('type' => 'textarea'));
      ?>
  </fieldset>


  <?php
  	echo $this->Form->submit('/img/btn_continue.png', array('type' => 'Continue', 'type' => 'image', 'style' => 'width:129px; height:29px; display:block;'));
		echo $this->Form->end();
		echo '<br />';
		echo $this->Html->link('Cancel', array('controller' => 'evictions', 'action' => 'index'));
	?>
</div>