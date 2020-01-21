<?php
	$logged_in = $this->Session->check('Auth.User.id');

	//$full_url = Router::url($this->here, true);
    $full_url = Router::url(null, true);
	if (strpos($full_url, '/leases') !== false) {
		CakeSession::write('CurrentSite', 'leases');
		$title = 'Leases 24/7';
//		$home_link = 'leases247';
	} else if (strpos($full_url, '/notice') !== false) {
		CakeSession::write('CurrentSite', 'notice');
		$title = 'Notices 24/7';
//		$home_link = 'notices247';
	} else if (strpos($full_url, '/eviction') !== false) {
		CakeSession::write('CurrentSite', 'eviction');
		$title = 'Eviction 24/7';
//		$home_link = 'eviction247';
	} else if (strpos($full_url, '/dashboard') !== false) {
		CakeSession::write('CurrentSite', 'dashboard');
		$title = 'My Account';
//		$home_link = '/';
	} else {
		CakeSession::write('CurrentSite', 'landing-page');
		$title = 'Property Management Services';
//		$home_link = 'home';
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    
	<head>
        
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        
		<title><?php echo $title_for_layout; ?> | Eviction24/7 Site Management Area</title>
        
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

		<script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                                    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-58997768-1', 'auto');
            ga('send', 'pageview');
		</script>
        
	</head>

	<body>
        
        <header class="center">
            
            <div id="navBarAdmin" class="hr_admin mn_wrp col-xs-12 center">
                
                <div id="adminBarTrigger" class="col-xs-12 center inline">
                    <p class="center inline">Admin Options</p>
                </div>
                
                <div id="adminBar" class="center">
                    <p><?php echo $this->Html->link('Leases', array('controller' => 'leases', 'action' => 'index'), array()); ?></p>
                    <p><?php echo $this->Html->link('Notices', array('controller' => 'notices', 'action' => 'index'), array()); ?></p>
                    <p><?php echo $this->Html->link('Evictions', array('controller' => 'evictions', 'action' => 'index'), array()); ?></p>
                    <p><?php echo $this->Html->link('Document Templates',  array('controller' => 'document_templates', 'action' => 'index'), array()); ?></p>
                    <p><?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index'), array()); ?></p>
                    <p><?php echo $this->Html->link('Counties', array('controller' => 'counties', 'action' => 'index'), array()); ?></p>
                    <p><?php echo $this->Html->link('Damage Fees', array('controller' => 'damagefeescategories', 'action' => 'index'), array()); ?></p>
                    <p><?php echo $this->Html->link('Forms', array('controller' => 'forms', 'action' => 'index'), array()); ?></p>
                    <p><?php echo $this->Html->link('Attorneys',	array('controller' => 'attorneys', 'action' => 'index'), array()); ?></p>
                    <p><?php echo $this->Html->link('Clients', array('controller' => 'clients', 'action' => 'index'), array()); ?></p>
                </div>    
                
            </div>
            
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
                        <p><?php echo $this->Html->link('Account', array('controller' => 'leases', 'action' => 'admin-index')); ?></p>
                        <p><?php echo $this->Html->link('Contact', array('controller'=>'pages','action'=>'display','contact')) ?></p>
                        <p><?php echo $this->Html->link('Free Forms', array('controller'=>'pages','action'=>'display','forms')) ?></p>
                        <p><?php echo $this->Html->link('Home', array('controller'=>'pages','action'=>'display','Home')) ?></p>
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
        
        <div id="homeWrap" class="admin-user center">
            
            <div id="content">
                  
                  <?php
                    echo $this->Session->flash();
                    echo $this->Session->flash('auth');
                    echo $content_for_layout;
                  ?>
            
            </div><!-- end homeWrap -->
            
                
        </div><!-- End Wrapper -->

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
        </footer>
    <?php
    /*
     * According to the documentation at
     * http://book.cakephp.org/view/1594/Using-a-specific-Javascript-engine
     * we need to print out the cache explicitly before the ending body tag.
     */
      echo $this->Js->writeBuffer();
		?>
	</body>
</html>
