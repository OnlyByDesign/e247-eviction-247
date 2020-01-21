<?php
	switch ($listType) {
		case 'inp':
				$title = "In Progress";
				break;
		case 'act':
				$title = "Active";
				break;
		case 'exp':
				$title = "Expired";
				break;
		default:
				$title = "Active";
				$listType = 'inp';
	}
?>
<script type="text/javascript">
  $(function() {
    $("#txtSearch").keyup(function() {
    	var searchValue = $(this).val();
			$.ajax({
			    url: '/index.php/leases/livesearch/<?php echo $listType;?>/' + searchValue,
			    cache: false,
			    type: 'GET',
			    dataType: 'HTML',
			    success: function (data) {
			        $('#list').html(data);
			    }
			});
		});
		
		$("#btnClear").on('click', function() {
			$('#txtSearch').val('');
			$('#txtSearch').keyup();
		});
  });


	$(function() {
		//If there's a hash in the URL...
    if (document.location.hash) {
    	//Get the lease ID from the URL
			var divID = document.location.hash;
			divID = divID.substr(1);

			//Open up the details box for this leases
			if ($("#lease-summary-" + divID).css('display') == 'block') {
				var expandHeight = $("#lease-detail-" + divID).outerHeight();
				$("#lease-wrapper-" + divID).animate({height: expandHeight}, 'fast');
	      $("#lease-summary-" + divID).fadeOut('fast');
	      $("#lease-detail-" + divID).fadeIn('fast');
      	var src = $("#expand-collapse-" + divID + " img").attr('src');
	      $("#expand-collapse-" + divID + " img").attr('src', src.replace('expand', 'collapse'));
	      $("#expand-collapse-" + divID + " img").attr('alt', 'collapse');
	      $("#expand-collapse-" + divID + " img").attr('title', 'collapse');
			}

			//Scroll to the Lease that has just been saved
    	if ($("#lease-summary-" + divID).length > 0) $('html, body').animate({scrollTop: $(document.location.hash).offset().top}, 500);
    }


		//Expand / collapse the selected lease box
		$("[id^=expand-collapse]").on('click', function() {
    	var div = "#" + $(this).attr('id');
			var divID = div.substr(17);

      var src = $("#expand-collapse-" + divID + " img").attr('src');
			if ($("#lease-summary-" + divID).css('display') == 'block') {
				var expandHeight = $("#lease-detail-" + divID).outerHeight();
				$("#lease-wrapper-" + divID).animate({height: expandHeight}, 'fast');
	      $("#lease-summary-" + divID).fadeOut('fast');
	      $("#lease-detail-" + divID).fadeIn('fast');
	      $("#expand-collapse-" + divID + " img").attr('src', src.replace('expand', 'collapse'));
	      $("#expand-collapse-" + divID + " img").attr('alt', 'collapse');
	      $("#expand-collapse-" + divID + " img").attr('title', 'collapse');
	    } else {
				var expandHeight = $("#lease-summary-" + divID).outerHeight();
				$("#lease-wrapper-" + divID).animate({height: expandHeight}, 'fast');
	      $("#lease-detail-" + divID).fadeOut('fast');
	      $("#lease-summary-" + divID).fadeIn('fast');
	      $("#expand-collapse-" + divID + " img").attr('src', src.replace('collapse', 'expand'));
	      $("#expand-collapse-" + divID + " img").attr('alt', 'expand');
	      $("#expand-collapse-" + divID + " img").attr('title', 'expand');
	    }
	  });

	});
</script>

<div id="wrapper" class="acc center fm-create leases index">       
        
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main">leases <span>overview</span></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/4.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_leases')); ?>
    </div>

    <div class="content col-xs-12 center">

        <div class="acc_srch center col-xs-10 inline">    
            <div class="start sbmt col-xs-3 inline left">
                <div class="btn-orng col-xs-5-2 inline left">
                    <a href="<?php echo $this->Html->url(array('controller' => 'leases','action' => 'new_lease'),array('escape' => false)); ?>">
                        <p class="inline">new lease</p>
                    </a>
                </div>
                <div class="btn-orng col-xs-5-2 inline right">
                    <a href="<?php echo $this->Html->url(array('controller' => 'leases','action' => 'index', 'act'),array('escape' => false)); ?>">
                        <p class="inline">renewal</p>
                    </a>
                </div>
            </div>
            <div class="status col-xs-4 inline center push-r">
                <div id="statusTrig" class="col-xs-12 center">
                    <p class="inline">Status</p>
                    <i class="inline fa fa-caret-down" aria-hidden="true"></i>
                </div>
                <ul class="act_list">                         
                    <li class="col-xs-4 inline">
                        <i class="inline far fa-check-circle"></i>
                        <?php if ($listType == 'act') $class = 'current-list-type'; else $class = '';
                        echo $this->Html->link('Active', 'index/act', array('class' => $class)); ?>
                    </li>                                         
                    <li class="col-xs-4 inline">
                        <i class="inline far fa-clock"></i>
                        <?php if ($listType == 'exp') $class = 'current-list-type'; else $class = '';
                        echo $this->Html->link('Expired', 'index/exp', array('class' => $class)); ?>
                    </li>
                    <li class="col-xs-4 inline">
                        <i class="inline far fa-play-circle"></i>
                        <?php if ($listType == 'inp') $class = 'current-list-type'; else $class = '';
                        echo $this->Html->link('Incomplete', 'index/inp', array('class' => $class)); ?>
                    </li>
                </ul>
            </div>
            <div id="searchBar" class="sbmt fm_input fm_text col-xs-3 inline right">
                <input id="btnClear" class="right btn-blue col-xs-3 inline last" type="submit" name="submit" value="search" />
                <input id="txtSearch" class="right input inline col-xs-9" type="text" placeholder="Search by address or tenant"  />
            </div>
        </div>

        <div class="info col-xs-12 center">                
            <div class="info_wrap lrg center">
                <?php echo $this->element('leases_list'); ?>
            </div>
        </div> 
            
    </div>
</div>
<?php include '/app/webroot/files/alert_popup.inc';?>