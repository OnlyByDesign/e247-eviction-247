<?php switch ($listType) {
    case 'act':
        $title = "Active";
        break;
    case 'com':
        $title = "Complete";
        break;
    default:
        $title = "Active";
} ?>
<script type="text/javascript">
    
  $(function() {
    $("#txtSearch").keyup(function() {
    	var searchValue = $(this).val();
			$.ajax({
			    url: '/index.php/notices/livesearch/<?php echo $listType;?>/' + searchValue,
			    cache: false,
			    type: 'GET',
			    dataType: 'HTML',
			    success: function (data) {
			        $('#list').html(data);
			    }
			});
		});
		
		$("#btnClear").click(function() {
			$('#txtSearch').val('');
			$('#txtSearch').keyup();
		});
  });
    
	$(function() {
		//If there's a hash in the URL...
    if (document.location.hash) {
    	//Get the eviction ID from the URL
			var divID = document.location.hash;
			divID = divID.substr(1);

			//Open up the details box for this notices
			if ($("#notice-summary-" + divID).css('display') == 'block') {
				var expandHeight = $("#notice-detail-" + divID).outerHeight();
				$("#notice-wrapper-" + divID).animate({height: expandHeight}, 'fast');
	      $("#notice-summary-" + divID).fadeOut('fast');
	      $("#notice-detail-" + divID).fadeIn('fast');
      	var src = $("#expand-collapse-" + divID + " img").attr('src');
	      $("#expand-collapse-" + divID + " img").attr('src', src.replace('expand', 'collapse'));
	      $("#expand-collapse-" + divID + " img").attr('alt', 'collapse');
	      $("#expand-collapse-" + divID + " img").attr('title', 'collapse');
			}

			//Scroll to the Eviction that has just been saved
    	if ($("#notice-summary-" + divID).length > 0) $('html, body').animate({scrollTop: $(document.location.hash).offset().top}, 500);
    }


		//Expand / collapse the selected eviction box
		$("[id^=expand-collapse]").on('click', function() {
    	var div = "#" + $(this).attr('id');
			var divID = div.substr(17);

      var src = $("#expand-collapse-" + divID + " img").attr('src');
			if ($("#notice-summary-" + divID).css('display') == 'block') {
				var expandHeight = $("#notice-detail-" + divID).outerHeight();
				$("#notice-wrapper-" + divID).animate({height: expandHeight}, 'fast');
	      $("#notice-summary-" + divID).fadeOut('fast');
	      $("#notice-detail-" + divID).fadeIn('fast');
	      $("#expand-collapse-" + divID + " img").attr('src', src.replace('expand', 'collapse'));
	      $("#expand-collapse-" + divID + " img").attr('alt', 'collapse');
	      $("#expand-collapse-" + divID + " img").attr('title', 'collapse');
	    } else {
				var expandHeight = $("#notice-summary-" + divID).outerHeight();
				$("#notice-wrapper-" + divID).animate({height: expandHeight}, 'fast');
	      $("#notice-detail-" + divID).fadeOut('fast');
	      $("#notice-summary-" + divID).fadeIn('fast');
	      $("#expand-collapse-" + divID + " img").attr('src', src.replace('collapse', 'expand'));
	      $("#expand-collapse-" + divID + " img").attr('alt', 'expand');
	      $("#expand-collapse-" + divID + " img").attr('title', 'expand');
	    }
	  });

	});
</script>

<div id="wrapper" class="acc center fm-create notices index">       
        
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main">notices <span>overview</span></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/6.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_notices')); ?>
    </div>

    <div class="content col-xs-12 center">

        <div class="acc_srch center col-xs-10 inline">  

            <div class="start sbmt col-xs-2 inline left">
                <div class="btn-orng col-xs-12 inline left">
                    <a href="<?php echo $this->Html->url(array('controller' => 'notices', 'action' => 'start'),array('escape' => false)); ?>">
                        <p class="inline">new notice</p>
                    </a>
                </div>
            </div>

            <div class="status inline center push-r">
                <div id="statusTrig" class="col-xs-12 center">
                    <p class="inline">Status</p>
                    <i class="inline fa fa-caret-down" aria-hidden="true"></i>
                </div>
                <ul class="act_list">                         
                    <li class="col-xs-6 inline">
                        <i class="inline far fa-check-circle"></i>
                        <?php if ($listType == 'com') $class = 'current-list-type'; else $class = ''; echo $this->Html->link('Complete', 'index/com', array('class' => $class)); ?>
                    </li>                                         
                    <li class="col-xs-5-2 inline">
                        <i class="inline far fa-clock"></i>
                        <?php if ($listType == 'act') $class = 'current-list-type'; else $class = ''; echo $this->Html->link('Active', 'index/act', array('class' => $class)); ?>
                    </li>
                </ul>
            </div>

            <div id="searchBar" class="sbmt fm_input fm_text col-xs-4 inline right">
                <input id="btnClear" class="right btn-blue col-xs-3 inline last" type="submit" name="submit" value="search" />
                <input id="txtSearch" class="right input inline col-xs-9" type="text" placeholder="Address, city, county, plaintiff or defendant"  />
            </div>

        </div>

        <div class="info col-xs-12 center">                
            <div class="col-xs-12 info_wrap lrg inline center">
                <?php echo $this->element('notices_list'); ?>
            </div>
        </div>

    </div>
    
</div>

<?php include '/app/webroot/files/alert_popup.inc';?>