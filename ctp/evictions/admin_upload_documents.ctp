<div id="wrapper" class="acc center fm-create leases index">
    
    <div class="hero col-xs-12 center">
            <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main"><span>Upload</span> Faxed Documents</h1>
            </div>
            <div class="hr_over"></div>
            <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/2.jpeg"></div>
        </div>
        
        <div class="db_tab col-xs-12 center">
            <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
        </div>
    
        <div class="content col-xs-8 center">

            <div class="evictions form inline col-xs-12 left push-t push-b">
                    
                <div class="col-xs-6 inline left">
                        <?php
                            echo '	<p><strong>Property address:</strong><br>' . $address . '</p>';
                            echo '	<p class="push-t"><strong>Defendant(s):</strong> ' . $defendants . '</p>';
                            echo '	<p><strong>Plaintiff:</strong> ' . $plaintiff . '</p>';
                            echo '	<p><strong>Matter #:</strong> ' . $eviction_id . '</p>';
                        ?>
                    </div>
                    
                <div class="col-xs-6 inline left">
                        <?php
                        echo '<div class="col-xs-12 push-t inline">';
                        echo '<p class="left col-xs-6 inline">Eviction:</p>';
                        echo $this->Form->input('Eviction', array('type' => 'file', 'action' => "upload_documents/$eviction_id", 'class' => 'col-xs-12 inline left', 'label' => false, 'style'=>'font-size:18px;', 'div' => array('class' => 'inline col-xs-6 left')));
                        echo '</div>';

                        echo $this->Form->input('Eviction.id', array('class' => 'col-xs-12 inline left', 'label' => false, 'div' => array('class' => 'input fm_input fm_text text last push-t'), 'value' => $document_id, 'style'=>'font-size:18px;'));
                    
                        echo '<div class="col-xs-12 push-t inline">';
                        echo '<p class="left col-xs-6 inline">Eviction lease:</p>';
                        echo $this->Form->input('Eviction.lease', array('type' => 'file', 'class' => 'col-xs-12 inline left', 'style'=>'font-size:18px;', 'div' => array('class' => 'inline col-xs-6 left'), 'label' => false, 'required' => false));
                        echo '</div>';
                    
                        echo '<div class="col-xs-12 push-t inline">';
                        echo '<p class="left col-xs-6 inline">Signed eviction notice:</p>';
                        echo $this->Form->input('Eviction.signed_notice', array('type' => 'file', 'action' => "upload_documents/$eviction_id", 'class' => 'col-xs-12 inline left', 'div' => array('class' => 'inline col-xs-6 left'), 'label' => false, 'required' => false, 'style'=>'font-size:18px;'));
                        echo '</div>';

                        ?>
                    </div>
                
            </div>
            
        <?php
            
            echo $this->Form->submit('Save', array( 'type' => 'Save', 'type' => 'image', 'div' => array('class' => 'fm_input fm_text col-xs-3 inline center push-t last'), 'class' => 'btn-blue input')); 
            
            echo $this->Form->end();
            
            echo '<p class="col-xs-12 center">';
                echo $this->Html->link('Cancel', array('controller' => 'damage_fees_categories', 'action' => 'index'));
            echo '</p>';
            
        ?>
            
    </div>
    
</div>


<?php include '/app/webroot/files/alert_popup.inc';?>