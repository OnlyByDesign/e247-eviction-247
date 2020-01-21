<div id="tabMob" class="tab_mob col-xs-12 center">    
    <h2>user areas</h2>
    <i class="fa fa-caret-down" aria-hidden="true"></i>
</div>

<div class="adminTab tabContainer tab_acc center col-xs-8 flex">
    
    <div class="tabElement tb_item inline col-xs-3 center <?php if ($currentTab == 'leases') echo 'current'; ?>">
        <?php echo $this->Html->link('<p>Leases</p>', array('controller' => 'leases', 'action' => 'index'), array('escape' => false)); ?>
    </div>
    
    <div class="tabElement tb_item inline col-xs-3 center <?php if ($currentTab == 'notices') echo 'current'; ?>">
        <?php echo $this->Html->link('<p>Notices</p>', array('controller' => 'notices', 'action' => 'index'), array('escape' => false)); ?>
    </div>
    
    <div class="tabElement tb_item inline col-xs-3 center <?php if ($currentTab == 'evictions') echo 'current'; ?>">
        <?php echo $this->Html->link('<p>Evictions</p>', array('controller' => 'evictions', 'action' => 'index'), array('escape' => false)); ?>
    </div>
    
    <div class="tabElement tb_item inline col-xs-3 center <?php if ($currentTab == 'users') echo 'current'; ?>">
        <?php echo $this->Html->link('<p>Users</p>', array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?>
    </div>
    
</div>
