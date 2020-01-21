<div id="tabMob" class="tab_mob col-xs-12 center">    
    <h2>user areas</h2>
    <i class="fa fa-caret-down" aria-hidden="true"></i>
</div>

<div class="tabContainer tab_acc center col-xs-8 flex"> 
    
    <div class="tabElement tb_item inline center <?php if ($currentTab == 'get_started') echo 'active'; ?>">
        <?php echo $this->Html->link('<p>get started</p>', array('controller' => 'users', 'action' => 'dashboard'),array('escape' => false)); ?>
    </div>
    
    <?php //if ((CakeSession::read('permissions') & Configure::read('permissions.leases')) == Configure::read('permissions.leases')) { ?>
    <div class="tabElement tb_item inline center <?php if ($currentTab == 'my_leases') echo 'active'; ?>">
        <?php echo $this->Html->link('<p>leases</p>', array('controller' => 'leases', 'action' => 'index'),array('escape' => false)); ?>
    </div>
    <?php //} ?>
    
    <?php //if ((CakeSession::read('permissions') & Configure::read('permissions.notices')) == Configure::read('permissions.notices')) { ?>
    <div class="tabElement tb_item inline center <?php if ($currentTab == 'my_notices') echo 'active'; ?>">
        <?php echo $this->Html->link('<p>notices</p>', array('controller' => 'notices', 'action' => 'index'),array('escape' => false)); ?>
    </div>
    <?php //} ?>
    
    <?php //if ((CakeSession::read('permissions') & Configure::read('permissions.evictions')) == Configure::read('permissions.evictions')) { ?>
    <div class="tabElement tb_item inline center <?php if ($currentTab == 'my_evictions') echo 'active'; ?>">
        <?php echo $this->Html->link('<p>evictions</p>', array('controller' => 'evictions', 'action' => 'index'),array('escape' => false)); ?>
    </div>
    <?php //} ?>
    
    <div class="tabElement tb_item inline col-xs-2-2 center <?php if ($currentTab == 'my_account') echo 'active'; ?>">
        <?php echo $this->Html->link('<p>my account</p>', array('controller' => 'users', 'action' => 'my_account'),array('escape' => false)); ?>
    </div>
</div>
