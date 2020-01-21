<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
            <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">Form <span>Edit</span></h1>
            </div>
            <div class="hr_over"></div>
            <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/5.jpg"></div>
        </div>
        
        <div class="db_tab col-xs-12 center">
            <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
        </div>
    
        <div class="content col-xs-8 center">
            
            <div class="actions btn-blue col-xs-2 center input left">
                <a href="<?php echo $this->Html->url(String::insert(__('List :param1', true), array('param1' => __('Clients', true))), array('action' => 'index')); ?>"><p>Cleint List</p></a>
            </div>
            
            <div class="clients form inline col-xs-12 left push-t push-b">
                
                <?php
                
                echo $this->Form->create('Client', array('type' => 'file', 'action' => 'edit'));
                
                echo $this->Form->input('id');
                
                echo '<p class="left col-xs-12 inline push-t">Name:</p>';
                echo $this->Form->input('name', array('class' => 'col-xs-12 inline left', 'label' => false, 'div' => array('class' => 'input fm_input fm_text text last')));
                
                echo '<p class="left col-xs-12 inline push-t">Login Page:</p>';
                echo $this->Form->input('login_page', array('class' => 'col-xs-12 inline left', 'label' => false, 'div' => array('class' => 'input fm_input fm_text text last')));
                
                $afterText = '';
                if ($this->data['Client']['logo'] != '') $afterText = '<div id="div-logo" class="push-t left" style="font-size: 18px;"><a href="' . $absolute_path . $this->data['Client']['logo'] . '" target="_blank">View current logo</a> / <a href="#" onclick="removeLogo();return false;">Remove logo</a></div>';
                echo '<p class="left col-xs-12 inline push-t">Logo:</p>';
                echo $this->Form->input('logo', array('after' => $afterText, 'type' => 'file', 'class' => 'col-xs-12 inline left', 'label' => false, 'style'=>'font-size:18px;', 'div' => array('class' => 'push-t inline col-xs-12 left')));
                echo $this->Form->input('logo_hidden', array('type' => 'hidden', 'value' => $this->data['Client']['logo']));
                
                echo '<div class="col-xs-5-2 push-r center inline"><p class="left col-xs-12 inline push-t">Primary Color:</p>';
                echo $this->Form->input('primary_color', array('class' => 'col-xs-12 inline left', 'label' => false, 'div' => array('class' => 'input fm_input fm_text text last')));
                echo '</div>';
                
                echo '<div class="col-xs-5-2 push-r center inline"><p class="left col-xs-12 inline push-t">Secondary Color:</p>';
                echo $this->Form->input('secondary_color', array('class' => 'col-xs-12 inline left', 'label' => false, 'div' => array('class' => 'input fm_input fm_text text last')));
                echo '</div>';
                
                ?>
                
            </div>
            
            <?php
                echo $this->Form->submit('Save', array(
                    'type' => 'Save', 
                    'type' => 'image',
                    'div' => array(
                        'class' => 'fm_input fm_text col-xs-3 inline center last'),
                    'class' => 'btn-blue input'
                ));
                
                echo $this->Form->end();
            ?>
            
        </div>
    
</div>