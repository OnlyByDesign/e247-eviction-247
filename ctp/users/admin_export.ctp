<?php echo $this->element('datepicker_includes') ?>

<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>export</span> a user</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/5.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="actions col-xs-12 inline">
            <div class="btn-blue col-xs-2 center left">
                <a href="<?php echo $this->Html->url(array('controller' => '#', 'action' => '#', $lease_id)); ?>"><p>Manage Landlords</p></a>
            </div>
            <p class="left inline push-l input center"><strong></strong></p>
        </div>

        <div class="export form col-xs-12 left flex push-t push-b">
            
            <table cellpadding="0" cellspacing="0">
                <?php echo $this->Form->create('Export'); ?>
                <p>Select any of the filters below to narrow your search results</p>
                <?php
				echo $this->Form->input('role', array('options' => $roles));
				echo $this->Form->input('name', array('type' => 'text', 'label' => 'Name'));
				echo $this->Form->input('user', array('type' => 'text', 'label' => 'Username'));
				echo $this->Form->input('group', array('type' => 'text', 'label' => 'Group Name'));
				echo $this->Form->input('creation_date_start', array('type' => 'text', 'label' => 'Registration Date Start'));
				echo $this->Form->input('creation_date_end', array('type' => 'text', 'label' => 'Registration Date End'));
				echo $this->Form->input('procuring_attorney_id', array('options' => $attorneys, 'empty' => array(0 => '')));
                ?>
            </table>
            
        </div>
        
        <div class="btn-blue col-xs-3 center">
            <a href="#" onclick="document.forms[0].submit();return false;" class="btn"><p>Export</p></a>
        </div>
        
        <?php
        echo $this->Form->end();
        echo '<p class="col-xs-12 center">';
        echo $this->Html->link('Cancel', array('controller' => 'users', 'action' => 'index'));
        echo '</p>';
        ?>
        
    </div>
        
</div>