<script type="text/javascript">

  $(function() {
    $("#btnSign").click(function() {
			if ($("#EvictionSignNoticeForm").attr('action') == "/index.php/evictions/index") {
				$("#btnSign").attr("disabled", true);
				$("#EvictionSignNoticeForm").submit();
			} else {
				$.ajax({
				    url: '/index.php/evictions/sign_notice/<?php echo $eviction_id; ?>',
				    cache: false,
				    type: 'POST',
				    dataType: 'HTML',
				    success: function(response) {
              	$("#framePDF").attr('src', 'http://<?php echo env('SERVER_NAME'); ?>/index.php/evictions/view_notice/<?php echo $eviction_id; ?>/true');
              	$("#EvictionSignNoticeForm").attr('action', '/index.php/evictions/index');
              	$("#btnSign").attr('src', '/img/btn_continue.png');
              	$("#btnSign").css('width', '129px');
								$("#btnSign").attr("disabled", false);
	          },
	          error: function(e) {
	              alert("An error occurred: " + e.responseText.message);
	              console.log(e);
	          }
				});
				return false;
			}
		});
  });
</script>

<?php
//DOCUSIGN
//	if ($redirect != '') {
//		echo '<script>window.top.location.href = "https://dev.eviction247.com/index.php/evictions/index#' . $redirect . '"</script>';
//	} else {
	if (!$is_signed) {
?>

<div class="evictions form">
  <?php echo $this->Form->create('Eviction'); ?>

  <fieldset>
      <legend>Sign Notice to Pay</legend>

			<p>Please review the Notice to Pay and click "Sign" to sign it electronically.</p>

			<?php 
			//DOCUSIGN echo '<iframe id="framePDF" width="895" height="500" src="' . $response . '"></iframe>';
			echo '<iframe id="framePDF" width="895" height="456" src="http://' . env('SERVER_NAME') . '/index.php/evictions/view_notice/' . $eviction_id . '"></iframe>'; ?>
	</fieldset>

  <?php
  	echo $this->Form->submit('/img/btn_sign.png', array('type' => 'image', 'style' => 'width:90px; height:29px; display:block;', 'id' => 'btnSign'));
		echo $this->Form->end();
		echo '<br />';
		echo $this->Html->link('Cancel', array('controller' => 'evictions', 'action' => 'index'));
  ?>
 </div>
 
<?php //} DOCUSIGN 
	} else {
		echo '<fieldset>';
    echo '	<legend>Sign Notice to Pay</legend>';
		echo '	<p>You have already signed this Notice to Pay.</p>';
		echo '	<br />';
		echo $this->Html->link('Back to Evictions', array('controller' => 'evictions', 'action' => 'index'));
		echo '</fieldset>';
	}
?>