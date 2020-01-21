<div id="wrapper" class="acc center user">   
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main">my <span>account</span> information</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/6.jpg"></div>
    </div>
        
    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_account')); ?>
    </div>
    
    <div class="content col-xs-8 center">          
        
        <div class="actions col-xs-3 left inline">
            
            <ul class="col-xs-12 inline left last">
                
                <li class="fm_input fm_text col-xs-5 inline center left"><?php echo $this->Html->link('Manage Prices', array('controller' => 'provisions', 'action' => 'index'), array('class' => 'a-btn btn-orng input')) ?></li>
                
                <li class="fm_input fm_text col-xs-5 inline center left"><?php echo $this->Html->link('Edit Profile', array('controller' => 'profiles', 'action' => 'edit'), array('class' => 'a-btn btn-blue input')) ?></li>
                
                <li class="fm_input fm_text col-xs-5 inline center left"><?php echo $this->Html->link('Change Password', array('controller' => 'users', 'action' => 'edit'), array('class' => 'a-btn btn-blue input')) ?></li>
                
                <li class="fm_input fm_text col-xs-5 inline center left"><?php echo $this->Html->link('Manage Address Book', array('controller' => 'address_books', 'action' => 'index'), array('class' => 'a-btn btn-blue input')) ?></li>
                
                <li class="fm_input fm_text col-xs-5 inline center left"><?php echo $this->Html->link('Manage Property Address Book', array('controller' => 'property_address_books', 'action' => 'index'), array('class' => 'a-btn btn-blue input')) ?></li>
                
                <li class="fm_input fm_text col-xs-5 inline center left"><?php echo $this->Html->link('Manage Custom Provisions', array('controller' => 'provisions', 'action' => 'index'), array('class' => 'a-btn btn-blue input')) ?></li>
                
            </ul>
            
        </div>
        
        <div class="my_acc col-xs-8 right">
        
            <div class="user-wrap col-xs-12 left inline last">

                <h3 class="profile-title left col-xs-12">User Information</h3>

                <div class="profile-info col-xs-12 left">

                    <p class="inline left">First Name: <strong><?php echo $profile['Profile']['first_name']; ?></strong></p>

                    <p class="inline left">Last Name: <strong><?php echo $profile['Profile']['last_name']; ?></strong></p>

                    <p class="inline left">User Name: <strong><?php echo $profile['User']['username']; ?></strong></p>

                </div>

            </div>

            <div class="user-wrap col-xs-12 left inline last">

                <h3 class="profile-title left col-xs-12">Billing Address</h3>

                <div class="profile-info col-xs-12 left">

                    <p class="inline left">Street Address 1: <strong><?php echo $profile['Profile']['mailing_address1']; ?></strong></p>

                    <p class="inline left">Street Address 2: <strong><?php echo $profile['Profile']['mailing_address2']; ?></strong></p>

                    <p class="inline left">City: <strong><?php echo $profile['Profile']['city']; ?></strong></p>

                    <p class="inline left">State: <strong><?php echo $profile['Profile']['state']; ?></strong></p>

                    <p class="inline left">Zip Code: <strong><?php echo $profile['Profile']['zip_code']; ?></strong></p>

                    <p class="inline left">Billing Email Address: <strong><?php echo $profile['Profile']['billing_email_address']; ?></strong></p>

                </div>

            </div>

            <div class="user-wrap col-xs-12 left inline last">

                <h3 class="profile-title left col-xs-12">Contact Information</h3>

                <div class="profile-info col-xs-12 left">

                    <p class="inline left">Primary Phone Number: <strong><?php echo $profile['Profile']['primary_phone_number']; ?></strong></p>

                    <p class="inline left">Cell Phone Number: <strong><?php echo $profile['Profile']['cell_phone_number']; ?></strong></p>

                    <p class="inline left">Fax Number: <strong><?php echo $profile['Profile']['fax_number']; ?></strong></p>

                    <p class="inline left">Notification Email Address: <strong><?php echo $profile['Profile']['email_address']; ?></strong></p>

                    <p class="inline left">Company Name: <strong><?php echo $profile['Profile']['company_name']; ?></strong></p>

                </div>

            </div>
        
        </div>
        
    </div>
    
</div>