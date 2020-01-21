<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>add</span> a fee</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/3.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_account')); ?>
    </div>

    <div class="content col-xs-10 center">
        
        <?php echo $this->Html->script('fees', false); ?>

        <div class="fees form col-xs-12 left flex push-t push-b">
            <?php 
            echo $this->Form->create('Fee', array('action' => 'add/' . $eviction_id));
            echo $this->Form->input('eviction_id', array('type' => 'hidden', 'value' => $eviction_id));
            $fees = array();
			foreach ($damage_fees as $damagefeecategory) {
                foreach ($damagefeecategory['DamageFee'] as $damagefee) {
					$fees[$damagefeecategory['DamageFeesCategory']['name']][$damagefeecategory['DamageFeesCategory']['name'] . ':' . $damagefee['name']] = $damagefee['name'];
				}
			}
            echo $this->Form->input('name', array('options' => $fees, 'label' => 'Category'));
            echo $this->Form->input('customName', array('id' => 'customName', 'label' => 'Description (only if you selected "Other" above)') );
            echo $this->Form->input('amount');
            ?>
        </div>
        
        <?php
		echo $this->Form->submit('Save', array( 'type' => 'Save', 'type' => 'image', 'div' => array('class' => 'fm_input fm_text col-xs-3 inline center push-t last'), 'class' => 'btn-blue input')); 
        echo $this->Form->end();
        echo '<p class="col-xs-12 center">';
        echo $this->Html->link('Cancel', array('controller' => 'fees', 'action' => 'index', $eviction_id));
        echo '</p>';
        ?>
        
    </div>
        
</div>