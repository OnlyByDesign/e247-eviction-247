<script type="text/javascript">
	function baseDocumentChanged() {
		var county = document.getElementById("county");
		
		if (document.getElementById("DocumentTemplateBaseDocument").checked == true) {
			county.style.display = 'none';
		}	else {
			county.style.display = '';		
		}		
	}

	function stateNameChanged(state_id) {
		$.ajax({
		    url: '/index.php/admin/documenttemplates/loadCounties/' + state_id + '/',
		    cache: false,
		    type: 'GET',
		    dataType: 'HTML',
		    success: function(response) {
            $('#DocumentTemplateCountyId').html(response);
        },
        error: function(e) {
            alert("An error occurred: " + e.responseText.message);
            console.log(e);
        }
		});
	}

	$(document).ready(function() {
	//	baseDocumentChanged();
   	//$(document).stateNameChanged('<?php echo $currentState; ?>');
//   	stateNameChanged('<?php echo $currentState; ?>');

    $("#DocumentTemplateState").change(function() {
    	stateNameChanged($(this).val());
    	//$(document).stateNameChanged($(this).val());
    });
	});

/*
	tinymce.init({
	    selector: "textarea"
	 });
	 */
</script>

<div id="wrapper" class="acc center fm-create">
    
        <div class="hero col-xs-12 center">
            <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main"><span>Edit</span> Document Template</h1>
            </div>
            <div class="hr_over"></div>
            <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/3.jpg"></div>
        </div>
        
        <div class="db_tab col-xs-12 center">
            <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
        </div>
    
        <div class="content col-xs-8 center">
            
            <div class="documentTemplates form inline col-xs-12 left push-t push-b">
                
                <?php
                    echo $this->Html->script('tiny_mce/jquery.tinymce', false);
                    echo $this->Html->script('tiny_mce_init', false);
                    echo $this->Form->create();
                
                    echo $this->Form->input('id');
                
                    echo $this->Form->input('base_document', array('div' => array('class' => 'fm_input fm_text text left last col-xs-5-2'), 'class' => 'col-xs-10 inline left', 'label' => array('class'=>'left push-r', 'text'=>'Base Document')));
                ?>
                
                <div id="county" class="col-xs-12 left inline push-t flex">
                    <?php
                        echo $this->Form->input('State.name', array('options' => $states, 'style' => 'font-size:18px;', 'class' => ' input col-xs-10 inline right', 'div' => array('class' => 'input fm_input fm_text text left col-xs-5-2'), 'label' => array('class'=>'left push-r', 'text'=>'State'), 'required' => true, 'selected' => $currentState));
                        echo $this->Form->input('county_id', array('options' => $counties, 'style' => 'font-size:18px;', 'class' => ' input col-xs-10 inline right', 'div' => array('class' => 'input fm_input fm_text text left col-xs-5-2 last'), 'label' => array('class'=>'left push-r', 'text'=>'County'), 'required' => true));
                    ?>
                </div>
                
                <div class="col-xs-12 left inline push-t flex">
                <?php
                    echo $this->Form->input('order', array('div' => array('class' => 'input fm_input fm_text text left col-xs-5-2'), 'class' => ' input col-xs-10 inline right', 'label' => array('class'=>'left push-r', 'text'=>'Order')));
                    echo $this->Form->input('name', array('div' => array('class' => 'input fm_input fm_text text left last col-xs-5-2 last'), 'class' => ' input col-xs-10 inline right', 'label' => array('class'=>'left push-r', 'text'=>'Name')));
                ?>
                </div>
                
                <div class="col-xs-12 left inline push-t flex">
                <?php
                    echo $this->Form->input('is_multiple', array('div' => array('class' => 'fm_input fm_text text left col-xs-5-2'), 'class' => 'col-xs-10 inline left', 'label' => array('class'=>'left push-r', 'text'=>'Generate a copy for each defendant')));
                    echo $this->Form->input('service_id', array('div' => array('class' => 'input fm_input fm_text text left last col-xs-5-2'), 'class' => ' input col-xs-9 inline right', 'label' => array('class'=>'left push-r', 'text'=>'Service ID'),'readonly' => true));
                ?>
                </div>
                
                <div class="fm_input fm_text col-xs-12 left inline last push-t">
                <?php
                    echo $this->Form->textarea('html', array('class' => 'text left col-xs-12 tinymce', 'id' => 'editor', 'rows' => 40));
                ?>
                </div>
                
            </div>
            
            <?php
                    echo $this->Form->submit('Save', array(
                        'type' => 'Save', 
                        'type' => 'image',
                        'div' => array(
                            'class' => 'fm_input fm_text col-xs-3 inline center push-t last'),
                        'class' => 'btn-blue input'
                    )); 
                    echo $this->Form->end();

                    echo '<p class="col-xs-12 center">';
                        echo $this->Html->link('Cancel', array('controller' => 'damage_fees_categories', 'action' => 'index'));
                    echo '</p>';
            ?>
            
        </div>
    
</div>