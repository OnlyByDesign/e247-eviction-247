<div id="wrapper" class="acc center fm-lease">
        
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">lease <span>complete</span></h1>
            </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/3.jpg"></div>
    </div>
    
    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_leases')); ?>
    </div>
        
    <div class="content col-xs-10 center push-t">
        
        <div class="progress center col-xs-9">
                <i class="pg_icon inline center fas fa-plus"></i>
                <div class="pg_strike inline center"></div>
                <i class="pg_icon inline center fas fa-dollar-sign"></i>
                <div class="pg_strike inline center"></div>
                <i class="pg_icon inline center far fa-file-alt"></i>
                <div class="pg_strike inline center"></div>
                <i class="pg_icon inline center far fa-bell"></i>
                <div class="pg_strike inline center"></div>
                <i class="pg_icon inline center fas fa-check current"></i>
        </div>
        
        <div class="col-xs-4 left push-r">
            <p class="left col-xs-12 inline push-b">
                <strong s9tyle="display:block">STATUS:</strong>
                <?php
                    $messageFax = '';
                    if ($lease['Lease']['is_faxed'] == true) $messageFax = 'If you prefer, you can fax your documents to 1-904-239-5468.';
                ?>
                We are in receipt of your information and will update you shortly.
            </p>
            <p class="col-xs-12 left push-b">Thank you for allowing us to assist you.</p>
            <?php
                echo '<p>You can go to the ' . $this->Html->link('Leases', array('controller' => 'leases', 'action' => 'index')) . ' page to view the details and status of this lease.</p>';
            ?>
        </div>
        <div class="col-xs-7-2 right">
            <p class="left inline push-b">
                <strong style="display:block">NOTICE:</strong>
                Please add the email address <strong>admin@mail.eviction247.com</strong> to your contacts to ensure that you get all status updates about your lease.<br>
                If you do not receive a confirming email from <strong>admin@mail.eviction247.com</strong> within a few minutes from now please check your "junk/spam" email folder. If the confirming email is in your "junk/spam" folder please move the email to your inbox, mark the email as safe and be sure to add <strong>admin@mail.eviction247.com</strong> to your contacts.
            </p>
        </div>
        <div class="col-xs-12 left push-t">
            <?php
                echo '	<p class=" col-xs-8 center"><strong>Please do not hesitate to ' . $this->Html->link('contact us', array('controller' => 'forms', 'action' => 'contact')) . ' if you have any questions.</strong></p>';
                include '/app/webroot/files/alert_popup.inc';
            ?>
        </div>
    </div>  
</div>