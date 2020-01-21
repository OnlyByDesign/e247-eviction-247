<?php
    $logged_in = $this->Session->check('Auth.User.id');

	$full_url = Router::url(null, true);
	if (strpos($full_url, 'pages/leases') !== false) {
		CakeSession::write('CurrentSite', 'leases');
		$title = 'Leases 24/7';
//		$home_link = 'leases247';
	} else if (strpos($full_url, 'pages/eviction') !== false) {
		CakeSession::write('CurrentSite', 'eviction');
		$title = 'Eviction 24/7';
//		$home_link = 'eviction247';
	} else if (strpos($full_url, 'pages/notices') !== false) {
		CakeSession::write('CurrentSite', 'notices');
		$title = 'Notices 24/7';
//		$home_link = 'notices247';
	} else if (strpos($full_url, '/dashboard') !== false) {
		CakeSession::write('CurrentSite', 'my_account');
		$title = 'My Account';
	} else {
		CakeSession::write('CurrentSite', 'landing-page');
		$title = 'Property Management Services';
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="initial-scale=1">

        <title><?php echo $title; ?></title>
        
        <?php echo $scripts_for_layout; ?>

        <link rel='stylesheet' type='text/css' href='/app/webroot/css/dev/bootstrap.css' />
        <link rel='stylesheet' type='text/css' href='/app/webroot/css/dev/fontawesome-all.css' />
        <link rel='stylesheet' type='text/css' href='/app/webroot/css/dev/format.css' />
        <link rel='stylesheet' type='text/css' href='/app/webroot/css/dev/navigation.css' />
        <link rel='stylesheet' type='text/css' href='/app/webroot/css/dev/responsive.css' />
        
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet">

        <script type="text/javascript" src="/app/webroot/js/dev/jquery-3.0.0.min.js"></script>
        <script type="text/javascript" src="/app/webroot/js/dev/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/app/webroot/js/dev/main.js"></script>
        <script type="text/javascript" src="/app/webroot/js/dev/browser.js"></script>
        <script type="text/javascript" src="/app/webroot/js/dev/parallax.min.js"></script>
        
        <link rel='stylesheet' type='text/css' href='/app/webroot/css/custom_login.php' />
        
    </head>


    <body>
        
        <header class="center">
        <div class="hr_main col-xs-12 hd_t center">
            <div class="hd hd_logo col-xs-3 inline center">
                <a href="http://dev.eviction247.com"><img src="/img/dev/Header-Logo.png" /></a>
            </div>
            <div id="desktop" class="hd hd_nav col-xs-6 inline center">
                <div class="sb_wrp">
                    <p><?php echo $this->Html->link('Evictions',array('controller'=>'pages','action'=>'display','evictions')) ?></p>
                    <p><?php echo $this->Html->link('Notices',array('controller'=>'pages','action'=>'display','notices')) ?></p>
                    <p><?php echo $this->Html->link('Leases',array('controller'=>'pages','action'=>'display','leases')) ?></p>
                </div>
                <div class="mn_wrp">
                    <p><?php if ($logged_in == 1) {
                        echo $this->Html->link('Account', array('controller' => 'users', 'action' => 'dashboard'));
                    } ?></p>
                    <p><?php echo $this->Html->link('Contact',array('controller'=>'pages','action'=>'display','contact')) ?></p>
                    <p><?php echo $this->Html->link('Free Forms',array('controller'=>'pages','action'=>'display','forms')) ?></p>
                    <p><?php echo $this->Html->link('Home',array('controller'=>'pages','action'=>'display','Home')) ?></p>
                </div>
            </div>
            
            <div id="mobile"  role="navigation">
              <div id="menuToggle">
                <input type="checkbox" />
                <img class="center" src="/img/dev/Menu-Trig.png" />
                <ul id="menu">
                    <p><?php echo $this->Html->link('Contact',array('controller'=>'pages','action'=>'display','contact')) ?></p>
                    <p><?php echo $this->Html->link('Free Forms',array('controller'=>'pages','action'=>'display','forms')) ?></p>
                    <p><?php echo $this->Html->link('Home',array('controller'=>'pages','action'=>'display','Home')) ?></p>
                    
                    <div style="height: 25px;"></div>
                    <p><?php echo $this->Html->link('Leases',array('controller'=>'pages','action'=>'display','leases')) ?></p>
                    <p><?php echo $this->Html->link('Notices',array('controller'=>'pages','action'=>'display','notices')) ?></p>
                    <p><?php echo $this->Html->link('Evictions',array('controller'=>'pages','action'=>'display','evictions')) ?></p>
                    
                    <div style="height: 25px;"></div>
                    <p><?php echo $this->Html->link('My Account',array('controller'=>'pages','action'=>'display','login')) ?></p>
                </ul>
              </div>
            </div>
            
            <?php if ($logged_in) { ?> 
                <div id="accOpen" class="hd col-xs-3 inline">
                    <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'my_account')); ?>">
                        <div class="hd_acc acc_open center">
                            <?php printf("<p>Hi, %s</p>", $this->Session->read('Auth.User.username')); ?>
                        </div>
                    </a>
                    <div id="signOut" class="acc_out center">
                        <p><?php echo $this->Html->link('Sign out',array('controller' => 'users','action' => 'logout')) ?></p>
                    </div>
                </div>                            
            <?php } else { ?>            
                <div id="myAcc" class="hd col-xs-3 inline">
                    <a href="<?php echo $this->Html->url(array('controller' => 'index', 'action' => 'login')); ?>">
                        <div class="hd_acc center">
                            <i class="far fa-user"></i>
                            <p>My Account</p>
                        </div>
                    </a>
                </div>            
            <?php } ?>
            
        </div>
    </header>
        <div class="hd_spacer"></div>
        
    <!-- ==================== CONTENT ==================== -->
    <div id="wrapper" class="center">
        
        <?php
            if ($this->here == '/index.php/') echo '<div id="homeWrap">';
			else echo '<div id="pageWrap">';								
                if ($logged_in && AuthComponent::user('role') == 'admin') {
                $full_url = Router::url($this->here, true);
                $currentTab = '';
                if (strpos($full_url, 'leases') !== false) $currentTab = 'leases';
                else if (strpos($full_url, 'notices') !== false) $currentTab = 'notices';
                else if (strpos($full_url, 'evictions') !== false) $currentTab = 'evictions';
                else if (strpos($full_url, 'users') !== false) $currentTab = 'users';
                echo $this->element('admin_tabs', array('currentTab' => $currentTab));
	        }
            echo $this->Session->flash();
            echo $this->Session->flash('auth');
            echo $content_for_layout;
        ?>

    </div>
    
    <!-- ==================== FOOTER ==================== -->
    <footer class="center col-xs-12">
        <div class="col-xs-11 center">
            <div class="ft ft_nav col-xs-2">
                <a href="#"><p>Home</p></a>
                <a href="#"><p>Contact Us</p></a>
                <a href="#"><p>Free Forms</p></a>
                <a href="#"><p>Terms of Use</p></a>
            </div>
            <div class="ft ft_sub col-xs-2">
                <a href="#"><p class="sub>">leases</p></a>
                <a href="#"><p class="sub>">notices</p></a>
                <a href="#"><p class="sub>">evictions</p></a>
            </div>
            <div class="ft ft_logo col-xs-4 center">
                <a href="#"><img src="/img/dev/MWLF-Foot.png"/></a>
                <img src="/img/dev/Foot-Logo.png"/>
            </div>
            <div class="ft ft_cont col-xs-4">
                <p><strong>Phone: </strong><a href="tel:9046600060">904-660-0060</a></p>
                <p><strong>Email: </strong><a href="mailto:admin1@eviction247.com">admin1@eviction247.com</a></p>
                <p><a href="#">822 US Highway A1A North, Suite 100<br>Ponte Vedra Breach, FL 32082</a></p>
            </div>
        </div>
    </footer><!-- End Wrapper -->

    <?php if ($this->here == '/index.php/pages/eviction247' || $this->here == '/index.php/pages/learn_more') { ?>
	<script type="text/javascript">
		function calculateFees(divID) {
			//Get the number of defendants selected
			var numDefendants = document.getElementById("DefendantsNumber"+divID).value;
			//Get the fees for the selected county
			var feeSummons 			= document.getElementById("hidFeeSummons"+divID).value*numDefendants;
								var feeProcess 			= document.getElementById("hidFeeProcess"+divID).value*numDefendants;
								var feeWrit 				= document.getElementById("hidFeeWrit"+divID).value;
								var feeWritAdd			= document.getElementById("hidFeeWrit"+divID+'_add').value*(numDefendants-1);
								var feeWritIssuance = document.getElementById("hidFeeWritIssuance"+divID).value;
								if (feeWritIssuance == '') feeWritIssuance = "0.00";
								var feeFiling 			= document.getElementById("hidFeeFiling"+divID).value;
								feeWrit = parseFloat(feeWrit) + parseFloat(feeWritAdd);
								var total						= parseFloat(feeSummons) + parseFloat(feeProcess) + parseFloat(feeWrit) + parseFloat(feeWritIssuance) + parseFloat(feeFiling);
								
								document.getElementById("divFeeSummons"+divID).innerText 			= "$" + feeSummons.toFixed(2);
								document.getElementById("divFeeProcess"+divID).innerText 			= "$" + feeProcess.toFixed(2);
								document.getElementById("divFeeWrit"+divID).innerText 				= "$" + feeWrit.toFixed(2);
								document.getElementById("divFeeWritIssuance"+divID).innerText = "$" + feeWritIssuance;
								document.getElementById("divFeeFiling"+divID).innerText 			= "$" + feeFiling;
								document.getElementById("divFeeTotal"+divID).innerText 				= "$" + total.toFixed(2);
							}
						
						
						  $(function() {
						    $("#StateName1").change(function() {loadCounties(this, 1)});
						    $("#StateName2").change(function() {loadCounties(this, 2)});
						    
						    function loadCounties(objState, divID) {
						    	var state_id = $(objState).val();
						
									$.ajax({
									    url: '/index.php/pages/loadCounties/' + state_id,
									    cache: false,
									    type: 'GET',
									    dataType: 'HTML',
									    success: function(response) {
													if (response != '') {
						              	$('#CountyName'+divID).html(response);
													}
													$('#CountyName'+divID).trigger('change');
						          },
						          error: function(e) {
						              //alert("An error occurred: " + e.responseText.message);
						              console.log(e);
						          }
									});
								};
						
						    $("#CountyName1").change(function() {getCountyFees(this, 1)});
						    $("#CountyName2").change(function() {getCountyFees(this, 2)});
						
								function getCountyFees(objCounty, divID) {
						    	var county_id = $(objCounty).val();
						
									$.ajax({
									    url: '/index.php/pages/getCountyFees/' + county_id,
									    cache: false,
									    type: 'GET',
									    dataType: 'HTML',
									    success: function(response) {
													if (response != '') {
														var obj = jQuery.parseJSON(response);
										        $('#hidFeeSummons'+divID).val(obj.summons);
										        $('#hidFeeProcess'+divID).val(obj.process_server);
										        $('#hidFeeWrit'+divID).val(obj.writ);
										        $('#hidFeeWrit'+divID+'_add').val(obj.writ_2);
										        $('#hidFeeWritIssuance'+divID).val(obj.writ_issuance);
										        if (divID == 1) $('#hidFeeFiling'+divID).val(obj.filing_fee_eviction);
										        else $('#hidFeeFiling'+divID).val(obj.filing_fee_damages);
	//									        $('#divFeeSummons'+divID).html('$' + obj.summons);
	//									        $('#divFeeProcess'+divID).html('$' + obj.process_server);
	//									        $('#divFeeWrit'+divID).val(obj.writ);
	//									        $('#divFeeWritIssuance'+divID).val(obj.writ_issuance);
	//									        if (divID == 1) $('#divFeeFiling'+divID).val(obj.filing_fee_eviction);
	//									        else $('#divFeeFiling'+divID).val(obj.filing_fee_damages);
													}
													calculateFees(divID);
						          },
						          error: function(e) {
						              //alert("An error occurred: " + e.responseText.message);
						              console.log(e);
						          }
									});
								};
						  });
					</script>
            <?php } ?>
    </body>
</html>
