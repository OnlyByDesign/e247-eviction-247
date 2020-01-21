<ol id="statusDetailsList" <?php if ($step >= 19 || $in_settlement == 1 || $is_contested == 1) echo 'style="opacity: 0.4;filter: alpha(opacity=40);"'; ?>>
	<?php
	  $i = 1;
	  foreach ($statuses as $status) {
			if ($status['Status']['step'] > 7) {
		  	if ($i < 12) {
		      if ($status['Status']['step'] < $step) {
						$marker = $this->Html->image('/img/icon_tml_' . $i . '_complete.png');
						$background = 'statusBgDone';
		      } elseif ($status['Status']['step'] == $step) {
						$marker = $this->Html->image('/img/icon_tml_' . $i . '_active.png');
						$background = 'statusBgCurrent';
		      } else {
		      	$marker = $this->Html->image('/img/icon_tml_' . $i . '_pending.png');
						$background = '';
					}

					//Insert the date in the status description
					foreach ($status_date_fields as $key => $status_date_step) {
						if ($status['Status']['id'] == $key) {
							$status['Status']['description'] = format_status($status['Status']['description'], $status_dates[$key]);
							if (strpos($status['Status']['description'], '{time}') > 0) $status['Status']['description'] = str_replace('{time}', $status['Eviction'][$status_date_step . '_hearing_time'], $status['Status']['description']);
							continue;
						}
					}

//DON'T THINK WE NEED THIS ANYMORE SINCE WE'RE ONLY DISPLAYING PAST STATUSES
					//Replace the date placeholder with underlines for statuses that don't have a date yet
//		      $status['Status']['description'] = preg_replace('/{date}/','_______', $status['Status']['description']);

		      $modDate = '';
		      if (isset($status['EvictionActionDate']['modified_date']) && $status['EvictionActionDate']['modified_date'] != '') $modDate = date('m/d/Y', strtotime($status['EvictionActionDate']['modified_date'])) . ': ';

		      echo '<li>';
		      echo '	<div class="statusMarker">' . $marker . '</div> <div class="' . $background . '"><div class="statusNum">' . $i . '. </div> <div class="statusDesc"><span class="modDate">' . $modDate . '</span> ' . $status['Status']['description'] . '</div></div>';
		      echo '</li>';
		      echo '<br class="clear" />';
				}
	      $i++;
	    }
	  }
	?>
</ol>