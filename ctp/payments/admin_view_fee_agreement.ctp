<div id="wrapper" class="acc center fm-create">

    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>view</span> fee agreement</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/1.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div id="feeAgreement" class="col-xs-12 left flex push-t push-b">

            <?php echo $fee_agreements; ?>
            
        </div>
        
    </div>
    
</div>