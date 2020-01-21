<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>manage</span> payments</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/5.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_account')); ?>
    </div>

    <div class="content col-xs-8 center">

        <div class="col-xs-12 left flex push-t push-b">
            
            <p class="col-xs-12 left inline">
                We have already processed your transaction. Please continue to the next step where you will enter the eviction information.
                <br>
                If for some reason you cannot continue with this eviction, please contact us.
            </p>
            
        </div>
        
        <div class="btn-blue col-xs-2 center left">
            <?php echo $this->Html->link('Continue', array('controller' => 'evictions', 'action' => 'edit', $this->Session->read('Eviction.id')), array('escape' => false)); ?>
        </div>
        
    </div>
    
</div>