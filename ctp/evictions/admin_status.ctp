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
        $('i').css({'font-size':'48px','color':'#3665AF'})
	});
</script>


<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
            <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">Eviction Status <span>Timeline</span></h1>
            </div>
            <div class="hr_over"></div>
            <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/5.jpg"></div>
        </div>
        
        <div class="db_tab col-xs-12 center">
            <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
        </div>
    
        <div class="evictions form content col-xs-8 center">

            <div class=" inline col-xs-12 left push-t push-b">
                
                <?php /*
                if ($in_settlement == 1) echo $this->Html->image('/img/stamp_pending.png', array('class' => 'stampPending'));
                if ($is_contested == 1) echo $this->Html->image('/img/stamp_contest.png', array('class' => 'stampContest'));
                */ ?>
                
                <div class="col-xs-12 inline center push-b">
                
                    <div class="curent-status-icon center">
                        <?php if ($step == 6) {
                            echo '<i class="fas fa-file-import"></i>';
                        } else if ($step > 6 && $step < 18) {
                            echo '<i class="fas fa-redo-alt"></i>';
                        }	else if ($step <= 6) {
                            echo '<i class="fas fa-redo-alt"></i>';
                        }	else if ($step >= 18 && $step < 23) {
                            echo '<i class="far fa-handshake"></i>';
                        }	else if ($step == 23) {
                            echo '<i class="fas fa-lock-open"></i>';
                        } ?>
                    </div>

                    <div class="curent-status-text col-xs-12 center push-t">
                        <?php if ($in_settlement == 1 || $is_contested == 1); ?>
                        <p><strong><?php echo $status_name ?></strong></p>
                    </div>
                    
                </div>
                
                <div class="col-xs-12 left inline push-t push-b">
                    <div class="left inline col-xs-5-2 push-r">
                        <p><strong>Property address:</strong><br><?php echo $address ?></p>
                    </div>
                    <div class="left inline col-xs-6">
                        <p><strong>Started: </strong><?php echo $creation_date ?></p>
                        <p><strong>Defendant(s): </strong><?php echo $defendants ?></p>
                    </div>
                </div>
                
                <?php if (!empty($statuses)) { ?>
                    <p><strong>Eviction Status: </strong><?php echo $this->element('status_details', array('statuses' => $statuses, 'step' => $step)); ?></p>
                <?php } if (!empty($damages_statuses)) { ?>
                    <p><strong>Damages Status: </strong><?php echo $this->element('status_details', array('statuses' => $damages_statuses, 'step' => $damages_step, 'step_date' => $damages_step_date ));?></p>
                <?php } ?>
                
            </div>
            
        </div>
</div>      