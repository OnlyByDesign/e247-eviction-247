<script type="text/javascript">
	$('#btnContinue').live('click', function() {
		var isPleadingSelected = false;

		$("input").each(function(index) {
			if (this.type == 'checkbox') {
				if (this.checked) isPleadingSelected = true;
			}
		});
		
		if (!isPleadingSelected) {
			alert("Please select at least one pleading.");
			return false;
		}
	});
</script>

<div id="wrapper" class="acc center fm-create">
    
        <div class="hero col-xs-12 center">
            <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main"><span>Create</span> Amended Pleadings</h1>
            </div>
            <div class="hr_over"></div>
            <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/4.jpg"></div>
        </div>
        
        <div class="db_tab col-xs-12 center">
            <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
        </div>
    
        <div class="content col-xs-8 center">
            
            <div class="inline col-xs-12 left push-t push-b">

                <p><strong>Property address:</strong> <?php echo $address; ?></p>
                <p>Select the pleadings for which you want to create an amended version.</p>

                <?php
                    echo $this->Form->create();
                    echo '<ul>';
                    foreach($documents_list as $document) {
                        echo '<li>';
                        echo $this->Form->input($document['id'], array('type' => 'checkbox', 'label' => $document['name'], 'value' => $document['order']));
                        echo '</li>';
                    }
                    echo '</ul>';
                ?>
                
            </div>
            
            <?php
                echo $this->Form->submit('Save', array('id' => 'btnContinue', 'type' => 'Continue', 'type' => 'image', 'div' => array('class' => 'fm_input fm_text col-xs-3 inline center push-t last'), 'class' => 'btn-blue input')); 
                echo $this->Form->end();
                echo '<p class="col-xs-12 center">';
                echo $this->Html->link('Cancel', array('controller' => 'evictions', 'action' => 'index'));
                echo '</p>';
            ?>
            
    </div>
    
</div>