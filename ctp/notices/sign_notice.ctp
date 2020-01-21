<script type="text/javascript">

  $(function() {
    $("#btnSign").click(function() {
			if ($("#NoticeSignNoticeForm").attr('action') == "/index.php/notices/index") {
				$("#btnSign").attr("disabled", true);
				$("#NoticeSignNoticeForm").submit();
			} else {
				$.ajax({
				    url: '/index.php/notices/sign_notice/<?php echo $notice_id; ?>',
				    cache: false,
				    type: 'POST',
				    dataType: 'HTML',
				    success: function(response) {
//alert(response);
              	$("#framePDF").attr('src', 'http://<?php echo env('SERVER_NAME'); ?>/index.php/notices/view_notice/<?php echo $notice_id; ?>/true');
              	$("#NoticeSignNoticeForm").attr('action', '/index.php/notices/index');
              	$("#btnSign").attr('src', '/img/btn_continue.png');
              	$("#btnSign").css('width', '129px');
								$("#btnSign").attr("disabled", false);
	          },
	          error: function(e) {
	              alert("An error occurred: " + e.responseText);
	              console.log(e.responseText);
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
//		echo '<script>window.top.location.href = "https://dev.notice247.com/index.php/notices/index#' . $redirect . '"</script>';
//	} else {
	if (!$is_signed) {
?>

<div class="notices form">
  <?php echo $this->Form->create('Notice'); ?>

  <fieldset>
      <legend>Sign Notice to Pay</legend>

			<p>Please review the Notice to Pay and click "Sign" to sign it electronically.</p>

			<?php 
			//DOCUSIGN echo '<iframe id="framePDF" width="895" height="500" src="' . $response . '"></iframe>';
			//THE LIVE SITE USES HTTPS BUT THE DEV SITE USES HTTP
			echo '<iframe id="framePDF" width="895" height="456" src="http://' . env('SERVER_NAME') . '/index.php/notices/view_notice/' . $notice_id . '"></iframe>'; ?>
	</fieldset>

  <?php
  	echo $this->Form->submit('/img/btn_sign.png', array('type' => 'image', 'style' => 'width:90px; height:29px; display:block;', 'id' => 'btnSign'));
		echo $this->Form->end();
		echo '<br />';
		echo $this->Html->link('Cancel', array('controller' => 'notices', 'action' => 'index'));
  ?>
 </div>
 
<?php //} DOCUSIGN 
	} else {
		echo '<fieldset>';
    echo '	<legend>Sign Notice to Pay</legend>';
		echo '	<p>You have already signed this Notice to Pay.</p>';
		echo '	<br />';
		echo $this->Html->link('Back to Notices', array('controller' => 'notices', 'action' => 'index'));
		echo '</fieldset>';
	}
?>