<script type="text/javascript">
	$(document).ready(function() {
		var pos = $('.curent-status-text').position();
		<?php if ($in_settlement == 1 && $is_contested == 1) { ?>
			$('.stampPending').css({top: pos.top+35, left: pos.left+14});
			$('.stampContest').css({top: pos.top+45, left: pos.left+340});
		<?php } elseif ($in_settlement == 1) { ?>
			$('.stampPending').css({top: pos.top+24, left: pos.left+140});
		<?php } elseif ($is_contested == 1) { ?>
			$('.stampContest').css({top: pos.top+24, left: pos.left+140});
		<?php } ?>
	});
</script>


<?php
  echo '<h2>Eviction Status Timeline</h2>';
	echo $this->Html->link($this->Html->image('/img/btn_myevictions.png'), array('controller' => 'evictions', 'action' => 'index'), array('escape' => false));
	echo '<br /><br />';

	if ($in_settlement == 1) echo $this->Html->image('/img/stamp_pending.png', array('class' => 'stampPending'));
	if ($is_contested == 1) echo $this->Html->image('/img/stamp_contest.png', array('class' => 'stampContest'));

	echo '<div class="curent-status-icon">';
	if ($step == 6) {
		echo '	<img src="/img/icon_tml_lrg_12.png" width="160" height="160" alt="" title="" />';
	} else if ($step > 6 && $step < 18) {
		echo '	<img src="/img/icon_tml_lrg_' . ($step-7) . '.png" width="160" height="160" alt="" title="" />';
	}	else if ($step <= 6) {
		echo '	<img src="/img/icon_tml_lrg_1.png" width="160" height="160" alt="" title="" />';
	}	else if ($step >= 18 && $step < 23) {
		echo '	<img src="/img/icon_tml_lrg_13.png" width="160" height="160" alt="" title="" />';
	}	else if ($step == 23) {
		echo '	<img src="/img/icon_tml_lrg_11.png" width="160" height="160" alt="" title="" />';
	}
	echo '</div>';

	echo '<div class="curent-status-text"';
	if ($in_settlement == 1 || $is_contested == 1) echo 'style="opacity: 0.4;filter: alpha(opacity=40);"';
	echo '>';
	echo '	<h1><strong>' . $status_name . '</strong></h1>';
	echo '</div>';

	echo '<br />';

	echo '<div class="eviction-wrapper">';
 	echo '	<br /><strong>Started:</strong> ' . $creation_date . '<br /><br />';
	echo '	<h1><strong>Property address:</strong> ' . $address . '</h1><br />';
 	echo '	<strong>Defendant(s):</strong> ' . $defendants . '<br /><br />';
	echo '</div>';

	if (!empty($statuses)) {
	    echo '<h3><strong>Eviction Status</strong></h3>';
	    echo $this->element('status_details', array('statuses' => $statuses, 'step' => $step));
	}

	echo '<br />';

	if (!empty($damages_statuses)) {
	    echo '<h3><strong>Damages Status</strong></h3>';
	    echo $this->element('status_details', array('statuses' => $damages_statuses, 'step' => $damages_step, 'step_date' => $damages_step_date ));
	}