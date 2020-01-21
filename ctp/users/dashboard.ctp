<div id="wrapper" class="acc center">
        
    <div class="hero col-xs-12 center">
        <div class="hr_mn hr_txt acc_txt center">
            <h1 class="main">login <span><i class="fas fa-angle-right"></i></span> process <span><i class="fas fa-angle-right"></i> </span> track</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/1.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'get_started')); ?>
        <div class="hilite center col-xs-12">
            <p class="inline">Click the tap above for the service you need.</p>
            <i id="hiliteClose" class="inline far fa-times-circle"></i>
        </div>
    </div>

    <div class="content col-xs-10 center">

        <h1 class="center"><span>welcome</span> to your account</h1>
        
        <div class="col-xs-2 ms_strk center"></div>
        
        <div class="my_acc col-xs-10 center push-t push-b inline">
        
            <div class="col-xs-12 left inline last">

                <div class="profile-info col-xs-12 left">

                    <p class="inline input left col-xs-3">First Name: <strong><?php //echo $profile['Profile']['first_name']; ?>First</strong></p>

                    <p class="inline input left col-xs-3">Last Name: <strong><?php //echo $profile['Profile']['last_name']; ?>Last</strong></p>

                    <p class="inline input left col-xs-3">User Name: <strong><?php //echo $profile['User']['username']; ?>User</strong></p>
                    
                    <li class="fm_input fm_text col-xs-2 inline center left"><?php echo $this->Html->link('Edit Profile', array('controller' => 'profiles', 'action' => 'edit'), array('class' => 'a-btn btn-blue input')) ?></li>

                </div>

            </div>
            
        </div>
        
        <div class="acc_link col-xs-12 center inline push-t push-b">
        
            <div class="col-xs-3 inline center push-r push-l">
                
                <div class="col-xs-12 btn-blue inline center" style="margin-bottom:10px;">
                    <a href="../leases/index"><p>Leases</p></a>
                </div>
                
                <a href="#"><p class="push-t" style="padding:5px 0;"><strong>Relevent Link</strong></p></a>
                
                <a href="#"><p style="padding:5px 0;"><strong>Long Popular Link Here</strong></p></a>
                <a href="#"><p style="padding:5px 0;"><strong>Relevent Link</strong></p></a>
                
                <a href="#"><p style="padding:5px 0;"><strong>Long Popular Link Here</strong></p></a>
                <a href="#"><p style="padding:5px 0;"><strong>Relevent Link</strong></p></a>
            
                <a href="#"><p style="padding:5px 0;"><strong>Long Popular Link Here</strong></p></a>
                
            </div>
            
            <div class="col-xs-3 inline center push-r push-l">
                
                <div class="col-xs-12 btn-blue inline center" style="margin-bottom:10px;">
                    <a href="../notices/index"><p>Notices</p></a>
                </div>
                
                <a href="#"><p class="push-t" style="padding:5px 0;"><strong>Relevent Link</strong></p></a>
                
                <a href="#"><p style="padding:5px 0;"><strong>Long Popular Link Here</strong></p></a>
                <a href="#"><p style="padding:5px 0;"><strong>Relevent Link</strong></p></a>
                
                <a href="#"><p style="padding:5px 0;"><strong>Long Popular Link Here</strong></p></a>
                <a href="#"><p style="padding:5px 0;"><strong>Relevent Link</strong></p></a>
            
                <a href="#"><p style="padding:5px 0;"><strong>Long Popular Link Here</strong></p></a>
                
            </div>
            
            <div class="col-xs-3 inline center push-r push-l">
                
                <div class="col-xs-12 btn-blue inline center" style="margin-bottom:10px;">
                    <a href="../evictions/index"><p>Evictions</p></a>
                </div>
                
                <a href="#"><p class="push-t" style="padding:5px 0;"><strong>Relevent Link</strong></p></a>
                
                <a href="#"><p style="padding:5px 0;"><strong>Long Popular Link Here</strong></p></a>
                <a href="#"><p style="padding:5px 0;"><strong>Relevent Link</strong></p></a>
                
                <a href="#"><p style="padding:5px 0;"><strong>Long Popular Link Here</strong></p></a>
                <a href="#"><p style="padding:5px 0;"><strong>Relevent Link</strong></p></a>
            
                <a href="#"><p style="padding:5px 0;"><strong>Long Popular Link Here</strong></p></a>
                
            </div>
        
        </div>

        <div class="box col-xs-12 center push-b">

            <div class="fm_item col-xs-3 inline center">
                <a href="<?php echo $this->Html->url(array('controller' => 'leases', 'action' => 'index')); ?>">
                    <h2 class="box_h1 center col-xs-12">leases 24/7</h2>
                    <div class="box_wrap col-xs-12 center">
                        <p class="center">new leases</p>
                        <h2 class="box_h2 center"><sup>$</sup>40.00</h2> 
                        <p class="center">renewal leases</p>
                        <h2 class="box_h2 center"><sup>$</sup>30.00</h2>
                    </div>     
                    <div class="fm_bot center"></div> 
                </a>
            </div>

            <div class="fm_item col-xs-3 inline center">
                <a href="<?php echo $this->Html->url(array('controller' => 'notices', 'action' => 'index')); ?>">
                    <h2 class="box_h1 center col-xs-12">notices 24/7</h2>
                    <div class="box_wrap col-xs-12 center">
                        <p class="center">posted noticed<br>to pay rent</p>
                        <h2 class="box_h2 center"><sup>$</sup>75.00</h2>
                    </div>     
                    <div class="fm_bot center"></div> 
                </a>
            </div>

            <div class="fm_item col-xs-3 inline center">
                <a href="<?php echo $this->Html->url(array('controller' => 'evictions', 'action' => 'index')); ?>">
                    <h2 class="box_h1 center col-xs-12">eviction 24/7</h2>
                    <div class="box_wrap col-xs-12 center">
                        <p class="center">eviction only</p>
                        <h2 class="box_h2 center"><sup>$</sup>195.00 <sup class="inline">+ Court Costs</sup></h2> 
                        <p class="center">eviction &amp; damages</p>
                        <h2 class="box_h2 center"><sup>$</sup>595.00 <sup class="inline">+ Court Costs</sup></h2>
                    </div>     
                    <div class="fm_bot center"></div> 
                </a>
            </div>

        </div>
        
        <div class="col-xs-12 inline center">
        
            <div class="col-xs-3 inline center push-t push-l push-r">
                <div class="col-xs-12 btn-blue inline center">
                    <a href="../pages/forms"><p>Free Forms</p></a>
                </div>
            </div> 
            
            <div class="col-xs-3 inline center push-t push-l push-r">
                <div class="col-xs-12 btn-blue inline center">
                    <a href="#"><p>Relevent Link</p></a>
                </div>
            </div>
            
            <div class="col-xs-3 inline center push-t push-l push-r">
                <div class="col-xs-12 btn-orng inline center">
                    <a href="#"><p>Need Help?</p></a>
                </div>
            </div>  
            
        </div>

    </div>

</div>