<!--div style="text-align:center;width:522px;"-->

<?php
	if (isset($lease_renewal)) {
		if ($lease_renewal) echo '<div class="progress_title" style="margin-left:204px;">Create a Renewal Lease</div>';
		else echo '<div class="progress_title" style="margin-left:204px;">Start a New Lease</div>';
	} else echo '<div class="progress_title" style="margin-left:204px;">Start a New Lease</div>';
?>
<div class="progress_title" style="margin-left:40px;">Payment</div>
<div class="progress_title" style="margin-left:38px;">Lease Information Sheet</div>
<div class="progress_title" style="margin-left:37px;">Notifications</div>
<div class="progress_title" style="margin-left:35px;">Done!</div>
<div style="clear:left;"></div>

<!--/div-->
<br />
