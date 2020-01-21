<script type="text/javascript">
	function baseDocumentChanged() {
		var county = document.getElementById("county");
		
		if (document.getElementById("DocumentTemplateBaseDocument").checked == true) {
			county.style.display = 'none';
		}	else {
			county.style.display = '';		
		}
	}


  $(function() {
    $("#StateName").change(function() {
    	var state_id = $(this).val();

			$.ajax({
			    url: '/index.php/admin/documenttemplates/loadCounties/' + state_id,
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
                <h1 class="main">Add a <span>Document Template</span></h1>
            </div>
            <div class="hr_over"></div>
            <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/2.jpeg"></div>
        </div>
        
        <div class="db_tab col-xs-12 center">
            <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
        </div>
    
        <div class="content col-xs-8 center">

            <div class="documentTemplates form inline col-xs-12 left push-t push-b">
                
                <?php
                echo $this->Html->script('tiny_mce/jquery.tinymce', false);
                echo $this->Html->script('tiny_mce_init', false);
                echo $this->Form->create('DocumentTemplate');
                ?>
                
                <div class="col-xs-12 left inline push-b">
                <?php
                    echo $this->Form->input('base_document',array('onchange'=>'baseDocumentChanged();', 'div' => array('class' => 'fm_mem inline input col-xs-5 left'), 'class' => 'fm_check'));
                    echo $this->Form->input('is_multiple', array('label' => 'Generate a copy for each defendant', 'div' => array('class' => 'fm_mem inline input col-xs-5 left'), 'class' => 'fm_check'));
                ?>
                </div>
                
                <?php
                
                echo $this->Form->input('State.name', array('options' => $states, 'style' => 'font-size:18px;', 'class' => ' input col-xs-10 inline right', 'div' => array('class' => 'input fm_input fm_text text left col-xs-5-2'), 'label' => array('class'=>'left push-r'), 'required' => true));
                
                echo $this->Form->input('county_id', array('options' => $counties, 'style' => 'font-size:18px;', 'class' => ' input col-xs-10 inline right', 'div' => array('class' => 'input fm_input fm_text text right last col-xs-5-2'), 'label' => array('class'=>'left push-r'), 'required' => true));
                
                ?>
                
                <div class="flex col-xs-12 left push-t inline">
                
                <?php
                
                echo $this->Form->input('order', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Order',
                    'label' => false
                ]);
                
                echo $this->Form->input('name', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Name',
                    'label' => false
                ]);
                
                echo $this->Form->input('service_id', [
                    'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left last'),
                    'class' => 'input col-xs-12 center',
                    'after' => 'Service ID',
                    'label' => false
                ]);
                    
                ?>
                    
                </div>
                
                <?php
                echo '<div class="fm_input fm_text col-xs-12 inline push-t left">';
                echo '<p class="col-xs-12 left inline">Document Template Editor</p>';
                echo $this->Form->textarea('html',array(
                    'class' => 'tinymce col-xs-12 center',
                    'label' => false,
                    'id' => 'editor',
                    'rows' => 10, 
                    'required' => false
                ));
                echo '</div>';
                ?>
                
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