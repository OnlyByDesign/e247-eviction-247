<?php
	switch ($listType) {
		case 'act':
				$title = "Active";
				break;
		case 'com':
				$title = "Complete";
				break;
		default:
				$title = "Active";
	}
?>
<script type="text/javascript">
  $(function() {
    $("#txtSearch").keyup(function() {
    	var searchValue = $(this).val();

			$.ajax({
			    url: '/index.php/evictions/livesearch/<?php echo $listType;?>/' + searchValue,
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

			//Open up the details box for this evictions
			if ($("#eviction-summary-" + divID).css('display') == 'block') {
				var expandHeight = $("#eviction-detail-" + divID).outerHeight();
				$("#eviction-wrapper-" + divID).animate({height: expandHeight}, 'fast');
	      $("#eviction-summary-" + divID).fadeOut('fast');
	      $("#eviction-detail-" + divID).fadeIn('fast');
      	var src = $("#expand-collapse-" + divID + " img").attr('src');
	      $("#expand-collapse-" + divID + " img").attr('src', src.replace('expand', 'collapse'));
	      $("#expand-collapse-" + divID + " img").attr('alt', 'collapse');
	      $("#expand-collapse-" + divID + " img").attr('title', 'collapse');
			}

			//Scroll to the Eviction that has just been saved
    	if ($("#eviction-summary-" + divID).length > 0) $('html, body').animate({scrollTop: $(document.location.hash).offset().top}, 500);
    }


		//Expand / collapse the selected eviction box
		//$("[id^=expand-collapse]").live('click', function() {
//MODIFIED TO WORK WITH THE NEW VERSION OF JQUERY
		$("[id^=expand-collapse]").click(function() {
    	var div = "#" + $(this).attr('id');
			var divID = div.substr(17);

      var src = $("#expand-collapse-" + divID + " img").attr('src');
			if ($("#eviction-summary-" + divID).css('display') == 'block') {
				var expandHeight = $("#eviction-detail-" + divID).outerHeight();
				$("#eviction-wrapper-" + divID).animate({height: expandHeight}, 'fast');
	      $("#eviction-summary-" + divID).fadeOut('fast');
	      $("#eviction-detail-" + divID).fadeIn('fast');
	      $("#expand-collapse-" + divID + " img").attr('src', src.replace('expand', 'collapse'));
	      $("#expand-collapse-" + divID + " img").attr('alt', 'collapse');
	      $("#expand-collapse-" + divID + " img").attr('title', 'collapse');
	    } else {
				var expandHeight = $("#eviction-summary-" + divID).outerHeight();
				$("#eviction-wrapper-" + divID).animate({height: expandHeight}, 'fast');
	      $("#eviction-detail-" + divID).fadeOut('fast');
	      $("#eviction-summary-" + divID).fadeIn('fast');
	      $("#expand-collapse-" + divID + " img").attr('src', src.replace('collapse', 'expand'));
	      $("#expand-collapse-" + divID + " img").attr('alt', 'expand');
	      $("#expand-collapse-" + divID + " img").attr('title', 'expand');
	    }
	  });

	});
</script>

<div id="wrapper" class="acc center fm-create evictions index">       
        
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main">evictions <span>overview</span></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/1.jpg"></div>
    </div>
        
    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_evictions')); ?>
    </div>
    
    <div class="content col-xs-12 center">
            
            <div class="acc_srch center col-xs-10 inline">    
                <div class="start sbmt col-xs-2 inline left">
                    <div class="btn-orng col-xs-12 inline left">
                        <a href="<?php echo $this->Html->url(array('controller' => 'evictions', 'action' => 'new_case'),array('escape' => false)); ?>">
                            <p class="inline">new case</p>
                        </a>
                    </div>
                </div>
                <div class="status inline center push-r">
                    <div id="statusTrig" class="col-xs-12 center">
                        <p class="inline">Status</p>
                        <i class="inline fa fa-caret-down" aria-hidden="true"></i>
                    </div>
                    <ul class="act_list">                         
                        <li class="col-xs-5-2 inline">
                            <i class="inline far fa-check-circle"></i>
                            <?php if ($listType == 'act') $class = 'current-list-type'; else $class = ''; echo $this->Html->link('Active', 'index/act', array('class' => $class)); ?>
                        </li>                                         
                        <li class="col-xs-5-2 inline">
                            <i class="inline far fa-clock"></i>
                            <?php if ($listType == 'com') $class = 'current-list-type'; else $class = ''; echo $this->Html->link('Complete', 'index/com', array('class' => $class)); ?>
                        </li>
                    </ul>
                </div>
                <div id="searchBar" class="sbmt fm_input fm_text col-xs-4 inline right">
                    <input id="btnClear" class="right btn-blue col-xs-3 inline last" type="submit" name="submit" value="search" />
                    <input id="txtSearch" class="right input inline col-xs-9" type="text" placeholder="Address, city, state, county, plaintiff or defendant"  />
                </div>
            </div>
            
            <div class="info col-xs-12 center">                
                <div class="info_wrap lrg center inline col-xs-12">
                    <?php echo $this->element('evictions_list'); ?>
                </div>
            </div>
    </div>
</div>

<?php include '/app/webroot/files/alert_popup.inc';?>