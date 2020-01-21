<?php
	echo $this->element('datepicker_includes');
?>
<script type="text/javascript">
	$(document).ready(function() {
	
	  $(function() {
//	    $("#txtSearch").keyup(function() {
	    $("#txtSearch").on('input', function() {
	    	var searchValue = $(this).val();
//				$('#busy-indicator-div').fadeIn();
				$.ajax({
				    url: '/index.php/admin/evictions/livesearch/<?php echo $listType . '/' . $page;?>/' + searchValue,
				    cache: false,
				    type: 'GET',
				    dataType: 'HTML',
				    success: function (data) {
				        $('#list').html(data);
//								$('#busy-indicator-div').fadeOut();
				    }
				});
			});
			
			$('#btnClear').on('click', function() {
				$('#txtSearch').val('');
				//$('#txtSearch').keyup();
				$("#txtSearch").trigger("input");
			});
	  });
	
	
		//Display the cancel popup box
		$('.cancel').on('click', function(event) {
			$('#evictionID').val(event.target.id);
			$('#popupTitle').text('Eviction #' + event.target.id);
		  $('#overlay').fadeIn('slow');
		  $("#divPopup").fadeIn('slow');
		  return false;
		});
	
		$('#btnCancel').on('click', function() {
	  	if ($('#txtConfirm').val() == 'YES') {
				window.location.replace('/index.php/admin/evictions/cancelEviction/' + $('#evictionID').val());
			}
	 		$('#divPopup').fadeOut('slow');
	 		$('#overlay').fadeOut('slow');
		});
	
		$('#btnClose').on('click', function() {
	 		$('#divPopup').fadeOut('slow');
	 		$('#overlay').fadeOut('slow');
	  });
	
	
		//Display the restore popup box
		$('.restore').on('click', function(event) {
			$('#evictionIDRestore').val(event.target.id);
			$('#popupTitleRestore').text('Eviction #' + event.target.id);
		  $('#overlay').fadeIn('slow');
		  $("#divPopupRestore").fadeIn('slow');
		  return false;
		});
	
		$('#btnRestore').on('click', function() {
	  	//if ($('#txtConfirm').val() == 'YES') {
				window.location.replace('/index.php/admin/evictions/restoreEviction/' + $('#evictionIDRestore').val());
			//}
	 		$('#divPopupRestore').fadeOut('slow');
	 		$('#overlay').fadeOut('slow');
		});
	
		$('#btnCloseRestore').on('click', function() {
	 		$('#divPopupRestore').fadeOut('slow');
	 		$('#overlay').fadeOut('slow');
	 		return false;
	  });
	
/*
		//Display the alert box popup
		$(window).load(function () {
			if ($("#divPopupAlert").length == 1) {
			  $('#overlay').fadeIn('slow');
			  $("#divPopupAlert").fadeIn('slow').delay(1000).fadeOut('slow');
			  $('#overlay').delay(1000).fadeOut('slow');
		  	return false;
			}
		});
*/
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
			$("[id^=expand-collapse]").on('click', function() {
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
		    return false;
		  });
		});
	
	
		Date.prototype.toInputFormat = function() {
	     var yyyy = this.getFullYear().toString();
	     var mm = (this.getMonth()+1).toString(); // getMonth() is zero-based
	     var dd  = this.getDate().toString();
	     return (mm[1]?mm:"0"+mm[0]) + "/" + (dd[1]?dd:"0"+dd[0]) + "/" + yyyy;
	  };
	
		//-- Update Status dialog box
		$('.update_status').on('click', function() {
			var eviction_id = $(this).attr('id');
	
			//Get the current status of the selected Eviction
			$.ajax({
			    url: '/index.php/admin/evictions/get_status/' + eviction_id + '/<?php echo $page; ?>',
			    cache: false,
			    type: 'GET',
			    dataType: 'HTML',
			    success: function (data) {
						var obj = jQuery.parseJSON(data);
		        $('#status-list').html(obj.status_list);
		        $('#EvictionActionDateId').val(obj.action_date_id);
		        $('#EvictionActionDateActionDate').val(obj.action_date);
		        $('#EvictionActionDateNote').val(obj.action_date_note);
		        $('#EvictionStatusDate').val(obj.status_date);
		        $('#EvictionStatusDateJudgment').val(obj.status_date_judgment);
		        $('#EvictionStatusDateWrit').val(obj.status_date_writ);
		        $('#EvictionStatusDatePossession').val(obj.status_date_possession);
		        $('#EvictionStatusDateExpire').val(obj.status_date_expire);
		        $('#EvictionStatusDateVacated').val(obj.status_date_vacated);
		        $('#EvictionStatusDateContested').val(obj.status_date_contested);
		        $('#EvictionId').val(eviction_id);
						$('#matter-number').html(eviction_id);
	
						var dialog_width = 800;
						var dialog_height = 350;
						$('#divUpdateStatus').css({'width' : dialog_width, 'height' : dialog_height});
						$('#divUpdateStatus').css({'margin-top' : '-' + (dialog_height / 2) + 'px', 'margin-right' : 0, 'margin-bottom' : 0, 'margin-left' : '-' + (dialog_width / 2) + 'px'});
					  $('#overlay').fadeIn('slow');
					  $("#divUpdateStatus").fadeIn('slow');
	
						//Call these functions to show/hide the appropriate Status date fields (depending on the current Status)
				    hideShowStatusDateField();
				    hideShowDamagesStatusDateField();
	
				}	//end success
			});	//end ajax
		});	//end function
	
	
		$('#btnSave').on('click', function() {
			var formData = "EvictionStatusId=" + $('#EvictionStatusId').val() +
										 "&EvictionActionDateId=" + $('#EvictionActionDateId').val() +
										 "&EvictionActionDateActionDate=" + $('#EvictionActionDateActionDate').val() +
										 "&EvictionActionDateNote=" + $('#EvictionActionDateNote').val() +
										 "&EvictionStatusDate=" + $('#EvictionStatusDate').val() +
										 "&EvictionStatusDateJudgment=" + $('#EvictionStatusDateJudgment').val() +
										 "&EvictionStatusDateWrit=" + $('#EvictionStatusDateWrit').val() +
										 "&EvictionStatusDatePossession=" + $('#EvictionStatusDatePossession').val() +
										 "&EvictionStatusDateExpire=" + $('#EvictionStatusDateExpire').val() +
										 "&EvictionStatusDateVacated=" + $('#EvictionStatusDateVacated').val() +
										 "&EvictionStatusDateContested=" + $('#EvictionStatusDateContested').val();
	
			$.ajax({
			    url: '/index.php/admin/evictions/get_status/' + $('#EvictionId').val(),
			    cache: false,
			    type: 'POST',
					data: formData,
	    		success: function(data, textStatus, jqXHR) {
	        	if (textStatus == 'success') {
							$('#divUpdateStatus').fadeOut('slow');
					 		$('#overlay').fadeOut('slow');
					 		//$('#btnClear').trigger('click');
					 		location.reload();
	        	}
	    		},
	    		error: function (jqXHR, textStatus, errorThrown) {
	    			alert(textStatus);
	    		}
	   	});
		});
	
	
		//Close the dialog box
		$('#btnCloseDialog').on('click', function() {
			$('#divUpdateStatus').fadeOut('slow');
	 		$('#overlay').fadeOut('slow');
		});
	
		//If a Status date field is changed, add 1 day to the chosen date and insert it into the Action Date field
		$('.hasDatepicker').on('change', function() {
			if ($(this).attr('id') != 'EvictionActionDateActionDate') {
				var date = new Date($(this).val());
				date.setDate(date.getDate() + 1)
				$('#EvictionActionDateActionDate').val(date.toInputFormat());
			}
		});
		//-- end Update Status dialog box
	
	});
