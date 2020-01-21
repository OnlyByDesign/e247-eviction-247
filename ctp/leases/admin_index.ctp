<script type="text/javascript">
$(document).ready(function() {    
  $(function() {
    $("#txtSearch").keyup(function() {
    	var searchValue = $(this).val();
			$.ajax({
			    url: '/index.php/admin/leases/livesearch/<?php echo $listType;?>/' + searchValue,
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

	
	$(".cancel").on("click", function() {
		$('#leaseID').val(event.target.id);
		$('#popupTitle').text('Lease #' + event.target.id);
	  $('#overlay').fadeIn('slow');
	  $("#divPopup").fadeIn('slow');
	  return false;
	});

  $('#btnCancel').on('click', function() {
  	if ($('#txtConfirm').val() == 'YES') {
			window.location.replace('/index.php/admin/leases/cancelLease/' + $('#leaseID').val());
		}
 		$('#divPopup').fadeOut('slow');
 		$('#overlay').fadeOut('slow');
	});

  $('#btnClose').on('click', function() {
 		$('#divPopup').fadeOut('slow');
 		$('#overlay').fadeOut('slow');
  });


	//Display the alert box popup
	$(window).load(function () {
		if ($("#divPopupAlert").length == 1) {
	  $('#overlay').fadeIn('slow');
	  $("#divPopupAlert").fadeIn('slow').delay(1200).fadeOut('slow');
	  $('#overlay').delay(1200).fadeOut('slow');
	  return false;
		}
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
	
				//Scroll to the lease that has just been saved
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
		    return false;
		  });
		});
});
</script>
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
			case 'can':
					$title = "Cancelled";
					break;
			default:
					$title = "Active";
		}
?>
    
<div id="wrapper" class="acc center fm-create leases index">
    
        <div class="hero col-xs-12 center">
            <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">Leases - <span><?php echo $title;?></span></h1>
            </div>
            <div class="hr_over"></div>
            <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/6.jpg"></div>
        </div>
        
        <div class="db_tab col-xs-12 center">
            <?php echo $this->element('admin_tabs', array('currentTab' => 'leases')); ?>
        </div>
    
        <div class="content col-xs-12 center">

            <div class="acc_srch center col-xs-10 inline">

                    <div class="action inline left col-xs-7">

                        <div id="statusTrig" class="col-xs-12 center">
                            <p class="inline">Status</p>
                            <i class="inline fa fa-caret-down" aria-hidden="true"></i>
                        </div>

                        <ul class="act_list left col-xs-12">   
                            <li class="inline col-xs-2-2 left">
                                <i class="inline far fa-check-circle"></i>
                                <?php echo $this->Html->link(__('In Progress', true), array('action' => 'index', 'inp')); ?>
                            </li>
                            <li class="inline col-xs-2-2 left">
                                <i class="inline far fa-play-circle"></i>
                                <?php echo $this->Html->link(__('Active', true), array('action' => 'index', 'act')); ?>
                            </li>                                  
                            <li class="inline col-xs-2-2 left">
                                <i class="inline far fa-clock"></i>
                                <?php echo $this->Html->link(__('Expired', true), array('action' => 'index', 'exp')); ?>
                            </li>
                            <li class="inline col-xs-2-2 left">
                                <i class="inline fas fa-times"></i>
                                <?php echo $this->Html->link(__('Cancelled', true), array('action' => 'index', 'can')); ?>
                            </li>
                        </ul>

                        <ul class="act_list left col-xs-12" style="margin-top: 15px;">

                            <li class="inline col-xs-2-2 left">
                                Sort by: <?php echo $this->Html->link(__('Action date', true), array('action' => 'index', $listType, 1)); ?>
                            </li>

                            <li class="inline col-xs-2-2 left">
                                <?php echo 'Matter # ' . $this->Html->link('<i class="fas fa-arrow-up"></i>', array('action' => 'index', $listType, 2), array('escape' => false, 'style' => 'margin:0;')) . ' ' . $this->Html->link('<i class="fas fa-arrow-down"></i>', array('action' => 'index', $listType, 3), array('escape' => false)); ?>
                            </li>

                        </ul>

                    </div>

                    <div id="searchBar" class="sbmt fm_input fm_text col-xs-4 inline right">
                        <input id="btnClear" class="right btn-blue col-xs-3 inline last" type="submit" name="submit" value="search" />
                        <input id="txtSearch" class="right input inline col-xs-9" type="text" placeholder="Search by address, plaintiff, user or defendant"  />
                    </div>

            </div>
            
            <div class="info col-xs-12 center">
                <div id="list" class="info_wrap lrg center">
                    <?php echo $this->element('leases_list_admin'); ?>
                </div>
            </div>
            
	   </div>

 	<?php
 		if (!$this->request->is("ajax")) {
			echo $this->Html->link(__('Export Leases', true), array('admin' => true, 'controller' => 'leases', 'action' => 'export'), array('escape' => false));
		}
	?>

</div>


<div id="overlay"></div>

<div id="divPopup">
	<div class="ui-dialog-titlebar"><span class="ui-dialog-title">Cancel Lease</span></div>
  <div class="inner_bg">
    <div class="inner_padding">
    	<input type="hidden" id="leaseID" value="" />
    	<p id="popupTitle"></p>
    	<p>Enter YES in the box below and click Cancel to cancel this lease</p>
			<input type="text" name="txtConfirm" id="txtConfirm" value="" />
			<br /><br />
			<div class="left"><input type="submit" name="btnCancel" id="btnCancel" value="Cancel" /></div>
			<div class="left">&nbsp; <a href="#" id="btnClose">Close</a></div>
    </div>
  </div>
</div>