</script>

<?php
		switch ($listType) {
			case 'new':
					$title = "New";
					break;
			case 'inp':
					$title = "In Progress";
					break;
			case 'com':
					$title = "Complete";
					break;
			case 'can':
					$title = "Cancelled";
					break;
			default:
					$title = "New";
		}


 	if (!$this->request->is("ajax")) {
    ?>

    <div id="wrapper" class="acc center fm-create admin index">       
        
        <div class="hero col-xs-12 center">
            <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">Leases - <span><?php echo $title;?></span></h1>
            </div>
            <div class="hr_over"></div>
            <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/4.jpg"></div>
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
                            <i class="inline far fa-play-circle"></i>
                            <?php echo $this->Html->link(__('New', true), array('action' => 'index', 'new')); ?>
                        </li>
                        <li class="inline col-xs-2-2 left">
                            <i class="inline far fa-check-circle"></i>
                            <?php echo $this->Html->link(__('In Progress', true), array('action' => 'index', 'inp')); ?>
                        </li>                                         
                        <li class="inline col-xs-2-2 left">
                            <i class="inline far fa-clock"></i>
                            <?php echo $this->Html->link(__('Complete', true), array('action' => 'index', 'com')); ?>
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
                    <input id="txtSearch" class="right input inline col-xs-9" type="text" placeholder="Search by address, plaintiff, user or defendant"  value="<?php echo $searchValue; ?>"  />
                </div>
                
            </div>
            
            <?php } ?>

            <div class="info col-xs-12 center">
                <div id="list" class="info_wrap lrg center">
                    <?php echo $this->element('leases_list_admin', array('page' => $page)); ?>
                </div>
            </div>


 	<?php
 		if (!$this->request->is("ajax")) {
			echo $this->Html->link(__('Export Leases', true), array('admin' => true, 'controller' => 'leases', 'action' => 'export'), array('escape' => false));
		}
	?>

</div>


<div class="popups center">

    <div id="divPopup">
        <div class="ui-dialog-titlebar"><span class="ui-dialog-title">Cancel Eviction</span></div>
      <div class="inner_bg">
        <div class="inner_padding">
            <input type="hidden" id="evictionID" value="" />
            <p id="popupTitle"></p>
            <p>Enter YES in the box below and click Cancel to cancel this eviction</p>
                <input type="text" name="txtConfirm" id="txtConfirm" value="" />
                <br /><br />
                <div class="left"><input type="submit" name="btnCancel" id="btnCancel" value="Cancel" /></div>
                <div class="left">&nbsp; <a href="#" id="btnClose">Close</a></div>
        </div>
      </div>
    </div>


    <div id="divPopupRestore">
        <div class="ui-dialog-titlebar"><span class="ui-dialog-title">Restore Eviction</span></div>
      <div class="inner_bg">
        <div class="inner_padding">
            <input type="hidden" id="evictionIDRestore" value="" />
            <p id="popupTitleRestore"></p>
            <p>Click on Restore to move this Eviction back to active status</p>
                <!--input type="text" name="txtConfirm" id="txtConfirm" value="" /-->
                <br /><br />
                <div class="left"><input type="submit" name="btnRestore" id="btnRestore" value="Restore" /></div>
                <div class="left">&nbsp; <a href="#" id="btnCloseRestore">Close</a></div>
        </div>
      </div>
    </div>
</div>
        
<?php include '/app/webroot/files/admin_alert_popup.inc';?>